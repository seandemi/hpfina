<?php
class Shenpit extends CI_Controller
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
		$query = $this->db->get('tb_shenpishixian');
		$data['shenpit'] = $query->result_array();
		$count = count($data['shenpit']);
		if($count != "1"){
			redirect('su/shenpit/add');
		} else {
			$this->load->view('su/header');
			$this->load->view('su/navbar');
	        $this->load->view('su/shenpitv',$data);
	        $this->load->view('su/footer');
		}
	}
	
	public function add()
	{
		$data['shenpit'][0] = array(
			'jinggaoshixian' => "0",
			'tiaoguoshixian' => "0",
		);
		
		$this->load->view('su/header');
		$this->load->view('su/navbar');
	    $this->load->view('su/shenpitad',$data);
	    $this->load->view('su/footer');
	}
	public function edit()
	{
	    $query = $this->db->get('tb_shenpishixian');
		$data['shenpit'] = $query->result_array();
		$this->load->view('su/header');
		$this->load->view('su/navbar');
	    $this->load->view('su/shenpitad',$data);
	    $this->load->view('su/footer');
	}
	
	public function doadd()
	{
		$this->form_validation->set_rules('jinggao', '警告时限', 'required|min_length[1]|max_length[2]|integer|');
		$this->form_validation->set_rules('tiaoguo', '跳过时限', 'required|min_length[1]|max_length[2]|integer|');
		
		$jinggao = isset($_REQUEST['jinggao'])?$_REQUEST['jinggao']:"0";
		$tiaoguo = isset($_REQUEST['tiaoguo'])?$_REQUEST['tiaoguo']:"0";
		$data = array(
			'jinggaoshixian' => $jinggao,
			'tiaoguoshixian' => $tiaoguo,
		);
		$query = $this->db->get('tb_shenpishixian');
		$resultnum = $query->num_rows();
		if($resultnum > 0) {
			$this->db->like('jinggaoshixian', ''); 
			$this->db->delete('tb_shenpishixian');
		}
		
		if($this->db->insert('tb_shenpishixian', $data))
		{
			redirect('su/shenpit/index');
		}
	}
}