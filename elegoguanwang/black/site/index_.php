<?php
use yii\helpers\VarDumper;
use yii\helpers\Html;
use components\LuLu;
use common\includes\DataSource;
use components\helpers\TTimeHelper;
use components\widgets\LoopData;
use data\AttachmentAsset;
use common\includes\UrlUtility;
use common\includes\CommonUtility;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 */


$this->registerJsFile(CommonUtility::getThemeUrl('js/index.js'),['yii\web\JqueryAsset']);
$this->registerCssFile(CommonUtility::getThemeUrl('css/index.css'))
?>

<!-- 首页banner -->
<div class="banner-wrap">
    <ul class="banner-list">
        <?php //banner
        $fragmentData = DataSource::getFragmentData(6, ['limit'=>5]);

        foreach ($fragmentData as $item) { ?>
            <li class="banner-item">
                <a href="<?=$item['url'];?>">
                    <img class="pic" src="<?=$item['title_pic'];?>" alt="<?=$item['title'];?>" />
                    <!--<a class="loadmore"></a>-->
                </a>
            </li>
        <?php } ?>
    </ul>
    <ul class="pagination">
        <?php //banner的点
        $fragmentData = DataSource::getFragmentData(6,['limit'=>5]);
        foreach ($fragmentData as $key => $item) {?>
            <li <?php if ($key == 0) echo 'class="mark nomargin"'; ?>><a href="javascript:;"></a></li>
        <?php } ?>
    </ul>
</div>
<!-- 首页banner 结束-->
<!-- 信息公告 -->
<div class="news-wrap clear">
    <div class="news clear">
        <div class="title"><span class="message"><img src="<?php echo CommonUtility::getThemeUrl('img/index/tittle_news.png');?>" /></span><span class="small-message">News</span></div>
        <ul class="newsul">
            <?php //信息公告
            $dataSource= $fragmentData = DataSource::getFragmentData(4,['limit'=>6]);
            foreach($dataSource as $key => $item){ ?>
                <li class="li<?=$key +1?> nomargin">
                    <a href="<?php echo Url::to(['/content/detail', 'chnid' => $item['channel_id'], 'id' => $item['id']])?>">
                        <p class="pic"><img onerror="this.src='<?php echo CommonUtility::getThemeUrl('./img/index/news_pic.jpg');?>'" src="<?=$item['title_pic']?>" /></p>
                        <h3 class="title"><?=$item['title']?></h3>
                        <p class="desc"><?=$item['summary']?></p>
                    </a>
                    <a class="a_hover" href="<?php echo Url::to(['/content/detail', 'chnid' => $item['channel_id'], 'id' => $item['id']])?>">
                        <img onerror="this.src='<?php echo CommonUtility::getThemeUrl('./img/index/news_pic.jpg');?>'" src="<?=$item['title_pic']?>" />
                        <h3 class="title"><?=$item['title']?></h3>
                        <p class="desc"><?=$item['summary']?></p>
                    </a>
                </li>
            <?php } ?>
        </ul>
        <div class="loadmore"><a href="<?= Url::to(['/content/list', 'chnid' => 104])?>"></a></div>
    </div>
</div>
<!-- 信息公告结束 -->
<!-- 招聘信息 -->
<div class="recruit-wrap">
    <div class="recruit">
        <div class="left">
            <div class="title"><span class="message"><img src="<?php echo CommonUtility::getThemeUrl('./img/index/tittle_join_us.png');?>" /></span><span class="small-message">Join us</span></div>
            <ul class="ul">
                <li class="li1"><span class="job">外贸业务员</span><span class="experience">经验不限/大专</span><a class="detail" target="_blank" href="http://jobs.zhaopin.com/387000324250368.htm"></a></li>
                <li class="li2"><span class="job">海外推广员</span><span class="experience">经验不限/大专</span><a class="detail" target="_blank" href="http://jobs.zhaopin.com/387000324250423.htm"></a></li>
                <li class="li3"><span class="job">平台客服</span><span class="experience">经验不限/大专</span><a class="detail" target="_blank" href="http://jobs.zhaopin.com/387000324250431.htm"></a></li>
                <li class="li4"><span class="job">速卖通运营专员</span><span class="experience">经验1-3年/大专</span><a class="detail" target="_blank" href="http://jobs.zhaopin.com/387000324250372.htm"></a></li>
            </ul>
        </div>
        <div class="more-jobs"><a href="http://special.zhaopin.com/sz/2013/11208/ylg082871/job.htm" target="_blank"></a></div>
    </div>
