<?php
use common\models\Comment;
use common\models\Order;
/* @var $this yii\web\View */
// $this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
// $this->registerCssFile('@web/css/favorite.css', ['depends' => \frontend\assets\AppAsset::className()]);

// $this->title = Yii::t('app', 'User Center');
// $this->params['breadcrumbs'][] = $this->title;

?>
<link type="text/css" rel="stylesheet" href="/theme/new/css/user-personal.css" />
<div class="trade_mod1 clearfix">
    <div class="personal-center">
        <div class="personal-centerWrap">  
        	<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="text-align:right;"> <!-- personal-centerPic -->
					<img src="/theme/new/img/nologin.png" />
                	<input type="hidden" style="height:100%;width:120px;">
            	</div>
	            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 personal-centerIntroc"> <!-- personal-centerIntroc -->
	            	<p class="personal-name"><?= Yii::$app->user->identity->username ?></p>
	            	<p class="personal-info"></p>
	            	<p class="personal-level" data-group="<?= Yii::$app->user->identity->user_group ?>"><img src="/theme/new/img/group<?= Yii::$app->user->identity->user_group ?>.png" /></p>
	            </div>
        	</div>
        </div>
    </div>
    <div class="row select" style="margin-top:20px;width:90%;margin:20px auto 0;">
    	<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
    		<a href="<?= Yii::$app->urlManager->createUrl(['user/point-log']) ?>"><img src="/theme/new/img/icon-1.jpg" /></a>
    		<p class="p1" style="margin-bottom:0;">My Points</p>
    		<p class="p2"><?= Yii::$app->user->identity->point ?></p>
    	</div>
    	<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
			<a href="<?= Yii::$app->urlManager->createUrl(['order/index', 'status' => \common\models\Order::PAYMENT_STATUS_UNPAID]) ?>"><img src="/theme/new/img/icon-4.jpg" /></a>
    		<p class="p1" style="margin-bottom:0;">Waiting for payment</p>
    		<p class="p2"><?= $orderTotal['unpay'] ?></p>
    	</div>
    	<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
    		<a href="<?= Yii::$app->urlManager->createUrl(['order/index', 'status' => \common\models\Order::SHIPMENT_STATUS_SHIPPED]) ?>"><img src="/theme/new/img/icon-3.jpg"/></a>
    		<p class="p1" style="margin-bottom:0;">Shipping</p>
    		<p class="p2"><?= $orderTotal['shipped'] ?></p>
    	</div>
    	<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
    		<a href="<?= Yii::$app->urlManager->createUrl(['comment/index']) ?>"><img src="/theme/new/img/icon-2.jpg" /></a>
    		<p class="p1" style="margin-bottom:0;">Waiting For reviews</p>
    		<p class="p2"><?= $orderTotal['received'] ?></p>
    	</div>
    </div>
    <div class="row personal-table" style="margin-top:50px;">	
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<table class="table table-bordered">
		  		<caption class="clearfix">
		  			<span class="recend-orders">Recent Orders</span>
		  			<span class="all"><a  href="<?= Yii::$app->urlManager->createUrl(['order/index']) ?>">View All<i>+</i></a></span>
		  		</caption>
		  		<thead>
		    		<tr>
		      			<th>Order</th>
		      			<th>Date</th>
		      			<th>Order Total</th>
		      			<th>Status</th>
		      			<th width="160">Tracking Number</th>
		      			<th colspan="3">Action</th>
		    		</tr>
		  		</thead>
				<tbody>
				<?php foreach ($orders as $item) { ?>
					<tr>
						<td><a href="<?= Yii::$app->urlManager->createUrl(['order/view', 'id' => $item->id]) ?>" target="_blank"><?= $item->sn ?></a></td>
						<td><?= date("Y-m-d",$item->created_at) ?></td>
						<td>$<?= $item->amount ?></td>
						<td><?= Order::getStatusLabels($item->status) ?></td>
						<td><a href="javascript:;" class="track" id="track-<?= $item->shipment_track ?>" data-id="<?= $item->shipment_track ?>"><?= $item->shipment_track ? $item->shipment_track : 'No Track' ?></a><span class="searchOrder"></span></td>
						<td ><a style="color: #5787f3" target="_blank" href="<?= Yii::$app->urlManager->createUrl(['order/view', 'id' => $item->id]) ?>">View</a></td>
						<td><a style="color:#4c996b" target="_blank" href="<?= Yii::$app->urlManager->createUrl(['order/invoice', 'id' => $item->id]) ?>">Print invoice</a>
						</td>
						<td><a style="color: #55729a;" href="javascript:;" class="reorder" data-link="<?= Yii::$app->urlManager->createUrl(['order/reorder', 'id' => $item->id]) ?>">Reorder</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
    </div>
</div>
<script>
	//加载更多		
	var $all = $('.all');
	$all.on('click',function(){
		if($('.table tbody tr').length>1){
			//获取后端数据
		}else{
			alert('暂无数据');
		}
	})
</script>
<script type="text/javascript" src="//www.17track.net/externalcall.js"></script>
<script>
	$(".track").each(function(){
		var sn = $(this).data("id");
		if (sn) {
			YQV5.trackSingleF1({
				//必须，指定悬浮位置的元素ID。
				YQ_ElementId:"track-" + sn,
				//可选，指定查询结果宽度，最小宽度为600px，默认撑满容器。
				YQ_Width:800,
				//可选，指定查询结果高度，最大高度为800px，默认撑满容器。
				YQ_Height:400,
				//可选，指定运输商，默认为自动识别。
				YQ_Fc:"0",
				//可选，指定UI语言，默认根据浏览器自动识别。
				YQ_Lang:"en",
				//必须，指定要查询的单号。
				YQ_Num:sn
			});
		}
	});
	$(function(){
		//reorder 再订购
		$(".reorder").click(function(){
			var link = $(this).data("link");
			$.get(link,{},function(data){
				if (data.status == 1) {
					layer.msg('Items added to cart.',{icon:1,time:1000});
				} else {
					layer.msg(data.message,{icon:0,time:1000});
				}
			}, 'json')
		})
	})
</script>