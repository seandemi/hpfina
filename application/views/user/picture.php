<div class="w" id="regist">
  <ul class="tab" style="list-style-type:none">
	 <li class="line"><a href="<?=site_url('personal/index/')?>">基本信息</a></li>
      <li  class="line"><a href="<?=site_url('personal/detail/')?>">详细信息</a></li>
      <li  ><a href="<?=site_url('personal/password/')?>">修改密码</a></li>
       <li class="curr"><a href="<?=site_url('personal/photo/')?>">证件照</a></li>	
		</ul>
 <script type="text/javascript">
$(document).ready(function() {
	 
	/* $("#filename-input").change(function() {
		    $("#shadow-filename").val(this.files && this.files.length ?
		          this.files[0].name : this.value.replace(/^C:\\fakepath\\/i, ''));
		})*/

	$("#file").change(function(){  // 当 id 为 file 的对象发生变化时
   
	var data=document.getElementById("file").value;
	//window.alert(data); 
	
	
 $("#a").val($("#file").val());
	     
    });

 });
</script> 		
<form action="<?php echo base_url();?>personal/pro_photo" method="post" enctype="multipart/form-data" name="form1" style="padding-left:280px;">
  
     <div><font>选择待上传证件照:</font><input type="text" id="a" readonly="readonly"  onchange="changetarget();"/> 
	  
	  
	  <a href="javascript:void(0);" class="input">
		
       <input type="file" id="file" name="userfile"/>
	</a>
	<div style="clear:both;height:5px;"></div>
	<span style="color:#CC6621" >上传的证件照大小不能超过1M，分辨率不能超过2048*1536，图片格式仅限于gif、jpg、jpeg、png中的一种</span>
 </div>
 
  <!--   <input type="hidden" name="dopost" value="save" />-->
      <div id="mainCp">
        
        <div class="postForm">
         <!--  <label style="width:100px">选择证件照：</label>
            <input name="face" type="file" id="face" size="45" /> 
          </p> --> 
          <p class="cellBg">
            <label style="width:90px"><b>原来的头像：</b><br />
                	<a href="<?=site_url('personal/delete_photo/')?>">[删除旧头像]</a></label>
            <div id='faceview' class='overflow mTB10 litPic' style="width:180px;height:180px;text-align:center;vertical-align:middle;line-height:180px;display:table-cell;">
                 <?php  
            //    print_r($photo";
       					if($photo!='') 
       				//	{
       					//	$path=base_url().$photo;
       						echo " <img class='' src='$photo' style='_margin-top:expression(( 180 - this.height ) / 2);' />\r\n";
       				//	}
       			?>
              </div>
          </p>
          <p>
            <button class="button2" type="submit">更新</button>
            <button class="button2 ml10" type="reset">重设</button>
          </p>
    </div>
 </div>
 

</form>

		<!--[if !ie]>form end<![endif]-->
		
</div>
