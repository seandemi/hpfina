<div class="w" id="regist">	
<div style="clear:both;height:30px;"></div>
<table id="baoxiao"  align="center" > 
	<thead> 
  	<tr> 
	  <th scope="col" colspan='4' class="rounded-company"></th>	
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
			<td  align="left"><?php echo $yuangongbianhao;?></td> 
			<td  align="right"><strong>员工姓名:</strong></td> 
			<td  align="left"><?php echo $xingming;?></td> 
			<td  align="right"><strong>所属部门:</strong></td> 
		    <td  align="left"><?php echo $baoxiaoinfo[0]['bumenming']; ?></td> 
		</tr> 
		<tr> 
			<td  align="right"><strong>报销单编号:</strong></td> 
			<td  align="left"><?php echo $baoxiaoinfo[0]['baoxiaobianhao']; ?></td> 
			<td  align="right"><strong>付款方式:</strong></td> 
			<td  align="left"><?php echo $baoxiaoinfo[0]['fukuanfangshi']; ?></td> 
			<td  align="right"><strong>费用所属部门:</strong></td> 
		    <td  align="left"><?php echo $baoxiaoinfo[0]['fudanbumen']; ?></td> 
		 </tr> 
			<tr> 
			<td  align="right"><strong>预算科目编号:</strong></td> 
		    <td  align="left">
		    <?php 
		    if($baoxiaoinfo[0]['feiyongbianhao']==0){
		    echo  "无对应客户"; 
		    }
		    else { echo $baoxiaoinfo[0]['feiyongbianhao'];}?>
		    </td>
			<td  align="right"><strong>报销类别:</strong></td> 
		    <td  align="left"><?php 
           if($baoxiaoinfo[0]['baoxiaoleixing']==1){
           	echo "交通费";
           }
           else if($baoxiaoinfo[0]['baoxiaoleixing']==2){
           	echo "差旅费";
           }
		   else if($baoxiaoinfo[0]['baoxiaoleixing']==3){
           	echo "交际费";
           }
           else if($baoxiaoinfo[0]['baoxiaoleixing']==4){
           	echo "礼品费";
           } 
           else if($baoxiaoinfo[0]['baoxiaoleixing']==5){
           	echo "固定资产采购申请";
           }  
           else if($baoxiaoinfo[0]['baoxiaoleixing']==6){
           	echo "通用报销单";
           }   
		    ?></td>
			<td  align="right"><strong>总金额:</strong></td> 
		    <td  align="left"><?php echo $baoxiaoinfo[0]['zongjine']; ?></td>
		</tr>	
	</tbody> 
</table> 	
<div style="clear:both;height:30px;"></div>
	
<div id="list">
<span id='headline'>报销单列表</span>
<div style="clear:both;height:10px;"></div>
<div id="table1" >
 <table id="list"  align="center"> 
<?php 
  if($baoxiaoinfo[0]['baoxiaoleixing']==1){
 	 $this->load->view('baoxiaodan/baoxiao/leixing/jiaotong');
 }
  else if($baoxiaoinfo[0]['baoxiaoleixing']==2){
      $this->load->view('baoxiaodan/baoxiao/leixing/chailv');
           }
  else if($baoxiaoinfo[0]['baoxiaoleixing']==3){
    $this->load->view('baoxiaodan/baoxiao/leixing/jiaoji');
     }
  else if($baoxiaoinfo[0]['baoxiaoleixing']==4){
      $this->load->view('baoxiaodan/baoxiao/leixing/lipin');
     } 
  else if($baoxiaoinfo[0]['baoxiaoleixing']==5){
      $this->load->view('baoxiaodan/baoxiao/leixing/zichan');
      }  
 else if($baoxiaoinfo[0]['baoxiaoleixing']==6){
     $this->load->view('baoxiaodan/baoxiao/leixing/tongyong');
   }
?>
		     <tfoot>
					<tr> 
				 <td colspan="<?php echo $num;?>" class="rounded-foot-left"></td> 
				<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="traffic2"> 
<?php 
for($i=0;$i< $number;$i++){
?>
<tr>
<td><?php echo $i+1;?></td>
<?php 
foreach ($baoxiaoxiangqing[$i] as $key => $val ):
?>
<td>
<?php echo $val;?>
</td>
<?php endforeach;?>
</tr>
<?php }?>
	</tbody> 
</table>	
</div>	
	<div style="clear:both;height:30px;"></div>
	<span id="beizhu" > <label >备注：</label>
     <textarea  name="remark" id="remark" style="color:#028ad4"><?php echo $baoxiaoinfo[0]['beizhu']; ;?></textarea>
     </span>
     <div style="clear:both;height:15px;"></div>
  <div class="tab"></div>	
<div id="list">
<span id='headline'>审批状态列表</span>
<div style="clear:both;height:15px;"></div>
<table id="list" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">审批人</th>
					<th scope="col" class="rounded-q1">审批时间</th>
					<th scope="col" class="rounded-q3">意见</th> 
					<th scope="col" class="rounded-q4">详细意见</th> 
					</tr> 
					</thead> 
<tfoot>
					<tr> 
				 <td colspan="3" class="rounded-foot-left"></td> 
				<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
		<tbody id="traffic2"> 
<?php 
if($yishenpi==0){
	echo "<tr><td colspan='4'>暂无审批信息</td></tr>";
}
else{
   for($i=$shenpi[0]['yishenpi']-1;$i>=0;$i--){
?>
<tr>
<td><?php echo $shenpi[$i]['xingming']."(".$shenpi[$i]['yuangongbianhao'].")";?></td>
<td><?php echo $shenpi[$i]['passdate'];?></td>
<td><?php 
if($shenpi[$i]['yijian']==1){echo "同意";}else {echo "不同意";}?></td>
<td><?php echo $shenpi[$i]['pinglun'];?></td>

</tr>
<?php }}?>

	</tbody> 
</table> 	
     <span>
     <a  href="<?=site_url("process/change/{$baoxiaoinfo[0]['baoxiaobianhao']}/{$baoxiaoinfo[0]['baoxiaoleixing']}")?>" class="btn-img btn-regist">修改报销单</a>
      <a href="<?=site_url("process/delete/{$baoxiaoinfo[0]['baoxiaobianhao']}/{$baoxiaoinfo[0]['baoxiaoleixing']}")?>"  class="btn-img btn-regist" >删除报销单</a>
     </span>
</div>
</div>

