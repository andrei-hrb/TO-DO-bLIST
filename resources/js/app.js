const $document = $(document);
$document.ready(() => {
    const $addButton = $('#addButton');
    const $content = $('#formContent');
    const $tasks = $('#tasks');

    function addTask(text) {
        if ($content.val() !== '') {
            const $snippet = $(`<li class="list-group-item text-black-50 btn-lg text-center mx-auto task" id="task"><a href="#" class="remove">${text}</a></li>`).hide();
            $tasks.append($snippet);
            $snippet.slideDown('slow');
            $content.val('');
        }
    }

    $addButton.on('click', () => {
        addTask($content.val());
    });

    $document.on('keydown', e => {
        if (e.keyCode == 13) addTask($content.val());
    });

    $document.on("click", "a.remove", function () {
        $(this).parent().slideUp('slow', () => {
            $(this).parent().remove();
        });
    });
});