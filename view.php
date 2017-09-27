<?php
use common\models\AttrOption;
use common\models\Attr;
use common\models\AttrConfig;
use common\models\ProductChild;
use common\models\ProductPrice;
use common\models\Product;
use common\models\ProductHtml;
use common\models\User;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
$this->registerCssFile('@web/css/product.css', ['depends' => \frontend\assets\AppAsset::className()]);
$arrayPath = \common\models\Category::getCatalogPath($model->category_id, $allCategory);
foreach ($arrayPath as $path) {
    $category = \common\models\Category::findOne($path);
      $this->params['breadcrumbs'][] = ['label' => $category->name, 'url' =>Yii::$app->urlManager->createUrl(['/category/view','seourl'=>$category["seourl"]])];
}
$this->params['breadcrumbs'][] = $model->name;
$countCommentsPassed = count($model->commentsPassed);
$starGoodPercent = $starNormalPercent = $starBadPercent = 0;
if ($countCommentsPassed > 0) {
    $starGoodPercent = Yii::$app->formatter->asPercent(count($model->commentsPassedGood) / $countCommentsPassed);
    $starNormalPercent = Yii::$app->formatter->asPercent(count($model->commentsPassedNormal) / $countCommentsPassed);
    $starBadPercent = Yii::$app->formatter->asPercent(count($model->commentsPassedBad) / $countCommentsPassed);
}
$star_sum = 0;
foreach ($model->commentsPassed as $comment) {
     $star_sum += $comment->star;
}
$commentsSum = count($model->commentsPassed);
if($star_sum>0 and $commentsSum>0){
    $avg_star = number_format($star_sum/$commentsSum,2);
}else{
    $avg_star = $model->star;
}
$user = User::find()->where(['id'=>Yii::$app->user->id])->one();
$custom_group = $user?$user->user_group:0;
$types = \common\models\ProductType::labels($model->type);
$min_price = ProductPrice::getFinalPrice($custom_group,1,$model->id);
$old_price = $model->price;
if($min_price) $model->price = $min_price['price'];
$childs = ProductChild::find()->where(['parent_id' => $model->id])->orderBy('id DESC')->asArray()->all();
if($model->is_parent){
    $used_opt = Attr::find()->where(['product_id' => $model->id])->orderBy('config_id ASC')->asArray()->all();
}else {
    $used_opt = [];
}
Yii::$app->params['meta']["seotitle"]['value'] = $model->name;
$isSubProduct = 0;//单品  》0有子产品  <0  没有此情况    
if(!empty($model->subProduct)){
    $isSubProduct = 1;
}
$img_host = Yii::$app->params['imgServerAddress'];
// $img_host = 'http://192.168.2.117:8082';Yii::$app->params['imgServerAddress'];

$csrf = Yii::$app->request->getCsrfToken();
?>
<script> 
wishlist= <?php echo json_encode($wishlist);?>;
console.log(wishlist);
</script>
<link type="text/css" rel="stylesheet" href="/theme/new/css/jqzoom.css" />
<script src="/theme/new/js/jquery.jqzoom.js"></script>

<meta name="twitter:card" content="product" >
<meta name="twitter:domain" content="https://www.elegomall.com/" >
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@Elegomall.com">
<meta name="twitter:creator" content="@Elegomall">
<meta name="twitter:title" content="<?=$model->name ?>">
<meta name="twitter:description" content="<?=strip_tags($model->brief) ?>">
<meta name="twitter:image" content="<?=Yii::$app->request->hostInfo?><?= $model->image ?>">

<meta property="og:site_name" content="https://www.elegomall.com/" >
<meta property="og:type" content="og:product" >
<meta property="og:title" content="<?=$model->name ?>" >
<meta property="og:image" content="<?=Yii::$app->request->hostInfo?><?= $model->image ?>" >
<meta property="og:description" content="<?=strip_tags($model->brief) ?>" >
<meta property="og:url" content="<?= Yii::$app->urlManager->createUrl(['/goods/view', 'seourl' => $model->seourl]) ?>" />
<meta property="og:price:amount" content="<?=$model->price ?>" >
<meta property="og:price:currency" content="USD" >
<meta property="og:availability" content="<?=$model->stock ?>" >
<div class="breadcrumb-area">
			<div class="container">
				<?=  Yii::$app->params['breadcrumb']['breadcrumb'];?>		
			
		</div>
</div>

<div class="container" >

    <div class="row" style="position:relative;" itemscope itemtype="http://schema.org/Product">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0 15px;">
            <div class="clearfix e3e3e5" style="background:#ffffff;">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 detailmark" style="padding-bottom:20px;">
                    <div class="inline" style="width:100%;">    
                        <div class="detail_img" id="detail_img" style="width:100%;">
                            <div class="pic_view" style="">
                                <img itemprop="image" id="pic-view" style="display:block;width:100%;height:100%;" alt="<?= $model->name ?>" src="<?= $img_host.$model->image ?>" onerror="javascript:this.src='/theme/new/images/noimg_quesheng.png';" id="bigImg" jqimg="<?= $img_host.$model->image ?>" style="border:none;">
                                <p class="hover-zoom">hover to zoom</p>
                                <div id="zoom-zhezhao" class="zoom-zhezhao" style="display:none;"></div>
                            </div>                    
                            <div class="item-thumbs clearfix" id="item-thumbs" style="width:480px;overflow:hidden;margin:0 auto;position:relative;">
                                <img class="begain" src="/images/product_view/icon_jiantou_left_product_image.png" style="position:absolute;left:0;top:0px;cursor:pointer;">
                                <div class="clearfix" id="cle1-wrap" style="width:440px;height:100%;overflow:hidden;position:relative;-left:0;-top:0px;margin-left:10px;">   
                                    <ul class="cle1 inline" style="border:none;position:absolute;left:0;" id="cle1">
                                        <?php
                                        foreach ($model->productImagesSort as $image) { //$model->productImagesSort?>
                                        <li class="li" style="float:left;cursor:pointer;"><img class="img_select"  bakimg="<?= $image->image?>" alt="<?= $model->name ?>" src="<?= $img_host.$image->image ?>" onerror="javascript:this.src='/theme/new/images/noimg_quesheng.png';"> </li>
                                        <?php } ?>
                                    </ul>
                                </div>

                                <img class="end" src="/images/product_view/icon_jiantou_right_poduct_imge.png" style="position:absolute;left:460px;top:0px;cursor:pointer;">
                            </div>
                        </div>
                    </div>
                    <div class="zoom-big" style="position:absolute;top:10px;left:101%;width:550px;height:550px;overflow:hidden;display:none;z-index:99;background:#ffffff;border:1px solid #cccccc;">
                        <img style="width:1000px;height:1000px;position:absolute;left:0;top:0;max-width:1000px;"  src="/images/d.jpg" />
                    </div>
                    
                </div>
        <!-- </div> -->
                <div class="item-info col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-bottom:30px;padding-left:30px;">
                    <div class="goods_detail"><!-- wd50p divr -->
                        <h1 class="goods_detail_title"><span itemprop="name" class="goods_detail_title_name"><?= $model->name ?></span></h1>
                        <p class="detail_description" itemprop="description"><?=strip_tags($model->brief) ?></p>
                        <div class="star_write" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                            <p class="star" style="margin-bottom:0;">
                            <span  class="lbl star"><img  style="background-position-x:<?= 100-$model->star/5*100?>%;" src="/images/product_view/pic_star_top.png"></span>
                                <i itemprop="ratingValue" class="level" style="font-style:normal;font-weight:bold;padding-left:10px;"><?= $avg_star?></i>
                                <span class="write">(reviews <span itemprop="reviewCount" class="write" style="color:#666666;"><?= $commentsSum ?></span> |&nbsp;&nbsp;&nbsp;<i></i> <a class="datail_comment_a" href="javascript:;" style="cursor:pointer;">write a review</a>)</span>
                            </p>
                            <!-- <p class="write" style="margin-bottom:0;">(reviews 128 |&nbsp;&nbsp;&nbsp;<i></i> <span>write a review</span>)</p> -->
                        </div>
                        <div class="price_info">
                            <p itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="price" style="margin-bottom:0;position:relative;background:#fef9f5;border:1px dashed #e3e5e7;border-bottom:none;">
                                <meta itemprop="priceCurrency" content="USD" />
                                <span>Price:&nbsp;<i class="new_price" itemprop="price">$<?= $model->price?></i>&nbsp;
                            <?php if(1){?>
                                <i class="old_price" style="text-decoration:line-through">$<?= $old_price?></i>
                            <?php }?>
                                </span>
                                <span style="font-size:14px;" class="detail_mobile_app">
                                    <img src="/theme/new/images/icon_mobile.png"/>&nbsp;&nbsp;&nbsp;Buy on Mobile App
                                </span>
                                <strong class="sale-off">&nbsp;&nbsp;<?=(($old_price-$model->price)/$old_price*100)?>% OFF</strong>
                            </p>       
                            <?php if(!$user){?>
                            <div class="price_info_tishi"><a href="/site/login.html">Login</a> to get better price</div>
                            <?php }
                            if(!empty($group_prcie)){
                                $group_index = 0;
                                $hide = '';
                                foreach($group_prcie as $group_id=>$_group_prcie){
                                    if($group_index) $hide = 'hide';
                                    ++$group_index;
                            ?>
                            <table  style="width:100%;background:#fef9f5;" id="group_table_<?=$group_id?>" class="<?=$hide?>">
                                <?php if($user){?>
                                <tr style=""> <td style="font-size:14px;border:1px dashed #e3e5e7;">Quantity</td><td style="font-size:14px;border:1px dashed #e3e5e7;">Price</td></tr>
                                <?php } ?>
                                <?php
                                    foreach($_group_prcie as $item){
                                        echo '<tr style=""> <td style="font-size:14px;border:1px dashed #e3e5e7;">'.$item['qty'].'</td><td style="font-size:14px;border:1px dashed #e3e5e7;">'.$item['price'].'</td></tr>';
                                    }
                            ?>
                            <?php }
                            }?>
                                
                            </table>
                            <div class="detail_sao_wrap">
                                <div class="detail_sao">
                                    <img src="/theme/new/images/ios-adr.png" />
                                    <p class="detail_sao_info">iOS/Android</p>
                                </div>
                                <span class="sao_trangi"></span>
                                <i class="sao_trangi_i"></i>
                            </div>
                        </div>
                        <!-- 详情页二维码扫一扫 -->
                        <script>
                            $('.price_info').on('mouseenter','.detail_mobile_app',function(e){
                                $('.detail_sao_wrap').fadeIn(200);
                                e.stopPropagation();
                                e.cancelBubble = true;
                            });
                            $('.price_info').on('mouseleave','.detail_mobile_app',function(e){
                                $('.detail_sao_wrap').fadeOut(200);
                                e.stopPropagation();
                                e.cancelBubble = true;
                            });

                            // $('.price_info').on('mouseenter','.detail_sao_wrap',function(e){
                            //     $('.detail_sao_wrap').fadeIn(200);
                            //     e.stopPropagation();
                            //     e.cancelBubble = true;
                            // });
                            // $('.price_info').on('mouseleave','.detail_sao_wrap',function(e){
                            //     $('.detail_sao_wrap').fadeOut(200);
                            //     e.stopPropagation();
                            //     e.cancelBubble = true;
                            // });

                        </script>
                        <p id="hiddenColor" style="display:none">id:<input id="attr_4_<?= $model->id?>" name="attr_4" value="<?= $model->is_parent?'':$model->id?>"></p>
                        <?php echo ProductHtml::getOptionSelect($model->id);?>
                        <div class="sku clearfix"><span class="sku_name">Sku:</span><span class="sku_number"><?php if(!$model->is_parent) echo $model->sku;?></span>
                        </div>
                        <div class="goods_number clearfix">
                            <div class="quantity">Quantity</div>
                            <div class="num_wrap">  
                                <ul class="num">
                                    <li class="minus" onclick="detail_jian()">-</li>
                                    <li class="detail_num"><input style="display:block;border: 0px;height: 100%;text-align: center;padding-left: 0;border-color: #cccccc;" id="input-buy-number_<?= $model->id?>" value="1" /></li>
                                    <li class="add" onclick="detail_add()">+</li>
                                </ul>
                            </div>
                            <div class="avail">
                                <span class="avail_name">Availbility:</span>
                                <span class="avail_static">In Stock</span>
                            </div>
                        </div>
                        <div class="add_cart_wrap">
                            <div class="add_cart buy_btn" product_id="<?= $model->id?>">
                                <a href="javascript:;" ><span style="padding-left:20px;">Add To Cart</span></a>
                            </div>
                            <div class="choice add_bulk_li" data-toggle="modal" data-target="#myModal">
                                <a href="javascript:;"><span style="padding-left:10px;">Bulk Choice</span></a>
                            </div>
                            <div id="fav_btn" class="add_wish_li save">
                                <a href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="sure clearfix">  
                            <div class="sure_auto clearfix">
                                <div>100% Original</div>
                                <div>TPD Compliance</div>
                                <div>Christmas sale</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <div class="row" style="margin-bottom:60px;">
     <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mt-20">
        <div class="clearfix" style="background:#ffffff;">
        <div class="clearfix tabs_bar_warp" style="background:#ffffff;">
            <div  id="tabs_bar" class="clearfix ">
                <ul class="clearfix nav_1" style="border:1px solid #e3e3e5;border-bottom:none;">
                    <li class="col-lg-4 col-md-12 col-sm-12 col-xs-12"> <a class="spxqitem" rel="nofollow" href="javascript:;" style="float:left;width:95%;margin-right:0;text-align:center;color:#333333;height:100%;line-height:40px;">Product Overview</a><span style="float:right;height:40px;line-height:40px;color:#e3e3e3;">|</span> </li>
                    <li class="col-lg-4 col-md-12 col-sm-12 col-xs-12"><a class="pjxqitem" href="javascript:;" name="pjxqitem" rel="nofollow" style="color:#333333;float:left;width:95%;margin-right:0;text-align:center;height:100%;line-height:40px;">Customer's Review(<em><?= count($model->commentsPassed) ?></em>)</a><span style="float:right;height:40px;line-height:40px;color:#e3e3e3;">|</span></li>
                 <!--   <li class="col-lg-3"><a class="askitem" href="javascript:;" rel="nofollow" >Product Warranty(<em><?= count($model->consultationsPassed) ?></em>)</a></li>-->
                    <li class="col-lg-4 col-md-12 col-sm-12 col-xs-12"><a class="related" href="javascript:;" rel="nofollow" style="color:#333333;float:left;width:95%;margin-right:0;text-align:center;height:100%;line-height:40px;">Customers Also like </a> <!-- <span style="float:right;height:40px;line-height:40px;color:#e3e3e3;">|</span> --></li>
                </ul>
                <!-- <div id="red_bar" class="red_bar" style="position:absolute;left:0px;bottom:0;"></div> -->
            </div>
        </div>
                <script>
                    // var $width = $('#tabs_bar ul li').css('width');
                    // $('#red_bar').css('width',$width);
                    $('#tabs_bar li').on('click',function(e){
                        var index = $(this).index();
                        console.log(index);
                        if(index == 2){
                            $('.sectionbox').css({'display':'none'}).eq(index+1).css({'display':'block'});
                        }else{
                            $('.sectionbox').css({'display':'none'}).eq(index).css({'display':'block'});
                        }
                        // $('#red_bar').animate({'left':parseFloat($width)*index+'px'},400);

                        $(this).closest('#tabs_bar').find('li a').css({'border-bottom':'none'}).eq(index).css({'border-bottom':'2px solid #ee3d43'});
                    });
                </script>
