<div class="w" id="regist">	
<a href="<?=site_url("process/processdeal")?>" style="display:none" id="processdeal" ></a>
<span style="display:none"><input id="gettime" value="<?php echo $page['time'];?>"></input><input id="gettype" value="<?php echo $page['type'];?>"></input><input id="getzongjine" value="<?php echo $page['zongjine'];?>"></input><input id="nowpage" value="<?php echo $page['nowpage'];?>"></input>
<input id="pagesum" value="<?php echo $page['pagesum'];?>"></input></span>
<div style="margin-left:60px;"><span style="padding-right:20px;">�ύʱ�䣺<input id="time" style="width:80px;"></input></span><span style="padding-right:20px;">�ܽ�� ��<input id="zongjine" style="width:80px;"></input></span><span style="margin-right:20px;display:none;">���ݽ�� ��<input id="danju" style="width:80px;"></input></span><span style="padding-right:20px;">���������� �� <select id="leibie"  size="1" > 
					<option value="0" selected="selected">---��ѡ��---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option> 
					<option value="1" >��ͨ��</option>	
					<option value="2" >���÷�</option>
					<option value="3" >���ʷ�</option>		
					<option value="4" >��Ʒ��</option>
					<option value="5" >�̶��ʲ��ɹ�����</option>	
					<option value="6" >ͨ�ñ�����</option>							
				</select></span><input type="button" onclick="deal()" value="��ѯ"></input></div>			
<div style="height:15px;clear: both;">	</div>
<div style="text-align:center;margin:0 auto;"><span id='head2'>����ִ�еı������б�</span></div>
<div class="titleleft">
<span id="headtittle"><font>��<strong><?php echo $page['pagesum'];?></strong>ҳ&nbsp;��<strong><?php echo $page['rowsum']; ?></strong>��������������&nbsp;��<strong><?php echo $page['nowpage'];?></strong>ҳ</font></span>
</div>
<table id="display-tablle" align="center" > 
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
					<td colspan="4" class="rounded-foot-left"></td> 
					<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
					<tbody id="main"> 
					<?php
					foreach($info as $data_pro):?>
					<tr>
					<td> <?php echo $data_pro['baoxiaobianhao']?></td>
					<td> <?php echo $data_pro['tijiaoshijian']?></td>					
					<td> <?php echo $data_pro['zongjine']?></td>
					<td><?php for($i=0;$i<$data_pro['yishenpi'];$i++){?> <img src='<?php echo base_url(); ?>img/ico_sus.gif' /><?php  }?><?php for($i=0;$i< $data_pro['weishenpi'];$i++){?> <img src='<?php echo base_url(); ?>img/wait.png' /><?php  }?></td>		
					<td><a href="<?=site_url("info/show/{$data_pro['baoxiaobianhao']}/{$data_pro['baoxiaoleixing']}")?>" >�鿴</a> </td>								
					</tr>
					<?php endforeach;?>					
					</tbody>
					</table> 
<div class="titleright">
<span id="headtittle"><input type="button" value="��ҳ"  onclick="changepage(this)"/> &nbsp;<input type="button" value="��ҳ" onclick="changepage(this)"/>&nbsp;<input type="button" value="��ҳ"   onclick="changepage(this)"/>&nbsp;<input type="button" value="ĩҳ"  onclick="changepage(this)"/>&nbsp;</span>
</div>	
<div style="height:15px;clear: both;">	</div>	
</div>	


