<?php
/**
 * Created by PhpStorm.
 * User: LIU
 * Date: 2017/11/1
 * Time: 15:32
 */
?>
<link rel="stylesheet" href="/theme/new/css/thanksgiving.css">
<div class="thanksgiving-container-wrap" id="thanksgiving">
	<div class="thanksgiving">
		<!-- banner -->
		<div class="banner"><img src="/theme/new/images/thanksgiving/bg_01.jpg" /></div>

		<!-- coupon-01 -->
		<div class="coupon1">
			<div class="clearfix coupon-01-wrap">
				<ul class="coupon-01">
					<li class="img"><a href="javascript:;" target="_blank"><img src="/theme/new/images/thanksgiving/pic_tittle_starter_kits.png" /></a></li>
					<li class="get-coupon" ><a href="javascript:;" v-on:click="getCouponKit"></a></li>
					<li class="check-more"><a href="https://www.elegomall.com/starter-kits.html" target="_blank"></a></li>
				</ul>
				<!-- <ul class="coupon" v-for="item in kits">
					<li class="img"><a :href="item.url" target="_blank"><img :src="item.image"  onerror="javascript:this.src='/theme/new/images/noimg_quesheng.png';"/></a></li>
					<li class="title"><a :href="item.url" target="_blank">{{item.name}}</a></li>
					<li class="price"><span class="new-price">${{item.price}}</span><span v-if="item.login == 1?true:false" class="old-price">${{item.market_price}}</span></li>
					<li class="addtocart"><a class="cart" :href="item.url" target="_blank"></a></li>
				</ul> -->
			</div>
			<div class="coupon1-left"><img src="/theme/new/images/thanksgiving/2_1.png" /></div>
			<div class="coupon1-right"><img src="/theme/new/images/thanksgiving/2_3.png" /></div>
		</div>

		<!-- coupon02 -->
		<div class="coupon2">
			<div class="clearfix coupon-02-wrap">
				<ul class="coupon-02">
					<li class="img"><a  href="javascript:;"><img src="/theme/new/images/thanksgiving/pic_tittle_atomizers.png" /></a></li>
					<li class="get-coupon"><a href="javascript:;" v-on:click="getCouponAno"></a></li>
					<li class="check-more"><a href="https://www.elegomall.com/atomizers.html" target="_blank"></a></li>
				</ul>
				<!-- <ul class="coupon" v-for="item in tanks">
					<li class="img"><a :href="item.url" target="_blank"><img :src="item.image"  onerror="javascript:this.src='/theme/new/images/noimg_quesheng.png';"/></a></li>
					<li class="title"><a :href="item.url" target="_blank">{{item.name}}</a></li>
					<li class="price"><span class="new-price">${{item.price}}</span><span v-if="item.login == 1?true:false" class="old-price">${{item.market_price}}</span></li>
					<li class="addtocart"><a :href="item.url" class="cart" target="_blank"></a></li>
				</ul> -->
			</div>
			<div class="coupon2-left"><img src="/theme/new/images/thanksgiving/3_1.png" /></div>
			<div class="coupon2-right"><img src="/theme/new/images/thanksgiving/3_3.png" /></div>
		</div>

		<!-- coupon03 -->
		<div class="coupon3">
			<div class="clearfix coupon-03-wrap">
				<ul class="coupon-03">
					<li class="img"><a href="javascript:;" ><img src="/theme/new/images/thanksgiving/pic_tittle_mod.png" /></a></li>
					<li class="get-coupon"><a href="javascript:;" v-on:click="getCouponMod"></a></li>
					<li class="check-more"><a href="https://www.elegomall.com/apv-mods.html" target="_blank"></a></li>
				</ul>
				<!-- <ul class="coupon" v-for="item in mods">
					<li class="img"><a :href="item.url" target="_blank"><img :src="item.image" onerror="javascript:this.src='/theme/new/images/noimg_quesheng.png';"/></a></li>
					<li class="title"><a :href="item.url" target="_blank">{{item.name}}</a></li>
					<li class="price"><span class="new-price">${{item.price}}</span><span v-if="item.login == 1?true:false" class="old-price">${{item.market_price}}</span></li>
					<li class="addtocart"><a :href="item.url" class="cart" target="_blank"></a></li>
				</ul> -->
			</div>
			<div class="coupon3-left"><img src="/theme/new/images/thanksgiving/4_1.png" /></div>
			<div class="coupon3-right"><img src="/theme/new/images/thanksgiving/4_3.png" /></div>
		</div>

		<!-- try-free -->
		<div class="try-free-wrap">
			<div class="clearfix try-free">
				<div class="clearfix try-free-content">
					<!-- <ul class="ulpic">
						<li class="img"><a :href="item.url" target="_blank"><img src="/theme/new/images/thanksgiving/product_1.png" onerror="javascript:this.src='/theme/new/images/noimg_quesheng.png';"/></a></li>
						<li class="title"><a :href="item.url" target="_blank">{{item.name}}</a></li>
						<li class="join"><a :href="item.url" target="_blank" class="join-now">JOIN NOW</a><a :href="item.url" class="wished"></a></li>
						<li class="price">${{item.price}}</li>
					</ul>
					<ul class="ulpic">
						<li class="img"><a :href="item.url" target="_blank"><img src="/theme/new/images/thanksgiving/product_2.png" onerror="javascript:this.src='/theme/new/images/noimg_quesheng.png';"/></a></li>
						<li class="title"><a :href="item.url" target="_blank">{{item.name}}</a></li>
						<li class="join"><a :href="item.url" target="_blank" class="join-now">JOIN NOW</a><a :href="item.url" class="wished"></a></li>
						<li class="price">${{item.price}}</li>
					</ul>
					<ul class="ulpic">
						<li class="img"><a :href="item.url" target="_blank"><img src="/theme/new/images/thanksgiving/product_3.png" onerror="javascript:this.src='/theme/new/images/noimg_quesheng.png';"/></a></li>
						<li class="title"><a :href="item.url" target="_blank">{{item.name}}</a></li>
						<li class="join"><a :href="item.url" target="_blank" class="join-now">JOIN NOW</a><a :href="item.url" class="wished"></a></li>
						<li class="price">${{item.price}}</li>
					</ul> -->
				</div>
				<div class="notes">
					<p>NOTES:</p>
					<ul class="clearfix notes-info">
						<li>1. Please login to join this.</li>
						<li>2. Everyone has one chance to win one Single Product.</li>
						<li>3. Six winners will be selected in 11.24 by Random. org. The results will be published in ElegoMall social medias.</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- 获取coupon弹窗 -->
	<!-- <div class="coupon-tanchuang-wrap">	
		<div class="coupon-tanchuang">	
			<img src="/theme/new/images/thanksgiving/pic_get_coupon_success.png" />
			<span v-on:click="closeTanchuang"></span>
		</div>
	</div> -->
	</div>
	
