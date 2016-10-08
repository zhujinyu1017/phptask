<?php $this->load->view('mobile/public/header.php'); ?>
</head>
<body>
<?php $this->load->view('mobile/public/header-back.php'); ?>
<div class="container mt44">
	<div class="row">
		<div>
			<form method="post">
				<div class="formcontent bgWhite border-bt">
					<div class="formControl zjy-flex-box border-b">
						<span class="icon-user font-18 mr5 font-98"></span>
						<input type="text" name="name" value="" size="50" id="name" class="zjy-flex-1"
							   placeholder="请输入用户名"/>
					</div>
					<div class="formControl zjy-flex-box ">
						<span class="icon-key font-18 mr5 font-98"></span>
						<input type="password" name="password" value="" size="50" id="password" class="zjy-flex-1"
							   placeholder="请输入密码"/>
					</div>
				</div>
				<div class="tr line-h25 mr10">
					<a href="<?php echo base_url('mobile/join/register') ?>"  class="a-under font-98">注册</a>
				</div>
				<a href="javascript:void(0)" id="Submit" class="btn btn-themeDefault mlr10 font-white mt10">登录</a>
			</form>
		</div>
	</div>
</div>
<script src="<?php echo base_url('zone/js/common/submit-basic.js'); ?>"></script>
<script type="text/javascript">
	$("#Submit").click(function () {
		var name = $("#name").val();
		var password = $("#password").val();
		if (!check_null(name, '账户不可为空')) {
			return;
		} else if (!check_password()) {
			return;
		} else {
			$.ajax({
				url: "<?php echo base_url('mobile/join/ajax_login')?>",
				type: "POST",
				dataType: "json",
				async: false,//表示只有ajax执行完毕了才继续往下执行
				data: {name: name, password: password},
				error: function () {
					console.log('Error loading XML document');
				},
				success: function (data, status) {
					if (!data.status) {
						layer.msg(data.message);
					} else {
						window.location.href = data.location;
					}
				}
			});
		}

	})
</script>
<?php $this->load->view('mobile/public/footerEnd.php'); ?>