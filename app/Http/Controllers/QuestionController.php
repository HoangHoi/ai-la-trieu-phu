<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('question');
    }

    public function start()
    {
        return 'start';
    }

    public function nextQuestion()
    {
        return 'nextQuestion';
    }

    public function currentQuestion()
    {
        return 'currentQuestion';
    }

    public function checkAnswer()
    {
        return 'checkAnswer';
    }

    public function help()
    {
        return 'help';
    }
}
