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
		'created_by'	=>$_COOKIE['userid'],
		'price'      =>$_POST ['price'],
		'area'        =>$_POST ['area'],
		'housetype'   =>$_POST ['housetype'],
		'floor'       =>$_POST ['floor'],
		'totalfloor'       =>$_POST ['totalfloor'],
		'constructiontime'       =>$_POST ['constructiontime'],
		'traffic'                =>$_POST ['traffic'],
		'shobject'               =>$_POST ['shobject'],
		'supermarket'            =>$_POST ['supermarket'],
		'conveniencestore'       =>$_POST ['conveniencestore'],
		'restaurant'             =>$_POST ['restaurant'],
		'hospital'               =>$_POST ['hospital'],
		'atrioventricular'       =>$_POST ['atrioventricular'],
		'region'                 =>$_POST ['region'],
		'elevator'               =>$_POST ['elevator'],
		'parking'                =>$_POST ['parking'],
		'air_cood'                =>$_POST ['air_cood'],
		'air_cood_time'                =>$_POST ['air_cood_time'],
		'bank'                =>$_POST ['bank'],
		'hotel'                =>$_POST ['hotel'],
		'share'                =>$_POST ['share'],
		'management'                =>$_POST ['management'],
		'subway'                =>$_POST ['subway'],
		'xxarea'                =>$_POST ['xxarea'],
		'yugang'                =>$_POST ['yugang'],
		'map'                   =>$_POST ['map'],
		'address'                   =>$_POST ['address'],
		'gym'                   =>$_POST ['gym'],
		'swimming'                   =>$_POST ['swimming'],
		'total_amount'                   =>$_POST ['total_amount'],
		'subways'              =>$_POST ['subways'],
		'elevated'             =>$_POST ['elevated']
	);
	if(!empty($_FILES['pic']['name'])){
		$upload_file = uploadImg();		//上传图片，返回地址
		$record['pic']=$upload_file;
	}
	if(!empty($_FILES['hxpic']['name'])){
		$upload_file = uploadImg2();		//上传图片，返回地址
		$record['hxpic']=$upload_file;
	}

	$id = $db->insert('cms_case',$record);
	header("Location: cases.php?id=".$_POST['cid']);
}
//拷贝
if ($act=='coby') {
	if(empty($_POST['title'])){
		exit("<script>alert('标题不能为空!');window.history.go(-1)</script>");
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
		'created_by'	=>$_COOKIE['userid'],
		'price'      =>$_POST ['price'],
		'area'        =>$_POST ['area'],
		'housetype'   =>$_POST ['housetype'],
		'floor'       =>$_POST ['floor'],
		'totalfloor'       =>$_POST ['totalfloor'],
		'constructiontime'       =>$_POST ['constructiontime'],
		'traffic'                =>$_POST ['traffic'],
		'shobject'               =>$_POST ['shobject'],
		'supermarket'            =>$_POST ['supermarket'],
		'conveniencestore'       =>$_POST ['conveniencestore'],
		'restaurant'             =>$_POST ['restaurant'],
		'hospital'               =>$_POST ['hospital'],
		'atrioventricular'       =>$_POST ['atrioventricular'],
		'region'                 =>$_POST ['region'],
		'elevator'               =>$_POST ['elevator'],
		'parking'                =>$_POST ['parking'],
		'air_cood'                =>$_POST ['air_cood'],
		'air_cood_time'                =>$_POST ['air_cood_time'],
		'bank'                =>$_POST ['bank'],
		'hotel'                =>$_POST ['hotel'],
		'share'                =>$_POST ['share'],
		'management'                =>$_POST ['management'],
		'subway'                =>$_POST ['subway'],
		'xxarea'                =>$_POST ['xxarea'],
		'yugang'                =>$_POST ['yugang'],
		'map'                   =>$_POST ['map'],
		'address'                   =>$_POST ['address'],
		'gym'                   =>$_POST ['gym'],
		'swimming'                   =>$_POST ['swimming'],
		'total_amount'                   =>$_POST ['total_amount'],
		'subways'              =>$_POST ['subways'],
		'elevated'             =>$_POST ['elevated']


	);
	if(!empty($_FILES['pic']['name'])){
		$upload_file = uploadImg();		//上传图片，返回地址
		$record['pic']=$upload_file;
	}
	if(!empty($_FILES['hxpic']['name'])){
		$upload_file = uploadImg2();		//上传图片，返回地址
		$record['hxpic']=$upload_file;
	}

	$id = $db->insert('cms_case',$record);
	header("Location: cases.php?id=".$_POST['cid']);
}

