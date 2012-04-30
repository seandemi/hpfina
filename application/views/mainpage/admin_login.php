<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>财务管理系统登录</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css" type="text/css" media="all" />
<style type="text/css">
body {
	background: #75cbfa url('<?php echo base_url(); ?>img/login_bg.gif') repeat-x left
		top;
}
</style>
<script type="text/javascript">
function doSubmit(){
	var yuangongbianhao=document.getElementById("yuangongbianhao").value;
	var password=document.getElementById("password").value;
	if((yuangongbianhao!="")&&(password!="")){
		return true;
		}
	else {
		alert("员工编号或者密码不能为空！");
		return false;
		}
}

</script>
</head>
<body>
<div class="login">
<div class="login_bg">
<div class="login_bg2">
<div class="login_title">
<!--<form name="login" action="<?php echo base_url();?>login/check" method="post">-->

<!--<form name="login"  method="post">-->

<?php 
	$attributes = array('name' => 'login');
    echo form_open('login/check', $attributes);
	?>
<div class="login_left">
<!-- <p><label>姓名：</label><input name="username" value="" class="f" /></p> -->
<div class="clear"></div>
<p><label>编号：</label>
	<input  name="yuangongbianhao" id="yuangongbianhao" value=""	class="f" />
</p>
<div class="clear"></div>
<p><label>密码：</label><input type="password" id="password" name="password" value=""	class="f" /></p>
</div>
<div class="login_right">
	<input type="hidden" name="submit" value="true" />
	<input type="image" name="submit" onclick="return doSubmit();" src="<?php echo base_url(); ?>img/login_btn.gif" />

</div>
<div class="clear"></div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>