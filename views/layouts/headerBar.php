<?php

use yii\helpers\Html;
use frontend\components\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\models\HotSearch;
use common\models\PointLog;


/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$query = new \yii\db\Query();
$result = $query->select('sum(number) as number')->from('cart')->where(['or', 'session_id = "' . Yii::$app->session->id . '"', 'user_id = ' . (Yii::$app->user->id ? Yii::$app->user->id : -1)])->createCommand()->queryOne();
$totalNumber = $result['number'];
$public=Yii::getAlias('@public')
?>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Add your site or application content here -->
<!-- header -->
<style>
    input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill {
        background-image: none;
        color: rgb(0, 0, 0);
        background-color:rgb(0.0.0);
    }
</style>
<link rel="stylesheet" href="<?php echo $public;?>/css/font/iconfont.css">
<link rel="stylesheet" href="<?php echo $public;?>/css/mobile_head.css">
<header>

	<!-- header-top-area-start -->
	<div class="header-top-area black-bg ptb-7 hidden-xs header-Bg header-topbar">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-5 col-sm-5">
					<div class="header-top-left">
						<span style="margin-right:4px;">Your Best Vape Wholesale Supplier!</span>
						<?php if (Yii::$app->user->isGuest) { ?>
							<span>  <a href="<?= Yii::$app->urlManager->createUrl(['site/login']) ?>" rel="nofollow">Sign in </a><span>or</span><a href="<?= Yii::$app->urlManager->createUrl(['/site/signup']) ?>" rel="nofollow"> Join free</a></span> <?php }
						else { ?>
							<span><a style="border-right: 0px;" class="" href="<?= Yii::$app->urlManager->createUrl(['/user']) ?>">HELLO&nbsp;<?= Yii::$app->user->identity->username ?></a></span>
							<?php
							$user_id=Yii::$app->user->identity->id;//获取当前登陆客户的ID
							$conditions = "user_id = " . $user_id . " and created_at>=" . strtotime(date('Y-m-d') . ' 00:00:00') . " and created_at<= " . strtotime(date('Y-m-d') . ' 23:59:59') . ' and type = ' . PointLog::POINT_TYPE_LOGIN;
							$pointLog = PointLog::find()->where($conditions)->count();
							if (empty($pointLog)) {
								//并且往point_log里面加入一条登陆获取的积分,并获积分
								PointLog::add($user_id, PointLog::POINT_TYPE_LOGIN, 5);
							}
							?>
						<?php } ?>
					</div>
				</div>
				<div class="col-lg-7 col-md-7 col-sm-7">
					<div class="header-top-right">
						<ul>
							<li class="slide-toggle">
								 	<a href="<?= Yii::$app->urlManager->createUrl(['/user']) ?>">
										<img src="<?php echo $public;?>/images/icon_my_account.png"   alt="">My Account<img src="<?php echo $public;?>/images/icon_down_top_bar.png" alt="">
								    </a>	
                                <div class="account-show">
                                    <div class="account-hide" style="width: 122px;margin: 0 auto;">
										<a href="<?= Yii::$app->urlManager->createUrl(['/user']) ?>" style="color:ee3e43;">
											<img src="<?php echo $public;?>/images/icon_my_account.png"   alt="">My Account<img src="<?php echo $public;?>/img/index_two/icon_up_two.png" alt="">
								    	</a>
                                    </div>
                                    <div class="account-cata">
                                    	<div>
                                    		<a href="<?= Yii::$app->urlManager->createUrl(['order/index']) ?>"><img class="acount-img01" src="<?php echo $public;?>/img/index_two/icon_my_order.png" alt=""><br>
                                    		<span> My Order</span></a>
                                    	</div>
                                    	<div>
                                    		<a href="<?= Yii::$app->urlManager->createUrl(['user/coupon']) ?>"><img class="acount-img02" src="<?php echo $public;?>/img/index_two/icon_my_coupon.png" alt=""><br>
                                    		<span> My Coupon</span></a>
                                    	</div>
                                    	<div>
                                    		<a href="<?= Yii::$app->urlManager->createUrl(['user/arrival-notice']) ?>"><img class="acount-img01" src="<?php echo $public;?>/img/index_two/icon_arriver_notice.png" alt=""><br>
                                    		<span>Arriver Notice</span></a>
                                    	</div>
                                    	<div>
                                    		<a href="<?= Yii::$app->urlManager->createUrl(['user/favorite']) ?>"><img class="acount-img03" src="<?php echo $public;?>/img/index_two/icon_my_wishlist.png" alt=""><br>
                                    		<span>My Wishlist</span></a>
                                    	</div>
                                    </div>

                                    <?php if (Yii::$app->user->isGuest):?>
	                                    <div class="account-link">
	                                    	<a href="<?= Yii::$app->urlManager->createUrl(['site/login']) ?>" style="display: inline-block;">hi,&nbsp;login here</a>
	                                    	<!-- <a href="<?= Yii::$app->urlManager->createUrl(['/site/signup']) ?>" style="display: inline-block;">REGISTER</a> -->
	                                    </div>
	                                    <p><span>New Customer? </span><span><a href="<?= Yii::$app->urlManager->createUrl(['/site/signup']) ?>" style="display: inline-block;"><em style="color:#ee3e43">Start Here</em></a></span></p>
                                	<?php else:?>
	                                    <button class="account-logout">
											<a href="<?= Yii::$app->urlManager->createUrl(['site/logout']) ?>" style="display: inline-block;">LOG OUT</a>
	                                    </button>
                                	<?php endif;?>
                                     
                                </div>
							</li>
						</ul>
						<ul>
							<li class="slide-toggle-1">
                                <a href="#"><img src="<?php echo $public;?>/images/icon_mobile_app.png" alt="">Mobile App  <img src="<?php echo $public;?>/images/icon_down_top_bar.png" alt="">
                                </a>
                                <div class="ios_show">
                                	 <a href="#"><img src="<?php echo $public;?>/images/icon_mobile_app.png" alt="">Mobile App  <img src="<?php echo $public;?>/img/index_two/icon_up_two.png" alt="">
                                    </a>
                                    <img class="ios-adr" src="<?php echo $public;?>/images/ios-adrs.png" alt="">
                                    <P>IOS/Android</P>
                                </div>
                            </li>
						</ul>
                        <ul>
                           <li class="slide-toggle-2"><a href="/user_guide.html" style="font-weight: normal;">Help Center</a>
                            </li>
                        </ul>
						<ul>
                           <li class="" style="margin-left: 10px;"><a href="/blogs/" style="font-weight: normal;">Blog</a>
                            </li>
                        </ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- header-top-area-end -->
	<!-- header-bottom-area-start -->
	<div class="header-bottom-area bg-color-1 ptb-25 header-new-25">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="logo">
						<a href="/" style="float:left;">
							<?php if(Yii::$app->request->getUrl()=='/' or Yii::$app->request->getUrl()==Yii::$app->urlManager->createUrl(['/site/index'])):?>
                                <h1>
                                	 <img src="<?php echo $public?>/img/index/new_slogan.png" alt="ElegoMall" /> 
                                	<!-- <img src="<?php echo $public?>/img/activity/blackfriday/pc/Logo.gif" alt="ElegoMall" /> -->
                                	<!--<img src="<?php echo $public?>/images/Foxmaillnk.gif" alt="ElegoMall" />-->
                                </h1>
                            <?php else:?>
                                 <img src="<?php echo $public?>/img/index/new_slogan.png" alt="ElegoMall" /></span> 
                                <!--<img src="<?php echo $public?>/images/Foxmaillnk.gif" alt="ElegoMall" />-->
                                 <!--<img src="<?php echo $public?>/img/activity/blackfriday/pc/Logo.gif" alt="ElegoMall" /></span>-->
                            <?php endif;?>

						</a>
						<span style="display:none;" class="user_center_APP iconfont icon-wode"></span>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 fb-mt-25" style="padding-right:10px;margin-left:-54px;">
					<div class="header-bottom-middle">
						<div class="search-box search-inner">

							<form action="<?= Yii::$app->urlManager->createUrl(['/catalogsearch/result/']) ?>" method="get" id="search_fm" name="search_fm" >
								<!--<img src="<?php echo $public?>/images/icon_searche.png" alt="">-->

								<input class="sea_input" style='padding-left:12px;width:100%;' type="text" name="keyword" id="searchText" placeholder="Search entire store here..." value="<?= Yii::$app->request->get('keyword', '') ?>" />

								             <button onclick="return checkform()" style='width:50px;'><!--<i class="fa fa-search"></i>--> <img src="<?php echo $public?>/img/index/icon_search.png"/></button> 
							</form>
						</div>
						<div class="hotWord">
						<?php $hotSearch = HotSearch::getKeywords()?>
							
						<?php $last = array_pop($hotSearch);?>
							<?php foreach($hotSearch as $key=>$val):?>
								<a href="<?=$val['url']?>"><?=$val['keywords']?></a>
							<?php endforeach;?>
							<?php if(!empty($last)):?>
								<a href="<?=$last['url']?>"><?=$last['keywords']?></a>
							<?php endif;?>
							<!-- <a href="<?= Yii::$app->urlManager->createUrl(['category/view','keyword'=>'VOOPOO DRAG']) ?>">VOOPOO DRAG</a>|
							<a href="<?= Yii::$app->urlManager->createUrl(['category/view','keyword'=>'iStick Pico']) ?>">iStick Pico</a>|
							<a href="<?= Yii::$app->urlManager->createUrl(['category/view','keyword'=>'iCare']) ?>">iCare</a>|
							<a href="<?= Yii::$app->urlManager->createUrl(['category/view','keyword'=>'SMOK Alien']) ?>">SMOK Alien</a>|
							<a href="<?= Yii::$app->urlManager->createUrl(['category/view','keyword'=>' eGo AIO']) ?>"> eGo AIO</a>|
							<a href="<?= Yii::$app->urlManager->createUrl(['category/view','keyword'=>'Cleito']) ?>">Cleito </a>|
							<a href="<?= Yii::$app->urlManager->createUrl(['category/view','keyword'=>'iJust']) ?>">iJust S </a> -->
						</div>
					</div>
					
				</div>
				<div class="col-lg-3 col-md-3 col-sm-2 col-xs-2 MOBILE_cart" style="height:100%;padding-left:0;position:relative;display:none;">
					<i class="fa fa-shopping-cart MOBILE_cart_click" style="line-height:40px;font-size:28px;color:#ee3e43;"></i>
					<span class="monileAddNumber" style="position:absolute;top:6px;left:18px;display:inline-block;width:16px;height:16px;background:green;text-align:center;line-height:16px;font-size:12px;border-radius:8px;color:#ffffff;font-weight:bold;"><?=$totalNumber?$totalNumber:0 ?></span>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-2 col-xs-2 PC_cart fb-mt-25" style="margin-left:50px">
					<div class="header-bottom-right">
							<div class="left-cart">
								<div class="header-compire">
									<a href="<?= Yii::$app->urlManager->createUrl(['/cart']) ?>">
										<!--<i class="fa fa-heart"></i>--> 
										<img src="<?php echo $public?>/images/icon_shopping_cart.png" alt="">
											<!--<img src="<?php echo $public?>/img/activity/blackfriday/pc/icon_shopping_cart.png" alt="">-->
											SHOPPING CART </a>
									<a href="<?= Yii::$app->urlManager->createUrl(['/cart']) ?>"><div class="addNumber"><?=$totalNumber?$totalNumber:0 ?></div></a>
								</div>
							</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- header-bottom-area-end -->	
	
