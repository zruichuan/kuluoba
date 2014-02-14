<?php
include_once '../include/config.inc.php';
require_once '../include/common.function.php';
$arc = getArticleInfo();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="../share/css/css.css"/>
<script src="../share/js/jquery-1.4.4.min.js" type="text/javascript"></script>
</head>

<body>
<!--头部-->
<?php
include_once "../share/head.php";
 ?>
<!--第一排图片加搜索框-->
<div class="hotpic_da">
  <div class="hot_pic_left">
    <div id="focus4">
      <div class="focusWarp">
        <ul class="imgList">
          <li><a href="#"><img src="../share/images/banner_02.jpg" width="632px" height="308px" /></a></li>
          <li><a href="#"><img src="../share/images/banner_01.jpg" /></a></li>
          <li><a href="#"><img src="../share/images/banner_03.jpg" /></a></li>
        </ul>
        <ul class="imgList_two">
          <li>感謝の気持ちで、誠心誠意、お客様の期待にお応えいたします。</li>
          <li></li>
          <li>上海クローバー不動産は日本人専用の不動産屋です。</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="hotpic_right">
    <h2 class="index_title">推薦アクティブ</h2>
    <div id="pic_list_1" class="hot_houses">
      <div class="box">
        <ul class="list">
          <?php getproductListHtml("row=5 att=a") ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--第一排图片加搜索框--> 

<!--情报1-->
<div class="news1_da">
  <div class="news_right">
    <div class="news1_2">
      <h2 class="news1_2_1">住まいの基礎知識</h2>
      <ul>
        <?php getzhufangHtml('cid=21 row=6 page=1');?>
      </ul>
    </div>
    <div class="news5_right">
      <h2 class="news5_text">最新物件</h2>
      <ul>
        <?php getzjproductListHtml('row=5 order=created_date page=1')?>
      </ul>
      <!--    <input type=image  src="../share/images/botton1.gif" style="margin-left:55px; margin-top:12px;"/>  <input type=image  src="../share/images/botton2.gif"  style="margin-left:45px; margin-top:12px;"/>
--></div>
  </div>
  <!--左边的新闻-->
  <div class="new1_30">
    <h2 class="news1_1_1">情報リストページ</h2>
    <div class="news1_3_2">
      <ul>
        <?php getnewsListHtml("cid=16 row=5")?>
      </ul>
<div class="list_page">
        <div class="page_fy">
          <?php getPaginationHtml("news.php?cid=16");?>
        </div>
      </div>
          </div>
  </div>
  <!--左边的新闻-->
  
  <div class="new1_3—0">
    <div class="news1_3_2">
      <ul>
        <?php getnewsListHtml("cid=1 row=5")?>
      </ul>
      <div class="list_page">
        <div class="page_fy">
          <?php getPaginationHtmls("news.php?cid=1");?>
        </div>
      </div>
    </div>
  </div>
  
  <!--左边的新闻--> 
</div>
<!--情报1--> 

<!--底部的制作-->

<?php
include_once "../share/fooder.php";
 ?>
<!--底部的制作-->
</body>
<script src="../share/js/jquery.cxscroll.min.js"></script>
<script type="text/javascript" src="../share/js/easing.js"></script>
<script type="text/javascript" src="../share/js/MogFocus.js"></script>
<script type="text/javascript">
$("#pic_list_1").cxScroll({direction:"left",speed:800,time:4000});

$(function(){	
	$("#focus4").mogFocus({
		loadAnimation : false,
		time : 5000,
		scrollWidth : 632,
		animationWay : 'randomImg',
		btnStyle : 'hidden',
		randeasing : 'easeOutQuad',
		btnStyle : "hidden",//参数有四个分别是number(数字),noNumber(非数字，任意图形),thumbnail(缩略图),hidden(影藏)
       thumWidth : 90,//缩略图宽度
       thumHeight : 36,//缩略图高度
	   randomsImgTime : 1000,//该参数在使用随机动画生效，控制滑动速度
	   focusDelayTwo : 300,
       thumlen :3//缩略图显示个数
	});	
});

</script>
</html>
