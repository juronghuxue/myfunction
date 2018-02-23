<?php
/* @var $this yii\web\View */

$totalNumber = 0;
$totalPrice = 0;
foreach($products as $product) {
    $totalNumber += $product->number;
    $totalPrice += $product->number * $product->price;
}
$public=Yii::getAlias('@public');
?>
<style>
    .go_home{width: 1140px;margin-top: 16px;margin-bottom: 16px;}
    .go_home tr{font-size: 14px;color: #666666;}
    .go_home .to_home{width: 85px;}
    .go_home .to_home span{padding-left: 15px;color: #666666;}
    .go_home .top_shopping_cart{width: 100px;}

    .view_shopping_cart{width: 1140px;border: 1px solid  #e3e3e5;background-color: #ffffff;}
    .view_shopping_cart .view_shopping_cart_td1{width: 370px;height: 27px;background-color: #2b373e;}
    .view_shopping_cart .view_shopping_cart_td1 img{padding-bottom: 1px;}
    .view_shopping_cart .view_shopping_cart_td1 span{font-size: 14px;font-weight: bold;color: #FFFFFF;padding-left: 6px;}
    .view_shopping_cart .view_shopping_cart_td2{width: 370px;}
    .view_shopping_cart .view_shopping_cart_td2 img{padding-bottom: 1px;}
    .view_shopping_cart .view_shopping_cart_td2 span{font-size: 14px;font-weight: bold;color: #808080;padding-left: 10px;}
     .view_shopping_cart .view_shopping_cart_td3{width: 370px;}
     .view_shopping_cart .view_shopping_cart_td3 img{padding-bottom: 1px;}
     .view_shopping_cart .view_shopping_cart_td3 span{font-size: 14px;font-weight: bold;color: #808080;padding-left: 10px;}
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="go_home" align="center">
                <tbody>
                <tr>
                    <td class="to_home">
                        <a href="/">
                            <img src="<?php echo $public;?>/img/pay_cart/icon_home.png">
                            <span>Home ></span>
                        </a>
                    </td>
                    <td class="top_shopping_cart">Shopping cart</td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div>
            <table class="view_shopping_cart" align="center">
                <tbody>
                <tr>
                    <td class="view_shopping_cart_td1" align="center">
                        <img src="<?php echo $public;?>/img/pay_cart/icon_step1.png">
                        <span>View shopping cart</span>
                    </td>
                    <td>
                        <img src="<?php echo $public;?>/img/pay_cart/pic_trigon_black.png">
                    </td>
                    <td class="view_shopping_cart_td2" align="center">
                        <img src="<?php echo $public;?>/img/pay_cart/icon_step_2_defualt.png">
                        <span>Check out</span>
                    </td>
                    <td>
                        <img src="<?php echo $public;?>/img/pay_cart/pic_trigon_white.png">
                    </td>
                    <td class="view_shopping_cart_td3" align="center">
                        <img src="<?php echo $public;?>/img/pay_cart/icon_step_3_defualt.png">
                        <span>Complete payment</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div style="margin-top: 100px;" align="center">
                <img src="<?php echo $public;?>/img/pay_cart/icon_cart_empty.png">
            </div>
            <div align="center" style="font-size: 20px;font-weight: bold;color: #4c4c4c;margin-top: 30px;margin-bottom: 169px;">
                Your Shopping Cart is Empty.<a style="color: #4c4c4c;text-decoration: underline;" href="/">Order now <img src="<?php echo $public;?>/img/pay_cart/icon_jiantou_cart_empty.png"></a>
            </div>
        </div>
    </div>
</div>
<!--<div class="container">-->
<!--			<div class="row">-->
<!--				-->
<!---->
<!--<div id="main" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
<!--    <div class="none-box cle">-->
<!--        <p>go homapage<a href="-->
<!--    //= Yii::$app->homeUrl -->
    <!--" class="btn">shop</a></p>-->
<!--        <div class="txt">OR，so～</div>-->
<!--        <div class="search_box">-->
<!--            <form action="-->
<!--//= Yii::$app->urlManager->createUrl('product/search') -->
    <!--" method="get" id="search_fm" name="search_fm">-->
<!--                <input class="sea_input" type="text" name="keyword" id="searchText" value="请输入商品">-->
<!--                <input type="submit" class="sea_submit iconfont" value="o">-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--                        </div>-->
<!--</div>-->
<?php
$js = <<<JS
jQuery("#searchText").focus(function(){
    if (jQuery("#searchText").val() == '请输入商品')
        jQuery("#searchText").val('');
});
jQuery("#searchText").blur(function(){
    if (jQuery("#searchText").val() == '')
        jQuery("#searchText").val('请输入商品');
});
jQuery("#search_fm").submit(function(){
    if (jQuery("#searchText").val() == '请输入商品' || jQuery("#searchText").val() == '')
        return false;
});
JS;

$this->registerJs($js);
