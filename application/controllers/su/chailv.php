<?php
class Chailv extends CI_Controller
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
	    	$querystr = "SELECT * FROM  tb_chailcbutie order by 'id' asc";
			$query = $this->db->query($querystr);
			$data['info'] = $query->result();
			
			$this->load->view('su/header');
			$this->load->view('su/navbar');
	        $this->load->view('su/chailv_index',$data);
	        $this->load->view('su/footer');
    	}
    	
    	public function add()
    	{
    		$this->db->select('zhiwei');
			$this->db->group_by('zhiwei');
			$query = $this->db->get('tb_yuangong');
			$data['zhiweis'] = $query->result_array();
			
    		$this->load->view('su/header');
			$this->load->view('su/navbar');
	        $this->load->view('su/chailv_add',$data);
	        $this->load->view('su/footer');
    	}
    	
    	public function doadd()
    	{
    		$jibie = isset($_REQUEST['zhiwei'])?$_REQUEST['zhiwei']:'';
    		$jine1 = isset($_REQUEST['jine1'])?$_REQUEST['jine1']:'0.00';
    		$jine2 = isset($_REQUEST['jine2'])?$_REQUEST['jine2']:'0.00';
    		$jine3 = isset($_REQUEST['jine3'])?$_REQUEST['jine3']:'0.00';
    		
    		$insertData = array(
    		    'jibie' => $jibie,
    		    'jine1' => $jine1,
    		    'jine2' => $jine2,
    		    'jine3' => $jine3,
    		);
    		
//    		var_dump($insertData);
    		$this->db->insert('tb_chailcbutie', $insertData);
    		redirect('su/chailv/index');
    	}
    	
    	public function delete($id)
    	{
    		$this->db->where('id', $id);
    		$this->db->delete('tb_chailcbutie');
    		redirect('su/chailv/index');
    	}
    	
    	public function edit($id)
    	{
    		$this->db->where('id', $id);
    		$query = $this->db->get('tb_chailcbutie');
    		$data['chailv'] = $query->result_array();
    		$this->load->view('su/header');
			$this->load->view('su/navbar');
	        $this->load->view('su/chailv_edit',$data);
	        $this->load->view('su/footer');
    	}
        public function doedit()
    	{
    		$id = isset($_REQUEST['id'])?$_REQUEST['id']:'';
    		$jibie = isset($_REQUEST['zhiwei'])?$_REQUEST['zhiwei']:'';
    		$jine1 = isset($_REQUEST['jine1'])?$_REQUEST['jine1']:'0.00';
    		$jine2 = isset($_REQUEST['jine2'])?$_REQUEST['jine2']:'0.00';
    		$jine3 = isset($_REQUEST['jine3'])?$_REQUEST['jine3']:'0.00';
    		
    		$insertData = array(
    		    'jine1' => $jine1,
    		    'jine2' => $jine2,
    		    'jine3' => $jine3,
    		);
    		
    		//var_dump($insertData);
    		$this->db->where('id', $id);
    		$this->db->update('tb_chailcbutie', $insertData);
    		redirect('su/chailv/index');
    	}
    }