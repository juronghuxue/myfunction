<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);

$this->title = Yii::t('app', 'Security');
$this->params['breadcrumbs'][] = $this->title;

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
</style>

<div class=" col-lg-9 col-md-9 col-sm-12" style="width: 100%;background: #fff">
    <div class="trade_mod1 clearfix">
    <div style="width:100%;height:58px;background:#ffffff;">
        <div class="comment-title" style="width:95%;margin:0 auto;height:56px;line-height:56px;font-size:14px;font-weight:bold;color:#404040;border-bottom:2px solid red;">
            <img src="/theme/new/img/tongxun.png" alt="">
            Newsletter Subscription
        </div>
    </div>
        
        <div class="comment-area clearfix">
            <div class="comment-area-single">
               <p>Newsletter Subscription</p>
               <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <p class="toggle_img">
                    <?php if(Yii::$app->user->identity->is_subscriptions==1):?>
                        <img src="/theme/new/img/my_account/icon-1.png" alt="" >
                    <?php else:?>
                        <img src="/theme/new/img/my_account/weigouxuan.png" alt="" >
                    <?php endif;?>
                    <span>General Subscription</span>
                    <?php if(Yii::$app->user->identity->is_subscriptions==1):?>
                        <?= Html::hiddenInput('isSelect','1', ['id' =>'isSelect']) ?>
                    <?php else:?>
                        <?= Html::hiddenInput('isSelect','0', ['id' =>'isSelect']) ?>
                    <?php endif;?>
                    
                </p>
                <p>
                    <!-- a href="<?= Yii::$app->request->referrer ?>">Back</a> -->
                    <button type="button" style="border: 0px;" class="sav">Save</button>
                </p>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>


<script>
$(function(){
    var subscriptionUrl = '<?=Yii::$app->urlManager->createUrl(['user/subscription'])?>';
    $(".toggle_img img").click(function() {
        if($(this).attr("src")=="/theme/new/img/my_account/weigouxuan.png"){
            $(this).attr("src","/theme/new/img/my_account/icon-1.png");
            $("#isSelect").val(1);
        }else{
            $(this).attr("src","/theme/new/img/my_account/weigouxuan.png");
            $("#isSelect").val(0);
        }
    });
    $(".sav").click(function(){
        layer.msg('Subscribing', {icon: 16,shade: 0.01,time:10000});
        var isSelect = $("#isSelect").val();
        param = {isSelect:isSelect};
        $.post(subscriptionUrl, param, function(data) {
            if (data.state==1) {
                layer.msg('Success', {icon: 1,shade: 0.01,time:2000});
            }else if(data.state==2){
                success=  layer.msg('You have already subscribed', {icon: 6,shade: 0.01,time:1200});
            }else {
                layer.msg('Unsubscribe success', {icon: 1,shade: 0.01,time:1200});
            }
        }, "json");
    });
})
    
</script>
