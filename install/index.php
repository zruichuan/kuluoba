<?php
header('Content-Type: text/html; charset=utf-8');
$CMSPATH = dirname(dirname(strtr(__FILE__,'\\','/')));
$dbconfigfile=$CMSPATH.'/data/database.inc.php';
if(is_file($dbconfigfile)){
	echo "<p align='center'>系统已经安装!<br>请删除文件 /data/database.inc.php 后才可以重新安装！</p>";
	exit();
}

if(isset($_POST['dbhost'])){
	if(trim($_POST['dbname']) == "" || trim($_POST['dbhost']) == "" || trim($_POST['dbuser']) == "" ){
		echo "
		<p align='center'>请返回并确认所有选项均已填写.<br><br>
		 <input class=\"formbutton\" type=\"button\" value=\"上一步\" onclick=\"history.back(1)\" />
		</p>";
		exit();
	} elseif(!@mysql_connect($_POST['dbhost'],$_POST['dbuser'],$_POST['dbpwd'])) {
		echo "
		 <p align='center'>数据库连接失败.<br><br>
		 <input class=\"formbutton\" type=\"button\" value=\"上一步\" onclick=\"history.back(1)\" />
		</p>";
		exit();
	} elseif(!@mysql_select_db($_POST['dbname'])&&!$_POST['create']) {
		echo "
		 <p align='center'>数据库不存在.<br><br>
		 <input class=\"formbutton\" type=\"button\" value=\"上一步\" onclick=\"history.back(1)\" />
		</p>";
		exit();
	}
	
	$dbhost 	= trim($_POST['dbhost']);
	$dbuser 	= trim($_POST['dbuser']);
	$dbpwd 		= trim($_POST['dbpwd']);
	$dbname 	= trim($_POST['dbname']);
	$dbcharset	= trim($_POST['dbcharset']);
	
	//读取安装sql
	$installSQL='install.sql';
	$file_sql = openfile($installSQL);

	//如果数据库不存在，创建数据库
	if(!@mysql_select_db($dbname)&&$_POST['create']){
		$database=addslashes($dbname);
		if(version_compare(mysql_get_server_info(), '4.1.0', '>=')){
			$DATABASESQL="DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
		}
		mysql_query("CREATE DATABASE `$database` ".$DATABASESQL);
		@mysql_select_db($database);
	}
	
	mysql_query("set names utf8"); 
	echo "<div style='width:100%;text-align:center'>";
	echo "<p style='width:400px;text-align:left'>";
	//创建表结构和数据
	runquery($file_sql);
	//生成数据库配置文件
	$config_str = "<?php
//数据库配置文件
define ('DB_TYPE','mysql');
define ('DB_HOST','$dbhost');
define ('DB_USER','$dbuser');
define ('DB_PWD','$dbpwd');
define ('DB_NAME','$dbname');
define ('DB_CHARSET','$dbcharset');
?>";
	$fp_config = fopen($dbconfigfile,'wb'); //以二进制追加方式打开文件,没文件就创建 
	fwrite($fp_config, $config_str); //插入第一条记录 
	fclose($fp_config); //关闭文件 
	
	echo "</p>
	<p>安装结束！ 后台管理默认 用户名 admin 密码 admin</p>
	<p><a href='../admin/'>后台管理</a> <a href='../'>网站首页</a></p>
	</div>";
	exit();
}

function openfile($filename,$method="rb"){
	if($handle=@fopen($filename,$method)){
		flock($handle,LOCK_SH);
		$filedata=@fread($handle,filesize($filename));
		fclose($handle);
	}
	return $filedata;
}


function runquery($sql) {
	$ret = array();
	$num = 0;
	foreach(explode(";\r", trim($sql)) as $query) {
		
		$queries = explode("\n", trim($query));
		foreach($queries as $query) {
			$ret[$num] .= ($query[0] == '-'&&$query[1] == '-') ? '' : $query;
		}
		$num++;
	}
	
	unset($sql);
	foreach($ret as $query) {
		$query = trim($query);
		if($query) {
			if(substr($query, 0, 12) == 'CREATE TABLE') {
				preg_match("|CREATE TABLE `(.*)` \(|i",$query, $name);
				if(mysql_query(($query))){
					echo '创建表 '.$name[1].' ... <font color="#0000EE">成功</font><br />';flush();
				}else{
					echo '创建表 '.$name[1].' ... <font color="#0000EE">'.mysql_error().'</font><br />';flush();
				}			
			}else{
				if(!mysql_query($query)){
					echo mysql_error()."<br>";
				}
			}
		}
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>汇菱CMS安装</title>
</head>
<body>
<form method="post" action="<?php echo $PHP_SELF;?>">
  <table width="516" border="1" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="2"><span class="title"><strong>数据库信息</strong></span></td>
    </tr>
    <tr>
      <td width="30%" align="right">服务器地址:</td>
      <td><input type="text" value="localhost" name="dbhost" />
        一般是 localhost</td>
    </tr>
    <tr>
      <td width="30%" align="right">数据库名:</td>
      <td><input name="dbname" type="text" value="phpaa" />
        <input name="create" type="checkbox" id="create" value="1"/>
        创建新数据库</td>
    </tr>
    <tr>
      <td width="30%" align="right">数据库用户名:</td>
      <td><input name="dbuser" type="text" value="root" /></td>
    </tr>
    <tr>
      <td width="30%" align="right">数据库用户密码:</td>
      <td><input type="password" value="" name="dbpwd" id="dbpwd" /></td>
    </tr>
    <tr>
      <td align="right">数据表编码:</td>
      <td><select name="dbcharset" id="dbcharset">
          <option value="utf8" selected="selected">UTF-8</option>
        </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td height="50"><input class="formbutton" type="submit" value="下一步" />
        &nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
