<?php
use yii\helpers\Html;
use common\models\Product;
$productmodel=new Product();
/* @var $this \yii\web\View */
/* @var $content string */
//AppAsset::register($this);
$public = Yii::getAlias('@public'); //exit;
$brandJson = json_encode($brand);
use common\models\ProductHtml;
use common\components\Helper;
//$isGuest = Yii::$app->user->isGuest;
$isGuest = 1;
?>
<link type="text/css" rel="stylesheet" href="/theme/new/css/index/index.css" />
<script src="/theme/new/js/partComponent/carousel.js"></script>
<style>
	.bf-slide-left-suspend{
		position: fixed;
		left: 0;
		top:186px;
		display: none;
		z-index: 100;
	}
	.bf-slide-right-suspend{
		position: fixed;
		right: 0;
		top:186px;
		display: none;
		z-index: 100;
	}
</style>

<!-- @font-face { 
  font-family: custom;       
  src: url('custom.ttf'); 
} -->
<!--首页预加载banner图-->
<!--<div class="lx-ad-img" style="display: none;">
		
</div>-->
<!--新的轮播-->
<div class="hm-carousel">
    <div class="hm-carousel-imgs">
      <!-- <a href="">
        <img src="/theme/new/img/banner/1.jpg">
      </a> -->
      <?php $slide = ''?>
          <?php foreach($adbanner as $key=>$val):?>
                <?php $slide = $slide.'<a href="javascript:;"></a>'?>
                <a href="<?=$val['url']?>">
          <img src="<?=Yii::$app->params['imgServerAddress'].$val['pic']?>">
        </a>
          <?php endforeach;?>
    </div>
    <div class="hm-carousel-icons">
      <!-- <a href="javascript:;"></a> -->
      <?=$slide?>
    </div>
    <a class="hm-prev">
      <img src="/theme/new/img/index/icon_jiantou_left.png" />
    </a>
    <a class="hm-next">
      <img src="/theme/new/img/index/icon_jiantou_right.png" />
    </a>
  </div>
<!--首页焦点图轮播结束-->
<LINK rel=stylesheet type=text/css href="<?php echo $public ?>/css/lrtk.css">
<SCRIPT type=text/javascript charset=utf-8 src="<?php echo $public ?>/js/lrscroll.js"></SCRIPT>
 

<!--=======================================================首页新版开始=================================================-->
<!--黑五的悬浮-->
<div class="bf-slide-left-suspend">
 	<a href="https://www.elegomall.com/html/xmasvapesale.html" target="_blank">
 		<img src="<?php echo $public?>/img/activity/christmas/pc/pic_balloons.png"/>
 	</a>
 </div>
 <div class="bf-slide-right-suspend">
 	<a href="https://www.elegomall.com/html/xmasvapesale.html" target="_blank">
 		<img src="<?php echo $public?>/img/activity/christmas/pc/skin/pic_zhuangshi_right.png"/>
 	</a>
 </div> 
<div class="hm-index-container">
		<!-- 品牌滚动-->
<div class="index-brandsList" style="width: 100%;background: #f5f5f5;margin:0 auto">
    <div class="container">
        <div class="row" id="pinpai">
            <div class="col-lg-12 col-md-12 col-sm-12 banner-list">
                <div id="wrap">
                        <div class="prev" style="height:54px;line-height: 54px;top:34px;">
                            <img src="<?php echo $public ?>/img/icon_jiantou_1_left_toogle.png" alt="">
                        </div>
                        <div class="next" style="height:54px;line-height: 54px;top:34px;">
                            <img src="<?php echo $public ?>/img/icon_jiantou_1_right_toogle.png" alt="">
                        </div>
                        <div class="wrap-famouse">
                            
                       </div>
                       <div class="wrap-famouse-app" style="height:100%;position:absolute;left:0;top:0;">
                            
                       </div>
                </div>
            </div>
        </div>
    </div>
