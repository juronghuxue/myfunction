<?php
/**
 * Created by PhpStorm.
 * User: LIU
 * Date: 2017/11/30
 * Time: 10:28
 */
?>
<style>
	.banner-wrap{width:1140px;height:auto;margin:10px auto;}
	.banner-wrap>.banner{width:100%;}
	.banner-wrap .banner img{width:100%;height:100%;display:block;}
	.banner-title{width:100%;height:auto;margin-top:20px;background:#ebebeb;padding:12px 10px 10px;}
	.banner-title .banner{width:100%;height:auto;margin:15px auto 0;}
	.banner-title .banner:nth-child(1){margin-top:0;}
	.banner-title .banner .img{width:100%;height:auto;padding:0 2px;border-radius:5px;overflow:hidden;}
	.banner-title .banner .img a{display:block;width:100%;height:100%;}
	.banner-title .banner .img img{width:100%;}
	.banner-title .banner h3{width:100%;height:46px;line-height:46px;color:#404040;font-weight:bold;text-align:center;}
	.banner-title .banner h3 a{display:block;color:#404040;height:46px;line-height:46px;font-size:22px;}
	.banner-wrap .view-more{width:100%;height:102px;background:#ebebeb;padding-top:20px;margin-bottom:80px;}
	.banner-wrap .view-more .load-more{width:180px;height:42px;margin:0 auto;}
	.banner-wrap .view-more .load-more a{display:block;width:100%;height:100%;background:url(/theme/new/images/giveaway/btn_view_more.png);background-size:100% 100%;}
	.banner-wrap .view-more .load-more a:hover{background:url(/theme/new/images/giveaway/btn_view_more_hover.png);}
	/*.banner-wrap .view-more .load-more p{float:left;height:100%;line-height:42px;margin-left:18px;}
	.banner-wrap .view-more .load-more .span{float:left;height:100%;line-height:42px;margin-left:8px;}*/
	@media screen and (max-width: 768px){
		.banner-wrap{width:100%;}
	}
</style>
<div class="banner-wrap">
	<div class="banner"><img src="/theme/new/images/giveaway/pic_banner.jpg" /></div>
	<div class="banner-title">
		<?php foreach ($data as $key => $item) { ?>
			<div class="banner">
				<div class="img"><a href="<?=$item->url ?>" target="_blank"><img src="<?=$item->pic ?>" /></a></div>
				<h3><a target="_blank" href="<?=$item->url ?>"><?= $item->name ?></a></h3>
				<img src="/theme/new/images/giveaway/pic_line.png" />
			</div>
			<!-- <img src="/theme/new/images/giveaway/pic_line.png" /> -->
		<?php } ?>
	</div>
	<div class="view-more">
		<div class="load-more">
			<a class="clickmore" href="javascript:;"></a>
		</div>
	</div>
</div>
<script>
	var count='<?= $count?>';
	var pageTotal = Math.ceil(count/10);
	var click = {
		'pageTotal':pageTotal,
		'currentpage':1,
		'_request':function(n){
			var obj = {};
			obj.page = n;
			if(n<=click.pageTotal){
				$.ajax({
					url:'/html/banner.html',
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
		                click.success(res);
		            },
		            error:function(){
		                $('.layui-layer.layui-layer-loading.layer-anim').remove();
		                layer.msg('error',{icon:0,time:1000});
		            }
				});
			}
		},
		'success':function(res){
			var str = '';
            res.forEach(function(val,idx){
            	str += '<div class="banner"><div class="img"><a target="_blank" href="'+val.url+'"><img src="'+val.pic+'" /></a></div><h3><a target="_blank" href="'+val.url+'">'+val.name+'</a></h3><img src="/theme/new/images/giveaway/pic_line.png" /></div>';
            });
            $('.banner-title').append(str);
		},
		'click':function(){
			click.currentpage++;
			console.log(click.currentpage);
			if(click.currentpage>=click.pageTotal){
				click.currentpage = click.pageTotal;
				$('.view-more').hide();
			}else{
				$('.view-more').show();
			}
			click._request(click.currentpage);
		}
	}
	$('.clickmore').on('click',function(){
		click.click();
	});
</script>