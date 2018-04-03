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
            <div class="col-md-4">
                <div class="d-flex flex-column-reverse question">
                    @for($i = 1; $i < 4; $i++)
                        @for($j = ($i - 1)*5 + 1; $j <= $i*5; $j++)
                            <div class="d-flex align-items-center question-item" id="question_{!! $j !!}">
                                <span>Câu {!! $j !!}</span>
                            </div>
                        @endfor
                        <div class="d-flex align-items-center question-group" id="group_question_{!! $i !!}">
                            <span>Gói câu hỏi {!! $i !!}</span>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="col-md-8">
                <div class="d-flex justify-content-start">
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
                <div>
                    Noi dung cau hoi Noi dung cau hoi Noi dung cau hoi Noi dung cau hoi Noi dung cau hoi Noi dung cau hoi
                </div>
                <div>
                    <ul>
                            <Li>
                                A. Dap an 1
                            </Li>
                            <Li>
                                B. Dap an 2
                            </Li>
                            <Li>
                                C. Dap an 3
                            </Li>
                            <Li>
                                D. Dap an 4
                            </Li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{!! mix('/js/app.js') !!}"></script>
</body>

</html>
