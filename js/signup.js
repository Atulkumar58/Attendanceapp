function validateForm()
{
    let name = $("#txtFullName").val();
    let email = $("#txtEmail").val();
    let un = $("#txtUsername").val();
    let dept = $("#txtDepartment").val();
    let pw = $("#txtPassword").val();
    let cpw = $("#txtConfirmPassword").val();
    
    // Check if all fields are filled
    if(name.trim() === "" || email.trim() === "" || un.trim() === "" || 
       dept.trim() === "" || pw.trim() === "" || cpw.trim() === "")
    {
        return false;
    }
    
    // Check if passwords match
    if(pw !== cpw)
    {
        $("#diverror").addClass("applyerrordiv");
        $("#errormessage").text("Passwords do not match");
        return false;
    }
    
    // Check password length
    if(pw.length < 4)
    {
        $("#diverror").addClass("applyerrordiv");
        $("#errormessage").text("Password must be at least 4 characters");
        return false;
    }
    
    // Basic email validation
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRegex.test(email))
    {
        $("#diverror").addClass("applyerrordiv");
        $("#errormessage").text("Please enter a valid email address");
        return false;
    }
    
    return true;
}

function trySignup()
{
    if(!validateForm())
    {
        return;
    }
    
    let name = $("#txtFullName").val();
    let email = $("#txtEmail").val();
    let un = $("#txtUsername").val();
    let dept = $("#txtDepartment").val();
    let pw = $("#txtPassword").val();
    let cpw = $("#txtConfirmPassword").val();
    
    //make an ajax call
    $.ajax({
        url:"ajaxhandler/signupAjax.php",
        type:"POST",
        dataType:"json",
        data:{
            full_name: name,
            email: email,
            user_name: un,
            department: dept,
            password: pw,
            confirm_password: cpw,
            action:"registerFaculty"
        },
        beforeSend: function(){
            $("#diverror").removeClass("applyerrordiv");
            $("#divsuccess").removeClass("applysuccessdiv");
            $("#lockscreen").addClass("applylockscreen");
        },
        success: function(rv){
            $("#lockscreen").removeClass("applylockscreen");
            
            if(rv['status'] === "SUCCESS")
            {
                $("#divsuccess").addClass("applysuccessdiv");
                $("#successmessage").text(rv['message']);
                
                // Clear form
                $("#txtFullName").val("");
                $("#txtEmail").val("");
                $("#txtUsername").val("");
                $("#txtDepartment").val("");
                $("#txtPassword").val("");
                $("#txtConfirmPassword").val("");
                
                // Reset button
                $("#btnSignup").removeClass("activecolor");
                $("#btnSignup").addClass("inactivecolor");
                
                // Redirect to login after 2 seconds
                setTimeout(function(){
                    document.location.replace("login.php");
                }, 2000);
            }
            else
            {
                $("#diverror").addClass("applyerrordiv");
                $("#errormessage").text(rv['message']);
            }
        },
        error: function(){
            $("#lockscreen").removeClass("applylockscreen");
            $("#diverror").addClass("applyerrordiv");
            $("#errormessage").text("An error occurred. Please try again.");
        }
    });
}

function updateButtonState()
{
    let name = $("#txtFullName").val();
    let email = $("#txtEmail").val();
    let un = $("#txtUsername").val();
    let dept = $("#txtDepartment").val();
    let pw = $("#txtPassword").val();
    let cpw = $("#txtConfirmPassword").val();
    
    if(name.trim() !== "" && email.trim() !== "" && un.trim() !== "" && 
       dept.trim() !== "" && pw.trim() !== "" && cpw.trim() !== "" &&
       pw === cpw && pw.length >= 4)
    {
        $("#btnSignup").removeClass("inactivecolor");
        $("#btnSignup").addClass("activecolor");
    }
    else
    {
        $("#btnSignup").removeClass("activecolor");
        $("#btnSignup").addClass("inactivecolor");
    }
}

//do everything only when the document is loaded
$(function(e){
    //capture the keyup event
    $(document).on("keyup","input",function(e){
        $("#diverror").removeClass("applyerrordiv");
        $("#divsuccess").removeClass("applysuccessdiv");
        updateButtonState();
    }); 
    
    //capture the change event (for password confirmation)
    $(document).on("change","input",function(e){
        updateButtonState();
    });
    
    $(document).on("click","#btnSignup",function(e){
        trySignup();
    });
});
