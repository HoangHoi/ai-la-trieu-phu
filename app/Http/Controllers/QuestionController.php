<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Services\QuestionService;
use Carbon\Carbon;

class QuestionController extends Controller
{
    protected $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->middleware('auth');
        $this->middleware('intest')->except(['index']);
        $this->questionService = $questionService;
    }

    public function index(Request $request)
    {
        if (!$request->session()->exists('test')) {
            $this->questionService->makeTest();
        }

        $currentQuestion = session()->get('test.current_question');
        $timeOut = 0;
        $now = Carbon::now();
        $endTime = Carbon::parse(session()->get('end_time', $now->toDateTimeString()));
        if ($endTime->gt($now)) {
            $timeOut = $endTime->diffInSeconds($now);
        }

        return view('question', [
            'question' => $currentQuestion,
            'timeOut' => $timeOut,
        ]);
    }

    public function nextQuestion()
    {

        $question = $this->questionService->nextQuestion();
        return array_except($question->toArray(), ['correct_answer']);
    }

    public function currentQuestion()
    {
        $currentQuestion = session()->get('test.current_question');
        return array_except($currentQuestion->toArray(), ['correct_answer']);
    }

    public function checkAnswer(Request $request)
    {
        $answer = $request->get('answer', null);
        $currentQuestion = session()->get('test.current_question');
        if ($answer == $currentQuestion['correct_answer']) {
            return true;
        }
        return false;
    }

    public function help()
    {
        return 'help';
    }
}
