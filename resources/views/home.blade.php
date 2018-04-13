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
            <div class="col-lg-12 home-content-container" style="background-image: url(images/bg1.jpg); ">
                <div class="content" style="padding-top: 2vh; padding-bottom: 5vh">
                    @include('includes.title')
                    @guest
                        @include('includes.info')
                        @include('includes.modal-register')
                    @endguest
                    @auth
                        @include('includes.game-rule')
                    @endauth
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
