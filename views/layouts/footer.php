
<!--新的footer-->
<?php

use yii\helpers\Html;
use frontend\components\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

$public=Yii::getAlias('@public')
?>
<style>
	
	.newletter-logo .title1{
		display: inline-block;
		margin-left: 10px;
		font-size: 14px;
		font-weight: bold;
		color: #4c4c4c;
		margin-bottom: 0px;
		/*margin-top: 10px;*/
	}
	.newletter-logo .title2{
		/*display: inline-block;*/
		margin-left: 62px;
		line-height: 16px;
		font-size:12px;
		color:#666;
	}
	
	@media only screen and (max-width:768px ) {
	.newletter-logo .title1{
		display: block;
		margin-left: 10px;
		font-size: 14px;
		font-weight: bold;
		color: #4c4c4c;
		margin-bottom: 0px;
		/*margin-top: 10px;*/
	}
	.bottom_8{
		bottom:8px;
	}
	.newletter-logo .title2{
		margin-left: 0px;
		line-height: 16px;
		font-size:12px;
		color:#666;
	}
	}
</style>
<!-- newletter-area-start -->
<div class="newletter-area ptb-30 footer-none l-f-mt" style="background: #fff;border-top: 1px solid #e3e3e5;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 bottom_8">
                <div class="newletter-logo">
                    <span  style="float: left"><img src="<?php echo $public ?>/img/pic_original.png" alt="" /></span>
                    <div style="padding-top:2px;">
                        <p class="title1" > 100% ORIGINAL</p>
                        <p class="title2" > All products are absolutely original brands.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 bottom_8">
                <!--                <div class="subscribe-form">-->
                <!--                    <form action="#">-->
                <!--                        <input placeholder="Email address..." type="text">-->
                <!--                        <button class="subscribe">Subscribe</button>
                <!--                    </form>-->
                <!--                </div>-->
                <div class="newletter-logo">
                    <span style="float: left"><img src="<?php echo $public ?>/img/pic_money_back_guarantee.png" alt="" /></span>
                    <div >
                        <p class="title1" > MONEY BACK GUARANTEE</p>
                        <p class="title2" > 7 days 100% money back guarantee</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 bottom_8">
                <!--                <div class="subscribe-social text-right">-->
                <!--                    <a href="#"><i class="fa fa-youtube"></i></a>-->
                <!--                    <a href="#"><i class="fa fa-facebook"></i></a>-->
                <!--                    <a href="#"><i class="fa fa-google-plus"></i></a>-->
                <!--                    <a href="#"><i class="fa fa-twitter"></i></a>-->
                <!--                </div>-->
                <div class="newletter-logo">
                    <span  style="float: left"><img src="<?php echo $public ?>/img/pic_24_hour_delver.png" alt="" /></span>
                    <div >
                        <p class="title1"> 24 HOUR DELIVER </p>
                        <p class="title2 " > All orders in stock deliver in 24 hours.</p>
                    </div>
                </div>
            </div>
             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 bottom_8">
                <div class="newletter-logo">
                    <span  style="float: left"><img src="<?php echo $public ?>/img/pic_free_shipping.png" alt="" /></span>
                    <div style="padding-top:2px;">
                        <p class="title1" > FREE SHIPPING</p>
                        <p class="title2" > All retail orders enjoy free shipping</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- newletter-area-end -->
