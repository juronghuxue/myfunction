<?php
$public = Yii::getAlias('@public'); //exit;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<style>
	@media only screen and (min-width:769px ) {
		.h-mt-70{
			margin-top:70px;
		}
		#hm-brand-week-atom-lists a:nth-of-type(4){
			margin-right:0!important;
					}
		.l-f-mt {
    	margin-top:0px;
		}
		.hm-brand-week-product{
			background: url(/theme/new/img/brandweek/bg_02.jpg) no-repeat;
			width: 100%;
			height: 1187px;
		}
		.hm-brand-week-free{
			background: url(/theme/new/img/brandweek/bg_03.jpg) no-repeat;
			width: 100%;
			height:815px;
		}
		.hm-brand-week-product-content{
			width: 1140px;
			margin:0 auto;
			padding-top: 30px;
		}
		.hm-brand-week-vgod h3,.hm-brand-week-free-content>h3{
			text-align: center;
		}
		.hm-brand-week-vgod-lists{
			overflow: hidden;	
			width: 100%;
			padding-top:22px;
		}
		.hm-brand-week-vgod-lists a{
			float:left;
			display: block;
			/*margin-right:15px;*/
		}
		.hm-brand-week-vgod-lists a:nth-of-type(1){
			margin-right:24px;
		}
		.hm-brand-week-vgod-lists .hm-mr-18{
			margin-right:18px;
		}
		.hm-brand-week-vgod-list,.hm-brand-week-atom-list{
			position: relative;
		}
		
		.hm-brand-week-vgod-list img,.hm-brand-week-atom-list img{
			display: block;
		}
		.hm-brand-week-vgod-list span{
			position: absolute;
			top:184px;
			left:410px;
			font-size: 24px;
			font-weight: bold;
			color:#fe313d;
		}
		.hm-brand-week-atom-list span{
			position: absolute;
			top:320px;
			left:14px;
			font-size: 20px;
			font-weight: bold;
			color:#fe313d;
		}
		.hm-vgod-icon{
			margin-top:30px;
			text-align: center;
		}
		/*free trial*/
		.hm-brand-week-free-content{
			width:1140px;
			margin:0 auto;
			padding-top:35px;

		}
		.hm-brand-week-free-lists{
			margin-top:28px;
			overflow: hidden;
		}
		.hm-brand-week-free-listleft{
			float:left;
			width:562px;
			background: #fff;
			border-radius: 5px;
			position: relative;
			
		}
		.hm-brand-week-free-listleft>h4{
			height:54px;
			line-height: 68px;
			text-align: center;
			margin:0;padding:0;
			font-size: 30px;
			font-weight: bold;
			color:#666;
		}
		.hm-brand-week-free-lists ul{
			padding:14px 20px 0 20px;
		}
		.hm-brand-week-free-lists ul li{
			overflow: hidden;
			padding-bottom: 20px;
			border-bottom: 1px solid #ebebeb;
		}
		.hm-brand-week-free-lists ul li:nth-of-type(2){
			padding-top: 20px;
			border-bottom:none;
			margin-bottom: 20px;
		}
		.hm-brand-week-free-listimg,.hm-brand-week-free-listdec{
			float:left;
		}
		.hm-brand-week-free-listdec{
			margin-left:30px;
			
		}
		.hm-brand-week-free-listdec h4{
			font-size: 20px;
			font-weight: bold;
			color:#404040;
		}
		.hm-brand-week-free-listdec h3{
			font-size: 30px;
			font-weight: bold;
			color:#404040;
		}
		.hm-brand-week-free-listdec a{
			display: block;
			width:156px;
			height:30px;
			line-height: 30px;
			color:#fff;
			font-size: 16px;
			background: #1abc9c;
			border-radius: 2px;
			margin-top: 18px;
			padding-left:10px;
		}
		.hm-brand-week-foot{
			height:20px;
			background: #eceff1;
			border-bottom-right-radius: 5px;
			border-bottom-left-radius: 5px;
		}
	}
	@media only screen and (max-width:768px ) {
		.hm-brand-week-product{
			background:#e22b36;
			width: 100%;
			
		}
		.hm-brand-week-vgod{
			width:100%;
			height:auto;
			overflow: hidden;
		}
		.hm-brand-week-free{
			background:#fe3745;
			width: 100%;
		
		}
		.hm-brand-week-vgod h3{
			text-align: center;
		}
		.hm-brand-week-product-content{
			padding-top: 30px;
		}
		.hm-brand-week-vgod-lists{
			overflow: hidden;
		}
		.hm-brand-week-vgod-list{
			position: relative;
			
		}
		.hm-brand-week-vgod-list span{
			position: absolute;
			top:52%;
			left:73%;
			font-size: 24px;
			font-weight: bold;
			color:#fe313d;
		}
		.hm-brand-week-vgod-lists a{
			float:left;
			width: 100%;
			margin-top:20px;
		}
		.hm-vgod-icon{
			float: left;
			margin-top: 20px;
			margin-bottom: 50px;
			width: 100%;
    		text-align: center;
		}
		.hm-vgod-icon img{
			width:84%;
		}
		.hm-brand-week-atom-list{
			position: relative;
			width: 271px;
			height:341px;
			margin:0 auto;
		}
		.hm-brand-week-atom-list span{
			position: absolute;
			top:94%;
			left:5%;
			font-size: 20px;
			font-weight: bold;
			color:#fe313d;
		}
		#hm-brand-week-atom-lists{
			width: 100%;
		}
		
		/*free trial*/
		.hm-brand-week-free-content{
			width:100%;
			padding-top:35px;

		}
		.hm-brand-week-free-lists{
			margin-top:28px;
			overflow: hidden;
		}
		.hm-brand-week-free-content>h3{
			text-align: center;
		}
		.hm-brand-week-free-listleft{
			float:left;
			width:100%;
			background: #fff;
			border-radius: 5px;
			position: relative;
			margin-bottom: 20px;
			
		}
		.hm-brand-week-free-listleft>h4{
			height:50px;
			line-height: 62px;
			text-align: center;
			margin:0;padding:0;
			font-size: 30px;
			font-weight: bold;
			color:#666;
		}
		.hm-brand-week-free-lists ul{
			padding:14px 20px 0 20px;
		}
		.hm-brand-week-free-lists ul li{
			overflow: hidden;
			padding-bottom: 20px;
			border-bottom: 1px solid #ebebeb;
		}
		.hm-brand-week-free-lists ul li:nth-of-type(2){
			padding-top: 20px;
			border-bottom:none;
			margin-bottom: 20px;
		}
		.hm-brand-week-free-listimg,.hm-brand-week-free-listdec{
			float:left;
			width: 100%;
			text-align: center;
		}
		.hm-brand-week-free-listdec{
			margin-top:16px;
		}
		.hm-brand-week-free-listdec h4{
			font-size: 20px;
			font-weight: bold;
			color:#404040;
		}
		.hm-brand-week-free-listdec h3{
			font-size: 30px;
			font-weight: bold;
			color:#404040;
		}
		.hm-brand-week-free-listdec a{
			display: block;
			width:65%;
			height:30px;
			line-height: 30px;
			color:#fff;
			font-size: 16px;
			background: #1abc9c;
			border-radius: 2px;
			padding-left:10px;
			margin:18px auto;
		}
		.hm-brand-week-foot{
			height:20px;
			background: #eceff1;
			border-bottom-right-radius: 5px;
			border-bottom-left-radius: 5px;
		}
		.hm-free-act{
			margin-left:0!important;
			width:100%!important;
			height: auto!important;
		}
	}
	
