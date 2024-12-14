<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendanceapp/database/database.php";
class fculty_details
 {
    public function verifyUser($dbo,$un,$pw){
         $rv=["id"=>-1,"status"=>"ERROR"];
        $c="select id,password from fculty_details where user_name=:un";
        $s=$dbo->conn->prepare($c);

        try{
$s->execute([':un' => $un]);

if($s->rowCount()>0){
    $result=$s->fetchAll(PDO::FETCH_ASSOC)[0];

    if($result['password']==$pw){

//all ok
$rv=["id"=>$result['id'],"status"=>"ALL OK"];

    }
    else{

//pw dose not match
$rv=["id"=>$result['id'],"status"=>"WRONG PASSWORD"];

    }
        }
        else{
//user name not exists
$rv=["id"=>-1,"status"=>"USER NAME DOES NOT EXIST"];

        }
    }
        catch(PDOException $e){

            error_log("Database error: " . $e->getMessage());

        }
return $rv;

    


    }

}
?>