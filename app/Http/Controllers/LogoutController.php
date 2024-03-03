<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        Alert::success('success', 'Logout berhasil!');
        Auth::logout();
        return redirect(RouteServiceProvider::HOME);
    }
}
