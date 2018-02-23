<?php

use yii\helpers\Html;
use frontend\components\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\models\ProductHtml;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

$public=Yii::getAlias('@public')
?>


<?php if (!count($products)) { ?>
<div class="container">
			<div class="row">
<div id="wrapper"  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-150 mt-40">

<div class="main cle">
<div class="search-none">
    <div class="bd">
        <!-- <h4>很抱歉，没有找到与&nbsp;“<i class="red"><?= Yii::$app->request->get('keyword') ?></i>”&nbsp;相关的商品。你可以换一个关键词试试</h4>
        <p>1、看看输入的文字是否有误</p>
        <p>2、去掉可能不必要的字词，如“的”、“什么”等</p>
        <p>3、调整关键字，如“华为荣耀手机”改成“华为”或“荣耀”</p> -->
        <h4>I'm sorry, I didn't find anything related to &nbsp;“<i class="red"><?= Yii::$app->request->get('keyword') ?></i>”&nbsp;. You can try another keyword</h4>
        <p>1、See if the input text is out of order</p>
        <p>2、Remove unnecessary words such as "what" and so on</p>
        <p>3、Adjust key words such as "elego electronic cigarette" to "elego" or "electronic cigarette"</p>
    </div>
    <div id="search-arrow" class="search-arrow"></div>
</div>
</div></div></div></div>
<?php } else { ?>
   <div class="breadcrumb-area">
			<div class="container">
				<ol class="breadcrumb" style="margin-bottom: 0px;margin-left: 0px">
				  <li><a href="/"><i class="fa fa-home" style="color: #ee3e43;"></i> Home</a></li>
				  <b> > </b>
				  <li class="active">Search</li>
				</ol>			
			</div>
		</div>
		<!-- breadcrumb end -->	
		<!-- shop-area start -->
		<div class="shop-area">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4">
						 <div class="category-select">
                    		<div class="word-select">
                            In Stock
                            <img src="/theme/new/images/cha.png" alt="">
                    	</div>
                    	<div class="word-select">
                            In Stock
                            <img src="/theme/new/images/cha.png" alt="">
                    	</div>
                    	<div class="word-select">
                            Clear All
                            <!-- <img src="/theme/new/images/cha.png" alt=""> -->
                    	</div>
                    <!--<div class="word-select"></div> -->
                </div>
						<div class="column mt-10" style="margin-top: 0px;">
							<!-- <h2 class="title-block">Catalog1230</h2> -->
							<div class="sidebar-widget">
		                        <h3 class="sidebar-title">Availability</h3>
		                        <ul class="sidebar-menu">
		                            <li data="status-stock" <?php if (isset($_GET['status']) && $_GET['status'] == 'stock') echo "is_check='1'" ?>><a href="javascript:;">
		                            <img src="/theme/new/img/category/weigouxuan.png" class="unselected" alt="">
		                            In stock 
		                            <span></span>
		                            </a>
		                            </li>
		                            <li data="status-pre" <?php if (isset($_GET['status']) && $_GET['status'] == 'pre') echo "is_check='1'" ?>>
		                            <a href="javascript:;"><img src="/theme/new/img/category/weigouxuan.png" class="unselected" alt="">
		                            Pre order 
		                            <span></span></a>
		                            </li>
		                        </ul>
		                    </div>
		                    <div class="sidebar-widget">
		                        <h3 class="sidebar-title">Condition</h3>
		                        <ul class="sidebar-menu">
		                            <li data="type-new" <?php if (isset($_GET['type']) && $_GET['type'] == 'new') echo "is_check='1'" ?>><a href="javascript:;">
		                            <img src="/theme/new/img/category/weigouxuan.png" class="unselected" alt=""> 
		                            New Product
		                            <span></span>
		                            </a>
		                            </li>
		                            <li data="type-hot" <?php if (isset($_GET['type']) && $_GET['type'] == 'hot') echo "is_check='1'" ?>><a href="javascript:;">
		                            <img src="/theme/new/img/category/weigouxuan.png" class="unselected" alt=""> 
		                            Hot Selling
		                            <span></span>
		                            </a>
		                            </li>
		                        </ul>
		                    </div>
		                    <div class="sidebar-widget">
		                        <h3 class="sidebar-title">Type</h3>
		                        <ul class="sidebar-menu">
		                            <li data="cate-4" <?php if (isset($_GET['cate']) && $_GET['cate'] == '4') echo "is_check='1'" ?>>
		                            <a href="javascript:;">
		                             <img src="/theme/new/img/category/weigouxuan.png" class="unselected" alt=""> 
		                             Starter Kit
		                             <span></span></a></li>
		                            <li data="cate-5" <?php if (isset($_GET['cate']) && $_GET['cate'] == '5') echo "is_check='1'" ?>><a href="javascript:;">
									 <img src="/theme/new/img/category/weigouxuan.png" class="unselected" alt=""> 
		                             Atomizers
		                             <span></span>
		                             </a>
		                             </li>
		                            <li data="cate-55" <?php if (isset($_GET['cate']) && $_GET['cate'] == '55') echo "is_check='1'" ?>><a href="javascript:;"> 
									 <img src="/theme/new/img/category/weigouxuan.png" class="unselected" alt=""> 
		                             APV/MODS 
		                             <span></span>
		                             </a>
		                             </li>
		                            <li data="cate-56" <?php if (isset($_GET['cate']) && $_GET['cate'] == '56') echo "is_check='1'" ?>><a href="javascript:;">
									 <img src="/theme/new/img/category/weigouxuan.png" class="unselected" alt=""> 
		                             Batteries   
		                             <span></span>
		                             </a>
		                             </li>
		                            <li data="cate-58" <?php if (isset($_GET['cate']) && $_GET['cate'] == '58') echo "is_check='1'" ?>><a href="javascript:;">
		                             <img src="/theme/new/img/category/weigouxuan.png" class="unselected" alt=""> 
		                            Accessories  
		                            <span></span>
		                            </a>
		                            </li>
		                    </div>
		                    <div class="sidebar-widget">
		                        <h3 class="sidebar-title">TPD Compliance</h3>
		                        <ul class="sidebar-menu">
		                            <li data="tpd-1" <?php if (isset($_GET['tpd']) && $_GET['tpd'] == '1') echo "is_check='1'" ?>><a href="javascript:;">
		                            <img src="/theme/new/img/category/weigouxuan.png" class="unselected" alt=""> 
		                            Yes
		                            <span></span>
		                            </a>
		                            </li>
		                        </ul>
		                    </div>
		                    <!-- <div class="sidebar-widget">
		                        <h3 class="sidebar-title">BRAND</h3>
		                        <ul class="sidebar-menu">
		                            <li data="brand-4" <?php if (isset($_GET['brand']) && $_GET['brand'] == '1') echo "is_check='1'" ?>><a href="javascript:;">Joyetech <span></span></a></li>
		                            <li data="brand-7" <?php if (isset($_GET['brand']) && $_GET['brand'] == '7') echo "is_check='1'" ?>><a href="javascript:;">Eleaf <span></span></a></li>
		                            <li data="brand-5" <?php if (isset($_GET['brand']) && $_GET['brand'] == '5') echo "is_check='1'" ?>><a href="javascript:;">Aspire <span></span></a></li>
		                            <li data="brand-6" <?php if (isset($_GET['brand']) && $_GET['brand'] == '6') echo "is_check='1'" ?>><a href="javascript:;">Kanger <span></span></a></li>
		                            <li data="brand-8" <?php if (isset($_GET['brand']) && $_GET['brand'] == '8') echo "is_check='1'" ?>><a href="javascript:;">Wismec<span></span></a></li>
		                            <li data="brand-16" <?php if (isset($_GET['brand']) && $_GET['brand'] == '16') echo "is_check='1'" ?>><a href="javascript:;">Geekvape<span></span></a></li>
		                        </ul>
		                    </div> -->
						</div>
					</div>
					<div class="col-md-9 col-sm-8">
						
						<div class="shop-page-bar">
							<div>	
								<div class="shop-bar">
									<!-- Nav tabs -->
									<!-- <ul class="shop-tab f-left" role="tablist">
										<li role="presentation" class="active"><a href="#home" data-toggle="tab"><i class="fa fa-th-large" aria-hidden="true"></i></a></li>
										<li role="presentation"><a href="#profile" data-toggle="tab"><i class="fa fa-th-list" aria-hidden="true"></i></a></li>
									</ul> -->
									<div class="selector-field f-left ml-20 hidden-xs">
										<form action="#">
											<label>Sort by</label>
											<select name="select">
												<option value="">----</option>
												<option value="">Price: Lowest first</option>
												<option value="">Price: Highest first</option>
												<option value="">Product Name: A to Z</option>
												<option value="">Product Name: Z to A</option>
												<option value="">In stock</option>
												<option value="">Reference: Lowest first</option>
												<option value="">Reference: Highest first</option>
											</select>
										</form>
									</div>
									<div class="selector-field f-left ml-30 hidden-xs">
										<form action="#">
											<label>Show</label>
											<select name="select">
												<option value="">12</option>
												<option value="">13</option>
												<option value="">14</option>
											</select>
										</form>
									</div>
									
								</div>	
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="home">
										<div class="row">
										<?php foreach($products as $key=>$val):?>
											<div class="col-lg-4 col-md-4 col-sm-6">
												<div class="single-product mb-30  white-bg">
													<div class="product-img pt-20">
														<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$val["seourl"]]) ?>"><img src="<?=Yii::$app->params['imgServerAddress']?><?=$val['image']?>" alt="" /></a>
													</div>
													<div class="product-content product-i">
														<div class="pro-title">
															<h4><a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$val["seourl"]]) ?>"><?=$val['name']?></a></h4>
														</div>
														<div class="pro-rating ">
															<?php for($i = 1; $i <= 5; $i++) { if ($i <= $val['star']) {?>
		                                                        <a href="#" title="<?= $val['star'] ?>"><i class="fa fa-star"></i></a>
		                                                    <?php }else{ ?>
		                                                        <a href="#" title="<?= $val['star'] ?>"><i class="fa fa-star-o"></i></a>
		                                                    <?php }} ?>
														</div>
														<div class="price-box">
															<span class="price product-price">$<?=$val['price']?></span>
														</div>
														<div class="product-icon">
															<div class="product-icon-left f-left">
																<?php $OptionSelect = ProductHtml::getProductListOptionSelect($val['id']);?>
																<?php if($val['stock']>0):?>
																	<?php if($OptionSelect):?>
				                                                    	<a href="javascript:void(0)" data-id="<?= $val['id'] ?>" class="ajaxaddToCartText"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
				                                                    <?php elseif($OptionSelect ==0):?>
				                                                    	<a href="javascript:void(0)" data-id="<?= $val['id'] ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i>Arrival Notices</a>
					                                                <?php else:?>
					                                                	<a href="javascript:void(0)" data-id="<?= $val['id'] ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
					                                                <?php endif;?>
				                                                <?php else:?>
				                                                    <a href="javascript:void(0)" data-id="<?= $val['id'] ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i>Arrival Notices</a>
				                                                <?php endif;?>
																<!-- <a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a> -->

															</div>
															<div class="product-icon-right floatright">
																<?php if($OptionSelect):?>
																	<a href="javascript:void(0)" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart"></i></a>
																<?php else:?>
																	<a href="javascript:void(0)" data-id="<?= $val['id'] ?>" class="ajaxaddToFavorite" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart"></i></a>
																<?php endif;?>
																
															</div>
														</div>
													</div>
													<?php if(1&$val['type']>0):?>
					                                    <span class="new">new</span>
					                                <?php elseif(2&$val['type']>0):?>
					                                    <span class="sale">HOT</span>
					                                <?php endif;?>
													<!-- <span class="new">new</span> -->
													<?php if($OptionSelect):?>
					                                <div class="other_infor">
					                                	<div class="select_box">
				                                        	<?php echo $OptionSelect;?>
				                                        </div>
				                                        <div class="product-icon-left f-left cartOrder01">
				                                            <a href="javascript:;" class="ajaxaddToCart" data-id="-1"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
				                                            <a style="display: none;" href="javascript:;" class="ajaxarrivenotic" data-id="-1"><i class="fa fa-shopping-cart"></i>Arrival Notices</a>
				                                        </div>
				                                        <div class="product-icon-right floatright cartOrder02">
				                                            <a href="javascript:void(0)" data-id="-1" class="ajaxaddToFavorite" data-toggle="tooltip" title="" data-original-title="Wishlist"><i class="fa fa-heart"></i></a>
				                                        </div>
					                                </div>
					                                <?php endif;?>
