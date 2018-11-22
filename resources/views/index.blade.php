<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TO DO bLIST</title>

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
        #main-text {
            font-family: "Concert One", serif;
        }

        #formContent,
        #button-addon2,
        #task {
            font-family: "Lato";
            background-color: #a1dac7;
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
            font-family: "Lato";
            color: #6b757e;
        }

        a:hover {
            text-decoration: line-through;
        }
    </style>

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
            <input type="text" class="form-control text-black-50 btn-outline-secondary" placeholder="New Task" aria-label="New Task" aria-describedby="button-addon2" id="formContent" name="text" required>
            <div class="input-group-append" id="addButton">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add</button>
            </div>
        </div>
    </form>

    <!-- The tasks list -->
    <ul class="list-group list-group-flush mx-auto w-75" id="tasks">
        @foreach($tasks as $task)
            <li class="list-group-item text-black-50 btn-lg text-center mx-auto task" id="task">
                <a href="#" class="remove" onclick="$.ajax({type: 'delete', url: '/tasks/{{ $task->id }}', headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}, success: () => {$(this).parent().slideUp('slow', () => {$(this).parent().remove();});}});">
                    {{ $task->text }}
                </a>
            </li>
        @endforeach
    </ul>
</div>

<!-- Bootstrap's reqs -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<script>
    //variables declarations
    const $document = $(document);
    const $addButton = $('#addButton');
    const $content = $('#formContent');
    const $tasks = $('#tasks');
    const $submitter = $('#taskSubmitter');
    const $button = $('a.remove');


    $submitter.submit(e => { // stopping the form from submitting
        e.preventDefault();
    });

    $button.on('click', e => { // stopping the anchor tag from going to the top of the page
        e.preventDefault();
    });

    $addButton.on('click', () => { // add task by clicking the button
        addTask();
    });

    $document.on('keydpress', e => { // add task by pressing enter
        if (e.keyCode == 13) addTask();
    });

    function addTask() { // add task logic
        $.ajax({
            type: 'post',
            url: '/tasks',
            data: $content.serialize(),
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            success: (response) => {
                const $snippet = $(
                    `<li class="list-group-item text-black-50 btn-lg text-center mx-auto task" id="task">
                            <a href="#" class="remove" onclick="$.ajax({type: 'delete', url: '/tasks/${response}', headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}, success: () => {$(this).parent().slideUp('slow', () => {$(this).parent().remove();});}});">
                                ${$content.val()}
                            </a>
                        </li>`).hide();
                $tasks.append($snippet);
                $snippet.slideDown('slow');

                $content.val('');
            }
        });
    }
</script>
</body>

</html>
