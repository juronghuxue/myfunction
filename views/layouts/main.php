<?php

use yii\helpers\Html;
use frontend\components\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
$customerType = !Yii::$app->user->isGuest?Yii::$app->user->identity->customer_type:1;
if(isset(Yii::$app->session['isOneLogin'])){
  $adModel = new \common\models\Ad();
  $adbanner = $adModel->getAd(14);
}
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

$public = Yii::getAlias('@public');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" style="background:#F7F7F7;">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <?= Html::csrfMetaTags(); ?>
        <meta name="robots" content="INDEX,FOLLOW"/>
        <title><?= Html::encode(Yii::$app->params['meta']["seotitle"]['value']) ?></title>
        <meta name="description" content="<?= Html::encode(Yii::$app->params['meta']["seodesc"]['value']) ?>"/>
        <meta name="keywords" content="<?= Html::encode(Yii::$app->params['meta']["seokeywords"]['value']) ?>"/>
        <?php if (isset(Yii::$app->params['meta']['seocanotical']["value"])) {
            echo Yii::$app->params['meta']['seocanotical']["value"];
        } ?>
<?php $this->head(); ?>

        <link rel="icon" href="<?php echo $public; ?>/img/favicon.png" type="image/x-icon"/>

        <!-- Place favicon.ico in the root directory -->
        <link id="color_scheme" href="<?php echo $public; ?>/css/theme.css" rel="stylesheet">
        <!-- all css here -->
        <!-- bootstrap.min.css -->
        <link rel="stylesheet" href="<?php echo $public ?>/css/bootstrap.min.css">
        <!-- font-awesome.min.css -->
        <link rel="stylesheet" href="<?php echo $public ?>/css/font-awesome.min.css">
        <!-- owl.carousel.css -->
        <link rel="stylesheet" href="<?php echo $public ?>/css/owl.carousel.css">
        <!-- owl.carousel.css -->
        <link rel="stylesheet" href="<?php echo $public ?>/css/meanmenu.min.css">
        <!-- shortcode/shortcodes.css -->
        <link rel="stylesheet" href="<?php echo $public ?>/css/shortcode/shortcodes.css?v=1">
        <!-- nivo-slider.css -->
        <link rel="stylesheet" href="<?php echo $public ?>/css/nivo-slider.css?v=1">
        <!-- style.css -->
        <link rel="stylesheet" href="<?php echo $public ?>/css/style.css">
        <!-- responsive.css -->
        <link rel="stylesheet" href="<?php echo $public ?>/css/responsive.css">
        <!-- downloadApp -->
        <link rel="stylesheet" href="<?php echo $public ?>/css/downloadapp.css">
        <!--yearTipcss-->
        <link rel="stylesheet" href="<?php echo $public; ?>/css/shortcode/yearTip.css">
        <!--wholesales-->
        <link rel="stylesheet" href="<?php echo $public ?>/css/wholesales.css">
        <!--blackfriday skin-->
        <!--<link rel="stylesheet" href="<?php echo $public ?>/css/activitySkin/blackfridaySkin.css">-->
        <!--christmas skin-->
