<div class="w" id="regist">	
<div style="clear:both;height:70px;"></div>
	<table id="tijiao"  align="center" > 
	<thead> 
  	<tr> 
	  <th scope="col" colspan='2' class="rounded-company"></th>	
	  <th scope="col" class="rounded-q2" colspan='2' ><span id='someheader'>�������ύ�ɹ�</span></th>	
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
		<td  align="center" colspan='6'>����&nbsp;<span class="head"> <?php echo $leibie ?> </span>&nbsp;�������Ѿ��ύ�ɹ������������Ϊ  <span class="head"> <?php echo $tijiao['baoxiaobianhao'] ?></span></td>
		</tr>  
		<tr> 
			<td  align="center" colspan='6'>�Ѿ��ʼ�֪ͨ����һ��������λ��<span class="head"><?php echo $nextshenpi['xingming']."(".$nextshenpi['yuangongbianhao'].")" ?></span></td>
		</tr>  
		<tr> 
			<td  align="center" colspan='6'>��Ҫ�����ı���·��Ϊ��</td>
		</tr>
		<tr> 
		<td  align="center" colspan='6'>�ύ-->
		<span class="head">	<?php foreach($tijiao['get_tijiao'] as $shenpiinfo):?>
				<?php echo$shenpiinfo['xingming']."(". $shenpiinfo['yuangongbianhao'].")" ?>-->
			<?php endforeach;?></span>
			����
		</td>
		</tr> 
	</tbody> 
		</table> 	
<div style="clear:both;height:30px;"></div>


</div>