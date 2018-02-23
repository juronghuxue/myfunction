<?php

use yii\helpers\Html;
use frontend\components\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

$public=Yii::getAlias('@public');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<meta name="format-detection" content="telephone=no"/>
	<title></title>
	<link rel="stylesheet" href="">

	<!-- downloadApp -->
    <link rel="stylesheet" href="<?php echo $public?>/css/downloadapp.css">
    
</head>
<body style="font-size:14px;">
	<!-- 引导下载App -->
	<div class="downloadApp">
		<div class="logo"><img src="/theme/new/images/app/icon_elegomall.png" /></div>
	    <div class="downloadApp-down-no">
	        <a class="downloadApp-down" href="javascript:;"><img src="/theme/new/images/icon_phone.png" /><span>DOWNLOAD APP</span></a>
	        <a class="downloadApp-no" href="javascript:;">Continue to view webpage >></a>
	    </div>
	    <div class="img"><img src="/theme/new/images/app/pic_bg.png" /></div>
	</div>
</body>
<script type="text/javascript" src="<?php echo $public;?>/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?php echo $public;?>/js/auto.js"></script>
<script>
    var type = isAPP();
    $('.downloadApp-down').click(function(){
        if(type == 'Android'){
            window.location.href = 'https://www.elegomall.com/elegomall.apk';
        }
        if(type == 'iOS'){ 
            window.location = 'https://itunes.apple.com/cn/app/id1147716355';
        }
    });
    
    $('.downloadApp-no').click(function(e){
        window.location.href = '<?php echo $url;?>';
        e.stopPropagation();
        e.cancelBubble = true;
    });
    function isAPP(){
        if (/(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent)) {  //判断iPhone|iPad|iPod|iOS
          //alert(navigator.userAgent);  
          return "iOS";
        } else if (/(Android)/i.test(navigator.userAgent)) {   //判断Android
            //alert(navigator.userAgent); 
            return "Android";
        } else {  //pc
            return "pc";
        };
    }
</script>
</html>