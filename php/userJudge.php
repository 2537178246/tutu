<?php

@include_once("conn.php");

$user = $_POST["user"];

$search = "select user from`hua-user` where user='$user'";
// echo ($search);
$result = mysqli_query($conn,$search);
// print_r($result);
$item = mysqli_fetch_assoc($result);
// echo($item);
$obj = Array();
if(!$item){
    $obj["status"]=false;
    $obj["msg"]="成功";
    $obj["data"] = $item;
}else{
    $obj["status"]=true;
    $obj["msg"]="该账户已存在";
    $obj["data"] = $item;
    
}
echo json_encode($obj);
// print_r($obj);
?>