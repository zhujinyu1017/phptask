<div class="bg-light-blue admin-top pos-r m0">
  <div class="title"><span class="mr10"><?php echo title;?></span><!--<i class="icon-flag"></i>--></div>
  <div class="information-set">
  <?php if(!empty($_COOKIE['avatar'])) :?>
    <img src="<?php echo base_url($_COOKIE['avatar']);?>" class="avatar pull-left">
  <?php else: ?>
   <img src="<?php echo base_url('zone/images/common/avatar.png');?>" class="avatar pull-left">
  <?php endif; ?>
    <div class="btn-group mt25">
      <div class="dropdown">
        <button id="nickname" type="button">
          <?php echo $_COOKIE['username'];?>
          <span class="icon-cog"></span>
        </button>
        <ul class="setting-box">
          <li><a href="<?php echo base_url('admin/join/logout');?>">退出</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>