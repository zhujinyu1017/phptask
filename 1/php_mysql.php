<?php
header("Content-type: text/html; charset=utf-8");
//php连接mysql数据库
$host="127.0.0.1";//服务器地址
$root="root";//数据库账号
$pwd="root";
$con=mysql_connect($host,$root,$pwd);
if($con==false){
	echo "数据库连接失败";
}else{
	echo "数据库连接成功";
}
?>