</div>
<!-- 招聘信息结束 -->
<!-- 关于我们 -->
<div class="aboutus-wrap clear">
    <div class="aboutus clear">
        <div class="left">
            <div class="video">
                <?php
                //视频
                $about = DataSource::getFragmentData(8,['limit'=>1, 'where' => 'id=14']);
                echo $about[0]['content'];
                ?>
            </div>
            <!-- <div class="video-pic"><img src="<?php echo CommonUtility::getThemeUrl('./img/index/btn_play.png');?>" /></div> -->
            <div class="bg"><img src="<?php echo CommonUtility::getThemeUrl('./img/index/pic_bg_about_us.png');?>" /></div>
        </div>
        <div class="right">
            <div class="title"><img src="<?php echo CommonUtility::getThemeUrl('./img/index/tittle_about_us.png');?>" /></div>
            <p class="second-title">About us</p>
            <div class="desc">
                <?php
                //公司简介
                $about = DataSource::getFragmentData(8,['limit'=>1, 'where' => 'id=13']);
                echo $about[0]['content'];
                ?>
            </div>
            <span class="detail"><a href="<?= Url::to(['/page/detail', 'id' => 1])?>"></a></span>
        </div>
    </div>
</div>
<!-- 关于我们结束 -->
<!-- 合作伙伴 -->
<div class="cooperation-wrap">
    <div class="cooperation">
        <div class="title">
            <span class="main-title"><img src="<?php echo CommonUtility::getThemeUrl('./img/index/tittle_cooperation.png');?>" /></span>
            <span class="second-title"><a name="aaa" id="aaa">Cooperation</a></span>
        </div>
        <div class="brand-wrap">
            <ul class="brand">
                <?php //公司环境图片集
                $dataSource= $fragmentData = DataSource::getFragmentData(5);
                $li = '';
                for($i = 0; $i < ceil(count($dataSource) / 6); $i++) {
                    $li .= '<li>';
                    for($j = $i * 6; $j < count($dataSource); $j++){
                        $li .= '<img src="'.$dataSource[$j]['title_pic'].'" alt="'.$dataSource[$j]['title'].'" />';
                    }
                    $li .= '</li>';

                }
                echo $li;
                ?>

                <!--<li><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_1.png');*/?>" /><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_2.png');*/?>" /><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_3.png');*/?>" /><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_4.png');*/?>" /><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_5.png');*/?>" /><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_6.png');*/?>" /></li>
                <li><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_1.png');*/?>" /><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_2.png');*/?>" /><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_3.png');*/?>" /><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_4.png');*/?>" /><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_5.png');*/?>" /><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_6.png');*/?>" /></li>
                <li><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_1.png');*/?>" /><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_2.png');*/?>" /><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_3.png');*/?>" /><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_4.png');*/?>" /><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_5.png');*/?>" /><img src="<?php /*echo CommonUtility::getThemeUrl('./img/index/logo_6.png');*/?>" /></li>
                -->
            </ul>
        </div>
        <div class="pagination-c">
            <ul>
                <?php //公司环境图片集
                $dataSource= $fragmentData = DataSource::getFragmentData(5);
                $li = '';
                for($i = 0; $i < ceil(count($dataSource) / 6); $i++) {
                    $classvalue = '';
                    if ($i == 0) {
                        $classvalue = ' class="mark"';
                    }
                    $li .= '<li '.$classvalue.'><a href="javascript:;"><img src="" /></a></li>';
                }
                echo $li;
                ?>

                <!--<li><a href="javascript:;"><img src="" /></a></li>
                <li><a href="javascript:;"><img src="" /></a></li>-->
            </ul>
        </div>
    </div>
</div>
<!-- 合作伙伴结束 -->