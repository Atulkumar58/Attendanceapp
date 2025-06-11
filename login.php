<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css"> 
    
</head>
<body>
     
    <div class="loginform" >
       
        <div id="heading"><h1>Faculty Login</h1></div>
        
        <div id="inp">
            <label for="username" class="tag">Username</label><br>
            <input type="text" id="username" required><br>
            <label for="password" class="tag">Password</label><br>
            <input type="password" id="password" required><br>
            <br>
            <button id="btnlogin">Log In</button>
            
        </div>
        <div id="errordiv" class="errordiv">
            <label id="errormessage" class="errormessage">ERROR GOES HERE</label>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="javascript/login3.js"></script>
</body>
</html>