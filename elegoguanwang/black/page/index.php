<?php

use yii\helpers\Html;
use yii\grid\GridView;
use components\LuLu;
use yii\widgets\LinkPager;
use components\helpers\TTimeHelper;
use components\widgets\LoopData;
use common\includes\DataSource;
use common\models\PageCategory;
use common\includes\CommonUtility;
use yii\helpers\Url;
/**
 * @var yii\web\View $this
 * @var common\models\Page $model
 */
$this->registerCssFile(CommonUtility::getThemeUrl('css/aboutus.css'));
$this->registerJsFile(CommonUtility::getThemeUrl('js/aboutus.js'));
?>
<!-- 面包屑导航 -->
<div class="aboutus-nav-wrap">
	<div class="aboutus-nav">
		<span class="position">您的位置：</span><span class="first"><a href="<?php echo Url::to(['/site/index'])?>">首页</a></span><span class="arrow">></span><span class="second"><a href="javascript:;">关于我们</a></span>
	</div>
</div>
<!-- 面包屑导航结束 -->
<!-- 关于我们内容区域 -->
<div class="aboutus-wrap">
	<div class="aboutus">
		<div class="title">
			<h1><img src="<?php echo CommonUtility::getThemeUrl('/img/aboutus/tittle_about_us.png');?>" /><span class="second-title">About us</span></h1>
		</div>
		<div class="pic-list clear">
			<ul>
				<li class="nomargin"><a href="<?= Url::to(['page/detail','id' => 1])?>"><img class="pic" src="<?php echo CommonUtility::getThemeUrl('/img/aboutus/pic_culture.png');?>" /><p class="title-name">公司文化</p><p class="desc">Company Culture</p></a></li>
				<li><a href="<?= Url::to(['page/detail','id' => 2])?>"><img class="pic" src="<?php echo CommonUtility::getThemeUrl('/img/aboutus/pic_salary.png');?>" /><p class="title-name">薪酬福利</p><p class="desc">Company Welfare</p></a></li>
				<li><a href="<?= Url::to(['page/detail','id' => 3])?>"><img class="pic" src="<?php echo CommonUtility::getThemeUrl('/img/aboutus/pic_environment.png');?>" /><p class="title-name">公司环境</p><p class="desc">Company Environment</p></a></li>
				<li><a href="<?= Url::to(['page/detail','id' => 4])?>"><img class="pic" src="<?php echo CommonUtility::getThemeUrl('/img/aboutus/pic_certificate.png');?>" /><p class="title-name">资质证书</p><p class="desc">Company Certificates</p></a></li>
			</ul>
		</div>
		<div class="map clear">
			<div class="left" id="allmap">
				<!-- <?php
				$map = DataSource::getFragmentData(8,['limit'=>1, 'where' => 'id=9']);
				echo $map[0]['content'];
				?> -->
			</div>
			<div class="right">
				<?php
				$about = DataSource::getFragmentData(8,['limit'=>1, 'where' => 'id=10']);
				echo $about[0]['content'];
				?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=LKFh4jYaEjImfGyGkNb2BTWhDuaVtZP7"></script>