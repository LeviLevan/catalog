$(document).ready(function(){
    $("#send").submit(function() {
            $.ajax({
            type: "POST",
            url:"/books/send",
            data: $(this).serialize()
            }).done(function(){
                alert("Ваше сообщение отпрвлено!");
            });
        return false;
    });
});    