<div class="product_tabs" style="background:#ffffff;border:1px solid #e3e3e5">
<div class="sectionbox " id="spxqitem" style="display:block;overflow:hidden;">
    <!-- 详情页顶部banner cms: detail_top_ban -->
            <p> <?= $model->content ?></p>
</div>
<!-- 评价详情-->
<!--评价详情-->
<div class=" sectionbox" id="pjxqitem" style="display:none;padding:0 20px;">
    <div class="" id="pjxqitem_2">
        
        <div class="write_commen" >
        
            <form id="commen_form" action="/goods/savecommen.html" method="post">            
            <p class="write_commen_title" style="margin-bottom:0;">Rate this product&nbsp;&nbsp;<i class="fa fa-star starhigh"></i><i class="fa fa-star starhigh"></i><i class="fa fa-star starhigh"></i><i class="fa fa-star starhigh"></i><i class="fa fa-star starhigh"></i></p>
            <div style="display:none">
                <input type="text" id="comment-star" class="form-control" name="_csrf" value="<?= $csrf?>">            
                <input type="text" id="comment-star" class="form-control" name="Comment[user_id]" value="<?= Yii::$app->user->id?>">
                <input type="text" id="comment-star" class="form-control" name="Comment[product_id]" value="<?= $model->id?>">
                <input type="text" id="comment-star" class="form-control" name="Comment[order_id]" value="1">
            <p class="write_view" style="margin-bottom:0;">Review star</p>
            <input type="radio" id="comment-star-1" name="Comment[star]" value="5" checked=ture>5
            </div>
            <div class="commen_area_wrap">
                <div class="commen_area_top">
                    <div class=""><textarea style="outline:none;border:none;resize:none;" name="Comment[content]" placeholder="Share you opinion about this product:"></textarea></div>
                    <p>(<span class="commen_total">0</span>/300)</p>
                </div>
                <div class="commen_area_bottom">
                    <span class="commen_upload"><input id="detail_upload" type="file" style="opacity:0;"/></span>
                    <span class="commen_tishi"><input id="imgupload" name="Comment[images]" type="hidden" value="" /><b class="upload_4a" style="font-weight:normal;">You can upload picutes here (4 at most).</b></span>
                    <a class="commen_submit" href="javascript:;" onclick="submitcomment('#commen_form');">SUBMIT</a>
                </div>
            </div>
            </form>
        </div> 
        
        <script>
        $('.commen_area_top textarea').on('keydown',function(e){
            if(e.ctrlKey == true){
                if(e.keyCode == 86){
                   var num = $(this).val().length;
                    if(num>299){
                        $(this).val($(this).val().substring(0,299));
                        layer.msg('Sorry,300 letters at most',{icon:'0',time:1000});
                    } 
                }
            }else{
                var num = $(this).val().length;
                if(num>299){
                    $(this).val($(this).val().substring(0,299));
                    layer.msg('Sorry,at most 300 words',{icon:'0',time:1000});
                } 
                $('.commen_total').empty().text(++num);
            }
            
            
        });
        $('.commen_area_top textarea').on('paste',function(){
            var _this = $(this);
            var num = '';
            setTimeout(function(){
                num = _this.val().length;
                console.log(num);
                if(num>299){
                    _this.val(_this.val().substring(0,299));
                    layer.msg('Sorry,at most 300 words',{icon:'0',time:1000});
                }
            },100);
        });


            //评论星级
            $('.write_commen_title').on('click','i',function(){
                var index = $(this).index();
                if($(this).hasClass('fa-star-o')){
                    // $(this).removeClass('fa-star-o').addClass('fa-star');
                    for (var j = 0;j<=index;j++){
                        $('.write_commen_title>i').eq(j).removeClass('fa-star-o').addClass('fa-star');

                    }
                }else if($(this).hasClass('fa-star')){
                    // $(this).removeClass('fa-star').addClass('fa-star-o');
                    $('.write_commen_title>i').addClass('fa-star-o').removeClass('fa-star');
                    for(var j = 0;j<=index;j++){
                        $('.write_commen_title>i').eq(j).removeClass('fa-star fa-star-o').addClass('fa-star');
                    }
                }
                 $('#comment-star-1').val(index+1);
            });
        </script>
        <!-- <br /> -->
        <hr />
        <!-- <br /> -->
        <div class="clearfix" style="height:1700px;overflow-y: auto;width:100%;position:relative;">
        <div class="commen_content_wrap clearfix" id="" style="position:absolute;top:0;">
        <?php 
        $star_sum = 0;
        foreach($model->commentsPassed as $comment){?>
            <div class="commen_content clearfix">
                <div class="commen_personal">
                    <p style="margin-bottom:0;"><img src="/theme/new/images/pic_user.png" /></p>
                    <p style="margin-bottom:0;" class="commen_personal_nick"><?php if(isset($comment->user->username)){echo $comment->user->username;}else{ echo "guest";}?></p>
                    <p style="margin-bottom:0;" class="commen_personal_level"></p>
                </div>
                <div class="commen_info">
                    <p style="margin-bottom:0;" class="commen_star">
                    <?php for($i=0;$i<$comment->star;$i++){?>
                    <span class="fa fa-star starhigh"></span>&nbsp;<?php }?></p>
                    <p style="margin-bottom:0;" class="commen_detail_info"><?= $comment->content?></p>
                    <p style="margin-bottom:0;" class="commen_imgs">
                    <?php 
                    foreach(explode(',',$comment->images) as $url) {
                        if($url!='') {?>
                    <img onclick="commen_imgs(this)" src="<?= $url?>" />
                        <?php }}?></p>
                    <p style="margin-bottom:0;" class="commen_time">
                        <span><?= date('Y-m-d H:i',$comment->created_at)?></span>
                        <span style="position:relative;">
                            <!-- <i class="comment_sum" data-mark="0">(141)</i> 回复评论暂时不做-->
                            <i class="zan_sum" data_id='<?= $comment->id?>' onclick="goodComment(this)" data-mark="0">(<?= $comment->up?>)</i>
                            <i class="add_one_1">+1</i>
                        </span>
                    </p>
                </div>
            </div>
        <?php 
            $star_sum += $comment->star;
        }
        $avg_star = 5;
        if(count($model->commentsPassed)) $avg_star = $star_sum/count($model->commentsPassed);
        $pecent = 100-$avg_star/5*100;
        ?>
        </div>
        </div>
    </div>
