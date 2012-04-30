<?php

class Bumen extends  CI_Controller
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
    
	//显示主页
    public function index()
	{

		$querystr = "SELECT * FROM tb_bumen";
		$query = $this->db->query($querystr);
		$data['info'] = $query->result();
		
		//var_dump($data['info']);
		$this->load->view('su/header');
		$this->load->view('su/navbar');
        $this->load->view('su/bumen_index',$data);
        $this->load->view('su/footer');
		// var_dump($this->session->all_userdata());
        
	}
	
	public  function  checkbianhao()
	{
	    $value = $_REQUEST['value'];
		$this->db->where('bumenbianhao',$value);
		$this->db->from('tb_bumen');
		$count = $this->db->count_all_results();
		if($count == 0){
			$data["check"] = 0;
			echo json_encode($data);
		} else {
			$data["check"] = 1;
			echo json_encode($data);
		}
	}
	
	public function checkname()
	{
		$value=iconv("UTF-8","GBK",$_REQUEST['value']);
		$this->db->where('bumenming',$value);
		$this->db->from('tb_bumen');
		$count = $this->db->count_all_results();
		if($count == 0){
			$data["check"] = 0;
			echo json_encode($data);
		} else {
			$data["check"] = 1;
			echo json_encode($data);
		}
	}
	
	public function add()
	{
		$this->load->view('su/header');
		$this->load->view('su/navbar');
		$this->load->view('su/bumen_add');
		$this->load->view('su/footer');
	}
	
	//添加部门
	public function doadd()
	{
	    $this->form_validation->set_rules('bumenno', '部门编号', 'required|min_length[1]|max_length[15]|numeric|is_unique[tb_bumen.bumenbianhao]');
        $this->form_validation->set_rules('bumenname', '部门名称', 'required|min_length[1]|max_length[20]||is_unique[tb_bumen.bumenming]');
        $this->form_validation->set_rules('bumenattr', '费用属性', 'required|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('bumencate', '部门类别', 'required|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('bumenstatus', '部门状态', 'required|min_length[1]|max_length[1]');
        
	    	
	    if ($this->form_validation->run() == FALSE)
	    {
			redirect('su/bumen/add/');
	    }
	    else
	    {
	    	$bumenno = isset($_REQUEST['bumenno'])?$_REQUEST['bumenno']:'';
	        $bumenname = isset($_REQUEST['bumenname'])?$_REQUEST['bumenname']:'';
	        $bumenattr = isset($_REQUEST['bumenattr'])?$_REQUEST['bumenattr']:'';
	        $leibie = isset($_REQUEST['bumencate'])?$_REQUEST['bumencate']:'';
	        $zhuangtai = isset($_REQUEST['bumenstatus'])? $_REQUEST['bumenstatus']:'';
	        
	    	$data = array(
		    	   'bumenbianhao' => $bumenno,
	               'bumenming' => $bumenname,
	               'feiyongshuxing' => $bumenattr,
		    	   'leibie' => $leibie,
		    	   'zhuangtai' => $zhuangtai,
            );
            

            $this->db->insert('tb_bumen', $data);
	       redirect('su/bumen/index/');
	    }
	}
	
	//禁用或恢复部门权限————单个
	public function jinyong()
	{
		$bumenno = $_REQUEST['bumenbianhao'];
		$status = $_REQUEST['zhuangtai'];
		$new_status = ($status == 0)? 1: 0;
		$data =array(
		    'zhuangtai' => $new_status,
		);
        $this->db->where('bumenbianhao', $bumenno);
        $this->db->update('tb_bumen', $data);
	}
	
	//禁用部门
	public function jinyongs()
	{
 		$bumennos = $_REQUEST['bumencheck'];
	    $bumenno = explode(",",$bumennos );
	    foreach ($bumenno  as $bumen){
	    	$this->db->or_where('bumenbianhao',$bumen);
	    }
	    $data =array(
		    'zhuangtai' => '1',
		);
	    $this->db->update('tb_bumen', $data);
	}
	//恢复部门权限
	public function opens()
	{
	    $bumennos = $_REQUEST['bumencheck'];
	    $bumenno = explode(",",$bumennos );
	    foreach ($bumenno  as $bumen){
	    	$this->db->or_where('bumenbianhao',$bumen);
	    }
	    $data =array(
		    'zhuangtai' => '0',
		);
	    $this->db->update('tb_bumen', $data);
	}
	
	//删除部门————单个
	public function delete()
	{
		$bumenno = $_REQUEST['bumenbianhao'];
		$this->db->where('bumenbianhao', $bumenno);
        $this->db->delete('tb_bumen');
        redirect('su/bumen/index/');
	}
	
	//删除多个部门
	public function deletes()
	{
		$bumennos = $_REQUEST['bumencheck'];
	    $bumenno = explode(",",$bumennos );
	    foreach ($bumenno  as $bumen){
	       $this->db->or_where('bumenbianhao',$bumen);
	    }
	    $this->db->delete('tb_bumen');
	}
	
	
	public function actions()
	{
	    $checkboxvalue = $_REQUEST['bumencheck'];
		//var_dump($checkboxvalue);
	}
	//跳到修改界面
	public function edit($bumenno)
	{
		$sql = "SELECT * FROM tb_bumen WHERE bumenbianhao = ?"; 
		$query = $this->db->query($sql, array($bumenno));
        $data['bumeninfo'] = $query->result_array();
        $data['isnorepeat'] = 0;
	    $data['isnamerepeat'] = 0;
		$num=$data['bumeninfo'][0]['bumenbianhao'];
		$name=$data['bumeninfo'][0]['bumenming'];
		$newdata = array(
		    'old_bumenno' => $num,
			'old_bumenname' => $name
		);
		$this->session->set_userdata($newdata);
	    
		// var_dump($this->session->all_userdata());
		// exit;
        if(count($data['bumeninfo']) == 1 ){ 
            $this->load->view('su/header');
		    $this->load->view('su/navbar');
            $this->load->view('su/bumen_edit',$data);
            $this->load->view('su/footer');
			// $this->load->view('su/test');
        } else {
        	redirect('su/bumen/index/');
        }
		// var_dump($this->session->all_userdata());
	}
	
	public function checkeditno()
	{
		$bumenno = isset($_REQUEST['bumenno'])?$_REQUEST['bumenno']:'';
		$old_bumenno = $this->session->userdata('old_bumenno');
		if($bumenno != $old_bumenno){
			$this->db->where('bumenbianhao',$bumenno);
			$this->db->from('tb_bumen');
			$count = $this->db->count_all_results();
			if($count == 0){
				$data["check"] = 0;
				echo json_encode($data);
			} else {
				$data["check"] = 1;
				echo json_encode($data);
			}
		} else {
			$data["check"] = 0;
			echo json_encode($data);
		}
	}
	
	public function checkeditname()
	{
		$bumenname = iconv("UTF-8","GBK",$_REQUEST['bumenname']);
		$old_bumenname = $this->session->userdata('old_bumenname');
		if($bumenname != $old_bumenname){
			$this->db->where('bumenming',$bumenname);
			$this->db->from('tb_bumen');
			$count = $this->db->count_all_results();
			if($count == 0){
				$data["check"] = 0;
				echo json_encode($data);
			} else {
				$data["check"] = 1;
				echo json_encode($data);
			}
		} else {
			$data["check"] = 0;
			echo json_encode($data);
		}
	}
	//进行修改编辑
	public function doedit()
	{
		//严重表单是否合法
	    $this->form_validation->set_rules('bumenno', '部门编号', 'required|min_length[1]|max_length[15]|numeric|[tb_bumen.bumenbianhao]');
        $this->form_validation->set_rules('bumenname', '部门名称', 'required|min_length[1]|max_length[20]|[tb_bumen.bumenming]');
        $this->form_validation->set_rules('bumenattr', '费用属性', 'required|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('bumencate', '部门类别', 'required|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('bumenstatus', '部门状态', 'required|min_length[1]|max_length[1]');

        $bumenno = $_REQUEST['bumenno']?$_REQUEST['bumenno']:'';
        $bumenname = $_REQUEST['bumenname']?$_REQUEST['bumenname']:'';
        $bumenattr = $_REQUEST['bumenattr']?$_REQUEST['bumenattr']:'';
        $leibie = $_REQUEST['bumencate']?$_REQUEST['bumencate']:'';
        $zhuangtai = $_REQUEST['bumenstatus']? $_REQUEST['bumenstatus']:'0';
		
		$old_bumenno = $this->session->userdata('old_bumenno');
		$old_bumenname = $this->session->userdata('old_bumenname');
		
		
        //要修改的数据内容
        $data['bumeninfo'][0] = array(
		    'bumenbianhao' => $bumenno,
	        'bumenming' => $bumenname,
	        'feiyongshuxing' => $bumenattr,
		    'leibie' => $leibie,
		    'zhuangtai' => $zhuangtai,
	    );
	    $data['isnorepeat'] = 0;
	    $data['isnamerepeat'] = 0;
		
		//在部门编号改变时再做判断
		if($old_bumenno != $bumenno){
			$sql = "SELECT * FROM tb_bumen WHERE bumenbianhao = ?"; 
			$query = $this->db->query($sql, array($bumenno));
			$result['bumeninfo'] = $query->result_array();

			// echo count($result['bumeninfo']);
			if(count($result['bumeninfo']) == 1 ){
				$data['isnorepeat'] = 1; //部门编号有重复
				$this->load->view('su/header');
				$this->load->view('su/navbar');
				$this->load->view('su/bumen_edit',$data);
				$this->load->view('su/footer');
				return;
			}
		}

		//在部门名称改变时再做判断
		if($old_bumenname != $bumenname){
			$sql = "SELECT * FROM tb_bumen WHERE bumenming = ?"; 
			$query = $this->db->query($sql, array($bumenname));
			$result['bumeninfo'] = $query->result_array();
			if(count($result['bumeninfo']) == 1 ){
				$data['isnamerepeat'] = 1; //部门名称有重复
				$this->load->view('su/header');
				$this->load->view('su/navbar');
				$this->load->view('su/bumen_edit',$data);
				$this->load->view('su/footer');
				return;
			}
		}
		
        if ($this->form_validation->run() == FALSE){ //输入的数据不合法
	        $this->load->view('su/header');
		    $this->load->view('su/navbar');
	        $this->load->view('su/bumen_edit',$data);
	        $this->load->view('su/footer');
	        return;
	    }
	    else
	    {
		  $yuangongdata = array(
		      'bumenbianhao' => $bumenno,
		  );
          $this->db->where('bumenbianhao', $old_bumenno);
          $this->db->update('tb_bumen', $data['bumeninfo'][0]); 
		  $this->db->where('bumenbianhao', $old_bumenno);
		  $this->db->update('tb_yuangong', $yuangongdata); 
	       redirect('su/bumen/index/');
	    }	
	}
	
	
	public function baoxiao($bumenno)
	{
		$this->db->where('bumenbianhao',$bumenno);
		$this->db->order_by("jinexiaxian", "asc");
		$query = $this->db->get('tb_bumenlujing');
		$data['baoxiao'] = $query->result_array();
		$data['bumenno'] = $bumenno;
		$count = count($data['baoxiao']);

		if($count > 0 ){
			foreach ($data['baoxiao'] as $key=>$baoxiao){
				$this->db->select('tb_yuangong.xingming, tb_yuangong.yuangongbianhao, tb_yuangong.zhiwei');
				$this->db->from('tb_bumenlujing');
				$this->db->join('tb_yuangong', 'tb_bumenlujing.shenpiren1 = tb_yuangong.yuangongbianhao');
				$this->db->where('tb_bumenlujing.lujingbianhao',$baoxiao['lujingbianhao']);
				$query = $this->db->get();
				$data['shenpiren'][$key][] = $query->result_array();

				$this->db->select('tb_yuangong.xingming, tb_yuangong.yuangongbianhao, tb_yuangong.zhiwei');
				$this->db->from('tb_bumenlujing');
				$this->db->join('tb_yuangong', 'tb_bumenlujing.shenpiren2 = tb_yuangong.yuangongbianhao');
				$this->db->where('tb_bumenlujing.lujingbianhao',$baoxiao['lujingbianhao']);
				$query = $this->db->get();
				$data['shenpiren'][$key][] = $query->result_array();
				
				$this->db->select('tb_yuangong.xingming, tb_yuangong.yuangongbianhao, tb_yuangong.zhiwei');
				$this->db->from('tb_bumenlujing');
				$this->db->join('tb_yuangong', 'tb_bumenlujing.shenpiren3 = tb_yuangong.yuangongbianhao');
				$this->db->where('tb_bumenlujing.lujingbianhao',$baoxiao['lujingbianhao']);
				$query = $this->db->get();
				$data['shenpiren'][$key][] = $query->result_array();
				
				$this->db->select('tb_yuangong.xingming, tb_yuangong.yuangongbianhao, tb_yuangong.zhiwei');
				$this->db->from('tb_bumenlujing');
				$this->db->join('tb_yuangong', 'tb_bumenlujing.shenpiren4 = tb_yuangong.yuangongbianhao');
				$this->db->where('tb_bumenlujing.lujingbianhao',$baoxiao['lujingbianhao']);
				$query = $this->db->get();
				$data['shenpiren'][$key][] = $query->result_array();
				
				$this->db->select('tb_yuangong.xingming, tb_yuangong.yuangongbianhao, tb_yuangong.zhiwei');
				$this->db->from('tb_bumenlujing');
				$this->db->join('tb_yuangong', 'tb_bumenlujing.shenpiren5 = tb_yuangong.yuangongbianhao');
				$this->db->where('tb_bumenlujing.lujingbianhao',$baoxiao['lujingbianhao']);
				$query = $this->db->get();
				$data['shenpiren'][$key][] = $query->result_array();
				
				$this->db->select('tb_yuangong.xingming, tb_yuangong.yuangongbianhao, tb_yuangong.zhiwei');
				$this->db->from('tb_bumenlujing');
				$this->db->join('tb_yuangong', 'tb_bumenlujing.shenpiren6 = tb_yuangong.yuangongbianhao');
				$this->db->where('tb_bumenlujing.lujingbianhao',$baoxiao['lujingbianhao']);
				$query = $this->db->get();
				$data['shenpiren'][$key][] = $query->result_array();
			}
			
			
			$this->load->view('su/header');
		    $this->load->view('su/navbar');
	        $this->load->view('su/baoxiao_view',$data);
	        $this->load->view('su/footer');
		} else {
			$this->db->not_like('zhiwei', '普通员工');
			$this->db->select('zhiwei');
			$this->db->group_by('zhiwei');
			$query = $this->db->get('tb_yuangong');
			$data['zhiweis'] = $query->result_array();
			$this->load->view('su/header');
		    $this->load->view('su/navbar');
	        $this->load->view('su/baoxiao_add1',$data);
	        $this->load->view('su/footer');
		}
	}
	
	public function addbaoxiao()
	{
		$bumenno = isset($_REQUEST['bumenbianhao'])?$_REQUEST['bumenbianhao']:"";
		$baoxiaonum = isset($_REQUEST['baoxiaonum'])?$_REQUEST['baoxiaonum']:"";
		$xiaxian = isset($_REQUEST['xiaxian'])?$_REQUEST['xiaxian']:"";
		$shaxian = isset($_REQUEST['shaxian'])?$_REQUEST['shaxian']:"";
		$sp1 = isset($_REQUEST['sp1'])?$_REQUEST['sp1']:"";
		$sp2 = isset($_REQUEST['sp2'])?$_REQUEST['sp2']:"";
		$sp3 = isset($_REQUEST['sp3'])?$_REQUEST['sp3']:"";
		$sp4 = isset($_REQUEST['sp4'])?$_REQUEST['sp4']:"";
		$sp5 = isset($_REQUEST['sp5'])?$_REQUEST['sp5']:"";
		$sp6 = isset($_REQUEST['sp6'])?$_REQUEST['sp6']:"";
    	$insertdata = array(
    		'bumenbianhao' => $bumenno,
	    	'jinexiaxian' => $xiaxian,
			'jineshangxian' => $shaxian,
    		'shenpiren1' => $sp1,
    		'shenpiren2' => $sp2,
    		'shenpiren3' => $sp3,
    		'shenpiren4' => $sp4,
    		'shenpiren5' => $sp5,
    	    'shenpiren6' => $sp6,
        );
        $data['xiaxian'] = $shaxian+0.01;
        //第一次插入把以前的清空
        if($baoxiaonum == 1){
        	$this->db->where('bumenbianhao', $bumenno);
        	$this->db->delete('tb_bumenlujing');
        }
        
        if($this->db->insert('tb_bumenlujing', $insertdata)){
	        if($baoxiaonum > 0 && $baoxiaonum < 6){
	        	$biaoxiao = $baoxiaonum + 1;
	        	$data['bumenno'] = $bumenno;
	        	$this->db->not_like('zhiwei', '普通员工');
	        	$this->db->group_by('zhiwei');
				$this->db->select('zhiwei');
				$query = $this->db->get('tb_yuangong');
				$data['zhiweis'] = $query->result_array();
	        	//上一级选择的审批人
				$this->db->where('bumenbianhao', $bumenno);
			    $this->db->where('jineshangxian', $shaxian);
		        $query=$this->db->get('tb_bumenlujing');
		        $shangji = $query->result_array();
		        for($i=1; $i <= 6; $i++){
		        	$shenpiren = 'shenpiren'.$i;
		        	if($shangji[0][$shenpiren] != "" && $shangji[0][$shenpiren] != "0")
				        {
				        	$this->db->where('yuangongbianhao',$shangji[0][$shenpiren]);
				        	$query = $this->db->get('tb_yuangong');
				        	$data['shenpiren'][$i] = $query->result_array();
				        }
		        }
		        
				$this->load->view('su/header');
			    $this->load->view('su/navbar');
		        $this->load->view("su/baoxiao_add{$biaoxiao}" ,$data);
		        $this->load->view('su/footer');
	        }
	        if( $baoxiaonum == 6){
	        	redirect('su/bumen/index/');
	        }

        // var_dump($data['shenpiren']);
        //$data['shangji'] = $shangji;
        }
	}
	
	public function editbaoxiao($bumenno)
	{
		    $data['bumenno'] = $bumenno;
			$this->db->not_like('zhiwei', '普通员工');
			$this->db->select('zhiwei');
			$this->db->group_by('zhiwei');
			$query = $this->db->get('tb_yuangong');
			$data['zhiweis'] = $query->result_array();
			$this->load->view('su/header');
		    $this->load->view('su/navbar');
	        $this->load->view('su/baoxiao_add1',$data);
	        $this->load->view('su/footer');	
	}
	
	public function zw2ren()
	{
		header("Content-type:text/html; charset=GBK");
		$zhiwei=iconv("UTF-8","GBK",$_REQUEST['zhiwei']);
	    $this->db->where('zhiwei',$zhiwei);
	    $this->db->select('xingming, yuangongbianhao');
	    $query = $this->db->get('tb_yuangong');
		$data['yuangong'] = $query->result_array();
	    echo $this->JSON($data);
	}
	
	//解决直接json_encode不能传递中文的问题
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
	
	private function JSON($array) {
	    $this->arrayRecursive($array, 'urlencode', true);
	    $json = json_encode($array);
	    return urldecode($json);
    }
}
?>