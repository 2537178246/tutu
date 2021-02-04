<?php

@header("Content-Type:text/html;charset=utf-8");

const host = "localhost:3306";
const user = "root";
const pwd = "root";
const dbName = "2010";

$conn = mysqli_connect(host,user,pwd,dbName);

if(!$conn){
    exit ("数据库链接失败");
}

mysqli_query($conn,"set names utf8");
mysqli_query($conn,"set character set utf-8");  

?>