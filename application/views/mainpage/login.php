<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->
<!--<html xmlns="http://www.w3.org/1999/xhtml">-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>登陆页面</title>
<script type="text/javascript" src="<?php echo base_url(); ?>js/timepick/jquery-1.7.1.min.js"></script>
<style>
body,html{height:100%;padding:0;margin:0;}
.divbg {
	position:absolute;
	top:50%;
	bottom: 50%;
	width:100%;
	height:350px;
	border:1px solid red;
	}
.ziti {
	color: #0a84e1;
	font-size: 12px;
	font-weight:bold;
}

.inputbg5 {
border-top:1px solid #c1d1d7; background:url(<?php echo base_url(); ?>img/26.gif); border-left: 1px solid #c1d1d7; border-bottom: 1px solid #c1d1d7; border-right: 1px solid #c1d1d7;color:#0a84e1; height: 19px;  line-height: 18px; width: 70px;}

.submitbg5 {
width:83px; height:23px; color:#0a84e1; background:url(<?php echo base_url(); ?>img/23.gif); cursor: pointer; font-weight:bold; border: 0;}

.submitbg6 {
width:130px; height:23px; color:#0a84e1; background:url(<?php echo base_url(); ?>img/23.gif); cursor: pointer; font-weight:bold; border: 0;}
	
</style>
<script type="text/javascript"> 
var tittle=0;
$(function(){ 	
	$("#UserName").blur(function(){ //文本框鼠标焦点消失事件 
		var name=document.getElementById("UserName").value;	
		if(name!=""){
			$.ajax({
				  type: "POST",
				  url: $("#login").attr("href"),
				  data: {name:name},
				  dataType: 'json',
				  cache: false,
				  success: function(json){
					  if(json.num==0){
                           alert("该姓名不存在！");
                           $('#yuangong').hide();
                           $('#yuangongbianhao').hide();
                            tittle=1;
						  }
					   else if(json.num>1){
						   tittle=2;
                          $('#yuangong').show();
                          $('#yuangongbianhao').show();
    					  $(json.result).each(function(i){
								var html ="<option value="+this.yuangongbianhao+">"+this.yuangongbianhao+"</option>";
								$("#bianhao").append(html);		
						  });
						  }
						  else {
							  tittle=1;
		                      $('#yuangong').hide();
		                      $('#yuangongbianhao').hide();	                          
							  }
					 }
				});
			}
	});
})
		function check_form(){
	       var name=document.getElementById("UserName").value;
	       var pwd=document.getElementById("passWord").value;	
	      if(tittle==1){
              if((name!="")&&(pwd!="")){
                     return true;
                  }
              else {
            	  alert("请将信息填写完整！")
                  return false ;}                            
		      }
	      else   if(tittle==2){
	    	  var bianhao=document.getElementById("yuangongbianhao").value;	
              if((name!="")&&(pwd!="")&&(bianhao!=0)){
                     return true;
                  }
              else {
                  alert("请将信息填写完整！")
                  return false ;}                            
		      }
	      else {
              alert("请将信息填写完整！")
              return false ;
		      }
		}
</script>
</head>

<body>

<?php 
	$attributes = array('name' => 'login');
    echo form_open('login/check');
	?>
	<a href="<?=site_url("login/check_name")?>" style="display:none" id="login" ></a>
<table width="100%" height="100%" border="0"align="center" cellpadding="0" cellspacing="0">

<tr>

<td style="text-align:center;">

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FF0000">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>

    <td><table width="100%" height="105" border="0" align="center" cellpadding="0" cellspacing="0"  >

      <tr>
        <td align="center" valign="middle"><table width="638" height="205" border="0" cellpadding="0" cellspacing="0" background="<?php echo base_url(); ?>img/logo_hipu.gif">
          <tr>
            <td width="338" align="center" valign="bottom"><table width="333" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="82" height="20">&nbsp;</td>

                <td width="251" height="20"><label></label></td>

              </tr>

              <tr>

                <td height="30"><label></label></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>

    </table>

      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>

          <td><table width="638" height="106" border="0" align="center" cellpadding="0" cellspacing="0" background="<?php echo base_url(); ?>img/32.gif">
         
            <tr>
              <td align="center" valign="middle">
			  <table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                  
                  <td width="60" height="25"><div align="center" class="ziti">

                    <div align="right">姓名：</div>

                  </div></td>

                  <td width="70" height="22">

                    <div align="left">

					  <input name="UserName" type="text" id="UserName" size="25" class="inputbg5" />

                      </div>

                 </td>
                 
                <td width="70" height="25" id="yuangong"  style="display:none;"><div align="center" class="ziti">

                    <div align="right">员工编号:</div>

                  </div></td>

                  <td width="120" height="25" id="yuangongbianhao" style="display:none;">

                    <div align="left">
                    <select id="bianhao" name="yuangongbianhao" size="1"  class="inputbg6"> 	
                    <option value="0" selected="selected" >请选择员工编号</option>						
				</select>
                      </div>
                 </td>
                  <td width="58"><div align="center" class="ziti">

                    <div align="right">密&nbsp;&nbsp;码：</div>
                  </div></td>
                  <td width="70"><input name="passWord" type="password" id="passWord" class="inputbg5" size="25" /></td>
                  <td width="85"><input type="submit" name="btnlogin" value=" 登 陆 " onclick="return check_form();" id="btnlogin" class="submitbg5" /></td>
                </tr>

              </table>		  

			  </td>

            </tr>

          </table></td>

        </tr>

      </table>      <p>&nbsp;</p></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

  </tr>

</table>

</td>

</tr>

</table>	
</form>
</body>
</html>
