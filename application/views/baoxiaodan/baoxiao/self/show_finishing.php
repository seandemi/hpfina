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
			<td  align="right"><strong>Ա�����:</strong></td> 
			<td  align="left"><?php echo $yuangongbianhao;?></td> 
			<td  align="right"><strong>Ա������:</strong></td> 
			<td  align="left"><?php echo $xingming;?></td> 
			<td  align="right"><strong>��������:</strong></td> 
		    <td  align="left"><?php echo $baoxiaoinfo[0]['bumenming']; ?></td> 
		</tr> 
		<tr> 
			<td  align="right"><strong>���������:</strong></td> 
			<td  align="left"><?php echo $baoxiaoinfo[0]['baoxiaobianhao']; ?></td> 
			<td  align="right"><strong>���ʽ:</strong></td> 
			<td  align="left"><?php echo $baoxiaoinfo[0]['fukuanfangshi']; ?></td> 
			<td  align="right"><strong>������������:</strong></td> 
		    <td  align="left"><?php echo $baoxiaoinfo[0]['fudanbumen']; ?></td> 
		 </tr> 
			<tr> 
			<td  align="right"><strong>Ԥ���Ŀ���:</strong></td> 
		    <td  align="left">
		    <?php 
		    if($baoxiaoinfo[0]['feiyongbianhao']==0){
		    echo  "�޶�Ӧ�ͻ�"; 
		    }
		    else { echo $baoxiaoinfo[0]['feiyongbianhao'];}?>
		    </td>
			<td  align="right"><strong>�������:</strong></td> 
		    <td  align="left"><?php 
           if($baoxiaoinfo[0]['baoxiaoleixing']==1){
           	echo "��ͨ��";
           }
           else if($baoxiaoinfo[0]['baoxiaoleixing']==2){
           	echo "���÷�";
           }
		   else if($baoxiaoinfo[0]['baoxiaoleixing']==3){
           	echo "���ʷ�";
           }
           else if($baoxiaoinfo[0]['baoxiaoleixing']==4){
           	echo "��Ʒ��";
           } 
           else if($baoxiaoinfo[0]['baoxiaoleixing']==5){
           	echo "�̶��ʲ��ɹ�����";
           }  
           else if($baoxiaoinfo[0]['baoxiaoleixing']==6){
           	echo "ͨ�ñ�����";
           }   
		    ?></td>
			<td  align="right"><strong>�ܽ��:</strong></td> 
		    <td  align="left"><?php echo $baoxiaoinfo[0]['zongjine']; ?></td>
		</tr>	
	</tbody> 
</table> 	
<div style="clear:both;height:30px;"></div>
	
<div id="list">
<span id='headline'>�������б�</span>
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
	<span id="beizhu" > <label >��ע��</label>
     <textarea  name="remark" id="remark" style="color:#028ad4"><?php echo $baoxiaoinfo[0]['beizhu']; ;?></textarea>
     </span>
     <div style="clear:both;height:15px;"></div>
  <div class="tab"></div>	
<div id="list">
<span id='headline'>����״̬�б�</span>
<div style="clear:both;height:15px;"></div>
<table id="list" align="center"> 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">������</th>
					<th scope="col" class="rounded-q1">����ʱ��</th>
					<th scope="col" class="rounded-q3">���</th> 
					<th scope="col" class="rounded-q4">��ϸ���</th> 
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
	echo "<tr><td colspan='4'>����������Ϣ</td></tr>";
}
else{
   for($i=$shenpi[0]['yishenpi']-1;$i>=0;$i--){
?>
<tr>
<td><?php echo $shenpi[$i]['xingming']."(".$shenpi[$i]['yuangongbianhao'].")";?></td>
<td><?php echo $shenpi[$i]['passdate'];?></td>
<td><?php 
if($shenpi[$i]['yijian']==1){echo "ͬ��";}else {echo "��ͬ��";}?></td>
<td><?php echo $shenpi[$i]['pinglun'];?></td>

</tr>
<?php }}?>

	</tbody> 
</table> 	
     <span>
     <a  href="<?=site_url("process/change/{$baoxiaoinfo[0]['baoxiaobianhao']}/{$baoxiaoinfo[0]['baoxiaoleixing']}")?>" class="btn-img btn-regist">�޸ı�����</a>
      <a href="<?=site_url("process/delete/{$baoxiaoinfo[0]['baoxiaobianhao']}/{$baoxiaoinfo[0]['baoxiaoleixing']}")?>"  class="btn-img btn-regist" >ɾ��������</a>
     </span>
</div>
</div>

