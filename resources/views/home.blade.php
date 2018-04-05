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
            <div class="col-lg-12 content-container" style="background-image: url(images/bg1.jpg)">
                <div class="content" style="padding-top: 10vh">
                    @include('includes.title')
                    <div class="info-container">
                        <div class="info">
                            <span>
                                Nhiều khi anh mong được một lần nói ra hết tất cả thay vì,
                                Ngồi lặng im nghe em kể về anh ta bằng đôi mắt lấp lánh
                                Đôi lúc em tránh ánh mắt của anh
                                Vì dường như lúc nào em cũng hiểu thấu lòng anh.
                                Ko thể ngắt lời, càng ko thể để giọt lệ nào đc rơi
                            </span>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="start-button" data-toggle="modal" data-target="#modal-register">
                                <span>Đăng kí ngay!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row-reverse align-items-center footer">
        <span>Framgia © 2018</span>
    </div>
    @include('includes.modal-register')
    <script type="text/javascript" src="{!! mix('/js/app.js') !!}"></script>
</body>

</html>
