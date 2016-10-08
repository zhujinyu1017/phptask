<?php $this->load->view('admin/public/header.php');?>
<body>
	<div class="container-full ">
		<?php $this->load->view('admin/public/top');?>
		<div class="row common-content">
			<?php $this->load->view('admin/public/left');?>
			<div class="common-right">
				<div class="content">
					<div class="content-title">栏目管理 <div class="pull-right"><a href="<?php echo base_url('admin/basic/tag_add');?>"><i class="icon-edit"></i>添加栏目</a></div></div>
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
									<tr>
										<td><?php echo $v['id'];?></td>
										<td><?php echo $v['name'];?></td>
										<td class="operation"><a href="<?php echo base_url('admin/basic/tag_modify/id/'.$v['id']);?>" class="mr10"><i class="icon-cog"></i>修改</a><a href="javascript:;" class="del font-red" data-id="<?php echo $v['id'];?>"><i class="icon-trash"></i>删除</a></td>
									</tr>
								<?php endforeach;?> 
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('zone/js/common/layer.js');?>"></script>
	<script>
		$(".del").click(function(){
			var $id=$(this).attr('data-id');
			$.ajax({ 
				url: "<?php echo base_url('admin/basic/ajax_tag_del')?>",
				type: "POST", 
				dataType: "json",
                async:false,//表示只有ajax执行完毕了才继续往下执行
                data: {id:$id},        
                error: function(){  
                	console.log('Error loading XML document');  
                },        
                success: function(data,status) { 
                	if(!data.status){
                		layer.msg(data.message);
                	}else{
                		layer.msg(data.message);
                		window.location.reload();
                	}   
                }
            }); 

		});
	</script>
<?php $this->load->view('admin/public/footer');?>