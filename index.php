<?php
header('Content-Type: text/html; charset=utf-8');
if(!is_file(dirname(__FILE__).'/data/database.inc.php')){
	echo "<p align='center'>请先安装系统！</p><br><p align='center'><a href='./install/index.php'>安装》》》</a></p>";
	exit();
}?>
<?php 
include_once 'include/config.inc.php';
include_once 'include/common.function.php';
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>clover</title>
<link type="text/css" rel="stylesheet" href="share/css/css.css"/>
<script src="share/js/jquery.shake.js" type="text/javascript"></script>
<script type="text/javascript" src="share/js/jquery132.js"></script>
<script src="share/js/jquery-1.4.4.min.js" type="text/javascript"></script>
<script type="text/javascript" src="share/js/jquery.select-1.3.5.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#test1").sSelect();
	$("#test2").sSelect();
	$("#test3").sSelect();
	$("#test4").sSelect();
	$("#test5").sSelect();
	$("#test7").sSelect();
	$("#test8").sSelect();
	$("#test9").sSelect();
	$("#test10").sSelect();
	$("#test11").sSelect();
	$("#test13").sSelect();
	$("#test14").sSelect();
	$("#test15").sSelect();
	$("#test16").sSelect();
	$("#test17").sSelect();
	$("#test19").sSelect();
	$("#test20").sSelect();
	$("#test21").sSelect();
	$("#test22").sSelect();
	$("#test23").sSelect();

	//提交表单
	})
</script>
</head>

<body>
<!--头部-->
<?php
include_once "share/head.php";
 ?>

<!--第一排图片加搜索框-->
<div class="hotpic_da">
  <div class="hot_pic_left">
    <div id="focus4">
      <div class="focusWarp">
        <ul class="imgList">
          <li><a href="#"><img src="share/images/banner_02.jpg" width="632px" height="308px" /></a></li>
          <li><a href="#"><img src="share/images/banner_01.jpg" /></a></li>
          <li><a href="#"><img src="share/images/banner_03.jpg" /></a></li>
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
    <!--<div class="index_new"> 
     <img src="share/images/white_pic.gif" style="margin-top:5px; margin-left:10px;"/>
      <div class="index_new1">
        <div class="white_text">上海の人民広場</div>
        <div class="white_text1">5万/平方メートル</div>
        <div class="white_text2"> 東京都中央区日本橋人形町２丁 <br/>
          目34-5人形町駅、水天宮前駅</div>
      </div>
      <p></p>
      <div class="index-new3"> <br/>
        エリア：静安区 <br/>
        価格：12,000元/月 <br/>
        面積：100m² <br/>
        間取り： </div>
    </div>--> 
  </div>
</div>
<!--第一排图片加搜索框--> 

<!--第二排的图片和搜索-->
<div class="pro_search_da">
  <div class="pro_search1 pro_search"><a href="/house/housemessage.php?housetype=12"></a></div>
  <div class="pro_search2 pro_search"><a href="/house/housemessage.php?housetype=29"></a> </div>
  <div class="pro_search3 pro_search"><a href="/house/housemessage.php?housetype=13"></a></div>
</div>
<!--第二排的图片和搜索--> 
<!--第三排图片-->
<div class="pro">
  <div class="pro_pic1"><img src="share/images/pic1.gif"/></div>
  <div class="pro_pic2"> <img src="share/images/pic2.gif"/></div>
  <div class="pro_pic3"><img src="share/images/pic3.gif"/></div>
</div>
<!--第三排图片--> 
<!--第四排图片-->
<div class="pro1">
  <div class="pro1_pic4"><img src="share/images/pic4.gif"/></div>
  <div class="pro1_pic5"><img src="share/images/pic5.gif"/></div>
  <div class="pro1_pic6"><img src="share/images/pic6.gif"/></div>
</div>
<!--第四排图片--> 

