<?php
$this->title = Yii::t('app', 'Shipments') . Yii::t('app', 'Remind');
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
$this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
$this->registerCssFile('@web/css/comment.css', ['depends' => \frontend\assets\AppAsset::className()]);
$public=Yii::getAlias('@public');
?>

    <style>
        /*td img{
            width: 40px;
            height: 40px;
        }*/
        /*.remind .comment-title {
            height: 170px;
        }
        .remind .comment-title>span{
            font-size: 18px;
            font-weight: bold;
            color: #000;
        }*/
        .ProductReview{
            width:100%;
            height: 160px;
            background: #fff;
            margin-top: 100px;
            margin-top: 20px;
            overflow: hidden;
            padding: 15px 23px;
        }
        .ProductReview .ProductReview_img{
            width: 305px;
            height: 128px;
            float: left;
        }
        .ProductReview .ProductReview{
            padding: 15px 50px 15px 13px;
        }
        .ProductReview .ProductReview_img{
            border-right: 1px solid #d9d9d9;
            padding-right: 5px;
        }
        .ProductReview .ProductReview_img >img{
            float: left;
        }
        .ProductReview .ProductReview_img .ProductReview_title p{
            text-align: center;
            /*display: inline-block;*/
            width: 190px;
            float: right;
        }
        .ProductReview .ProductReview_img .ProductReview_title p:nth-child(1){
            /*overflow: hidden;
            text-overflow:ellipsis;
            white-space: nowrap;*/
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
        }
        .ProductReview .ProductReview_img .ProductReview_title p :nth-child(3){
            margin-top: 100px;
        }
        .ProductReview_status {

        }
        .yellow{color:#fff600;}
        .ProductReview_status-a .product-showimg{
            width: 275px;
            height: 50px;
            margin-top:10px;
            float: right;
        }
        .ProductReview_status-a .product-showimg img{
            width: 55px;
            height: 50px;
            margin-right: 10px;
        }
    </style>
<div class="clearfix" style="height:auto;background:#ffffff;">
    <div class="clearfix" style="width:100%;margin:0 auto;background: #fff;-padding:0 2%;">
        <div class="comment-title" style="width:95%;margin:0 auto;border-bottom: 2px solid #ee3e43;line-height: 56px;color:#404040;">
            <img src="<?=$public?>/img/remind/pinlun.png" alt="" style="width: 18px;height: 18px;">
            <span style="font-size: 14px; font-weight: bold;color:#404040;margin-left:15px">Product Review</span>
        </div>
    </div>
</div>
<?php foreach($models as $itme):?>
    <div class="clearfix" style="width: 100%;background: #fff;margin-top:20px;border:1px solid #cccccc;overflow-x:auto;">
        <div class="clearfix ProductReview" style="width: 95%;min-width:800px;margin:0 auto;">
            <div class="ProductReview_img" style="float: left;width:40%;">
                <div style="float:left;width:30%;height:100%;line-height:128px;">
                    <a href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $itme->product->child ? $itme->product->child->parent->id : $itme->product->id]) ?>">
                        <img src="<?=Yii::$app->params['imgServerAddress']?><?=$itme->product->child ? $itme->product->child->parent->image : $itme->product->image?>" width="90" height="90" alt="">
                    </a>
                </div>
                <div class="ProductReview_title" style="float:left;width:65%;height:100%;">
                    <p style="margin: 0px;line-height:22px;padding-top:20px;font-size:12px;">
                        <a style="color:#666666;" href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $itme['product_id']]) ?>"> <?=$itme->product->name?>
                        </a>
                    </p>
                    <p style="margin-top: 25px"><?=date("d/m/Y",$itme['created_at'])?></p>
                </div>
            </div>
            <div class="ProductReview_status-a" style="float:left;margin-left:20px;height:100%;width:57%;overflow: hidden;">
                <p style="margin: 0px;color: #e67a0e;font-style:italic;height:auto;line-height:22px;word-break:break-all;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;overflow: hidden;width:100%;height:70px"><?=$itme['content']?>
                </p>
                <div class="pro-rating " style="margin-top:30px;float: left;">
                    <?php for($i = 1; $i <= 5; $i++) { if ($i <= $itme['star']) {?>
                        <a href="javascript:;" title="<?= $itme['star'] ?>"><i class="fa fa-star yellow" style="color:fdf500 "></i></a>
                    <?php }else{ ?>
                        <a href="javascript:;" title="<?= $itme['star'] ?>"><i class="fa fa-star-o yellow" style="color:fdf500 "></i></a>
                    <?php }} ?>
                </div>
                <div class="product-showimg" >
                    <?php foreach ($itme->imageList as $image){?>
                        <img src="<?=$image?>" alt="">
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach;?>
<div class="pagination-center pagination-outer" style="padding-top: 20px;padding-bottom: 20px;">
                    <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination, 'nextPageLabel' => '>', 'prevPageLabel' => '<']) ?>
</div>
<script>    
        $('.product-showimg img').on('click',function(){

            if($('.commen_imgBig').length != 0){
                return;
            }else{
                console.log(111);
                var str = $(this).clone();
                str.attr({'onclick':'small(this)'}).addClass('commen_imgBig');
                str.css({'width':$(this).width()+300+'px','height':$(this).height()+300+'px','position':'fixed','left':'900px','top':'300px','border':'3px solid #cccccc','opacity':0});
                $(str).animate({'opacity':1},400);
                $('body').append(str); 
            }
        });
        function small(obj){
            $(obj).remove();
        }
</script>
<?php
$this->registerJs('
var product = {csrf:"' . Yii::$app->request->getCsrfToken() . '"};
');

$js = <<<JS
jQuery(".delProduct").click(function(){
    var productId = $(this).data("id");
    param = {
            productId : productId,
            _csrf : product.csrf
        };
    $.post("/product/del-remind.html", param, function(data) {
        location.reload();
    }, "json");
});
JS;

$this->registerJs($js);

?>