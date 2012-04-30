<div class="w" id="regist">
  <ul style="list-style-type:none" class="tab">
	 <li ><a href="<?=site_url('personal/index/')?>">基本信息</a></li>
      <li class="curr"><a href="<?=site_url('personal/detail/')?>">详细信息</a></li>
      <li class="line" ><a href="<?=site_url('personal/password/')?>">修改密码</a></li>
       <li ><a href="<?=site_url('personal/photo/')?>">证件照</a></li>	
		</ul>
	<?php 
	$attributes = array('id' => 'myform');
    echo form_open('personal/check_detail', $attributes);
	?>	
	<form id="formp" method="post">
		    <div class="form">               
		 <div class="item">
				    <span class="label">员工编号:&nbsp;</span>
				    <div class="fl">
					    <input type="text" id="yuangongbianhao" value='<?php echo "$yuangongbianhao"?>' name="username" class="text" readonly="readonly" />
				    </div>
			    </div>
					 <div class="item">
					    <span class="label">性别:&nbsp;</span>
					    <div class="fl">
			               <select id="sex" name="sex" size="1" style="width:150px;font-size:10px;"> 
			              <?php 
			              if($xingbie==1){
			               echo "<option value='1' selected='selected' >&nbsp;&nbsp;&nbsp;男</option> ";	
			               echo "<option value='0'  >&nbsp;&nbsp;&nbsp;女</option> ";	               	
			               }
			               else {
			               	echo "<option value='1'  >&nbsp;&nbsp;&nbsp;男</option>";
			                echo "<option value='0'  selected='selected' >&nbsp;&nbsp;&nbsp;女</option> ";		               	
			               }    
			               
			               ?>
						</select>

					    </div> 
				    </div>				   
				    <div class="item">
					    <span class="label">出生日期:&nbsp;</span>
					     
					    <div class="fl">
						    <input type="text"  id="birthday" onClick="WdatePicker()" value='<?php echo "$chushengriqi"?>' name="birthday" class="text" readonly="readonly"/>
    						</div>
				    </div>
			    <div class="item">
				    <span class="label">文化程度:&nbsp;</span>
				    <div class="fl">
			               <select id="degree" name="degree" size="1" style="width:150px;font-size:10px;"> 
			               <?php 
			               if($wenhuachengdu=="小学"){
			               	echo "<option value='小学' selected='selected' >&nbsp;&nbsp;&nbsp;小学</option> ";		               	
			               }
			               else {
			               	echo "<option value='小学'  >&nbsp;&nbsp;&nbsp;小学</option>";		               	
			               }
			               			               
			               	if($wenhuachengdu=="初中"){
			               	echo "<option value='初中' selected='selected' >&nbsp;&nbsp;&nbsp;初中</option> ";		               	
			               }
			               else {
			               	echo "<option value='初中'  >&nbsp;&nbsp;&nbsp;初中</option>";		               	
			               }
			                if($wenhuachengdu=="高中"){
			               	echo "<option value='高中' selected='selected' >&nbsp;&nbsp;&nbsp;高中</option> ";		               	
			               }
			               else {
			               	echo "<option value='高中'  >&nbsp;&nbsp;&nbsp;高中</option>";		               	
			               }
			               	if($wenhuachengdu=="中专"){
			               	echo "<option value='中专' selected='selected' >&nbsp;&nbsp;&nbsp;中专</option> ";		               	
			               }
			               else {
			               	echo "<option value='中专'  >&nbsp;&nbsp;&nbsp;中专</option>";		               	
			               }
			              if($wenhuachengdu=="大专"){
			               	echo "<option value='大专' selected='selected' >&nbsp;&nbsp;&nbsp;大专</option> ";		               	
			               }
			               else {
			               	echo "<option value='大专' >&nbsp;&nbsp;&nbsp;大专</option>";		               	
			               }
			               	if($wenhuachengdu=="本科"){
			               	echo "<option value='本科' selected='selected' >&nbsp;&nbsp;&nbsp;本科</option> ";		               	
			               }
			               else {
			               	echo "<option value='本科'  >&nbsp;&nbsp;&nbsp;本科</option>";		               	
			               }			               	
			               			           
			               if($wenhuachengdu=="硕士"){
			               	echo "<option value='硕士' selected='selected' >&nbsp;&nbsp;&nbsp;硕士</option> ";		               	
			               }
			               else {
			               	echo "<option value='硕士'  >&nbsp;&nbsp;&nbsp;硕士</option>";		               	
			               }
			               	if($wenhuachengdu=="博士"){
			               	echo "<option value='博士' selected='selected' >&nbsp;&nbsp;&nbsp;博士</option> ";		               	
			               }
			               else {
			               	echo "<option value='博士'  >&nbsp;&nbsp;&nbsp;博士</option>";		               	
			               }
    
			               			               
			               ?>
						</select>					    
				    </div>
				    </div>
			   		   <div class="item">
				    <span class="label">固定电话 &nbsp;</span>
				    <div class="fl">
				    <input type="text" id="User_phone" name="User_phone" class="text" maxlength="13" value='<?php echo "$gudingdianhua"?>'/>
				     <label id="Userphone_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="Userphone_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--正常提示 Start-->
						    <span class="normal" style="display:none" id="UP_in"><font color="#227799">请输入您的固定电话号码，如010-62287226或者0715-2360493</font></span>
						    <!--正常提示 End-->
						     <!--错误提示 Start-->
						    <span class="normal" style="display:none" id="UP_error"><font color="#ff4444">固定电话号码格式不正确</font></span>
						    <!--错误提示 End-->
					   </div>
				    </div>
				    
				    <div class="item">
				    <span class="label">手机号码&nbsp;</span>
				    <div class="fl">
				    <input type="text" id="phone" name="phone" class="text" maxlength="18" value='<?php echo "$shoujihaoma"?>'/>
				     <label id="phone_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="phone_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--正常提示 Start-->
						    <span class="normal" style="display:none" id="telephone_in"><font color="#227799">请输入您的电话号码：11位数字</font></span>
						    <!--正常提示 End-->
						     <!--错误提示 Start-->
						    <span class="normal" style="display:none" id="telephone_error"><font color="#ff4444">手机号码格式不正确</font></span>
						    <!--错误提示 End-->
						    
				    </div>
				    </div>
				    <div class="item">
				    <span class="label">身份证号码&nbsp;</span>
				    <div class="fl">
				    <input type="text" id="identity_card" name="identity_card" class="text" maxlength="19" value='<?php echo "$shenfenzheng"?>'/>
				     <label id="identity_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="identity_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--正常提示 Start-->
						    <span class="normal" style="display:none" id="card_in"><font color="#227799">请输入18或者15位身份证号</font></span>
						    <!--正常提示 End-->
						     <!--错误提示 Start-->
						    <span class="normal" style="display:none" id="card_error"><font color="#ff4444">身份证号码不正确</font></span>
						    <!--错误提示 End-->
						    
				    </div>
				    </div>
				     <div class="item">
				    <span class="label">入职日期&nbsp;</span>
				    <div class="fl">
			  <input type="text"  id="entry_date" onClick="WdatePicker()"  name="entry_date" class="text" readonly="readonly" value='<?php echo "$ruzhiriqi"?>'/>					    
				    </div>
				    </div>
				  <div class="item">
				    <span class="label">户名&nbsp;</span>
				    <div class="fl">
				    <input type="text" id="name" name="name" class="text" maxlength="20" value='<?php echo "$huming"?>'/>
				     <label id="huming_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="huming_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--正常提示 Start-->
						    <span class="normal" style="display:none" id="name_in"><font color="#227799">请输入您户名</font></span>
						    <!--正常提示 End-->
						     <!--错误提示 Start-->
						    <span class="normal" style="display:none" id="name_error"><font color="#ff4444">户名格式不正确</font></span>
						    <!--错误提示 End-->						    
				    </div>
				    </div>
				    
                 <div class="item">
				    <span class="label">开户银行&nbsp;</span>
				    <div class="fl">
				    <input type="text" id="bank" name="bank" class="text" maxlength="100" value='<?php echo "$kaihuyinhang"?>'/>
				     <label id="bank_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="bank_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--正常提示 Start-->
						    <span class="normal" style="display:none" id="bank_in"><font color="#227799">请输入您的开户银行</font></span>
						    <!--正常提示 End-->
						     <!--错误提示 Start-->
						    <span class="normal" style="display:none" id="berror"><font color="#ff4444">开户银行名称不能超过50个汉字</font></span>
						    <!--错误提示 End-->
						    
				    </div>
				    </div>
				     <div class="item">
				    <span class="label">银行账号&nbsp;</span>
				    <div class="fl">
				    <input type="text" id="account" name="account" class="text" maxlength="30" value='<?php echo "$yinhangzhanghao"?>'/>
				     <label id="account_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="account_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--正常提示 Start-->
						    <span class="normal" style="display:none" id="account_in"><font color="#227799">请输入您的银行帐号，中间不能带空格</font></span>
						    <!--正常提示 End-->
						     <!--错误提示 Start-->
						    <span class="normal" style="display:none" id="numberiP_error"><font color="#ff4444">银行账号格式不正确</font></span>
						    <!--错误提示 End-->
						    
				    </div>
				    </div>
				     <div class="item">
				    <span class="label">住址&nbsp;</span>
				    <div class="fl">
				    <input type="text" id="address" name="address" class="text" maxlength="150" value='<?php echo "$zhuzhi"?>'/>
				     <label id="addrese_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="addres_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--正常提示 Start-->
						    <span class="normal" style="display:none" id="addres_in"><font color="#227799">请输入您的住址</font></span>
						    <!--正常提示 End-->
						     <!--错误提示 Start-->
						    <span class="normal" style="display:none" id="addreserror"><font color="#ff4444">住址不正确</font></span>
						    <!--错误提示 End-->
						    
				    </div>
				    </div>
				     <div class="item">
				    <span class="label">邮箱&nbsp;</span>
				    <div class="fl">
				    <input type="text" id="User_mail" name="User_mail" class="text" maxlength="18" value='<?php echo "$email"?>'/>
				     <label id="mail_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="mail_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--正常提示 Start-->
						    <span class="normal" style="display:none" id="mail_in"><font color="#227799">请输入您的email</font></span>
						    <!--正常提示 End-->
						     <!--错误提示 Start-->
						    <span class="normal" style="display:none" id="mailerror"><font color="#ff4444">邮箱格式不正确</font></span>
						    <!--错误提示 End-->
						    
				    </div>
				    </div>
				   
    				 <div class="item">
				     <span class="label">&nbsp;</span>
				     <input type="submit" class="btn-img btn-regist" onclick="return doSubmit();" id="registsubmit"  value="确认修改" />
			    </div>
		    </div>
		
		</form>

		<!--[if !ie]>form end<![endif]-->
		

</div>
