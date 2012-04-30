<?php
//error_reporting(0);
class Yuangong extends  CI_Controller
{
	   private $percount = 20;
	     
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
	    header("Content-type:text/html; charset=GBK");	
		$data = $this->getIndexData('1');
		
		$this->load->view('su/header');
		$this->load->view('su/navbar');
        $this->load->view('su/yuangong_index',$data);
        $this->load->view('su/footer');
        
	}
	
	//加载首页要传递的数据
	private function getIndexData($nowpage){
		$nextpage = $nowpage+1;
		$nowoffset = ($nowpage -1)*$this->percount; //要查询的偏移位置
		$this->db->select('tb_yuangong.yuangongbianhao, tb_bumen.bumenming, tb_yuangong.xingming, tb_yuangong.zhiwei, tb_yuangong.zhuangtai');
        $this->db->from('tb_yuangong');
        $this->db->join('tb_bumen', 'tb_yuangong.bumenbianhao = tb_bumen.bumenbianhao','left');
        
		$data['page']['rowsum'] = $this->db->count_all_results(); //所有符合要求的行数
		$data['page']['nowpage'] = $nowpage;
		$data['page']['nextpage'] = $nowpage+1;
		$data['page']['prepage'] = $nowpage-1;
		if($data['page']['prepage'] < 1){
		    $data['page']['prepage'] = 1;
		}
		$data['page']['pagesum'] = intval(($data['page']['rowsum']-1)/$this->percount)+1; //总页数
        if($data['page']['pagesum'] < $data['page']['nextpage'])
     	{
		    $data['page']['nextpage'] = $data['page']['pagesum'];
        }		
		//限制行数的查询结果
		$this->db->select('tb_yuangong.yuangongbianhao, tb_bumen.bumenming, tb_yuangong.xingming, tb_yuangong.zhiwei, tb_yuangong.zhuangtai');
        $this->db->from('tb_yuangong');
        $this->db->join('tb_bumen', 'tb_yuangong.bumenbianhao = tb_bumen.bumenbianhao','left');
		$this->db->limit($this->percount, $nowoffset);
		$this->db->order_by("tb_yuangong.yuangongbianhao", "asc"); 
		$query = $this->db->get();
		$data['info'] = $query->result_array();
		
		$querystrbumen = "SELECT * FROM tb_bumen";
		$querybumen = $this->db->query($querystrbumen);
		$data['bumeninfo'] = $querybumen->result_array();
		return $data;
		
	}
	
	public  function checkadd()
	{
		$value = $_REQUEST['value'];
		$this->db->where('yuangongbianhao',$value);
		$this->db->from('tb_yuangong');
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
	
		$querystr = "SELECT * FROM tb_bumen";
		$query = $this->db->query($querystr);
		$data['bumeninfo'] = $query->result_array();
		
	    $this->load->view('su/header');
		$this->load->view('su/navbar');
	    $this->load->view('su/yuangong_add',$data);
	    $this->load->view('su/footer');
	}
	
	public function doadd()
	{
	    $this->form_validation->set_rules('yuangongno', '员工编号', 'required|min_length[1]|max_length[8]|is_unique[tb_yuangong.yuangongbianhao]');
        $this->form_validation->set_rules('yuangongname', '员工名称', 'required|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('yuangongbumen', '所属部门', 'required|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('yuangongpost', '职位', 'required|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('yuangongpsw', '登录密码', 'required|min_length[1]|max_length[10]');
        $this->form_validation->set_rules('yuangongstatus', '账户状态', 'required|min_length[1]|max_length[1]');
        
       		
	    if ($this->form_validation->run() == FALSE)
	    {
		    redirect('su/yuangong/add/');
	    }
	    else
	    {
	    	$yuangongno = isset($_REQUEST['yuangongno'])?$_REQUEST['yuangongno']:'';
	        $yuangongming =isset($_REQUEST['yuangongname'])?$_REQUEST['yuangongname']:'';
	        $yuangongbumen = isset($_REQUEST['yuangongbumen'])?$_REQUEST['yuangongbumen']:'';
	        $zhiwei = isset($_REQUEST['yuangongpost'])?$_REQUEST['yuangongpost']:'';
	        $mima = isset($_REQUEST['yuangongpsw'])? $_REQUEST['yuangongpsw']:'';
	        $zhuangtai = isset($_REQUEST['yuangongstatus'])? $_REQUEST['yuangongstatus']:'';

	    	$data = array(
		    	   'yuangongbianhao' => $yuangongno,
	               'bumenbianhao' => $yuangongbumen,
	               'xingming' => $yuangongming,
		    	   'zhiwei' => $zhiwei,
		    	   'zhuangtai' => $zhuangtai,
		    	   'mima' => md5($mima),
            );
            
            $datas = array(
                   'yuangongbianhao' => $yuangongno,
	               'xingming' => $yuangongming,
            );
            $this->db->insert('tb_yuangong', $data);
            $this->db->insert('tb_yuangongxiangqing', $datas);
            
	      redirect('su/yuangong/index/');
	    }
	}
	
	public function jinyong()
	{
		$yuangongno = $_REQUEST['yuangongbianhao'];
		$status = $_REQUEST['zhuangtai'];
		$new_status = ($status == 0)? 1: 0;
		$data =array(
		    'zhuangtai' => $new_status,
		);
        $this->db->where('yuangongbianhao', $yuangongno);
        $this->db->update('tb_yuangong', $data);
       // redirect('su/yuangong/index/'); 
	}
	
	public function jinyongs()
	{
	    $yuangongnos = $_REQUEST['yuangongcheck'];
	    $yuangongno = explode(",",$yuangongnos);
	    foreach ($yuangongno as $yuangong){
	    	$this->db->or_where('yuangongbianhao',$yuangong);
	    }
	    $data =array(
		    'zhuangtai' => '1',
		);
	    $this->db->update('tb_yuangong', $data);
	}
	
	public function opens()
	{
	    $yuangongnos = $_REQUEST['yuangongcheck'];
	    $yuangongno = explode(",",$yuangongnos);
	    foreach ($yuangongno as $yuangong){
	    	$this->db->or_where('yuangongbianhao',$yuangong);
	    }
	    $data =array(
		    'zhuangtai' => '0',
		);
	    $this->db->update('tb_yuangong', $data);
	}
	
	public function delete()
	{
		header("Content-type:text/html; charset=GBK");
		$yuangongno = $_REQUEST['yuangongbianhao'];
		$this->db->where('yuangongbianhao', $yuangongno);
        $this->db->delete('tb_yuangong');
        
        $this->db->where('yuangongbianhao', $yuangongno);
        $this->db->delete('tb_yuangongxiangqing');
        
        $this->db->where('yuangongbianhao', $yuangongno);
        $this->db->delete('tb_baoxiaolujing');
        
        $nowpage = $_REQUEST['nowpage'];
		$type = $_REQUEST['type'];
		$bumenno = $_REQUEST['selectedid'];
		$searchword=iconv("UTF-8","GBK",$_REQUEST['searchword']);
		
		if($type=="index"){
			echo $this->getIndexJSON($nowpage);
	    } elseif($type=="search"){
		    echo $this->getSearchJSON($nowpage,$searchword);
		} elseif($type=="selectbumen"){
		    echo $this->getSelectJSON($nowpage,$bumenno);
		}
        
	}
	
	public function deletes()
	{
		header("Content-type:text/html; charset=GBK");
	    $yuangongnos = $_REQUEST['yuangongcheck'];
	    $yuangongno = explode(",",$yuangongnos);
	    foreach ($yuangongno as $yuangong){
	    	$this->db->or_where('yuangongbianhao',$yuangong);
	    }
	    $this->db->delete('tb_yuangong');
	    
	    foreach ($yuangongno as $yuangong){
	    	$this->db->or_where('yuangongbianhao',$yuangong);
	    }
	    $this->db->delete('tb_yuangongxiangqing');
	    
	    foreach ($yuangongno as $yuangong){
	    	$this->db->or_where('yuangongbianhao',$yuangong);
	    }
	    $this->db->delete('tb_baoxiaolujing');
	    
	    $nowpage = $_REQUEST['nowpage'];
		$type = $_REQUEST['type'];
		$bumenno = $_REQUEST['selectedid'];
		$searchword=iconv("UTF-8","GBK",$_REQUEST['searchword']);
		
		if($type=="index"){
			echo $this->getIndexJSON($nowpage);
	    } elseif($type=="search"){
		    echo $this->getSearchJSON($nowpage,$searchword);
		} elseif($type=="selectbumen"){
		    echo $this->getSelectJSON($nowpage,$bumenno);
		}
	}
	//跳到修改界面
	public function edit($yuangongno)
	{
		$sql = "SELECT * FROM tb_yuangong WHERE yuangongbianhao = ?"; 
		$query = $this->db->query($sql, array($yuangongno));
        $data['yuangonginfo'] = $query->result_array();
        $data['isnorepeat'] = 0;
		
	    $num=$data['yuangonginfo'][0]['yuangongbianhao'];
	    $newdata = array(
		    'old_yuangongno' => $num,
		);
		$this->session->set_userdata($newdata);
		
		$querystr = "SELECT * FROM tb_bumen";
		$query = $this->db->query($querystr);
		$data['bumeninfo'] = $query->result_array();
        if(count($data['yuangonginfo']) == 1 ){ 
            $this->load->view('su/header');
		    $this->load->view('su/navbar');
            $this->load->view('su/yuangong_edit',$data);
            $this->load->view('su/footer');
        } else {
        	redirect('su/yuangong/index/');
        }
		
	}
	public function checkedit()
	{
		$yuangongno = isset($_REQUEST['yuangongno'])?$_REQUEST['yuangongno']:'';
		$old_yuangongno = $this->session->userdata('old_yuangongno');
		if($old_yuangongno != $yuangongno){
			$this->db->where('yuangongbianhao',$yuangongno);
			$this->db->from('tb_yuangong');
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
	    $this->form_validation->set_rules('yuangongno', '员工编号', 'required|min_length[1]|max_length[15]|[tb_yuangong.yuangongbianhao]');
        $this->form_validation->set_rules('yuangongname', '员工名称', 'required|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('yuangongbumen', '所属部门', 'required|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('yuangongpost', '职位', 'required|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('yuangongpsw', '登录密码', 'required|min_length[1]|max_length[10]');
        $this->form_validation->set_rules('yuangongstatus', '账户状态', 'required|min_length[0]|max_length[1]');
		
		$yuangongno = isset($_REQUEST['yuangongno'])?$_REQUEST['yuangongno']:'';
		$yuangongming = isset($_REQUEST['yuangongname'])?$_REQUEST['yuangongname']:'';
		$yuangongbumen = isset($_REQUEST['yuangongbumen'])?$_REQUEST['yuangongbumen']:'';
		$zhiwei = isset($_REQUEST['yuangongpost'])?$_REQUEST['yuangongpost']:'';
		$mima = isset($_REQUEST['yuangongpsw'])? $_REQUEST['yuangongpsw']:'******';
		$zhuangtai = isset($_REQUEST['yuangongstatus'])? $_REQUEST['yuangongstatus']:'';
		$old_yuangongno = $this->session->userdata('old_yuangongno');
        $data['yuangonginfo'][0] = array(
		   'yuangongbianhao' => $yuangongno,
		   'bumenbianhao' => $yuangongbumen,
		   'xingming' => $yuangongming,
		   'zhiwei' => $zhiwei,
		   'zhuangtai' => $zhuangtai,
		   //'mima' => md5($mima),
	    );
	    if($mima != "******"){
	    	$data['yuangonginfo'][0]['mima'] = md5($mima);
	    }
	    $data['isnorepeat'] = 0;
		
		$querystr = "SELECT * FROM tb_bumen";
		$query = $this->db->query($querystr);
		$data['bumeninfo'] = $query->result_array();
		
		//在员工编号改变时再做判断
		if($old_yuangongno != $yuangongno){
			$sql = "SELECT * FROM tb_yuangong WHERE yuangongbianhao = ?"; 
			$query = $this->db->query($sql, array($yuangongno));
			$result['yuangonginfo'] = $query->result_array();

			// echo count($result['bumeninfo']);
			if(count($result['yuangonginfo']) == 1 ){
				$data['isnorepeat'] = 1; //员工编号有重复
				$this->load->view('su/header');
				$this->load->view('su/navbar');
				$this->load->view('su/yuangong_edit',$data);
				$this->load->view('su/footer');
				return;
			}
		}
	    
		if ($this->form_validation->run() == FALSE){ //输入的数据不合法
			//echo "yes";
			//exit;
	        $this->load->view('su/header');
		    $this->load->view('su/navbar');
	        $this->load->view('su/yuangong_edit',$data);
	        $this->load->view('su/footer');
	        return;
	    } else
	    {
          $this->db->where('yuangongbianhao', $old_yuangongno);
          $this->db->update('tb_yuangong', $data['yuangonginfo'][0]); 
          
          $data2 = array(
		   'yuangongbianhao' => $yuangongno,
		   'xingming' => $yuangongming,
	       );
	    
          $this->db->where('yuangongbianhao', $old_yuangongno);
          $this->db->update('tb_yuangongxiangqing',$data2); 
           // $this->db->insert('tb_yuangong', $data);
	       // $this->load->view('su/yuangong_index');
	       //更新后在返回
	       redirect('su/yuangong/index/');
	    }	
	}
	
	public function selectbumen()
	{
	    header("Content-type:text/html; charset=GBK");
	    $bumenno = $_REQUEST['selectedid'];
		if($bumenno == -1){
		    echo $this->getIndexJSON('1');
		} else {
		    echo $this->getSelectJSON('1', $bumenno);
		}
	}
	
	public function searchyuangong()
	{
	    header("Content-type:text/html; charset=GBK");
		$searchword=iconv("UTF-8","GBK",$_REQUEST['searchword']);
		echo $this->getSearchJSON(1,$searchword);
	}
	
	

	
	public function nextpage($nowpage)
	{
	    header("Content-type:text/html; charset=GBK");
		$type = $_REQUEST['type'];
		$nextpage = $_REQUEST['nextpage'];
		$bumenno = $_REQUEST['selectedid'];
		$searchword=iconv("UTF-8","GBK",$_REQUEST['searchword']);
		
		if($type=="index"){
			echo $this->getIndexJSON($nextpage);
	    } elseif($type=="search"){
		    echo $this->getSearchJSON($nextpage,$searchword);
		} elseif($type=="selectbumen"){
		    echo $this->getSelectJSON($nextpage,$bumenno);
		}
	}
	
	
	public function getdetails($yuangongno)
	{
		$this->db->where("yuangongbianhao", $yuangongno);
		$query = $this->db->get('tb_yuangongxiangqing');
		$data['info'] = $query->result_array();
		$this->load->view('su/header');
		$this->load->view('su/navbar');
        $this->load->view('su/yuangong_info',$data);
        $this->load->view('su/footer');
		
	}
	private function getIndexJSON($nextpage)
	{
		if($nextpage < 1){
        	$nextpage = 1;
        }
		$nowoffset = ($nextpage-1)*$this->percount;
		$this->db->select('tb_yuangong.yuangongbianhao, tb_bumen.bumenming, tb_yuangong.xingming, tb_yuangong.zhiwei, tb_yuangong.zhuangtai');
        $this->db->from('tb_yuangong');
        $this->db->join('tb_bumen', 'tb_yuangong.bumenbianhao = tb_bumen.bumenbianhao','left');
        $count = $this->db->count_all_results();
        $pagesum = intval(($count-1)/$this->percount)+1;
        if($nowoffset >= $count){
        	$nowoffset = ($nextpage-2)*$this->percount;
        }
        if($nowoffset < 0){
        	$nowoffset = 0;
        }
	    if($nextpage > $pagesum){
        	$nextpage = $pagesum;
        }
        $this->db->select('tb_yuangong.yuangongbianhao, tb_bumen.bumenming, tb_yuangong.xingming, tb_yuangong.zhiwei, tb_yuangong.zhuangtai');
        $this->db->from('tb_yuangong');
        $this->db->join('tb_bumen', 'tb_yuangong.bumenbianhao = tb_bumen.bumenbianhao','left');
        $this->db->order_by("tb_yuangong.yuangongbianhao", "asc"); 
        $this->db->limit($this->percount,$nowoffset);
		$query = $this->db->get();
		$data['info'] = $query->result_array();
		$data['pagesum'] = $pagesum;
		$data['nowpage'] = $nextpage;
		$data['yuangong']= site_url("su/yuangong/");
		$data['edit'] = site_url("su/yuangong/edit/");
		$data['delete'] = site_url("su/yuangong/delete/");
		$data['jinyong'] = site_url("su/yuangong/jinyong/");
		$data['yuangonginfo'] = site_url("su/yuangong/getdetails/");
		echo $this->JSON($data);
	}
	
	
	//根据nextpage和searchword限制查找数据库，并返回JSON形式的结果
	private function getSearchJSON($nextpage, $searchword)
	{
		if($nextpage < 1){
        	$nextpage = 1;
        }
		$nowoffset = ($nextpage-1)*$this->percount;
		$this->db->select('tb_yuangong.yuangongbianhao, tb_bumen.bumenming, tb_yuangong.xingming, tb_yuangong.zhiwei, tb_yuangong.zhuangtai');
        $this->db->from('tb_yuangong');
        $this->db->join('tb_bumen', 'tb_yuangong.bumenbianhao = tb_bumen.bumenbianhao','left');
        $this->db->where('tb_yuangong.yuangongbianhao =', $searchword);
        $this->db->or_where('tb_yuangong.xingming =', $searchword);
        $this->db->order_by("tb_yuangong.yuangongbianhao", "asc"); 
        $count = $this->db->count_all_results();
        $pagesum = intval(($count-1)/$this->percount)+1;
	    if($nowoffset >= $count){
        	$nowoffset = ($nextpage-2)*$this->percount;
        }
	    if($nowoffset < 0){
        	$nowoffset = 0;
        }
	    if($nextpage > $pagesum){
        	$nextpage = $pagesum;
        }
        $this->db->select('tb_yuangong.yuangongbianhao, tb_bumen.bumenming, tb_yuangong.xingming, tb_yuangong.zhiwei, tb_yuangong.zhuangtai');
        $this->db->from('tb_yuangong');
        $this->db->join('tb_bumen', 'tb_yuangong.bumenbianhao = tb_bumen.bumenbianhao','left');
        $this->db->where('tb_yuangong.yuangongbianhao =', $searchword);
        $this->db->or_where('tb_yuangong.xingming =', $searchword);
        $this->db->order_by("tb_yuangong.yuangongbianhao", "asc"); 
        $this->db->limit($this->percount,$nowoffset);
		$query = $this->db->get();
		$data['info'] = $query->result_array();
		$data['pagesum'] = $pagesum;
		$data['nowpage'] = $nextpage;
		$data['yuangong']= site_url("su/yuangong/");
		$data['edit'] = site_url("su/yuangong/edit/");
		$data['delete'] = site_url("su/yuangong/delete/");
		$data['jinyong'] = site_url("su/yuangong/jinyong/");
		$data['yuangonginfo'] = site_url("su/yuangong/getdetails/");
		echo $this->JSON($data);   
	}
	
	//根据nextpage和bumenno限制查找数据库，并返回JSON形式的结果
	private function getSelectJSON($nextpage, $bumenno)
	{
	    if($nextpage < 1){
        	$nextpage = 1;
        }
		$nowoffset = ($nextpage-1)*$this->percount;
		$this->db->select('tb_yuangong.yuangongbianhao, tb_bumen.bumenming, tb_yuangong.xingming, tb_yuangong.zhiwei, tb_yuangong.zhuangtai');
        $this->db->from('tb_yuangong');
        $this->db->join('tb_bumen', 'tb_yuangong.bumenbianhao = tb_bumen.bumenbianhao','left');
        $this->db->where('tb_yuangong.bumenbianhao =', $bumenno);
        $count = $this->db->count_all_results();
        $pagesum = intval(($count-1)/$this->percount)+1;
	    if($nowoffset >= $count){
        	$nowoffset = ($nextpage-2)*$this->percount;
        }
	    if($nowoffset < 0){
        	$nowoffset = 0;
        }
        if($nextpage > $pagesum){
        	$nextpage = $pagesum;
        }
        $this->db->select('tb_yuangong.yuangongbianhao, tb_bumen.bumenming, tb_yuangong.xingming, tb_yuangong.zhiwei, tb_yuangong.zhuangtai');
        $this->db->from('tb_yuangong');
        $this->db->join('tb_bumen', 'tb_yuangong.bumenbianhao = tb_bumen.bumenbianhao','left');
        $this->db->where('tb_yuangong.bumenbianhao =', $bumenno);
        $this->db->limit($this->percount,$nowoffset);
        $this->db->order_by("tb_yuangong.yuangongbianhao", "asc"); 
		$query = $this->db->get();
		$data['info'] = $query->result_array();
		$data['pagesum'] = $pagesum;
		$data['nowpage'] = $nextpage;
		$data['yuangong']= site_url("su/yuangong/");
		$data['edit'] = site_url("su/yuangong/edit/");
		$data['delete'] = site_url("su/yuangong/delete/");
		$data['jinyong'] = site_url("su/yuangong/jinyong/");
		$data['yuangonginfo'] = site_url("su/yuangong/getdetails/");
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
	
	private function JSON($array) 
	{
	    $this->arrayRecursive($array, 'urlencode', true);
	    $json = json_encode($array);
	    return urldecode($json);
    }

    //显示员工的报销路径。
    //如果员工在tb_baoxiaolujing表里有，则显示此员工的报销路径
    //如果没有，则查询此员工所属的部门，显示当前部门的报销路径
    public function baoxiao($yuangongno)
    {
		$this->db->where('yuangongbianhao',$yuangongno);
		$query = $this->db->get('tb_baoxiaolujing');
		$resultnum = $query->num_rows();
		if($resultnum > 0){
			$this->baoxiaoview("", $yuangongno);
		} else {
			$this->db->where('yuangongbianhao',$yuangongno);
			$this->db->select('bumenbianhao');
			$query= $this->db->get('tb_yuangong');
			$result = $query->row();
			$bumenno = $result->bumenbianhao;
			$this->baoxiaoview($bumenno,$yuangongno);
		}
    }
    
    private function baoxiaoview($bumenno,$yuangongno)
    {
    	$data['bumenno'] = $bumenno;
    	$data['yuangongno'] = $yuangongno;
		
    	if($bumenno != ""){
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
		        $this->load->view('su/ybaoxiao_view',$data);
		        $this->load->view('su/footer');
			} else {
				$this->load->view('su/header');
			    $this->load->view('su/navbar');
		        $this->load->view('su/baoxiao_error',$data);
		        $this->load->view('su/footer');
		        
			}
		
    	} elseif ($bumenno == ""){
	    	$this->db->where('yuangongbianhao',$yuangongno);
			$this->db->order_by("jinexiaxian", "asc");
			$query = $this->db->get('tb_baoxiaolujing');
			$data['baoxiao'] = $query->result_array();
			$data['yuangongno'] = $yuangongno;
			$count = count($data['baoxiao']);
    	if($count > 0 ){
				foreach ($data['baoxiao'] as $key=>$baoxiao){
					$this->db->select('tb_yuangong.xingming, tb_yuangong.yuangongbianhao, tb_yuangong.zhiwei');
					$this->db->from('tb_baoxiaolujing');
					$this->db->join('tb_yuangong', 'tb_baoxiaolujing.shenpiren1 = tb_yuangong.yuangongbianhao');
					$this->db->where('tb_baoxiaolujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
					
					$this->db->select('tb_yuangong.xingming, tb_yuangong.yuangongbianhao, tb_yuangong.zhiwei');
					$this->db->from('tb_baoxiaolujing');
					$this->db->join('tb_yuangong', 'tb_baoxiaolujing.shenpiren2 = tb_yuangong.yuangongbianhao');
					$this->db->where('tb_baoxiaolujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
					
					$this->db->select('tb_yuangong.xingming, tb_yuangong.yuangongbianhao, tb_yuangong.zhiwei');
					$this->db->from('tb_baoxiaolujing');
					$this->db->join('tb_yuangong', 'tb_baoxiaolujing.shenpiren3 = tb_yuangong.yuangongbianhao');
					$this->db->where('tb_baoxiaolujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
					
					$this->db->select('tb_yuangong.xingming, tb_yuangong.yuangongbianhao, tb_yuangong.zhiwei');
					$this->db->from('tb_baoxiaolujing');
					$this->db->join('tb_yuangong', 'tb_baoxiaolujing.shenpiren4 = tb_yuangong.yuangongbianhao');
					$this->db->where('tb_baoxiaolujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
					
					$this->db->select('tb_yuangong.xingming, tb_yuangong.yuangongbianhao, tb_yuangong.zhiwei');
					$this->db->from('tb_baoxiaolujing');
					$this->db->join('tb_yuangong', 'tb_baoxiaolujing.shenpiren5 = tb_yuangong.yuangongbianhao');
					$this->db->where('tb_baoxiaolujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
					
					$this->db->select('tb_yuangong.xingming, tb_yuangong.yuangongbianhao, tb_yuangong.zhiwei');
					$this->db->from('tb_baoxiaolujing');
					$this->db->join('tb_yuangong', 'tb_baoxiaolujing.shenpiren6 = tb_yuangong.yuangongbianhao');
					$this->db->where('tb_baoxiaolujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
				}
				
				$this->load->view('su/header');
			    $this->load->view('su/navbar');
		        $this->load->view('su/ybaoxiao_view',$data);
		        $this->load->view('su/footer');
			} else {
				/*
				$this->db->not_like('zhiwei', '普通员工');
				$this->db->select('zhiwei');
				$this->db->group_by('zhiwei');
				$query = $this->db->get('tb_yuangong');
				$data['zhiweis'] = $query->result_array();
				$this->load->view('su/header');
			    $this->load->view('su/navbar');
		        $this->load->view('su/baoxiao_add1',$data);
		        $this->load->view('su/footer');
		        */
			}
    	}
    }
    
    public function editbaoxiao($yuangongno)
    {
    		$data['yuangongno'] = $yuangongno;
			$this->db->not_like('zhiwei', '普通员工');
			$this->db->select('zhiwei');
			$this->db->group_by('zhiwei');
			$query = $this->db->get('tb_yuangong');
			$data['zhiweis'] = $query->result_array();
			$this->load->view('su/header');
		    $this->load->view('su/navbar');
	        $this->load->view('su/ybaoxiao_add1',$data);
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
	
	public function addbaoxiao()
	{
		$yuangongno = isset($_REQUEST['yuangongbianhao'])?$_REQUEST['yuangongbianhao']:"";
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
    		'yuangongbianhao' => $yuangongno,
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
        	$this->db->where('yuangongbianhao', $yuangongno);
        	$this->db->delete('tb_baoxiaolujing');
        }
        if($this->db->insert('tb_baoxiaolujing', $insertdata)){
	        if($baoxiaonum > 0 && $baoxiaonum < 6){
	        	$biaoxiao = $baoxiaonum + 1;
	        	$data['yuangongno'] = $yuangongno;
	        	$this->db->not_like('zhiwei', '普通员工');
	        	$this->db->group_by('zhiwei');
				$this->db->select('zhiwei');
				$query = $this->db->get('tb_yuangong');
				$data['zhiweis'] = $query->result_array();
				
	        	//上一级选择的审批人
				$this->db->where('yuangongbianhao', $yuangongno);
			    $this->db->where('jineshangxian', $shaxian);
		        $query=$this->db->get('tb_baoxiaolujing');
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
		        //var_dump($data);
		        //exit;
				$this->load->view('su/header');
			    $this->load->view('su/navbar');
		        $this->load->view("su/ybaoxiao_add{$biaoxiao}" ,$data);
		        $this->load->view('su/footer');
	        }
	        
	        if( $baoxiaonum == 6){
	        	redirect('su/yuangong/index/');
	        }
        }
	}
}

?>