<!--                                                     <div class="other_infor">
                                                        <div class="select_box">
                                                            <select name="productId" class="selection" spec-name="Quantity">
                                                                <option value="0" record-id="0">Please select specifications</option>
                                                                <option value="1384" record-id="1384">2PCS</option>
                                                                <option value="1385" record-id="1385">4PCS</option>
                                                            </select>
                                                            <select name="productId" class="selection" spec-name="Type">
                                                                <option value="0" record-id="0">Please select specifications</option>
                                                                <option value="1189" record-id="1189">EU Edition</option><option value="1383" record-id="1383">US Edition</option>
                                                            </select>
                                                        </div>
                                                        <div class="product-icon-left f-left cartOrder01">
                                                            <a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                                        </div>
                                                        <div class="product-icon-right floatright cartOrder02">
                                                            <a href="#" data-toggle="tooltip" title="" data-original-title="Wishlist"><i class="fa fa-heart"></i></a>
                                                        </div>
                                                    </div> -->
												</div>
											</div>
										<?php endforeach;?>
										</div>
										<div class="content-sortpagibar">
											<?= \yii\widgets\LinkPager::widget([
											'pagination' => $pagination,
											'maxButtonCount' => 3,
											// 'nextPageLabel' => '下一页',
    										//'prevPageLabel' => '上一页',
    										// 'firstPageLabel' => '«',
    										// 'lastPageLabel' => '»'
    										]) ?>
											<!-- <div class="product-count display-inline">Showing 1 - 12 of 13 items</div>
											
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
											</div> -->												
										</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="profile">
										<div class="row">
										<?php foreach($products as $key=>$val):?>
											<div class="col-lg-12">
												<div class="single-product  shop-single-product mb-30 white-bg">
													<div class="product-img pt-20">
														<a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$val["seourl"]]) ?>"><img src="<?=Yii::$app->params['imgServerAddress']?><?=$val['image']?>" alt="" /></a>
													</div>
													<div class="product-content">
														<div class="pro-title">
															<h4><a href="<?= Yii::$app->urlManager->createUrl(['/goods/view','seourl'=>$val["seourl"]]) ?>"><?= $val['name'] ?></a></h4>
														</div>
														<div class="pro-rating mb-20">
															<?php for($i = 1; $i <= 5; $i++) { if ($i <= $val['star']) {?>
		                                                        <a href="#" title="<?= $val['star'] ?>"><i class="fa fa-star"></i></a>
		                                                    <?php }else{ ?>
		                                                        <a href="#" title="<?= $val['star'] ?>"><i class="fa fa-star-o"></i></a>
		                                                    <?php }} ?>
														</div>
														<p><?= $val['brief'] ?></p>
														<div class="price-box">
															<span class="price product-price">$<?=$val['price']?></span>
														</div>
														<div class="product-icon">
															<div class="product-icon-left f-left">
																<?php if($val['stock']>0):?>
				                                                    <a href="javascript:void(0)" data-id="<?= $val['id'] ?>" class="ajaxaddToCart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
				                                                <?php else:?>
				                                                    <a href="javascript:void(0)" data-id="<?= $val['id'] ?>" class="ajaxarrivenotic"><i class="fa fa-shopping-cart"></i>Arrival Notices</a>
				                                                <?php endif;?>
																<!-- <a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a> -->

															</div>
															<div class="product-icon-right floatright">
																
																<a href="javascript:void(0)" data-id="<?= $val['id'] ?>" class="ajaxaddToFavorite" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart"></i></a>
															</div>
														</div>
													</div>
												</div>	
											</div>
										<?php endforeach;?>
										</div>
										<div class="content-sortpagibar">
											
											<?= \yii\widgets\LinkPager::widget([
											'pagination' => $pagination,
											'maxButtonCount' => 3,
											// 'nextPageLabel' => '下一页',
    										//'prevPageLabel' => '上一页',
    										// 'firstPageLabel' => '«',
    										// 'lastPageLabel' => '»'
    										]) ?>
    										<!-- <div class="product-count display-inline">Showing 1 - 12 of 13 items</div>
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
											</div>	 -->											
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
		
