<!DOCTYPE html>
<html lang="{!! app()->getLocale() !!}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>The Final Countdown - jQuery.countdown</title>
    <link rel="stylesheet" href="{!! mix('/css/app.css') !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('includes.nav')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-3 question-list-container">
                @include('includes.question-list')
            </div>
            <div class="col-lg-10 col-md-9 content-container" style="background-image: url(images/bg2.jpg)">
                <div class="content" >
                    @include('includes.countdown')
                    {{-- @include('includes.title') --}}
                    @include('includes.question')
                    {{-- @include('includes.time-over') --}}
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row-reverse align-items-center footer">
        <span>Framgia © 2018</span>
    </div>
    <div class="result" id="result">
        <div class="result-body">
            <span id="result-content">Chính xác</span>
        </div>
    </div>
    <canvas id="firework"></canvas>
    <script type="text/javascript">
        var canContinue = {!! $canContinue !!};
        var timeOut = '{!! $timeOut or '' !!}';
        var answerUrl = '{!! route('questions.checkAnswer') !!}';
        var homeUrl = '{!! route('home') !!}';
        var nextQuestionUrl = '{!! route('questions.nextQuestion') !!}';
        var maxQuestion = {!! config('question.max') !!};
        var questionNumber = '{!! $question['number'] !!}';
    </script>
    <script type="text/javascript" src="{!! mix('/js/app.js') !!}"></script>
</body>

</html>
