<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = Yii::t('app', 'My') . Yii::t('app', 'Sales Reps');
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
$this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
$this->registerCssFile('@web/css/comment.css', ['depends' => \frontend\assets\AppAsset::className()]);
$public=Yii::getAlias('@public')
?>
<style>
    .main{width: 100%;height: 290px;border:1px solid #e3e3e5;background-color: #FFFFFF;padding-left: 20px;padding-right: 20px;overflow:auto;}
    /*.top{display: inline-block; margin-top: 5px;padding-top: 10px;padding-bottom: 10px;margin-bottom: -20px;}*/
    /*.top div{float: left}*/
    .font{font-size: 16px;font-weight: bold;}
    .lin{display: inline-block;width: 810px;height: 2px;background-color: #ee3e43}
    .recomm{display: inline-block;font-size: 16px;margin-left: 85px;margin-top: 48px;}
    .recomm div{float: left}

    .others{display: inline-block;font-size: 16px; margin-left: 85px;margin-top: 32px;}
    .others div{float: left}
    .select_r{width: 436px;height: 36px;background-color: #FFFFFF}
    .save_btt{width: 150px;height: 28px;background-color: #ee3e43;border: 1px solid #ee3e43;border-radius: 2px;}
    .name{margin-left: 10px;}
    .img_s{margin-left: 30px;}

</style>
<style>
    .form button.btn {
        width: 108px;
        height: 38px;
    }
    li select{
        margin-left: 25px;
    }
    .addr-form li label{
        width: 120px;
    }
</style>
<script>
    jQuery(document).ready(function () {
        //单选
        $('.img_s').click(function () {
            var img_src=$(this).children().attr('src');
            if(img_src=="<?php echo $public;?>/img/my_account/icon-4.png"){
                $(this).siblings().children().attr("src","<?php echo $public;?>/img/my_account/icon-4.png");
                $(this).children().attr('src',"<?php echo $public;?>/img/my_account/icon-1.png");
                var sid = $(this).data('id');
                $("#sid").val(sid);
            }else{
                $(this).children().attr('src',"<?php echo $public;?>/img/my_account/icon-4.png");
                $("#sid").val(0);
            }

        });
    });
</script>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 main">
        <div style="width:100%;height:58px;">
            <div class="top" style="width:95%;margin:0 auto;height:56px;line-height:56px;font-size:14px;font-weight:bold;color:#404040;border-bottom:2px solid red;">
                <img src="<?php echo $public;?>/img/my_account/xiaoshou.png">&nbsp;&nbsp;&nbsp;
                Choose My Sale Representative
            </div>
        </div>
    
 
<?php if(!empty($salesRepsInfo)):?>
<?=$salesRepsInfo->dealer_desc?>
<?php else:?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="recomm">
        <div>Recommended for you :</div>
        <?php $num = 0?>
        <?php $salesReps = '';?>
        <?php foreach($salesRepsRecommendData as $key=>$val):?>
            <!-- <?php if($num==0):?>
                <?php $num = 1?>
                <?php $salesReps = $key;?>
                <div class="img_s" data-id="<?=$key?>"><img src="<?php echo $public;?>/img/my_account/icon-1.png"></div>
                <div class="name"><?=$val?></div>
            <?php else:?>
                <div class="img_s" data-id="<?=$key?>"><img src="<?php echo $public;?>/img/my_account/icon-4.png"></div>
                <div class="name"><?=$val?></div>
            <?php endif;?> -->
            <div class="img_s" data-id="<?=$key?>"><img src="<?php echo $public;?>/img/my_account/icon-4.png"></div>
            <div class="name"><?=$val?></div>
        <?php endforeach;?>
        <?= Html::hiddenInput('sid','', ['id' =>'sid']) ?>
        <!-- <div class="img_s"><img src="<?php echo $public;?>/img/my_account/icon-4.png"></div>
        <div class="name">chenwei</div>
        <div class="img_s"><img src="<?php echo $public;?>/img/my_account/icon-4.png"></div>
        <div class="name">chaoxiu</div>
        <div class="img_s"><img src="<?php echo $public;?>/img/my_account/icon-4.png"></div>
        <div class="name">xiaochan</div> -->
    </div>
    <div class="others">
        <div style="padding-top: 15px;">Or choose others:</div>
        <div style="margin-left: 75px;">
            <!-- <select class="select_r">
                <option> </option>
                <option>选项二</option>
                <option>选项三</option>
                <option>选项四</option>
                <option>选项五</option>
            </select> -->
            <?=Html::dropDownList('others','',$salesRepsData,['prompt' => 'Please select'],['class'=>'select_r'])?>
        </div>
    </div>
    <div class="save" align="center" style="margin-top: 20px;">
        <button style="color: #FFFFFF;font-size: 16px;" class="save_btt" type="submit" value="save">
            Save</button>
    </div>
    <?php ActiveForm::end(); ?>
<?php endif;?>
</div>

<?php
$this->registerJs('
var product = {csrf:"' . Yii::$app->request->getCsrfToken() . '"};
');

$js = <<<JS
$(function() {
        $('input[type="checkbox"]').on('change', function() {
            if($(this).is(':checked')==true){
                $('input[type="checkbox"]').prop('checked', false);
                $(this).prop('checked', true);
            }
        });
    });
JS;

$this->registerJs($js);

?>