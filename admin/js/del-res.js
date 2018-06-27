$(function(){
    $(".del-res").each(function() {
        $(this).click(function () {
            $.ajax({
                method: "POST",
                url: "reserv-delete.php",
                data: {id:$(this).data("id")},
                cache: false,
                success: function (data) {
                    alert("success!");
                    setTimeout(function(){location.reload();},1000);
                },
                error: function () {
                    alert("Zoinks!");
                }
            });
        });
    });
});
