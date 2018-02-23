<?php
//dump($data['shuffling']);

?>
<!-- css 不多用内部样式表 -->
<style>
	.exclusive-wrap{width:100%;height:auto;background:#363239;padding-bottom:130px;}
	.exclusive-wrap .exclusive{max-width:1920px;width:100%;height:auto;margin:0 auto;}
	.exclusive-wrap .exclusive .banner{width:100%;height:auto;margin:0 auto;background:orange;}
	.exclusive-wrap .exclusive .banner img{width:100%;height:auto;}
	.exclusive-wrap .exclusive .exclusive-products-wrap{width:100%;min-height:300px;background:url(/theme/new/images/giveaway/bg_02.jpg);background-size:100% 100%;}
	.exclusive .exclusive-products-wrap .exclusive-products{width:1140px;height:auto;margin:0 auto;}
	.exclusive .exclusive-products .itemleft{width:100%;height:388px;}
	.exclusive .exclusive-products .itemleft .left{float:left;width:50%;height:100%;}
	.exclusive .exclusive-products .itemleft .left img{width:100%;height:100%;}
	.exclusive .exclusive-products .itemleft .right{width:50%;height:100%;float:right;padding: 26px 0 0 34px;background:#1a1823;}
	.exclusive .exclusive-products .itemleft .havecolor{background:#1a1823;}
	.exclusive .exclusive-products .itemleft .right h3{width:100%;height:72px;line-height:72px;font-size:20px;color:#fbfbfd;font-weight:bold;position:relative;}
	.exclusive .exclusive-products .itemleft .right h3 a{color:#fbfbfd;display:block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;}
	.exclusive .exclusive-products .itemleft .right span{position:absolute;display:block;width:31px;height:4px;background:#ff6e43;left:5px;bottom:0;}
	.exclusive .exclusive-products .itemleft .right .desc{width:100%;line-height:25px;height:75px;font-size:14px;color:#979698;padding-right:93px;margin-top:22px;overflow : hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;}
	.exclusive .exclusive-products .itemleft .right .logo{width:100%;height:112px;padding-left:4px;margin-top:34px;}
	.exclusive .exclusive-products .itemleft .right .logo img{height:100%;}

	.exclusive .exclusive-products .itemright{width:100%;height:388px;background:green;}
	.exclusive .exclusive-products .itemright .left{float:left;width:50%;height:100%;background:red;padding: 26px 0 0 34px;background:#1a1823;}
	.exclusive .exclusive-products .itemright .right img{width:100%;height:100%;}
	.exclusive .exclusive-products .itemright .right{width:50%;height:100%;float:right;}
	.exclusive .exclusive-products .itemright .havecolor{background:#1a1823;}
	.exclusive .exclusive-products .itemright .left h3{width:100%;height:72px;line-height:72px;font-size:20px;color:#fbfbfd;font-weight:bold;position:relative;}
	.exclusive .exclusive-products .itemright .left h3 a{color:#fbfbfd;display:block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;}
	.exclusive .exclusive-products .itemright .left span{position:absolute;display:block;width:31px;height:4px;background:#ff6e43;left:5px;bottom:0;}
	.exclusive .exclusive-products .itemright .left .desc{width:100%;line-height:25px;height:75px;font-size:14px;color:#979698;padding-right:93px;margin-top:22px;overflow : hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;}
	.exclusive .exclusive-products .itemright .left .logo{width:100%;height:112px;padding-left:4px;margin-top:34px;}
	.exclusive .exclusive-products .itemright .left .logo img{height:100%;}
	.exclusive .ad-product{width:100%;height:auto;background:#363239;}
	.exclusive .ad-product .ad{width:1140px;height:auto;margin:0 auto;padding-top:25px;}
	.exclusive .ad-div{width:100%;height:600px;box-shadow:0 0 40px 0 #1c1a1e;position:relative;}
	.exclusive .ad-div .start{position:absolute;left:40px;top:265px;width:70px;height:70px;}
	.exclusive .ad-div .start span{display:block;width:100%;height:100%;background:url(/theme/new/images/giveaway/pic_jiantou_left.png);background-size:100% 100%;cursor:pointer;}
	.exclusive .ad-div .start span:hover{background:url(/theme/new/images/giveaway/pic_jiantou_left_hover.png);background-size:100% 100%;}
	.exclusive .ad-div .end{position:absolute;right:40px;top:265px;width:70px;height:70px;}
	.exclusive .ad-div .end span{display:block;width:100%;height:100%;background:url(/theme/new/images/giveaway/pic_jiantou_right.png);background-size:100% 100%;cursor:pointer;}
	.exclusive .ad-div .end span:hover{background:url(/theme/new/images/giveaway/pic_jiantou_right_hover.png);background-size:100% 100%;}
	.exclusive .ad-div .lunbo{width:100%;height:100%;}
	.exclusive .ad-div .lunbo li{float:left;width:1140px;height:100%;padding:25px 50px;position:absolute;left:0;top:0;background:url(/theme/new/images/giveaway/pic_bg_products.png);opacity:0;cursor:pointer;}
	.exclusive .ad-div .lunbo li:nth-child(1){opacity:1;}
	.exclusive .ad-div .lunbo li .logo{float:left;width:180px;height:78px;}
	.exclusive .ad-div .lunbo li .lunbo-img{float:left;}
	.exclusive .ad-div .lunbo li .pic{float:left;width:400px;height:400px;margin-left:136px;}
	.exclusive .ad-div .lunbo li .pic-title{width:100%;height:70px;line-height:70px;font-size:26px;font-weight:bold;color:#ffffff;text-align:center;clear:both;}
	.exclusive .ad-div .lunbo li .pic-title a{color:#ffffff;}
	.exclusive .ad-div .lunbo li .line{display:block;width:31px;height:4px;background:#ff6f41;margin:0 auto;clear:both;}
	.exclusive .ad-div .lunbo li .pic-desc{font-size:14px;height:48px;line-height:24px;color:#97909c;text-align:center;margin-top:13px;overflow : hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;}
	.exclusive .uwell-wrap{width:1140px;height:auto;padding-top:40px;background:#363239;margin:0 auto;}
	.exclusive .uwell-wrap>.title{width:100%;height:122px;font-size:42px;line-height:122px;font-weight:bold;color:#080708;text-align:center;}
	.exclusive .uwell-wrap .uwell-lunbo{width:100%;height:384px;overflow:hidden;position:relative;}
	.exclusive .uwell-wrap .uwell{height:auto;position:absolute;left:0;}
	.exclusive .uwell-wrap .uwell li{width:268px;height:auto;float:left;margin-left:22px;background:red;background:#444049;padding-bottom:20px;box-shadow:0 0 20px 0 #1c1a1e;}
	.exclusive .uwell-wrap .uwell li:nth-child(1){margin-left:0;}
	.exclusive .uwell-wrap .uwell li .pic{display:block;width:100%;height:268px;overflow:hidden;}
	.exclusive .uwell-wrap .uwell li img{width:100%;height:100%;}
	.exclusive .uwell-wrap .uwell li .title{width:100%;height:43px;padding:3px 10px 0;font-size:16px;font-weight:bold;color:#ffffff;line-height:46px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;}
	.exclusive .uwell-wrap .uwell li .title a{color:#ffffff;}
	.exclusive .uwell-wrap .uwell li .line{display:block;width:31px;height:4px;background:#ff6f41;margin-left:10px;}
	.exclusive .uwell-wrap .uwell li .uwell-desc{width:100%;padding:10px 10px 0;height:42px;font-size:14px;line-height:16px;color:#979797;overflow : hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;}
	.exclusive .uwell-wrap .start{position:absolute;left:0;top:70px;z-index:9;}
	.exclusive .uwell-wrap .end{position:absolute;right:0;top:70px;z-index:9;}
	.exclusive .uwell-wrap .start a{display:block;width:100%;height:100%;background:rgba(204,204,204,0.3);}
	.exclusive .uwell-wrap .end a{display:block;width:100%;height:100%;background:rgba(204,204,204,0.3);}
	.exclusive .uwell-wrap .start a:hover{background:rgba(204,204,204,0.5);}
	.exclusive .uwell-wrap .end a:hover{background:rgba(204,204,204,0.5);}

	.exclusive .vandyvape-wrap{width:1140px;height:auto;padding-top:40px;background:#363239;margin:0 auto;}
	.exclusive .vandyvape-wrap>.title{width:100%;height:122px;font-size:42px;line-height:122px;font-weight:bold;color:#080708;text-align:center;}
	.exclusive .vandyvape-wrap .vandyvape-lunbo{height:384px;overflow:hidden;position:relative;}
	.exclusive .vandyvape-wrap .vandyvape{height:auto;position:absolute;left:0;}
	.exclusive .vandyvape-wrap .vandyvape li{width:268px;height:auto;float:left;margin-left:22px;background:red;background:#444049;padding-bottom:20px;box-shadow:0 0 20px 0 #1c1a1e;}
	.exclusive .vandyvape-wrap .vandyvape li:nth-child(1){margin-left:0;}
	.exclusive .vandyvape-wrap .vandyvape li a{display:block;width:100%;height:268px;overflow:hidden;}
	.exclusive .vandyvape-wrap .vandyvape li img{width:100%;height:100%;}
	.exclusive .vandyvape-wrap .vandyvape li .title{width:100%;height:43px;padding:3px 10px 0;font-size:16px;font-weight:bold;color:#ffffff;line-height:46px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;}
	.exclusive .vandyvape-wrap .vandyvape li .title a{color:#ffffff;}
	.exclusive .vandyvape-wrap .vandyvape li .line{display:block;width:31px;height:4px;background:#ff6f41;margin-left:10px;}
	.exclusive .vandyvape-wrap .vandyvape li .vandyvape-desc{width:100%;height:42px;padding:10px 10px 0;font-size:14px;line-height:16px;color:#979797;overflow : hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;}
	.exclusive .vandyvape-wrap .start{position:absolute;left:0;top:70px;z-index:9;}
	.exclusive .vandyvape-wrap .end{position:absolute;right:0;top:70px;z-index:9;}
	.exclusive .vandyvape-wrap .start a{display:block;width:100%;height:100%;background:rgba(204,204,204,0.3);}
	.exclusive .vandyvape-wrap .end a{display:block;width:100%;height:100%;background:rgba(204,204,204,0.3);}
	.exclusive .vandyvape-wrap .start a:hover{background:rgba(204,204,204,0.5);}
	.exclusive .vandyvape-wrap .end a:hover{background:rgba(204,204,204,0.5);}
	.exclusive .exclusive-products-wrap .exclusive-products-m{display:none;}
	.exclusive .exclusive-products-wrap .exclusive-products{display:block;}
	@media screen and (max-width: 768px){
		.exclusive-wrap{width:100%;height:auto;}
		.exclusive-products-wrap{width:100%;height:auto;}
		.exclusive .exclusive-products-wrap .exclusive-products{width:90%;margin:0 auto;display:none;}
		.exclusive .exclusive-products-wrap .exclusive-products-m{display:block;width:90%;margin:0 auto;}
		.exclusive .exclusive-products-m .itemleft{width:100%;height:auto;background:green;}
		.exclusive .exclusive-products-m .itemleft .left{float:left;width:100%;height:100%;background:red;}
		.exclusive .exclusive-products-m .itemleft .left img{width:100%;height:100%;}
		.exclusive .exclusive-products-m .itemleft .right{width:100%;height:100%;float:right;padding: 10px;background:#1a1823;}
		.exclusive .exclusive-products-m .itemleft .havecolor{background:#1a1823;}
		.exclusive .exclusive-products-m .itemleft .right h3{width:100%;height:72px;line-height:72px;font-size:16px;color:#fbfbfd;font-weight:bold;position:relative;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;;}
		.exclusive .exclusive-products-m .itemleft .right h3 a{color:#fbfbfd;}
		.exclusive .exclusive-products-m .itemleft .right span{position:absolute;display:block;width:31px;height:4px;background:#ff6e43;left:5px;bottom:0;}
		.exclusive .exclusive-products-m .itemleft .right .desc{width:100%;line-height:25px;height:75px;font-size:12px;color:#57565e;padding-right:0;margin-top:22px;overflow : hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;}
		.exclusive .exclusive-products-m .itemleft .right .logo{width:100%;height:112px;padding-left:4px;margin-top:10px;text-align:center;}
		.exclusive .exclusive-products-m .itemleft .right .logo img{height:80%;}
		.exclusive .ad-product .ad{width:90%;margin:0 auto;}
		.exclusive .ad-div{height:350px;}
		.exclusive .ad-div .lunbo li{width:100%;height:100%;padding:10px;text-align:center;}
		.exclusive .ad-div .start{width:35px;height:35px;left:3px;top:157px;}
		.exclusive .ad-div .start a:hover{background-size:100% 100%;}
		.exclusive .ad-div .end{width:35px;height:35px;right:3px;top:157px;}
		.exclusive .ad-div .end a:hover{background-size:100% 100%;}
		.exclusive .ad-div .lunbo li .logo{width:90px;height:auto;}
		.exclusive .ad-div .lunbo li .logo img{width:100%;}
		.exclusive .ad-div .lunbo li .pic{width:80%;height:auto;float:none;margin:0 auto;}
		.exclusive .ad-div .lunbo li .pic-title{height:40px;font-size:20px;line-height:40px;}

		.exclusive .uwell-wrap{width:100%;padding-top:10px;}
		.exclusive .uwell-wrap .uwell-lunbo{height:auto;width:90%;margin:0 auto;overflow:auto;position:static;}
		.exclusive .uwell-wrap .uwell{position:static;}
		.exclusive .uwell-wrap>.title{height:60px;line-height:60px;font-size:20px;}
		.exclusive .uwell-wrap .uwell li{width:48%;margin:0;}
		.exclusive .uwell-wrap .uwell li:nth-child(2n-1){float:left;}
		.exclusive .uwell-wrap .uwell li:nth-child(2n){float:right;}
		.exclusive .uwell-wrap .uwell li .pic{height:auto;}
		.exclusive .uwell-wrap .start{display:none;}
		.exclusive .uwell-wrap .end{display:none;}

		.exclusive .vandyvape-wrap{width:100%;padding-top:10px;}
		.exclusive .vandyvape-wrap .vandyvape-lunbo{height:auto;width:90%;margin:0 auto;position:static;}
		.exclusive .vandyvape-wrap>.title{height:60px;line-height:60px;font-size:20px;}
		.exclusive .vandyvape-wrap .vandyvape{position:static;}
		.exclusive .vandyvape-wrap .vandyvape li{width:48%;margin:0;}
		.exclusive .vandyvape-wrap .vandyvape li:nth-child(2n-1){float:left;}
		.exclusive .vandyvape-wrap .vandyvape li:nth-child(2n){float:right;}
		.exclusive .vandyvape-wrap .vandyvape li .pic{height:auto;}
		.exclusive .vandyvape-wrap .start{display:none;}
		.exclusive .vandyvape-wrap .end{display:none;}
	}
</style>
<div class="exclusive-wrap">
	<div class="exclusive">
		<!-- banner -->
		<div class="banner">
			<img src="/theme/new/images/giveaway/bg_01.jpg" />
		</div>
		<div class="exclusive-products-wrap">
			<div class="exclusive-products">
                <?php foreach($data['exclusive'] as $k1 => $item1){ if ($k1 % 2 == 0) {?>
                    <div class="clearfix item itemleft">
                        <div class="left">
                            <a href="<?=$item1->url?>"><img src="<?=$item1->image ?>" onerror="javascript:this.src='/theme/new/images/noImg.jpg';"/></a>
                        </div>
                        <div class="right">
                            <h3><a href="<?=$item1->url?>"><?=$item1->title ?></a><span></span></h3>
                            <p class="desc"><?=$item1->description ?></p>
                            <div class="logo"><img src="<?=$item1->logo ?>"/></div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="clearfix item itemright">
                        <div class="left">
                            <h3><a href="<?=$item1->url?>"><?=$item1->title ?></a><span></span></h3>
                            <p class="desc"><?=$item1->description ?></p>
                            <div class="logo"><img src="<?=$item1->logo ?>"/></div>
                        </div>
                        <div class="right">
                            <a href="<?=$item1->url?>"><img src="<?=$item1->image ?>" onerror="javascript:this.src='/theme/new/images/noImg.jpg';"/></a>
                        </div>
                    </div>
                <?php } } ?>
				<!--<div class="clearfix item itemleft">
					<div class="left">
						<img src="/theme/new/images/giveaway/moni_pic.jpg" />
					</div>
					<div class="right">
						<h3>Vandy vape Bonza RDA -2ml<span></span></h3>
						<p class="desc">Vandy vape Bonza RDA -2mlVandy vape Bonza RDA -2mlVandy vape Bonza RDA -2mlVandy vape Bonza RDA -2mlVandy vape Bonza RDA -2mlVandy vape Bonza RDA -2mlVandy vape Bonza RDA -2mlVandy vape Bonza RDA -2ml vape Bonza RDA -2mlVandy vape Bonza RDA -2ml vape Bonza RDA -2mlVandy vape Bonza RDA -2ml</p>
						<div class="logo"><img src="/theme/new/images/giveaway/moni_logo.png" /></div>
					</div>
				</div>-->
			</div>
			<div class="exclusive-products-m">
                <?php foreach($data['exclusive'] as $k1 => $item1){?>
				<div class="clearfix item itemleft">
					<div class="left">
                        <a href="<?=$item1->url?>"><img src="<?=$item1->image ?>" onerror="javascript:this.src='/theme/new/images/noImg.jpg';"/></a>
					</div>
					<div class="right">
                        <h3><a href="<?=$item1->url?>"><?=$item1->title ?></a><span></span></h3>
                        <p class="desc"><?=$item1->description ?></p>
                        <div class="logo"><img src="<?=$item1->logo ?>"/></div>
					</div>
				</div>
                <?php } ?>
			</div>
		</div>
		<!-- 轮播广告 -->
		<div class="ad-product">
			<div class="ad">
				<div class="ad-div">
					<ul class="lunbo">
                        <?php foreach($data['shuffling'] as $k1 => $item1){?>
						<li>
							<div class="clearfix logo"><img src="<?=$item1->logo ?>"/></div>
							<a class="lunbo-img" href="<?=$item1->url?>"><img class="pic" src="<?=$item1->image ?>" onerror="javascript:this.src='/theme/new/images/noImg.jpg';"/></a>
							<h3 class="pic-title"><a href="<?=$item1->url?>"><?=$item1->title ?></a></h3>
							<span class="line"></span>
							<p class="pic-desc"><?=$item1->description ?></p>
						</li>
                        <?php } ?>
					</ul>
					<div class="start"><span href="javascript:;" ></span></div>
					<div class="end"><span href="javascript:;" ></span></div>
				</div>
			</div>
		</div>
		<!-- uwell product -->
		<div class="uwell-wrap">
			<div class="title">UWELL</div>
			<div class="uwell-lunbo">
				<ul class="clearfix uwell">
                    <?php foreach($data['uwell'] as $k1 => $item1){?>
					<li>
						<a href="<?=$item1->url?>" class="pic"><img src="<?=$item1->image ?>" onerror="javascript:this.src='/theme/new/images/giveaway/moni_pic.jpg';"></a>
						<h3 class="title"><a href="<?=$item1->url?>"><?=$item1->title ?></a></h3>
						<span class="line"></span>
						<div class="uwell-desc"><?=$item1->description ?></div>
					</li>
                    <?php } ?>
					<!--<li>
						<a href="javascript:;" ><img src="/theme/new/images/giveaway/moni_pic.jpg" /></a>
						<h3 class="title">edfaeswfesfsrg</h3>
						<span class="line"></span>
						<div class="uwell-desc">ffffffffffffffffffffffdfbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg g</div>
					</li>
					<li>
						<a href="javascript:;" ><img src="/theme/new/images/giveaway/moni_pic.jpg" /></a>
						<h3 class="title">edfaeswfesfsrg</h3>
						<span class="line"></span>
						<div class="uwell-desc">ffffffffffffffffffffffdfbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg g</div>
					</li>
					<li>
						<a href="javascript:;" ><img src="/theme/new/images/giveaway/moni_pic.jpg" /></a>
						<h3 class="title">edfaeswfesfsrg</h3>
						<span class="line"></span>
						<div class="uwell-desc">ffffffffffffffffffffffdfbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg g</div>
					</li>
					<li>
						<a href="javascript:;" ><img src="/theme/new/images/giveaway/moni_pic.jpg" /></a>
						<h3 class="title">edfaeswfesfsrg</h3>
						<span class="line"></span>
						<div class="uwell-desc">ffffffffffffffffffffffdfbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg g</div>
					</li>
					<li>
						<a href="javascript:;" ><img src="/theme/new/images/giveaway/moni_pic.jpg" /></a>
						<h3 class="title">edfaeswfesfsrg</h3>
						<span class="line"></span>
						<div class="uwell-desc">ffffffffffffffffffffffdfbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg g</div>
					</li>
					<li>
						<a href="javascript:;" ><img src="/theme/new/images/giveaway/moni_pic.jpg" /></a>
						<h3 class="title">edfaeswfesfsrg</h3>
						<span class="line"></span>
						<div class="uwell-desc">ffffffffffffffffffffffdfbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg gbrth rtghrth ghrstgt ergdrg gsreg g</div>
					</li>-->
					
				</ul>
				<div class="start"><a href="javascript:;" ><img src="/theme/new/images/giveaway/pic_jiantou_1_left.png" /></a></div>
				<div class="end"><a href="javascript:;" ><img src="/theme/new/images/giveaway/pic_jiantou_1_right.png" /></a></div>
			</div>
		</div>

		<!-- vandyvape -->
		<div class="vandyvape-wrap">
			<div class="title">VANDYVAPE</div>
			<div class="vandyvape-lunbo">
				<ul class="clearfix vandyvape">
                    <?php foreach($data['vandyvape'] as $k1 => $item1){?>
					<li>
                        <a href="<?=$item1->url?>" class="pic"><img src="<?=$item1->image ?>" onerror="javascript:this.src='/theme/new/images/noImg.jpg';"/></a>
                        <h3 class="title"><a href="<?=$item1->url?>"><?=$item1->title ?></a></h3>
                        <span class="line"></span>
                        <div class="vandyvape-desc"><?=$item1->description ?></div>
					</li>
                    <?php } ?>
				</ul>
				<div class="start"><a href="javascript:;" ><img src="/theme/new/images/giveaway/pic_jiantou_1_left.png" /></a></div>
				<div class="end"><a href="javascript:;" ><img src="/theme/new/images/giveaway/pic_jiantou_1_right.png" /></a></div>
			</div>
		</div>
	</div>
</div>
<script>
	var num = 0;
	var lastNum = sumLength-1;
	var lunbo_zindex = 9;
	var startend = 10;
	var sumLength = $('.lunbo li').length;
	$('.ad-div .end').on('click',function(){
		lastNum = num;
		num++;
		if(num>sumLength-1){
			num = 0;
			lastNum = sumLength-1;
		}
		lunbo_zindex ++;
		startend++;
		$('.exclusive .ad-div .start').css({'z-index':startend});
		$('.exclusive .ad-div .end').css({'z-index':startend});
		$('.lunbo li').eq(lastNum).stop().animate({'opacity':0},400);
		$('.lunbo li').eq(num).stop().animate({'opacity':1},400,function(){
			
			$('.lunbo li').eq(num).css({'z-index':lunbo_zindex});
		});
	});
	$('.ad-div .start').on('click',function(){
		lastNum = num;
		num--;
		if(num<0){
			num = sumLength-1;
			lastNum = 0;
		}
		lunbo_zindex ++;
		startend++;
		$('.exclusive .ad-div .end').css({'z-index':startend});
		$('.exclusive .ad-div .start').css({'z-index':startend});
		$('.lunbo li').eq(lastNum).stop().animate({'opacity':0},400);
		$('.lunbo li').eq(num).stop().animate({'opacity':1},400,function(){
			
			$('.lunbo li').eq(num).css({'z-index':lunbo_zindex});
		});
	});
	$('.uwell').on('mouseover mouseout','img',function(e){
		if(e.type =='mouseover'){
			$(this).css({'transform':'scale(1.2)','transition':'all 0.6s ease 0s'});
		}else if(e.type =='mouseout'){
			$(this).css({'transform':'scale(1)','transition':'all 0.6s ease 0s'});
		}
	});
	$('.vandyvape').on('mouseover mouseout','img',function(e){
		if(e.type =='mouseover'){
			$(this).css({'transform':'scale(1.2)','transition':'all 0.6s ease 0s'});
		}else if(e.type =='mouseout'){
			$(this).css({'transform':'scale(1)','transition':'all 0.6s ease 0s'});
		}
	});
	
	var a = 0;
	var uwellLength = $('.uwell li').length;
	if(uwellLength>=0&&uwellLength<=4){
		$('.uwell-lunbo .start').hide();
		$('.uwell-lunbo .end').hide();
	}else if(uwellLength == 0){
		$('.uwell').html('<li style="width:100%;height:100px;line-height:100px;color:#ffffff;text-align:center;">no uwell</li>');
	}
	if(isAPP() == 'pc'){
		$('.uwell').width(uwellLength*290);
	}
	$('.uwell-lunbo .end').on('click',function(){
		a++;
		if(a>uwellLength-4){
			a=uwellLength-4;
			return;
		}
		uwellAnimate(uwellLength,a);
	});
	$('.uwell-lunbo .start').on('click',function(){
		a--;
		if(a<0){
			a=0;
			return;
		}
		uwellAnimate(uwellLength,a);
	});

	function uwellAnimate(uwellLength,a){
		$('.uwell').stop().animate({'left':-1*a*290+'px'},200);
	};

	var b = 0;
	var vandyvapeLength = $('.vandyvape li').length;
	if(vandyvapeLength>0&&vandyvapeLength<=4){
		$('.vandyvape-lunbo .start').hide();
		$('.vandyvape-lunbo .end').hide();
	}else if(vandyvapeLength ==0){
		$('.vandyvape').html('<li style="width:100%;height:100px;line-height:100px;color:#ffffff;text-align:center;">no uwell</li>');
	}
	if(isAPP() == 'pc'){
		$('.vandyvape').width(vandyvapeLength*290);
	}
	$('.vandyvape-lunbo .end').on('click',function(){
		b++;
		if(b>vandyvapeLength-4){
			b=vandyvapeLength-4;
			console.log(b+'++');
			return;
		}
		$('.vandyvape').stop().animate({'left':-1*b*290+'px'},200);
	});
	$('.vandyvape-lunbo .start').on('click',function(){
		b--;
		if(b<0){
			b=0;
			console.log(b+'--');
			return;
		}
		$('.vandyvape').stop().animate({'left':-1*b*290+'px'},200);
	});
	//自动轮播
	var timer = null;
	// timer = 
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









