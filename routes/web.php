<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/editprofile', function () {
//     return view('editprofile');
// });

// Route::get('/upload', function () {
//     return view('upload');
// });

//upload and album
Route::middleware(['auth'])->group(function () {
    Route::get('/index', function () {
        return view('index');
    });


    // Route::get('/detailcomment/{id}', function () {
    //     return view('detailcomment');
    // });

    Route::get('/detailcomment/{id}', [ExploreController::class, 'detailcomment']);
    //komen
    Route::get('/detailcomment/{id}/getdatakomen', [ExploreController::class, 'getdatakomen']);
    Route::get('/detailcomment/getKomen/{id}', [ExploreController::class, 'ambildatakomentar']);
    // Route::post('/detailcomment/kirimkomentar', [ExploreController::class, 'kirimkomentar']);
    Route::post('/detailcomment/kirimkomentar', [ExploreController::class, 'kirimkomentar'])->name('kirimkomentar');

    Route::post('/like', [ExploreController::class, 'like']);

    //menampilkan semua postingan
    Route::get('/getDataExplore', [ExploreController::class, 'getdata']);
    //menampilkan postingan sendiri
    Route::get('/getDataPostingku', [ExploreController::class, 'getdatapostingku']);

    Route::get('/index', function () {
        return view('index');
    });

    Route::get('/upload', [UploadController::class, 'upload']);

    Route::get('/editprofile', [UserController::class, 'profileedit']);

    Route::post('/updateprofile', [UserController::class, 'editprofile']);

    Route::get('/foto_album/{id}', [UserController::class, 'show'])->name('foto_album');

    Route::get('/ubahpass', function () {
        return view('ubahpassword');
    });

    Route::get('/detailcomment/{id}', function () {
        return view('detailcomment');
    });

    Route::get('/detailcomment/{id}/getdatadetail', [ExploreController::class, 'getdatadetail']);

    Route::get('/profil', [ExploreController::class, 'profile'])->name('profil');

    Route::get('/album', [UserController::class, 'album']);
    Route::get('/album/{id}', [ExploreController::class, 'show'])->name('album.show');


    //changepass
    Route::get('ubahpassword', [ProfileController::class, 'ubahpassword'])->name('ubahpassword');
    //proses update pass
    Route::post('up_password', [ProfileController::class, 'up_password'])->name('up_password');
    //edit profile
    Route::post('editprofil', [ProfileController::class, 'changeprofile'])->name('editprofil');

    //proses upload
    Route::post('/upload_foto', [UploadController::class, 'upload_foto'])->name('upload_foto');
    //proses tambah album
    Route::post('/tambah_album', [UploadController::class, 'tambah_album']);
    // menampilkan hal album
    Route::get('/buatalbum', function () {
        return view('buatalbum');
    });
    //menampilkan jumlah upload
    Route::get('uploaded', [UploadController::class, 'uploaded'])->name('uploaded');
       //delete foto
    Route::delete('/photos/{foto}', [UploadController::class, 'destroyFoto'])->name('photos.destroy');

        // Handle the form submission to update the photo
    Route::put('/edit_upload/{foto}', [UploadController::class, 'updateFoto'])->name('edit_upload.update');

    // Display the edit form
    Route::get('/edit_upload/{foto}/edit', [UploadController::class, 'edit_upload'])->name('edit_upload.edit');

    //proses logout
    Route::post('/logout', LogoutController::class)->name('logout');
});





Route::middleware('guest')->group(function () {
    //proses register
    Route::post('/registered', [UserController::class, 'registered']);
    //proses login
    Route::post('/cek_login', [UserController::class, 'cek_login']);
    //menampilkan hal register
    Route::get('/register', function () {
        return view('register');
    });
    Route::get('/home', function () {
        return view('home');
    });
    //menampilkan hal login
    Route::get('/login', [UserController::class, 'login'])->name('login');

});
