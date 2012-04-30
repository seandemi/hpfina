<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Email
| -------------------------------------------------------------------------
| This file lets you define parameters for sending emails.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/libraries/email.html
|
*/

$config['protocol'] = 'smtp';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['smtp_host'] = 'smtp.qq.com';
$config['smtp_user'] = '365206801';
$config['smtp_pass'] = 'iloveannacui1314';
$config['smtp_port'] = 25;
$config['smtp_timeout'] = 5;
$config['wordwrap'] = TRUE;
$config['wrapchars'] = 76;
$config['mailtype'] = 'text';
$config['charset'] = 'gbk';
$config['validate'] = true;
$config['priority'] = 3;
$config['crlf']  = "\r\n";
$config['newline'] = "\r\n";

/* End of file email.php */
/* Location: ./application/config/email.php */