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
            <div class="col-lg-2 col-md-3">
                <div class="d-flex flex-column-reverse question-list">
                    @for($i = 1; $i < 4; $i++)
                        @for($j = ($i - 1)*5 + 1; $j <= $i*5; $j++)
                            <div class="d-flex align-items-center question-item" id="question_{!! $j !!}">
                                <span><i class="fa fa-file-code-o" aria-hidden="true"></i> Câu {!! $j !!}</span>
                            </div>
                        @endfor
                        <div class="d-flex align-items-center question-group" id="group_question_{!! $i !!}">
                            <span><i class="fa fa-folder-open" aria-hidden="true"></i> Gói câu hỏi {!! $i !!}</span>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="col-lg-10 col-md-9 content-container" style="background-image: url(images/bg2.jpg)">
                <div class="content" >
                    <div class="d-flex justify-content-end p-3">
                        <div class="" style="width: 136px">
                            <div class="countdown">
                                <div class="countdown-container" id="countdown"></div>
                            </div>
                            <script type="text/template" id="countdown-template">
                                <div class="time <%= label %>">
                                    <span class="count curr top"><%= curr %></span>
                                    <span class="count next top"><%= next %></span>
                                    <span class="count next bottom"><%= next %></span>
                                    <span class="count curr bottom"><%= curr %></span>
                                </div>
                            </script>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center title-name">
                        <span>Triệu phú IT</span>
                    </div>
                    <div class="question-container p-4">
                        <div class="question-content">
                            Nhiều khi anh mong được một lần nói ra hết tất cả thay vì,
                            Ngồi lặng im nghe em kể về anh ta bằng đôi mắt lấp lánh
                            Đôi lúc em tránh ánh mắt của anh
                            Vì dường như lúc nào em cũng hiểu thấu lòng anh.
                            Ko thể ngắt lời, càng ko thể để giọt lệ nào đc rơi
                        </div>
                        <div class="d-flex flex-wrap question-answer">
                            <div class="question-answer-item">
                                <span>A. Đáp án 1</span>
                            </div>
                            <div class="question-answer-item">
                                <span>B. Đáp án 2</span>
                            </div>
                            <div class="question-answer-item">
                                <span>C. Đáp án 3</span>
                            </div>
                            <div class="question-answer-item">
                                <span>D. Đáp án 4</span>
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
    <script type="text/javascript" src="{!! mix('/js/app.js') !!}"></script>
</body>

</html>
