<!DOCTYPE>
<html>
<head>
<meta charset="UTF-8">
<title>模仿笔画</title>
<style type="text/css">
#_canvas{
    background-color: rgb(240,240,240);
}
</style>
</head>
<body>
<canvas id="_canvas">sorry, your broswer does not support html5!</canvas>
<script type="text/javascript">
var canvas_ = document.getElementById("_canvas");

//全屏
canvas_.setAttribute("width",screen.width);
canvas_.setAttribute("height",screen.height);


var context = canvas_.getContext("2d");
context.strokeStyle = "red";
context.lineWidth = 4;

var array_paint = [];
var current_y = 0;
var current_x = 0;
//判断鼠标是否按下
var m_down = false;


function paint()
{
    context.beginPath();
    context.moveTo(array_paint[0][0],array_paint[0][1]);
    if(array_paint.length == 1)
        context.lineTo(array_paint[0][0] +1,array_paint[0][1] +1);
    else
    {
        var i =1;
        for(i in array_paint)
        {
            context.lineTo(array_paint[i][0],array_paint[i][1]);
            context.moveTo(array_paint[i][0],array_paint[i][1]);
        }

    }
    context.closePath();
    context.stroke();
}


//按下鼠标
canvas_.onmousedown = function(event)
{
    m_down = true;
    current_x = event.offsetX;
    current_y = event.offsetY;
    array_paint.push([current_x,current_y]);
    paint();
}


//鼠标松开,清空数据
canvas_.onmouseup = function(event)
{
    m_down = false;
    array_paint = [];
}


//鼠标按下后拖动
canvas_.onmousemove = function(event)
{
    if(m_down)
    {
        current_x = event.offsetX;
        current_y = event.offsetY;
        array_paint.push([current_x,current_y]);
        paint();
    }
}



</script>
</body>
</html>