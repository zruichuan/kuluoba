<?php
require_once ("admin.inc.php");
require_once ("admin.function.php");
$id 			= trim ( $_GET ['id'] ) ? trim ( $_GET ['id'] ) : 0;
$keywords 		= trim($_GET['keywords']);
$page 			= $_GET ['page'] ? $_GET ['page'] : 1;
$page_size 		= 10;

$where="a.delete_session_id is null";
if($id){
	$where.=" and a.cid=" . $id;
}
if($keywords){
	$where.=" and (a.title like '%".$keywords."%' or a.content like '%".$keywords."%')";
}
$sql_string = "select a.*,b.name as cname,c.username from cms_article a 
			left outer join cms_category b on a.cid=b.id
			left outer join cms_users c on a.created_by=c.userid
			where ".$where." order by a.id desc";
$total_nums = $db->getRowsNum ( $sql_string );
$mpurl 	= "article.php?id=" . $id."&keywords=".$keywords;
$article_list = $db->selectLimit ( $sql_string, $page_size, ($page - 1) * $page_size );
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>文章管理</title>
<link href="images/css.css" rel="stylesheet" type="text/css">
<script src="../include/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
function doAction(a,id){
	ids = 0;
	if(a=='deleteAll'){
		if(confirm('请确认是否删除！')){
			$.ajax({
				url:'article.action.php',
				type: 'POST',
				data:'act=delete&id='+getCheckedIds('checkbox'),
				success: function(data){
					window.location.href = window.location.href;
				}
			});
		}
	}
	if(a=='delete'){
		if(confirm('请确认是否删除！')){
			$.ajax({
				url:'article.action.php',
				type: 'POST',
				data:'act=delete&id='+id,
				success: function(data){
					window.location.href = window.location.href;
				}
			});
		}
	}
	if(a=='moveAll'){
		scid = document.getElementById("selectCid").value;
		if(confirm('请确认是否转移！')){
			$.ajax({
				url:'article.action.php',
				type: 'POST',
				data:'act=move&scid='+scid+'&id='+getCheckedIds('checkbox'),
				success: function(data){
					window.location.href = window.location.href;
				}
			});
		}
	}
}
//全选/取消
function checkAll(o,checkBoxName){
	var oc = document.getElementsByName(checkBoxName);
	for(var i=0; i<oc.length; i++) {
		if(o.checked){
			oc[i].checked=true;	
		}else{
			oc[i].checked=false;	
		}
	}
	checkDeleteStatus(checkBoxName)
}
//检查有选择的项，如果有删除按钮可操作
function checkDeleteStatus(checkBoxName){
	var oc = document.getElementsByName(checkBoxName);
	for(var i=0; i<oc.length; i++) {
		if(oc[i].checked){
			document.getElementById('DeleteCheckboxButton').disabled=false;
			document.getElementById('updateCategoryButton').disabled=false;
			document.getElementById('selectCid').disabled=false;
			
			return;
		}
	}
	document.getElementById('DeleteCheckboxButton').disabled=true;
	document.getElementById('updateCategoryButton').disabled=true;
	document.getElementById('selectCid').disabled=true;
}

//获取所有被选中项的ID组成字符串
function getCheckedIds(checkBoxName){
	var oc = document.getElementsByName(checkBoxName);
	var CheckedIds = "";
	for(var i=0; i<oc.length; i++) {
		if(oc[i].checked){
			if(CheckedIds==''){
				CheckedIds = oc[i].value;	
			}else{
				CheckedIds +=","+oc[i].value;	
			}
			
		}
	}
	return CheckedIds;
}
</script>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td valign="top" style="padding:10px;"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="serach">
        <tr>
          <td height="40">当前位置》系统首页
  </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_head">
        <tr>
          <td height="31">统计信息</td>
        </tr>
      </table>
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_form">
        <tr onMouseOver="this.className='relow'" onMouseOut="this.className='row'" class="row">
          <td align="left" width="50%">新闻数量：【<?php echo getArticleNumOfCategory(1,cms_article)?>】篇</td>
          <td height="26" align="left" width="50%">知识库：【<?php echo getArticleNumOfCategory(16,cms_article)?>】篇</td>
        </tr>
           <tr onMouseOver="this.className='relow'" onMouseOut="this.className='row'" class="row">
          <td align="left" width="50%">案例数量：【<?php echo getArticleNumOfCategory(1,cms_case)?>】</td>
          <td height="26" align="left" width="50%">留言咨询：共【<?php echo getzixunNumOfCategory(1,cms_problems)?>】条  ；<a href="manager.php">未阅读</a>【<?php echo getzixunNumOfCategory(0,cms_problems)?>】条</td>
      </table>
	 <?php 
	  //栏目下文章数
function getArticleNumOfCategory($id,$table) {
	global $db;
	$sql = "SELECT id FROM $table where cid=" . $id . " and delete_session_id IS NULL";
	return $db->getRowsNum ( $sql );
}
//留言条数
function getzixunNumOfCategory($validate,$table) {
	global $db;
	if($validate==0)
	{
	$sql = "SELECT id FROM $table where validate=".$validate." ";
	}
	else
	{
			$sql = "SELECT id FROM $table";

		}
	return $db->getRowsNum ( $sql );
}
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" height="15px;" class="table_footer">
        <tr>
          <td>
           </td>
        </tr>
      </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:10px;" class="table_head">
        <tr>
          <td height="31">系统信息</td>
        </tr>
      </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_form">
        <tr onMouseOver="this.className='relow'" onMouseOut="this.className='row'" class="row">
          <td height="26" width="50%">【操作系统】:<?php echo PHP_OS;?></td>
          <td height="26" width="50%" align="left">【web服务器】:<?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
        
        </tr>
              <tr onMouseOver="this.className='relow'" onMouseOut="this.className='row'" class="row">
          <td height="26" width="50%">【GD】<?php 
$rel=gd_info();
echo $rel['GD Version'];
echo "支持图片";
echo ($rel['GIF Read Support']&&$rel['GIF Create Support'])?'gif/':'';
echo ($rel['JPG Support'])?'jpeg/':'';
echo ($rel['PNG Support'])?'png':'';
unset($rel);
?></td>
          <td height="26" width="50%" align="left">【安全模式】<?php echo ini_get('safe_mode') ? '是':'否';?></td>
        
        </tr>
              <tr onMouseOver="this.className='relow'" onMouseOut="this.className='row'" class="row">
          <td height="26" width="50%">【上传文件最大值(服务器)】<?php echo ini_get('upload_max_filesize');;?></td>
          <td height="26" width="50%" align="left">【编码】UTF-8(唯一)</td>
        
        </tr>
      </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" height="15px;" class="table_footer">
        <tr>
          <td>
           </td>
        </tr>
      </table>
     </td>
  </tr>
</table>
</body>
</html>
