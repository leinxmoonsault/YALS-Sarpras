<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function LoginAdmin()
    {
        # code...
        return view('backend.login');
    }

    public function ProsesLoginAdmin(Request $request)
    {
        # code...
        request()->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $data = Auth::user();
            if ($data->role == 'Admin') {
                # code...
                return redirect()->intended('YALS/Administrator/Home');
            }elseif ($data->role == 'Guru') {
                # code...
                return redirect()->intended('YALS/Guru/Home');
            }
        }

        return redirect('YALS/Administrator/Login');
    }
    
    public function LogoutAdmin(Request $request)
    {
        # code...
        Auth::logout();
        return redirect('YALS/Administrator/Login');
    }

}
