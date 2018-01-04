$(function(){
	//头部悬浮
	$(window).scroll(function(){
		if($(window).scrollTop() >= 100){
			$('.header-wrap').css('background','#211f27');
		}else if($(window).scrollTop() < 100){
			$('.header-wrap').css('background','none');
		}
	});
	//渐现轮播
	$('.banner-list .banner-item').eq(0).css({'z-index':'9'});
	$('.banner-list .banner-item').eq(1).css({'z-index':'8'});
	$('.banner-list .banner-item').eq(2).css({'z-index':'8'});
	//上一张轮播
	var lastNum = 0;
	for(var i = 0;i<$('.pagination li').length;i++){
		if($('.pagination li').hasClass('.mark')){
			lastNum = i;
			break;
		}
	}
	sessionStorage.setItem('index',lastNum);
	$('.pagination').on('mouseover','li',function(){
		lastNum = sessionStorage.getItem('index');
		console.log(lastNum);
		var index = $(this).index();
		sessionStorage.setItem('index',index);
		$('.pagination li').removeClass('mark').eq(index).addClass('mark');
		$('.banner-list .banner-item').eq(lastNum).stop().animate({'opacity':'0','filter':'alpha(opacity=0)'},400,function(){
			$('.banner-list .banner-item').eq(lastNum).css({'z-index':'8'});
		});
		$('.banner-list .banner-item').eq(index).stop().animate({'opacity':'1','filter':'alpha(opacity=1)'},400,function(){
			$('.banner-list .banner-item').eq(index).css({'z-index':'9'});
		});
	});

	//news
	$('.newsul').on('mouseover mouseout','li',function(e){
		// if(e.type == 'mouseover'){
		// 	$(this).css({'background':'url(./img/index/pic_bg_new_list.png) no-repeat'}).find('.title').css({'color':'#ffffff'}).siblings('.desc').css({'color':'#ffffff'});
		// 	$(this).stop().animate({'top':'0'},400,'swing');
		// }else if(e.type == 'mouseout'){
		// 	$(this).css({'background':'#29292f'}).find('.title').css({'color':'#b3b3b3'}).siblings('.desc').css({'color':'#939393'});
		// 	$(this).stop().animate({'top':'15px'},400,'swing');
		// }
		if(e.type == 'mouseover'){
			$(this).find('.a_hover').stop().animate({'top':'0px'},200,'swing');
		}else if(e.type == 'mouseout'){
			$(this).find('.a_hover').stop().animate({'top':'426px'},200,'swing');
		}
	});

	//招聘
	$('.recruit .ul').on('mouseover mouseout','li',function(e){
		if(e.type == 'mouseover'){
			$(this).css({'background':'#1891e5 url(./img/index/pic_bg_join_us.png)','background-size':'100% 100%','border':'none'}).stop().animate({'left':'10px'});
		}else if(e.type == 'mouseout'){
			$(this).css({'background':'none','background-size':'100% 100%','border':'1px solid #b3b3b3'}).stop().animate({'left':'0px'});
		}
	});
});