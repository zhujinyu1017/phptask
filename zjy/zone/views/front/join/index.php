<?php $this->load->view('front/public/header.php');?>
    <body>
    <?php $this->load->view('front/public/header-common.php');?>
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
              <button type="button" value="Submit" id="Submit" class="btn btn-default col-xs-12 col-sm-12 col-md-12">登录</button>
          </form>
      </div>
  </div>
</div>
<script type="text/javascript">
    $("#Submit").click(function(){
        var name=$("#name").val();
        var password=$("#password").val();
        if(!check_null(name,'账户不可为空')){
            return;
        }else if(!check_password()){
            return;
        }else{
          $.ajax({
            url: "<?php echo base_url('front/join/ajax_login')?>",
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