<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return redirect()->route('admin.questions.index');
    }

    public function result(Request $request)
    {
        return view('admin.result', [
            'users' => User::withCount('questions')->get(),
        ]);
    }
}
