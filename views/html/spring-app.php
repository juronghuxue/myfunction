<link rel="stylesheet" href="/theme/new/css/spring-h5.css">
<div class="spring-container">
	<!-- banner -->
	<div class="spring-h5-banner">
		<img src="/theme/new/images/spring_app/banner.png" />
	</div>
	<div class="crazy-sale-wrap">
		<div class="crazy-sale">
			<!-- coupon -->
			<div class="coupon">
				<div class="title"><img src="/theme/new/images/spring_app/tittle_1.png" /></div>
				<div class="clearfix coupon-list">
					<ul class="ul">
						<li class="li1"><a href="javascript:;"><img src="/theme/new/images/spring_app/coupon_1.png" /></a></li>
						<li class="li2" data-id="335"><a href="javascript:;"><img src="/theme/new/images/spring/pic_coupon_haved.png" /></a></li>
					</ul>
					<ul class="ul">
						<li class="li1"><a href="javascript:;"><img src="/theme/new/images/spring_app/coupon_2.png" /></a></li>
						<li class="li2" data-id="336"><a href="javascript:;"><img src="/theme/new/images/spring/pic_coupon_haved.png" /></a></li>
					</ul>
					<ul class="ul">
						<li class="li1"><a href="javascript:;"><img src="/theme/new/images/spring_app/coupon_3.png" /></a></li>
						<li class="li2" data-id="337"><a href="javascript:;"><img src="/theme/new/images/spring/pic_coupon_haved.png" /></a></li>
					</ul>
					<ul class="ul">
						<li class="li1"><a href="javascript:;"><img src="/theme/new/images/spring_app/coupon_4.png" /></a></li>
						<li class="li2" data-id="338"><a href="javascript:;"><img src="/theme/new/images/spring/pic_coupon_haved.png" /></a></li>
					</ul>
					<ul class="ul">
						<li class="li1"><a href="javascript:;"><img src="/theme/new/images/spring_app/coupon_5.png" /></a></li>
						<li class="li2" data-id="339"><a href="javascript:;"><img src="/theme/new/images/spring/pic_coupon_haved.png" /></a></li>
					</ul>
					<ul class="ul">
						<li class="li1"><a href="javascript:;"><img src="/theme/new/images/spring_app/coupon_6.png" /></a></li>
						<li class="li2" data-id="340"><a href="javascript:;"><img src="/theme/new/images/spring/pic_coupon_haved.png" /></a></li>
					</ul>
				</div>
			</div>
			<div class="product-wrap">
				<div class="clearfix product-list">
					
				</div>
			</div>
		</div>

		<!-- coupon-time -->
		<div class="coupon-time-wrap">
			<div class="coupon-time">
				<ul class="time">
					<li class="one">1</li>
					<li class="two">9</li>
					<li class="three">0</li>
					<li class="four">0</li>
				</ul>
				<div class="spring-btn">
					<p class="start"><img src="" /></p>
					<p class="reset"><img src="" /></p>
				</div>
				<div class="rewards-wrap">
					<ul class="rewards">
						
					</ul>
				</div>
			</div>
		</div>

		<!-- top-9 -->
		<div class="top-nine-wrap">
			<div class="big-title"><img src="/theme/new/images/spring_app/tittle_3.png" /></div>
			<div class="clearfix top-nine">
				
			</div>
		</div>

		<!-- free-trial -->
		<div class="free-trial">
			<div class="clearfix jiang-list">
				<ul class="jiang-item" data-id="12514">
					<li class="img"><a href="/product/horizontech-falcon-sub-ohm-tank.html" target="_blank"></a></li>
					<li class="num">Participants Number: <strong>2560</strong></li>
					<li class="join"><a href="javascript:;"><img src="/theme/new/images/spring_app/btn_join_now.png" /></a></li>
				</ul>
				<ul class="jiang-item" data-id="12294">
					<li class="img"><a href="/product/blitz-ghoul-bf-rda-tank.html" target="_blank"></a></li>
					<li class="num">Participants Number: <strong>2560</strong></li>
					<li class="join"><a href="javascript:;"><img src="/theme/new/images/spring_app/btn_join_now.png" /></a></li>
				</ul>
				<ul class="jiang-item" data-id="11210">
					<li class="img"><a href="/product/innokin-bastion-lift-box-mod.html" target="_blank"></a></li>
					<li class="num">Participants Number: <strong>2560</strong></li>
					<li class="join"><a href="javascript:;"><img src="/theme/new/images/spring_app/btn_join_now.png" /></a></li>
				</ul>
				<ul class="jiang-item" data-id="11662">
					<li class="img"><a href="/product/voopoo-uforce-atomizer.html" target="_blank"></a></li>
					<li class="num">Participants Number: <strong>2560</strong></li>
					<li class="join"><a href="javascript:;"><img src="/theme/new/images/spring_app/btn_join_now.png" /></a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- 弹窗 -->
	<div class="popup-wrap">
		<div class="popup">
			<img src="/theme/new/images/spring/pic_coupon_vapeuser_1.png" />
			<span class="close"></span>
			<p class="confirm"></p>
		</div>
	</div>
	<!-- 订阅弹窗 -->
	<div class="subscribe-wrap">
		<div class="subscribe">
			<img src="/theme/new/images/spring/pic_share.png" />
			<span class="close2"></span>
			<span class="yes-btn"></span>
			<span class="no-btn"></span>
		</div>
	</div>
	<!-- 3% -->
	<div class="percent3-wrap">
		<div class="percent3">
			<img src="/theme/new/images/spring/pic_coupon_3.png" />
			<span class="close3"></span>
			<span class="yes-btn3"></span>
			<span class="no-btn3"></span>
		</div>
	</div>
	<!-- joinsuccess -->
	<div class="joinsuccess-wrap">
		<div class="joinsuccess">
			<img src="/theme/new/images/spring/join_success.png" />
			<span class="close4"></span>
			<p class="confirm4"></p>
		</div>
	</div>