<!--新的第五排图片的制作-->
<div class="index_search_da">
  <h2 class="index_search_title"> <span class="index_search_titleleft">検索</span> <span class="index_search_titleright">地域別の検索</span> </h2>
  <div class="index_search_body">
    <div class="index_body_left">
      <ul class="map1_menu" id="map1_title">
        <li id="map1_1" class="ccc"><a href="javascript:void(0)" onClick="map1s('1');" >全て</a></li>
        <li id="map1_2" ><a href="javascript:void(0)" onClick="map1s('2');" >住宅</a></li>
        <li id="map1_3" ><a href="javascript:void(0)" onClick="map1s('3');" >サービスアパート</a></li>
        <li id="map1_4" ><a href="javascript:void(0)" onClick="map1s('4');" >オフィス</a></li>
      </ul>
      <div class="map1_b" id="map1_a1" style="display:block;">
        <form method="get" action="house/housemessage.php" style="float:left">
          <div id="test1" class="dropdown" tabindex="1">
            <select onChange="alert('change');" name="region" style="display: none;">
              <option value="0">--选择区域--</option>
              <?php getcaseCategorySelect ($region,"4")?>
            </select>
          </div>
          <div id="test2" class="dropdown" tabindex="2">
            <select onChange="alert('change');" name="price" style="display: none;">
              <option value="0">--选择价格--</option>
              <?php getcaseCategorySelect ($price,"7")?>
            </select>
          </div>
          <div id="test3" class="dropdown" tabindex="3">
            <select onChange="alert('change');" name="xxarea" style="display: none;">
              <option value="0">--选择面积--</option>
              <?php getcaseCategorySelect ($xxarea,"22")?>
            </select>
          </div>
          <div id="test4" class="dropdown" tabindex="4">
            <select onChange="alert('change');" name="atrioventricular" style="display: none;">
              <option value="0">--选择房型--</option>
              <?php getcaseCategorySelect ($atrioventricular,"9")?>
            </select>
          </div>
          <div id="test5" class="dropdown" tabindex="5">
            <select onChange="alert('change');" name="subway" style="display: none;">
              <option value="0">--选择地铁--</option>
              <?php getcaseCategorySelect ($subway,"17")?>
            </select>
          </div>
          <div class="map_li_1">
            <input type="submit"  value="検索" name="" class="sch_btn" />
          </div>
        </form>
      </div>
      <div class="map1_b" id="map1_a2" style="display:none;">
        <form method="get" action="house/housemessage.php" style="float:left">
          <div id="test7" class="dropdown" tabindex="1">
            <select onChange="alert('change');" name="region" style="display: none;">
              <option value="0">--选择区域--</option>
              <?php getcaseCategorySelect ($region,"4")?>
            </select>
          </div>
          <div id="test8" class="dropdown" tabindex="2">
            <select onChange="alert('change');" name="price" style="display: none;">
              <option value="0">--选择价格--</option>
              <?php getcaseCategorySelect ($price,"7")?>
            </select>
          </div>
          <div id="test9" class="dropdown" tabindex="3">
            <select onChange="alert('change');" name="xxarea" style="display: none;">
              <option value="0">--选择面积--</option>
              <?php getcaseCategorySelect ($xxarea,"22")?>
            </select>
          </div>
          <div id="test10" class="dropdown" tabindex="4">
            <select onChange="alert('change');" name="atrioventricular" style="display: none;">
              <option value="0">--选择房型--</option>
              <?php getcaseCategorySelect ($atrioventricular,"9")?>
            </select>
          </div>
          <div id="test11" class="dropdown" tabindex="5">
            <select onChange="alert('change');" name="subway" style="display: none;">
              <option value="0">--选择地铁--</option>
              <?php getcaseCategorySelect ($subway,"17")?>
            </select>
            <input name="housetype" type="hidden" value="12">
          </div>
          <div class="map_li_1">
            <input type="submit"  value="検索" name="" class="sch_btn" />
          </div>
        </form>
      </div>
      <div class="map1_b" id="map1_a3" style="display:none;">
        <form method="get" action="house/housemessage.php" style="float:left">
          <div id="test13" class="dropdown" tabindex="1">
            <select onChange="alert('change');" name="region" style="display: none;">
              <option value="0">--选择区域--</option>
              <?php getcaseCategorySelect ($region,"4")?>
            </select>
          </div>
          <div id="test14" class="dropdown" tabindex="2">
            <select onChange="alert('change');" name="price" style="display: none;">
              <option value="0">--选择价格--</option>
              <?php getcaseCategorySelect ($price,"7")?>
            </select>
          </div>
          <div id="test15" class="dropdown" tabindex="3">
            <select onChange="alert('change');" name="xxarea" style="display: none;">
              <option value="0">--选择面积--</option>
              <?php getcaseCategorySelect ($xxarea,"22")?>
            </select>
          </div>
          <div id="test16" class="dropdown" tabindex="4">
            <select onChange="alert('change');" name="atrioventricular" style="display: none;">
              <option value="0">--选择房型--</option>
              <?php getcaseCategorySelect ($atrioventricular,"9")?>
            </select>
          </div>
          <div id="test17" class="dropdown" tabindex="5">
            <select onChange="alert('change');" name="subway" style="display: none;">
              <option value="0">--选择地铁--</option>
              <?php getcaseCategorySelect ($subway,"17")?>
            </select>
            <input name="housetype" type="hidden" value="29">
          </div>
          
          <div class="map_li_1">
            <input type="submit"  value="検索" name="" class="sch_btn" />
          </div>
        </form>
      </div>
      <div class="map1_b" id="map1_a4" style="display:none;">
        <form method="get" action="house/housemessage.php" style="float:left">
          <div id="test19" class="dropdown" tabindex="1">
            <select onChange="alert('change');" name="region" style="display: none;">
              <option value="0">--选择区域--</option>
              <?php getcaseCategorySelect ($region,"4")?>
            </select>
          </div>
          <div id="test20" class="dropdown" tabindex="2">
            <select onChange="alert('change');" name="price" style="display: none;">
              <option value="0">--选择价格--</option>
              <?php getcaseCategorySelect ($price,"7")?>
            </select>
          </div>
          <div id="test21" class="dropdown" tabindex="3">
            <select onChange="alert('change');" name="xxarea" style="display: none;">
              <option value="0">--选择面积--</option>
              <?php getcaseCategorySelect ($xxarea,"22")?>
            </select>
          </div>
          <div id="test22" class="dropdown" tabindex="4">
            <select onChange="alert('change');" name="atrioventricular" style="display: none;">
              <option value="0">--选择房型--</option>
              <?php getcaseCategorySelect ($atrioventricular,"9")?>
            </select>
          </div>
          <div id="test23" class="dropdown" tabindex="5">
            <select onChange="alert('change');" name="subway" style="display: none;">
              <option value="0">--选择地铁--</option>
              <?php getcaseCategorySelect ($subway,"17")?>
            </select>
            <input name="housetype" type="hidden" value="13">
          </div>
          
          <div class="map_li_1">
            <input type="submit"  value="検索" name="" class="sch_btn" />
          </div>
        </form>
      </div>
    </div>
    <div class="index_right"><img src="share/images/map_total.jpg" usemap="#Map"/>
      <map name="Map">
        <area class="hot_map" shape="poly" coords="2,3,118,4,127,83,135,84,158,140,121,198,126,210,103,222,97,229,90,237,84,249,83,265,87,306,32,345,4,345" href="house/housemessage.php?region=30">
        <area class="hot_map" shape="poly" coords="128,4,208,4,207,35,222,72,197,100,185,98,159,119,141,81,130,76,127,3" href="house/housemessage.php?region=31">
        <area class="hot_map" shape="poly" coords="217,4,286,4,278,16,274,26,271,38,271,48,276,58,281,67,287,76,290,82,292,87,295,95,296,102,298,112,298,120,298,130,293,144,288,152,281,160,242,189,203,109,224,89,230,79,231,63,217,23" href="house/housemessage.php?region=32">
        <area class="hot_map" shape="poly" coords="253,205,265,197,272,192,279,186,285,180,289,174,294,167,298,160,301,153,303,147,305,141,307,132,308,123,310,115,309,107,309,99,305,90,303,82,301,75,296,67,291,60,285,55,284,46,285,37,286,30,289,22,295,16,299,11,305,7,310,5,444,4,445,345,236,345,232,339,230,332,229,322,228,313,230,307,233,302,238,293,243,289,247,284,252,280,253,275" href="house/housemessage.php?region=33">
        <area class="hot_map" shape="poly" coords="187,107,195,114,233,197,240,273,229,286,224,298,218,310,216,320,218,332,220,343,57,345,100,313,91,261,100,239,135,215,129,199,166,140,163,128" href="house/housemessage.php?region=5">
      </map>
    </div>
  </div>
  <div class="index_search_bott"></div>
