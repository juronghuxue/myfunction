<?php
$this->title = Yii::t('app', 'Shipments') . Yii::t('app', 'Remind');
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
$this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
$this->registerCssFile('@web/css/comment.css', ['depends' => \frontend\assets\AppAsset::className()]);
$public=Yii::getAlias('@public');
?>

<style>
td img{
    width: 40px;
    height: 40px;
}
.remind .comment-title {
    height: 170px;
}
.remind .comment-title>span{
    font-size: 18px;
    font-weight: bold;
    color: #000;
}
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
    overflow: hidden;
    text-overflow:ellipsis;
    white-space: nowrap;
}
.ProductReview .ProductReview_img .ProductReview_title p :nth-child(3){
    margin-top: 100px;
}
.ProductReview_status {
    
 }
</style>
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="width: 100%;background: #fff">
    <div class="col-lg-9 col-md-9 col-sm-12" style="width: 100%;">
        <div>
            <div class="comment-title" style="border-bottom: 2px solid #ee3e43;height: 70px;line-height: 70px">
                <img src="<?=$public?>/img/remind/pinlun.png" alt="" style="width: 18px;height: 18px;">
                <span style="font-size: 18px; font-weight: bold;color: #000;margin-left:15px">Review Order</span>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12"">
    <div style="width: 100%">
        <div class="ProductReview" style="width: 856px;overflow-x: auto">
            <div class="ProductReview_img">
                <img src="/theme/new/img/remind/emlogo.png" alt="">
                <div class="ProductReview_title">
                    <p style="margin: 0px">Smok Allen BABY - AL85 Klt-</p>
                    <p style="margin: 0px">2.0ml</p>
                    <p style="margin-top: 25px">5/7/2017</p>
                </div>
            </div>
            <div class="ProductReview_status" >
                <p style="margin: 0px;color: #e67a0e;padding-left: 321px">Serious and responsible work, prudence, a strong sense of collective, a group spirit of collaboration;</p>
                <p style="margin: 0px;color: #e67a0e;padding-left: 321px">A strong practical manipulative ability, self-learning ability and organizational capacity; </p>
                <div class="pro-rating " style="padding-left: 321px;margin-top:12px">
                    <a href="#" title="5.00"><i class="fa fa-star" style="color:fdf500 "></i></a>
                    <a href="#" title="5.00"><i class="fa fa-star" style="color:fdf500 "></i></a>
                    <a href="#" title="5.00"><i class="fa fa-star" style="color:fdf500 "></i></a>
                    <a href="#" title="5.00"><i class="fa fa-star" style="color:fdf500 "></i></a>
                    <a href="#" title="5.00"><i class="fa fa-star" style="color:fdf500 "></i></a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12"">
    <div style="width: 100%">
        <div class="ProductReview" style="width: 856px;overflow-x: auto">
            <div class="ProductReview_img">
                <img src="/theme/new/img/remind/emlogo.png" alt="">
                <div class="ProductReview_title">
                    <p style="margin: 0px">Smok Allen BABY - AL85 Klt-</p>
                    <p style="margin: 0px">2.0ml</p>
                    <p style="margin-top: 25px">5/7/2017</p>
                </div>
            </div>
            <div class="ProductReview_status" >
                <p style="margin: 0px;color: #e67a0e;padding-left: 321px">Serious and responsible work, prudence, a strong sense of collective, a group spirit of collaboration;</p>
                <p style="margin: 0px;color: #e67a0e;padding-left: 321px">A strong practical manipulative ability, self-learning ability and organizational capacity; </p>
                <div class="pro-rating " style="padding-left: 321px;margin-top:12px">
                    <a href="#" title="5.00"><i class="fa fa-star" style="color:fdf500 "></i></a>
                    <a href="#" title="5.00"><i class="fa fa-star" style="color:fdf500 "></i></a>
                    <a href="#" title="5.00"><i class="fa fa-star" style="color:fdf500 "></i></a>
                    <a href="#" title="5.00"><i class="fa fa-star" style="color:fdf500 "></i></a>
                    <a href="#" title="5.00"><i class="fa fa-star" style="color:fdf500 "></i></a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12"">
    <div style="width: 100%">
        <div class="ProductReview" style="width: 856px;overflow-x: auto">
            <div class="ProductReview_img">
                <img src="/theme/new/img/remind/emlogo.png" alt="">
                <div class="ProductReview_title">
                    <p style="margin: 0px">Smok Allen BABY - AL85 Klt-</p>
                    <p style="margin: 0px">2.0ml</p>
                    <p style="margin-top: 25px">5/7/2017</p>
                </div>
            </div>
            <div class="ProductReview_status" >
                <p style="margin: 0px;color: #e67a0e;padding-left: 321px">Serious and responsible work, prudence, a strong sense of collective, a group spirit of collaboration;</p>
                <p style="margin: 0px;color: #e67a0e;padding-left: 321px">A strong practical manipulative ability, self-learning ability and organizational capacity; </p>
                <div class="pro-rating " style="padding-left: 321px;margin-top:12px">
                    <a href="#" title="5.00"><i class="fa fa-star" style="color:fdf500 "></i></a>
                    <a href="#" title="5.00"><i class="fa fa-star" style="color:fdf500 "></i></a>
                    <a href="#" title="5.00"><i class="fa fa-star" style="color:fdf500 "></i></a>
                    <a href="#" title="5.00"><i class="fa fa-star" style="color:fdf500 "></i></a>
                    <a href="#" title="5.00"><i class="fa fa-star" style="color:fdf500 "></i></a>
                </div>
            </div>
        </div>
    </div>
    </div>
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