<?php $this->load->view('mobile/public/header.php'); ?>
<link rel="stylesheet" href="<?php echo base_url('zone/css/mobile/index.css'); ?>">
</head>
<body class="<?php echo str_replace('/', '', $this->router->directory) . '_' . $this->router->class . '_' . $this->router->method . ' d_' . str_replace('/', '', $this->router->directory) . ' c_' . $this->router->class; ?>">
<?php $this->load->view('mobile/public/header-back.php'); ?>
<article class="mt54 mb50">
	<div class="mlr10 mb50">
		<?php foreach ($list1 as $key => $v): ?>
			<div class="pb10 border-b mt10">
				<a href="<?php echo base_url('mobile/basic/articleDetail') . '/' . $v['id']; ?>" class="zjy-flex-box">
					<?php if (!empty($v['thumb'])): ?>
						<img src="<?php echo base_url($v['thumb']); ?>" width="80" height="60" class="mr10">
					<?php else: ?>
						<img src="<?php echo base_url('zone/images/common/getqrcode.png'); ?>" width="80" height="60"
							 class="mr10">
					<?php endif; ?>
					<div class="zjy-flex-1 line-h25">
						<div
							class="font-14 articleTitle"><?php echo strlen($v['title']) > 76 ? substr($v['title'], 0, 76) . '...' : $v['title']; ?></div>
						<div class="font-98 font-12 tr"><span
								class="mr20"><?php echo strstr($v['updateTime'], ' ', true); ?></span><span><i
									class="icon-user mr5"></i><?php echo $v['follow']; ?></span></div>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</article>
<?php $this->load->view('mobile/public/footer.php'); ?>
<?php $this->load->view('mobile/public/footerEnd.php'); ?>
