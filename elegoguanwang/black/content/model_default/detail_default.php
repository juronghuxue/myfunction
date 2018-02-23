<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\includes\DataSource;
use components\widgets\LoopData;
use components\LuLu;
use common\includes\CommonUtility;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var app\models\Catalog $model
 */


$this->buildBreadcrumbs($chnid);
$this->addBreadcrumb($this->title);
$this->registerCssFile(CommonUtility::getThemeUrl('css/news_detail.css'));
?>
<!-- 面包屑导航 -->
<div class="brand-nav-wrap">
	<div class="brand-nav">
		<span class="position">您的位置：</span><span class="first"><a href="<?php echo Url::to(['/site/index'])?>">首页</a></span><span class="arrow">></span><span class="first"><a href="<?php echo Url::to(['/content/list', 'chnid' => 104])?>">新闻动态</a></span><span class="arrow">></span><span class="second"><?= $model['title'] ?></span>
	</div>
</div>
<!-- 面包屑导航结束 -->
<!-- 新闻详情 -->
<div class="news-detail-wrap">
	<div class="news-detail">
		<div class="title">
			<h3 class="first-title"><?= $model['title'] ?></h3>
			<p class="desc"><span class="author">发布者：<i><?= $model['author'] ?></i></span><span class="time">发布时间：<i><?php echo $model['publish_time']?></i></span><span class="count">&nbsp;&nbsp;<?php echo $model['views']?></span></p>
		</div>
		<div class="news-detail-content"><?php echo $model['content'];?></div>
		<div class="scar">
			<?php
			$dataSource = DataSource::getContentByChannel($chnid, ['where' => 'publish_time > "'.$model['publish_time'].'"','limit'=>1, 'order' => 'publish_time asc']);
			if (!empty($dataSource)) echo '<span class="prev"><a href="'.Url::to(['content/detail','chnid' => $chnid, 'id' => $dataSource[0]['id']]).'">上一篇：<i>'.$dataSource[0]['title'].'</i></a></span>';
			?>

			<?php
			$dataSource = DataSource::getContentByChannel($chnid, ['where' => 'publish_time < "'.$model['publish_time'].'"','limit'=>1, 'order' => 'publish_time desc']);
			if (!empty($dataSource)) echo '<span class="next"><a href="'.Url::to(['content/detail','chnid' => $chnid, 'id' => $dataSource[0]['id']]).'">下一篇：<i>'.$dataSource[0]['title'].'</i></a></span>';
			?>
		</div>
	</div>
</div>
<!-- 新闻详情结束 -->

