<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading2">
		<h1>员工账户管理</h1>
	</div>
	<!--  start top-search -->
	<div id="top-search">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" value="请输入客户名称或编号" onkeydown= "if(event.keyCode==13) keyshearch();" onblur="if (this.value=='') { this.value='请输入客户名称或编号'; }" onfocus="if (this.value=='请输入客户名称或编号') { this.value=''; }" class="top-search-inp" /></td>
		<td>
		<input type="image" src="<?php echo base_url(); ?>img/su/shared/top_search_btn.gif" href="<?=site_url("su/kehu/searchkehu/")?>" id="searchinfo" />
		</td>
		</tr>
		</table>
	</div>
 	<!--  end top-search -->
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
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">客户编号</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">客户姓名</a></th>
					<th class="table-header-repeat line-left"><a href="javascript:void(0);">联系人</a></th>
					<th class="table-header-repeat line-left"><a href="javascript:void(0);">电话</a></th>
					<th class="table-header-repeat line-left"><a href="javascript:void(0);">传真</a></th>
					<th class="table-header-options line-left"><a href="javascript:void(0);">操作</a></th>
				</tr>
				<?php foreach( $info as $key => $kehuinfo):?>
				<tr class="<?php echo $key%2?"alternate-row":""?>">
					<td><?php echo $kehuinfo['kehubianhao'];?></td>
					<td><?php echo $kehuinfo['name'];?></td>
					<td><?php echo $kehuinfo['lianxiren'];?></td>
					<td><?php echo $kehuinfo['dianhua'];?></td>
					<td><?php echo $kehuinfo['chuanzhen'];?></td>
					<td class="options-width">
					<a href="<?=site_url("su/kehu/edit/{$kehuinfo['kehubianhao']}")?>" title="编辑" class="icon-1 info-tooltip"></a>
					<a href="<?=site_url("su/kehu/delete/")?>"  onclick="return false" bianhao="<?php echo $kehuinfo['kehubianhao']?>" name="deletekehu" title="删除" class="icon-2 info-tooltip"></a>
					<a href="<?=site_url("su/kehu/getdetails/{$kehuinfo['kehubianhao']}")?>"  bianhao="<?php echo $kehuinfo['kehubianhao'];?>" name="kehuinfo" >详细信息...</a>
					</td>
				</tr>
				<?php endforeach;?>
				</table>
				<!--  end product-table................................... --> 

			</div>
			<!--  end content-table  -->
			
			<!--  员工详细信息弹出框 开始 -->
			<div id="yuanggonginfo">
		    </div>
			<!--  员工详细信息弹出框 结束 ............................................... -->
			
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
			    <a href="<?=site_url('su/kehu/add/')?>" class="action-add"></a>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="<?=site_url("su/kehu/nextpage/")?>" onclick="return false" class="page-far-left"></a>
				<a href="<?=site_url("su/kehu/nextpage/")?>" onclick="return false" class="page-left"></a>
				<div id="page-info">当前页：<label style="color:black; font-weight:bold" id="nowpage"><?php echo $page['nowpage'];?></label>/<label style="color:black;" id="pagesum"><?php echo $page['pagesum'];?></label></div>
				<a href="<?=site_url("su/kehu/nextpage/")?>" onclick="return false" class="page-right"></a>
				<a href="<?=site_url("su/kehu/nextpage/")?>" onclick="return false" class="page-far-right"></a>
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

<script src="<?php echo base_url(); ?>js/su/kehu.js" type="text/javascript"></script>