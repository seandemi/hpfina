<div id="jiaotongfei" style="display:none;">
 <table id="jiaotong" summary="��ͨ��" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">��������</th> 
					<th scope="col" class="rounded-q3">�վݽ��</th> 	
					<th scope="col" class="rounded-q2">����</th> 
					<th scope="col" class="rounded-q3">����</th> 
					<th scope="col" class="rounded-q3">�������</th> 					
					<th scope="col" class="rounded-q1">�ϳ�ʱ��</th> 
					<th scope="col" class="rounded-q2">�ϳ��ص�</th> 
					<th scope="col" class="rounded-q3">�³�ʱ��</th> 
					<th scope="col" class="rounded-q1">�³��ص�</th> 
					<th scope="col" class="rounded-q1">�ͻ�</th> 					
					<th scope="col" class="rounded-q4">������Ŀ</th> 
					</tr> 
					</thead> 
					<tfoot> 
					<tr> 
					<td colspan="10" class="rounded-foot-left">					
					<span style="float:right;">
					<input type="button" id="add" class="buttonstyle"  value="��ӵ��б�" onclick="addto()"></input>
					<span style="width:15px;"></span>
					<input type="button"  value="������д" class="buttonstyle" id="clear" onclick="cancel()"></input>
					</span>
					</td> 
					<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="traffic"> 
		  <tr> 
			<td><select id="traffic_type"  size="1"> 
					<option value="��ͨ��" selected="selected" >��ͨ��</option>	
					<option value="�Ӱཻͨ��" >�Ӱཻͨ��</option>						
				</select></td>
				<td><input type="text" id="receipt"  style="width:50px;"></td>				
		    <td><select id="Currency"  size="1" onchange="get_huilv(this)"> 		          
				  <option value='0' selected="selected" >��ѡ��</option>		
		           <?php foreach($huobi as $bizhong):?>
					<option value="<?php echo $bizhong['name']?>"><?php echo $bizhong['name']?></option>
					<?php endforeach;?>
				</select></td>  
		<td><input type="text" id="parity" readonly="readonly" style="width:30px;" ></input></td> 
		<td><input type="text" id="jine"  readonly="readonly" style="width:55px;"></input></td> 
		<td><div class="example-container" style="overflow:hidden;"><input type="text"  id="end_time"  readonly="readonly" value="" /><pre style="display:none;">$('#end_time').datetimepicker();</pre></div></td> 	
	    <td><input type="text" id="start_place" style="width:95px;" ></td> 
		<td><div class="example-container" style="overflow:hidden;"><input type="text"  id="start_time"  readonly="readonly" value="" /><pre style="display:none;">$('#start_time').datetimepicker();</pre></div></td> 	
			<td><input type="text" id="end_place"  style="width:95px;"></td> 
			<td><select id="kehuno"  size="1">
				  <option value='0' selected="selected" >�޶�Ӧ�ͻ�(0)</option>		
		           <?php foreach($keh as $kehu):?>
					<option value="<?php echo $kehu['kehubianhao']?>"><?php echo $kehu['name']?></option>
					<?php endforeach;?>					
				</select></td>
					<td><input type="text" id="dnumber"  style="width:50px;"></td>					 
					</tr> 

					</tbody> 
</table> 		
		<div style="clear:both;height:10px;"></div>	
	</div>	