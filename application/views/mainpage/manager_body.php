<div id="bodyly" style="position: absolute; top: 0px; filter: alpha(opacity=80); background-color: #333; z-index: 0; left: 0px; display: none;"></div>
<!--������ʽ-->
<div class="mainpage"><!--Left��ʽ��ʼ-->
	<div class="left">
	 <div class="leftcontent" >				  
				  
		<div class="my_r_box">  
			<div class="my_r_box1">
				 <span id='geren'>��������</span>
				 <div style="height:5px;clear: both;"></div>
				
					       <ul class="my_normal"> 
					            <li id="info">Ա����ţ�&nbsp;<font color="#8C0044"><?php  echo $yuangongbianhao;?></font></li> 
					            <li id="info">Ա��������&nbsp;<font color="#8C0044"><?php  echo $xingming;?></font></li> 
					            <li id="info">�������ţ�&nbsp;<font color="#8C0044"><?php  echo $bumenming;?></font></li> 
					            <li id="info">���ű�ţ�&nbsp;<font color="#8C0044"><?php  echo $bumenbianhao;?></font></li> 
					            <li id="info">Ա��ְλ��&nbsp;<font color="#8C0044"><?php  echo $jibie;?></font></li> 
					         </ul>   
					         <span style="float:right"  ><a target="_blank" style="text-decoration: none;" href="<?=site_url('personal/index/')?>">�鿴����...</a></span>
					         <div style="clear: both;"></div>
					       </div>  
		   </div>      	 </div>
	 
	<div style="height:10px;clear: both;"></div>
		 <div class="leftcontent2" >
			<div class="my_r_box">
			 <div class="my_r_box1">
				 <span id='geren'>ϵͳ��Ϣ</span>
				  <div style="height:5px;clear: both;"></div>
					   <MARQUEE onmouseover=this.stop() onmouseout=this.start() scrollAmount=2 direction=up height=150>
						   <table border=0 cellspacing=0 width=100%>
						   <tbody>
						   <tr>
						   <td align="center" width="15" valign="top"> 
							   <table cellspacing="0" cellpadding="0" border="0">
							   <tbody>
								   <tr>
								    <td align="center" valign="center"><img src="<?php echo base_url(); ?>img/bbg.gif" border="0" />
								    </td>
								    <td width="0" height="20px" style="LINE-HEIGHT: 20px">&nbsp;</td>                                   
								   </tr>
							   </tbody>
							   </table>
						   </td>
                           <td valign="middle" height="20px" style="LINE-HEIGHT: 20px;"><a target="_blank" title="" href="*" style="text-decoration: none;">�����ٿ�2012��ȹ�˾Ա������֪ͨ</a>
                    </td>
					</tr>	   
						   </tbody>
						   </table>
					  </MARQUEE>  
				 </div>  
		   </div>  
				         
				       
			 </div>
		<div style="clear: both;"></div>
			
			</div>		
		<!--Left��ʽ����-->
</div>
<div class="right">
	<div class="leftcontent" style="margin-top: 0px;  overflow: hidden;">	
	<div><span id='info_table'>����ִ�еı������б�</span></div>			
					<table id="rounded-corner" summary=" Companies  Profit"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">���������</th> 
					<th scope="col" class="rounded-q1">�ύʱ��</th> 
					<th scope="col" class="rounded-q2">�ܽ��</th> 
					<th scope="col" class="rounded-q3">��ǰ״̬</th> 
					<th scope="col" class="rounded-q4">�鿴</th> 
					</tr> 
					</thead> 
					<tfoot> 
					<tr> 
					<td colspan="4" class="rounded-foot-left"><em><a href="<?=site_url("process/deal")?>" style="float:right;">�鿴����...</a></em></td> 
					<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
					<tbody> 					
					<?php 					if(!$number['processing']){?>
						<tr><td colspan="5">������ر�����</td></tr>
					<?php }			
					     else{foreach($processing as $data_pro):?>
					<tr> 
					<td> <?php echo $data_pro['baoxiaobianhao']?></td>
					<td> <?php echo $data_pro['tijiaoshijian']?></td>					
					<td> <?php echo $data_pro['zongjine']?></td>
					<td><?php for($i=0;$i< $data_pro['yishenpi'];$i++){?> <img src='<?php echo base_url(); ?>img/ico_sus.gif' /><?php  }?><?php for($i=0;$i< $data_pro['weishenpi'];$i++){?> <img src='<?php echo base_url(); ?>img/wait.png' /><?php  }?></td>		
					<td>	<a href="<?=site_url("info/show/{$data_pro['baoxiaobianhao']}/{$data_pro['baoxiaoleixing']}")?>" >�鿴</a> </td>								
					</tr>
					<?php endforeach;}?>					
					</tbody> 
					</table>		
</div>	
 
