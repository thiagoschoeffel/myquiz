<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login.index', [
            'message' => $request->session()->get('message')
        ]);
    }

    public function process(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!Auth::attempt($data)) {
            return redirect()->route('login');
        }

        $request->session()->flash('message', [
            'type' => 'success',
            'text' => "Seja bem-vindo ao MyQuiz."
        ]);

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->flash('message', [
            'type' => 'success',
            'text' => "Obrigado por utilizar o MyQuiz, volte logo!"
        ]);

        return redirect()->route('login');
    }
}
