<?php
class Baoxiaodan extends  CI_Controller
{     
 public function __construct()
       {
          parent::__construct();
           $this->load->helper('url');
           $this->load->library('session');
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
	 	 redirect('login/index/');
		}
    else {
    	        $top=array();
    	        $basic=array();
				$top['xingming']= $username;
				$sql="SELECT A.bumenbianhao,B.bumenming  from tb_yuangong as A , tb_bumen as B where a.bumenbianhao=B.bumenbianhao and a.yuangongbianhao='$yuangongbianhao'";		
			    $query=$this->db->query($sql);
				  $result=$query->result_array();				  
				   foreach ( $result as $row)
						{
							$basic['bumenming']=$row['bumenming'];
							$bianhao=$row['bumenbianhao'];
							$basic['bumenbianhao']=$row['bumenbianhao'];							
						}				
				$sql="select bumenbianhao,bumenming  from  tb_bumen where bumenbianhao !='$bianhao'";		
			     $query=$this->db->query($sql);
				 $basic['bumen']=$query->result_array();
				 $sql="select name  from  tb_bizhong order by id asc";		
			     $query=$this->db->query($sql);
				 $basic['huobi']=$query->result_array();				 
				 $sql="select name  from  tb_tongyongxiangqing order by id asc";		
			     $query=$this->db->query($sql);
				 $basic['tongyongxiangqing']=$query->result_array();
				 $sql="select kehubianhao,name  from  tb_kehu";		
			     $query=$this->db->query($sql);
				 $basic['keh']=$query->result_array();
				 $basic['xingming'] =  $username; 
				$basic['yuangongbianhao']=$yuangongbianhao;
				$data['top']=$top;
		        $data['basic']=$basic;	  
              $this->load->view('baoxiaodan/submit',$data);
		}
}  

function get_huilv(){
    header("Content-type:text/html; charset=GBK");
	$name=iconv("UTF-8","GBK",$_POST['huilvname']);
	$sql="select huilv  from  tb_bizhong where name = '$name'";		
	$query=$this->db->query($sql);
	$result=$query->result_array();
    $huilv=$result[0]['huilv'];
    echo "$huilv";	
}

function get_butie(){
    header("Content-type:text/html; charset=GBK");
    $jibie=$this->session->userdata('jibie');
    $mudi=$_POST['mudi'];
    $jine=$_POST['jine'];
    $day=$_POST['day'];
    if($mudi==1){
    	$sql="select jine1 as money  from  tb_chailcbutie where jibie ='$jibie'";	
    }
    else if($mudi==2){
    	$sql="select jine2 as money  from  tb_chailcbutie where jibie ='$jibie'";	
    }
    else {
    	$sql="select jine3 as money  from  tb_chailcbutie where jibie ='$jibie'";	
    }
    $query=$this->db->query($sql);
	$resu=$query->result_array();
//	print_r($resu);
    $money=$resu[0]['money']; 
   if(($money*$day)>=$jine){
   	    echo "success";	
   }
   else {
   	 echo "failure";	
   }
}

