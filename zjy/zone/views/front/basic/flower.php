<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
    <title>雪花</title>
    <style>
        body{width: 100%;height: 100%;}
        canvas{width: 100%;height: 100%;}
    </style>
</head>
<body>
<canvas id="mc"  style="border:1px solid black"  width="100%" height="100%" >sorry, your broswer does not support html5!</canvas >
<script type="text/javascript" >
    function createFlower(context,n,dx,dy,size,length){
        context.beginPath();
        context.moveTo(dx,dy+size);
        var dig = 2*Math.PI/n;
        for(var i=1;i<n+1;i++){
            var ctrlX = Math.sin((i-0.5)*dig)*length+dx;
            var ctrlY = Math.cos((i-0.5)*dig)*length+dy;
            var x = Math.sin(i*dig)*size+dx;
            var y = Math.cos(i*dig)*size+dy;
            context.quadraticCurveTo(ctrlX,ctrlY,x,y);
        }
        context.closePath();
    }
    snowPos = [
        {x:50,y:44,z:5},{x:140,y:35,z:3},
        {x:360,y:20,z:1},{x:250,y:50,z:2},
        {x:110,y:90,z:4},{x:310,y:85,z:2},
        {x:65,y:160,z:5},{x:205,y:130,z:5},
        {x:300,y:150,z:3},{x:260,y:210,z:1},
        {x:375,y:215,z:3},{x:155,y:230,z:2},
        {x:30,y:270,z:4},];
    function fall(context){
        context.fillStyle = "#000";
        context.fillRect(0,0,document.body.clientWidth,document.body.clientHeight);
        context.fillStyle = "#fff";
        for(var i=0,len=snowPos.length;i<len;i++){
            context.save();
            context.translate(snowPos[i].x,snowPos[i].y);
            context.rotate((Math.random()*6-3)*Math.PI/10);
            snowPos[i].y += Math.random()*18;
            if(snowPos[i].y >280){
                snowPos[i].y=4;
            }
            createFlower(context,6,0,0,snowPos[i].z,8);
            context.fill();
            context.restore();
        }
    }
    var canvas = document.getElementById("mc");
    var ctx = canvas.getContext("2d");
    setInterval("fall(ctx);",200);
</script >
</body>
</html>