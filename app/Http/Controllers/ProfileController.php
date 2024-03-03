<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $tampilUpload = foto::with('album')->where('id_users', auth()->user()->id)->get();
        $profile = User::where('id', auth()->user()->id)->first();
        return view('profile', compact('profile', 'tampilUpload'));
    }
    public function editprofil()
    {
        return view('editprofile');
    }
    public function changepassword()
    {
        return view('ubahpassword');
    }
    public function changeprofile(Request $request)
    {
        // Validation rules
        $rules = [
            'nama_lengkap' => 'required|string|max:255',
            'no_telepon' => 'numeric|digits:12',
            // Added min:12 validation
            'username' => 'required|string|email|max:255',

            'alamat' => 'nullable|string|max:255',
            'profile' => 'image|mimes:jpeg,png,jpg,gif,bmp,webp|max:2048', // Assuming it's an image file
        ];

        // Validate the request data
        $request->validate($rules);

        // Inisialisasi array dataToUpdate
        $dataToUpdate = [];

        // Check if a file is present in the request
        if ($request->hasFile('profile')) {
            // Logika penyimpanan foto sesuai kebutuhan Anda
            $filename = pathinfo($request->profile, PATHINFO_FILENAME);

            $extension = $request->profile->getClientOriginalExtension();
            $namafoto = 'profile' . time() . '.' . $extension;
            $request->profile->move('profile', $namafoto);

            // Update the 'profile' field only if a file is uploaded
            $dataToUpdate['profile'] = $namafoto;
        }
        // Update data lainnya
        $dataToUpdate += [
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'alamat' => $request->alamat,
            'profile' => $namafoto
        ];

        //proses update
        User::where('id', auth()->user()->id)->update($dataToUpdate);

        return redirect('/profil')->with('success', 'Profile berhasil diperbarui');
    }


    public function up_password(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $dataToUpdate = [
            'password' => bcrypt($request->input('new_password')),
        ];

        $user->update($dataToUpdate);

        return redirect('profil')->with('success', 'Password Berhasil Diubah!');
    }
}
