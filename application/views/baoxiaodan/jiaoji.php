	
<div id="jiaojifei" style="display:none;">
 <table id="jiaotong" summary="���ʷ�" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">�վݽ��</th> 	
					<th scope="col" class="rounded-q2">����</th> 
					<th scope="col" class="rounded-q3">����</th> 
					<th scope="col" class="rounded-q3">�������</th> 					
					<th scope="col" class="rounded-q1">����ʱ��</th> 
					<th scope="col" class="rounded-q1">���ʵص�</th> 
					<th scope="col" class="rounded-q2">���빫˾����</th> 
					<th scope="col" class="rounded-q3">����������</th> 
					<th scope="col" class="rounded-q1">�ͻ�</th> 					
					<th scope="col" class="rounded-q4">������Ŀ</th> 
					</tr> 
					</thead> 
					<tfoot> 
					<tr> 
					<td colspan="9" class="rounded-foot-left">
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
				<td><input type="text" id="receipt_jiaoji"  style="width:50px;"></td>				
		    <td><select id="Currency_jiaoji"  size="1" onchange="get_huilv(this)"> 		          
				  <option value='0' selected="selected" >��ѡ��</option>		
		           <?php foreach($huobi as $bizhong):?>
					<option value="<?php echo $bizhong['name']?>"><?php echo $bizhong['name']?></option>
					<?php endforeach;?>
				</select></td> 
					<td><input type="text" id="parity_jiaoji" readonly="readonly" style="width:30px;" ></input></td> 
					<td><input type="text" id="jine_jiaoji"  readonly="readonly" style="width:60px;"></input></td> 
					<td><input type="text" id="jiaoji_time"  readonly="readonly" style="width:80px;" ></td> 
					<td><input type="text" id="jiaoji_place" style="width:120px;" ></td> 
					<td><input type="text" id="company"  style="width:120px;"></td> 
					<td><input type="text" id="personal"  style="width:85px;"></td> 
			<td><select id="kehu_jiaoji"  size="1">
				  <option value='0' selected="selected" >�޶�Ӧ�ͻ�(0)</option>		
		           <?php foreach($keh as $kehu):?>
					<option value="<?php echo $kehu['kehubianhao']?>"><?php echo $kehu['name']?></option>
					<?php endforeach;?>					
				</select></td>
					<td><input type="text" id="dnumber_jiaoji"  style="width:50px;"></td>					 
					</tr> 

					</tbody> 
</table> 		
		<div style="clear:both;height:10px;"></div>	
	</div>	