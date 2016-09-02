<?php
//php连接mysql数据库
$host="127.0.0.1";//服务器地址
$root="root";//数据库账号
$pwd="root";
$con = new MySQLi($host,$root,$pwd,"blog");
// $con=mysql_connect($host,$root,$pwd);
if($con==false){
	exit;
}else{
	// echo "数据库连接成功";
}

$path = "uploads/";
$extArr = array("jpg", "png", "gif");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['photoimg']['name'];
	$size = $_FILES['photoimg']['size'];
	
	if(empty($name)){
		echo '请选择要上传的图片';
		exit;
	}
	$ext = extend($name);
	if(!in_array($ext,$extArr)){
		echo '图片格式错误！';
		exit;
	}
	if($size>(100*1024)){
		echo '图片大小不能超过100KB';
		exit;
	}
	$image_name = time().rand(100,999).".".$ext;
	$tmp = $_FILES['photoimg']['tmp_name'];
	if(move_uploaded_file($tmp, $path.$image_name)){
		echo '<img src="http://task.com/'.$path.$image_name.'"  class="preview">';
		$sql = "UPDATE zjy_member SET avatar = '".$path.$image_name."' WHERE name = '".$_COOKIE['username']."'";
		setcookie('avatar',$path.$image_name,0,'/');
		$data['avatar']=$path.$image_name;
		$avatar=$path.$image_name;
		$_result = $con->query($sql);
	}else{
		echo '上传出错了！';
	}
	exit;
}
exit;
function extend($file_name){
	$extend = pathinfo($file_name);
	$extend = strtolower($extend["extension"]);
	return $extend;
}
?>