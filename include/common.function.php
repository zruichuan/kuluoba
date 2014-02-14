<?php
/**
 * 公用函数
 * @author:	phpaa.cn@gmail.com
 */


/*获取栏目导航HTML*/
function getCategoryNavHtml($pid=0){
	$list = getCategoryList($pid);
	$html = "<a href=\"index.php\">首页</a>&nbsp;&nbsp;";
	foreach($list as $ls){
		$html .= "<a href=\"list.php?id=".$ls['id']."\">".$ls['name']."</a>&nbsp;&nbsp;";
	}
	$html .= "<a href=\"message.php\">网站留言</a>&nbsp;&nbsp;<a href=\"manager.php\">留言咨询</a>";
	echo $html;
}

/*获取某个级别栏目列表*/
function getCategoryList($pid=0){
	global $db;
	return $db->getList("select * from cms_category where pid=".$pid);
}


/* 获取公告栏HTML */
function getNoticeListHtml(){
	$html = "";
	$list = getNoticeList();
	$html = "<ul>";
	foreach($list as $ls){
		$html .= "<li><a href=\"notice.php?id=".$ls['id']."\">".$ls['title']."</a></li>";
	}
	$html .= "</ul>";
	echo $html;
}

/* 获取公告栏列表 */
function getNoticeList(){
	global $db;
	return $db->getList("select * from cms_notice where state=0");
}


/* 获取友情链接Html */
function getFriendLinkListHtml(){
	$list = getFriendlinkList();
	$html = "";
	foreach($list as $ls){
		$html .= "<li><a href=\"".$ls['url']."\" target=\"_blank\">".$ls['name']."</a></li>";
	}
	echo $html;
}

/* 获取友情链接列表 */
function getFriendlinkList(){
	global $db;
	return $db->getList("select * from cms_friendlink order by seq");
}

//留言
function getMessageList(){
	global $db;
	return $db->getList("select * from cms_message where validate=1 order by id desc");
}

function getArticleListHtml($str=''){
	$list = getArticleList($str);
	$html = "";
	foreach($list as $ls){
		$html.="<li><span>".date('Y年m月d日 ',strtotime($ls['created_date']))."</span><a href=\"/news/news_show.php?id=".$ls['id']."\" title=".$ls['title'].">".substitle($ls['title'],20)."</a></li>";
}
	
	echo $html;	
}
//z住房知识
function getzhufangHtml($str=''){
	$list = getArticleList($str);
	$html = "";
	foreach($list as $ls){
		$html.="<li><a href=\"/news/news_show.php?id=".$ls['id']."\" title=".$ls['title'].">".substitle($ls['title'],25)."</a></li>";
}
	
	echo $html;	
}

//newslist
function getnewsListHtml($str=''){
	$list = getArticleList($str);
	$html = "";
	foreach($list as $ls){
//	$html.="<li><span>".date('Y年m月d日 ',strtotime($ls['created_date']))."</span><a href=\"news/news_show.php?id=".$ls['id']."\" title=".$ls['title'].">".substitle($ls['title'],25)."</a></li>";
	$html .= "<li>
	<img src=/".$ls['pic']." style=\"margin-top:10px; margin-left:10px; float:left;\"/>
	<h4 class=\"new_left1\">".substitle($ls['title'],25)."</h4>
	<h2 class=\"new_left2\">".substitle($ls['resume'],50)." ......
	<a href=\"/news/news_show.php?id=".$ls['id']."\">
	<span style=\"color:#ff6c00; text-decoration:none\">詳しい</span></a></h2></li>";
	}
	echo $html;	
}
/**获取产品列表**/
/**产品首页推荐*/
function getproductListHtml($str=''){
	$list = getproductList($str);
	$html = "";
	$urls="";
	foreach($list as $ls){
//		$html.="<li>
//              <a href=\"productshow.php?id=".$ls['id']."\" title=".$ls['title']."><img class=\"product_img\" src=/".$ls['pic']." /></a>
//              </li>";		
       if($ls['housetype']!='13'){
		   
		   $urls="house_show.php";
		   
		   }
		   else{
			   $urls="office_show.php";
			   }
		$html .= "<li><a href=\"/house/".$urls."?id=".$ls['id']."\" title=".$ls['title'].">
            <p class=\"house_title\">".$ls['title']."</p>
            <div class=\"house_imgs\"><img src=/".$ls['pic']." alt=".$ls['title']."/></div>
            <div class=\"house_jssm\">
              <p>エリア：".$ls['region_name']." </p>
              <p>面&nbsp;&nbsp;&nbsp;積：".$ls['area']." </p>
              <p>間取り：".$ls['atrioventricular_name']."<p/>
            </div>
            <p class=\"prices\">価格：".$ls['price_name']."</p>
            </a></li>";
		
		
		
//		<div class=\"index_new\"><a href=\"/house/house_show.php?id=".$ls['id']."\" title=".$ls['title']."><img src=/".$ls['pic']."  style=\"margin-left:10px;width:85px;height:110px;\"/></a><div class=\"index_new1\"> <div class=\"white_text\"><a href=\"/house/house_show.php?id=".$ls['id']."\" title=".$ls['title'].">".$ls['title']."</a></div>
//        <div class=\"white_text1\">价格：".$ls['price_name']."</div>
//        <div class=\"white_text2\">".$ls['resume']."</div></div><p></p><div class=\"index-new3\"><p>エリア：".$ls['region_name']."</p>
//        <p>価格：".$ls['price_name']." </p>
//        <p>面積：".$ls['area']." </p>
//        <p>間取り：".$ls['atrioventricular_name']." </p></div>
//    </div>";
	}
	echo $html;	
}
/***shouye*///