<?php }?>
<script type="text/javascript">

	 // 点击切换图标

    $(".sidebar-menu .unselected").click(function() {
        event.stopPropagation();
        if($(this).attr("src")=="/theme/new/img/category/weigouxuan.png"){
            $(this).attr("src","/theme/new/img/category/xuanzhong.png");
            // $("#isSelect").val(1);
        }else{
            $(this).attr("src","/theme/new/img/category/weigouxuan.png");
            // $("#isSelect").val(0);
        }
    })


    function changeUrlArg(url, arg, val){
        var pattern = arg+'=([^&]*)';
        var replaceText = arg+'='+val;
        return url.match(pattern) ? url.replace(eval('/('+ arg+'=)([^&]*)/gi'), replaceText) : (url.match('[\?]') ? url+'&'+replaceText : url+'?'+replaceText);
    }

    $(function(){
        $("#sort_by").find("select").change(function(){
            var url = location.search;
            var name = $(this).attr("name");
            var value = $(this).find("option:selected").val();
            var param = name + '=' + value + '&';

            if (url.substr(-1) != '&') {
                url += '&';
            }
            if (url.indexOf(name) > 0) {
                url = changeUrlArg(url, name, value);
            } else {
                url += param;
            }
            location.href = url;
        });

        $(".sidebar-menu>li").click(function(){
            $(this).siblings("li").removeAttr("is_check");

            if ($(this).attr("is_check") == 1) {
                $(this).removeAttr("is_check");
            } else {
                $(this).attr("is_check", "1").find("span");
            }


            var param = '';
            $.each($(".sidebar-menu>li"), function(i, n){

                if ($(n).attr("is_check") == 1) {
                    var data = $(n).attr("data");
                    var parans = data.split("-");
                    param += parans[0] + '=' + parans[1] + '&';
                }
            });

            var oldurl = location.search;
            oldurl = oldurl.substr(1);
            var p = oldurl.split("&");
            var oldparam = '';
            for (var i=0; i < p.length; i++) {
                if (p[i].indexOf("sort") >=0 || p[i].indexOf("page") >=0) {
                    oldparam += p[i] + '&';
                }
            }

            var url = "?" + oldparam + param;
            location.href = url;

        });

    })
