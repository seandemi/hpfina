<div class="w" id="regist">
  <ul class="tab" style="list-style-type:none">
	 <li class="line"><a href="<?=site_url('personal/index/')?>">������Ϣ</a></li>
      <li ><a href="<?=site_url('personal/detail/')?>">��ϸ��Ϣ</a></li>
      <li class="curr" ><a href="<?=site_url('personal/password/')?>">�޸�����</a></li>
       <li ><a href="<?=site_url('personal/photo/')?>">֤����</a></li>	
		</ul>
	
<!--	<form id="formp" method="post"  >-->
<?php 
	$attributes = array('id' => 'formp');
    echo form_open('personal/change_pwd', $attributes);
	?>	
		    <div class="form">
               
	<!--  <div class="item">
				    <span class="label">ԭ����(<font size="1.5"  color="#ff0000">������</font>)&nbsp;</span>
				    <div class="fl">
					    <input type="text" id="code" name="code" class="text"  />
				    </div>
			    </div>
		 -->	
		 
	<div class="item">
					    <span class="label">������(<font size="1.5"  color="#ff0000">������</font>)&nbsp;</span>
					    <div class="fl">
						    <input type="password" id="pwd" name="pwd" class="text"  maxlength="10"  />
						    <label id="pwdsucceed" style="display:none" class="blank"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
						    <label id="pwd_error" style="display:none" class="blank"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
						    						   
                             <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="pdwin"><font color="#227799">1~10λ�ַ�������Ӣ�ģ������ִ�Сд�������ֺ͡�_�����</font></span>
    						 <!--������ʾ End-->
                            <span class="ip_error" id="passworderror" style="display:none"><font color="#ff4444">����ֻ����Ӣ�ġ����ֺ͡�_�����</font></span>	
            			     <!--������ʾ End-->
					    </div> 
				    </div>
				   
				    <div class="item">
					    <span class="label">ȷ��������(<font size="1.5"  color="#ff0000">������</font>)&nbsp;</span>
					     
					    <div class="fl">
						    <input type="password" id="pwd2" name="pwd2" class="text" />
						    <label id="pwd2_succeed"  class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_sus.gif" /></label>
						    <label id="pwd2_error" class="blank" style="display:none"><img src="<?php echo base_url(); ?>img/ico_err.gif" /></label>
						    <!--������ʾ Start-->
						    <span class="normal" style="display:none" id="pdw2_in" ><font color="#227799">���ٴ���������</font></span>
						    <!--������ʾ End-->
						    <span class="normal" id="password2_error" style="display:none"><font color="#ff4444">������������벻һ��</font></span>
    						</div>
				    </div>
				    
		
			    
			    <div class="item">
				     <span class="label">&nbsp;</span>
<!--				     <input type="submit" class="btn-img btn-regist" onclick="doSubmit()" id="registsubmit"  value="ȷ���޸�" />-->
 <input type="submit" class="btn-img btn-regist" onclick="return doSubmit();" id="registsubmit"  value="ȷ���޸�" />

			    </div>
    			
		    </div>
		
		</form>

		<!--[if !ie]>form end<![endif]-->
		
<div style="height:100px;clear:both;"></div>
</div>
