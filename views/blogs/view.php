<script src="/theme/new/js/layer/layer.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59e5c77778ae1954"></script>
<link rel="stylesheet" href="/theme/new/css/blogs-detail.css">

<div class="clearfix blogs-wrap" itemscope itemtype="http://schema.org/NewsArticle">
    <!-- google 结构化标签  -->
    <link rel='canonical' href='<?= Yii::$app->params['website'] . Yii::$app->urlManager->createUrl(['blogs/view/' . $data->surname]) ?>' />
    <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="https://google.com/article"/>
    <meta itemprop="datePublished" content="2017-02-05T08:00:00+08:00"/>
    <meta itemprop="dateModified" content="2017-02-05T09:20:00+08:00"/>
    <div style="display: none;" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
        <meta itemprop="url" content="<?=Yii::$app->params['website'] . $data->image ?>">
    </div>
    <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
        <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
            <img style="display: none;" src="https://google.com/logo.jpg"/>
            <meta itemprop="url" content="https://www.elegomall.com/theme/new/img/index/new_slogan.png">
            <meta itemprop="width" content="189">
            <meta itemprop="height" content="50">
        </div>
        <meta itemprop="name" content="Google">
    </div>
    <!-- google 结构化标签 -->
	<div class="xie-nav"><img src="/theme/new/images/aount-icon/home.png" /><a href="/">Home</a>><a href="/blogs/">Blog</a>><span class="xiangqing">&nbsp;&nbsp;<?=$data->title ?></span></div>
	<div class="blogs-main">
		<div class="blogs-detail-title">
			<h3 itemprop="headline"><?=$data->title ?></h3>
            <span style="display: none;" itemprop="description"><?= \yii\helpers\Html::encode(Yii::$app->params['meta']["seokeywords"]['value']) ?></span>
			<div class="clearfix  blogs-sm">
				<p class="data" itemprop="author" itemscope itemtype="https://schema.org/Person">Posted by <i class="blogs-author" itemprop="name"><?=$data->author ?></i> on <i class="time"><?= date('F jS, Y', $data->created_at) ?></i></p>
				<p class="scar-comment">
					<span><strong class="scar"><?=$data->click ?></strong> View</span>
					<span><strong class="comment">85</strong> Comment</span>
				</p>
				<div class="share">
					<div class="addthis_inline_share_toolbox"></div>
				</div>
			</div>
		</div>
		<div class="blog-detail-content"><?=$data->content ?></div>
		<div class="blog-detail-content-share">
			<div class="share"><div class="addthis_inline_share_toolbox"></div></div>
		</div>
		<div class="clearfix related">
            <?php if(!empty($also)) {?>
            <?php foreach($also as $item){ ?>
			<ul>
				<li class="img"><a href="<?= Yii::$app->urlManager->createUrl(['blogs/view/' . $item->surname]) ?>" ><img src="<?=$item->image ?>" onerror="this.src='/theme/new/images/noimg_quesheng.png'" /></a></li>
				<li class="title"><a href="<?= Yii::$app->urlManager->createUrl(['blogs/view/' . $item->surname]) ?>" ><?=$item->title ?></a></li>
			</ul>
            <?php } ?>
            <?php }else{ ?>
                <div style="width:100%;height:210px;text-align:center;line-height:210px;font-size:22px;color:#ffffff;">Sorry,no related blogs</div>
            <?php } ?>
		</div>
		<div class="clearfix liuyan">
			<div class="clearfix write-comment">
				<div style="width:100%;height:50px;"><h3>LEAVE YOUR COMMENT</h3><span class="hengxian"></span></div>
				<div class="content">
					<textarea placeholder="Leave your comment here..."></textarea>
					<p class="contentarea"><a href="<?= Yii::$app->urlManager->createUrl(['site/login']) ?>" >Login/Register</a></p>
				</div>
				<p class="blogs-submit"><span>SUBMIT</span></p>
			</div>
			<div class="show-comment">
				<h3 class="recommend">COMMENTS(<span>4</span>)</h3>
				<div class="connent-list-wrap">

				</div>

			</div>

			<!-- more -->
			<div class="more">
				<a href="javascript:;" >

					<p class="view-more">View More</p>
					<p class="loading-More"><img src="/theme/new/images/blogs/icon_jiantou_down_view_more.png" /></p>
				</a>
			</div>
		</div>

	</div>
	<div class="blogs-section">
		<div class="search-wrap">
			<div class="blogs-search">
				<form id="searchForm" action="<?= Yii::$app->urlManager->createUrl(['blogs/index']) ?>" method="get">
					<input class="blogs-input" name="search" type="text" placeholder="Search..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>"/>
					<span class="blogs-button" onclick="$('#searchForm').submit();">Search</span>
				</form>
			</div>
		</div>
		<div class="category-wrap">
			<div class="blogs-category">
				<p class="category-title">Categories</p>
				<ul class="category-ul">
					<?php foreach ($category as $cate) { ?>
						<li><a <?php if($cate->is_rec) {?>class="blogs-mark" <?php } ?> href="<?= Yii::$app->urlManager->createUrl(['blogs/index/' . $cate->surname]) ?>"><?=$cate->title?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<!-- threecategory -->
		<div class="clearfix blogs-threecategory">
			<a href="https://www.elegomall.com/starter-kits.html"><img class="notop" src="/theme/new/images/blogs/pic_top_kits.jpg" /></a>
			<a href="https://www.elegomall.com/apv-mods.html"><img src="/theme/new/images/blogs/pic_top_mods.jpg" /></a>
			<a href="https://www.elegomall.com/atomizers.html"><img src="/theme/new/images/blogs/pic_top_tanks.jpg" /></a>
		</div>
		<!-- ad -->
		<div class="clearfix blogs-ad">
			<?php foreach($ad as $a){ ?>
				<a href="<?= $a['url'] ?>" target="_blank"><img src="<?=$a['pic']?>" onerror="this.src='/theme/new/images/app/icon_elegomall.png'" /></a>
			<?php } ?>
		</div>
	</div>
</div>
<!-- <script src="/theme/new/js/blogs.js"></script> -->
<script>
	// var HOST = 'www.testelegomall.com';//本地域名
	// var HOST =' www.elegomall.com';//线上域名
	// var HOST = 'http://192.168.2.117:8082';
	//分类(排除没有分类和很多分类的情况)
	// var data = '';
	// data = JSON.parse(data);
	// console.log(data);
	//meta标签日期
	// $('meta[itemprop="datePublished"]').attr('content',data.blog.created_at);
	// $('meta[itemprop="dateModified"]').attr('content',data.blog.updated_at);

	// var category = data.category;
	// var listr = '';
	// category.forEach(function(val,idx){
	// 	if(val.is_rec){
	// 		listr += '<li><a class="blogs-mark" href="'+val.url+'">'+val.title+'</a></li>';
	// 	}else{
	// 		listr += '<li><a href="'+val.url+'">'+val.title+'</a></li>';
	// 	}
	// });
	// $('.category-ul').html(listr);
	//搜索博客
	// $('.blogs-button').click(function(){
	// 	if($('.blogs-input').val() == ''){
	// 		layer.msg('Please input your keywords',{icon:0,time:1000});
	// 	}else if($('.blogs-input').val() != ''){
	// 		window.location.href = '/blogs/index.html?search='+$('.blogs-input').val();
	// 	}
	// });
	// ad部分
	// var ad = data.ad;
	// var adstr = '';
	// if(ad.length == 0 || ad == undefined || ad == 'undefined'){

	// }else{
	// 	ad.forEach(function(val,idx){
	// 		adstr += '<img src="/theme/new/images/app/icon_elegomall.png" onerror="javascript:this.src=/theme/new/images/app/icon_elegomall.png"/>';
	// 	});
	// }
	// $('.blogs-ad').html(adstr);
	//blogs详细内容
	// var blog = data.blog;
	// $('.blogs-detail-title h3').html(blog.title);
	// $('.xie-nav .xiangqing').html('&nbsp;&nbsp;'+blog.title);
	// $('.blogs-author').html(blog.author);
	// $('.blogs-sm .time').html(year_month_date(blog.updated_at));
	// $('.scar-comment .scar').html(blog.click);
	// $('.scar-comment .comment').html(blog.click);
	// $('.blog-detail-content').html(blog.content);
	

	//广告位
	// var ad = data.ad;
	// var adStr = '';
	// ad.forEach(function(val,idx){
	// 	adStr += '<a style="display:block" href="'+val.url+'" ><img src="'+val.pic+'" onerror="imgError(this)" /></a>';
	// });
	// $('.blogs-ad').html(adStr);

	// //相关blogs
	// var related = data.also;
	// if(related.length == 0){
	// 	$('.blogs-main .related').css({'padding':0});
	// 	$('.related').html('<div style="width:100%;height:250px;text-align:center;line-height:250px;font-size:22px;background:#ffffff;">Sorry,no related blogs</div>');
	// }else if(related.length > 0){
	// 	var blogListStr = '';
	// 	related.forEach(function(val,idx){
	// 		 blogListStr += '<ul><li class="img"><a href="'+val.url+'" ><img src="'+val.image+'" onerror="javascript:this.src=\'/theme/new/images/noimg_quesheng.png\';"/></a></li><li class="title"><a href="+val.url+" >'+val.title+'</a></li></ul>';//<li class="desc"><a href="" >The FDA Now Changes fkdhk</a></li>
	// 	});
	// 	$('.related').html(blogListStr);
	// }
	//blogs评论列表展示
	var blogId = '<?=$data->id?>';
	var uid = '<?= Yii::$app->user->id ?>';
	//是否登陆
	if(uid == '' || uid == null){
		$('.contentarea').show().css({'height':'100%'});
		$('.liuyan textarea').remove();
	}else if(uid > 0){
		$('.contentarea').remove();
		$('.liuyan textarea').css({'height':'100%'});
	}
	console.info(blogId,uid);
	var count;
	var pageSize;
	var currentPage = 1;
	blogs_list({id:blogId});
	function blogs_list(obj){
		$.ajax({
			url:'/blogs/comment.html',
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
	            count = Number(res.count);
	            pageSize = Number(res.pageSize);
	            $('.show-comment .recommend span').html(count);
	            $('.scar-comment .comment').html(count);
	            if(count/pageSize <= 1){
	            	$('.more').hide();
	            }
	            var list = res.list;
	            var str = '';
	            if(list.length > 0){
	            	list.forEach(function(val,idx){
	            		str += '<div class="clearfix connent-list"><img src="/theme/new/images/pic_user.png" /><div class="right"><h3><span class="author">'+val.author+'</span><span class="date">'+blog_comment_time(val.created_at)+'</span></h3><p class="content">'+val.content+'</p></div></div>';
	            	});

	            }else {
	            	str = '<div class="blogs-no-recomment" style="text-align:center;height:100px;line-height:100px;">no comment</div>';
	            	$('.more').hide();
	            }
	            if(obj.page != '' || obj.page != 'undefined' || obj.page != undefined){
	            	$('.connent-list-wrap').append(str);
	            }else{
	            	$('.connent-list-wrap').html(str);
	            }

	        },
	        error:function(){
	            $('.layui-layer.layui-layer-loading.layer-anim').remove();
	            layer.msg('error',{icon:0,time:1000});
	        }
		});
	}
	//评论
	$('.blogs-submit span').click(function(){
		if(uid == 0){
			layer.msg('Please login',{icon:0,time:1000});
			return;
		}
		if($('.content textarea').val() == ''){
			layer.msg('Please input your comment',{icon:0,time:1000});
			return;
		}
		if($('.content textarea').val() != ''){
			var param = {};
			param.id = blogId;
			param.content = $('.content textarea').val();
			blog_submit_comment(param);
		}
	});
