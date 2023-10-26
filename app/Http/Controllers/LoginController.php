<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function auth(Request $request){
        $credenciais = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required']
        ],
        [
            'email.required' => 'O campo e-mail é obrigatorio',
            'email.email' => 'O email não é valido',
            'password.required' => 'O campo senha é obrigatoria'
        ]
        );

        if(Auth::attempt($credenciais, $request->remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        } else {
            return redirect()->back()->with('error', 'Usuario ou senha invalida.');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('site.index'));
    }

    public function create(){
        return view('login.create');
    }
}
