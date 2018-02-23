<?php
/* @var $this yii\web\View */
$this->title = Yii::t('app', 'My'). '&nbsp&nbsp'. Yii::t('app', 'Order');
$this->params['breadcrumbs'][] = $this->title;
use common\models\Order;
?>
<style>
    /*td{white-space:nowrap;}*/
</style>
    <div class="clearfix trade_mod" style="background:#ffffff;height:826px;position: relative;">
        <div class="my_point" style="width: 100%;height:auto;padding-bottom:20px;">
            <p class="order-title-1" style="width: 95%;margin: 0 auto;font-size:14px;font-weight:bold;height:56px;line-height:56px;color:#404040;border-bottom:2px solid red;">
                <img src="/theme/new/img/order.jpg" alt="">&nbsp;&nbsp;&nbsp;
                <?= $this->title ?>
            </p>
            <div class="trade_sort">
                <div class="cle_float">
                    <div class="col-xs-2 col-md-2 col-sm-2 col-lg-2 col-lg-offset-1"><a href="<?= Yii::$app->urlManager->createUrl(['order/index']) ?>" class="out-color <?php if (!isset($_GET['status'])) echo "markhas";?>">All Orders</a></div>
                    <div class="col-xs-2 col-md-2 col-sm-2 col-lg-2"><a href="<?= Yii::$app->urlManager->createUrl(['order/index', 'status' => \common\models\Order::PAYMENT_STATUS_UNPAID]) ?>" class="out-color <?php if (isset($_GET['status']) && $_GET['status'] == \common\models\Order::PAYMENT_STATUS_UNPAID) echo "markhas";?>" >Unpaid Order</a></div>
                    <div class="col-xs-2 col-md-2 col-sm-2 col-lg-2"><a href="<?= Yii::$app->urlManager->createUrl(['order/index', 'status' => \common\models\Order::SHIPMENT_STATUS_SHIPPED]) ?>" class="out-color <?php if (isset($_GET['status']) && $_GET['status'] == \common\models\Order::SHIPMENT_STATUS_SHIPPED) echo "markhas";?>">On Shipping</a></div>
                    <div class="col-xs-2 col-md-2 col-sm-2 col-lg-2"><a href="<?= Yii::$app->urlManager->createUrl(['order/index', 'status' => \common\models\Order::SHIPMENT_STATUS_RECEIVED]) ?>" class="out-color <?php if (isset($_GET['status']) && $_GET['status'] == \common\models\Order::SHIPMENT_STATUS_RECEIVED) echo "markhas";?>">Completed</a></div>
                    <div class="col-xs-4 col-md-4 col-sm-2 col-lg-2"><a href="<?= Yii::$app->urlManager->createUrl(['order/index', 'status' => \common\models\Order::STATUS_CANCEL]) ?>" class="out-color <?php if (isset($_GET['status']) && $_GET['status'] == \common\models\Order::STATUS_CANCEL) echo "markhas";?>">Cancelled</a></div>
                </div>
            </div>
                <div class="clearfix order" style="width:95%;margin:0 auto;">
                    <table class="table table-bordered" style="margin: 0 auto;width:100%;">
                        <thead>
                        <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <!-- <th>Ship To</th> -->
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tracking Number</th>
                            <th colspan="3">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($orders as $item) { ?>
                        <tr>
                            <td><a style="color: #404040" href="<?= Yii::$app->urlManager->createUrl(['order/view', 'id' => $item->id]) ?>" target="_self"><?= $item->sn ?></a></td>
                            <td><?= Yii::$app->formatter->asDatetime($item->created_at) ?></td>
                            <!-- <td><?= $item->consignee ?></td> -->
                            <td>$<?= $item->amount ?></td>
                            <td><?= Order::getStatusLabels($item->status) ?></td>
                            <td style="text-align:center;"><a style="color: #cacacc;text-align:center;" href="javascript:;" class="track" id="track-<?= $item->shipment_track ?>" data-id="<?= $item->shipment_track ?>"><?= $item->shipment_track ? $item->shipment_track : 'No Track' ?></a></td>
                            <td><a style="color: #63cccb" href="<?= Yii::$app->urlManager->createUrl(['order/view', 'id' => $item->id]) ?>" target="_self">View</a></td>
                            <!-- <td><a style="color: #cacacc;" href="javascript:;" class="track" id="track-<?= $item->shipment_track ?>" data-id="<?= $item->shipment_track ?>"><?= $item->shipment_track ? $item->shipment_track : 'No Track' ?></a></td> -->
                            <td>
<!--                                <a style="color: #90c1a4;" target="_blank" href="<?/*= Yii::$app->urlManager->createUrl(['order/print', 'id' => $item->id]) */?>">Print</a>
-->                                <a style="color: #90c1a4;" target="_blank" href="<?= Yii::$app->urlManager->createUrl(['order/invoice', 'id' => $item->id]) ?>">Print invoice</a>
                            </td>
                            <td><a style="color: #55729a;" href="javascript:;" class="reorder" data-link="<?= Yii::$app->urlManager->createUrl(['order/reorder', 'id' => $item->id]) ?>">Reorder</a></td>
                        </tr>
                         <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="pagination-center pagination-outer">
                    <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination, 'nextPageLabel' => '>', 'prevPageLabel' => '<']) ?>
                </div>
        </div>
    </div>
    <script type="text/javascript" src="//www.17track.net/externalcall.js"></script>
    <script>
        $(".track").each(function(){
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

        $(function(){
            //reorder 再订购
            $(".reorder").click(function(){
                var link = $(this).data("link");
                $.get(link,{},function(data){
                    if (data.status == 1) {
                        layer.msg('Items added to cart.',{icon:1,time:1000});
                    } else {
                        layer.msg(data.message,{icon:0,time:1000});
                    }
                }, 'json');
            })
        })
    </script>
<?php
$csrf = Yii::$app->request->getCsrfToken();
$urlAddToCart = Yii::$app->urlManager->createUrl(['cart/add-to-cart']);
$urlCartAdd = Yii::$app->urlManager->createUrl(['cart/ajax-add']);
$js = <<<JS
$('.cle_float>div').on('click',function(){
    $(this).parent('.cle_float').find('div').removeClass('markhas').addClass('markhas');
});
jQuery("#search_btn").click(function(){
    if (jQuery("#sn").val()) {
        location.href = '?sn=' + jQuery("#sn").val();
    }
});
jQuery("#selectStatus").change(function(){
    location.href = '?status=' + jQuery("#selectStatus").val();
});
jQuery(".order-cancel").click(function(){
    var link = $(this).data('link');
    $.get(link, function(data, status) {
        if (status == "success") {
            location.reload()
        }
    });
});

jQuery(".order-delete").click(function(){
    var link = $(this).data('link');
    $.get(link, function(data, status) {
        if (status == "success") {
            alert('成功删除订单');
            location.reload()
        }
    });
});
jQuery(".buy-again").click(function(){
    var orderId = $(this).data('id');
    var csrf = "{$csrf}";
    var urlCartAdd = "{$urlCartAdd}";
    $.ajax({
        type: "post",
        url: "/order/get-order-product.html",
        data: {"orderId":orderId,"_csrf":csrf},
        dataType: "json",
        success: function(data){
            if (data.success  == 1){
                var num = 0;
                var dataLen =data.product.length 
                for(var i=0;i<dataLen;i++){
                    param = {
                        productId : data.product[i].product_id,
                        number : data.product[i].number,
                        _csrf : csrf
                    };
                    $.post(urlCartAdd, param, function(data) {
                        if(data.status>0){
                            num = num+1;
                        }else{

                        }
                    }, "json");
                }
                setTimeout(function href(){
                    if(num==dataLen){
                        location.href = "{$urlAddToCart}?id=" + data.product[data.product.length-1].product_id;  
                    }else{
                        alert("部分商品已经缺货具体请看购物车");
                        location.href = "{$urlAddToCart}?id=" + data.product[data.product.length-1].product_id;
                    }
                },500);
            }
        }
    });
});

JS;

$this->registerJs($js);

