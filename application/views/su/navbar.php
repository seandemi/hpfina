
<link rel="stylesheet" href="<?php echo base_url(); ?>css/su/top.css" type="text/css" media="screen, project, print">

<div id="menu">
  <div class="bound">
	<ul id="menu_gex">
            <li id="IE_li"><a href="#">初始化</a>
			    <ul id="pt2">
                    <li>
                        <img class="corner_inset_left" alt="" src="<?php echo base_url(); ?>img/su/corner_inset_left.png"/>
                        <a href="<?=site_url('su/bumen/index/')?>">部门管理</a>
                        <img class="corner_inset_right1" alt="" src="<?php echo base_url(); ?>img/su/corner_inset_right.png"/>
                    </li>
                    <li><a href="<?=site_url('su/yuangong/index/')?>">员工账户管理</a></li>
					<li><a href="<?=site_url('su/shenpit/index/')?>">审批时限管理</a></li>
					<li><a href="<?=site_url('su/chailv/index/')?>">差旅补贴管理</a></li>
					<li><a href="<?=site_url('su/commbx/index/')?>">通用报销单管理</a></li>
                    <li class="last">
                        <img class="corner_left" alt="" src="<?php echo base_url(); ?>img/su/corner_left.png"/>
                        <img class="middle1" alt="" src="<?php echo base_url(); ?>img/su/dot.gif"/>
                        <img class="corner_right1" alt="" src="<?php echo base_url(); ?>img/su/corner_right.png"/>
                    </li>
                </ul>
			</li>
			<li id="IE_li"><a href="#">系统运行状态</a>
                <ul id="pt2">
                    <li>
                        <img class="corner_inset_left" alt="" src="<?php echo base_url(); ?>img/su/corner_inset_left.png"/>
                        <a href="<?=site_url('su/system/status')?>">系统状态查询</a>
                        <img class="corner_inset_right1" alt="" src="<?php echo base_url(); ?>img/su/corner_inset_right.png"/>
                    </li>
                    <li><a href="<?=site_url('su/system/log')?>>">操作记录管理</a></li>
                    <li class="last">
                        <img class="corner_left" alt="" src="<?php echo base_url(); ?>img/su/corner_left.png"/>
                        <img class="middle1" alt="" src="<?php echo base_url(); ?>img/su/dot.gif"/>
                        <img class="corner_right1" alt="" src="<?php echo base_url(); ?>img/su/corner_right.png"/>
                    </li>
                </ul>
            </li>
			<li id="IE_li"><a href="#">数据管理</a>
                <ul id="pt2">
                    <li>
                        <img class="corner_inset_left" alt="" src="<?php echo base_url(); ?>img/su/corner_inset_left.png"/>
                        <a href="<?=site_url('su/opdata/backupv/')?>">数据备份</a>
                        <img class="corner_inset_right1" alt="" src="<?php echo base_url(); ?>img/su/corner_inset_right.png"/>
                    </li>
                    <li><a href="<?=site_url('su/opdata/restorev/')?>">数据恢复</a></li>
                    <li class="last">
                        <img class="corner_left" alt="" src="<?php echo base_url(); ?>img/su/corner_left.png"/>
                        <img class="middle1" alt="" src="<?php echo base_url(); ?>img/su/dot.gif"/>
                        <img class="corner_right1" alt="" src="<?php echo base_url(); ?>img/su/corner_right.png"/>
                    </li>
                </ul>
            </li>
			<li id="IE_li"><a href="<?=site_url('su/kehu/index/')?>">客户管理</a></li>
        </ul>
  </div>
</div>

</body>
</html>