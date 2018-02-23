<?php
$this->title = Yii::t('app', 'My') . Yii::t('app', 'Address');
$this->params['breadcrumbs'][] = $this->title;

$this->title = 'Addresses';
$this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
//$this->registerJsFile('@web/theme/new/js/layer/mobile/layer.js', ['depends' => \frontend\assets\AppAsset::className()]);
$this->registerJsFile('@web/js/jquery.form.js', ['depends' => \frontend\assets\AppAsset::className()]);
?>
    <style>
        .comment-title span{
            font-size: 14px;
            color: #ee3e43;
            padding: 5px;
            font-weight: bold;
            margin-top: 5px;
            display: inline-block;
        }
        .comment-title{
            border-bottom: 2px solid #ee3e43;
        }
        .comment-area .comment-area-single>img{
            /*margin-left: 2%;*/
            float:right;
            margin-top: 20px;
            /*margin-left: 50px；*/
        }
        
    </style>
        <div class="trade_mod1 clearfix">
            <div style="height:58px;width:100%;background:#ffffff;">
                <div class="comment-title">
                    <img class="edit" src="/theme/new/img/Address Book/Book.png">&nbsp;&nbsp;&nbsp;
                    Address Book
                </div>
            </div>
            <!-- 没有地址 -->
            <?php if(count($models) <= 0) {?>
            <div class="comment-area clearfix" style="">
                <div class="comment-area-single clearfix" style="margin-left:2%;margin-right:2%; padding: 0px;">
                    <img class="edit" src="/theme/new/images/Address-Book.png" alt="" style="float: left;">
                </div>
            </div>
            <?php } else {?>
                <!-- 有地址 -->
            <?php $default = array_shift($models); ?>
            <div class="clearfix comment-area ">
                <div class="comment-area-single clearfix" style="margin-left:2%;margin-right:2%; padding: 0px;">
                    <img class="edit" src="/theme/new/images/Address-Book.png" alt="">
                    <div class="address-book">
                        <div class="title">
                            <span><?= $default['consignee'] ?></span>
                            <div class="title-spn" data-id="<?=$default->id ?>">
                                <img class="default" src="/theme/new/images/aount-icon/home.png" alt="">
                                <img class="edit" src="/theme/new/images/aount-icon/pen.png" alt="">
                                <!--<img src="/theme/new/img/Address Book/lajitong.jpg" alt="">-->
                            </div>
                        </div>
                        <div class="content">
                            <p><?= $default->address?></p>
                            <p><?= $default->city?>,<?= $default->province?></p>
                            <p><?= $default->country ? $default->country0->name : ''?></p>
                            <p><?=$default->phone ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="line"></div>
            <div class="clearfix address">
                <?php foreach ($models as $address) {?>
                <div class="address-book">
                    <div class="title" >
                        <span><?= $address['consignee'] ?></span>
                        <div class="title-spn" data-id="<?=$address->id ?>">
                            <img class="default" src="/theme/new/images/aount-icon/home_2.png" alt="">
                            <img class="edit" src="/theme/new/images/aount-icon/pen.png" alt="">
                            <img class="del" src="/theme/new/images/aount-icon/iacon_2.png" alt="">
                        </div>
                    </div>
                    <div class="content">
                        <p><?= $address->address?></p>
                        <p><?= $address->city?>,<?= $address->province?></p>
                        <p><?= $address->country ? $address->country0->name : ''?></p>
                        <p><?=$address->phone ?></p>
                    </div>
                </div>
                <?php }?>
            </div>
            <?php }?>
        </div>
