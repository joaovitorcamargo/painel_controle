<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        return view('pages.login.index');
    }
    public function auth(LoginUserRequest $request)
    {
        try {

            $user_exist = $this->user->where('email', $request->email)->first();

            if (!$user_exist || !Hash::check($request->password, $user_exist->password)) {
                throw new Exception('Email ou senha inválidos');
            }

            Auth::login($user_exist);
            return redirect()->route('painel.home');
        } catch (Exception $e) {
            return redirect()->route('login.index')->withErrors($e->getMessage());
        }
    }
}
