<?php
error_reporting(0);
class Kehu extends  CI_Controller
{
	   private $percount = 4;
	     
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
        $this->load->view('su/kehu_index',$data);
        $this->load->view('su/footer');
        
	}
	
	//加载首页要传递的数据
	private function getIndexData($nowpage){
		$nextpage = $nowpage+1;
		$nowoffset = ($nowpage -1)*$this->percount; //要查询的偏移位置
		$data['page']['rowsum'] = $this->db->count_all('tb_kehu');
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
		$this->db->order_by("kehubianhao", "asc"); 
        $this->db->limit($this->percount,$nowoffset);
		$query = $this->db->get('tb_kehu');
		$data['info'] = $query->result_array();
		return $data;
		
	}
	
	public  function checkadd()
	{
		$value = $_REQUEST['value'];
		$this->db->where('kehubianhao',$value);
		$this->db->from('tb_kehu');
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
	    $this->load->view('su/kehu_add');
	    $this->load->view('su/footer');
	}
	
	public function doadd()
	{
//	    $this->form_validation->set_rules('kehuno', '员工编号', 'required|min_length[6]|max_length[8]|is_unique[tb_kehu.kehubianhao]');
//        $this->form_validation->set_rules('kehuname', '员工名称', 'required|min_length[1]|max_length[20]');
//        $this->form_validation->set_rules('kehubumen', '所属部门', 'required|min_length[1]|max_length[20]');
//        $this->form_validation->set_rules('kehupost', '职位', 'required|min_length[1]|max_length[20]');
//        $this->form_validation->set_rules('kehupsw', '登录密码', 'required|min_length[1]|max_length[10]');
//        $this->form_validation->set_rules('kehustatus', '账户状态', 'required|min_length[1]|max_length[1]');
//        
       		
/*	    if ($this->form_validation->run() == FALSE)
	    {
		    redirect('su/kehu/add/');
	    }
	    else
	    {*/
	    	$kehuno = isset($_REQUEST['kehuno'])?$_REQUEST['kehuno']:'';
	        $kehuname =isset($_REQUEST['kehuname'])?$_REQUEST['kehuname']:'';
	        $kaihuyinhang =isset($_REQUEST['kaihuyinhang'])?$_REQUEST['kaihuyinhang']:'';
	        $kaihuming =isset($_REQUEST['kaihuming'])?$_REQUEST['kaihuming']:'';
	        $zhanghao =isset($_REQUEST['zhanghao'])?$_REQUEST['zhanghao']:'';
	        $shuihao =isset($_REQUEST['shuihao'])?$_REQUEST['shuihao']:'';
	        $dizhi =isset($_REQUEST['dizhi'])?$_REQUEST['dizhi']:'';
	        $tel =isset($_REQUEST['tel'])?$_REQUEST['tel']:'';
	        $chuanzhen =isset($_REQUEST['chuanzhen'])?$_REQUEST['chuanzhen']:'';
	        $lianxiren =isset($_REQUEST['lianxiren'])?$_REQUEST['lianxiren']:'';

	    	$data = array(
		    	    'kehubianhao' => $kehuno,
	                'name' => $kehuname,
	                'kaihuyinhang' => $kaihuyinhang,
	    			'zhanghuming' => $kaihuming,
		    	    'yinhangzhanghao' => $zhanghao,
		    	    'shuihao' => $shuihao,
		    	    'dizhi' => $dizhi,
	    			'dianhua' => $tel,
	    			'chuanzhen'=>$chuanzhen,
	    			'lianxiren'=>$lianxiren,
            );
            $this->db->insert('tb_kehu', $data);
            
	      redirect('su/kehu/index/');
	    //}
	}
	
	public function delete()
	{
		header("Content-type:text/html; charset=GBK");
		$kehuno = $_REQUEST['kehubianhao'];
		$this->db->where('kehubianhao', $kehuno);
        $this->db->delete('tb_kehu');

        $nowpage = $_REQUEST['nowpage'];
		$type = $_REQUEST['type'];
		$searchword=iconv("UTF-8","GBK",$_REQUEST['searchword']);
		
		if($type=="index"){
			echo $this->getIndexJSON($nowpage);
	    } elseif($type=="search"){
		    echo $this->getSearchJSON($nowpage,$searchword);
	    }
	}

	//跳到修改界面
	public function edit($kehuno)
	{
		$this->db->where('kehubianhao',$kehuno);
		$query = $this->db->get('tb_kehu');
		$data['kehuinfo'] = $query->result_array();
        $data['isnorepeat'] = 0;
	    $num=$data['kehuinfo'][0]['kehubianhao'];
	    $newdata = array(
		    'old_kehuno' => $num,
		);
		$this->session->set_userdata($newdata);
		
        if(count($data['kehuinfo']) == 1 ){ 
            $this->load->view('su/header');
		    $this->load->view('su/navbar');
            $this->load->view('su/kehu_edit',$data);
            $this->load->view('su/footer');
        } else {
        	redirect('su/kehu/index/');
        }
		
	}
	public function checkedit()
	{
		$kehuno = isset($_REQUEST['kehuno'])?$_REQUEST['kehuno']:'';
		$old_kehuno = $this->session->userdata('old_kehuno');
		if($old_kehuno != $kehuno){
			$this->db->where('kehubianhao',$kehuno);
			$this->db->from('tb_kehu');
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
		//验证表单是否合法
		/*
	    $this->form_validation->set_rules('kehuno', '员工编号', 'required|min_length[6]|max_length[8]|[tb_kehu.kehubianhao]');
        $this->form_validation->set_rules('kehuname', '员工名称', 'required|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('kehubumen', '所属部门', 'required|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('kehupost', '职位', 'required|min_length[1]|max_length[20]');
        $this->form_validation->set_rules('kehupsw', '登录密码', 'required|min_length[1]|max_length[10]');
        $this->form_validation->set_rules('kehustatus', '账户状态', 'required|min_length[0]|max_length[1]');
		*/
    	$kehuno = isset($_REQUEST['kehuno'])?$_REQUEST['kehuno']:'';
        $kehuname =isset($_REQUEST['kehuname'])?$_REQUEST['kehuname']:'';
        $kaihuyinhang =isset($_REQUEST['kaihuyinhang'])?$_REQUEST['kaihuyinhang']:'';
        $kaihuming =isset($_REQUEST['kaihuming'])?$_REQUEST['kaihuming']:'';
        $zhanghao =isset($_REQUEST['zhanghao'])?$_REQUEST['zhanghao']:'';
        $shuihao =isset($_REQUEST['shuihao'])?$_REQUEST['shuihao']:'';
        $dizhi =isset($_REQUEST['dizhi'])?$_REQUEST['dizhi']:'';
        $tel =isset($_REQUEST['tel'])?$_REQUEST['tel']:'';
        $chuanzhen =isset($_REQUEST['chuanzhen'])?$_REQUEST['chuanzhen']:'';
        $lianxiren =isset($_REQUEST['lianxiren'])?$_REQUEST['lianxiren']:'';
		$old_kehuno = $this->session->userdata('old_kehuno');
        $data['kehuinfo'][0] = array(
	    	    'kehubianhao' => $kehuno,
                'name' => $kehuname,
                'kaihuyinhang' => $kaihuyinhang,
    			'zhanghuming' => $kaihuming,
	    	    'yinhangzhanghao' => $zhanghao,
	    	    'shuihao' => $shuihao,
	    	    'dizhi' => $dizhi,
    			'dianhua' => $tel,
    			'chuanzhen'=>$chuanzhen,
    			'lianxiren'=>$lianxiren,
	    );
	    $data['isnorepeat'] = 0;
		
		//在员工编号改变时再做判断
		if($old_kehuno != $kehuno){
			$this->db->where('kehubianhao', $kehuno);
			$query = $this->db->get('tb_kehu');
			$result['kehuinfo'] = $query->result_array();
			if(count($result['kehuinfo']) == 1 ){
				$data['isnorepeat'] = 1; //员工编号有重复
				$this->load->view('su/header');
				$this->load->view('su/navbar');
				$this->load->view('su/kehu_edit',$data);
				$this->load->view('su/footer');
				return;
			}
		}
/*	    
		if ($this->form_validation->run() == FALSE){ //输入的数据不合法
	        $this->load->view('su/header');
		    $this->load->view('su/navbar');
	        $this->load->view('su/kehu_edit',$data);
	        $this->load->view('su/footer');
	        return;
	    } else
	    {
	    */
		  //var_dump($old_kehuno);
		
          $this->db->where('kehubianhao', $old_kehuno);
          $this->db->update('tb_kehu', $data['kehuinfo'][0]);
//          var_dump($data);
//          exit;
           // $this->db->insert('tb_kehu', $data);
	       // $this->load->view('su/kehu_index');
	       //更新后在返回
	       redirect('su/kehu/index/');
	    //}	
	}
	
	public function searchkehu()
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
		$searchword=iconv("UTF-8","GBK",$_REQUEST['searchword']);
		
		if($type=="index"){
			echo $this->getIndexJSON($nextpage);
	    } elseif($type=="search"){
		    echo $this->getSearchJSON($nextpage,$searchword);
		}
	}
	
	
	public function getdetails($kehuno)
	{
		$this->db->where("kehubianhao", $kehuno);
		$query = $this->db->get('tb_kehu');
		$data['info'] = $query->result_array();
		$this->load->view('su/header');
		$this->load->view('su/navbar');
        $this->load->view('su/kehu_view',$data);
        $this->load->view('su/footer');
	}
	
	private function getIndexJSON($nextpage)
	{
		if($nextpage < 1){
        	$nextpage = 1;
        }
		$nowoffset = ($nextpage-1)*$this->percount;
        $count = $this->db->count_all('tb_kehu');
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
        
        $this->db->order_by("kehubianhao", "asc"); 
        $this->db->limit($this->percount,$nowoffset);
		$query = $this->db->get('tb_kehu');
		$data['info'] = $query->result_array();
		$data['pagesum'] = $pagesum;
		$data['nowpage'] = $nextpage;
		$data['kehu']= site_url("su/kehu/");
		$data['edit'] = site_url("su/kehu/edit/");
		$data['delete'] = site_url("su/kehu/delete/");
		$data['kehuinfo'] = site_url("su/kehu/getdetails/");
		echo $this->JSON($data);
	}
	
	
	//根据nextpage和searchword限制查找数据库，并返回JSON形式的结果
	private function getSearchJSON($nextpage, $searchword)
	{
		if($nextpage < 1){
        	$nextpage = 1;
        }
		$nowoffset = ($nextpage-1)*$this->percount;
        $this->db->like('kehubianhao', $searchword);
        $this->db->or_like('name', $searchword);
        $count = $this->db->count_all_results('tb_kehu');
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
        $this->db->like('kehubianhao', $searchword);
        $this->db->or_like('name', $searchword);
        $this->db->order_by("kehubianhao", "asc");
        $this->db->limit($this->percount,$nowoffset);
		$query = $this->db->get('tb_kehu');
		$data['info'] = $query->result_array();
		$data['pagesum'] = $pagesum;
		$data['nowpage'] = $nextpage;
		$data['kehu']= site_url("su/kehu/");
		$data['edit'] = site_url("su/kehu/edit/");
		$data['delete'] = site_url("su/kehu/delete/");
		$data['kehuinfo'] = site_url("su/kehu/getdetails/");
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
    public function baoxiao($kehuno)
    {
		$this->db->where('kehubianhao',$kehuno);
		$query = $this->db->get('tb_baoxiaolujing');
		$resultnum = $query->num_rows();
		if($resultnum > 0){
			$this->baoxiaoview("", $kehuno);
		} else {
			$this->db->where('kehubianhao',$kehuno);
			$this->db->select('bumenbianhao');
			$query= $this->db->get('tb_kehu');
			$result = $query->row();
			$bumenno = $result->bumenbianhao;
			$this->baoxiaoview($bumenno,$kehuno);
		}
    }
    
    private function baoxiaoview($bumenno,$kehuno)
    {
    	$data['bumenno'] = $bumenno;
    	$data['kehuno'] = $kehuno;
		
    	if($bumenno != ""){
	    	$this->db->where('bumenbianhao',$bumenno);
			$this->db->order_by("jinexiaxian", "asc");
			$query = $this->db->get('tb_bumenlujing');
			$data['baoxiao'] = $query->result_array();
			$data['bumenno'] = $bumenno;
			$count = count($data['baoxiao']);
			
	    	if($count > 0 ){
				foreach ($data['baoxiao'] as $key=>$baoxiao){
					$this->db->select('tb_kehu.xingming, tb_kehu.kehubianhao, tb_kehu.zhiwei');
					$this->db->from('tb_bumenlujing');
					$this->db->join('tb_kehu', 'tb_bumenlujing.shenpiren1 = tb_kehu.kehubianhao');
					$this->db->where('tb_bumenlujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
					
					$this->db->select('tb_kehu.xingming, tb_kehu.kehubianhao, tb_kehu.zhiwei');
					$this->db->from('tb_bumenlujing');
					$this->db->join('tb_kehu', 'tb_bumenlujing.shenpiren2 = tb_kehu.kehubianhao');
					$this->db->where('tb_bumenlujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
					
					$this->db->select('tb_kehu.xingming, tb_kehu.kehubianhao, tb_kehu.zhiwei');
					$this->db->from('tb_bumenlujing');
					$this->db->join('tb_kehu', 'tb_bumenlujing.shenpiren3 = tb_kehu.kehubianhao');
					$this->db->where('tb_bumenlujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
					
					$this->db->select('tb_kehu.xingming, tb_kehu.kehubianhao, tb_kehu.zhiwei');
					$this->db->from('tb_bumenlujing');
					$this->db->join('tb_kehu', 'tb_bumenlujing.shenpiren4 = tb_kehu.kehubianhao');
					$this->db->where('tb_bumenlujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
					
					$this->db->select('tb_kehu.xingming, tb_kehu.kehubianhao, tb_kehu.zhiwei');
					$this->db->from('tb_bumenlujing');
					$this->db->join('tb_kehu', 'tb_bumenlujing.shenpiren5 = tb_kehu.kehubianhao');
					$this->db->where('tb_bumenlujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
					
					$this->db->select('tb_kehu.xingming, tb_kehu.kehubianhao, tb_kehu.zhiwei');
					$this->db->from('tb_bumenlujing');
					$this->db->join('tb_kehu', 'tb_bumenlujing.shenpiren6 = tb_kehu.kehubianhao');
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
	    	$this->db->where('kehubianhao',$kehuno);
			$this->db->order_by("jinexiaxian", "asc");
			$query = $this->db->get('tb_baoxiaolujing');
			$data['baoxiao'] = $query->result_array();
			$data['kehuno'] = $kehuno;
			$count = count($data['baoxiao']);
    	if($count > 0 ){
				foreach ($data['baoxiao'] as $key=>$baoxiao){
					$this->db->select('tb_kehu.xingming, tb_kehu.kehubianhao, tb_kehu.zhiwei');
					$this->db->from('tb_baoxiaolujing');
					$this->db->join('tb_kehu', 'tb_baoxiaolujing.shenpiren1 = tb_kehu.kehubianhao');
					$this->db->where('tb_baoxiaolujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
					
					$this->db->select('tb_kehu.xingming, tb_kehu.kehubianhao, tb_kehu.zhiwei');
					$this->db->from('tb_baoxiaolujing');
					$this->db->join('tb_kehu', 'tb_baoxiaolujing.shenpiren2 = tb_kehu.kehubianhao');
					$this->db->where('tb_baoxiaolujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
					
					$this->db->select('tb_kehu.xingming, tb_kehu.kehubianhao, tb_kehu.zhiwei');
					$this->db->from('tb_baoxiaolujing');
					$this->db->join('tb_kehu', 'tb_baoxiaolujing.shenpiren3 = tb_kehu.kehubianhao');
					$this->db->where('tb_baoxiaolujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
					
					$this->db->select('tb_kehu.xingming, tb_kehu.kehubianhao, tb_kehu.zhiwei');
					$this->db->from('tb_baoxiaolujing');
					$this->db->join('tb_kehu', 'tb_baoxiaolujing.shenpiren4 = tb_kehu.kehubianhao');
					$this->db->where('tb_baoxiaolujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
					
					$this->db->select('tb_kehu.xingming, tb_kehu.kehubianhao, tb_kehu.zhiwei');
					$this->db->from('tb_baoxiaolujing');
					$this->db->join('tb_kehu', 'tb_baoxiaolujing.shenpiren5 = tb_kehu.kehubianhao');
					$this->db->where('tb_baoxiaolujing.lujingbianhao',$baoxiao['lujingbianhao']);
					$query = $this->db->get();
					$data['shenpiren'][$key][] = $query->result_array();
					
					$this->db->select('tb_kehu.xingming, tb_kehu.kehubianhao, tb_kehu.zhiwei');
					$this->db->from('tb_baoxiaolujing');
					$this->db->join('tb_kehu', 'tb_baoxiaolujing.shenpiren6 = tb_kehu.kehubianhao');
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
				$query = $this->db->get('tb_kehu');
				$data['zhiweis'] = $query->result_array();
				$this->load->view('su/header');
			    $this->load->view('su/navbar');
		        $this->load->view('su/baoxiao_add1',$data);
		        $this->load->view('su/footer');
		        */
			}
    	}
    }
    
    public function editbaoxiao($kehuno)
    {
    		$data['kehuno'] = $kehuno;
			$this->db->not_like('zhiwei', '普通员工');
			$this->db->select('zhiwei');
			$this->db->group_by('zhiwei');
			$query = $this->db->get('tb_kehu');
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
	    $this->db->select('xingming, kehubianhao');
	    $query = $this->db->get('tb_kehu');
		$data['kehu'] = $query->result_array();
	    echo $this->JSON($data);
	}
	
	public function addbaoxiao()
	{
		$kehuno = isset($_REQUEST['kehubianhao'])?$_REQUEST['kehubianhao']:"";
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
    		'kehubianhao' => $kehuno,
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
        	$this->db->where('kehubianhao', $kehuno);
        	$this->db->delete('tb_baoxiaolujing');
        }
        if($this->db->insert('tb_baoxiaolujing', $insertdata)){
	        if($baoxiaonum > 0 && $baoxiaonum < 6){
	        	$biaoxiao = $baoxiaonum + 1;
	        	$data['kehuno'] = $kehuno;
	        	$this->db->not_like('zhiwei', '普通员工');
	        	$this->db->group_by('zhiwei');
				$this->db->select('zhiwei');
				$query = $this->db->get('tb_kehu');
				$data['zhiweis'] = $query->result_array();
				$this->load->view('su/header');
			    $this->load->view('su/navbar');
		        $this->load->view("su/ybaoxiao_add{$biaoxiao}" ,$data);
		        $this->load->view('su/footer');
	        }
	        if( $baoxiaonum == 6){
	        	redirect('su/kehu/index/');
	        }
        }
	}
}

?>