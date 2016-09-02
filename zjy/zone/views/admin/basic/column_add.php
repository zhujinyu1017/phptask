<?php $this->load->view('admin/public/header.php');?>
<body>
	<div class="container-full ">
		<?php $this->load->view('admin/public/top');?>
		<div class="row common-content">
			<?php $this->load->view('admin/public/left');?>
			<div class="common-right">
				<div class="content">
					<div class="content-title">栏目添加<div class="pull-right"><a href="<?php echo base_url('admin/basic/column');?>"><i class="icon-edit"></i>栏目管理</a></div></div>
					<form  method="post" class="w20p mt25">
						<div class="form-group">
							<label for="name">栏目名</label>
							<input type="text" class="form-control" name="name" id="name" placeholder="栏目名">
						</div>
						<div class="form-group">
							<label for="rank">排序</label>
							<input type="text" class="form-control" name="rank" id="rank" placeholder="排序">
						</div>
						<div class="form-group">
							<label for="visible">是否显示</label>
							<label>
								<input type="radio" name="visible" id="" value="1" checked>显示								
							</label>
							<label>
								<input type="radio" name="visible" id="" value="0" >隐藏
							</label>
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
			var rank=$("#rank").val();
			var visible=$("input[name='visible']:checked").val();
			if(!check_null(name,'栏目名不可为空')){
				return;
			}else if(!check_null(rank,'排序不可为空')){
				return;
			}else{
				$.ajax({ 
					url: "<?php echo base_url('admin/basic/ajax_columnadd')?>",
					type: "POST", 
					dataType: "json",
                           async:false,//表示只有ajax执行完毕了才继续往下执行
                           data: {name:name,rank:rank,visible:visible},        
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