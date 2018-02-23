<?php
use yii\helpers\Html;
use frontend\components\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */
$this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
AppAsset::register($this);
$public = Yii::getAlias('@public')
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode(Yii::$app->params['meta']["seotitle"]['value']) ?></title>
        <meta name="description" content="<?= Html::encode(Yii::$app->params['meta']["seodesc"]['value']) ?>"/>
        <meta name="keywords" content="<?= Html::encode(Yii::$app->params['meta']["seokeywords"]['value']) ?>"/>
        <?php $this->head();
        ?>
            
        <link href="<?php echo $public ?>/css/global.css" rel="stylesheet">
        <style>
            .sidebar-widget li{ padding-left: 20px; }
        </style>
             <link rel="icon" href="img/favicon.png" />
<!-- Place favicon.ico in the root directory -->
<link id="color_scheme" href="<?php echo $public;?>/css/theme.css" rel="stylesheet">		
<!-- all css here -->
<!-- bootstrap.min.css -->
<link rel="stylesheet" href="<?php echo $public?>/css/bootstrap.min.css">
<!-- font-awesome.min.css -->
<link rel="stylesheet" href="<?php echo $public?>/css/font-awesome.min.css">
<!-- owl.carousel.css -->
<link rel="stylesheet" href="<?php echo $public?>/css/owl.carousel.css">
<!-- owl.carousel.css -->
<link rel="stylesheet" href="<?php echo $public?>/css/meanmenu.min.css">
<!-- shortcode/shortcodes.css -->
<link rel="stylesheet" href="<?php echo $public?>/css/shortcode/shortcodes.css">
<!-- nivo-slider.css -->
<link rel="stylesheet" href="<?php echo $public?>/css/nivo-slider.css">
<!-- style.css -->
<link rel="stylesheet" href="<?php echo $public?>/css/style.css">
<!-- responsive.css -->
<link rel="stylesheet" href="<?php echo $public?>/css/responsive.css">
<!--blackfriday skin-->
<!--<link rel="stylesheet" href="<?php echo $public ?>/css/activitySkin/blackfridaySkin.css">-->
<!--christmas skin-->
<!--<link rel="stylesheet" href="<?php echo $public ?>/css/activitySkin/christmasSkin.css">-->
<script src="<?php echo $public?>/js/vendor/modernizr-2.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo $public;?>/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="<?php echo $public;?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $public; ?>/js/auto.js"></script>

    </head>
    <body>
        <?php $this->beginBody() ?>
        <div id="header" class="new_header">
            <?= $this->render('headerBar') ?> 
            <?= $this->render('headerNav') ?>
        </div>
        <div class="breadcrumb-area">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="/"><i class="fa fa-home"></i> Home ></a></li>
                    <li class="active">My Account</li>
                </ol>			
            </div>
        </div>
        <!-- breadcrumb end -->	
        <!-- shop-area start -->
        <div class="shop-area">
            <div class="container" >
                <div class="row">
                    <div class=" col-lg-3 col-md-3 col-sm-3 " style="">
                        <div class="column mt-10 mm" style="background:#ffffff;">
                            <div class="sidebar-widget">
                                <h3 class="sidebar-title">Dashboard</h3>
                                <ul class="sidebar-menu">
                                    <li <?php if(Yii::$app->controller->id == 'user' && Yii::$app->controller->action->id == 'index') echo "class='li-active'";?>><a href="/user.html">My Dashboard</a></li>
                                </ul>
                            </div>
                            <div class="sidebar-widget">
                                <h3 class="sidebar-title">Orders</h3>
                                <ul class="sidebar-menu">
                                    <li <?php if(Yii::$app->controller->id == 'order') echo "class='li-active'";?>><a href="/order/index.html">All Order</a></li>
                                    <li <?php if(Yii::$app->controller->id == 'comment') echo "class='li-active'";?>><a href="/comment/index.html">Review Order</a></li>
                                </ul>
                            </div>
                            <div class="sidebar-widget">
                                <h3 class="sidebar-title">Points & Coupons</h3>
                                <ul class="sidebar-menu">
                                    <li <?php if(Yii::$app->controller->action->id == 'point-log') echo "class='li-active'";?>><a href="/user/point-log.html">My Points</span></a></li>
                                    <li <?php if(Yii::$app->controller->action->id == 'coupon' || Yii::$app->controller->action->id == 'redeem-coupons') echo "class='li-active'";?>><a href="/user/coupon.html">My Coupons</span></a></li>
                                    <li <?php if(Yii::$app->controller->action->id == 'gifts' || Yii::$app->controller->action->id == 'redeem') echo "class='li-active'";?>><a href="/user/gifts.html">My Gifts</a></li>
                                </ul>
                            </div>
                            <div class="sidebar-widget">
                                <h3 class="sidebar-title">Products</h3>
                                <ul class="sidebar-menu">
                                    <li <?php if(Yii::$app->controller->action->id == 'product-review') echo "class='li-active'";?>><a href="/user/product-review.html">Product Review</span></a></li>
                                    <li <?php if(Yii::$app->controller->action->id == 'favorite') echo "class='li-active'";?>><a href="/user/favorite.html">My Wishlist</a></li>
                                    <li <?php if(Yii::$app->controller->action->id == 'arrival-notice') echo "class='li-active'";?>><a href="/user/arrival-notice.html">Arrival Notice</span></a></li>
                                </ul>
                            </div>
                            <div class="sidebar-widget">
                                <h3 class="sidebar-title">Personalization</h3>
                                <ul class="sidebar-menu">
                                    <li <?php if(Yii::$app->controller->action->id == 'profile') echo "class='li-active'";?>><a href="/user/profile.html">Account information</span></a></li>
                                    <li <?php if(Yii::$app->controller->id == 'address') echo "class='li-active'";?>><a href="/address/index.html">Address Book</a></li>
                                    <li <?php if(Yii::$app->controller->action->id == 'subscription') echo "class='li-active'";?>><a href="/user/subscription.html">Newsletter</span></a></li>
                                    <li <?php if(Yii::$app->controller->action->id == 'sales-reps') echo "class='li-active'";?>><a href="/user/sales-reps.html">Sale Representative</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-9 col-md-9 col-sm-12">
                        <?= $content ?>
                    </div>
                </div>
            </div>
            <?= $this->render('footer') ?>
            <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?> 
<script>
    console.log(jQuery('.header-container').height(),jQuery('.header-container').offset().top);
    jQuery('.mobile-menu-area').css({'top': 3+jQuery('.header-container').offset().top/10+'rem'});
</script>