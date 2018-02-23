<?php
/**
 * Created by PhpStorm.
 * User: LIU
 * Date: 2018/1/12
 * Time: 17:57
 */
use common\includes\CommonUtility;
use yii\helpers\Url;

$this->registerCssFile(CommonUtility::getThemeUrl('css/recruit.css'));
?>

<div class="recruitBanner-wrap">
    <div class="recruit-banner">
        <img src="<?php echo CommonUtility::getThemeUrl('/img/recruit/pic_banner.png');?>" />
    </div>
</div>
<!-- 面包屑导航 -->
<div class="recruit-nav-wrap">
    <div class="recruit-nav">
        <span class="position">您的位置：</span><span class="first"><a href="<?php echo Url::to(['/site/index'])?>">首页</a></span><span class="arrow">></span><span class="second"><a href="javascript:;">供应商招募</a></span>
    </div>
</div>
<!-- 面包屑导航结束 -->
<!-- 供应商招募益处 -->
<div class="recruit-benefit-wrap">
    <div class="recruit-benefit clear">
        <div class="benefit benefit1">
            <div class="pic"><img src="<?php echo CommonUtility::getThemeUrl('/img/recruit/pic_1_1.png');?>" /></div>
            <div class="desc">
                <h3 class="title">零费用</h3>
                <p class="detail">成为我们合作伙伴无需任何费用，免费为您开拓国外市场，推广营销，全球销售，亿乐谷营销网络覆盖全球100多个国家和地区。</p>
            </div>
        </div>
        <div class="benefit benefit2">
            <div class="pic"><img src="<?php echo CommonUtility::getThemeUrl('/img/recruit/pic_1_2.png');?>" /></div>
            <div class="desc">
                <h3 class="title">强推广</h3>
                <p class="detail">我们有成熟的推广团队，为您专业定制推广方案，精准定位您的产品目标市场，最短时间内得到市场大量关注。</p>
            </div>
        </div>
        <div class="benefit benefit3">
            <div class="pic"><img src="<?php echo CommonUtility::getThemeUrl('/img/recruit/pic_1_3.png');?>" /></div>
            <div class="desc">
                <h3 class="title">占先机</h3>
                <p class="detail">公司有强大的物流系统支撑，能第一时间将您的产品送到消费者手上，获得海外市场先发优势。</p>
            </div>
        </div>
        <div class="benefit benefit4">
            <div class="pic"><img src="<?php echo CommonUtility::getThemeUrl('/img/recruit/pic_1_4.png');?>" /></div>
            <div class="desc">
                <h3 class="title">招商流程</h3>
                <p class="detail">诚邀优质，供应商入驻，我们有专业的对接人员与您共商大事。</p>
            </div>
        </div>
    </div>
</div>
<!-- 供应商招募益处结束 -->
<!-- 招商品类 -->
<div class="category-wrap">
    <div class="big-title">招商品类</div>
    <div class="category clear">
        <div class="item item1">
            <img src="<?php echo CommonUtility::getThemeUrl('/img/recruit/pic_2_1.png');?>" />
            <p class="title">电子烟器具类（Kit / Box MOD/Tank/Vape pen)</p>
        </div>
        <div class="item item2">
            <img src="<?php echo CommonUtility::getThemeUrl('/img/recruit/pic_2_2.png');?>" />
            <p class="title">电子烟周边配件类(吸嘴，电芯等）</p>
        </div>
        <div class="item item3">
            <img src="<?php echo CommonUtility::getThemeUrl('/img/recruit/pic_2_3.png');?>" />
            <p class="title">烟油类</p>
        </div>
        <div class="item item3">
            <img src="<?php echo CommonUtility::getThemeUrl('/img/recruit/pic_2_4.png');?>" />
            <p class="title">消费电子类周边产品</p>
        </div>
    </div>
</div>
<!-- 招商品类结束 -->
<!-- 招商标准 -->
<div class="standard-wrap">
    <div class="standard clear">
        <div class="title">招商标准</div>
        <div class="content">
            <ul>
                <li class="li1">
                    <img src="<?php echo CommonUtility::getThemeUrl('/img/recruit/pic_3_1.png');?>" />
                    <h3>一.供应商类型要求</h3>
                    <p>
                        <span>1.制造、加工型生产商；</span>
                        <span>2.有代理或者授权证明的批发商或者经销商；</span>
                        <span>3.熟悉跨境电商运作的贸易公司；</span>
                        <span>4.稳定的供货能力，严格的品控流程，专业的售后服务；</span>
                    </p>
                </li>
                <li>
                    <img src="<?php echo CommonUtility::getThemeUrl('/img/recruit/pic_3_2.png');?>" />
                    <h3>二.供应商资质要求</h3>
                    <p>
                        <span>1.持有完成最近年度年检的《营业执照》，营业范围在消费品领域，且经营活动不超过其《营业执照》标准的经营范围；符合一般纳税人资格，能够开据17%的增值税发票；</span>
                    </p>
                </li>
                <li>
                    <img src="<?php echo CommonUtility::getThemeUrl('/img/recruit/pic_3_3.png');?>" />
                    <h3>三.供应商资质要求</h3>
                    <p>
                        <span>1、提供相关产品的测试报告，相关认证需符合出口要求，如CE,TPD,RoHS,FCC,MSDS,UN38.3等认证；</span>
                        <span>2、专利产品，需提供相关专利证书；品牌产品需提供“Gtin”（全球贸易项目代码）条型码；</span>
                    </p>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- 招商标准结束 -->
