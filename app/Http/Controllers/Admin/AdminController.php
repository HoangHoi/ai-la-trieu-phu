<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Question;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return redirect()->route('admin.questions.index');
    }
}
