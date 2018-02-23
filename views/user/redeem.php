<?php
use common\models\Region;
$this->title = Yii::t('app', 'My') . Yii::t('app', 'Address');
$this->params['breadcrumbs'][] = $this->title;

$this->title = 'Addresses';
$this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
?>

<style>
    @media screen and (max-width:768px){
      .gift-goods .goods{width:98%;}
}
.header_word a:hover{border-bottom:none;}
</style>

    <!-- <div class=" col-lg-12 col-md-12 col-sm-12"> -->
        <div class="trade_mod clearfix" style="padding-bottom:20px;">
            <div class="my_point">
                <p class="order-title" style="width: 95%;margin: 0 auto;font-weight:bold;color:#404040;">
                    <img src="/theme/new/img/order.jpg" alt="">
                    My Gifts
                </p>
                <div class="header_word">
                    <a href="/user/gifts.html"><span>My Gifts </span></a>|
                    <a href="/user/redeem.html" style="border-bottom:2px solid red"><span>Redeem</span></a>
                </div>
                <div class="gifts_tips clearfix" style="width:95%;height:auto;">
                    <h4>Tips of redeem gifts:</h4>
                    <p>1.Using your points to redeem gift is free, no need to pay extra money;</p>
                    <p>2.You can redeem as many gifts as you can if you have enough points;</p>
                    <p>3.Gifts will be shipped with your latest order, no need to pay more shipping fee.</p>
                </div>
                <div class="gift-goods row clearfix" style="width:95%;margin:0 auto;">
                    
                    <?php foreach($models as $item):?>
                        <div class="col-xs-6 col-md-6 col-sm-6 col-lg-3" style="padding:0;">
                            <div class="goods" style="margin-left:0;height:auto;padding-bottom:10px;">
                                <a href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $item['seourl']]) ?>" target="_blank"><img src="<?=Yii::$app->params['imgServerAddress'].$item['image']?>" alt=""></a>
                                <div class="gift_title">
                                    <p style="height:28px;"><a style="color:#333333;line-height:14px;height:28px;text-align:center;display:-webkit-box;display:-moz-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;-moz-line-clamp:2;overflow:hidden;" href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $item['seourl']]) ?>" target="_blank"><?=$item['name']?></a>
                                    </p>
                                    <p style="color:#323232;">
                                        <?=$item['points']?> Points
                                    </p>
                                </div>
                                <div class="gw_num">
                                    <em class="jian">-</em>
                                    <input type="text" value="1" class="num" />
                                    <em class="add">+</em>
                                </div>
                                <div class="gift_red" data-id = "<?=$item['id']?>">
                                    Redeem it
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
                <?php if (isset($pagination)) echo \yii\widgets\LinkPager::widget(['pagination' => $pagination]) ?>
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

<?php
$giftRedeem= Yii::$app->urlManager->createUrl(['user/gift-redeem']);
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
            jQuery(".gift_red").click(function(){
                // if(confirm("Are you sure you want to change it?")){
                //     var id = $(this).data("id");
                //     var num = $(this).parent().find('.num').val();
                //     param = {
                //         productId : id,
                //         number : num,
                //         _csrf : product.csrf
                //     };
                //     if(num>0){
                //         $.post("{$giftRedeem}?id=" + id, param, function(data) {
                //             if(data.status==1){
                //                 layer.msg("Successful exchange",{icon:1,time:1000});
                //             }else{
                //                 layer.msg("The exchange failed and the points were not enough",{icon:0,time:1000});
                //             }
                //         }, "json");
                //     }else{
                //         layer.msg("Please enter the correct quantity",{icon:0,time:1000});
                //     }
                    
                // }
                var _this = $(this);
                var id = $(this).data("id");
                var num = $(this).parent().find('.num').val();
                var param = {
                        productId : id,
                        number : num,
                        _csrf : product.csrf
                    };
                var url = "{$giftRedeem}?id=" + id;
                var msg = "Are you sure you want to change it?";
                var obj = {};
                obj.msg = msg;
                obj.is_btn = true;
                obj.urltype = {};
                obj.urltype.url = url;
                obj.urltype.type = "POST";
                obj.param = param;
                boomWindow(obj);
            })
});
function boomWindow(obj,fn){
                var content = '<div>' +
                    '<div style="font-size: 16px;width: 360px;height: 34px;background-color: #ee3e43;display: inline-block;">' +
                    '<div style="float:left;color: #FFFFFF;padding-left: 15px;margin-top: 5px;">Notice</div>'+
                    '</div>' +
                    '<div style="width:340px;font-size:16px;">' +
                    '<div style="color:#333333;width:100%;height:100%;padding:20px;">' + obj.msg + '</div>'+
                    '</div>'+
                    '</div>';

                var btn1 = [];
                if (obj.is_btn) {
                    btn1 = ['YES', 'NO'];
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
                        btn.find('.layui-layer-btn0').click(function(){
                            if(obj.urltype){
                                $.ajax({
                                    url:obj.urltype.url,
                                    type:obj.urltype.type,
                                    data:obj.param,
                                    dataType:'json',
                                    success:function(res){
                                        console.log(res);
                                        if(res.status == 1){
                                            layer.msg("SUCCESS", {icon: 1, time: 1000});
                                            if(typeof fn == 'function'){
                                                fn();
                                            }
                                        }else{
                                            layer.msg('No enough coupon',{icon:0,time:1000});
                                        }
                                    },
                                    error:function(res){
                                        layer.msg('error',{icon:0,time:1000});
                                    }
                                });
                            }else{
                                return;
                            }
                        })
                    }
                });
            };
jQuery(".default").click(function(){
    var link = $(this).data('link');
    $.get(link, function(data, status) {
        if (status == "success") {
            location.reload()
        }
    });
});
JS;

$this->registerJs($js);
