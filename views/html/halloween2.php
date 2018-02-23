<?php
$public = Yii::getAlias('@public'); //exit;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<link rel="stylesheet" href="<?php echo $public ?>/css/activity/activity.css">
<script type="text/javascript" src="<?php echo $public; ?>/js/activity/activity.js"></script>
<script type="text/javascript" src="<?php echo $public; ?>/js/scroll.js"></script>
<script type="text/javascript" src="<?php echo $public; ?>/js/countDown.js"></script>

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
		<div class="l-times">
			<p>LEFT FREE TIMES:
				<span class="times-num"></span>
				<span class="times-text">times</span>
			</p>
		</div>
		<div id="lottery">
		        <div class="lucky-fl1">
		            <div class="lottery-unit lottery-unit-0 active"><img src="<?php echo $public ?>/img/activity/halloween/pc/i_award_0.png"><div class="mask"></div></div>
		            <div class="lottery-unit lottery-unit-1"><img src="<?php echo $public ?>/img/activity/halloween/pc/i_award_1.png"><div class="mask"></div></div>
		            <div class="lottery-unit lottery-unit-2"><img src="<?php echo $public ?>/img/activity/halloween/pc/i_award_2.png"><div class="mask"></div></div>
		        </div>
		        <div class="lucky-fl2">
		            <div class="lottery-unit lottery-unit-7"><img src="<?php echo $public ?>/img/activity/halloween/pc/i_award_7.png"><div class="mask"></div></div>
		            <div class="lucky-btn"><img src="<?php echo $public ?>/img/activity/halloween/pc/btn_start.png"></div>
		            <div class="lottery-unit lottery-unit-3"><img src="<?php echo $public ?>/img/activity/halloween/pc/i_award_3.png"><div class="mask"></div></div>
		        </div>
		        <div class="lucky-fl3">
		            <div class="lottery-unit lottery-unit-6"><img src="<?php echo $public ?>/img/activity/halloween/pc/i_award_6.png"><div class="mask"></div></div>
		            <div class="lottery-unit lottery-unit-5"><img src="<?php echo $public ?>/img/activity/halloween/pc/i_award_5.png"><div class="mask"></div></div>
		            <div class="lottery-unit lottery-unit-4"><img src="<?php echo $public ?>/img/activity/halloween/pc/i_award_4.png"><div class="mask"></div></div>
		        </div>
		</div>
		<!--中奖列表-->
		<div class="lucky-orders">
			<ul class="lucky-lists">
				
			</ul>
		</div>
	</div>
	<div class="best-product" id="floor4">
	<!--2017最好品牌html-->
	</div>
	<div class="free-trial" id="floor5">
		<div class="free-trial-content">
			<!--试用内容-->
		</div>
	</div>
	<!--活动底部图片-->
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
		<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_close.png"/>
	</div>
	<div class="position-success-div"></div>
</div>
<!--//抽奖登录显示-->
<div class="lucky-success-point">
	<div class="conpon-success-icon">
		<img src="<?php echo $public ?>/img/activity/halloween/pc/btn_close.png"/>
	</div>
	<div class="position-success-sure click-ajax"></div>
	<div class="position-success-cancel"></div>
</div>
<!--积分提示-->
<div class="notice-points">
	<img src="<?php echo $public ?>/img/activity/halloween/pc/notic_points_not_enough.png"/>
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
<!--liuhongmei===================首页遮罩层======================-->
        <div class="l-tip-cover-2" style="display:block;z-index: 7777;">

        </div>
        <!--liuhongmei===================活动过期提醒开始======================-->
        <div class="l-year-alert-tip-2" style="display:block;height: 200px;z-index: 7778;">
            <div>
                <img src="<?php echo $public ?>/img/index/tip-header.png" alt="消息头部图片"/>
            </div>
            <div class="l-year-alert-content" style="padding:10px;">
                <h4></h4>
                <p style="text-align: center;">The activity has expired!</p>
            </div>
            
            <div class="l-year-alert-footer" style="background:#fff;">
                <a href="/" style="width: 200px;height: 30px;background:#ee3e43;display: block;color: #fff;line-height: 30px;text-align: center;border-radius: 3px;margin: 0 auto;"> Home Page</a>
            </div>
        </div>
       