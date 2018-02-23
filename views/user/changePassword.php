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


<div class=" col-lg-9 col-md-9 col-sm-12" style="width: 100%">
    <div class="trade_mod1 clearfix">
        <div class="comment-title">
            <span>Review Order</span>
        </div>
        <div class="comment-area clearfix">
            <div class="comment-area-single">
               <p>Newsletter Subscription</p>
                <p class="toggle_img">
                    <img src="/theme/new/img/my_account/weigouxuan.png" alt="" >
                    <span>Seneral Subscription</span>
                </p>
                <p>
                    <a href="">Back</a>
                    <a href="" class="sav">save</a>
                </p>
            </div>
        </div>
    </div>
</div>


<script>
    $(".toggle_img img").click(function() {
        $(this).attr("src","/theme/new/img/my_account/icon-1.png");
        console.log("111");
    })
</script>
