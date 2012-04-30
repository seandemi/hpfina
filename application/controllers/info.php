<?php
class Info extends  CI_Controller
{     
 public function __construct()
       {
          parent::__construct();
           $this->load->helper('url');
           $this->load->library('session');
           $this->load->database();
           $this->load->helper(array('form', 'url'));  
           $this->load->library('form_validation');
       } 
 //正在执行的报销单列表       
function show($baoxiaobianhao,$baoxiaoleixing){
	$username=$this->session->userdata('name');
	$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	if (empty($username)&&empty($yuangongbianhao)) {					
	 	 redirect('login/index/');
		}
    else {
    	     	$top=array();
    	        $basic=array();
				$top['xingming']= $username;
				$basic['yuangongbianhao']=$yuangongbianhao;
				$sql="SELECT A.bumenbianhao,B.bumenming  from tb_yuangong as A , tb_bumen as B where a.bumenbianhao=B.bumenbianhao and a.yuangongbianhao='$yuangongbianhao'";		
			    $query=$this->db->query($sql);	
			    $basic['bumen']=$query->result_array();						               
                $sql="SELECT * from tb_baoxiaodan where baoxiaobianhao='$baoxiaobianhao'";		
                $query=$this->db->query($sql);
				$basic['baoxiaoinfo']=$query->result_array();
                $sql=$this-> get_SQL($baoxiaobianhao,$baoxiaoleixing);																					
				$query=$this->db->query($sql);
				$basic['number']=$query->num_rows();                
				$basic['baoxiaoxiangqing']=$query->result_array(); 

				$sql="SELECT A.* ,B.xingming,B.yuangongbianhao from tb_baoxiaozhuangtai AS a,tb_yuangong as b  where a.bohuicishu=(select max(bohuicishu) from tb_baoxiaozhuangtai where baoxiaobianhao='$baoxiaobianhao' ) and b.yuangongbianhao=a.shenpiren and a.shenpizhuangtai=1 and a.baoxiaobianhao='$baoxiaobianhao' order by a.passdate desc";		
                $query=$this->db->query($sql);
                $basic['yishenpi']=$query->num_rows();                
				$basic['shenpi']=$query->result_array(); 
				if($basic['number']){
				$basic['num']=count($basic['baoxiaoxiangqing'][0]);
				}
				$data['top']=$top;
		        $data['basic']=$basic;	
		  	$this->load->view('baoxiaodan/baoxiao/self/display',$data);
    } 	
} 
 //被驳回的报销单      
function rejected($baoxiaobianhao,$baoxiaoleixing){
	$username=$this->session->userdata('name');
	$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	if (empty($username)&&empty($yuangongbianhao)) {					
	 	 redirect('login/index/');
		}
    else {
    	     	$top=array();
    	        $basic=array();
				$top['xingming']= $username;
				$basic['yuangongbianhao']=$yuangongbianhao;	
                $sql="SELECT A.bumenbianhao,A.xingming,A.yuangongbianhao,B.bumenming,C.* from tb_yuangong as A , tb_bumen as B,tb_baoxiaodan as c where a.bumenbianhao=B.bumenbianhao and  a.yuangongbianhao=c.yuangongbianhao and c.baoxiaobianhao='$baoxiaobianhao'";		
			    $query=$this->db->query($sql);	
			    $basic['baoxiaoinfo']=$query->result_array();
                $sql=$this-> get_SQL($baoxiaobianhao,$baoxiaoleixing);																				
				$query=$this->db->query($sql);
				$basic['number']=$query->num_rows();
				
				$basic['baoxiaoxiangqing']=$query->result_array(); 
				$sql="SELECT A.* ,B.xingming,B.yuangongbianhao from tb_baoxiaozhuangtai AS a,tb_yuangong as b  where a.bohuicishu=(select max(bohuicishu) from tb_baoxiaozhuangtai where baoxiaobianhao='$baoxiaobianhao' ) and b.yuangongbianhao=a.shenpiren and a.shenpizhuangtai=1 and a.baoxiaobianhao='$baoxiaobianhao' order by a.passdate desc";		
                $query=$this->db->query($sql);
                $basic['yishenpi']=$query->num_rows();                
				$basic['shenpi']=$query->result_array(); 
				if($basic['number']){
				$basic['num']=count($basic['baoxiaoxiangqing'][0]);
				}			
				$data['top']=$top;
		        $data['basic']=$basic;	
		  	    $this->load->view('baoxiaodan/baoxiao/self/show_rejected',$data);
    } 	
 } 
 //等待审批的报销单列表       
function shenpi($baoxiaobianhao,$baoxiaoleixing){
	$username=$this->session->userdata('name');
	$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	if (empty($username)&&empty($yuangongbianhao)) {					
	 	 redirect('login/index/');
		}
    else {
    	     	$top=array();
    	        $basic=array();
				$top['xingming']= $username;
				$basic['yuangongbianhao']=$yuangongbianhao;	
                $sql="SELECT A.bumenbianhao,A.xingming,A.yuangongbianhao,B.bumenming,  C.* from tb_yuangong as A , tb_bumen as B,tb_baoxiaodan as c where a.bumenbianhao=B.bumenbianhao and  a.yuangongbianhao=c.yuangongbianhao and c.baoxiaobianhao='$baoxiaobianhao'";		
			    $query=$this->db->query($sql);	
			    $basic['baoxiaoinfo']=$query->result_array();
                $sql=$this-> get_SQL($baoxiaobianhao,$baoxiaoleixing);																		
				$query=$this->db->query($sql);
				$basic['number']=$query->num_rows();                
				$basic['baoxiaoxiangqing']=$query->result_array(); 
				$sql="SELECT A.* ,B.xingming,B.yuangongbianhao from tb_baoxiaozhuangtai AS a,tb_yuangong as b  where a.bohuicishu=(select max(bohuicishu) from tb_baoxiaozhuangtai where baoxiaobianhao='$baoxiaobianhao' ) and b.yuangongbianhao=a.shenpiren and a.shenpizhuangtai=1 and a.baoxiaobianhao='$baoxiaobianhao' order by a.passdate desc";		
                $query=$this->db->query($sql);
                $basic['yishenpi']=$query->num_rows();                
				$basic['shenpi']=$query->result_array(); 
				if($basic['number']){
				$basic['num']=count($basic['baoxiaoxiangqing'][0]);
				}				
				$data['top']=$top;
		        $data['basic']=$basic;	
		  	    $this->load->view('baoxiaodan/baoxiao/others/show_shenpi',$data);
    } 	
 } 
 //完成审批的报销单列表 
 function show_finish($baoxiaobianhao,$baoxiaoleixing){
 	$username=$this->session->userdata('name');
	$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	if (empty($username)&&empty($yuangongbianhao)) {					
	 	 redirect('login/index/');
		}
    else {
    	     	$top=array();
    	        $basic=array();
				$top['xingming']= $username;
				$basic['yuangongbianhao']=$yuangongbianhao;	
                $sql="SELECT A.bumenbianhao,A.xingming,A.yuangongbianhao,B.bumenming,  C.* from tb_yuangong as A , tb_bumen as B,tb_baoxiaodan as c where a.bumenbianhao=B.bumenbianhao and  a.yuangongbianhao=c.yuangongbianhao and c.baoxiaobianhao='$baoxiaobianhao'";		
			    $query=$this->db->query($sql);	
			    $basic['baoxiaoinfo']=$query->result_array();
                $sql=$this->get_SQL($baoxiaobianhao,$baoxiaoleixing);																		
				$query=$this->db->query($sql);
				$basic['number']=$query->num_rows();            
				$basic['baoxiaoxiangqing']=$query->result_array(); 
				$sql="SELECT A.* ,B.xingming,B.yuangongbianhao from tb_baoxiaozhuangtai AS a,tb_yuangong as b  where  b.yuangongbianhao=a.tijiaoren and a.tijiaoren='$yuangongbianhao' and 
				 a.baoxiaobianhao='$baoxiaobianhao' order by a.passdate desc";		
                $query=$this->db->query($sql);
                $basic['yishenpi']=$query->num_rows();                
				$basic['shenpi']=$query->result_array(); 
				if($basic['number']){
				$basic['num']=count($basic['baoxiaoxiangqing'][0]);
				}				
				$data['top']=$top;
		        $data['basic']=$basic;	
		  	    $this->load->view('baoxiaodan/baoxiao/self/show_finish',$data);
    } 	
 	
 }
 
