<html>
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
    <title>注册</title>
    <link rel="stylesheet" href="<?php echo base_url('zone/css/common/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('zone/css/common/font-awesome.css');?>">
    <script src="<?php echo base_url('zone/js/common/jquery-2.2.3.min.js');?>"></script>
    <script src="<?php echo base_url('zone/js/common/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('zone/js/common/layer.js');?>"></script>
    <script src="<?php echo base_url('zone/js/common/rule-validation.js');?>"></script>
    <!--[if IE 7]>
    <link rel="stylesheet" href="<?php echo base_url('zone/css/common/font-awesome-ie7.min.css');?>">
    <![endif]-->
</head>
<body>
    <header>
        <div class="header-left"></div>
        <div class="header-center">注册</div>
        <div class="header-right"></div>
    </header>
   <div class="container">
   <h2>注册</h2>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <form  method="post">
                <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="icon-user"></i>&nbsp;用&nbsp;&nbsp;户&nbsp;名</div>
                      <input type="text" name="name" value="" size="50" id="name" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-lock"></i>&nbsp;输入密码</div>
                        <input type="password" name="password" value="" size="50" id="password"  class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="icon-key"></i>&nbsp;重复密码</div>
                        <input type="password" name="repasswd" value="" size="50" id="repasswd"  class="form-control" />
                    </div>
                </div>
                <div class="tip-error"></div>
                <button type="button" value="Submit" id="Submit" class="btn btn-default col-xs-12 col-sm-12 col-md-12">注册</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#Submit").click(function(){
        var name=$("#name").val();
        var password=$("#password").val();
        var repasswd=$("#repasswd").val();
        if(!check_null(name,'账户不可为空')){
            return;
        }else if(!check_password()){
            return;
        }else if(!check_reppwd()){
            return;
        }else{
            $.ajax({ 
                url: "<?php echo base_url('front/join/ajax_register')?>",
                type: "POST", 
                dataType: "json",
                           async:false,//表示只有ajax执行完毕了才继续往下执行
                           data: {name:name,password:password,repasswd:repasswd},        
                           error: function(){  
                               console.log('Error loading XML document');  
                           },        
                           success: function(data,status) { 
                            if(!data.status){
                                $(".tip-error").html(data.message);
                            }else{
                                layer.msg(data.message);
                                window.location.href=data.location;
                            }   
                        }
                    });     
        }
    })
</script>
</body>
</html>