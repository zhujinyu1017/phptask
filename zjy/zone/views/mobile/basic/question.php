<?php $this->load->view('mobile/public/header.php'); ?>
<link rel="stylesheet" href="<?php echo base_url('zone/css/mobile/index.css'); ?>">
</head>
<body class="<?php echo str_replace('/', '', $this->router->directory) . '_' . $this->router->class . '_' . $this->router->method . ' d_' . str_replace('/', '', $this->router->directory) . ' c_' . $this->router->class; ?>">
<?php $this->load->view('mobile/public/header-back.php'); ?>
<article class="mt54 mb60">
	<?php foreach ($list as $key1 => $v2): ?>
		<div class="mlr10 bgWhite border-r5 ">
			<div class="p15 mb20">
				<?php foreach ($v2 as $key => $v): ?>
				<?php if($key % 3 == 0):?>
				<div class="ptb5 pos-r">
					<a href="<?php echo base_url('mobile/basic/articleDetail').'/'.$v['id']; ?>" class="display-b">
						<?php if(!empty($v['thumb'])):?>
							<img src="<?php echo base_url($v['thumb']); ?>" class="w100p">
						<?php else:?>
							<img src="<?php echo base_url('zone/images/common/getqrcode.png');?>" class="w100p">
						<?php endif;?>
						<div class="pos-a" style="bottom: 0;left: 0;height: 30px;width: 98%;background: rgba(0, 0, 0, 0.6); color: #fff;line-height: 30px;padding-left: 2%;overflow: hidden;"><?php echo $v['title'] ?></div>
					</a>
				</div>
				<?php elseif($key % 3 == 1):?>
				<div class="pb10 pt10">
					<a href="<?php echo base_url('mobile/basic/articleDetail') . '/' . $v['id']; ?>" class="zjy-flex-box font-66">
						<div class="zjy-flex-1">
							<div class="title"><?php echo $v['title'] ?></div>
						</div>
						<div><img src="<?php echo $v['thumb'] ?>" width="50" height="50"></div>
					</a>
				</div>
				<?php elseif($key %3 == 2):?>
				<div class="pt10 border-t">
					<a href="<?php echo base_url('mobile/basic/articleDetail') . '/' . $v['id']; ?>" class="zjy-flex-box font-66">
						<div class="zjy-flex-1">
							<div class="title"><?php echo $v['title'] ?></div>
						</div>
						<div><img src="<?php echo $v['thumb'] ?>" width="50" height="50"></div>
					</a>
				</div>
				<?php endif;?>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endforeach; ?>
</article>
<?php $this->load->view('mobile/public/footer.php'); ?>
<?php $this->load->view('mobile/public/footerEnd.php'); ?>
