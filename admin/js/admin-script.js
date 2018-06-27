function category_request(action, category, element){
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
    $("#m-list").click(function(){
        category_request("list","menu","#content");
    });
    $("#m-add").click(function(){
        category_request("add","menu","#content")
    });
    $("#r-list").click(function(){
        category_request("list","reservations","#content")
    });
    $("#r-add").click(function(){
        category_request("add","reservations","#content")
    });
});
