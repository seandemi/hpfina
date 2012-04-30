<div class="w" id="regist">	
<div style="clear:both;height:70px;"></div>
	<table id="tijiao"  align="center" > 
	<thead> 
  	<tr> 
	  <th scope="col" colspan='2' class="rounded-company"></th>	
	  <th scope="col" class="rounded-q2" colspan='2' ><span id='someheader'>报销单提交成功</span></th>	
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
		<td  align="center" colspan='6'>您的&nbsp;<span class="head"> <?php echo $leibie ?> </span>&nbsp;报销单已经提交成功，报销单编号为  <span class="head"> <?php echo $tijiao['baoxiaobianhao'] ?></span></td>
		</tr>  
		<tr> 
			<td  align="center" colspan='6'>已经邮件通知了下一级审批单位：<span class="head"><?php echo $nextshenpi['xingming']."(".$nextshenpi['yuangongbianhao'].")" ?></span></td>
		</tr>  
		<tr> 
			<td  align="center" colspan='6'>需要经过的报销路径为：</td>
		</tr>
		<tr> 
		<td  align="center" colspan='6'>提交-->
		<span class="head">	<?php foreach($tijiao['get_tijiao'] as $shenpiinfo):?>
				<?php echo$shenpiinfo['xingming']."(". $shenpiinfo['yuangongbianhao'].")" ?>-->
			<?php endforeach;?></span>
			结束
		</td>
		</tr> 
	</tbody> 
		</table> 	
<div style="clear:both;height:30px;"></div>


</div>