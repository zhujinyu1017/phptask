<?php $this->load->view('mobile/public/header.php'); ?>
<link rel="stylesheet" href="<?php echo base_url('zone/css/mobile/index.css'); ?>">
</head>
<body class="<?php echo str_replace('/', '', $this->router->directory) . '_' . $this->router->class . '_' . $this->router->method . ' d_' . str_replace('/', '', $this->router->directory) . ' c_' . $this->router->class; ?>">
<?php $this->load->view('mobile/public/header-back.php'); ?>
<article class="mt54">
	<div class="mlr10 mb50 mt10">
		<div class="content"><?php echo $info[0]['content'];?></div>
		<div class="zjy-flex-box">
			<div class="font-99 font-14">
				<span>阅读152</span>
			</div>
			<div class="zjy-flex-1 tr">
				<a class="a-red-border guanzu" data-id="<?php echo $info[0]['id'];?>"><?php if($isfollow):?>已关注<?php else:?>关注<?php endif;?></a>
				<a class="a-green-border border-radius0 store" data-id="<?php echo $info[0]['id'];?>"><?php if($iscollection):?>已收藏<?php else:?>收藏<?php endif;?></a>
			</div>
		</div>
	</div>
</article>
<script src="<?php echo base_url('zone/js/common/submit-basic.js');?>"></script>
<script>
	$(".store").click(function(){
		var $id=$(this).attr('data-id');
		$.ajax({
			url: "<?php echo base_url('mobile/basic/ajax_article_store')?>",
			type: "POST",
			dataType: "json",
			async:false,//表示只有ajax执行完毕了才继续往下执行
			data: {articleID:$id},
			error: function(){
				console.log('Error loading XML document');
			},
			success: function(data,status) {
				if(!data.status){
					layer.msg(data.message);
				}else{
					$(".store").html("已收藏");

				}
			}
		});

	});
	$(".guanzu").click(function(){
		var $id=$(this).attr('data-id');
		$.ajax({
			url: "<?php echo base_url('mobile/basic/ajax_article_guanzu')?>",
			type: "POST",
			dataType: "json",
			async:false,//表示只有ajax执行完毕了才继续往下执行
			data: {articleID:$id},
			error: function(){
				console.log('Error loading XML document');
			},
			success: function(data,status) {
				if(!data.status){
					layer.msg(data.message);
				}else{
					$(".guanzu").html("已关注");

				}
			}
		});

	});
</script>
<?php $this->load->view('mobile/public/footerEnd.php'); ?>
