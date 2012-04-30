<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>部门管理</h1>
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
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">部门编号</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">部门名称</a></th>
					<th class="table-header-repeat line-left"><a href="javascript:void(0);">费用属性</a></th>
					<th class="table-header-repeat line-left"><a href="javascript:void(0);">部门类别</a></th>
					<th class="table-header-repeat line-left"><a href="javascript:void(0);">部门状态</a></th>
					<th class="table-header-options line-left"><a href="javascript:void(0);">操作</a></th>
				</tr>
				<?php foreach( $info as $key => $bumeninfo):?>
				<tr class="<?php echo $key%2?"alternate-row":""?>">
					<td><input  type="checkbox" name="bumencheck[]" value="<?php echo $bumeninfo->bumenbianhao; ?>"/></td>
					<td><?php echo $bumeninfo->bumenbianhao;?></td>
					<td><?php echo $bumeninfo->bumenming;?></td>
					<td><?php echo $bumeninfo->feiyongshuxing;?></td>
					<td><?php echo $bumeninfo->leibie;?></td>
					<td class="zhuangtai"><?php echo ($bumeninfo->zhuangtai == 0 ? "正常":"禁用");?></td>
					<td class="options-width">
					<a href="<?=site_url("su/bumen/edit/{$bumeninfo->bumenbianhao}")?>" title="编辑" class="icon-1 info-tooltip"></a>
					<a href="<?=site_url("su/bumen/delete")?>" onclick="return false" bianhao="<?php echo $bumeninfo->bumenbianhao;?>" name="deletebumen" title="删除" class="icon-2 info-tooltip"></a>
					<a href="<?=site_url("su/bumen/jinyong")?>" onclick="return false" bianhao="<?php echo $bumeninfo->bumenbianhao;?>" zhuangtai="<?php echo $bumeninfo->zhuangtai;?>" title="禁用" name="forbiddenicon" class="<?php echo ($bumeninfo->zhuangtai==0)?"icon-3 info-tooltip":"icon-4 info-tooltip"; ?>"></a>
					<a href="<?=site_url("su/bumen/baoxiao/{$bumeninfo->bumenbianhao}")?>">报销路径</a>
					</td>
				</tr>
				<?php endforeach;?>
				</table>
				<!--  end product-table................................... --> 

			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->

			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="<?=site_url("su/bumen/jinyongs")?>" onclick="return false" id="action-lock" class="action-lock">禁用</a>
					<a href="<?=site_url("su/bumen/opens")?>" onclick="return false" id="action-open" class="action-open">激活</a>
					<a href="<?=site_url("su/bumen/deletes")?>" onclick="return false" id="action-delete" class="action-delete">删除</a>			
				</div>
				<div class="clear"></div>
			</div>
			<div id="actions-box">
			    <a href="<?=site_url('su/bumen/add/')?>" class="action-add"></a>
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