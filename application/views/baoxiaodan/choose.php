<div class="w" id="regist">	
<a href="<?=site_url("baoxiaodan/get_huilv")?>" style="display:none" id="huilv" ></a>
<a href="<?=site_url("baoxiaodan/get_butie")?>" style="display:none" id="butie" ></a>

<?php 
	$attributes = array('id' => 'baoxiaoform');
    echo form_open('baoxiaodan/check_data', $attributes);
	?>	
	<table id="baoxiao"  align="center" > 
	<thead> 
  	<tr> 
	  <th scope="col" colspan='2' class="rounded-company"></th>	
	  <th scope="col" class="rounded-q2" colspan='2' ><span id='someheader'>提交报销单</span></th>	
	  <th scope="col" class="rounded-q4" colspan='2' ></th>
	 	</tr> 
   </thead> 
	<tfoot> 
		<tr> 
		<td colspan="5" class="rounded-foot-left"></td> 
		<td class="rounded-foot-right">&nbsp;</td> 
		</tr> 
	</tfoot> 
	<tbody> 
	<tr>  
			<td  align="right"><strong>员工编号:</strong></td> 
			<td  align="left"><?php echo $yuangongbianhao?></td> 
			<td  align="right"><strong>员工姓名:</strong></td> 
			<td  align="left"><?php echo $xingming?></td> 
			<td  align="right"><strong>所属部门:</strong></td> 
		    <td  align="left"><?php echo $bumenming; ?></td> 
		</tr> 
		<tr> 
			<td  align="right"><strong>报销单编号:</strong></td> 
			<td  align="left">系统自动生成</td> 
			<td  align="right"><strong>付款方式:</strong></td> 
			<td  align="left">
			      <select id="customer_type" name="customer_type" size="1" > 
					<option value="现金" selected="selected" >现金</option>	
					<option value="支票" >支票</option>
					<option value="汇款" >汇款</option>		
					<option value="信用卡" >信用卡</option>
					<option value="冲减借款" >冲减借款</option>							
				</select></td> 
			<td  align="right"><strong>费用所属部门:</strong></td> 
		    <td  align="left">		      
		    <select id="bumen" name="bumen" size="1"> 
					<option value='<?php  echo "$bumenbianhao";?>' selected="selected"><?php echo "$bumenming";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>		
		           <?php foreach($bumen as $bumeninfo):?>
					<option value="<?php echo $bumeninfo['bumenbianhao']?>"><?php echo $bumeninfo['bumenming']?></option>
					<?php endforeach;?>
				</select></td> 
		 </tr> 
			<tr> 
			<td  align="right"><strong>预算科目编号:</strong></td> 
		    <td  align="left">			      
		    <select id="yusuan" name="yusuan" size="1"> 
					<option value="0" selected="selected">&nbsp;&nbsp;&nbsp;无预算科目(0)&nbsp;&nbsp;&nbsp;</option> 						
				</select>
			</td>
			<td  align="right"><strong>报销类别:</strong></td> 
		    <td  align="left">			      
		    <select id="leibie" name="leibie" size="1" onchange="change_type(this)"> 
					<option value="0" selected="selected">---请选择---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option> 
					<option value="1" >交通费</option>	
					<option value="2" >差旅费</option>
					<option value="3" >交际费</option>		
					<option value="4" >礼品费</option>
					<option value="5" >固定资产采购申请</option>	
					<option value="6" >通用报销单</option>							
				</select></td>

			<td  align="right"><strong>总金额:</strong></td> 
		    <td  align="left"><input type="text" id="zongjine" name="zongjine" readonly="readonly"></input></td> 

		</tr>  		
	</tbody> 
		</table> 	
<div style="clear:both;height:30px;"></div>
<?php 
	 $this->load->view('baoxiaodan/jiaotong',$basic);
	 $this->load->view('baoxiaodan/chailv',$basic);
	 $this->load->view('baoxiaodan/jiaoji',$basic);
	 $this->load->view('baoxiaodan/lipin',$basic);
	 $this->load->view('baoxiaodan/zichan',$basic);
	 $this->load->view('baoxiaodan/tongyong',$basic); 
 ?>

 <div class="tab"></div>	
<div id="list">
<span id='headline'>已经添加的报销单列表</span>
<div id="table1" style="display:none;">
 <table id="list" summary="交通费" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">编号</th>
					<th scope="col" class="rounded-q1">费用类型</th>
					<th scope="col" class="rounded-q3">收据金额</th> 
					<th scope="col" class="rounded-q2">币种</th> 
					<th scope="col" class="rounded-q3">汇率</th> 
					<th scope="col" class="rounded-q3">报销金额</th> 
					<th scope="col" class="rounded-q1">上车时间</th> 
					<th scope="col" class="rounded-q2">上车地点</th> 
					<th scope="col" class="rounded-q3">下车时间</th> 
					<th scope="col" class="rounded-q1">下车地点</th> 
					<th scope="col" class="rounded-q1">客户编号</th> 					
					<th scope="col" class="rounded-q3">单据数目</th> 
					<th scope="col" class="rounded-q4">操作</th>
					</tr> 
					</thead> 
		     <tfoot>
					<tr> 
				 <td colspan="12" class="rounded-foot-left"></td> 
				<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="traffic2"> 

	</tbody> 
