<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use common\models\Product;
/* @var $this yii\web\View */
$public = Yii::getAlias('@public'); //exit;
//$brandJson = json_encode($brand);
use common\models\ProductHtml;
use common\components\Helper;
//$isGuest = Yii::$app->user->isGuest;
$isGuest = 1;
$this->registerCssFile('@web/css/cart.css', ['depends' => \frontend\assets\AppAsset::className()]);
$this->registerCssFile('@web/css/my-shopping-cart.css', ['depends' => \frontend\assets\AppAsset::className()]);
$public=Yii::getAlias('@public');
$this->registerJsFile("@public/js/cart.js?v=2017122903", ['depends' => \frontend\assets\AppAsset::className()]);
$login = Yii::$app->urlManager->createUrl(['site/login']);
?>
	<input type="hidden" id="base_url" value="<?= $public?>" />
	<style>
		#layui-layer-shade1{opacity:0.5 !important;}
	</style>
	<div class="clearfix shopping_cart_div" align="center" style="max-width:1140px;width:100%;margin:0 auto 80px;min-height:850px;">
		<table class="go_home">
			<tbody>
			<tr>
				<td class="to_home">
					<a class="to_home_link" href="/">
						<img src="<?php echo $public;?>/img/pay_cart/icon_home.png">
						<span>Home></span>
					</a>
				</td>
				<td class="top_shopping_cart">Shopping cart</td>
				<td></td>
			</tr>
			</tbody>
		</table>
		<table class="view_shopping_cart" align="center">
			<tbody>
			<tr>
				<td class="view_shopping_cart_td1" align="center">
					<img src="<?php echo $public;?>/img/pay_cart/icon_step1.png">
					<span>View shopping cart</span>
				</td>
				<td>
					<img src="<?php echo $public;?>/img/pay_cart/pic_trigon_black.png">
				</td>
				<td class="view_shopping_cart_td2" align="center">
					<img src="<?php echo $public;?>/img/pay_cart/icon_step_2_defualt.png">
					<span>Check out</span>
				</td>
				<td>
					<img src="<?php echo $public;?>/img/pay_cart/pic_trigon_white.png">
				</td>
				<td class="view_shopping_cart_td3" align="center">
					<img src="<?php echo $public;?>/img/pay_cart/icon_step_3_defualt.png">
					<span>Complete payment</span>
				</td>
			</tr>
			</tbody>
		</table>
		<!-- 购物车没产品 -->
		<?php if (empty($brands)) {?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #F7F7F7;padding-left: 0px !important;padding-right: 0px !important;">
				<div style="margin-top: 100px;" align="center">
					<img src="<?php echo $public;?>/img/pay_cart/icon_cart_empty.png">
				</div>
				<div align="center" style="font-size: 20px;font-weight: bold;color: #4c4c4c;margin-top: 30px;margin-bottom: 169px;">
					Your Shopping Cart is Empty.<a style="color: #4c4c4c;text-decoration: underline;" href="/">Order now <img src="<?php echo $public;?>/img/pay_cart/icon_jiantou_cart_empty.png"></a>
				</div>

				<div align="center" class="skai_stastics">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 80px;">
						<!-- feature-product-area -->
						<div class="feature-product-area dotted-style-2" style="width: 1140px;border: 1px solid  #e3e3e5;margin-left: -15px;">
							<div>
								<div class="section-title" style="text-align: left;">
									<h3>RECOMMENDED PRODUCTS</h3>
								</div>
							</div>
							<div class="feature-product-active border-1" >
								<?php foreach($featuredProduct as $item):?>
									<?php
									$OptionSelect = \common\models\ProductHtml::getProductListOptionSelect($item['id']);
									$OptionStock = \common\models\Product::getSubStockById($item['id']);
									$PreOrderState = \common\models\Product::getSubProductPreOrderState($item['id']);
									?>
									<div class="single-product single-product-index  white-bg">
										<div class="product-hidden" style="width:100%;height:100%;overflow:hidden;">
											<div class="product-img pt-20">
												<a href="<?php echo Yii::$app->urlManager->createUrl(['/goods/view', 'seourl' => $item["seourl"]]); ?>"><img class="scrollLoading" src="<?= Yii::$app->params['imgServerAddress'].\common\components\Helper::getproductthumb($item['image'],211,211) ?>" alt="" onerror="javascript:this.src='/theme/new/images/noimg_quesheng.png';"/></a>
											</div>
										</div>
										<div class="product-content product-i">
											<div class="pro-title">
												<h4><a href="<?php echo  Yii::$app->urlManager->createUrl(['/goods/view', 'seourl' => $item["seourl"]])?>">
														<?php if($PreOrderState==0 and $item['pre_order_time']>0):?>
															<?php $OptionStock = 1;?>
															<?php $item['stock'] = 1;?>
															<span class="title_label">Pre-order</span>
														<?php elseif($PreOrderState==1):?>
															<?php $OptionStock = 1;?>
															<?php $item['stock'] = 1;?>
															<span class="title_label">Partically Pre-order</span>
														<?php elseif($PreOrderState==2):?>
															<?php $OptionStock = 1;?>
															<?php $item['stock'] = 1;?>
															<span class="title_label">Pre-order</span>
														<?php endif;?>
														<?=$item['name']?></a></h4>
											</div>
											<div class="pro-rating ">
												<?php for($i = 1; $i <= 5; $i++) { if ($i <= $item['star']) {?>
													<a href="#" title="<?= $item['star'] ?>"><i class="fa fa-star"></i></a>
												<?php }else{ ?>
													<a href="#" title="<?= $item['star'] ?>"><i class="fa fa-star-o"></i></a>
												<?php }} ?>
											</div>
											<div class="price-box">
												<span class="price product-price">$<?=$item['price']?></span>
												<?php if($item['market_price']>0):?>
													<span class="PriceCount"><del>$<?=$item['market_price']?></del></span>
												<?php endif;?>
											</div>
											<div class="product-icon">
												<div class="product-icon-left f-left">


													<?php if($OptionSelect):?>
														<?php if($OptionStock>0):?>
															<a href="javascript:void(0)" data-id="<?= $item['id'] ?>"  class="ajaxaddToCartText"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
														<?php else:?>
															<a href="javascript:void(0)" data-id="<?= $item['id'] ?>"  class="ajaxaddToCartText"><i class="fa fa-shopping-cart"></i>Arrival Notices</a>
														<?php endif;?>
													<?php else:?>
														<?php if($item['stock']>0):?>
															<a href="javascript:void(0)" data-id="<?= $item['id'] ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
														<?php else:?>
															<a href="javascript:void(0)" data-id="<?= $item['id'] ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i>Arrival Notices</a>
														<?php endif;?>
													<?php endif;?>

												</div>
												<div class="product-icon-right floatright">
													<?php if($OptionSelect):?>
														<a href="javascript:void(0)" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart"></i></a>
													<?php else:?>
														<a href="javascript:void(0)" data-id="<?=$item['id']?>" class="ajaxaddToFavorite" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart"></i></a>
													<?php endif;?>
												</div>
											</div>
										</div>
										<?php if(!$isGuest):?>
											<?php if((8&$item['type'])>0):?>
												<?php if($item['market_price']>0 and $item['price']>0):?>
													<span class="off"><?= number_format(($item['market_price']-$item['price'])/$item['market_price'], 2)*100;?>% OFF</span>
												<?php endif;?>
											<?php elseif((1&$item['type'])>0):?>
												<span class="new">new</span>
											<?php else:?>
												<?php if($item['market_price']>0 and $item['price']>0 and $item['market_price']!=$item['price']):?>
													<span class="off"><?= number_format(($item['market_price']-$item['price'])/$item['market_price'], 2)*100;?>% OFF</span>
												<?php endif;?>
											<?php endif;?>
										<?php else:?>
											<?php if((1&$item['type'])>0):?>
												<span class="new">new</span>
											<?php endif;?>
										<?php endif;?>
										<?php if((32&$item['type'])>0 or (128&$item['type'])>0):?>
											<span class="TPD"><span style="display: block;margin-left: -13px;">TPD</span></span>
										<?php elseif((2&$item['type'])>0):?>
											<span class="sale">HOT</span>
										<?php endif;?>
										<?php if($OptionSelect):?>
											<div class="other_infor">
												<div class="select_box">
													<?php echo $OptionSelect;?>
												</div>
												<div class="product-icon-left f-left cartOrder01">
													<?php if($OptionStock>0):?>
														<a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
														<a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i>Arrival Notices</a>
													<?php else:?>
														<a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
														<a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i>Arrival Notices</a>
													<?php endif;?>
												</div>
												<div class="product-icon-right floatright cartOrder02">
													<!--  <a href="#" data-toggle="tooltip" title="" data-original-title="Compare" aria-describedby="tooltip917084"><i class="fa fa-exchange"></i></a><div class="tooltip fade top" role="tooltip" id="tooltip917084" style="top: 315px; left: 129.609px; display: block;"><div class="tooltip-arrow" style="left: 50%;"></div><div class="tooltip-inner">Compare</div></div> -->
													<a href="javascript:void(0)" data-id="-1" class="ajaxaddToFavorite" data-toggle="tooltip" title="" data-original-title="Wishlist"><i class="fa fa-heart"></i></a>
												</div>
											</div>
										<?php endif;?>
									</div>

								<?php endforeach;?>
							</div>

						</div>

					</div>
				</div>
			</div>
		<?php } else { ?>
			<!-- 购物车有产品 -->
			<table class="shopping_top_table">
				<tbody>
				<tr>
					<td class="shopping_top_td1">
						MY SHOPPING CART
					</td>
					<td class="shopping_top_td2" >
						<span style=""></span>
					</td>
					<td class="shopping_top_td3">
						<img src="<?php echo $public;?>/img/pay_cart/icon_news.png"> 
					</td>
					 <td class="shopping_top_td4">
                         <?=$tip ? $tip->content : ''?>
					</td>
					<td class="shopping_top_td5">
						<a class="submit" href="javascript:;">CHECK OUT</a>
					</td>
				</tr>
				</tbody>
			</table>
			<div style="width:100%;margin:0 auto;overflow-x:auto;">
				<?php $form = ActiveForm::begin(['id' => 'cart','action' => ['checkout'],'options' => ['name' => 'cart'], 'method' => 'post']); ?>
				<table class="shopping_cart_table">
					<tbody>
					<tr class="shopping_head_name" align="center">
						<td class="select_product" style="width: 40px;" align="center">
							<img class="checkbox checkAll" src="<?php echo $public;?>/img/pay_cart/pic_slecte.png">
						</td>
						<td class="name_img" colspan="2" align="left">All</td>
						<td>Attribute</td>
						<td>Price</td>
						<td>Qty</td>
						<td>Subtotal</td>
						<td>Action</td>
					</tr>
					<?php foreach($brands as $key => $products) { ?>
						<input style="display: none;" value="阻止只有一个产品时按下回车自动提交表单" />
						<tr class="product_category brand<?= $key?>" data-brand="<?= $key?>" >
							<td class="select_product" style="width: 40px;" align="center">
								<img name="brand<?= $key ?>" class="checkbox brand"  data-brand="<?= $key ?>" src="<?php echo $public;?>/img/pay_cart/pic_slecte.png">
							</td>
							<td colspan="6"><?= $products['name'] ?></td>
							<td class="show_hide" style="font-size: 12px;text-align: center"><img src="<?php echo $public;?>/img/pay_cart/icon_jiantou_cart_brand_up.png"></td>
						</tr>
						<?php foreach ($products['product'] as $product) { ?>
							<?php
							//电池判断
							/*$batteriesCidStr = $product->product->batteries->value;
                            if ($batteriesCidStr) {
                                $cidArr = explode(",", $batteriesCidStr);
                            } else {
                                $cidArr = [];
                            }
                            $same = array_intersect($batteriesCid, $cidArr);
                            data-batteries=<?php if ($same){echo "1";}else echo "0";?>*/
							?>
							<tr id="cart<?= $product->id ?>" data-pre="<?= $product->product->pre_order_time ?>" data-batteries="" class="product_tr brand<?= $key?>" data-brand="<?= $key?>" align="center"
								style="background-color: <?php if(($product->product->stock < $product->number && empty($product->product->pre_order_time)) || ($product->product->stock < $product->number && $product->product->stock > 0)) echo '#e3e3e5';else echo '#ffffff';?>">
								<td class="select_product" style="width: 40px;" align="center">
									<input style="display: none;" type="checkbox" name="cartId[]" data-product="<?= $product->product_id ?>" value="<?= $product->id ?>" />
									<img name="select_yes_no" class="checkbox product brand<?= $key ?>" data-brand="<?= $key ?>" src="<?php echo $public;?>/img/pay_cart/pic_slecte.png">
								</td>
								<td class="product_img" align="center">
									<a href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $product->product->child ? $product->product->child->parent->seourl : $product->product->seourl]) ?>" target="_blank"><img src="<?= $product->product->child ? ($product->product->child->img ? $product->product->child->img : $product->product->child->parent->image) : $product->product->image ?>" alt="" onerror="javascript:this.src='/theme/new/images/noimg_queshengxiao.png';"/></a>
								</td>
								<td class="product_names" align="left">
									<a href="<?= Yii::$app->urlManager->createUrl(['goods/view', 'seourl' => $product->product->child ? $product->product->child->parent->seourl : $product->product->seourl]) ?>" target="_blank"><?= $product->name ?></a>
									<br>
									<!-- 没库存 -->
									<?php if($product->product->stock <= 0 && $product->product->pre_order_time == 0):?>
										<span class="outstock" style="display:inline-block;height:18px;line-height:18px;padding-left:5px;padding-right:5px;background:#df4549;font-size:12px;color:#ffffff;">Out of stock</span>
									<?php endif;?>
									<!-- preorder标签 -->
									<?php if($product->product->pre_order_time > 0):?>
										<span class="pre-order-sale" style="display:inline-block;height:18px;line-height:18px;padding-left:5px;padding-right:5px;background:#35bc55;font-size:12px;color:#ffffff;">Pre-order</span>
									<?php endif;?>
									<!-- TPD -->
									<?php if(($product->product->child ? $product->product->child->parent->type : $product->product->type) & 128):?>
										<span class="TPD" style="display:inline-block;width:98px;height:18px;line-height:18px;color:#ffffff;font-size:12px;padding-left:3px;padding-right:3px;background:#38a6e3 url(/theme/new/images/pic_TPD_Done.png) no-repeat 82px 2px">TPD Package</span>
									<?php endif;?>
									<?php if(($product->product->child ? $product->product->child->parent->type : $product->product->type) & 32):?>
										<span class="TPD" style="display:inline-block;width:117px;height:18px;line-height:18px;color:#ffffff;font-size:12px;
						padding-left:3px;padding-right:3px;background:#38a6e3 url(/theme/new/images/pic_TPD_Done.png) no-repeat 101px 2px">TPD Compliance</span>
									<?php endif;?>
									<!-- sale标签 -->
									<?php if($product->product->type & 8):?>
										<span class="pre-order-sale" style="display:inline-block;height:18px;line-height:18px;padding-left:5px;padding-right:5px;background:#35bc55;color:#ffffff;">Sale</span>
									<?php endif;?>
								</td>
								<td class="product_attribute"><?=$product->product->child ? $product->product->child->attr : ''?></td>
								<td class="product_price">
									<!--原价格 -->
									<span style="font-size:14px;font-weight:normal;text-decoration:line-through;margin-right:4px;">$<?= $product->market_price ?></span>
									<!--会员价格 -->
									<span>$<?= $product->price ?></span>
								</td>
								<td class="product_qty">
									<table>
										<tr>
											<td class="product_qty_subtract">
												<img src="<?php echo $public;?>/img/pay_cart/icon_subtract.png" class="minus" title="" data-id="<?= $product->id?>" data-price="<?= $product->price?>" data-link="<?= Yii::$app->urlManager->createUrl(['cart/change', 'type' => 'minus', 'cart_id' => $product->id]) ?>">
											</td>
											<td>
												<input style="padding-left: 0px;" id="qty<?= $product->id?>" class="product_qty_num" type="text" data-stock="<?= $product->product->pre_order_time > 0 && $product->product->stock == 0 ? 9999 : $product->product->stock ?>" data-id="<?= $product->id?>" data-price="<?= $product->price?>" data-link="<?= Yii::$app->urlManager->createUrl(['cart/change', 'type' => 'change', 'cart_id' => $product->id]) ?>" value="<?= $product->number ?>" maxlength="12">
											</td>
											<td class="product_qty_add">
												<img class="add" src="<?php echo $public;?>/img/pay_cart/icon_add.png" title="" data-id="<?= $product->id?>" data-price="<?= $product->price?>" data-link="<?= Yii::$app->urlManager->createUrl(['cart/change', 'type' => 'add', 'cart_id' => $product->id]) ?>">
											</td>
										</tr>
										<tr>
											<td id="max<?= $product->id ?>" class="max_qty_td" colspan="3" style="display: <?php if(($product->product->stock < $product->number && $product->product->stock > 0) || ($product->product->stock < $product->number && empty($product->product->pre_order_time))) echo "black"; else echo "none";?>;">
												Max QTY:<span class="max_qty" style="color: red;font-weight: bold;"><?= $product->product->pre_order_time > 0 && $product->product->stock == 0  ? 9999 : $product->product->stock?></span>
											</td>
										</tr>
									</table>

								</td>
								<td class="product_subtotal">
									<span>$<?= sprintf("%.2f", $product->price * $product->number)?></span>
								</td>
								<td class="product_action" style="width: 160px">
									<a class="add_wish" href="javascript:;" title="Add to wish" data-id="<?=$product->product_id?>" data-link="<?= Yii::$app->urlManager->createUrl(['cart/favorite']) ?>" style="color: #404040">Add to wish</a>
									<br>
									<a class="btn-del del" title="Delete" data-id="<?=$product->id?>" href="javascript:;" data-link="<?= Yii::$app->urlManager->createUrl(['cart/delete']) ?>" style="color: #404040">Delete</a>
								</td>
							</tr>
						<?php } ?>
					<?php } ?>
					</tbody>
				</table>
				<!-- 购物车分页暂时不做后续待补充 -->
				<!-- <div class="pages-wrap clearfix">
                    <p class="pages">
                        <span class="mark_dark">1</span><span>2</span><span class="spacial">...</span><span>8</span><span>8</span><span><img src="/theme/new/img/icon_jiantou_1_left_toogle.png" /></span><span><img src="/theme/new/img/icon_jiantou_1_right_toogle.png" /></span>
                    </p>
                </div> -->
				<?php ActiveForm::end(); ?>
			</div>


			<table class="shopping_bottom_table">
				<tbody>
				<tr>
					<td class="select_product" align="center">
						<img class="checkbox checkAll" src="<?php echo $public;?>/img/pay_cart/pic_slecte.png">
					</td>
					<td class="shopping_bottom_bot2" colspan="2" align="left">
						All
					</td>
					<td class="shopping_bottom_bot3">
						<a class="add_wish" href="javascript:;" title="Add to wish" data-link="<?= Yii::$app->urlManager->createUrl(['cart/favorite']) ?>" style="color: #404040">Add to wish</a>&nbsp;&nbsp;&nbsp;
						<a class="delete_select del" href="javascript:;" title="Delete selected" data-link="<?= Yii::$app->urlManager->createUrl(['cart/delete']) ?>" style="color: #404040">Delete selected</a>
					</td>
					<td class="shopping_bottom_bot4">
						Selected:<span id="totalNumber">0</span>
					</td>
					<td class="shopping_bottom_bot5" style=>
						Subtotal:<span id="totalPrice">$0.00</span>
					</td>
					<td style="width: 220px;" class="shopping_bottom_bot6">
						<a class="submit" href="javascript:;">CHECK OUT</a>
					</td>
				</tr>
				</tbody>
			</table>
		<?php } ?>
	</div>
	<script>
		var minPrice = "<?=$minPrice?>";
        var loginUrl = "<?=$login?>";
		var brandLimit = "<?=$brandLimit?>";
        var limitBrandId = "<?=$limitBrandId?>";
		$(document).ready(function(){
			/*$(".owl-item").each(function () {
			 $(".owl-item").css("width","228px");
			 });*/
			/*$(".owl-next").click(function(){
			 var a=$(".owl-stage").css("transform");
			 $(".owl-stage").css("transform","translate3d(-1366px, 0px, 0px)")
			 //matrix(1, 0, 0, 1, -1138, 0)
			 //alert(a);
			 });*/
			var UNIT_TYPE = isAPP();
			if(UNIT_TYPE !='pc'){
				$('.skai_stastics').css({'display':'none'});
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
				}
			}
		});
	</script>
	<style>
		.layui-layer-btn-{position: relative;top: -18px;left: -91px;}
	</style>
	<script>
		$(function(){
			//checkout hover
			$(".shopping_top_td5 a").hover(function(){
				$(".shopping_top_td5 a").css("background-color","#d9393e");
			},function(){
				$(".shopping_top_td5 a").css("background-color","#ee3e43");
			});

			$(".shopping_bottom_bot6 a").hover(function(){
				$(".shopping_bottom_bot6 a").css("background-color","#d9393e");
			},function(){
				$(".shopping_bottom_bot6 a").css("background-color","#ee3e43");
			});
		});
		// 手机设备去掉支付导航栏
		var UNIT_TYPE = isAPP();
		if(UNIT_TYPE != 'pc'){
			$('.view_shopping_cart').css({'display':'none'});
			$('.shopping_top_table').css({'display':'none'});
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
		for(var i = 0;i<$('.product_names').length;i++){
			if($('.product_names').eq(i).find('span').length>1){
				for(var j = 1;j<$('.product_names').eq(i).find('span').length;j++){
					j<$('.product_names').eq(i).find('span').eq(j).css({'margin-left':'6px'});
				}
			}
		}
	</script>





	<!--购物侧没有产品时，推荐产品添加到购物车-->
	<script>
		$(function(){
			$(".tab-menu ul li").click(function () {
				$(this).find("div").show().parent().parent("li").siblings().find("div").hide();
			})
//      鼠标移入切换箭头显示
			$("#slidershow").hover(function(){
					$('.glyphicon-chevron-left,.glyphicon-chevron-right').show();
				},
				function(){
					$('.glyphicon-chevron-left,.glyphicon-chevron-right').hide();
				})

			$(".scrollLoading").scrollLoading();
			jQuery(".opt_select").change(function(e){
				var option = jQuery(this).find("option:selected");
				jQuery(option).parent().children().css('border-color','#eee');
				jQuery(option).parent().children().attr('chosed',0);
				//jQuery('#img_'+jQuery(option).attr('attrlable')).mouseover();
				var choise = '-';
				if(jQuery(option).attr('chosed')==1){
					jQuery(option).css('border-color','#eee');
					jQuery(option).attr('chosed',0);
				} else {
					jQuery(option).css('border-color','red');
					jQuery(option).attr('chosed',1);
				}
				jQuery(this).parent(".select_box").find(".option").each(
					function(){
						if(jQuery(this).attr("chosed")==1){
							choise = choise+jQuery(this).attr("attrid")+"-"+jQuery(this).attr("optid")+'-';
						}
					}
				);
				var stock = jQuery(this).parent('.select_box').find(".child_ids"+choise).data('stock');
				var proorder = jQuery(this).parent('.select_box').find(".child_ids"+choise).data('proorder');
				var id = '-1';
				var ids = jQuery(this).parent('.select_box').find(".child_ids"+choise).val();
				if(ids>=0){
					jQuery(this).parent().parent().find('.ajaxaddToCart').data('id',ids);
					jQuery(this).parent().parent().find('.ajaxaddToFavorite').data('id',ids);
					jQuery(this).parent().parent().find('.ajaxarrivenotic').data('id',ids);
					if(stock>0 || proorder>0){
						jQuery(this).parent().parent().parent().find('.ajaxaddToCartText').html('<i class="fa fa-shopping-cart"></i>Add to Cart');
						jQuery(this).parent().parent().find('.ajaxaddToCart').show();
						jQuery(this).parent().parent().find('.ajaxarrivenotic').hide();
					}else{
						jQuery(this).parent().parent().parent().find('.ajaxaddToCartText').html('<i class="fa fa-shopping-cart"></i>Arrival Notices');
						jQuery(this).parent().parent().find('.ajaxaddToCart').hide();
						jQuery(this).parent().parent().find('.ajaxarrivenotic').show();
					}
				}else{
					jQuery(this).parent().parent().find('.ajaxaddToCart').data('id',id);
					jQuery(this).parent().parent().find('.ajaxaddToFavorite').data('id',id);
					jQuery(this).parent().parent().find('.ajaxarrivenotic').data('id',id);
				}
				e.cancelBubble = true;
				e.stopPropagation();

			});
		})

		//鼠标划入效果
		$('.single-product').on('mouseover',function(e){
			var other_infor = $(this).find('.other_infor');
			var height = other_infor.height();//105
			var Fheight = $(this).height();//184
			var sT = Math.round((1-height/Fheight)*Fheight);
			$(this).find('.other_infor').stop().animate({'top':sT+'px'},200);
		});
		// var _index = 0;
		// var newindex = 0;
		// console.log($('.single-product').length);
		// $('.single-product').on('mouseenter',function(e){
		//     var other_infor = $(this).find('.other_infor');
		//     var height = other_infor.height();//105
		//     var Fheight = $(this).height();//184
		//     var sT = Math.round((1-height/Fheight)*Fheight);
		//     $('.other_infor').eq(_index).stop().animate({'top':'100%'});
		//     $(this).find('.other_infor').stop().animate({'top':sT+'px'});
		// _index = newindex;
		// console.log(_index);
		// });
		$('.single-product').on('mouseout',function(e){
			$(this).find('.other_infor').stop().animate({'top':'100%'});
		});



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
<?php
$urlCartAdd = Yii::$app->urlManager->createUrl(['cart/ajax-add']);
$urlFavoriteAdd = Yii::$app->urlManager->createUrl(['goods/favorite']);
$this->registerJs('
var product = {csrf:"' . Yii::$app->request->getCsrfToken() . '"};
');
$js = <<<JS
$(".ajaxaddToFavorite").click(function(){  
    var id = $(this).data('id');
    if(id==-1){
        var num = 0;
        jQuery(this).parent().parent().find("select").each(
            function(){
                if(jQuery(this).val()==0 && num==0){
                    num = 1;
                    jQuery(this).focus();
                }
            }
        );
        if(num==0){
            layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
        }
    }else if(id==0){
        layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
    }else{
        param = {
            productId : id,
            number : 1,
            _csrf : product.csrf
        };
        loading = layer.msg('Adding', {icon: 16,shade: 0.01});
        $.post("{$urlFavoriteAdd}?id=" + id, param, function(data) {
            layer.close(loading);
            if (data.status > 0) {
                success=  layer.msg('Added to Wishlist', {icon: 1,shade: 0.01});   
                setTimeout(function(){
                    layer.close(success);
                }, 500);
            }else{
                //window.location.href="/site/login.html"; 
                layer.msg('Please login first', {icon: 7,shade: 0.01,time:700}); 
            }
        }, "json");
    }
});
$(".ajaxaddToCart").click(function(){  
    var id = $(this).data('id');
    if(id==-1){
        var num = 0;
        jQuery(this).parent().parent().find("select").each(
            function(){
                if(jQuery(this).val()==0 && num==0){
                    num = 1;
                    jQuery(this).focus();
                }
            }
        );
    }else if(id==0){
        layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
    }else{
        param = {
            productId : id,
            number : 1,
            _csrf : product.csrf
        };
        loading=  layer.msg('Adding', {icon: 16,shade: 0.01});
        $.post("{$urlCartAdd}?id=" + id, param, function(data) {
            layer.close(loading);
            if (data.status > 0) {
                $(".addNumber").text(data.userCartSum);
                $(".monileAddNumber").text(data.userCartSum);
                success=  layer.msg('SUCCESS', {icon: 1,shade: 0.01});
                setTimeout(function(){
                    layer.close(success);
                }, 1000);
            } else {
                layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
            }
        }, "json");
    }
});
JS;
$this->registerJs($js);
$urlCartAddarr = Yii::$app->urlManager->createUrl(['goods/set-remind']);

$this->registerJs('
var product = {csrf:"' . Yii::$app->request->getCsrfToken() . '"};
');
$js = <<<JS
$(".ajaxarrivenotic").click(function(){  
    var id = $(this).data('id');
    if(id==-1){
        var num = 0;
        jQuery(this).parent().parent().find("select").each(
            function(){
                if(jQuery(this).val()==0 && num==0){
                    num = 1;
                    jQuery(this).focus();
                }
            }
        );
        if(num==0){
            layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
        }
    }else if(id==0){
        layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
    }
    else{
        param = {
            productId : id,
            number : 1,
            _csrf : product.csrf
        };
        loading=  layer.msg('Adding', {icon: 16,shade: 0.01})
        $.post("{$urlCartAddarr}?productId=" + id, param, function(data) {
            layer.close(loading);
            if (data.status ==1) {
                success = layer.msg('SUCCESS', {icon: 1,shade: 0.01});
                setTimeout(function(){
                layer.close(success);
                }, 500);
            }else if(data.status ==2){
                success=  layer.msg('Already Add', {icon: 16,shade: 0.01});
                setTimeout(function(){
                    layer.close(success);
                }, 500);
            }else if(data.status ==3){
                success=  layer.msg('error', {icon: 7,shade: 0.01});
                setTimeout(function(){layer.close(success);}, 3000);
                // window.location.href="{$login}"
            }else {
                 layer.msg('Please Login', {icon: 7,shade: 0.01});
            }

        }, "json");
    }
});
JS;
$this->registerJs($js);
// $addtocartjs = ProductHtml::getIndexBuyJs();
// $this->registerJs($addtocartjs.$js);