<?php $this->load->view('admin/public/header.php');?>
<body>
	<div class="container-full ">
		<?php $this->load->view('admin/public/top');?>
		<div class="row common-content">
			<?php $this->load->view('admin/public/left');?>
			<div class="common-right">
				<div class="content">
					<div class="content-title">文章修改<div class="pull-right"><a href="<?php echo base_url('admin/basic/article');?>"><i class="icon-edit"></i>文章管理</a></div></div>
					<form  method="post" class="w20p mt25">
						<input type="hidden" class="form-control" name="id" id="id" placeholder="id" value="<?php echo $id?>">
						<div class="form-group">
							<label>标题</label>
							<input type="text" class="form-control" name="title" id="title" placeholder="标题" value="<?php echo $title?>">
						</div>
						<div class="form-group">
							<label>分类</label>
							<select class="classify">
								<?php foreach ($fenlei as $v):?>
									<option value="<?php echo $v['name'];?>" <?php if($v['name']==$classify) :?>selected<?php endif; ?>><?php echo $v['name'];?></option>
								<?php endforeach;?>
							</select>
						</div>
						<div class="form-group">
							<label>是否显示缩略图</label>
							<label>
								<input type="radio" name="isthumb" id="" value="1"
									   <?php if ($isthumb==1): ?>checked<?php endif; ?>>显示
							</label>
							<label>
								<input type="radio" name="isthumb" id="" value="0" <?php if ($isthumb==0): ?>checked<?php endif; ?>>隐藏
							</label>
						</div>
						<div class="form-group addImg">
							<label class="mr10">缩略图</label>
							<input  type="button" class="datepicker" onclick="upImage();" value="上传图片" id="upload_ue" />
							<input type="text" id="picture" name="thumb" value="<?php echo $thumb?>"/>
						</div>
						<div class="form-group" style="width: 700px;">
							<label>内容</label>
							<textarea id="editor" width="700"  name="content"><?php echo $content?></textarea>
						</div>

						<div class="tip-error"></div>
						<button type="button" value="Submit" id="Submit" class="btn btn-default col-xs-12 col-sm-12 col-md-12">提交</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('zone/js/common/layer.js');?>"></script>
	<script src="<?php echo base_url('zone/js/common/rule-validation.js');?>"></script>
	<script type="text/javascript" charset="utf-8" src="<?php echo base_url('zone/js/ueditor/ueditor.config.js');?>"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo base_url('zone/js/ueditor/ueditor.all.js');?>"></script>
	<script>
		var _editor = UE.getEditor('upload_ue');
		_editor.ready(function () {
			_editor.hide();
			_editor.addListener('beforeinsertimage', function (t, arg) {
                 //将地址赋值给相应的input,只去第一张图片的路径
                var imgs;
                for(var a in arg){
                	imgs +=arg[a].src+',';
                }

                $("#picture").attr("value", arg[0].src);
                //图片预览
                $("#preview").attr("src", arg[0].src);
            })
		});
		//弹出图片上传的对话框
		function upImage() {
			var myImage = _editor.getDialog("insertimage");
			myImage.open();
		}
		var ue = UE.getEditor('editor', {});

		$("#Submit").click(function(){
			var id=$("#id").val();
			var title=$("#title").val();
			var classify=$('.classify option:selected') .val();
			var isthumb=$("input[name='isthumb']:checked").val();
			var picture=$("#picture").val();
			var nr=ue.getContent();
			if(!check_null(title,'标题不可为空')){
				return;
			}else if(!check_null(nr,'内容不可为空')){
				return;
			}else{
				$.ajax({ 
					url: "<?php echo base_url('admin/basic/ajax_article_modify')?>",
					type: "POST", 
					dataType: "json",
                           async:false,//表示只有ajax执行完毕了才继续往下执行
                           data: {id:id,title:title,classify:classify,isthumb:isthumb,thumb:picture,content:nr},
                           error: function(){  
                           	console.log('Error loading XML document');  
                           },        
                           success: function(data,status) { 
                           	if(!data.status){
                           		$(".tip-error").html(data.message);
                           	}else{
                           		layer.msg(data.message);
                           		window.location.href=data.location;
                           	}   
                           }
                       });     
			}
		})
	</script>
<?php $this->load->view('admin/public/footer');?>