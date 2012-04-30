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
	    echo form_open('su/shenpit/doadd',$attributes); 
	?>	
		<table  border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">警告时限:</th>
			<td><input type="text"   maxlength="2" name="jinggao" id="jinggao" onkeypress="return checkNum(event)" value="<?php echo $shenpit[0]['jinggaoshixian'];?>" class="inp-form" />天</td>
			<td>
			<div id="error-left1" class="error-left" style="display:none;"></div>
			<div id="error-inner1" class="error-inner" style="display:none;">请输入正确的天数.</div>
			</td>
		</tr>
		<tr>
			<th valign="top">跳过时限:</th>
			<td><input type="text" maxlength="2"  name="tiaoguo" id="tiaoguo" onkeypress="return checkNum(event)" value="<?php echo $shenpit[0]['tiaoguoshixian'];?>" class="inp-form" />天</td>
			<td>
			<div id="error-left2" class="error-left" style="display:none;"></div>
			<div id="error-inner2" class="error-inner" style="display:none;">请输入正确的天数.</div>
			</td>
		</tr>
		<tr>
			<th valign="top">&nbsp;</th>
			<td></td>
			<td></td>
		</tr>
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input id="form-submit" type="submit" onclick="return check();" value="" class="form-submit" />
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
<script type="text/javascript">
function checkNum(e)
{
	var keynum
	var keychar
	var numcheck
	if(window.event) // IE
	  {
	  keynum = e.keyCode
	  }
	else if(e.which) // Netscape/Firefox/Opera
	  {
	  keynum = e.which
	  }
	keychar = String.fromCharCode(keynum)
	numcheck = /[\d]/
	return numcheck.test(keychar)
}


function check(){
	checkjinggao = true;
	checktiaoguo = true;
	jinggao = $("#jinggao").val();
	tiaoguo = $("#tiaoguo").val();
	if(jinggao == ""){
		$('#error-left1').show();
	   	$('#error-inner1').show();
		checkjinggao = false;
	} else {
		$('#error-left1').hide();
	   	$('#error-inner1').hide();
	   	checkjinggao = true;
	}
	if(tiaoguo == ""){
		$('#error-left2').show();
	   	$('#error-inner2').show();
		checktiaoguo = false;
	} else {
		$('#error-left2').hide();
	   	$('#error-inner2').hide();
	   	checktiaoguo = true;
	}

	if(checkjinggao && checktiaoguo){
		return true;
	} else {
		return false;
	}
}
</script>
    
    
