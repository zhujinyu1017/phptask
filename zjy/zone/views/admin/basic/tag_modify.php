<?php $this->load->view('admin/public/header.php');?>
<body>
	<div class="container-full ">
		<?php $this->load->view('admin/public/top');?>
		<div class="row common-content">
			<?php $this->load->view('admin/public/left');?>
			<div class="common-right">
				<div class="content">
					<div class="content-title">栏目修改</div>
					<form  method="post" class="w20p mt25">
					<input type="hidden" class="form-control" name="id" id="id" placeholder="栏目名" value="<?php echo $id?>">
						<div class="form-group">
							<label for="name">栏目名</label>
							<input type="text" class="form-control" name="name" id="name" placeholder="栏目名" value="<?php echo $name?>">
						</div>
						<div class="tip-error"></div>
						<button type="button" value="Submit" id="Submit" class="btn btn-default col-xs-12 col-sm-12 col-md-12">提交</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('zone/js/common/layer.js');?>"></script>
	 <script src="<?php echo base_url('zone/js/common/rule-validation.js');?>"></script>
	<script>
		$("#Submit").click(function(){
			var name=$("#name").val();
			var id=$("#id").val();
			if(!check_null(name,'栏目名不可为空')){
				return;
			}else{
				$.ajax({ 
					url: "<?php echo base_url('admin/basic/ajax_tagmodify')?>",
					type: "POST", 
					dataType: "json",
                           async:false,//表示只有ajax执行完毕了才继续往下执行
                           data: {id:id,name:name},
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
<?php $this->load->view('admin/public/footer');?>