//blog提交评论
function blog_submit_comment(obj){
	$.ajax({
		url:'/blogs/comment-do.html',
        type:'POST',
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
            if(res.status == 1){
            	// var str = '<div class="clearfix connent-list" style="opacity:0;height:0px;"><img src="/theme/new/images/pic_user.png" /><div class="right"><h3><span class="author">'+blog.author+'</span><span class="date">'+blog_comment_time()+'</span></h3><p class="content">'+obj.content+'</p></div></div>';
            	// $('.connent-list-wrap').prepend(str).find('.connent-list:first').animate({'height':'72px','opacity':1},400,function(){
            		$('.blogs-no-recomment').remove();
            		$('.content textarea').val('');
            	// 	layer.msg(res.message,{icon:1,time:1000});
            	// });
            	layer.msg('Thanks for your comment. We will verify it soon.',{icon:1,time:2000});
            }else{
            	layer.msg(res.message,{icon:2,time:1000});
            }

        },
        error:function(){
            $('.layui-layer.layui-layer-loading.layer-anim').remove();
            layer.msg('error',{icon:0,time:1000});
        }
	})
}
function blog_comment_time(str){
	var arr = str.split(' ');
	console.log(arr[0]);
	var arrNew = arr[0].split('-');
	console.log(arrNew);
	return arrNew[2]+'/'+arrNew[1]+'/'+arrNew[0];
}

