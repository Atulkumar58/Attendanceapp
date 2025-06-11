$(function(e){
    $(document).on("click", "#btnlogout", function(ee){
        $.ajax (
            {
                url:"AjaxHandler/logoutAjax.php",
                type:"POST",
                dataType:"json",
                data:{id:1},
                beforeSend:function(e){
                    
                },
                success: function(e){
                    document.location.replace("login.php");
                },
                error: function(e){
                    alert("something went wrong");
                }
            }
        )
    });
});

