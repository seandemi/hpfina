<?php 
    	class Test extends  CI_Controller
{

       public function __construct()
       {
          parent::__construct();

         $this->load->helper('url');
        // $this->load->library('session');
         $this->load->database();
         $this->load->helper('form');
            // $this->load->library('form_validation');
       }
	   public function index(){
	   	    $data['title'] = "this is title";
			$this->load->view('su/test',$data);
		}
		public function ajax(){
		   // $this->load->model('MUser', '', TRUE);
           // $username = trim($_POST['username']);
            // if the username exists return a 1 indicating true
           // if ($this->MUser->username_exists($username)) {
                echo '1';
                
           // }
		}
		public function show(){
		    echo "<input type=\"button\" value=\"test\" />";
		}
	}