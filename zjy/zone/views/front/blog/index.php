<html>
<head>
    <title><?php echo $title;?></title>
    <link rel="stylesheet" type="text/css" href="http://task.com/zone/css/front/global.css">
    <link rel="stylesheet" type="text/css" href="http://task.com/zone/css/front/index.css">
</head>
<body>
<div class="top"></div>
<div class="nav">
    <img src="" alt="">
    <div class="nav">
        <ul class="nav-list">
            <?php foreach ($session_name as $item):?>
                <li><a href="#"><?php echo $item;?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>

</body>
</html>