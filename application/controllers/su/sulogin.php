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
/*//如果用户没有登录，则指向登录页面，否则指向manpage控制器
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
	//验证用户名或者员工编号/密码是否合法
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
		//用户名或者密码错误
				if($password!=$row['mima']){
					$this->load->view('error_info');
				}
				else {
				 //根据职位来定向 
				
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
 //退出登录
 function login_out(){
	$array_items = array('name' => '', 'yuangongbianhao' => '');
	$this->session->unset_userdata($array_items);
 	
     redirect('login/index','refresh');//这是退出到登陆页面
 	
 	
 }
 }

?>