<?php
    class Commbx extends CI_Controller
    {
     	public function __construct()
	    {
	        parent::__construct();
	
	        $this->load->helper('url');
	        $this->load->library('session');
	        $this->load->database();
	        $this->load->helper('form');
	        $this->load->library('form_validation');
	     }
     
    	public function index()
    	{
	    	$querystr = "SELECT * FROM  tb_tongyongxiangqing order by 'id' asc";
			$query = $this->db->query($querystr);
			$data['info'] = $query->result();
			
			$this->load->view('su/header');
			$this->load->view('su/navbar');
	        $this->load->view('su/commbx_index',$data);
	        $this->load->view('su/footer');
    	} 
    	
    	public function add()
    	{
    		$name = isset($_REQUEST['bxname'])?$_REQUEST['bxname']:'';

    		if($name != ''){
    			$insertdata = array(
    			    'name'=>$name
    			);
    			$this->db->insert('tb_tongyongxiangqing', $insertdata);
    		}
    		redirect('su/commbx/index');

    	}
    	
    	public function edit()
    	{
    		
    	}
    	public function delete($id)
    	{
    		$this->db->where('id', $id);
    		$this->db->delete('tb_tongyongxiangqing');
    		redirect('su/commbx/index');
    	}
    }