<?php
include "../connect.php";
//  include "../functions.php";

$name=filterRequest("name");
$email=filterRequest("email");
$phone=filterRequest("phone");
$password=sha1("password");
$verfiycode="0";

$stmt =$con->prepare("SELECT * FROM user where email=? or phone=? ");
$stmt->execute(array($email,$phone));

$count=$stmt->rowCount();
if($count>0){

echo json_encode(array("status"=>"email or phone are already Exits"));

}else{
    $data=array("name"=>$name,
    "email"=>$email,"phone"=>$phone,"password"=>$password,"verfiycode"=>0,);
    insertData("user",$data);

    
}
