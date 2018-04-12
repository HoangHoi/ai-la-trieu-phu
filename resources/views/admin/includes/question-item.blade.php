<div class="card question-item">
    <div class="card-header">
        Câu {!! $question->id !!}
        ({!! $question->level !!})
        [<a href="{!! route('admin.questions.delete', ['question' => $question->id]) !!}">delete</a>]
    </div>
    <div class="card-body">
        <div class="question-content">
            {!! $question->content !!}
        </div>
        <div class="question-answer">
            <div class="question-answer-item {!! $question->correct_answer == 'a' ? 'question-answer-correct' : '' !!}">A. {!! $question->a !!}</div>
            <div class="question-answer-item {!! $question->correct_answer == 'b' ? 'question-answer-correct' : '' !!}">B. {!! $question->b !!}</div>
            <div class="question-answer-item {!! $question->correct_answer == 'c' ? 'question-answer-correct' : '' !!}">C. {!! $question->c !!}</div>
            <div class="question-answer-item {!! $question->correct_answer == 'd' ? 'question-answer-correct' : '' !!}">D. {!! $question->d !!}</div>
        </div>
    </div>
</div>
