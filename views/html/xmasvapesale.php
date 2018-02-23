<?php
$public = Yii::getAlias('@public'); //exit;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor. liuhongmei 12.11
 */
?>
<link rel="stylesheet" href="<?php echo $public ?>/css/activity/christmas.css" />
<link rel="stylesheet" href="<?php echo $public ?>/css/activity/activitytip.css" />

 
<!--活动banner-->
<div class="cms-banner">
	<img src="<?php echo $public ?>/img/activity/christmas/pc/bg_01.jpg"/>
	<img src="<?php echo $public ?>/img/activity/christmas/web/pic_banner.png"/>
</div>
<!--抽奖活动-->
<div class="cms-lottery">
	<div class="cms-lottery-content">
		<!--抽奖活动标题图片-->
		<div class="cms-lottery-title">
			<img src="<?php echo $public ?>/img/activity/christmas/pc/tittle_xmas_gift.png"/>
		</div>
		<!--抽奖活动内容-->
		<div class="cms-lottery-slide-content">
			<!--抽奖活动之圣诞树-->
			<div class="cms-lottery-leftslide-content">
				<div class="cms-lottery-light cms-lottery-light1">
					<img style="display: block;" src="<?php echo $public ?>/img/activity/christmas/pc/pic_light_1.png"  />
					<img style="display: none;" src="<?php echo $public ?>/img/activity/christmas/pc/pic_light_2.png"/>
				</div>
				
				<div class="cms-lottery-lucky-light" id="lottery">
					<div class="cms-light cms-light-0">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_num_1.png"/>
					</div>
					<div class="cms-light cms-light-1">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_num_2.png"/>
					</div>
					<div class="cms-light cms-light-2">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_num_3.png"/>
						
					</div>
					<div class="cms-light cms-light-3">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_num_4.png"/>
						
					</div>
					<div class="cms-light cms-light-4">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_num_5.png"/>
						
					</div>
					<div class="cms-light cms-light-5">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_num_6.png"/>
						
					</div>
				</div>
				<div class="cms-lottery-closebtn cms-lottery-web">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/btn_start.png"/>
						<img style="display: none;" src="<?php echo $public ?>/img/activity/christmas/pc/btn_start_hold.png"/>
				</div>
			</div>
			<!--抽奖活动中奖名单和产品展示-->
			<div class="cms-lottery-rightslide-content">
				<!--抽奖次数-->
				<div class="cms-lottery-times-box">
					<div class="cms-lottery-times">
						<span></span>
						<span>
							LEFT FREE TIMES <i class="times-num"></i> times
						</span>
						
					</div>
					<div class="cms-lottery-closebtn cms-lottery-pc">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/btn_start.png"/>
						<img style="display: none;" src="<?php echo $public ?>/img/activity/christmas/pc/btn_start_hold.png"/>
					</div>
					
					<div class="cms-line">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_xmas_line.png"/>
					</div>
				</div>
				<!--抽奖规则-->
				<div class="cms-lottery-rules">
					<div class="cms-lottery-rules-title">
						<span></span>
						<span>RULES</span>
					</div>
					<ul class="cms-lottery-rules-content">
						<li>1.Please log in to play this game.</li>
						<li>2.Three free chances per day for everyone.</li>
						<li>3.Redeem more chances by using points. <a href="https://www.elegomall.com/points_and_coupons.html" target="_blank">Get more points.</a></li>
						<li>4.Game time: 2017.12.20--2018.1.5</li>
					</ul>
					<div class="cms-line">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_xmas_line.png"/>
					</div>
				</div>
				<!--中奖名单-->
				<div class="cms-lottery-lists">
					<div class="cms-lottery-lists-title">
						<span></span>
						<span>AWARDS</span>
					</div>
					<div class="lucky-orders">
						<ul class="cms-lottery-lists-content">
							<li>
								<span>Jons show</span>
								<span>Jons sh**@elegomall.com</span>
								<span>5% OFF coupon</span>
							</li>
							
						</ul>
					</div>
					<div class="cms-line">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_xmas_line.png"/>
					</div>
				</div>
				<!--中奖产品-->
				<div class="cms-lottery-pro-lists">
					<div class="cms-lottery-pro-lists-title">
						<span></span>
						<span>AWARDS LIST</span>
					</div>
					<div class="cms-lottety-pro-lists-img">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_award_list_all.png"/>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--模块3-->
<div class="cms-exclusive">
	<div class="cms-exclusive-content">
		<div class="cms-exclusive-title">
			<img src="<?php echo $public ?>/img/activity/christmas/pc/tittle_offer_for_new.png"/>
		</div>
		<div class="cms-for-new">
			<a href="javascript:;" target="_blank">
				<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_banner_for_new.png"/>
				<img src="<?php echo $public ?>/img/activity/christmas/web/pic_banner_for_new.png"/>
				
			</a>
		</div>
	</div>