</div>
<script>
    avg_star = <?= $avg_star?>;
    $('.star_write').find("img").css('background-position-x','<?= $pecent?>%');
    $('.star_write').find("i").first().html(avg_star.toFixed(2));
    function goodComment(obj){
        var obj_num = Number($(obj).text().substring(1,$(obj).text().length-1));
        if($(obj).data('mark') == '0'){
            obj_num++;
            var str = '('+obj_num+')'
            $(obj).css({'background':'url(/theme/new/img/pic_dianzhan_red.png) no-repeat'}).empty().text(str);
            $(obj).data('mark',1);
            
            $.ajax({
                url:'/goods/upcommen.html?id='+$(obj).attr('data_id'),
                success:function(data){
                    $(obj).siblings('.add_one_1').css({'display':'block'}).animate({'top':'-24px','opacity':0},600,function(){
                        $(obj).siblings('.add_one_1').css({'top':'6px','display':'none','opacity':1});
                    });
                    // var div_zan_piv = '<div class="zan_pic" style="position:absolute;right:50px;top:-50px;width:100px;height:100px;"><img style="width:100%;height:100%;" src="/theme/new/img/zan_pic.gif" /></div>';
                    // console.log($('.commen_time span:last'));
                    // $(obj).closest('.commen_content').find('.commen_time span:last').append(div_zan_piv);
                    // setTimeout(function(){
                    //     console.log(1111);
                    //     $(obj).closest('.commen_content').find('.commen_time span:last .zan_pic').remove();
                    // },2000);
                },
            });
        }else{
            obj_num--;
            // layer.msg('您已经点过赞', {icon: 0,time: 1000});
            var str = '('+obj_num+')'
            $(obj).css({'background':'url(/theme/new/img/pic_dianzhan_defualt.png) no-repeat'}).empty().text(str);
            $(obj).data('mark',0);
            // var div_zan_piv = '<div class="zan_pic" style="position:absolute;right:50px;top:-50px;width:100px;height:100px;"><img style="width:100%;height:100%;" src="/theme/new/img/zan_cancel.gif" /></div>';
            // console.log($('.commen_time span:last'));
            // $(obj).closest('.commen_content').find('.commen_time span:last').append(div_zan_piv);
            // setTimeout(function(){
            //     $(obj).closest('.commen_content').find('.commen_time span:last .zan_pic').remove();
            // },2000);
        }
        
    }
    
    function small(obj){
        $(obj).remove();
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
    function detail_jian(){
        var detail_num_value = $('.detail_num>input').val();
        detail_num_value--;
        if(detail_num_value <= 1){
            detail_num_value = 1;
        }
       $('.detail_num>input').val(detail_num_value);
    }   
    function detail_add(){
        var detail_num_value = $('.detail_num>input').val();
        detail_num_value++;
        $('.detail_num>input').val(detail_num_value);
    }
    $('.detail_num>input').keyup(function(e){
        console.log(e.keyCode);
        if(e.keyCode==13){
            $('.add_cart').trigger('click');
        }
    });
</script>

<!-- 评价详情 end-->
<!-- 购买咨询-->
<div id="askitem" class="sectionbox " name="askitem" style="display:none;">
    <span style="font-size:16px;">购买咨询</span>
    <div class="content">
        <div class="ask-form cle">
            <div class="fl">
                <textarea id="consultation-question"></textarea>
                <a href="javascript:;" class="graybtn" id="consultation-btn" style="float:right;">发表咨询</a>
            </div>
            <div class="fr" style="clear:both;">
                <p><b>温馨提示:</b>其他网友仅供参考！</p>
            </div>
        </div>
        <div class="ask-list" id="ask-list">
        </div>
    </div>
</div>
<!-- 购买咨询-->
<!-- customer also like-->
<div class="sectionbox clearfix" name="related" id="related" style="display:none;border-left:1px solid #eeeeee;">
    <?php foreach($products as $item):?>
    <div class="owl-item-single active" style="width: 25%; margin-right: 0px;float:left">
        <div class="single-product  white-bg">
            <div class="product-hidden" style="width:100%;height:100%;overflow:hidden;">
                <div class="product-img pt-20">
                    <a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$item["seourl"]]) ?>"><img src="<?= Yii::$app->params['imgServerAddress'].$item["image"] ?>" alt="" onerror="javascript:this.src='/theme/new/images/noimg_quesheng.png';"/></a>
                </div>
            </div>
            
            <div class="product-content product-i">
                <div class="pro-title">
                  <a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$item["seourl"]]) ?>"><h2 class="view-seo"><?=$item['name']?></h2></a>
                </div>
                <div class="pro-rating ">
                    <?php for($i = 1; $i <= 5; $i++) { if ($i <= $item['star']) {?>
                        <a href="#" title="<?= $item['star'] ?>"><i class="fa fa-star"></i></a>
                    <?php }else{ ?>
                        <a href="#" title="<?= $item['star'] ?>"><i class="fa fa-star-o"></i></a>
                    <?php }} ?>
                </div>
                <div class="price-box">

                    <span class="price product-price">$<?php
                    
          $products = Product::findOne($item['id']);
          if($products->subProduct){
            $productPrice = ProductPrice::getFinalPrice($custom_group,1,$products->subProduct[0]->product_id);
            $item['price'] = Product::findOne($products->subProduct[0]->product_id)->price;
          }else{
            $productPrice = ProductPrice::getFinalPrice($custom_group,1,$item['id']);
          }
                    if(!$productPrice) {
                        echo $item['price'];
                    }else {
                        echo $productPrice['price'];
                    }
                    ?></span>
                    <span class="PriceCount" style="text-decoration:line-through;;"><?php
                        if($productPrice) echo '$',$item['price'];
                    ?></span>

                </div>
                 <div class="product-icon">
                   <!-- <div class="product-icon-left f-left">
                        <?php if($item['stock']>0):?>
                            <a href="javascript:void(0)" data-id="<?= $item['id'] ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                        <?php else:?>
                            <a href="javascript:void(0)" data-id="<?= $item['id'] ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i>Arrival Notices</a>
                        <?php endif;?>
                    </div>
                    <div class="product-icon-right floatright">
                   

                        <a href="#" data-toggle="tooltip" title="" data-original-title="Wishlist"><i class="fa fa-heart"></i></a>
                    </div> -->
                </div>
            </div>
            <span class="new">new</span>
            <div class="other_infor">
                <div class="select_box">
                    <select name="productId" class="selection" spec-name="Quantity">
                        <option value="0" record-id="0">Please select specifications</option>
                        <option value="1384" record-id="1384">2PCS</option>
                        <option value="1385" record-id="1385">4PCS</option>
                    </select>
                    <select name="productId" class="selection" spec-name="Type">
                        <option value="0" record-id="0">Please select specifications</option>
                        <option value="1189" record-id="1189">EU Edition</option>
                        <option value="1383" record-id="1383">US Edition</option>
                    </select>
                </div>
                <div class="product-icon-left f-left cartOrder01">
                    <!-- <a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a> -->
                </div>
                <div class="product-icon-right floatright cartOrder02">
                    <a href="#" data-toggle="tooltip" title="" data-original-title="Wishlist"><i class="fa fa-heart"></i></a>
                </div>
            </div>
        </div>
    </div>





    <?php endforeach;?>
