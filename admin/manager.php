<?php
require_once ("admin.inc.php");
$id 			= trim ( $_GET ['id'] ) ? trim ( $_GET ['id'] ) : 0;
$page 			= $_GET ['page'] ? $_GET ['page'] : 1;
$page_size 		= 13;
$sql_string = "select * from cms_problems order by id desc";
$total_nums = $db->getRowsNum ( $sql_string );
$friendlink_list = $db->selectLimit ( $sql_string, $page_size, ($page - 1) * $page_size );
/*?>
$friendlink_list = $db->getList("select * from cms_problems order by id desc");
*/?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>文章管理</title>
<link href="images/css.css" rel="stylesheet" type="text/css">
<script src="../include/js/jquery.js" type="text/javascript" ></script>
<script type="text/javascript">
function doAction(a,id,v){
	if(a=='validate'){
		$.ajax({
			url:'manager.action.php',
			type: 'POST',
			data:'act=validate&id='+id+'&validate='+v,
			success: function(data){
				if(data) alert(data);
				window.location.href = window.location.href;
			}
		});
}
if(a=='deleteAll'){
		if(confirm('请确认是否删除！')){
			$.ajax({
				url:'manager.action.php',
				type: 'POST',
				data:'act=delete&id='+getCheckedIds('checkbox'),
				success: function(data){
					if(data) alert(data);
					window.location.href = window.location.href;
				}
			});
		}
	}
	if(a=='delete'){
		if(confirm('请确认是否删除！')){
			$.ajax({
				url:'manager.action.php',
				type: 'POST',
				data:'act=delete&id='+id,
				success: function(data){
					if(data) alert(data);
					window.location.href = window.location.href;
				}
			});
		}
	}
}

function reply(id,reply){
	var str 	= "<hr>回复留言<br>";
	str			+= "<textarea id=\"reply_"+id+"\" style=\"width:300px;height:100px\">"+reply+"</textarea>";
	str			+= "&nbsp;<input type=\"button\" value=\"保存\" onclick=\"savereply("+id+")\">";
	document.getElementById('replyDiv'+id).innerHTML=str;
}

function savereply(id){
	var val = document.getElementById('reply_'+id).value;
	$.ajax({
		url:'message.action.php',
		type: 'POST',
		data:'act=reply&id='+id+"&reply="+val,
		success: function(data){
			if(data) alert(data);
			window.location.href = window.location.href;
		}
	});
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
			return;
		}
	}
	document.getElementById('DeleteCheckboxButton').disabled=true;
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
<style type="text/css">
<!--
.STYLE1 {
	color: #FF0000
}
-->
</style>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td valign="top" style="padding:10px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_head">
        <tr>
		   <td height="30">留言管理 
            &nbsp;&nbsp;&nbsp;</td>
        </tr>
      </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_form">
	  <tr>
	  <th><input type="checkbox" name="checkbox11" value="checkbox" onClick="checkAll(this,'checkbox')"></th>
	  <th>标题</th>
	  <th>时间</th>
	  <th>添加者</th>
	  <th>查看</th>
	  <th>操作</th>
	
	  </tr>
        <?php
	foreach ($friendlink_list as $list){
  ?>
        <tr>
		<td align="center"><input type="checkbox" name="checkbox" value="<?php echo $list['ID'];?>" onClick="checkDeleteStatus('checkbox')"></td>
        <td height="26" align="left" style="background-color:#EEEEEE">&nbsp; <font style="color:#009900">第<?php echo $list['ID'];?>条信息&nbsp;<?php echo $list['title'];?>
		<?php if($list['validate']==0){
?>
            <label style="cursor:pointer; color:#FF0000">未阅读</label>
            <?php
}else{
?>
            <label style="cursor:pointer;">已阅读</label>
            <?php
}
?></font></td><td>
		<?php echo $list['date'];?></td><td><font style="color:#0009CC"><?php echo $list['name'];?></font></td>
		<td align="center"><a href="messages.php?id=<?php echo $list['ID'];?>">查看详细</a></td>
          <th width="140" align="center" style="background-color:#EEEEEE">         
           <img src="images/del.gif" alt="删除"
			onClick="doAction('delete',<?php echo $list['ID']?>)"
			style="cursor: pointer"></th>
        </tr>
      
        <?php
	}
  ?>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_footer">
        <tr>
          <td height="3" colspan="2" background="../../PHPAACMS/admin/images/20070907_03.gif">
		  <div style=" float:left"><input type="button" id="DeleteCheckboxButton" value="批量删除" disabled="disabled" onClick="doAction('deleteAll')"></div>
		     <div style="float: right; padding-right: 50px"> <?php echo multi ( $total_nums, $page_size, $page, $mpurl, 0, 5 );?> </div></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
