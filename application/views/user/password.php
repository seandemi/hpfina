<div class="w" id="regist">
  <ul class="tab" style="list-style-type:none">
	 <li class="line"><a href="<?=site_url('personal/index/')?>">基本信息</a></li>
      <li ><a href="<?=site_url('personal/detail/')?>">详细信息</a></li>
      <li class="curr" ><a href="<?=site_url('personal/password/')?>">修改密码</a></li>
       <li ><a href="<?=site_url('personal/photo/')?>">证件照</a></li>	
		</ul>
	
<!--	<form id="formp" method="post"  >-->
<?php 
	$attributes = array('id' => 'formp');
    echo form_open('personal/change_pwd', $attributes);
	?>	
		    <div class="form">
               
	<!--  <div class="item">
				    <span class="label">原密码(<font size="1.5"  color="#ff0000">必填项</font>)&nbsp;</span>
				    <div class="fl">
					    <input type="text" id="code" name="code" class="text"  />
				    </div>
			    </div>
		 -->	
		 
	<div class="item">
					    <span class="label">新密码(<font size="1.5"  color="#ff0000">必填项</font>)&nbsp;</span>
					    <div class="fl">
						    <input type="password" id="pwd" name="pwd" class="text"  maxlength="10"  />
						    <label id="pwdsucceed" style="display:none" class="blank"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
						    <label id="pwd_error" style="display:none" class="blank"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
						    						   
                             <!--正常提示 Start-->
						    <span class="normal" style="display:none" id="pdwin"><font color="#227799">1~10位字符，可由英文（不区分大小写）、数字和“_”组成</font></span>
    						 <!--正常提示 End-->
                            <span class="ip_error" id="passworderror" style="display:none"><font color="#ff4444">密码只能由英文、数字和“_”组成</font></span>	
            			     <!--错误提示 End-->
					    </div> 
				    </div>
				   
				    <div class="item">
					    <span class="label">确认新密码(<font size="1.5"  color="#ff0000">必填项</font>)&nbsp;</span>
					     
					    <div class="fl">
						    <input type="password" id="pwd2" name="pwd2" class="text" />
						    <label id="pwd2_succeed"  class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
						    <label id="pwd2_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
						    <!--正常提示 Start-->
						    <span class="normal" style="display:none" id="pdw2_in" ><font color="#227799">请再次输入密码</font></span>
						    <!--正常提示 End-->
						    <span class="normal" id="password2_error" style="display:none"><font color="#ff4444">两次输入的密码不一致</font></span>
    						</div>
				    </div>
				    
		
			    
			    <div class="item">
				     <span class="label">&nbsp;</span>
<!--				     <input type="submit" class="btn-img btn-regist" onclick="doSubmit()" id="registsubmit"  value="确认修改" />-->
 <input type="submit" class="btn-img btn-regist" onclick="return doSubmit();" id="registsubmit"  value="确认修改" />

			    </div>
    			
		    </div>
		
		</form>

		<!--[if !ie]>form end<![endif]-->
		
<div style="height:100px;clear:both;"></div>
</div>
