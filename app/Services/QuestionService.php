<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Models\Question;
use Exception;
use Carbon\Carbon;

class QuestionService
{
    public function makeTest()
    {
        $beginTime = Carbon::now();
        $endTime = $beginTime->addMinutes(config('test.time_out'))->toDateTimeString();
        session()->put('end_time', $endTime);
        $question = $this->nextQuestion();
    }

    public function nextQuestion()
    {
        $test = session()->get('test', $this->getDefaultTest());
        $nextQuestionNumber = $test['current_question']['number'] + 1;
        $questionsExcept = $test['questions_answered'];
        if ($test['current_question']['data']) {
            $questionsExcept[] = $test['current_question']['data']['id'];
        }

        $nextQuestionLevel = config('question.level')[$nextQuestionNumber];
        $nextQuestion = $this->randomQuestion($nextQuestionLevel, $questionsExcept);
        if (!$nextQuestion) {
            throw new Exception('Can not get question');
        }

        $test = [
            'current_question' => [
                'number' => $nextQuestionNumber,
                'data' => $nextQuestion->toArray(),
            ],
            'questions_answered' => $questionsExcept,
        ];
        session()->put('test', $test);
        return $nextQuestion;
    }

    public function randomQuestion($level, $except = [])
    {
        return Question::where('level', $level)
            ->whereNotIn('id', $except)
            ->inRandomOrder()
            ->first();
    }

    public function getDefaultTest()
    {
        return [
            'current_question' => [
                'number' => 0,
                'data' => null,
            ],
            'questions_answered' => [],
        ];
    }
}
