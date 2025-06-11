<?php

    $path=$_SERVER['DOCUMENT_ROOT'];
    require_once $path."/attendanceapp/database/database.php";
    require_once $path."/attendanceapp/database/FacultyDetails.php";
    
    $action = $_REQUEST["action"];
     if(!empty($action)){
            
        
        if($action == "signupUser"){
           
            $em= $_POST["email"];
            $pw= $_POST["password"];
               
           $dbo= new Database();
            $fdo= new Faculty_Details();
            
        }
     }
?>