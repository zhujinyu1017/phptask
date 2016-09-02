<!DOCTYPE lang="en">
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-touch-fullscreen" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="renderer" content="webkit"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="format-detection" content="address=no"/>
    <title>页面1</title>
    <script src="<?php echo base_url('zone/js/common/jquery-2.2.3.min.js'); ?>"></script>
    <script src="<?php echo base_url('zone/js/front/mobile/vector.js'); ?>"></script>
    <script src="<?php echo base_url('zone/js/common/jquery.pjax.js'); ?>"></script>
</head>
<body >
<article  id="123">
<ul>
<!--        <li><a href="--><?php //echo base_url('mobile/basic/index') ?><!--">页面1</a></li>-->
        <li><a href="<?php echo base_url('mobile/basic/index2') ?>">页面2</a></li>
</ul>
<div id="content">
    <div>这是页面1</div>
    <button id="btn1">按钮1</button>
</div>
    </article>

<script>
    $(document).pjax('#123 a', '#123', {fragment:'#123', timeout:5000});
    $(document).on('pjax:send', function() {
        console.log(1);
    });
    $(document).on('pjax:complete', function() {
        console.log(2);
    });
    function preloadimages(arr){
        var newimages=[]
        var arr=(typeof arr!="object")? [arr] : arr  //确保参数总是数组
        for (var i=0; i<arr.length; i++){
            newimages[i]=new Image()
            newimages[i].src=arr[i]
        }
    }
    window.onload=function () {
        setTimeout(function () {
            preloadimages(['<?php echo base_url("zone/images/common/avatar-default1.png");?>','<?php echo base_url("zone/images/common/avatar.jpg");?>']);
        },1000)
        $("#btn1").click(function () {
            alert(1);
        })
    }
</script>
</body>
</html>