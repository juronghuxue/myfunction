<?php
use common\models\Region;
$this->title = Yii::t('app', 'My') . Yii::t('app', 'Address');
$this->params['breadcrumbs'][] = $this->title;

$this->title = 'Addresses';
$this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
?>
<style>
     .redeem_table tr td{text-align:center;}
     .redeem_table tr th{background:#edecf1;}
     .header_word a:hover{border-bottom:none;}
</style>
    <!-- <div class=" col-lg-12 col-md-12 col-sm-12"> -->
        <div class="trade_mod" style="height:700px;">
            <div class="my_point">
                <p class="order-title" style="width: 95%;margin: 0 auto;font-size:14px;color:#404040;font-weight: bold;">
                    <img src="/theme/new/img/order.jpg" alt="">
                    My Gifts
                    <span class="coupon-number" style="float: right;color: #4c4c4c;">
                           Available Points:<?=Yii::$app->user->identity->point?>
                    </span>
                </p>
                <div class="header_word">
                    <a href="/user/gifts.html" style="border-bottom:2px solid red"><span>My Gifts </span></a>|
                    <a href="/user/redeem.html"><span>Redeem</span></a>
                </div>
                <div class="redeem_table clearfix;" style=" width: 95%;margin:20px auto;overflow-x:auto;">
                        <!-- <?php \yii\widgets\Pjax::begin(['id' => 'gifts']) ?> -->
                        <table class="table table-bordered" style="min-width:800px;width:100%;">
                            <tr>
                                <th >Gifts</th>
                                <th >QTY</th>
                                <th >Used points</th>
                                <th >Create Time</th>
                                <th >Status</th>
                                <th >Tracking Shiping</th>
                            </tr>
                            <tbody>
                                <?php foreach($models as $item):?>
                                    <tr>

                                        <td>
                                        <?php if(empty($item->child)):?>
                                            <a style="display:block;color:#666666;" href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $item->product->seourl]) ?>" target="_blank"><?=$item->gift_name?></a>
                                        <?php else:?>
                                            <a style="display:block;color:#666666;" href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $item->child->parent->seourl]) ?>" target="_blank"><?=$item->gift_name?></a>
                                        <?php endif;?>
                                        </td>
                                        <td><?=$item->number?></td>
                                        <td><?=$item->points?></td>
                                        <td><?= Yii::$app->formatter->asDatetime($item->created_at) ?></td>
                                        <?php if($item->status==1):?>
                                            <td>Processing</td>
                                        <?php elseif($item->status==2):?>
                                            <td>Shipping</td>
                                        <?php else:?>
                                            <td>Complete</td>
                                        <?php endif;?>
                                        <td><a style="color: #cacacc;" href="javascript:;" class="track" id="track-<?= $item->logistics_number ?>" data-id="<?= $item->logistics_number ?>"><?= $item->logistics_number ? $item->logistics_number : 'No Track' ?></a></td>
                                    </tr>
                                <?php endforeach;?>
                                <!-- <tr><td>EM 5th Anniversary 30% Coupon</td><td>1</td><td>10000</td><td>2017-11-02 08:34:99</td><td>complete</td><td>Track</td></tr>
                                <tr><td>EM 5th Anniversary 30% Coupon</td><td>1</td><td>10000</td><td>2017-11-02 08:34:99</td><td>complete</td><td>Track</td></tr>
                                <tr><td>EM 5th Anniversary 30% Coupon</td><td>1</td><td>10000</td><td>2017-11-02 08:34:99</td><td>complete</td><td>Track</td></tr>
                                <tr><td>EM 5th Anniversary 30% Coupon</td><td>1</td><td>10000</td><td>2017-11-02 08:34:99</td><td>complete</td><td>Track</td></tr>
                                <tr><td>EM 5th Anniversary 30% Coupon</td><td>1</td><td>10000</td><td>2017-11-02 08:34:99</td><td>complete</td><td>Track</td></tr>
                                <tr><td>EM 5th Anniversary 30% Coupon</td><td>1</td><td>10000</td><td>2017-11-02 08:34:99</td><td>complete</td><td>Track</td></tr>
                                <tr><td>EM 5th Anniversary 30% Coupon</td><td>1</td><td>10000</td><td>2017-11-02 08:34:99</td><td>complete</td><td>Track</td></tr>
                                <tr><td>EM 5th Anniversary 30% Coupon</td><td>1</td><td>10000</td><td>2017-11-02 08:34:99</td><td>complete</td><td>Track</td></tr> -->
                            </tbody>
                        </table>
                        <div class="pagination-center pagination-outer" style="position: absolute;right: 20px;">
                            <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination, 'nextPageLabel' => '>', 'prevPageLabel' => '<']) ?>
                        </div>
                        <!-- <?php \yii\widgets\Pjax::end() ?> -->
                    </div>
                    
                <!-- <ul class="pagination" style="margin-left: 35%">
                    <li><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li class="disabled"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul> -->
            </div>
        </div>
    <!-- </div> -->
    <script type="text/javascript" src="//www.17track.net/externalcall.js"></script>
<?php
$this->registerJs('
var product = {csrf:"' . Yii::$app->request->getCsrfToken() . '"};
');

$js = <<<JS
jQuery(".delete").click(function(){
    var message = $(this).data('confirm');
    if (message !== undefined) {
        if (confirm(message)) {
            $.get($(this).href, function(data, status) {
                if (status == "success") {
                    location.reload()
                }
            });
        }
    }
});

jQuery(document).ready(function() {
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
})
jQuery(".default").click(function(){
    var link = $(this).data('link');
    $.get(link, function(data, status) {
        if (status == "success") {
            location.reload()
        }
    });
});

jQuery(".track").each(function(){
            var sn = $(this).data("id");
            if (sn) {
                YQV5.trackSingleF1({
                    //必须，指定悬浮位置的元素ID。
                    YQ_ElementId:"track-" + sn,
                    //可选，指定查询结果宽度，最小宽度为600px，默认撑满容器。
                    YQ_Width:800,
                    //可选，指定查询结果高度，最大高度为800px，默认撑满容器。
                    YQ_Height:400,
                    //可选，指定运输商，默认为自动识别。
                    YQ_Fc:"0",
                    //可选，指定UI语言，默认根据浏览器自动识别。
                    YQ_Lang:"en",
                    //必须，指定要查询的单号。
                    YQ_Num:sn
                });
            }
        });
JS;

$this->registerJs($js);
