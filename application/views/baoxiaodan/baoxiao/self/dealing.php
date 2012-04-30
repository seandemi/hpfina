<div class="w" id="regist">	
<a href="<?=site_url("process/processdeal")?>" style="display:none" id="processdeal" ></a>
<span style="display:none"><input id="gettime" value="<?php echo $page['time'];?>"></input><input id="gettype" value="<?php echo $page['type'];?>"></input><input id="getzongjine" value="<?php echo $page['zongjine'];?>"></input><input id="nowpage" value="<?php echo $page['nowpage'];?>"></input>
<input id="pagesum" value="<?php echo $page['pagesum'];?>"></input></span>
<div style="margin-left:60px;"><span style="padding-right:20px;">提交时间：<input id="time" style="width:80px;"></input></span><span style="padding-right:20px;">总金额 ：<input id="zongjine" style="width:80px;"></input></span><span style="margin-right:20px;display:none;">单据金额 ：<input id="danju" style="width:80px;"></input></span><span style="padding-right:20px;">报销单类型 ： <select id="leibie"  size="1" > 
					<option value="0" selected="selected">---请选择---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option> 
					<option value="1" >交通费</option>	
					<option value="2" >差旅费</option>
					<option value="3" >交际费</option>		
					<option value="4" >礼品费</option>
					<option value="5" >固定资产采购申请</option>	
					<option value="6" >通用报销单</option>							
				</select></span><input type="button" onclick="deal()" value="查询"></input></div>			
<div style="height:15px;clear: both;">	</div>
<div style="text-align:center;margin:0 auto;"><span id='head2'>正在执行的报销单列表</span></div>
<div class="titleleft">
<span id="headtittle"><font>有<strong><?php echo $page['pagesum'];?></strong>页&nbsp;共<strong><?php echo $page['rowsum']; ?></strong>条数据满足条件&nbsp;第<strong><?php echo $page['nowpage'];?></strong>页</font></span>
</div>
<table id="display-tablle" align="center" > 
					<thead> 
					<tr> 
					<th scope="col" class="rounded-company">报销单编号</th> 
					<th scope="col" class="rounded-q1">提交时间</th> 
					<th scope="col" class="rounded-q2">总金额</th> 
					<th scope="col" class="rounded-q3">当前状态</th> 
					<th scope="col" class="rounded-q4">查看</th> 
					</tr> 
					</thead> 
					<tfoot> 
					<tr> 
					<td colspan="4" class="rounded-foot-left"></td> 
					<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
					<tbody id="main"> 
					<?php
					foreach($info as $data_pro):?>
					<tr>
					<td> <?php echo $data_pro['baoxiaobianhao']?></td>
					<td> <?php echo $data_pro['tijiaoshijian']?></td>					
					<td> <?php echo $data_pro['zongjine']?></td>
					<td><?php for($i=0;$i<$data_pro['yishenpi'];$i++){?> <img src='<?php echo base_url(); ?>img/ico_sus.gif' /><?php  }?><?php for($i=0;$i< $data_pro['weishenpi'];$i++){?> <img src='<?php echo base_url(); ?>img/wait.png' /><?php  }?></td>		
					<td><a href="<?=site_url("info/show/{$data_pro['baoxiaobianhao']}/{$data_pro['baoxiaoleixing']}")?>" >查看</a> </td>								
					</tr>
					<?php endforeach;?>					
					</tbody>
					</table> 
<div class="titleright">
<span id="headtittle"><input type="button" value="首页"  onclick="changepage(this)"/> &nbsp;<input type="button" value="上页" onclick="changepage(this)"/>&nbsp;<input type="button" value="下页"   onclick="changepage(this)"/>&nbsp;<input type="button" value="末页"  onclick="changepage(this)"/>&nbsp;</span>
</div>	
<div style="height:15px;clear: both;">	</div>	
</div>	