</div>

<!--新的第五排图片的制作--> 

<!--第五排搜索和地图--> 
<!--第六排新闻框-->
<div class="news_xinwen">
  <div class="tab">
    <ul class="menu" id="menutitle">
      <li id="tab_1" class="aaa"><a href="javascript:void(0)" onMouseOver="tabs('1');" >業界ニュース</a></li>
      <li id="tab_2" > <a href="javascript:void(0)" onMouseOver="tabs('2');" >企業ニュース</a></li>
    </ul>
    <div class="tab_b" id="tab_a1" style="display:block;">
      <ul>
        <?php getArticleListHtml("cid=16 row=12")?>
      </ul>
    </div>
    <div class="tab_b" id="tab_a2" style="display:none;">
      <ul>
        <?php getArticleListHtml("cid=1 row=12")?>
      </ul>
    </div>
    <div class="tab_b" id="tab_a3" style="display:none;">
      <ul>
        <li><span>2013年10月13号</span>ブラジル造船大手エコビックス社に日本連合5社で</li>
        <li><span>2013年10月13号</span>ガボン共和国 エムピーディーシー・ガボン株式の一</li>
        <li><span>2013年10月05号</span>アニュアルレポート2013を発行しました</li>
        <li><span>2013年10月02号</span>ブラジル造船大手エコビックス社に日本連合5社で</li>
        <li><span>2013年09月25号</span>ブラジル造船大手エコビックス社に日本連合5社で</li>
        <li><span>2013年09月15号</span>ブラジル造船大手エコビックス社に日本連合5社で</li>
        <li><span>2013年10月15号</span>東京都三鷹市で新データセンター サービス開始</li>
        <li><span>2013年10月10号</span>ブラジル造船大手エコビックス社に日本連合5社で</li>
        <li><span>2013年09月15号</span>英国でロンドンアレイからの海底送電を開始 </li>
        <li><span>2013年09月13号</span>キャリア採用(司法修習生採用)の募集について </li>
        <li><span>2013年09月08号</span>2013年度第2四半期決算公表について </li>
        <li><span>2013年08月30号</span>Boston Career Forum 2013の応募受付は終了致し</li>
      </ul>
    </div>
  </div>
</div>
<!--第六排新闻框--> 
<div style="width:960px; margin:10px auto;" class="mail_send"><img style="float:left" src="share/images/sendmail.png"/><img style="float:right" src="share/images/sendmail1.png"/></div>
<!--底部的制作-->
<?php
include_once "share/fooder.php";
 ?>

<!--底部的制作-->
</body>
<script src="share/js/jquery.cxscroll.min.js"></script>
<script type="text/javascript" src="share/js/easing.js"></script>
<script type="text/javascript" src="share/js/MogFocus.js"></script>
<script  type="text/javascript">
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