</div>
<script>
	//抽奖活动
	var data = '<?= $data ?>';
	var dataJson = JSON.parse(data);
	console.log(dataJson);
	//领取优惠券

	$('.coupon-list .ul').on('click','a',function(){
		var index = $(this).closest('.ul').index();
		console.log(index);
		if(spring.group == 201){
			if(index == 0||index == 1||index == 2){
				return;
			}
		}else{
			if(index == 3||index == 4||index == 5){
				return;
			}
		}
		var id = $(this).closest('.ul').find('.li2').attr('data-id');
		var _this = $(this);
		spring.coupon_click(id,_this);
	});
	var qw = Number($('.one').text());
	var bw = Number($('.two').text());
	var sw = Number($('.three').text());
	var gw = Number($('.four').text());
	var c_n = qw*1000+bw*100+sw*10+gw;
	//crazy
	var spring = {
		"couponB":dataJson.couponB,
		"couponC":dataJson.couponC,
		"group":dataJson.group,
		"couponInit":function(){
			if(spring.group == 201){//c端
				console.log($('.coupon-list').eq(0).find('.crazy-btn').find('a'));
				for(var i = 0;i<$('.coupon-list').length-3;i++){
					$('.coupon-list').eq(i).find('.crazy-btn').find('a').css({'background':'url(/theme/new/images/spring/btn_got_it.png)'});
				}
			}else{
				for(var i = 3;i<$('.coupon-item').length;i++){
					$('.coupon-list').eq(i).find('.crazy-btn').find('a').css({'background':'url(/theme/new/images/spring/btn_got_it.png)'});
				}
			}
			for(var i = 0;i<spring.couponB.length;i++){//b端优惠券 前三张
				for(var j = 0;j<3;j++){
					if(spring.couponB[i].id == $('.coupon-list .ul').eq(j).find('.li2').attr('data-id')){
						if(spring.couponB[i].status == 1){ //0未获取   1已获取
							$('.coupon-list .ul').eq(j).find('.li2').css({'display':'block'});
						}
					}
				}
			}
			for(var i = 0;i<spring.couponC.length;i++){//b端优惠券 前三张
				for(var j = 3;j<6;j++){
					if(spring.couponC[i].id == $('.coupon-list .ul').eq(j).find('.li2').attr('data-id')){
						if(spring.couponC[i].status == 1){ //0未获取   1已获取
							$('.coupon-list .ul').eq(j).find('.li2').css({'display':'block'});
						}
					}
				}
			}
		},
		"coupon_click":function(id,_this){
			var param = {};
			param.cid = id;
			param.a = 'coupon';
			if($(this).closest('.ul').find('.li2').css('display') == 'block'){//已领过
				layer.msg('The coupon has been received!',{icon:0,time:1000});
				return;
			}
			$.ajax({
	            url:'/html/activity/spring.html',
	            type:'GET',
	            dataType:'json',
	            data:param,
	            beforeSend:function(){
	                layer.load(0, {shade: false});
	            },
	            complete:function(){
	                $('.layui-layer.layui-layer-loading.layer-anim').remove();
	            },
	            success:function(res){
	            	console.log(res);
	                $('.ayui-layer-loading.layer-anim').remove();
	                if(res.status == 1){
	                	_this.closest('.ul').find('.li2').css({'display':'block'},200);
	                }else if(res.status == -1){
	                	layer.msg('Please login!',{icon:0,time:1000});
	                	return;
	                }else if(res.status == -2){
	                	layer.msg('The coupon has been received!',{icon:0,time:1000});
	                	return;
	                }else if(res.status == 0){
	                	layer.msg('coupon select error!',{icon:0,time:1000});
	                	return;
	                }
	            },
	            error:function(){
	                $('.layui-layer.layui-layer-loading.layer-anim').remove();
	                layer.msg('error',{icon:0,time:1000});
	            }
	        });
		},
		"crazyList":dataJson.crazy,
		"crazyStr":'',
		"crazy":function(){
			console.log(spring.crazyList);
			spring.crazyList.forEach(function(val,idx){
				spring.crazyStr+= '<ul class="product-item"><li class="img"><a href="'+val.url+'" target="_blank"><img src="'+val.image+'" onerror="javascript:this.src=\'/theme/new/images/noimg_quesheng.png\';"/></a></li><li class="title"><a href="'+val.url+'" target="_blank">'+val.name+'</a></li><li class="price"><span class="new-price">$'+val.price+'</span>&nbsp;<span class="old-price">$'+val.market_price+'</span></li><li class="order"><a href="'+val.url+'" target="_blank"><img src="/theme/new/images/spring_app/btn_order_now.png" /></a></li></ul>';
			});
			$('.product-list').append(spring.crazyStr);
		},
		"topList":dataJson.top,
		"topStr":'',
		"top":function(){
			spring.topList.forEach(function(val,idx){
				if(idx<9){
					spring.topStr+= '<ul class="clearfix top-nine-item"><li class="img"><a href="'+val.url+'" target="_blank"><img src="'+val.image+'" onerror="javascript:this.src=\'/theme/new/images/noimg_quesheng.png\';"/></a></li><li class="title"><a href="'+val.url+'" target="_blank">'+val.name+'</a></li><li class="price"><span class="new-price">$'+val.price+'</span>&nbsp;<span class="old-price">$'+val.market_price+'</span></li><li class="order"><a href="'+val.url+'" target="_blank"><img src="/theme/new/images/spring_app/btn_order_now_2.png" /></a></li></ul>';
				}
			});
			$('.top-nine').append(spring.topStr);
		},
		"windowWidth_change":function(){
			return $(window).width();
		},
		"windowHeight_change":function(){
			return $(window).height();
		},
		"left_right_img":function(){
			var windowWidth = $(window).width();
			var windowHeight = $(window).height();
			$('.popup-wrap .popup').css({'left':'0px','top':'50px'});
		},
		"wei_num":{
			"qianwei":qw,
			"baiwei":bw,
			"shiwei":sw,
			"gewei":gw,
			"count_num":c_n
		},
		"isStop":true,
		"islogin":dataJson.login,
		"start_click":function(){
			if(spring.islogin ==0){
				layer.msg('Please login!',{icon:0,time:1000});
				return;
			}
			if(spring.isStop){
				spring.isStop = !spring.isStop;
				spring.time_change();
			}
		},
		"timer":null,
		"time_change":function(){
			spring.timer = setInterval(function(){
				spring.wei_num.gewei ++;
				if(spring.wei_num.gewei>9){
					spring.wei_num.gewei = 0;
					spring.wei_num.shiwei++;
					if(spring.wei_num.shiwei>9){
						spring.wei_num.shiwei = 0;
						spring.wei_num.baiwei++;
						if(spring.wei_num.baiwei>9){
							spring.wei_num.baiwei = 0;
							spring.wei_num.qianwei++;
							$('.one').empty().text(spring.wei_num.qianwei);
						}
						$('.two').empty().text(spring.wei_num.baiwei);
					}
					$('.three').empty().text(spring.wei_num.shiwei)
				}
				$('.four').empty().text(spring.wei_num.gewei);
				if(spring.wei_num.qianwei*1000+spring.wei_num.baiwei*100+spring.wei_num.shiwei*10+spring.wei_num.gewei>2500){
					spring.wei_num.qianwei = 1;
					spring.wei_num.baiwei = 9;
					spring.wei_num.shiwei = 0;
					spring.wei_num.gewei = 0;
					$('.one').empty().text(spring.wei_num.qianwei);
					$('.two').empty().text(spring.wei_num.baiwei);
					$('.three').empty().text(spring.wei_num.shiwei);
					$('.four').empty().text(spring.wei_num.gewei);
					clearInterval(spring.timer);
					spring.isStop = true;
				}
			},10);
		},
		"popup":function(a,b,c,d){
			var sum = a*1000+b*100+c*10+d;
			console.log(sum);
			var id = 0;
			if(dataJson.group != 201){//B端
				if(sum == 2140){
					id = 316;
				}else if(sum>=2090&&sum<=2190){
					id = 315;
				}else if(sum>=2040&&sum<2090 || sum>2190&&sum<2240){
					id = 314;
				}else if(sum>=1940&&sum<2040 || sum>2240&&sum<=2340){
					id = 313;
				}else if(sum>=1900&&sum<1940 || sum>2340&&sum<=2400){
					$('.popup-wrap img').attr('src','/theme/new/images/spring/pic_coupon_try_again.png').closest('.popup-wrap').fadeIn();
					return;
				}
			}else{//C端
				if(sum == 2140){
					id = 320;
				}else if(sum>=2090&&sum<=2190){
					id = 319;
				}else if(sum>=2040&&sum<2090 || sum>2190&&sum<2240){
					id = 318;
				}else if(sum>=1940&&sum<2040 || sum>2240&&sum<=2340){
					id = 317;
				}else if(sum>=1900&&sum<1940 || sum>2340&&sum<=2400){
					$('.popup-wrap img').attr('src','/theme/new/images/spring/pic_coupon_try_again.png').closest('.popup-wrap').fadeIn();
					return;
				}
			}
			console.log(id);
			var param = {
				a:'coupon',
				cid:id
			};
			$.ajax({
		            url:'/html/activity/spring.html',
		            type:'GET',
		            dataType:'json',
		            data:param,
		            beforeSend:function(){
		                layer.load(0, {shade: false});
		            },
		            complete:function(){
		                $('.layui-layer.layui-layer-loading.layer-anim').remove();
		            },
		            success:function(res){
		                $('.ayui-layer-loading.layer-anim').remove();
		                if(res.status == 1){
		                	if(dataJson.group != 201){//B端
								if(sum == 2140){
									setTimeout(function(){
										$('.popup-wrap img').attr('src','/theme/new/images/spring/pic_coupon_wholesale_4.png').closest('.popup-wrap').fadeIn();
									},1000);
								}else if(sum>=2090&&sum<=2190){
									setTimeout(function(){
										$('.popup-wrap img').attr('src','/theme/new/images/spring/pic_coupon_wholesale_1.png').closest('.popup-wrap').fadeIn();
									},1000);
								}else if(sum>=2040&&sum<2090 || sum>2190&&sum<2240){
									setTimeout(function(){
										$('.popup-wrap img').attr('src','/theme/new/images/spring/pic_coupon_wholesale_2.png').closest('.popup-wrap').fadeIn();
									},1000);
								}else if(sum>=1940&&sum<2040 || sum>2240&&sum<=2340){
									setTimeout(function(){
										$('.popup-wrap img').attr('src','/theme/new/images/spring/pic_coupon_wholesale_3.png').closest('.popup-wrap').fadeIn();
									},1000);
								}else{
									setTimeout(function(){
										$('.popup-wrap img').attr('src','/theme/new/images/spring/pic_coupon_try_again.png').closest('.popup-wrap').fadeIn();
									},1000);
									return;
								}
							}else{
								if(sum == 2140){//B端
									setTimeout(function(){
										$('.popup-wrap img').attr('src','/theme/new/images/spring/pic_coupon_vapeuser_1.png').closest('.popup-wrap').fadeIn();
									},1000);
								}else if(sum>=2090&&sum<=2190){
									setTimeout(function(){
										$('.popup-wrap img').attr('src','/theme/new/images/spring/pic_coupon_vapeuser_2.png').closest('.popup-wrap').fadeIn();
									},1000);
								}else if(sum>=2040&&sum<2090 || sum>2190&&sum<2240){
									setTimeout(function(){
										$('.popup-wrap img').attr('src','/theme/new/images/spring/pic_coupon_vapeuser_3.png').closest('.popup-wrap').fadeIn();
									},1000);
								}else if(sum>=1940&&sum<2040 || sum>2240&&sum<=2340){
									setTimeout(function(){
										$('.popup-wrap img').attr('src','/theme/new/images/spring/pic_coupon_vapeuser_4.png').closest('.popup-wrap').fadeIn();
									},1000);
								}else{
									setTimeout(function(){
										$('.popup-wrap img').attr('src','/theme/new/images/spring/pic_coupon_try_again.png').closest('.popup-wrap').fadeIn();
									},1000);
									return;
								}
							}
		                }else if(res.status == -1){
		                	layer.msg('Please login!',{icon:0,time:1000});
		                	return;
		                }else if(res.status == -2){
		                	layer.msg('The coupon has been received!',{icon:0,time:1000});
		                	return;
		                }else if(res.status == 0){
		                	layer.msg('Coupon select error!',{icon:0,time:1000});
		                	return;
		                }else if(res.status == -3){
		                	if(spring.group == 201){
		                		// spring.change_coupon(1,319);
		                		sessionStorage.setItem({'id':'319','type':'C'});
		                		$('.percent3-wrap').fadeIn();
		                	}else{
		                		// spring.change_coupon(0,315);
		                		sessionStorage.setItem({'id':'315','type':'B'});
		                		$('.percent3-wrap').fadeIn();
		                	}
		                }
		            },
		            error:function(){
		                $('.layui-layer.layui-layer-loading.layer-anim').remove();
		                layer.msg('error',{icon:0,time:1000});
		            }
		        });
			
		},
		"change_coupon":function(){
			$('.subscribe-wrap').css({'opacity':0},400,function(){
				$('.subscribe-wrap').css({'visibility':'hidden'});
				$.ajax({
					url:'/html/activity/spring.html',
		            type:'GET',
		            dataType:'json',
		            data:{
		            	a:'coupon',
						cid:sessionStorage.getItem('id')
		            },
		            beforeSend:function(){
		                layer.load(0, {shade: false});
		            },
		            complete:function(){
		                $('.layui-layer.layui-layer-loading.layer-anim').remove();
		            },
		            success:function(res){
		            	 $('.ayui-layer-loading.layer-anim').remove();
		            	 if(res.status == 1){
		            	 	spring.close_btn3();
		            	 }else{
		            	 	console.log('error');
		            	 }
		            },
		            error:function(){
		            	$('.layui-layer.layui-layer-loading.layer-anim').remove();
		                layer.msg('error',{icon:0,time:1000});
		            }
				});
			});
		},
		"stop":function(){
			spring.wei_num.qianwei = Number($('.one').text());
			spring.wei_num.baiwei = Number($('.two').text());
			spring.wei_num.shiwei = Number($('.three').text());
			spring.wei_num.gewei = Number($('.four').text());
			spring.wei_num.count_num = spring.wei_num.qianwei*1000+spring.wei_num.baiwei*100+spring.wei_num.shiwei*10+spring.wei_num.gewei;
			if(spring.wei_num.qianwei == 1&&spring.wei_num.baiwei == 9&&spring.wei_num.shiwei ==0&&spring.wei_num.gewei == 0){
				return;
			}
			clearInterval(spring.timer);
			console.log(spring.wei_num.qianwei,spring.wei_num.baiwei,spring.wei_num.shiwei,spring.wei_num.gewei);
			spring.popup(spring.wei_num.qianwei,spring.wei_num.baiwei,spring.wei_num.shiwei,spring.wei_num.gewei);//弹窗
			spring.isStop = true;
		},
		"close_btn":function(){
			$('.one').empty().text(1);
			$('.two').empty().text(9);
			$('.three').empty().text(0);
			$('.four').empty().text(0);
			spring.wei_num.qianwei = 1;
			spring.wei_num.baiwei = 9;
			spring.wei_num.shiwei = 0;
			spring.wei_num.gewei = 0;
			$('.popup-wrap').fadeOut();
		},
		"close_btn2":function(){
			$('.one').empty().text(1);
			$('.two').empty().text(9);
			$('.three').empty().text(0);
			$('.four').empty().text(0);
			spring.wei_num.qianwei = 1;
			spring.wei_num.baiwei = 9;
			spring.wei_num.shiwei = 0;
			spring.wei_num.gewei = 0;
			$('.subscribe-wrap').fadeOut();
		},
		"close_btn3":function(){
			$('.one').empty().text(1);
			$('.two').empty().text(9);
			$('.three').empty().text(0);
			$('.four').empty().text(0);
			spring.wei_num.qianwei = 1;
			spring.wei_num.baiwei = 9;
			spring.wei_num.shiwei = 0;
			spring.wei_num.gewei = 0;
			$('.percent3-wrap').fadeOut();
		},
		"subscribe":function(){
			if(spring.islogin==0){
				layer.msg('Please login',{icon:0,time:1000});
				return;
			}
			$.ajax({
	            url:'/html/activity/spring.html',
	            type:'GET',
	            dataType:'json',
	            data:{
	            	'a':'trialSubscription'
	            },
	            beforeSend:function(){
	                layer.load(0, {shade: false});
	            },
	            complete:function(){
	                $('.layui-layer.layui-layer-loading.layer-anim').remove();
	            },
	            success:function(res){
	            	console.log(res);
	                $('.ayui-layer-loading.layer-anim').remove();
	                if(res.status ==1){
	                	layer.msg('success',{icon:1,time:1000});
	                	// $('.joinsuccess-wrap').fadeIn();
	                }else{
	                	layer.msg('error',{icon:0,time:1000});
	                }
	                spring.close_btn2();
	                
	            },
	            error:function(){
	                $('.layui-layer.layui-layer-loading.layer-anim').remove();
	                layer.msg('error',{icon:0,time:1000});
	            }
	        });
		},
		"close_btn4":function(){
			$('.one').empty().text(1);
			$('.two').empty().text(9);
			$('.three').empty().text(0);
			$('.four').empty().text(0);
			spring.wei_num.qianwei = 1;
			spring.wei_num.baiwei = 9;
			spring.wei_num.shiwei = 0;
			spring.wei_num.gewei = 0;
			$('.joinsuccess-wrap').fadeOut();
		}
	}
	spring.couponInit();
	spring.crazy();
	spring.top();
	//弹窗位置
	spring.left_right_img();
	$(window).resize(function(){
		spring.left_right_img();
	});
	//抽奖活动
	$('.start').click(function(){
		spring.start_click();
	});
	
	$('.reset').click(function(){
		spring.stop();
	});
	//抽奖优惠券用完的情况
	$('.yes-btn3').click(function(){
		spring.change_coupon();
	});
	$('.no-btn3').click(function(){
		spring.close_btn3();
	});
	$('.close3').click(function(){
		spring.close_btn3();
	});
	//关闭弹窗按钮
	$('.close').on('click',function(){
		// $('.popup-wrap').fadeOut();
		spring.close_btn();
	});
	$('.confirm').on('click',function(){
		// $('.popup-wrap').fadeOut();
		spring.close_btn();
	});

	//抽奖名单
	var names = $('.rewards');
	var winList = dataJson.winList;
	var winListStr = '';
	winList.forEach(function(val,idx){
		winListStr += '<li class="clearfix"><span class="user">'+val.username+'</span><span class="mail">'+val.email+'</span><span class="rewards-inner">'+val.coupon+'</span></li>';
	});
	names.append(winListStr);
	var rewardsTimer = null;
	var names_height = names.height();
	if(names.find('li').length<3){
		clearInterval(rewardsTimer);
	}else{
		for(var i = 0;i<3;i++){
			names.find('li').eq(i).clone().appendTo(names);
		}
		rewardsTimerf();
	}
	
	function rewardsTimerf(){
		rewardsTimer = setInterval(function(){
			var iTop = parseFloat(names.css('top'));
			if(iTop <= -1*names_height){
				iTop = 0;
				names.css({'top':'0px'});
			}
			names.css({'top':iTop-1+'px'});
		},50);
	}

	

	//奖品
	var free = dataJson.free;
	var freeStr = '';
	console.log(free);
	free.forEach(function(val,idx){
		$('.jiang-list .jiang-item').eq(idx).find('.num strong').html(val.num);
		if(val.join ==1){
			$('.jiang-list .jiang-item').eq(idx).find('.join img').attr('src','/theme/new/images/spring/btn_joined.png');
		}
	});
	$('.jiang-item').on('click','.join',function(){
		var param = {};
		var product_id = $(this).closest('.jiang-item').data('id');
		var _this = $(this);
		param.a = 'trial';
		param.product_id = product_id;
		if(free[0].uid<=0){
			layer.msg('Please login',{icon:0,time:1000});
			return;
		}
		$.ajax({
            url:'/html/activity/spring.html',
            type:'GET',
            dataType:'json',
            data:param,
            beforeSend:function(){
                layer.load(0, {shade: false});
            },
            complete:function(){
                $('.layui-layer.layui-layer-loading.layer-anim').remove();
            },
            success:function(res){
            	console.log(res);
                $('.ayui-layer-loading.layer-anim').remove();
                if(res.status == -1){
                	// layer.msg('Please subscription!',{icon:0,time:1000});
                	$('.subscribe-wrap').fadeIn();
                }else if(res.status == 0){
                	layer.msg('Product select error!',{icon:0,time:1000});
                	return;
                }else if(res.status == 1){
                	_this.find('img').attr({'src':'/theme/new/images/spring/btn_joined.png'});
                	// layer.msg('Success',{icon:1,time:1000});
                	$('.joinsuccess-wrap').fadeIn();
                	return;
                }else if(res.status == 2){
                	layer.msg('The Product has been Try Free!',{icon:0,time:1000});
                	return;
                }
            },
            error:function(){
                $('.layui-layer.layui-layer-loading.layer-anim').remove();
                layer.msg('error',{icon:0,time:1000});
            }
        });
	});
	$('.yes-btn').click(function(){
		spring.subscribe();
	});
	$('.no-btn').click(function(){
		spring.close_btn2();
	});
	$('.close2').click(function(){
		spring.close_btn2();
	});
	$('.close4').click(function(){
		spring.close_btn4();
	});
	$('.confirm4').click(function(){
		spring.close_btn4();
	});
</script>
