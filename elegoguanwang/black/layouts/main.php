<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use components\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use components\widgets\Alert;
use frontend\assets\ThemeAsset;
use yii\helpers\Url;
use common\includes\CommonUtility;

/**
 * @var \yii\web\View $this
 * @var string $content
 */

ThemeAsset::register($this);

?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="robots" content="NOINDEX,NOFOLLOW"/>
		<link rel="canonical" href="<?=Yii::$app->request->getHostInfo() . '/' .  Yii::$app->request->pathInfo ?>" />
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
		<script src="<?=CommonUtility::getThemeUrl('js/jquery-1.9.1.min.js')?>"></script>
	</head>
	<body>
	<?php $this->beginBody() ?>
	<div class="container">
		<!-- 头部 -->
		<div class="header-wrap">
			<div class="header">
				<div class="logo"><h1><a href="javascript:;"><img src="<?php echo CommonUtility::getThemeUrl('img/index/logo.png');?>" /></a></h1></div>
				<div class="nav">
					<ul class="ul">
						<li class="li">
							<h3 class="wenzi"><a href="<?php echo Url::to(['/site/index'])?>">首页</a></h3>
							<?php if (Yii::$app->controller->id == 'site') echo '<div class="line"></div>'; ?>
							<!-- <span class="pulldown"></span> -->
						</li>
						<li class="li">
							<h3 class="wenzi"><a target="_blank" href="https://www.elegomall.com">官方商城</a></h3>
							<!-- <span class="pulldown"></span> -->
						</li>
						<li class="li">
								<h3 class="wenzi"><a href="<?php echo Url::to(['/content/list', 'chnid' => 104])?>">新闻动态</a></h3>
							<?php if (Yii::$app->controller->id == 'content') echo '<div class="line"></div>'; ?>
								<!-- <span class="pulldown"></span> -->
						</li>
						<li class="li">
								<h3 class="wenzi"><a href="<?= Url::to(['/page/index'])?>">关于我们</a></h3>
							<?php if (Yii::$app->controller->id == 'page' && (!isset($_GET['id']) || $_GET['id'] <> 5)) echo '<div class="line"></div>'; ?>
								<span class="pulldown"><a href="javascript:;"></a></span>
							<ul class="pulldownul">
								<li class="second-li"><a href="<?= Url::to(['/page/detail', 'id' => 1])?>" ><span class="second-wenzi">公司文化</span><span class="pic"></span></a></li>
								<li class="second-li"><a href="<?= Url::to(['/page/detail', 'id' => 2])?>" ><span class="second-wenzi">薪酬福利</span><span class="pic"></span></a></li>
								<li class="second-li"><a href="<?= Url::to(['/page/detail', 'id' => 3])?>" ><span class="second-wenzi">公司环境</span><span class="pic"></span></a></li>
								<li class="second-li"><a href="<?= Url::to(['/page/detail', 'id' => 4])?>" ><span class="second-wenzi">资质证书</span><span class="pic"></span></a></li>
							</ul>
						</li>
						<li class="li">
							<h3 class="wenzi"><a href="<?= Url::to(['/page/detail', 'id' => 5])?>">供应商招募</a></h3>
							<?php if (Yii::$app->controller->id == 'page' && (isset($_GET['id']) && $_GET['id'] == 5)) echo '<div class="line"></div>'; ?>
							<!-- <span class="pulldown"></span> -->
						</li>
						<li class="li">
							<h3 class="wenzi"><a href="<?php echo Url::to(['/site/index'])?>#aaa">合作伙伴</a></h3>
							<!-- <span class="pulldown"></span> -->
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="header-wrap-app">
			<div class="header">
				<div class="logo"><h1><a href="javascript:;"><img src="<?php echo CommonUtility::getThemeUrl('./img/index/logo.png');?>" /></a></h1></div>
				<div class="nav">
					<ul class="ul">
						<li class="li">
							<a href="<?php echo Url::to(['/site/index'])?>">
								<h3 class="wenzi">首页</h3>
								<!-- <span class="pulldown"></span> -->
							</a>
						</li>
						<li class="li">
							<a target="_blank" href="https://www.elegomall.com">
								<h3 class="wenzi">官方商城</h3>
								<!-- <span class="pulldown"></span> -->
							</a>

						</li>
						<li class="li">
							<h3 class="wenzi"><a class="color" href="<?= Url::to(['/page/index'])?>">关于我们</a></h3>
							<span class="pulldown"></span>
							<ul class="pulldownul">
								<li class="second-li"><a href="<?= Url::to(['/page/detail', 'id' => 1])?>" ><span class="second-wenzi">公司文化</span><span class="pic"></span></a></li>
								<li class="second-li"><a href="<?= Url::to(['/page/detail', 'id' => 2])?>" ><span class="second-wenzi">薪酬福利</span><span class="pic"></span></a></li>
								<li class="second-li"><a href="<?= Url::to(['/page/detail', 'id' => 3])?>" ><span class="second-wenzi">公司环境</span><span class="pic"></span></a></li>
								<li class="second-li"><a href="<?= Url::to(['/page/detail', 'id' => 4])?>" ><span class="second-wenzi">资质证书</span><span class="pic"></span></a></li>
							</ul>
						</li>
						<li class="li">
							<a href="javascript:;">
								<h3 class="wenzi">更多</h3>
								<span class="pulldown"></span>
							</a>
							<ul class="pulldownul">
								<li class="second-li"><a href="<?php echo Url::to(['/content/list', 'chnid' => 104])?>" ><span class="second-wenzi">新闻动态</span><span class="pic"></span></a></li>
								<li class="second-li"><a href="<?= Url::to(['/page/detail', 'id' => 5])?>" ><span class="second-wenzi">供应商招募</span><span class="pic"></span></a></li>
								<li class="second-li"><a href="<?php echo Url::to(['/site/index'])?>#aaa"><span class="second-wenzi">合作伙伴</span><span class="pic"></span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- 头部结束 -->
		<?= $content ?>
		<!-- 公共部分footer -->
		<div class="footer-wrap">
			<div class="footer">
				<div class="left">
					<ul>
						<li><a href="<?php echo Url::to(['page/index'])?>">关于我们</a><span>|</span></li>
						<li><a href="<?php echo Url::to(['/content/list', 'chnid' => 104])?>">新闻动态</a><span>|</span></li>
						<li><a target="_blank" href="http://special.zhaopin.com/sz/2013/11208/ylg082871/job.htm">招聘信息</a><span>|</span></li>
						<li><a href="<?php echo Url::to(['/site/index'])?>#aaa">合作伙伴</a><span>|</span></li>
						<li class="nomargin"><a href="<?php echo Url::to(['page/detail','id'=>1])?>">联系我们</a></li>
					</ul>
					<p class="case">
						<span class="span1"><?= CommonUtility::getConfigValue('site_copyright') ?>   <?= CommonUtility::getConfigValue('site_name') ?></span>
						<span class="span2"><?= CommonUtility::getConfigValue('site_icp') ?></span>
					</p>
				</div>
				<div class="right"><img src="<?php echo CommonUtility::getThemeUrl('./img/index/logo_footer.png');?>" /></div>
			</div>
		</div>
		<!-- 公共部分footer结束 -->
	</div>
	<?php echo CommonUtility::getCachedConfigValue('site_stats');?>
	<?php $this->endBody() ?>
	</body>
	</html>
<?php $this->endPage() ?>