<?php
use common\models\Region;

$this->title = Yii::t('app', 'My') . Yii::t('app', 'Order');
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
$this->registerCssFile('@web/css/order-view.css', ['depends' => \frontend\assets\AppAsset::className()]);
$totalNumber = $totalPrice = 0;
?>
    <style>
        table tbody tr td{
            text-align: center;
        }
        .Items_Order  .Items_inner{
            margin-right: 20px;
            margin-left: 20px;
            border-bottom-width: 2px;
            border-bottom-style: solid;
            border-bottom-color: #ee3e43;
            padding-left: 10px;
            padding-top: 40px;
            padding-bottom: 20px;

        }
        .Items_Order  .Items_inner >span{
            color: #ee3e43;
            font-weight: bold;
            font-size: 18px;
            /*float: left;*/
        }
        /*.table-bordered>tbody>tr>.print-infor{border-right:none;}
        .table-bordered>tbody>tr>.print-infor{border-right:none;}*/
    </style>
<div id="main col-lg-12 col-md-12 col-sm-12">
    <div class="Detail_inf">
        <div class="Detail_inf_shang">
            <div class="">
                <span>Order #<?= $model->sn ?> - <?= \common\models\Order::getStatusLabels($model->status) ?><?php if ($model->status == \common\models\Order::PAYMENT_STATUS_UNPAID || $model->status == \common\models\Order::PAYMENT_METHOD_COD) { ?><!--<a id="order-cancel" href="javascript:void(0);" style="margin-left:18px;" data-link="<?/*= Yii::$app->urlManager->createUrl(['order/ajax-status', 'id' => $model->id, 'status' => \common\models\Order::STATUS_CANCEL]) */?>">取消订单</a>--><?php } ?></span>
                <span>Order Date:<?= Yii::$app->formatter->asDatetime($model->created_at) ?></span>
            </div>
        </div>
        <div class="Invoice_Reorder">
            <div class="print">
                <a target="_blank" href="<?= Yii::$app->urlManager->createUrl(['order/invoice', 'id' => $model->id]) ?>">
                    <img src="/theme/new/img/Order/order-1.png" alt="">
                    <span>Print Invoice</span>
                </a>
            </div>
            <div class="Reorder">
                <a href="javascript:;" data-link="<?= Yii::$app->urlManager->createUrl(['order/reorder', 'id' => $model->id]) ?>">
                    <img src="/theme/new/img/Order/order-2.png" alt="">
                    <span>Reorder</span>
                </a>
            </div>
        </div>
        <div class="myTable"  style="overflow-x:auto;margin-top: 20px;width: 100%;">
            <table class="table table-bordered"  style="min-width: 795px;max-width:100%;margin: 0 auto">
                <thead>
                <tr>
                    <th>Shipping Address</th>
                    <th>Shipping Method</th>
                    <th>Payment Method</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <p><?= $model->consignee ?></p>
                        <p><?= $model->address ?></p>
                        <p><?= $model->city ?></p>
                        <p><?= $model->province ?></p>
                        <p><?= $model->country0->name ?></p>
                        <p><?= $model->company ?></p>
                        <p>zipcode:<?= $model->zipcode ?></p>
                        <p>Phone:<?= $model->phone ?></p>
                    </td>
                    <td>
                        <p><?= $model->shipment_name ?></p>
                        <!-- <p>$<?= $model->shipment_fee ?></p> -->
                        <!-- <p><?= Yii::$app->formatter->asDatetime($model->shipped_at) ?></p> -->
                        <!-- <p><?= $model->shipment_id ?></p> -->
                    </td>
                    <td>
                        <p><?= $model->payment_name ?></p>
                        <!--<p><?= $model->amount ?></p>-->
                        <p><?=isset($model->payment->formatConfig['payInfo']) ? $model->payment->formatConfig['payInfo'] : '';?></p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="Items_Order">
            <div class="Items_inner">
                <span>Items Ordered</span>
            </div>
            <div class="myTable" style="overflow-x:auto;margin-top: 20px;width: 100%;margin-left:5px;margin-right: 5px">
                <?php \yii\widgets\Pjax::begin(['id' => 'product']) ?>
                <table class="table table-bordered" style="min-width: 795px;max-width:100%;margin: 0 auto">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Attribute</th>
                        <th>SKU</th>
                        <th>Price</th>
                        <th>QTY</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product) {?>
                    <tr class="Smok_product" >
                        <td><a style="color:#666666;" target="_blank" href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $product->parentProduct ? $product->parentProduct->parent->seourl : $product->product->seourl]) ?>"> <?= $product->name ?></a></td>
                        <td><?=$product->product->child ? $product->product->child->attr : ''?></td>
                        <td><?= $product->sku ?></td>
                        <td>$<?= $product->price ?></em></td>
                        <td><?= $product->number ?></td>
                        <td>$<?= $product->price * $product->number ?></td>
                    </tr>
                        <?php $totalNumber += $product->number; $totalPrice += $product->price * $product->number; } ?>
                    <tr>
                        <!-- <td colspan="5" class="print-infor" style="border-right:none;">
                            <p style="margin:0;line-height:30px;text-align:right;">345</p>
                            <p style="margin:0;line-height:30px;text-align:right;">Shipping & Handling</p>
                            <p style="margin:0;line-height:30px;text-align:right;">Discount</p>
                            <p style="margin:0;line-height:30px;text-align:right;color:#ee3e43;font-weight:bold;">Grand Total</p>
                        </td>
                        <td>
                            <p style="margin:0;line-height:30px;text-align:right;">54r34</p>
                            <p style="margin:0;line-height:30px;text-align:right;">345345</p>
                            <p style="margin:0;line-height:30px;text-align:right;">345</p>
                            <p style="margin:0;line-height:30px;text-align:right;color:#ee3e43;font-weight:bold;">43534</p>
                        </td> -->
                        <td colspan="6">
                            <div class="clearfix" style="width:100%;height:auto;margin:0 auto;">
                                <div style="float:right;height:100%;width:100px;padding-left:15px;">
                                    <p style="margin:0;line-height:30px;text-align:left;">$<?=($model->amount - $model->shipment_fee - $model->tax_price + $model->discount)?></p>
                                    <?php if($model->tax_price >0 ):?>
                                    <p style="margin:0;line-height:30px;text-align:left;">$<?=$model->tax_price?></p>
                                    <?php endif;?>
                                    <p style="margin:0;line-height:30px;text-align:left;">$<?=$model->shipment_fee?></p>
                                    <?php if ($model->discount > 0){?><p style="margin:0;line-height:30px;text-align:left;">$<?=$model->discount?></p><?php } ?>
                                    <p style="margin:0;line-height:30px;text-align:left;color:#ee3e43;font-weight:bold;">$<?=$model->amount?></p>
                                </div>
                                <div style="float:right;height:100%;width:200px;">
                                    <p style="margin:0;line-height:30px;text-align:right;">Subtotal</p>
                                    <?php if($model->tax_price >0 ):?>
                                    <p style="margin:0;line-height:30px;text-align:right;">Tax</p>
                                    <?php endif;?>
                                    <p style="margin:0;line-height:30px;text-align:right;">Shipping & Handling</p>
                                    <?php if ($model->discount > 0){?><p style="margin:0;line-height:30px;text-align:right;">Discount</p><?php } ?>
                                    <p style="margin:0;line-height:30px;text-align:right;color:#ee3e43;font-weight:bold;">Grand Total</p>
                                </div>
                            </div> 
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="6" style="padding:20px;">
                            <h3 style="text-align:left;font-size:14px;color:#404040;font-weight:bold;">Order Notes</h3>
                            <p style="text-align:left;"><?=$model->remark?></p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- 分页 -->
                <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination]) ?>
                <?php \yii\widgets\Pjax::end() ?>
                <!-- <div style="width:90%;height:120px;margin:0 auto;">
                    <div style="float:right;height:100%;width:100px;">
                        <p style="margin:0;line-height:30px;text-align:right;">$<?=$totalPrice?></p>
                        <p style="margin:0;line-height:30px;text-align:right;">$<?=$model->shipment_fee?></p>
                        <?php if ($model->discount > 0){?><p style="margin:0;line-height:30px;text-align:right;">$<?=$model->discount?></p><?php } ?>
                        <p style="margin:0;line-height:30px;text-align:right;color:#ee3e43;font-weight:bold;">$<?=$model->amount?></p>
                    </div>
                    <div style="float:right;height:100%;width:200px;">
                        <p style="margin:0;line-height:30px;text-align:right;">Subtotal</p>
                        <p style="margin:0;line-height:30px;text-align:right;">Shipping & Handling</p>
                        <?php if ($model->discount > 0){?><p style="margin:0;line-height:30px;text-align:right;">Discount</p><?php } ?>
                        <p style="margin:0;line-height:30px;text-align:right;color:#ee3e43;font-weight:bold;">Grand Total</p>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
</div>
    </div></div>
<?php
$js = <<<JS
jQuery("#order-cancel").click(function(){
    var link = $(this).data('link');
    $.get(link, function(data, status) {
        if (status == "success") {
            // location.reload()
        }
    });
});
jQuery('.Reorder').click(function(){
    var link = jQuery(this).find('a').data("link");
    jQuery.get(link,{},function(data){
        console.log(data);
        if (data.status == 1) {
            layer.msg('Items added to cart.',{icon:1,time:1000});
        } else {
            layer.msg(data.message,{icon:0,time:1000});
        }
    }, 'json');
});
JS;

$this->registerJs($js);