</div>
<!-- three-->
</div> 
</div>
</div>    
     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mt-20">      
          <div class="bestseller-area  dotted-style-2 mb-5 " id="bestseller-area-top" >
                    <div class="section-title" style="height:41px;background:#ffffff;">
                        <h3 style="margin-bottom:0;height:100%;line-height:41px;padding-left:15px;">Bestseller</h3>
                    </div>
                    <div class="single-product-items-active border-1" style="border-left:1px solid #eeeeee;">
                            <?php $num = 0;?>
                            <?php
                            $str = '';
                            foreach ($sameRootCategoryProducts as $item) {
                                $url = $item["seourl"];
                                ?>
                                <?php if($num==0):?>
                                    <?php $str = $str.'<div class="single-product-items">';?>
                                <?php endif;?>
                                <?php $str = $str.'<div class="single-product single-product-sidebar white-bg">
                                    <div class="product-img product-img-left"><a href="'.Yii::$app->urlManager->createUrl(['/goods/view', 'seourl' => $url]).'" target="_self"><img src="'.Yii::$app->params['imgServerAddress'].$item["image"].'" alt="" /></a>
                                    </div><div class="product-content product-content-right">
                                        <div class="pro-title">
                                            <h4> <a href="'.Yii::$app->urlManager->createUrl(['/goods/view', 'seourl' => $url]).'" target="_self">'.$item["name"].'</a></h4>
                                        </div>
                                        <div class="pro-rating ">';
                                                 for($i = 1; $i <= 5; $i++) { if ($i <= $item['star']) {
                                                        $str = $str.'<a href="#" title="'.$item['star'].'"><i class="fa fa-star"></i></a>';
                                                     }else{
                                                        $str = $str.'<a href="#" title="'.$item['star'].'"><i class="fa fa-star-o"></i></a>';
                                                     }}
                                            $str = $str.'</div>
                                        <div class="price-box">
                                            <span class="price product-price">$'.$item["price"].'</span>';
                                            if(!Yii::$app->user->isGuest){
                                                $str = $str.'<span class="PriceCount">$'.$item['market_price'].'</span>';
                                            }
                                            
                                        $str = $str.'</div>
                                        <div class="product-icon">
                                          <div class="product-icon-left f-left">';
                                                
                                                        $str = $str.'';

                                                $str = $str.'</div>
                                                </div> <div class="product-icon-right floatright">
                                                     
                                                </div>';
                                            

                                            
                                            $str = $str.'
                                    </div>                  
                                </div>';
                                ?>      
                                <?php $num = $num+1;?>
                                <?php if($num==5):?>
                                    <?php 
                                        $str = $str.'</div>';
                                        print_r($str);
                                        $str = '';
                                        $num = 0;
                                    ?>
                                <?php endif;?>
                            <?php } ?>                  
                    </div> 

        
       <div class="bestseller-area dotted-style-2" style="margin-top:15px;">
                    <div class="section-title" style="height:38px;background:#ffffff;">
                        <h3 style="height:38px;line-height:38px;padding-left:15px;">HISTORY</h3>
                    </div>
                    <div class="single-product-items-actives border-1" style="border-left:1px solid #eeeeee;">
                        <div class="single-product-items">
                            <?php
                            foreach ($historyProducts as $item) {
                                $url = $item["seourl"];
                                ?>
                                <div class="single-product single-product-sidebar white-bg">
                                    <div class="product-img product-img-left">
                                        <a href="<?php echo Yii::$app->urlManager->createUrl(['/goods/view', 'seourl' => $item["seourl"]]);?>"><img src="<?= Yii::$app->params['imgServerAddress'].$item["image"] ?>" alt="" onerror="javascript:this.src='/theme/new/images/noimg_quesheng.png';"/></a>
                                    </div>
                                    <div class="product-content product-content-right">
                                        <div class="pro-title">
                                            <h4><a href="<?php echo Yii::$app->urlManager->createUrl(['/goods/view', 'seourl' => $item["seourl"]]);?>"><?= $item["name"] ?></a></h4>
                                        </div>
                                        <div class="pro-rating ">
                                            <?php for($i = 1; $i <= 5; $i++) { if ($i <= $item['star']) {?>
                                                <a href="#" title="<?= $item['star'] ?>"><i class="fa fa-star"></i></a>
                                            <?php }else{ ?>
                                                <a href="#" title="<?= $item['star'] ?>"><i class="fa fa-star-o"></i></a>
                                            <?php }} ?>
                                        </div>
                                        
                                        <div class="price-box">

                    <span class="price product-price">$<?php
                    
          $products = Product::findOne($item['id']);
          if($products->subProduct){
            $productPrice = ProductPrice::getFinalPrice($custom_group,1,$products->subProduct[0]->product_id);
            $item['price'] = Product::findOne($products->subProduct[0]->product_id)->price;
          }else{
            $productPrice = ProductPrice::getFinalPrice($custom_group,1,$item['id']);
          }
                    if(!$productPrice) {
                        echo $item['price'];
                    }else {
                        echo $productPrice['price'];
                    }
                    ?></span>
                    <span class="PriceCount" style="text-decoration:line-through;;"><?php
                        if($productPrice) echo '$',$item['price'];
                    ?></span>

                </div>
                                        <div class="product-icon">
                                            <div class="product-icon-left f-left">
                                               <!-- <?php if($item['stock']>0){ ?>
                                                 <?php 
                                               }else{ ?>
                                               
                                               <?php }?> -->
                                            </div>
                                        </div>
                                    </div>                  
                                </div>
                            <?php } ?>
                        </div>
                                    
                    </div>                      
        </div>
    </div>
             </div>

