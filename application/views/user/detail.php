<div class="w" id="regist">
  <ul style="list-style-type:none" class="tab">
	 <li ><a href="<?=site_url('personal/index/')?>">������Ϣ</a></li>
      <li class="curr"><a href="<?=site_url('personal/detail/')?>">��ϸ��Ϣ</a></li>
      <li class="line" ><a href="<?=site_url('personal/password/')?>">�޸�����</a></li>
       <li ><a href="<?=site_url('personal/photo/')?>">֤����</a></li>	
		</ul>
	<?php 
	$attributes = array('id' => 'myform');
    echo form_open('personal/check_detail', $attributes);
	?>	
	<form id="formp" method="post">
		    <div class="form">               
		 <div class="item">
				    <span class="label">Ա�����:&nbsp;</span>
				    <div class="fl">
					    <input type="text" id="yuangongbianhao" value='<?php echo "$yuangongbianhao"?>' name="username" class="text" readonly="readonly" />
				    </div>
			    </div>
					 <div class="item">
					    <span class="label">�Ա�:&nbsp;</span>
					    <div class="fl">
			               <select id="sex" name="sex" size="1" style="width:150px;font-size:10px;"> 
			              <?php 
			              if($xingbie==1){
			               echo "<option value='1' selected='selected' >&nbsp;&nbsp;&nbsp;��</option> ";	
			               echo "<option value='0'  >&nbsp;&nbsp;&nbsp;Ů</option> ";	               	
			               }
			               else {
			               	echo "<option value='1'  >&nbsp;&nbsp;&nbsp;��</option>";
			                echo "<option value='0'  selected='selected' >&nbsp;&nbsp;&nbsp;Ů</option> ";		               	
			               }    
			               
			               ?>
						</select>

					    </div> 
				    </div>				   
				    <div class="item">
					    <span class="label">��������:&nbsp;</span>
					     
					    <div class="fl">
						    <input type="text"  id="birthday" onClick="WdatePicker()" value='<?php echo "$chushengriqi"?>' name="birthday" class="text" readonly="readonly"/>
    						</div>
				    </div>
			    <div class="item">
				    <span class="label">�Ļ��̶�:&nbsp;</span>
				    <div class="fl">
			               <select id="degree" name="degree" size="1" style="width:150px;font-size:10px;"> 
			               <?php 
			               if($wenhuachengdu=="Сѧ"){
			               	echo "<option value='Сѧ' selected='selected' >&nbsp;&nbsp;&nbsp;Сѧ</option> ";		               	
			               }
			               else {
			               	echo "<option value='Сѧ'  >&nbsp;&nbsp;&nbsp;Сѧ</option>";		               	
			               }
			               			               
			               	if($wenhuachengdu=="����"){
			               	echo "<option value='����' selected='selected' >&nbsp;&nbsp;&nbsp;����</option> ";		               	
			               }
			               else {
			               	echo "<option value='����'  >&nbsp;&nbsp;&nbsp;����</option>";		               	
			               }
			                if($wenhuachengdu=="����"){
			               	echo "<option value='����' selected='selected' >&nbsp;&nbsp;&nbsp;����</option> ";		               	
			               }
			               else {
			               	echo "<option value='����'  >&nbsp;&nbsp;&nbsp;����</option>";		               	
			               }
			               	if($wenhuachengdu=="��ר"){
			               	echo "<option value='��ר' selected='selected' >&nbsp;&nbsp;&nbsp;��ר</option> ";		               	
			               }
			               else {
			               	echo "<option value='��ר'  >&nbsp;&nbsp;&nbsp;��ר</option>";		               	
			               }
			              if($wenhuachengdu=="��ר"){
			               	echo "<option value='��ר' selected='selected' >&nbsp;&nbsp;&nbsp;��ר</option> ";		               	
			               }
			               else {
			               	echo "<option value='��ר' >&nbsp;&nbsp;&nbsp;��ר</option>";		               	
			               }
			               	if($wenhuachengdu=="����"){
			               	echo "<option value='����' selected='selected' >&nbsp;&nbsp;&nbsp;����</option> ";		               	
			               }
			               else {
			               	echo "<option value='����'  >&nbsp;&nbsp;&nbsp;����</option>";		               	
			               }			               	
			               			           
			               if($wenhuachengdu=="˶ʿ"){
			               	echo "<option value='˶ʿ' selected='selected' >&nbsp;&nbsp;&nbsp;˶ʿ</option> ";		               	
			               }
			               else {
			               	echo "<option value='˶ʿ'  >&nbsp;&nbsp;&nbsp;˶ʿ</option>";		               	
			               }
			               	if($wenhuachengdu=="��ʿ"){
			               	echo "<option value='��ʿ' selected='selected' >&nbsp;&nbsp;&nbsp;��ʿ</option> ";		               	
			               }
			               else {
			               	echo "<option value='��ʿ'  >&nbsp;&nbsp;&nbsp;��ʿ</option>";		               	
			               }
    
			               			               
			               ?>
						</select>					    
				    </div>
				    </div>
			   		   <div class="item">
				    <span class="label">�̶��绰 &nbsp;</span>
				    <div class="fl">
				    <input type="text" id="User_phone" name="User_phone" class="text" maxlength="13" value='<?php echo "$gudingdianhua"?>'/>
				     <label id="Userphone_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="Userphone_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="UP_in"><font color="#227799">���������Ĺ̶��绰���룬��010-62287226����0715-2360493</font></span>
						    <!--������ʾ End-->
						     <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="UP_error"><font color="#ff4444">�̶��绰�����ʽ����ȷ</font></span>
						    <!--������ʾ End-->
					   </div>
				    </div>
				    
				    <div class="item">
				    <span class="label">�ֻ�����&nbsp;</span>
				    <div class="fl">
				    <input type="text" id="phone" name="phone" class="text" maxlength="18" value='<?php echo "$shoujihaoma"?>'/>
				     <label id="phone_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="phone_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="telephone_in"><font color="#227799">���������ĵ绰���룺11λ����</font></span>
						    <!--������ʾ End-->
						     <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="telephone_error"><font color="#ff4444">�ֻ������ʽ����ȷ</font></span>
						    <!--������ʾ End-->
						    
				    </div>
				    </div>
				    <div class="item">
				    <span class="label">���֤����&nbsp;</span>
				    <div class="fl">
				    <input type="text" id="identity_card" name="identity_card" class="text" maxlength="19" value='<?php echo "$shenfenzheng"?>'/>
				     <label id="identity_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="identity_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="card_in"><font color="#227799">������18����15λ���֤��</font></span>
						    <!--������ʾ End-->
						     <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="card_error"><font color="#ff4444">���֤���벻��ȷ</font></span>
						    <!--������ʾ End-->
						    
				    </div>
				    </div>
				     <div class="item">
				    <span class="label">��ְ����&nbsp;</span>
				    <div class="fl">
			  <input type="text"  id="entry_date" onClick="WdatePicker()"  name="entry_date" class="text" readonly="readonly" value='<?php echo "$ruzhiriqi"?>'/>					    
				    </div>
				    </div>
				  <div class="item">
				    <span class="label">����&nbsp;</span>
				    <div class="fl">
				    <input type="text" id="name" name="name" class="text" maxlength="20" value='<?php echo "$huming"?>'/>
				     <label id="huming_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="huming_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="name_in"><font color="#227799">������������</font></span>
						    <!--������ʾ End-->
						     <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="name_error"><font color="#ff4444">������ʽ����ȷ</font></span>
						    <!--������ʾ End-->						    
				    </div>
				    </div>
				    
                 <div class="item">
				    <span class="label">��������&nbsp;</span>
				    <div class="fl">
				    <input type="text" id="bank" name="bank" class="text" maxlength="100" value='<?php echo "$kaihuyinhang"?>'/>
				     <label id="bank_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="bank_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="bank_in"><font color="#227799">���������Ŀ�������</font></span>
						    <!--������ʾ End-->
						     <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="berror"><font color="#ff4444">�����������Ʋ��ܳ���50������</font></span>
						    <!--������ʾ End-->
						    
				    </div>
				    </div>
				     <div class="item">
				    <span class="label">�����˺�&nbsp;</span>
				    <div class="fl">
				    <input type="text" id="account" name="account" class="text" maxlength="30" value='<?php echo "$yinhangzhanghao"?>'/>
				     <label id="account_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="account_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="account_in"><font color="#227799">���������������ʺţ��м䲻�ܴ��ո�</font></span>
						    <!--������ʾ End-->
						     <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="numberiP_error"><font color="#ff4444">�����˺Ÿ�ʽ����ȷ</font></span>
						    <!--������ʾ End-->
						    
				    </div>
				    </div>
				     <div class="item">
				    <span class="label">סַ&nbsp;</span>
				    <div class="fl">
				    <input type="text" id="address" name="address" class="text" maxlength="150" value='<?php echo "$zhuzhi"?>'/>
				     <label id="addrese_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="addres_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="addres_in"><font color="#227799">����������סַ</font></span>
						    <!--������ʾ End-->
						     <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="addreserror"><font color="#ff4444">סַ����ȷ</font></span>
						    <!--������ʾ End-->
						    
				    </div>
				    </div>
				     <div class="item">
				    <span class="label">����&nbsp;</span>
				    <div class="fl">
				    <input type="text" id="User_mail" name="User_mail" class="text" maxlength="18" value='<?php echo "$email"?>'/>
				     <label id="mail_succeed" class="blank"  style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
				     <label id="mail_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
				      <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="mail_in"><font color="#227799">����������email</font></span>
						    <!--������ʾ End-->
						     <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="mailerror"><font color="#ff4444">�����ʽ����ȷ</font></span>
						    <!--������ʾ End-->
						    
				    </div>
				    </div>
				   
    				 <div class="item">
				     <span class="label">&nbsp;</span>
				     <input type="submit" class="btn-img btn-regist" onclick="return doSubmit();" id="registsubmit"  value="ȷ���޸�" />
			    </div>
		    </div>
		
		</form>

		<!--[if !ie]>form end<![endif]-->
		

</div>
