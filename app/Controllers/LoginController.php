<?php

namespace App\Controllers;

use App\Core\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login($request)
    {
        $user = $this->builder->table('users')
            ->where('email', '=', $request->post('email'))
            ->limit(1)
            ->first();

        if (password_verify($request->post('password'), $user['password'])) {
            Auth::login($user);
        }

        return redirect('/');
    }
} 