function getindexproductListHtml($str=''){
	$list = getproductList($str);
	$html = "";
	$urls="";
	foreach($list as $ls){
	  if($ls['housetype']!=13){
		   
		   $urls="house_show.php";
		   
		   }
		   else{
			   $urls="office_show.php";
			   }

		$html.="<li><a href=\"/house/".$urls."?id=".$ls['id']."\" title=".$ls['title'].">
            <p class=\"house_title\">".$ls['title']."</p>
            <div class=\"house_imgs\"><img src=/".$ls['pic']." alt=".$ls['title']."/></div>
            <div class=\"house_jssm\">
              <p>エリア：".$ls['region_name']." </p>
              <p>面&nbsp;&nbsp;&nbsp;積：".$ls['area']." </p>
              <p>間取り：".$ls['atrioventricular_name']."<p/>
            </div>
            <p class=\"prices\">価格：".$ls['price_name']."</p>
            </a></li>";
			/*<li><a href=\"/house/house_show.php?id=".$ls['id']."\" title=".$ls['title']."><img class=\"product_img\" src=/".$ls['pic']." width=\"80px\" height=\"60px\" /></a>
		<span class=\"house_pic_1\">".$ls["title"]."</span>".substitle($ls['resume'],12)."</li>";*/
		
	}
	echo $html;	 
}
function getindeenxproductListHtml($str=''){
	$list = getproductList($str);
	$html = "";
	foreach($list as $ls){
		$html.="<li><a href=\"/house/house_show.php?id=".$ls['id']."\" title=".$ls['title']."><img class=\"product_img\" src=/".$ls['pic']." /></a>
<b></b>
<h4>product name<br /><a href=\"/house/house_show.php?id=".$ls['id']."\" title=".$ls['title'].">".substitle($ls['title'],60)."</a></h4>
</li>
";
		
	}
	echo $html;	
}

//最新房源
function getnewproductListHtml($str=''){
	$list = getproductList($str);
	$html = "";
	$urls="";
	foreach($list as $ls){
			  if($ls['housetype']!=13){
		   
		   $urls="house_show.php";
		   
		   }
		   else{
			   $urls="office_show.php";
			   }

		$html.="<li><a href=\"/house/".$urls."?id=".$ls['id']."\" title=".$ls['title']."><h2 class=\"list_title\"><span class=\"list_title1\">".substitle($ls['title'],60)."</span>
		<img src=/".$ls['pic']."  style=\"margin-top:15px;height:60px;width:80px;\"/><span class=\"list_title2\">".$ls['price_name']."	&nbsp;&nbsp;&nbsp;無料 <br/>
                ".$ls['atrioventricular_name']."	&nbsp;&nbsp;".$ls['area']."㎡ <br/>
                ".$ls['resume']."</span></h2>
              </a></li>";	
	}
	echo $html;	
}
//最近浏览
function getzjproductListHtml($str=''){
	$list = getproductList($str);
	$html = "";
	$urls="";
	foreach($list as $ls){
			  if($ls['housetype']!=13){
		   
		   $urls="house_show.php";
		   
		   }
		   else{
			   $urls="office_show.php";
			   }
		$html.="<li><a href=\"/house/".$urls."?id=".$ls['id']."\" title=".$ls['title']."><img src=/".$ls['pic']." style=\" margin-top:10px; margin-left:20px;float:left;height:60px;width:80px;\"/></a>
        <h4 class=\"new_right1\">".$ls['title']."</h4><br/>
        <p class=\"new_right2\" style=\"margin-left:10px;\">".$ls['resume']."</p>
      </li>";
	  	}
	echo $html;	
}

