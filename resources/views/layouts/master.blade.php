<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TO DO bLIST -@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom style + fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Concert+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">

    <style>
        body {
            background-color: #a1dac7;
        }

        #main-h1,
        #main-text,
        a.text{
            font-family: "Concert One", serif;
        }

        #formContent,
        #button-addon2,
        #task{
            font-family: "Lato";
            background-color: #a1dac7;
        }

        #text {
            font-family: "Lato";
        }

        #main-h1 {
            font-size: 15vmin;
        }

        #main-text {
            font-size: 5vmin;
        }

        a,
        a:hover {
            text-decoration: none;
            color: #6b757e;
        }

        a.remove:hover,
        a.logout:hover {
            text-decoration: line-through;
        }

        a.remove {
            font-family: "Lato";
        }

        a#text,
        label#text,
        span#text{
            color: #6b757e;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus,
        .btn-outline-primary{
            background-color: #a1dac7;
            border: 1px #6b757e solid;
        }

        .btn-outline-primary:hover{
            background-color: #6b757e;
            border: 1px #a1dac7 solid;
        }

        .btn-outline-primary:hover > span#text {
            color: #a1dac7;
        }

        .selected {
             text-decoration: underline;
        }

        .selected:hover {
            text-decoration: underline;
        }
    </style>

    <link rel="shortcut icon" href="favicon.ico">
</head>

<body>
<!-- The text -->
<h1 id="main-h1" class="my-2 text-center col-sm flex text-black-50">TO DO bLIST</h1>
@if(Request::path() === 'login' || Request::path() === 'register')
    <h3 id="main-text" class="my-3 text-center text-black-50">
        <a href="@yield('loginLink')" class="@yield('login')">Login</a> <span id="text">/</span> <a href="@yield('registerLink')" class="@yield('register')">Register</a>
    </h3>
@else
    <h3 id="main-text" class="my-3 text-center text-black-50">@yield('customText')</h3>
@endif

@yield('main')

<footer class="container text-center mt-5 mb-2"><small class="text-muted" id="text">&copy; Copyright {{ Carbon\Carbon::now()->year }}, <a href="https://github.com/andrei-hrb">Hîrbu Andrei</a></small></footer>

<!-- Bootstrap's reqs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>