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
		<td>
		
		<select  class="styledselect2"   id="bumenselected" name="" >
			<option id="selectbumen" value="-1">所有部门</option>
			<?php foreach($bumeninfo as $key => $bumen):?>
			<option value="<?php echo $bumen['bumenbianhao'];?>"><?php echo $bumen['bumenming'];?></option>
			<?php endforeach;?>
		</select> 
		 
		</td>
		<td><input type="text" value="请输入员工姓名或编号" onkeydown= "if(event.keyCode==13) keyshearch();" onblur="if (this.value=='') { this.value='请输入员工姓名或编号'; }" onfocus="if (this.value=='请输入员工姓名或编号') { this.value=''; }" class="top-search-inp" /></td>
		<td>
		<input type="image" src="<?php echo base_url(); ?>img/su/shared/top_search_btn.gif" href="<?=site_url("su/yuangong/searchyuangong/")?>" id="searchinfo" />
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
	    echo form_open('su/yuangong/actions',$attributes); 
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
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">员工编号</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">员工姓名</a></th>
					<th class="table-header-repeat line-left"><a href="javascript:void(0);">部门名称</a></th>
					<th class="table-header-repeat line-left"><a href="javascript:void(0);">职位</a></th>
					<th class="table-header-repeat line-left"><a href="javascript:void(0);">账户状态</a></th>
					<th class="table-header-options line-left"><a href="javascript:void(0);">操作</a></th>
				</tr>
				<?php foreach( $info as $key => $yuangonginfo):?>
				<tr class="<?php echo $key%2?"alternate-row":""?>">
					<td><input  type="checkbox" name="yuangongcheck" value="<?php echo $yuangonginfo['yuangongbianhao']; ?>"/></td>  
					<td><?php echo $yuangonginfo['yuangongbianhao'];?></td>
					<td><?php echo $yuangonginfo['xingming'];?></td>
					<td><?php echo $yuangonginfo['bumenming'];?></td>
					<td><?php echo $yuangonginfo['zhiwei'];?></td>
					<td class="zhuangtai"><?php echo ($yuangonginfo['zhuangtai'] == 0) ? "正常":"禁用";?></td>
					<td class="options-width">
					<a href="<?=site_url("su/yuangong/edit/{$yuangonginfo['yuangongbianhao']}")?>" title="编辑" class="icon-1 info-tooltip"></a>
					<a href="<?=site_url("su/yuangong/delete/")?>"  onclick="return false" bianhao="<?php echo $yuangonginfo['yuangongbianhao']?>" name="deleteyuangong" title="删除" class="icon-2 info-tooltip"></a>
					<a href="<?=site_url("su/yuangong/jinyong/")?>" onclick="return false" bianhao="<?php echo $yuangonginfo['yuangongbianhao'];?>" zhuangtai="<?php echo $yuangonginfo['zhuangtai'];?>" title="禁用" name="forbiddenicon" class="<?php echo ($yuangonginfo['zhuangtai']==0)?"icon-3 info-tooltip":"icon-4 info-tooltip"; ?>"></a>
					<a href="<?=site_url("su/yuangong/getdetails/{$yuangonginfo['yuangongbianhao']}")?>"  bianhao="<?php echo $yuangonginfo['yuangongbianhao'];?>" name="yuangonginfo" >详细信息...</a>
					<a href="<?=site_url("su/yuangong/baoxiao/{$yuangonginfo['yuangongbianhao']}")?>">报销路径</a>
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
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="<?=site_url("su/yuangong/jinyongs")?>" onclick="return false" id="action-lock" class="action-lock">禁用</a>
					<a href="<?=site_url("su/yuangong/opens")?>" onclick="return false" id="action-open" class="action-open">激活</a>
					<a href="<?=site_url("su/yuangong/deletes")?>" onclick="return false" id="action-delete" class="action-delete">删除</a>			
				</div>
				<div class="clear"></div>
			</div>
			<div id="actions-box">
			    <a href="<?=site_url('su/yuangong/add/')?>" class="action-add"></a>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="<?=site_url("su/yuangong/nextpage/")?>" onclick="return false" class="page-far-left"></a>
				<a href="<?=site_url("su/yuangong/nextpage/")?>" onclick="return false" class="page-left"></a>
				<div id="page-info">当前页：<label style="color:black; font-weight:bold" id="nowpage"><?php echo $page['nowpage'];?></label>/<label style="color:black;" id="pagesum"><?php echo $page['pagesum'];?></label></div>
				<a href="<?=site_url("su/yuangong/nextpage/")?>" onclick="return false" class="page-right"></a>
				<a href="<?=site_url("su/yuangong/nextpage/")?>" onclick="return false" class="page-far-right"></a>
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
<script src="<?php echo base_url(); ?>js/su/yuangong.js" type="text/javascript"></script>