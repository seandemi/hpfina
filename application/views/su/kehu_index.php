<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading2">
		<h1>Ա���˻�����</h1>
	</div>
	<!--  start top-search -->
	<div id="top-search">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" value="������ͻ����ƻ���" onkeydown= "if(event.keyCode==13) keyshearch();" onblur="if (this.value=='') { this.value='������ͻ����ƻ���'; }" onfocus="if (this.value=='������ͻ����ƻ���') { this.value=''; }" class="top-search-inp" /></td>
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
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">�ͻ����</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">�ͻ�����</a></th>
					<th class="table-header-repeat line-left"><a href="javascript:void(0);">��ϵ��</a></th>
					<th class="table-header-repeat line-left"><a href="javascript:void(0);">�绰</a></th>
					<th class="table-header-repeat line-left"><a href="javascript:void(0);">����</a></th>
					<th class="table-header-options line-left"><a href="javascript:void(0);">����</a></th>
				</tr>
				<?php foreach( $info as $key => $kehuinfo):?>
				<tr class="<?php echo $key%2?"alternate-row":""?>">
					<td><?php echo $kehuinfo['kehubianhao'];?></td>
					<td><?php echo $kehuinfo['name'];?></td>
					<td><?php echo $kehuinfo['lianxiren'];?></td>
					<td><?php echo $kehuinfo['dianhua'];?></td>
					<td><?php echo $kehuinfo['chuanzhen'];?></td>
					<td class="options-width">
					<a href="<?=site_url("su/kehu/edit/{$kehuinfo['kehubianhao']}")?>" title="�༭" class="icon-1 info-tooltip"></a>
					<a href="<?=site_url("su/kehu/delete/")?>"  onclick="return false" bianhao="<?php echo $kehuinfo['kehubianhao']?>" name="deletekehu" title="ɾ��" class="icon-2 info-tooltip"></a>
					<a href="<?=site_url("su/kehu/getdetails/{$kehuinfo['kehubianhao']}")?>"  bianhao="<?php echo $kehuinfo['kehubianhao'];?>" name="kehuinfo" >��ϸ��Ϣ...</a>
					</td>
				</tr>
				<?php endforeach;?>
				</table>
				<!--  end product-table................................... --> 

			</div>
			<!--  end content-table  -->
			
			<!--  Ա����ϸ��Ϣ������ ��ʼ -->
			<div id="yuanggonginfo">
		    </div>
			<!--  Ա����ϸ��Ϣ������ ���� ............................................... -->
			
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
				<div id="page-info">��ǰҳ��<label style="color:black; font-weight:bold" id="nowpage"><?php echo $page['nowpage'];?></label>/<label style="color:black;" id="pagesum"><?php echo $page['pagesum'];?></label></div>
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