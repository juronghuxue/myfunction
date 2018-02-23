<?php
$public = Yii::getAlias('@public');
$customerType = !Yii::$app->user->isGuest?Yii::$app->user->identity->customer_type:1;
use common\components\Helper;
use common\models\ProductHtml;
use common\models\Product;
?>
<link rel="stylesheet" href="/theme/new/css/index/promotions.css" />
<!--内页banner-->
<div id="top">
	<img style="width: 100%;" src="/theme/new/img/promotions/pic_bg_banner.jpg"/>
</div>
<!--优惠券-->
<div class="pm-coupon-container" id="floor1">
	<?php if($customerType==1):?>
		<!--c端用户-->
		<div class="pm-coupon-v-content">
			<?php if (in_array(212, $coupon)):?>
				<div class="pm-coupon-one" data-id='212'>
					<div class="pm-coupon-get"></div>	
					<div class="pm-coupon-user">
						<img src="/theme/new/img/promotions/pic_coupon_haved.png"/>
					</div>
				</div>
			<?php else:?>
				<div class="pm-coupon-one getCoupon" data-id='212'>
					<div class="pm-coupon-get"></div>	
				</div>
			<?php endif;?>
			<?php if (in_array(213, $coupon)):?>
				<div class="pm-coupon-two " data-id='213'>
					<div class="pm-coupon-get"></div>
					<div class="pm-coupon-user">
						<img src="/theme/new/img/promotions/pic_coupon_haved.png"/>
					</div>
				</div>
			<?php else:?>
				<div class="pm-coupon-two getCoupon" data-id='213'>
					<div class="pm-coupon-get"></div>	
				</div>
			<?php endif;?>
			<?php if (in_array(214, $coupon)):?>
				<div class="pm-coupon-three " data-id='214'>
					<div class="pm-coupon-get"></div>
					<div class="pm-coupon-user">
						<img src="/theme/new/img/promotions/pic_coupon_haved.png"/>
					</div>	
				</div>
			<?php else:?>
				<div class="pm-coupon-three getCoupon" data-id='214'>
					<div class="pm-coupon-get"></div>	
				</div>
			<?php endif;?>
			<?php if (in_array(215, $coupon)):?>
				<div class="pm-coupon-four" data-id='215'>
					<div class="pm-coupon-get"></div>
					<div class="pm-coupon-user" >
						<img src="/theme/new/img/promotions/pic_coupon_haved.png"/>
					</div>
				</div>
			<?php else:?>
				<div class="pm-coupon-four getCoupon" data-id='215'>
					<div class="pm-coupon-get"></div>	
				</div>
			<?php endif;?>
		</div>
	<?php else:?>
		<!--b端用户-->
		<div class="pm-coupon-w-content">
			<?php if (in_array(219, $coupon)):?>
				<div class="pm-coupon-one" data-id='219'>
					<div class="pm-coupon-get"></div>	
					<div class="pm-coupon-user">
						<img src="/theme/new/img/promotions/pic_coupon_haved.png"/>
					</div>
				</div>
			<?php else:?>
				<div class="pm-coupon-one getCoupon" data-id='219'>
					<div class="pm-coupon-get"></div>	
				</div>
			<?php endif;?>
			<?php if (in_array(218, $coupon)):?>
				<div class="pm-coupon-two" data-id='218'>
					<div class="pm-coupon-get"></div>	
					<div class="pm-coupon-user">
						<img src="/theme/new/img/promotions/pic_coupon_haved.png"/>
					</div>
				</div>
			<?php else:?>
				<div class="pm-coupon-two getCoupon" data-id='218'>
					<div class="pm-coupon-get"></div>	
				</div>
			<?php endif;?>
			<?php if (in_array(217, $coupon)):?>
				<div class="pm-coupon-three" data-id='217'>
					<div class="pm-coupon-get"></div>	
					<div class="pm-coupon-user">
						<img src="/theme/new/img/promotions/pic_coupon_haved.png"/>
					</div>
				</div>
			<?php else:?>
				<div class="pm-coupon-three getCoupon" data-id='217'>
					<div class="pm-coupon-get"></div>	
				</div>
			<?php endif;?>
			<?php if (in_array(216, $coupon)):?>
				<div class="pm-coupon-four" data-id='216'>
					<div class="pm-coupon-get"></div>	
					<div class="pm-coupon-user">
						<img src="/theme/new/img/promotions/pic_coupon_haved.png"/>
					</div>
				</div>
			<?php else:?>
				<div class="pm-coupon-four getCoupon" data-id='216'>
					<div class="pm-coupon-get"></div>	
				</div>
			<?php endif;?>
		</div>
	<?php endif;?>
