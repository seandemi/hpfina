<div id="bodyly" style="position: absolute; top: 0px; filter: alpha(opacity=80); background-color: #333; z-index: 0; left: 0px; display: none;"></div>
<!--主体样式-->		
<div class="mainpage"><!--Left样式开始-->
	<div class="left">
	 <div class="leftcontent" >				  
				  
		<div class="my_r_box">  
			<div class="my_r_box1">
				 <span id='geren'>个人中心</span>
				 <div style="height:5px;clear: both;"></div>
				
					       <ul class="my_normal"> 
					            <li id="info">员工编号：&nbsp;<font color="#8C0044"><?php  echo $yuangongbianhao;?></font></li> 
					            <li id="info">员工姓名：&nbsp;<font color="#8C0044"><?php  echo $xingming;?></font></li> 
					            <li id="info">所属部门：&nbsp;<font color="#8C0044"><?php  echo $bumenming;?></font></li> 
					            <li id="info">部门编号：&nbsp;<font color="#8C0044"><?php  echo $bumenbianhao;?></font></li> 
					            <li id="info">员工职位：&nbsp;<font color="#8C0044"><?php  echo $jibie;?></font></li> 
					         </ul>   
					         <span style="float:right"  ><a target="_blank" style="text-decoration: none;" href="<?=site_url('personal/index/')?>">查看更多...</a></span>
					         <div style="clear: both;"></div>
					       </div>  
		   </div>      	 </div>
	 
	<div style="height:10px;clear: both;"></div>
		 <div class="leftcontent2" >
			<div class="my_r_box">
			 <div class="my_r_box1">
				 <span id='geren'>系统消息</span>
				  <div style="height:5px;clear: both;"></div>
					   <MARQUEE onmouseover=this.stop() onmouseout=this.start() scrollAmount=2 direction=up height=150>
						   <table border=0 cellspacing=0 width=100%>
						   <tbody>
						   <tr>
						   <td align="center" width="15" valign="top"> 
							   <table cellspacing="0" cellpadding="0" border="0">
							   <tbody>
								   <tr>
								    <td align="center" valign="center"><img src="<?php echo base_url(); ?>img/bbg.gif" border="0" />
								    </td>
								    <td width="0" height="20px" style="LINE-HEIGHT: 20px">&nbsp;</td>                                   
								   </tr>
							   </tbody>
							   </table>
						   </td>
                           <td valign="middle" height="20px" style="LINE-HEIGHT: 20px;"><a target="_blank" title="" href="*" style="text-decoration: none;">关于召开2012年度公司员工大会的通知</a>
                    </td>
					</tr>	   
						   </tbody>
						   </table>
					  </MARQUEE>  
				 </div>  
		   </div>  
				         
				       
			 </div>
		<div style="clear: both;"></div>
			
			</div>		
		<!--Left样式结束-->
</div>
<div class="right">
	<div class="leftcontent" style="margin-top: 0px;  overflow: hidden;">	
	<div><span id='info_table'>正在执行的报销单列表</span></div>			
					<table id="rounded-corner" summary=" Companies  Profit"> 
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
					<td colspan="4" class="rounded-foot-left"><em><span style="float:right;">查看更多...</span></em></td> 
					<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
					<tbody> 
					<tr> 
					<td>Microsoft</td> 
					<td>20.3</td> 
					<td>30.5</td> 
					<td>23.5</td> 
					<td>40.3</td> 
					</tr> 
					</tbody> 
					</table> 		
</div>	
 
<div class="leftcontent2" style="margin-top: 0px;  overflow: hidden;">	
<div style="height:15px;clear: both;"></div> 
	<div><span id='info_table'>被驳回的报销单列表</span></div>			
					<table id="rounded-corner" summary=" Companies  Profit"> 
					<thead> 
					<tr> 
                    <th scope="col" class="rounded-company">报销单编号</th> 
					<th scope="col" class="rounded-q1">提交时间</th> 
					<th scope="col" class="rounded-q2">总金额</th> 
					<th scope="col" class="rounded-q3">驳回人</th> 
					<th scope="col" class="rounded-q4">查看</th> 
					</tr> 
					</thead> 
					<tfoot> 
					<tr> 
					<td colspan="4" class="rounded-foot-left"><em><span style="float:right;">查看更多...</span></em></td> 
					<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
					<tbody> 
					<tr> 
					<td>Microsoft</td> 
					<td>20.3</td> 
					<td>30.5</td> 
					<td>23.5</td> 
					<td>40.3</td> 
					</tr> 
					</tbody> 
					</table> 		
				   
		</div>	
		 
<div class="leftcontent3" style="margin-top: 0px;  overflow: hidden;">	
<div style="height:15px;clear: both;"></div> 
	<div><span id='info_table'>通过审批的报销单列表</span></div>			
					<table id="rounded-corner" summary=" Companies  Profit"> 
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
					<td colspan="4" class="rounded-foot-left"><em><span style="float:right;">查看更多...</span></em></td> 
					<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
					<tbody> 
					<tr> 
					<td>Microsoft</td> 
					<td>20.3</td> 
					<td>30.5</td> 
					<td>23.5</td> 
					<td>40.3</td> 
					</tr> 
					</tbody> 
					</table> 		
				   
		</div>
<div class="leftcontent3" style="margin-top: 0px;  overflow: hidden;">	
<div style="height:15px;clear: both;"></div> 
	<div><span id='info_table'>已领款的报销单列表</span></div>			
					<table id="rounded-corner" summary=" Companies  Profit"> 
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
					<td colspan="4" class="rounded-foot-left"><em><span style="float:right;">查看更多...</span></em></td> 
					<td class="rounded-foot-right">&nbsp;</td> 
					</tr> 
					</tfoot> 
					<tbody> 
					<tr> 
					<td>Microsoft</td> 
					<td>20.3</td> 
					<td>30.5</td> 
					<td>23.5</td> 
					<td>40.3</td> 
					</tr> 
					</tbody> 
					</table> 		
				   
		</div>		
		<div style="height:15px;clear: both;"></div> 			
		
</div>


