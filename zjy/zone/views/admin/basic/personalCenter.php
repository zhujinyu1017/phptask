<?php $this->load->view('admin/public/header');?>
<body class="personalcenter">
	<div class="container-full ">
		<?php $this->load->view('admin/public/top');?>
		<div class="row common-content">
			<?php $this->load->view('admin/public/left');?>
			<div class="common-right">
				<div class="content">
					<div class="content-title">个人信息设置</div>
					<form  method="post" class="mt25" id="imageform" enctype="multipart/form-data" action="<?php echo site_url().'/tool/Upload'?>">
						<div id="up_status" style="display:none">
    								<img src="<?php echo base_url('zone/images/common/loader.gif');?>" alt="uploading"/></div> 
						<div id="up_btn" class="btn"> 
							<span>添加图片</span> 
							<input id="photoimg" type="file" name="photoimg"> 
						</div> 
					</form>
					<div id="preview"></div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('zone/js/common/jquery.wallform.js');?>"></script>
	<script>
		$(function(){ 
    $('#photoimg').bind('change', function(){ 
        var status = $("#up_status"); 
        var btn = $("#up_btn"); 
        $("#imageform").ajaxForm({ 
            target: '#preview',  
            beforeSubmit:function(){ 
                status.show(); 
                btn.hide(); 
            },  
            success:function(){ 
                status.hide(); 
                btn.show();
//                top.location.reload();
            },  
            error:function(){ 
            	// layer.msg(data.message);
                status.hide(); 
                btn.show(); 
        } }).submit(); 
    }); 
});
	</script>
<?php $this->load->view('admin/public/footer');?>