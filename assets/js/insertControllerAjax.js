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
            url: '/app/controllers/insertBookController.php',
            type: 'post',
            data: data,
            success:function(response) {
                alert(response);
            }
        });
    });
}