<?php
$this->title = Yii::t('app', 'My') . Yii::t('app', 'Coupon');
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
$this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
?>
<!-- <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination, 'nextPageLabel' => '>', 'prevPageLabel' => '<']) ?> -->
<style>
    td img {
        width: 17px;
        height: 18px;
    }
    table tbody tr td{
        text-align: center;
    }
    .person_table th{vertical-align:middle;}
    .person_table .td{vertical-align:middle;}
    .header_word-a{width:60%;height:70px;margin:0 auto;padding:30px 0 0px;position:relative;}
    /*.header_word-a>i{width:20%;height:2px;background:red;position:absolute;left:10px;top:68px;}*/
    .header_word-a a{float:left;width:25%;text-align:center;height:40px;line-height:40px;font-size:16px;color:#404040;font-weight:bold;}
    .header_word-a a span{float:right;font-weight:normal;color:#999999;}
    .header_word-a a .coupon-line{
        width: 112px;
        height: 2px;
        background: #ee3d43;
        bottom: 2px;
        left: 2px;
        /*display: none;*/
    }
    .trade_mod_coupons .order-title-2 .coupon-number{
        float: right;
        /*color: #ddd;*/
    }
    @media screen and (max-width:768px){
      .trade_mod_coupons{margin-top:20px;}
      .header_word-a{width:80%;}
      .header_word-a a{font-size:14px;-font-weight:normal;}
      .coupon-line{display:none;}
    }

</style>
    <!-- <div class=" col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 50px"> -->
        <div class="trade_mod_coupons" style="min-height:600px;background:#ffffff;padding-bottom: 20px;">
            <div class="my_point">
                <p class="order-title-2" style="width: 95%;margin: 0 auto;height:56px;line-height:56px;font-size:14px;font-weight:bold;color:#404040;border-bottom:2px solid red;">
                    <img src="/theme/new/img/Coupon/juan.png" alt="">&nbsp;&nbsp;&nbsp;
                     My Coupons
                       <span class="coupon-number">
                           Available Points:<?=Yii::$app->user->identity->point?>
                       </span>
                </p>
               <div class="header_word-a">
                   <a href="<?= Yii::$app->urlManager->createUrl(['user/coupon', 'type' => 1]) ?>">
                       Available <span>|</span>
                       <?php if (Yii::$app->controller->action->id == 'coupon' && (!isset($_GET['type']) || $_GET['type'] == 1)){?>
                       <div class="coupon-line"></div>
                        <?php } ?>
                   </a>
                   <a href="<?= Yii::$app->urlManager->createUrl(['user/coupon', 'type' => 2]) ?>">
                       Used<span>|</span>
                       <?php if (Yii::$app->controller->action->id == 'coupon' && (isset($_GET['type']) && $_GET['type'] == 2)){?>
                           <div class="coupon-line"></div>
                       <?php } ?>
                   </a>
                   <a href="<?= Yii::$app->urlManager->createUrl(['user/coupon', 'type' => 3]) ?>">
                       Invalid<span>|</span>
                       <?php if (Yii::$app->controller->action->id == 'coupon' && (isset($_GET['type']) && $_GET['type'] == 3)){?>
                           <div class="coupon-line"></div>
                       <?php } ?>
                   </a>
                   <a href="<?= Yii::$app->urlManager->createUrl(['user/redeem-coupons']) ?>" >
                       Redeem
                   </a>
                   <!-- <i style=""></i> -->
               </div>
                <!-- <div class="wrap" style=" width: 100%;margin: 20px auto"> -->
                    <div class="person_table clearfix;" style=" width: 95%;margin:20px auto;overflow-x:auto;">
                        <table class="table table-bordered" style="min-width:800px;width:100%;">
                            <thead>
                            <tr>
                                <th style="vertical-align:middle;">Name</th>
                                <th style="vertical-align:middle;">Description</th>
                                <th style="vertical-align:middle;">Valid Period</th>
                                <th style="vertical-align:middle;">Status</th>
                                <th style="vertical-align:middle;">Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($models as $item) { ?>
                                <tr id="coupon<?= $item->id ?>">
                                    <td style="vertical-align: middle"><?= $item->couponType->name ?></td>
                                    <td class="td"><?= $item->couponType->description ?></td>
                                    <td class="td"><?= Yii::$app->formatter->asDate($item->couponType->started_at) ?> - <?= Yii::$app->formatter->asDate($item->ended_at) ?></td>
                                    <td class="td"><?php if (!isset($_GET['type']) || $_GET['type'] == 1) {echo "Available";}else{echo "Unavailable";}?></td>
                                    <td class="show_img td"><img src="/theme/new/img/Coupon/icon-hover.png" class="del" alt="delete" data-link="<?= Yii::$app->urlManager->createUrl(['user/coupon-del', 'id' => $item->id]) ?>"></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <!-- </div> -->
                <div class="pagination-outer pagination-center">
                   <!--  <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination]) ?> -->
                    <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination, 'nextPageLabel' => '>', 'prevPageLabel' => '<']) ?>
                </div>

            </div>
    </div>
<!-- </div> -->
<!-- <script>
   $(function(){
        $(".header_word-a a").click(function(){
            $(this).find(".coupon-line").show().parent("a").siblings("a").find(".coupon-line").hide();
        })
   })
</script> -->
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
    // if (confirm("Delete this ?")) {
        var link = $(this).data("link");
        var _this = $(this);
        console.log(link);
    //     $.get(link, {}, function(data){
    //          if (data.status == 1) {
    //             $("#coupon" + data.id).fadeOut();
    //          } else {
    //             alert("system error!");
    //          }
    //     }, 'json');
    // }
        var msg = 'Are you sure you want to delete this?';
        var is_btn = true;
        var obj = {};
        obj.msg = msg;
        obj.is_btn = is_btn;
        obj.urltype = {};
        obj.urltype.url = link;
        obj.urltype.type = "GET";
        obj.param = {};
  boomWindow(obj,function(){
    _this.closest('tr').remove();
  });

});
$('.header_word-a>a').on('mouseover',function(){
    var index = $(this).index();
    console.log($('.header_word-a>i').css('width'));
    var _left = 30+parseFloat($('.header_word-a>i').css('width'));
     $('.header_word-a>i').animate({'left':_left*(index)+'px'},200);
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
                              layer.msg('error',{icon:0,time:1000});
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
JS;

$this->registerJs($js);

?>