<?php

@include_once("conn.php");

$search = "select id,goodsId,goodsName,goodsPrice,smallPicList,bigPicList from `goodslist` limit 0,9";
$result = mysqli_query($conn,$search);
$arr = Array();
$item = mysqli_fetch_assoc($result);
$count = $item["count"];
while($item = mysqli_fetch_assoc($result)){


    $str = $item["bigPicList"];
    $item["bigPicList"] = explode(",",$str);
    $item["goodsImg"] = $item["bigPicList"][0];


    array_push($arr,$item);        
}
// if($item){
//     $obj["status"]=true;
//     $obj["msg"]="OK";
//     $obj["data"] = $item;
// }else{
//     $obj = Array();
//     $obj["status"]=false;
//     $obj["msg"]="密码或用户名有误";
// }
// echo json_encode($obj);


    $obj = array(); 
    $obj["count"] = $count*1;   // 数据的总数量
    $obj["currentPage"] = $pageIndex*1;  // 返回当前页是第几页
    $obj["maxPage"] = $maxPage;   // 最大页码
    $obj["list"] = $arr;


echo json_encode($obj)
?>