<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<body>

<?php
echo "我的第一段 PHP 脚本！"."<br>";
?>
<br>
<?php 
$name="xiaoyu";
$sex="女";
echo "我是$name,性别$sex"."<br>";
$x=5;
$y=1;
// $z=$x+$y;
// echo $z;
function test(){
	global $x,$y;
	$y=$x+$y;
	static $z=0;
	echo $z.'---'.$x."<br>";
	//$GLOBALS['y'] = $GLOBALS['x'] * $GLOBALS['y'];
	$z++;
}
test();
$cars=array("Volvo","BMW","Toyota");
echo "This", " string", " was", " made", " with multiple parameters."."<br>";
echo "My car is a {$cars[0]}"."<br>";
echo $y."<br>";
test();
test();
test();
class student
{
	var $xingming;
	var $sex="女";
	var $age="24";
	function play($xingming="xiaoming"){
		return $this->$xingming;
	}
	function baoming(){
		return $this->$age;
	}

}
$xiaoming=new student();
if($x!=$y){
	echo "0"."<br>";
}
?>
<hr>
<?php
$color1= array("red","green","blue");
for ($i=0; $i < count($color1); $i++) { 
	echo $color1[$i]."<br>";
}
?>
<hr>
<?php
$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");

foreach($age as $x=>$x_value)
{
echo  $x . "is" . $x_value."<br>";
}
?>
</body>
</html>