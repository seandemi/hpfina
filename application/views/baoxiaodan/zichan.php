<div id="zichan" style="display:none;">
 <table id="jiaotong" summary="固定资产采购申请" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">收据金额</th> 	
					<th scope="col" class="rounded-q2">币种</th> 
					<th scope="col" class="rounded-q3">汇率</th> 
					<th scope="col" class="rounded-q3">报销金额</th> 					
					<th scope="col" class="rounded-q1">采购时间</th> 
					<th scope="col" class="rounded-q1">资产名</th> 
					<th scope="col" class="rounded-q2">用途</th> 					
					<th scope="col" class="rounded-q4">单据数目</th> 
					</tr> 
					</thead> 
					<tfoot> 
					<tr> 
					<td colspan="7" class="rounded-foot-left">					
					<span style="float:right;">
					<input type="button" id="add" class="buttonstyle"  value="添加到列表" onclick="addto()"></input>
					<span style="width:15px;"></span>
					<input type="button"  value="重新填写" class="buttonstyle" id="clear" onclick="cancel()"></input>
					</span></td> 
					<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="traffic"> 
		  <tr> 
				<td><input type="text" id="receipt_zichan"  style="width:50px;"></td>				
		    <td><select id="Currency_zichan"  size="1" onchange="get_huilv(this)"> 		          
				  <option value='0' selected="selected" >请选择</option>		
		           <?php foreach($huobi as $bizhong):?>
					<option value="<?php echo $bizhong['name']?>"><?php echo $bizhong['name']?></option>
					<?php endforeach;?>
				</select></td> 
					<td><input type="text" id="parity_zichan" readonly="readonly" style="width:30px;" ></input></td> 
					<td><input type="text" id="jine_zichan"  readonly="readonly" style="width:80px;"></input></td> 
					<td><input type="text" id="zichan_time"  readonly="readonly" style="width:80px;" ></td> 
					<td><input type="text" id="zichan_name" style="width:150px;" ></td> 
					<td><input type="text" id="yongtu" style="width:150px;" ></td> 
					<td><input type="text" id="dnumber_zichan"  style="width:50px;"></td>					 
					</tr> 

					</tbody> 
</table> 		
		<div style="clear:both;height:10px;"></div>	
	</div>	