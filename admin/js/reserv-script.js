$(function() {
    var error = {
        name_error:true,
        date_error:true,
        table_error:true,
        time_error:true,
        contact_phone_error:true,
        contact_phone_error2:false,
        contact_email_error:true,
        contact_email_error2:false
    };


    $("#table").change(function(){
        if ($(this).val() != "default") {
            $.ajax({
                beforeSend: function(){$("#time").html("");},
                method: "POST",
                url: "ajax.php",
                data: {action:$(this).val().toString(), category:"time", date:$("#date").val().toString()},
                cache: false,
                success: function(data){$("#time").html(data);},
                error: function(){alert("Zoinks!");},
                dataType: "html"
            });
            $("#time").prop("disabled", false);
            error.table_error = false;
            $("#table_error").css("display","none");
        }
        else {
            $("#time").val("default");
            $("#time").prop("disabled", true);
            $("#time_error").css("display","none");
            error.table_error = true;
            $("#table_error").css("display","block");
        }
    });

    $("#time").change(function(){
        if($(this).val()!="default"){
            error.time_error = false;
            $("#time_error").css("display","none");
        }
        else {
            error.time_error = true;
            $("#time_error").css("display","block");
        }
    });


    $( "#date" ).datepicker({ minDate: 1, maxDate: "+2M", dateFormat:"yy-mm-dd"});

    $("#contact_phone").keyup(function(){
        var regex = /^\b06([0-5]|9)[/]?\d{4}[-]?\d{2,3}\b$/;
        if($(this).val() == ""){
            error.contact_phone_error = true;
            $("#contact_phone_error").css("display","block");
            error.contact_phone_error2 = false;
            $("#contact_phone_error2").css("display","none");
        }
        else if(regex.test($(this).val())){
            error.contact_phone_error2 = false;
            $("#contact_phone_error2").css("display","none");
            error.contact_phone_error = false;
            $("#contact_phone_error").css("display","none");
        }
        else {
            error.contact_phone_error2 = true;
            $("#contact_phone_error2").css("display","block");
            error.contact_phone_error = false;
            $("#contact_phone_error").css("display","none");
        }

    });

    $("#contact_email").keyup(function(){
        var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if($(this).val() == ""){
            error.contact_email_error = true;
            $("#contact_email_error").css("display","block");
            error.contact_email_error2 = false;
            $("#contact_email_error2").css("display","none");
        }
        else if(regex.test($(this).val())){
            error.contact_email_error2 = false;
            $("#contact_email_error2").css("display","none");
            error.contact_email_error = false;
            $("#contact_email_error").css("display","none");
        }
        else {
            error.contact_email_error2 = true;
            $("#contact_email_error2").css("display","block");
            error.contact_email_error = false;
            $("#contact_email_error").css("display","none");
        }
    });

    $("#name").keyup(function(){
        if($(this).val()==""){
            error.name_error = true;
            $("#name_error").css("display","block");
        }
        else {
            error.name_error = false;
            $("#name_error").css("display","none");
        }

    });


    $("#reserv").submit(function(e){
        e.preventDefault();

        $("#name, #date, #contact_phone, #contact_email").each(function(){
            if($(this).val() == ""){
                error[$(this).attr("id")+"_error"] = true;
                $("#"+$(this).attr("id")+"_error").css("display","block");
            }
            else {
                error[$(this).attr("id")+"_error"] = false;
                $("#"+$(this).attr("id")+"_error").css("display","none");
            }
        });

        $("#table_error, #time_error").each(function(){
            if($(this).val() == "default"){
                error[$(this).attr("id")+"_error"] = true;
                $("#"+$(this).attr("id")+"_error").css("display","block");
            }
            else {
                error[$(this).attr("id")+"_error"] = false;
                $("#"+$(this).attr("id")+"_error").css("display","none");
            }
        });


        if(!error.name_error && !error.date_error && !error.table_error && !error.time_error && !error.contact_phone_error && !error.contact_email_error && !error.contact_phone_error2 && !error.contact_email_error2) {

            $.ajax({
                method: "POST",
                url: "reservation-insert.php",
                data: $(this).serialize(),
                cache: false,
                success: function (data) {
                    alert("success!");
                    $("#myModal").modal('hide');
                },
                error: function () {
                    alert("Zoinks!");
                }
            });
        }
    });
});
