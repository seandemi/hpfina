<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>添加报销路径</h1></div>


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
	
	
		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left">报销路径1</div>
			<div class="step-dark-right">&nbsp;</div>
			<div class="step-no">2</div>
			<div class="step-dark-left">报销路径2</div>
			<div class="step-dark-right">&nbsp;</div>
			<div class="step-no">3</div>
			<div class="step-dark-left">报销路径3</div>
			<div class="step-dark-right">&nbsp;</div>
			<div class="step-no">4</div>
			<div class="step-dark-left">报销路径4</div>
			<div class="step-dark-right">&nbsp;</div>
			<div class="step-no-off">5</div>
			<div class="step-light-left">报销路径5</div>
			<div class="step-light-right">&nbsp;</div>
			<div class="step-no-off">6</div>
			<div class="step-light-left">报销路径6</div>
			<div class="step-light-round">&nbsp;</div>
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
	
		<!-- start id-form -->
	<?php
	    $attributes = array('id' => 'mainform', 'name' => 'mainform'); 
	    echo form_open('su/bumen/addbaoxiao',$attributes);
	?>
	<input type="hidden" name="bumenbianhao" value="<?php echo $bumenno;?>" />
	<input type="hidden" name="baoxiaonum" value="4" />
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">报销金额下限:</th>
			<td><input type="text" id="xiaxian" name="xiaxian" class="form_2" value="<?php echo $xiaxian;?>" readonly="readonly" /></td>
		</tr>
		<tr>
			<th valign="top">报销金额上限:</th>
			<td><input type="text" id="shaxian" name="shaxian" class="form_2" onkeypress="return checkNum(event)" /></td>
			<td>
			<div class="error-left" id="error-left2" style="display:none;"></div>
			<div class="error-inner" id="error-inner2" style="display:none;"></div>
			</td>
		</tr>
		<tr>
		<th valign="top">第一审批人:</th>
		<td>	
		<select  id="spb1" class="form_3">
		    <?php if($shenpiren[1][0]['zhiwei'] != ''):?>
		        <option value="0">请选择职位</option>
				<?php foreach($zhiweis as $zhiwei):?>
					<option <?php echo $shenpiren[1][0]['zhiwei']==$zhiwei['zhiwei']?"selected='selected'":"";?> value="<?php echo $zhiwei['zhiwei']; ?>"><?php echo $zhiwei['zhiwei']; ?></option>
				<?php endforeach;?>
		    <?php else:?>
			<option value="0">请选择职位</option>
			<?php foreach($zhiweis as $zhiwei):?>
				<option value="<?php echo $zhiwei['zhiwei']; ?>"><?php echo $zhiwei['zhiwei']; ?></option>
			<?php endforeach;?>
			<?php endif;?>
		</select>
		</td>
		<td>
		<select name="sp1" id="sp1" class="form_3">
		    <?php if($shenpiren[1][0]['zhiwei'] != ''):?>
		        <option value="<?php echo $shenpiren[1][0]['yuangongbianhao']?>"><?php echo $shenpiren[1][0]['xingming'];?></option>
		    <?php endif;?>
		</select>
		</td>
		<td>
		<div class="error-left" id="error-left3" style="display:none;"></div>
		<div class="error-inner" id="error-inner3" style="display:none;"></div>
		</td>
		</tr>
		<tr>
		<th valign="top">第二审批人:</th>
		<td>	
		<select  id="spb2" class="form_3">
		    <?php if($shenpiren[2][0]['zhiwei'] != ''):?>
		        <option value="0">请选择职位</option>
				<?php foreach($zhiweis as $zhiwei):?>
					<option <?php echo $shenpiren[2][0]['zhiwei']==$zhiwei['zhiwei']?"selected='selected'":"";?> value="<?php echo $zhiwei['zhiwei']; ?>"><?php echo $zhiwei['zhiwei']; ?></option>
				<?php endforeach;?>
		    <?php else:?>
			<option value="0">请选择职位</option>
			<?php foreach($zhiweis as $zhiwei):?>
				<option value="<?php echo $zhiwei['zhiwei']; ?>"><?php echo $zhiwei['zhiwei']; ?></option>
			<?php endforeach;?>
			<?php endif;?>
		</select>
		</td>
		<td>
		<select name="sp2" id="sp2" class="form_3">
		    <?php if($shenpiren[2][0]['zhiwei'] != ''):?>
		        <option value="<?php echo $shenpiren[2][0]['yuangongbianhao']?>"><?php echo $shenpiren[2][0]['xingming'];?></option>
		    <?php endif;?>
		</select>
		</td>
		<td>
		<div class="error-left" id="error-left4" style="display:none;"></div>
		<div class="error-inner" id="error-inner4" style="display:none;"></div>
		</td>
		</tr>
		<tr>
		<th valign="top">第三审批人:</th>
		<td>	
		<select  id="spb3" class="form_3">
		    <?php if($shenpiren[3][0]['zhiwei'] != ''):?>
		        <option value="0">请选择职位</option>
				<?php foreach($zhiweis as $zhiwei):?>
					<option <?php echo $shenpiren[3][0]['zhiwei']==$zhiwei['zhiwei']?"selected='selected'":"";?> value="<?php echo $zhiwei['zhiwei']; ?>"><?php echo $zhiwei['zhiwei']; ?></option>
				<?php endforeach;?>
		    <?php else:?>
			<option value="0">请选择职位</option>
			<?php foreach($zhiweis as $zhiwei):?>
				<option value="<?php echo $zhiwei['zhiwei']; ?>"><?php echo $zhiwei['zhiwei']; ?></option>
			<?php endforeach;?>
			<?php endif;?>
		</select>
		</td>
		<td>
		<select name="sp3" id="sp3" class="form_3">
		    <?php if($shenpiren[3][0]['zhiwei'] != ''):?>
		        <option value="<?php echo $shenpiren[3][0]['yuangongbianhao']?>"><?php echo $shenpiren[3][0]['xingming'];?></option>
		    <?php endif;?>
		</select>
		</td>
		<td>
		<div class="error-left" id="error-left5" style="display:none;"></div>
		<div class="error-inner" id="error-inner5" style="display:none;"></div>
		</td>
		</tr>
		<tr>
		<th valign="top">第四审批人:</th>
		<td>	
		<select name="sp4" id="spb4" class="form_3">
		    <?php if($shenpiren[4][0]['zhiwei'] != ''):?>
		        <option value="0">请选择职位</option>
				<?php foreach($zhiweis as $zhiwei):?>
					<option <?php echo $shenpiren[4][0]['zhiwei']==$zhiwei['zhiwei']?"selected='selected'":"";?> value="<?php echo $zhiwei['zhiwei']; ?>"><?php echo $zhiwei['zhiwei']; ?></option>
				<?php endforeach;?>
		    <?php else:?>
			<option value="0">请选择职位</option>
			<?php foreach($zhiweis as $zhiwei):?>
				<option value="<?php echo $zhiwei['zhiwei']; ?>"><?php echo $zhiwei['zhiwei']; ?></option>
			<?php endforeach;?>
			<?php endif;?>
		</select>
		</td>
		<td>
		<select name= "sp4" id="sp4" class="form_3">
		    <?php if($shenpiren[4][0]['zhiwei'] != ''):?>
		        <option value="<?php echo $shenpiren[4][0]['yuangongbianhao']?>"><?php echo $shenpiren[4][0]['xingming'];?></option>
		    <?php endif;?>
		</select>
		</td>
		<td>
		<div class="error-left" id="error-left6" style="display:none;"></div>
		<div class="error-inner" id="error-inner6" style="display:none;"></div>
		</td>
		</tr>
		<tr>
		<th valign="top">第五审批人:</th>
		<td>	
		<select name="sp5" id="spb5" class="form_3">
		    <?php if($shenpiren[5][0]['zhiwei'] != ''):?>
		        <option value="0">请选择职位</option>
				<?php foreach($zhiweis as $zhiwei):?>
					<option <?php echo $shenpiren[5][0]['zhiwei']==$zhiwei['zhiwei']?"selected='selected'":"";?> value="<?php echo $zhiwei['zhiwei']; ?>"><?php echo $zhiwei['zhiwei']; ?></option>
				<?php endforeach;?>
		    <?php else:?>
			<option value="0">请选择职位</option>
			<?php foreach($zhiweis as $zhiwei):?>
				<option value="<?php echo $zhiwei['zhiwei']; ?>"><?php echo $zhiwei['zhiwei']; ?></option>
			<?php endforeach;?>
			<?php endif;?>
		</select>
		</td>
		<td>
		<select name="sp5" id="sp5" class="form_3">
		    <?php if($shenpiren[5][0]['zhiwei'] != ''):?>
		        <option value="<?php echo $shenpiren[5][0]['yuangongbianhao']?>"><?php echo $shenpiren[5][0]['xingming'];?></option>
		    <?php endif;?>
		</select>
		</td>
		<td>
		<div class="error-left" id="error-left7" style="display:none;"></div>
		<div class="error-inner" id="error-inner7" style="display:none;"></div>
		</td>
		</tr>
		<tr>
		<th valign="top">第六审批人:</th>
		<td>	
		<select name="sp6" id="spb6" class="form_3">
		    <?php if($shenpiren[6][0]['zhiwei'] != ''):?>
		        <option value="0">请选择职位</option>
				<?php foreach($zhiweis as $zhiwei):?>
					<option <?php echo $shenpiren[6][0]['zhiwei']==$zhiwei['zhiwei']?"selected='selected'":"";?> value="<?php echo $zhiwei['zhiwei']; ?>"><?php echo $zhiwei['zhiwei']; ?></option>
				<?php endforeach;?>
		    <?php else:?>
			<option value="0">请选择职位</option>
			<?php foreach($zhiweis as $zhiwei):?>
				<option value="<?php echo $zhiwei['zhiwei']; ?>"><?php echo $zhiwei['zhiwei']; ?></option>
			<?php endforeach;?>
			<?php endif;?>
		</select>
		</td>
		<td>
		<select name="sp6" id="sp6" class="form_3">
		    <?php if($shenpiren[6][0]['zhiwei'] != ''):?>
		        <option value="<?php echo $shenpiren[6][0]['yuangongbianhao']?>"><?php echo $shenpiren[6][0]['xingming'];?></option>
		    <?php endif;?>
		</select>
		</td>
		</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" onclick="return checkConfirm();" class="form-submit" />
<!--			<input type="button" value="" class="form-complete"  />-->
			<a class="form-complete" href="<?=site_url('su/bumen/index')?>"></a>
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
<a href="<?=site_url("su/bumen/zw2ren")?>" style="display:none" id="zhiweixuanzhe" ></a>
<!--  end content-outer -->
<div class="clear">&nbsp;</div>
<script src="<?php echo base_url(); ?>js/su/baoxiao_add.js" type="text/javascript"></script>