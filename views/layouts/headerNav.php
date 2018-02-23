<?php

use yii\helpers\Html;
use frontend\components\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\models\Category;

/* @var $this \yii\web\View */
/* @var $content string */
$public=Yii::getAlias('@public')
?>
<div class="mainmenu-area bg-color-2 hidden-xs hidden-sm" style="background: #1c2437;border-top:1px solid #f0f0f2;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3" style="width: 20%;padding-right:15px">
                <div class="mainmenu-left visible-lg  visible-md">
                    <div class="product-menu-title">
                        <P style="margin: 0px;padding: 0px">
                            <img src="<?php echo $public?>/img/icon_catagory.png" alt="" style="margin-top:-3px;">CATEGORY
                            <img src="<?php echo $public?>/img/icon_jiantou_2_down_nav_top.png" alt="" class="category-img">
                        </P>
                    </div>
                    <?php  $categoryData = Category::getNavCategory();?>
                    <?php  $categoryAllData = Category::getNavAllCategory();?>
                    <?php ?>
                    <div class="product_vmegamenu" id="product_vmegamenu">
                        <ul>
                            <?php foreach($categoryData as $key=>$item):?>
                                <?php if($item['id']==3): //品牌?> 
                                    <li class="dif" style="padding-top: 26px;"> 
                                        <a href="<?php echo  $nav=Yii::$app->urlManager->createUrl(['/'.$item['seourl']]);// file_put_contents("url.txt", $nav."\r\n", FILE_APPEND);  ?>" class="hover-icon menu-change-color"><img src="<?php echo $public?>/img/icon_brands.png" alt=""><?=$item['name']?></a>
                                        <div class="menuProduct">
                                            <?php  foreach($item['subcategory'] as $item1): ?>
                                                <span>
                                                    <!-- <div></div> -->
                                                    <a class="hm-brand-class" href="javascript:;" class="menuProduct-title"><i style="background:#ff7043;margin-right:5px;display: inline-block;height:10px;width: 2px;"></i><?=$item1['name']?></a>
                                                    <?php foreach($item1['subcategory'] as $item2):?>
                                                        <a class="menu-a"  href="<?php echo $nav= Yii::$app->urlManager->createUrl(['/brands/'.$item2['seourl']]);//file_put_contents("url.txt", $nav."\r\n", FILE_APPEND); ?>"><?=$item2['name']?>
                                                            <?php if($item2['label']==1):?>
                                                                <img src="<?php echo $public?>/img/index_two/pic_new_two.png" alt="" style="position: absolute;top: 12px;">
                                                            <?php elseif($item2['label']==2):?>
                                                                <img src="<?php echo $public?>/img/index_two/pic_hot_two.png" alt="" style="position: absolute;top: 12px;">
                                                            <?php else:?>
                                                                <img id="nav-show-icon"  src="<?php echo $public?>/img/iconall/nav-show-icon.png" alt="" style="display: none;">
                                                            <?php endif;?>
                                                        </a>
                                                    <?php endforeach;?>
                                                </span>
                                            <?php endforeach;?>
                                        </div>
                                    </li>
                                <?php else: //category?>
                                    
                                        <?php if($item['id']==4):?>
                                            <li class="dif">
                                            <a href="<?php echo  $nav= Yii::$app->urlManager->createUrl(['/'.$item['seourl']]);//file_put_contents("url.txt", $nav."\r\n", FILE_APPEND); ?>" class="hover-icon">
                                            <img src="<?php echo $public?>/img/icon_start_kits.png" alt="">
                                        <?php elseif($item['id']==5):?>
                                            <li class="dif">
                                            <a href="<?php echo  $nav= Yii::$app->urlManager->createUrl(['/'.$item['seourl']]);//file_put_contents("url.txt", $nav."\r\n", FILE_APPEND); ?>" class="hover-icon">
                                            <img src="<?php echo $public?>/img/icon_atomizers.png" alt="">
                                        <?php elseif($item['id']==55):?>
                                            <li class="dif">
                                            <a href="<?php echo  $nav= Yii::$app->urlManager->createUrl(['/'.$item['seourl']]);//file_put_contents("url.txt", $nav."\r\n", FILE_APPEND); ?>" class="hover-icon">
                                            <img src="<?php echo $public?>/img/icon_apv.png" alt="">
                                        <?php elseif($item['id']==56):?>
                                            <li class="dif">
                                            <a href="<?php echo  $nav= Yii::$app->urlManager->createUrl(['/'.$item['seourl']]);//file_put_contents("url.txt", $nav."\r\n", FILE_APPEND); ?>" class="hover-icon">
                                            <img src="<?php echo $public?>/img/icon_batteries.png" alt="">
                                        <?php elseif($item['id']==58):?>
                                            <li class="dif" style="padding-bottom: 26px;">
                                            <a href="<?php echo  $nav= Yii::$app->urlManager->createUrl(['/'.$item['seourl']]);//file_put_contents("url.txt", $nav."\r\n", FILE_APPEND); ?>" class="hover-icon">
                                            <img src="<?php echo $public?>/img/icon_accessories.png" alt="">
                                        <?php endif;?>
                                        <?=$item['name']?></a>
                                        <div class="menuProduct03" style="top: -<?=$key*46+13?>px">
                                            <!-- 推荐分类 -->
                                            <ul class="recomand_product">
                                            <?php foreach($item['recommendcategory'] as $item1):  ?>
                                                
                                                <li><a href="<?php $nav=\common\components\Helper::getrealurl($item1["id"],$categoryAllData);echo Yii::$app->request->getHostInfo()."/".$nav;?>"><?=$item1["name"];?></a></li>
                                            <?php endforeach;?>
                                            </ul>
                                            <ul class="main_goods">
                                                <?php foreach($item['subcategory'] as $key1=>$item1):?>
                                                        
                                                            <li>
                                                                <div class="first-word"><a class="first-word" href="<?php echo  $nav= Yii::$app->urlManager->createUrl(['/'.$item['seourl'].'/'.$item1['seourl']]); //file_put_contents("url.txt", $nav."\r\n", FILE_APPEND);  ?>"><?=$item1['name']?></a></div>
                                                                <div class="productlist">
                                                                    <?php foreach($item1['subcategory'] as $item2):?>
                                                                    <a  href="<?php echo  $nav= Yii::$app->urlManager->createUrl(['/'.$item['seourl'].'/'.$item1['seourl']."/".$item2['seourl']]);//file_put_contents("url.txt", $nav."\r\n", FILE_APPEND); ?>"><?=$item2['name']?></a>
                                                                    <?php endforeach;?>
                                                                </div>
                                                            </li>

                                                        
                                                <?php endforeach;?>
                                            </ul>
                                        </div>
                                    </li>
                                <?php endif;?>
                            <?php endforeach;?>
                        
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9" style="width: 80%;height: 35px;padding-left: 0px">
                <div class="mainmenu">
                    <nav>
                        <ul class="nav" style="width: 980px;">
                            <li>
                              <a href="<?=Yii::$app->request->getHostInfo()?>/new-arrivals.html">
                                    <?php if(Yii::$app->request->getUrl()=='/' or Yii::$app->request->getUrl()==Yii::$app->urlManager->createUrl(['/site/index'])):?>
                                        <h2 class="nav-recommand">NEW ARRIVAL</h2>
                                    <?php else:?>
                                        NEW ARRIVAL
                                    <?php endif;?>
                                </a>
                                <div class="nav-line"></div>
                            </li>
                            <li>
                               <a href="<?=Yii::$app->request->getHostInfo()?>/pre-orders.html">
                                    <?php if(Yii::$app->request->getUrl()=='/' or Yii::$app->request->getUrl()==Yii::$app->urlManager->createUrl(['/site/index'])):?>
                                        <h2 class="nav-recommand">PRE-ORDER</h2>
                                    <?php else:?>
                                        PRE-ORDER
                                    <?php endif;?>
                                </a>
                                <div class="nav-line"></div>
                            </li>
                            <li>
                                    <a href="<?=Yii::$app->request->getHostInfo()?>/tpd-products.html">
                                    <?php if(Yii::$app->request->getUrl()=='/' or Yii::$app->request->getUrl()==Yii::$app->urlManager->createUrl(['/site/index'])):?>
                                        <h2 class="nav-recommand">TPD PRODUCTS</h2>
                                    <?php else:?>
                                        TPD PRODUCTS
                                    <?php endif;?>
                                </a>
                                <div class="nav-line"></div>
                            </li>
                            <li style="position:relative;">
                                <a href="<?=Yii::$app->request->getHostInfo()?>/promotions.html">
                                    <?php if(Yii::$app->request->getUrl()=='/' or Yii::$app->request->getUrl()==Yii::$app->urlManager->createUrl(['/site/index'])):?>
                                        <h2 class="nav-recommand"><span style="float:left;">PROMOTION</span><span class="red_circle">Gifts</span><span class="hu-nav-arrow" ><img src="/theme/new/images/aount-icon/pic_jiantou_down.png" /></span></h2>
                                    <?php else:?>
                                        <span style="float:left;">PROMOTION</span><span class="red_circle">Gifts</span><span class="hu-nav-arrow" ><img src="/theme/new/images/aount-icon/pic_jiantou_down.png" /></span>
                                    <?php endif;?>
                                </a>
                                <ul class="nav-pullbox" style="">
                                    <li class="nav-pullbox-item"><a class="vape-giveaway-hover" href="<?=Yii::$app->request->getHostInfo()?>/promotions.html" style="">Vape Promotion</a></li>
                                    <li class="nav-pullbox-item"><a class="vape-giveaway-hover" href="/vape-giveaway.html" style="">Vape Giveaway</a></li>
                                </ul>
                                <div class="nav-line"></div>
                            </li>
                             <li>
                                <a href="<?=Yii::$app->request->getHostInfo()?>/wholesale-introduce.html">
                                 
                                        <h2 class="nav-recommand"><span style="float:left;">WHOLESALES</span><span class="hu-nav-arrow" ><img src="/theme/new/images/aount-icon/pic_jiantou_down.png" /></span></h2>
                                   
                                </a>
                                <ul class="nav-pullbox" style="">
                                    <li class="nav-pullbox-item"><a class="vape-giveaway-hover" href="<?=Yii::$app->request->getHostInfo()?>/wholesale-introduce.html" style="">Vape Wholesale</a></li>
                                    <li class="nav-pullbox-item"><a class="vape-giveaway-hover" href="/vape-collection.html">Vape Collection</a></li>
                                    <li class="nav-pullbox-item"><a class="vape-giveaway-hover" href="https://www.elegomall.com/vape-exclusive.html" style="">Vape Exclusive</a></li>
                                </ul>
                                <div class="nav-line"></div>
                            </li>
                            
                            <li>
                                <a href="<?=Yii::$app->request->getHostInfo()?>/fast.html">
                                 
                                        <h2 class="nav-recommand">FAST ORDER</h2>
                                   
                                </a>
                                
                            </li>
                            <!-- <li><a href="<?= Yii::$app->urlManager->createUrl(['/flash-sale/index']) ?>">FLASH SALE</a></li>
                            <li><a href="<?= Yii::$app->urlManager->createUrl(['/wholesales/index']) ?>">WHOLESALES</a></li> -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- mobile-menu-start -->