<!--        <link rel="stylesheet" href="<?php echo $public ?>/css/activitySkin/christmasSkin.css">-->

        <script type="text/javascript" src="<?php echo $public; ?>/js/jquery-2.2.4.min.js"></script>
        <!-- <script type="text/javascript" src="<?php echo $public; ?>/js/jquery.lazyload.js"></script> -->
        <script type="text/javascript" src="<?php echo $public; ?>/js/jquery.scrollLoading.js"></script>
        <script src="<?php echo $public ?>/js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- 网页推送 -->
        <script charset="UTF-8" src="//cdn.sendpulse.com/28edd3380a1c17cf65b137fe96516659/js/push/881add1cf7ca99e7a8c6735a88e3fe6d_1.js" async></script>
        <!-- 网页推送 -->
        <script type="text/javascript" src="<?php echo $public; ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $public; ?>/js/auto.js"></script>
        <script type="text/javascript" src="<?php echo $public; ?>/js/yearTip.js"></script>
        <!--<script type="text/javascript" src="<?php echo $public; ?>/js/activity/demo.js"></script>-->
    </head>
    <?php
    if (!empty(Yii::$app->params['headseotag'])) {
        echo Yii::$app->params['headseotag']; //输出seo标签
    }
    ?>
    <body class="pc-body" style="background:#F7F7F7;">
    
        <div class="downloadadd-notes">
            <span class="close-downloadnotes"><img src="/theme/new/images/app/icon_close.png" /></span>
            <img class="note-img" src="/theme/new/images/app/pic_elegomall_1.png" />
            <span class="downloadnotes"><img src="/theme/new/images/icon_phone.png" />&nbsp;DOWNLOAD APP</span>
        </div>
            <?php $this->beginBody() ?>
        <div id="header" class="new_header">
        	
   			 <!--顶部广告栏-->
	<div class="hm-top-ad">
		<a href="#">
			<img src=""/>
		</a>
		<div class="hm-top-ad-closeicon">
			<a href="javascript:;">
				<img src="<?php echo $public;?>/img/index/btn_close_top_banner.png"/>
			</a>
		</div>
	</div>
        
          <?= $this->render('headerBar') ?>
			<?= $this->render('headerNav') ?>
        </div>

        <?= $content ?>

        <?= $this->render('footer') ?>
        <div id="trcking"></div>
<?php $this->endBody() ?>
        <!--liuhongmei===================首页遮罩层======================-->
        <div class="l-tip-cover" style="display:none;">

        </div>
        <!--liuhongmei===================首页18岁的提醒开始======================-->
        <div class="l-year-alert-tip" style="display:none;">
            <div>
                <img src="<?php echo $public ?>/img/index/tip-header.png" alt="消息头部图片"/>
            </div>
            <div class="l-year-alert-content">
                <h4>AGE VERIFICATION</h4>
                <p>You must be 18 years or older to view this site.</p>
            </div>
            <div class="l-footer-line">
                <img src="<?php echo $public ?>/img/index/tip-line.png" alt=""/>
            </div>
            <div class="l-year-alert-footer">
                <button>Under 18</button>
                <button>I'm 18+(Enter Site)</button>
            </div>
        </div>
        <div class="tip-fail" style="display:none;">
            <img src="<?php echo $public ?>/img/index/tip-fail.png"/>
            <span>Our products are not appropriate for individuals under 18</span>
        </div>
        <!--liuhongmei===================首页未满18岁的提醒结束======================-->
         <!--liuhongmei===================黑五活动指引用户注册======================-->
         <div class="log-in-guide">
         	<div class="log-in-guide-close-icon"></div>
         	<div class="log-in-guide-btn">
         		<a href="https://www.elegomall.com/site/signup.html?extension=1" target="_blank">
         			<img src="/theme/new/img/activity/blackfriday/pc/tip/btn_join_us.png" alt=""/>
         		</a>
         	</div>
         	<div class="log-in-desc-text">
         		Register at ElegoMall to get a 5% coupon and 200 points.<br/>
         		Already have an accout? Join Black Friday Sale now!
         	</div>
         </div>
          <!--liuhongmei===================黑五活动指引用户注册======================-->
          <!--新用户第一次登录弹框-->
          <?php if(isset(Yii::$app->session['isOneLogin'])):?>
          <?php Yii::$app->session->remove('isOneLogin')?>
           <div class="l-tip-cover">

           </div>
          <section class="new__user__login">
          		<section class="new__user__left">
                <?php if($customerType==1):?>
                  <div>
                  <img src="/theme/new/img/logintip/pic_user_coupon.png"/>
                </div>
              <?php else:?>
          			<div>
                  <img src="/theme/new/img/logintip/pic_wholesale_coupon.png"/>
                </div>
              <?php endif;?>
          			<div class="new__user--confirmbtn">
          				<a href="javascript:;">
          					<img src="/theme/new/img/logintip/btn_confirm.png" >
          				</a>
          			</div>
          		</section> 
          		<section class="new__user__right">
          			<div class="new__user--imgs">
                  <?php $str = ''?>
                  <?php foreach($adbanner as $key=>$val):?>
                    <?php if($key==0):?>
                      <?php $str = $str.'<a href="javascript:;"  class="active"></a>';?>
                    <?php else:?>
                      <?php $str = $str.'<a href="javascript:;"></a>';?>
                    <?php endif;?>
          				<a href="<?=$val['url']?>">
          					<img src="<?=$val['pic']?>" >
          				</a>
                <?php endforeach;?>
          			</div>
          			<div class="new__user--icons">
          				<?=$str?>
          			</div>
          		</section> 
          		<section class="new__user--closebtn">
          			<img src="/theme/new/img/logintip/bitn_close.png"/>
          		</section>
          </section>
          <?php endif?>
    </body>
