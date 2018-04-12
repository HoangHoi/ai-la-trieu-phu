<!DOCTYPE html>
<html lang="{!! app()->getLocale() !!}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="{!! mix('/css/admin.css') !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('admin.includes.navbar')
    @include('admin.includes.form-add')
    <div class="container-fluid">
        @foreach($questions as $question)
            @include('admin.includes.question-item')
        @endforeach
    </div>
    {{-- <script type="text/javascript" src="{!! url('/ckeditor5/ckeditor.js') !!}"></script> --}}
    <script type="text/javascript" src="{!! mix('/js/admin.js') !!}"></script>
</body>

</html>