</div>
		<!--新品到达-->
		<div class="hm-i-content hm-b-bg-f">
				<div class="hm-i-p-nav hm-b-border-1">
						<h3 class="hm-b-fl">Newest Products</h3>
						<a href="/pre-orders.html" class="hm-i-more hm-b-fr">More >></a>
				</div>
				<div class="hm-i-p-lists hm-i-p-new-lists">
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					
				</div>
		</div>
		<!--移动端首页三个产品广告链接-->
		<div class="hm-i-content hm-i-content-adimg hm-i-content-adimg-1" style="display: none;">
			
		</div>
		<!--新加中间广告栏-->
		<div class="hm-i-content hm-i-ad-center hm-i-ad-center-1">
				<a href="" style="max-height:130px">
					<img src=""/>
				</a>
		</div>
		<!--预售产品-->
		<div class="hm-i-content hm-b-bg-f">
				<div class="hm-i-p-nav hm-b-border-1">
						<h3 class="hm-b-fl">Featured Products</h3>
						<a href="/featured-products.html" class="hm-i-more hm-b-fr">More >></a>
				</div>
				<div class="hm-i-p-lists hm-i-p-feature-lists">
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
					<div class="hm-i-p-list pro-featured-arrival">
						<div class="hm-i-p-single">
							<div class="hm-i-p-img">
								<a href="javascript:;">
									<img src="<?php echo $public ?>/img/index/loadding.gif"/>
								</a>
							</div>
						</div>
					</div>
				</div>
		</div>
		<!--中间广告栏-->
		<div class="hm-i-content hm-i-ad-center hm-i-ad-center-2">
				<a href="">
					<img src=""/>
				</a>
		</div>
		<!--套装产品-->
		<div class="hm-i-content hm-b-bg-f hm-i-star-kits">
				<div class="hm-i-p-nav hm-b-border-1 hm-i-p-nav-t">
						<h3 class="hm-b-fl">Starter Kits</h3>
						<div class="hm-i-pro-link">
						
						</div>
				</div>
				<div class="hm-i-p-items">
					<div class="hm-i-p-slid-ad hm-b-fl">
						<a href="">
							<!--category-->
							<img src=""/>
						</a>
					</div>
					<div class="hm-i-p-lists-t hm-b-fl">
						
					</div>
				</div>
		</div>
			<!--首页三个产品广告链接-->
		<div class="hm-i-content hm-i-content-adimg hm-i-content-adimg-2">
			
		</div>
			<!--apv单产品-->
		<div class="hm-i-content hm-b-bg-f hm-i-apv">
				<div class="hm-i-p-nav hm-b-border-1 hm-i-p-nav-t">
						<h3 class="hm-b-fl">Apv/Mods</h3>
						<div class="hm-i-pro-link">
						
						</div>
				</div>
				<div class="hm-i-p-items">
					<div class="hm-i-p-slid-ad hm-b-fl">
						<a href="">
							<!--category-->
							<img src=""/>
						</a>
					</div>
					<div class="hm-i-p-lists-t hm-b-fl">
						
					</div>
				</div>
		</div>
			<!--首页三个产品广告链接-->
		<div class="hm-i-content hm-i-content-adimg hm-i-content-adimg-3">
			
		</div>
			<!--雾化器-->
		<div class="hm-i-content hm-b-bg-f hm-i-atom">
				<div class="hm-i-p-nav hm-b-border-1 hm-i-p-nav-t">
						<h3 class="hm-b-fl">Atomizers</h3>
						<div class="hm-i-pro-link">
							
						</div>
				</div>
				<div class="hm-i-p-items">
					<div class="hm-i-p-slid-ad hm-b-fl">
						<a href="">
							<!--category-->
							<img src=""/>
						</a>
					</div>
					<div class="hm-i-p-lists-t hm-b-fl">
						
					</div>
				</div>
		</div>
		<!--中间广告栏-->
		<div class="hm-i-content hm-i-ad-center hm-i-ad-center-3">
				<a href="">
					<img src=""/>
				</a>
		</div>
			<!--猜你喜欢产品-->
		<div class="hm-i-content hm-b-bg-f">
				<div class="hm-i-p-nav hm-b-border-1">
						<h3 class="hm-b-fl">Recommend for you</h3>
						<!--<a href="" class="hm-i-more hm-b-fr">More >></a>-->
				</div>
				<div class="hm-i-p-lists-love">
					
				</div>
		</div>
		<div class="hm-i-content hm-i-content-adimg">
			
		</div>
</div>
<!--首页三个产品广告链接-->

		<!--<div class="hm-i-content hm-i-content-adimg">
			
		</div>-->



 <!--=======================================================首页新版结束=================================================-->  
 <!--下雪效果-->
<!--<script type="text/javascript" src="<?php echo $public; ?>/js/activity/demo.js"></script>-->
 
