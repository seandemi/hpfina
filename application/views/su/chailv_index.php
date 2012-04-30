<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>差旅补贴</h1>
	</div>
	<!-- end page-heading -->

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
	<?php
	    $attributes = array('id' => 'mainform', 'name' => 'mainform'); 
	    echo form_open('su/bumen/actions',$attributes); 
	?>
	    <input type="hidden" class="actionname" name="action" value="0" />	
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
		
				<!--  start product-table ..................................................................................... -->

				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">员工级别</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">国内补贴</a></th>
					<th class="table-header-repeat line-left"><a href="javascript:void(0);">国外补贴</a></th>
					<th class="table-header-repeat line-left"><a href="javascript:void(0);">港澳台补贴</a></th>
					<th class="table-header-options line-left"><a href="javascript:void(0);">操作</a></th>
				</tr>
				<?php foreach( $info as $key => $chailvinfo):?>
				<tr class="<?php echo $key%2?"alternate-row":""?>">
					<td><?php echo $chailvinfo->jibie;?></td>
					<td><?php echo $chailvinfo->jine1;?></td>
					<td><?php echo $chailvinfo->jine2;?></td>
					<td><?php echo $chailvinfo->jine3;?></td>
					<td class="options-width">
					<a href="<?=site_url("su/chailv/edit/{$chailvinfo->id}")?>" title="编辑" class="icon-1 info-tooltip"></a>
					<a href="<?=site_url("su/chailv/delete/{$chailvinfo->id}")?>" onclick="return false"  name="deletebumen" title="删除" class="icon-2 info-tooltip"></a>
					</td>
				</tr>
				<?php endforeach;?>
				</table>
				<!--  end product-table................................... --> 

			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
			    <a href="<?=site_url('su/chailv/add/')?>" class="action-add"></a>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">

			</table>
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
    	</form>
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
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
<script src="<?php echo base_url(); ?>js/su/bumen.js" type="text/javascript"></script>