<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'school' => 'unknown',
            'phone_number' => '0987654321',
            'birth_year' => '2222',
            // 'school' => $data['school'],
            // 'phone_number' => $data['phone_number'],
            // 'birth_year' => $data['birth_year'],
        ]);
    }
}
