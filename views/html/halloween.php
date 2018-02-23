<?php
$public = Yii::getAlias('@public'); //exit;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<link rel="stylesheet" href="<?php echo $public ?>/css/activity/activity.css">
<script type="text/javascript" src="<?php echo $public; ?>/js/activity/activity.js"></script>
<!--pc-->
<!--内容页焦点图-->
<div class="hallo-banner">
	<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_banner.png">
	<div class="hallo-wicher">
		<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_banner_wicher.png"/>
	</div>
</div>
<div class="hallo-content">
	<div class="pro-bgimg">
		<!--优惠券领取-->
		<div class="hallo-coupon" id="floor1">
			<div class="hallow-coupon-wholsalers">
				<div class="coupon-getbtn hallo-coupon-getbtn-1" data-id="109">
					<div class="cp-btn">
						<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_get_now_1.png"/>
					</div>
					<div class="cp-btn-hover">
						<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_get_now_1_hover.png"/>
					</div>
				</div>
				<div class="coupon-getbtn hallo-coupon-getbtn-2" data-id="111">
					<div class="cp-btn">
						<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_get_now_1.png"/>
					</div>
					<div class="cp-btn-hover">
						<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_get_now_1_hover.png"/>
					</div>
				</div>
				<div class="coupon-getbtn hallo-coupon-getbtn-3" data-id="112">
					<div class="cp-btn">
						<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_get_now_1.png"/>
					</div>
					<div class="cp-btn-hover">
						<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_get_now_1_hover.png"/>
					</div>
				</div>
			</div>
			<div class="hallow-coupon-vape">
				<div class="coupon-getbtn hallo-coupon-getbtn-4" data-id="113">
					<div class="cp-btn">
						<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_get_now_2.png"/>
					</div>
					<div class="cp-btn-hover">
						<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_get_now_2_hover.png"/>
					</div>
				</div>
				<div class="coupon-getbtn hallo-coupon-getbtn-5" data-id="114">
					<div class="cp-btn">
						<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_get_now_2.png"/>
					</div>
					<div class="cp-btn-hover">
						<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_get_now_2_hover.png"/>
					</div>
				</div>
				<div class="coupon-getbtn hallo-coupon-getbtn-6" data-id="115">
					<div class="cp-btn">
						<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_get_now_2.png"/>
					</div>
					<div class="cp-btn-hover">
						<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_get_now_2_hover.png"/>
					</div>
				</div>
			</div>
		</div>
		<!--促销品-->
		<div class="clearance-sale" id="floor2">
			<div class="clearance-title">
				<img src="<?php echo $public ?>/img/activity/halloween/pc/tittle_clearance_sale.png"/>
			</div>
			<div class="clearance-content">
				<!--数据内容-->
			</div>
			
			<div class="clearance-sale-more">
				<a href="/promotions.html">
					<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_check_more.png"/>
				</a>
			</div>
		</div>
	</div>
	<!--抽奖-->
	<div class="lucky-time" id="floor3">
		<div style="background-color: rgba(0,0,0,0.8);position: absolute;top:0;left:0;z-index:7;line-height:1260px;width:100%;text-align: center;">
			<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_notic_lucky_time.png"/>
		</div>
		<div class="l-times">
			<p>LEFT FREE TIMES:
				<span class="times-num">3</span>
				<span class="times-text">times</span>
			</p>
		</div>
		<div id="lottery">
		        <div class="lucky-fl1">
		            <div class="lottery-unit lottery-unit-0"><img src="<?php echo $public ?>/img/activity/halloween/pc/award_0.png"><div class="mask"></div></div>
		            <div class="lottery-unit lottery-unit-1"><img src="<?php echo $public ?>/img/activity/halloween/pc/award_1.png"><div class="mask"></div></div>
		            <div class="lottery-unit lottery-unit-2"><img src="<?php echo $public ?>/img/activity/halloween/pc/award_2.png"><div class="mask"></div></div>
		        </div>
		        <div class="lucky-fl2">
		            <div class="lottery-unit lottery-unit-7"><img src="<?php echo $public ?>/img/activity/halloween/pc/award_7.png"><div class="mask"></div></div>
		            <div class="lucky-btn"><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_start.png"></div>
		            <div class="lottery-unit lottery-unit-3"><img src="<?php echo $public ?>/img/activity/halloween/pc/award_3.png"><div class="mask"></div></div>
		        </div>
		        <div class="lucky-fl3">
		            <div class="lottery-unit lottery-unit-6"><img src="<?php echo $public ?>/img/activity/halloween/pc/award_6.png"><div class="mask"></div></div>
		            <div class="lottery-unit lottery-unit-5"><img src="<?php echo $public ?>/img/activity/halloween/pc/award_5.png"><div class="mask"></div></div>
		            <div class="lottery-unit lottery-unit-4"><img src="<?php echo $public ?>/img/activity/halloween/pc/award_4.png"><div class="mask"></div></div>
		        </div>
		</div>
		<div class="lucky-orders">
			<!--<ul class="lucky-lists">
				<li class="lucky-list">
					<span class="lucky-order lucky-user-name">name</span>
					<span class="lucky-order lucky-user-email">858524555@qq.com</span>
					<span class="lucky-order lucky-user-price">95655-off</span>
				</li>
				<li class="lucky-list">
					<span class="lucky-order lucky-user-name">name</span>
					<span class="lucky-order lucky-user-email">858524555@qq.com</span>
					<span class="lucky-order lucky-user-price">95655-off</span>
				</li>
				<li class="lucky-list">
					<span class="lucky-order lucky-user-name">name</span>
					<span class="lucky-order lucky-user-email">858524555@qq.com</span>
					<span class="lucky-order lucky-user-price">95655-off</span>
				</li>
			</ul>-->
		</div>
	</div>
	<div class="best-product" id="floor4">
		<div style="background-color: rgba(0,0,0,0.8);position: absolute;top:0;left:0;z-index:7;line-height:2220px;width:100%;text-align: center;">
			<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_notic_2017_best_product.png"/>
		</div>
		<div class="best-product-lists">
			<div class="best-product-countyimg">
				<img src="<?php echo $public ?>/img/activity/halloween/pc/brand_usa.png"/>
			</div>
			<div class="best-product-list">
				<ul>
					<li>
						<div class="best-pro-img">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_2017_product_5_6.png"/>
						</div>
						<div class="best-pro-title-text">
							<a href="">
								<!--<span>fsdfsfsdfsdfgdgfsdfgsdg</span>-->
							</a>
						</div>
						<div class="best-pro-btn">
							<a href="">
								<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_add_to_cart (2).png"/>
							</a>
							<a>
								<img src="<?php echo $public ?>/img/activity/halloween/pc/icon_like.png"/>
							</a>
							<span>(0)</span>
						</div>
					</li>
					<li>
						<div class="best-pro-img">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_2017_product_5_6.png"/>
						</div>
						<div class="best-pro-title-text">
							<a href="">
								<!--<span>fsdfsfsdfsdfgdgfsdfgsdg</span>-->
							</a>
						</div>
						<div class="best-pro-btn">
							<a href="">
								<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_add_to_cart (2).png"/>
							</a>
							<a>
								<img src="<?php echo $public ?>/img/activity/halloween/pc/icon_like.png"/>
							</a>
							<span>(0)</span>
						</div>
					</li>
					<li>
						<div class="best-pro-img">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_2017_product_5_6.png"/>
						</div>
						<div class="best-pro-title-text">
							<a href="">
								<!--<span>fsdfsfsdfsdfgdgfsdfgsdg</span>-->
							</a>
						</div>
						<div class="best-pro-btn">
							<a href="">
								<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_add_to_cart (2).png"/>
							</a>
							<a>
								<img src="<?php echo $public ?>/img/activity/halloween/pc/icon_like.png"/>
							</a>
							<span>(0)</span>
						</div>
					</li>
				</ul>
				<ul style="display: none;"></ul>
			</div>
			<div class="best-right-icon"><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_jiantou_2017--------.png"/></div>
		</div>
		<div class="best-product-lists">
			<div class="best-product-countyimg">
				<img src="<?php echo $public ?>/img/activity/halloween/pc/brand_russia.png"/>
			</div>
			<div class="best-product-list">
				<ul>
					<li>
						<div class="best-pro-img">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_2017_product_5_6.png"/>
						</div>
						<div class="best-pro-title-text">
							<a href="">
								<!--<span>fsdfsfsdfsdfgdgfsdfgsdg</span>-->
							</a>
						</div>
						<div class="best-pro-btn">
							<a href="">
								<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_add_to_cart (2).png"/>
							</a>
							<a>
								<img src="<?php echo $public ?>/img/activity/halloween/pc/icon_like.png"/>
							</a>
							<span>(0)</span>
						</div>
					</li>
					<li>
						<div class="best-pro-img">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_2017_product_5_6.png"/>
						</div>
						<div class="best-pro-title-text">
							<a href="">
								<!--<span>fsdfsfsdfsdfgdgfsdfgsdg</span>-->
							</a>
						</div>
						<div class="best-pro-btn">
							<a href="">
								<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_add_to_cart (2).png"/>
							</a>
							<a>
								<img src="<?php echo $public ?>/img/activity/halloween/pc/icon_like.png"/>
							</a>
							<span>(0)</span>
						</div>
					</li>
					<li>
						<div class="best-pro-img">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_2017_product_5_6.png"/>
						</div>
						<div class="best-pro-title-text">
							<a href="">
								<!--<span>fsdfsfsdfsdfgdgfsdfgsdg</span>-->
							</a>
						</div>
						<div class="best-pro-btn">
							<a href="">
								<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_add_to_cart (2).png"/>
							</a>
							<a>
								<img src="<?php echo $public ?>/img/activity/halloween/pc/icon_like.png"/>
							</a>
							<span>(0)</span>
						</div>
					</li>
				</ul>
				<ul style="display: none;"></ul>
			</div>
			<div class="best-right-icon"><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_jiantou_2017--------.png"/></div>
		</div>
		<div class="best-product-lists">
			<div class="best-product-countyimg">
				<img src="<?php echo $public ?>/img/activity/halloween/pc/brand_uk.png"/>
			</div>
			<div class="best-product-list">
				<ul>
					<li>
						<div class="best-pro-img">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_2017_product_5_6.png"/>
						</div>
						<div class="best-pro-title-text">
							<a href="">
								<!--<span>fsdfsfsdfsdfgdgfsdfgsdg</span>-->
							</a>
						</div>
						<div class="best-pro-btn">
							<a href="">
								<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_add_to_cart (2).png"/>
							</a>
							<a>
								<img src="<?php echo $public ?>/img/activity/halloween/pc/icon_like.png"/>
							</a>
							<span>(0)</span>
						</div>
					</li>
					<li>
						<div class="best-pro-img">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_2017_product_5_6.png"/>
						</div>
						<div class="best-pro-title-text">
							<a href="">
								<!--<span>fsdfsfsdfsdfgdgfsdfgsdg</span>-->
							</a>
						</div>
						<div class="best-pro-btn">
							<a href="">
								<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_add_to_cart (2).png"/>
							</a>
							<a>
								<img src="<?php echo $public ?>/img/activity/halloween/pc/icon_like.png"/>
							</a>
							<span>(0)</span>
						</div>
					</li>
					<li>
						<div class="best-pro-img">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_2017_product_5_6.png"/>
						</div>
						<div class="best-pro-title-text">
							<a href="">
								<!--<span>fsdfsfsdfsdfgdgfsdfgsdg</span>-->
							</a>
						</div>
						<div class="best-pro-btn">
							<a href="">
								<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_add_to_cart (2).png"/>
							</a>
							<a>
								<img src="<?php echo $public ?>/img/activity/halloween/pc/icon_like.png"/>
							</a>
							<span>(0)</span>
						</div>
					</li>
				</ul>
				<ul style="display: none;"></ul>
			</div>
			<div class="best-right-icon"><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_jiantou_2017--------.png"/></div>
		</div>
		<div class="best-product-lists">
			<div class="best-product-countyimg">
				<img src="<?php echo $public ?>/img/activity/halloween/pc/brand_canada.png"/>
			</div>
			<div class="best-product-list">
				<ul>
					<li>
						<div class="best-pro-img">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_2017_product_5_6.png"/>
						</div>
						<div class="best-pro-title-text">
							<a href="">
								<!--<span>fsdfsfsdfsdfgdgfsdfgsdg</span>-->
							</a>
						</div>
						<div class="best-pro-btn">
							<a href="">
								<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_add_to_cart (2).png"/>
							</a>
							<a>
								<img src="<?php echo $public ?>/img/activity/halloween/pc/icon_like.png"/>
							</a>
							<span>(0)</span>
						</div>
					</li>
					<li>
						<div class="best-pro-img">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_2017_product_5_6.png"/>
						</div>
						<div class="best-pro-title-text">
							<a href="">
								<!--<span>fsdfsfsdfsdfgdgfsdfgsdg</span>-->
							</a>
						</div>
						<div class="best-pro-btn">
							<a href="">
								<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_add_to_cart (2).png"/>
							</a>
							<a>
								<img src="<?php echo $public ?>/img/activity/halloween/pc/icon_like.png"/>
							</a>
							<span>(0)</span>
						</div>
					</li>
					<li>
						<div class="best-pro-img">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_2017_product_5_6.png"/>
						</div>
						<div class="best-pro-title-text">
							<a href="">
								<!--<span>fsdfsfsdfsdfgdgfsdfgsdg</span>-->
							</a>
						</div>
						<div class="best-pro-btn">
							<a href="">
								<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_add_to_cart (2).png"/>
							</a>
							<a>
								<img src="<?php echo $public ?>/img/activity/halloween/pc/icon_like.png"/>
							</a>
							<span>(0)</span>
						</div>
					</li>
				</ul>
				<ul style="display: none;"></ul>
			</div>
			<div class="best-right-icon"><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_jiantou_2017--------.png"/></div>
		</div>
		<div class="best-product-lists">
			<div class="best-product-countyimg">
				<img src="<?php echo $public ?>/img/activity/halloween/pc/brand_germany.png"/>
			</div>
			<div class="best-product-list">
				<ul>
					<li>
						<div class="best-pro-img">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_2017_product_5_6.png"/>
						</div>
						<div class="best-pro-title-text">
							<a href="">
								<!--<span>fsdfsfsdfsdfgdgfsdfgsdg</span>-->
							</a>
						</div>
						<div class="best-pro-btn">
							<a href="">
								<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_add_to_cart (2).png"/>
							</a>
							<a>
								<img src="<?php echo $public ?>/img/activity/halloween/pc/icon_like.png"/>
							</a>
							<span>(0)</span>
						</div>
					</li>
					<li>
						<div class="best-pro-img">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_2017_product_5_6.png"/>
						</div>
						<div class="best-pro-title-text">
							<a href="">
								<!--<span>fsdfsfsdfsdfgdgfsdfgsdg</span>-->
							</a>
						</div>
						<div class="best-pro-btn">
							<a href="">
								<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_add_to_cart (2).png"/>
							</a>
							<a>
								<img src="<?php echo $public ?>/img/activity/halloween/pc/icon_like.png"/>
							</a>
							<span>(0)</span>
						</div>
					</li>
					<li>
						<div class="best-pro-img">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_2017_product_5_6.png"/>
						</div>
						<div class="best-pro-title-text">
							<a href="">
								<!--<span>fsdfsfsdfsdfgdgfsdfgsdg</span>-->
							</a>
						</div>
						<div class="best-pro-btn">
							<a href="">
								<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_add_to_cart (2).png"/>
							</a>
							<a>
								<img src="<?php echo $public ?>/img/activity/halloween/pc/icon_like.png"/>
							</a>
							<span>(0)</span>
						</div>
					</li>
				</ul>
				<ul style="display: none;"></ul>
			</div>
			<div class="best-right-icon"><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_jiantou_2017--------.png"/></div>
		</div>
	</div>
	<div class="free-trial" id="floor5">
		<div style="background-color: rgba(0,0,0,0.8);position: absolute;top:0;left:0;z-index:7;line-height:1540px;width:100%;text-align: center;">
			<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_notic_free_trail.png"/>
		</div>
		<div class="free-trial-content">
			<div class="free-trial-pro">
				<div class="free-trial-pro-img">
					<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_free_trial_1.png"/>
				</div>
				<div class="free-trial-fail">
					<p>VANDYVAPE Mesh RDA*2</p>
					<div class="free-trial-text">
						<span class="free-num">0 &nbsp;</span>
						<span class="free-price">$45</span>
						<span class="free-time">12:12:12</span>
					</div>
					<div class="free-trial-fail-footer">
						<ul>
							<li><a href=""><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_social_FB.png"/></a></li>
							<li><a href=""><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_social_tt.png"/></a></li>
							<li><a href=""><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_social_ig.png"/></a></li>
							<li><a href=""><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_social_pi.png"/></a></li>
							<li><a href=""><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_social_vk.png"/></a></li>
						</ul>
						<div class="zan">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_like_free_trial.png"/>
						</div>
						<div class="free-join">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_jion_now.png"/>
						</div>
					</div>
				</div>
			</div>
			<div class="free-trial-pro">
				<div class="free-trial-pro-img">
					<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_free_trial_2.png"/>
				</div>
				<div class="free-trial-fail">
					<p>Teslacig Punk Box Mod*2</p>
					<div class="free-trial-text">
						<span class="free-num">0&nbsp; </span>
						<span class="free-price">$45</span>
						<span class="free-time">12:12:12</span>
					</div>
					<div class="free-trial-fail-footer">
						<ul>
							<li><a href=""><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_social_FB.png"/></a></li>
							<li><a href=""><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_social_tt.png"/></a></li>
							<li><a href=""><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_social_ig.png"/></a></li>
							<li><a href=""><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_social_pi.png"/></a></li>
							<li><a href=""><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_social_vk.png"/></a></li>
						</ul>
						<div class="zan">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_like_free_trial.png"/>
						</div>
						<div class="free-join">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_jion_now.png"/>
						</div>
					</div>
				</div>
			</div>
			<div class="free-trial-pro" >
				<div class="free-trial-pro-img">
					<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_free_trial_2_64.png"/>
				</div>
				<div class="free-trial-fail">
					<p>REV SPORT 101W Box Mod*2</p>
					<div class="free-trial-text">
						<span class="free-num">0 &nbsp;</span>
						<span class="free-price">$45</span>
						<span class="free-time">12:12:12</span>
					</div>
					<div class="free-trial-fail-footer">
						<ul>
							<li><a href=""><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_social_FB.png"/></a></li>
							<li><a href=""><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_social_tt.png"/></a></li>
							<li><a href=""><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_social_ig.png"/></a></li>
							<li><a href=""><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_social_pi.png"/></a></li>
							<li><a href=""><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_social_vk.png"/></a></li>
						</ul>
						<div class="zan">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_like_free_trial.png"/>
						</div>
						<div class="free-join">
							<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_jion_now.png"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="margin-bottom: -23px;margin-top:95px;">
		<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_bg_background_bottom.jpg"><div class="mask"/>
	</div>
