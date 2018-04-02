<!DOCTYPE html>
<!-- saved from url=(0041)http://hilios.github.io/jQuery.countdown/ -->
<html lang="{!! app()->getLocale() !!}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>The Final Countdown - jQuery.countdown</title>
    <link rel="stylesheet" href="{!! mix('/css/app.css') !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div>ten</div>

    <div>
        <div class="main-example">
            <div class="countdown-container" id="main-example"></div>
        </div>
        <script type="text/template" id="main-example-template">
            <div class="time <%= label %>">
                <span class="count curr top"><%= curr %></span>
                <span class="count next top"><%= next %></span>
                <span class="count next bottom"><%= next %></span>
                <span class="count curr bottom"><%= curr %></span>
            </div>
        </script>
    </div>
    <div>
        icon
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
    <script type="text/javascript" src="{!! mix('/js/app.js') !!}"></script>
</body>

</html>