// blogs列表展示分页
$('.more').click(function(){
	var sumPage = Math.ceil(count/pageSize);
	currentPage ++;
	if(currentPage == sumPage){
		currentPage = sumPage;
		$('.more').hide();
	}
	var param = {};
	param.id = blogId;
	param.page = currentPage;
	blogs_list(param);

});












	function year_month_date(str){
		var arr = str.split(' ');
		console.log(arr);
		var year_month_date = arr[0].split('-');
		var iMonth = '';
		switch(year_month_date[1])
		{
			case '01':
				iMonth = 'Jan';
				break;
			case '02':
				iMonth = 'Feb';
				break;
			case '03':
				iMonth = 'March';
				break;
			case '04':
				iMonth = 'April';
				break;
			case '05':
				iMonth = 'May';
				break;
			case '06':
				iMonth = 'June';
				break;
			case '07':
				iMonth = 'July';
				break;
			case '08':
				iMonth = 'August';
				break;
			case '09':
				iMonth = 'Sept';
				break;
			case '10':
				iMonth = 'Oct';
				break;
			case '11':
				iMonth = 'Nov';
				break;
			case '12':
				iMonth = 'Dec';
				break;
		}

		return iMonth+' '+year_month_date[2]+'th, '+year_month_date[0];
	}
	function imgError(obj){
		$(obj).attr('src','/theme/new/images/app/icon_elegomall.png');
	}
</script>


