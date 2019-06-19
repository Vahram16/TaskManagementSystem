$(document).ready(function () {
    $('.user').on('change', function () {
        var taskId = $(this).data('id');
        var value = $(this).val();
        console.log(value);
        $.ajax({
            type: "POST",
            url: '/dashboard/assign-task',
            data: {
                value: value,
                id: taskId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
            }
        });

    });
});