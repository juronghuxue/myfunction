<?php
/**
 * Created by liuchaoxiu.
 * User: Elego Team
 * Date: 2017/6/3
 * Time: 18:56
 */
//echo "pay success!";
$this->registerCssFile('@web/css/pay-success.css', ['depends' => \frontend\assets\AppAsset::className()]);
$public=Yii::getAlias('@public')
?>
<div align="center">
    <div class="go_home">
        <div style="float: left">
            <a href="/">
                <img src="<?php echo $public;?>/img/pay_cart/icon_home.png"><span style="color: #666666">Home ></span>
            </a>
        </div>
        <div style="float: left">
           Complete payment
        </div>
    </div>
    <div class="complete_payment" align="center">
        <div class="peyment_note" style="">
            <img src="<?php echo $public;?>/img/pay_cart/icon_done.png">
            <span style="padding-left: 10px;">View shopping cart</span>
        </div>
        <div>
            <img src="<?php echo $public;?>/img/pay_cart/pic_trigon_white.png">
        </div>
        <div class="peyment_note" style="">
            <img src="<?php echo $public;?>/img/pay_cart/icon_done.png">
            <span style="padding-left: 10px;">Check out</span>
        </div>
        <div>
            <img src="<?php echo $public;?>/img/pay_cart/pic_white_black.png">
        </div>
        <div class="peyment_note" style="background-color: #2b373e;">
            <img src="<?php echo $public;?>/img/pay_cart/icon_step3.png">
            <span style="color: #FFFFFF;padding-left: 6px;">Complete payment</span>
        </div>
    </div>


    <div class="pay_success"  align="left">
        <div class="pay_success_top1" style="display: inline-block;">
            <?php if ($status == 1) {?>
            <!--结算成功-->
            <div style="float: left">
                <img src="<?php echo $public;?>/img/pay_cart/icon_sucess.png">
            </div>
            <div class="pay_notes">
                <div class="pay_note1">Great! You have successfully summit your order!</div>
                <div class="pya_note2">Order time: <span><?=date("m/d/Y H:i:s", $data['created_at']) ?></span></div>
            </div>
            <?php } else {?>
            <!--结算失败-->
            <div style="float: left">
                <img src="<?php echo $public;?>/img/pay_cart/icon_faild.png">
            </div>
            <div class="pay_notes">
                <div class="pay_note1">Sorry! Your payment is failed.</div>
                <div class="pya_note2">Reason: <?php echo Yii::$app->getSession()->getFlash('error'); ?><span>1.未完成支付</span><span>2.网络异常，未获取到付款信息结果</span></div>
            </div>
            <?php } ?>
        </div>
        <div class="order_center">
            <div class="order_left_list">
                <div>Order number:</div>
                <div>Receiver:</div>
                <div>Total amount:</div>
                <div>Payment method:</div>
            </div>
            <div class="order_right_list">
                <div><?=$data['sn'] ?></div>
                <div><?=$data['consignee'] ?></div>
                <div>$<?=$data['amount'] ?></div>
                <div><?=$data['payment_name'] ?></div>
            </div>
        </div>
        <div style="display: inline;border:1px solid #e3e3e5;width: 1060px;"></div>
        <div class="order_btu">
            <div class="order_btu1">
                <a href="<?= Yii::$app->urlManager->createUrl(['order/' . $data['id']]) ?>"><input type="button" value="CHECK ORDER DETAILS"></a></div>
            <div class="order_btu2">
                <a href="/"><input type="button" value="CONTINUE SHOPPING"></a></div>
        </div>
    </div>

    <!---->

</div>
