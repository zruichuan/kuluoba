<?php
include ("admin.inc.php");
if(isset($_POST['name'])){
	$str = "array(
	\"name\"			=>\"".$_POST['name']."\",
	\"url\"			=>\"".$_POST['url']."\",
	\"keywords\"		=>\"".$_POST['keywords']."\",
	\"description\"	=>\"".$_POST['description']."\",
	\"icp\"			=>\"".$_POST['icp']."\",
	\"masteremail\"	=>\"".$_POST['masteremail']."\"
);";
	$str=
"<?php
\$config=".str_replace("\$", "\\$", $str)."
?>";
	$fp = fopen(ROOT_PATH."data/website.inc.php",'wb'); //以二进制追加方式打开文件,没文件就创建 
	fwrite($fp, $str); //插入第一条记录 
	fclose($fp); //关闭文件
	echo "<script>
	alert('保存成功!');
	window.location.href='webconfig.php';
	</script>";
} 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
<link href="images/css.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="document.getElementById('name').focus()">
<table width="100%" border="0" align="center" cellpadding="0"
	cellspacing="0">
	<tr>
		<td width="*" height="1299" valign="top" style="padding: 10px;">
		<form action="webconfig.php" method="post" name="form1">
		<table width="100%" border="0" cellpadding="0" cellspacing="0" >
          <tr>
            <td valign="top" style="padding:10px;"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="form_title">
                  <tr>
                    <td height="31"><strong>系统信息</strong></td>
                  </tr>
                </table>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                  <tr>
                    <td width="200" height="40" align="right" class="form_list">网站名称 ：</td>
					<td class="form_list"><input name="name" type="text" class="form" style="width: 300px" value="<?php echo $config ['name'];?>"></td>
				  </tr>
					<tr>
						<td height="40" align="right" class="form_list">网站地址：</td>
					  <td class="form_list"><input name="url" type="text" class="form" style="width: 300px" value="<?php echo $config ['url'];?>"></td>
				</tr>
					<tr>
						<td height="40" align="right" class="form_list">关键字：</td>
					  <td class="form_list"><input name="keywords" type="text" class="form" style="width: 300px" value="<?php echo $config ['keywords'];?>"></td>
				</tr>
					<tr>
						<td height="40" align="right" class="form_list">网站描述：</td>
				<td class="form_list"><textarea name="description" class="form" style="width:300px; height: 50px; overflow: auto"><?php echo trim ( $config ['description'] );?></textarea>						</tr>
					
					<tr>
                      <td height="40" align="right" class="form_list">ICP备案号：</td>
					  <td height="40" class="form_list"><input name="icp" type="text" class="form" style="width: 300px" value="<?php echo $config ['icp'];?>"></td>
			    </tr>
					<tr>
					  <td height="40" align="right" class="form_list">管理员邮箱：</td>
				      <td height="40" class="form_list"><input name="masteremail" type="text" class="form" style="width: 300px" value="<?php echo $config ['masteremail'];?>"></td>
                  </tr>
                </table>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="form_title">
                  <tr>
                    <td width="200" height="31" align="center">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><input name="Submit" type="submit" class="submit1" value=" 提　交 " /></td>
                  </tr>
            </table></td>
          </tr>
        </table>
		<p>&nbsp;</p>
		</form>
		</td>
	</tr>
</table>
</body>
</html>
