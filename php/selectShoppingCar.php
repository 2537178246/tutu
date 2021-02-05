<?php
@include_once("conn.php");
$user = $_POST["user"];
$search = "select user,goodsId,goodsNum from `shopping-car` where user ='$user'";
$result = mysqli_query($conn,$search);
// echo $result->num_rows;
// $item = mysqli_fetch_assoc($item);
$arr = array();
for($i=0;$i<$result->num_rows;$i++){
    $item = mysqli_fetch_assoc($result);
    $gid = $item["goodsId"];
    $searchId = "select goodsId,goodsName,goodsPrice,smallPicList from `goodslist` where goodsId='$gid'";
    $resultGid = mysqli_query($conn,$searchId);
    while($itemGid = mysqli_fetch_assoc($resultGid)){
        $str = $itemGid["smallPicList"];
        $itemGid["smallPicList"] = explode(",",$str);
        $itemGid["goodsImg"] = $itemGid["smallPicList"][0];

        array_push($item,$itemGid["goodsImg"]);
        array_push($item,$itemGid["goodsPrice"]);
        array_push($item,$itemGid["goodsName"]);
    }
    array_push($arr,$item);
}
$obj = array();
$obj["list"]=$arr;
echo json_encode($obj);
?>