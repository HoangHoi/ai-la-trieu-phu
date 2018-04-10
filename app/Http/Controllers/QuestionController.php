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
        // $this->middleware('auth');
        // $this->middleware('intest')->except(['index']);
        // $this->middleware('timeout')->except(['index']);
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
        if (!session()->get('test.current_question.answer_is_correct', false)) {
            return response()->json(['status' => 'cant_continue'], 400);
        }

        $currentQuestionNumber = session()->get('test.current_question.number');
        if ($currentQuestionNumber >= config('question.max')) {
            return response()->json(['status' => 'question_max'], 400);
        }

        $question = $this->questionService->nextQuestion()->toArray();
        $question['number'] = session()->get('test.current_question.number');
        return array_except($question, ['correct_answer']);
    }

    public function currentQuestion()
    {
        $currentQuestion = session()->get('test.current_question');
        return array_except($currentQuestion->toArray(), ['correct_answer']);
    }

    public function checkAnswer(Request $request)
    {
        // $currentAnswer = session()->get('test.current_question.answer');
        $currentAnswer = null;
        if (!$currentAnswer) {
            $currentAnswer = $request->get('answer', null);
            if (!$currentAnswer) {
                return response()->json(['status' => 'incorrect', 'choose' => $currentAnswer]);
            }

            session()->put('test.current_question.answer', $currentAnswer);
            $this->saveAnswer($request->user());
        }

        $currentQuestion = session()->get('test.current_question');
        if ($currentAnswer == $currentQuestion['data']['correct_answer']) {
            session()->put('test.current_question.answer_is_correct', true);
            return response()->json(['status' => 'correct', 'choose' => $currentAnswer]);
        }

        session()->put('test.current_question.answer_is_correct', false);
        return response()->json(['status' => 'incorrect', 'choose' => $currentAnswer]);
    }

    public function help()
    {
        return 'help';
    }

    protected function saveAnswer($user)
    {
        $now = Carbon::now()->toDateTimeString();
        $questionId = session()->get('test.current_question.data.id');
        $user->questions()->attach($questionId, [
            'answer' => session()->get('test.current_question.answer'),
            'order_number' => session()->get('test.current_question.number'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
