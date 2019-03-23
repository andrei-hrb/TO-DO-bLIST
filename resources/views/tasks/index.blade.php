@extends('layouts.master')

@section('title') Tasks @endsection
@section('customText') Do it, <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ Auth::user()->name  }}</a>; please!
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@endsection

@section('main')
    <div class="container">
        <!-- Input Form -->
        <form action="/tasks" method="POST" id="taskSubmitter" autocomplete="off">
            @csrf
            <div class="input-group my-3 input-group-lg mx-auto p-3 active" id="form">
                <input type="text" class="form-control text-black-50 btn-outline-secondary" placeholder="New Task" aria-label="New Task" aria-describedby="button-addon2" id="formContent" name="text" required>
                <div class="input-group-append" id="addButton">
                    <button class="btn btn-lg btn-outline-primary" type="submit">
                        <span id="text">Add</span>
                    </button>
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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

        function encodeHTML(string) {
            return string.replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/"/g, '&quot;');
        }

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
                                ${encodeHTML($content.val())}
                            </a>
                        </li>`).hide();
                    $tasks.append($snippet);
                    $snippet.slideDown('slow');

                    $content.val('');
                }
            });
        }
    </script>
@endsection