</div>
</div>
<!--右侧边导航栏-->
<div class="menu-bar-h-cc">
	<div class="menu-headimg">
		<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_events_of_pary.png"/>
	</div>
	<div id="menuBar">
		<ul>
			<li>COUPON TIME</li>
			<li>CLEARANCE SALE</li>
			<li>LUCKY TIME</li>
			<li>2017 BEST PRODUCT</li>
			<li>FREE TRIAL</li>
		</ul>
	</div>
	<div class="menu-footimg">
		<a href="#header">
			<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_back_to_top.png"/>
		</a>
		
	</div>
</div>
<!--左侧边导航栏-->
<div class="ghost-img">
	<img src="<?php echo $public ?>/img/activity/halloween/pc/pic_ghost.png"/>
</div>
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
		Hello,please <a href="/site/login.html">login</a> to get the coupon
	</div>
</div>
<!--//优惠券领登录显示-->
<div class="conpon-success">
	<div class="conpon-success-icon">
		<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_close.png"/>
	</div>
	<div class="position-div"></div>
</div>
<!--适配移动端-->
<div class="mb-content">
	<!--手机banner-->
	<div class="mb-hallo-banner">
		<img src="<?php echo $public ?>/img/activity/halloween/wepapp/bg_banner.png"/>
	</div>
	<div class="mb-content-floor">
		<div class="mb-coupon">
			<div class="mb-coupon-list" data-id="109">
				<div class="mb-coupon-btn">
					
				</div>
			</div>
			<div class="mb-coupon-list" data-id="111">
				<div class="mb-coupon-btn">
					
				</div>
			</div>
			<div class="mb-coupon-list" data-id="112">
				<div class="mb-coupon-btn">
					
				</div>
			</div>
			<div class="mb-coupon-list" data-id="113">
				<div class="mb-coupon-btn">
					
				</div>
			</div>
			<div class="mb-coupon-list" data-id="114">
				<div class="mb-coupon-btn">
					
				</div>
			</div>
			<div class="mb-coupon-list" data-id="115">
				<div class="mb-coupon-btn">
					
				</div>
			</div>
		</div>
		<!--促销产品-->
		<div class="mb-clearance-sale">
			<div class="mb-clearance-title">
				<img src="<?php echo $public ?>/img/activity/halloween/wepapp/tittle_clearance_sale.png"/>
			</div>
			<div class="mb-clearance-content">
				<!--数据内容-->
			</div>
			
			<div class="mb-clearance-sale-more">
				<a href="/promotions.html">
					<img src="<?php echo $public ?>/img/activity/halloween/wepapp/btn_check_more.png"/>
				</a>
			</div>
		</div>
	</div>
</div>