<div class="w" id="regist">
  <ul class="tab" style="list-style-type:none">
	 <li class="line"><a href="<?=site_url('personal/index/')?>">������Ϣ</a></li>
      <li  class="line"><a href="<?=site_url('personal/detail/')?>">��ϸ��Ϣ</a></li>
      <li  ><a href="<?=site_url('personal/password/')?>">�޸�����</a></li>
       <li class="curr"><a href="<?=site_url('personal/photo/')?>">֤����</a></li>	
		</ul>
 <script type="text/javascript">
$(document).ready(function() {
	 
	/* $("#filename-input").change(function() {
		    $("#shadow-filename").val(this.files && this.files.length ?
		          this.files[0].name : this.value.replace(/^C:\\fakepath\\/i, ''));
		})*/

	$("#file").change(function(){  // �� id Ϊ file �Ķ������仯ʱ
   
	var data=document.getElementById("file").value;
	//window.alert(data); 
	
	
 $("#a").val($("#file").val());
	     
    });

 });
</script> 		
<form action="<?php echo base_url();?>personal/pro_photo" method="post" enctype="multipart/form-data" name="form1" style="padding-left:280px;">
  
     <div><font>ѡ����ϴ�֤����:</font><input type="text" id="a" readonly="readonly"  onchange="changetarget();"/> 
	  
	  
	  <a href="javascript:void(0);" class="input">
		
       <input type="file" id="file" name="userfile"/>
	</a>
	<div style="clear:both;height:5px;"></div>
	<span style="color:#CC6621" >�ϴ���֤���մ�С���ܳ���1M���ֱ��ʲ��ܳ���2048*1536��ͼƬ��ʽ������gif��jpg��jpeg��png�е�һ��</span>
 </div>
 
  <!--   <input type="hidden" name="dopost" value="save" />-->
      <div id="mainCp">
        
        <div class="postForm">
         <!--  <label style="width:100px">ѡ��֤���գ�</label>
            <input name="face" type="file" id="face" size="45" /> 
          </p> --> 
          <p class="cellBg">
            <label style="width:90px"><b>ԭ����ͷ��</b><br />
                	<a href="<?=site_url('personal/delete_photo/')?>">[ɾ����ͷ��]</a></label>
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
            <button class="button2" type="submit">����</button>
            <button class="button2 ml10" type="reset">����</button>
          </p>
    </div>
 </div>
 

</form>

		<!--[if !ie]>form end<![endif]-->
		
</div>
