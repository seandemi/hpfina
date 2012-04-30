<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading2">
		<h1>数据恢复</h1>
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
	    echo form_open('su',$attributes); 
	?>
	    
	    <input type="hidden" class="actionname" name="action" value="0" />	
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
		
				<!--  start product-table ..................................................................................... -->

				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">备份时间</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">文件名</a></th>
					<th class="table-header-options line-left"><a href="javascript:void(0);">操作</a></th>
				</tr>
				<?php foreach( $backupfile['file'] as $key => $file):?>
				<tr class="<?php echo $key%2?"alternate-row":""?>"> 
					<td>
					<?php
						$time = str_replace(".sql","",$file);  
						date_default_timezone_set("Asia/Shanghai");    
						echo date("Y-n-j H:i:s",$time); 
					?>
					</td>
					<td><?php echo $file;?>
					<td class="options-width">
					<a href="<?=site_url("su/opdata/delete/")?>"  onclick="return false" bianhao="<?php echo $time;?>" name="deletebackup" title="删除" class="icon-2 info-tooltip"></a>
					<a id="restore" backupid="<?php echo $time;?>" href="<?=site_url("su/opdata/restore")?>" onclick="return false"><b>数据导入</b></a>
					<label style="color: #FF0000;"></label>
					</td>
				</tr>
				<?php endforeach;?>
				</table>
				<!--  end product-table................................... --> 

			</div>
			<!--  end content-table  -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="<?=site_url("su/opdata/nextpage/")?>" onclick="return false" class="page-far-left"></a>
				<a href="<?=site_url("su/opdata/nextpage/")?>" onclick="return false" class="page-left"></a>
				<div id="page-info">当前页：<label style="color:black; font-weight:bold" id="nowpage"><?php echo $page['nowpage'];?></label>/<label style="color:black;" id="pagesum"><?php echo $page['pagesum'];?></label></div>
				<a href="<?=site_url("su/opdata/nextpage/")?>" onclick="return false" class="page-right"></a>
				<a href="<?=site_url("su/opdata/nextpage/")?>" onclick="return false" class="page-far-right"></a>
			</td>
			<td></td>
			</tr>
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
<div id="results"></div>
<!-- 此处的a是为了在ajax中能使用绝对url-->
<a href="<?=site_url("su/yuangong/selectbumen")?>" style="display:none" id="bumenselectedurl" ></a>
<script src="<?php echo base_url(); ?>js/su/opdata.js" type="text/javascript"></script>