<!----mobile-head-start------------>	
<div class="header-container">
	<div class="mobile-menu-area-list">
		<nav id="nav-menu" class="nav" onclick=""><img src="<?php echo $public?>/images/icon_Category_defult.png">
		</nav>
		
		<p class="shoppingcart">
		<a style="float:left;margin-left:0.5rem;padding-left:0; width:1.75rem; height:1.6rem;" href="/user.html"><i class="iconfont"><img src="<?php echo $public?>/images/icon_Account_defult.png"></i></a>
		<a class="cart" href="/cart.html" style="margin-left:0.5rem;padding-left:0;width:1.75rem;height:1.6rem;"><i class="iconfont "><img src="<?php echo $public?>/images/icon_cart_defult.png"></i><span class="cart_count" id="cartNum"><?php echo $totalNumber?$totalNumber:0 ?></span></a>
		<i style="float:left;margin-left:0.5rem;padding-left:0;width:1.75rem;height:1.6rem;" class="iconfont more-info1"><img src="<?php echo $public?>/images/icon__category.png"></i>
		</p>
		<span class="logo1"><a href="/"><img src="<?php echo $public?>/images/em_logo.png"><!-- <img src="<?php echo $public?>/images/Foxmaillnk.gif" alt="ElegoMall" /> --></a></span>
	</div>
	<div class="mobile-show-ul">
		<ul class="mobile-menu-more-info">
			<li class="mobile-menu-more-info-item"><span class="item-span">My Account</span><span class="arrow_box"><img class="img-noactive" src="<?php echo $public?>/images/arrow_box_top.jpg"><img class="img-active" src="<?php echo $public?>/images/arrow_box_up.jpg"></span>
			<ul style="display:none;">
				<li><a href="/order/index.html"> My Order</a></li>
				<li><a href="/user/coupon.html">My Coupon</a></li>
				<li><a href="/user/arrival-notice.html">Arriver Notice</a></li>
				<li><a href="/user/favorite.html">My Wishlist</a></li>
				<?php if (Yii::$app->user->isGuest):?>
				  <li><a href="<?= Yii::$app->urlManager->createUrl(['site/login']) ?>">Log In</a></li>    
				<?php else:?>
	             
                    <li><a <a href="<?= Yii::$app->urlManager->createUrl(['site/logout']) ?>">Log Out</a></li>
                 <?php endif;?>
			</ul>
			</li>
			<li class="mobile-menu-more-info-item"><span class="item-span">Mobile App</span><span class="arrow_box"><img class="img-noactive" src="<?php echo $public?>/images/arrow_box_top.jpg"><img class="img-active" src="<?php echo $public?>/images/arrow_box_up.jpg"></span>
			<ul style="display:none;">
				<li class="mobile-adr"><img class="ios-adr" width="100px;" src="<?php echo $public?>/images/ios-adrs.png" alt="ios/android app">
				<p>
					IOS/Android
				</p>
				</li>
			</ul>
			</li>
			<li class="mobile-menu-more-info-item">
						<a class="no-node" href="/user_guide.html" style="font-weight: normal;padding-left: 0;"><span class="item-span">Help Center</span></a>
			</li>
		</ul>
	</div>
	<script>
	jQuery('.mobile-menu-more-info-item .arrow_box').on("click",function(e){
			e.preventDefault();						
		if (jQuery(this).parent().hasClass("action")) {
				jQuery(this).parent().removeClass('action');
				jQuery(this).parent().find('ul').slideUp(300, function(){});
				} else {
				 jQuery(this).parent().addClass('action');
				jQuery(this).parent().find('ul').slideDown(300, function(){});
				}
				});
	jQuery('.more-info1').on("click",function(e){
			e.preventDefault();						
		if (jQuery('.mobile-show-ul').hasClass("action1")) {
				jQuery('.mobile-show-ul').removeClass('action1');
				} else {
				 jQuery('.mobile-show-ul').addClass('action1');
				}
				});
			
	

	</script>
