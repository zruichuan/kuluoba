<?php
include_once '../include/config.inc.php';
require_once '../include/common.function.php';
$arc = getArticleInfo();
$region=trim($_GET ['region'])?trim($_GET ['region']):0;
$housetype=trim($_GET ['housetype'])?trim($_GET ['housetype']):0;
$price=trim($_GET ['price'])?trim($_GET ['price']):0;
$atrioventricular=trim($_GET ['atrioventricular'])?trim($_GET ['atrioventricular']):0;
$subway =trim($_GET ['subway'])?trim($_GET ['subway']):0;
$xxarea= trim($_GET ['xxarea'])?trim($_GET ['xxarea']):0;

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="../share/css/css.css"/>
<script src="../share/js/jquery.shake.js" type="text/javascript"></script>
<script type="text/javascript" src="../share/js/jquery132.js"></script>
<script src="../share/js/jquery-1.4.4.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../share/js/jquery.select-1.3.5.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#test1").sSelect();
	$("#test2").sSelect();
	$("#test3").sSelect();
	$("#test4").sSelect();
	$("#test5").sSelect();
	$(".seach_01").click(function(e) {
       $("#housetype").val(12);
		$('.seach_01').toggleClass('bgs');
		$('.seach_02').removeClass('bgs29');
		$('.seach_03').removeClass('bgs13');
    });
	$(".seach_02").click(function(e) {
        $("#housetype").val(29);
		$('.seach_01').removeClass('bgs');
		$('.seach_02').toggleClass('bgs29');
		$('.seach_03').removeClass('bgs13');
    });
	$(".seach_03").click(function(e) {
        $("#housetype").val(13);
		$('.seach_01').removeClass('bgs');
		$('.seach_02').removeClass('bgs29');
		$('.seach_03').toggleClass('bgs13');
    });

	var text1=$("#housetype").val()
	if(text1==12)
	{
		$('.seach_01').toggleClass('bgs')
		}
	if(text1==13)
	{
		$('.seach_03').toggleClass('bgs13')
		}
		if(text1==29)
	{
		$('.seach_02').toggleClass('bgs29')
		}


});

</script>
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

<!--左面的新闻子页面-->
<div class="house_da">
  <div class="house_left">
    <h2 class="house_title1">お役立ち賃貸情報</h2>
    <div class="house-shouzhan_3">
      <ul>
        <?php getindexproductListHtml("region=$region housetype=$housetype price=$price atrioventricular=$atrioventricular subway=$subway xxarea=$xxarea row=6");?>
      </ul>
      <div class="list_page">
        <div class="page_fy">
          <?php getPaginationHtml("housemessage.php?region=$region&housetype=$housetype&price=$price&atrioventricular=$atrioventricular&subway=$subway&xxarea=$xxarea");?>
        </div>
      </div>
    </div>
    <div class="house_form">
      <form method="get" action="housemessage.php" style="float:left">
        <div class="house_form_toppic">
          <ul class="houseseach">
            <li class="seach_01"><img src="../share/images/a_15_03.gif"/></li>
            <li class="seach_02"><img src="../share/images/a_15_04.gif"/></li>
            <li class="seach_03"><img src="../share/images/a_15_05.gif"/></li>
          </ul>
        </div>
        <div id="test1" class="dropdown1" tabindex="1">
          <select onChange="alert('change');" name="region" style="display: none;">
            <option value="0">--选择区域--</option>
            <?php getcaseCategorySelect ($region,"4")?>
          </select>
        </div>
        <div id="test2" class="dropdown1" tabindex="2">
          <select onChange="alert('change');" name="price" style="display: none;">
            <option value="0">--选择价格--</option>
            <?php getcaseCategorySelect ($price,"7")?>
          </select>
        </div>
        <div id="test3" class="dropdown1" tabindex="3">
          <select onChange="alert('change');" name="xxarea" style="display: none;">
            <option value="0">--选择面积--</option>
            <?php getcaseCategorySelect ($xxarea,"22")?>
          </select>
        </div>
        <div id="test4" class="dropdown1" tabindex="4">
          <select onChange="alert('change');" name="atrioventricular" style="display: none;">
            <option value="0">--选择房型--</option>
            <?php getcaseCategorySelect ($atrioventricular,"9")?>
          </select>
        </div>
        <div id="test5" class="dropdown1" tabindex="5">
          <select onChange="alert('change');" name="subway" style="display: none;">
            <option value="0">--选择地铁--</option>
            <?php getcaseCategorySelect ($subway,"17")?>
          </select>
          <input name="housetype" id="housetype" type="hidden" value="<?php echo $housetype;?>">
        </div>
        <div class="search-house">
          <input type="submit"  value="搜索" name="" class="sch_text1" />
        </div>
      </form>
    </div>
    <h2 class="house_title2">あなたにおすすめの建物</h2>
    <div class="pic_house">
      <div id="pic_list_2" class="scroll_horizontal">
        <div class="box">
          <ul class="list">
            <?php getnewproductListHtml('row=8 att=b') ?>
          </ul>
        </div>
        <div class="plus"></div>
        <div class="minus"></div>
      </div>
    </div>
  </div>
  <div class="news1_right">
    <h2 class="news1_2_1">住まいの基礎知識</h2>
    <ul>
      <?php getzhufangHtml('cid=21 row=6 page=1');?>
    </ul>
    <br class="clear">
  </div>
  <div class="news1_right1">
    <h2 class="news5_text">最新物件</h2>
    <ul>
      <?php getzjproductListHtml('row=5 page=1 order=created_date')?>
    </ul>
    <!--    <input type=image  src="../share/images/botton1.gif" style="margin-left:55px; margin-top:12px;"/>
    <input type=image  src="../share/images/botton2.gif"  style="margin-left:45px; margin-top:12px;"/>
--> </div>
</div>

<!--左面的新闻子页面--> 

<!--底部的制作-->

<?php
include_once "../share/fooder.php";
 ?>
<!--底部的制作--> 
<script src="../share/js/jquery.cxscroll.min.js"></script> 
<script type="text/javascript" src="../share/js/easing.js"></script> 
<script type="text/javascript" src="../share/js/MogFocus.js"></script> 
<script type="text/javascript">
$("#pic_list_2").cxScroll();
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
</body>
</html>