<footer>
    <!-- footer-top-area -->
    <div class="footer-top-area ptb-40 footer-bg" style="padding-top: 44px;padding-bottom:16px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
                    <div class="footer-title">
                        <h4>Custormer Service</h4>
                    </div>
                    <div class="footer-widget">
                        <div class="list-unstyled">
                            <ul>
                                <li><a href="/about_us.html">About Us</a></li>
                                <li><a href="/site/about.html">Contact Us</a></li>
                                <li><a href="/user.html">My Account</a></li>
                                <li><a href="/points_and_coupons.html">Points & Coupons</a></li>
                                <li><a href="/warranty_refund.html">Warranty & Refund</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="footer-title">
                        <h4>Shopping Guideline</h4>
                    </div>
                    <div class="footer-widget">
                        <div class="list-unstyled">
                            <ul>
                                <li><a href="/payments.html">Payment Methods</a></li>
                                <li><a href="/shipping_guide.html">Shipping Guide</a></li>
                                <li><a href="/pre_order.html">Pre-Order</a></li>
                                <li><a href="/user_guide.html">New User Guide</a></li>
                                <li><a href="/faq.html">Frequently Asked Questions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-title">
                        <h4>Business Chances</h4>
                    </div>
                    <div class="footer-widget"> 
                        <div class="list-unstyled">
                            <ul>
                                <li><a href="/wholesale.html">Wholesale</a></li> 
                                <li><a href="/affiliate_program.html">Affiliate Program</a></li> 
                                <li><a href="/drop_shipping.html">Drop Shipping</a></li>
                                <li><a href="/certificates.html">Certificates</a></li>
                                <li><a href="/partners.html">Partners</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-title">
                        <h4>Be The First To Know</h4>
                    </div>
                    <div class="footer-widget">
                        <div class="list-unstyled" style="margin-top: 23px">
                            <div class="h5 WorldColor" style="line-height: 20px;overflow : hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;text-align:left;">Get all the latest information on Events,<br> Sales and Offers. Sign up for newsletter <br>today.</div>
                            <div class="h5 WorldColor" style=" margin-top: 40px;margin-bottom: 20px;text-align:left;">Enter your e-mail Address</div>
                            <div>
                                <input type="text" style="float:left" name="email" id="newsletter_footer" title="Sign up for our newsletter" class="input-text required-entry validate-email">
                                <button style="float:left" id="subscription" type="button" title="Submit" class="button"><span><span>Submit</span></span></button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 downloadAPP">
                    <div class="footer-title">
                        <h4>Download Our App</h4>
                    </div>
                    <div class="footer-widget">
                        <div class="list-unstyled text-align">
                            <img src="<?php echo $public;?>/images/ios-adrs.png">
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="footer-title">
						<h4>Instagram</h4>
					</div>
					<div class="footer-widget">
						<div class="footer-widget-img">
							<div class="single-img">
								<a href="#"><img src="<?php echo $public?>/img/footer/1.jpg" alt="" /></a>
							</div>
							<div class="single-img">
								<a href="#"><img src="<?php echo $public?>/img/footer/2.jpg" alt="" /></a>
							</div>
							<div class="single-img">
								<a href="#"><img src="<?php echo $public?>/img/footer/3.jpg" alt="" /></a>
							</div>
							<div class="single-img">
								<a href="#"><img src="<?php echo $public?>/img/footer/4.jpg" alt="" /></a>
							</div>
							<div class="single-img">
								<a href="#"><img src="<?php echo $public?>/img/footer/5.jpg" alt="" /></a>
							</div>
							<div class="single-img">
								<a href="#"><img src="<?php echo $public?>/img/footer/6.jpg" alt="" /></a>
							</div>
						</div>
					</div>
				</div> -->
            </div>
            <div class="col-lg-12 h5 time-bottom-2 Ftime-area" style="padding: 0px; color: #FFF;margin-top: 40px;">
                <div class="col-lg-8"  style="padding: 0px;text-align: left">Service Time: 9:00am - 18:00pm HK Time,Monday - Friday (holiday excluded)&nbsp;&nbsp;<a href="/elegomall_time.html" style="border-radius:3px; background-color: #FF7043; color: #fff;">&nbsp;&nbsp;Check Elegomall Time&nbsp;&nbsp;</a></div>
                <div class="col-lg-4" style=" text-align: right;padding: 0px;">© 2017 Elego Tech Ltd,. All Rights Reserved.</div>
            </div>
            <div class="row threer">
                <div class="col-lg-1  col-xs-12" style="margin-top: 6px;">
                     <img src="<?php echo $public ?>/img/footer/logo_elego.png" alt="">
                </div>
                <div class="F_float"></div>
                <div class="col-lg-4 col-xs-12 social-icons" id="impotant" style="float:left">

                <a href="https://www.facebook.com/ElegoMall" style="width:30px; height:30px;display:inline-block;" class="icon1-class" title="Facebook">
                    <img src="<?php echo $public ?>/img/footer/icon_facebook.png" alt="">
                </a>
                <a href="https://twitter.com/ElegoMall" style="width:30px; height:30px;" class="icon2-class" title="">&nbsp;
                    <img src="<?php echo $public ?>/img/footer/icon_twitter.png" alt="" class ="img-margin" style="margin-right: 6px;">
                </a>
                <a href="https://www.linkedin.com/company/elegomall" style="width:30px; height:30px;" class="icon3-class" title="">
                      <img src="<?php echo $public ?>/img/footer/icon_instgram.png" alt="">
                </a>
                <a href="https://www.youtube.com/channel/UCswFnjs4ioKy8Ui3BnSVtvw" style="width:30px; height:30px;" class="icon4-class" title="Youtube">&nbsp;
                     <img src="<?php echo $public ?>/images/footer/icon_youtube_1.png" alt="">
                </a>
                 <a href="https://www.pinterest.com/elegomallcom/pins/" style="width:30px; height:30px;" class="icon5-class" title="pinterest">&nbsp;
                     <img src="<?php echo $public ?>/images/footer/icon_pinterest_1.png" alt="">
                </a>
                <a href="https://vk.com/1elegomall" style="width:30px; height:30px;" class="icon6-class" title="vk">&nbsp;
                     <img src="<?php echo $public ?>/images/footer/icon_vk_1.png" alt="">
                </a>
                 <a href=" https://www.instagram.com/elegomall_com/" style="width:30px; height:30px;" class="icon7-class" title="instagram">&nbsp;
                     <img src="<?php echo $public ?>/images/footer/instagram_1.png" alt="">
                </a>


                </div>
              <!--   <div class="col-lg-1 col-xs-12 empty"></div> -->
                <div class="col-lg-4 col-xs-12">
                   <img src="<?php echo $public ?>/img/footer/pic_payment(1).png" alt="" style="max-width: 100%;">
                </div>
                <div class="col-lg-1 col-xs-4" style="padding:0;">
                   <!--  <script type="text/javascript">
                        var mpt = new Date();
                        var mpts = mpt.getTimezoneOffset() + mpt.getTime();
                        document.write("<script type=\"text\/javascript\" src=\"https:\/\/altfarm.mediaplex.com\/ad\/js\/27736-236398-12439-235\?sz=105x38&color=full&enc_id=3ZP9N5M93ZEP4&category=3C&mpt=" + mpts + "&mpvc=\"><\/script>");
                    </script>
                     <noscript>
                            <a href="https://adfarm.mediaplex.com/ad/nc/27736-236398-12439-235?sz=105x38&color=full&enc_id=3ZP9N5M93ZEP4&category=3C"><img src="https://adfarm.mediaplex.com/ad/nb/27736-236398-12439-235?sz=105x38&color=full&enc_id=3ZP9N5M93ZEP4&category=3C" alt="Click Here" border="0"></a>
                     </noscript> -->
                    <!--  <a target="_blank" href="https://altfarm.mediaplex.com/ad/ck/27736-236398-12439-235?sz=105x38&color=full&enc_id=3ZP9N5M93ZEP4&category=3C&mpt=1503020264758&mpvc=&mpcr=101612566&mpcrset=set105x38_full&mpr=69091098" onclick="mplx.send_oob()"> -->
                        <img ismap style="width:100px;height:40px;" border=0 src="<?php echo $public ?>/images/palpay.png">
                     <!-- </a> -->
                    <!--  <img src="<?php echo $public ?>/images/palpay.png" alt=""> -->
                 </div>
                <div class="col-lg-2 col-xs-4 mar">
                      <span id="siteseal">
                       <!--  <script async="" type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=5J1fHr0Jhw2qP0sZ9qBQnLemVuaQC4tnwTH5VZohwTIsNJpCEYdFNWPfWy8p">
                        </script> -->
                        <img src="<?php echo $public ?>/img/pic_security.png" onclick="verifySeal();" alt="SSL site seal - click to verify">
                     </span>
                </div>
        </div>
    </div>
