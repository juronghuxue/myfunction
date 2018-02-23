<?php
$this->title = Yii::t('app', 'My') . Yii::t('app', 'Coupon');
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
$this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
?>

    <style>
        td img {
            width: 17px;
            height: 18px;
        }
        table tbody tr td{
            text-align: center;
        }
        .person_table th{vertical-align:middle;}
        .header_word-a{width:60%;height:70px;margin:0 auto;padding:30px 0 0px;position:relative;}
        /*.header_word-a>i{width:20%;height:2px;background:red;position:absolute;left:10px;top:68px;}*/
        .header_word-a a{float:left;width:25%;text-align:center;height:40px;line-height:40px;font-size:16px;color:#404040;font-weight:bold;}
        .header_word-a a span{float:right;font-weight:normal;color:#999999;}
        @media screen and (max-width:768px){
            .trade_mod_coupons{margin-top:20px;}
            .header_word-a{width:80%;}
            .header_word-a a{font-size:14px;-font-weight:normal;}
        }
        .gw_num {
            border: 1px solid #dbdbdb;
            width: 99px;
            line-height: 28px;
            overflow: hidden;
            margin-left: 49px;
            margin-top: 6px;
        }
        .gw_num em {
            display: block;
            height: 28px;
            width: 28px;
            float: left;
            color: #7A7979;
            border-right: 1px solid #dbdbdb;
            text-align: center;
            cursor: pointer;
            list-style: none;
            font-style: normal;
            color: #EE3E43;
            font-size: 24px;
            cursor: pointer;
        }
        .gw_num .num {
            display: block;
            float: left;
            text-align: center;
            width: 40px;
            font-style: normal;
            font-size: 14px;
            line-height: 26px;
            border: 0;
            cursor: pointer;
            padding-left:0;
        }
        .gw_num em.add {
            float: right;
            border-right: 0;
            border-left: 1px solid #dbdbdb;
        }
        .gw_num input{
            height: 28px;
        }
        .gift_red{
            width:120px;
            height: 28px;
            background: #ee3e43;
            text-align: center;
            line-height: 28px;
            color: #fff;
            margin-left: 37px;
            margin-top: 8px;
            cursor: pointer;
        }
        .my_point .Coupon-title{
            /*display: block;*/
            float: right;

        }
        .person_table tr td{
            vertical-align:middle;
        }
        .header_word-a a .coupon-line{
            width: 112px;
            height: 2px;
            background: #ee3d43;

            bottom: 2px;
            left: 2px;
            /*display: none;*/
        }
        @media screen and (max-width:768px){
          .trade_mod_coupons{margin-top:20px;}
          .header_word-a{width:80%;}
          .header_word-a a{font-size:14px;-font-weight:normal;}
          .coupon-line{display:none;}
    }
    </style>
    <!-- <div class=" col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 50px"> -->
    <div class="trade_mod_coupons" style="min-height:600px;background:#ffffff;">
        <div class="my_point">
            <p class="order-title" style="width: 95%;margin: 0 auto">
                <img src="/theme/new/img/Coupon/juan.png" alt="">
                <span class="title-left">My Coupons</span>
                <span class="title-right">Available Points:<?= Yii::$app->user->identity->point ?></span>
            </p>
            <div class="header_word-a">
                <a href="<?= Yii::$app->urlManager->createUrl(['user/coupon', 'type' => 1]) ?>">Available <span>|</span></a>
                <a href="<?= Yii::$app->urlManager->createUrl(['user/coupon', 'type' => 2]) ?>">Used<span>|</span></a>
                <a href="<?= Yii::$app->urlManager->createUrl(['user/coupon', 'type' => 3]) ?>">Invalid<span>|</span></a>
                <a href="<?= Yii::$app->urlManager->createUrl(['user/redeem-coupons']) ?>" >Redeem<div class="coupon-line"></div></a>
                <!--<i style=""></i>-->
            </div>
            <!-- <div class="wrap" style=" width: 100%;margin: 20px auto"> -->
            <div class="person_table clearfix;" style=" width: 95%;margin:20px auto;overflow-x:auto;">
                <table class="table table-bordered" style="min-width:800px;width:100%;">
                    <thead>
                    <tr>
                        <th style="vertical-align:middle;">Name</th>
                        <th style="vertical-align:middle;">Description</th>
                        <th style="vertical-align:middle;">Vsonaild Period</th>
                        <th style="vertical-align:middle;">Required Points</th>
                        <th style="vertical-align:middle;">Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($coupons as $coupon){
                        if ($coupon->conditions['group'] == Yii::$app->user->identity->user_group || empty($coupon->conditions['group'])) { ?>
                        <tr>
                            <td style="vertical-align:middle;"><?= $coupon->name ?></td>
                            <td style="vertical-align:middle;"><?= $coupon->description ?></td>
                            <td style="vertical-align:middle;"><?= Yii::$app->formatter->asDate($coupon->ended_at) ?></td>
                            <td style="vertical-align:middle;"><?= $coupon->conditions['point'] ?></td>
                            <td style="vertical-align:middle;">
                                <div class="gw_num">
                                    <em class="jian" onclick="jian(this)">-</em>
                                    <input type="text" data-id="<?= $coupon->id ?>" data-point="<?= $coupon->conditions['point'] ?>" value="0" class="num" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9]+/,'');}).call(this)" onblur="this.v();" maxlength="2">
                                    <em class="add" onclick="add(this)">+</em>
                                </div>
                            </td>
                        </tr>
                    <?php }}?>
                    </tbody>
                </table>
            </div>
            <!-- </div> -->
            <div class="page_conut_gredeem" style="width:100%;height:50px;margin-top:26px;padding:0 24px;">
                <p>
                    <submit id="dosubmit" style="float:right;width:200px;height:36px;background:#ee3d43;color:#ffffff;text-align:center;line-height:36px;border-radius:3px;cursor:pointer;">Submit</submit>
                    <!--<span style="float:right;height:50px;line-height:30px;font-size:12px;padding-right:26px;font-weight:bold;"><i id="items" style="color:#ed3e45;">0</i> items selected</span>-->
                </p>
            </div>

        </div>
    </div>
    <!-- </div> -->
    <script>
        function jian(obj){
            console.log(11);
            var val = Number($(obj).siblings('.num').val());
            if(val <= 0){
                return;
            }else{
                val--;
            }
            $(obj).siblings('.num').val(val);
        }
        function add(obj){
            var val = Number($(obj).siblings('.num').val());
            val++;
            $(obj).siblings('.num').val(val);
        }
        $(function(){
            $("#dosubmit").click(function(){
                var _this = $(this);
                var nums = $(".num");
                var number = 0;
                var point = 0;
                var data = {_csrf:"<?= Yii::$app->request->getCsrfToken()?>"};
                data.param = '';
                $.each(nums, function (i, n) {
                    var num = $(n).val();
                    var p = $(n).data("point");
                    var id = $(n).data("id");

                    number += parseInt(num);
                    if (num > 0) {
                        point += parseInt(p) * num;
                        data.param += id + "-" + num + ":";
                    }
                });

                if (number <= 0) {
                    layer.msg("Please select item!",{icon:0,time:1000});
                    return false;
                }
                // if (confirm("redeem this " + number + " item? you will pay " + point+ " points!")){

                //     $.post("<?= Yii::$app->urlManager->createUrl(['user/redeem-coupons']) ?>", data, function(data){
                //         layer.msg(data.message,{icon:1,time:1000});
                //     }, 'json');
                // }
                var url = "<?= Yii::$app->urlManager->createUrl(['user/redeem-coupons']) ?>";
                var msg = "redeem this " + number + " item? you will pay " + point+ " points!";
                var obj = {};
                obj.msg = msg;
                obj.is_btn = true;
                obj.urltype = {};
                obj.urltype.url = url;
                obj.urltype.type = "POST";
                obj.param = data;
                boomWindow(obj,function(){
                    layer.msg('Success',{icon:1,time:1000});
                });
            });

            function boomWindow(obj,fn){
                var content = '<div>' +
                    '<div style="font-size: 16px;width: 340px;height: 34px;background-color: #ee3e43;display: inline-block;">' +
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
                                            if(typeof fn == 'function'){
                                                fn();
                                            }
                                        }else{
                                            layer.msg(res.message,{icon:0,time:1000});
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

        })
    </script>
<?php
$this->registerJs('
var product = {csrf:"' . Yii::$app->request->getCsrfToken() . '"};
');

$js = <<<JS
// active效果
$(".show_img img").hover(function(){
    $(this).attr("src","/theme/new/img/Coupon/icon-11.png");
},function(){
    $(this).attr("src","/theme/new/img/Coupon/icon-hover.png");
});

$(".header_word a").hover(function() {
   $("this").css("border-bottom","2px solid #ee3e43");
})
$(".del").click(function(){
    if (confirm("Delete this ?")) {
        var link = $(this).data("link");
        $.get(link, {}, function(data){
             if (data.status == 1) {
                $("#coupon" + data.id).fadeOut();
             } else {
                layer.msg("system error!",{icon:0,time:1000});
             }
        }, 'json');
    }

});
$('.header_word-a>a').on('mouseover',function(){
    var index = $(this).index();
    console.log($('.header_word-a>i').css('width'));
    var _left = 30+parseFloat($('.header_word-a>i').css('width'));
     $('.header_word-a>i').animate({'left':_left*(index)+'px'},200);
});
JS;

$this->registerJs($js);

?>