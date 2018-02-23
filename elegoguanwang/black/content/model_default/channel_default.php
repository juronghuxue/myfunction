<?php

use yii\helpers\Html;
use yii\grid\GridView;
use components\widgets\LoopData;
use components\LuLu;
use common\includes\DataSource;
use common\includes\CommonUtility;
use common\includes\UrlUtility;
use components\helpers\TStringHelper;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\CatalogSearch $searchModel
 */

$this->buildBreadcrumbs($chnid);
$this->registerJsFile(CommonUtility::getThemeUrl('js/news.js'),['yii\web\JqueryAsset']);
$this->registerCssFile(CommonUtility::getThemeUrl('css/news.css'));
$rows = DataSource::getContentByChannel($chnid,['order'=>'views desc']);
?>
<!-- 面包屑导航 -->
<div class="brand-nav-wrap">
	<div class="brand-nav">
		<span class="position">您的位置：</span><span class="first"><a href="javascript:;">首页</a></span><span class="arrow">></span><span class="second"><a href="javascript:;">新闻动态</a></span>
	</div>
</div>
<!-- 面包屑导航结束 -->
<!-- 新闻动态 -->
<div class="news-wrap">
	<div class="news">
		<div class="title"><img src="<?php echo CommonUtility::getThemeUrl('/img/news/tittle_news.png');?>" /><span class="small-title">News</span></div>
		<div class="news-list">
			<?php
			foreach ($rows as $item){?>
				<ul>
					<li class="pic"><img width="340" height="190" onerror="this.src='<?php echo CommonUtility::getThemeUrl('/img/news/news_list_pic.jpg');?>'" src="<?=$item['title_pic']?>" /></li>
					<li class="date">
						<p class="year-month">
							<span class="year"><?=date("Y", strtotime($item['publish_time']))?></span>
							<span class="month"><?=date("m月d日", strtotime($item['publish_time']))?></span>
						</p>
					</li>
					<li class="abstract">
						<h3 class="title-second"><?=$item['title']?></h3>
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
		<ul class="pagination">
			<li class="active"><a href="javascript:;" data-index="1">1</a></li>
			<li class=""><a href="javascript:;" data-index="2">2</a></li>
			<li class=""><a href="javascript:;" data-index="3">3</a></li>
			<li class=""><a href="javascript:;" data-index="4">4</a></li>
			<li class="prev disabled"><span><</span></li>
			<li class="next disabled"><span>></span></li>
		</ul>
	</div>
</div>
<!-- 分页结束 -->
