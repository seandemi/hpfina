<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>财务管理系统-修改密码</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/Style.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/Public.css" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/title.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/g.base.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/change_password.js"></script>


<!--[if lte IE 6]>
<style type="text/css">
body {
    behavior:url("css/csshover3.htc");
}
</style>

<![endif]-->

<script type="text/javascript" src="<?php echo base_url(); ?>js/public.js"></script>

</head>

<body>
<!--头部样式-->
 <?php 
   //    $top_arr['xingming']=$xingming;
       $this->load->view('mainpage/top',$top);
 ?>

<div class="mainbox">
<!--头部样式-->
  <?php
       
       $this->load->view('mainpage/normal_header');
       $this->load->view('user/password');
  ?>

<div style="clear: both;"></div>

</div>

<div style="clear: both;"></div>

<!--主体样式结束-->
  <?php  
  $this->load->view('mainpage/footer');
  //include('normal_header.php');?>
  
</body>

</html>
