<?php 
/**
 * 后台公用函数库
 */

/**
 * 分页函数
 *
 * @param int $num	
 * @param int $perpage
 * @param int $curpage
 * @param string $mpurl
 * @param int $maxpages
 * @param int $page
 * @param bool $autogoto
 * @param bool $simple
 * @return string
 */
function multi($num, $perpage, $curpage, $mpurl, $maxpages = 0, $page = 10, $autogoto = TRUE, $simple = FALSE) {
	global $maxpage;
	$ajaxtarget = !empty($_GET['ajaxtarget']) ? " ajaxtarget=\"".dhtmlspecialchars($_GET['ajaxtarget'])."\" " : '';

		$shownum = $showkbd = TRUE;
		$lang['prev'] = '上一页';
		$lang['next'] = '下一页';

	$multipage = '';
	$mpurl .= strpos($mpurl, '?') ? '&amp;' : '?';
	$realpages = 1;									
	if($num > $perpage) {
		$offset = 2;

		$realpages = @ceil($num / $perpage);
		$pages = $maxpages && $maxpages < $realpages ? $maxpages : $realpages;

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

		$multipage = ($curpage - $offset > 1 && $pages > $page ? '<a href="'.$mpurl.'page=1" class="first"'.$ajaxtarget.'>首页</a> ' : '').
			($curpage > 1 && !$simple ? '<a href="'.$mpurl.'page='.($curpage - 1).'" class="prev"'.$ajaxtarget.'>'.$lang['prev'].'</a> ' : '');
		for($i = $from; $i <= $to; $i++) {
			$multipage .= $i == $curpage ? '<strong><font style="color:#ff0000">'.$i.'</font></strong> ' :
				'<a href="'.$mpurl.'page='.$i.($ajaxtarget && $i == $pages && $autogoto ? '#' : '').'"'.$ajaxtarget.'>'.$i.'</a> ';
		}

		$multipage .= ($to < $pages ? '<a href="'.$mpurl.'page='.$pages.'" class="last"'.$ajaxtarget.'>... '.$realpages.'</a> ': '').
			($curpage < $pages && !$simple ? '<a href="'.$mpurl.'page='.($curpage + 1).'" class="next"'.$ajaxtarget.'>'.$lang['next'].'</a> ' : '').
			($showkbd && !$simple && $pages > $page && !$ajaxtarget ? '<kbd><input type="text" name="custompage" size="3" onkeydown="if(event.keyCode==13) {window.location=\''.$mpurl.'page=\'+this.value; return false;}" /></kbd>' : '');

		$multipage = $multipage ? '<div class="pages">'.($shownum && !$simple ? '共&nbsp;<font style="color:#ff0000">'.$num.'</font>&nbsp;条 ' : '').$multipage.'</div>' : '';
	}
	$maxpage = $realpages;
	return $multipage;
}

/**
 * 栏目分类下拉框 <option></option>
 *
 * @param int $pid
 * @param int $id
 * @param int $level
 */
function getCategorySelect($select_id=0,$id = 0,$level = 0){
	global $db;
	$category_arr = $db->getList ( "SELECT * FROM cms_category WHERE pid = " . $id . " order by seq" );
	for($lev = 0; $lev < $level * 2 - 1; $lev ++) {
		$level_nbsp .= "　";
	}
	if ($level++)
		$level_nbsp .= "┝";
	foreach ( $category_arr as $category ) {
		$id = $category ['id'];
		$name = $category ['name'];
		$pid=$category ['pid'];
		$selected = $select_id==$id?'selected':'';
		echo "<option value=\"".$id."\" title=\"".$pid."\" ".$selected.">".$level_nbsp . " " . $name."</option>\n";
		getCategorySelect ($select_id, $id, $level );
	}
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
///案例栏目
function getsystemCategorySelect($system_id){
	global $db;
	$category_arr = $db->getList ( "SELECT * FROM cms_system");
foreach ( $category_arr as $category ) {
		$id = $category ['id'];
		$system_type=$category ['system_type'];
		$selected = $system_id==$id?'selected':'';
		echo "<option value=\"".$id."\" title=\"".$system_type."\" ".$selected.">".$level_nbsp . " " . $system_type."</option>\n";
	}
}

?>