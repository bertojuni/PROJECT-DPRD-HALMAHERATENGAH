<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //

    public function index() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // return redirect('/dashboard');
            dd('success');
        }
        dd('error');

        return back()->withErrors([
            'email' => 'Credentials invalid'
        ]);

    }

    public function register(Request $request) {
        $data = [
            'user_nama' => $request->user_nama,
            'user_username' => $request->user_username,
            'user_password' => $request->user_password,
            'user_level' => $request->user_level,
            'user_foto' => $request->user_foto
        ];

        $rules = [
            'user_name' => 'required',
            'user_username' => 'required',
            'user_password' => 'required',
            'user_level' => 'required',
        ];

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            return redirect('/login')->withErrors($validator);
        }

        User::insert($data);

        return redirect('/login')->with('success', 'success add data user!');

    }

}