</script>
<script>
    $(function(){
    	jQuery(".opt_select").change(function(){
        var option = jQuery(this).find("option:selected");
        jQuery(option).parent().children().css('border-color','#eee');        
        jQuery(option).parent().children().attr('chosed',0);
        //jQuery('#img_'+jQuery(option).attr('attrlable')).mouseover();
        var choise = '-';
        if(jQuery(option).attr('chosed')==1){
            jQuery(option).css('border-color','#eee');
            jQuery(option).attr('chosed',0);
        } else {
            jQuery(option).css('border-color','red');
            jQuery(option).attr('chosed',1);            
        }
        jQuery(this).parent(".select_box").find(".option").each(
            function(){
            	if(jQuery(this).attr("chosed")==1){
                    choise = choise+jQuery(this).attr("attrid")+"-"+jQuery(this).attr("optid")+'-';
                }
            }
        );
        var stock = jQuery(this).parent('.select_box').find(".child_ids"+choise).data('stock');
        var id = '-1';
        var ids = jQuery(this).parent('.select_box').find(".child_ids"+choise).val();
        if(ids>=0){
        	jQuery(this).parent().parent().find('.ajaxaddToCart').data('id',ids);
        	jQuery(this).parent().parent().find('.ajaxaddToFavorite').data('id',ids);
            jQuery(this).parent().parent().find('.ajaxarrivenotic').data('id',ids);
            if(stock>0){
                jQuery(this).parent().parent().parent().find('.ajaxaddToCartText').html('<i class="fa fa-shopping-cart"></i>Add to Cart');
                jQuery(this).parent().parent().find('.ajaxaddToCart').show();
                jQuery(this).parent().parent().find('.ajaxarrivenotic').hide();
            }else{
                jQuery(this).parent().parent().parent().find('.ajaxaddToCartText').html('<i class="fa fa-shopping-cart"></i>Arrival Notices');
                jQuery(this).parent().parent().find('.ajaxaddToCart').hide();
                jQuery(this).parent().parent().find('.ajaxarrivenotic').show();
            }
        }else{
        	jQuery(this).parent().parent().find('.ajaxaddToCart').data('id',id);
        	jQuery(this).parent().parent().find('.ajaxaddToFavorite').data('id',id);
            jQuery(this).parent().parent().find('.ajaxarrivenotic').data('id',id);
        }

    	});
        
    })
