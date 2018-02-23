<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
$this->registerCssFile('@web/css/check-out.css', ['depends' => \frontend\assets\AppAsset::className()]);
$this->registerJsFile('@web/js/jquery.form.js', ['depends' => \frontend\assets\AppAsset::className()]);
$public=Yii::getAlias('@public');
$users= \common\models\User::findOne(Yii::$app->user->id);
if(!empty($users)){
    $userGroup= $users->user_group;
}else{
    $userGroup=7;
}
?>

<div class="checkout_div"  style="max-width:1140px;width:100%;margin:0 auto;" align="center">

    <table class="go_home" align="center">
        <tbody>
        <tr>
            <td class="to_home">
                <a href="/">
                    <img src="<?php echo $public;?>/img/pay_cart/icon_home.png">
                    <span>Home ></span>
                </a>
            </td>
            <td class="top_checkout">Check out</td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <table class="view_checkout" align="center">
        <tbody>
        <tr>
            <td class="checkout_cart_td1" align="center" style="">
                <img src="<?php echo $public;?>/img/pay_cart/icon_done.png" style="">
                <span style="">View shopping cart</span>
            </td>
            <td style="width: 9px;">
                <img src="<?php echo $public;?>/img/pay_cart/pic_white_black.png">
            </td>
            <td class="checkout_cart_td2" align="center" style="">
                <img src="<?php echo $public;?>/img/pay_cart/icon_step2.png" style="padding-bottom: 1px;">
                <span style="padding-left: 6px;">Check out</span>
            </td>
            <td style="width: 10px;">
                <img src="<?php echo $public;?>/img/pay_cart/pic_trigon_black.png">
            </td>
            <td class="checkout_cart_td3" align="center" style="width: 373.6px">
                <img src="<?php echo $public;?>/img/pay_cart/icon_step_3_defualt.png" style="padding-bottom: 1px;">
                <span style="">Complete payment</span>
            </td>
        </tr>
        </tbody>
    </table>
    <?php if(Yii::$app->getSession()->hasFlash('error')):?>
        <div>
            <?php echo Yii::$app->getSession()->getFlash('error'); ?>
        </div>
    <?php endif; ?>
    <?php $form = ActiveForm::begin(['id' => 'checkout', 'action' => Yii::$app->urlManager->createUrl(['/cart/submit'])]); ?>
    <!--    checkout页面----Choose Shipping Address-->
    <div style="width:100%;margin:0 auto;">
        <div class="checkout_adress">
            <div class="shippiing_method">Choose Shipping Address</div>
            <?php if (count($addresses)) {?>
                <div class="shipping_address hasAddress" style="" align="center">
                    <?php foreach ($addresses as $address) { ?>  <!-- huxu -->
                        <div class="shipping_address_ch1" style="">
                            <div style="overflow: hidden;">
                                <div class="shipping_address_select" style="">
                                    <input name="address_id" type="radio" <?php if ($address['default']) { echo "checked"; }?> value="<?= $address['id']?>" style="display: none;">
                                    <img data-country="<?= $address['country']?>" name="select_yes_no" class="select_yes_no" src="<?php echo $public;?>/img/pay_cart/<?php if ($address['default']) { echo "pic_sletctd.png"; }else{echo "pic_slecte.png";}?>" value="<?= $address['id']?>">
                                </div>
                                <div class="shipping_address_list" style="">
                                    <div class="shipping_address_name" style="font-weight: bold;"><?= $address['consignee'] ?></div>
                                    <div class="shipping_address_list2" style="display: inherit;">
                                        <div><?= isset($country[$address['country']]) ? $country[$address['country']] : $address['country']?>, &nbsp;</div>
                                        <div><?= $address['province']?>,&nbsp; </div>
                                        <div><?= $address['city']?>, &nbsp;</div>
                                        <div><?= $address['address']?>, &nbsp;</div>
                                        <div>T:<?= $address['phone'] ?> &nbsp;</div>
                                        <!--<div>Email:<span><?/*= $address['email'] */?></span></div>-->
                                        <?php if ($address['default'] == 1) { ?>
                                            <div class="shipping_address_sadress">
                                                <span>Default address</span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div align="center" data-id="<?= $address['id']?>" class="edit_address" style="float: right;width:80px;height: 50px;border-left:1px solid #e3e3e5;margin-top: -20px;text-align: center;">
                                        <div style="height: 50px;">
                                            <input style="height: 48px;background-color: #ffffff;border: 1px solid #ffffff;" type="button" value="Edit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div  class="add_new_address" style="">
                        <div><span style="font-weight: bold;">+ Add </span>Shipping address</div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="shipping_address noAddress" align="center" style="padding-bottom: 0px;">
                    <div align="left" style="margin-bottom: 20px;margin-top: 20px;margin-left: 15px;">
                        <img class="add_new_img" src="<?php echo $public;?>/images/Address-Book.png">
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
    <!--end-->

    <!-- 运输方式选择 -->
    <div class="" style="font-size: 18px;color: #404040;font-weight: bold;text-align: left;max-width: 1140px;margin-bottom: 15px;margin-top:20px;">Choose Shipping Method</div>
    <div style="width:100%;overflow-x:auto;">
        <div class="page-shipping-way clearfix">
            <div class="select-shipping-wrap">
                <select class="select-shipping" name="shipment_id" onchange="isBlockshipping(this)">
                    <option id="0" value="0" data-price="0">Choose Shipping Method</option>

                    <?php foreach($shipments as $key=>$value): ?>
                        <option value="<?= $value['id']?>"  data-type="<?=$value['type']?>" data-price="<?= $value['price']?>"
                                data-tax="<?=$value['tax']?>" data-taxprice="<?= $value['tax_calculation']?>">
                            <?= $value['name']?>-$<?= $value['price']?>
                        </option>
                    <?php endforeach;?>
                </select>
            </div>
            <div id="shiplist">
                <?php foreach($shipments as $key=>$value): ?>
                    <div class="page-shipping-wrap shipping-box" style="display:none;" id="shipping-box<?= $value['id']?>">
                        <div class="page-left-1">
                            <div class="page-left-wrap">
                                <img class="shipments_img" src="<?php echo $public;?>/img/pay_cart/<?= $value['type']?>.jpg" />
                            </div>
                        </div>
                        <div class="page-right">
                            <?= $value['title']?>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <!-- 运输方式选择 end -->

    <!-- 付款方式 -->
    <div class="" style="font-size: 18px;color: #404040;font-weight: bold;width:100%;margin-bottom: 15px;margin-top:30px;text-align:left;">Choose Payment Method</div>
    <div style="width:100%;overflow-x:auto;">
        <div class="page-payment-way clearfix">
            <div class="select-payment">
                <div class="hidden-div" style="display:none;">
                    <?php foreach($payments as $key => $payment){?>
                        <option class="payment" id="<?= $payment->id ?>" value="<?= $payment->id ?>" data-country="<?= $payment->country ?>"><?= $payment->name ?></option>
                    <?php }?>
                </div>
                <select class="select" name="payment_id" onchange="isBlock(this)">
                    <option id="0" value="0">Choose Payment Method</option>
                    
                </select>
            </div>
            <?php foreach($payments as $key => $payment){?>
                <div class="page-payment-wrap<?php if($payment->id == 4) {echo "-noimg";}?> payment-box" style="display:none;" id="payment-box<?= $payment->id ?>">
                    <div class="page-left-1">
                        <div class="page-left-wrap">
                            <?php if($payment->id == 4) {?>
                                <p class="creadit"><input type="text" name="cardNO" value="" placeholder="Credit cart number" /></p>
                                <p class="ym">
                                    <select class="select1" name="expMonth">
                                        <option value="Month" selected="selected">Month</option>
                                        <option value="01">01 - January</option>
                                        <option value="02">02 - February</option>
                                        <option value="03">03 - March</option>
                                        <option value="04">04 - April</option>
                                        <option value="05">05 - May</option>
                                        <option value="06">06 - June</option>
                                        <option value="07">07 - July</option>
                                        <option value="08">08 - August</option>
                                        <option value="09">09 - September</option>
                                        <option value="10">10 - October</option>
                                        <option value="11">11 - November</option>
                                        <option value="12">12 - December</option>
                                    </select>
                                    <select class="select2" id="expYear" name="expYear">
                                        <?php for($i = 0; $i < 12; $i++) { ?>
                                            <option value="<?= date("Y") + $i?>"><?= date("Y") + $i?></option>
                                        <?php } ?>
                                    </select>
                                </p>
                                <p class="creadit-no"><input type="text" name="cvv" value="" placeholder="cvv" /></p>
                            <?php }else{?>
                                <img src="<?php echo $public;?>/img/pay_cart/<?= $payment->name ?>.jpg" />
                            <?php }?>
                        </div>
                    </div>
                    <div class="page-right">
                        <?= $payment->description ?>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>

    <script>
        //选择运输方式
        function isBlock(obj){
            var id = $(obj).find('option:selected').val();
            $('.payment-box').css({'display':'none'});
            $("#payment-box" + id).css({'display':'block'});
        }
        function isBlockshipping(obj){
            var id = $(obj).find('option:selected').val();
            $('.shipping-box').css({'display':'none'});
            $('#shipping-box' + id).css({'display':'block'});
        }
    </script>
    <!--view product 产品列表-->
    <div style="max-width:1140px;" class="hm-view-product">
        <table class="view_products" style="width:1140px;">
            <tbody>
            <tr class="view_product_top" style="">
                <td class="view_product_td1" colspan="5">View products</td>
                <td class="view_product_td2"><a href="<?= Yii::$app->urlManager->createUrl(['/cart']) ?>" style="color:#404040;">BACK TO CART >></a></td>
            </tr>
            <tr class="view_product_head" style="background:#ffffff;border-bottom:none;">
                <td class="product_head_td1" colspan="2">Product Name</td>
                <td class="product_head_td">Attribute</td>
                <td class="product_head_td">Price</td>
                <td class="product_head_td">Qty</td>
                <td class="product_head_td">Subtotal</td>
            </tr>
            <tr class="view_product_center" style="background:#ffffff;">
                <td colspan="6">
                    <!-- <div> -->
                    <table class="product_center_table" style="
                    display: block;width: 1140px;max-height: 400px;
                   overflow: auto;">
                        <?php foreach ($products as $product) { ?>
                            <tr class="center_table_tr">
                                <td class="center_td_img">
                                    <a target="_blank" href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $product->product->child ? $product->product->child->parent->seourl : $product->product->seourl]) ?>"><img src="<?= $product->product->child ? ($product->product->child->img ? $product->product->child->img : $product->product->child->parent->image) : $product->product->image ?>" alt="<?= $product->name ?>" onerror="javascript:this.src='/theme/new/images/noimg_queshengxiao.png';" /></a>
                                </td>
                                <td class="center_td_name" style="">
                                    <a target="_blank" href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $product->product->child ? $product->product->child->parent->seourl : $product->product->seourl]) ?>" style="color: #666666;"><?= $product->name ?></a>
                                </td>
                                <td class="center_td_atrribute product_attribute">
                                    <?=$product->product->child ? $product->product->child->attr : ''?>
                                </td>
                                <td class="product_price">
                                    <!--原价格 -->
                                    <span style="font-size:14px;font-weight:normal;text-decoration:line-through;">$<?= $product->market_price ?></span>
                                    <!--会员价格 -->
                                    <span style="font-weight:bold;" class="product-price-zxh">$<?= $product->price ?></span>
                                </td>
                                <td class="product_qty">
                                    <span><?= $product->number ?></span>
                                </td>
                                <td class="product_sum">
                                    <span>$<?= sprintf("%.2f", $product->number * $product->price) ?></span>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <!-- </div> -->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--end 产品列表-->

    <!--submit_order 结算-->
    <div class="submit_order_div" style="width:100%;">  <!-- huxu -->
        <div class="hm-coupon">
            <div class="submit_order_left" style="" >
                <div class="use_coupon" style="">
                    <div class="use_coupon_font" style="">Use coupon</div>
                    <div>
                        <div style="float: left;border: 1px solid #eceff8;border-radius: 5px;">
                            <input class="input_val" name="sn" placeholder="<?=$tip ? $tip->content : 'Type or select a coupon code'?>" style="width: 515px;height: 38px;border: 2px solid #fff;" autocomplete="off">
                            <span class="select_coupon" style="cursor: pointer;"><img src="<?= $public?>/img/pay_cart/coupon_03(1).png"></span>
                        </div>
                        <div class="use_coupon_button" style="float: left">
                            <input id="useCoupon" value="USE COUPON" type="button">
                        </div>
                        <div class="clearfix coupons">
                            <?php foreach ($coupon as $value){ ?>
                                <div class="coupon_list">
                                    <div class="coupon_1" style="">
                                        <div class="coupon_msg" style="">
                                            <div class="coupon_name_wrap">
                                                <div class="coupon_name" data-sn="<?= $value['sn'] ?>" data-price="<?= $value->min_amount?>">
                                                    <?php if($value->couponType->type == \common\models\CouponType::COUPON_TYPE_FULL) echo "$" . $value->couponType->conditions['minus'] . 'OFF'; ?>
                                                    <?php if($value->couponType->type == \common\models\CouponType::COUPON_TYPE_PERCENT) echo $value->couponType->conditions['minus'] . "%OFF"; ?>
                                                    <?php if($value->couponType->type == \common\models\CouponType::COUPON_TYPE_FREIGHT) echo "SHIPPING"; ?>
                                                </div>
                                                <div class="couppon-condition" title="<?= $value->couponType->name ?>"><?= $value->couponType->name ?></div>
                                                <!-- <div class="coupon_p" style=""><?= $value->couponType->description ?></div> -->
                                            </div>
                                            <div class="discount_num">-$<?= $value->min_amount?></div>
                                        </div>
                                        <div class="coupon_type_date">
                                            <ul class="clearfix ">
                                                <li title="<?= $value->couponType->description ?>"><?= $value->couponType->description ?></li>
                                                <li>valid Till: <?= Yii::$app->formatter->asDate($value['ended_at']) ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="use_coupon_center" style="" align="center">
                    <span style=""></span>
                </div>
                <div style="display: inherit;float: left;padding-left: 15px;">
                    <div class="leave_note" style="">Leave a note</div>
                    <div style="width: 720px;">
                        <div>
                            <textarea id="remark" name="remark" style="background-color: #FFFFFF;" type="text" placeholder="leave your meassge here...."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="order_right_sum" style="" align="right">
            <div class="right_total" style="">
                <div class="sub_name" style="float: left">
                    <div><div class="sub_name1">Subtotal:</div><div class="sub_name2">$<span id="product_price"><?= sprintf("%.2f", $totalPrice) ?></span></div></div>
                    <div class="tax-price-div" style="display: none">
                        <div class="sub_name1">Tax:</div>
                        <div class="sub_name2">$<span id="tax_price">0</span></div>
                    </div>
                    <div><div class="sub_name1">Shipping Cost:</div><div class="sub_name2">$<span id="shipmeng_price">0</span></div></div>
                    <div style="display: none;"><div class="sub_name1">Discount:</div><div class="sub_name2">$<span id="discount">0</span></div></div>
                    <div><div class="sub_name1">Grand Total:</div><div class="sub_name2" style="color: #ee3e43">$<span id="total_price"><?= sprintf("%.2f", $totalPrice) ?></span></div>
                    </div>
                </div>
                <div class="order_submit_order">
                    <button id="dosubmit" type="button" value="">SUBMIT ORDER</button>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <style>
        .sub_name1{float: left;width: 170px;}
        .sub_name2{float: left;margin-left: 20px;}
    </style>
    <script>
        var limitHtml = "<div style='text-align:left;padding-left:20px;'>Sorry, no shipping method available.<br/><br/>Possible reasons:<br/>1.There are lithium batteries and non-battery items in shopping cart together.<br/>2.E-cigarette products was banned in this country.</div>";

        jQuery(document).ready(function () {
            if($('.select-shipping>option').length<=1&&$('.shipping_address').hasClass('hasAddress')){
                showMsg(limitHtml);
            }

            //单选
            $('.select_yes_no').click(function(){
                if ($(this).attr('src')=="<?php echo $public;?>/img/pay_cart/pic_slecte.png") {
                    $(".select_yes_no").parent().find(".select_yes_no").attr('src', "<?php echo $public;?>/img/pay_cart/pic_slecte.png");
                    $(".select_yes_no").parent().find("input").removeAttr("checked");
                    $(this).attr('src', "<?php echo $public;?>/img/pay_cart/pic_sletctd.png");
                    $(this).prev("input").prop("checked",1);
                    var country = $(this).data("country");
                    changeAddress(country);
                }
            });
            $(".use_coupon_button").click(function () {
                $(".use_coupon_button input").css( "background-color","#ee3e43");
            });
            

            //获取 一条地址（弹窗）
            $(".edit_address,.add_new_address,.add_new_img").click(function () {
                var id = $(this).data("id");
                var html = $("#address_template").html();
                if (parseInt(id) > 0) {
                    $.ajax({
                        type:'get',
                        dataType:'json',
                        url:"<?= Yii::$app->urlManager->createUrl(['/cart/get-address']) ?>",
                        data : {'id' : id},
                        beforeSend:function(){
                            layer.load(0, {shade: false});
                        },
                        complete:function(){
                            $('.layui-layer.layui-layer-loading.layer-anim').remove();
                        },
                        success:function(data){
                            var is_defalut = data.default ? 1 : 0;
                            html = html.format(data.first_name, data.last_name, data.company, data.phone, data.address, data.city, data.province, data.zipcode, data.country, data.id, 1);

                            addressShow(html);

                            $("select[name='country']>option").each(function(i, n){
                                if ($(n).val() == data.country) {
                                    $(n).prop("selected", true);
                                }
                            });

                            if (is_defalut) {
                                $("input[name='default']").attr("checked", 1);
                            }
                        },
                        error:function (){
                            showMsg(limitHtml);
                        }
                    });
                } else {
                    html = html.format('','','','','','','','','','');
                    addressShow(html);
                }

            });

            //选物流
            $("select[name='shipment_id']").change(function(){
                var price = $(this).find("option:selected").data("price");

                var subTotal=$('#product_price').text();
                //alert(subTotal*0.17);
                var tax = $(this).find("option:selected").data("tax");
                var taxprice = $(this).find("option:selected").data("taxprice");
                if(tax!='-1'){

                    /*
                    按照','来拆分字符串是为了后期扩展。
                    目前的字符串格式是:0:2000:0.17
                    后期的字符串格式是：0:1000:0.17,1000:2000:0.15    。。。。
                    */
                    var taxArr=new Array();
                    if(taxprice.length>1){
                        var taxPriceArr=taxprice.split(',');
                        for(var i=0;i<taxPriceArr.length;i++) {
                            var arr=new Array();
                            arr=taxPriceArr[i].split(':');
                            taxArr.push(arr);
                        }
                    }



                    var taxTotal=0;
                    var userGroup= <?php echo $userGroup?>;

                    if(userGroup!=201){//如果客户等级不是b2c等级
                        if(taxArr.length>0){
                            for(var k=0;k<taxArr.length;k++){
                                console.log(taxArr[k][0]+'-'+taxArr[k][1]+'-'+taxArr[k][2]+'-'+subTotal);
                                if(parseFloat(subTotal)>parseFloat(taxArr[k][0]) ){
                                    if(parseFloat(subTotal)<=parseFloat(taxArr[k][1])){
                                        $('.product-price-zxh').each(function () {
                                            var price= $(this).html();
                                            price=price.substring(1);
                                            var qty= $(this).parent().next().children().html();
                                            price= price*taxArr[k][2];
                                            price= price.toFixed(2);
                                            taxTotal +=price*qty;
                                        });
                                        taxTotal=taxTotal.toFixed(2);
                                    }
                                }

                            }
                        }
                    }


                    $('#tax_price').html(taxTotal);
                    if(taxTotal>0){
                        $('.tax-price-div').show();
                    }else{
                        $('.tax-price-div').hide();
                    }

                }else{
                    $('.tax-price-div').hide();
                    $('#tax_price').html(0);
                }

                $("#shipmeng_price").html(price);
                $("#shipment_desc").html($(this).find("option:selected").data("desc"));
                calc();
                /*var img_id=$(this).find("option:selected").val();
                 if(img_id==1){
                 $(".shipments_img").attr("src","/img/pay_cart/DHL.jpg");
                 }else if(img_id==5){
                 $(".shipments_img").attr("src","/img/pay_cart/yuntu.jpg");
                 }else if(img_id==2){
                 $(".shipments_img").attr("src","/img/pay_cart/UPS.jpg");
                 }*/
                var img_id = $(this).find("option:selected").data("type");
                switch(img_id){
                    case 1:
                        $(".shipments_img").attr("src","<?php echo $public;?>/img/pay_cart/DHL.jpg").css({'display':'none'});
                        break;
                    case 2:
                        $(".shipments_img").attr("src","<?php echo $public;?>/img/pay_cart/UPS.jpg").css({'display':'none'});
                        break;
                    case 3:
                        $(".shipments_img").attr("src","<?php echo $public;?>/img/pay_cart/FedEx.jpg").css({'display':'none'});
                        break;
                    case 4:
                        $(".shipments_img").attr("src","<?php echo $public;?>/img/pay_cart/BATTERY.jpg").css({'display':'none'});
                        break;
                    case 5:
                        $(".shipments_img").attr("src","<?php echo $public;?>/img/pay_cart/Post-parcel.jpg").css({'display':'none'});
                        break;
                    case 6:
                        $(".shipments_img").attr("src","<?php echo $public;?>/img/pay_cart/Russian.jpg").css({'display':'none'});
                        break;
                    case 7:
                        $(".shipments_img").attr("src","<?php echo $public;?>/img/pay_cart/shunfeng.jpg").css({'display':'none'});
                        break;
                    case 8:
                        $(".shipments_img").attr("src","<?php echo $public;?>/img/pay_cart/yousu.jpg").css({'display':'none'});
                        break;
                    case 9:
                        $(".shipments_img").attr("src","<?php echo $public;?>/img/pay_cart/yuntu.jpg").css({'display':'none'});
                        break;
                }
            });


            //选付款方式
            $("select[name='payment_id']").change(function(){
                var opt = $(this).find("option:selected");
                var id = opt.val();
                var desc = opt.data("desc");
                $("#payment_desc").html(desc);
                //alert(id);
                if (id == 4) {
                    //富汇通
                    $("#fht").show();
                    $("#pay_img").hide();

                    $("#fuhuitong").show();
                    $("#xilian").hide();
                    $("#tt").hide();
                    $("#paypal").hide();
                }

                if(id==3){
                    $("#fht").hide();
//                alert($("#pay_img").children().attr("src"));
                    $("#pay_img").children().attr("src","<?php echo $public;?>/img/pay_cart/WESTERN.jpg");
                    $("#pay_img").show();

                    $("#fuhuitong").hide();
                    $("#xilian").show();
                    $("#tt").hide();
                    $("#paypal").hide();
                }
                if(id==2){
                    $("#fht").hide();
                    $("#pay_img").children().attr("src","<?php echo $public;?>/img/pay_cart/TT.jpg");

                    $("#fuhuitong").hide();
                    $("#xilian").hide();
                    $("#tt").show();
                    $("#paypal").hide();
                }

                if(id==1){
                    $("#fht").hide();
                    $("#pay_img").children().attr("src","<?php echo $public;?>/img/pay_cart/Paypal.jpg");

                    $("#fuhuitong").hide();
                    $("#xilian").hide();
                    $("#tt").hide();
                    $("#paypal").show();
                }

            });

            var useCoupon = function(){
                var sn = $("input[name='sn']").val();
                if (sn == '') {
                    $("#discount").text("0");
                    $("#discount").parent().parent().hide();
                    calc();
                    return false;
                }

                $.ajax( {
                    url:'<?= Yii::$app->urlManager->createUrl(['/cart/coupon']) ?>',
                    type:'get',
                    dataType:'json',
                    data:{'sn' : sn},
                    beforeSend:function(){
                        layer.load(0, {shade: false});
                    },
                    complete:function(){
                        $('.layui-layer.layui-layer-loading.layer-anim').remove();
                    },
                    success:function(data) {
                        if (data.status == 1) {
                            //是否免运费
                            if (data.type == 3) {
                                //折扣就是运费
                                var yunfei = $("#shipmeng_price").text();
                                var discount = parseFloat(yunfei);
                            } else {
                                var discount = data.save;
                            }

                            discount = discount ? discount : 0;
                            $("#discount").html(discount.toFixed(2));
                            layer.msg("SUCCESS", {icon: 1, time: 1000});
                        } else {
                            $("#discount").text("0");
                            showMsg(data.msg);
                        }

                        //layer.msg("SUCCESS", {icon: 1, time: 1000});

                        $("#discount").parent().parent().hide();
                        calc();
                    },
                    error : function() {
                        showMsg("验证coupon异常！");
                    }
                });
            };

            //选coupon
            $("#useCoupon").click(function(){
                useCoupon();
            });

            //expYear
            $("#expYear").change(function () {
                var select_val= $(this).val();
                $(this).siblings("input").val(select_val);
            });

            //coupon选择改变时
            $("#coupon").change(function () {
                var select_val= $(this).val();
                $(this).siblings("input").val(select_val);
            });

            //修改，新增地址
            $("body").on("click", "#addressSubmit", function(){
                //为表单的必填文本框添加提示信息（选择form中的所有后代input元素）
                var required = false;
                $("#address :input.must").each(function () {
                    if ($(this).val() == '') {
                        $(this).focus();
                        required = true;
                        return false;
                    }
                });

                if (required) {
                    return false;
                }

                var options = {
                    // 规定把请求发送到那个URL
                    url: "<?= Yii::$app->urlManager->createUrl(['/cart/address']) ?>",
                    // 请求方式
                    type: "post",
                    // 服务器响应的数据类型
                    dataType: "json",
                    // 请求成功时执行的回调函数
                    //data: $("#uploadForm1").serialize(),
                    success: function(data, status, xhr) {
                        if (data.id == 1) {

                        }
                        layer.closeAll();
                        location.reload();

                    }
                };

                $("#address").ajaxSubmit(options);

            });

            // huxu
            $('#dosubmit').on('click',function(){
                //判断用户是否选择收货地址
                if($('.shipping_address').hasClass('hasAddress')){
                    var aInput = $('.shipping_address_select').find('input[type=radio]');
                    // var arr = Array.prototype.slice.call(aInput);
                    for(var i = 0;i<aInput.length;i++){
                        if(aInput.eq(i).siblings('img').attr('src') == '/theme/new/img/pay_cart/pic_sletctd.png'){
                            break;
                        }else if(i == aInput.length-1){
                            layer.msg('Plaese Choose Shipping Address',{icon:0,time:1000});
                            return;
                        }
                    }
                }else{
                    layer.msg('Plaese Add Shipping Address',{icon:0,time:1000});
                    return;
                }
                //判断Shipping Method
                if($('.select-shipping').find('option:selected').text() == 'Choose Shipping Method'){
                    layer.msg('Plaese Choose Shipping Method',{icon: 0,time: 1000});
                    return;
                }

                if($('.select').find('option:selected').text() == 'Choose Payment Method'){
                    layer.msg('Plaese Choose Payment Method',{icon:0,time:1000});
                    return;
                }else if($('.select').find('option:selected').text() == 'Credit Card'){
                    if($('.page-payment-wrap-noimg .creadit input').val() == ''){
                        layer.msg('Plaese Credit cart number',{icon:0,time:1000});
                        return;
                    }
                }
                if($("#dosubmit").text() == 'PROCESSING'){
                    return;
                }else{
                    $("#dosubmit").css({background:'#cccccc', cursor: 'no-drop'}).empty().text("PROCESSING");
                }
                $('#checkout').submit();


            });

            //coupon卷展示和隐藏_____hx(点击input框)
            $('.input_val').on('click',function(){
                var cus=$(".coupons").css("display");
                if(cus=="block"){
                    $(".coupons").css("display","none");
                }else{
                    $(".coupons").css("display","block");
                }
            });

            //coupon卷展示和隐藏_____zxh
            $(".select_coupon").click(function(){
                var cus=$(".coupons").css("display");
                if(cus=="block"){
                    $(".coupons").css("display","none");
                }else{
                    $(".coupons").css("display","block");
                }
            });

            //赋值给input_____zxh
            $(".coupon_list").click(function () {
                $(".coupons").css("display","none");
                $("#useCoupon").css("background-color","#ee3e43");
                var sn= $(this).find("div .coupon_name").data("sn");
                $(".input_val").val(sn);

                useCoupon();
            });

            $(".input_val").bind('input propertychange',function () {
                if($(this).val().length>0){
                    $("#useCoupon").css("background-color","#ee3e43");
                }else{
                    $("#useCoupon").css("background-color","#d9d9d9");
                }
            });

            //设置付款方式
            setPayment();
        });

        var UNIT_TYPE = isAPP();
//      if(isAPP() != 'pc'){
//          $('.submit_order_div').css({'width':'100%'});
//          $('.view_checkout').css({'display':'none'});
//      }

        //设置付款方式
        function setPayment(){//whuxu
            var country = $("input[name='address_id']:checked").siblings("img").data("country");
            //清空option
            $('.select-payment .select option').not('option[id="0"]').remove();
            // var options = $("select[name='payment_id']").children("option").filter(".payment");
            var options = $(".hidden-div").children("option").filter(".payment");
            $("select[name='payment_id']").children("option:eq(0)").prop("selected", true);
            // $('.page-payment-way .select').val('Choose Payment Method');
            $('.page-payment-wrap.payment-box').hide();
            $.each(options, function(i, n){

                //解析国家配置
                var config = $(n).data("country");
                if (config) {
                    var condition = config.substring(0, 1);

                    if ($.inArray(condition, ['&', '!']) && condition == '!') {
                        //非，不存在的
                        var countryStr = config.substring(1);
                        var countryArr = countryStr.split(",");

                        if ($.inArray(country, countryArr) == -1) {
                            $(n).clone().appendTo('.select-payment .select');
                        }
                    } else {
                        //存在的
                        var countryArr = config.split(",");
                        if ($.inArray(country, countryArr) != -1) {
                            $(n).clone().appendTo('.select-payment .select');
                        }
                    }
                }

            })
        }

        //计算价格
        function calc(){
            var productPrice = $("#product_price").text();
            var shipmentPrice = $("#shipmeng_price").text();
            var taxPrice= $('#tax_price').text();
            var discount = $("#discount").text();
            var discountDiv = $("#discount").parent().parent();
            if (discount > 0) {
                discountDiv.show();
            } else {
                discountDiv.hide();
            }
            var total_price = parseFloat(productPrice) + parseFloat(shipmentPrice) +parseFloat(taxPrice) - parseFloat(discount);
            $("#total_price").html(total_price.toFixed(2));
        }

        //选地址
        function changeAddress(country){
            var imagesArr = new Array();
            imagesArr[1] = "<?php echo $public;?>/img/pay_cart/DHL.jpg";
            imagesArr[2] = "<?php echo $public;?>/img/pay_cart/UPS.jpg";
            imagesArr[3] = "<?php echo $public;?>/img/pay_cart/FedEx.jpg";
            imagesArr[4] = "<?php echo $public;?>/img/pay_cart/BATTERY.jpg";
            imagesArr[5] = "<?php echo $public;?>/img/pay_cart/Post-parcel.jpg";
            imagesArr[6] = "<?php echo $public;?>/img/pay_cart/Russian.jpg";
            imagesArr[7] = "<?php echo $public;?>/img/pay_cart/shunfeng.jpg";
            imagesArr[8] = "<?php echo $public;?>/img/pay_cart/yousu.jpg";
            imagesArr[9] = "<?php echo $public;?>/img/pay_cart/yuntu.jpg";

            $.ajax( {
                url:'<?= Yii::$app->urlManager->createUrl(['/cart/shipping']) ?>',
                type:'get',
                dataType:'json',
                data:{
                    'shippingCountry' : country,
                    'totalWeight' : "<?= $totalWeight ?>",
                    'totalPrice' : "<?= $totalPrice?>",
                },
                beforeSend:function(){
                    layer.load(0, {shade: false});
                },
                complete:function(){
                    $('.layui-layer.layui-layer-loading.layer-anim').remove();
                },
                success:function(data) {
                    if(data.length == 0){
                        showMsg(limitHtml);
                    }
                    var text='<option id="0" value="0">Choose Shipping Method</option>';
                    var list = '';
                    var j = 0;
                    var price = 999;
                    var desc = '';
                    var type = 0;
                    $.each(data, function(i, val) {
                        if (j == 0) {
                            var checked = 'checked';
                            price = val.price;
                            desc = val.title;
                            type = val.type;
                            tax =val.tax;
                            taxprice=val.tax_calculation;
                        } else {
                            var checked = '';
                        }
                        j++;
                        text += '<option value="'+val.id+'" data-type="'+val.type+'" data-price="'+val.price+'" data-tax="'+val.tax+'" data-taxprice="'+val.tax_calculation+'">'+val.name+'-$'+val.price+'</option>';
                        list += '<div class="page-shipping-wrap shipping-box" style="display:none;" id="shipping-box'+val.id+'"> <div class="page-left-1"> <div class="page-left-wrap"> <img src="'+imagesArr[val.type]+'" /> </div> </div> <div class="page-right"> '+val.title+' </div> </div>';
                    });
                    $('select[name="shipment_id"]').html(text);
                    $("#shiplist").html(list);

                    $("#shipmeng_price").html(price);
                    $("#shipment_desc").html(desc);


                    $('.tax-price-div').hide();
                    $('#tax_price').val(0);

                    calc();
                },
                error : function() {
                    showMsg(limitHtml);
                }
            });

            //设置付款方式
            setPayment();
        }

        String.prototype.format=function()
        {
            if(arguments.length==0) return this;
            for(var s=this, i=0; i<arguments.length; i++)
                s=s.replace(new RegExp("\\{"+i+"\\}","g"), arguments[i]);
            return s;
        };

        function addressShow(html){
            layer.open({
                type: 1,
                title: false //不显示标题栏
                ,closeBtn: true
                // ,area: ''
                ,shade: 0.8
                ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
                ,resize: false
                //,btn: ['火速围观', '残忍拒绝']
//                            ,btnAlign: 'c'
//                            ,moveType: 0 //拖拽模式，0或者1
                ,
                content : html,
                success: function(layero){
                    /*var btn = layero.find('.layui-layer-btn');
                     btn.find('.layui-layer-btn0').attr({href: 'javascript:;'});*/
                }
            });
        }

        function showMsg(msg){
            var is_btn = false;
            var url = '/';
            var content = '<div>' +
                '<div style="font-size: 16px;width: 360px;height: 34px;background-color: #ee3e43;display: inline-block;">' +
                '<div style="float:left;color: #FFFFFF;padding-left: 15px;margin-top: 5px;">Notice</div>'+
                '</div>' +
                '<div style="width:360px;font-size:16px;">' +
                '<div style="color:#333333;text-align: center;padding-top: 20px;padding-bottom: 44px;">' + msg + '</div>'+
                '</div>'+
                '</div>';

            if (is_btn) {
                var btn1 = ['YES', 'NO'];
            } else {
                var btn1 = [];
            }

            layer.open({
                type: 1
                ,title: false //不显示标题栏
                ,closeBtn: true
                ,shade: 0.8
                ,id: 'LAY_ONE' //设定一个id，防止重复弹出
                ,resize: false
                ,btn: btn1
                ,content: content
                ,success: function(layero){
                    var btn = layero.find('.layui-layer-btn');
                    /*btn.find('.layui-layer-btn0').attr({
                     href: 'http://www.layui.com/'
                     ,target: '_blank'
                     });*/
                    btn.find('.layui-layer-btn0').click(function(){
                        location.href = url;
                    })
                }
            });
        }
        function isAPP(){
            if (/(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent)) {  //判断iPhone|iPad|iPod|iOS
                //alert(navigator.userAgent);  
                return "iOS";
            } else if (/(Android)/i.test(navigator.userAgent)) {   //判断Android
                //alert(navigator.userAgent);
                return "Andriod";
            } else {  //pc
                return "pc";
            }
        }
    </script>

    <script id="address_template" type="text/html">
        <?php $form = ActiveForm::begin(['id' => 'address', 'action' => Yii::$app->urlManager->createUrl(['/cart/address'])]); ?>
        <div style="background-color: #FFFFFF; color: #fff; width: 100%; padding-left: 22px; padding-right: 30px; padding-top: 25px;padding-bottom: 40px;">
            <div style="font-size: 16px;color: #252525;text-align: center;margin-bottom: 20px;">Shipping address</div>
            <div class="clearfix" style="display: inline-block;height: 42px;width:100%;margin-bottom: 10px;">
                <div style="float:left;width: 48%;margin-right: 10px;">
                    <input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" type="text" name="first_name" value="{0}" placeholder="Frist Name *" class="must">
                </div>
                <div style="float:right;width: 48%;">
                    <input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" type="text" name="last_name" value="{1}" placeholder="Last Name *" class="must">
                </div>
            </div>
            <div style="width: 100%;margin-bottom: 10px;"><input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" name="company" type="text" value="{2}" placeholder="Company"></div>
            <div style="width: 100%;margin-bottom: 10px;"><input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" name="phone" type="text" value="{3}" placeholder="Phone Number *" class="must"></div>
            <div style="width: 100%;margin-bottom: 10px;"><input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" name="address" type="text" value="{4}" placeholder="Street Address *" class="must"></div>
            <div style="width: 100%;margin-bottom: 10px;"><input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" name="city" type="text" value="{5}" placeholder="City *" class="must"></div>
            <div style="width: 100%;margin-bottom: 10px;"><input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" name="province" type="text" value="{6}" placeholder="Slete/Region/Province *" class="must"></div>
            <div style="width: 100%;margin-bottom: 10px;"><input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" name="zipcode" type="text" value="{7}" placeholder="Zip Code *" class="must"></div>
            <!--<div style="width: 360px;margin-bottom: 10px;height:42px;background-color: #FFFFFF;" class="btn-select" id="btn_select">
                <select class="select_method" style="background-color: #ffffff;border:1px solid #e3e3e5;border-radius: 4px;">
                    <option>Slete/Region/Province *</option>
                    <option>选项二</option>
                    <option>选项三</option>
                    <option>选项四</option>
                    <option>选项五</option>
                </select>
            </div>-->
            <input type="hidden" name="id" value="{9}" />
            <div style="width: 100%;margin-bottom: 10px;height:42px;background-color: #FFFFFF;display: table;margin-top: -10px;" class="btn-select" id="btn_select">
                <select name="country" class="select_country" style="background-color: #ffffff;border:1px solid #e3e3e5;border-radius: 4px;width: 100%;height: 42px;color: black;">
                    <?php foreach ($country as $key => $value) { ?>
                        <option value="<?= $key?>"><?= $value?></option>
                    <?php }?>
                </select>
            </div>
            <div style="width: 360px;margin-bottom: 10px;color:#666666">
                <input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;width: 15px;height: 15px;cursor: pointer;" name="default" type="checkbox" {11} value="{10}">
                Save as the default address
            </div>
            <div><input id="addressSubmit" style="width: 90%;height: 42px;background-color: #ee3e43;border-radius: 4px;font-size: 14px;font-weight: bold;color: #FFFFFF;border: 1px solid;" type="button" value="SUBMIT"></div>
        </div>
        <?php ActiveForm::end(); ?>
    </script>
</div>
