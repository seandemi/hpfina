<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>添加员工</h1></div>


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
	    echo form_open('su/yuangong/doadd',$attributes); 
	?>	
		<table  border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">员工编号:</th>
			<td><input check="<?=site_url("su/yuangong/checkadd/")?>" type="text" name="yuangongno" id="yuangongno" class="inp-form" /></td>
			<td>
			<div id="error-left1" class="error-left" style="display:none;"></div>
			<div id="error-inner1" class="error-inner" style="display:none;">输入必须为6-8位数字和字母的组合.</div>
			</td>
		</tr>
		<tr>
			<th valign="top">员工名称:</th>
			<td><input type="text" name="yuangongname" id="yuangongname" class="inp-form" /></td>
			<td>
			<div id="error-left2" class="error-left" style="display:none;"></div>
			<div id="error-inner2" class="error-inner" style="display:none;">名称不得为空.</div>
			</td>
		</tr>
		<tr>
			<th valign="top">所属部门:</th>
			<td>	
			<select id="yuangongbumen" name="yuangongbumen" class="styledselect_form_1">
				<option  value="0" selected="selected" >请选择部门</option>
			<?php foreach($bumeninfo as $key => $info):?>
				<option  value="<?php echo $info['bumenbianhao']; ?>"><?php echo $info['bumenming']; ?></option>
			<?php endforeach;?>
			</select>
			</td>
			<td>
			<div id="error-lefts" class="error-left" style="display:none;"></div>
			<div id="error-inners" class="error-inner" style="display:none;">请选择部门.</div>
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">职位:</th>
			<td><input type="text" name="yuangongpost" id="yuangongpost" class="inp-form" /></td>
			<td>
			<div id="error-left3" class="error-left" style="display:none;"></div>
			<div id="error-inner3" class="error-inner" style="display:none;">职位不得为空.</div>
			</td>
		</tr>
		<tr>
			<th valign="top">初始密码:</th>
			<td><input type="text" name="yuangongpsw"   value="111111" id="yuangongpsw" class="inp-form" /></td>
			<td>
			<div id="error-left4" class="error-left" style="display:none;"></div>
			<div id="error-inner4" class="error-inner" style="display:none;">姓名不得为空.</div>
			</td>
		</tr>
		<tr>
		<th valign="top">账户状态:</th>
		<td>	
		<select  name="yuangongstatus" class="styledselect_form_1">
			<option  value="0" selected="selected" >正常</option>
			<option  value="1">禁用</option>
		</select>
		</td>
		<td></td>
		</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input id="form-submit" type="submit" onclick="return check();" value="" class="form-submit" />
<!--			<input type="reset" value="" class="form-reset"  />-->
            <input type="button" onclick="history.back();" class="form-reset"  />
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
    var check1 = false;
    var check2 = false;
    var check3 = false;
    var checks = false;
    
    $("#yuangongno").blur(function(){
        reg = /^([0-9]|[a-zA-Z]){6,8}$/;
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
        }
		$.ajax({
			  type: "POST",
			  url: $(this).attr("check"),
			  data: "value="+value,
			  dataType: 'json',
			  cache: false,
			  success: function(json){
				  if(json.check == "0"){
					 // $('#error-left1').hide();
			         // $('#error-inner1').hide();
			          //check1 = true;
				  } else {
					  $('#error-left1').show();
			          $('#error-inner1').show();
			          $('#error-inner1').html("此员工编号以存在！");
			          check1 = false;
				  }
				  //appendHTML(json);
			  }
			});
    });
    
    $("#yuangongname").blur(function(){
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
        }
    });

    $("#yuangongpost").blur(function(){
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

		if(check1 && check2 && check3 && checks){
			return true;
		} else {
			return false;
		}
	}
</script>
    
