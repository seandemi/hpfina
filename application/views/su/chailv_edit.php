<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>添加差旅补贴</h1></div>


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
	    echo form_open('su/chailv/doedit',$attributes); 
	?>	
	    <input type="hidden" name="id" value="<?php echo $chailv[0]['id'];?>" />
		<table  border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
		<th valign="top">员工级别:</th>
		<td><?php echo $chailv[0]['jibie'];?></td>
		<td></td>
		</tr>
		<tr>
			<th valign="top">国内补贴（元/天）:</th>
			<td><input type="text" value = "<?php echo $chailv[0]['jine1'];?>" name="jine1" id="bumenno" class="inp-form" /></td>
			<td>
			<div id="error-left1" class="error-left" style="display:none;"></div>
			<div id="error-inner1" class="error-inner" style="display:none;">输入正确的金额格式.</div>
			</td>
		</tr>
		<tr>
			<th valign="top">国外补贴（元/天）:</th>
			<td><input type="text"  value = "<?php echo $chailv[0]['jine2'];?>" name="jine2" id="bumenname" class="inp-form" /></td>
			<td>
			<div id="error-left2" class="error-left" style="display:none;"></div>
			<div id="error-inner2" class="error-inner" style="display:none;">输入正确的金额格式</div>
			</td>
		</tr>
		<tr>
			<th valign="top">港澳台补贴（元/天）:</th>
			<td><input type="text" name="jine3" id="jine3" value = "<?php echo $chailv[0]['jine3'];?>" class="inp-form" /></td>
			<td>
			<div id="error-left3"  class="error-left" style="display:none;"></div>
			<div id="error-inner3" class="error-inner" style="display:none;">输入正确的金额格式</div>
			</td>
		</tr>

	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input id="form-submit" type="submit" onclick="return check();" value="" class="form-submit" />
<!--			<input type="reset" value="" class="form-reset"  />-->
            <input type="button" value="" onclick="history.back();" class="form-reset"  />
		</td>
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
