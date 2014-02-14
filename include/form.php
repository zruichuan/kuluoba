<?php
/**

*/

define('CMS',true);
require_once('../includes/init.php');
$fields=$_POST['fields'];
if(empty($fields)||empty($form_id)){die("发生错误，无法处理该表单<a href=\"javascript:history.go(-1);\">返回</a>");}
if(file_exists(DATA_PATH.'cache_form/form.php')){include(DATA_PATH.'cache_form/form.php');}
if(!empty($form)){
	foreach($form as $k=>$v){
		if($v['id']==$form_id&&!$v['is_disable']){
			$form=$v;
		}
	}
}
if(file_exists(DATA_PATH.'cache_form/field.php')){include(DATA_PATH.'cache_form/field.php');}

$fd=array();
$fn=array();
$fl=array();
if(!empty($field)){
	foreach($field as $k=>$v){
		if($v['form_id']==$form_id&&$v['field_type']!='checkbox'){
			$fd[]=$v['field_name'];
			$fn[]=$v['use_name'];
		}
	}
}

$sql_field='';
$sql_value='';
//print_r($fields);
if(!empty($fields)){
foreach($fields as $key=>$value){
			if(!is_array($value)){
			if(!in_array($key,$fd)){die('发生错误，无法处理表单！');}
			}
			$fl[]=$value;
			$sql_field.=','.$key;
			if(is_array($value)){
				foreach($value as $k=>$v){
					$value_str.=$v.',';
				}
				$value=$value_str;
			}
			$value=fl_value($value);
			$sql_value.=",'".fl_html($value)."'";			
}
}else{
	die('表单不能为空<a href="javascript:history.go(-1);">返回</a>');
}
$table=$form['form_mark'];
$tables=$mysql->show_tables();
	if(!in_array(DB_PRE.$table,$tables)){
		die('发生错误,该表单已经停止使用,不能添加表单信息<a href="javascript:history.go(-1);">返回</a>');
	}
$addtime=time();
$ip=fl_value(get_ip());
$ip=fl_html($ip);
$member_id=empty($_SESSION['id'])?0:$_SESSION['id'];
$arc_id=empty($f_id)?0:intval($_POST['f_id']);
$sql="insert into ".DB_PRE."formlist (form_id,form_time,form_ip,member_id,arc_id) values ({$form_id},{$addtime},'{$ip}','{$member_id}','{$arc_id}')";
$mysql->query($sql);
$last_id=$mysql->insert_id();
$sql_field='id'.$sql_field;
$sql_value=$last_id.$sql_value;
$sql="insert into ".DB_PRE."{$table} ({$sql_field}) values ({$sql_value})";
$mysql->query($sql);

for ($i =0; $i <count($fn);$i++) {
 $str=$str.$fn[$i].":".$fl[$i]."<br />";
 $str=$str."┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈"."<br />";
}

//print_r($fl);

$type="建筑装饰五金,建築装飾金物";
$mailaddr="江苏省,上海市,浙江省,安徽省,福建省,湖北省,湖南省,广东省,江西省,海南省,港特别行政区,澳门特别行政区";
if (strstr($type,$fl[0])){
$to = "info-hw@kawajun.com.cn";
}
else{
	if (strstr($mailaddr,$fl[5])){
	$to = "info-sh@kawajun.com.cn";
	}
	else{
	$to = "info-bj@kawajun.com.cn";
	}
}
//echo $to;
$subject = "お問い合わせ"."(".$fl[4].")";
$message = $str;

// 对邮件地址进行中文的UTF-8编码转化   
function format_mail_address($address){  
  if(preg_match("|<([^<]+)>|", $address, $matches)){  
    $name = mb_substr($address, 0, strpos($address, '<'));  
    $name = trim($name);  
    $mail = $matches[1];  
   $address = "=?UTF-8?B?".base64_encode($name)."?= " . "<$mail>";  
  }  
  return $address;  
}  
  
// 发送html格式的邮件   
function html_mail($to, $from, $subject, $body){  
  if(preg_match("|<([^<]+)>|", $from, $matches)){  
    $from_name = mb_substr($from, 0, strpos($from, '<'));  
    $from_mail = $matches[1];  
   $from = "=?UTF-8?B?".base64_encode($from_name)."?= " . "<$from_mail>";  
 }else{  
    $from_mail = $from;  
  }  
  $headers[] = "From: $from";  
  $headers[] = "X-Mailer: PHP";  
  $headers[] = "MIME-Version: 1.0";  
  $headers[] = "Content-type: text/html; charset=utf8";  
  $headers[] = "Reply-To: $from_mail";  
  $subject = "=?UTF-8?B?".base64_encode($subject)."?=";  
  if(is_array($to)){  
    foreach($to as $mail)  
      $to_mails[] = format_mail_address($mail);  
    $to = join(", ", $to_mails);  
  }  
  mail($to, $subject, $body, join("\r\n", $headers), "-f $from_mail");  
}  

html_mail($to, 'kawajun123@localhost.localdomain', $subject, $message, "HTML"); 


//require("../phpmailer/class.phpmailer.php");
////include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
//
//$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
//
//$mail->IsSMTP(); // telling the class to use SMTP
//
//try {
//  $mail->Host       = "mail.xinkefeng.com"; // SMTP server
//  $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
//  $mail->SMTPAuth   = true;                  // enable SMTP authentication
//  $mail->Host       = "mail.xinkefeng.com"; // sets the SMTP server
//  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
//  $mail->Username   = "web@xinkefeng.com"; // SMTP account username
//  $mail->Password   = "123456";        // SMTP account password
//  $mail->AddReplyTo('web@xinkefeng.com', '');
//  $mail->AddAddress($to, '');
////  $mail->AddAddress('41582672@qq.com', '');
//  $mail->SetFrom('web@xinkefeng.com', '');
//  $mail->AddReplyTo('web@xinkefeng.com', '');
//  $mail->Subject = $subject;
//  $mail->IsHTML(true);                 // 是否HTML格式邮件 
//  $mail->CharSet = "utf-8";                // 这里指定字符集！ 
//  $mail->Encoding = "base64";
//  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
//  $mail->MsgHTML($message);
////  $mail->AddAttachment('images/phpmailer.gif');      // attachment
////  $mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
//  $mail->Send();
////  echo "Message Sent OK</p>\n";
//} catch (phpmailerException $e) {
////  echo $e->errorMessage(); //Pretty error messages from PHPMailer
//} catch (Exception $e) {
////  echo $e->getMessage(); //Boring error messages from anything else!
//}

echo "<script type=\"text/javascript\">alert('表单已经处理');history.go(-2);</script>";


?>
