<?php
include_once 'include/config.inc.php';
include_once 'include/common.function.php';
?>
<?php
if($_POST['name']){
	$record = array(
		'company' 			=>$_POST ['company'],
		'department'		=>$_POST ['department'],
		'division'			=>$_POST ['division'],
		'name'		        =>$_POST ['name'],
		'address'			=>$_POST['address'],
		'Zipcode'	        =>$_POST ['Zipcode'],
	    'phone'	            =>$_POST ['phones'],
	    'fax'	            =>$_POST ['fax'],
	    'Email'	            =>$_POST ['Email'],
	    'validate'	        =>0,
	    'centent'	        =>$_POST ['centent'],
		'date'		        =>date ( "Y-m-d H:i:s" )
	);
	$id = $db->insert('cms_problems',$record);
		$stm="<html>
	<head>
<title></title>
<style>
.title { font-family: '宋体'; font-size: 13px; line-height: 150% ; color: #FFFFFF}
</style>
</head>
<body bgcolor=dfdfdf text=#000000>
<table width=80% border=0 cellspacing=1 cellpadding=2 class=title bgcolor=#33C align=center>
  <tr align=center bgcolor=5272BA> 
    <td colspan=2 height=30>客户[".$record['name']."]的咨询信息！</td>
  </tr>
  <tr bgcolor=5272BA> 
    <td align=right width='200'>联系人：</td>
    <td>".$record["name"]."</td>
  </tr>
    <tr bgcolor=5272BA> 
    <td align=right width='200'>公司：</td>
    <td>".$record["company"]."</td>
  </tr>
   <tr bgcolor=5272BA> 
    <td align=right width='200'>事业部：</td>
    <td>".$record["department"]."</td>
  </tr>
   <tr bgcolor=5272BA> 
    <td align=right width='200'>部门：</td>
    <td>".$record["division"]."</td>
  </tr>
   <tr bgcolor=5272BA> 
    <td align=right width='200'>地址：</td>
    <td>".$record["address"]."</td>
  </tr>
   <tr bgcolor=5272BA> 
    <td align=right width='200'>电话：</td>
    <td>".$record["phone"]."</td>
  </tr>
   <tr bgcolor=5272BA> 
    <td align=right width='200'>QQ：</td>
    <td>".$record["QQ"]."</td>
  </tr>
    <tr bgcolor=5272BA> 
    <td align=right width='200'>Email：</td>
    <td>".$record["Email"]."</td>
  </tr>
  <tr bgcolor=5272BA> 
    <td align=right>咨询内容：</td>
    <td>".$record["centent"]."</td>
  </tr>  
</table>
</body>

	</html>";
require("aa.php"); //SMTP类 发送订单到Email
########################################## 
$smtpserver = "smtp.qq.com";//SMTP服务器
$smtpserverport = 25;//SMTP服务器端口
$smtpusermail = "1576961569@qq.com";//SMTP服务器的用户邮箱
$smtpemailto = "zruichuan@163.com";//发送给谁
$smtpuser = "1576961569@qq.com";//SMTP服务器的用户帐号
$smtppass = "chuanchuan.com";//SMTP服务器的用户密码
$mailsubject ="业务咨询";//邮件主题
$mailbody = $stm;//邮件内容
$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
##########################################
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证。
$smtp->debug = TRUE;//是否显示发送的调试信息
$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 


	if($id){
		echo "<script>alert('谢谢！您的留言成功！我们会尽快回复你的咨询')
		window.location='index.php';</script>";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>欧力士科技机器人租赁在线咨询</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="关键字" />
<meta name="description" content="关键字描述" />
<link rel="stylesheet" type="text/css" href="style/index.css">
<script src="include/js/jquery.js" type="text/javascript"></script>

<script type="text/javascript">
//<![CDATA[
$(function(){
       //如果是必填的，则加红星标识.
       $("form :input.required").each(function(){
           var $required = $("<span class='high'> *</span>"); //创建元素
/*           $(this).parent().append($required); //然后将它追加到文档中
*/       });
        //文本框失去焦点后
       $('form :input').blur(function(){
            var $parent = $(this).parent();
            $parent.find(".formtips").remove();
			//验证必填项
			 if( $(this).is('.required') ){
                   if( this.value==""){
                       var errorMsg = '此项为必填项.';
                       $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
                   }else{
                       var okMsg = '输入正确.';
                       $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                   }
            }
            //验证用户名
            if( $(this).is('#username') ){
                   if( this.value=="" || this.value.length < 6 ){
                       var errorMsg = '请输入至少6位的用户名.';
                       $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
                   }else{
                       var okMsg = '输入正确.';
                       $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                   }
            }
			//验证手机号
			 if( $(this).is('#phone') ){
               if( this.value=="" || ( this.value!="" && !/^1[3|4|5|8][0-9]\d{4,8}$/.test(this.value) ) ){
                     var errorMsg = '请输入正确的dianhua 地址.';
                     $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
               }else{
                     var okMsg = '输入正确.';
                     $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
               }
            }
            //验证邮件   
            if( $(this).is('#Email') ){
               if( this.value=="" || ( this.value!="" && !/.+@.+\.[a-zA-Z]{2,4}$/.test(this.value) ) ){
                     var errorMsg = '请输入正确的E-Mail地址.';
                     $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
               }else{
                     var okMsg = '输入正确.';
                     $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
               }
            }
       }).keyup(function(){
          $(this).triggerHandler("blur");
       }).focus(function(){
            $(this).triggerHandler("blur");
       });//end blur

       
       //提交，最终验证。
        $('#send').click(function(){
               $("form :input.required").trigger('blur');
               var numError = $('form .onError').length;
               if(numError){
                   return false;
               }
/*               alert("注册成功,密码已发到你的邮箱,请查收.");
*/        });

       //重置
        $('#res').click(function(){
               $(".formtips").remove();
        });
})
//]]>
</script>
</head>
<body>
<div id="homepage">
<div id="header">
 <div id="logo">
      <div id="LogoImg">
        <h1><a href="index2.php"><img src="images/logo1.gif" alt="欧力士科技机器人租赁"/></a></h1>
      </div>
      <div id="address">ORIX Rentec(Tianjin)Corporation </div>
      <div id="lanager"><span id="left">独一无二的服务</span><span id="right"><img src="images/yuyan.gif" />&nbsp;<a href="index_jp.php">&nbsp;日本語 </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/yuyan.gif" /><a href="index2.php">&nbsp;中国语</a></span></div>
    </div>
    <div id="nav">
      <ul id="navs">
        <li id="nav1"><a href="index2.php">首页</a></li>
        <li><a href="#">企业信息</a></li>
		 <li><a href="#">业务介绍</a></li>
		  <li><a href="newslist.php">新闻中心</a></li>
        <li><a href="http://www.orixrentec.com.cn">人才招聘</a></li>
        <li><a href="askes.php">联系我们</a></li>
      </ul>
    </div>
</div>
<div id="container">
<form method="post" action="askes.php">
<div id="Send_input">
<h2>在线咨询</h2>
<p><b>公司名称:</b><input name="company" id="company" type="text" size="60" class="required"/></p>
<p><b>事业部:</b><input type="text"  name="department" id="department"></input></p>
<p><b>部门:</b><input id="division" name="division" type="text" class="required"/></p>
<p><b>联系人:</b><input id="name" name="name" type="text" class="required"/></p>
<p><b>邮编:</b><input name="Zipcode" id="Zipcode" type="text" /></p>
<p><b>地址:</b><input id="addres" name="address" type="text" class="required"/></p>
<p><b>电话:</b><input id="phones" name="phones" type="text" class="required"/></p>
<p><b>Fax:</b><input id="fax" name="fax" type="text" class="required"/></p>
<p><b>QQ:</b><input id="QQ" name="QQ" type="text"/></p>
<p><b>Email:</b><input id="Email" name="Email" type="text" class="required"/></p>
<p><b>咨询内容:</b><TEXTAREA  id="centent" name="centent" type="text" rows="6" class="required"></TEXTAREA></p>

<p><b>&nbsp;</b><input type="submit" value="提 交" id="send"/>   <input name="重置" type="reset" value="取 消" id="res" /></p>
</div>
</form
></div>
<div id="footer">
<p>Copyright © 2012 PRIX Rentec Corporationhn All Reserved.</p>
</div>
</div>

</body>

</html> 