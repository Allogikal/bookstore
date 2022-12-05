function submitData(action) {
    $(document).ready(function() {
        let data = {
            action: action,
            login: $("input[name=login]").val(),
            password: $("input[name=password]").val()
        };

        $.ajax({
            url: '/app/controllers/autorizationController.php',
            type: 'post',
            data: data,
            success:function(response) {
                set_status_code(200);
                alert(response);
            }
        });
    });
}