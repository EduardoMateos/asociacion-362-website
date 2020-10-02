<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    /**
     * Muestra el login del admin
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function auth(){
        return view('admin.auth.login');
    }

    public function authCheck(Request $request){
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.home.show');
        }

        return back()->with('Credenciales invalidas');
    }



}