</div>
<!-- 活动结束 -->
<div class="m_activity" style="display:block;z-index: 7777;">

</div>
<div class="l-year-alert-tip-2" style="display:block;height: 200px;z-index: 7778;">
    <div>
        <img src="/theme/new/img/index/tip-header.png" alt="消息头部图片"/>
    </div>
    <div class="l-year-alert-content" style="padding:10px;">
        <h4></h4>
        <p style="text-align: center;">The activity has expired!</p>
    </div>
    
    <div class="l-year-alert-footer" style="background:#fff;">
        <a href="/" style="width: 200px;height: 30px;background:#ee3e43;display: block;color: #fff;line-height: 30px;text-align: center;border-radius: 3px;margin: 0 auto;"> Home Page</a>
    </div>
</div>
<script src="/js/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
	var data = '<?=$data?>';
	var dataJson = JSON.parse(data);
	console.log(dataJson);
	new Vue({
		el:'#thanksgiving',
		data:{
			kits:dataJson.kits.product,
			tanks:dataJson.tanks.product,
			mods:dataJson.mods.product,
			wind:dataJson.wind.product,
			kitcoupon:dataJson.kits.couponId,
			tankscoupon:dataJson.tanks.couponId,
			modscoupon:dataJson.mods.couponId,
			windcoupon:dataJson.wind.couponId,
			tanchuang:false
		},
		methods:{
			getCouponKit:function(){
				var kitcoupon = this.kitcoupon;
				axios.get('/html/activity/thanksgiving.html', {params: {a: 'coupon',cid:kitcoupon}})
					.then(function (response) {
						var data = response.data;
						console.log(data);
						if(data.status == 0){
							layer.msg(data.msg,{icon:0,time:1000});
						}else if(data.status == 1){
							tanchuangfadein('/theme/new/images/thanksgiving/pic_get_coupon_success.png');
							// this.tanchuang = true;
						}else if(data.status == -1){
							layer.msg(data.msg,{icon:0,time:1000});
						}
						
					})
					.catch(function (error){
						console.log(error);
					});
				
			},
			getCouponAno:function(){
				var tankscoupon = this.tankscoupon;
				axios.get('/html/activity/thanksgiving.html', {params: {a: 'coupon',cid:tankscoupon}})
					.then(function (response) {
						var data = response.data;
						console.log(data);
						if(data.status == 0){
							layer.msg(data.msg,{icon:0,time:1000});
						}else if(data.status == 1){
							tanchuangfadein('/theme/new/images/thanksgiving/pic_get_coupon_success.png');
							// this.tanchuang = true;
						}else if(data.status == -1){
							layer.msg(data.msg,{icon:0,time:1000});
						}
						
					})
					.catch(function (error){
						console.log(error);
					});
			},
			getCouponMod:function(){
				var modscoupon = this.modscoupon;
				axios.get('/html/activity/thanksgiving.html', {params: {a: 'coupon',cid:modscoupon}})
					.then(function (response) {
						var data = response.data;
						console.log(data);
						if(data.status == 0){
							layer.msg(data.msg,{icon:0,time:1000});
						}else if(data.status == 1){
							tanchuangfadein('/theme/new/images/thanksgiving/pic_get_coupon_success.png');
							// _this.tanchuang = true;
						}else if(data.status == -1){
							layer.msg(data.msg,{icon:0,time:1000});
						}
						
					})
					.catch(function (error){
						console.log(error);
					});
			}

		}
	});
	var coupon1 = dataJson.kits.product;
	var coupin1Img = ['/theme/new/images/thanksgiving/sale_kit_1.png','/theme/new/images/thanksgiving/sale_kit_2.png','/theme/new/images/thanksgiving/sale_kit_3.png','/theme/new/images/thanksgiving/sale_kit_4.png','/theme/new/images/thanksgiving/sale_kit_5.png','/theme/new/images/thanksgiving/sale_kit_6.png','/theme/new/images/thanksgiving/sale_kit_7.png'];
	var coupon1Str = '';
	coupon1.forEach(function(val,idx){
		if(val.login == 1){
			var islogin = '<span class="old-price">$'+val.market_price+'</span>';
		}else{
			var islogin = '';
		}
		coupon1Str += '<ul class="coupon"><li class="img"><a href="'+val.url+'" target="_blank"><img src="'+coupin1Img[idx]+'"  onerror="javascript:this.src=\'/theme/new/images/noimg_quesheng.png\';"/></a></li><li class="title"><a href="'+val.url+'" target="_blank">'+val.name+'</a></li><li class="price"><span class="new-price">$'+val.price+'</span>'+islogin+'</li><li class="addtocart"><a class="cart" href="'+val.url+'" target="_blank"></a></li></ul>';
	});
	$('.coupon-01-wrap').append(coupon1Str);

	var coupon2 = dataJson.mods.product;
	var coupin2Img = ['/theme/new/images/thanksgiving/sale_tank_1.png','/theme/new/images/thanksgiving/sale_tank_2.png','/theme/new/images/thanksgiving/sale_tank_3.png','/theme/new/images/thanksgiving/sale_tank_4.png','/theme/new/images/thanksgiving/sale_tank_5.png','/theme/new/images/thanksgiving/sale_tank_6.png','/theme/new/images/thanksgiving/sale_tank_7.png'];
	var coupon2Str = '';
	coupon2.forEach(function(val,idx){
		if(val.login == 1){
			var islogin = '<span>$'+val.market_price+'</span>';
		}else{
			var islogin = '';
		}
		coupon2Str += '<ul class="coupon"><li class="img"><a href="'+val.url+'" target="_blank"><img src="'+coupin2Img[idx]+'"  onerror="javascript:this.src=\'/theme/new/images/noimg_quesheng.png\';"/></a></li><li class="title"><a href="'+val.url+'" target="_blank">'+val.name+'</a></li><li class="price"><span class="new-price">$'+val.price+'</span><span class="old-price">$'+val.market_price+'</span></li><li class="addtocart"><a href="'+val.url+'" class="cart" target="_blank"></a></li></ul>';
	});
	$('.coupon-02-wrap').append(coupon2Str);

	var coupon3 = dataJson.tanks.product;
	
	var coupin3Img = ['/theme/new/images/thanksgiving/sale_mod_1.png','/theme/new/images/thanksgiving/sale_mod_2.png','/theme/new/images/thanksgiving/sale_mod_3.png','/theme/new/images/thanksgiving/sale_mod_4.png','/theme/new/images/thanksgiving/sale_mod_5.png','/theme/new/images/thanksgiving/sale_mod_6.png','/theme/new/images/thanksgiving/sale_mod_7.png'];
	var coupon3Str = '';
	coupon3.forEach(function(val,idx){
		if(val.login == 1){
			var islogin = '<span>$'+val.market_price+'</span>';
		}else{
			var islogin = '';
		}
		coupon3Str += '<ul class="coupon"><li class="img"><a href="'+val.url+'" target="_blank"><img src="'+coupin3Img[idx]+'" onerror="javascript:this.src=\'/theme/new/images/noimg_quesheng.png\';"/></a></li><li class="title"><a href="'+val.url+'" target="_blank">'+val.name+'</a></li><li class="price"><span class="new-price">$'+val.price+'</span><span class="old-price">$'+val.market_price+'</span></li><li class="addtocart"><a href="'+val.url+'" class="cart" target="_blank"></a></li></ul>';
	});
	$('.coupon-03-wrap').append(coupon3Str);

	//赠品
	var tryfree = dataJson.wind.product;
	var tryfreeStr = '';
	tryfree.forEach(function(val,idx){
		if(idx == 0){
			var imgpath = '/theme/new/images/thanksgiving/product_1.png';
			var imgName = 'SMOK MAG';
		}else if(idx == 1){
			var imgpath = '/theme/new/images/thanksgiving/product_2.png';
			var imgName = 'Revenger Mini';
		}else if(idx == 2){
			var imgpath = '/theme/new/images/thanksgiving/product_3.png';
			var imgName = 'Squeezer Mod';
		}
		tryfreeStr += '<ul class="ulpic" data-id="'+val.id+'"><li class="img"><a href="'+val.url+'" target="_blank"><img src="'+imgpath+'" onerror="javascript:this.src=\'/theme/new/images/noimg_quesheng.png\';"/></a></li><li class="title"><a href="'+val.url+'" target="_blank">'+imgName+'</a></li><li class="join"><a href="javascript:;" class="join-now">JOIN NOW</a></li><li class="price">$'+val.price+'</li></ul>';
	});
	$('.try-free-content').html(tryfreeStr);

	//统计点击量
	$('.coupon-01-wrap').on('click','.get-coupon',function(){
		coupon_01_count();
	});
	$('.coupon-01-wrap').on('click','.check-more',function(){
		coupon_01_count();
	});
	$('.coupon-01-wrap').on('click','.img',function(){
		coupon_01_count();
	});
	$('.coupon-01-wrap').on('click','.title',function(){
		coupon_01_count();
	});
	$('.coupon-01-wrap').on('click','.cart',function(){
		coupon_01_count();
	});

	$('.coupon-02-wrap').on('click','.get-coupon',function(){
		coupon_02_count();
	});
	$('.coupon-02-wrap').on('click','.check-more',function(){
		coupon_02_count();
	});
	$('.coupon-02-wrap').on('click','.img',function(){
		coupon_02_count();
	});
	$('.coupon-02-wrap').on('click','.title',function(){
		coupon_02_count();
	});
	$('.coupon-02-wrap').on('click','.cart',function(){
		coupon_02_count();
	});

	$('.coupon-03-wrap').on('click','.get-coupon',function(){
		coupon_03_count();
	});
	$('.coupon-03-wrap').on('click','.check-more',function(){
		coupon_03_count();
	});
	$('.coupon-03-wrap').on('click','.img',function(){
		coupon_03_count();
	});
	$('.coupon-03-wrap').on('click','.title',function(){
		coupon_03_count();
	});
	$('.coupon-03-wrap').on('click','.cart',function(){
		coupon_03_count();
	});


	function coupon_01_count(){
		var obj = {};
		obj.cid = dataJson.kits.couponId;
		obj.a = 'count';
		$.ajax({
			url:'/html/activity/thanksgiving.html',
			type:'GET',
	        data:obj,
	        dataType:'json',
	        success:function(res){
	        },
	        error:function(){
	        }
		});
	}
	function coupon_02_count(){
		var obj = {};
		obj.cid = dataJson.mods.couponId;
		obj.a = 'count';
		$.ajax({
			url:'/html/activity/thanksgiving.html',
			type:'GET',
	        data:obj,
	        dataType:'json',
	        success:function(res){
	        },
	        error:function(){
	        }
		});
	}
	function coupon_03_count(){
		var obj = {};
		obj.cid = dataJson.tanks.couponId;
		obj.a = 'count';
		$.ajax({
			url:'/html/activity/thanksgiving.html',
			type:'GET',
	        data:obj,
	        dataType:'json',
	        success:function(res){
	        },
	        error:function(){
	        }
		});
	}
	$('.coupon-02-wrap').on('click','.get-coupon .check-more .img .title .cart',function(){
		var obj = {};
		obj.cid = dataJson.mods.couponId;
		$.ajax({
			url:'/html/activity/thanksgiving.html',
			type:'GET',
	        data:obj,
	        dataType:'json',
	        success:function(res){
	        	alert(1);
	        },
	        error:function(){
	        	alert(2);
	        }
		});
	});
	$('.coupon-03-wrap').on('click','.get-coupon .check-more .img .title .cart',function(){
		var obj = {};
		obj.cid = dataJson.tanks.couponId;
		$.ajax({
			url:'/html/activity/thanksgiving.html',
			type:'GET',
	        data:obj,
	        dataType:'json',
	        success:function(res){
	        	alert(1);
	        },
	        error:function(){
	        	alert(2);
	        }
		});
	});

	//join now
	$('.try-free-content').on('click','.join-now',function(){
		if($(this).hasClass('joined')){
			return;
		}

		var product_id = $(this).closest('.ulpic').attr('data-id');
		var obj = {};
		obj.a = 'tryfree';
		obj.product_id = product_id;
		var _this = $(this);
		$.ajax({
	        url:'/html/activity/thanksgiving.html',
	        type:'GET',
	        data:obj,
	        dataType:'json',
	        beforeSend:function(){
	            layer.load(0, {shade: false});
	        },
	        complete:function(){
	            $('.layui-layer.layui-layer-loading.layer-anim').remove();
	        },
	        success:function(res){
	            $('.ayui-layer-loading.layer-anim').remove();
	            console.log(res);
	            if(res.status == 1){
	            	// _this.addClass('joined');
	            	// _this.css({'background':'#b2b2b2'});
	            	// _this.empty().text('JOINED');
	            	var str = '/theme/new/images/thanksgiving/pic_get_join_success.png';
	            	tanchuangfadein(str);
	            }else if(res.status == -1){
	            	layer.msg(res.msg,{icon:0,time:1000});
	            }else if(res.status == 0){
	            	layer.msg(res.msg,{icon:2,time:1000});
	            }else if(res.status == 2){
	            	// layer.msg(res.msg,{icon:0,time:1000});
	            	var str = '/theme/new/images/thanksgiving/pic_get_joined.png';
	            	tanchuangfadein(str);
	            }
	        },
	        error:function(){
	            $('.layui-layer.layui-layer-loading.layer-anim').remove();
	            layer.msg('error',{icon:0,time:1000});
	        }
	    });
	});
	$('.thanksgiving').on('click','.closeTanchuangImg',function(){
		console.log(11111111);
		$(this).animate({'opacity':0},300,function(){
			$('.coupon-tanchuang-wrap').remove();
		});
	});
	function tanchuangfadein(str){
		console.log(str);
		var left = $(window).width()/2*(-1);
        var top = ($(window).height()-662)/2+662-254;
        console.log($(window).width()/2+652/2-200);
        var tanchuangStr = '<div class="coupon-tanchuang-wrap" class="closeTanchuang"><img class="closeTanchuangImg" src="'+str+'" /><span style="left:'+left+'px;top:'+top+'px;"></span></div>';
		$('.thanksgiving').append(tanchuangStr);
    	$('.coupon-tanchuang-wrap').fadeIn();
	}
	function sidePic(){
		if($(window).width()>1920){
			var dis = ($(window).width()-1920)/2;
			var windowWidth = $(window).width()-1140-dis;
		}else{
			var windowWidth = $(window).width()-1140;
		}
		$('.coupon1-left').width(windowWidth/2);
		$('.coupon1-right').width(windowWidth/2);
		$('.coupon2-left').width(windowWidth/2);
		$('.coupon2-right').width(windowWidth/2);
		$('.coupon3-left').width(windowWidth/2);
		$('.coupon3-right').width(windowWidth/2);
	}
	sidePic();
	$(window).resize(function(){
		sidePic();
		var left = $(window).width()/2+652/2-226;
	    var top = ($(window).height()-662)/2+662-254;
		$('.coupon-tanchuang-wrap span').css({'left':left+'px','top':top+'px'});
	});
</script>

