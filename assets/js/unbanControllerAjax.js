function submitData(action) {
    $(document).ready(function() {
        let data = {
            action: action,
            id: $("input[name=id]").val()
        };

        $.ajax({
            url: '/app/controllers/_unbanController.php',
            type: 'post',
            data: data,
            success:function(response) {
                set_status_code(200);
                alert(response);
            }
        });
    });
}