</div>


<!-------mobile -header search---------->
<form action="/catalogsearch/result.html" method="get" id="mobile-search_fm" name="mobile-search_fm">
<div class="search-wrap"><div class="search"><input class="mobile_sea_input" type="text" name="keyword" id="searchText" placeholder="Search entire store here..." value=""> <span onclick="return mobilecheckform()" class="iconfont icon-sousuo" ></span>   </div></div>
</form>
<script>
        function mobilecheckform() { 
                                    if ($(".mobile_sea_input").val() == "") {// alert("sdf");
                                        return false;
                                    }
									document.getElementById("mobile-search_fm").submit();
                                    return true;
                                }
</script>	
<!----mobile-head-start------------>	
</header>
<script>
	
    $(".slide-toggle,.account-show").mouseover(function () {
    	$(".account-show").show();
    });
    $(".account-hide,.account-show").mouseout(function (event) {
    	// event.stopPropagation();
    	$(".account-show").hide();
    });
    $(".slide-toggle-1,.ios_show").mouseover(function(argument) {
    	$(".ios_show").show();
    })
    $(".ios_show>a,.ios_show").mouseout(function (event) {
    	event.stopPropagation();
    	$(".ios_show").hide();
    })
    $(".account-logout").click(function(){
		  layer.msg("Log out success.", {icon: 1,shade: 0.01,time:2000});
          window.location.href = "<?= Yii::$app->urlManager->createUrl(['site/logout']) ?>";
    });
    $('.user_center_APP').click(function(){
    	window.location.href = '<?= Yii::$app->urlManager->createUrl(['/user']) ?>';
    	// console.log('<?= Yii::$app->urlManager->createUrl(['/user']) ?>');
    });
    var UNIT_TYPE = isAPP();
    if(UNIT_TYPE !='pc'){
    	$('.logo>a').css({'margin-left':'60px'});
    	$('.MOBILE_cart').css('display','block');
    	$('.user_center_APP').css({'display':'block','float':'right','font-size':'30px','line-height':'50px','margin-right':'20px','color':'#ee3e43','z-index':'88'});
    }
    function isAPP(){
        if (/(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent)) {  //判断iPhone|iPad|iPod|iOS
          //alert(navigator.userAgent);  
          return "iOS";
        } else if (/(Android)/i.test(navigator.userAgent)) {   //判断Android
            //alert(navigator.userAgent); 
            return "Andriod";
        } else {  //pc
            return "pc";
        };
    }
    $('.MOBILE_cart_click').on('click',function(){
    	window.location.href = '<?= Yii::$app->urlManager->createUrl(['/cart']) ?>';
    });
    
        function checkform() { 
                                    if ($(".sea_input").val() == "") {// alert("sdf");
                                        return false;
                                    }
                                    return true;
                                }
    
</script>