//处理报销单数据
function check_data(){
$username=$this->session->userdata('name');
$yuangongbianhao=$this->session->userdata('yuangongbianhao');
$jibie=$this->session->userdata('jibie');
	if (empty($username)&&empty($yuangongbianhao)) {					
	 	 redirect('login/index/');
		}
    else {
	    $customer_type=$_POST['customer_type'];
	    $bumen=$_POST['bumen'];
	    $leibie=$_POST['leibie'];
	    $zongjine=trim($_POST['zongjine']);
	    $remark=$_POST['remark'];
	    $yusuan=$_REQUEST['yusuan'];
	    $bumen=$_POST['bumen'];
        $time= date("Y-m-d H:i:s"); 
        $time2= date("y-m-d-H-i");
        $baoxiaobianhao= str_replace('-','', $time2).$yuangongbianhao;
        $baoxiao_sql="select count(*) as number from tb_baoxiaolujing where yuangongbianhao='$yuangongbianhao'"; 
		$query=$this->db->query($baoxiao_sql);		
        $rownuber=@$query->result_array();
        if($rownuber[0]['number']){
          $sql="SELECT B.xingming,B.email,B.yuangongbianhao ,a.lujingbianhao  from tb_baoxiaolujing as A ,tb_yuangongxiangqing as B where a.shenpiren1=B.yuangongbianhao and A.yuangongbianhao= '$yuangongbianhao' and A.jinexiaxian <=  $zongjine and A.jineshangxian >=  $zongjine
                union all 
                SELECT B.xingming,B.email,B.yuangongbianhao ,a.lujingbianhao  from tb_baoxiaolujing as A ,tb_yuangongxiangqing as B where a.shenpiren2=B.yuangongbianhao and A.yuangongbianhao= '$yuangongbianhao' and A.jinexiaxian <=  $zongjine and A.jineshangxian >=  $zongjine  
                union all 
                SELECT B.xingming,B.email,B.yuangongbianhao ,a.lujingbianhao  from tb_baoxiaolujing as A ,tb_yuangongxiangqing as B where a.shenpiren3=B.yuangongbianhao and A.yuangongbianhao= '$yuangongbianhao' and A.jinexiaxian <=  $zongjine and A.jineshangxian >=  $zongjine  
                union all 
                SELECT B.xingming,B.email,B.yuangongbianhao ,a.lujingbianhao  from tb_baoxiaolujing as A ,tb_yuangongxiangqing as B where a.shenpiren4=B.yuangongbianhao and A.yuangongbianhao= '$yuangongbianhao' and A.jinexiaxian <=  $zongjine and A.jineshangxian >=  $zongjine  
                union all 
                SELECT B.xingming,B.email,B.yuangongbianhao ,a.lujingbianhao  from tb_baoxiaolujing as A ,tb_yuangongxiangqing as B where a.shenpiren5=B.yuangongbianhao and A.yuangongbianhao= '$yuangongbianhao' and A.jinexiaxian <=  $zongjine and A.jineshangxian >=  $zongjine  
                union all 
                SELECT B.xingming,B.email,B.yuangongbianhao ,a.lujingbianhao  from tb_baoxiaolujing as A ,tb_yuangongxiangqing as B where a.shenpiren6=B.yuangongbianhao and A.yuangongbianhao= '$yuangongbianhao' and A.jinexiaxian <=  $zongjine and A.jineshangxian >=  $zongjine  
                ";
           $query=$this->db->query( $sql);
           $count =$query->num_rows();
           $get_tijiao=$query->result_array();
           if(($count==1)&&($get_tijiao[0]['yuangongbianhao']==$yuangongbianhao)){
                $sql="SELECT B.xingming,B.email,B.yuangongbianhao ,a.lujingbianhao  from tb_baoxiaolujing as A ,tb_yuangongxiangqing as B where a.shenpiren1=B.yuangongbianhao and a.lujingbianhao =(select lujingbianhao from  tb_baoxiaolujing where jinexiaxian =(select min(jinexiaxian) from  tb_baoxiaolujing where tb_baoxiaolujing.jinexiaxian > $zongjine  and  tb_baoxiaolujing.yuangongbianhao= '$yuangongbianhao')   and  tb_baoxiaolujing.yuangongbianhao= '$yuangongbianhao')  and A.yuangongbianhao= '$yuangongbianhao' 
                union all 
               SELECT B.xingming,B.email,B.yuangongbianhao ,a.lujingbianhao  from tb_baoxiaolujing as A ,tb_yuangongxiangqing as B where a.shenpiren2=B.yuangongbianhao and a.lujingbianhao =(select lujingbianhao from  tb_baoxiaolujing where jinexiaxian =(select min(jinexiaxian) from  tb_baoxiaolujing where tb_baoxiaolujing.jinexiaxian > $zongjine  and  tb_baoxiaolujing.yuangongbianhao= '$yuangongbianhao')   and  tb_baoxiaolujing.yuangongbianhao= '$yuangongbianhao')  and A.yuangongbianhao= '$yuangongbianhao' 
                union all 
               SELECT B.xingming,B.email,B.yuangongbianhao ,a.lujingbianhao  from tb_baoxiaolujing as A ,tb_yuangongxiangqing as B where a.shenpiren3=B.yuangongbianhao and a.lujingbianhao =(select lujingbianhao from  tb_baoxiaolujing where jinexiaxian =(select min(jinexiaxian) from  tb_baoxiaolujing where tb_baoxiaolujing.jinexiaxian > $zongjine  and  tb_baoxiaolujing.yuangongbianhao= '$yuangongbianhao')   and  tb_baoxiaolujing.yuangongbianhao= '$yuangongbianhao')  and A.yuangongbianhao= '$yuangongbianhao' 
                 union all 
               SELECT B.xingming,B.email,B.yuangongbianhao ,a.lujingbianhao  from tb_baoxiaolujing as A ,tb_yuangongxiangqing as B where a.shenpiren4=B.yuangongbianhao and a.lujingbianhao =(select lujingbianhao from  tb_baoxiaolujing where jinexiaxian =(select min(jinexiaxian) from  tb_baoxiaolujing where tb_baoxiaolujing.jinexiaxian > $zongjine  and  tb_baoxiaolujing.yuangongbianhao= '$yuangongbianhao')   and  tb_baoxiaolujing.yuangongbianhao= '$yuangongbianhao')  and A.yuangongbianhao= '$yuangongbianhao' 
                union all 
                SELECT B.xingming,B.email,B.yuangongbianhao ,a.lujingbianhao  from tb_baoxiaolujing as A ,tb_yuangongxiangqing as B where a.shenpiren5=B.yuangongbianhao and a.lujingbianhao =(select lujingbianhao from  tb_baoxiaolujing where jinexiaxian =(select min(jinexiaxian) from  tb_baoxiaolujing where tb_baoxiaolujing.jinexiaxian > $zongjine  and  tb_baoxiaolujing.yuangongbianhao= '$yuangongbianhao')   and  tb_baoxiaolujing.yuangongbianhao= '$yuangongbianhao')  and A.yuangongbianhao= '$yuangongbianhao' 
                union all 
                SELECT B.xingming,B.email,B.yuangongbianhao ,a.lujingbianhao  from tb_baoxiaolujing as A ,tb_yuangongxiangqing as B where a.shenpiren6=B.yuangongbianhao and a.lujingbianhao =(select lujingbianhao from  tb_baoxiaolujing where jinexiaxian =(select min(jinexiaxian) from  tb_baoxiaolujing where tb_baoxiaolujing.jinexiaxian > $zongjine  and  tb_baoxiaolujing.yuangongbianhao= '$yuangongbianhao')   and  tb_baoxiaolujing.yuangongbianhao= '$yuangongbianhao')  and A.yuangongbianhao= '$yuangongbianhao' 
                ";
           $query=$this->db->query( $sql);
           $get_tijiao=$query->result_array();
           }
          }
        else{
               $sql="SELECT B.xingming,B.email,B.yuangongbianhao,a.lujingbianhao from tb_bumenlujing  as A ,tb_yuangongxiangqing as B,tb_yuangong as c  where b.yuangongbianhao=a.shenpiren1 and  A.jinexiaxian <= $zongjine  and A.jineshangxian >= $zongjine  and a.bumenbianhao= c.bumenbianhao  and   c.yuangongbianhao = '$yuangongbianhao'
                union all 
                SELECT B.xingming,B.email,B.yuangongbianhao,a.lujingbianhao from tb_bumenlujing  as A ,tb_yuangongxiangqing as B,tb_yuangong as c  where b.yuangongbianhao=a.shenpiren2 and  A.jinexiaxian <= $zongjine  and A.jineshangxian >= $zongjine  and a.bumenbianhao= c.bumenbianhao  and   c.yuangongbianhao = '$yuangongbianhao' 
                union all 
                SELECT B.xingming,B.email,B.yuangongbianhao,a.lujingbianhao from tb_bumenlujing  as A ,tb_yuangongxiangqing as B,tb_yuangong as c  where b.yuangongbianhao=a.shenpiren3 and  A.jinexiaxian <= $zongjine  and A.jineshangxian >= $zongjine  and a.bumenbianhao= c.bumenbianhao  and   c.yuangongbianhao = '$yuangongbianhao' 
                union all 
                SELECT B.xingming,B.email,B.yuangongbianhao,a.lujingbianhao from tb_bumenlujing  as A ,tb_yuangongxiangqing as B,tb_yuangong as c  where b.yuangongbianhao=a.shenpiren4 and  A.jinexiaxian <= $zongjine  and A.jineshangxian >= $zongjine  and a.bumenbianhao= c.bumenbianhao  and   c.yuangongbianhao = '$yuangongbianhao' 
                union all 
                SELECT B.xingming,B.email,B.yuangongbianhao,a.lujingbianhao from tb_bumenlujing  as A ,tb_yuangongxiangqing as B,tb_yuangong as c  where b.yuangongbianhao=a.shenpiren5 and  A.jinexiaxian <= $zongjine  and A.jineshangxian >= $zongjine  and a.bumenbianhao= c.bumenbianhao  and   c.yuangongbianhao = '$yuangongbianhao' 
                union all 
                SELECT B.xingming,B.email,B.yuangongbianhao,a.lujingbianhao from tb_bumenlujing  as A ,tb_yuangongxiangqing as B,tb_yuangong as c  where b.yuangongbianhao=a.shenpiren6 and  A.jinexiaxian <= $zongjine  and A.jineshangxian >= $zongjine  and a.bumenbianhao= c.bumenbianhao  and   c.yuangongbianhao = '$yuangongbianhao'  
                ";       	
         $query=$this->db->query( $sql);
         $count =$query->num_rows();
         $get_tijiao=$query->result_array();
         if(($count==1)&&($get_tijiao[0]['yuangongbianhao']==$yuangongbianhao)){
               $sql="SELECT B.xingming,B.email,B.yuangongbianhao,a.lujingbianhao from tb_bumenlujing  as A ,tb_yuangongxiangqing as B, tb_yuangong as c  where  c.yuangongbianhao = '$yuangongbianhao'   and b.yuangongbianhao=a.shenpiren1 and  a.lujingbianhao =(select lujingbianhao from  tb_bumenlujing where  tb_bumenlujing.jinexiaxian=(select min(jinexiaxian) from  tb_bumenlujing where tb_bumenlujing.jinexiaxian > $zongjine  and   tb_bumenlujing.bumenbianhao= c.bumenbianhao) and  tb_bumenlujing.bumenbianhao= c.bumenbianhao  )       
               union all 
                SELECT B.xingming,B.email,B.yuangongbianhao,a.lujingbianhao from tb_bumenlujing  as A ,tb_yuangongxiangqing as B, tb_yuangong as c  where  c.yuangongbianhao = '$yuangongbianhao'   and b.yuangongbianhao=a.shenpiren2 and  a.lujingbianhao =(select lujingbianhao from  tb_bumenlujing where  tb_bumenlujing.jinexiaxian=(select min(jinexiaxian) from  tb_bumenlujing where tb_bumenlujing.jinexiaxian > $zongjine  and   tb_bumenlujing.bumenbianhao= c.bumenbianhao) and  tb_bumenlujing.bumenbianhao= c.bumenbianhao  )       
               union all 
               SELECT B.xingming,B.email,B.yuangongbianhao,a.lujingbianhao from tb_bumenlujing  as A ,tb_yuangongxiangqing as B, tb_yuangong as c  where  c.yuangongbianhao = '$yuangongbianhao'   and b.yuangongbianhao=a.shenpiren3 and  a.lujingbianhao =(select lujingbianhao from  tb_bumenlujing where  tb_bumenlujing.jinexiaxian=(select min(jinexiaxian) from  tb_bumenlujing where tb_bumenlujing.jinexiaxian > $zongjine  and   tb_bumenlujing.bumenbianhao= c.bumenbianhao) and  tb_bumenlujing.bumenbianhao= c.bumenbianhao  )       
               union all 
               SELECT B.xingming,B.email,B.yuangongbianhao,a.lujingbianhao from tb_bumenlujing  as A ,tb_yuangongxiangqing as B, tb_yuangong as c  where  c.yuangongbianhao = '$yuangongbianhao'   and b.yuangongbianhao=a.shenpiren4 and  a.lujingbianhao =(select lujingbianhao from  tb_bumenlujing where  tb_bumenlujing.jinexiaxian=(select min(jinexiaxian) from  tb_bumenlujing where tb_bumenlujing.jinexiaxian > $zongjine  and   tb_bumenlujing.bumenbianhao= c.bumenbianhao) and  tb_bumenlujing.bumenbianhao= c.bumenbianhao  )       
               union all 
               SELECT B.xingming,B.email,B.yuangongbianhao,a.lujingbianhao from tb_bumenlujing  as A ,tb_yuangongxiangqing as B, tb_yuangong as c  where  c.yuangongbianhao = '$yuangongbianhao'   and b.yuangongbianhao=a.shenpiren5 and  a.lujingbianhao =(select lujingbianhao from  tb_bumenlujing where  tb_bumenlujing.jinexiaxian=(select min(jinexiaxian) from  tb_bumenlujing where tb_bumenlujing.jinexiaxian > $zongjine  and   tb_bumenlujing.bumenbianhao= c.bumenbianhao) and  tb_bumenlujing.bumenbianhao= c.bumenbianhao  )        
               union all 
               SELECT B.xingming,B.email,B.yuangongbianhao,a.lujingbianhao from tb_bumenlujing  as A ,tb_yuangongxiangqing as B, tb_yuangong as c  where  c.yuangongbianhao = '$yuangongbianhao'   and b.yuangongbianhao=a.shenpiren6 and  a.lujingbianhao =(select lujingbianhao from  tb_bumenlujing where  tb_bumenlujing.jinexiaxian=(select min(jinexiaxian) from  tb_bumenlujing where tb_bumenlujing.jinexiaxian > $zongjine  and   tb_bumenlujing.bumenbianhao= c.bumenbianhao) and  tb_bumenlujing.bumenbianhao= c.bumenbianhao  )  "; 
           $query=$this->db->query( $sql);
           $get_tijiao=$query->result_array();
           }
        }     
//        print_r($get_tijiao);   
        $nextshenpi= $this->getemail($get_tijiao,$yuangongbianhao); 
        $baoxiao=array(
                'baoxiaobianhao'=>$baoxiaobianhao,
	            'tijiaoshijian'=>$time,
	            'feiyongbianhao'=>$yusuan,
            	'baoxiaoleixing'=>$leibie,
	            'leibie'=>1,
            	'yuangongbianhao'=>$yuangongbianhao,	    
            	'yuangongleibie'=>$jibie,
            	'fukuanfangshi'=>$customer_type,
                'fudanbumen'=>$bumen,
            	'zongjine'=>$zongjine,
            	'lujingbianhao'=>$get_tijiao[0]['lujingbianhao'], 
                'lingkuan'=>0, 
	            'beizhu'=>$remark
	    );
	    $this->db->insert('tb_baoxiaodan',$baoxiao);
//        $this->db->select('baoxiaobianhao');
//		$this->db->from('tb_baoxiaodan');
//		$array = array('baoxiaoleixing =' => $leibie, 'zongjine =' => $zongjine, 'yuangongbianhao =' => $yuangongbianhao);
//        $this->db->where($array);
//        $this->db->order_by("tijiaoshijian", "desc"); 
//        $this->db->limit(1);
//        $result=$this->db->get(); 
//        $resu=$result->result_array();
//        $baoxiaobianhao=$resu[0]['baoxiaobianhao'];   
        $baoxiaoinfo=array();
        $baoxiaoinfo['leibie']=$leibie; 
        $baoxiaoinfo['baoxiaobianhao']=$baoxiaobianhao; 
		$zhuangtai=array(
		        'baoxiaobianhao'=>$baoxiaobianhao,
            	'tijiaoshijian'=>$time,
            	'lujingbianhao'=>$get_tijiao[0]['lujingbianhao'],
		        'tijiaoren'=>$yuangongbianhao,
		        'bohuicishu'=>0,
		        'shenpiren'=>$nextshenpi['yuangongbianhao'],
		        'shenpizhuangtai'=>0,
				'yishenpi'=>$nextshenpi['yishenpi'],
		        'weishenpi'=>$nextshenpi['weishenpi'],
				'shenpizhuangtai'=>0
			);
		@$this->db->insert('tb_baoxiaozhuangtai', $zhuangtai); 		  
		$baoxiaoinfo['get_tijiao']=$get_tijiao;
		$newdata = array(
			'tijiao'  => $baoxiaoinfo,
		   'nextshenpi' => $nextshenpi
		);
		$this->session->set_userdata($newdata);	
	   if($leibie==2){		 	
			$chalv_type=$_POST['chalv_type'];
		 	$receipt_chai=$_POST['receipt_chai'];
		 	$Currency_chai=$_POST['Currency_chai'];
		 	$parity_chai=$_POST['parity_chai'];
		 	$jine_chai=$_POST['jine_chai'];
		 	$startchai=$_POST['startchai'];		 	
		    $endchai=$_POST['endchai'];
		 	$des_place=$_POST['des_place'];
		 	$kehu_chai=$_POST['kehu_chai'];
		 	$dnumber_chai=$_POST['dnumber_chai'];
		 	$days=$_POST['days'];
            $data=array(); 
            $num=count($dnumber_chai);
            for($i=0;$i<$num;$i++){
            	$data[$i]=array(
            	'baoxiaobianhao'=>$baoxiaobianhao,
            	'feiyongleixing'=>$chalv_type[$i],
            	'receipt'=>$receipt_chai[$i],
            	'bizhong'=>$Currency_chai[$i],
            	'huilv'=>$parity_chai[$i],
            	'jine'=>$jine_chai[$i],
            	'qishishijian'=>str_replace('/',' ',$startchai[$i]),
            	'jieshushijian'=>str_replace('/',' ',$endchai[$i]),
            	'didian'=>str_replace('-',' ',$des_place[$i]),
            	'kehubianhao'=>$kehu_chai[$i],
            	'danjushumu'=>$dnumber_chai[$i],
            	'tianshu'=>$days[$i]
            	);          	
             }
             $this->db->insert_batch('tb_chailv',$data);
  		 }
  		 
    	else if($leibie==1){		 	
			$traffic_type=$_POST['traffic_type'];
		 	$receipt=$_POST['receipt'];
		 	$Currency=$_POST['Currency'];
		 	$parity=$_POST['parity'];
		 	$jine=$_POST['jine'];
		 	$start_time=$_POST['start_time'];		 	
		    $start_place=$_POST['start_place'];
		 	$end_time=$_POST['end_time'];
		 	$end_place=$_POST['end_place'];
		 	$kehuno=$_POST['kehuno'];
		 	$dnumber=$_POST['dnumber'];
            $data=array();
            $num=count($dnumber);
            for($i=0;$i<$num;$i++){
            	$data[$i]=array(
            	'baoxiaobianhao'=>$baoxiaobianhao,
            	'feiyongleixing'=>$traffic_type[$i],
            	'receipt'=>$receipt[$i],
            	'bizhong'=>$Currency[$i],
            	'huilv'=>$parity[$i],
            	'jine'=>$jine[$i],
            	'shangcheshijian'=>str_replace('/',' ',$start_time[$i]),
            	'shangchedidian'=>$start_place[$i],
            	'xiacheshijian'=>str_replace('/',' ',$end_time[$i]),
            	'xiachedidian'=>$end_place[$i],
            	'kehubianhao'=>$kehuno[$i],
            	'danjushumu'=>$dnumber[$i]
            	);          	
             }
             $this->db->insert_batch('tb_jiaotong',$data);             
  		 }
        else if($leibie==3){		 	
		 	$receipt_jiaoji=$_POST['receipt_jiaoji'];
		 	$Currency_jiaoji=$_POST['Currency_jiaoji'];
		 	$parity_jiaoji=$_POST['parity_jiaoji'];
		 	$jine_jiaoji=$_POST['jine_jiaoji'];
		 	$jiaoji_time=$_POST['jiaoji_time'];	
		 	$jiaoji_place=$_POST['jiaoji_place'];		 	
		 	$kehu_jiaoji=$_POST['kehu_jiaoji'];
		 	$company=$_POST['company'];		 	
		 	$personal=$_POST['personal'];
		 	$dnumber_jiaoji=$_POST['dnumber_jiaoji'];
            $data=array();
            $num=count($dnumber_jiaoji);
            for($i=0;$i<$num;$i++){
            	$data[$i]=array(
            	'baoxiaobianhao'=>$baoxiaobianhao,
            	'receipt'=>$receipt_jiaoji[$i],
            	'bizhong'=>$Currency_jiaoji[$i],
            	'huilv'=>$parity_jiaoji[$i],
            	'jine'=>$jine_jiaoji[$i],
            	'shijian'=>$jiaoji_time[$i],
             	'didian'=>$jiaoji_place[$i], 
            	'danwei'=>$company[$i], 
            	'name'=>$personal[$i],
            	'kehubianhao'=>$kehu_jiaoji[$i],
            	'danjushumu'=>$dnumber_jiaoji[$i]
            	);          	
             }
             $this->db->insert_batch('tb_jiaoji',$data);
  		 }
     else if($leibie==4){		 	
		 	$receipt_lipin=$_POST['receipt_lipin'];
		 	$Currency_lipin=$_POST['Currency_lipin'];
		 	$parity_lipin=$_POST['parity_lipin'];
		 	$jine_lipin=$_POST['jine_lipin'];
		 	$lipin_time=$_POST['lipin_time'];	
		 	$lipin_name=$_POST['lipin_name'];		 	
		 	$kehu_lipin=$_POST['kehu_lipin'];
		 	$lipin_company=$_POST['lipin_company'];		 	
		 	$lipin_personal=$_POST['lipin_personal'];
		 	$dnumber_lipin=$_POST['dnumber_lipin'];
		 	
            $data=array();
            $num=count($dnumber_lipin);
            for($i=0;$i<$num;$i++){
            	$data[$i]=array(
            	'baoxiaobianhao'=>$baoxiaobianhao,
            	'receipt'=>$receipt_lipin[$i],
            	'bizhong'=>$Currency_lipin[$i],
            	'huilv'=>$parity_lipin[$i],
            	'jine'=>$jine_lipin[$i],
            	'shijian'=>$lipin_time[$i],
             	'lipinming'=>$lipin_name[$i], 
            	'danwei'=>$lipin_company[$i], 
            	'name'=>$lipin_personal[$i],
            	'kehubianhao'=>$kehu_lipin[$i],
            	'danjushumu'=>$dnumber_lipin[$i]
            	);          	
             }
             $this->db->insert_batch('tb_lipin',$data);
  		 }
         else if($leibie==5){		 	
		 	$receipt_zichan=$_POST['receipt_zichan'];
		 	$Currency_zichan=$_POST['Currency_zichan'];
		 	$parity_zichan=$_POST['parity_zichan'];
		 	$jine_zichan=$_POST['jine_zichan'];
		 	$zichan_time=$_POST['zichan_time'];	
		 	$zichan_name=$_POST['zichan_name'];	
		 	$yongtu=$_POST['yongtu'];		 		 	
		 	$dnumber_zichan=$_POST['dnumber_zichan'];		 	
            $data=array();
            $num=count($dnumber_zichan);
            for($i=0;$i<$num;$i++){
            	$data[$i]=array(
            	'baoxiaobianhao'=>$baoxiaobianhao,
            	'receipt'=>$receipt_zichan[$i],
            	'bizhong'=>$Currency_zichan[$i],
            	'huilv'=>$parity_zichan[$i],
            	'jine'=>$jine_zichan[$i],
            	'shijian'=>$zichan_time[$i],
             	'zichanming'=>$zichan_name[$i], 
            	'yongtu'=>$yongtu[$i], 
            	'danjushumu'=>$dnumber_zichan[$i]
            	);          	
             }
             $this->db->insert_batch('tb_zichann',$data);
  		 }
          else if($leibie==6){		 	
		 	$receipt_tongyong=$_POST['receipt_tongyong'];
		 	$Currency_tongyong=$_POST['Currency_tongyong'];
		 	$parity_tongyong=$_POST['parity_tongyong'];
		 	$jine_tongyong=$_POST['jine_tongyong'];
		 	$tongyong_time=$_POST['tongyong_time'];	
		 	$shiyongmudi=$_POST['shiyongmudi'];	
		 	$mingxi=$_POST['mingxi'];
		 	$kehu_tongyong=$_POST['kehu_tongyong'];		 			 		 		 	
		 	$dnumber_tongyong=$_POST['dnumber_tongyong'];		 	
            $data=array();
            $num=count($dnumber_tongyong);
            for($i=0;$i<$num;$i++){
            	$data[$i]=array(
            	'baoxiaobianhao'=>$baoxiaobianhao,
            	'receipt'=>$receipt_tongyong[$i],
            	'bizhong'=>$Currency_tongyong[$i],
            	'huilv'=>$parity_tongyong[$i],
            	'jine'=>$jine_tongyong[$i],
            	'shijian'=>$tongyong_time[$i],
             	'mudi'=>$shiyongmudi[$i], 
            	'Feiyongmingxi'=>$mingxi[$i], 
            	'kehubianhao'=>$kehu_tongyong[$i],
            	'danjushumu'=>$dnumber_tongyong[$i]
            	);          	
             }
             $this->db->insert_batch('tb_tongyong',$data);
  		 }
     redirect('baoxiaodan/success/');
 }
}
//报销单提交成功
function success(){
$username=$this->session->userdata('name');
$yuangongbianhao=$this->session->userdata('yuangongbianhao');
$tijiao=$this->session->userdata('tijiao');
$nextshenpi=$this->session->userdata('nextshenpi');
	if (empty($username)&&empty($yuangongbianhao)) {					
	 	 redirect('login/index/');
		}
   else if(empty($tijiao)){	
     redirect('mainpage/index/');
    }
	else {	
    if($tijiao['leibie']==1){
    	$leibie="交通费";    	
    }
    else if($tijiao['leibie']==2){
    	$leibie="差旅费";    	
    }
	else if($tijiao['leibie']==3){
    	$leibie="交际费";    	
    }
	else if($tijiao['leibie']==4){
    	$leibie="礼品费";    	
    }    
	else if($tijiao['leibie']==5){
    	$leibie="固定资产采购申请";    	
    }  
    else if($tijiao['leibie']==6){
    	$leibie="通用报销单";    	
    }   
		$this->load->library('email');		
		$this->email->from('365206801@qq.com', '海朴网聚财务管理系统');
		$this->email->to($nextshenpi['email']); 		
		$this->email->subject('请您及时审批报销单');
		$message=$username."提交了一张报销单，请您及时审批！";	
		$this->email->message($message);		
		@$this->email->send();		
	//	echo $this->email->print_debugger();
		$top=array();
	    $basic['tijiao']=$tijiao;
	    $basic['leibie']=$leibie;
	    $basic['nextshenpi']=$nextshenpi;
		$top['xingming']= $username;
		$info['top']=$top;
		$info['basic']=$basic;
		$this->load->view('baoxiaodan/success',$info);
	  $this->session->unset_userdata('tijiao');	
	}
}

private function getemail($arr,$yuangongbianhao){
	$j=count($arr);
//	for($i=count($arr)-1;$i>=0;$i--){
//	  if(($arr[$i]['yuangongbianhao']!=$yuangongbianhao)){
//	   $data['email']=$arr[$i]['email'];
//	   $data['xingming']=$arr[$i]['xingming'];
//	   $data['yuangongbianhao']=$arr[$i]['yuangongbianhao'];
//	   $data['yishenpi']=count($arr)-$i;
//	   $data['weishenpi']=$i;
//	   break;
//	  }	
//	}	
	for($i=0;$i<count($arr);$i++){
	  if(($arr[$i]['yuangongbianhao']!=$yuangongbianhao)){
	   $data['email']=$arr[$i]['email'];
	   $data['xingming']=$arr[$i]['xingming'];
	   $data['yuangongbianhao']=$arr[$i]['yuangongbianhao'];
	   $data['yishenpi']=$i;
	   $data['weishenpi']=count($arr)-$i;
	   break;
	  }	
	}	
	return $data;
}

}
?>