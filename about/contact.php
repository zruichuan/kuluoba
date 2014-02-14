<?php
include_once '../include/config.inc.php';
include_once '../include/common.function.php';
?>
<?php
if($_POST['name']){
	$record = array(
		  'company' 	    =>$_POST ['company'],
		  'name'		        =>$_POST ['name'],
		  'surname'		     =>$_POST ['surname'],
		  'phone'	               =>$_POST ['phone'],
		  'Email'	            =>$_POST ['Email'],
		  'validate'	        =>0,
		  'centent'	        =>$_POST ['centent'],
		  'Zipcode'          =>$_POST ['Zipcode'],
		  'provincial'        =>$_POST ['provincial'],
		  'city'              =>$_POST ['city'],
		  'landmarks'         =>$_POST ['landmarks'],
	     'date'		        =>date ( "Y-m-d H:i:s" )
	);
	$id = $db->insert('cms_problems',$record);
		$stm="客户[".$record['name']."]的咨询信息：<br/>
		┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈<br/>
		氏名(担当者名) ：".$record["name"]."<br/>
		┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈<br/>
		ふりがな ：".$record["surname"]."<br/>
		┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈<br/>
		会社名：".$record["company"]."<br/>
		┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈<br/>
		郵便番号 ：".$record["Zipcode"]."<br/>
		┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈<br/>
		都道府県：".$record["provincial"]."<br/>
		┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈<br/>
		市区町村・番地：".$record["city"]."<br/>
		┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈<br/>
		建物名・部屋番号など：".$record["landmarks"]."<br/>
		┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈<br/>
		TEL：".$record["phone"]."<br/>
		┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈<br/>
		その他 内容：".$record["centent"]."<br/>
		┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈<br/>
		メールアドレス ：".$record["Email"]."<br/>
		┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈<br/>";
$stm1="<p>	你的咨询我们已经收到，我们会尽快回复你的咨询，谢谢</p>";
require("../include/smtp.php");
$smtpserver = "smtp.163.com";//SMTP服务器
$smtpserverport =25;//SMTP服务器端口
$smtpusermail = "infohl_10@163.com";//SMTP服务器的用户邮箱
$smtpemailto = "zhangruichuan@huilingsh.com,zruichuan@163.com,ninki@huilingsh.com";//发送给谁
$smtpemailto1=$record["Email"];
$smtpuser = "infohl_10@163.com";//SMTP服务器的用户帐号
$smtppass = "huiling123";//SMTP服务器的用户密码
$mailsubject = "=?utf-8?B?".base64_encode("业务咨询")."?=";//邮件主题
$mailsubject1 = "=?utf-8?B?".base64_encode("咨询回执")."?=";//邮件主题
$mailbody =  $stm;//邮件内容
$mailbody1 =  $stm1;
$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证. 
$smtp->debug = 0;//是否显示发送的调试信息 1=?ture 0=>faile  
$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 
$smtp->sendmail($smtpemailto1, $smtpusermail, $mailsubject1, $mailbody1, $mailtype); 
	if($id){
		echo "<script>alert('谢谢！您的留言成功！我们会尽快回复你的咨询')
		window.location='/index.php';</script>";
	}
	else{
	echo "<script>alert('谢谢！您的留言失败')";
		}

}

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
<title>上海酷羅芭投資管理有限公司</title>
<link type="text/css" rel="stylesheet" href="../share/css/css.css"/>
<script type="text/javascript" src="../share/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(function(){
       //如果是必填的，则加红星标识.
       $("form :input.required").each(function(){
           var $required = $("<span class='high'></span>"); //创建元素
/*           $(this).parent().append($required); //然后将它追加到文档中
*/       });
        //文本框失去焦点后
       $('form :input').blur(function(){
            var $parent = $(this).parent();
            $parent.find(".formtips").remove();
			//验证必填项
			 if( $(this).is('.required') ){
                   if( this.value==""){
                       var errorMsg = '';
                       $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
                   }else{
                       var okMsg = '';
                       $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                   }
            }
           
			//验证手机号
			 if( $(this).is('#phone') ){
               if( this.value=="" || ( this.value!="" && !/^1[3|4|5|8][0-9]\d{4,8}$/.test(this.value) ) ){
                     var errorMsg = '*';
                     $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
               }else{
                     var okMsg = '√';
                     $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
               }
            }
            if( $(this).is('#Email') ){
               if( this.value=="" || ( this.value!="" && !/.+@.+\.[a-zA-Z]{2,4}$/.test(this.value) ) ){
                     var errorMsg = '*';
                     $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
               }else{
                     var okMsg = '√';
                     $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
               }
            }
       }).keyup(function(){
          $(this).triggerHandler("blur");
       }).focus(function(){
            $(this).triggerHandler("blur");
       });//end blur

       
       //提交，最终验证。
        $('#send').click(function(){
               $("form :input.required").trigger('blur');
			   	if($('#chicks').attr('checked') != true) {alert("请同意协议.");return false;}
               if( $('#Email').value=="" || ( $('#Email').value!="" && !/.+@.+\.[a-zA-Z]{2,4}$/.test(this.value) ) ){
				   alert("请填写正确的邮箱.");
				   return false;}
               var numError = $('form .onError').length;
               if(numError){
				   alert("*号为必填项.");
                   return false;
               }
/*               alert("注册成功,密码已发到你的邮箱,请查收.");
*/        });

       //重置
        $('#res').click(function(){
               $(".formtips").remove();
        });
})
//]]>
</script>
</head>

