<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{

    public function registered(Request $request)
    {
        //pesan
        $messages = [
            'user.required'     => 'Username wajib diisi',
            'username.unique'   => 'Username sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min'      => 'Password minimal 8 karakter',
            'email.required'    => 'Email wajib diisi',
            'email.unique'      => 'Email sudah terdaftar',
        ];
        //validasi
        $request->validate([
            'username'     => 'required',
            'password'     => 'required|min:8',
            'email'        => 'required|unique:users,email',
        ], $messages);

        // $datastore = [
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ];
        // Membuat profil otomatis
        $newProfile = 'users.png'; // Nama file gambar profil default

        // Membuat pengguna baru
        $user = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
            'profile' => $newProfile, // Simpan nama file gambar profil
        ]);

        // Menyimpan file profil default ke storage
        $defaultProfilePath = public_path('profile/' . $newProfile);
        copy(public_path('profile/users.png'), $defaultProfilePath);
        // Alert::success('Registrasi berhasil', 'Anda telah berhasil registrasi');
        // return redirect('register');

        // User::create($datastore);
        return  redirect('/login')->with('success', 'berhasil registrasi');
    }

    public function cek_login(Request $request)
    {
        //  $request->validate([
        //      'username' => 'required',
        //      'password'  => 'required'
        //  ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect('/index')->with('success', 'anda berhasil login');
        } else {
            return redirect('/login')->with('error', 'gagal login');
        }
    }

    public function ubahpassword(Request $request)
    {
        $dataUpdate = [
            'password'  => bcrypt($request->textPassword),
        ];
        user::where('id', auth()->user()->id)->update($dataUpdate);
        return redirect('/ubahpassword');
    }

    // public function profile(Request $request)
    // {
    // return view('/profile');
    // }
    public function profileedit()
    {
        $data = [
            'dataprofile'   => User::where('id', auth()->user()->id)->first()
        ];
        return view('editprofile', $data);
    }

    public function editprofile(Request $request)
    {

        // Validation rules
        $rules = [
            'nama_lengkap' => 'required|string|max:255',
            'no_telepon' => 'numeric|digits:12',
            // Added min:12 validation
            'username' => 'required|string|max:255',
            
            'bio' => 'required|string|max:255',


            'alamat' => 'nullable|string|max:255',
            'profile' => 'image|mimes:jpeg,png,jpg,gif,bmp,webp|max:2048', // Assuming it's an image file
        ];

        // Validate the request data
        $request->validate($rules);

        // Inisialisasi array data$dataUpdate
        $dataUpdate = [];

        // Check if a file is present in the request
        if ($request->hasFile('profile')) {
            // Logika penyimpanan foto sesuai kebutuhan Anda
            $filename = pathinfo($request->profile, PATHINFO_FILENAME);

            $extension = $request->profile->getClientOriginalExtension();
            $namafoto = 'profile' . time() . '.' . $extension;
            $request->profile->move('profile', $namafoto);

            // Update the 'profile' field only if a file is uploaded
            $dataUpdate['profile'] = $namafoto;
        }
        $dataUpdate = [
            'nama_lengkap'        => $request->nama_lengkap,
            'username'            => $request->username,
            'alamat'              => $request->alamat,
            'bio'              => $request->bio,
            'profile'             => $namafoto,
        ];
        //Proses Update Data
        user::where('id', auth()->user()->id)->update($dataUpdate);
        return redirect('/profil')->with('success', 'Edit Profile berhasil');
    }
    public function show($id)
    {
        $album = album::with('foto')->findOrFail($id);
        return view('foto_album', compact('album'));
    }
    public function album()
    {
        $tampilAlbum = album::with('foto')->where('id_users', auth()->user()->id)->get();
        return view('album', compact('tampilAlbum'));
    }
    public function login(){
        return view('login');
    }
}
