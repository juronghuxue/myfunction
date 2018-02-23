<?php
$this->title = Yii::t('app', 'Product Comment');
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
// $this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
// $this->registerCssFile('@web/css/comment.css', ['depends' => \frontend\assets\AppAsset::className()]);
$this->registerCssFile('@web/css/comment.css', ['depends' => \frontend\assets\AppAsset::className()]);
?>

<div class="trade_mod1 clearfix" style="position: relative;">
    <div class="comment-title">
        <span>Review Order</span>
    </div>
    <div class="comment-area-1 clearfix" style="width:95%;margin:0 auto;">
        <?php foreach ($models as $item) { ?>
            <div class="comment-area-single">
                <p class="single-order-title">
                    <span class="order-number">Order Number: <a href="<?= Yii::$app->urlManager->createUrl(['order/view', 'id' => $item->id]) ?>"> <?=$item->sn ?></a></span>
                    <span class="order-time"><?=date("Y-m-d H:i:s", $item->created_at)?></span>
                </p>
                <div class="container" style="padding:0;width:100%;">
                    <div class="row single-order-view">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 single-order-pic">
                            <div>
                                <?php if(isset($item->orderProducts[0])){?>
                                <a href="<?= Yii::$app->urlManager->createUrl(['order/view', 'id' => $item->id]) ?>"><img style="margin-top:10px;" src="<?=$item->orderProducts[0]->product->child ? $item->orderProducts[0]->product->child->parent->image : $item->orderProducts[0]->product->image ?>" /></a>
                                <p>Total Price $<?=$item->amount ?></p>
                                <?php }?>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 single-order-edit">
                            <div style="padding-top:10px;">
                                <textarea rows="3" class="order-commem" id="commont" maxlength="300"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 single-order-star">
                            <div>
                                <p class="rete-title" style="margin-bottom:0;">Rate Stars</p>
                                <p style="margin-bottom:0;" class="star">
                                    <span data-value="1" class="fa fa-star colorstar"></span>
                                    <span data-value="2" class="fa fa-star colorstar"></span>
                                    <span data-value="3" class="fa fa-star colorstar"></span>
                                    <span data-value="4" class="fa fa-star colorstar"></span>
                                    <span data-value="5" class="fa fa-star colorstar"></span>
                                    <i id="point">5</i>
                                </p>
                                <a href="javascript:;" class="a createComment" data-link="<?= Yii::$app->urlManager->createUrl(['comment/ajax-add', 'id' => $item->id]) ?>">SUMBIT</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>
    <div class="pagination-right pagination-outer" style="position: absolute;right: 20px;">
         <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination, 'nextPageLabel' => '>', 'prevPageLabel' => '<']) ?>
    </div>
</div>
<script>
    $('.order-commem').on('keydown',function(e){
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
        $('.order-commem').on('paste',function(){
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
</script>
<?php
$this->registerJs('
var product = {csrf:"' . Yii::$app->request->getCsrfToken() . '"};
');

$js = <<<JS
jQuery(".addComment").click(function(){
    var link = $(this).data('link');
    var formComment = $(this).parents('tr').next();
    if (formComment.css('display') == 'none') {
        formComment.css('display', 'table-row');
    } else {
        formComment.css('display', 'none');
    }
});
jQuery(".star span").click(function(){
    $(this).parent().children().removeClass('colorstar');
    $(this).addClass('colorstar');
    $(this).prevAll().addClass('colorstar');
    $(this).siblings("i").text($(this).data("value"));
});

jQuery(".createComment").click(function(){
    var link = $(this).data('link');
    var star = $(this).siblings('p:eq(1)').find('i').html();
    var content = $(this).parents().parents().parents().children("div:eq(1)").find("textarea").val();

    if (star < 1 || star > 5) {
        addressShow('Please select product correctly');
        return false;
    }

    if (content.length < 10 ) {
        addressShow('Please type in at least 10 letters.');
        return false;
    }

    $.get(link + '&star=' + star + '&content=' + content, function(data, status) {
        if (status == "success") {
            addressShow("Success. Thank you for your review.<br />30 Points will be added to your account.");
            setTimeout(function(){
                location.reload();
            },1500);
        }
    });
});
function addressShow(html){
        layer.open({
            type: 1,
            title: false //不显示标题栏
            ,closeBtn: true
            ,area: ['340px', '150px']
            ,shade: 0.8
            ,resize: false
            ,content : '<div id="LAY_ONE" class="layui-layer-content"><div><div style="font-size: 16px;width: 340px;height: 34px;background-color: #ee3e43;display: inline-block;"><div style="float:left;color: #FFFFFF;padding-left: 15px;margin-top: 5px;">Notice</div></div><div style="width:340px;font-size:16px;"><div style="color:#333333;width:100%;height:100%;padding:20px;">'+html+'</div></div></div></div>'
        });
    }

    //超字符提示
    jQuery("#commont").keydown(function(){
        var str = $(this).val();
        if (str.length >= 300) {
            addressShow("input max 300!");
            $(this).blur();
            return false;
        }
    })
JS;

$this->registerJs($js);


