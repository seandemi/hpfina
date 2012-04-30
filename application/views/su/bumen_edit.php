<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>修改部门信息</h1></div>


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
	    echo form_open("su/bumen/doedit/",$attributes); 
	    // echo form_open("su/test/",$attributes); 
	?>

		<table  border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">部门编号:</th>
			<td><input type="text" check="<?=site_url("su/bumen/checkeditno/")?>" value="<?php echo $bumeninfo[0]['bumenbianhao']; ?>" name="bumenno" id="bumenno" class="inp-form"  /></td>
			<td>
			<div id="error-left1" class="error-left" style="display:none;"></div>
			<div id="error-inner1" class="error-inner" style="display:none;">输入必须为1-15位数字和字母的组合.</div>
			</td>
		</tr>
		<tr>
			<th valign="top">部门名称:</th>
			<td><input type="text"  check="<?=site_url("su/bumen/checkeditname/")?>" value="<?php echo $bumeninfo[0]['bumenming']; ?>" name="bumenname" id="bumenname" class="inp-form" /></td>
			<td>
			<div id="error-left2" class="error-left" style="display:none;"></div>
			<div id="error-inner2" class="error-inner" style="display:none;">部门名不能为空！.</div>
			</td>
		</tr>
		<tr>
			<th valign="top">费用属性:</th>
			<td><input type="text" value="<?php echo $bumeninfo[0]['feiyongshuxing']; ?>" name="bumenattr" id="bumenattr" class="inp-form" /></td>
			<td>
			<div id="error-left3" class="error-left" style="display:none;"></div>
			<div id="error-inner3" class="error-inner" style="display:none;">费用属性不能为空.</div>
			</td>
		</tr>
		<tr>
			<th valign="top">部门类别:</th>
			<td><input type="text" value="<?php echo $bumeninfo[0]['leibie']; ?>" name="bumencate" id="bumencate" class="inp-form" /></td>
			<td>
			<div id="error-left4" class="error-left" style="display:none;"></div>
			<div id="error-inner4" class="error-inner" style="display:none;">部门类别不能为空.</div>
			</td>
		</tr>
		<tr>
		<th valign="top">部门状态:</th>
		<td>	
		<select  name="bumenstatus" class="styledselect_form_1">
		<?php if($bumeninfo[0]['zhuangtai'] == 0):?>
			<option  value="0" selected="selected">正常</option>
			<option  value="1">禁用</option>
		<?php else:?>
		    <option  value="0" >正常</option>
			<option  value="1" selected="selected">禁用</option>
		<?php endif?>
		</select>
		</td>
		<td></td>
		</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input id="form-submit" type="submit" onclick="return check();" value="" class="form-submit" />
			<input type="button" value="" class="form-reset" onclick="window.location=<?=site_url('su/bumen/')?>" />
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
<script type="text/javascript">
var check1 = true;
var check2 = true;
var check3 = true;
var check4 = true;

$("#bumenno").change(function(){
    reg = /^([0-9]|[a-zA-Z]){1,15}$/;
    value = $(this).val();
    if(reg.test(value)){
    	$('#error-left1').hide();
    	$('#error-inner1').hide();
    	check1 = true;
    } else {
    	$('#error-left1').show();
    	$('#error-inner1').show();
    	$('#error-inner1').html("输入必须为6-8位数字和字母的组合");
    	check1 = false;
    	return false;
    }
	$.ajax({
		  type: "POST",
		  url: $(this).attr("check"),
		  data: "bumenno="+value,
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			  if(json.check == "0"){
				  $('#error-left1').hide();
		          $('#error-inner1').hide();
			  } else {
				  $('#error-left1').show();
		          $('#error-inner1').show();
		          $('#error-inner1').html("此员工编号已存在！");
		          check1 = false;
			  }
		  }
		});
});

$("#bumenname").change(function(){
	reg = /(^\s*)|(\s*$)/;
	value = $(this).val().replace(reg, "");
    if(value != ""){
    	$('#error-left2').hide();
    	$('#error-inner2').hide();
    	check2 = true;
    } else {
    	$('#error-left2').show();
    	$('#error-inner2').show();
    	check2 = false;
    	return false;
    }

    $.ajax({
		  type: "POST",
		  url: $(this).attr("check"),
		  data: "bumenname="+value,
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			  if(json.check == "0"){
				  $('#error-left2').hide();
		          $('#error-inner2').hide();
			  } else {
				  $('#error-left2').show();
		          $('#error-inner2').show();
		          $('#error-inner2').html("此部门已存在！");
		          check2 = false;
			  }
		  }
		});
});

$("#bumenattr").change(function(){
	reg = /(^\s*)|(\s*$)/;
	value = $(this).val().replace(reg, "");
    if(value != ""){
    	$('#error-left3').hide();
    	$('#error-inner3').hide();
    	check3 = true;
    } else {
    	$('#error-left3').show();
    	$('#error-inner3').show();
    	check3 = false;
    }
});

function check(){
	if(!check1){
		$('#error-left1').show();
    	$('#error-inner1').show();
	}
	if(!check2){
		$('#error-left2').show();
    	$('#error-inner2').show();
	}

	if(!check3){
		$('#error-left3').show();
    	$('#error-inner3').show();
	}
	if($("#yuangongbumen").val() == "0"){
		$('#error-lefts').show();
    	$('#error-inners').show();
    	checks = false;
	} else {
		$('#error-lefts').hide();
    	$('#error-inners').hide();
    	checks = true;
	}
	/*
	  $.ajax({
		  type: "POST",
		  url: $("#bumenno").attr("check"),
		  data: "bumenno="+$("#bumenno").val(),
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			  if(json.check == "0"){
				  $('#error-left1').hide();
		          $('#error-inner1').hide();
			  } else {
				  $('#error-left1').show();
		          $('#error-inner1').show();
		          $('#error-inner1').html("此部门编号已存在！");
		          check1 = false;
			  }
		  }
		});
	
    $.ajax({
		  type: "POST",
		  url: $("#bumenname").attr("check"),
		  data: "bumenname="+$("#bumenname").val(),
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			  if(json.check == "0"){
				  $('#error-left2').hide();
		          $('#error-inner2').hide();
			  } else {
				  $('#error-left2').show();
		          $('#error-inner2').show();
		          $('#error-inner2').html("此部门已存在！");
		          check2 = false;
			  }
		  }
		});
	*/
  
	if(check1 && check2 && check3 && checks){
		return true;
	} else {
		return false;
	}
}
</script>
    
