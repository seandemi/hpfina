<?php
class Process extends  CI_Controller
{  
 private $percount = 10;   
 public function __construct()
       {
          parent::__construct();
           $this->load->helper('url');
           $this->load->library('session');
           $this->load->database();
           $this->load->helper(array('form', 'url'));  
           $this->load->library('form_validation');
       } 
	//显示主页
//正在执行的报销单	
public function deal()
	{
	 $username=$this->session->userdata('name');
     $yuangongbianhao=$this->session->userdata('yuangongbianhao');
	if (empty($username)&&empty($yuangongbianhao)) {					
	 	 redirect('login/index/');
		}
    else {
		$data = $this->getIndexData('1');	
        $this->load->view('baoxiaodan/baoxiao/self/deal',$data);      
	} 	
}
private function getIndexData($nowpage){
	    $yuangongbianhao=$this->session->userdata('yuangongbianhao');
	    $username=$this->session->userdata('name');
		$nextpage = $nowpage+1;
		$nowoffset = ($nowpage -1)*$this->percount; //要查询的偏移位置		        
		$sql="SELECT a.baoxiaobianhao from tb_baoxiaodan as b, tb_baoxiaozhuangtai as A where a.baoxiaobianhao=b.baoxiaobianhao and a.shenpizhuangtai=0  and  a.tijiaoren ='$yuangongbianhao' ";		
		$query=$this->db->query($sql);
        $data['page']['rowsum'] =$query->num_rows();  //所有符合要求的行数 
		$data['page']['nowpage'] = $nowpage;
		$data['page']['nextpage'] = $nowpage+1;
		$data['page']['prepage'] = $nowpage-1;
		$data['page']['time'] = 0;
		$data['page']['zongjine'] = 0;
		$data['page']['type'] = 0;
		if($data['page']['prepage'] < 1){
		    $data['page']['prepage'] = 1;
		}		
		$data['page']['pagesum'] = intval(($data['page']['rowsum']-1)/$this->percount)+1; //总页数
        if($data['page']['pagesum'] < $data['page']['nextpage'])
     	{
		    $data['page']['nextpage'] = $data['page']['pagesum'];
        }	
		//限制行数的查询结果
		$this->db->select('tb_baoxiaodan.baoxiaobianhao, tb_baoxiaodan.baoxiaoleixing,tb_baoxiaodan.tijiaoshijian,tb_baoxiaodan.zongjine, tb_baoxiaozhuangtai.yishenpi,tb_baoxiaozhuangtai.weishenpi');
        $this->db->from('tb_baoxiaodan');
        $this->db->join('tb_baoxiaozhuangtai', "tb_baoxiaodan.baoxiaobianhao = tb_baoxiaozhuangtai.baoxiaobianhao and tb_baoxiaodan.yuangongbianhao='$yuangongbianhao' and tb_baoxiaozhuangtai.shenpizhuangtai=0",'inner');
		$this->db->limit($this->percount, $nowoffset);
		$this->db->order_by("tb_baoxiaodan.tijiaoshijian", "desc"); 
		$query = $this->db->get();
		$data['info'] = $query->result_array();
		$top['xingming']=$username;
        $data['top']=$top;
		return $data;
	}	    
//被驳回的报销单
public function reject(){
	 $username=$this->session->userdata('name');
     $yuangongbianhao=$this->session->userdata('yuangongbianhao');
	if (empty($username)&&empty($yuangongbianhao)) {					
	 	 redirect('login/index/');
		}
    else {
		$data = $this->getrejectData('1');	
        $this->load->view('baoxiaodan/baoxiao/self/rejected',$data);    
	} 
}	
private function getrejectData($nowpage){
	    $yuangongbianhao=$this->session->userdata('yuangongbianhao');
	    $username=$this->session->userdata('name');
		$nextpage = $nowpage+1;
		$nowoffset = ($nowpage -1)*$this->percount; //要查询的偏移位置		        
		$sql="SELECT a.baoxiaobianhao FROM tb_baoxiaozhuangtai AS A WHERE a.passdate IN ( SELECT MAX( tb_baoxiaozhuangtai.passdate ) FROM tb_baoxiaozhuangtai WHERE tb_baoxiaozhuangtai.baoxiaobianhao = a.baoxiaobianhao AND tb_baoxiaozhuangtai.tijiaoren ='$yuangongbianhao') AND a.yijian =0 AND a.tijiaoren ='$yuangongbianhao'";		
		$query=$this->db->query($sql);
        $data['page']['rowsum'] =$query->num_rows();  //所有符合要求的行数 
		$data['page']['nowpage'] = $nowpage;
		$data['page']['nextpage'] = $nowpage+1;
		$data['page']['prepage'] = $nowpage-1;
		$data['page']['time'] = 0;
		$data['page']['zongjine'] = 0;
		$data['page']['type'] = 0;
		if($data['page']['prepage'] < 1){
		    $data['page']['prepage'] = 1;
		}		
		$data['page']['pagesum'] = intval(($data['page']['rowsum']-1)/$this->percount)+1; //总页数
        if($data['page']['pagesum'] < $data['page']['nextpage'])
     	{
		    $data['page']['nextpage'] = $data['page']['pagesum'];
        }	
		//限制行数的查询结果
        $sql="SELECT a.baoxiaobianhao,a.tijiaoshijian,b.zongjine,b.baoxiaoleixing,c.xingming from tb_baoxiaodan as b, tb_yuangong as c,tb_baoxiaozhuangtai as A where a.passdate
				IN ( SELECT MAX( tb_baoxiaozhuangtai.passdate ) FROM tb_baoxiaozhuangtai WHERE tb_baoxiaozhuangtai.baoxiaobianhao = a.baoxiaobianhao AND tb_baoxiaozhuangtai.tijiaoren ='$yuangongbianhao' ) and c.yuangongbianhao=a.shenpiren and  a.baoxiaobianhao=b.baoxiaobianhao and a.yijian=0  and  a.tijiaoren ='$yuangongbianhao' order by a.tijiaoshijian desc limit $nowoffset,$this->percount ";		
        $query=$this->db->query($sql);
        $data['info'] = $query->result_array();
		$top['xingming']=$username;
        $data['top']=$top;
		return $data;
	}	
//查询被驳回的报销单	 
public function my_rejected(){
	    header("Content-type:text/html; charset=GBK");
	    $time = $_REQUEST['time'];
	    $zongjine = $_REQUEST['zongjine'];
	    $danju = $_REQUEST['danju'];
	    $leibie = $_REQUEST['leibie'];
	    $page = $_REQUEST['page'];
        echo $this->getmy_rejected($page,$time,$zongjine,$danju,$leibie);
}
private function getmy_rejected($nextpage,$time,$zongjine,$danju,$leibie)
	{
		$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	    if($nextpage < 1){
        	$nextpage = 1;
        }
		$nowoffset = ($nextpage-1)*$this->percount;	

		$sql="SELECT b.baoxiaobianhao FROM tb_baoxiaozhuangtai AS A ,tb_baoxiaodan as b WHERE a.passdate IN ( SELECT MAX( tb_baoxiaozhuangtai.passdate ) FROM tb_baoxiaozhuangtai WHERE tb_baoxiaozhuangtai.baoxiaobianhao = a.baoxiaobianhao AND tb_baoxiaozhuangtai.tijiaoren ='$yuangongbianhao')and b.baoxiaobianhao=a.baoxiaobianhao AND a.yijian =0 AND a.tijiaoren ='$yuangongbianhao'";
		if($time){
			$sql.=" and DATE_FORMAT( b.tijiaoshijian, '%Y-%m-%d' ) ='$time'";
		}
		if($zongjine){
			$sql.=" and b.zongjine='$zongjine'";
		}
//		if($danju){
//			$sql.=" and b.tijiaoshijian='$time'";
//		}
		if($leibie){
			$sql.=" and b.baoxiaoleixing='$leibie'";
		}
        $query=$this->db->query($sql);
        $count =$query->num_rows(); 
        $pagesum = intval(($count-1)/$this->percount)+1;
	    if($nowoffset >= $count){
        	$nowoffset = ($nextpage-2)*$this->percount;
        }
	    if($nowoffset < 0){
        	$nowoffset = 0;
        }
        if($nextpage > $pagesum){
        	$nextpage = $pagesum;
        }
		$sql="SELECT a.baoxiaobianhao,a.tijiaoshijian,b.zongjine,b.baoxiaoleixing,c.xingming from tb_baoxiaodan as b, tb_yuangong as c,tb_baoxiaozhuangtai as A where a.passdate
				IN ( SELECT MAX( tb_baoxiaozhuangtai.passdate ) FROM tb_baoxiaozhuangtai WHERE tb_baoxiaozhuangtai.baoxiaobianhao = a.baoxiaobianhao AND tb_baoxiaozhuangtai.tijiaoren ='$yuangongbianhao' ) and c.yuangongbianhao=a.shenpiren and  a.baoxiaobianhao=b.baoxiaobianhao and a.yijian=0  and  a.tijiaoren ='$yuangongbianhao' ";		
        if($time){
			$sql.=" and DATE_FORMAT( b.tijiaoshijian, '%Y-%m-%d' ) ='$time'";
		}
		if($zongjine){
			$sql.=" and b.zongjine=$zongjine";
		}
		if($leibie){
			$sql.=" and b.baoxiaoleixing=$leibie";
		}	
		$sql.=" order by b.tijiaoshijian desc  limit $nowoffset,$this->percount ";	
        $query=$this->db->query($sql);
        $count2 =$query->num_rows(); 
        $data['info']=$query->result_array();
        for($i=0;$i<$count2;$i++){
        	$data['info'][$i]['show']=site_url("info/rejected/{$data['info'][$i]['baoxiaobianhao']}/{$data['info'][$i]['baoxiaoleixing']}");
        }
     	$data['pagesum'] = $pagesum;
		$data['nowpage'] = $nextpage;	
		$data['time'] = $time;
		$data['type'] = $leibie;
		$data['zongjine'] = $zongjine;
		$data['rowsum'] = $count;			
		echo $this->JSON($data);
	}  
//删除报销单
function delete($baoxiaobianhao,$baoxiaoleixing){
	$username=$this->session->userdata('name');
	$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	if (empty($username)&&empty($yuangongbianhao)) {					
	 	 redirect('login/index/');
		}
    else {
				$sql="SELECT  baoxiaobianhao  from tb_baoxiaodan where baoxiaoleixing='$baoxiaoleixing' and   yuangongbianhao='$yuangongbianhao' and baoxiaobianhao='$baoxiaobianhao'";		
			    $query=$this->db->query($sql);	
			    $number=$query->num_rows();
			    if($number>0){ }  
			    else{
			    
			        }
        } 	
}  
//被驳回的报销单
public function finish(){
	 $username=$this->session->userdata('name');
     $yuangongbianhao=$this->session->userdata('yuangongbianhao');
	if (empty($username)&&empty($yuangongbianhao)) {					
	 	 redirect('login/index/');
		}
    else {
		$data = $this->getrejectData('1');	
        $this->load->view('baoxiaodan/baoxiao/self/finish',$data);    
	} 
}	
private function getfinishData($nowpage){
	    $yuangongbianhao=$this->session->userdata('yuangongbianhao');
	    $username=$this->session->userdata('name');
		$nextpage = $nowpage+1;
		$nowoffset = ($nowpage -1)*$this->percount; //要查询的偏移位置		        
		$sql="SELECT a.baoxiaobianhao FROM tb_baoxiaozhuangtai AS A WHERE  a.weishenpi=0 AND a.yijian =1 AND a.tijiaoren ='$yuangongbianhao'";		
		$query=$this->db->query($sql);
        $data['page']['rowsum'] =$query->num_rows();  //所有符合要求的行数 
		$data['page']['nowpage'] = $nowpage;
		$data['page']['nextpage'] = $nowpage+1;
		$data['page']['prepage'] = $nowpage-1;
		$data['page']['time'] = 0;
		$data['page']['zongjine'] = 0;
		$data['page']['type'] = 0;
		if($data['page']['prepage'] < 1){
		    $data['page']['prepage'] = 1;
		}		
		$data['page']['pagesum'] = intval(($data['page']['rowsum']-1)/$this->percount)+1; //总页数
        if($data['page']['pagesum'] < $data['page']['nextpage'])
     	{
		    $data['page']['nextpage'] = $data['page']['pagesum'];
        }	
		//限制行数的查询结果
        $sql="SELECT a.baoxiaobianhao,a.tijiaoshijian,b.zongjine,b.baoxiaoleixing from tb_baoxiaodan as b, tb_baoxiaozhuangtai 
        as A where a.baoxiaobianhao=b.baoxiaobianhao and a.yijian=1 and a.weishenpi=0 by a.tijiaoshijian desc limit $nowoffset,$this->percount ";		
        $query=$this->db->query($sql);
        $data['info'] = $query->result_array();
		$top['xingming']=$username;
        $data['top']=$top;
		return $data;
	}	
public function processdeal(){
	    header("Content-type:text/html; charset=GBK");
	    $time = $_REQUEST['time'];
	    $zongjine = $_REQUEST['zongjine'];
	    $danju = $_REQUEST['danju'];
	    $leibie = $_REQUEST['leibie'];
	    $page = $_REQUEST['page'];
        echo $this->getSelectJSON($page,$time,$zongjine,$danju,$leibie);
}
private function getSelectJSON($nextpage,$time,$zongjine,$danju,$leibie)
	{
		$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	    if($nextpage < 1){
        	$nextpage = 1;
        }
		$nowoffset = ($nextpage-1)*$this->percount;	

		$sql="SELECT b.baoxiaobianhao from tb_baoxiaodan as b,tb_baoxiaozhuangtai as A where a.baoxiaobianhao=b.baoxiaobianhao and a.shenpizhuangtai=0  and  a.tijiaoren ='$yuangongbianhao' ";		
		if($time){
			$sql.=" and DATE_FORMAT( b.tijiaoshijian, '%Y-%m-%d' ) ='$time'";
		}
		if($zongjine){
			$sql.=" and b.zongjine='$zongjine'";
		}
//		if($danju){
//			$sql.=" and b.tijiaoshijian='$time'";
//		}
		if($leibie){
			$sql.=" and b.baoxiaoleixing='$leibie'";
		}
        $query=$this->db->query($sql);
        $count =$query->num_rows(); 
        $pagesum = intval(($count-1)/$this->percount)+1;
	    if($nowoffset >= $count){
        	$nowoffset = ($nextpage-2)*$this->percount;
        }
	    if($nowoffset < 0){
        	$nowoffset = 0;
        }
        if($nextpage > $pagesum){
        	$nextpage = $pagesum;
        }
		$sql="SELECT b.baoxiaobianhao,b.zongjine,b.tijiaoshijian, b.baoxiaoleixing,a.yishenpi,a.weishenpi from tb_baoxiaodan as b, tb_baoxiaozhuangtai as A where a.baoxiaobianhao=b.baoxiaobianhao and a.shenpizhuangtai=0  and  a.tijiaoren ='$yuangongbianhao' ";		
		if($time){
			$sql.=" and DATE_FORMAT( b.tijiaoshijian, '%Y-%m-%d' ) ='$time'";
		}
		if($zongjine){
			$sql.=" and b.zongjine=$zongjine";
		}
		if($leibie){
			$sql.=" and b.baoxiaoleixing=$leibie";
		}	
		$sql.=" order by b.tijiaoshijian desc  limit $nowoffset,$this->percount ";	
        $query=$this->db->query($sql);
        $count2 =$query->num_rows(); 
        $data['info']=$query->result_array();
        for($i=0;$i<$count2;$i++){
        	$data['info'][$i]['show']=site_url("info/show/{$data['info'][$i]['baoxiaobianhao']}/{$data['info'][$i]['baoxiaoleixing']}");
        	$data['info'][$i]['right'] = base_url()."img/ico_sus.gif";
        	$data['info'][$i]['no'] = base_url()."img/wait.png";   
        	$data['info'][$i]['zhuangtai'] ="";  	
        }
     	$data['pagesum'] = $pagesum;
		$data['nowpage'] = $nextpage;	
		$data['time'] = $time;	
		$data['type'] = $leibie;
		$data['zongjine'] = $zongjine;
		$data['rowsum'] = $count;			
		echo $this->JSON($data);  
	}

	private function JSON($array) {
	    $this->arrayRecursive($array, 'urlencode', true);
	    $json = json_encode($array);
	    return urldecode($json);
    }
	private function arrayRecursive(&$array, $function, $apply_to_keys_also = false)
	{
	    foreach ($array as $key => $value) {
	        if (is_array($value)) {
	            $this->arrayRecursive($array[$key], $function, $apply_to_keys_also);
	        } else {
	            $array[$key] = $function($value);
	        }
	
	        if ($apply_to_keys_also && is_string($key)) {
	            $new_key = $function($key);
	            if ($new_key != $key) {
	                $array[$new_key] = $array[$key];
	                unset($array[$key]);
	            }
	        }
	    }
	}
}
?>