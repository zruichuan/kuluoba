<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chili-1.7.pack.js"></script>
<script type="text/javascript" src="js/jquery.easing.js"></script>
<script type="text/javascript" src="js/jquery.dimensions.js"></script>
<script type="text/javascript" src="js/jquery.accordion.js"></script>
<script language="javascript">
	jQuery().ready(function(){
		jQuery('#navigation').accordion({
			header: '.head',
			navigation1: true, 
			event: 'click',
			fillSpace: true,
			animated: 'bounceslide'
		});
	});
</script>
<style type="text/css">
<!--
body {
	margin:0px;
	padding:0px;
	font-size: 12px;
}
#navigation {
	margin:0px;
	padding:0px;
	width:147px;
}
#navigation a.head {
	cursor:pointer;
	background:url(images/main_34.gif) no-repeat scroll;
	display:block;
	font-weight:bold;
	margin:0px;
	padding:5px 0 5px;
	text-align:center;
	font-size:12px;
	text-decoration:none;
}
#navigation ul {
	border-width:0px;
	margin:0px;
	padding:0px;
	text-indent:0px;
}
#navigation li {
	list-style:none; display:inline;
}
#navigation li li a {
	display:block;
	font-size:12px;
	text-decoration: none;
	text-align:center;
	padding:3px;
}
#navigation li li a:hover {
	background:url(images/tab_bg.gif) repeat-x;
		border:solid 1px #adb9c2;
}
-->
</style>
</head>
<body>
<div  style="height:100%;">
  <ul id="navigation">
    <li> <a class="head">内容管理</a>
      <ul>
        <li><a href="article.add.php?act=add" target="rightFrame">添加文章</a></li>
        <li><a href="article.php" target="rightFrame">管理文章</a></li>
		<li><a href="category.php" target="rightFrame">栏目管理</a></li>
	     <li><a href="article.rubbish.php" target="rightFrame">垃圾箱管理</a></li>
      </ul>
    </li>
        <li> <a class="head">房源管理</a>
      <ul>
        <li><a href="cases.add.php?act=add" target="rightFrame">添加案例</a></li>
        <li><a href="cases.php" target="rightFrame">管理案例</a></li>
		<li><a href="case.php" target="rightFrame">栏目管理</a></li>
	     <li><a href="cases.rubbish.php" target="rightFrame">垃圾箱管理</a></li>
      </ul>
    </li>
    <li style="display:<?php echo $_COOKIE['system_id']==2?'none':'block';?>"> <a class="head">网站管理</a>
      <ul>
<!--        <li><a href="notice.php" target="rightFrame">公告管理</a></li>
        <li><a href="message.php" target="rightFrame">留言管理</a></li>
-->		 <li><a href="manager.php" target="rightFrame">咨询咨询</a></li>
      </ul>
    </li>
    <li> <a class="head">友情链接管理</a>
      <ul>
        <li><a href="friendlink.add.php?act=add" target="rightFrame">添加友情链接</a></li>
        <li><a href="friendlink.php" target="rightFrame">查看/修改友情链接</a></li>
      </ul>
    </li>
	 <li style="display:<?php echo $_COOKIE['system_id']==2?'none':'block';?>"> <a class="head">系统管理</a>
      <ul>
        <li><a href="user.php" target="rightFrame">管理员账号</a></li>
        <li><a href="webconfig.php" target="rightFrame">网站设置</a></li>
      </ul>
    </li>
    <li> <a class="head">版本信息</a>
      <ul>
        <li><a href="http://www.huilingsh.com" target="_blank">by huiling(www.huilingsh.com)</a></li>
      </ul>
    </li>
  </ul>
</div>
</body>
</html>
