$(function(){
   $("#type").change(function(){
       if($(this).val() != "default") {
           category_request($(this).val().toString(), "section", "#section");
           $(this).next().prop("disabled",false);
       }
       else {
           $(this).next().val("default");
           $(this).next().prop("disabled",true);
       }
   });
   $("#section").change(function(){
       if($(this).val() != "default") {
           category_request($(this).val().toString(), "subcategory", "#subcategory");
           $(this).next().prop("disabled",false);
       }
       else {
           $(this).next().val("default");
           $(this).next().prop("disabled",true);
       }
   });

   $("#generate").click(function(){
       $.ajax({
           beforeSend: function(){$("#list-content").html("");},
           method: "POST",
           url: "ajax.php",
           data: {categ:$("#type").val().toString(), sect:$("#section").val().toString(), subsect:$("#subcategory").val().toString()},
           cache: false,
           success: function(data){$("#list-content").html(data);},
           error: function(){alert("Zoinks!");},
           dataType: "html"
       });
   });

});
