<?php
require_once ("admin.inc.php");
$id 			= trim ( $_GET ['id'] ) ? trim ( $_GET ['id'] ) : 0;
$friendlink_list = $db->getList("select * from cms_problems where ID=".$id." order by id desc");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>文章管理</title>
<link href="images/css.css" rel="stylesheet" type="text/css">
<script src="../include/js/jquery.js" type="text/javascript" ></script>
<style type="text/css">
<!--
.STYLE1 {
	color: #FF0000
}
.menu{
width:100px;
text-align:center;}
-->
</style>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td valign="top" style="padding:10px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_head">
        <tr>
		   <td height="30">留言详细 
            &nbsp;&nbsp;&nbsp;</td>
        </tr>
      </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_form">
        <?php
	foreach ($friendlink_list as $list){

  ?>
     <tr>
	 <td class="menu">留言用户名</td>
	 <td><?php echo $list['name'] ?></td>
	 </tr>
     <tr>
	 <td class="menu">留言内容</td>
	 <td><?php echo $list['centent'] ?></td>
	 </tr>
      <tr>
	 <td class="menu">Email</td>
	 <td><?php echo $list['Email'] ?></td>
	 </tr>
     <tr>
	 <td class="menu">电话</td>
	 <td><?php echo $list['phone'] ?></td>
	 </tr>
	 <tr>
	 <td class="menu">留言时间</td>
	 <td><?php echo $list['date'] ?></td>
	 </tr>
     
        <?php
			if($list['validate']==0){
			  $id = $_GET ['id'];
			  $record = array(
		      'validate'=>1
			  );  
          $db->update('cms_problems',$record,'ID='.$id);
	 }
	}
  ?>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_footer">
        <tr>
          <td height="3" colspan="2" background="../../PHPAACMS/admin/images/20070907_03.gif">
		  <a href="manager.php" style="background:url(images/btn_bg2.gif) no-repeat center; display:block; height:23px; width:70px; text-align:center; line-height:23px; color:#000000; text-decoration:none;">返回</a>
		 </td>
        </tr>
      </table></td>
  </tr>
</table>
<?php

?>
</body>
</html>
