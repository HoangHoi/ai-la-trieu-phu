<!DOCTYPE html>
<html lang="{!! app()->getLocale() !!}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="stylesheet" href="{!! mix('/css/admin.css') !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('admin.includes.navbar')
    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Điểm</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->questions_count - 1 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <script type="text/javascript" src="{!! url('/js/editor.js') !!}"></script> --}}
    <script type="text/javascript" src="{!! mix('/js/admin.js') !!}"></script>
</body>

</html>