</html>
<?php $this->endPage() ?>
<script>
    var type = isAPP();
    if (type != 'pc') {
        //$('.downloadadd-notes').css({'display':'block'});
    }
    $('.downloadnotes').click(function() {
        if (type == 'Android') {
            window.location.href = 'https://www.elegomall.com/elegomall.apk';
        }
        if (type == 'iOS') {
            window.location = 'https://itunes.apple.com/cn/app/id1147716355';
            // setTimeout(function(){
            //     window.location='https://itunes.apple.com/cn/app/id1147716355';//如果超时就跳转到app下载页
            // },500);
        }
    });
    $('.close-downloadnotes').click(function() {
        //关闭
        $('.downloadadd-notes').remove();
    });

    function isAPP() {
        if (/(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent)) {  //判断iPhone|iPad|iPod|iOS
                //alert(navigator.userAgent);  
                return "iOS";
        } else if (/(Android)/i.test(navigator.userAgent)) {   //判断Android
                //alert(navigator.userAgent); 
                return "Android";
        } else {  //pc
                return "pc";
        }
        ;
    }
</script>
<script>
		$(function(){
	//顶部广告栏事件开始
		$(".hm-top-ad").mouseover(function(){
			$(".hm-top-ad-closeicon").css("display","block");
		});
		$(".hm-top-ad").mouseout(function(){
			$(".hm-top-ad-closeicon").css("display","none");
		});
		$(".hm-top-ad-closeicon").click(function(){
			$(".hm-top-ad").slideUp();
		});
		//$(".hm-top-ad").hide();
		$.ajax({
			type:"get",
			url:"/site/get-index.html",
			success:function(data){
					data=JSON.parse(data);
					$(".hm-top-ad").hide();
					if(data.activity_banner.length>0){
							$(".hm-top-ad").show();
							$(".hm-top-ad>a").attr("href",data.activity_banner[0].url);
							$(".hm-top-ad>a>img").attr({"src":data.activity_banner[0].pic,"name":data.activity_banner[0].name});
					}
					else{
						$(".hm-top-ad").hide();
					}
				
				
			}
			
		});
		//顶部广告栏事件结束
//		var scrollTopHight=$(".header-top-area").height();
//		var adHight=$(".hm-top-ad").height();
//		var searchHight=$(".header-bottom-area").height();
//		var scrollHight=scrollTopHight+adHight+searchHight;	
//		$(window).scroll(function(){
//			 if($(window).scrollTop()>scrollHight){
//			 	$(".header-bottom-area").css({"position":"fixed","top":"0","z-index":"888","box-shadow":"0 1px 10px #ccc","width":"100%"});
//			 }
//			 else{
//			 	$(".header-bottom-area").css({"position":"static","box-shadow":"none"});
//			 }
//		})
	});
    jQuery('.mobile-menu-area').css({'top': jQuery('.header-container').height()+jQuery('.header-container').offset().top + 'px'});
	</script>
