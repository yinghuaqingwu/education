<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
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
<title>添加管理员 - 管理员管理 - H-ui.admin v2.4</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>员工名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" name="username" value="{{$manager->username}}">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off" value="{{$manager->password}}" placeholder="密码" id="password" name="password">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" value="{{$manager->password}}" name="password_confirmation">
		</div>
	</div>
	<div class="row cl">
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script src="/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="/uploadify/uploadify.css">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上传头像：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input id="file_upload" name="file_upload" type="file">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>头像地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<p><img src="{{$manager->mg_pic}}" id="show_pic" alt="" width="100" height="100"></p>
				<p><input name="mg_pic" id="mg_pic" value="{{$manager->mg_pic}}" class="input-text" type="text" readonly='readonly'></p>
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
                    'uploader' : '/admin/manager/up_pic',
                    'onUploadSuccess' : function(file, data, response) {
                        var obj = JSON.parse(data);
                        if(obj.success === true)
                        {
                            $('#show_pic').attr('src',obj.pathinfo);
                            $('#mg_pic').val(obj.pathinfo);
                        }
                    }
                });
            });
		</script>

		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="radio-box">
				<input name="mg_sex" type="radio" id="sex-1" value="男" @if($manager->mg_sex == '男') checked @endif>
				<label for="sex-1">男</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="sex-2" name="mg_sex" value="女" @if($manager->mg_sex == '女') checked @endif>
				<label for="sex-2">女</label>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{$manager->mg_phone}}" placeholder="" id="phone" name="mg_phone">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="@" value="{{$manager->mg_email}}" name="mg_email" id="mg_email">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">角色：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="mg_role_ids" size="1">
				@foreach($info as $k => $v)
				<option value="{{$k}}" @if($manager->mg_role_ids == $k) selected @endif>{{$v}}</option>
					@endforeach
			</select>
			</span> </div>
	</div>
		<script type="text/javascript" charset="utf-8" src="/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>
		<script type="text/javascript" charset="utf-8" src="/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
		<script type="text/javascript" charset="utf-8" src="/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
		<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">备注：</label>
		<div class="formControls col-xs-8 col-sm-9">
			{{--<textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)">--}}
			{{--</textarea>--}}
			<script id="mg_remark" type="text/plain" name="mg_remark">{!!$manager->mg_remark!!}</script>
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
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
$(function(){
    var ue = UE.getEditor('mg_remark',{
        toolbars: [[
            'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'directionalityltr', 'directionalityrtl', 'indent', '|',
        ]]
	});

    $('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	/*
	$("#form-admin-add").validate({
		rules:{
			adminName:{
				required:true,
				minlength:4,
				maxlength:16
			},
			password:{
				required:true,
			},
			password2:{
				required:true,
				equalTo: "#password"
			},
			sex:{
				required:true,
			},
			phone:{
				required:true,
				isPhone:true,
			},
			email:{
				required:true,
				email:true,
			},
			adminRole:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: 'post',
				url: "xxxxxxx" ,
				success: function(data){
					layer.msg('添加成功!',{icon:1,time:1000});
				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
					layer.msg('error!',{icon:1,time:1000});
				}
			});
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});*/
});
$(function(){
    $('#form-admin-add').submit(function(evt){
        evt.preventDefault();
        //获取数据
        var data = $(this).serialize();
        $.ajax({
            url : '/admin/manager/update/{{$manager->mg_id}}',
            type : 'post',
            data : data,
            dataType : 'json',
            headers : {'X-CSRF-TOKEN':'{{csrf_token()}}'},
            success : function(msg){
                if(msg.success === true)
                {
                    layer.alert('更新成功',function(){
                        parent.window.location.href = parent.window.location.href;
                        layer_close();
                    })
                }else
                {
                    layer.alert('更新失败',{icon:5});
                }
            }
        });
    });
})
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>