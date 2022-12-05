function submitData(action) {
    $(document).ready(function() {
        let data = {
            action: action,
            title: $("input[name=title]").val(),
            author: $("input[name=author]").val(),
            image_book: $("input[name=image_book]").val(),
            year: $("input[name=year]").val(),
            genre: $("input[name=genre]").val(),
            description: $("input[name=description]").val()
        };

        $.ajax({
            url: '/app/controllers/_updateBookController.php',
            type: 'put',
            data: data,
            success:function(response) {
                set_status_code(200);
                alert(response);
            }
        });
    });
}