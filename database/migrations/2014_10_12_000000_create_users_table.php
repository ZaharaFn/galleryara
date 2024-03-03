<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('alamat')->nullable();
            $table->string('bio')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('profile')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::unprepared('
        CREATE TRIGGER trigger_user_insert 
        AFTER INSERT on users 
        FOR EACH ROW
        BEGIN
        INSERT INTO log_users (id_users, action, username, email, created_at, updated_at) VALUES (NEW.id, "INSERT", NEW.username, NEW.email, NOW(), NOW());
        END;
        ');
        DB::unprepared('
        CREATE TRIGGER trigger_user_update
        AFTER UPDATE on users 
        FOR EACH ROW
        BEGIN
        INSERT INTO log_users (id_users, action, username, email, created_at, updated_at) VALUES (NEW.id, "UPDATE", NEW.username, NEW.email, NOW(), NOW());
        END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