function getproductList($str=''){
	global $db;
	//定义默认数据
	$init_array =array(
		'row'		=>0,
		'titlelen'	=>0,
		'type'		=>'',
		'cid'		=>'',
		'order'		=>'id',
		'orderway'	=>'desc',
		'region'    =>'',
		'price'     =>'',
	    'xxarea'    =>'',
	    'housetype' =>'',
	    'subway	'   =>'',
	    'yugang'	=>'',
		 'page'    =>'',
		 'att'     =>''

	);
	//用获取的数据覆盖默认数据
	$str_array = explode(' ',$str);
	foreach($str_array as $_str_item){
		if(!empty($_str_item)){
			$_str_item_array = explode('=',$_str_item);
			if(!empty($_str_item_array[0])&&!empty($_str_item_array[1])){
				$init_array[$_str_item_array[0]]=$_str_item_array[1];
			}
		}
	}
	
	//定义要用到的变量
	$row		 = $init_array['row'];
	$titlelen	 = $init_array['titlelen'];
	$type		 = $init_array['type'];
	$cid		 = $init_array['cid'];
	$order		 = $init_array['order'];
	$orderway	 = $init_array['orderway'];
	$region      = $init_array['region'];
	$price	     = $init_array['price'];
	$xxarea	     = $init_array['xxarea'];
	$housetype	 = $init_array['housetype'];
	$subway	     = $init_array['subway'];
	$yugang	     = $init_array['yugang'];
	$atrioventricular	     = $init_array['atrioventricular'];
	$att        =$init_array['att'];
	//文章标题长度控制
	if(!empty($titlelen)){
		$title="substring(a.title,1,".$titlelen.") as title";
	}else{
		$title="a.title";
	}
	//根据条件数据生成条件语句
	$where = "";
//	if(!empty($cid)){
//		$where = " and a.cid in (".$cid.") or b.pid in (".$cid.")";
//	}else{
//		if(isset($_GET['id'])&&!empty($_GET['id'])&&is_numeric($_GET['id'])){
//			$where = " and a.cid in (".$_GET['id'].") or b.pid in (".$_GET['id'].")";
//		}
//	}
	if(!empty($region) || $region!='' || $region!=0){
			$where .= " and a.region = '$region'";
	}
	if(!empty($price) || $price!='' || $price!=0){
			$where .= " and a.price = '$price'";
	}
	if(!empty($xxarea) || $xxarea!='' || $xxarea!=0){
			$where .= " and a.xxarea = '$xxarea'";
	}
	if(!empty($housetype) || $housetype!='' || $housetype!=0){
			$where .= " and a.housetype= '$housetype'";
	}
	if(!empty($subway) || $subway!='' || $subway!=0){
			$where .= " and a.subway = '$subway'";
	}
	if(!empty($yugang) || $yugang!='' || $yugang!=0){
			$where .= " and a.yugang = '$yugang'";
	} 
	if(!empty($atrioventricular) || $atrioventricular!='' || $atrioventricular!=0){
			$where .= " and a.atrioventricular = '$atrioventricular'";
	} 
	if(!empty($att) || $att!='' || $att!=0){
			$where .= " and a.att like '%$att%'";
	} 

	if($type=='image'){
		$where = " and a.pic is not null";
	}
	
	$sql = "select 
	a.id,".$title.",a.pic,a.resume,a.pubdate,a.content,a.hits,a.created_by,a.region,a.created_date,a.price,a.price_name,a.atrioventricular_name,a.region_name,a.area,a.xxarea,a.*
	from houses as a 
	where a.delete_session_id is null ".$where." order by a.".$order." ".$orderway;	
	global $pageList;
	$pageList['pagination_total_number'] = $db->getRowsNum($sql);
	$pageList['pagination_perpage'] = empty($row)?$pagination_total_number:$row;
	return $db->selectLimit ($sql,$pageList['pagination_perpage'],$curpage*$row);
}
//获取文章详情
function getproductInfo($id=0){
	global $db;
	if($id==0){
		if(empty($_GET['id'])){
			return false;
		}else{
			$id = $_GET['id'];
		}
	}
	return $db->getOneRow("select * from houses where id=".$id);
}

