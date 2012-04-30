<?php
class Personal extends  CI_Controller
{     
 public function __construct()
       {
          parent::__construct();

            $this->load->helper('url');
            $this->load->library('session');
           $this->load->library('session_pro');
           $this->load->helper('form');
           $this->load->database();
            $this->load->helper(array('form', 'url'));  
            $this->load->library('form_validation');
           
       }
	    
	function index()
	{   
	//����û�û�е�¼����ָ���¼ҳ�棬����ָ��manpage������
	$username=$this->session->userdata('name');
	$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	$jibie = $this->session->userdata('jibie');
		if (empty($username)&&empty($yuangongbianhao)) {					
		 	redirect('login/index/');
			}
	    else {  
	            $top=array();
				$top['xingming']= $username;
		        
				$basic=array();
				$basic['xingming'] =  $username;
				$basic['yuangongbianhao'] = $yuangongbianhao;
				$basic['jibie'] = $jibie;
			
			$sql="SELECT A.bumenbianhao,B.bumenming   from tb_yuangong as A , tb_bumen as B where a.bumenbianhao=B.bumenbianhao and a.yuangongbianhao='$yuangongbianhao'";		
		     $query=$this->db->query($sql);
			  $result=$query->result_array();
			   foreach ( $result as $row)
					{
						$basic['bumenming']=$row['bumenming'];
						$basic['bumenbianhao']=$row['bumenbianhao'];
					}		
		        $data['top']=$top;
		        $data['basic']=$basic;
			    	
						$this->load->view('user/personal_info',$data);
					}
		    	
	  }  
	 
 function detail()
	{   
	//����û�û�е�¼����ָ���¼ҳ�棬����ָ��manpage������
	$username=$this->session->userdata('name');
	$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	$jibie = $this->session->userdata('jibie');
		if (empty($username)&&empty($yuangongbianhao)) {					
		 	redirect('login/index/');
			}
	    else {  
	    	    $sql = "SELECT * FROM tb_yuangongxiangqing where yuangongbianhao=?";
			    $query=$this->db->query($sql, array($yuangongbianhao)); ;
				$result=$query->result_array();
				foreach ($result as $row)
				{						        
				$basic=array();
				$basic['yuangongbianhao'] =  $yuangongbianhao;
				$basic['xingming'] =  $row['xingming'];
				$basic['xingbie'] =  $row['xingbie'];
				$basic['chushengriqi'] =  $row['chushengriqi'];
				$basic['wenhuachengdu'] =  $row['wenhuachengdu'];
				$basic['gudingdianhua'] =  $row['gudingdianhua'];
				$basic['shoujihaoma'] =  $row['shoujihaoma'];
				$basic['shenfenzheng'] =  $row['shenfenzheng'];
				$basic['ruzhiriqi'] =  $row['ruzhiriqi'];
				$basic['huming'] =  $row['huming'];
				$basic['kaihuyinhang'] =  $row['kaihuyinhang'];
				$basic['yinhangzhanghao'] =  $row['yinhangzhanghao'];
				$basic['zhuzhi'] =  $row['zhuzhi'];
				$basic['email'] =  $row['email'];				
				}	
	    		  $top=array();
				 $top['xingming']= $username; 
				 $data['top']=$top;
		        $data['basic']=$basic;	    	    	
				$this->load->view('user/detail_info',$data);
			}
		    	
	  } 

