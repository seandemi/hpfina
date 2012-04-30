<div id="jiaotongfei" style="display:none;">
 <table id="jiaotong" summary="交通费" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">费用类型</th> 
					<th scope="col" class="rounded-q3">收据金额</th> 	
					<th scope="col" class="rounded-q2">币种</th> 
					<th scope="col" class="rounded-q3">汇率</th> 
					<th scope="col" class="rounded-q3">报销金额</th> 					
					<th scope="col" class="rounded-q1">上车时间</th> 
					<th scope="col" class="rounded-q2">上车地点</th> 
					<th scope="col" class="rounded-q3">下车时间</th> 
					<th scope="col" class="rounded-q1">下车地点</th> 
					<th scope="col" class="rounded-q1">客户</th> 					
					<th scope="col" class="rounded-q4">单据数目</th> 
					</tr> 
					</thead> 
					<tfoot> 
					<tr> 
					<td colspan="10" class="rounded-foot-left">					
					<span style="float:right;">
					<input type="button" id="add" class="buttonstyle"  value="添加到列表" onclick="addto()"></input>
					<span style="width:15px;"></span>
					<input type="button"  value="重新填写" class="buttonstyle" id="clear" onclick="cancel()"></input>
					</span>
					</td> 
					<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="traffic"> 
		  <tr> 
			<td><select id="traffic_type"  size="1"> 
					<option value="交通费" selected="selected" >交通费</option>	
					<option value="加班交通费" >加班交通费</option>						
				</select></td>
				<td><input type="text" id="receipt"  style="width:50px;"></td>				
		    <td><select id="Currency"  size="1" onchange="get_huilv(this)"> 		          
				  <option value='0' selected="selected" >请选择</option>		
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
				  <option value='0' selected="selected" >无对应客户(0)</option>		
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