</script>
<?php
$urlCartAdd = Yii::$app->urlManager->createUrl(['cart/ajax-add']);
$urlFavoriteAdd = Yii::$app->urlManager->createUrl(['product/favorite']);
$this->registerJs('
var product = {csrf:"' . Yii::$app->request->getCsrfToken() . '"};
');

$js = <<<JS
$(".ajaxaddToFavorite").click(function(){  
    var id = $(this).data('id');
    if(id==-1){
        var num = 0;
        jQuery(this).parent().parent().find("select").each(
            function(){
                if(jQuery(this).val()==0 && num==0){
                    num = 1;
                    jQuery(this).focus();
                }
            }
        );
        if(num==0){
            layer.msg('OUT OF STOCK', {
              icon: 16
              ,shade: 0.01
            });
        }
    }else if(id==0){
    	layer.msg('OUT OF STOCK', {
		  icon: 16
		  ,shade: 0.01
		});
    }else{
	    param = {
	        productId : id,
	        number : 1,
	        _csrf : product.csrf
	    };
	  loading=  layer.msg('Adding', {
	  icon: 16
	  ,shade: 0.01
	});
	    $.post("{$urlFavoriteAdd}?id=" + id, param, function(data) {
        layer.close(loading);
        if (data.status > 0) {
		  success=  layer.msg('SUCCESS', {
		  icon: 16
		  ,shade: 0.01
		});
		    
		   setTimeout(function(){
		  layer.close(success);
		}, 500);
		        }else{
		        	window.location.href="/site/login.html"; 
		        }
		    }, "json");
}
});
$(".ajaxaddToCart").click(function(){  
    var id = $(this).data('id');
    if(id==-1){
		var num = 0;
    	jQuery(this).parent().parent().find("select").each(
            function(){
            	if(jQuery(this).val()==0 && num==0){
            		num = 1;
            		jQuery(this).focus();
            	}
            }
        );
    }else if(id==0){
    	layer.msg('OUT OF STOCK', {
  icon: 16
  ,shade: 0.01
});
    }
    else{


    param = {
        productId : id,
        number : 1,
        _csrf : product.csrf
    };
  loading=  layer.msg('Adding', {
  icon: 16
  ,shade: 0.01
});
    $.post("{$urlCartAdd}?id=" + id, param, function(data) {
        layer.close(loading);
        if (data.status > 0) {
        	$(".addNumber").text(data.userCartSum);
  success=  layer.msg('SUCCESS', {
  icon: 16
  ,shade: 0.01
});
    
   setTimeout(function(){
  layer.close(success);
}, 500);
    $(".addNumber").html(data.totalnumber);
        } else {
                   layer.msg('OUT OF STOCK', {
  icon: 16
  ,shade: 0.01
});
        }
    }, "json");
    }
});
JS;

$this->registerJs($js);


$urlCartAddarr = Yii::$app->urlManager->createUrl(['goods/set-remind']);
$login = Yii::$app->urlManager->createUrl(['site/login']);
$this->registerJs('
var product = {csrf:"' . Yii::$app->request->getCsrfToken() . '"};
');

$js = <<<JS

$(".ajaxarrivenotic").click(function(){  
    var id = $(this).data('id');
    if(id==-1){
        var num = 0;
    	jQuery(this).parent().parent().find("select").each(
            function(){
            	if(jQuery(this).val()==0 && num==0){
            		num = 1;
            		jQuery(this).focus();
            	}
            }
        );
        if(num==0){
            layer.msg('OUT OF STOCK', {
              icon: 16
              ,shade: 0.01
            });
        }
    }else if(id==0){
    	layer.msg('OUT OF STOCK', {
  icon: 16
  ,shade: 0.01
});
    }
    else{
    param = {
        productId : id,
        number : 1,
        _csrf : product.csrf
    };
  loading=  layer.msg('Adding', {
  icon: 16
  ,shade: 0.01
});
    $.post("{$urlCartAddarr}?productId=" + id, param, function(data) {
        layer.close(loading);
        if (data.status ==1) {
  success=  layer.msg('SUCCESS', {
  icon: 16
  ,shade: 0.01
});
    
   setTimeout(function(){
  layer.close(success);
}, 500);
   
        }else if(data.status ==2){
        success=  layer.msg('Already Add', {
  icon: 16
  ,shade: 0.01
});
       setTimeout(function(){
  layer.close(success);
}, 500);
   }else if(data.status ==3){
        success=  layer.msg('Please Login', {
  icon: 16
  ,shade: 0.01
});
       setTimeout(function(){
  layer.close(success);
}, 3000);
    window.location.href="{$login}"
   }else {
             layer.msg('FAIL', {
  icon: 16
  ,shade: 0.01
});
        }
    }, "json");
}
});
JS;

$this->registerJs($js);