/*****/
/* 获取文章列表*/
function getArticleList($str=''){
	global $db;
	//定义默认数据
	$init_array =array(
		'row'		=>0,
		'titlelen'	=>0,
		'type'		=>'',
		'cid'		=>'',
		'order'		=>'id',
		'orderway'	=>'desc'
	);
	//用获取的数据覆盖默认数据
	$str_array = explode(' ',$str);
	foreach($str_array as $_str_item){
		if(!empty($_str_item)){
			$_str_item_array = explode('=',$_str_item);
			if(!empty($_str_item_array[0])&&!empty($_str_item_array[1])){
				$init_array[$_str_item_array[0]]=$_str_item_array[1];
			}
		}
	}
	
	//定义要用到的变量
	$row		 = $init_array['row'];
	$titlelen	 = $init_array['titlelen'];
	$type		 = $init_array['type'];
	$cid		 = $init_array['cid'];
	$order		 = $init_array['order'];
	$orderway	 = $init_array['orderway'];
	
	
	//文章标题长度控制
	if(!empty($titlelen)){
		$title="substring(a.title,1,".$titlelen.") as title";
	}else{
		$title="a.title";
	}
	//根据条件数据生成条件语句
	$where = "";
	if(!empty($cid)){
		$where = " and a.cid in (".$cid.") or b.pid in (".$cid.")";
	}else{
		if(isset($_GET['id'])&&!empty($_GET['id'])&&is_numeric($_GET['id'])){
			$where = " and a.cid in (".$_GET['id'].") or b.pid in (".$_GET['id'].")";
		}
	}
	
	if($type=='image'){
		$where = " and a.pic is not null";
	}
	
	$sql = "select 
	a.id,b.id as cid,".$title.",a.att,a.pic,a.source,
	a.author,a.resume,a.pubdate,a.content,a.hits,a.created_by,a.created_date,
	b.name,b.pid from cms_article as a 
	left outer join cms_category as b on a.cid=b.id
	where a.delete_session_id is NULL ".$where." order by a.".$order." ".$orderway;
	
	global $pageList;
	$pageList['pagination_total_number'] = $db->getRowsNum($sql);
	$pageList['pagination_perpage'] = empty($row)?$pagination_total_number:$row;
	return $db->selectLimit ($sql,$pageList['pagination_perpage'],$curpage*$row);
}
//获取文章详情
function getArticleInfo($id=0){
	global $db;
	if($id==0){
		if(empty($_GET['id'])){
			return false;
		}else{
			$id = $_GET['id'];
		}
	}
	return $db->getOneRow("select * from cms_article where id=".$id);
}

function getPaginationHtml($page_url,$page = 8){
	echo getPagination($page_url,$page);
}
function getPaginationHtmls($page_url,$page = 8){
	echo getPaginations($page_url,$page);
}

/**
 * 分页函数
 */
