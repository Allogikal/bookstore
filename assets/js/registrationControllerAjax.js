function submitData(action) {
    $(document).ready(function() {
        let data = {
            action: action,
            login: $("input[name=login]").val(),
            password: $("input[name=password]").val(),
            password_confirm: $("input[name=password_confirm]").val(),
        };

        $.ajax({
            url: '/app/controllers/registrationController.php',
            type: 'post',
            data: data,
            success:function(response) {
                set_status_code(200);
                alert(response);
            }
        });
    });
}