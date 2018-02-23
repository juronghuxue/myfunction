<?php

use yii\helpers\Html;
use yii\grid\GridView;
use components\LuLu;
use yii\widgets\LinkPager;
use components\helpers\TTimeHelper;
use components\widgets\LoopData;
use common\includes\DataSource;
use common\includes\CommonUtility;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\CatalogSearch $searchModel
 */

$title = empty($currentChannel['seo_title'])?$currentChannel['name']:$currentChannel['seo_title'];
$this->setTitle($title);

$this->registerMetaTag([
		'name'=>'keywords',
		'content'=>$currentChannel['seo_keywords'],
		]);
$this->registerMetaTag([
		'name'=>'description',
		'content'=>$currentChannel['seo_description'],
		]);

$this->buildBreadcrumbs($currentChannel['id']);
$this->registerJsFile(CommonUtility::getThemeUrl('js/news.js'),['yii\web\JqueryAsset']);
$this->registerCssFile(CommonUtility::getThemeUrl('css/news.css'));

//分页SEO
$page = $pages->getLinks();
if (isset($page['prev'])) {
	$this->registerLinkTag(['rel' => 'prev', 'href' => Yii::$app->request->hostInfo . $page['prev']]);
}
if (isset($page['next'])) {
	$this->registerLinkTag(['rel' => 'next', 'href' => Yii::$app->request->hostInfo . $page['next']]);
}
?>
<!-- banner -->
<div class="news-banner"><img src="<?php echo CommonUtility::getThemeUrl('/img/news/pic_head_bg_news.jpg');?>" /></div>
<!-- 面包屑导航 -->
<div class="brand-nav-wrap">
	<div class="brand-nav">
		<span class="position">您的位置：</span><span class="first"><a href="<?php echo Url::to(['/site/index'])?>">首页</a></span><span class="arrow">></span><span class="second"><a href="<?php echo Url::to(['/content/list', 'chnid' => 104])?>">新闻动态</a></span>
	</div>
</div>
<!-- 面包屑导航结束 -->
<!-- 新闻动态 -->
<div class="news-wrap">
	<div class="news">
		<h1 class="title"><img src="<?php echo CommonUtility::getThemeUrl('/img/news/tittle_news.png');?>" /><span class="small-title">News</span></h1>
		<div class="news-list">
			<?php
			foreach ($rows as $item){?>
			<ul>
				<li class="pic"><a href="<?= Url::to(['/content/detail', 'chnid' => $item['channel_id'], 'id' => $item['id']])?>"><img onerror="this.src='<?php echo CommonUtility::getThemeUrl('/img/news/news_list_pic.jpg');?>'" src="<?=$item['title_pic']?>" /></a></li>
				<li class="date">
					<p class="year-month">
						<span class="year"><?=date("Y", strtotime($item['publish_time']))?></span>
						<span class="month"><?=date("m月d日", strtotime($item['publish_time']))?></span>
					</p>
				</li>
				<li class="abstract">
					<h3 class="title-second"><a href="<?= Url::to(['/content/detail', 'chnid' => $item['channel_id'], 'id' => $item['id']])?>"><?=$item['title']?></a></h3>
					<p class="author-count"><span class="author">发布者：<i><?=$item['author']?></i></span><span class="count">浏览次数：<i><?=$item['views']?></i></span></p>
					<p class="desc"><?=$item['summary']?></p>
				</li>
				<li class="scar"><a href="<?= Url::to(['/content/detail', 'chnid' => $item['channel_id'], 'id' => $item['id']])?>" ><img src="<?php echo CommonUtility::getThemeUrl('/img/news/icon_view.png');?>" data-img="<?php echo CommonUtility::getThemeUrl('/img/news/icon_view.png');?>" data-hover_img="<?php echo CommonUtility::getThemeUrl('/img/news/icon_view_hover.png');?>" /></a></li>
			</ul>
			<?php };?>
		</div>
	</div>
</div>
<!-- 新闻动态结束 -->
<!-- 分页 -->
<div class="pagination-wrap">
	<div class="pagination-1">
		<?php echo LinkPager::widget([
			'pagination' => $pages,
		]);?>
	</div>

</div>
<!-- 分页结束 -->
