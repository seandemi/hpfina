<?php
class Mainpage extends  CI_Controller
{  
 public function __construct()
       {
          parent::__construct();

            $this->load->helper('url');
//            $this->load->library('session');
//            $this->load->database();
       }
    
function index()
	{
		/*    
		$xingming = $this->session->userdata('name'); 
		$yuangongbianhao = $this->session->userdata('yuangongbianhao');  
		$jibie = $this->session->userdata('jibie');   
	if (empty($username)&&empty($yuangongbianhao)) {
		 redirect('login/index/');
	}
	
	else {
		//top数组中存放头部所需的数据，body数组中存放主体所需的数据
		$top=array();
		$top['xingming']= $xingming;
        
		$body=array();
		$body['xingming'] = $xingming;
		$body['yuangongbianhao'] = $yuangongbianhao;
		$body['jibie'] = $jibie;
	
	$sql="SELECT A.bumenbianhao,B.bumenming   from tb_yuangong as A , tb_bumen as B where a.bumenbianhao=B.bumenbianhao and a.yuangongbianhao='$yuangongbianhao'";		
     $query=$this->db->query($sql);
	  $result=$query->result_array();
	   foreach ( $result as $row)
			{
				$body['bumenming']=$row['bumenming'];
				$body['bumenbianhao']=$row['bumenbianhao'];
			}		
        $data['top']=$top;
        $data['body']=$body;
	 if($jibie!="普通员工"){ 
		$this->load->view('normal',$data);
	 }  
	    else {
	    	$this->load->view('normal',$data);
	    }
	 }
	 */
		$this->load->view('su/header');
		$this->load->view('su/navbar');
		$this->load->view('su/table');
        $this->load->view('su/footer');
	}
}

?>