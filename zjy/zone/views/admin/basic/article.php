<?php $this->load->view('admin/public/header.php');?>
<body>
	<div class="container-full ">
		<?php $this->load->view('admin/public/top');?>
		<div class="common-content">
			<?php $this->load->view('admin/public/left');?>
			<div class="common-right">
				<div class="content">
					<div class="content-title">文章管理 <div class="pull-right"><a href="<?php echo base_url('admin/basic/article_add');?>"><i class="icon-edit"></i>文章添加</a></div></div>
					<div class="tab-table">
						<table class="table table-bordered zebra-line">
							<thead>
								<tr>
									<th>#</th>
									<th>分类</th>
									<th width="80">是否显示缩略图</th>
									<th>缩略图</th>
									<th>首页是否显示</th>
									<th>标题</th>
									<th width="80">详情</th>
									<th width="120">操作</th>
								</tr>
							</thead>
							<tbody>      			
								<?php foreach ($info as $key =>$v ):?>
									<tr>
										<td><?php echo $v['id'];?></td>
										<td><?php echo $v['classify'];?></td>
										<?php if($v['isthumb']) :?>
											<td>是</td>
											<td><img src="<?php echo base_url($v['thumb']);?>" alt="" width="30" height="30"></td>
										<?php else :?>
											<td>否</td>
											<td>无</td>
										<?php endif ;?>
										<?php if($v['isIndex']) :?>
											<td>是</td>
										<?php else :?>
											<td>否</td>
										<?php endif ;?>
										<td><?php echo $v['title'];?></td>
										<td>
											<div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $key;?>">查看</div>
											<div class="modal fade" id="myModal<?php echo $key;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" id="myModalLabel"><?php echo $v['title'];?></h4>
														</div>
														<div class="modal-body break-word overflow-h">
															<?php echo $v['content'];?>
														</div>
														
													</div>
												</div>
											</div>



										</td>
										<td class="operation"><a href="<?php echo base_url('admin/basic/article_modify/id/'.$v['id']);?>" class="mr10"><i class="icon-cog"></i>修改</a><a href="javascript:;" class="del font-red" data-id="<?php echo $v['id'];?>"><i class="icon-trash"></i>删除</a></td>
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
	<script src="<?php echo base_url('zone/js/common/bootstrap.min.js');?>"></script>
	<script>
		$(".del").click(function(){
			var $id=$(this).attr('data-id');
			$.ajax({ 
				url: "<?php echo base_url('admin/basic/ajax_article_del')?>",
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