<?php
@include_once("conn.php");

$user = $_POST["user"];
$goodsId = $_POST["goodsId"];
$goodsNum = $_POST["goodsNum"];
// 增加

$search = "select * from `shopping-car` where user='$user' and goodsId='$goodsId'";
$item = mysqli_query($conn,$search);
$item = mysqli_fetch_assoc($item);
// echo $item;
if($item){
    $goodsNum = $goodsNum + 1;
    $update = "update `shopping-car` set goodsNum = '$goodsNum' where user='$user' and goodsId='$goodsId'";
    $rows = mysqli_affected_rows($conn);  
    
    $msg = array();
    if($rows>0){
        $msg["status"] = true;
        $msg["message"] = "更新成功";
    }else {
        $msg["status"] = false;
        $msg["message"] = "更新失败";
    }

    echo json_encode($msg);
}else{
    $insert = "insert into `shopping-car`(user,goodsId,goodsNum) value ('$user','$goodsId',$goodsNum)
    ";
    mysqli_query($conn,$insert);
    $rows = mysqli_affected_rows($conn);
    $msg = array();
        if($rows>0){
            $msg["status"] = true;
            $msg["message"] = "插入成功";
        }else {
            $msg["status"] = false;
            $msg["message"] = "插入失败";
        }
    echo json_encode($msg);
}

?>