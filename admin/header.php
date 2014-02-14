<?php
include_once 'admin.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="images/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function editPassword(){
	//alert('演示系统不能修改');
	parent.mainFrame.location="user.editpwd.php?act=editpwd&hlink="+encodeURIComponent(parent.mainFrame.location);
}
</script>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="page_top_bg">
  <tr>
    <td width="162" rowspan="3" align="center" valign="top" style="border-bottom:1px solid #B8D0DA;"><img src="images/logo.gif" style="cursor:pointer" onclick="parent.window.location='index.php'" /></td>
    <td height="22" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="400" height="30"><div class="top_nav"><a href="index.php" target="_parent">首页</a></div></td>
    <td align="right" style="padding-right:10px; font-size:12px">欢迎：<?php echo $_COOKIE['username'];?> <a href="javascript:editPassword()" class="STYLE1"> </a> <a href="javascript:editPassword()">修改密码</a>&nbsp; <a href="login.out.php">注销系统</a>&nbsp; <a href="../index.php" target="_blank">站点首页</a> &nbsp;&nbsp;&nbsp;&nbsp; </td>
  </tr>
  <tr>
    <td colspan="2" class="top_nav02">&nbsp;</td>
  </tr>
</table>
</body>
</html>
