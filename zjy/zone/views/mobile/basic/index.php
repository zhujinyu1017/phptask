<?php $this->load->view('mobile/public/header.php'); ?>
<link rel="stylesheet" href="<?php echo base_url('zone/css/common/swiper.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('zone/css/mobile/index.css'); ?>">
</head>
<body class="<?php echo str_replace('/', '', $this->router->directory) . '_' . $this->router->class . '_' . $this->router->method . ' d_' . str_replace('/', '', $this->router->directory) . ' c_' . $this->router->class; ?>">
<?php $this->load->view('mobile/public/header-back.php'); ?>
<article class="mt44 mb60">
	<div class="swiper-container" style="height: 160px;">
		<div class="swiper-wrapper">
			<?php foreach ($info as $key =>$v ): ?>
				<div class="swiper-slide"><a href="<?php echo base_url('mobile/basic/articleDetail').'/'.$v['id']; ?>" class="aBlock" data-id="<?php echo $v['id'];?>"><img src="<?php echo base_url($v['thumb']);?>" class="w100p"/></a></div>
			<?php endforeach; ?>
		</div>
		<div class="swiper-pagination"></div>
	</div>
	<div class="mt10">
		<?php foreach ($list as $key => $v): ?>
			<div class="mlr10 bgWhite border-r5 ">
				<div class="p15 mb20">
					<a href="<?php echo base_url('mobile/basic/articleDetail').'/'.$v['id']; ?>">
						<div class="articleTitle"><?php echo $v['title'] ?></div>
						<div class="font-12 date"><?php echo strstr($v['updateTime'], ' ', true); ?></div>
						<div class="ptb5">
							<img src="<?php echo $v['thumb'] ?>" class="w100p">
						</div>
						<div class="describe font-98">
							<?php echo strlen($v['describe']) > 76 ? substr($v['describe'], 0, 76) . '...' : $v['describe']; ?>
						</div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<!--列表-->
</article>
<script src="<?php echo base_url('zone/js/common/swiper.min.js'); ?>"></script>
<script>
	var swiper = new Swiper('.swiper-container', {
		pagination: '.swiper-pagination',
		paginationClickable: true
	});
</script>
<?php $this->load->view('mobile/public/footer.php'); ?>
<?php $this->load->view('mobile/public/footerEnd.php'); ?>
