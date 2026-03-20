<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendanceapp/database/database.php";
require_once $path."/attendanceapp/database/facultyDetails.php";

$action=$_REQUEST["action"];
if(!empty($action))
{
    if($action=="registerFaculty")
    {      
        //retrieve what was sent
        $full_name = isset($_POST["full_name"]) ? $_POST["full_name"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $user_name = isset($_POST["user_name"]) ? $_POST["user_name"] : "";
        $department = isset($_POST["department"]) ? $_POST["department"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        $confirm_password = isset($_POST["confirm_password"]) ? $_POST["confirm_password"] : "";
        
        //validate input
        if(empty($full_name) || empty($email) || empty($user_name) || empty($department) || empty($password))
        {
            $rv = ["status"=>"ERROR","message"=>"All fields are required"];
            echo json_encode($rv);
            exit;
        }
        
        //validate password match
        if($password !== $confirm_password)
        {
            $rv = ["status"=>"ERROR","message"=>"Passwords do not match"];
            echo json_encode($rv);
            exit;
        }
        
        //validate password length
        if(strlen($password) < 4)
        {
            $rv = ["status"=>"ERROR","message"=>"Password must be at least 4 characters"];
            echo json_encode($rv);
            exit;
        }
        
        //validate email format
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $rv = ["status"=>"ERROR","message"=>"Invalid email format"];
            echo json_encode($rv);
            exit;
        }
        
        //register faculty
        $dbo = new Database();
        $fdo = new faculty_details();
        $rv = $fdo->signupFaculty($dbo, $user_name, $email, $full_name, $department, $password);
        
        //simulate processing time
        for($i=0;$i<10;$i++)
        {
            for($j=0;$j<2000;$j++)
            {
            }
        }
        
        //send response
        echo json_encode($rv);
    }
}
?>
