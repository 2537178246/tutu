<?php
@include_once("conn.php");

$pwd = $_POST["pwd"];
$email = $_POST["email"];
$phone = $_POST["phone"];

if($email){
    $search = "select user from`hua-user` where email='$email' and pwd='$pwd'";
}else{
    $search ="select user from`hua-user` where phone='$phone' and pwd='$pwd'";
}

$obj = Array();
$result = mysqli_query($conn,$search);
// print_r($search);

// echo $result;
if(!$result){
    $obj["status"]=false;
    $obj["msg"]="密码或用户名有误";
    echo json_encode($obj);
    exit();
}

$item = mysqli_fetch_assoc($result);

if($item){
    $obj["status"]=true;
    $obj["msg"]="OK";
    $obj["data"] = $item;
}else{
    $obj = Array();
    $obj["status"]=false;
    $obj["msg"]="密码或用户名有误";
}


echo json_encode($obj);
?>