function getPagination($page_url,$page = 8) {
	$curpage = empty($_GET['page'])?1:$_GET['page'];
	global $pageList;
	$shownum = true;
	$phpaa_page = '';
	$page_url .= strpos($page_url, '?') ? '&amp;' : '?';
	$realpages = 1;									
	if($pageList['pagination_total_number'] > $pageList['pagination_perpage']) {
		$offset = 2;
		$realpages = @ceil($pageList['pagination_total_number'] / $pageList['pagination_perpage']);//分页数
		$pages = $realpages;
		if($page > $pages) {
			$from = 1;
			$to = $pages;
		} else {
			$from = $curpage - $offset;
			$to = $from + $page - 1;
			if($from < 1) {
				$to = $curpage + 1 - $from;
				$from = 1;
				if($to - $from < $page) {
					$to = $page;
				}
			} elseif($to > $pages) {
				$from = $pages - $page + 1;
				$to = $pages;
			}
		}
		
		$phpaa_page = ($curpage - $offset > 1 && $pages > $page ? '<a href="'.$page_url.'page=1" class="first">トップ</a> ' : '').
			($curpage > 1? '<a href="'.$page_url.'page='.($curpage - 1).'" class="prev1">前のページ</a> ' : '');
		for($i = $from; $i <= $to; $i++) {
			$phpaa_page .= $i == $curpage ? '<strong>'.$i.'</strong> ' :
				'<a class="focus" href="'.$page_url.'page='.$i.($i == $pages ? '#' : '').'">'.$i.'</a> ';
		}
		$phpaa_page .= ($to < $pages ? '<a href="'.$page_url.'page='.$pages.'" class="last">...'.$pages.'</a> ': '');
		$phpaa_page .= ($curpage < $pages ? '<a href="'.$page_url.'page='.($curpage + 1).'" class="next1">次のページ</a> ' : '');
		$phpaa_page .= ($to < $pages ? '<a href="'.$page_url.'page='.$pages.'" class="last">最後</a> ': '');
		$phpaa_page .= ($showkbd && $pages > $page? '<kbd><input type="text" name="custompage" size="3" onkeydown="if(event.keyCode==13) {window.location=\''.$page_url.'page=\'+this.value; return false;}" /></kbd>' : '');
		$phpaa_page = $phpaa_page ? '<div class="pages">'.($shownum ? '合計&nbsp;'.$pageList['pagination_total_number'].'&nbsp;件 ' : '').$phpaa_page.'</div>' : '';
	}
	return $phpaa_page;
}
//第二分页
function getPaginations($page_url,$tpage = 8) {
	$curpage = empty($_GET['tpage'])?1:$_GET['tpage'];
	global $pageList;
	$shownum = true;
	$phpaa_page = '';
	$page_url .= strpos($page_url, '?') ? '&amp;' : '?';
	$realpages = 1;									
	if($pageList['pagination_total_number'] > $pageList['pagination_perpage']) {
		$offset = 2;
		$realpages = @ceil($pageList['pagination_total_number'] / $pageList['pagination_perpage']);//分页数
		$pages = $realpages;
		if($page > $pages) {
			$from = 1;
			$to = $pages;
		} else {
			$from = $curpage - $offset;
			$to = $from + $page - 1;
			if($from < 1) {
				$to = $curpage + 1 - $from;
				$from = 1;
				if($to - $from < $page) {
					$to = $page;
				}
			} elseif($to > $pages) {
				$from = $pages - $page + 1;
				$to = $pages;
			}
		}
		
		$phpaa_page = ($curpage - $offset > 1 && $pages > $page ? '<a href="'.$page_url.'tpage=1" class="first">トップ</a> ' : '').
			($curpage > 1? '<a href="'.$page_url.'tpage='.($curpage - 1).'" class="prev1">前のページ</a> ' : '');
		for($i = $from; $i <= $to; $i++) {
			$phpaa_page .= $i == $curpage ? '<strong>'.$i.'</strong> ' :
				'<a class="focus" href="'.$page_url.'tpage='.$i.($i == $pages ? '#' : '').'">'.$i.'</a> ';
		}
		$phpaa_page .= ($to < $pages ? '<a href="'.$page_url.'tpage='.$pages.'" class="last">...'.$pages.'</a> ': '');
		$phpaa_page .= ($curpage < $pages ? '<a href="'.$page_url.'tpage='.($curpage + 1).'" class="next1">次のページ</a> ' : '');
		$phpaa_page .= ($to < $pages ? '<a href="'.$page_url.'tpage='.$pages.'" class="last">最後</a> ': '');
		$phpaa_page .= ($showkbd && $pages > $page? '<kbd><input type="text" name="custompage" size="3" onkeydown="if(event.keyCode==13) {window.location=\''.$page_url.'page=\'+this.value; return false;}" /></kbd>' : '');
		$phpaa_page = $phpaa_page ? '<div class="pages">'.($shownum ? '合計&nbsp;'.$pageList['pagination_total_number'].'&nbsp;件 ' : '').$phpaa_page.'</div>' : '';
	}
	return $phpaa_page;
}


//截取字符串
function wordscut($string,$length) { 
	$dot="";
	if(strlen($string) > $length) $dot="...";;
    return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,0}'.
                       '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$length.'}).*#s',
                       '$1',$string).$dot;
}

//截取字符串
function substitle($string,$length) { 
	$dot="";
	if(strlen($string) > $length) $dot="...";;
    return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,0}'.
                       '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$length.'}).*#s',
                       '$1',$string);
}
///案例栏目
function getcaseCategorySelect($select_id=0,$id = 0,$level = 0){
	global $db;
	$category_arr = $db->getList ( "SELECT * FROM cms_casecategory WHERE pid = " . $id . " order by seq" );
foreach ( $category_arr as $category ) {
		$id = $category ['id'];
		$name = $category ['name'];
		$pid=$category ['pid'];
		$selected = $select_id==$id?'selected':'';
		echo "<option value=\"".$id."\" title=\"".$pid."\" ".$selected.">".$level_nbsp . " " . $name."</option>\n";
		getcaseCategorySelect ($select_id, $id, $level );
	}
}

?>