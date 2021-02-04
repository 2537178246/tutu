<?php
@include_once("conn.php");

$gid = $_POST["gid"];

$search = "select id,goodsId,goodsName,goodsPrice,smallPicList,bigPicList from `goodslist` where goodsId=$gid";
$result = mysqli_query($conn,$search);
$item = mysqli_fetch_assoc($result);
// $arr = array();
// print_r($item);
// while(mysqli_fetch_assoc($result)){
//     while(true){

//     // $big = $item["bigPicList"];
//     $big = strval($item["bigPicList"]);
//     // echo $big;
//     $item["bigPicList"] = explode(",",$big);
//     $item["bigImg"] = $item["bigPicList"];
//     $sma = strval($item["smallPicList"]);
//     $item["smallPicList"] = explode(",",$sma);
//     $item["smallImg"] = $item["smallPicList"];
//     echo $item["smallImg"];
//     array_push($arr,$item);
// }
$big = $item["bigPicList"];
    $item["bigPicList"] = explode(",",$big);
    $item["bigImg"] = $item["bigPicList"];
    $sma = strval($item["smallPicList"]);
        $item["smallPicList"] = explode(",",$sma);
        $item["smallImg"] = $item["smallPicList"];
echo json_encode($item);
?>