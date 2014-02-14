<?php
include_once '../include/config.inc.php';
require_once '../include/common.function.php';
$arc = getproductInfo();
$id = $_GET ['id'];
$record = array('hits' => $arc['hits']+1);
$db->update('cms_case',$record,'ID='.$id);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="../share/css/css.css"/>
<script src="../share/js/jquery-1.4.4.min.js"></script>
<script src="../share/js/jquery.PrintArea.js"></script>
<script type="text/javascript">
$(function(){
  $('.cloud-zoom').attr('rel','adjustX:30');
});
$(document).ready(function(){
$("#biuuu_button").click(function(){
$("div#myPrintArea").printArea();
});
})
</script>
<script src="../share/js/jquery.shake.js" type="text/javascript"></script>
<style type="text/css">
ul, li {
	list-style: none;
	margin: 0px;
	padding: 0px;
}
img {
	border: none;
}
a.cloud-zoom img {
	border: 1px solid #f5f5f5;
}
.block {
	width: 224px;
	text-align: center;
}
.block ul {
	clear: both;
}
.block ul img {
	border: 1px solid #f5f5f5;
	float: left;
}
p.author {
	clear: both;
	text-align: center;
	color: #999;
	font-size: 11px;
}
p.author a {
	text-decoration: none;
	color: #666;
	border-bottom: 1px dashed #CCC;
}
</style>
</head>

<body>
<!--头部-->
<?php
include_once "../share/head.php";
 ?>
<!-- 热点图片-->
<div class="company_redian"></div>
<!-- 热点图片--> 
<!--简介1--> 
<!--情报1-->
<div class="news1_da_2">
<!--左边代码开始-->
<div class="house_messages">
<div id="myPrintArea">
  <h2 class="house_messages_1"><?php echo $arc['title'];?></h2>
  <div class="house_messages_2">
   <img src="../<?php echo $arc['pic'];?>" width="300px;"/>
  </div>
  <div class="house_messages_3">
    <ul>
      <li class="double_liwh"><span>住&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;所</span>:&nbsp;&nbsp;<?php echo $arc['address'];?></li>
      <li><span>所在区域</span>:&nbsp;&nbsp;<?php echo $arc['region_name'];?></li>
      <li><span style="letter-spacing:8px;">間取り</span>:&nbsp;&nbsp;<?php echo $arc['atrioventricular_name'];?></li>
      <li><span>面&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;積</span>:&nbsp;&nbsp;<?php echo $arc['area'];?>m²</li>
      <li><span>管理費</span>:&nbsp;&nbsp;<?php echo $arc['management'];?>m²</li>
      <li><span style="letter-spacing:-1px;">エレベータ</span>:&nbsp;&nbsp;<?php echo $arc['elevator'];?>m²</li>
      <li><span>階&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数</span>:&nbsp;&nbsp;<?php echo $arc['floor'];?>の</li>
      <li><span style="letter-spacing:8px;">総階数</span>:&nbsp;&nbsp;<?php echo $arc['totalfloor'];?>の</li>
      <li><span>築&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年</span>:&nbsp;&nbsp;<?php echo $arc['constructiontime'];?></li>
      <li><span style="letter-spacing:8px;">駐車場</span>:&nbsp;&nbsp;<?php echo $arc['parking'];?></li>
      <li class="double_liwh xxprices">総金額&nbsp;:&nbsp;<?php echo $arc['total_amount'];?></li>
    </ul>
  </div>
  <div class="jiaotong">
    <h2 class="house_map_title"> <span style="">交通概要</span></h2>
    <ul>
      <li><span>巴&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;士</span>:&nbsp;&nbsp;<?php echo $arc['traffic'];?></li>
      <li><span>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;铁</span>:&nbsp;&nbsp;<?php echo $arc['subweys'];?></li>
      <li><span>高&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;铁</span>:&nbsp;&nbsp;<?php echo $arc['elevated'];?></li>
    </ul>

  </div>
  <div class="zhoubian">
    <h2 class="house_map_title width333"> <span style="">周边情报</span></h2>
    <ul>
      <li class="double_liwh"><span>银&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;行</span>:&nbsp;&nbsp;<?php echo $arc['bank'];?></li>
      <li class="double_liwh"><span>宾&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;馆</span>:&nbsp;&nbsp;<?php echo $arc['hotel'];?></li>
      <li class="double_liwh"><span>コンビニ</span>:&nbsp;&nbsp;<?php echo $arc['conveniencestore'];?></li>
      <li class="double_liwh"><span style="letter-spacing:8px;">飲食店</span>:&nbsp;&nbsp;<?php echo $arc['restaurant'];?></li>
    </ul>

  </div>

  <h2 class="house_map_title2"> <span style="color:#9dca3d; font-size:18px;">間取り</span></h2>
  <div class="house_map_pic1 house_map_pic"><img src="../<?php echo $arc['hxpic'];?>"/> </div>
  <div class="house_map_pic2 house_map_pic"><img src="../<?php echo $arc['pic'];?>"/> </div>
      </div>
    
    <input type="button" id="biuuu_button" value="打印" />

  <div class="house_map_1">
    <h2 class="house_map_title2">地図情報</h2>
<!--    <img src="../share/images/clover_house_messages_11.gif" style="margin-left:30px;"/> 
-->    <?php echo $arc['map'];?>
    </div>
  <div class="house_map_title2">その他</div>
  <?php echo $arc['content'];?>
  <div class="house_map_title2">詳細については、ご相談ください</div>
  <h2 class="house_title5"><span style="display:block; float:left;">営業時間:08:00～23:00</span> <img src="../share/images/clover_house_messages_25.gif" style="display:block; float:left; margin-left:20px;"/><span style="display:block; float:left; margin-left:10px;"> 400-365985698</span><img src="../share/images/clover_house_messages_22.gif" style="display:block; float:right; margin-right:140px;"/></h2>
</div>
<!--右边代码开始-->
<div class="news_right">
  <div class="news1_2">
    <h2 class="news1_2_1">住まいの基礎知識</h2>
    <ul>
      <?php getzhufangHtml('cid=21 row=6');?>
    </ul>
  </div>
  <div class="news5_right">
    <h2 class="news5_text">最新物件</h2>
    <ul>
      <?php getzjproductListHtml('row=5 order=created_date')?>
    </ul>
    <!--    <input type=image  src="../share/images/botton1.gif" style="margin-left:55px; margin-top:12px;"/>  <input type=image  src="../share/images/botton2.gif"  style="margin-left:45px; margin-top:12px;"/>
--></div>
</div>

<!--底部的制作-->

<?php
include_once "../share/fooder.php";
 ?>
<!--底部的制作-->
</body>
</html>
