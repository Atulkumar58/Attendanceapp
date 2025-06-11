<?php
$path= $_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendanceapp/database/database.php";
class Faculty_Details
{
    public function verifyUser($dbo,$un, $pw){

        $rv=["id"=>-1, "status"=>"ERROR"];
        $c="select id, password from faculty_details where user_name=:un";
        $s= $dbo->conn->prepare($c);
        try{
            $s->execute([":un"=>$un]);
            if($s->rowCount() > 0){

                $result= $s->fetch(PDO::FETCH_ASSOC);

                if($result['password']===$pw){
                    //valid inputs
                    $rv=["id"=>$result['id'], "status"=>"ALL OK"];
                }
                else{
                    //wrong password
                    $rv=["id"=>$result['id'], "status"=>"WRONG PASSWORD"];
                }
            }
            else{
                //user doesnot exist
                $rv=["id"=>-1, "status" => "USER NAME DOES NOT EXISTS"];
            }
        }
        catch(PDOException $e){

        }
        return $rv;
    }
}
?>
