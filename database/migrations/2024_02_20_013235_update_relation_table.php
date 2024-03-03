<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('foto', function (blueprint $table){
      
            $table->foreign('id_users')->references('id')->on('users')->onUpdateCascade()->onDeleteCascade();
            $table->foreign('id_album')->references('id')->on('album')->onUpdateCascade()->onDeleteCascade();
            //
         });
         Schema::table('likefoto', function (blueprint $table){
            $table->foreign('id_users')->references('id')->on('users')->onUpdateCascade()->onDeleteCascade();
            $table->foreign('id_foto')->references('id')->on('foto')->onUpdateCascade()->onDeleteCascade();
            
         });
         Schema::table('comments', function (blueprint $table){
            $table->foreign('id_users')->references('id')->on('users')->onUpdateCascade()->onDeleteCascade();
            $table->foreign('id_foto')->references('id')->on('foto')->onUpdateCascade()->onDeleteCascade();
            //
         });
         Schema::table('album', function (blueprint $table){
            $table->foreign('id_users')->references('id')->on('users')->onUpdateCascade()->onDeleteCascade();
            //
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
