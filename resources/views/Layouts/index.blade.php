<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    @stack('css-include')
</head>

<body style="background-color:blue">
    <nav class="navbar navbar-light bg-light">
        <p class="display-6 ms-3">NotesApp</p>
    </nav>
    @yield('content')

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/datatables.min.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    @stack('scripts-include')
</body>

</html>