//修改
if ($act=='edit'){
	$id = $_POST ['id'];
	if(empty($_POST['title'])){
		exit("<script>alert('标题不能为空!');window.history.go(-1)</script>");
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
		'pubdate'	              =>date ( "Y-m-d H:i:s" ),
		'created_date'        	=>date ( "Y-m-d H:i:s" ),
		'created_by'          	=>$_COOKIE['userid'],
		'price'                 =>$_POST ['price'],
		'area'                   =>$_POST ['area'],
		'housetype'   =>$_POST ['housetype'],
		'floor'                  =>$_POST ['floor'],
		'totalfloor'             =>$_POST ['totalfloor'],
		'constructiontime'       =>$_POST ['constructiontime'],
		'traffic'                =>$_POST ['traffic'],
		'shobject'               =>$_POST ['shobject'],
		'supermarket'            =>$_POST ['supermarket'],
		'conveniencestore'       =>$_POST ['conveniencestore'],
		'restaurant'             =>$_POST ['restaurant'],
		'hospital'               =>$_POST ['hospital'],
		'atrioventricular'       =>$_POST ['atrioventricular'],
		'region'                 =>$_POST ['region'],
		'elevator'               =>$_POST ['elevator'],
		'parking'                =>$_POST ['parking'],
		'air_cood'               =>$_POST ['air_cood'],
		'air_cood_time'          =>$_POST ['air_cood_time'],
		'bank'                   =>$_POST ['bank'],
		'hotel'                  =>$_POST ['hotel'],
		'share'                  =>$_POST ['share'],
		'management'             =>$_POST ['management'],
		'subway'                =>$_POST ['subway'],
		'xxarea'                =>$_POST ['xxarea'],
		'yugang'                =>$_POST ['yugang'],
		'map'                   =>$_POST ['map'],
		'address'                   =>$_POST ['address'],
		'gym'                   =>$_POST ['gym'],
		'swimming'                   =>$_POST ['swimming'],
		'total_amount'                   =>$_POST ['total_amount'],
		'subways'              =>$_POST ['subways'],
		'elevated'             =>$_POST ['elevated']


	
	);
	if(!empty($_FILES['pic']['name'])){
		$upload_file = uploadImg();		//上传图片，返回地址
		$record['pic']=$upload_file;
	}
		if(!empty($_FILES['hxpic']['name'])){
		$upload_file = uploadImg2();		//上传图片，返回地址
		$record['hxpic']=$upload_file;
	}

	$db->update('cms_case',$record,'id='.$id);
	header("Location: cases.php?id=".$_POST['cid']);
}

//删除
if ($act=='delete') {	
	$id = $_POST ['id'];
	$db->update('cms_case',array('delete_session_id'=>$_COOKIE['userid']),'id in('.$id.')');
	exit();
}

//转移文章
if ($act=='move') {	
	$scid =$_POST['scid'];
	$id = $_POST ['id'];
	$db->update('cms_case',array('cid'=>$scid),'id in('.$id.')');
	exit();
}

//删除缩略图
if ($act=='delpic') {
	$id = $_POST ['id'];
	$pic_path = $db->getOneField("select pic from cms_case where id=".$id);

	if(is_file(ROOT_PATH.$pic_path)){
		@unlink(ROOT_PATH.$pic_path);
	}
	$db->update('cms_case',array('pic'=>''),'id in('.$id.')');
	exit();
}
//删除户型图
if ($act=='delhxpic') {
	$id = $_POST ['id'];
	$pic_path = $db->getOneField("select hxpic from cms_case where id=".$id);

	if(is_file(ROOT_PATH.$pic_path)){
		@unlink(ROOT_PATH.$pic_path);
	}
	$db->update('cms_case',array('hxpic'=>''),'id in('.$id.')');
	exit();
}

//彻底删除垃圾
if ($act=='cdelete') {	
	$id = $_POST ['id'];
	$db->delete('cms_case','id in('.$id.')');
	exit();
}

//还原垃圾
if ($act=='revert') {	
	$id = $_POST ['id'];
	$db->query("UPDATE cms_case set delete_session_id = null where id in (".$id.")");
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

function uploadImg2(){
	global $upload_dir;
	$AllowedExtensions = array('bmp','gif','jpeg','jpg','png');
	$Extensions = end(explode(".",$_FILES['hxpic']['name']));
	if(in_array($Extensions,$AllowedExtensions)){
		$file_name = date('YmdHis').rand(10,99).'.'.$Extensions;
		$upload_file = $upload_dir.$file_name;
		$upload_absolute_file = ROOT_PATH.$upload_file;
		if (move_uploaded_file($_FILES['hxpic']['tmp_name'], $upload_absolute_file)) {
			return $upload_file;
		}
	}else{
		exit("<script>alert('缩略图格式错误！只支持后缀名为bmp,gif,jpeg,jpg,png 的文件');window.history.go(-1)</script>");
	}
}

?>