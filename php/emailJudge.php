<?php

@include_once("conn.php");
$email = $_POST["email"];

$search = "select email from`hua-user` where email='$email'";
// echo ($search);
// print_r($conn);
$result = mysqli_query($conn,$search);
// echo ($res);
$item = mysqli_fetch_assoc($result);
$obj = Array();
if(!$item){
    $obj["status"]=true;
    $obj["msg"]="成功";
    $obj["data"] = $item;
}else{
    $obj["status"]=false;
    $obj["msg"]="该邮箱已存在";
    $obj["data"] = $item;
    
}
echo json_encode($obj);
?>