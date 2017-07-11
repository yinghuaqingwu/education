<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>添加用户 - H-ui.admin v3.0</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-member-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">课程名称：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select class="select" size="1" name="course_id">
					@foreach($course as $k => $v)
					<option value="{{$k}}">{{$v}}</option>
					@endforeach
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课时名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" name="lesson_name">
			</div>
		</div>
		<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
		<script src="/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="/uploadify/uploadify.css">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上传封面：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input id="file_upload" name="file_upload" type="file">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>头像地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<p><img src="" id="show_pic" alt="" width="100" height="100"></p>
				<p><input name="cover_img" id="cover_img" class="input-text" type="text" readonly='readonly'></p>
			</div>
		</div>
		<script type="text/javascript">
            <?php $timestamp = time();?>
    			$(function() {
                $('#file_upload').uploadify({
                    'formData'     : {
                        'timestamp' : '<?php echo $timestamp;?>',
                        '_token'     : '{{csrf_token()}}'
                    },
                    'swf'      : '/uploadify/uploadify.swf',
                    'uploader' : '/admin/lesson/up_pic',
                    'onUploadSuccess' : function(file, data, response) {
                        var obj = JSON.parse(data);
                        if(obj.success === true)
                        {
                            $('#show_pic').attr('src',obj.path);
                            $('#cover_img').val(obj.path);
                        }
                    }
                });
            });
		</script>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上传视频：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input id="upload" name="upload" type="file">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>视频地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<p><input name="video_address" id="video_address" class="input-text" type="text" readonly='readonly'></p>
			</div>
		</div>
		<script type="text/javascript">
            <?php $timestamp = time();?>
    			$(function() {
                $('#upload').uploadify({
                    'formData'     : {
                        'timestamp' : '<?php echo $timestamp;?>',
                        '_token'     : '{{csrf_token()}}'
                    },
                    'swf'      : '/uploadify/uploadify.swf',
                    'uploader' : '/admin/lesson/up_video',
                    'onUploadSuccess' : function(file, data, response) {
                        var obj = JSON.parse(data);
                        if(obj.success === true)
                        {

                            $('#video_address').val(obj.path);
                        }
                    }
                });
            });
		</script>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课时时长：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input name="lesson_duration" class="input-text" type="number">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="course_desc" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" onKeyUp="$.Huitextarealength(this,100)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->

<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	/*
	$("#form-member-add").validate({
		rules:{
			username:{
				required:true,
				minlength:2,
				maxlength:16
			},
			sex:{
				required:true,
			},
			mobile:{
				required:true,
				isMobile:true,
			},
			email:{
				required:true,
				email:true,
			},
			uploadfile:{
				required:true,
			},
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			//$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			//parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});*/

    $("#form-member-add").submit(function(env){
        env.preventDefault();
        var data = $(this).serialize();
        $.ajax({
			type:'post',
			url:'/admin/lesson/add',
			data:data,
			dataType:'json',
			headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'},
			success:function(msg){
			    if(msg.success === true)
				{
				    layer.alert('添加成功',{icon:6},function(){
                        parent.window.location.href = parent.window.location.href;
                        layer_close();
					});
				}else
				{
				    layer.alert('添加失败【'+mag.errorinfo+'】',{icon:5});
				}
			}
		})
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>