 function check_detail()
	{   
	//����û�û�е�¼����ָ���¼ҳ�棬����ָ��manpage������
	$username=$this->session->userdata('name');
	$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	$jibie = $this->session->userdata('jibie');
		if (empty($username)&&empty($yuangongbianhao)) {					
		 	redirect('login/index/');
			}
	    else {  
	         $this->form_validation->set_rules('User_phone', 'User_phone', 'trim|max_length[12]');
	     if(trim($_POST['phone'])){ 
	         $this->form_validation->set_rules('phone', 'phone', 'trim|max_length[13]|numeric');
	         }
	     if(trim($_POST['identity_card'])){
	         $this->form_validation->set_rules('identity_card', 'identity_card', 'trim|max_length[18]|alpha_dash');
	     } 
	       $this->form_validation->set_rules('name', 'name', 'trim|max_length[20]');
		if(trim($_POST['account'])){
             $this->form_validation->set_rules('account', 'account', 'trim|max_length[30]|numeric');
			}
             $this->form_validation->set_rules('User_mail', 'User_mail', 'trim|max_length[30]');  
			
         if($this->form_validation->run() == true)
         {						
				$data = array(
	               'xingbie' => trim($_POST['sex']),
				   'chushengriqi' => trim($_POST['birthday']),
	               'wenhuachengdu' => trim($_POST['degree']),
				   'gudingdianhua' => trim($_POST['User_phone']),
	               'shoujihaoma' => trim($_POST['phone']),
				   'shenfenzheng' => trim($_POST['identity_card']),
	               'ruzhiriqi' => trim($_POST['entry_date']),
				   'huming' => trim($_POST['name']),
	               'kaihuyinhang' => trim($_POST['bank']),
				   'yinhangzhanghao' => trim($_POST['account']),
				   'zhuzhi' => trim($_POST['address']),
//	               'zhengjianzhao' => trim($_POST['address']),
				   'email' => trim($_POST['User_mail'])							
	            );	
				$this->db->where('yuangongbianhao', $yuangongbianhao);
				$result=$this->db->update('tb_yuangongxiangqing', $data); 
				if($result){
			//�˴����ص�href��һ����ȷ
					echo "<script>window.alert('������ϸ��Ϣ�޸ĳɹ���');
				     window.location.href='detail/';
				     </script>";
				}				
				else {                        
					echo "<script>window.alert('������ϸ��Ϣ�޸�ʧ�ܣ�');
				     window.location.href='detail/';
				     </script>";				}
		    }		    
		    else {
		    	redirect('personal/detail/');	    	
		    }
	 }
		    	
	  }
	  
	  	 
 function password()
	{   
	//����û�û�е�¼����ָ���¼ҳ�棬����ָ��manpage������
	$username=$this->session->userdata('name');
	$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	$jibie = $this->session->userdata('jibie');
		if (empty($username)&&empty($yuangongbianhao)) {					
		 	redirect('login/index/');
			}
	    else {  
 	    		$top=array();
				$top['xingming']= $username;   
				$data['top']=$top; 	    
				$data['jibie']=$jibie; 		    	
				$this->load->view('user/pwd',$data);
			}
		    	
	 } 
	 
	 function change_pwd(){
	 	
		$username=$this->session->userdata('name');
		$yuangongbianhao=$this->session->userdata('yuangongbianhao');
		if (empty($username)&&empty($yuangongbianhao)) {
		  redirect('login/index/');
		}
		else {
		 $this->form_validation->set_rules('pwd', 'password', 'trim|required|matches[pwd]|min_length[1]|max_length[10]');
         $this->form_validation->set_rules('pwd2', 'Password Confirmation', 'trim|required');    
			
         if($this->form_validation->run() == true)
         {
				$pwd=md5($_POST['pwd']);	
				$data = array(
	               'mima' => $pwd
	            );	
	            
				$this->db->where('yuangongbianhao', $yuangongbianhao);
				$result=$this->db->update('tb_yuangong', $data); 
				if($result){
			//�˴����ص�href��һ����ȷ
					echo "<script>window.alert('�����޸ĳɹ���');
				     window.location.href='index/';
				     </script>";
				}				
				else {                        
					echo "<script>window.alert('�����޸�ʧ�ܣ�');
				     window.location.href='password/';
				     </script>";				}
		    }		    
		    else {
		    	redirect('personal/index/');	    	
		    }
	 }
}
//����֤����ҳ��	 
  function photo()
	{   
	//����û�û�е�¼����ָ���¼ҳ�棬����ָ��manpage������
	$username=$this->session->userdata('name');
	$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	$jibie = $this->session->userdata('jibie');
		if (empty($username)&&empty($yuangongbianhao)) {					
		 	redirect('login/index/');
			}
	    else {
	   //��ȡ����ͼ·�� 
	   $sql="SELECT thumb  FROM tb_yuangongxiangqing where yuangongbianhao='$yuangongbianhao'";
      $query=$this->db->query($sql);
	  $resul=$query->result_array();
	   foreach ( $resul as $row)
			{	
			$thumb=$row['thumb'];
			if(!empty($thumb)){
				$thumb=base_url().$thumb;
    			}		
			}    	  		
          		$top=array();
				$top['xingming']= $username;		        
				$basic=array();
				$basic['xingming'] =  $username; 
				$basic['photo'] =$thumb;
				$data['top']=$top;				
	            $data['basic']=$basic;	    	    	    	
				$this->load->view('user/photo',$data);			
			}	 	
	  } 	  
	  
//�����ϴ�����Ƭ	  
  function pro_photo()
	{   
	//����û�û�е�¼����ָ���¼ҳ�棬����ָ��manpage������
	$username=$this->session->userdata('name');
	$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	$jibie = $this->session->userdata('jibie');
	if (empty($username)&&empty($yuangongbianhao)) {					
		 	redirect('login/index/');
	   }	
    else { 
         	$delete1 = @unlink ($photo_path);
		    $delete2 = @unlink ($thumb);     	
 //ȡ������ͼ��ԭͼ�ı���·��,����ļ��ϴ��ɹ�����ɾ��ԭ��������ļ�
     $sql="SELECT photo_path,thumb  FROM tb_yuangongxiangqing where yuangongbianhao='$yuangongbianhao'";
      $query=$this->db->query($sql);
	  $resul=$query->result_array();
	   foreach ( $resul as $row)
			{	
			$photo_path=$row['photo_path'];
			$thumb=$row['thumb'];				
			}
   	  $config['upload_path'] = './uploads/';
	  $config['allowed_types'] = 'gif|jpg|jpeg|png|';
	  $config['max_size'] = '1000';
	  $config['max_width']  = '2048';
	  $config['max_height']  = '1536';
	  $config['file_name']  = $username;
	  $config['overwrite']=true;
	  $this->load->library('upload', $config);		 
		  if ( ! $this->upload->do_upload())
		  {		   
		  $error = array('error' => $this->upload->display_errors('', ''));
     	  $info=$error['error'];
		  echo"<script>alert('$info');
          window.location.href='photo/';
          </script>";		  
		  } 
		  else
		  {	
		   $data = array('upload_data' => $this->upload->data());
           $photo_info=$this->upload->data();
           $photo_name=$photo_info['file_name'];
           $file_ext=$photo_info['file_ext'];
		   $photoname="./uploads/".$photo_name;
				$config['image_library'] = 'gd2';
				$config['source_image'] = $photoname;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 180;
				$config['height'] = 180;
                $config['new_image'] = $photoname;				
				$this->load->library('image_lib', $config); 				
				$this->image_lib->resize();	
						//���µ�·���������ݿ�	
			    $thumb="./uploads/".$username."_thumb".$file_ext;
		  		$data = array(
	               'photo_path' => $photoname,
		  		   'thumb' => $thumb
	            );	            	
				$this->db->where('yuangongbianhao', $yuangongbianhao);
				$result=$this->db->update('tb_yuangongxiangqing', $data); 	
				if($result){
			
					echo "<script>window.alert('��Ƭ�ϴ��ɹ���');
				     window.location.href='photo/';
				     </script>";
				}				
				else {
		 			echo "<script>window.alert('��Ƭ�ϴ�ʧ�ܣ�');
						 window.location.href='photo/';
						 </script>";
				}		   
		  }
    }   	
 }	
//ɾ��ԭͼ��
 function delete_photo(){
    $username=$this->session->userdata('name');
	$yuangongbianhao=$this->session->userdata('yuangongbianhao');
	$jibie = $this->session->userdata('jibie');
	if (empty($username)&&empty($yuangongbianhao)) {					
		 	redirect('login/index/');
	   }	
    else { 
      $sql="SELECT photo_path,thumb  FROM tb_yuangongxiangqing where yuangongbianhao='$yuangongbianhao'";
      $query=$this->db->query($sql);
	  $resul=$query->result_array();
	   foreach ( $resul as $row)
			{	
			$photo_path=$row['photo_path'];
			$thumb=$row['thumb'];				
			}
	       	$delete1 = @unlink ($photo_path);
		    $delete2 = @unlink ($thumb);  
		 	
		    $data = array(
	               'photo_path' =>null ,
		  		   'thumb' => null
	            );	            	
				$this->db->where('yuangongbianhao', $yuangongbianhao);
				$result=$this->db->update('tb_yuangongxiangqing', $data);
    			if($result){
			
					echo "<script>window.alert('ɾ���ɹ���');
				     window.location.href='photo/';
				     </script>";
				}				
				else {
		 			echo "<script>window.alert('ɾ��ʧ�ܣ�');
						 window.location.href='photo/';
						 </script>";
				}     
    	
    }
    
    
    } 
//������    
    function get_resu(){
             $sql="SELECT A.bumenbianhao,B.bumenming  from tb_yuangong as A , tb_bumen as B where a.bumenbianhao=B.bumenbianhao and a.yuangongbianhao='$yuangongbianhao'";		
		     $query=$this->db->query($sql);
			 $result=$query->result_array();   	
    }
} 
	 

 
 

?>