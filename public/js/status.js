$(document).ready(function () {
    $('.status').on('change', function () {
        var taskId = $(this).data('id');
        var value = $(this).val();
        console.log(taskId);
        $.ajax({
            type: "POST",
            url: 'dashboard/change-status',
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