<body>
<!--头部-->
<?php
include_once "../share/head.php";
 ?>

<!--热点图片-->
<div class="contact_redian"></div>
<!--热点图片-->

<div class="contact_da">
  <div class="contact_left">
    <h2 class="contact_title1"> アドバイス </h2>
    <h2 class="contact_text1">連&nbsp; &nbsp;&nbsp;&nbsp;   絡&nbsp;：&nbsp;&nbsp;&nbsp;&nbsp;ミ ス 劉 </h2>
    <h2 class="contact_text3">電&nbsp; &nbsp;&nbsp;&nbsp;   話&nbsp;：&nbsp;&nbsp;&nbsp;+86-(0)21-51113981 </h2>
    <h2 class="contact_text5">E-メール&nbsp;：&nbsp;&nbsp;&nbsp;shanghai@gmail.com.cn</h2>
    <h2 class="contact_text8">アドレス&nbsp;：&nbsp;&nbsp;&nbsp;上海市長寧区中山西路933号虹橋銀城1711-1712室</h2>
    <h3 class="con_title">地図情報</h3>
    <div class="con_map_pic" id="dituContent"></div>
    <h3 class="con_title1"> お問い合わせ</h3>
    <h4 class="clover_contact">お問い合わせやご依頼については下のフォームに必要事項をご入力していただき、ご連絡ください。<br/>
      直接のお電話も受け付けておりますので、直接ご連絡いただく場合は06-6349-9120までご連絡ください。</h4>
    <form id="form1" name="form1" method="post" action="contact.php">
      <div class="contact_form">
        <ul>
          <li class="d"><span class="red">*</span><span class="form_li1">氏名(担当者名)</span>
            <input type="text" name="name" id="mail1" class="mail_form required">
            <span class="mail_1">(全角入力)</span></li>
          <li class="d"><span class="red">*</span><span class="form_li1">ふりがな</span>
            <input type="text" name="surname" id="mail1" class="mail_form required">
            <span class="mail_1">(全角入力)</span></li>
          <li class="d"><span class="red">*</span><span class="form_li1">会社名</span>
            <input type="text" name="company" id="name1" class="name_form required">
          </li>
          <li class="d"><span class="red">*</span><span class="form_li1"> 郵便番号 </span>
            <input type="text" name="Zipcode" id="mail1" class="mail_form required">
            <span class="mail_1">(半角入力) 例:123-4567 </span></li>
          <li class="d"><span class="red">*</span><span class="form_li1">都道府県</span>
            <input type="text" name="provincial" id="name1" class="name_form required">
          </li>
          <li class="d"><span class="red">*</span><span class="form_li1">市区町村・番地</span>
            <input type="text" name="city" id="name1" class="name_form required">
          </li>
          <li class="d"><span class="red">*</span><span class="form_li1">建物名・部屋番号など</span>
            <input type="text" name="landmarks" id="name1" class="name_form required">
          </li>
          <li class="d"><span class="red">*</span><span class="form_li1">TEL</span>
            <input type="text" name="phone" id="name1" class="name_form required">
          </li>
          <li class="h"><span class="red1">*</span><span class="form_li4"> その他 内容</span>
            <textarea name="centent" rows="9" cols="40" class="g required"></textarea>
          </li>
          <li class="b"><span class="red" >*</span><span class="form_li2">メールアドレス </span>
            <input type="text" name="Email" id="Email" class="mail_form">
            <span class="mail_2">携帯電話でドメイン指定受信を利用している場合はメールが届かない可能性がございます。(半角入力)</span></li>
          <li class="c"><span class="red">*</span><span class="form_li3">個人情報の取扱 <br/>
            について</span>
            <div class="tiaokuan_form1">
              <input type="checkbox" name="something" id="chicks"  value ="apple"  class="tiaokuan_form">
            </div>
            <span class="tiaokuan_1">個人情報の取扱について確認・同意します。</span> <span class="tiaokuan-2"> サービス利用規約（以下、本規約といいます）は、株式会社リブセン<br/>
            ス（以下、当社といいます）が運営する賃貸物件情報サイト,を通じ<br/>
            て閲覧者に提供する一切のサービス（以下、本サービスといいます）<br/>
            に適用されるものとします。</span> </li>
        </ul>
      </div>
      <div class="contact-butto">
        <input type=image id="send" src="../share/images/contact-butto_03.gif" value="提出する"/>
      </div>
    </form>
    <br class="clear"/>
  </div>
  <!--联系我们右边的页面开始-->
  
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
<!--    <input type=image  src="../share/images/botton1.gif" style="margin-left:55px; margin-top:12px;"/>
    <input type=image  src="../share/images/botton2.gif"  style="margin-left:45px; margin-top:12px;"/>
