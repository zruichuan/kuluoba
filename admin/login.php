<?php
if(isset($_COOKIE['username'])){
	$username = $_COOKIE['username'];
}else{
	$username="";
}
$finput=empty($username)?"username":"password";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理工作平台</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript">
function init(){
	document.getElementById('<?php echo $finput;?>').select();
	document.getElementById('<?php echo $finput;?>').focus();
}
</script>
</head>
<body onLoad="init()">
<div id="top"> </div>
<form id="login" name="login" action="login.action.php" method="post">
  <div id="center">
    <div id="center_left"></div>
    <div id="center_middle">
	<br />
      <div class="user">
        <label>用户名：
        <input type="text" name="username" id="username" value="<?php echo $username;?>" />
        </label>
      </div>
	  <br />
      <div class="user">
        <label>密　码：
        <input type="password" name="password" id="password" />
        </label>
      </div>
<!--      <div class="chknumber">
        <label>验证码：
        <input name="chknumber" type="text" id="chknumber" maxlength="4" class="chknumber_input" />
        </label>
        <img src="images/checkcode.png" id="safecode" />
      </div>-->
    </div>
    <div id="center_middle_right"></div>
    <div id="center_submit">
      <div class="button"><input name="image" type="image" src="images/dl.gif" style="width:57px; height:20px;" /></div>
      <div class="button"> <img src="images/cz.gif" width="57" height="20" onclick="form_reset()"> </div>
    </div>
    <div id="center_right"></div>
  </div>
</form>
<div id="footer"></div>
</body>
</html>
