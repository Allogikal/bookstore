function submitData(action) {
    $(document).ready(function(e) {
        e.preventDefault();
        let data = {
            action: action,
            rate: $("input[name=rating]").val(),
            rate_count: $("input[name=rate_count]").val()
        };

        $.ajax({
            url: '/app/controllers/_addRatingController.php',
            type: 'post',
            data: data,
            success:function(response) {
                alert(data);
                set_status_code(200);
                alert(response);
            }
        });
    });
}