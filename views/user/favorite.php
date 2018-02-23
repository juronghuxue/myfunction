<?php
use common\models\ProductPrice;
$this->title = Yii::t('app', 'My') . Yii::t('app', 'Favorite');
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
// $this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
$this->registerCssFile('@web/css/favorite.css', ['depends' => \frontend\assets\AppAsset::className()]);
$public=Yii::getAlias('@public');
$isGuest = Yii::$app->user->isGuest;
if(!$isGuest){
    $user_group = Yii::$app->user->identity->user_group;
}else{
    $user_group = 0;
}

?>
    <!-- <div class=" col-lg-9 col-md-9 col-sm-12"> -->
        <style>
            .mian{
                   width:828px;
            }
            .head{height: 30px;padding-top: 10px;margin-left: -15px;}
            .img{float: left}
            .my_points{float: left;font-size: 16px;font-weight: bold;margin-left: 15px;}
            .inlink{display: inline-block; font-size: 2px; width: 828px; height: 2px; background: #ee3e43;margin-left: -16px;}

            .left_p{float: left;width: 628px;border-right:1px solid #e3e3e5}
            .right_p{float: left}
            .lin{display: inline-block;font-size: 2px;width: 130px;height: 2px;background: #ee3e43}
            .lin_two{display: inline-block;font-size: 2px;width: 200px;height: 2px;background: #e3e3e5}
            .gifts{width: 200px;background-color: #ee3e43;border-radius: 2px;height: 36px;color: #FFFFFF;padding-top:8px;margin-top: 19px;
                margin-bottom: 10px;}
            .coupons{width: 200px;background-color: #32b551;border-radius: 2px;height: 36px;color: #FFFFFF;padding-top:8px;}
            .r_head{display: inline-block}
            .r_head div{float: left;width: 265px;height: 36px;font-size: 14px;
                color: #404040;border: 1px solid #e3e3e5;background-color: #EEEEF1;padding-top: 5px;}
            .r_center{display: inline-block;margin-top: -5px;}
            .r_center div{float: left;width: 265px;height: 26px;font-size: 13px;
                color: #666666;border: 1px solid #e3e3e5;background-color: #FFFFFF;}
            .r_top{width: 800px;display: inline-block;margin-bottom: 12px;}
            .r_top1{float: left;width: 745px;font-size: 16px;font-weight: bold}
            .r_top2{float: left;display: inline-block}
            .r_top2 div{float: left;}

            .first_d{font-size: 16px;font-weight: bold;color: #ee3e43;margin-bottom: -20px;}
            .left_p div{font-size: 14px;line-height: 30px;}
            .left_p div span{color: #ee3e43}
            .right_p{font-size: 16px;text-align: center;padding-left: 15px;};
             .mian{
                border: none;
            }

            .wishList_line li:nth-of-type(2) a{
                color: #ee3d43;
            }
        </style>
        <!-- <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 mian" style="background-color: #FFFFFF"> -->
            <div style="background:#ffffff;height:56px;">
                <div style="width:95%;margin:0 auto;height:100%;border-bottom:2px solid red;line-height:56px;font-size:14px;font-weight:bold;color:#404040;">
                        <img src="/theme/new/img/wish/qingdan.png" style="">&nbsp;&nbsp;&nbsp;
                        My Wishlist
                </div>
            </div>
            <div class="wishList" style="margin-top:20px;overflow-x: auto;">
                <ul class="wishList_box" style="min-width:800px;width:100%;">
                <?php foreach ($products as $product) { ?>
                    <li class="clearfix" style="padding:20px 20px 0 20px;">
                        <ul class="wishList_line clearfix" style="width:100%;margin:0 auto;">
                            <li>
                                <?php if($product->product->child):?>
                                    <a  style="display:block;" href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $product->product->child->parent->seourl]) ?>" target="_blank"><img class="wishList_line_img" src="<?=Yii::$app->params['imgServerAddress']?><?=$product->product->child->parent->image?>" alt=""></a>
                                <?php else:?>
                                    <a  style="display:block;" href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $product->product->seourl]) ?>" target="_blank"><img class="wishList_line_img" src="<?=Yii::$app->params['imgServerAddress']?><?=$product->product->image?>" alt=""></a>
                                <?php endif;?>
                            </li>
                            <li>
                                <?php if($product->product->child):?>
                                    <a style="color:#666666;" href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $product->product->child->parent->seourl]) ?>" target="_blank"><?= $product->product->child->parent->name ?></a>
                                <?php else:?>
                                    <a style="color:#666666;" href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $product->product->seourl]) ?>" target="_blank"><?= $product->product->name ?></a>
                                <?php endif;?>
                            </li>
                            <li>
                                <?php if($product->product->child):?>
                                    <?= $product->product->child->attr?>
                                <?php else:?>
                                  <span style="width: 10%;height: 30px;line-height: 30px;"> -</span> 
                                <?php endif;?>
                            </li>
                            <li>
                                <?php if(!empty($product->product->subProduct)):?>
                                    <?php $productPrice = ProductPrice::getFinalPrice($user_group,1,$product->product->subProduct[0]->product_id)?>
                                    <?php $product->product->price = $product->product->subProduct[0]->product->price;?>
                                <?php else:?>
                                    <?php $productPrice = ProductPrice::getFinalPrice($user_group,1,$product->product->id)?>
                                <?php endif;?>
                                <?php $product->product->market_price = $product->product->price;?>
                                <?php if(!empty($productPrice)):?>
                                    <?php $product->product->price =$productPrice['price']; ?>
                                <?php endif;?>
                                <?php if(!empty($productPrice)):?>
                                    <i>$<del><?= $product->product->market_price ?></del>&nbsp;&nbsp;&nbsp;</i>
                                <?php endif;?>
                                    <b>$<?= $product->product->price ?></b>
                            </li>
                            <li>
                               <div class="gw_num">
                                   <em class="jian">-</em>
                                   <input type="text" value="1" class="num">
                                   <em class="add">+</em>
                               </div>
                           </li>
                           <li>
                                <a href="javascript:;" data-id="<?=$product->product->id?>" class="add-cart addCart" style="margin-left:26px;color:#737373;border: 1px solid #737373;padding:4px;text-align: center;display: inline-block;margin-top: 25px;">Add to Cart</a>
                            </li>
                            <li class="floatRight">
                                <a href="javascript:;" data-link="<?= Yii::$app->urlManager->createUrl(['user/ajax-delete-favorite', 'id' => $product->product->id]) ?>" class="iconfont delete"><img src="/theme/new/images/icon_2.png" alt="" style="margin-top: 30px;"></a>
                        </ul>
                    </li>
                <?php }?>
                   <!-- <li>
                       <ul class="wishList_line">
                           <li>
                               <img src="/theme/new/img/gift_01.jpg" alt="">
                           </li>
                           <li>
                               Joyetech eGO AIO D22 XL Quick Start Kit -3.5ml &2300math
                           </li>
                           <li>
                               <i>$71.00</i>
                               <b>$56.00</b>
                           </li>
                           <li>
                               <div class="gw_num">
                                   <em class="jian">-</em>
                                   <input type="text" value="1" class="num">
                                   <em class="add">+</em>
                               </div>
                           </li>
                           <li>
                               <a href="">Add to Cart</a>
                           </li>
                           <li>
                               <img src="/theme/new/img/wish/gouxuan.png" alt="">
                           </li>
                       </ul>
                   </li>
                    <li>
                        <ul class="wishList_line">
                            <li>
                                <img src="/theme/new/img/gift_01.jpg" alt="">
                            </li>
                            <li>
                                Joyetech eGO AIO D22 XL Quick Start Kit -3.5ml &2300math
                            </li>
                            <li>
                                <i>$71.00</i>
                                <b>$56.00</b>
                            </li>
                            <li>
                                <div class="gw_num">
                                    <em class="jian">-</em>
                                    <input type="text" value="1" class="num">
                                    <em class="add">+</em>
                                </div>
                            </li>
                            <li>
                                <a href="">Add to Cart</a>
                            </li>
                            <li>
                                <img src="/theme/new/img/wish/gouxuan.png" alt="">
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="wishList_line">
                            <li>
                                <img src="/theme/new/img/gift_01.jpg" alt="">
                            </li>
                            <li>
                                Joyetech eGO AIO D22 XL Quick Start Kit -3.5ml &2300math
                            </li>
                            <li>
                                <i>$71.00</i>
                                <b>$56.00</b>
                            </li>
                            <li>
                                <div class="gw_num">
                                    <em class="jian">-</em>
                                    <input type="text" value="1" class="num">
                                    <em class="add">+</em>
                                </div>
                            </li>
                            <li>
                                <a href="">Add to Cart</a>
                            </li>
                            <li>
                                <img src="/theme/new/img/wish/gouxuan.png" alt="">
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="wishList_line">
                            <li>
                                <img src="/theme/new/img/gift_01.jpg" alt="">
                            </li>
                            <li>
                                Joyetech eGO AIO D22 XL Quick Start Kit -3.5ml &2300math
                            </li>
                            <li>
                                <i>$71.00</i>
                                <b>$56.00</b>
                            </li>
                            <li>
                                <div class="gw_num">
                                    <em class="jian">-</em>
                                    <input type="text" value="1" class="num">
                                    <em class="add">+</em>
                                </div>
                            </li>
                            <li>
                                <a href="">Add to Cart</a>
                            </li>
                            <li>
                                <img src="/theme/new/img/wish/gouxuan.png" alt="">
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="wishList_line">
                            <li>
                                <img src="/theme/new/img/gift_01.jpg" alt="">
                            </li>
                            <li>
                                Joyetech eGO AIO D22 XL Quick Start Kit -3.5ml &2300math
                            </li>
                            <li>
                                <i>$71.00</i>
                                <b>$56.00</b>
                            </li>
                            <li>
                                <div class="gw_num">
                                    <em class="jian">-</em>
                                    <input type="text" value="1" class="num">
                                    <em class="add">+</em>
                                </div>
                            </li>
                            <li>
                                <a href="">Add to Cart</a>
                            </li>
                            <li>
                                <img src="/theme/new/img/wish/gouxuan.png" alt="">
                            </li>
                        </ul>
                    </li> -->
                </ul>
                <div  class="col-lg-9 col-md-9 col-sm-9 col-xs-9 mian " style="margin-top: 20px;position: relative;">
        <!-- <?php if (isset($pagination)) echo \yii\widgets\LinkPager::widget(['pagination' => $pagination]) ?> -->
                   <div class="pagination-outer" style="float: right;">
                      <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination, 'nextPageLabel' => '>', 'prevPageLabel' => '<']) ?>
                   </div>
                </div>
            </div>
        <!-- </div> -->