<div id="mobile-menu-list" class="mobile-menu-area hidden-md hidden-lg">
    <div class="container mean-container">
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu">
                    <div class="mean-push"></div><nav id="mobile-menu">
                        <ul>
                            <li class="active"><a href="/">Home</a>
                                <ul>
                                    <li class="lever2 nonext"> <a href="<?=Yii::$app->request->getHostInfo()?>/new-arrivals.html">NEW ARRIVAL</a></li>
                                    <li class="lever2 nonext"><a href="<?=Yii::$app->request->getHostInfo()?>/pre-orders.html">PRE-ORDER</a></li>
                                    <li class="lever2 nonext"><a href="<?=Yii::$app->request->getHostInfo()?>/tpd-products.html">TPD PRODUCTS</a></li>
                                    <li class="lever2 hasnext"> <a href="<?=Yii::$app->request->getHostInfo()?>/promotions.html">PROMOTION</a>
                                        <ul>
                                            <li class="lever3 nonext"> <a href="<?=Yii::$app->request->getHostInfo()?>/promotions.html">Vape Promotion</a>
                                            <li class="lever3 nonext"><a style="font-weight:bold;" href="/vape-giveaway.html">Vape Giveaway</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="lever2 hasnext"> <a href="<?=Yii::$app->request->getHostInfo()?>/wholesales.html">WHOLESALES</a>
                                        <ul>
                                            <li class="lever3 nonext"> <a href="<?=Yii::$app->request->getHostInfo()?>/wholesales.html">Vape Wholesale</a>
                                            <li class="lever3 nonext"><a style="font-weight:bold;" href="/vape-collection.html">Vape Collection</a>
                                            <li class="lever3 nonext"> <a href="https://www.elegomall.com/vape-exclusive.html">Vape Exclusive</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <?php foreach($categoryData as $key=>$item):?>
                                <?php if($item['id']==3): //品牌?> 
                            
                            <li><a href="/brands.html">brands</a>
                             
                                <ul>
                                     <?php  foreach($item['subcategory'] as $item1): ?>
                                    <?php if(count($item['subcategory'])>0){$nonext2='hasnext';}else{$nonext2='nonext';}?>    
                                    <li class="lever2 <?php echo $nonext2; ?>"><a style="font-weight:bold;" href="#"><?php echo $item1["name"];?></a>
                                        <ul>   
                                               <?php foreach($item1['subcategory'] as $item2):?>
                                            <li class="lever3 nonext"><a style="font-weight:bold;" href="<?php echo $nav=Yii::$app->urlManager->createUrl(['/brands/'.$item2['seourl']]);?>"><?php echo $item2["name"];?></a></li>
                                           <?php endforeach;?>
                                        </ul>
                                    </li>    
                                      <?php endforeach;?>
                                    
                                </ul>
                            </li>
                             
                              <?php endif;?>
                            <?php endforeach;?>
                            
                              <?php foreach($categoryData as $key=>$item):?>
                                <?php if($item['id']!=3): //栏目?> 
                            
                            <li><a href="<?php echo  $nav= Yii::$app->urlManager->createUrl(['/'.$item['seourl']]);?>"><?php echo $item['seourl']?></a>
                             
                                <ul>
                                     <?php  foreach($item['subcategory'] as $item1): ?>
                                     <?php if(count($item1['subcategory'])>0){$nonext='hasnext';}else{$nonext='nonext';}?>
                                    <li class="lever2 <?php echo $nonext;?>"><a style="font-weight:bold;" href="<?php echo  $nav= Yii::$app->urlManager->createUrl(['/'.$item['seourl'].'/'.$item1['seourl']]);?>"><?php echo $item1["name"];?></a>
                                        <ul>    
                                               <?php foreach($item1['subcategory'] as $item2):?>
                                            <li class="lever3 nonext"><a style="font-weight:bold;" href="<?php echo  $nav= Yii::$app->urlManager->createUrl(['/'.$item['seourl'].'/'.$item1['seourl']."/".$item2['seourl']]);?>"><?php echo $item2["name"];?></a></li>
                                           <?php endforeach;?>
                                        </ul>
                                    </li>    
                                      <?php endforeach;?>
                                    
                                </ul>
                            </li>
                             
                              <?php endif;?>
                            <?php endforeach;?>
                            
                          
                   
                            
                              
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
    	$("#product_vmegamenu").mouseleave(function(){
    		$(this).hide();
    		$(".product-menu-title P").find(".category-img").attr("src","/theme/new/img/icon_jiantou_2_down_nav_top.png");
    	})
    	//二级菜单第二条以后控制的三级菜单显示
     $(".product_vmegamenu ul li").mouseenter(function() {
		$(this).find(".menu-change-color").css("color","#ee3e43");
         $(this).find(".menuProduct03").show();
      });
      $(".product_vmegamenu ul li").mouseleave(function() {
      		$(this).find('.menuProduct03').hide();
      		$(this).find(".menu-change-color").css("color","#404040");
      })
      //二级菜单第一条以后控制的三级菜单显示
        $(".product_vmegamenu ul li").mouseenter(function() {
        	$(this).find(".hover-icon").css("color","#ff7043");
            $(this).find(".menuProduct").show();
        })
         $(".product_vmegamenu ul li").mouseleave(function() {
            $(this).find(".menuProduct").hide();
            $(this).find(".hover-icon").css("color","#404040");
        })
        $(".productlist img").mouseenter(function () {
            console.log($(this).parent(".productlist").outerHeight());
            $(this).parent(".productlist").css("height","auto");
            $(this).parent().parent().parent().parent(".menuProduct03").css("height","auto");
            $(this).attr("src","/theme/new/img/index_two/icon_up_two.png")
        });
        $(".productlist").mouseleave(function () {
            $(this).css("height","40px");
            $(this).parent().parent().parent().parent(".menuProduct03").css("height","auto");
            $(".productlist img").attr("src","/theme/new//images/icon_down_top_bar.png");
        });
        $(".page-list").click(function () {
            var page = $(this).data("page");
            var nowpage = page;
            var maxpage = $(this).parent().find('.maxPage').val();
            if(page=="<"){
                page = $(this).parent().find('.nowPage').val();
                if(page>1){
                    page = page-1;
                }
            }else if(page==">"){
                page = $(this).parent().find('.nowPage').val();
                if(page<maxpage){
                    page = parseInt(page)+1;
                }
            }
            $(this).parent().find('.nowPage').val(page);
            $(this).parent().parent().parent().children(".main_goods").hide();
            $(this).parent().parent().parent().find(".page"+page).show();
            $(this).parent().find(".page-btn"+page).addClass("pagelist_active").siblings(".page-list").removeClass("pagelist_active");
        });
        $(".product_vmegamenu .menuProduct  span a").mouseover(function(){
            $(this).find("#nav-show-icon").show();
        })
         $(".product_vmegamenu .menuProduct  span a").mouseout(function(){
            console.log("mouseout")
            $(this).find("#nav-show-icon").hide();
        })
        // 点击切换图标
        $(".product-menu-title P").click(function() {
        // event.stopPropagation();
        // console.log("111");
        if($(this).find(".category-img").attr("src")=="/theme/new/img/icon_jiantou_2_down_nav_top.png"){
            $(this).find(".category-img").attr("src","/theme/new/images/icon_jiantou_2_up_nav_left.png");
            // $("#isSelect").val(1);
        }else{
             $(this).find(".category-img").attr("src","/theme/new/img/icon_jiantou_2_down_nav_top.png");
            // $("#isSelect").val(0);
        }
    });
       $("#product_vmegamenu .menuProduct03").each(function(){
       		$(this).find(".main_goods>li").eq(5).css("border-right","none");
       		$(this).find(".main_goods>li").eq(11).css("border-right","none");
       		$(this).find(".main_goods>li").eq(17).css("border-right","none");
       		$(this).find(".main_goods>li:last").css("border-right","none");
       });

        //下拉箭头改变
        $('.mainmenu').on('mouseover mouseout','li',function(e){
            if($(this).find('.nav-pullbox')){
                if(e.type == 'mouseover'){
                    $(this).find('.hu-nav-arrow img').attr('src','/theme/new/images/aount-icon/pic_jiantou_up_.png');
                }else if(e.type == 'mouseout'){
                    $(this).find('.hu-nav-arrow img').attr('src','/theme/new/images/aount-icon/pic_jiantou_down.png');
                }
            }
            
        });
    });
</script>