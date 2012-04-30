<?php
class Manage extends  CI_Controller
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
//等待审批的报销单
public function shenpi()
	{
	 $username=$this->session->userdata('name');
     $yuangongbianhao=$this->session->userdata('yuangongbianhao');
	if (empty($username)&&empty($yuangongbianhao)) {					
	 	 redirect('login/index/');
		}
    else {
		$data = $this->getshenpi('1');	
        $this->load->view('baoxiaodan/baoxiao/others/shenpi',$data);      
	} 	
}

private function getshenpi($nowpage){
	    $yuangongbianhao=$this->session->userdata('yuangongbianhao');
	    $username=$this->session->userdata('name');
		$nextpage = $nowpage+1;
		$nowoffset = ($nowpage -1)*$this->percount; //要查询的偏移位置		        
        $sql="SELECT c.xingming,a.baoxiaobianhao,a.tijiaoshijian,b.zongjine,b.baoxiaoleixing from tb_baoxiaodan as b, tb_yuangong as c,tb_baoxiaozhuangtai as A where c.yuangongbianhao=a.tijiaoren and  a.baoxiaobianhao=b.baoxiaobianhao and a.shenpizhuangtai=0  and  a.shenpiren ='$yuangongbianhao'";		
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
        $sql="SELECT c.xingming,a.baoxiaobianhao,a.tijiaoshijian,b.zongjine,b.baoxiaoleixing from tb_baoxiaodan as b, tb_yuangong as c,tb_baoxiaozhuangtai as A where c.yuangongbianhao=a.tijiaoren and  a.baoxiaobianhao=b.baoxiaobianhao and a.shenpizhuangtai=0  and  a.shenpiren ='$yuangongbianhao' order by a.tijiaoshijian desc limit $nowoffset,$this->percount ";		
        $query=$this->db->query($sql);
		$data['info'] = $query->result_array();
		$top['xingming']=$username;
        $data['top']=$top;
		return $data;
	}

//查询等待执行的报销单
public function select_shenpi(){
		header("Content-type:text/html; charset=GBK");
	    $time = $_REQUEST['time'];
	    $zongjine = $_REQUEST['zongjine'];
	    $danju = $_REQUEST['danju'];
	    $leibie = $_REQUEST['leibie'];
	    $page = $_REQUEST['page'];
        echo $this->getSelectshenpi($page,$time,$zongjine,$danju,$leibie);
}

private function getSelectshenpi($nextpage,$time,$zongjine,$danju,$leibie){
		$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	    if($nextpage < 1){
        	$nextpage = 1;
        }
		$nowoffset = ($nextpage-1)*$this->percount;	
		$sql="SELECT b.zongjine from tb_baoxiaodan as b,tb_baoxiaozhuangtai as A where a.baoxiaobianhao=b.baoxiaobianhao and a.shenpizhuangtai=0  and  a.shenpiren ='$yuangongbianhao'";		
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
		$sql="SELECT c.xingming,a.baoxiaobianhao,a.tijiaoshijian,b.zongjine,b.baoxiaoleixing from tb_baoxiaodan as b, tb_yuangong as c,tb_baoxiaozhuangtai as A where c.yuangongbianhao=a.tijiaoren and  a.baoxiaobianhao=b.baoxiaobianhao and a.shenpizhuangtai=0  and  a.shenpiren ='$yuangongbianhao' ";		
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
        	$data['info'][$i]['show']=site_url("info/shenpi/{$data['info'][$i]['baoxiaobianhao']}/{$data['info'][$i]['baoxiaoleixing']}");			        
         	if($data['info'][$i]['baoxiaoleixing']==1){
					           	$data['info'][$i]['baoxiaoleixing']= "交通费";
					           }
					           else if($data['info'][$i]['baoxiaoleixing']==2){
					           	$data['info'][$i]['baoxiaoleixing']="差旅费";
					           }
							   else if($data['info'][$i]['baoxiaoleixing']==3){
					           	$data['info'][$i]['baoxiaoleixing']="交际费";
					           }
					           else if($data['info'][$i]['baoxiaoleixing']==4){
					           	$data['info'][$i]['baoxiaoleixing']="礼品费";
					           } 
					           else if($data['info'][$i]['baoxiaoleixing']==5){
					           	$data['info'][$i]['baoxiaoleixing']="固定资产采购申请";
					           }  
					           else if($data['info'][$i]['baoxiaoleixing']==6){
					           	$data['info'][$i]['baoxiaoleixing']="通用报销单";
					           }	
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