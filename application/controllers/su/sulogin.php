<?php
class Sulogin extends  CI_Controller
{     
 public function __construct()
       {
          parent::__construct();

            $this->load->helper('url');
           // $this->load->library('session');
           //$this->load->library('session_pro');
           //$this->load->database();
       }
    
function index()
{   
/*//����û�û�е�¼����ָ���¼ҳ�棬����ָ��manpage������
$username=$this->session->userdata('name');
$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	if (empty($username)&&empty($yuangongbianhao)) {					
	 	$this->load->view('superuser/sulogin');
		}
    else {
			redirect('superuser/mainpage/index/');
		}*/
    $this->load->view('su/login');
}  
 
function check()
	{   
	//��֤�û�������Ա�����/�����Ƿ�Ϸ�
$username=$this->session->userdata('name');
$yuangongbianhao=$this->session->userdata('yuangongbianhao');
 if (empty($username)&&empty($yuangongbianhao)) {	
	$name=$_POST['username'];
	$yuangongbianhao=$_POST['yuangongbianhao'];
	$password=md5($_POST['password']);
	$answer;
	if(!empty($name)){
		//$name=mb_convert_encoding('$name','gbk','utf8');
	  $sql="SELECT *  FROM tb_yuangong where xingming='$name'";

      $query=$this->db->query($sql);

	  $result=$query->result_array();
	   foreach ( $result as $row)
			{
		
		//$row=$this->session_pro->change_encode($row);;
		//�û��������������
				if($password!=$row['mima']){
					$this->load->view('error_info');
				}
				else {
				 //����ְλ������ 
				
					$uname= $row['xingming'];
					$uid=$row['yuangongbianhao'];
					$jibie=$row['zhiwei'];
					 $newdata = array(
		                   'name'  => $uname,
		                   'yuangongbianhao' => $uid,
		                   'jibie'     => $jibie
		               );
		       //       print_r($newdata);
		             $this->session->set_userdata($newdata);
		      //      print_r($jibie);
					 redirect('superuser/mainpage/index/');
				}
			
			}

	
	 }	

  }
  else {
			redirect('superuser/mainpage/index/');
		}
 }
 //�˳���¼
 function login_out(){
	$array_items = array('name' => '', 'yuangongbianhao' => '');
	$this->session->unset_userdata($array_items);
 	
     redirect('login/index','refresh');//�����˳�����½ҳ��
 	
 	
 }
 }

?>