</footer>
<!-- copyright-area-start -->
<!-- <div class="copyright-area text-center bg-color-3">
	<div class="container">
		<div class="copyright-border ptb-30">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="copyright text-left">
						<p>Copyright &copy; 2017.Elegomall All rights reserved.</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="payment text-right">
						<a href="#"><img src="<?php echo $public?>/img/payment.png" alt="" /></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!-- copyright-area-end -->
<!-- social_block-start -->
<!-- <div id="social_block">
	<ul>
		<li class="facebook"><a href="#">Facebook</a></li>
		<li class="twitter"><a href="#">twitter</a></li>
		<li class="rss"><a href="#">rss</a></li>
		<li class="youtube"><a href="#">youtube</a></li>
		<li class="google-plus"><a href="#">google plus</a></li>
		<li class="pinterest"><a href="#">pinterest</a></li>
	</ul>
</div> -->
<!-- social_block-end -->


<!-- all js here -->
<!-- jquery-1.12.0 -->

<!-- nivo.slider.js -->
<script src="<?php echo $public?>/js/jquery.nivo.slider.pack.js"></script>
<!-- jquery-ui.min.js -->
<script src="<?php echo $public?>/js/jquery-ui.min.js"></script>
<!-- jquery.magnific-popup.min.js -->
<script src="<?php echo $public?>/js/jquery.magnific-popup.min.js"></script>
<!-- jquery.meanmenu.min.js -->
<script src="<?php echo $public?>/js/jquery.meanmenu.js"></script>
<!-- jquery.scrollup.min.js-->
<script src="<?php echo $public?>/js/jquery.scrollup.min.js"></script>
<!-- owl.carousel.min.js -->
<script src="<?php echo $public?>/js/owl.carousel.min.js"></script>
<!-- plugins.js -->
<script src="<?php echo $public?>/js/plugins.js"></script>
<!-- main.js -->
<script src="<?php echo $public?>/js/main.js"></script>
<script src="<?php echo $public?>/js/layer/layer.js"></script>
<script type="text/javascript">