<!-- 购物车弹窗 --><!-- huxu -->
<?php echo ProductHtml::bulkadd($model->id);?>
</div>
</div><!-- container -->
<script src="/theme/new/js/good_detail.js"></script>
<script>
// <div>100% Original</div>
// <div>TPD Compliance</div>
// <div>Christmas sale</div>
    var product = <?= '{productId:' . $model->id . ', stock:' . $model->stock . ', csrf:"' . $csrf .'"}'?>;
    console.log(product);
    var isSubProduct = '<?=$isSubProduct?>';
    var isPreOrderTime = '<?=$model->pre_order_time?>';//Pre Order Time  0：不是pre--order  >0是pre-order  <0设置错误
    var type = <?= $type?>;//消费者权益
    console.log(type);
    var div_small_sure = '<div>100% Original</div>';
    for(var i = 0;i<type.length;i++){    
        if(type[i] == 'IS_TPD'){
            div_small_sure += '<div>TPD Compliance</div>';
        }else if(type[i] == 'IS_TPD_PAKGE'){
            div_small_sure += '<div>TPD Package</div>';
        }
    }
    $('.sure_auto').html(div_small_sure);
    //写评论
    var $width = $('#tabs_bar ul li').css('width');
    window.onscroll = function(){
        var scrolltop = document.documentElement.scrollTop || document.body.scrollTop;
      }
    $('.datail_comment_a').click(function(){
       $("html,body").animate({'scrollTop':'900'},400,function(){
            $('#red_bar').animate({'left':parseFloat($width)*1+'px'},400);
            $('.sectionbox').css({'display':'none'}).eq(1).css({'display':'block'});
       });
    });
    if($('.attr').find('li').length == 0){
        $('.choice').hide();
    }
    jQuery(".opt_select").change(function(){
        var option = jQuery(this).find("option:selected");
        jQuery(option).parent().children().css('border-color','#eee');        
        jQuery(option).parent().children().attr('chosed',0);
        //jQuery('#img_'+jQuery(option).attr('attrlable')).mouseover();
        
        var choise = '-';
        if(jQuery(option).attr('chosed')==1){
            jQuery(option).css('border-color','#eee');
            jQuery(option).attr('chosed',0);
        } else {
            jQuery(option).css('border-color','red');
            jQuery(option).attr('chosed',1);            
        }
        jQuery(".option").each(
            function(){
                if(jQuery(this).attr("chosed")==1){
                    choise = choise+jQuery(this).attr("attrid")+"."+jQuery(this).attr("optid")+'-';
                }
            }
        );
        var id = '';
        jQuery(".child_ids").each(
            function(){
               if(jQuery(this).attr("attrs")==('child_'+choise)){
                   id = jQuery(this).val();                   
               }
        });
        jQuery("#attr_4_"+jQuery(this).attr('product_id')).attr("value",id);
        jQuery("#attr_4").attr("readonly","true");
        //product.stock = 0;
        checkStock(product);
    });
    function checkStock(product){
    if (product.stock > 0) {
        $("li.add_cart_li").html('<a href="javascript:;" class="btn white" id="buy_btn">Add To Cart</a>')
    } else {
        $("li.add_cart_li").html('<a href="javascript:;" class="btn" id="set_remind"> 设置到货提醒</a>');
        // if(product.remind==1){
        //     $("li.add_cart_li").html('<a href="javascript:;" class="btn graybtn" id="set_remind"> 取消到货提醒</a>')
        // }else{
        //     $("li.add_cart_li").html('<a href="javascript:;" class="btn" id="set_remind"> 设置到货提醒</a>')
        // }
        //$("li.add_cart_li").html('<span>暂时无货</span>')
    }    
}
    //商品标题前的判断
    var preorderNum = 0;
    for(var i = 0;i<$('.stock_status').length;i++){
        if($('.stock_status').eq(i).text() =='Pre-order'){
            preorderNum++;
        }
    }
    if(preorderNum>0&&preorderNum<$('.stock_status').length){
        $('.goods_detail_title').prepend('<span class="title_label">Partically Pre-order</span>');
    }else if(preorderNum>0 &&preorderNum == $('.stock_status').length){
        $('.goods_detail_title').prepend('<span class="title_label">Pre-order</span>');
    }
    
    $('.opt_select').eq(0).change(function(){
        if($('#hiddenColor>input').val() == ''){
            var id =  product.productId;
        }else{
            var id = $('#hiddenColor>input').val();
        }
        for(var attr in wishlist){
            if(attr == id){
                //huxu
                $("#fav_btn").css({'background':'url(/theme/new/images/icon_wishlist_red.png) no-repeat 11px 12px'});
                break;
            }else{
                 $("#fav_btn").css({'background':'url(/theme/new/images/icon_wishlist_grey.png) no-repeat 11px 12px'});
            }
        }
        var count = 1;
        for(var i = 0;i<$('.opt_select').length;i++){

            count *= ($('.opt_select').eq(i).find('option').length-1);
        }
        if(sku_a.length != count){
            sku_available(0);//sku
        }
        //没有属性的单品有可能加不了购物车  有属性的单品需要判断是否有皮料加入购车
        is_piliang(HeightLightCart,id);
        selectPrice($(this).attr('product_id'),id);
        //切换图片
        changeImg(id);
        //sku_number
        changeSku(id);

    });
    
    $('.opt_select').eq(1).change(function(){
        if($('#hiddenColor>input').val() == ''){
            var id =  product.productId;
        }else{
            var id = $('#hiddenColor>input').val();
        }
        for(var attr in wishlist){
            if(attr == id){
                //huxu
                $("#fav_btn").css({'background':'url(/theme/new/images/icon_wishlist_red.png) no-repeat 11px 12px'});
                break;
            }else{
                 $("#fav_btn").css({'background':'url(/theme/new/images/icon_wishlist_grey.png) no-repeat 11px 12px'});
            }
        }
        is_piliang(HeightLightCart,id);
        selectPrice($(this).attr('product_id'),id);
        //切换图片
        changeImg(id);
        changeSku(id);
        // sku_available(1);
    });
    $('.opt_select').eq(2).change(function(){
        if($('#hiddenColor>input').val() == ''){
            var id =  product.productId;
        }else{
            var id = $('#hiddenColor>input').val();
        }
        for(var attr in wishlist){
            if(attr == id){
                //huxu
                $("#fav_btn").css({'background':'url(/theme/new/images/icon_wishlist_red.png) no-repeat 11px 12px'});
                break;
            }else{
                 $("#fav_btn").css({'background':'url(/theme/new/images/icon_wishlist_grey.png) no-repeat 11px 12px'});
            }
        }
        is_piliang(HeightLightCart,id);
        selectPrice($(this).attr('product_id'),id);
        //切换图片
        changeImg(id);
        changeSku(id);
        // sku_available(2);
    });
    function sku_available(n){
        for(var i = 0;i<$('.opt_select').length;i++){
            for(var j = 0;j<$('.opt_select').eq(j).find('option').length;j++){
                $('.opt_select').eq(j).find('option').eq(j).css({'color':'#666666'});
            }
        }
        if(n==0){
            var obj = {};
            var numarr = [];
            var choosestr = 'Please';
            console.log($('.opt_select').eq(0).val());
            for(var i = 1;i<$('.opt_select').length;i++){
                var optstr = $('.opt_select').eq(i).val();
                if(optstr.indexOf(choosestr) == -1){//已选
                    $('.opt_select').eq(i).val($('.opt_select').eq(i).find('option').eq(0).text());
                    obj[n] = $('.opt_select').eq(n).val();
                    numarr.push(n);
                }else if(n==0){
                    obj[n] = $('.opt_select').eq(n).val();
                    numarr.push(n);
                }
            }
            console.log(obj);
            skudisabled(obj,numarr,n);
        }
        
    }
    var sku_a = [];
    for(var i = 0;i<$('.td_first').length;i++){
        if($('.td_first').eq(i).closest('tr').hasClass('no')){
            var _json = {};
            var arr = $('.td_first').eq(i).text().split(', ');
            for(var j = 0;j<arr.length-1;j++){
                // _json += '{"'+j+'":"'+arr[j]+'"}, 
                _json[j] = arr[j];
            }
            sku_a.push(_json); 
        }
        
    }
    console.log(sku_a);
    function skudisabled(obj,numarr,n){
        console.log(obj,numarr,n);
        clearskudisabled();
        //原始数组中符合带有选中属性的数组 其他数组禁选
        if(numarr.length>0){
            if(numarr.length == 1){
                var selectskuarr = [];
               for(var i = 0;i<numarr.length;i++){
                    for(var j = 0;j<sku_a.length;j++){
                           if(obj[numarr[i]] == sku_a[j][numarr[i]]){
                                selectskuarr.push(sku_a[j]);
                            } 
                        
                    }
                }
                console.log(selectskuarr);
                searchsame(selectskuarr,numarr);
            }else if(numarr.length == 2){
                var selectskuarr = [];
                for(var i = 0;i<numarr.length-1;i++){
                    for(var j = 0;j<sku_a.length;j++){
                        if(obj[numarr[i]] == sku_a[j][numarr[i]]&& obj[numarr[i+1]] == sku_a[j][numarr[i+1]]){// 
                            selectskuarr.push(sku_a[j]);
                        }
                    }
                }
                console.log(selectskuarr);
                searchsame(selectskuarr,numarr);
            }else if(numarr.length == 3){
                var selectskuarr = [];
                for(var i = 0;i<numarr.length-2;i++){
                    for(var j = 0;j<sku_a.length;j++){
                        if(obj[numarr[i]] == sku_a[j][numarr[i]] && obj[numarr[i+1]] == sku_a[j][numarr[i+1]]&& obj[numarr[i+2]] == sku_a[j][numarr[i+2]]){ 
                            selectskuarr.push(sku_a[j]);
                        }
                    }
                }
                console.log(selectskuarr);
                searchsame(selectskuarr,numarr);
            }        
    }

    }
    //不符合条件的选项disabled   只能用枚举了
    function searchsame(selectskuarr,numarr,n){
        for(var i = 0;i<numarr.length;i++){
            if(numarr[i] == 0){
                for(var j = 1;j<$('.opt_select').eq(1).find('option').length;j++){//wood cub
                    for(var m = 0;m<selectskuarr.length;m++){
                        if($('.opt_select').eq(1).find('option').eq(j).text() == selectskuarr[m][1]){
                            break;
                        }else if(m == selectskuarr.length-1){
                            $('.opt_select').eq(1).find('option').eq(j).attr('disabled',true).css({'color':'#cccccc'});
                        }
                    }
                }
                for(var j = 1;j<$('.opt_select').eq(2).find('option').length;j++){//wood cub
                    for(var m = 0;m<selectskuarr.length;m++){
                        if($('.opt_select').eq(2).find('option').eq(j).text() == selectskuarr[m][2]){
                            break;
                        }else if(m == selectskuarr.length-1){
                            $('.opt_select').eq(2).find('option').eq(j).attr('disabled',true).css({'color':'#cccccc'});
                        }
                    }
                }
            }
            if(numarr[i] ==1){
                for(var j = 1;j<$('.opt_select').eq(0).find('option').length;j++){//wood cub
                    for(var m = 0;m<selectskuarr.length;m++){
                        if($('.opt_select').eq(0).find('option').eq(j).text() == selectskuarr[m][0]){
                            break;
                        }else if(m == selectskuarr.length-1){
                            $('.opt_select').eq(0).find('option').eq(j).attr('disabled',true).css({'color':'#cccccc'});
                        }
                    }
                }
                for(var j = 1;j<$('.opt_select').eq(2).find('option').length;j++){//wood cub
                    for(var m = 0;m<selectskuarr.length;m++){
                        if($('.opt_select').eq(2).find('option').eq(j).text() == selectskuarr[m][2]){
                            break;
                        }else if(m == selectskuarr.length-1){
                            $('.opt_select').eq(2).find('option').eq(j).attr('disabled',true).css({'color':'#cccccc'});
                        }
                    }
                }
            }
            if(numarr[i] == 2){
                for(var j = 1;j<$('.opt_select').eq(0).find('option').length;j++){//wood cub
                    for(var m = 0;m<selectskuarr.length;m++){
                        if($('.opt_select').eq(0).find('option').eq(j).text() == selectskuarr[m][0]){
                            break;
                        }else if(m == selectskuarr.length-1){
                            $('.opt_select').eq(0).find('option').eq(j).attr('disabled',true).css({'color':'#cccccc'});
                        }
                    }
                }
                for(var j = 1;j<$('.opt_select').eq(1).find('option').length;j++){//wood cub
                    for(var m = 0;m<selectskuarr.length;m++){
                        if($('.opt_select').eq(1).find('option').eq(j).text() == selectskuarr[m][1]){
                            break;
                        }else if(m == selectskuarr.length-1){
                            $('.opt_select').eq(1).find('option').eq(j).attr('disabled',true).css({'color':'#cccccc'});
                        }
                    }
                }
            }
        }
    }

    //清楚sku
    function clearskudisabled(){
        for(var i = 0;i<$('.opt_select').length;i++){
            for(var j = 0;j<$('.opt_select').eq(i).find('option').length;j++){
                $('.opt_select').eq(i).find('option').eq(j).attr('disabled',false);
            }
        }
    }
    //sku查询改变
    function changeSku(id){
        console.log(skus);
        for(var attr in skus){
            if(attr == id){
                $('.sku_number').empty().text(skus[attr]);
                $('.sku').stop().animate({'height':'36px'});
                break;
            }else{
                $('.sku').stop().animate({'height':'0'});
            }
        }
    }
    //图片改变
    function changeImg(id){
        console.log(id);
        for(var i = 0;i<$('.child_ids').length;i++){
            if(id == $('.child_ids').eq(i).val()){//子产品id的情况
                console.log(id,$('.child_ids').eq(i).attr('img'));
                if($('.child_ids').eq(i).attr('img') == ''||$('.child_ids').eq(i).attr('img') =='0'){//有子产品但没图的情况
                    $('#pic-view').attr('src',$('.cle1 li').eq(0).find('.img_select').attr('src'));
                    $('.zoom-big>img').attr('src',$('.cle1 li').eq(0).find('.img_select').attr('src'));
                }else{
                    $('#pic-view').attr('src',$('.child_ids').eq(i).attr('img'));
                    $('.zoom-big>img').attr('src',$('.child_ids').eq(i).attr('img'));
                    for(var j = 0;j<$('#cle1 li').length;j++){
                        if($('#cle1>li').eq(j).find('img').attr('src').indexOf($('.child_ids').eq(i).attr('img')) !=-1 && j>=4){
                            $('#cle1>li').removeClass('current-mark');
                            $('#cle1>li').eq(j).addClass('current-mark');
                            $('#cle1').animate({'left':-110*(j-3)+'px'});
                            break;
                        }else if($('#cle1>li').eq(j).find('img').attr('src').indexOf($('.child_ids').eq(i).attr('img')) !=-1 && j<4){
                            console.log('j<4');
                            $('#cle1>li').removeClass('current-mark');
                            $('#cle1>li').eq(j).addClass('current-mark');
                            break;
                        }
                    }
                }
                break;
            }else if(i == $('.child_ids').length-1){//找不到子产品id的情况
                $('#pic-view').attr('src',$('.cle1 li').eq(0).find('.img_select').attr('src'));
                $('.zoom-big>img').attr('src',$('.cle1 li').eq(0).find('.img_select').attr('src'));
            }
        }
    }
    //价格表改变
    function selectPrice(_product_id,group_id){
        if(_product_id == group_id){
            $('.price_info table').addClass('hide')
            $('.price_info table').eq(0).removeClass('hide');
            // $('#pic-view').attr('src') = $('#cle1 li:first').find('img').attr('src');
        }else{
            for(var i = 0;i<$('.price_info table').length;i++){
                if($('.price_info table').eq(i).attr('id') == 'group_table_'+group_id){
                    $('.price_info table').addClass('hide');
                    $('.price_info table').eq(i).removeClass('hide');

                }
            }
            for(var i = 0;i<$('.child_ids').length;i++){
                if(group_id == $('.child_ids').eq(i).val()){
                    var oldprice = $('.child_ids').eq(i).closest('tr').find('td').eq(1).find('span:nth-child(1)').text();
                    var price = $('.child_ids').eq(i).closest('tr').find('td').eq(1).find('span:nth-child(2)').text();
                    var num_old_price = Number(oldprice.substring(1,oldprice.length));
                    var num_new_price = Number(price.substring(1,price.length));
                    if(num_old_price === num_new_price){
                        $('.old_price').empty().text('');
                    }else{
                        $('.new_price').empty().text(price);
                        $('.old_price').empty().text(oldprice);
                        var discount_off_new = Math.floor((num_old_price-num_new_price)/num_old_price*100);
                        if(discount_off_new == 0){
                            $('.sale-off').css('display','none');
                        }else if(discount_off_new > 0){
                            $('.sale-off').empty().text(' '+discount_off_new+'% OFF');
                        } 
                    }
                }
            }
        }
    }
    //页面购物车产品信息
    function HeightLightCart(id){
        var child_ids = $('.child_ids');
        console.log(child_ids);
        if(id !=''){
            for(var i = 0;i<child_ids.length;i++){
                if(child_ids.eq(i).val()==id && child_ids.eq(i).closest('.quantity').siblings('.stock_status').text() =='In stock'){
                    instock(i);
                }else if(child_ids.eq(i).val()==id && child_ids.eq(i).closest('.quantity').siblings('.stock_status').text()=='Pre-order'){
                    preorder(i);
                }else if(child_ids.eq(i).val()==id && child_ids.eq(i).closest('.quantity').siblings('.stock_status').text()=='Out of stock'){
                    outofstock(i);
                }
            }
        }
    }
    
    is_piliang(initHeightLightCart,$('.child_ids').length-1);
    var isTrue = true;
    if(isTrue){
        for(var i = 0;i<$('.stock_status').length;i++){
            if($('.stock_status').eq(i).text() == 'In stock'){
                isTrue = !isTrue;
                break;
            }
        }
    }
    if(isTrue){
        for(var i = 0;i<$('.stock_status').length;i++){
            if($('.stock_status').eq(i).text() == 'Pre-order'){
                for(var j = 0;j<$('.stock_status').length;j++){
                    if($('.stock_status').eq(j).text() == 'Out of stock'){
                        preorder(j);
                        // preorder_piliang_btn(j);
                        break;
                    }
                }
            }
        }
    }
    //初始化页面购物车信息（递归调用，慎重修改）
    function initHeightLightCart(n){
        if(n == 0){
            if(i_p_o(0) == 1){
                instock(0);
                // instock_piliang_btn(0);
            }else if(i_p_o(0) == 2){
                preorder(0);
                // preorder_piliang_btn(0);
            }else if(i_p_o(0) == 3){
                outofstock(0);
                // outofstock_piliang_btn(0);
            }
        }else if(i_p_o(n) == i_p_o(0)){
            return initHeightLightCart(child_ids_num(n));
        }
    }

