<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

$this->title =  'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
$public=Yii::getAlias('@public');


?>


<div class="container">
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
            <div style="float: left;font-size: 24px;margin-left: 10px;color: #404040">
                <b>Forgot password</b>
            </div>
        </div>
        <div class="site-request-password-reset col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-150 mt-40" align="center">
            <!--<h1><?/*= Html::encode($this->title) */?></h1>

            <p>Please fill out your email. A link to reset password will be sent there.</p>
-->



            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                <div>
                    <div class="col-lg-2" style=" margin-top: 31px;float: left;/*position: absolute;left: -20%;top: 23%;*/font-size: 14px;color: #404040;">Email:</div>
                    <div style="float: left;">
                        <?= $form->field($model, 'email',['inputOptions' => ["placeholder"=>"Please enter your email here..."]])->label("", ['label' => '',"class"=>""]) ?>
                        <div class="alert_emails">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <div>Success. We have sent a reset request to your email, please click the link to reset</div>
                        </div>
                        <div class="form-group">
                            <!--<?= Html::submitButton( 'SUBMIT', ['class' => 'btn btn-primary']) ?>-->
                            <?= Html::button('SUBMIT', ['class' => 'btn btn-primary','id'=>'save']) ?>
                            <?= Html::button('SUBMIT', ['class' => 'btn btn-primary','id'=>'hide']) ?>
                        </div>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>


        </div>
    </div>
</div>
<style>
    #hide{display: none;background-color: #d9d9d9 !important;border-color: #d9d9d9 !important;}
    .alert_emails{padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;width: 320px;color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6;display: none;}
    .site-request-password-reset{width:100%;border:1px solid #cacacc;-margin-left: 13px;box-shadow: 0px 3px 27px #cbcbcd;-height: 400px;padding:200px 0;}
    #request-password-reset-form{position: absolute; top: 50%;left: 34%;transform: translateY(-50%);}
    //.control-label{display: none}
    #passwordresetrequestform-email{width: 320px;height: 44px;}
    .form-group button{width: 320px;height: 42px;background-color: #ee3e43}
    .alert-success{width: 320px;}
    .btn-primary{border-color: #ee3e43 !important;}


    @media (min-width: 1200px){
        .col-lg-12 {
            width: 98%;
        }
    }

</style>
<script>
    $(this).keydown( function(e) {
        var key = window.event?e.keyCode:e.which;
        if(key.toString() == "13"){
            return false;
        }
    });

    $(".form-group button").hover(function(){
        $(".form-group button").css("background-color","#ee3e43");
    },function(){
        $(".form-group button").css("background-color","#ee3e43");
    });

    $(".close").click(function () {
        $(".alert_emails").hide();
    });


     $(function(){
         var request_email  = '<?=Yii::$app->urlManager->createUrl(['site/request-password-reset'])?>';
         $("#save").click(function(){
             $("#save").hide();
             $("#hide").show();
             layer.load(0, {shade: false});
             setTimeout(function () {
                 $('.layui-layer.layui-layer-loading.layer-anim').remove();
                 var email = $("#passwordresetrequestform-email").val();
                 param = {'PasswordResetRequestForm[email]':email};
                 $.post(request_email, param, function(data) {
                     if (data.status==1) {
                         $('.ayui-layer-loading.layer-anim').remove();
                         $(".alert_emails").show();
                         layer.msg('Success', {icon: 1,shade: 0.01,time:2000});
                         setTimeout(function () {
                             location.reload();
                         },3000);

                     }else if(data.status==0){
                         $('.ayui-layer-loading.layer-anim').remove();
                         layer.msg(data.msg, {icon: 0,shade: 0.01,time:2000});
                         location.reload();
                     }else {
                         $('.ayui-layer-loading.layer-anim').remove();
                         layer.msg('Failed to save the new password', {icon: 2,shade: 0.01,time:1200});
                         location.reload();
                     }
                 }, "json");
             },5000);
         });

     })
var UNIT_TYPE = isAPP();
if(UNIT_TYPE !='pc'){
    $('#request-password-reset-form').css({'left':'0','text-align':'center'});
    $('.site-request-password-reset').css({'height':'200px'});
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
    };
}
</script>

<script>

    /*jQuery(document).ready(function () {
        $(".form-group").click(function () {
            var a=
//    //echo Yii::$app->getSession()->hasFlash('success')?>//;
            console.log(a);
                if(a==1){
                    layer.msg("SUCEESS",{icon:1,time:1000});
                }else{
                    layer.msg("ERROR",{icon:0,time:1000});
                }
        });

    });*/
</script>

























