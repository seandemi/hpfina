
<div id="chailvfei" style="display:none;" >
<!--<span id='headline'>���÷��굥</span>-->
 <table id="jiaotong" summary="���÷�" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">��������</th> 
					<th scope="col" class="rounded-q3">�վݽ��</th> 
					<th scope="col" class="rounded-q2">����</th> 
					<th scope="col" class="rounded-q3">����</th> 
					<th scope="col" class="rounded-q3">�������</th> 
					<th scope="col" class="rounded-q2" id="chal_col">����Ŀ�ĵ�</th> 					
					<th scope="col" class="rounded-q1">��ʼʱ��</th> 
					<th scope="col" class="rounded-q3">����ʱ��</th> 
					<th scope="col" class="rounded-q1">����</th> 
					<th scope="col" class="rounded-q1">�ͻ����</th> 					
					<th scope="col" class="rounded-q4">������Ŀ</th> 
					</tr> 
					</thead> 
					<tfoot> 
					<tr>
					<td colspan="10" class="rounded-foot-left">
					<span style="float:right;">
					<input type="button"  value="�������" id="getdays" class="buttonstyle" onclick="get_days()"></input>
					<span style="width:15px;"></span>
					<input type="button" id="add" class="buttonstyle"  value="��ӵ��б�" onclick="addto()"></input>
					<span style="width:15px;"></span>
					<input type="button"  value="������д" class="buttonstyle" id="clear" onclick="cancel()"></input>
					</span>
					</td> 
					<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="chailvinfo"> 
		  <tr>		  
			<td><select id="chalv_type" name="chailv_type" size="1" onchange="changetype()"> 
					<option value="���ڽ�ͨ��" selected="selected" >���ڽ�ͨ��</option>
					<option value="��;��ͨ��"  >��;��ͨ��</option>
					<option value="ס�޷�" >ס�޷�</option>
					<option value="ϴ�·�" >ϴ�·�</option>
					<option value="���ò���" >���ò���</option>
					<option value="����" >����</option>											
				</select></td>				
				<td><input type="text" id="receipt_chai"  style="width:50px;"></td>				
		    <td><select id="Currency_chai"  size="1" onchange="get_huilv(this)"> 		          
				  <option value='0' selected="selected" >��ѡ��</option>		
		           <?php foreach($huobi as $bizhong):?>
					<option value="<?php echo $bizhong['name']?>"><?php echo $bizhong['name']?></option>
					<?php endforeach;?>
				</select></td> 
								
					<td><input type="text" id="parity_chai"  readonly="readonly" style="width:40px;" ></input></td> 
					<td><input type="text" id="jine_chai" readonly="readonly" style="width:55px;"></input></td> 
					<td id="chailv_info">
<!--<select id="mudi" name="mudi" size="1"> -->
<!--					<option value="1" selected="selected" >����</option>	-->
<!--					<option value="2" >����</option>-->
<!--					<option value="3" >�۰�̨</option>														-->
<!--				</select>-->
          <input type="text" id="des_place" style="width:90px;"></td> 
	    <td><div class="example-container" style="overflow:hidden;"><input type="text"  id="startchai"  readonly="readonly" value="" /><pre style="display:none;">$('#startchai').datetimepicker();</pre></div></td> 	
		<td><div class="example-container" style="overflow:hidden;"><input type="text"  id="endchai"  readonly="readonly" value="" /><pre style="display:none;">$('#endchai').datetimepicker();</pre></div></td>
					<td><input type="text" id="days"  readonly="readonly" style="width:40px;"  ></td> 					
			<td><select id="kehu_chai"  size="1"> 
				  <option value='0' selected="selected" >�޶�Ӧ�ͻ�(0)</option>		
		           <?php foreach($keh as $kehu):?>
					<option value="<?php echo $kehu['kehubianhao']?>"><?php echo $kehu['name']?></option>
					<?php endforeach;?>					
				</select></td>
					<td><input type="text" id="dnumber_chai"  style="width:30px;"></td> 
					</tr> 
					</tbody> 
</table> 		
		<div style="clear:both;height:10px;"></div>	
</div>