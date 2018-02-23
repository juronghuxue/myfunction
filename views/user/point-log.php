<?php
$this->title = Yii::t('app', 'My') . Yii::t('app', 'Point Log');
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
$this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
$this->registerCssFile('@web/css/comment.css', ['depends' => \frontend\assets\AppAsset::className()]);

$public=Yii::getAlias('@public')
?>
<style>
    .mian{width:828px;border:1px solid #e3e3e5 }
    /*.head{height: 30px;padding-top: 10px;margin-left: -15px;}*/
    .img{float: left}
    .my_points{float: left;font-size: 16px;font-weight: bold;margin-left: 15px;}
    .inlink{display: inline-block; font-size: 2px; width: 828px; height: 2px; background: #ee3e43;margin-left: -16px;}

    .howtopoint{display:flex;margin-bottom: 14px;margin-top: 20px;}
    .left_p{float: left;width: 628px;border-right:1px solid #e3e3e5;padding:0 20px;}
    .right_p{float: left;width: 30%;}
    .lin{display: inline-block;font-size: 2px;width: 130px;height: 2px;background: #ee3e43}
    .lin_two{display: inline-block;font-size: 2px;width:100%;height: 2px;background: #e3e3e5}
    .gifts,.coupons{width: 90%;background-color: #ee3e43;border-radius: 2px;height: 36px;line-height:36px;color: #FFFFFF;margin:10px auto;}
    .coupons{background-color: #32b551;}
    .r_head{display: inline-block}
    .r_head div{float: left;width: 265px;height: 36px;font-size: 14px;
        color: #404040;border: 1px solid #e3e3e5;background-color: #EEEEF1;padding-top: 5px;}
    .r_center{display: inline-block;margin-top: -5px;}
    .r_center div{float: left;width: 265px;height: 26px;font-size: 13px;
        color: #666666;border: 1px solid #e3e3e5;background-color: #FFFFFF;}
    .r_top{min-width: 800px;margin-bottom: 12px;}
    .r_top1{float: left;width: 745px;font-size: 16px;font-weight: bold}
    .r_top2{float: left;display: inline-block}
    .r_top2 div{float: left;}

    .first_d{font-size: 16px;font-weight: bold;color: #ee3e43;margin-bottom: -20px;}
    .left_p div{font-size: 14px;line-height: 30px;}
    .left_p div span{color: #ee3e43}
    .right_p{font-size: 16px;text-align: center;padding-left: 15px;}
    td img {
        width: 40px;
        height: 40px;
    }
    .records tr td{text-align:center;}
    .records tr th{background:#d1d1d1;}
    @media screen and (max-width: 768px) {
        .howtopoint{display:block;}
        .left_p{width:100%;clear:both;border-right:none;}
        .right_p{width:100%;}
    }
</style>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #FFFFFF;padding-bottom: 20px;">
        <div style="border-bottom: 1px solid #e3e3e5;background:#ffffff;position: relative;">
            <div class="head" style="width:95%;margin:0 auto;height:56px;line-height:56px;font-weight:bold;font-size:16px;font-size:14px;border-bottom:2px solid red;color:#404040;">
            <!-- <div class="img"> -->
                <img src="<?php echo $public;?>/img/my_account/jifen .png">&nbsp;&nbsp;&nbsp;
            <!-- </div> -->
            <!-- <div class="my_points"> -->
                My Points
            <!-- </div> -->
            </div>
            <div class="clearfix" style="width:100%;">
                <div class="howtopoint" style="">
                    <div class="left_p">
                        <div class="first_d">How to win point ?</div>
                        <div class="lin"></div>
                        <div style="margin-bottom: 15px">Members can win points by logging in, reviewing product, placing order or reviewing order on Elegomall website and app.The details are:</div>
                        <div><span>a</span>. Log in: 5 points for every day logging.</div>
                        <div><span>b</span>. Review product: 20 points for each approved review of any product. 40 points for each approved order review with picture.</div>
                        <div><span>c</span>. Place order: points equal to the rounded order amount.</div>
                        <div><span>d</span>. Review order: 30 points for each approved review of products in your last order.</div>
                        <div style="padding-left: 15px;display: none;">60 points for each approved order review with picture.</div>
                    </div>
                    <div class="right_p">
                        <div style="font-weight: bold;">Total points:</div>
                        <div style="font-weight: bold;font-size: 22px;color: #ee3e43;margin-top: 15px;"><?= Yii::$app->user->identity->point ?></div>
                        <div class="lin_two"></div>
                        <div class="gifts"><a style="display:block;color:#ffffff;" href="<?= Yii::$app->urlManager->createUrl(['user/redeem']) ?>">Redeem Gifts</a></div>
                        <div class="coupons">
                            <a style="display:block;color:#ffffff;" href="<?= Yii::$app->urlManager->createUrl(['user/redeem-coupons']) ?>">Redeem Coupons</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="records"  style="width:100%;margin-top: 32px;overflow-x:auto;background:#ffffff;">
            <?php \yii\widgets\Pjax::begin(['id' => 'point_log']) ?>
            <table class="table table-bordered" style="min-width:800px;width:100%;margin-bottom: 10px;">
                <tr style="background:#edecf1;">
                    <th style="vertical-align:middle;background:#edecf1;">Time</th>
                    <th style="vertical-align:middle;background:#edecf1;">Points Change</th>
                    <th style="vertical-align:middle;background:#edecf1;">Source/Purpose</th>
                </tr>
                <tbody>
                    <?php foreach ($models as $item) { ?>
                    <tr>
                        <td><?= Yii::$app->formatter->asDatetime($item->created_at) ?></td>
                        <td><?= $item->point > 0 ? ($item->type == \common\models\PointLog::POINT_TYPE_EXCHANGE ? '-' : '+') . $item->point : $item->point ?></td>
                        <td><?= \common\models\PointLog::getTypeLabels($item->type) ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
         </div>
         <?php \yii\widgets\Pjax::end() ?>
        <!-- 分页 -->
            <div class="pagination-center pagination-outer" style="padding-top: 10px;">
                <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination, 'nextPageLabel' => '>', 'prevPageLabel' => '<']) ?>
            </div>
    </div>
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
jQuery(".commstar a").click(function(){
    jQuery(".commstar a").removeClass('active');
    $(this).addClass('active');
    $(this).parents().next().val($(this).data('value'));
});

jQuery(".commentContent").click(function(){
    if ($(this).val() == '商品是否给力？快分享你的购买心得吧~')
        $(this).val('');
});

jQuery(".createComment").click(function(){
    var link = $(this).data('link');
    var star = $(this).parents('form').find('.commentStar').val();
    var content = $(this).parents('form').find('.commentContent').val();
    if (star < 1 || star > 5) {
        alert("请对该商品评分");
        return false;
    }

    if (content.length < 10 ) {
        alert("心得最少10个字符，请补充");
        return false;
    }

    $.get(link + '&star=' + star + '&content=' + content, function(data, status) {
        if (status == "success") {
            alert("评价发表成功，审核通过后积分发送到您的账户中，感谢您的评价");
            location.reload()
        }
    });
});
JS;

$this->registerJs($js);

?>