$(function(){
    var csrf = '<?=Yii::$app->request->getCsrfToken()?>';
    $("#subscription").click(function(){
        var email = $("#newsletter_footer").val();
        if(!email.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)){
            msg=  layer.msg('Please enter the correct mail', {icon: 2,shade: 0.1,time:1000});
        }else{
            msg=  layer.msg('Subscribing', {icon: 16,shade: 0.1,time:10000});
            $.post("/user/add-subscription.html",{_csrf:csrf,email:email}, function(data) {
                if( data.state==1 ){
                    setTimeout(function(){
                        layer.close(msg);
                        layer.msg('Subscription success', {icon: 1,shade: 0.1,time:1500});
                    }, 500);
                }else if( data.state==2 ){
                    setTimeout(function(){
                        layer.close(msg);
                        layer.msg('The mailbox has been subscribed', {icon: 6,shade: 0.1,time:1500});
                    }, 500);
                }else if( data.state==3 ){
                    setTimeout(function(){
                        layer.close(msg);
                        layer.msg('We have send you a confirm email. Please confirm subscription by email.', {icon: 6,shade: 0.1,time:1500});
                    }, 500);
                }else{
                    setTimeout(function(){
                        layer.close(msg);
                        layer.msg('Please enter the correct mail', {icon: 2,shade: 0.1,time:1500});
                    }, 500);
                }
            }, "json");
        }
    });
});
$(function(){

$(".icon1-class img").hover(function(){
        $(this).attr("src",'<?=$public?>'+"/images/footer/icon_facebook_2.png");
    },function(){
    $(this).attr("src",'<?=$public?>'+"/img/footer/icon_facebook.png");
});

 $(".icon2-class img").hover(function(){
        $(this).attr("src",'<?=$public?>'+"/images/footer/icon_tiwtter_2.png");
    },function(){
    $(this).attr("src",'<?=$public?>'+"/img/footer/icon_twitter.png");
});

 $(".icon3-class img").hover(function(){
        $(this).attr("src",'<?=$public?>'+"/images/footer/icon_LinkedIn_2.png");
    },function(){
    $(this).attr("src",'<?=$public?>'+"/img/footer/icon_instgram.png");
});

 $(".icon4-class img").hover(function(){
    $(this).attr("src",'<?=$public?>'+"/images/footer/icon_youtube_2.png");
    },function(){
    $(this).attr("src",'<?=$public?>'+"/images/footer/icon_youtube_1.png");
});

$(".icon5-class img").hover(function(){
     $(this).attr("src",'<?=$public?>'+"/images/footer/icon_pinterest_2.png");
    },function(){
    $(this).attr("src",'<?=$public?>'+"/images/footer/icon_pinterest_1.png");
});
 $(".icon6-class img").hover(function(){
        $(this).attr("src",'<?=$public?>'+"/images/footer/icon_vk_2.png");
    },function(){
    $(this).attr("src",'<?=$public?>'+"/images/footer/icon_vk_1.png");
});
  $(".icon7-class img").hover(function(){
        $(this).attr("src",'<?=$public?>'+"/images/footer/instagram_2.png");
    },function(){
    $(this).attr("src",'<?=$public?>'+"/images/footer/instagram_1.png");
});
})
</script>

<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
window.__lc = window.__lc || {};
window.__lc.license = 8854324;
// (function() {
//   var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = false;
//   lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
//   // var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
//   // var s = document.getElementById('#trcking');
//   // $.getScript(lc,function(){alert(s)});
//   alert(s);
// })();
</script>
<!-- End of LiveChat code -->
<!--google的跟踪代码 -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-48153878-1', 'auto');
    ga('send', 'pageview');

</script>
<!--不懂做什么用的代码 ，影响网页加载速度 -->
<style>
    /*@import url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600,700,800');*/
</style>
<?php
    $this->registerJs('
        jQuery(document).ready(function(){
            (function() {
                  var lc = document.createElement("script"); lc.type = "text/javascript"; lc.async = true;
                  lc.src = ("https:" == document.location.protocol ? "https://" : "http://") + "cdn.livechatinc.com/tracking.js";
                  // var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(lc, s);
                  var s = document.getElementById("trcking");
                  // alert(s);
                  // $.getScript(lc,function(){
                    jQuery("#trcking").append(lc);
                // });
                })();
        });
    ');
?>