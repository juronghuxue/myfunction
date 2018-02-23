<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
$public=Yii::getAlias('@public');

?>
<!--<div class="site-about">
    <h1><?/*= Html::encode($this->title) */?></h1>

    <p>This is the About page. You may modify the following file to customize its content:</p>

    <code><?/*= __FILE__ */?></code>
</div>-->
<style>
    #leavemessage-name{width: 320px;height: 44px;}
    #leavemessage-email{width: 320px;height: 44px;}
    #leavemessage-message{border-radius: 2px;outline:none;border:1px solid #cbcbcd;resize:none;width: 658px;height: 160px;}
    #submit_msg{width: 146px;height: 42px;
        background-color: #ee3e43;border-radius: 2px;font-size: 14px;font-weight: bold;color: #fff;border-color: #ee3e43;}
</style>
<div class="container about_us" style="background-color: #fff;padding-bottom: 80px;background-color: #f7f7f7;">
    <div class="row" style="background-color: #f7f7f7;">
        <div class="col-lg-12 col-xs-12 col-sm-12>
            <div>
               <table class="go_home" align="left" style="color: #404040;margin-left: 10px;margin-top: 10px;margin-bottom: -23px;">
                <tbody>
                    <tr>
                        <td class="to_home">
                            <a href="/">
                                <img src="<?php echo $public;?>/img/pay_cart/icon_home.png">
                                <span style="margin-left: 15px;">Home ></span>
                            </a>
                        </td>
                        <td class="top_shopping_cart">Contact us</td>
                        <td></td>
                    </tr>
                </tbody>
                </table>
            </div>

            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12" style="margin-top: 40px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="float: left">
                        <img src="<?php echo $public;?>/img/users/pic_notice_tittle.png">
                    </div>
                    <div style="float: left;font-size: 24px;margin-left: 10px; color: #404040;">
                        <b>Leave a Message</b>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-size: 14px;
                color: #404040;margin-top: 20px;margin-bottom: 20px;">
                    We are here to answer any questions you may have about your shopping experience on Elegomall. <br>
                    Reach out to us and we'll respond as soon as we can. Even if there is something you have always wanted to<br>
                    experience and can't find it on Elegomall, let us know and we promise we'll do our best to serve.
                </div>
                <?php $form = \yii\bootstrap\ActiveForm::begin(['id' => 'form-about']); ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: -15px;">
                    <div style="float: left">
                        <?= $form->field($model, 'name',['inputOptions' => ["placeholder"=>"Please enter your name..."]])->label("", ['label' => '',"class"=>""]) ?>
<!--                        <input style="width: 320px;height: 44px;" placeholder="Please enter your name...">
-->                    </div>
                    <div style="float: left;margin-left: 18px;border-radius: 2px;">
                        <?= $form->field($model, 'email',['inputOptions' => ["placeholder"=>"Please enter your email..."]])->label("", ['label' => '',"class"=>""]) ?>

                        <!--<input style="width: 320px;height: 44px;" placeholder="Please enter your email...">-->
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: -15px;margin-bottom: 15px;">
                    <div style="float: left">
                        <?= $form->field($model, 'message',['inputOptions' => ["placeholder"=>"Please leave your message..."]])->label("", ['label' => '',"class"=>""])->textarea() ?>

<!--                        <textarea style="border-radius: 2px;outline:none;border:1px solid #cbcbcd;resize:none;width: 658px;height: 160px;" name="Comment[content]" placeholder="Please leave your message..."></textarea>-->
                    </div>
                </div>
                <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12" align="right">
                    <div class="button" style="width: 146px;margin-top: -20px;">
                        <?= Html::button('Submit', ['class' => 'btn btn-primary','id'=>'submit_msg']) ?>
<!--                        <input type="button" value="Submit" id="submit_msg">-->
                    </div>
                    <!--<input type="submit" value="Submit" style="width: 146px;height: 42px;
                    background-color: #ee3e43;border-radius: 2px;font-size: 14px;font-weight: bold;color: #fff;">-->
                </div>
                <?php \yii\bootstrap\ActiveForm::end(); ?>
            </div>
            <!--<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12" >

            </div>
-->

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div style="float:left;display: inline-block;font-size: 2px;height: 400px;width: 2px;background: #e3e3e5;margin-top: 45px;"></div>
                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12" style="float: left;margin-top: 40px;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div style="float: left">
                                <img src="<?php echo $public;?>/img/users/pic_notice_tittle.png">
                            </div>
                            <div style="float: left;font-size: 24px;margin-left: 10px;color: #404040;">
                                <b>Contact Details</b>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-size: 14px;line-height: 26px;color: #404040;margin-top: 20px;">
                            <div style="float: left;margin-left: -5px;"><img src="<?php echo $public;?>/img/users/icon_phone.png"></div>
                            <div style="float: left;margin-left: 8px;">
                                (0086)0755-82597670-8106<br>
                                (0086)13927418731
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-size: 14px;line-height: 26px;color: #404040;margin-top: 20px;">
                            <div style="float: left;margin-left: -5px;"><img src="<?php echo $public;?>/img/users/icon_email.png"></div>
                            <div style="float: left;margin-left: 8px;">
                                service@elegomall.com<br>
                                business@elegomall.com
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-size: 14px;line-height: 26px;color: #404040;margin-top: 20px;">
                            <div style="float: left;margin-left: -5px;"><img src="<?php echo $public;?>/img/users/icon_adress.png"></div>
                            <div style="float: left;margin-left: 20px;margin-top: -25px;">
                                #4-5,Block 1A, Wutong Island,<br>
                                Intersection of HangKong Road & Shunchang Road,<br>
                                Xixiang Subdistrict,Baoan District,<br>
                                Shenzhen,China
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-size: 14px;line-height: 26px;color: #404040;margin-top: 20px;">
                            <div style="float: left;margin-left: -5px;"><img src="<?php echo $public;?>/img/users/icon_share.png"></div>
                            <div style="float: left;margin-left: 8px;">
                                Or find us on social networks:
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5px;margin-left: 20px;">
                            <div style="float: left"><a href="https://www.facebook.com/ElegoMall" target="_blank"><img src="<?php echo $public;?>/img/users/icon_fb.png"></a></div>
                            <div style="float: left;margin-left: 20px;"><a href="https://twitter.com/ElegoMall" target="_blank"><img src="<?php echo $public;?>/img/users/icon_twitter.png"></a></div>
                            <div style="float: left;margin-left: 20px;"><a href="https://www.instagram.com/elegomall_com/" target="_blank"><img src="<?php echo $public;?>/img/users/icon_ig.png"></a></div>
                            <div style="float: left;margin-left: 20px;"><a href="https://vk.com/1elegomall" target="_blank"><img src="<?php echo $public;?>/img/users/icon_vk.png"></a></div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>
<script>


    $(function(){
        var about  = '<?=Yii::$app->urlManager->createUrl(['site/about'])?>';
        $("#submit_msg").click(function(){
            var name = $("#leavemessage-name").val();
            var email= $("#leavemessage-email").val();
            var msg =  $("#leavemessage-message").val();
            param = {'LeaveMessage[name]':name,'LeaveMessage[email]':email,'LeaveMessage[message]':msg};
            $.post(about, param, function(data) {
                if (data.status==0) {
                    layer.msg(data.msg, {icon: 1,shade: 0.01,time:2000});
                    setTimeout(function () {
                        window.location.href = about;
                    }, 3000);

                }else {
                    layer.msg('Failed to save the new password', {icon: 2,shade: 0.01,time:1200});
                }
            }, "json");
        });
    })


</script>
























