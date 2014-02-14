<?php
include ("admin.inc.php");
include ("../include/fckeditor/fckeditor.php");

$cid	= trim($_GET ['cid'])?trim($_GET ['cid']):0;
//$pid	= trim($_GET ['pid'])?trim($_GET ['pid']):0;
$region=trim($_GET ['region'])?trim($_GET ['region']):0;
$housetype=trim($_GET ['housetype'])?trim($_GET ['housetype']):0;
$price=trim($_GET ['price'])?trim($_GET ['price']):0;
$atrioventricular=trim($_GET ['atrioventricular'])?trim($_GET ['atrioventricular']):0;

$subway = trim($_GET ['subway'])?trim($_GET ['subway']):0;

$xxarea=trim($_GET ['xxarea'])?trim($_GET ['xxarea']):0;

$yugang=trim($_GET ['yugang'])?trim($_GET ['yugang']):0;

$id	= trim($_GET ['id'])?trim($_GET ['id']):0;
$act	= trim($_GET ['act'])?trim($_GET ['act']):'add';

$actName = $act == 'add'?'添加':'修改';
$article = $db->getOneRow ( "select * from cms_case where id=" . $id );
if($actName=='coby')
{
	$article['pic']=''; 
	$article['hxpic']='';}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
<link href="images/css.css" rel="stylesheet" type="text/css">
<script src="../include/js/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8" src="../include/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../include/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="../include/ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">
    var ue = UE.getEditor('editor');

