<!DOCTYPE html>
<html lang="{!! app()->getLocale() !!}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>The Final Countdown - jQuery.countdown</title>
    <link rel="stylesheet" href="{!! mix('/css/app.css') !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="d-flex flex-row-reverse align-items-center header">
        <span>Hoàng Hữu Hợi</span>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-3 question-list-container">
                @include('includes.question-list')
            </div>
            <div class="col-lg-10 col-md-9 content-container" style="background-image: url(images/bg2.jpg)">
                <div class="content" >
                    @include('includes.countdown')
                    @include('includes.title')
                    @include('includes.question')
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row-reverse align-items-center footer">
        <span>Framgia © 2018</span>
    </div>
    <script type="text/javascript" src="{!! mix('/js/app.js') !!}"></script>
</body>

</html>