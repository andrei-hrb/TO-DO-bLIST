const $document = $(document);
$document.ready(() => {
    const $addButton = $('#addButton');
    const $content = $('#formContent');
    const $tasks = $('#tasks');

    $('#taskSubmitter').submit(e => {
        e.preventDefault();
    });

    function addTask(text) {
        if ($content.val() !== '') {
            $.ajax({
                type: 'post',
                url: '/tasks',
                data: $content.serialize(),
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: () => {
                    const $snippet = $(`<li class="list-group-item text-black-50 btn-lg text-center mx-auto task" id="task"><a href="#" class="remove">${text}</a></li>`).hide();
                    $tasks.append($snippet);
                    $snippet.slideDown('slow');

                    $content.val('');
                }
            });
        }
    }

    $addButton.on('click', () => {
        addTask($content.val());
    });

    $document.on('keydpress', e => {
        if (e.keyCode == 13) addTask($content.val());
    });

    $document.on("click", "a.remove", e => {
        e.preventDefault();

        $(this).parent().slideUp('slow', () => {
            $(this).parent().remove();
        });
    });
});