function doAction(a,id){
	ids = 0;
	if(a=='delpic'){
		$.ajax({
			url:'cases.action.php',
			type: 'POST',
			data:'act=delpic&id='+id,
			success: function(data){
				document.getElementById('picdiv').innerHTML="";
			}
		});
	}
}
function doAction1(a,id){
	ids = 0;
	if(a=='delhxpic'){
		$.ajax({
			url:'cases.action.php',
			type: 'POST',
			data:'act=delhxpic&id='+id,
			success: function(data){
				document.getElementById('picdiv1').innerHTML="";
			}
		});
	}
}
</script>
</head>
<body onLoad="document.getElementById('title').focus()">
    <form action="cases.action.php" method="post" enctype="multipart/form-data" name="form1">
        <input type="hidden" name="act" value="<?php echo $act;?>">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="form_title">
          <tr>
            <td height="31"><strong><?php echo $actName;?>房源</strong></td>
          </tr>
        </table>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5%" height="40" class="form_list">标题 ：</td>
    <td colspan="3" width="40%" class="form_list"><input name="title" type="text" class="form" style="width: 60%" value="<?php echo $article ['title'];?>"></td>
    <td class="form_list">摘要：</td>
    <td class="form_list"><textarea name="resume" class="form" style="width: 90%; height: 50px; overflow: auto"><?php echo trim ( $article ['resume'] );?></textarea></td>
  </tr>
    <tr>
    <td height="40" class="form_list">属性：</td>
    <td class="form_list">    
    <input type="checkbox" name="att[]" value="a" <?php if(strstr($article['att'],"a")) echo "checked";?>> 头部推荐[a]&nbsp;&nbsp;
    <input type="checkbox" name="att[]" value="b" <?php if(strstr($article['att'],"b")) echo "checked";?>> 底部推荐[b]&nbsp;&nbsp;
      </td>
    <td height="40" class="form_list">地址：</td>
    <td colspan="3" width="40%" class="form_list"><input name="address" type="text" class="form" style="width: 85%" value="<?php echo $article ['address'];?>"></td>
 
  </tr>

  <tr>
    <td height="40" class="form_list">缩略图：</td>
    <td colspan="3" class="form_list"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="200"><input type="file" name="pic" id="pic"></td>
        <td><div id="picdiv">
          <?php 
                if(!empty($article ['pic'])){
                ?>
          <img src="../<?php echo $article ['pic'];?>" width="100" height="40" onMouseOver="document.getElementById('bigPic').style.display=''" onMouseOut="document.getElementById('bigPic').style.display='none'">
          <div id="bigPic" style="display:none; position:absolute;"><img src="../<?php echo $article ['pic'];?>"></div>
 
              <font style="cursor:pointer; font-size:12px" onclick="doAction('delpic',<?php echo $id;?>,'picdiv')">删除图片</font>
          <?php
                }
                ?>
        </div>           </td>
        
      </tr>
    </table></td>
        <td class="form_list">户型图</td>
    <td class="form_list">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="200"><input type="file" name="hxpic" id="hxpic"></td>
        <td><div id="picdiv1">
          <?php 
                if(!empty($article ['hxpic'])){
                ?>
          <img src="../<?php echo $article ['hxpic'];?>" width="100" height="40" onMouseOver="document.getElementById('bigPic').style.display=''" onMouseOut="document.getElementById('bigPic').style.display='none'">
          <div id="bigPic" style="display:none; position:absolute;"><img src="../<?php echo $article ['hxpic'];?>"></div>
 
              <font style="cursor:pointer; font-size:12px" onclick="doAction1('delhxpic',<?php echo $id;?>,'picdiv1')">删除图片</font>
          <?php
                }
                ?>
        </div>           </td>
        
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="40" class="form_list">所在区域：</td>
    <td class="form_list">
    <input name="cid" type="hidden" value="<?php echo $id;?>">
	<input name="region" type="hidden" value="<?php echo $region;?>">
        <select name="region">
          <option value="0">--选择区域--</option>
          <?php getcaseCategorySelect ($region,"4")?>
        </select></td>
    <td class="form_list">房子类型：</td>
    <td class="form_list">
    <input name="housetype" type="hidden" value="<?php echo $housetype;?>">
        <select name="housetype">
          <option value="0">--选择类型--</option>
          <?php getcaseCategorySelect ($housetype,"8")?>
        </select>
    </td>
    <td class="form_list">价格</td>
    <td class="form_list">
    <input name="price" type="hidden" value="<?php echo $price;?>">
        <select name="price">
          <option value="0">--选择价格--</option>
          <?php getcaseCategorySelect ($price,"7")?>
        </select></td>
  </tr>
  <tr>
    <td height="40" class="form_list">地铁：</td>
    <td class="form_list">
    <input name="cid" type="hidden" value="<?php echo $id;?>">
	<input name="subway" type="hidden" value="<?php echo $subway;?>">
        <select name="subway">
          <option value="0">--选择地铁--</option>
          <?php getcaseCategorySelect ($subway,"17")?>
        </select></td>
    <td class="form_list">面积：</td>
    <td class="form_list">
    <input name="xxarea" type="hidden" value="<?php echo $xxarea;?>">
        <select name="xxarea">
          <option value="0">--选择面积--</option>
          <?php getcaseCategorySelect ($xxarea,"22")?>
        </select>
    </td>
    <td class="form_list">推荐</td>
    <td class="form_list">
    <input name="yugang" type="hidden" value="<?php echo $yugang;?>">
        <select name="yugang">
          <option value="0">--是否推荐--</option>
          <?php getcaseCategorySelect ($yugang,"26")?>
        </select></td>
  </tr>

    <tr>
    <td height="40" class="form_list">房型：</td>
    <td class="form_list">
    <input name="atrioventricular" type="hidden" value="<?php echo $atrioventricular;?>">
        <select name="atrioventricular">
          <option value="0">--选择房型--</option>
          <?php getcaseCategorySelect ($atrioventricular,"9")?>
        </select>
    <td class="form_list">面积：</td>
    <td class="form_list"><input name="area" type="text" value="<?php echo $article ['area'];?>"></td>
    <td class="form_list">楼层：</td>
    <td class="form_list"><input name="floor" type="text" value="<?php echo $article ['floor'];?>"></td>
  </tr>
    <tr>
    <td height="40" class="form_list">总楼层：</td>
    <td class="form_list"><input name="totalfloor" type="text" value="<?php echo $article ['totalfloor'];?>"></td>
    <td class="form_list">建筑年限：</td>
    <td class="form_list"><input name="constructiontime" type="text" value="<?php echo $article ['constructiontime'];?>"></td>
    <td class="form_list">巴士</td>
    <td class="form_list"><input name="traffic" type="text" value="<?php echo $article ['traffic'];?>"></td>

  </tr>
    <tr>
    <td height="40" class="form_list">适合对象：</td>
    <td class="form_list"><input name="shobject" type="text" value="<?php echo $article ['shobject'];?>"></td>
    <td class="form_list">超市</td>
    <td class="form_list"><input name="supermarket" type="text" value="<?php echo $article ['supermarket'];?>"></td>
    <td class="form_list">便利店</td>
    <td class="form_list"><input name="conveniencestore" type="text" value="<?php echo $article ['conveniencestore'];?>"></td>
  </tr>
      <tr>
    <td height="40" class="form_list">饭店：</td>
    <td class="form_list"><input name="restaurant" type="text" value="<?php echo $article ['restaurant'];?>"></td>
    <td class="form_list">医院</td>
    <td class="form_list"><input name="hospital" type="text" value="<?php echo $article ['hospital'];?>"></td>
    <td class="form_list">银行</td>
    <td class="form_list"><input name="bank" type="text" value="<?php echo $article ['bank'];?>"></td>
  </tr>
    <tr>
    <td height="40" class="form_list">电梯：</td>
    <td class="form_list"><input name="elevator" type="text" value="<?php echo $article ['elevator'];?>"></td>
    <td class="form_list">停车场</td>
    <td class="form_list"><input name="parking" type="text" value="<?php echo $article ['parking'];?>"></td>
    <td class="form_list">空调</td>
    <td class="form_list"><input name="air_cood" type="text" value="<?php echo $article ['air_cood'];?>"></td>
  </tr>
    <tr>
    <td height="40" class="form_list">空调时间：</td>
    <td class="form_list"><input name="air_cood_time" type="text" value="<?php echo $article ['air_cood_time'];?>"></td>
    <td class="form_list">酒店</td>
    <td class="form_list"><input name="hotel" type="text" value="<?php echo $article ['hotel'];?>"></td>
    <td class="form_list">管理费</td>
    <td class="form_list"><input name="management" type="text" value="<?php echo $article ['management'];?>"></td>
  </tr>

    <tr>
    <td height="40" class="form_list">占有率：</td>
    <td class="form_list"><input name="share" type="text" value="<?php echo $article ['share'];?>"></td>
    <td class="form_list">健身房：</td>
    <td class="form_list"><input name="gym" type="text" value="<?php echo $article ['gym'];?>"></td>
    <td class="form_list">游泳池：</td>
    <td class="form_list"><input name="swimming" type="text" value="<?php echo $article ['swimming'];?>"></td>
  </tr>
      <tr>
    <td height="40" class="form_list">附近地铁：</td>
    <td class="form_list"><input name="subways" type="text" class="form"  value="<?php echo $article ['subways'];?>"></td>
    <td height="40" class="form_list">高架桥：</td>
    <td class="form_list"><input name="elevated" type="text" class="form"  value="<?php echo $article ['elevated'];?>"></td>
    <td class="form_list">总金额：</td>
    <td class="form_list"><input name="total_amount" type="text" value="<?php echo $article ['total_amount'];?>"></td>
  </tr>

  <tr>
    <td colspan="4" class="form_list">
    <script id="editor" type="text/plain" name="map" style="width:700px;height:430px;">
    <?php echo $article ['map'];?>
    </script>
    </td>
    <td colspan="2" class="form_list">&nbsp;

    </td>
  </tr>
  <tr>
    <td colspan="4" align="center" class="form_list">
        	<?php
        $oFCKeditor = new FCKeditor ( 'content' );
        $oFCKeditor->BasePath = "../include/fckeditor/";
        $oFCKeditor->ToolbarSet = 'MyToolbar';
        $oFCKeditor->Value = $article ['content'];
        $oFCKeditor->Height = 430;
        $oFCKeditor->Create ();
    ?>    

	</td>
    <td colspan="2" class="form_list">&nbsp;</td>

  </tr>
</table>
        
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="form_title">
          <tr>
            <td height="31" align="center"><strong><span class="form_footer">
              <input name="id" type="hidden" value="<?php echo $id;?>">
              <input type="submit" name="button" id="button" value=" 提 交 ">
              <input type="button" value=" 返 回 " onClick="window.history.go(-1)">
            </span></strong></td>
          </tr>
        </table>
</form>
</body>
</html>
