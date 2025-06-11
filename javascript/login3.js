// alert("login3.js is loaded");
function tryLogin(){
    let un= $("#username").val();
    let pw= $("#password").val();
    if(un.trim()!=="" && pw.trim()!==""){
       
        $.ajax({
            url:"AjaxHandler/loginAjax.php",
            type:"POST",
            dataType:"json",
            data:{user_name:un, password:pw, action:"verifyUser"},
            beforeSend:function(){
                //if you want to do something before the call
                // alert("about to make a ajax call");
                 $("#errordiv").removeClass("applyerrordiv");
                    $("#errormessage").text("");
            },
            success:function(rv){
                //if ajax call was successful result will be in rv
                // alert(JSON.stringify(rv));

                if(rv['status']=="ALL OK")
                {
                    document.location.replace("attendance.php");
                }
                else{
                    // alert(rv['status']);
                    $("#errordiv").addClass("applyerrordiv");
                    $("#errormessage").text(rv['status']);
                }
            },
            error:function(){
                alert("oops something went wrong");
            }
        })
    }
    else{
        alert ("Username and password must not be empty.");
    }
}
$(function(e){
    $(document).on("keyup", "input", function(e){
         $("#errordiv").removeClass("applyerrordiv");
        $("#errormessage").text("");
    })
    $(document).on("click", "#btnlogin", function(e){ 
        tryLogin();
    });
});