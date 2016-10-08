<!DOCTYPE lang="en">
<html lang="en"><head>
    <meta charset="UTF-8">
    <title>基于Canvas实现的炫酷3D动画大背景</title>
    <style>
        *{margin: 0;padding: 0;}
        #container {
            position: absolute;
            height: 100%;
            width: 100%;
        }
        #output {
            width: 100%;
            height: 100%;
        }
        .color{
            width: 120px;
            height: 20px;
            margin: 0 auto;
            position: fixed;
            left: 50%;
            margin-left: -60px;
            bottom: 20px;
        }
        .color li{
            float: left;
            margin: 0 5px;
            width: 20px;
            height: 20px;
            background: #ccc;
            box-shadow: 0 0 4px #FFF;
            list-style: none;
            cursor: pointer;
        }
        .color li:nth-child(1){
            background: #002c4a;
        }
        .color li:nth-child(2){
            background: #35ac03;
        }
        .color li:nth-child(3){
            background: #ac0908;
        }
        .color li:nth-child(4){
            background: #18bbff;
        }
        .logo{
            width: 140px;
            height: 70px;
            position: fixed;
            top: 10px;
            left: 50%;
            margin-left: -70px;
            border: solid 1px #BBBBBB;
            -webkit-transition: all 400ms ease-in-out;
            -ms-transition: all 400ms ease-in-out;
            -o-transition: all 400ms ease-in-out;
            -moz-transition: all 400ms ease-in-out;
            transition: all 400ms ease-in-out;
        }
        .logo:hover{
            border: solid 1px #FFF;
            background: rgba(255, 255, 255, 0.2);
        }
    </style>
    <script src="<?php echo base_url('zone/js/common/jquery-2.2.3.min.js');?>"></script>
    <script src="<?php echo base_url('zone/js/front/mobile/vector.js');?>"></script>
    <script>
        $(function(){
            // 初始化 传入dom id
            var victor = new Victor("container", "output");
            var theme = [
                ["#002c4a", "#005584"],
                ["#35ac03", "#3f4303"],
                ["#ac0908", "#cd5726"],
                ["#18bbff", "#00486b"]
            ]
            var _length=theme.length;
            function randomnumber(min,max) {
                var r = Math.random() * (max - min);
                var re = Math.ceil(r + min);
                return re;
            }
            setInterval(function () {
                var ss=randomnumber(0,_length);
                victor(theme[ss]).set();
                console.log(ss);
            },Math.random()*600);
            $(".color li").each(function(index, val) {
                var color = theme[index];
                $(this).mouseover(function(){
                    victor(color).set();
                })
            });
        });
    </script>
</head>
<body style="zoom: 1;">
<div id="container"><div id="output"></div></div>
<ul class="color">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
</ul>
</body>
</html>