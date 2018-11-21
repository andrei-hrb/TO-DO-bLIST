<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TO DO bLIST</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">

    <!-- Custom style + fonts -->
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Concert+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">

    <link rel="shortcut icon" href="favicon.ico">
</head>

<body>
<div class="container">
    <!-- The text -->
    <h1 id="main-h1" class="my-2 text-center col-sm flex text-black-50">TO DO bLIST</h1>

    <h3 id="main-text" class="my-3 text-center text-black-50">This is what you have to do: </h3>

    <!-- Input Form -->
    <form action="/tasks" method="POST" id="taskSubmitter">
        @csrf
        <div class="input-group my-3 input-group-lg mx-auto p-3 active" id="form">
            <input type="text" class="form-control text-black-50 btn-outline-secondary" placeholder="New Task" aria-label="New Task" aria-describedby="button-addon2" id="formContent" name="text">
            <div class="input-group-append" id="addButton">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add</button>
            </div>
        </div>
    </form>

    <!-- The task list -->
    <ul class="list-group list-group-flush mx-auto w-75" id="tasks">
        @foreach($tasks as $task)
            <li class="list-group-item text-black-50 btn-lg text-center mx-auto task" id="task">
                <a href="#" class="remove">
                    {{ $task->text }}
                </a>
            </li>
        @endforeach
    </ul>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="js/app.js"></script>
</body>

</html>