</style>
<!--顶部广告-->
<div class="hm-brand-week-ad">
	<img src="<?php echo $public;?>/img/brandweek/bg_01.jpg"/>
</div>
<!--产品栏-->
<div class="hm-brand-week-product">
	<div class="hm-brand-week-product-content">
		<!--vgod-->
		<div class="hm-brand-week-vgod">
			<h3>
				<img src="<?php echo $public;?>/img/brandweek/pic_tittle_vgod.png"/>
			</h3>
			 
			<div class="hm-brand-week-vgod-lists">

				 <?php //foreach([501204,500202] as $sku){
                $img = ['/img/brandweek/pic_vgod_1.png','/img/brandweek/pic_vgod_2.png'];
                $url = ['https://www.elegomall.com/product/vgod-pro-mech-mod.html','https://www.elegomall.com/product/vgod-pro-drip-rda.html'];
                $i = 0;
                foreach(["500202","501204"] as $sku){
                $products = \common\models\Product::find()->andWhere(['sku'=>$sku])->one();
                if(!$products) continue;
                $user =  \common\models\User::find()->where(['id'=>Yii::$app->user->id])->one();
                $custom_group = $user?$user->user_group:0;
                if($products->subProduct){
                    $id = $products->subProduct[0]->product_id;
                    $products = Product::findOne($id);
                }        
                $productPrice = \common\models\ProductPrice::getFinalPrice($custom_group,1,$products->id);
                if(!$productPrice) $productPrice['price'] = $products->price;
                ?>


				<a href="<?=$url[$i]?>">
					<div class="hm-brand-week-vgod-list">
					<img src="<?php echo $public.$img[$i];?>" />
						<span>$<?= $productPrice['price']?></span>
					</div>
				</a>
            <?php $i++;}?>
				
			</div>
			<div class="hm-vgod-icon">
				<a href="https://www.elegomall.com/brands/vgod.html">
					<img src="<?php echo $public;?>/img/brandweek/btn_view_all_vgod.png"/>
				</a>
			</div>
		</div>
		<!--atom-->
		<div class="hm-brand-week-vgod h-mt-70">
			<h3>
				<img src="<?php echo $public;?>/img/brandweek/pic_tittle_atom.png"/>
			</h3>
			<div class="hm-brand-week-vgod-lists" id="hm-brand-week-atom-lists">
				 <?php //foreach([231501,231601,231404,231301] as $sku){
                $img = ['/img/brandweek/pic_atom_1.png','/img/brandweek/pic_atom_2.png','/img/brandweek/pic_atom_3.png','/img/brandweek/pic_atom_4.png'];
                $url = ['https://www.elegomall.com/product/atom-metropolis-tank.html','https://www.elegomall.com/product/atom-revolver-reloaded-2-mech-mod-kit.html','https://www.elegomall.com/product/atom-vbox-v-75-tc-kit.html','https://www.elegomall.com/product/atom-apocalypse-rdta-atomizer.html'];
                $i = 0;
                foreach(['231501','231601','231401','231301'] as $sku){
                $products = \common\models\Product::find()->andWhere(['sku'=>$sku])->one();
                if(!$products) continue;
                $user =  \common\models\User::find()->where(['id'=>Yii::$app->user->id])->one();
                $custom_group = $user?$user->user_group:0;
                if($products->subProduct){
                    $id = $products->subProduct[0]->product_id;
                    $products = Product::findOne($id);
                }        
                $productPrice = \common\models\ProductPrice::getFinalPrice($custom_group,1,$products->id);
                if(!$productPrice) $productPrice['price'] = $products->price;
                ?>


				<a href="<?=$url[$i]?>" style="margin-right:18px;">
					<div class="hm-brand-week-atom-list">
						<img src="<?php echo $public.$img[$i];?>" />
						<span>$<?= $productPrice['price']?></span>
					</div>
				</a>
            <?php $i++;}?>    
		
			</div>
			<div class="hm-vgod-icon">
				<a href="https://www.elegomall.com/brands/atom.html">
					<img src="<?php echo $public;?>/img/brandweek/btn_view_atom.png"/>
				</a>
			</div>
		</div>
	</div>