<script>

				var faStar="";
				var t;

	//品牌logo轮播
    var brandJson = '<?=$brandJson?>';
    var brandArr = JSON.parse(brandJson);
    var brandArrNew = [];
    var ws = null;
    if(brandArr.length%12 != 0){
        ws = brandArr.length%12;
        for(var i = 0;i<12-ws;i++){
            brandArr.push(brandArr[i]);
        }
    }
    var ulsum = brandArr.length/12;
    $('.wrap-famouse').css('width',(ulsum+2)*1140+'px');
    for(var i = 0;i<ulsum;i++){
        var arr = [];
        for(var j = i*12;j<i*12+12;j++){
            arr.push(brandArr[j]);
        }
        brandArrNew.push(arr);
    }
    for(var i = 0;i<brandArrNew.length;i++){
        var ul = $('<ul class="famouse-slide"></ul>');//huxu
        var li = '';
        for(var j = 0;j<brandArrNew[i].length;j+=2){
            li += '<li><a data-id="'+brandArrNew[i][j].id+'" href="'+brandArrNew[i][j].url+'" target="_blank"><img style="width:100%;height:100%;" alt="'+brandArrNew[i][j].name+'" src="'+brandArrNew[i][j].logo+'" class="img-responsive center-block"></a><a href="'+brandArrNew[i][j+1].url+'" target="_blank"><img style="width:100%;height:100%;" alt="'+brandArrNew[i][j+1].name+'" src="'+brandArrNew[i][j+1].logo+'" class="img-responsive center-block"></a></li>';
        }
        ul.append(li);
        $('.wrap-famouse').append(ul);
    }
    var brandArrNewApp = [];
    function brandapp(){
        var ulsumApp = brandArr.length/4;
        $('.wrap-famouse-app').css('width',(ulsumApp+2)*380+'px');
        for(var i = 0;i<ulsumApp;i++){
            var arr = [];
            for(var j = i*4;j<i*4+4;j++){
                arr.push(brandArr[j]);
            }
            brandArrNewApp.push(arr);
        }
        for(var i = 0;i<brandArrNewApp.length;i++){
            var ul = $('<ul class="famouse-slide-app"></ul>');
            var li = '';
            for(var j = 0;j<brandArrNewApp[i].length;j++){
                li += '<li><a href="'+brandArrNewApp[i][j].url+'"><img src="'+brandArrNewApp[i][j].logo+'" /></a></li>';
            }
            ul.append(li);
        $('.wrap-famouse-app').append(ul);
        }
    }
    // eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('8 4=0;8 5=$(".5-6");8 d=$(".5-6 d");8 i=d.i().q(u);8 m=d.m().q(u);5.w(i);5.v(m);5.g({\'9\':\'-h\'});8 a=$(".5-6 d").C;b.c(a);$(".y").r(7(){4--;b.c(4);$(".5-6").p().o({"9":(-4-1)*f+\'e\'},j,7(){n(4==-1){$(".5-6").g({\'9\':-(a-2)*f+\'e\'});4=a-3}})});$(".B").r(7(){4++;b.c(4);$(".5-6").p().o({"9":(-4-1)*f+\'e\'},j,7(){n(4==a-2){$(".5-6").g({\'9\':\'-h\'});4=0}})});8 l=x;k();7 k(){l=z(7(){4++;b.c(4);$(".5-6").p().o({"9":(-4-1)*f+\'e\'},j,7(){n(4==a-2){$(".5-6").g({\'9\':\'-h\'});4=0}})},A)}$(\'#t\').s(\'D\',7(){b.c(E);F(l)});$(\'#t\').s(\'G\',7(){b.c(H);k()});',44,44,'||||_num|wrap|famouse|function|var|left|size|console|log|ul|px|1140|css|1140px|first|200|timerFn|timer|last|if|animate|stop|clone|click|on|pinpai|true|prepend|append|null|prev|setInterval|5000|next|length|mouseover|11111|clearInterval|mouseout|1112222211'.split('|'),0,{}))
    // 品牌滚动
    if(UNIT_TYPE != 'pc'){
        $('.electronic-tab-area ').css('display','none');
        brandapp();
    }else{
        $('.wrap-famouse').css('display','block');
    }
    var UNIT_TYPE = isAPP();
        var _num = 0;
        var wrapid = $('#wrap').width();
        if(UNIT_TYPE == 'pc'){
            var wrap=$(".wrap-famouse");
        }else{
            var wrap=$(".wrap-famouse-app");
        }
        var ul=wrap.find('ul');
        var first = ul.first().clone(true);
        var last = ul.last().clone(true);
        wrap.append(first);
        wrap.prepend(last);
        if(UNIT_TYPE == 'pc'){
            wrap.css({'left':'-1140px'});
        }else{
            wrap.css({'left':'-380px'});
        }
        var size=wrap.find('ul').length;
        $(".prev").click(function () {
            brandscrollprev();
        });
        $(".next").click(function () {
            brandscrollnext();
        });
        function brandscrollprev(){
            if(UNIT_TYPE == 'pc'){
                _num--;
                if(_num<=-1){
                    $(".wrap-famouse").css({'left':-(size-1)*1140+'px'});
                    _num = size-3;
                }
                $(".wrap-famouse").stop().animate({"left":(-_num-1)*1140+'px'},200);
            }else{
                _num--;
                if(_num<=-1){
                    $(".wrap-famouse-app").css({'left':-(size-1)*380+'px'});
                    _num = size-3;
                }
                $('.wrap-famouse-app').stop().animate({"left":(-_num-1)*380+'px'},200);
            }
        }
        function brandscrollnext(){
            if(UNIT_TYPE == 'pc'){
                _num++;
                if(_num>=size-1){
                	$(".wrap-famouse").css({'left':'0'});
                    _num = 1;
                }
                $(".wrap-famouse").stop().animate({"left":(-_num-1)*1140+'px'},200);
            }else{
                _num++;
                if(_num>=size-2){
                	$(".wrap-famouse").css({'left':'0'});
                    _num = 1;
                }
                $(".wrap-famouse-app").stop().animate({"left":(-_num-1)*380+'px'},200);
            }
        }
    //自动滚动
    var timer = null;
    if(UNIT_TYPE =='pc'){
        timerFn();
    }else{
    	timerFnapp();
    }
    
    function timerFn(){
        timer = setInterval(function(){
            _num++;
            if(_num>=size-1){
                $(".wrap-famouse").css({'left':'0'});
                _num = 1;
            }
            $(".wrap-famouse").stop().animate({"left":(-_num-1)*1140+'px'},200);
        },5000);
    }
    function timerFnapp(){
        timer = setInterval(function(){
            _num++;
            if(_num>=size-1){
                $(".wrap-famouse-app").css({'left':'0'});
                _num = 1;
            }
            $(".wrap-famouse-app").stop().animate({"left":(-_num-1)*380+'px'},200);
        },5000);
    }

    //鼠标事件
    $('#pinpai').on('mouseover',function(){
        clearInterval(timer);
    });
    $('#pinpai').on('mouseout',function(){
        timerFn();//开启定时器
    });
    //星级评价函数
	 function faStarS(num){
	 	if(num==5){
	 		for(var i=0;i<num;i++){
	 		faStar+="<a href='javascript:;'>\
							<i class='fa fa-star'></i>\
						</a>"
	 		}
	 	}else if(num<5){
	 		for(var i=0;i<num;i++){
	 		faStar+="<a href='javascript:;'>\
							<i class='fa fa-star'></i>\
						</a>"
	 		}
	 		for(var j=0;j<5-num;j++){
	 			faStar+="<a href='javascript:;'>\
							<i class='fa fa-star' style='color:#ccc;'></i>\
						</a>"
	 		}
	 	}
	 	return faStar;
	 } 
	 //属性选择函数
	 function attrChoose(num,arr){
	 		for(var i=0;i<num;i++){
	 				selectHtml+="<select></select>";
	 				for(var j=0;j<arr;j++){
	 					optAttr+="<option></option>"
	 				}
	 		}
	 		return selectHtml,optAttr;
	 }
	 //请求首页默认数据
   function loadingData(){
   			var proHtml="";
   			var proFeaHtml="";
   			var proStarterHtml="";
   			var keyHtml="";
   			var keyHtmlA="";
   			var keyHtmlAtom="";
				$.ajax({
					type:"get",
					url:"/site/get-index.html",
					async:false,
					beforeSend : function (){
//                  layer.msg('loading', {icon: 16,shade: 0.01});
//					$(".hm-carousel-imgs>a>img").attr("src","/theme/new/img/activity/blackfriday/pc/zanwei_img.png");
                	},
					success:function(data){
						//顶部广告
						var data=JSON.parse(data);
						console.log(data);
						
					//new_arrival新品
					var h_l="";
					$.each(data.new_arrival, function(i,item) {
							var sf=data.new_arrival;
							var i=i;
							var item=item;
							h_l+=dataSucessFun(sf,i,item,proStarterHtml);
					});
					$(".hm-i-p-new-lists").html(h_l);
					
					//预售产品
					var h_r="";
					$.each(data.featured_product, function(i,item) {
							var sf=data.featured_product;
							var i=i;
							var item=item;
							h_r+=dataSucessFun(sf,i,item,proStarterHtml);
					});
					$(".hm-i-p-feature-lists").html(h_r);
					//填充广告图片
					$.each(data.starter_kits.banner, function(s,v) {
							$(".hm-i-star-kits .hm-i-p-slid-ad>a").attr("href",v.url);
							$(".hm-i-star-kits .hm-i-p-slid-ad>a>img").attr("src",v.pic);
							$(".hm-i-star-kits .hm-i-p-slid-ad>a>img").attr("data-name",v.name);
					});
					$.each(data.apv_mods.banner, function(s,v) {
							$(".hm-i-apv .hm-i-p-slid-ad>a").attr("href",v.url);
							$(".hm-i-apv .hm-i-p-slid-ad>a>img").attr("src",v.pic);
							$(".hm-i-apv .hm-i-p-slid-ad>a>img").attr("data-name",v.name);
					});
					$.each(data.atomizers.banner, function(s,v) {
							$(".hm-i-atom .hm-i-p-slid-ad>a").attr("href",v.url);
							$(".hm-i-atom .hm-i-p-slid-ad>a>img").attr("src",v.pic);
							$(".hm-i-atom .hm-i-p-slid-ad>a>img").attr("data-name",v.name);
					});
					//填充关键字
					$.each(data.starter_kits.keywords, function(s,k) {
							keyHtml+="<a href='"+k.url+"'>"+k.keywords+"</a>"
					});
						$.each(data.apv_mods.keywords, function(s,k) {
							keyHtmlA+="<a href='"+k.url+"'>"+k.keywords+"</a>"
					});
						$.each(data.atomizers.keywords, function(s,k) {
							keyHtmlAtom+="<a href='"+k.url+"'>"+k.keywords+"</a>"
					});
					//填充关键字html片段
					$(".hm-i-star-kits .hm-i-pro-link").html(keyHtml);
					$(".hm-i-apv .hm-i-pro-link").html(keyHtmlA);
					$(".hm-i-atom .hm-i-pro-link").html(keyHtmlAtom);
						//starter_kits填充html片段
						var h_k='';
						$.each(data.starter_kits.products, function(i,item) {
							var sf=data.starter_kits.products;
							var i=i;
							var item=item;
							h_k+=dataSucessFun(sf,i,item,proStarterHtml);
						});
						$(".hm-i-star-kits .hm-i-p-lists-t").html(h_k);
							//apv填充html片段
						var h_a='';
						$.each(data.apv_mods.products, function(i,item) {
							var sf=data.apv_mods.products;
							var i=i;
							var item=item;
							h_a+=dataSucessFun(sf,i,item,proStarterHtml);
						});
						$(".hm-i-apv .hm-i-p-lists-t").html(h_a);
							//atom填充html片段
						var h_m='';
						$.each(data.atomizers.products, function(i,item) {
							var sf=data.atomizers.products;
							var i=i;
							var item=item;
							h_m+=dataSucessFun(sf,i,item,proStarterHtml);
						});
						$(".hm-i-atom .hm-i-p-lists-t").html(h_m);
							//推荐填充html片段
						var h_y='';
						$.each(data.recommend_for_you, function(i,item) {
							var sf=data.recommend_for_you;
							var i=i;
							var item=item;
							h_y+=dataSucessFun(sf,i,item,proStarterHtml);
						});
						$(".hm-i-p-lists-love").html(h_y);
						//中间三个小广告图片的添加 middle_banner
						var adHtml="";
						$.each(data.middle_banner,function(k,v){
								adHtml+="<a href='"+v.url+"' class='hm-i-ad-img'>\
													<img src='"+v.pic+"' name='"+v.name+"'/>\
												</a>"
						})
						$(".hm-i-content-adimg").html(adHtml);
						//中间图片的添加 spots_banner
						$.each(data.spots_banner,function(k,v){
								$(".hm-i-ad-center-1>a").attr("href",data.spots_banner[0].url);
								$(".hm-i-ad-center-2>a").attr("href",data.spots_banner[1].url);
								$(".hm-i-ad-center-1>a>img").attr("src",data.spots_banner[0].pic);
								$(".hm-i-ad-center-2>a>img").attr("src",data.spots_banner[1].pic);
								$(".hm-i-ad-center-3>a").attr("href",data.spots_banner[2].url);
								$(".hm-i-ad-center-3>a>img").attr("src",data.spots_banner[2].pic);
								
						})
					}
				});
			//判断有无子产品开始
//			console.log(data.starter_kits.products);
				//判断有无子产品开始
			$(".hm-i-content .hm-i-p-list").each(function(){
				if($(this).find(".select-box").html()==""){
						if($(this).attr("isorder")>0&&$(this).attr("data-stock")<=0){
							$(this).find(".hm-isorder-mark").html("Pre-order");
						}
						else{
							$(this).find(".hm-isorder-mark").remove();
						}
						
						if($(this).attr("id")>0){
							$(this).find(".ajaxaddToFavorite").attr("data-id",$(this).attr("id"));
						}
						else if($(this).attr("id")=="undefined"){
							$(this).find(".ajaxaddToFavorite").attr("data-id",$(this).attr("id",0));
						}
						if($(this).attr("data-stock")<=0){
							$(this).find(".ajaxaddToCartText").attr("data-id",$(this).attr("id"));
							$(this).find(".ajaxaddToCartText>span").html(" Arrival Notices");
							$(this).find(".ajaxaddToCartText").attr("class","ajaxarrivenotic");
						}
						$(this).find(".hm-pro-attr").remove();
				}
				else{
					//有子产品中标签的显示
					var num=0;
					var prolen=$(this).find("input").length;
					$(this).find("input").each(function(i){
						
						if($(this).attr("data-isoder")>0){
							num++;
						}
					});
					if(num>0&&num==prolen){
						$(this).find(".hm-isorder-mark").html("Pre-order");
					}
					else if(num>0&&num<prolen){
						$(this).find(".hm-isorder-mark").html("Partically Pre-order");
					}
					else{
						$(this).find(".hm-isorder-mark").remove();
					}			
				}
			});
				
        //判断是否显示标签
		$(".hm-hot-icon,.hm-new-icon,.hm-tpd-icon,.hm-off-icon").hide();
			$(".hm-i-p-list").each(function(){
					var pareType=$(this).attr("paretype");
					var reallyPrice=$(this).find(".really-data").attr("data-price");
					var marketPrice=$(this).find(".market-price-data").attr("data-mount");
					var offHtml=$(this).find(".hm-off-icon>a");
					var fixedF;
					if($(this).find(".market-price-data").attr("data-mount")<=0){
						$(this).find(".market-price-data").hide();
					}
					if((8&pareType)>0){
							if($(this).find(".market-price-data").attr("data-mount")>0){
								$(this).find(".hm-off-icon").show();
								
								fixedF=(marketPrice-reallyPrice)/marketPrice;
								
								fixedF=(fixedF.toFixed(2))*100;
									fixedF=Math.floor(fixedF);
								offHtml.html("-"+fixedF+"%");
							}
							else{
								$(this).find(".hm-off-icon").hide();
							}
					}
					else if((1&pareType)>0){
								$(this).find(".hm-new-icon").show();
						
					}
					if((32&pareType)>0||(128&pareType)>0){
							$(this).find(".hm-tpd-icon").show();
					}
					else if((2&pareType)>0){
						$(this).find(".hm-hot-icon").show();
					}
					else{
						if(marketPrice>0&&reallyPrice>0&&marketPrice!=reallyPrice){
								if($(this).find(".hm-new-icon").css("display")=="block"){
									$(this).find(".hm-off-icon").css("top","36px");
									$(this).find(".hm-off-icon").show();
								}
								
								fixedF=(marketPrice-reallyPrice)/marketPrice;
									fixedF=(fixedF.toFixed(2))*100;
									fixedF=Math.floor(fixedF);
								offHtml.html("-"+fixedF+"%");
						}
					}
					
			});
				
			
			}
		
				//成功函数
					function dataSucessFun(sF,i,item,proStarterHtml){
							var pareStock,pareType,pareStar,pareAttr;
							var proHtml0="";
							var proHtml1="";
							var proHtml2="";
							var selectHtmlQ="";
							var selectHtmlH="";
							var optionHtml="";
							var inputHtml="";
							var starHtml="";
							var selectHtml="";
						  pareStock=sF[i].stock;
						  pareType=sF[i].type;
						  pareStar=parseInt(sF[i].star);
						  pareAttr=sF[i].product_opt.opt;
							proHtml0="<div class='hm-i-p-list pro-featured-arrival' id='"+sF[i].id+"' data-stock='"+sF[i].stock+"' paretype='"+sF[i].type+"' isorder='"+sF[i].pre_order_time+"'>\
							<div class='hm-i-p-single'>\
									<div class='hm-i-p-img'>\
										<a href='product\/"+sF[i].seourl+".html'>\
											<img src='"+sF[i].image+"' class='scrollLoading'>\
										</a>\
									</div>\
									<div class='hm-i-p-content'>\
										<div class='hm-i-p-title'>\
												<h4>\
													<a href='product\/"+sF[i].seourl+".html'><span class='hm-isorder-mark'>Partically Pre-order</span>"+sF[i].name+"</a>\
												</h4>\
										</div>\
										<div class='hm-i-p-rating'>"
								//插入星级评价
								faStar="";
								starHtml="";//清空内容;
								starHtml=	faStarS(pareStar);
										proHtml1="</div>\
										<div class='hm-i-p-price'>\
												<span class='really-data' data-price='"+sF[i].price+"'>$"+sF[i].price+"</span>\
												<span class='market-price-data' style='font-weight:100;font-size:14px;text-decoration:line-through;margin-left:10px;' data-mount='"+sF[i].market_price+"'>$"+sF[i].market_price+"</span>\
										</div>\
										<div class='input-v' style='display:none;'></div>\
										<div class='hm-i-p-icon'>\
												<div class='hm-i-p-lefticon hm-b-fl'>\
													<a href='javascript:;' class='ajaxaddToCartText'>\
														<i class='fa fa-shopping-cart'></i>\
														<span >Add To Cart</span>\
													</a>\
												</div>\
												<div class='hm-i-p-righticon hm-b-fr'>\
														<a href='javascript:;' class='ajaxaddToFavorite' data-id='-1'>\
															<i class='fa fa-heart'>\
															</i>\
														</a>\
												</div>\
										</div>\
									</div>\
							</div>\
							<div class='hm-pro-attr' style='display:none;'>\
									<div class='select-box'>"
							//隐藏的inputhtml选项片段
							inputHtml="";//清空单项inputhtml片段内容
							$.each(item.product_opt.child,function(h,value){
									inputHtml+="<input type='hidden' class='child"+item.product_opt.child[h].attrs+"' data-isoder='"+item.product_opt.child[h].is_pre_order+"' data-attr='child"+item.product_opt.child[h].attrs+"' value='"+item.product_opt.child[h].product_id+"' data-stock='"+item.product_opt.child[h].stock+"'/>";
							});
							//属性选择
							selectHtml="";//清空选项内容
							$.each(item.product_opt.opt,function(k,v){
									if(v!=null){
										selectHtmlQ="<select id="+item.product_opt.opt[k].id+"  class='hm-opt-select'><option value='0'>--Choose "+item.product_opt.opt[k].lable+"--</option>";
										selectHtmlH="</select>";
										optionHtml="";
								$.each(v.opts,function(j,l){
									//console.log(v.opts);
										optionHtml+="<option data-id="+v.opts[j].id+" class='hm-option' pareid='"+item.product_opt.opt[k].id+"'>"+v.opts[j].name+"</option>";
								});
									selectHtml+=(selectHtmlQ+optionHtml+selectHtmlH);	
									}
									
							});
									
									proHtml2="</div>\
									<div class='hm-i-p-icon'>\
												<div class='hm-i-p-lefticon hm-b-fl'>\
													<a href='javascript:;' class='ajaxaddToCart' data-id='-1'>\
														<i class='fa fa-shopping-cart'></i>\
														<span>Add To Cart</span>\
													</a>\
													<a href='javascript:;'style='display:none;' class='ajaxarrivenotic'>\
														<i class='fa fa-shopping-cart'></i>\
														<span> Arrival Notices</span>\
													</a>\
												</div>\
												<div class='hm-i-p-righticon hm-b-fr'>\
														<a href='javascript:;' class='ajaxaddToFavorite' data-id='-1'>\
															<i class='fa fa-heart'></i>\
														</a>\
												</div>\
										</div>\
							</div>\
							<div class='hm-hot-icon'>\
									<a href='javascript:;'>\
											HOT\
									</a>\
							</div>\
							<div class='hm-new-icon'>\
									<a href='javascript:;'>\
											NEW\
									</a>\
							</div>\
							<div class='hm-tpd-icon'>\
									<a href='javascript:;'>\
											TPD<img src='<?php echo $public;?>/img/index/icon_done_tpd.png'/>\
									</a>\
							</div>\
							<div class='hm-off-icon'>\
									<a href='javascript:;'>\
											30%\
									</a>\
							</div>\
						</div>"
						return proStarterHtml=(proHtml0+starHtml+proHtml1+inputHtml+selectHtml+proHtml2);
						
					}
    $(function(){
    	//黑五首页悬浮物
//  		if(screen.width>1366){
//		$(window).scroll(fbScoll);
//	
//	}
//给图片和icon添加索引
			
	function fbScoll(){
		var wScroll=$(window).scrollTop();
		if(wScroll>600){
				$(".bf-slide-left-suspend").show();
				$(".bf-slide-right-suspend").show();
		}
		else{
			$(".bf-slide-left-suspend").hide();
			$(".bf-slide-right-suspend").hide();
		}
	}
		t=setInterval(function(){
		$(".bf-slide-left-suspend,.bf-slide-right-suspend").animate({top:"206px"},2000);
		$(".bf-slide-left-suspend,.bf-slide-right-suspend").animate({top:"186px"},2000);
	},100);
			loadingData();
			//属性选择效果开始
			 getos();
			 $(".select-box>select").mouseover(function(e){
				e.stopPropagation();
			 });
			$(".select-box>select").mouseleave(function(e){
				e.stopPropagation();
			});
			$(".hm-pro-attr").hide();
//			$(".hm-prev,.hm-next").hide();
			$(".hm-carousel").mouseover(function(){
				$(".hm-prev,.hm-next").show();
			});
			$(".hm-carousel").mouseleave(function(){
				$(".hm-prev,.hm-next").hide();
			})
			
			function getos(){
				if(getOs()=="Firefox"){
						$(".hm-i-p-lists,.hm-i-p-lists-t,.hm-i-p-lists-love").on("mouseleave",".hm-i-p-list",function(e){
							var _this=$(this);
							
								_this.find(".hm-pro-attr").slideUp();
							
						
		          e.stopPropagation();	
					});
					$(".hm-i-p-lists,.hm-i-p-lists-t,.hm-i-p-lists-love").on("mouseover",".hm-i-p-lefticon",function(e){
							$(this).parents(".hm-i-p-single").next(".hm-pro-attr").slideDown();
		          e.stopPropagation();
					});
				}else{
						$(".hm-i-p-lists,.hm-i-p-lists-t,.hm-i-p-lists-love").on("mouseleave",".hm-i-p-list",function(e){
						$(this).find(".hm-pro-attr").slideUp();
		          e.stopPropagation();	
					});
					$(".hm-i-p-lists,.hm-i-p-lists-t,.hm-i-p-lists-love").on("mouseover",".hm-i-p-lefticon",function(e){
							$(this).parents(".hm-i-p-single").next(".hm-pro-attr").slideDown();
		          e.stopPropagation();
					});
				}
			}
			function getOs()  
		{  
		    var OsObject = "";  
		   if(navigator.userAgent.indexOf("MSIE")>0) {  
		        return "MSIE";  
		   }  
		   if(isFirefox=navigator.userAgent.indexOf("Firefox")>0){  
		        return "Firefox";  
		   }  
		   if(isSafari=navigator.userAgent.indexOf("Safari")>0) {  
		        return "Safari";  
		   }   
		   if(isCamino=navigator.userAgent.indexOf("Camino")>0){  
		        return "Camino";  
		   }  
		   if(isMozilla=navigator.userAgent.indexOf("Gecko/")>0){  
		        return "Gecko";  
		   }  
		     
		}  

			
			//属性选择效果结束
        $(".tab-menu ul li").click(function () {
            $(this).find("div").show().parent().parent("li").siblings().find("div").hide();
        })
				//鼠标移入切换箭头显示
        $("#slidershow").hover(function(){
                $('.glyphicon-chevron-left,.glyphicon-chevron-right').show();
            },
            function(){
                $('.glyphicon-chevron-left,.glyphicon-chevron-right').hide();
            });
      
				//未加载图片时显示的默认图片
        jQuery(".scrollLoading").scrollLoading();
				
        //$(".hm-i-p-lists .ajaxarrivenotic,.hm-i-p-lists-t .ajaxarrivenotic,.hm-i-p-lists-love .ajaxarrivenotic").hide();
        //改变select，事件
        jQuery(".hm-i-p-lists,.hm-i-p-lists-t,.hm-i-p-lists-love").on("change",".hm-opt-select",function(){
        //chosed为1时为选中，0为未选中。
        //debugger;
       // jQuery(this).parents('.hm-i-p-list').find('input-v').html("");
        var option = jQuery(this).find("option:selected");
        jQuery(option).parent().children().attr('chosed',0);
        var choise = '-';
        if(jQuery(option).attr('chosed')==1){
            jQuery(option).attr('chosed',0);
        } else {
            jQuery(option).attr('chosed',1);            
        }
        //拼选中属性id;
        jQuery(this).parent('.select-box').find(".hm-option").each(
        	//选中子元素的id拼接函数
            function(){
                if(jQuery(this).attr("chosed")==1){
                    choise=choise+jQuery(this).attr("pareid")+"-"+jQuery(this).attr("data-id")+'-';
                   
                }
            }
           
        );
//      var stock = jQuery(this).parent('.select-box').find(".child"+choise).data('stock');
        var stock = jQuery(this).parent().find(".child"+choise).data('stock');
        var proorder = jQuery(this).parent('.select-box').find(".child"+choise).data('isoder');
        var id = '-1';
        var ids = jQuery(this).parent('.select-box').find(".child"+choise).val();
      //alert(ids);
        if(ids>=0){
            jQuery(this).parent().parent().find('.ajaxaddToCart').attr('data-id',ids);
            jQuery(this).parents('.hm-i-p-list').attr('data-ids',ids);
            jQuery(this).parents('.hm-i-p-list').find('.input-v').html("<span class='span-v'>"+ids+"</span>");
            jQuery(this).parents(".hm-i-p-list").find('.ajaxaddToFavorite').attr('data-id',ids);
            jQuery(this).parent().parent().find('.ajaxarrivenotic').attr('data-id',ids);
            if(stock>0 || proorder>0){
                jQuery(this).parent().parent().parent().find('.ajaxaddToCartText').html('<i class="fa fa-shopping-cart"></i><span> Add to Cart</span>');
                jQuery(this).parent().parent().find('.ajaxaddToCart').show();
                jQuery(this).parent().parent().find('.ajaxarrivenotic').hide();
            }else{
                jQuery(this).parent().parent().parent().find('.ajaxaddToCartText').html('<i class="fa fa-shopping-cart"></i><span> Arrival Notices</span>');
                jQuery(this).parent().parent().find('.ajaxaddToCart').hide();
                jQuery(this).parent().parent().find('.ajaxarrivenotic').show();
            }
        }else{
            jQuery(this).parent().parent().find('.ajaxaddToCart').attr('data-id',id);
            jQuery(this).parents('.hm-i-p-list').find('.input-v').html("");
            jQuery(this).parents('.hm-i-p-list').attr('data-ids',id);
            jQuery(this).parents(".hm-i-p-list").find('.ajaxaddToFavorite').attr('data-id',id);
            jQuery(this).parent().parent().find('.ajaxarrivenotic').attr('data-id',id);
        }
//      e.cancelBubble = true;
//      e.stopPropagation();

        });   
    })
    //判断设备
    function isAPP(){
        if (/(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent)) {  //判断iPhone|iPad|iPod|iOS
          return "iOS";
        } else if (/(Android)/i.test(navigator.userAgent)) {   //判断Android
            return "Andriod";
        } else { 
            return "pc";
        };
    }