<!--         <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 mian" style="margin-top: 20px;">
           <div class="select_All">
               <div class="selectAll">
                   <img class="sle_password" src="/theme/new/img/my_account/weigouxuan.png">
                   <span> Select All</span>
               </div>
               <span class="del">Delete</span>
               <a href="">Add To Cart</a>
               <a href="">Update Wishlist</a>
           </div>
        </div> -->
    <!--</div> -->
        <style>
            td img {
                width: 40px;
                height: 40px;
            }
        </style>
<?php
$urlCartAdd = Yii::$app->urlManager->createUrl(['cart/ajax-add']);
$urlFavoriteDelete = Yii::$app->urlManager->createUrl(['user/ajax-delete-favorite']);
$this->registerJs('
var product = {csrf:"' . Yii::$app->request->getCsrfToken() . '"};
');
$js = <<<JS
$(".sle_password").click(function() {
  $(this).attr("src","/theme/new/img/my_account/icon-1.png");
  console.log("111");
})
$(document).ready(function() {
            //加的效果
            $(".add").click(function() {
                var n = $(this).prev().val();
                var num = parseInt(n) + 1;
                if(num == 0) { return; }
                $(this).prev().val(num);
            });
            //减的效果
            $(".jian").click(function() {
                var n = $(this).next().val();
                var num = parseInt(n) - 1;
                if(num == 0) { return }
                $(this).next().val(num);
            });
        });
jQuery(".delete").click(function(){
    var link = $(this).data('link');
    $.get(link, function(data, status) {
        if (status == "success") {
            location.reload();
        }
    });
});
jQuery(".addCart").click(function(){
    var id = $(this).data('id');
    var number = jQuery(this).parent().parent().find('input').val();
    if(number>0){
        param = {
            productId : id,
            number : number,
            _csrf : product.csrf
        };
        $.post("{$urlCartAdd}?id=" + id, param, function(data) {
            if (data.status > 0) {
                success=  layer.msg('SUCCESS', {icon: 16,shade: 0.01,time:700});
                $.get("{$urlFavoriteDelete}?id=" + id, function(data, status) {
                    setTimeout(function(){
                        location.reload();
                    }, 900);
                });

            } else {
                layer.msg('OUT OF STOCK', {icon: 16,shade: 0.01,time:700});
            }
        }, "json");
    }else{
        layer.msg('Please enter the correct quantity', {icon: 16,shade: 0.01,time:700});
    }
    
});
JS;
$this->registerJs($js);
