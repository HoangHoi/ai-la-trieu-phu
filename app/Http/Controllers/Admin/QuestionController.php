<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
// use App\Services\QuestionService;
use Carbon\Carbon;
use App\Models\Question;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    // protected $questionService;

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('intest')->except(['index']);
        // $this->middleware('timeout')->except(['index']);
        // $this->questionService = $questionService;
    }

    public function index(Request $request)
    {
        $questions = Question::all();

        return view('admin.question', [
            'questions' => $questions,
        ]);
    }

    public function store(QuestionRequest $request)
    {
        $questions = Question::create($request->all());

        return redirect()->route('admin.questions.index');
    }

    public function update(Question $question, QuestionRequest $request)
    {
        $questions = Question::create($request->all());

        return redirect()->route('admin.questions.index');
    }

    public function delete(Question $question)
    {
        $question->delete();

        return redirect()->route('admin.questions.index');
    }
}
