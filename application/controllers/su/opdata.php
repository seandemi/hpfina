<?php
class Opdata extends CI_Controller
{
	private $percount = "10";
	
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
		
	}
	
	public function backupv()
	{
		$this->load->view('su/header');
		$this->load->view('su/navbar');
        $this->load->view('su/backup');
        $this->load->view('su/footer');	
	}
	
	public function restorev()
	{
		header("Content-type:text/html; charset=GBK");	
		$data = $this->getIndexData('1','html');
		
		$this->load->view('su/header');
		$this->load->view('su/navbar');
        $this->load->view('su/restore',$data);
        $this->load->view('su/footer');	
	}
	
	private function getIndexData($nowpage,$type)
	{
		$nextpage = $nowpage+1;
		$nowoffset = ($nowpage -1)*$this->percount; //Ҫ��ѯ��ƫ��λ��
 
		$filedir = BASEPATH.'database/backup';
		$result = $this->showFile($filedir);
		if($result == ""){
			$data['backupfile']['file'] = array();
		} else {
			foreach ($result as $key=>$filename){
				if($key >= $nowoffset && $key < $nowoffset + $this->percount){
					$data['backupfile']['file'][]= $filename;
				}
			}
		}
		$data['page']['rowsum'] = count($result);
		$data['page']['nowpage'] = $nowpage;
		$data['page']['nextpage'] = $nowpage+1;
		$data['page']['prepage'] = $nowpage-1;
		if($data['page']['prepage'] < 1){
		    $data['page']['prepage'] = 1;
		}
		$data['page']['pagesum'] = intval(($data['page']['rowsum']-1)/$this->percount)+1; //��ҳ��
        if($data['page']['pagesum'] < $data['page']['nextpage'])
     	{
		    $data['page']['nextpage'] = $data['page']['pagesum'];
        }
		$data['delete'] = site_url("su/opdata/delete");
		$data['restore'] = site_url("su/opdata/restore");
		if($type == "html"){		
			return $data;
		} elseif($type == "json"){
			return json_encode($data);
		}
	}
    public function backup()
 	{
 
		$this->load->dbutil();
		 
		$this->load->helper('file');
		 
		$prefs = array(
		                'tables'      => array(),  // �������豸�ݵı���������.
		                'ignore'      => array(),           // ����ʱ��Ҫ�����Եı�
		                'format'      => 'txt',             // gzip, zip, txt
		                'filename'    => 'mybackup.sql',    // �ļ��� - ���ѡ����ZIPѹ��,������Ǳ����
		                'add_drop'    => TRUE,              // �Ƿ�Ҫ�ڱ����ļ������ DROP TABLE ���
		                'add_insert'  => TRUE,              // �Ƿ�Ҫ�ڱ����ļ������ INSERT ���
		                'newline'     => "\n"               // �����ļ��еĻ��з�
		              );
		 
		$backup = $this->dbutil->backup($prefs);
		$sql = time();
		$file = $sql.".sql";
		$filename = BASEPATH.'database/backup/'.$sql.'.sql';
		$json = array(
			'result' => "1",
		);
	 	if(write_file($filename, $backup)){
		 	/*
			 * �ѱ��ݵ����ݿ���Ϣ���뵽������
			 */
			/*
			$data= array(
				'time' => $sql,
				'file' => $file,
			);
			$this->db->insert('tb_dbbackup',$data);
			*/
			$json['result'] = "0";
	 	}
	 	
	 	$result = json_encode($json);
	 	echo $result;
	}
	
	
	
	function restore(){
	 
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:"0";
		$this->load->helper('file');
		$filename = $id.".sql";
		$file = BASEPATH."database/backup/".$filename;
		$content = read_file($file);
		$content = preg_replace("/#(.*)\s#(.*)TABLE(.*)(.*)\s#/i","",$content);//ȥ��ע�Ͳ���
		$host = $this->db->hostname;
		$user = $this->db->username;
		$psw = $this->db->password;
		$db = $this->db->database;
		$json = array(
			'result' => "0",
		);		
		$conn=mysql_connect($host, $user, $psw);//ָ�����ݿ����Ӳ���
		if(!$conn){
			$json['result'] = "1";
		}
		if(!mysql_select_db($db,$conn)){
			$json['result'] = "1";	
		}
		$sqls = explode(";\n",$content);
		mysql_query("set names 'gbk'");
		foreach($sqls as $sql){
	    	mysql_query($sql,$conn);
		}
		mysql_close($conn);
		$result = json_encode($json);
		echo $result;
	}
	public function nextpage()
	{
	    header("Content-type:text/html; charset=GBK");
		$nextpage = $_REQUEST['nextpage'];
		echo $this->getIndexData($nextpage,'json');
	}
	public function delete(){
		header("Content-type:text/html; charset=GBK");
		$id = $_REQUEST['bianhao'];
        $filename = $id.".sql";
		$file = BASEPATH."database/backup/".$filename;
		unlink($file);
        $nowpage = $_REQUEST['nowpage'];
		echo $this->getIndexData($nowpage,'json');
	}
	
	
	private function showFile( $filedir ) {
		//��Ŀ¼
		$handle = opendir($filedir);
		//�г�Ŀ¼�е��ļ�
		$filenames = array();
		while ($file = readdir($handle))
		{
		  	if($file != "." && $file != ".."){
		     if(!is_dir($filedir."/".$file)){
			       $filenames[] = $file;
			  }
		 	}
		  }
		 closedir($handle);
		 
		 if(count($filenames) == 0){
		 	return "";
		 }
		 if(rsort($filenames)){
			return $filenames;
		 }
	}
	
}