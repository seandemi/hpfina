
<div id="chailvfei" style="display:none;" >
<!--<span id='headline'>差旅费详单</span>-->
 <table id="jiaotong" summary="差旅费" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">费用类型</th> 
					<th scope="col" class="rounded-q3">收据金额</th> 
					<th scope="col" class="rounded-q2">币种</th> 
					<th scope="col" class="rounded-q3">汇率</th> 
					<th scope="col" class="rounded-q3">报销金额</th> 
					<th scope="col" class="rounded-q2" id="chal_col">商旅目的地</th> 					
					<th scope="col" class="rounded-q1">起始时间</th> 
					<th scope="col" class="rounded-q3">结束时间</th> 
					<th scope="col" class="rounded-q1">天数</th> 
					<th scope="col" class="rounded-q1">客户编号</th> 					
					<th scope="col" class="rounded-q4">单据数目</th> 
					</tr> 
					</thead> 
					<tfoot> 
					<tr>
					<td colspan="10" class="rounded-foot-left">
					<span style="float:right;">
					<input type="button"  value="获得天数" id="getdays" class="buttonstyle" onclick="get_days()"></input>
					<span style="width:15px;"></span>
					<input type="button" id="add" class="buttonstyle"  value="添加到列表" onclick="addto()"></input>
					<span style="width:15px;"></span>
					<input type="button"  value="重新填写" class="buttonstyle" id="clear" onclick="cancel()"></input>
					</span>
					</td> 
					<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="chailvinfo"> 
		  <tr>		  
			<td><select id="chalv_type" name="chailv_type" size="1" onchange="changetype()"> 
					<option value="市内交通费" selected="selected" >市内交通费</option>
					<option value="长途交通费"  >长途交通费</option>
					<option value="住宿费" >住宿费</option>
					<option value="洗衣费" >洗衣费</option>
					<option value="差旅补贴" >差旅补贴</option>
					<option value="其他" >其他</option>											
				</select></td>				
				<td><input type="text" id="receipt_chai"  style="width:50px;"></td>				
		    <td><select id="Currency_chai"  size="1" onchange="get_huilv(this)"> 		          
				  <option value='0' selected="selected" >请选择</option>		
		           <?php foreach($huobi as $bizhong):?>
					<option value="<?php echo $bizhong['name']?>"><?php echo $bizhong['name']?></option>
					<?php endforeach;?>
				</select></td> 
								
					<td><input type="text" id="parity_chai"  readonly="readonly" style="width:40px;" ></input></td> 
					<td><input type="text" id="jine_chai" readonly="readonly" style="width:55px;"></input></td> 
					<td id="chailv_info">
<!--<select id="mudi" name="mudi" size="1"> -->
<!--					<option value="1" selected="selected" >国内</option>	-->
<!--					<option value="2" >国外</option>-->
<!--					<option value="3" >港澳台</option>														-->
<!--				</select>-->
          <input type="text" id="des_place" style="width:90px;"></td> 
	    <td><div class="example-container" style="overflow:hidden;"><input type="text"  id="startchai"  readonly="readonly" value="" /><pre style="display:none;">$('#startchai').datetimepicker();</pre></div></td> 	
		<td><div class="example-container" style="overflow:hidden;"><input type="text"  id="endchai"  readonly="readonly" value="" /><pre style="display:none;">$('#endchai').datetimepicker();</pre></div></td>
					<td><input type="text" id="days"  readonly="readonly" style="width:40px;"  ></td> 					
			<td><select id="kehu_chai"  size="1"> 
				  <option value='0' selected="selected" >无对应客户(0)</option>		
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