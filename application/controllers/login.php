<?php
class Login extends  CI_Controller
{     
 public function __construct()
       {
          parent::__construct();

            $this->load->helper('url');
            $this->load->library('session');
           $this->load->library('session_pro');
           $this->load->database();
            $this->load->helper(array('form', 'url'));  
            $this->load->library('form_validation');
       }
    
function index()
{   
//如果用户没有登录，则指向登录页面，否则指向manpage控制器

$username=$this->session->userdata('name');
$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	if (empty($username)&&empty($yuangongbianhao)) {					
//	 	$this->load->view('mainpage/admin_login');
	     $this->load->view('mainpage/login');
		}
    else { 
		redirect('mainpage/index/');
		}
}  
 
function check()
{   
	//验证用户名或者员工编号/密码是否合法
$username=$this->session->userdata('name');
$yuangongbianhao=$this->session->userdata('yuangongbianhao');
 if (empty($username)&&empty($yuangongbianhao)) {
 		 $this->form_validation->set_rules('UserName', 'yuangongbianha', 'trim|required');
         $this->form_validation->set_rules('passWord', 'Password', 'trim|required'); 			
         if($this->form_validation->run() == true)
         {
            $xingming=$_POST['UserName'];
			$password=md5(trim($_POST['passWord']));
			if($_POST['yuangongbianhao']>0){
				$bianhao=trim($_POST['yuangongbianhao']);
			}
			if(!empty($bianhao)){
			$sql = "SELECT * FROM tb_yuangong where xingming=?  and yuangongbianhao=?";
			 $query=$this->db->query($sql, array($xingming,$bianhao));
			}
			else {
			 $sql = "SELECT * FROM tb_yuangong where xingming=? ";
			 $query=$this->db->query($sql, array($xingming));
			}
			$count =$query->num_rows(); 
			$result=$query->result_array();
            if($count>0){
				   foreach ($result as $row)
						{
					//用户名或者密码错误
							if($password!=$row['mima']){
								 header("Content-type:text/html; charset=GBK");
								 echo "<script>window.alert('员工姓名名或者密码错误！');
								 window.location.href='index/';
								 </script>";
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
					             $this->session->set_userdata($newdata);
								 redirect('mainpage/index/');
							}						
						}			
				   }
				  else {
				  				header("Content-type:text/html; charset=GBK");
								 echo "<script>window.alert('该员工姓名不存在！');
								 window.location.href='index/';
							 </script>";
				  }
					         	
         }
         else {
         	redirect('login/index/');         	
         }
  }
  else {
			redirect('mainpage/index/');
		}
 } 
 //用户验证
function check_name(){
	header("Content-type:text/html; charset=GBK");
    $name=iconv("UTF-8", "gb2312",$_POST['name']); 	
    $this->db->select('yuangongbianhao');
	$this->db->from('tb_yuangong');
	$array = array('xingming =' => $name);
    $this->db->where($array);
    $result=$this->db->get(); 
    $count =$result->num_rows();
    $resu=$result->result_array();
    $data['num']=$count;
	$data['result']=$resu;
    echo  $this->JSON($data);
} 
 
 //退出登录
 function login_out(){
	$array_items = array('name' => '', 'yuangongbianhao' => '','jibie' => '');
	$this->session->unset_userdata($array_items); 	
     redirect('login/index','refresh');//这是退出到登陆页面 	
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