<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">
<div id="page-heading"><h1>Ա����ϸ��Ϣ</h1></div>


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
			<th valign="top">Ա�����:</th>
			<td><?php echo $info[0]['yuangongbianhao'];?></td>
		</tr>
		<tr>
			<th valign="top">����:</th>
			<td><?php echo $info[0]['xingming'];?></td>
		</tr>
		<tr>
			<th valign="top">�Ա�:</th>
			<td><?php echo $info[0]['xingbie'];?></td>
		</tr>
		<tr>
			<th valign="top">��������:</th>
			<td><?php echo $info[0]['chushengriqi'];?></td>
		</tr>
		<tr>
			<th valign="top">�Ļ��̶�:</th>
			<td><?php echo $info[0]['wenhuachengdu'];?></td>
		</tr>
		<tr>
			<th valign="top">�̶��绰:</th>
			<td><?php echo $info[0]['gudingdianhua'];?></td>
		</tr>
		<tr>
			<th valign="top">�ֻ�����:</th>
			<td><?php echo $info[0]['shoujihaoma'];?></td>
		</tr>
		<tr>
			<th valign="top">���֤����:</th>
			<td><?php echo $info[0]['shenfenzheng'];?></td>
		</tr>
		<tr>
			<th valign="top">��ְ����:</th>
			<td><?php echo $info[0]['ruzhiriqi'];?></td>
		</tr>
		<tr>
			<th valign="top">��ְ����:</th>
			<td><?php echo $info[0]['lizhiriqi'];?></td>
		</tr>
		<tr>
			<th valign="top">����:</th>
			<td><?php echo $info[0]['huming'];?></td>
		</tr>
		<tr>
			<th valign="top">��������:</th>
			<td><?php echo $info[0]['kaihuyinhang'];?></td>
		</tr>
		<tr>
			<th valign="top">�����˺�:</th>
			<td><?php echo $info[0]['yinhangzhanghao'];?></td>
		</tr>
		<tr>
			<th valign="top">סַ:</th>
			<td><?php echo $info[0]['zhuzhi'];?></td>
		</tr>
		<tr>
			<th valign="top">֤����:</th>
			<td><?php echo $info[0]['zhengjianzhao'];?></td>
		</tr>
		<tr>
			<th valign="top">����:</th>
			<td><?php echo $info[0]['email'];?></td>
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

<script type="text/javascript">
/*
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
        	$('#error-inner1').html("�������Ϊ6-8λ���ֺ���ĸ�����");
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
					  $('#error-left1').hide();
			          $('#error-inner1').hide();
			          //check1 = true;
				  } else {
					  $('#error-left1').show();
			          $('#error-inner1').show();
			          $('#error-inner1').html("��Ա������Դ��ڣ�");
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
	*/
</script>