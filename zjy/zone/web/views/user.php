<html>
<head>  
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><? echo $title;?></title>  
</head>  
<body>  
<ul>  
<?php foreach($todo_list as $item):?>  
<li><?php echo $item;?></li>  
<?php endforeach;?>  
</ul>  
<ul>  
<? echo count($query1);  
foreach ($query1 as $v1) {  
    foreach ($v1 as $v2) {  
        echo "$v2\n";  
    }  
}  
for ($row=0;$row<count($query1);$row++) {  
    echo $query1[$row]->name."</br>";  
}  
?>  
  
<?php foreach($query1 as $v):?>  
<li><?php echo $v->name;?></li>  
<?php endforeach;?>  
</ul>  
</h2><?php echo $headline; ?></h2>  
</body>  
</html>