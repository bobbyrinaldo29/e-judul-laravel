<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ThnAjaran;
use App\Models\TblProdi;
use App\Models\TblListJudul;
use App\Models\TblPengajuan;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;


class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return redirect('login')->withErrors('Email Atau Password Salah');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'prodi' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect('login')->withSuccess('Silahkan Login');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'prodi' => $data['prodi'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            $pengaju = TblPengajuan::all();
            $list = ThnAjaran::all();
            $userCount = User::count();
            $listCount = TblListJudul::count();
            $prodiCount = TblProdi::count();
            $pengajuCount = TblPengajuan::count();
            return view('admin.dashboard', compact('userCount', 'list', 'listCount', 'pengaju', 'pengajuCount', 'prodiCount'));
        }

        return redirect('login')->withErrors('Silahkan Login Terlebih Dahulu');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
