<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function session()
    {
        return 'session';
    }

    public function register(RegisterRequest $request) {
        $user = $this->create($request->all());
        Auth::login($user);
        return redirect()->route('home');
    }

    public function logout() {
        return 'logout';
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'school' => $data['school'],
            'phone_number' => $data['phone_number'],
            'birth_year' => $data['birth_year'],
        ]);
    }
}