</div>
<!--模块4-->
<div class="cms-bottom-price">
	<div class="cms-bottom-price-content">
		<div class="cms-bottom-price-title">
			<img src="<?php echo $public ?>/img/activity/christmas/pc/tittle_bottom_price.png"/>
		</div>
		<div class="cms-bottom-price-lists-content">
			<div class="cms-bottom-price-lists-box">
				<div class="cms-bottom-price-list">
					<div class="cms-bottom-price-pimg">
						<a href="javascript:;">
							<img src="<?php echo $public ?>/img/activity/christmas/pc/zanwei_img.png"/>
						</a>
					</div>
					<div class="cms-bottom-price-pname">
						<a href="javascript:;">
							VOOPOO TOO 180W BOX MOD
						</a>
					</div>
					<div class="cms-bottom-price-pprice">
						<span>$24.0</span>
						<span>$24.0</span>
					</div>
					<div class="cms-bottom-price-padd">
						<a href="javascript:;">
							<span>ADD TO CART</span>
							<span></span>
						</a>
					</div>
					<div class="cms-bottom-price-zs">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_merry_christmas.png"/>
					</div>
				</div>
				<div class="cms-bottom-price-list">
					<div class="cms-bottom-price-pimg">
						<a href="javascript:;">
							<img src="<?php echo $public ?>/img/activity/christmas/pc/zanwei_img.png"/>
						</a>
					</div>
					<div class="cms-bottom-price-pname">
						<a href="javascript:;">
							VOOPOO TOO 180W BOX MOD
						</a>
					</div>
					<div class="cms-bottom-price-pprice">
						<span>$24.0</span>
						<span>$24.0</span>
					</div>
					<div class="cms-bottom-price-padd">
						<a href="javascript:;">
							<span>ADD TO CART</span>
							<span></span>
						</a>
					</div>
					<div class="cms-bottom-price-zs">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_merry_christmas.png"/>
					</div>
				</div>
				<div class="cms-bottom-price-list">
					<div class="cms-bottom-price-pimg">
						<a href="javascript:;">
							<img src="<?php echo $public ?>/img/activity/christmas/pc/zanwei_img.png"/>
						</a>
					</div>
					<div class="cms-bottom-price-pname">
						<a href="javascript:;">
							VOOPOO TOO 180W BOX MOD
						</a>
					</div>
					<div class="cms-bottom-price-pprice">
						<span>$24.0</span>
						<span>$24.0</span>
					</div>
					<div class="cms-bottom-price-padd">
						<a href="javascript:;">
							<span>ADD TO CART</span>
							<span></span>
						</a>
					</div>
					<div class="cms-bottom-price-zs">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_merry_christmas.png"/>
					</div>
				</div>
				<div class="cms-bottom-price-list">
					<div class="cms-bottom-price-pimg">
						<a href="javascript:;">
							<img src="<?php echo $public ?>/img/activity/christmas/pc/zanwei_img.png"/>
						</a>
					</div>
					<div class="cms-bottom-price-pname">
						<a href="javascript:;">
							VOOPOO TOO 180W BOX MOD
						</a>
					</div>
					<div class="cms-bottom-price-pprice">
						<span>$24.0</span>
						<span>$24.0</span>
					</div>
					<div class="cms-bottom-price-padd">
						<a href="javascript:;">
							<span>ADD TO CART</span>
							<span></span>
						</a>
					</div>
					<div class="cms-bottom-price-zs">
						<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_merry_christmas.png"/>
					</div>
				</div>
				<div class="cms-bottom-price-list">
					<div class="cms-bottom-price-pimg">
						<a href="javascript:;">
							<img src="<?php echo $public ?>/img/activity/christmas/pc/zanwei_img.png"/>
						</a>
					</div>
					<div class="cms-bottom-price-pname">
						<a href="javascript:;">
							VOOPOO TOO 180W BOX MOD
						</a>
					</div>
					<div class="cms-bottom-price-pprice">
						<span>$24.0</span>
						<span>$24.0</span>
					</div>
					<div class="cms-bottom-price-padd">
						<a href="javascript:;">
							<span>ADD TO CART</span>
							<span></span>
						</a>
					</div>
				</div>
				<div class="cms-bottom-price-list">
					<div class="cms-bottom-price-pimg">
						<a href="javascript:;">
							<img src="<?php echo $public ?>/img/activity/christmas/pc/zanwei_img.png"/>
						</a>
					</div>
					<div class="cms-bottom-price-pname">
						<a href="javascript:;">
							VOOPOO TOO 180W BOX MOD
						</a>
					</div>
					<div class="cms-bottom-price-pprice">
						<span>$24.0</span>
						<span>$24.0</span>
					</div>
					<div class="cms-bottom-price-padd">
						<a href="javascript:;">
							<span>ADD TO CART</span>
							<span></span>
						</a>
					</div>
				</div>
				<div class="cms-bottom-price-list">
					<div class="cms-bottom-price-pimg">
						<a href="javascript:;">
							<img src="<?php echo $public ?>/img/activity/christmas/pc/zanwei_img.png"/>
						</a>
					</div>
					<div class="cms-bottom-price-pname">
						<a href="javascript:;">
							VOOPOO TOO 180W BOX MOD
						</a>
					</div>
					<div class="cms-bottom-price-pprice">
						<span>$24.0</span>
						<span>$24.0</span>
					</div>
					<div class="cms-bottom-price-padd">
						<a href="javascript:;">
							<span>ADD TO CART</span>
							<span></span>
						</a>
					</div>
				</div>
				<div class="cms-bottom-price-list">
					<div class="cms-bottom-price-pimg">
						<a href="javascript:;">
							<img src="<?php echo $public ?>/img/activity/christmas/pc/zanwei_img.png"/>
						</a>
					</div>
					<div class="cms-bottom-price-pname">
						<a href="javascript:;">
							VOOPOO TOO 180W BOX MOD
						</a>
					</div>
					<div class="cms-bottom-price-pprice">
						<span>$24.0</span>
						<span>$24.0</span>
					</div>
					<div class="cms-bottom-price-padd">
						<a href="javascript:;">
							<span>ADD TO CART</span>
							<span></span>
						</a>
					</div>
				</div>
			</div>
			<!--更多特价-->
			<div class="cms-more-bottom-price">
				<a href="https://www.elegomall.com/promotions.html" target="_blank">
					<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_banner_bottom_price.png"/>
				</a>
			</div>
		</div>
	</div>
