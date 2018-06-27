function category_request1(action, category, element){
    $.ajax({
        beforeSend: function(){$(element).html("");},
        method: "POST",
        url: "ajax.php",
        data: {action:action, category:category},
        cache: false,
        success: function(data){$(element).html(data);},
        error: function(){alert("Zoinks!");},
        dataType: "html"
    });
}

$(function(){
    $('#myModal').on('show.bs.modal', function() {
        category_request1("add","reservations",".modal-body");
    });

    $(".food").each(function(){
       $(this).click(function(e){
           e.preventDefault();
           $.ajax({
               beforeSend: function(){$("#db").html("");},
               method: "POST",
               url: "ajax.php",
               data: {action:$(this).attr("id"), category:"db"},
               cache: false,
               success: function(data){$("#db").html(data);},
               error: function(){alert("Zoinks!");},
               dataType: "html"
           });
       });
    });

    $(".col-sm-4 a .thumbnail").each(function(){
        $(this).click(function(e){
            e.preventDefault();
        });
    });
});

