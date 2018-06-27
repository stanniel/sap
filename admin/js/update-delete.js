$(function(){
   $(".update").each(function() {
       $(this).click(function () {
           $("#myModal").modal("show");
           $("#id").val($(this).data("id"));
           $("#name").val($(this).prev().children(":first-child").data("id"));
           $("#description").val($(this).prev().children(":first-child").next().data("id"));

       });
   });

   $("#update-form").submit(function(e){
       e.preventDefault();
       $.ajax({
           method: "POST",
           url: "menu-update.php",
           data: $(this).serialize(),
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

   $(".delete").each(function() {
       $(this).click(function () {
           $.ajax({
               method: "POST",
               url: "menu-delete.php",
               data: {id: $(this).data("id")},
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