<script>
    jQuery(document).ready(function () {
        //修改
        $(".edit").click(function () {
            var id = $(this).parent().data("id");
            var html = $("#address_template").html();
            if (parseInt(id) > 0) {
                $.ajax({
                    type:'get',
                    dataType:'json',
                    url:"<?= Yii::$app->urlManager->createUrl(['/address/view']) ?>",
                    data : {'id' : id},
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
                            $("input[name='default']").prop("checked");
                        }
                    },
                    error:function (){
                        showMsg("获取地址方式异常！");
                    }
                });
            } else {
                html = html.format('','','','','','','','','','');
                addressShow(html);
            }

        });

        function addressShow(html){
            layer.open({
                type: 1,
                title: false //不显示标题栏
                // ,closeBtn: true
                ,area: '425px'
                ,shade: 0.8
                ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
                ,resize: false
                //,btn: ['火速围观', '残忍拒绝']
    //                            ,btnAlign: 'c'
    //                            ,moveType: 0 //拖拽模式，0或者1
                ,
                content : html,
                success: function(layero){
                    
                }
            });
        }


        //默认
        $(".default").click(function (){
            var id = $(this).parent().data("id");
            var data = {};
            data.id = id;
            data._crsf = "<?= Yii::$app->request->getCsrfToken() ?>";
            $.get("<?=Yii::$app->urlManager->createUrl(['/address/default'])?>", data,function(d){
                if (d.status == 1) {
                    location.reload();
                }
            }, 'json');

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
                url: "<?= Yii::$app->urlManager->createUrl(['/address/update']) ?>",
                // 请求方式
                type: "post",
                // 服务器响应的数据类型
                dataType: "json",
                // 请求成功时执行的回调函数
                //data: $("#uploadForm1").serialize(),
                success: function(data, status, xhr) {
                    if (data.status == 1) {
                        layer.closeAll();
                        location.reload();
                    } else {
                        alert(data.message);
                    }


                }
            };

            $("#address").ajaxSubmit(options);

        });

        //删除
        $(".del").click(function(){
            var id = $(this).parent().data("id");
            var _this = $(this);
            var data = {};
            data.id = id;
            // if(confirm("delete ?")) {
            //     $.get("<?= Yii::$app->urlManager->createUrl(['/address/delete'])?>", {id:id});
            //     location.reload();
            // }
            var url = "<?= Yii::$app->urlManager->createUrl(['/address/delete'])?>";
            boomWindow('Are you sure want to delete this?',true,url,_this,data);
        });
        
    });
    function boomWindow(msg,is_btn,url,_this,data){
            var content = '<div>' +
                '<div style="font-size: 16px;width: 340px;height: 34px;background-color: #ee3e43;display: inline-block;">' +
                '<div style="float:left;color: #FFFFFF;padding-left: 15px;margin-top: 5px;">Notice</div>'+
                '</div>' +
                '<div style="width:340px;font-size:16px;">' +
                '<div style="color:#333333;width:100%;height:100%;padding:20px;">' + msg + '</div>'+
                '</div>'+
                '</div>';

            var btn1 = [];
            if (is_btn) {
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
                    var btn = layero.find('.layui-layer-btn0').eq(0);
                    btn.click(function(){
                        $.get(url, data, function(data){
                            console.log(data);
                            data = JSON.parse(data);
                            if(data.status == 1){
                                _this.closest('.address-book').remove();
                            }
                        });
                    })
                }
            });
        }

    

    String.prototype.format=function()
    {
        if(arguments.length==0) return this;
        for(var s=this, i=0; i<arguments.length; i++)
            s=s.replace(new RegExp("\\{"+i+"\\}","g"), arguments[i]);
        return s;
    };

</script>
    <script id="address_template" type="text/html">
        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'address', 'action' => Yii::$app->urlManager->createUrl(['/address/update'])]); ?>
        <div align="center" style="background-color: #FFFFFF;color: #fff;width: 425px; padding-left: 30px; padding-right: 20px;padding-top: 25px;padding-bottom: 40px;">
            <div style="font-size: 16px;color: #252525;text-align: center;margin-bottom: 20px;">Shipping address</div>
            <div style="display: inline-block;height: 42px;width:360px;margin-bottom: 10px;">
                <div style="float:left;width: 175px;margin-right: 10px;">
                    <input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" type="text" name="first_name" value="{0}" placeholder="Frist Name *" class="must">
                </div>
                <div style="float:left;width: 175px;">
                    <input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" type="text" name="last_name" value="{1}" placeholder="Last Name *" class="must">
                </div>
            </div>
            <div style="width: 360px;margin-bottom: 10px;"><input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" name="company" type="text" value="{2}" placeholder="Company"></div>
            <div style="width: 360px;margin-bottom: 10px;"><input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" name="phone" type="text" value="{3}" placeholder="Phone Number *" class="must"></div>
            <div style="width: 360px;margin-bottom: 10px;"><input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" name="address" type="text" value="{4}" placeholder="Street Address *" class="must"></div>
            <div style="width: 360px;margin-bottom: 10px;"><input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" name="city" type="text" value="{5}" placeholder="City *" class="must"></div>
            <div style="width: 360px;margin-bottom: 10px;"><input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" name="province" type="text" value="{6}" placeholder="Slete/Region/Province *" class="must"></div>
            <div style="width: 360px;margin-bottom: 10px;"><input style="border: 1px solid #e3e3e5;background-color:#FFFFFF;" name="zipcode" type="text" value="{7}" placeholder="Zip Code *" class="must"></div>
            <input type="hidden" name="id" value="{9}" />
            <div style="width: 360px;margin-bottom: 10px;height:42px;background-color: #FFFFFF;display: table;margin-top: -10px;" class="btn-select" id="btn_select">
                <select name="country" class="select_country" style="background-color: #ffffff;border:1px solid #e3e3e5;border-radius: 4px;width: 360px;height: 42px;color: black;">
                    <?php foreach ($country as $key => $value) { ?>
                        <option value="<?= $key?>"><?= $value?></option>
                    <?php }?>
                </select>
            </div>
            <div><input id="addressSubmit" style="width: 360px;height: 42px;background-color: #ee3e43;border-radius: 4px;font-size: 14px;font-weight: bold;color: #FFFFFF;border: 1px solid;" type="button" value="SUBMIT"></div>
        </div>
        <!-- <span id="close_btns_zxh" class="layui-layer-setwin"><a class="layui-layer-ico layui-layer-close layui-layer-close2" href="javascript:;"></a></span> -->
        <?php \yii\widgets\ActiveForm::end(); ?>
    </script>
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

JS;


$this->registerJs($js);
