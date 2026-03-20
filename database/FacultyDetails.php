<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendanceapp/database/database.php";
class faculty_details
{
    public function verifyUser($dbo,$un,$pw)
    {
        $rv=["id"=>-1,"status"=>"ERROR"];
          $c="select id,password from faculty_details where user_name=:un";
          $s=$dbo->conn->prepare($c);
          try{
             $s->execute([":un"=>$un]);
             if($s->rowCount()>0)
             {
                 $result=$s->fetchAll(PDO::FETCH_ASSOC)[0];
                 if($result['password']==$pw)
                 {
                    //all ok
                    $rv=["id"=>$result['id'],"status"=>"ALL OK"];
                 }
                 else{
                    //pw does not match
                    $rv=["id"=>$result['id'],"status"=>"Wrong password"];
                 }
             }
             else{
              //user name does not exists
              $rv=["id"=>-1,"status"=>"USER NAME DOES NOT EXISTS"];
             }
          }
          catch(PDOException $e)
          {

          }
          return $rv;
    }
    public function getCoursesInASession($dbo,$sessionid,$facid)
    {
      $rv=[];
      $c="select cd.id,cd.code,cd.title from 
      course_allotment as ca,course_details as cd
      where ca.course_id=cd.id and faculty_id=:facid and session_id=
      :sessionid";
      $s=$dbo->conn->prepare($c);
      try{
        $s->execute([":facid"=>$facid,":sessionid"=>$sessionid]);
        $rv=$s->fetchAll(PDO::FETCH_ASSOC);
      }
      catch(Exception $e)
      {

      }
      return $rv;
    }
    public function getFacultyName($dbo,$facid)
    {
      $name='';
      $c="select name from faculty_details where id=:id";
          $s=$dbo->conn->prepare($c);
          try{
             $s->execute([":id"=>$facid]);
             if($s->rowCount()>0)
             {
                 $result=$s->fetchAll(PDO::FETCH_ASSOC)[0];
                 $name=$result['name'];
             }
             else{
              //user name does not exists
              $name='';
             }
          }
          catch(PDOException $e)
          {

          }
          return $name;
    }
    public function signupFaculty($dbo,$un,$email,$name,$department,$pw)
    {
        $rv=["status"=>"ERROR","message"=>"Registration failed"];
        
        //Check if username already exists
        $c="select id from faculty_details where user_name=:un";
        $s=$dbo->conn->prepare($c);
        try{
            $s->execute([":un"=>$un]);
            if($s->rowCount()>0)
            {
                return ["status"=>"ERROR","message"=>"Username already exists"];
            }
        }
        catch(PDOException $e){
            return $rv;
        }
        
        //Check if email already exists
        $c="select id from faculty_details where email=:email";
        $s=$dbo->conn->prepare($c);
        try{
            $s->execute([":email"=>$email]);
            if($s->rowCount()>0)
            {
                return ["status"=>"ERROR","message"=>"Email already registered"];
            }
        }
        catch(PDOException $e){
            return $rv;
        }
        
        //Insert new faculty
        $c="insert into faculty_details (user_name, email, name, department, password) 
           values (:un, :email, :name, :dept, :pw)";
        $s=$dbo->conn->prepare($c);
        try{
            $s->execute([
                ":un"=>$un,
                ":email"=>$email,
                ":name"=>$name,
                ":dept"=>$department,
                ":pw"=>$pw
            ]);
            return ["status"=>"SUCCESS","message"=>"Registration successful. Please login."];
        }
        catch(PDOException $e){
            return ["status"=>"ERROR","message"=>"Database error: ".$e->getMessage()];
        }
    }
}
?>