//     var ispreorder = '<?=($model->pre_order_time)?1:0?>';  //1:不是pre-order  0 :是pre-order
//         var isparent = '<?=$model->is_parent?>';           //1:不是单品    0：是单品
// console.log(ispreorder,isparent);
    function initHeightLightCartDan(){
        // var ispreorder = '<?=($model->pre_order_time)?1:0?>';
        // var isparent = '<?=$model->is_parent?>'; 
        console.log(isSubProduct,isPreOrderTime,product.stock);
        if(isSubProduct == 0 && isPreOrderTime > 0){ // 是单品是pre-order
            preorder(0);
        }else if(isSubProduct == 0 && isPreOrderTime<= 0 && product.stock == 0){ //是单品没库存
            outofstock(0);
        }else if(isSubProduct == 0 && isPreOrderTime<= 0 && product.stock > 0){//是单品有库存
            instock(0);
        }
    }

    function child_ids_num(num){
        num--;
        return num;
    }
    function instock(x){
        $('.avail_static').empty().text('Add To Cart');//child_ids.eq(i).closest('.quantity').siblings('.stock_status').text()
        if(UNIT_TYPE !='pc'){
            $('.add_cart>a').css({'background':'#ee3d43'});
        }else{
            $('.add_cart>a').css({'background':'#ee3d43 url(/theme/new/img/icon_shopping_cart-white.png) no-repeat 40px 12px'});
        }
        $('.add_cart span').empty().text('Add To Cart');
        return '1';
    }
    function instock_piliang_btn(x){
        $('.add_cart-1>a').css({'background':'#ee3d43 url(/theme/new/img/icon_shopping_cart-white.png) no-repeat 40px 12px'});
        $('.add_cart-1 span').empty().text('Add To Cart');
    }
    function preorder(x){
        $('.avail_static').empty().text('Pre-order');//child_ids.eq(i).closest('.quantity').siblings('.stock_status').text()
        if(UNIT_TYPE !='pc'){
            $('.add_cart>a').css({'background':'#ee3d43'});
        }else{
            $('.add_cart>a').css({'background':'#ee3d43 url(/theme/new/img/icon_shopping_cart-white.png) no-repeat 40px 12px'});
        }
        $('.add_cart span').empty().text('Pre-order');
        return '2';
    }
    function preorder_piliang_btn(x){
        console.log('preorder_piliang_btn');
        $('.add_cart-1>a').css({'background':'#ee3d43 url(/theme/new/img/icon_shopping_cart-white.png) no-repeat 40px 12px'});
        $('.add_cart-1 span').empty().text('Pre-order');
    }
    function outofstock(x){
        $('.avail_static').empty().text('Out of stock');
        if(UNIT_TYPE !='pc'){
            $('.add_cart>a').css({'background':'#cccccc'});
        }else{
            $('.add_cart>a').css({'background':'#cccccc url(/theme/new/img/icon_shopping_cart-white.png) no-repeat 40px 12px'});
        }
        $('.add_cart span').empty().text('Arrival Notice');
        return '3';
    }
    function outofstock_piliang_btn(x){
        $('.add_cart-1>a').css({'background':'#cccccc url(/theme/new/img/icon_shopping_cart-white.png) no-repeat 40px 12px'});
        $('.add_cart-1 span').empty().text('Arrival Notice');
    }
    function i_p_o(n){
        if($('.child_ids').eq(n).closest('.quantity').siblings('.stock_status').text() =='In stock'){
            return 1;
        }else if($('.child_ids').eq(n).closest('.quantity').siblings('.stock_status').text() =='Pre-order'){
            return 2;
        }else if($('.child_ids').eq(n).closest('.quantity').siblings('.stock_status').text() =='Out of stock'){
            return 3;
        }
    }
    //单品判断
    function is_piliang(fn,something){//该参数一定是函数
        if($('.choice').css('display') !=' none' && $('.choice').css('display') !='none' && $('.choice').css('display') !='none;'){//批量
            fn(something);
        }else{//不存在批量--单品
            console.log('wu');
            initHeightLightCartDan();
        }
    }
    var UNIT_TYPE = isAPP();
    if(UNIT_TYPE != 'pc'){
        $('.add_cart>a').css({'background-image':'none'});
        $('.add_cart>a>span').css({'padding':0,'text-align':'center'});
        $('.choice>a').css({'background-image':'none','padding':0,'text-align':'center'});
        $('.choice>a>span').css({'padding':0,'text-align':'center'});
        $('.sure_auto>div').css({'width':'50%','margin-left':'0'});
        $('#item-thumbs').css({'display':'none'});
        $('.detail_img').css({'min-height':'0'});
        $('#red_bar').css({'display':'none'});
        $('.commen_imgs>img').css({'width':'39px','height':'39px','border':'1px solid #e3e3e5','margin-left':'3px'});
        $('.pic_view').css('height','300px');
        $('.sale-off').hide();
        $('.sectionbox .owl-item-single').width('50%');
        $('.commen_tishi').css({'display':'none'});
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
    function commen_imgs(obj){
        if($('.commen_imgBig').length != 0){
            return;
        }else{
            var width = $(window).width()/2-($(obj).width()+300)/2;
            var str = $(obj).clone();
            str.attr({'onclick':'small(this)'}).addClass('commen_imgBig');
            if(isAPP() != 'pc'){
                str.css({'width':$(obj).width()+300+'px','height':$(obj).height()+300+'px','position':'fixed','left':'10px','top':'200px','border':'1px solid #cccccc','opacity':0});
            }else{
                str.css({'width':$(obj).width()+300+'px','height':$(obj).height()+300+'px','position':'fixed','left':width+'px','top':'200px','border':'3px solid #cccccc','opacity':0});
            }
            $(str).animate({'opacity':1},400);
            $('body').append(str); 
        }
        
    };
        _csrf = "<?= $csrf?>";
    <!-- //用户上传评论图片        -->
            var path = '';
            var img_sum = 0;//全局变量
            $('#detail_upload').change(function(){
                img_sum++;
                console.log(img_sum);
                var _this = $(this);
                var file = $(this).get(0).files[0];
                var type = file.type;
                var iStart = type.indexOf('/');
                var picType = type.substring(iStart,type.length);
                var reader = new FileReader();
                var formData = new FormData();
                if(picType == '/jpg'||picType == '/jpeg'||picType == '/png'||picType == '/gif'){
                    //添加图片
                    if(file.size>5*124*1024){
                        layer.msg('Image file is too big. 5M at most.', {icon: 0,time: 1000});
                        return;
                    }
                    if(img_sum>=5){
                        img_sum = 4;
                        console.log(img_sum);
                        layer.msg('Sorry, 4 images at most.', {icon: 0,time: 1000});
                        return;
                    }else if(img_sum>=1&&img_sum<4){
                        $('.commen_tishi>.upload_4a').hide();
                    }else if(img_sum==0){
                        $('.commen_tishi>.upload_4a').show();
                    }
                   
                    reader.readAsDataURL(file);
                    reader.onload = function(e){
                        formData.append('myfile',file);
                        formData.append('_csrf',_csrf);
                        var _result = this.result;
                        console.log(_result);
                        $.ajax({
                            url: "/goods/saveimg.html",
                            type: "POST",
                            data: formData,
                            dataType:'json',
                            contentType: false,
                            processData: false,
                            success:function(res){
                                console.log(formData);
                                console.log(res);
                                var imgPath = res.url;
                                var str = '<b class="img-wrap" style="display:inline-block;;width:40px;height:40px;margin-left:10px;position:relative;"><img src="'+_result+'" path="'+imgPath+'"/><i style="display:block;position:absolute;top:0;right:0;width:18px;height:18px;background:#ffffff;border-radius:9px;line-height:16px;text-align:center;font-style:normal;font-size:10px;cursor:pointer;color:#cccccc;" onclick="deletePic(this)">x</i></b>';
                                
                                $('.commen_tishi').append(str);
                                path = '';
                                for(var i = 0;i<$('.img-wrap').length;i++){
                                    path += $('.img-wrap').eq(i).find('img').attr('path')+',';
                                }
                                console.log(path);
                                $('#imgupload').val(path);
                            }
                        });
                        _this.val('');

                        
                    }


                }else{
                    layer.msg('Please upload jpg, jpeg or png.', {icon: 0,time: 1000});
                }
            });
            function deletePic(obj){
                
                var data = {};
                var path = $(obj).closest('.img-wrap').attr('path');
                data.path = path;
                data._csrf = _csrf;
                $.ajax({
                    url:'/goods/delimg.html',
                    type:"POST",
                    dataType:'json',
                    data: data,
                    success:function(res){
                        img_sum--;
                        console.log(img_sum);
                        if(img_sum>=1&&img_sum<4){
                            $('.commen_tishi>.upload_4a').hide();
                        }else if(img_sum==0){
                            $('.commen_tishi>.upload_4a').show();
                        }

                        $(obj).closest('.img-wrap').remove();
                    }
                });
            }

    function submitcomment(form){
        $.ajax({
            url:'/goods/savecommen.html',
            data:$('form').serialize(),
            type: "post",
            dataType: "json",
            success:function(res){
                console.log(res);
                if(res.status == 0){
                    layer.msg('Please login first.',{icon:0,time:1000});
                }else if(res.status == 1){
                    //成功之后清楚img-wrap标签
                    var spanStar = '';
                    $('.img-wrap').remove();
                    for(var i = 0;i<5;i++){
                        if(i<=res.data.star-1){
                            spanStar += '<span class="fa fa-star starhigh"></span>&nbsp;';
                        }else{
                            spanStar += '<span class="fa fa-star-o starhigh"></span>&nbsp;';
                        }
                    }
                    var imgStr = '';
                    for(var i = 0;i<res.data.images.length;i++){
                        imgStr +='<img onclick="commen_imgs(this)" src="'+res.data.images[i]+'" />';
                    }
                    var str = '<div style="opacity:0;height:0px;" class="commen_content clearfix"><div class="commen_personal"><p style="margin-bottom:0;"><img src="/theme/new/images/pic_user.png"></p><p style="margin-bottom:0;" class="commen_personal_nick">'+res.data.username+'</p><p style="margin-bottom:0;" class="commen_personal_level"><!-- <img src="/theme/new/img/group7.png" /> --></p></div><div class="commen_info"><p style="margin-bottom:0;" class="commen_star">'+spanStar+'</p><p style="margin-bottom:0;" class="commen_detail_info">'+res.data.content+'</p><p style="margin-bottom:0;" class="commen_imgs">'+imgStr+'</p><p style="margin-bottom:0;" class="commen_time"><span>'+res.data.created_at+'</span><span style="position:relative;"><!-- <i class="comment_sum" data-mark="0">(0)</i> 回复评论暂时不做--><i class="zan_sum" data_id="5384" onclick="goodComment(this)" data-mark="0">(0)</i></span></p></div></div>';
                    $('.commen_content_wrap').prepend(str).find('div:first').animate({'height':'264px','margin-top':'15px'},400,function(){
                        $('.commen_content_wrap>div:first').animate({'opacity':1},400,function(){
                            for(var i = 0;i<$('.write_commen_title>i').length;i++){
                                if($('.write_commen_title>i').eq(i).hasClass('fa-star-o')){
                                    $('.write_commen_title>i').eq(i).removeClass('fa-star-o').addClass('fa-star');
                                }
                            }
                            $('.commen_area_top textarea').val('');
                            $('.img-wrap').hide();
                            $('.upload_4a').show();
                            layer.msg('Thanks for your review. We will verify it soon.',{icon:1,time:1000});
                        });
                    });
                    $('#imgupload').val('');
                    

                    //清楚图片个数
                    img_sum = 0;
                    path = ''
                }else if(res.status == 2){
                    layer.msg('Please write your review.',{icon:0,time:1000});
                }
            },
            error:function(){layer.msg('server or network error',{icon:0,time:1000});}
        });
    }
    //到货通知
    $('.add_cart').on('click',function(){
        var _json = {};
        var productId = $('#hiddenColor>input').val();
        console.log(productId);
        _json._csrf = '<?php echo $csrf?>';//huxu
        if(productId == ''){
            console.log(productId);
            layer.msg('Please choose option',{icon:0,time:1000});
            return;
        }else{
             _json.productId = productId;
        }
        console.log();
        if(Number($('.detail_num>input').val()) ==0||isNaN($('.detail_num>input').val())){
            layer.msg('Please select quantity',{icon:2,time:1000});
            return;
        } 
        if($(this).find('span').text() == 'Arrival Notice'){
            var url = '/goods/set-remind.html'; 
            addtocartajax(_json,url);
        }else if($(this).find('span').text() == 'Add To Cart'||$(this).find('span').text() == 'Pre-order'){
            _json.number = $('.num li').eq(1).find('input').val();
            var url = '/cart/ajax-add.html';
            addtocartajax2(_json,url);
        }

        
        
    });
    function addtocartajax(_json,url){
        $.ajax({
            url:url,
            type:'GET',
            dataType:'json',
            data:_json,
            beforeSend:function(){
                layer.load(0, {shade: false});
            },
            complete:function(){
                $('.layui-layer.layui-layer-loading.layer-anim').remove();
            },
            success:function(res){
                $('.ayui-layer-loading.layer-anim').remove();
                if(res.status == 1){
                    layer.msg('Success',{icon:1,time:1000});
                }else if(res.status == 2){
                    layer.msg('Add to Notice',{icon:1,time:1000});
                }else if(res.status == 0){
                    layer.msg('Please login',{icon:0,time:1000});
                }else{
                    layer.msg(res.message,{icon:2,time:1000});
                }
            },
            error:function(){
                $('.layui-layer.layui-layer-loading.layer-anim').remove();
                layer.msg('error',{icon:0,time:1000});
            }
        });
    }
    function addtocartajax2(_json,url){
        $.ajax({
            url:url,
            type:'POST',
            dataType:'json',
            data:_json,
            beforeSend:function(){
                layer.load(0, {shade: false});
            },
            complete:function(){
                $('.layui-layer.layui-layer-loading.layer-anim').remove();
            },
            success:function(res){
                console.log();
                if($('.MOBILE_cart').css('display') =='none'){
                    $('.addNumber').empty().text(res.userCartSum);
                }else {
                    $('.MOBILE_cart_click').siblings('span').empty().text(res.userCartSum);
                }
                
                $('.ayui-layer-loading.layer-anim').remove();
                if(res.status == 1){
                    layer.msg('Success',{icon:1,time:1000});
                }else{
                    layer.msg(res.message,{icon:2,time:1000});
                }
            },
            error:function(){
                $('.layui-layer.layui-layer-loading.layer-anim').remove();
                layer.msg('error',{icon:0,time:1000});
            }
        });
    }
    //数量改变
    function changeNum(obj){
        var sum = 0;
        for(var i = 0;i<$('.shopping_num').length;i++){
            sum +=Number($('.shopping_num').eq(i).val());
        }
        $('.shoppingcar-footer>span>i').empty().text(sum);
        console.log(sum);
    }
    function shoppingJian(obj){
        var shopping_num =$(obj).siblings('.shopping_num').val();
        var quantity_sum = $('.shoppingcar-footer>span>i').text();
        if(shopping_num<1){
            return;
        }else{
            shopping_num --;
            quantity_sum--;
            $(obj).siblings('.shopping_num').val(shopping_num);
            $('.shoppingcar-footer>span>i').empty().text(quantity_sum);
        }
    }
    function shoppingAdd(obj){
        var shopping_num =$(obj).siblings('.shopping_num').val();
        var quantity_sum = $('.shoppingcar-footer>span>i').text();
        shopping_num ++;
        quantity_sum++;
        $(obj).siblings('.shopping_num').val(shopping_num);
        $('.shoppingcar-footer>span>i').empty().text(quantity_sum);
    }
    //alert(isSubProduct);
    if(isSubProduct==1){
        //$('.price_info table').addClass('hide');
        //$('.price_info table').eq(1).addClass('hide');
        //$('.price_info table').eq(0).addClass("hide");
    }
    selectPrice(' ',$('.child_ids').eq(0).val());
    $('.opt_select').eq(0).trigger("change");
    $('.opt_select').eq(1).trigger("change");//trigger事件触发浏览器返回后加入购物车到货通知的change事件
    if(isSubProduct==1){
        $('.price_info table').eq(1).removeClass('hide');
        $('.price_info table').eq(0).addClass("hide");
    }
    if($('.choice').css('display') == 'none'){
        var oldprice = $('.old_price').text();
        var price = $('.new_price').text();
        var num_old_price = Number(oldprice.substring(1,oldprice.length));
        var num_new_price = Number(price.substring(1,price.length));
        if(num_old_price === num_new_price){
            $('.old_price').empty().text('');
        }else{
            $('.new_price').empty().text(price);
            $('.old_price').empty().text(oldprice);
            var discount_off_new = Math.floor((num_old_price-num_new_price)/num_old_price*100);
            console.log(discount_off_new);
            if(discount_off_new == 0){
                $('.sale-off').css('display','none');
            }else if(discount_off_new > 0){
                $('.sale-off').empty().text(' '+discount_off_new+'% OFF');
            } 
        }
    }
    price_labelSale();
    function price_labelSale(){
        var oldprice = $('.old_price').text();
        var price = $('.new_price').text();
        var num_old_price = Number(oldprice.substring(1,oldprice.length));
        var num_new_price = Number(price.substring(1,price.length));
        if(num_old_price === num_new_price){
            $('.old_price').empty().text('');
        }else if(num_old_price === 0){
            $('.sale-off').css('display','none');
            return;
        }else{
            $('.new_price').empty().text(price);
            $('.old_price').empty().text(oldprice);
            var discount_off_new = Math.floor((num_old_price-num_new_price)/num_old_price*100);
            console.log(discount_off_new);
            if(discount_off_new == 0){
                $('.sale-off').css('display','none');
            }else if(discount_off_new > 0){
                $('.sale-off').empty().text(' '+discount_off_new+'% OFF');
            } 
        }
    }

</script>


<?php 
$isFavorite = 0;
if (!Yii::$app->user->isGuest) {
    $favorite = \common\models\Favorite::find()->where(['user_id' => Yii::$app->user->id, 'product_id' => $model->id])->one();
    if ($favorite) {
        $isFavorite = 1;
    }
}
// $urlAddToCart = Yii::$app->urlManager->createUrl(['cart/add-to-cart']);
$urlFavorite = Yii::$app->urlManager->createUrl(['goods/favorite']);
$urlLogin = Yii::$app->urlManager->createUrl(['site/login']);
$urlConsultationAdd = Yii::$app->urlManager->createUrl(['consultation/ajax-add']);
$urlComment = Yii::$app->urlManager->createUrl(['goods//comment']);
$urlConsultation = Yii::$app->urlManager->createUrl(['goods//consultation']);
$urlFavoriteAdd = Yii::$app->urlManager->createUrl(['goods//favorite']);
$urlCartAdd = Yii::$app->urlManager->createUrl(['cart/ajax-add']);
$addtocartjs = ProductHtml::getBuyJs();
$this->registerJs('     
jQuery(document).ready(
    function(){jQuery(".item-info select");}
);
//var product = {productId:' . $model->id . ', stock:' . $model->stock . ', csrf:"' . $csrf .'"};

var user = {id:' . (Yii::$app->user->isGuest ? 0 : Yii::$app->user->id) . ', favorite:' . $isFavorite .'};
var urlCartAdd = "' . Yii::$app->urlManager->createUrl(['cart/ajax-add']) . '";
var urlSetRemind = "' . Yii::$app->urlManager->createUrl(['goods/set-remind']) . '";
//var product = {csrf:"' . $csrf . '"};
');
$js = <<<JS
var view = $("#pic-view");
var thumb = $("#item-thumbs");
var clone = thumb.find('img').eq(0).clone();
var len = thumb.find('li').length;
var _left = 66;
var  show = null;
//clone.insertAfter(view);
//thumb.append('<div class="arrow"><i class="icon iconfont">^</i></div>');
var arrow = thumb.find('div.arrow');
arrow.css({
    'left': _left
}).show();
if (len < 5) {
    var l = 5 - len;
    _left += l * 33;
    arrow.css({
        'left': _left
    }).show();
    //thumb.find('ul').css({'width': 66 * len});
}
// thumb.find('li').eq(0).addClass('current');
// thumb.find('li').mouseenter(function(){
//     var _li = $(this);
//     if (_li.hasClass('current')) {
//         return false;
//     }
//     var _i = _li.index();
//     var _img = _li.find('img');
//     _ssrc = _img.attr('src');
//     _bsrc = _img.data('view');
//     arrow.css({
//         'left': _i * 66 + _left
//     });
//     _li.addClass('current').siblings('li').removeClass('current');
//     clone.attr('src', _ssrc);
//     view.attr('src', _bsrc);
// });
var inlineLeft = thumb.find('.inline').left;
var thumb
$('#item-thumbs .begain').on('click',function(){
    if(len>4){
        if(inlineLeft<=(thumb-4)*66){
            return;
        }else{
            thumb.find('.inline').animate({'left':inlineLeft-66*1},400);
        }
        
    }else{
        return;
    }
});
$('#item-thumbs .end').on('click',function(){
    if(len>4){
        if(inlineLeft<=(thumb-4)*66){
            return;
        }else{
            thumb.find('.inline').animate({'left':inlineLeft+66*1},400);
        }
    }
});
function checkStock(product){
    if (product.stock > 0) {
        $("li.add_cart_li").html('<a href="javascript:;" class="btn white" id="buy_btn">Add To Cart</a>')
    } else {
        $("li.add_cart_li").html('<a href="javascript:;" class="btn" id="set_remind"> 设置到货提醒</a>');
        // if(product.remind==1){
        //     $("li.add_cart_li").html('<a href="javascript:;" class="btn graybtn" id="set_remind"> 取消到货提醒</a>')
        // }else{
        //     $("li.add_cart_li").html('<a href="javascript:;" class="btn" id="set_remind"> 设置到货提醒</a>')
        // }
        //$("li.add_cart_li").html('<span>暂时无货</span>')
    }    
}
checkStock(product);
$("#pjxqitem").hide();
$("#askitem").hide();
$("#bulk_buy").css('z-index',999);
jQuery(".minus").css('cursor','pointer');
jQuery(".add").css('cursor','pointer');
var element_id = "#input-buy-number_"+{$model->id};
// jQuery(".minus").click(function(){
//     $(element_id).val(parseInt($(element_id).val()) - 1);
//     if (parseInt($(element_id).val()) < 1 ) {
//         $(element_id).val(1);
//     }
// });//end click
// jQuery(".add").click(function(){
//     $(element_id).val(parseInt($(element_id).val()) + 1);
//     if (parseInt($(element_id).val()) > product.stock ) {
//         $(element_id).val(product.stock);
//     }
// });//end click
//||||||||||||||||||||||||||||||||||||||||||||事件绑定
{$addtocartjs}
jQuery("#set_remind").click(function(){
    param = {
            productId : product.productId,
            _csrf : product.csrf
        };
    $.post(urlSetRemind, param, function(data) {
        // if(data.status==1){
        //     $("li.add_cart_li a").eq(0).addClass("remindbtn");
        //     $("li.add_cart_li a").eq(0).removeClass("btn");
        //     $("li.add_cart_li a").eq(0).text("取消到货提醒");
        // }
        // else if(data.status==2){
        //     $("li.add_cart_li a").eq(0).removeClass("remindbtn");
        //     $("li.add_cart_li a").eq(0).addClass("btn");
        //     $("li.add_cart_li a").eq(0).text("设置到货提醒");
        // }
    }, "json");
});
if (user.favorite > 0) {
    $("#fav_btn").css({'background':'url(/theme/new/images/icon_wishlist_red.png) no-repeat 11px 11px'});
}

$("#fav_btn").click(function(){
    for(var attr in wishlist){
        if(id == attr){
            layer.msg('Wishlisted',{icon:0,time:1000});
            return;
        }
    }
    var id = $('#hiddenColor>input').val();
    if(id == ''){
        layer.msg('Please choose product',{icon:0,time:1000});
    }else{
        $.ajax({
            url:"{$urlFavorite}?id=" + id,
            type:'GET',
            dataType:'json',
            success:function(res){
                console.log(res);
                if(res.status == 0){
                    layer.msg('Please login first.',{icon:0,time:1000});
                    return;
                }else if(res.status == 1){
                    // if($('#hiddenColor>input').val() == ''){
                    //     layer.msg('Please choose color.',{icon:0,time:1000});
                    //     return;
                    // }else{
                        $("#fav_btn").css({'background':'url(/theme/new/images/icon_wishlist_red.png) no-repeat 11px 12px'});
                        var wish = $('#hiddenColor>input').val();
                        wish == ''?wish = product.productId:wish;
                        wishlist[wish] = wish;
                        layer.msg('Added to Wishlist.',{icon:1,time:1000});
                    // }
                }else if(res.status == 2){
                    layer.msg('Wishlisted.',{icon:0,time:1000});
                }
            },
            error:function(res){
                console.log(res);
            }
        });
    }
    
});


$('.z-com-list').on('click', '.pagination a', function(e){
    e.preventDefault();
    $.ajax({
        url: $(this).attr('href'),
        type: "GET",
        dataType: "html",
        success: function(data){
            $('.z-com-list').html(data);
        }
    }).fail(function(){
            alert("Error");
    });
});
$('.z-com-list').on('click', 'a.up', function(e){
    var up = $(this);
    var link = $(this).data('link');
    $.get(link, function(data, status) {
        if (status == "success") {
            //alert(data.up);
            up.html("赞 ( <i>" + data.up + "</i> )");
        }
    }, 'json');
});
$("#consultation-btn").click(function(){
    if (user.id > 0) {
        param = {
            productId : product.productId,
            question : $("#consultation-question").val(),
            _csrf : product.csrf
        };
        $.post("{$urlConsultationAdd}", param, function(data) {
            if (data.status > 0) {
                alert("你的咨询已提交成功，我们会尽快回复你的哦。");
                $("#consultation-question").val('');
            }
        }, "json");
    } else {
        location.href = '$urlLogin?returnUrl=' + window.location.href;
    }
});

$('.ask-list').on('click', '.pagination a', function(e){
    e.preventDefault();
    $.ajax({
        url: $(this).attr('href'),
        type: "GET",
        dataType: "html",
        success: function(data){
            $('.ask-list').html(data);
        }
    }).fail(function(){
        alert("Error");
    });
});
$(".img_select").click(
    function(){
        $("#pic-view").attr('src',$(this).attr('src'));
    }
);
$(".img_select").error(
    function(){
        $(this).attr('src',$(this).attr('bakimg'));
    }
);
$(".ajaxaddToFavorite").click(function(){  
    var id = $(this).data('id');
        if(id==-1){
        var num = 0;
        jQuery(this).parent().parent().find("select").each(
            function(){
                if(jQuery(this).val()==0 && num==0){
                    num = 1;
                    jQuery(this).focus();
                }
            }
        );
    }else if(id==0){
        layer.msg('OUT OF STOCK', {
  icon: 16
  ,shade: 0.01
});
    }
    else{
        param = {
            productId : id,
            number : 1,
            _csrf : product.csrf
        };
      loading=  layer.msg('Adding', {
      icon: 16
      ,shade: 0.01
    });
        $.post("{$urlFavoriteAdd}?id=" + id, param, function(data) {
        layer.close(loading);
        if (data.status > 0) {
          success=  layer.msg('SUCCESS', {
          icon: 16
          ,shade: 0.01
        });
            
           setTimeout(function(){
          layer.close(success);
        }, 500);
                }else{
                    window.location.href="/site/login.html"; 
                }
            }, "json");
}
});
$(".ajaxaddToCart").click(function(){  
    var id = $(this).data('id');
    if(id==-1){
        var num = 0;
        jQuery(this).parent().parent().find("select").each(
            function(){
                if(jQuery(this).val()==0 && num==0){
                    num = 1;
                    jQuery(this).focus();
                }
            }
        );
    }else if(id==0){
        layer.msg('OUT OF STOCK', {
  icon: 16
  ,shade: 0.01
});
    }
    else{


    param = {
        productId : id,
        number : 1,
        _csrf : product.csrf
    };
  loading=  layer.msg('Adding', {
  icon: 16
  ,shade: 0.01
});
    $.post("{$urlCartAdd}?id=" + id, param, function(data) {
        layer.close(loading);
        if (data.status > 0) {
            // $(".addNumber").text(data.userCartSum);
            if($('.MOBILE_cart_click').length == 0){
                $('.addNumber').empty().text(res.userCartSum);
            }else if($('.MOBILE_cart_click').length == 1){
                $('.MOBILE_cart_click').siblings('span').empty().text(res.userCartSum);
            }
  success=  layer.msg('SUCCESS', {
  icon: 16
  ,shade: 0.01
});
    
   setTimeout(function(){
  layer.close(success);
}, 1000);
    // $(".addNumber").html(data.totalnumber);
            if($('.MOBILE_cart_click').length == 0){
                $('.addNumber').empty().text(res.userCartSum);
            }else if($('.MOBILE_cart_click').length == 1){
                $('.MOBILE_cart_click').siblings('span').empty().text(res.userCartSum);
            }
        } else {
                   layer.msg('OUT OF STOCK', {
  icon: 16
  ,shade: 0.01
});
        }
    }, "json");
    }
});

// 购物车弹窗huxu
$('.add_bulk_li').on('click',function(){
    for(var i = 0;i<$('.shoppingcar-add-status').length;i++){
        if($('.shoppingcar-add-status').eq(i).text() == 'Pre-order'){
            $('.child_ids').eq(i).attr({'max':'Pre-order'});
        }else{
            var num = $('.shoppingcar-add-status').eq(i).text();
            if(num.indexOf('Max Qty')!=-1){
                var _num = 7;
                $('.child_ids').eq(i).attr({'max':num.substring(_num,num.length)});
            }
            
        }
    }
    var _width = $(window).width();
    var _height = $(document).height();
    var _Windowheight = $(window).height();
    $('.shopingcar-wrap').css({'position':'fixed','left':_width/2-450+'px','top':_Windowheight/2-300+'px'});
    $('#shoppingcar-zhezhao').fadeIn(200);

});
$('.shoppingcar-close').on('click',function(){
    $('#shoppingcar-zhezhao').fadeOut(200);
});

JS;
$this->registerJs($js);
?>
<?php
$isFavorite = 0;
if (!Yii::$app->user->isGuest) {
    $favorite = \common\models\Favorite::find()->where(['user_id' => Yii::$app->user->id, 'product_id' => $model->id])->one();
    if ($favorite) {
        $isFavorite = 1;
    }
}


