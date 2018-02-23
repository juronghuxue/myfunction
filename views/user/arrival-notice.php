<?php
$this->title = Yii::t('app', 'Consultation');
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
$this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
?>
<style>
    @media screen and (max-width:768px){
      .notice{
         margin-top:20px;
       }
    }
</style>
    <div class="notice" style="width:100%;height:56px;background:#ffffff;">
        <div class="clearfix" style="width:95%;height:100%;margin:0 auto;border-bottom:2px solid red;">
            <p class="" style="width: 100%;line-height:56px;font-weight:bold;color:#404040;font-size:14px;color:#404040;">
                <img src="/theme/new/img/daoda.png" alt="">
                &nbsp;&nbsp;&nbsp;Arrival Notice
            </p>
        </div>
    </div>
<div class="table notice-table" style="width:100%;padding:0 2.5%;overflow:auto;background:#ffffff;height: 648px">

        <table class="table table-bordered" style="min-width:800px;width:100%;margin-top:10px;">
            <thead>
                <tr>
                    <th style="background:#edecf1;">Product Name</th>
                    <th style="background:#edecf1;">Attribute</th>
                    <th style="background:#edecf1;">Arrival Status</th>
                    <th style="background:#edecf1;">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($models as $key=>$val):?>
                <tr>
                    <td class="arrival_img" style="text-align:left;vertical-align:middle;padding-left:30px;">
                        <a href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $val['seourl']]) ?>" target="_blank"><img style="width:90px;height:90px;" src="<?=Yii::$app->params['imgServerAddress'].$val['image']?>"></a>
                        <span class="more_text" style="padding-left:30px;">
                            <a  style="color:#666;" href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $val['seourl']]) ?>" target="_blank"><?=$val['name']?></a>
                        </span>
                    </td>
                    <td style="text-align:center;vertical-align:middle;">
                        <?php if(isset($val['attr'])):?>
                            <?=$val['attr']?>
                        <?php else:?>
                            -
                        <?php endif;?>
                    </td>
                    <td style="text-align:center;vertical-align:middle;">
                        Restocking
                    </td>
                    <td style="text-align:center;vertical-align:middle;color:#ee3d43;cursor: pointer;" class="delProduct" data-id="<?=$val['product_id']?>">Delete</td>
                </tr>
            <?php endforeach;?>

            </tbody>
        </table>
        <div class="pagination-center pagination-outer" style="">
                          <!--   <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination]) ?> -->
                          <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination, 'nextPageLabel' => '>', 'prevPageLabel' => '<']) ?>
        </div>
</div>



<style>
    .layui-layer-btn{text-align: center !important;}
</style>


<?php
$this->registerJs('
var product = {csrf:"' . Yii::$app->request->getCsrfToken() . '"};
');

$js = <<<JS
jQuery(".delProduct").click(function(){
        showMsg();
        var productId = $(this).data("id");
        //$(this).parent().remove();
            param = {
                    productId : productId,
                    _csrf : product.csrf
                };
            $('.layui-layer-btn0').click(function(){
                    //console.log("111");
                    $.post("/goods/del-remind.html", param, function(data) {
                        if(data.status==2){
                           $("[data-id='"+productId+"']").parent().remove();
                            //location.reload();
                        }else{
                            layer.msg("error", {icon: 0,shade: 0.01,time:2000});
                        }
                        
                    }, "json");
                });
});
showMsg = function(){
            var content = '<div>' +
                '<div style="font-size: 16px;width: 340px;height: 34px;background-color: #ee3e43;display: inline-block;">' +
                '<div style="float:left;color: #FFFFFF;padding-left: 15px;margin-top: 5px;">Notice</div>'+
                '</div>' +
                '<div style="width:340px;font-size:16px;">' +
                '<div style="color:#333333;width:100%;height:100%;padding:20px;">' + 'Are you sure you want to delete this？' + '</div>'+
                '</div>'+
                '</div>';
            
            layer.open({
                type: 1
                ,title: false //不显示标题栏
                ,closeBtn: true
                ,shade: 0.8
                ,id: 'LAY_ONE' //设定一个id，防止重复弹出
                ,resize: false
                ,btn: ['YES', 'NO']
                ,content: content
                ,success: function(layero){
                }
            });
        };
JS;

$this->registerJs($js);

?>

<?php /*if (isset($pagination)) echo \yii\widgets\LinkPager::widget(['pagination' => $pagination]) */?><!--

--><?php
/*$this->registerJs('
var product = {csrf:"' . Yii::$app->request->getCsrfToken() . '"};
');

$js = <<<JS
jQuery(".delProduct").click(function(){
    //if(confirm("Are you sure you want to delete this record?"))
     //{
        var productId = $(this).data("id");
        $(this).parent().remove();
        param = {
                productId : productId,
                _csrf : product.csrf
            };
        $.post("/goods/del-remind.html", param, function(data) {
            alert(data.status);
            //location.reload();
        }, "json");
     //}
});
JS;

$this->registerJs($js);

*/?>