<div class="leftcontent2" style="margin-top: 0px;  overflow: hidden;">	
<div style="height:15px;clear: both;"></div> 
	<div><span id='info_table'>�����صı������б�</span></div>			
					<table id="rounded-corner" summary=" Companies  Profit"> 
					<thead> 
					<tr> 
                    <th scope="col" class="rounded-company">���������</th> 
					<th scope="col" class="rounded-q1">�ύʱ��</th> 
					<th scope="col" class="rounded-q2">�ܽ��</th> 
					<th scope="col" class="rounded-q3">������</th> 
					<th scope="col" class="rounded-q4">�鿴</th> 
					</tr> 
					</thead> 
					<tfoot> 
					<tr> 
					<td colspan="4" class="rounded-foot-left"><em><a href="<?=site_url("process/reject")?>" style="float:right;">�鿴����...</a></em></td> 
					<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
					<tbody> 
					<?php if(!$number['reject']){?>
						<tr><td colspan="5">������ر�����</td></tr>
					<?php }			
					else{ foreach($reject as $data_pro):?>
					<tr> 
					<td> <?php echo $data_pro['baoxiaobianhao']?></td>
					<td> <?php echo $data_pro['tijiaoshijian']?></td>					
					<td> <?php echo $data_pro['zongjine']?></td>
					<td><?php  echo $data_pro['shenpiren'] ?></td>		
					<td>	<a href="<?=site_url("info/reject/{$data_pro['baoxiaobianhao']}/{$data_pro['baoxiaoleixing']}")?>">�鿴</a> </td>								
					</tr>
					<?php endforeach;}?>
					</tbody> 
					</table> 		
				   
		</div>	
		 
<div class="leftcontent3" style="margin-top: 0px;  overflow: hidden;">	
<div style="height:15px;clear: both;"></div> 
	<div><span id='info_table'>ͨ�������ı������б�</span></div>			
					<table id="rounded-corner" summary=" Companies  Profit"> 
					<thead> 
					<tr> 
                    <th scope="col" class="rounded-company">���������</th> 
					<th scope="col" class="rounded-q1">�ύʱ��</th> 
					<th scope="col" class="rounded-q2">�ܽ��</th> 
					<th scope="col" class="rounded-q3">��������</th> 
					<th scope="col" class="rounded-q4">�鿴</th> 
					</tr> 
					</thead> 
					<tfoot> 
					<tr> 
					<td colspan="4" class="rounded-foot-left"><em><a href="<?=site_url("process/finish")?>" style="float:right;">�鿴����...</a></em></td> 
					<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
					<tbody> 
					<?php if(!$number['finish']){?>
						<tr><td colspan="5">������ر�����</td></tr>
					<?php }			
					else{ foreach($finish as $data_pro):?>
					<tr> 
					<td> <?php echo $data_pro['baoxiaobianhao']?></td>
					<td> <?php echo $data_pro['tijiaoshijian']?></td>					
					<td> <?php echo $data_pro['zongjine']?></td>
					<td><?php  
					           if($data_pro['baoxiaoleixing']==1){
					           	echo "��ͨ��";
					           }
					           else if($data_pro['baoxiaoleixing']==2){
					           	echo "���÷�";
					           }
							   else if($data_pro['baoxiaoleixing']==3){
					           	echo "���ʷ�";
					           }
					           else if($data_pro['baoxiaoleixing']==4){
					           	echo "��Ʒ��";
					           } 
					           else if($data_pro['baoxiaoleixing']==5){
					           	echo "�̶��ʲ��ɹ�����";
					           }  
					           else if($data_pro['baoxiaoleixing']==6){
					           	echo "ͨ�ñ�����";
					           }
					?></td>
					<td>	<a href="<?=site_url("info/show_finish/{$data_pro['baoxiaobianhao']}/{$data_pro['baoxiaoleixing']}")?>">�鿴</a> </td>								
					</tr>
					<?php endforeach;}?>
					</tbody> 
					</table> 		
				   
		</div>
<div class="leftcontent3" style="margin-top: 0px;  overflow: hidden;">	
<div style="height:15px;clear: both;"></div> 
	<div><span id='info_table'>�ȴ��������ı�����</span></div>			
				<table id="rounded-corner" > 
					<thead> 
					<tr> 
                    <th scope="col" class="rounded-company">Ա������</th> 
					<th scope="col" class="rounded-q1">�ύʱ��</th> 
					<th scope="col" class="rounded-q2">�ܽ��</th> 
					<th scope="col" class="rounded-q3">��������</th> 
					<th scope="col" class="rounded-q4">����</th>
					</tr> 
					</thead> 
					<tfoot> 
					<tr> 
					<td colspan="4" class="rounded-foot-left"><em><a href="<?=site_url("manage/shenpi")?>" style="float:right;">�鿴����...</a></em></td> 
					<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
					<tbody> 
					<?php if(!$number['yaoshenpi']){?>
						<tr><td colspan="5">������ر�����</td></tr>
					<?php }			
					else{ foreach($yaoshenpi as $data_pro):?>
					<tr> 
					<td> <?php echo $data_pro['xingming']?></td>
					<td> <?php echo $data_pro['tijiaoshijian']?></td>					
					<td> <?php echo $data_pro['zongjine']?></td>
					<td><?php  
					           if($data_pro['baoxiaoleixing']==1){
					           	echo "��ͨ��";
					           }
					           else if($data_pro['baoxiaoleixing']==2){
					           	echo "���÷�";
					           }
							   else if($data_pro['baoxiaoleixing']==3){
					           	echo "���ʷ�";
					           }
					           else if($data_pro['baoxiaoleixing']==4){
					           	echo "��Ʒ��";
					           } 
					           else if($data_pro['baoxiaoleixing']==5){
					           	echo "�̶��ʲ��ɹ�����";
					           }  
					           else if($data_pro['baoxiaoleixing']==6){
					           	echo "ͨ�ñ�����";
					           }
					?></td>
					<td>	<a href="<?=site_url("info/shenpi/{$data_pro['baoxiaobianhao']}/{$data_pro['baoxiaoleixing']}")?>">����</a> </td>								
					</tr>
					<?php endforeach;}?>
					</tbody> 
					</table> 			
				   
		</div>		
		<div style="height:15px;clear: both;"></div> 			
		
</div>

