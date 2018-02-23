<?php
use common\models\Region;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
$this->registerCssFile('@web/css/pay.css', ['depends' => \frontend\assets\AppAsset::className()]);
$query = new \yii\db\Query();
$result = $query->select('sum(number) as number')->from('order_product')->where(['order_id' => $model->id])->createCommand()->queryOne();
$totalNumber = $result['number'];
?>

<div id="main">
    <!-- 订单信息 -->
    <div class="trade-info">
        <h4><?= Yii::$app->user->identity->username ?>，订单已成功提交，请付款！<span class="gray">24小时内未付款，我们将关闭交易 &gt;_&lt;</span></h4>
        <div class="trade-total"> <b>需支付：</b>￥<strong id="pay-total"><?= $model->amount ?></strong> <span class="gray">完成交易可获得<span><?= intval($model->amount) ?></span>商城积分</span> </div>
        <div class="trade-intro"> 您的订单号：<?= $model->sn ?> <a id="trade-showbtn" class="trade-showbtn" href="javascript:;"><i></i>查看订单详情</a>
            <div class="trade-detail">
                <table>
                    <tbody>
                    <tr>
                        <td class="tl">购买商品：</td>
                        <td><?= $totalNumber ?> 件&nbsp;&nbsp;&nbsp;&nbsp;应付款：¥ <em><?= $model->amount ?></em></td>
                    </tr>
                    <tr>
                        <td class="tl">购买时间：</td>
                        <td><?= Yii::$app->formatter->asDatetime($model->created_at) ?></td>
                    </tr>
                    <tr>
                        <td class="tl">收货地址：</td>
                         <td> <?= $model->country ? $model->country : '' ?> <?= $model->province ? $model->province : '' ?> <?= $model->city ? $model->city : '' ?> <?= $model->district ? $model->district : '' ?>&nbsp;&nbsp;<?= $model->address ?>&nbsp;（<?= $model->mobile ?>）
                            <p><a class="graybtn" target="_blank" href="<?= Yii::$app->urlManager->createUrl(['/order']) ?>">进入我的订单</a></p></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="pay-box" class="pay-box cle">
        <dl class="platform">
            <dt><b>平台支付</b>支持所有银行卡或信用卡，更迅速、安全</dt>
            <dd>
                <ul class="methods_info">
                    <?php foreach($payments as $payment) { ?>
                        <li style="height: 70px;">
                            <div class="banks-bd selected">
                                <input type="radio" value="<?= $payment->code?>" checked="checked" name="channel">
                                <label class="<?= $payment->code?>"></label>
                            </div>
                            <p class="info"><?= $payment->description?></p>
                        </li>
                    <?php } ?>
                    <!--<li>
                        <div class="banks-bd">
                            <input type="radio" value="ALIPAY_SM" name="channel">
                            <label class="alipay_sm"></label>
                        </div>
                        <p class="info">手机扫一扫，支付快捷又方便<br>
                            今天你扫了吗</p>
                    </li>
                    <li>
                        <div class="banks-bd">
                            <input type="radio" onclick="ga('send','event','付款方式','click','财付通');" value="TENPAY" name="channel">
                            <label class="cft"></label>
                        </div>
                        <p class="info vmid">支持60多家银行</p>
                    </li>
                    <li>
                        <div class="banks-bd">
                            <input type="radio" onclick="ga('send','event','付款方式','click','paypal');" value="PAYPAL" name="channel">
                            <label class="shouji"></label>
                        </div>
                        <p class="info vmid">PAYPAL好用</p>
                    </li>-->
                </ul>
            </dd>
        </dl>
        <!--<dl class="banks">
            <dt><b>网银支付</b>银行卡或信用卡</dt>
            <dd>
                <ul class="methods_info">
                    <li>
                        <div class="banks-bd">
                            <input type="radio" value="PSBC0" name="channel">
                            <label class="youzheng"></label>
                            <i class="ka-type">储蓄卡</i> </div>
                    </li>
                    <li>
                        <div class="banks-bd">
                            <input type="radio" value="CMB" name="channel">
                            <label class="zhaoshang"></label>
                        </div>
                    </li>
                    <li>
                        <div class="banks-bd">
                            <input type="radio" value="ICBC" name="channel">
                            <label class="gongshang"></label>
                        </div>
                    </li>
                    <li>
                        <div class="banks-bd">
                            <input type="radio" value="CFT_CCB" name="channel">
                            <label class="jianshe"></label>
                        </div>
                    </li>
                </ul>

                <ul id="other-banks" class="methods_info">
                    <li style="display:none;"></li>
                    <li style="display:none;"></li>
                    <li> <a class="other-bank-btn" href="javascript:;">选择其他银行<i class="glyphicon glyphicon-chevron-right"></i></a> </li>
                </ul>
            </dd>
        </dl>
        <dl class="other">
            <dt><b>其他支付方式</b></dt>
            <dd>
                <p><a class="graybtn" href="/trade/pay4me/15021661000005523738">他人代付</a></p>
                <p><a id="huikuan-btn" class="graybtn" href="javascript:;">银行汇款</a></p>
            </dd>
        </dl>-->
    </div>
    <form action="<?= Yii::$app->urlManager->createUrl(['payment/fht']) ?>" method="post">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'sn')->textInput() ?>
            <!--merNo：<input type="text" name="merNo" value="1888" class="exinput"><br>
            terNo：<input type="text" name="terNo" value="88816" class="exinput"><br>
            CharacterSet：<input type="text" name="CharacterSet" value="UTF8" class="exinput"><br>
            transType：<input type="text" name="transType" value="sales" class="exinput"><br>
            transModel：<input type="text" name="transModel" value="M" class="exinput"><br>
            apiType：<input type="text" name="apiType" value="1" class="exinput"><br>
            amount：<input type="text" name="amount" value="98.99" class="exinput"><br>
            currencyCode：<input type="text" name="currencyCode" value="USD" class="exinput"><br>
            orderNo：<input type="text" name="orderNo" value="3234423" class="exinput"><br>
            merremark：<input type="text" name="merremark" value="" class="exinput"><br>
            returnURL：<input type="text" name="returnURL" value="https://yourshop.com/result.php" class="exinput"><br>
            merMgrURL：<input type="text" name="merMgrURL" value="localhost:81" class="exinput"><br>
            webInfo：<input type="text" name="webInfo" value="userAgent:Mozilla\/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko\/20100101 Firefox\/40.0" class="exinput"><br>
            language：<input type="text" name="language" value="en_US" class="exinput"><br>
            cardCountry：<input type="text" name="cardCountry" value="US" class="exinput"><br>
            cardState：<input type="text" name="cardState" value="" class="exinput"><br>
            cardCity：<input type="text" name="cardCity" value="test city" class="exinput"><br>
            cardAddress：<input type="text" name="cardAddress" value="test address" class="exinput"><br>
            cardZipCode：<input type="text" name="cardZipCode" value="12312" class="exinput"><br>
            payIP：<input type="text" name="payIP" value="121.21.1.121" class="exinput"><br>
            cardFullName：<input type="text" name="cardFullName" value="firstName.lastName" class="exinput"><br>
            cardFullPhone：<input type="text" name="cardFullPhone" value="1781728712733" class="exinput"><br>
            grCountry：<input type="text" name="grCountry" value="US" class="exinput"><br>
            grState：<input type="text" name="grState" value="" class="exinput"><br>
            grCity：<input type="text" name="grCity" value="California" class="exinput"><br>
            grAddress：<input type="text" name="grAddress" value="Moor Building 35274 State ST Fremont. U.S.A" class="exinput"><br>
            grZipCode：<input type="text" name="grZipCode" value="434554" class="exinput"><br>
            grEmail：<input type="text" name="grEmail" value="test@123.com" class="exinput"><br>
            grphoneNumber：<input type="text" name="grphoneNumber" value="181289182833" class="exinput"><br>
            grPerName：<input type="text" name="grPerName" value="FristName.LastName" class="exinput"><br>
            goodsString：<br><textarea rows="3" cols="100" name="goodsString" class="exinput">{"goodsInfo":[{"goodsName":"钢笔","quantity":"2","goodsPrice":"15.2"},{"goodsName":"钢笔","quantity":"2","goodsPrice":"15.2"},{"goodsName": "钢笔","quantity":"2","goodsPrice":"15.2"}]}</textarea><br>
            hashcode：<input type="text" name="hashcode" value="b10d6e3db34dda64ce70868cb44af416b3409404c19cac1fccb61f2cb13eb3c6" class="exinput"><br>-->
            cardNO：<input type="text" name="cardNO" value="4444333322221112" class="exinput"><br>
            cvv：<input type="text" name="cvv" value="123" class="exinput"><br>
            expYear：<input type="text" name="expYear" value="2022" class="exinput"><br>
            expMonth：<input type="text" name="expMonth" value="06" class="exinput"><br>
            <input type="submit" value="测试支付" class="paybtn" style="margin-left:30px;margin-top:15px;margin-bottom:50px">
        </form>
        <?php ActiveForm::end(); ?>
    </form>
    <div class="pay_line"> <span class="methods_info" id="pay-intro" style="display: inline-block;">
    <label class="zhifu">支付</label><span class="red">￥<em><?= $model->amount ?></em></span></span> <a href="javascript:;" id="pay-btn" class="btn">去付款<i class="glyphicon glyphicon-chevron-right"></i></a>
    </div>
</div>

<?php
$urlCoupon = Yii::$app->urlManager->createUrl(['cart/json-coupon']);
$urlCouponCode = Yii::$app->urlManager->createUrl(['cart/ajax-coupon-code']);
$js = <<<JS
jQuery("#trade-showbtn").click(function(){
    if ($('.trade-detail').css('display') == 'none') {
        $('.trade-detail').css('display', 'block');
    } else {
        $('.trade-detail').css('display', 'none');
    }
});
JS;

$this->registerJs($js);