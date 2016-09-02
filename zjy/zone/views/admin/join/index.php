<html>
<head>
    <title>登录</title>
    <link rel="stylesheet" href="<?php echo base_url('zone/css/common/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('zone/css/common/font-awesome.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('zone/css/common/common.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('zone/css/admin/admin.css');?>">
    <script src="<?php echo base_url('zone/js/common/jquery-2.2.3.min.js');?>"></script>
    <script src="<?php echo base_url('zone/js/common/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('zone/js/common/layer.js');?>"></script>
    <script src="<?php echo base_url('zone/js/common/rule-validation.js');?>"></script>
    <!--[if IE 7]>
    <link rel="stylesheet" href="<?php echo base_url('zone/css/common/font-awesome-ie7.min.css');?>">
    <![endif]-->
    <body class="join">
        <div class="container">
            <h2>登录</h2>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <form  method="post" >
                     <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon"><i class="icon-user"></i>&nbsp;用户名</div>
                          <input type="text" name="name" value="" size="50" id="name" class="form-control"/>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><i class="icon-key"></i>&nbsp;密&nbsp;&nbsp;码</div>
                      <input type="password" name="password" value="" size="50" id="password"  class="form-control" />
                  </div>
              </div>
              <div class="tip-error"></div>

              <button type="button" value="Submit" id="Submit" class="btn btn-default col-xs-12 col-sm-12 col-md-12 mb10">登录</button>
               <a href="<?php echo base_url('admin/join/register');?>" class="btn btn-default col-xs-12 col-sm-12 col-md-12">注册</a>
          </form>
      </div>
  </div>
</div>
<script type="text/javascript">
    $("#Submit").click(function(){
        var name=$("#name").val();
        var password=$("#password").val();
        if(!check_realname()){
            return;
        }else if(!check_password()){
            return;
        }else{
          $.ajax({
            url: "<?php echo base_url('admin/join/ajax_login')?>",
            type: "POST", 
            dataType: "json",
                           async:false,//表示只有ajax执行完毕了才继续往下执行
                           data: {name:name,password:password},        
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