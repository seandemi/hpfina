<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">
<div id="page-heading"><h1>员工详细信息</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="<?php echo base_url(); ?>img/su/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="<?php echo base_url(); ?>img/su/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
		<table  border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">客户编号:</th>
			<td><?php echo $info[0]['kehubianhao'];?></td>
		</tr>
		<tr>
			<th valign="top">客户名称:</th>
			<td><?php echo $info[0]['name'];?></td>
		</tr>
		<tr>
			<th valign="top">开户银行:</th>
			<td><?php echo $info[0]['kaihuyinhang'];?></td>
		</tr>
		<tr>
			<th valign="top">账户名:</th>
			<td><?php echo $info[0]['zhanghuming'];?></td>
		</tr>
		<tr>
			<th valign="top">银行账号:</th>
			<td><?php echo $info[0]['yinhangzhanghao'];?></td>
		</tr>
		<tr>
			<th valign="top">税号:</th>
			<td><?php echo $info[0]['shuihao'];?></td>
		</tr>
		<tr>
			<th valign="top">地址:</th>
			<td><?php echo $info[0]['dizhi'];?></td>
		</tr>
		<tr>
			<th valign="top">电话:</th>
			<td><?php echo $info[0]['dianhua'];?></td>
		</tr>
		<tr>
			<th valign="top">传真:</th>
			<td><?php echo $info[0]['chuanzhen'];?></td>
		</tr>
		<tr>
			<th valign="top">联系人:</th>
			<td><?php echo $info[0]['lianxiren'];?></td>
		</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
            <input type="button" onclick="history.back();" class="form-reset"  />
		</td>
		<td></td>
	</tr>
	</table>

	</td>
	<td>
</td>
</tr>
<tr>
<td><img src="<?php echo base_url(); ?>img/su/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>
<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->
<div class="clear">&nbsp;</div>