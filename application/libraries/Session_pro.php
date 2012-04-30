<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
class Session_pro {	
	
function change_encode($data){
 	foreach ($data as $key => $val){
	 $val[$key]=iconv("GBK", "UTF-8",$data[$key]);;
		}
		
		return $val;
   }
   
function delete_data($data){
 	foreach ($data as $key => $val){
	 $val[$key]=str_replace('/', '',$data[$key]);;
		}		
	return $val;
   }
   
}


?>