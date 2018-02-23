<?php
/* @var $this yii\web\View */

?>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59e5c77778ae1954"></script>
<script src="/theme/new/js/layer/layer.js"></script>
<link rel="stylesheet" href="/theme/new/css/blogs.css">

<div class="clearfix blogs-wrap">
	<div class="xie-nav"><img src="/theme/new/images/aount-icon/home.png" /><a href="/">Home</a>><a href="/blogs/">Blog</a><?= $catalog->id != 1 ? '> ' .Yii::$app->params['meta']["seotitle"]['value'] : ''?></div>
	<div class="blogs-main">
		<div class="blogs-main-content">
            <?php if(!empty($data)) {?>
            <?php foreach($data as $item){ ?>
			 <div class="clearfix blogs-item">
				<a href="<?= Yii::$app->urlManager->createUrl(['blogs/view/' . $item->surname]) ?>"><img class="item-img" src="<?=$item->image?>" onerror="this.src='/theme/new/images/app/icon_elegomall.png';" /></a>
				<div class="item-content">
					<a href="<?= Yii::$app->urlManager->createUrl(['blogs/view/' . $item->surname]) ?>"><h3 class="item-title"><?=$item->title?></h3></a>
					<p class="scarcount">
						<span class="views"><strong><?=$item->click?></strong>Views</span>
						<span class="item-date"><?= date('F jS, Y', $item->created_at) ?></span>
					</p>
					<p class="item-zhaiyao"><?=mb_substr(strip_tags($item->content), 0, 254, "utf-8") ?>......</p>
					<div class="read-share">
						<a href="<?= Yii::$app->urlManager->createUrl(['blogs/view/' . $item->surname]) ?>"><p class="readMore">Read More</p></a>
						<div class="share">
							<ul data-url="www.baidu.com">
								<li onclick="fshare(this)"><img src="/theme/new/images/blogs/icon_fb.png" /></li>
								<li onclick="gshare(this)"><img src="/theme/new/images/blogs/icon_tt.png" /></li>
								<li onclick="pshare(this)"><img src="/theme/new/images/blogs/icon_google.png" /></li>
								<li onclick="kshare(this)"><img src="/theme/new/images/blogs/icon_vk.png" /></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
            <?php }?>
            <?php }else{?>
                <div style="height:300px;text-align:center;line-height:300px;">no information</div>
            <?php } ?>
		</div>
		<div class="item-page-wrap">
			<div class="item-page">
				<!--<div class="page-center">
					<div class="first-prev">
						<span class="first"><img src="/theme/new/images/blogs/icon_jiantou_index.png"/></span>
						<span class="prev"><img src="/theme/new/images/blogs/icon_jiantou_left_bolg.png"/></span>
					</div>
					<ul class="clearfix num">
						<li>1</li>
						<li>2</li>
						<li>3</li>
						<li>...</li>
						<li>5</li>
						<li>6</li>
						<li>7</li>
					</ul>
					<div class="next-last">
						<span class="next"><img src="/theme/new/images/blogs/icon_jiantou_right_blog.png"/></span>
						<span class="last"><img src="/theme/new/images/blogs/icon_jiantou_Last.png"/></span>
					</div>
				</div>-->
                <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination, 'nextPageLabel' => '>', 'prevPageLabel' => '<']) ?>
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

<script>
	//分类(排除没有分类和很多分类的情况)
	// var data = '<?/*=$data*/?>';
	// data = JSON.parse(data);
	// console.log(data);
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
	// // ad部分
	// var ad = data.ad;
	// var adstr = '';
	// if(ad.length == 0 || ad == undefined || ad == 'undefined'){
		
	// }else{
	// 	ad.forEach(function(val,idx){
	// 		adstr += '<a href="'+val.url+'"><img src="'+val.pic+'" onerror="javascript:this.src=\'/theme/new/images/app/icon_elegomall.png\'"/></a>';
	// 	});
	// }
	// console.log(adstr);
	// $('.blogs-ad').html(adstr);
</script>
<script src="/theme/new/js/blogs.js"></script>
<script src="https://apis.google.com/js/client:platform.js" async defer></script>