</table> 	
</div>	
<div style="clear:both;height:10px;"></div>	
<div id="table2" style="display:none;">
 <table id="jiaotong" summary="差旅费" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">编号</th>
					<th scope="col" class="rounded-q3">费用类型</th>
					<th scope="col" class="rounded-q3">收据金额</th> 
					<th scope="col" class="rounded-q2">币种</th> 
					<th scope="col" class="rounded-q3">汇率</th> 
					<th scope="col" class="rounded-q3">报销金额</th>  					
					<th scope="col" class="rounded-q1">商旅目的地</th> 
					<th scope="col" class="rounded-q2">起始时间</th> 
					<th scope="col" class="rounded-q3">结束时间</th> 
					<th scope="col" class="rounded-q3">天数</th> 
					<th scope="col" class="rounded-q1">客户编号</th> 					
					<th scope="col" class="rounded-q3">单据数目</th> 
					<th scope="col" class="rounded-q4">操作</th>
					</tr> 
					</thead> 
		     <tfoot> 
					<tr> 
				<td colspan="12" class="rounded-foot-left"></td> 
				<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="chai_list"> 
	</tbody> </table> 	
</div>	
	<div style="clear:both;height:2px;"></div>	
	
<div id="table3" style="display:none;">
 <table id="jiaotong" summary="交际费" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">编号</th>
					<th scope="col" class="rounded-q3">收据金额</th> 	
					<th scope="col" class="rounded-q2">币种</th> 
					<th scope="col" class="rounded-q3">汇率</th> 
					<th scope="col" class="rounded-q3">报销金额</th> 					
					<th scope="col" class="rounded-q1">交际时间</th> 
					<th scope="col" class="rounded-q1">交际地点</th> 
					<th scope="col" class="rounded-q2">邀请公司名称</th> 
					<th scope="col" class="rounded-q3">邀请人姓名</th> 
					<th scope="col" class="rounded-q1">客户</th> 					
					<th scope="col" class="rounded-q1">单据数目</th> 
					<th scope="col" class="rounded-q4">操作</th>
					</tr> 
					</thead> 
		     <tfoot> 
					<tr> 
				<td colspan="11" class="rounded-foot-left"></td> 
				<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="jiaoji_list"> 
	</tbody> </table> 	
</div>	
	<div style="clear:both;height:2px;"></div>	
	
	<div id="table4" style="display:none;">
 <table id="jiaotong" summary="礼品费" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">编号</th>
					<th scope="col" class="rounded-q3">收据金额</th> 	
					<th scope="col" class="rounded-q2">币种</th> 
					<th scope="col" class="rounded-q3">汇率</th> 
					<th scope="col" class="rounded-q3">报销金额</th> 					
					<th scope="col" class="rounded-q1">送礼品时间</th> 
					<th scope="col" class="rounded-q1">礼品名</th> 
					<th scope="col" class="rounded-q2">接受礼品公司名称</th> 
					<th scope="col" class="rounded-q3">接受礼品人名</th> 
					<th scope="col" class="rounded-q1">客户</th> 					
					<th scope="col" class="rounded-q1">单据数目</th> 
					<th scope="col" class="rounded-q4">操作</th>
					</tr> 
					</thead> 
		     <tfoot> 
					<tr> 
				<td colspan="11" class="rounded-foot-left"></td> 
				<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="lipin_list"> 
	</tbody> </table> 	
</div>	
	<div style="clear:both;height:2px;"></div>
<div id="table5" style="display:none;">
 <table id="jiaotong" summary="固定资产折旧费费" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">编号</th>
					<th scope="col" class="rounded-q3">收据金额</th> 	
					<th scope="col" class="rounded-q2">币种</th> 
					<th scope="col" class="rounded-q3">汇率</th> 
					<th scope="col" class="rounded-q3">报销金额</th> 					
					<th scope="col" class="rounded-q1">采购时间</th> 
					<th scope="col" class="rounded-q1">资产名</th> 
					<th scope="col" class="rounded-q2">用途</th> 					
					<th scope="col" class="rounded-q2">单据数目</th> 
					<th scope="col" class="rounded-q4">操作</th>
					</tr> 
					</thead> 
		     <tfoot> 
					<tr> 
				<td colspan="9" class="rounded-foot-left"></td> 
				<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="zichan_list"> 
	</tbody> </table> 	
</div>	
	<div style="clear:both;height:2px;"></div>
<div id="table6" style="display:none;">
 <table id="jiaotong" summary="通用报销单" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">编号</th>
					<th scope="col" class="rounded-q3">收据金额</th> 	
					<th scope="col" class="rounded-q2">币种</th> 
					<th scope="col" class="rounded-q3">汇率</th> 
					<th scope="col" class="rounded-q3">报销金额</th> 					
					<th scope="col" class="rounded-q1">支付时间</th> 
					<th scope="col" class="rounded-q1">使用目的</th> 
					<th scope="col" class="rounded-q2">费用明细</th> 
					<th scope="col" class="rounded-q1">对应客户</th> 					
					<th scope="col" class="rounded-q1">单据数目</th> 
					<th scope="col" class="rounded-q4">操作</th>
					</tr> 
					</thead> 
		     <tfoot> 
					<tr> 
				<td colspan="10" class="rounded-foot-left"></td> 
				<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="tongyong_list"> 
	</tbody> </table> 	
</div>	
	<div style="clear:both;height:2px;"></div>
	<span id="beizhu" > <label >备注：</label>
     <textarea  name="remark" id="remark" style="color:#028ad4"></textarea>
     </span>
     <div style="clear:both;height:15px;"></div>
     <span>
     <input type="submit"  value="提交报销单"  class="btn-img btn-regist" onclick="return present();"></input>
<!--     <input type="button"  value="全部清空" class="btn-img btn-regist" onclick="emptyall()"></input>-->
     </span>
</div>
	
</form>	
</div>

