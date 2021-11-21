<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function register(RegisterUserRequest $request)
    {
        try {
            $user_email_exist = $this->user->where('email', $request->email)->select('email')->first();

            if ($user_email_exist) {
                throw new Exception('Email já registrado');
            }

            Auth::check();

            $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message', 'Usuário registrado com sucesso');
        } catch (Exception $e) {
            return redirect()->route('login.index')->withErrors($e->getMessage());
        }
    }
}
