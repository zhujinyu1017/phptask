<?php foreach ($list2 as $key => $v): ?>
	<div style="padding:5px;border:1px solid #f00;">
	<?php foreach ($v as $key2 => $v2): ?>
		<?php if ($key2 % 3 == 0): ?>
			<div style="background: #000; height: 30px;width: 200px;color: #fff;"><?php echo $v2 ?></div>
		<?php elseif ($key2 % 3 == 1): ?>
			<div style="background: #666;height: 30px;width: 200px;color: #fff;"><?php echo $v2 ?></div>
		<?php elseif ($key2 % 3 == 2): ?>
			<div style="background: #f00;height: 30px;width: 200px;color: #fff;"><?php echo $v2 ?></div>
		<?php endif; ?>
	<?php endforeach; ?>
	</div>
<?php endforeach; ?>
