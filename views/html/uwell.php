<?php
/**
 * Created by PhpStorm.
 * User: LIU
 * Date: 2017/10/31
 * Time: 10:57
 */
?>
<link rel="stylesheet" href="/theme/new/css/uwell.css">
<div class="uwell-wrap">
	<!-- banner -->
	<div class="banner"><a href="javascript:;"><img src="/theme/new/images/brands/uwell/banner.jpg" /></a></div>

	<div class="uwell-content">
		<div class="about-uwell">
			<p class="title"><span>ABOUT</span><span>UWELL</span></p>
			<div class="pic"><img src="/theme/new/images/brands/uwell/about_uwell.png" /></div>
		</div>

		<div class="products">
			<p class="title">PRODUCTS</p>
			<ul class="clearfix">
				<li class="mark_bg"><a href="javascript:;"><img src="/theme/new/images/brands/uwell/product_1.png" /></a></li>
				<li><a href="javascript:;"><img src="/theme/new/images/brands/uwell/product_2.png" /></a></li>
				<li><a href="javascript:;"><img src="/theme/new/images/brands/uwell/product_3.png" /></a></li>
			</ul>
		</div>
		<!-- products-list -->
		<div class="clearfix products-list">
			<ul>
				<li class="img"><a href=""><img src="/theme/new/images/noimg_quesheng.png" /></a></li>
				<li class="title"><a href="">uwell valyrian Atomizer - 5.0ml</a></li>
				<li class="price"><span class="new-price">$12.34</span><span class="old-price">$12.34</span></li>
				<li class="addtocart"><a href=""><span class="span1">ADD TO CART</span><span class="span2"><img src="/theme/new/img/icon_shopping_cart-white.png" /></span></a></li>
			</ul>
			<ul>
				<li class="img"><a href=""><img src="/theme/new/images/noimg_quesheng.png" /></a></li>
				<li class="title"><a href="">uwell valyrian Atomizer - 5.0ml</a></li>
				<li class="price"><span class="new-price">$12.34</span><span class="old-price">$12.34</span></li>
				<li class="addtocart"><a href=""><span class="span1">ADD TO CART</span><span class="span2"><img src="/theme/new/img/icon_shopping_cart-white.png" /></span></a></li>
			</ul>
			<ul>
				<li class="img"><a href=""><img src="/theme/new/images/noimg_quesheng.png" /></a></li>
				<li class="title"><a href="">uwell valyrian Atomizer - 5.0ml</a></li>
				<li class="price"><span class="new-price">$12.34</span><span class="old-price">$12.34</span></li>
				<li class="addtocart"><a href=""><span class="span1">ADD TO CART</span><span class="span2"><img src="/theme/new/img/icon_shopping_cart-white.png" /></span></a></li>
			</ul>
			<ul>
				<li class="img"><a href=""><img src="/theme/new/images/noimg_quesheng.png" /></a></li>
				<li class="title"><a href="">uwell valyrian Atomizer - 5.0ml</a></li>
				<li class="price"><span class="new-price">$12.34</span><span class="old-price">$12.34</span></li>
				<li class="addtocart"><a href=""><span class="span1">ADD TO CART</span><span class="span2"><img src="/theme/new/img/icon_shopping_cart-white.png" /></span></a></li>
			</ul>
		</div>

		<!-- work -->
		<div class="work-wrap">
			<div class="title">WORK ATTITUDE</div>
			<div class="pic"><img src="/theme/new/images/brands/uwell/work_attitude.png" /></div>
			<div class="clearfix two-pic">
				<img src="/theme/new/images/brands/uwell/ad-1.jpg" />
				<img src="/theme/new/images/brands/uwell/ad-2.png" />
			</div>
		</div>
	</div>

</div>

<script>
	var data = '<?=$data?>';
	var dataJson = JSON.parse(data);
	console.log(dataJson);
	var HottestProducts = dataJson.HottestProducts;
	var Tank = dataJson.Tank;
	var ad = dataJson.ad;
	var Accessories = dataJson.Accessories;
	//产品
	function addProducts(arr){
		var str = '';
		arr.forEach(function(val,idx){
			var strlogin = '';
			if(val.login == 1){
				strlogin = '<span class="old-price">$'+val.market_price+'</span>';
			}
			str += '<ul><li class="img"><a href="'+val.url+'" target="_blank"><img src="'+val.image+'" onerror="javascript:this.src=\'/theme/new/images/noimg_quesheng.png\';"/></a></li><li class="title"><a href="'+val.url+'" target="_blank">'+val.name+'</a></li><li class="price"><span class="new-price">$'+val.price+'</span>'+strlogin+'</li><li class="addtocart"><a href="'+val.url+'" target="_blank"><span class="span1">ADD TO CART</span><span class="span2"><img src="/theme/new/img/icon_shopping_cart-white.png" /></span></a></li></ul>';
		});
		$('.products-list').html(str);
	}
	addProducts(HottestProducts);
	$('.products').on('click','li',function(){
		var index = $(this).index();
		$('.products li').removeClass('mark_bg').eq(index).addClass('mark_bg');

		var arr;
		if(index == 0){
			arr = HottestProducts;
		}else if(index == 1){
			arr = Tank;
		}else if(index == 2){
			arr = Accessories;
		}
		addProducts(arr);
	});
	//广告
	var adStr = '';
	ad.forEach(function(val,idx){
		if(idx == 0){
			adStr += '<a href="'+val.url+'" target="_blank"><img src="/theme/new/images/brands/uwell/ad-1.jpg" /></a>';
		}else if(idx == 1){
			adStr += '<a href="'+val.url+'" target="_blank"><img src="/theme/new/images/brands/uwell/ad-2.png" /></a>';
		}
	});
	$('.two-pic').html(adStr);

</script>