 //返回sql语句
 private function get_SQL($baoxiaobianhao,$baoxiaoleixing){
				if($baoxiaoleixing==1){
				   $sql="SELECT feiyongleixing,receipt,bizhong,huilv,jine,shangcheshijian,shangchedidian,xiacheshijian,xiachedidian,kehubianhao,danjushumu from tb_jiaotong where baoxiaobianhao='$baoxiaobianhao'";
				}
    			if($baoxiaoleixing==2){	
				   $sql="SELECT feiyongleixing,receipt,bizhong,huilv,jine,didian,qishishijian,jieshushijian,tianshu,kehubianhao,danjushumu from tb_chailv where baoxiaobianhao='$baoxiaobianhao'";
				}
        		if($baoxiaoleixing==3){	
				   $sql="SELECT receipt,bizhong,huilv,jine,shijian,didian,danwei,name,kehubianhao,danjushumu from tb_jiaoji where baoxiaobianhao='$baoxiaobianhao'";
				}
        		if($baoxiaoleixing==4){	
				   $sql="SELECT receipt,bizhong,huilv,jine,shijian,lipinming,danwei,name,kehubianhao,danjushumu from tb_lipin where baoxiaobianhao='$baoxiaobianhao'";
				}
        		if($baoxiaoleixing==5){	
				   $sql="SELECT receipt,bizhong,huilv,jine,shijian,zichanming,yongtu,danjushumu from tb_zichann where baoxiaobianhao='$baoxiaobianhao'";
				}
        		if($baoxiaoleixing==6){	
				   $sql="SELECT receipt,bizhong,huilv,jine,shijian,mudi,Feiyongmingxi,kehubianhao,danjushumu from tb_tongyong where baoxiaobianhao='$baoxiaobianhao' ";
				}	
				return $sql;
 } 
  
}
?>