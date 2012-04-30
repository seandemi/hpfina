<?php
class Operate extends  CI_Controller
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
//同意报销单             
 public function agree($baoxiaobianhao){
 	 $username=$this->session->userdata('name');
     $yuangongbianhao=$this->session->userdata('yuangongbianhao');
	if (empty($username)&&empty($yuangongbianhao)) {					
	 	 redirect('login/index/');
		}
    else {
//       header("Content-type:text/html; charset=GBK");
       $yijian=iconv("UTF-8", "gb2312",$_POST['yijian']); ; 
       $info=$this->getinfo($yuangongbianhao,$baoxiaobianhao);
       if($info['number']){
       $shenpi[0]=$info[0]['shenpiren1'];
       $shenpi[1]=$info[0]['shenpiren2'];
       $shenpi[2]=$info[0]['shenpiren3'];
       $shenpi[3]=$info[0]['shenpiren4'];
       $shenpi[4]=$info[0]['shenpiren5'];
       $shenpi[5]=$info[0]['shenpiren6'];
       $shenpi[6]=$info[0]['yishenpi']; 
       $shenpi[7]=$info[0]['weishenpi'];
       $nextshenpi=$this->getshenpi($info[0]['tijiaoren'],$yuangongbianhao,$shenpi); 
       $personal=$this->personal($info[0]['tijiaoren']);
        $time= date("Y-m-d H:i:s"); 
		$data = array(
		               'passdate' => $time,
		               'yijian' => 1,
		               'pinglun' => $yijian,
		               'shenpizhuangtai' => 1,
		               'yishenpi' => $nextshenpi['num'],
		               'weishenpi' => $shenpi[6]+$shenpi[7]-$nextshenpi['num']		
		            );
		 $this->db->update('tb_baoxiaozhuangtai', $data,"shenpiren = '$yuangongbianhao' and  shenpizhuangtai =0 and baoxiaobianhao = '$baoxiaobianhao'"); 
		 $weishenpi=$shenpi[6]+$shenpi[7]-$nextshenpi['num'];
			if($weishenpi>0){
			    $data2 = array(
			               'baoxiaobianhao' => $info[0]['baoxiaobianhao'] ,
			               'tijiaoshijian' => $info[0]['tijiaoshijian'] ,
			               'lujingbianhao' => $info[0]['lujingbianhao'],
			               'shenpiren' => $nextshenpi['yuangongbianhao'],
			               'bohuicishu' => $info[0]['bohuicishu'],
			               'shenpizhuangtai' => 0,
			               'tijiaoren' => $info[0]['tijiaoren'],
			               'yishenpi' => $nextshenpi['num'],
			               'weishenpi' => $weishenpi				
			   );		
			    $this->db->insert('tb_baoxiaozhuangtai', $data2);		
				$from="365206801@qq.com";
				$name="海朴网聚财务管理系统";
				$dest=$nextshenpi['email'];
				$subject="请您及时审批报销单";
			    $message=$personal['xingming']."(".$personal['zhiwei'].")提交了一张报销单，请您及时审批！";
		        @$this->sendemail($from,$name,$dest,$subject,$message);
		        header("Content-type:text/html; charset=GBK");
				echo $this->JSON($nextshenpi);
		  }
			else {
			  	$from="365206801@qq.com";
				$name="海朴网聚财务管理系统";
				$dest=$personal['email'];
				$subject="您提交的报销单已经完成了审批流程";
			    $message="您有一张报销单已经完成了审批流程，请及时去财务领款";
		        @$this->sendemail($from,$name,$dest,$subject,$message);
                $personal['result']=$nextshenpi["result"];
                header("Content-type:text/html; charset=GBK");
		        echo $this->JSON($personal);
			}
       }
       else {
       	header("Content-type:text/html; charset=GBK");
         echo $this->JSON(array('result'=>"failure"));
       }
   }
 }
 
 public function reject($baoxiaobianhao){
 	 $username=$this->session->userdata('name');
     $yuangongbianhao=$this->session->userdata('yuangongbianhao');
	if (empty($username)&&empty($yuangongbianhao)) {					
	 	 redirect('login/index/');
		}
    else {
      header("Content-type:text/html; charset=GBK");
       $yijian=iconv("UTF-8", "gb2312",$_POST['yijian']); 
       $info=$this->getreject($yuangongbianhao,$baoxiaobianhao);
       if($info['number']){
       	 $sql="update tb_baoxiaozhuangtai set passdate= NOW(),
       	 yijian=0,pinglun='$yijian',bohuicishu=bohuicishu+1,shenpizhuangtai=1,
       	 yishenpi=yishenpi+1,weishenpi=weishenpi-1 where shenpiren='$yuangongbianhao' and baoxiaobianhao='$baoxiaobianhao' ";
         $query = $this->db->query($sql); 
            if($info['baoxiaoleixing']==1){
    	     $leibie="交通费";    	
		    }
		    else if($info['baoxiaoleixing']==2){
		    	$leibie="差旅费";    	
		    }
			else if($info['baoxiaoleixing']==3){
		    	$leibie="交际费";    	
		    }
			else if($info['baoxiaoleixing']==4){
		    	$leibie="礼品费";    	
		    }    
			else if($info['baoxiaoleixing']==5){
		    	$leibie="固定资产采购申请";    	
		    }  
		    else if($info['baoxiaoleixing']==6){
		    	$leibie="通用报销单";    	
		    }   
		$from="365206801@qq.com";
		$name="海朴网聚财务管理系统";
		$personal=$this->personal($yuangongbianhao);
		$dest=$info['email'];
		$subject="您有一张报销单被驳回";
		$message="您有一张".$leibie."(报销编号为".$info['baoxiaobianhao'].")报销单被".$personal['xingming']."(".$personal['zhiwei'].")驳回！";
        $this->sendemail($from,$name,$dest,$subject,$message);
        echo $this->JSON($info);
       }      
   }
 }
 //获取个人的信息
 private function personal($yuangongbianhao){
    $sql="select a.xingming,a.zhiwei ,b.email from tb_yuangong as a,tb_yuangongxiangqing as b  where a.yuangongbianhao='$yuangongbianhao' and b.yuangongbianhao='$yuangongbianhao'";
     $query=$this->db->query($sql);
 	 $info=$query->result_array();
 	 return $info[0];
 }
  //获取被驳回人的信息
 private function getreject($yuangongbianhao,$baoxiaobianhao){
    $baoxiao_sql="select count(*) as number from tb_baoxiaozhuangtai  where shenpiren='$yuangongbianhao' and shenpizhuangtai=0 and baoxiaobianhao='$baoxiaobianhao'"; 
	$query=$this->db->query($baoxiao_sql);
	$rownuber=@$query->result_array(); 
    if($rownuber[0]['number']){ 
       $sql="select a.yuangongbianhao,a.xingming,a.zhiwei,b.email,c.baoxiaoleixing,c.baoxiaobianhao from tb_yuangong as a,
       tb_yuangongxiangqing as b ,tb_baoxiaodan as c where a.yuangongbianhao=b.yuangongbianhao and 
       a.yuangongbianhao=c.yuangongbianhao and c.baoxiaobianhao='$baoxiaobianhao'";
     	$query=$this->db->query($sql);
 	 	$info=$query->result_array();
    } 	
    $info[0]['number']=$rownuber[0]['number'];
    $info[0]['result']="success";
    return $info[0];
 }
 //查询报销状态信息
 private function getinfo($yuangongbianhao,$baoxiaobianhao){
 	$baoxiao_sql="select max(a.lujingbianhao) as number from tb_baoxiaolujing as a ,tb_baoxiaodan as b  where a.yuangongbianhao=b.yuangongbianhao and b.baoxiaobianhao='$baoxiaobianhao'"; 
	$query=$this->db->query($baoxiao_sql);		
    $rownuber=@$query->result_array(); 
    if($rownuber[0]['number']){
 	$sql="SELECT a.baoxiaobianhao,a.tijiaoshijian,a.bohuicishu,a.tijiaoren,a.yishenpi,a.weishenpi,
 	b.* ,c.yuangongbianhao,c.xingming from tb_baoxiaozhuangtai as a ,tb_baoxiaolujing as b ,
 	tb_yuangong as c where a.lujingbianhao=b.lujingbianhao and c.yuangongbianhao=a.tijiaoren and 
 	a. baoxiaobianhao='$baoxiaobianhao' and a.shenpizhuangtai=0  and  a.shenpiren='$yuangongbianhao'";	
        }
    else{
	    $sql="SELECT a.baoxiaobianhao,a.tijiaoshijian,a.bohuicishu,a.tijiaoren,a.yishenpi,a.weishenpi,
	 	b.* ,c.yuangongbianhao,c.xingming from tb_baoxiaozhuangtai as a ,tb_bumenlujing as b ,
	 	tb_yuangong as c where a.lujingbianhao=b.lujingbianhao and c.yuangongbianhao=a.tijiaoren and 
	 	a.baoxiaobianhao='$baoxiaobianhao' and a.shenpizhuangtai=0  and  a.shenpiren='$yuangongbianhao'";	
    }
 	$query=$this->db->query($sql);
 	$count =$query->num_rows();
 	$info=$query->result_array();
 	$info['number']=$count;
    return $info;
  }    
