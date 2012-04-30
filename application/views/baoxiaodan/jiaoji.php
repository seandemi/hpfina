	
<div id="jiaojifei" style="display:none;">
 <table id="jiaotong" summary="交际费" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">收据金额</th> 	
					<th scope="col" class="rounded-q2">币种</th> 
					<th scope="col" class="rounded-q3">汇率</th> 
					<th scope="col" class="rounded-q3">报销金额</th> 					
					<th scope="col" class="rounded-q1">交际时间</th> 
					<th scope="col" class="rounded-q1">交际地点</th> 
					<th scope="col" class="rounded-q2">邀请公司名称</th> 
					<th scope="col" class="rounded-q3">邀请人姓名</th> 
					<th scope="col" class="rounded-q1">客户</th> 					
					<th scope="col" class="rounded-q4">单据数目</th> 
					</tr> 
					</thead> 
					<tfoot> 
					<tr> 
					<td colspan="9" class="rounded-foot-left">
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
				<td><input type="text" id="receipt_jiaoji"  style="width:50px;"></td>				
		    <td><select id="Currency_jiaoji"  size="1" onchange="get_huilv(this)"> 		          
				  <option value='0' selected="selected" >请选择</option>		
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
				  <option value='0' selected="selected" >无对应客户(0)</option>		
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