</script>
<?php
$urlCartAdd = Yii::$app->urlManager->createUrl(['cart/ajax-add']);
$urlFavoriteAdd = Yii::$app->urlManager->createUrl(['goods/favorite']);
$this->registerJs('
var product = {csrf:"' . Yii::$app->request->getCsrfToken() . '"};
');
$js = <<<JS
$(".hm-i-content").on("click",".ajaxaddToFavorite",function(){  
	//debugger;
	var id_v=jQuery(this).parents('.hm-i-p-list').find('.span-v').html();
	if(typeof(id_v)=="undefined"){
			id_v=-1;
	}
		var id=parseInt(id_v);
   //var id = jQuery(this).data("id");
    if(id==-1){
        var num = 0;
         $(this).parents(".hm-i-p-list").find(".hm-pro-attr").slideDown();
         $(this).parents(".hm-i-p-list").find("select").each(
        		function(){
                if(jQuery(this).val()==0 && num==0){
                    num = 1;
                    jQuery(this).focus();
                }
            }
        )
        if(num==0){
            layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
        }
    }else if(id==0){
        layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
    }else{
        param = {
            productId : id,
            number : 1,
            _csrf : product.csrf
        };
        loading = layer.msg('Adding', {icon: 16,shade: 0.01});
        $.post("{$urlFavoriteAdd}?id=" + id, param, function(data) {
            layer.close(loading);
            if (data.status > 0) {
                success=  layer.msg('Added to Wishlist', {icon: 1,shade: 0.01});   
                setTimeout(function(){
                    layer.close(success);
                }, 500);
            }else{
                //window.location.href="/site/login.html"; 
                layer.msg('Please login first', {icon: 7,shade: 0.01,time:700}); 
            }
        }, "json");
    }
  
});
$(".hm-index-container").on("click",".ajaxaddToCart",function(){  
		
   // var id = $(this).data('id');
 var id_v=jQuery(this).parents('.hm-i-p-list').find('.span-v').html();
	if(typeof(id_v)=="undefined"){
			id_v=-1;
	}
		var id=parseInt(id_v);
    if(id==-1){
        var num = 0;
        jQuery(this).parent().parent().parent().find("select").each(
            function(){
                if(jQuery(this).val()==0 && num==0){
                    num = 1;
                    jQuery(this).focus();
                }
            }
        );
    }else if(id==0){
        layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
    }else{
        param = {
            productId : id,
            number : 1,
            _csrf : product.csrf
        };
        loading=  layer.msg('Adding', {icon: 16,shade: 0.01});
        $.post("{$urlCartAdd}?id=" + id, param, function(data) {
            layer.close(loading);
            if (data.status > 0) {
                $(".addNumber").text(data.userCartSum);
                $(".monileAddNumber").text(data.userCartSum);
                success=  layer.msg('SUCCESS', {icon: 1,shade: 0.01});
                setTimeout(function(){
                    layer.close(success);
                }, 1000);
            } else {
                layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
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
$(document).on("click",".ajaxarrivenotic",function(){  
   // var id = $(this).data('id');
 var id_v=jQuery(this).parents('.hm-i-p-list').find('.span-v').html();
	if(typeof(id_v)=="undefined"){
			id_v=-1;
	}
		var id=parseInt(id_v);
    if(id==-1){
        var num = 0;
        jQuery(this).parent().parent().parent().find("select").each(
            function(){
                if(jQuery(this).val()==0 && num==0){
                    num = 1;
                    jQuery(this).focus();
                }
            }
        );
        if(num==0){
            layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
        }
    }else if(id==0){
        layer.msg('OUT OF STOCK', {icon: 7,shade: 0.01});
    }
    else{
        param = {
            productId : id,
            number : 1,
            _csrf : product.csrf
        };
        loading=  layer.msg('Adding', {icon: 16,shade: 0.01})
        $.post("{$urlCartAddarr}?productId=" + id, param, function(data) {
            layer.close(loading);
            if (data.status ==1) {
                success = layer.msg('SUCCESS', {icon: 1,shade: 0.01});
                setTimeout(function(){
                layer.close(success);
                }, 500);
            }else if(data.status ==2){
                success=  layer.msg('Already Add', {icon: 16,shade: 0.01});
                setTimeout(function(){
                    layer.close(success);
                }, 500);
            }else if(data.status ==3){
                success=  layer.msg('error', {icon: 7,shade: 0.01});
                setTimeout(function(){layer.close(success);}, 3000);
                // window.location.href="{$login}"
            }else {
                 layer.msg('Please Login', {icon: 7,shade: 0.01});
            }

        }, "json");
    }
});
JS;
$this->registerJs($js);
// $addtocartjs = ProductHtml::getIndexBuyJs();
// $this->registerJs($addtocartjs.$js);
