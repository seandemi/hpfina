<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>审批时限</h1></div>


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
	
		<!-- start id-form -->

	<?php
	    $attributes = array('id' => 'addform'); 
	    echo form_open('su/shenpit/edit',$attributes); 
	?>	
		<table  border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">警告时限:</th>
			<td><b><label name="jinggao" id="jinggao" value="<?php echo $shenpit[0]['jinggaoshixian'];?>"><?php echo $shenpit[0]['jinggaoshixian'];?></b></label>&nbsp;&nbsp;&nbsp;&nbsp;天</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">跳过时限:</th>
			<td><b><label name="tiaoguo" id="tiaoguo" value="<?php echo $shenpit[0]['tiaoguoshixian'];?>"><?php echo $shenpit[0]['tiaoguoshixian'];?></label></b>&nbsp;&nbsp;&nbsp;&nbsp;天</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">&nbsp;</th>
			<td></td>
			<td></td>
		</tr>
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input id="form-submit" type="submit" onclick="return check();" value="" class="form-edit" />
            <input type="button" value="" onclick="history.back();" class="form-reset"  />
		</td>
		<td></td>
		</tr>
		<tr>
			<th valign="top">&nbsp;</th>
			<td></td>
			<td></td>
		</tr>
		<tr>
		<th valign="top">&nbsp;</th>
		<td></td>
		<td></td>
		</tr>
	</table>
</form>
	<!-- end id-form  -->

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
    
    
