<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.index', ['title' => 'Login', 'active' => 'login']);
    }

    protected function redirectTo()
    {
        $role = Auth::user()->role;

        if ($role == 'Admin') {
            return route('dashboard');
        } elseif ($role == 'Petugas Masuk 1') {
            return route('pmasuk1');
        } elseif ($role == 'Petugas Ruang 1') {
            return route('pruang1');
        } elseif ($role == 'Petugas Keluar 1') {
            return route('pkeluar1');
        } elseif ($role == 'Petugas Masuk 2') {
            return route('pmasuk2');
        } elseif ($role == 'Petugas Ruang 2') {
            return route('pruang2');
        } elseif ($role == 'Petugas Keluar 2') {
            return route('pkeluar2');
        } elseif ($role == 'Petugas Masuk 3') {
            return route('pmasuk3');
        } elseif ($role == 'Petugas Ruang 3') {
            return route('pruang3');
        } elseif ($role == 'Petugas Keluar 3') {
            return route('pkeluar3');
        } else {
            return route('login');
        }
    }

    public function authenticate(Request $request) {
        
        $credentials = $request -> validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended($this->redirectTo());
        }

        return back()->with('loginError', 'Login Failed');

        //dd('berhasil');
    }

    public function logout(request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/');
    }
}
