<?php
include_once '../include/config.inc.php';
require_once '../include/common.function.php';
$arc = getArticleInfo();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="../share/css/css.css"/>
</head>

<body>
<!--头部-->
<?php
include_once "../share/head.php";
 ?>


<!--左面的新闻子页面-->
 <div class="new1_da-1">
  <div class="news1_left">
            <h2 class="news1_text1">企業ニュース</h2><h4 class="news_text2">前のページに戻る</h4>
              <h2 class="newsleft_1"><?php echo $arc['title'];?></h2>
                 <h2 class="newsleft_2"><?php echo date('Y年m月d日 ',strtotime($arc['created_date']));?></h2>
                 <h2 class="newsleft_3">No.<?php echo $arc['id'];?></h2>
                 <div class="newsleft_4">
                          <?php echo $arc['content'];?>
            
  

                </div>
                          
  </div>
  
  
<div class="news1_right">
     <h2 class="news1_2_1">住まいの基礎知識</h2>
  <ul>
   <?php getzhufangHtml('cid=21 row=6');?>
  </ul>
</div>

<div class="news1_right1">
   <h2 class="news5_text">最新物件</h2>
    <ul>
    <?php getzjproductListHtml('row=5 order=created_date')?>
    </ul>
</div>





</div>



<!--左面的新闻子页面-->
<!--底部的制作-->
<?php
include_once "../share/fooder.php";
 ?>

<!--底部的制作-->
</body>
</html>
