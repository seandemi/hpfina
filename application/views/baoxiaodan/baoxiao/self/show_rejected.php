<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>�������ϵͳ-����������</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/Style.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/Public.css" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/title.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/baoxiaodan.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/public.js"></script>
<script type="text/javascript">

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
<!--ͷ����ʽ-->
 <?php 
   //    $top_arr['xingming']=$xingming;
       $this->load->view('mainpage/top',$top);
 ?>

<div class="mainbox">
<!--ͷ����ʽ-->
  <?php
       
       $this->load->view('mainpage/normal_header');
       if($basic['number']>0){
       $this->load->view('baoxiaodan/baoxiao/self/show_reject',$basic);
       }
       else {
       	    $this->load->view('baoxiaodan/baoxiao/error');       	
       }
  ?>


</div>

<div style="clear: both;"></div>

<!--������ʽ����-->
  <?php  
  $this->load->view('mainpage/footer');
  ?>
  
</body>

</html>
	