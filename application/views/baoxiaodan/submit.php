<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>财务管理系统-提交报销单</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/Style.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/Public.css" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/title.js"></script>
<script src="<?php echo base_url(); ?>js/protable.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/baoxiaodan.css" />
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url(); ?>css/ui-lightness/jquery-ui-1.8.16.custom.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/timepick/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/timepick/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/timepick/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/timepick/jquery-ui-sliderAccess.js"></script>
<script src="<?php echo base_url(); ?>js/timepick/jquery.ui.datepicker-zh-CN.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/public.js"></script>
<script type="text/javascript">
$(function(){
	$('.example-container > pre').each(function(i){
		eval($(this).text());
       });
    $( "#jiaoji_time" ).datepicker();
    $( "#lipin_time" ).datepicker();
    $( "#zichan_time" ).datepicker(); 
    $( "#tongyong_time" ).datepicker();
});
</script>
<!--[if lte IE 6]>
<style type="text/css">
body {
    behavior:url("css/csshover3.htc");
}
</style>
<![endif]-->
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
       $this->load->view('baoxiaodan/choose',$basic);
  ?>
</div>
<div style="clear: both;"></div>
<!--主体样式结束-->
  <?php  
  $this->load->view('mainpage/footer');
  //include('normal_header.php');?>  
</body>

</html>
	