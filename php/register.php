<?php
@include_once("conn.php");

$user = $_POST["user"];
$pwd = $_POST["pwd"];
$email = $_POST["email"];
$phone = $_POST["phone"];

$search = "insert into`hua-user`(user,pwd,email,phone)value('$user','$pwd','$email','$phone')";
mysqli_query($conn,$search);
$item = mysqli_affected_rows($conn);
$obj = Array();
if($item>0){
    $obj["status"]=true;
    $obj["msg"]="OK";
    $obj["data"] = $item;
}else{
    $obj = Array();
    $obj["status"]=false;
    $obj["msg"]="该用户已存在";
    
}


echo json_encode($obj);
?>