</div>
<!--free trial-->
<div class="hm-brand-week-free">
	<div class="hm-brand-week-free-content">
		<h3>
			<img src="<?php echo $public;?>/img/brandweek/pic_tittle_free_trial.png"/>
		</h3>
		<div class="hm-brand-week-free-lists">
			<div class="hm-brand-week-free-listleft">
				<h4>
					PRIZES
				</h4>
				<div>
					<img src="<?php echo $public;?>/img/brandweek/pic_line_prizes.png"/>
				</div>
				<ul>
					<li>
						<div class="hm-brand-week-free-listimg">
							<img src="<?php echo $public;?>/img/brandweek/pic_prizes_1.png"/>
						</div>
						<div class="hm-brand-week-free-listdec">
							<h4>VGOD ELITE MECH MOD</h4>
							<h3>X2</h3>
							<a href="https://www.elegomall.com/product/vgod-elite-series-mech-mod.html" class="hm-brand-week-free-icon">
								<div>
									LEARN MORE<img style="margin-left:14px;margin-top:-4px" src="<?php echo $public;?>/img/brandweek/icon_jiantou.png"/>
								</div>
								
							</a>
						</div>
					</li>
					<li>
						<div class="hm-brand-week-free-listimg">
							<img src="<?php echo $public;?>/img/brandweek/pic_prizes_2.png"/>
						</div>
						<div class="hm-brand-week-free-listdec">
							<h4>ATOM-YAKUZA 70W</h4>
							<h3>X4</h3>
							<a href="https://www.elegomall.com/product/atom-yakuza-70w-tc-kit.html" class="hm-brand-week-free-icon">
								<div>
									LEARN MORE<img style="margin-left:14px;margin-top:-4px" src="<?php echo $public;?>/img/brandweek/icon_jiantou.png"/>
								</div>
								
							</a>
						</div>
					</li>
				</ul>
				<div class="hm-brand-week-foot"></div>
				<div style="position: absolute;right:-13px;top:234px">
					<img src="<?php echo $public;?>/img/brandweek/pic_sjx.png"/>
				</div>
			</div>
			<div class="hm-free-act" style="width:543px;height:553px;overflow-y:auto;border:1px solid #ccc;background:#fff;float: left;margin-left: 20px;">
				<a class="e-widget no-button" href="https://gleam.io/1b77x/vgod-atom-brand-week-give-away" rel="nofollow">VGOD &amp; ATOM Brand Week Give Away</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="https://js.gleam.io/e.js" async="true"></script>

 <!--liuhongmei===================首页遮罩层======================-->
        <div class="l-tip-cover-2" style="display:block;z-index: 7777;">

        </div>
        <!--liuhongmei===================活动过期提醒开始======================-->
        <div class="l-year-alert-tip-2" style="display:block;height: 200px;z-index: 7778;">
            <div>
                <img src="<?php echo $public ?>/img/index/tip-header.png" alt="消息头部图片"/>
            </div>
            <div class="l-year-alert-content" style="padding:10px;">
                <h4></h4>
                <p style="text-align: center;">The activity has expired!</p>
            </div>
            
            <div class="l-year-alert-footer" style="background:#fff;">
                <a href="/" style="width: 200px;height: 30px;background:#ee3e43;display: block;color: #fff;line-height: 30px;text-align: center;border-radius: 3px;margin: 0 auto;"> Home Page</a>
            </div>
        </div>
       
        <!--liuhongmei===================活动过期提醒开始======================-->


