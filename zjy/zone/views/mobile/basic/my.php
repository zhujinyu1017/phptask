<?php $this->load->view('mobile/public/header.php'); ?>
<link rel="stylesheet" href="<?php echo base_url('zone/css/mobile/index.css'); ?>">
</head>
<body class="<?php echo str_replace('/', '', $this->router->directory) . '_' . $this->router->class . '_' . $this->router->method . ' d_' . str_replace('/', '', $this->router->directory) . ' c_' . $this->router->class; ?>">
<?php $this->load->view('mobile/public/header-back.php'); ?>
<article class="mt44 mb50">
	<div class="header">
		<div class="avatarBox">
		<?php if(!empty($_COOKIE['avatar'])) :?>
			<img src="<?php echo base_url($_COOKIE['avatar']);?>" class="avatar pull-left">
		<?php else: ?>
			<img src="<?php echo base_url('zone/images/common/avatar.png');?>" class="avatar pull-left">
		<?php endif; ?>
		</div>
		<?php if(!empty($user['name'])) :?>
		<div class="tc line-h36 font-98 font-14"><?php echo $user['name'];?></div>
		<?php else:?>
		<a href="<?php echo base_url('mobile/join/index')?>" class="display-b tc font-blue line-h36 a-under">请先登录</a>
		<?php endif;?>
	</div>
	<div class="plr10 bgWhite tc line-h44 ">
		<div class="zjy-flex-box">
			<a class="zjy-flex-1" href="<?php echo base_url('mobile/basic/follow');?>">最近关注</a>
			<span>|</span>
			<a class="zjy-flex-1" href="<?php echo base_url('mobile/basic/collection');?>">我的收藏</a>
		</div>
	</div>
	<div class="bgWhite tc border-t">
		<?php foreach ($list as $key1 => $v2): ?>
			<div class="zjy-flex-box">
				<?php foreach ($v2 as $key => $v): ?>
					<a href="<?php echo base_url('mobile/basic/tag') . '/' . $v['id']; ?>" class="zjy-flex-1 line-h44 border-r border-b font-blue"><?php echo $v['name'];?></a>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</div>
</article>
<?php $this->load->view('mobile/public/footer.php'); ?>
<?php $this->load->view('mobile/public/footerEnd.php'); ?>
