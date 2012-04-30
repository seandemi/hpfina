<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>报销路径</h1>
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
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">报销金额</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">审批人1</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">审批人2</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">审批人3</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">审批人4</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">审批人5</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="javascript:void(0);">审批人6</a></th>
				</tr>
				<?php foreach( $baoxiao as $key => $baoxiaoinfo):?>
				<tr class="<?php echo $key%2?"alternate-row":""?>">
					<td>
					<?php
						echo $baoxiaoinfo['jinexiaxian']." --- ".$baoxiaoinfo['jineshangxian'];
					?>
					</td>
					<td>
					<?php
						$zhiwei = isset($shenpiren[$key][0][0]['zhiwei'])?$shenpiren[$key][0][0]['zhiwei']:"---";
						$xingming = isset($shenpiren[$key][0][0]['xingming'])?$shenpiren[$key][0][0]['xingming']:"---";
						echo $zhiwei." : ".$xingming;
					?>
					</td>
					<td>
					<?php
						$zhiwei = isset($shenpiren[$key][1][0]['zhiwei'])?$shenpiren[$key][1][0]['zhiwei']:"---";
						$xingming = isset($shenpiren[$key][1][0]['xingming'])?$shenpiren[$key][1][0]['xingming']:"---";
						echo $zhiwei." : ".$xingming;
					?>
					</td>
					<td>
					<?php
						$zhiwei = isset($shenpiren[$key][2][0]['zhiwei'])?$shenpiren[$key][2][0]['zhiwei']:"---";
						$xingming = isset($shenpiren[$key][2][0]['xingming'])?$shenpiren[$key][2][0]['xingming']:"---";
						echo $zhiwei." : ".$xingming;
					?>
					</td>
					<td>
					<?php
						$zhiwei = isset($shenpiren[$key][3][0]['zhiwei'])?$shenpiren[$key][3][0]['zhiwei']:"---";
						$xingming = isset($shenpiren[$key][3][0]['xingming'])?$shenpiren[$key][3][0]['xingming']:"---";
						echo $zhiwei." : ".$xingming;
					?>
					</td>
					<td>
					<?php
						$zhiwei = isset($shenpiren[$key][4][0]['zhiwei'])?$shenpiren[$key][4][0]['zhiwei']:"---";
						$xingming = isset($shenpiren[$key][4][0]['xingming'])?$shenpiren[$key][4][0]['xingming']:"---";
						echo $zhiwei." : ".$xingming;
					?>
					</td>
					<td>
					<?php
						$zhiwei = isset($shenpiren[$key][5][0]['zhiwei'])?$shenpiren[$key][5][0]['zhiwei']:"---";
						$xingming = isset($shenpiren[$key][5][0]['xingming'])?$shenpiren[$key][5][0]['xingming']:"---";
						echo $zhiwei." : ".$xingming;
					?>
					</td>
				</tr>
				<?php endforeach;?>
				</table>
				<!--  end product-table................................... --> 

			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
			    <a href="<?=site_url("su/bumen/editbaoxiao/{$baoxiao[0]['bumenbianhao']}")?>" class="action-editbx"></a>
				
			</div>
			<div id="actions-box">
			    <a onclick="history.back();" class="form-reset"></a>
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