</div>
<!--模块5-->
<div class="cms-free-gifts">
	<div class="cms-free-gifts-title">
		<img src="<?php echo $public ?>/img/activity/christmas/pc/tittle_free_gifts.png"/>
	</div>
	<div class="cms-free-gifts-content">
		<div class="cms-share-off">
			<div class="cms-share-off-content">
				<div class="cms-share-off-imgs">
					<a href="https://www.facebook.com/ElegoMall" target="_blank"><img src="<?php echo $public ?>/img/activity/christmas/pc/btn_fb.png"/></a>
					<a href="https://twitter.com/ElegoMall?lang=en" target="_blank"><img src="<?php echo $public ?>/img/activity/christmas/pc/btn_tw.png"/></a>
					<a href="https://www.instagram.com/elegomall_com" target="_blank"><img src="<?php echo $public ?>/img/activity/christmas/pc/btn_ins.png"/></a>
				</div>
			</div>
		</div>
		<div class="cms-sale-content">
			<div class="cms-ad" style="margin-right: 25px;">
				<a href="https://www.elegomall.com/promotions.html" target="_blank">
					<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_banner_sale.png"/>
				</a>
			</div>
			<div class="cms-ad">
				<a href="https://www.elegomall.com/vape-giveaway.html" target="_blank">
					<img src="<?php echo $public ?>/img/activity/christmas/pc/pic_banner_giveaway.png"/>
				</a>
			</div>
		</div>
	</div>
</div>
<!--中奖弹框-->
<!--遮罩层-->
<div class="cover-tip">
	
</div>
<!--//优惠券领未登录显示-->
<div class="notice-tip">
	<div class="notice-title">
		<span>Notice</span>
		<span class="btn-close-icon">
			<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_close_.png"/>
		</span>
		
	</div>
	<div class="notice-content">
		Hello,please <a href="https://www.elegomall.com/site/login.html">login</a>
	</div>
</div>
<!--//优惠券领登录显示-->
<div class="conpon-success">
	<div class="conpon-success-icon">
		<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_close.png"/>
	</div>
	<div class="position-div"></div>
</div>
<!--//抽奖登录显示-->
<div class="lucky-success">
	<div class="conpon-success-icon">
		
	</div>
	<div class="position-success-div"></div>
</div>
<!--//抽奖登录显示-->
<div class="lucky-success-point">
	<div class="conpon-success-icon">
	</div>
	<div class="position-success-sure click-ajax"></div>
	<div class="position-success-cancel"></div>
</div>
<!--积分提示-->
<div class="notice-points">
	<img src="<?php echo $public ?>/img/activity/halloween/pc/notic_points_not_enough.png"/>
</div>
<input style="display: none;" class="ajaxdata" value=""/>
<div class="count-down"></div>
<script>
	$(function(){
		//数据接口
		var data = '<?=$data?>';
//		data=JSON.parse(data);
		$(".ajaxdata").val(data);
//		console.log(data);
		$(".count-down").countDown({
				startTimeStr:'2017/12/28 00:00:00',//开始时间
	        	endTimeStr:'2018/01/06 12:00:00',//结束时间
	        	daySelector:".day_num",
	            hourSelector:".hour_num",
	            minSelector:".min_num",
	            secSelector:".sec_num"
		});
	})
	
</script>

<script type="text/javascript" src="<?php echo $public; ?>/js/activity/christmas.js"></script>
<script type="text/javascript" src="<?php echo $public; ?>/js/scroll.js"></script>
<script type="text/javascript" src="<?php echo $public; ?>/js/countDown.js"></script>
<!--<script type="text/javascript" src="<?php echo $public; ?>/js/activity/activityend.js"></script>-->
<!--<script type="text/javascript" src="<?php echo $public; ?>/js/activity/demo.js"></script>-->