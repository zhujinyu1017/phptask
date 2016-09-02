<?php $this->load->view('admin/public/header.php');?>
	<body>
<div class="container-full ">
	<?php $this->load->view('admin/public/top');?>
	<div class="row common-content">
		<?php $this->load->view('admin/public/left');?>
		<div class="common-right">
			<div class="content">
				<div class="content-title">用户管理 </div>
				<div class="tab-table">
					<table class="table table-bordered zebra-line">
						<thead>
						<tr>
							<th>#</th>
							<th >用户名</th>
							<th>昵称</th>
							<th>头像</th>
							<th >操作</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($info as $v):?>
							<tr>
								<td><?php echo $v['id'];?></td>
								<td><?php echo $v['name'];?></td>
								<td><?php echo $v['nicke'];?></td>
								<?php if($v['avatar']) :?>
									<td><img src="<?php echo base_url($v['avatar']);?>" alt="" width="20" height="20"></td>
								<?php else :?>
									<td class="tc"><img src="<?php echo base_url('zone/images/common/avatar-default1.png');?>" alt="" width="20" height="20"></td>
								<?php endif ;?>
								<td class="operation"><a href="javascript:;" class="del font-red" data-id="<?php echo $v['id'];?>"><i class="icon-trash"></i>删除</a></td>
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
			url: "<?php echo base_url('admin/basic/ajax_user_del')?>",
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