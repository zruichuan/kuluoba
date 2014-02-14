<?php
require_once ("admin.inc.php");

$act = trim($_POST ['act']);

//定义并创建图片上传路径
$upload_dir = 'data/attachment/image/'.date('Ym').'/';
!is_dir(ROOT_PATH.$upload_dir)&&mkdir(ROOT_PATH.$upload_dir);

//添加
if ($act=='add') {
	if(empty($_POST['title'])){
		exit("<script>alert('标题不能为空!');window.history.go(-1)</script>");
	}
	if(empty($_POST['cid'])){
		exit("<script>alert('栏目不能为空!');window.history.go(-1)</script>");
	}
	$record = array(
		'cid'			=>$_POST ['cid'],
		'title'			=>$_POST ['title'],
		'subtitle'		=>$_POST ['subtitle'],
		'att'			=>is_array($_POST ['att'])?implode(',',$_POST ['att']):'',
		'source'		=>$_POST ['source'],
		'author'		=>$_POST ['author'],
		'resume'		=>$_POST ['resume'],
		'content'		=>$_POST ['content'],
		'pubdate'		=>date ( "Y-m-d H:i:s" ),
		'created_date'	=>date ( "Y-m-d H:i:s" ),
		'created_by'	=>$_COOKIE['userid']	
	);
	if(!empty($_FILES['pic']['name'])){
		$upload_file = uploadImg();		//上传图片，返回地址
		$record['pic']=$upload_file;
	}
	$id = $db->insert('cms_article',$record);
	header("Location: article.php?id=".$_POST['cid']);
}

//修改
if ($act=='edit'){
	$id = $_POST ['id'];
	if(empty($_POST['title'])){
		exit("<script>alert('标题不能为空!');window.history.go(-1)</script>");
	}
	if(empty($_POST['cid'])){
		exit("<script>alert('栏目不能为空!');window.history.go(-1)</script>");
	}	
	
	$record = array(
		'cid'			=>$_POST ['cid'],
		'title'			=>$_POST ['title'],
		'subtitle'		=>$_POST ['subtitle'],
		'att'			=>is_array($_POST ['att'])?implode(',',$_POST ['att']):'',
		'source'		=>$_POST ['source'],
		'author'		=>$_POST ['author'],
		'resume'		=>$_POST ['resume'],
		'content'		=>$_POST ['content'],
		'pubdate'	=>date ( "Y-m-d H:i:s" ),
		'created_date'	=>date ( "Y-m-d H:i:s" ),
		'created_by'	=>$_COOKIE['userid']	
	);
	if(!empty($_FILES['pic']['name'])){
		$upload_file = uploadImg();		//上传图片，返回地址
		$record['pic']=$upload_file;
	}
	$db->update('cms_article',$record,'id='.$id);
	header("Location: article.php?id=".$_POST['cid']);
}

//删除
if ($act=='delete') {	
	$id = $_POST ['id'];
	$db->update('cms_article',array('delete_session_id'=>$_COOKIE['userid']),'id in('.$id.')');
	exit();
}

//转移文章
if ($act=='move') {	
	$scid =$_POST['scid'];
	$id = $_POST ['id'];
	$db->update('cms_article',array('cid'=>$scid),'id in('.$id.')');
	exit();
}

//删除缩略图
if ($act=='delpic') {
	$id = $_POST ['id'];
	$pic_path = $db->getOneField("select pic from cms_article where id=".$id);
	$pic_path = $db->getOneField("select pic from cms_article where id=".$id);
	if(is_file(ROOT_PATH.$pic_path)){
		@unlink(ROOT_PATH.$pic_path);
	}
	$db->update('cms_article',array('pic'=>''),'id in('.$id.')');
	exit();
}

//彻底删除垃圾
if ($act=='cdelete') {	
	$id = $_POST ['id'];
	$db->delete('cms_article','id in('.$id.')');
	exit();
}

//还原垃圾
if ($act=='revert') {	
	$id = $_POST ['id'];
	$db->query("UPDATE cms_article set delete_session_id = null where id in (".$id.")");
}



/***********************************
			删除图片函数
***********************************/
function uploadImg(){
	global $upload_dir;
	$AllowedExtensions = array('bmp','gif','jpeg','jpg','png');
	$Extensions = end(explode(".",$_FILES['pic']['name']));
	if(in_array($Extensions,$AllowedExtensions)){
		$file_name = date('YmdHis').rand(10,99).'.'.$Extensions;
		$upload_file = $upload_dir.$file_name;
		$upload_absolute_file = ROOT_PATH.$upload_file;
		if (move_uploaded_file($_FILES['pic']['tmp_name'], $upload_absolute_file)) {
			return $upload_file;
		}
	}else{
		exit("<script>alert('缩略图格式错误！只支持后缀名为bmp,gif,jpeg,jpg,png 的文件');window.history.go(-1)</script>");
	}
}
?>