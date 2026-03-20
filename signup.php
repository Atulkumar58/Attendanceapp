<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/loader.css">
    <title>School Attendance - Faculty Signup</title>
</head>
<body>
    <div class="branding-area">
        <h1>📚 School Attendance</h1>
        <p>Faculty Registration</p>
    </div>

    <div class="signupform">
        <h2 class="signup-title">Create Your Account</h2>
        
        <div class="inputgroup topmarginlarge">
            <input type="text" id="txtFullName" required>
            <label for="txtFullName" id="lblFullName">FULL NAME</label>
        </div>

        <div class="inputgroup">
            <input type="email" id="txtEmail" required>
            <label for="txtEmail" id="lblEmail">EMAIL</label>
        </div>

        <div class="inputgroup">
            <input type="text" id="txtUsername" required>
            <label for="txtUsername" id="lblUsername">USERNAME</label>
        </div>

        <div class="inputgroup">
            <input type="text" id="txtDepartment" required>
            <label for="txtDepartment" id="lblDepartment">DEPARTMENT</label>
        </div>

        <div class="inputgroup">
            <input type="password" id="txtPassword" required>
            <label for="txtPassword" id="lblPassword">PASSWORD</label>
        </div>

        <div class="inputgroup">
            <input type="password" id="txtConfirmPassword" required>
            <label for="txtConfirmPassword" id="lblConfirmPassword">CONFIRM PASSWORD</label>
        </div>

        <div class="divcallforaction topmarginlarge">
            <button class="btnlogin inactivecolor" id="btnSignup">SIGNUP</button>
        </div>  
        
        <div class="diverror topmarginlarge" id="diverror">
            <label class="errormessage" id="errormessage">ERROR GOES HERE</label>
        </div>

        <div class="divsuccess topmarginlarge" id="divsuccess">
            <label class="successmessage" id="successmessage">SUCCESS MESSAGE</label>
        </div>

        <div class="login-link topmarginlarge">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>

    <div class="lockscreen" id="lockscreen">
        <div class="spinner" id="spinner"></div>
        <label class="lblwait topmargin" id="lblwait">PLEASE WAIT</label>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/signup.js"></script>
</body>
</html>
