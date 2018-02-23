<?php

use yii\helpers\Html;
use frontend\components\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\models\ProductHtml;
use common\components\Helper;
use common\models\Product;
use common\models\ProductPrice;
/* @var $this \yii\web\View */
/* @var $content string */
$this->registerCssFile('@web/css/user.css', ['depends' => \frontend\assets\AppAsset::className()]);
AppAsset::register($this);

$public = Yii::getAlias('@public');
if(!empty($prelink)){
$this->registerLinkTag([

    'rel'=>'pre',
    'href'=>"$prelink",

]);}
if(!empty($nextlink)){
$this->registerLinkTag([

    'rel'=>'next',
    'href'=>"$nextlink",

]);}
$isGuest = Yii::$app->user->isGuest;
if(!$isGuest){
    $user_group = Yii::$app->user->identity->user_group;
}else{
    $user_group = 0;
}
?>
<!-- Theme CSS
============================================ -->
<div class="breadcrumb-area">
			<div class="container">
				<?=  Yii::$app->params['breadcrumb']['breadcrumb'];?>		
			
		</div>	</div>
<!-- breadcrumb end -->	
<!-- shop-area start -->
<div class="shop-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="column mt-10">
                    <h2 class="title-block">Catalog</h2>
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Availability</h3>
                        <ul class="sidebar-menu">
                            <li data="status-stock" <?php if (isset($_GET['status']) && $_GET['status'] == 'stock') echo "is_check='1'" ?>><a href="javascript:;">In stock <span></span></a></li>
                            <li data="status-pre" <?php if (isset($_GET['status']) && $_GET['status'] == 'pre') echo "is_check='1'" ?>><a href="javascript:;">Pre order <span></span></a></li>
                        </ul>
                    </div>
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Condition</h3>
                        <ul class="sidebar-menu">
                            <li data="type-new" <?php if (isset($_GET['type']) && $_GET['type'] == 'new') echo "is_check='1'" ?>><a href="javascript:;">New Product<span></span></a></li>
                            <li data="type-hot" <?php if (isset($_GET['type']) && $_GET['type'] == 'hot') echo "is_check='1'" ?>><a href="javascript:;">Hot Selling<span></span></a></li>
                        </ul>
                    </div>
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Type</h3>
                        <ul class="sidebar-menu">
                            <li data="cate-4" <?php if (isset($_GET['cate']) && $_GET['cate'] == '4') echo "is_check='1'" ?>><a href="javascript:;"> Starter Kit<span></span></a></li>
                            <li data="cate-5" <?php if (isset($_GET['cate']) && $_GET['cate'] == '5') echo "is_check='1'" ?>><a href="javascript:;"> Atomizers <span></span></a></li>
                            <li data="cate-55" <?php if (isset($_GET['cate']) && $_GET['cate'] == '55') echo "is_check='1'" ?>><a href="javascript:;"> APV/MODS  <span></span></a></li>
                            <li data="cate-56" <?php if (isset($_GET['cate']) && $_GET['cate'] == '56') echo "is_check='1'" ?>><a href="javascript:;"> Batteries   <span></span></a></li>
                            <li data="cate-58" <?php if (isset($_GET['cate']) && $_GET['cate'] == '58') echo "is_check='1'" ?>><a href="javascript:;"> Accessories  <span></span></a></li>
                    </div>
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">TPD Compliance</h3>
                        <ul class="sidebar-menu">
                            <li data="tpd-1" <?php if (isset($_GET['tpd']) && $_GET['tpd'] == '1') echo "is_check='1'" ?>><a href="javascript:;">  Yes<span></span></a></li>
                        </ul>
                    </div>
                   
                </div>
            </div>
            <div class="col-md-9 col-sm-8">
                <div class="shop-page-bar">
                    <div>	
                        <div class="shop-bar">
                            <!-- Nav tabs -->
                            <ul class="shop-tab f-left" role="tablist">
                                 <!-- <li role="presentation" class="active"><a href="#home" data-toggle="tab"><i class="fa fa-th-large" aria-hidden="true"></i></a></li>  
                                 <li role="presentation"><a href="#profile" data-toggle="tab"><i class="fa fa-th-list" aria-hidden="true"></i></a></li> -->
                            </ul>
                            <form id="sort_by" action="<?= Yii::$app->urlManager->createUrl(['/category/view', 'type' => $type]) ?>" method="get">
                                <div class="selector-field f-left ml-20 hidden-xs">
                                    <label>Sort by</label>
                                    <select name="sort">
                                        <option value="">----</option>
                                        <option value="price-asc"<?php if(isset($_GET['sort']) && $_GET['sort'] == 'price-asc') echo "selected" ?>>Price: Lowest first</option>
                                        <option value="price-desc"<?php if(isset($_GET['sort']) && $_GET['sort'] == 'price-desc') echo "selected" ?>>Price: Highest first</option>
                                        <option value="name-asc"<?php if(isset($_GET['sort']) && $_GET['sort'] == 'name-asc') echo "selected" ?>>Product Name: A to Z</option>
                                        <option value="name-desc"<?php if(isset($_GET['sort']) && $_GET['sort'] == 'name-desc') echo "selected" ?>>Product Name: Z to A</option>
                                        <option value="created_at-asc"<?php if(isset($_GET['sort']) && $_GET['sort'] == 'created_at-asc') echo "selected" ?>>Created at: Lowest first</option>
                                        <option value="created_at-desc"<?php if(isset($_GET['sort']) && $_GET['sort'] == 'created_at-desc') echo "selected" ?>>Created at: Highest first</option>
                                    </select>
                                </div>
                                <div class="selector-field f-left ml-30 hidden-xs">
                                    <label>Show</label>
                                    <select name="per-page">
                                        <option value="12" <?php if(isset($_GET['per-page']) && $_GET['per-page'] == 12) echo "selected" ?>>12</option>
                                        <option value="24" <?php if(isset($_GET['per-page']) && $_GET['per-page'] == 24) echo "selected" ?>>24</option>
                                        <option value="36" <?php if(isset($_GET['per-page']) && $_GET['per-page'] == 36) echo "selected" ?>>36</option>
                                    </select>
                                </div>
                            </form>
                        </div>	
                        <!-- 矩形列表 -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="row">
                                    <?php if (count($products)) { foreach ($products as $product) { ?>
                                            <?php  
                                                $OptionSelect = ProductHtml::getProductListOptionSelect($product->id);
                                                $OptionStock = Product::getSubStockById($product->id);
                                                $PreOrderState = Product::getSubProductPreOrderState($product->id);
                                            ?>
                                            <div class="col-lg-4 col-md-4 col-sm-6">
                                                <div class="single-product mb-30  white-bg">
                                                    <div class="product-img pt-20">
                                                        <a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product["seourl"]]) ?>"><img src="<?=Yii::$app->params['imgServerAddress']?><?=$product['image']?>" alt="<?= $product->price ?>" onerror="javascript:this.src='/theme/new/images/noimg_quesheng.png';"/></a>
                                                    </div>
                                                    <div class="product-content product-i">
                                                        <div class="pro-title"><a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product["seourl"]]) ?>">
                                                            <?php if($PreOrderState==0 and $product->pre_order_time>0):?>
                                                                <?php $OptionStock = 1;?>
                                                                <?php $product->stock = 1;?>
                                                                <span class="title_label">Pre-order</span>
                                                            <?php elseif($PreOrderState==1):?>
                                                                <?php $OptionStock = 1;?>
                                                                <?php $product->stock = 1;?>
                                                                <span class="title_label">Partically Pre-order</span>
                                                            <?php elseif($PreOrderState==2):?>
                                                                <?php $OptionStock = 1;?>
                                                                <?php $product->stock = 1;?>
                                                                <span class="title_label">Pre-order</span>
                                                            <?php endif;?>
                                                            <h2 class="view-seo"><?= $product->name ?></h2></a>
                                                        </div>
                                                        <div class="pro-rating ">
                                                            <?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                                                <a href="#" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                                            <?php }else{ ?>
                                                                <a href="#" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                                            <?php }} ?>
                                                        </div>
                                                        <div class="price-box">
                                                            <?php if(!empty($product->subProduct)):?>
                                                                <?php $productPrice = ProductPrice::getFinalPrice($user_group,1,$product->subProduct[0]->product_id)?>
                                                                <?php $product->price = $product->subProduct[0]->product->price;?>
                                                            <?php else:?>
                                                                <?php $productPrice = ProductPrice::getFinalPrice($user_group,1,$product->id)?>
                                                            <?php endif;?>
                                                            <?php $product->market_price = $product->price;?>
                                                            <?php if(!empty($productPrice)):?>
                                                                <?php $product->price =$productPrice['price']; ?>
                                                            <?php endif;?>
                                                            <span class="price product-price">$<?= $product->price ?></span>
                                                            <?php if(!empty($productPrice)):?>
                                                                <span class="price-2"><del>$<?= $product->market_price ?></del></span>
                                                            <?php endif;?>
                                                        </div>
                                                        <div class="product-icon">
                                                            <div class="product-icon-left f-left">
                                                                
                                                                <?php if($OptionSelect):?>
                                                                    <?php if($OptionStock>0):?>
                                                                        <a href="javascript:void(0)" data-id="<?= $product->id ?>"  class="ajaxaddToCartText"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                                                    <?php else:?>
                                                                        <a href="javascript:void(0)" data-id="<?= $product->id ?>"  class="ajaxaddToCartText"><i class="fa fa-shopping-cart"></i>Arrival Notices</a>
                                                                    <?php endif;?>
                                                                <?php else:?>
                                                                    <?php if($product->stock>0):?>
                                                                        <a href="javascript:void(0)" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                                                    <?php else:?>
                                                                        <a href="javascript:void(0)" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i>Arrival Notices</a>
                                                                    <?php endif;?>
                                                                <?php endif;?>
                                                            </div>
                                                            <div class="product-icon-right floatright">
                                                                <?php if($OptionSelect):?>
                                                                    <a href="javascript:void(0)" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart"></i></a>
                                                                <?php else:?>
                                                                    <a href="javascript:void(0)" data-id="<?= $product->id ?>" class="ajaxaddToFavorite" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart"></i></a>
                                                                <?php endif;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if(1):?>
                                                        <?php if((8&$product->type)>0):?>
                                                                <?php if($product->market_price>0 and $product->price>0 and $product->market_price!=$product->price):?>
                                                                    <span class="off"><?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>% OFF</span>
                                                                <?php endif;?>
                                                        <?php elseif((1&$product->type)>0):?>
                                                            <span class="new">new</span>
                                                        <?php else:?>
                                                                <?php if($product->market_price>0 and $product->price>0 and $product->market_price!=$product->price):?>
                                                                    <span class="off"><?= number_format(($product->market_price-$product->price)/$product->market_price, 2)*100;?>% OFF</span>
                                                                <?php endif;?>
                                                        <?php endif;?>
                                                    <?php else:?>
                                                        <?php if((1&$product->type)>0):?>
                                                            <span class="new">new</span>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                    <?php if((32&$product->type)>0):?>
                                                        <span class="TPD" style="display:inline-block;width:114px;height:18px;line-height:18px;color:#ffffff;font-size:12px;padding-left:3px;padding-right:3px;background:#38a6e3 url(/theme/new/images/pic_TPD_Done.png) no-repeat 98px 2px">TPD Compliance</span>
                                                    <?php elseif((128&$product->type)>0):?>
                                                         <span class="TPD" style="display:inline-block;width:94px;height:18px;line-height:18px;color:#ffffff;font-size:12px;padding-left:3px;padding-right:3px;background:#38a6e3 url(/theme/new/images/pic_TPD_Done.png) no-repeat 78px 2px">TPD Package</span>
                                                    <?php elseif((2&$product->type)>0):?>
                                                        <span class="sale">HOT</span>
                                                    <?php endif;?>
                                                    <?php if($OptionSelect):?>
                                                        <div class="other_infor">
                                                            <div class="select_box">
                                                                <?php echo $OptionSelect;?>
                                                            </div>
                                                            <div class="product-icon-left f-left cartOrder01">
                                                                <?php if($OptionStock>0):?>
                                                                    <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                                                    <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i>Arrival Notices</a>
                                                                <?php else:?>
                                                                    <a style="display: none;" href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                                                    <a href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i>Arrival Notices</a>
                                                                <?php endif;?>
                                                            </div>
                                                            <div class="product-icon-right floatright cartOrder02">

                                                                <a href="javascript:void(0)" data-id="-1" class="ajaxaddToFavorite" data-toggle="tooltip" title="" data-original-title="Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                        </div>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                    <?php }} else { ?>
                                      <li>I'm sorry, didn't find related products</li>
                                    <?php } ?>
                                </div>

                                <div class="content-sortpagibar pagination-center pagination-outer" style="float: right;">
                                    <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination, 'nextPageLabel' => '>', 'prevPageLabel' => '<']) ?>
                                    <!--<div class="product-count display-inline">Showing 1 - 12 of 13 items</div>
                                    <ul class="shop-pagi display-inline">
                                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>
                                    <div class="selector-field f-right">
                                        <form action="#">
                                            <button class="compare">Compare (1)</button>
                                        </form>
                                    </div>-->
                                </div>
                            </div>
                            <!-- 树形列表 -->
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="row">
                                    <?php if (count($products)) { foreach ($products as $product) { ?>
                                    <div class="col-lg-12">
                                        <div class="single-product  shop-single-product mb-30 white-bg">
                                            <div class="product-img pt-20">
                                                <a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product["seourl"]]) ?>"><img src="<?=Yii::$app->params['imgServerAddress']?><?=Helper::getproductthumb($product['image'],250,250)?>" alt="" /></a>
                                            </div>
                                            <div class="product-content">
                                                <div class="pro-title">
                                                    <a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$product["seourl"]]) ?>"><h2 class="view-seo"><?= $product->name ?></h2></a>
                                                </div>
                                                <div class="pro-rating mb-20">
                                                    <?php for($i = 1; $i <= 5; $i++) { if ($i <= $product->star) {?>
                                                        <a href="#" title="<?= $product->star ?>"><i class="fa fa-star"></i></a>
                                                    <?php }else{ ?>
                                                        <a href="#" title="<?= $product->star ?>"><i class="fa fa-star-o"></i></a>
                                                    <?php }} ?>
                                                </div>
                                                <p><?= $product->brief ?></p>
                                                <div class="price-box">
                                                    <span class="price product-price">$<?= $product->price ?></span>
                                                </div>
                                                <div class="product-icon">
                                                    <div class="product-icon-left f-left">
                                                     <?php if($product->stock>0):?>
                                                            <a href="javascript:void(0)" data-id="<?= $product->id ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                                        <?php else:?>
                                                            <a href="javascript:void(0)" data-id="<?= $product->id ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i>Arrival Notices</a>
                                                        <?php endif;?>
                                                    </div>
                                                    <div class="product-icon-right floatright">
                                                      <a href="javascript:void(0)" data-id="<?= $product->id ?>" class="ajaxaddToFavorite" data-toggle="tooltip" title="" data-original-title="Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
                                    <?php }} else { ?>
                                        <li>sorry</li>
                                    <?php } ?>
                                </div>
                                <div class="content-sortpagibar">
                                    <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination]) ?>
                                    <!--<div class="product-count display-inline">Showing 1 - 12 of 13 items</div>
                                    <ul class="shop-pagi display-inline">
                                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>
                                    <div class="selector-field f-right">
                                        <form action="#">
                                            <button class="compare">Compare (1)</button>
                                        </form>
                                    </div>	-->
                                </div>	
                            </div>			
                        </div>
                    </div>				
                </div>
            </div>					
        </div>	
    </div>
</div>

<!-- shop-area end -->
<!-- brand-area-start -->

<!-- brand-area-end -->	
   <?= $this->render('../public/categarybrandpublicfunction') ?>