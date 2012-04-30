<?php
class Mainpage extends  CI_Controller
{  
 public function __construct()
       {
          parent::__construct();
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->database();
       } 
          
function index()
	{    
		$xingming = $this->session->userdata('name'); 
		$yuangongbianhao = $this->session->userdata('yuangongbianhao');  
		$jibie = $this->session->userdata('jibie');   
	if (empty($xingming)&&empty($yuangongbianhao)) {
		 redirect('login/index/');
	}
		
	else {
		//top数组中存放头部所需的数据，body数组中存放主体所需的数据
	    if($jibie=="普通员工"){
	    $data= $this->normaldata($xingming,$yuangongbianhao,$jibie);
	    $this->load->view('mainpage/normal',$data);
		
	  }  
	   else {
	    	$data=$this->no_ordinary($xingming,$yuangongbianhao,$jibie);
	    	$this->load->view('mainpage/manager',$data);
	    }	    
	 }
	}
private function normaldata($xingming,$yuangongbianhao,$jibie) {
	 $top=array();
	 $top['xingming']= $xingming;        
	 $body=array();
	 $body['xingming'] = $xingming;
	 $body['yuangongbianhao'] = $yuangongbianhao;
	 $body['jibie'] = $jibie;	
	  $sql="SELECT A.bumenbianhao,B.bumenming from tb_yuangong as A , tb_bumen as B where a.bumenbianhao=B.bumenbianhao and a.yuangongbianhao='$yuangongbianhao'";		
      $query=$this->db->query($sql);
	  $result=$query->result_array();
	  foreach ( $result as $row)			{
				$body['bumenming']=$row['bumenming'];
				$body['bumenbianhao']=$row['bumenbianhao'];
		}	

//正在执行的报销单
         $sql="SELECT a.baoxiaobianhao,a.tijiaoshijian,a.yishenpi,a.weishenpi,b.zongjine,b.baoxiaoleixing from tb_baoxiaodan as b, tb_baoxiaozhuangtai as A where a.baoxiaobianhao=b.baoxiaobianhao and a.shenpizhuangtai=0  and  a.tijiaoren ='$yuangongbianhao' order by a.tijiaoshijian desc limit 2";		
		 $query=$this->db->query($sql);
		 $body['number']['processing']=$query->num_rows();
	     $body['processing']=$query->result_array(); 
//被驳回的报销单
         $sql="SELECT a.baoxiaobianhao,a.tijiaoshijian,a.shenpiren,b.zongjine,b.baoxiaoleixing from tb_baoxiaodan as b, 
         tb_baoxiaozhuangtai as A where a.baoxiaobianhao=b.baoxiaobianhao and b.baoxiaobianhao not in (select baoxiaobianhao from tb_baoxiaozhuangtai  where shenpizhuangtai=0 and tijiaoren='$yuangongbianhao') and a.yijian=0  and  a.tijiaoren ='$yuangongbianhao'  order by a.tijiaoshijian desc limit 2";		
		 $query=$this->db->query($sql);
		 $body['number']['reject']=$query->num_rows();
	     $body['reject']=$query->result_array();	

//通过审批的报销单
         $sql="SELECT a.baoxiaobianhao,a.tijiaoshijian,b.zongjine,b.baoxiaoleixing from tb_baoxiaodan as b, tb_baoxiaozhuangtai as A where a.baoxiaobianhao=b.baoxiaobianhao and a.weishenpi=0  and  a.tijiaoren ='$yuangongbianhao' order by a.tijiaoshijian desc limit 2";		
		 $query=$this->db->query($sql);
		 $body['number']['finish']=$query->num_rows();
	     $body['finish']=$query->result_array();
	     
         $data['top']=$top;
         $data['body']=$body;
         return $data;
}

private function no_ordinary($xingming,$yuangongbianhao,$jibie) {
		 $top=array();
	 $top['xingming']= $xingming;        
	 $body=array();
	 $body['xingming'] = $xingming;
	 $body['yuangongbianhao'] = $yuangongbianhao;
	 $body['jibie'] = $jibie;	
	  $sql="SELECT A.bumenbianhao,B.bumenming from tb_yuangong as A , tb_bumen as B where a.bumenbianhao=B.bumenbianhao and a.yuangongbianhao='$yuangongbianhao'";		
      $query=$this->db->query($sql);
	  $result=$query->result_array();
	  foreach ( $result as $row)			{
				$body['bumenming']=$row['bumenming'];
				$body['bumenbianhao']=$row['bumenbianhao'];
		}	

//正在执行的报销单
         $sql="SELECT a.baoxiaobianhao,a.tijiaoshijian,a.yishenpi,a.weishenpi,b.zongjine,b.baoxiaoleixing from tb_baoxiaodan as b, tb_baoxiaozhuangtai as A where a.baoxiaobianhao=b.baoxiaobianhao and a.shenpizhuangtai=0  and  a.tijiaoren ='$yuangongbianhao' order by a.tijiaoshijian desc limit 2";		
		 $query=$this->db->query($sql);
		 $body['number']['processing']=$query->num_rows();
	     $body['processing']=$query->result_array(); 
//被驳回的报销单
         $sql="SELECT a.baoxiaobianhao,a.tijiaoshijian,a.shenpiren,b.zongjine,b.baoxiaoleixing from tb_baoxiaodan as b, 
         tb_baoxiaozhuangtai as A where a.baoxiaobianhao=b.baoxiaobianhao and b.baoxiaobianhao not in (select baoxiaobianhao from tb_baoxiaozhuangtai  where shenpizhuangtai=0 and tijiaoren='$yuangongbianhao') and a.yijian=0  and  a.tijiaoren ='$yuangongbianhao'  order by a.tijiaoshijian desc limit 2";		
		 $query=$this->db->query($sql);
		 $body['number']['reject']=$query->num_rows();
	     $body['reject']=$query->result_array();
//通过审批的报销单
         $sql="SELECT a.baoxiaobianhao,a.tijiaoshijian,b.zongjine,b.baoxiaoleixing from tb_baoxiaodan as b, tb_baoxiaozhuangtai as A where a.baoxiaobianhao=b.baoxiaobianhao and a.weishenpi=0  and  a.tijiaoren ='$yuangongbianhao' order by a.tijiaoshijian desc limit 2";		
		 $query=$this->db->query($sql);
		 $body['number']['finish']=$query->num_rows();
	     $body['finish']=$query->result_array();
//需要审批的报销单
         $sql="SELECT c.xingming,a.baoxiaobianhao,a.tijiaoshijian,b.zongjine,b.baoxiaoleixing from tb_baoxiaodan as b, tb_yuangong as c,tb_baoxiaozhuangtai as A where c.yuangongbianhao=a.tijiaoren and  a.baoxiaobianhao=b.baoxiaobianhao and a.shenpizhuangtai=0  and  a.shenpiren ='$yuangongbianhao' order by a.tijiaoshijian desc limit 2";		
		 $query=$this->db->query($sql);
		 $body['number']['yaoshenpi']=$query->num_rows();
	     $body['yaoshenpi']=$query->result_array();
	     
         $data['top']=$top;
         $data['body']=$body;
         return $data;
}

}

?>