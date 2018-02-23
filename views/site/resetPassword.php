<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

$this->title = Yii::t('app', 'Reset password');
$this->params['breadcrumbs'][] = $this->title;
$public=Yii::getAlias('@public');

?>
<div class="">
    <div class="container" style="">
        <div class="row">

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
                        <td class="top_shopping_cart">Forgot password</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 40px;">
                <div style="float: left">
                    <img src="<?php echo $public;?>/img/users/pic_notice_tittle.png">
                </div>
                <div style="float: left;font-size: 24px;margin-left: 10px;color: #404040;">
                    <b>Forgot password</b>
                </div>
            </div>

            <!--<h1><?/*= 'Reset password'*/?></h1>

            <p><?/*=  'Please choose your new password:'*/?></p>-->

            <div class="site-reset-password col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-150 mt-40" align="center">
                <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                   <!-- <div class="col-lg-2" style=" margin-top: 8px;float: left;font-size: 14px;color: #404040;">
                        New password:
                        <div style="margin-top: 30px;">Confirm password:</div>
                    </div>-->
                    <div>
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div style="float: left;font-size: 14px;color: #404040;margin-top: 8px;" class="col-lg-6">New password:</div>
                                <div style="float: left;margin-left: -222px;" class="col-lg-6">
                                    <?= $form->field($model, 'password',['inputOptions' => ["placeholder"=>"Please enter your new password..."]])->passwordInput() ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div style="float: left;font-size: 14px;color: #404040;margin-top: 8px;" class="col-lg-6">Confirm password:</div>
                                <div style="float: left;margin-left: -222px;" class="col-lg-6">
                                    <?= $form->field($model, 'password2',['inputOptions' => ["placeholder"=>"Please enter your new password again..."]])->passwordInput() ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="<?php echo Yii::$app->getSession()->hasFlash('success')?>"><!--密码修改-->
                                <?php
                                /*                                if( Yii::$app->getSession()->hasFlash('success') ) {
                                                                    echo \yii\bootstrap\Alert::widget([
                                                                        'options' => [
                                                                            'class' => 'alert-success', //这里是提示框的class
                                                                        ],
                                                                        'body' => Yii::$app->getSession()->getFlash('success'), //消息体
                                                                    ]);
                                                                }
                                                                */?>
                            </div>
                            <div class="form-group">
                                <!-- <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?> -->
                                <?= Html::button('Save', ['class' => 'btn btn-primary','id'=>'save']) ?>
                            </div>
                        </div>
                <?php ActiveForm::end(); ?>
                    </div>

            </span>


        </div>
    </div>
</div>

<style>
    .site-reset-password{border:1px solid #cacacc;margin-left: 13px;box-shadow: 0px 3px 27px #cbcbcd;height: 400px;}
    #reset-password-form{position: absolute; top: 50%;left: 10%;transform: translateY(-50%);width: 90%}
    .control-label{display: none}
    #passwordresetrequestform-email{width: 320px;height: 44px;}
    .form-group button{width: 320px;height: 42px;background-color: #ee3e43}
    .alert-success{width: 320px;}
    .btn-primary{border-color: #ee3e43 !important;}

    #resetpasswordform-password,#resetpasswordform-password2{width: 320px;}


    @media (min-width: 1200px){
        .col-lg-12 {
            width: 98%;
        }
    }

</style>

<script>


    $(".form-group button").hover(function(){
        $(".form-group button").css("background-color","#ee3e43");
    },function(){
        $(".form-group button").css("background-color","#ee3e43");
    });

    $(function(){


        var resetPasswordUrl  = '<?=Yii::$app->urlManager->createUrl(['site/reset-password'])?>?token=<?=$token?>';
        var loginUrl = '<?=Yii::$app->urlManager->createUrl(['site/login'])?>';
        $("#save").click(function(){
            var password = $("#resetpasswordform-password").val();
            param = {'ResetPasswordForm[password]':password};
            $.post(resetPasswordUrl, param, function(data) {
                if (data.state==1) {
                    success = layer.msg('Success', {icon: 1,shade: 0.01,time:2000});
                    setTimeout(function(){
                        //layer.close(success);
                        window.location.href=loginUrl;
                    }, 3000);
                }else {
                    layer.msg('Failed to save the new password', {icon: 2,shade: 0.01,time:1200});
                }
            }, "json");
        });
    })
    /*window.onload = function(){
        jQuery(document).ready(function () {
            $(".field-resetpasswordform-password .control-label").text("password");
        });
    }*/

   /* jQuery(document).ready(function () {
        $(".field-resetpasswordform-password .control-label").text("password");
    });*/
</script>
