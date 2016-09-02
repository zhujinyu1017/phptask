<?php $this->load->view('admin/public/header.php');?>
<body>
	<div class="container-full ">
		<?php $this->load->view('admin/public/top');?>
		<div class="row common-content">
			<?php $this->load->view('admin/public/left');?>
			<div class="common-right">
				<div class="content">
					<div class="content-title">文章分类管理 <div class="pull-right"><a href="<?php echo base_url('admin/basic/column_add');?>"><i class="icon-edit"></i>添加栏目</a></div></div>
					<div class="tab-table">
						<table class="table table-bordered zebra-line">
							<thead>
								<tr>
									<th width="20%">#</th>
									<th width="20%">分类</th>
									<th width="20%">操作</th>
								</tr>
							</thead>
							<tbody>      			
								<?php foreach ($info as $v):?>
									<tr  class="fenlei" contenteditable="true">
										<td><?php echo $v['id'];?></td>
										<td class="name_list" ><?php echo $v['name'];?></td>
										<td class="operation"><a href="javascript:;" class="update mr10 " data-id="<?php echo $v['id'];?>"><i class="icon-save"></i>保存</a><a href="javascript:;" class="del font-red" data-id="<?php echo $v['id'];?>"><i class="icon-trash"></i>删除</a><!--<a href="<?php echo base_url('admin/basic/column_modify/id/'.$v['id']);?>" class="mr10"><i class="icon-cog"></i>修改</a>--></td>
									</tr>
								<?php endforeach;?> 
							</tbody>
						</table>
						<a href="#" >添加分类</a>
						<form  method="post" class="w20p mt25">
						<div class="form-group">
							<label for="name">分类名</label>
							<input type="text" class="form-control" name="name" id="name" placeholder="栏目名">
						</div>
						<div class="tip-error"></div>
						<button type="button" value="Submit" id="Submit" class="btn btn-default col-xs-12 col-sm-12 col-md-12">提交</button>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('zone/js/common/layer.js');?>"></script>
	<script src="<?php echo base_url('zone/js/common/rule-validation.js');?>"></script>
	<script>
		$(function(){
			$(".fenlei").focus(function(){
				$(this).find(".update").show();
			})
			$(".fenlei").blur(function(){
				$(this).find(".update").hide();
			})
			$(".del").click(function(){
				var $id=$(this).attr('data-id');
				$.ajax({ 
					url: "<?php echo base_url('admin/basic/ajax_classify_del')?>",
					type: "POST", 
					dataType: "json",
					async:false,
					data: {id:$id},        
					error: function(){  
						console.log('Error loading XML document');  
					},        
					success: function(data,status) { 
						if(!data.status){
							layer.msg(data.message);
						}else{
							$(this).parent().parent().remove();
							layer.msg(data.message);
							location.reload(true);
						}   
					}
				}); 
			});
			$(".update").click(function(){
				var $id=$(this).attr('data-id');
				var name=$(this).parent().parent().find(".name_list").text();
				$.ajax({ 
					url: "<?php echo base_url('admin/basic/ajax_classifynmodify')?>",
					type: "POST", 
					dataType: "json",
					async:false,
					data: {id:$id,name:name},        
					error: function(){  
						console.log('Error loading XML document');  
					},        
					success: function(data,status) { 
						if(!data.status){
							console.log(data);
							// layer.msg(data.message);
						}else{
							// layer.msg(data.message);
							location.reload(true);
						}   
					}
				}); 
			});
			$("#Submit").click(function(){
				var name=$("#name").val();
				if(!check_null(name,'栏目名不可为空')){
					return;
				}else{
					$.ajax({ 
						url: "<?php echo base_url('admin/basic/ajax_classifyadd')?>",
						type: "POST", 
						dataType: "json",
                           async:false,//表示只有ajax执行完毕了才继续往下执行
                           data: {name:name},        
                           error: function(){  
                           	console.log('Error loading XML document');  
                           },        
                           success: function(data,status) { 
                           	if(!data.status){
                           		$(".tip-error").html(data.message);
                           	}else{
                           		layer.msg(data.message);
                           		window.location.reload(true);
                           	}   
                           }
                       });     
				}
			})
		})
	</script>
<?php $this->load->view('admin/public/footer');?>