</div>
<!--产品内容-->
<div class="pm-pro-content">
	<div class="pm-pro-title">
		<img src="theme/new/img/promotions/tittle_special_deals.png"/>
	</div>
	<div class="pm-tab-nav">
		<ul>
			<li style="display: none;"><a href="javascript:;" data-index="0"  ><span>$4.9</span></a></li>
			<li><a href="javascript:;" data-index="1" class="nav-active"><span>$9.9</span></a></li>
			<li><a href="javascript:;" data-index="2"><span>$15.9</span></a></li>
			<li><a href="javascript:;" data-index="3"><span>$19.9</span></a></li>
			<li style="display: none;"><a href="javascript:;" data-index="4" ><span>$24.9</span></a></li>
			<li><a href="javascript:;" data-index="5"><span>$20+</span></a></li>
		</ul>
	</div>
	<!--kits-->
	<div class="pm-pro-content-lists"  data-index="0" >
	<?php if(!empty($allProduct['price4'][0])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-kits">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_starter_kits.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price4'][0] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<!--无子产品显示-->
							<!-- <div class="pm-pro-addtocart-box" style="display: none;">
								<div class="pm-pro-addtocart">
									<a href="#">
										<i class="fa fa-shopping-cart"></i>
										Add To Cart
									</a>
								</div>
								<div class="pm-pro-addtowish">
									<a href="#">
										<i class="fa fa-heart"></i>
									</a>
								</div>
							</div> -->
							<!--有子产品显示-->
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<!-- <select>
										<option>--Choose Color--</option>
										<option>2.5ml2.5ml2.5ml2.5ml2.5ml2.5ml2.5ml2.5ml</option>
										<option>2.5ml</option>
										<option>2.5ml</option>
									</select>
									<select>
										<option>--Choose Color--</option>
										<option>2.5ml2.5ml2.5ml2.5ml2.5ml2.5ml2.5ml2.5ml</option>
										<option>2.5ml</option>
										<option>2.5ml</option>
									</select> -->
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
							<!-- <div class="hm-hot-icon" >
								<a href="javascript:;">HOT</a>
							</div>
							<div class="hm-new-icon" >
								<a href="javascript:;">NEW</a>
							</div>
							<div class="hm-tpd-icon" >
								<a href="javascript:;">TPD
									<img src="/theme/new/img/index/icon_done_tpd.png">
								</a>
							</div>
							<div class="hm-hot-icon" >
								<a href="javascript:;">-30%</a>
							</div> -->
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
	</div>
	<?php endif;?>
	<!--mods-->
	<?php if(!empty($allProduct['price4'][2])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-mods">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_mod.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price4'][2] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
	<?php endif;?>
	<!--Atom-->
	<?php if(!empty($allProduct['price4'][1])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-Atom">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/title_tanks.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price4'][1] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif;?>
	<!--access-->
	<?php if(!empty($allProduct['price4'][3])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-access">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_accessories.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price4'][3] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
	<?php endif;?>
	</div>
	<div class="pm-pro-content-lists" data-index="1" style="display: block;">
	<?php if(!empty($allProduct['price9'][0])):?>
	<div class="pm-pro-style" id="floor2">
		<div class="pm-pro-kits">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_starter_kits.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price9'][0] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
	</div>
	<?php endif;?>
	<!--mods-->
	<?php if(!empty($allProduct['price9'][2])):?>
	<div class="pm-pro-style" id="floor3">
		<div class="pm-pro-mods">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_mod.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price9'][2] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
	</div>
	<?php endif;?>
	<!--Atom-->
	<?php if(!empty($allProduct['price9'][1])):?>
	<div class="pm-pro-style" id="floor4">
		<div class="pm-pro-Atom">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/title_tanks.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price9'][1] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif;?>
	<!--access-->
	<?php if(!empty($allProduct['price9'][3])):?>
	<div class="pm-pro-style" id="floor5">
		<div class="pm-pro-access">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_accessories.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price9'][3] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif;?>
	</div>
	<div class="pm-pro-content-lists" data-index="2">
	<?php if(!empty($allProduct['price15'][0])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-kits">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_starter_kits.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price15'][0] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif;?>
	<!--mods-->
	<?php if(!empty($allProduct['price15'][2])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-mods">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_mod.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price15'][2] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif;?>
	<!--Atom-->
	<?php if(!empty($allProduct['price15'][1])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-Atom">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/title_tanks.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price15'][1] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif;?>
	<!--access-->
	<?php if(!empty($allProduct['price15'][3])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-access">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_accessories.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price15'][3] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif;?>
	</div>
	<div class="pm-pro-content-lists" data-index="3">
	<?php if(!empty($allProduct['price19'][0])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-kits">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_starter_kits.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price19'][0] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif;?>
	<!--mods-->
	<?php if(!empty($allProduct['price19'][2])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-mods">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_mod.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price19'][2] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif;?>
	<!--Atom-->
	<?php if(!empty($allProduct['price19'][1])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-Atom">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/title_tanks.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price19'][1] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif;?>
	<!--access-->
	<?php if(!empty($allProduct['price19'][3])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-access">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_accessories.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price19'][3] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif;?>
	</div>
	<div class="pm-pro-content-lists" data-index="4">
	<?php if(!empty($allProduct['price24'][0])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-kits">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_starter_kits.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price24'][0] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
		
		
	</div>
	<?php endif?>
	<!--mods-->
	<?php if(!empty($allProduct['price24'][2])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-mods">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_mod.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price24'][2] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif?>
	<!--Atom-->
	<?php if(!empty($allProduct['price24'][1])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-Atom">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/title_tanks.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price24'][1] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif?>
	<!--access-->
	<?php if(!empty($allProduct['price24'][3])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-access">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_accessories.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price24'][3] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif?>
	
	</div>
	<div class="pm-pro-content-lists" data-index="5">
	<?php if(!empty($allProduct['price25'][0])):?>
	<div class="pm-pro-style">
		<div class="pm-pro-kits">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_starter_kits.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price25'][0] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif;?>
	<!--mods-->
	<?php if(!empty($allProduct['price25'][2])):?>
	<div class="pm-pro-style" >
		<div class="pm-pro-mods">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_mod.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price25'][2] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif;?>
	<!--Atom-->
	<?php if(!empty($allProduct['price25'][1])):?>
	<div class="pm-pro-style">
		<div class="pm-pro-Atom">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/title_tanks.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price25'][1] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif;?>
	<!--access-->
	<?php if(!empty($allProduct['price25'][3])):?>
	<div class="pm-pro-style">
		<div class="pm-pro-access">
			<div class="pm-pro-title-text">
				<h3><img src="theme/new/img/promotions/tittle_accessories.png"/></h3>
			</div>
			<div class="pm-pro-lists">
				<?php foreach($allProduct['price25'][3] as $product):?>
					<?php  
                        $OptionStock = Product::getSubStockById($product->id);
                        $PreOrderState = Product::getSubProductPreOrderState($product->id);
                    ?>
                    <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==1):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php elseif($PreOrderState==2):?>
                        <?php $OptionStock = 1;?>
                        <?php $product->stock = 1;?>
                    <?php endif;?>
				<div class="pm-pro-list">
					<div class="pm-pro-pic">
						<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>">
							<img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product->image,206,206);?>"/>
						</a>
					</div>
					<div class="pm-pro-list-content">
							<div class="pm-pro-list-title">
								<h4>
									<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product->seourl]) ?>" class="">
										<span class="pm-isorder"></span>
										<?=$product->name?>
									</a>
								</h4>
							</div>
							<div class="pm-pro-star">
								<?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                <?php }else{ ?>
                                    <a href="javascript:;" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                <?php }} ?>
							</div>
							<div class="pm-pro-price">
								<span class="pm-pro-price-rel">$<i><?=$product->price?></i></span>
								<?php if($product->market_price>0):?>
								<span class="pm-pro-price-market">$<i><?=$product->market_price?></i></span>
								<?php endif;?>
							</div>
							<?php if(!empty($product->subProduct)):?>
								<div class="pm-pro-addtocart-box pm-pro-addtocart-hover">
									<div class="pm-pro-addtocart">
										<a href="javascript:;" class="ajaxaddToCartText">
											<i class="fa fa-shopping-cart"></i>
											<?php if($OptionStock>0):?>
												Add To Cart
											<?php else:?>
												Arrival Notices
											<?php endif;?>
										</a>
									</div>
									<div class="pm-pro-addtowish">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php else:?>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($product->stock>0):?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                        <?php else:?>
                                            <a href="javascript:;" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
                                        <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id = "<?=$product->id?>">
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							<?php endif;?>
								
							<div class="pm-pro-attr" style="display: none;">
								<div class="pm-pro-select select_box">
									<?php echo ProductHtml::getProductListOptionSelect($product->id);?>
								</div>
								<div class="pm-pro-addtocart-box">
									<div class="pm-pro-addtocart">
										<?php if($OptionStock>0):?>
		                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php else:?>
		                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i> Arrival Notices</a>
		                                <?php endif;?>
									</div>
									<div class="pm-pro-addtowish ajaxaddToFavorite" data-id='-1'>
										<a href="javascript:;">
											<i class="fa fa-heart"></i>
										</a>
									</div>
								</div>
							</div>
							<!--标签-->
							<?php if((8&$product->type)>0):?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php elseif((1&$product->type)>0):?>
                                <div class="hm-new-icon" >
									<a href="javascript:;">NEW</a>
								</div>
                            <?php else:?>
                                <?php if($product->market_price>0):?>
	                                <div class="hm-hot-icon" >
										<a href="javascript:;">-<?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>%</a>
									</div>
								<?php endif;?>
                            <?php endif;?>
                            <?php if((32&$product->type)>0 or (128&$product->type)>0):?>
                                <div class="hm-tpd-icon" >
									<a href="javascript:;">TPD
										<img src="/theme/new/img/index/icon_done_tpd.png">
									</a>
								</div>
							<?php endif;?>
					</div>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
		
		
	</div>
	<?php endif;?>
	</div>
	<!--底部广告-->
	<div class="pm-pro-ad">
		<?php if(!empty($ad)):?>
			<a href="<?=$ad[0]['url']?>">
				<img src="<?=$ad[0]['pic']?>"/>
			</a>
		<?php endif;?>
	</div>
	<!--背景装饰-->
	<div class="pm-bg-gif-1">
		<img src="theme/new/img/promotions/pic_1.png"/>
	</div>
	<div class="pm-bg-gif-2">
		<img src="theme/new/img/promotions/pic_2.png"/>
	</div>
	<div class="pm-bg-gif-3">
		<img src="theme/new/img/promotions/pic_3.png"/>
	</div>
	<div class="pm-bg-gif-4">
		<img src="theme/new/img/promotions/pic_4.png"/>
	</div>
	<div class="pm-bg-gif-5">
		<img src="theme/new/img/promotions/pic_3.png"/>
	</div>
	<div class="pm-bg-gif-6">
		<img src="theme/new/img/promotions/pic_1.png"/>
	</div>
	<div class="pm-bg-gif-7">
		<img src="theme/new/img/promotions/pic_3.png"/>
	</div>
	<div class="pm-bg-gif-8">
		<img src="theme/new/img/promotions/pic_1.png"/>
	</div>
</div>
<!--右测导航-->
<div class="pm-right-sider-nav">
	<div class="pm-right-pic">
		<img src="theme/new/img/promotions/pic_head_right_bar.png"/>
	</div>
	<ul class="pm-right-sider-lists">
		<!--<li><a href="#floor1">Coupons</a></li>
		<li><a href="#floor2">Starter Kits</a></li>
		<li><a href="#floor3">Mod/Batteries</a></li>
		<li><a href="#floor4">Tank/Atomizers</a></li>
		<li><a href="#floor5">Accessories</a></li>-->
		<li>Coupons</li>
		<li>Starter Kits</li>
		<li>Mod/Batteries</li>
		<li>Tank/Atomizers</li>
		<li>Accessories</li>
	</ul>
	<div class="pm-back-top"><a href="#top">Back To Top</a></div>
</div>
<script>
	$(function(){
		//检测屏幕是否显示侧边导航栏
		if(screen.width>=768){
//			$(".pm-right-sider-nav").show();
			var navmenu=parseInt($(".pm-tab-nav>ul").offset().top);
	$(window).scroll(function(){
//			scrolls();
		if($(window).scrollTop()>navmenu){
//			$(".pm-right-sider-nav").show();
        	$(".pm-tab-nav").css({"position":"fixed","z-index":"100","top":"0","margin":"0","left":"50%","margin-left":"-570px"});
        	$(".pm-tab-nav>ul").css("padding-left","0");
        	$(".pm-tab-nav>ul>li").css({"transform":"skewX(0deg)","width":"286px"});
			$(".pm-tab-nav>ul>li>a>span").css({"transform":"skewX(0deg)"});
		}
		else{
//			$(".pm-right-sider-nav").hide();
        	$(".pm-tab-nav").css({"position":"static","margin":"20px auto","z-index":"0"});
        	$(".pm-tab-nav>ul>li").css({"transform":"skewX(-15deg)","width":"279px"});
        	$(".pm-tab-nav>ul").css("padding-left","20px");
        	$(".pm-tab-nav>ul>li>a>span").css({"transform":"skewX(15deg)"});
		}
	});
    	}
    	else{
    		$(".pm-right-sider-nav").hide();
    		var navmenu=parseInt($(".pm-tab-nav>ul").offset().top);
		$(window).scroll(function(){
			
		if($(window).scrollTop()>navmenu){
        	$(".pm-tab-nav").css({"position":"fixed","z-index":"100","top":"-20px"});
			
		}
		else{
        	$(".pm-tab-nav").css({"position":"static","z-index":"0"});
		}
	});
    	}
	
    	//事件函数
//  	scrollPage();
    	pmEventFn();
	});
	function pmEventFn(){
		var dataIndex="";
		$(".pm-tab-nav>ul>li>a").click(function(){
			//清除楼层id
			$(".pm-pro-content-lists .pm-pro-style").attr("id","");
			$(this).addClass("nav-active");
			$(this).parent().siblings().find("a").removeClass("nav-active");
			dataIndex=$(this).attr("data-index");
			$(".pm-pro-content-lists").each(function(){
				if(parseInt($(this).attr("data-index"))==parseInt(dataIndex)){
					$(".pm-pro-content-lists").hide();
					$(this).show();
					$(this).find(".pm-pro-style").each(function(i){
						$(this).attr("id","floor"+(2+i));
					})
				}
			});
			
			
		});
		//鼠标移上购物车pm-pro-attr
		$(".pm-pro-addtocart-hover").mouseover(function(e){
			$(this).next().slideDown();
			e.stopPropagation();
		});
		$(".pm-pro-list").mouseleave(function(e){
			$(this).find(".pm-pro-attr").slideUp();
			e.stopPropagation();
		});
		$(".pm-pro-select>select").mouseover(function(e){
			e.stopPropagation();
		});
		$(".pm-pro-select>select").mouseleave(function(e){
			e.stopPropagation();
		});
		$(".pm-pro-content-lists").mouseleave(function(e){
			$(this).find(".pm-pro-attr").slideUp();
			e.stopPropagation();
		});
	}


function navFixed(){
		var navmenu=parseInt($(".pm-tab-nav>ul").offset().top);
		var sTop = $(window).scrollTop();
		$("body").stop(true);//清除元素的所有动画
		if(sTop>navmenu){
        	$(".pm-tab-nav").css({"position":"fixed","z-index":"100","top":"0","margin":"0","left":"50%","margin-left":"-570px"});
		}
		else{
        	$(".pm-tab-nav").css({"position":"static","margin":"20px auto","z-index":"0"});
		}
}
//点击右测时的页面滚动
   	var scrollPage = function () {
    var ctrol = $('li', '.pm-right-sider-lists');
    var pageRoot = $("body,html");
    $.each($(ctrol), function () {
        $(this).click(function () {
            $(pageRoot).stop(true);//清除元素的所有动画
            $(this).addClass('current').siblings().removeClass('current');
            var id = '#' + 'floor' + ($(this).index() + 1);
            $(pageRoot).animate({scrollTop: $(id).offset().top-56}, 1000);
            return false;
        });
    })
};
//监听页面滚动与右侧菜单同步
function scrolls() {
    	var menuBar = $('li', '.pm-right-sider-lists'),
        sTop = $(window).scrollTop(),
        f1 = $('#floor1').offset().top,
        f2 = $('#floor2').offset().top,
        f3 = $('#floor3').offset().top,
        f4 = $('#floor4').offset().top,
        f5 = $('#floor5').offset().top;
		if(sTop>600){
			$(".pm-right-sider-nav").show();
			if(screen.width<1600){
				$(".pm-right-sider-nav").css("right","0");
			}
			else{
				$(".pm-right-sider-nav").css("right","10%");
			}
			
		}
		else{

			$(".pm-right-sider-nav").hide();
			
		}
	    monitor(f1, 0);
	    monitor(f2, 1);
	    monitor(f3, 2);
	    monitor(f4, 3);
	    monitor(f5, 4);

    function monitor(ele, index) {
        if (sTop >= ele - 320){
        	
        	  menuBar.eq(index).addClass('current').siblings().removeClass('current');
        }
          
    }
}
</script>
<script type="text/javascript">
$(function(){
	var csrf ="<?=Yii::$app->request->getCsrfToken()?>" ;
	var addToCartUrl = "<?=Yii::$app->urlManager->createUrl(['cart/ajax-add'])?>";
	var addArriveNoticUrl = "<?=Yii::$app->urlManager->createUrl(['goods/set-remind'])?>";
	var addFavoriteUrl = "<?=Yii::$app->urlManager->createUrl(['goods/favorite'])?>";
	/**
	 *	领取优惠券
	 */
	$('.getCoupon').click(function(){
		$.get("/promotions/get-coupon.html", {id:$(this).data('id')},function(data){
			if(data.status==1){
				layer.msg(data.msg,{icon:1,time:1000});
			}else{
				layer.msg(data.msg,{icon:0,time:1000});
			}
		});
	});
	/**
	 * 加入购物车
	 */
	$(".ajaxaddToCart").click(function(){
	    var id = $(this).data('id');
	    console.log(id);
	    if(id==-1){
	        var num = 0;
	        $(this).parent().parent().parent().find("select").each(
	            function(){
	                if($(this).val()==0 && num==0){
	                    num = 1;
	                    $(this).focus();
	                }
	            }
	        );
	        if(num==0){
	            layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
	        }
	    }else if(id==0){
	        layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
	    }else{
			param = {productId:id,number:1,_csrf:csrf};
	  		loading=  layer.msg('Adding', {icon: 16,shade: 0.01});
		    $.post(addToCartUrl, param, function(data) {
		        layer.close(loading);
		        if (data.status > 0) {
		            $(".addNumber").text(data.userCartSum);
		            $(".monileAddNumber").text(data.userCartSum);
		  			success=  layer.msg('SUCCESS', {icon: 1,shade: 0.01});
	   				setTimeout(function(){layer.close(success);}, 500);
	        	} else {
	                layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
	        	}
	    	}, "json");
	    }
	});
	$(".ajaxaddToFavorite").click(function(){
	    var id = $(this).data('id');
	    if(id==-1){
	        var num = 0;
	        $(this).parent().parent().parent().find("select").each(
	            function(){
	                if($(this).val()==0 && num==0){
	                    num = 1;
	                    $(this).focus();
	                }
	            }
	        );
	    }else if(id==0){
	        layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
	    }
	    else{
	      	loading=  layer.msg('Adding', {icon: 16,shade: 0.01});
	        $.get(addFavoriteUrl,{id:id}, function(data) {
	        	layer.close(loading);
		        if (data.status == 1) {
		          	success=  layer.msg('SUCCESS', {icon: 1,shade: 0.01});
		           	setTimeout(function(){layer.close(success);}, 500);
	            }else if(data.status == 2){
	            	layer.msg("You've already added it", {icon: 1,shade: 0.01,time:1000});
	            }else{
	                window.location.href="/site/login.html";
	            }
	        }, "json");
		}
	});
	$(".ajaxarrivenotic").click(function(){
	    var id = $(this).data('id');
	    if(id==-1){
	        var num = 0;
	        $(this).parent().parent().parent().find("select").each(
	            function(){
	            	console.log($(this).val());
	                if($(this).val()==0 && num==0){
	                    num = 1;
	                    $(this).focus();
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
		    param = {productId : id,number : 1,_csrf :csrf};
		  	loading=  layer.msg('Adding', {icon: 16,shade: 0.01});
		    $.post(addArriveNoticUrl+"?productId=" + id, param, function(data) {
		        layer.close(loading);
		        if (data.status ==1) {
		  			success=  layer.msg('SUCCESS', {icon: 1,shade: 0.01});
		   			setTimeout(function(){layer.close(success);}, 500);
		        }else if(data.status ==2){
		        	success=  layer.msg('Already Add', {icon: 16,shade: 0.01});
		       		setTimeout(function(){layer.close(success);}, 500);
		   		}else if(data.status ==3){
		        	success=  layer.msg('Please Login', {icon: 7,shade: 0.01});
		       		setTimeout(function(){layer.close(success);}, 3000);
		   		}else {
		             layer.msg('Please Login', {icon: 7,shade: 0.01});
		        }
		    }, "json");
		}
	});
	$(".opt_select").change(function(){
        var option = $(this).find("option:selected");
        $(option).parent().children().css('border-color','#eee');
        $(option).parent().children().attr('chosed',0);
        //$('#img_'+$(option).attr('attrlable')).mouseover();
        var choise = '-';
        if($(option).attr('chosed')==1){
            $(option).css('border-color','#eee');
            $(option).attr('chosed',0);
        } else {
            $(option).css('border-color','red');
            $(option).attr('chosed',1);
        }
        $(this).parent(".select_box").find(".option").each(
            function(){
                if($(this).attr("chosed")==1){
                    choise = choise+$(this).attr("attrid")+"-"+$(this).attr("optid")+'-';
                }
            }
        );
        var stock = $(this).parent('.select_box').find(".child_ids"+choise).data('stock');
        var proorder = $(this).parent('.select_box').find(".child_ids"+choise).data('proorder');
        var id = '-1';
        var ids = $(this).parent('.select_box').find(".child_ids"+choise).val();
        if(ids>=0){
            $(this).parent().parent().find('.ajaxaddToCart').data('id',ids);
            $(this).parent().parent().find('.ajaxaddToFavorite').data('id',ids);
            $(this).parent().parent().find('.ajaxarrivenotic').data('id',ids);
            if(stock>0 || proorder>0){
                $(this).parent().parent().parent().find('.ajaxaddToCartText').html('<i class="fa fa-shopping-cart"></i> Add to Cart');
                $(this).parent().parent().find('.ajaxaddToCart').show();
                $(this).parent().parent().find('.ajaxarrivenotic').hide();
            }else{
                $(this).parent().parent().parent().find('.ajaxaddToCartText').html('<i class="fa fa-shopping-cart"></i> Arrival Notices');
                $(this).parent().parent().find('.ajaxaddToCart').hide();
                $(this).parent().parent().find('.ajaxarrivenotic').show();
            }
        }else{
            $(this).parent().parent().find('.ajaxaddToCart').data('id',id);
            $(this).parent().parent().find('.ajaxaddToFavorite').data('id',id);
            $(this).parent().parent().find('.ajaxarrivenotic').data('id',id);
        }
    });
});
</script>