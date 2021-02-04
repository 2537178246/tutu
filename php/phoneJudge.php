<?php

@include_once("conn.php");
$phone = $_POST["phone"];

$search = "select phone from`hua-user` where phone='$phone'";
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
    $obj["msg"]="该电话已存在";
    $obj["data"] = $item;
    
}
echo json_encode($obj);
?>