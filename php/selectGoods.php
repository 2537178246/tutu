<?php
@include_once("conn.php");
$user = $_POST["user"];
// $goodsId = $_POST["goodsId"];
$search = "select user,goodsId from `shopping-car` where user ='$user'";
$item = mysqli_query($conn,$search);
// $item = mysqli_fetch_assoc();
// print_r($item);
// print_r($item);
// echo $item->num_rows;


$obj = array();

$obj["row"] = $item->num_rows;
// echo$obj;
// print_r($obj);
echo json_encode($obj);
?>