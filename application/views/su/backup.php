<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>数据备份</h1>
	</div>
	<!-- end page-heading -->
    <div id="actions-box2">
        <input type="hidden" id="restorev" value="<?=site_url("su/opdata/restorev")?>"/>
		<a href="<?=site_url("su/opdata/backup")?>" onclick="return false" class="form-backup"></a>
	</div>
	<div style="float: left;margin: 30px 0 0 100px; position: relative;">
		<label id="backupresult">要备份数据请点击备份按钮</label>
	</div>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
<script src="<?php echo base_url(); ?>js/su/opdata.js" type="text/javascript"></script>