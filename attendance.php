<?php
session_start();
if(isset($_SESSION["current_user"])){

}
else{
    header("location:"."/attendanceapp/login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendanceapp</title>
    <link rel="stylesheet" href="css/attendance.css">
</head>
<body>
    <!-- <h1>Hello</h1>
    <button id="btnLogout">LOGOUT</button> -->
    <div class="page">
        <div class="header-area">
            <div class="logo-area"><h1 class="logo">ATTENDANCE APP</h1></div>
            <div class="logout-area"><button class="btnlogout">LOGOUT</button></div>
        </div>

        <div class="session-area">
            <div class="label-area"><label>SESSION</label></div>
            <div class="dropdown-area">
                <select class="ddlclass">
                    <option>SELECT ONE  </option>
                    <option>2025 AUTUMN</option>
                    <option>2025 SPRING</option>
                    
                </select>
            </div>
        </div>

        <div class="classlist-area">
            <div class="classcard">css</div>
            <div class="classcard">a</div>
            <div class="classcard">b</div>
            <div class="classcard">c</div>
            <div class="classcard">d</div>
        </div>

        <div class="classdetails-area">
            <div class="classdetails">
                <div class="code-area">CS101</div>
                <DIV class="title-area">Introduction to scientific computing</DIV>
                <div class="ondate-area">
                    <input type="date">
                </div>
            </div>
        </div>
        <div class="studentlist-area">
            <div class="studentlist"><label>STUDENT LIST</label></div>
           
             <div class="studentdetails">
                <div class="slno-area">001</div>
                <div class="rollno-area">CSB21001</div>
                <div class="name-area">ATUL</div>
                <div class="checkbox-area">
                    <input type="checkbox">
                </div>
            </div>
             <div class="studentdetails">
                <div class="slno-area">001</div>
                <div class="rollno-area">CSB21001</div>
                <div class="name-area">ATUL</div>
                <div class="checkbox-area">
                    <input type="checkbox">
                </div>
            </div>
             <div class="studentdetails">
                <div class="slno-area">001</div>
                <div class="rollno-area">CSB21001</div>
                <div class="name-area">ATUL</div>
                <div class="checkbox-area">
                    <input type="checkbox">
                </div>
            </div>
                
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="javascript/logout.js"></script>
</body>
</html>