//查询下一审批人信息
private function getshenpi($tijiaoren,$yuangongbianhao,$shenpi){
	$j=0;
	for($i=$shenpi[6];$i<6;$i++){
	  if(($shenpi[$i])&&($shenpi[$i]!=$yuangongbianhao)&&($shenpi[$i]!=$tijiaoren)){
	   $shenpiren=$shenpi[$i];
	   $j=$i;
	   break;
	  }
	}
	if($j){
		$sql="SELECT a.yuangongbianhao,a.xingming,a.zhiwei,b.email from tb_yuangong as a ,tb_yuangongxiangqing as b  where a.yuangongbianhao=b.yuangongbianhao and  a.yuangongbianhao='$shenpiren'";	
	 	$query=$this->db->query($sql);
	 	$count =$query->num_rows();
	 	$info=$query->result_array();
	 	$info[0]['number']=$count;
	 	$info[0]['result']="success";
	 	$info[0]['num']=$j;
	}
	else {
		$info[0]['result']="finished";
		$info[0]['num']=$shenpi[6]+$shenpi[7];
		}	
    return  $info[0];
}
	private function JSON($array) {
	    $this->arrayRecursive($array, 'urlencode', true);
	    $json = json_encode($array);
	    return urldecode($json);
    }
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
//发送邮件
private function sendemail($from,$name,$dest,$subject,$message){
		$this->load->library('email');		
		$this->email->from($from, $name);
		$this->email->to($dest); 		
		$this->email->subject($subject);	
		$this->email->message($message);		
		@$this->email->send();
} 
}