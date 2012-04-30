<div class="w" id="regist">
  <ul style="list-style-type:none" class="tab">
	 <li class="curr">基本信息</li>
      <li class="line"><a href="<?=site_url('personal/detail/')?>">详细信息</a></li>
      <li class="line"><a href="<?=site_url('personal/password/')?>">修改密码</a></li>
       <li><a href="<?=site_url('personal/photo/')?>">证件照</a></li>
		</ul>
 
		<form id="formp" method="post">
		
		    <div class="form">
               
			    <div class="item">
				    <span class="label">部门编号:&nbsp;</span>
				    <div class="fl">
					    <input type="text" id="username" name="username" class="text"  value=<?php  echo $bumenbianhao;?> />

				    </div>

			    </div>
			    
			    <div class="item">
				    <span class="label">部门名称:&nbsp;</span>
				    <div class="fl">
					    <input type="text" id="username" name="username" class="text"  value=<?php  echo $bumenming;?> />

				    </div>

			    </div>
			    <div class="item">
				    <span class="label">员工编号:&nbsp;</span>
				    <div class="fl">
					    <input type="text" id="username" name="username" class="text"  value=<?php  echo $yuangongbianhao;?> />

				    </div>

			    </div>
			    
			    <div class="item">
				    <span class="label">姓名:&nbsp;</span>
				    <div class="fl">
					    <input type="text" id="username" name="username" class="text" value=<?php  echo $xingming;?> />
				    </div>
			    </div>
			
			 <div class="item">
				    <span class="label">级别:&nbsp;</span>
				    <div class="fl">
					    <input type="text" id="username" name="username" class="text" value=<?php  echo $jibie;?> />
				    </div>
			    </div>
		
				   		   	
    			
		    </div>
		
		</form>

		<!--[if !ie]>form end<![endif]-->
		

</div>
