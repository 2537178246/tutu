<?php
@include_once("conn.php");
$user = $_POST["user"];
$goodsId = $_POST["goodsId"];
$del = "delete from `shopping-car` where user = '$user' and goodsId='$goodsId'";
mysqli_query($conn,$del);
$rows = mysqli_affected_rows($conn);
$msg = array();
    if($rows>0){
        $msg["status"] = true;
        $msg["message"] = "删除成功";
    }else {
        $msg["status"] = false;
        $msg["message"] = "删除失败";
    }

    echo json_encode($msg);
?>