-->  </div>
</div>

<!--表格的代码结束--> 

<!--底部的制作-->

<?php
include_once "../share/fooder.php";
 ?>
<!--底部的制作--> 
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(121.419676,31.207364);//定义一个中心点坐标
        map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
	map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
	map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
	map.addControl(ctrl_sca);
    }
    
    //标注点数组
    var markerArr = [{title:"上海酷羅芭投資管理有限公司",content:"地址：上海市長寧区中山西路933号<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;虹橋銀城1711-1712室<br/>TEL：+86-(0)21-51113981",point:"121.419797|31.207441",isOpen:1,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
		 ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
			var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
			var iw = createInfoWindow(i);
			var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
			marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#333",
                        cursor:"pointer"
            });
			
			(function(){
				var index = i;
				var _iw = createInfoWindow(i);
				var _marker = marker;
				_marker.addEventListener("click",function(){
				    this.openInfoWindow(_iw);
			    });
			    _iw.addEventListener("open",function(){
				    _marker.getLabel().hide();
			    })
			    _iw.addEventListener("close",function(){
				    _marker.getLabel().show();
			    })
				label.addEventListener("click",function(){
				    _marker.openInfoWindow(_iw);
			    })
				if(!!json.isOpen){
					label.hide();
					_marker.openInfoWindow(_iw);
				}
			})()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    
    initMap();//创建和初始化地图
</script>
</body>
</html>
