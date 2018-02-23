<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\includes\CommonUtility;
use common\includes\DataSource;
use yii\helpers\Url;
/**
 * @var yii\web\View $this
 * @var common\models\Page $model
 */
$this->registerCssFile(CommonUtility::getThemeUrl('css/aboutus-sub.css'));
$this->registerJsFile(CommonUtility::getThemeUrl('js/aboutus-sub.js'),['yii\web\JqueryAsset']);
?>
<!-- 面包屑导航 -->
<div class="aboutus-sub-nav-wrap">
	<div class="aboutus-nav">
		<span class="position">您的位置：</span><span class="first"><a href="<?= Url::to(['/page/index'])?>">关于我们</a></span><span class="arrow">></span><span class="second"><a href="javascript:;"><?=$model->title?></a></span>
	</div>
</div>
<!-- 面包屑导航结束 -->
<!-- 公司环境 -->
<div class="aboutus-sub-wrap">
	<div class="aboutus-sub clear">
		<div class="left">
			<h1 class="title"><?=$model->title?></h1>
			<?=$model['body']?>
		</div>
		<div class="right">
			<div class="relative-wrap">
				<h3 class="relative-content">相关内容</h3>
				<ul class="relative-pic">
					<li class="nomargin"><a href="<?php echo Url::to(['/page/detail', 'id' => 1])?>"><img src="<?php echo CommonUtility::getThemeUrl('/img/job-description/pic_culture.png');?>"/></a></li>
					<li><a href="<?php echo Url::to(['/page/detail', 'id' => 2])?>"><img src="<?php echo CommonUtility::getThemeUrl('/img/job-description/pic-compensation.jpg');?>"/></a></li>
					<li><a href="<?php echo Url::to(['/page/detail', 'id' => 3])?>"><img src="<?php echo CommonUtility::getThemeUrl('/img/job-description/pic_environment.png');?>"/></a></li>
					<li><a href="<?php echo Url::to(['/page/detail', 'id' => 4])?>"><img src="<?php echo CommonUtility::getThemeUrl('/img/job-description/pic_certificate.png');?>"/></a></li>
				</ul>
				<?php
				//公司信息
				$about = DataSource::getFragmentData(8,['limit'=>1, 'where' => 'id=10']);
				echo $about[0]['content'];
				?>
			</div>
		</div>
	</div>
</div>
<!-- 公司环境结束 -->