<?php
/**
 * Created by PhpStorm.
 * User: LIU
 * Date: 2017/8/1
 * Time: 10:26
 */
use common\models\Order;
  $host= Yii::$app->request->hostInfo;
//$host="http://192.168.2.117:8082/"; //测试 线上注释掉
$public=Yii::getAlias('@public');
$totalNumber = $totalPrice = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Print Order # <?= $data->sn ?> -Elegomall</title>
    <meta name="google-site-verification" content="YgJk8aUiy_kY_z7pOvlktGpbu_d_GZSuGHWX33MUf8Y">
    <meta name="description" content="Best vape wholesale for atomizers, vape mods, batteries, e juices and diverse vape accessories.">
    <meta name="keywords" content="elegomall, electronic cigarette, e-cigarette, ecig, e-liquid, vape, best vape wholesale">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?=$host.$public?>/images/og_logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
</head>
<body style="width:230mm;" class="page-print sales-order-print">
  <div class="invoice-mail" style="height: auto">
    <div id="invoice-logo" style="width: 670px;height: 68px;background: #ee3e43;line-height: 68px;text-align: center;">
        <img style="vertical-align: middle;margin: 11px auto;" src="<?=$host.$public?>/img/elegomall_white.png" alt=""/>
    </div> 
    <div class="invoice-word" style="width: 668px;height: 153px;background: #f1e9e2;overflow: hidden;border-left:1px solid #eaeaea;border-top:1px solid #eaeaea;border-right: 1px solid #eaeaea;">
        <div class="word-left" style="float:left;width: 413px;height: 153px;border-right: 1px dashed #d0c8c1;">
            <h4 style="text-align: center;margin: 0px;padding-top: 25px;">THANK YOU FOR YOUR ORDER FROM <br/>ELEGOMALL</h4>
            <p style="text-align: center;font-size: 14px;">
                You can check the status of your order by <br />
                <a href="" style="cursor: pointer;">logging into your account.</a>
            </p>
        </div>
       <div class="word-right" style="float:right;width: 250px;height: 153px;">
            <p style="margin: 0px;padding-top: 25px;padding-left: 10px;font-size:14px;color: #404040;font-weight: bold;" class="p1">Order Questions?</p>
            <p style="margin: 0px;padding-top: 25px;padding-left: 10px;font-size:14px;" class="p2"><span style="color: #404040;font-weight: bold;">Email: </span><span style="color: #875640;">service@elegomall.com</span></p>
        </div> 
    </div>
    <div class="invoice-detail" style="width:668px;height: auto;border:1px solid #eaeaea;margin-top: 5px;">
        <div class="detail-top" style="width: 670px;height: 72px;background: #eaeaea;">
            <h4 style="text-align: center;font-size: 20px;margin: 0px;padding-top: 15px;">Your invoice <span>#<?=$data->sn?></span></h4>
            <p style="margin:0px;text-align: center;padding-top: 10px;margin: 0px;padding:0px;font-size: 14px;">For order #<?=$data->sn?>
            </p>
        </div>
        <table border="0px" style="margin: 0px;padding: 0px;width: 670px;height: auto;" cellspacing="0">
            <tr style="background: #f6f6f6;border-bottom: 1px solid #eaeaea;height: 32px;padding: 2px 0px;width: 670px;">
                <th style="margin:0px;padding: 0px;">Item</th>
                <th style="margin:0px;padding: 0px;">Attribute</th>
                <th style="margin:0px;padding: 0px;">Price</th>
                <th style="margin:0px;padding: 0px;">Qty</th>
                <th style="margin:0px;padding: 0px;">Subtotal</th>
            </tr>
            <?php foreach ($data->orderProducts as $product) { ?>
            <tr style="border-bottom: 1px solid #eaeaea;text-align: center;padding: 2px 0px;width: 100%;">
                <td style="border-bottom: 1px solid #eaeaea;text-align: center;"><?= $product->name ?></td>
                <td style="border-bottom: 1px solid #eaeaea;"><?= $product->product->child ? $product->product->child->emailattr : ''?></td>
                <td style="border-bottom: 1px solid #eaeaea">$<?= $product->price ?></td>
                <td style="border-bottom: 1px solid #eaeaea"><?= $product->number ?></td>
                <td style="border-bottom: 1px solid #eaeaea">$<?= $product->price * $product->number ?></td>
            </tr>
            <?php $totalNumber += $product->number; $totalPrice += $product->price * $product->number;} ?>
            <tr style="width: 100%;">
                <td  colspan="4" style="text-align: right;">Subtotal:</td>
                <td  style="text-align: center;">$<?=$totalPrice?> </td>
            </tr>
            <?php if($data->tax_price>0):?>
            <tr style="width: 100%;">
                <td  colspan="4" style="text-align: right;">Tax:</td>
                <td  style="text-align: center;">$<?=$data->tax_price?> </td>
            </tr>
            <?php endif;?>
            <tr style="width: 100%;">
                <td colspan="4" style="text-align: right;">Shipping &  Handing:</td>
                <td style="text-align: center;">$<?=$data->shipment_fee?> </td>
            </tr>
            <tr style="width: 100%;">
                <td colspan="4" style="color: #EE3E43;text-align: right;border-bottom: 1px solid #eaeaea">Grand Total:</td>
                <td style="color: #EE3E43;text-align: center;border-bottom: 1px solid #eaeaea">$<?=$data->amount?></td>
            </tr>
        </table>
        <div class="sale-infor" style="width: 670px;height: 260px;padding-top:15px;">
            <div class="sale01" style="float:left;width: 207px;height: 220px;border-right: 1px solid #eaeaea;padding-left:20px;">
                <h4 style="padding-left: -5px;">SENDER:</h4>
                <span >Elegomall.com</span>
                <span >#4-5, Block 1A, Wutong Island,</span>
                <span >Xixiang Subdistrict</span>
                <span >Baoan District</span>
                <!--<span style="display: block;padding-left: 20px;">Anaheim</span>-->
                <span >Shenzhen,</span>
                <span >China</span>
            </div>
            <div class="sale02" style="float:left;width: 202px;height: 207px;border-right: 1px solid #eaeaea;padding-left:20px;">
                <h4 style="padding-left: -5px;">SHIP TO:</h4>
                <span ><?= $data->consignee ?></span>
                <span ><?= $data->address ?></span>
                <span ><?= $data->city ?></span>
                <span ><?= $data->province ?></span>
                <span ><?= $data->country0->name ?></span>
                <span >T:<?= $data->zipcode ?></span>
                <span >T:<?= $data->phone ?></span>
            </div>
            <div class="sale03" style="float:left; width: 189px;height: 207px;padding-left:20px;">
                <h4 style="padding-left: -5px;">Shipping METHOD</h4>                    
                <span ><?= $data->shipment_name ?></span>
                <h4 style="padding-left: -5px;">PAYMENT METHOD</h4>
                <span ><?= $data->payment_name ?></span>
            </div>
        </div>
    </div>
    <p style="color:#d9d9d9;font-size: 24px;font-weight: bold;text-align: center;width: 670px;">
        Thank you,Elegomall!
    </p>
<?php if(!isset($is_invoice) || !$is_invoice){?>
<script type="text/javascript">
        window.onload = function(){
            window.print();  
        }    
</script>
<div class="buttons-set">
    <button type="button" title="Close Window" class="button" onclick="window.close();">
        <span><span>Close Window</span></span>
    </button>
</div>
      <?php }?>
</body>
</html>
