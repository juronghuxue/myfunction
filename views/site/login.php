<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
$public=Yii::getAlias('@public');
?>
<!--<div class="container">
	<ol class="breadcrumb">
	  <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
	
          <li class="active">Login</li>
	</ol>
</div>-->
<div style="background-color: #fff;padding-top: 65px;padding-bottom: 65px;">
<div class="container singup">
	<div class="row">
		<div class="col-lg-6 col-xs-12 col-sm-12 singup_img">
			<img src="<?php echo $public;?>/img/users/pic_bg_login1.png">
		</div>
		<div class="col-lg-6 col-xs-12 col-sm-12 singup_message" align="center">
<!--			<div class="create_account">Welcome to Elegomall</div>-->
			<div class="create_account" style="font-size: 16px;font-weight: bold;color: #ee3e43">LOGIN</div>
			 <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
				<div class="name" style="position: relative;">
					<?= $form->field($model, 'email',['inputOptions' => ["placeholder"=>"Email *"]])->label("", ['label' => '',"class"=>""]) ?>
					<div align="center" style="position: absolute;top: 21px;left: 0px;border-right: 1px solid #cacacc;width: 40px;height: 40px;padding-top: 8px;">
						<img class="email_img"  src="<?php echo $public;?>/img/users/icon_email_login.png">
					</div>
				</div>
				<div class="name" style="position: relative">
					<?= $form->field($model, 'password',['inputOptions' => ['label' => '','class'=>"password","placeholder"=>"Password *"]])->passwordInput()->label("", ['label' => '',"class"=>""]) ?>
					<img class="password_img" style="position: absolute;top: 35px;left: 275px;cursor: pointer;" src="<?php echo $public;?>/img/pay_cart/eye.png">
					<div align="center" style="position: absolute;top: 21px;left: 0px;border-right: 1px solid #cacacc;width: 40px;height: 40px;padding-top: 8px;">
						<img class="email_img"  src="<?php echo $public;?>/img/users/icon_password_logoin.png">
					</div>
				</div>

				<div style="text-align: right;margin-bottom: 15px;">
					<a href="<?php echo Yii::$app->urlManager->createUrl(['site/request-password-reset']); ?>" style="font-size: 14px;font-family: Arial;color: #404040;">Forgot your password ?</a></div>
				<div class="button">
					<input type="button" value="LOGIN" class="login_us">
				</div>
			<?php ActiveForm::end(); ?>
			<div class="login">
				or <span><a href="<?php echo Yii::$app->urlManager->createUrl(['/site/signup']) ?>">Create an account</a></span>
			</div>

		</div>
	</div>
</div>
</div>
<script>
	$(function(){
		var loginUrl = "<?=Yii::$app->urlManager->createUrl(['site/login'])?>";
		$(".login_us").click(function(){
			$(".login_us").attr("class","login_us_two");
			var email=$("#frontendloginfrom-email").val();
			var password=$("#frontendloginfrom-password").val();
			
			param = {'FrontendLoginFrom[email]':email,'FrontendLoginFrom[password]':password};
			$.post(loginUrl, param, function(data) {
				console.log(data);
				if(data.state==1){
					layer.msg("Log in success.", {icon: 1,shade: 0.01,time:2000});
					setTimeout(function(){
						window.location.href = data.url;
					},1000);
				}else if(data.state==0){
					layer.msg(data.msg, {icon: 0,shade: 0.01,time:3000});
					/*setTimeout(function () {
						location.reload();
					},3000)*/
				}else {
					layer.msg("error", {icon: 0,shade: 0.01,time:3000});
					location.reload();
				}
			}, "json");
		});
	})

</script>
<style>
	input:-webkit-autofill {
		-webkit-box-shadow: 0 0 0px 1000px white inset !important;
		border: 1px solid #CCC!important;
	}
	/*.singup{width: 1140px;height: 531px;}*/
	.singup_img{margin-top: 50px;margin-bottom: 31px;margin-right: 110px;}
	.singup_message{width: 360px; text-align:  left;
		height: 415px;border:1px solid #e3e3e5;
		background-color: #FFFFFF;border-radius: 2px;margin-right: 99px;margin-bottom: 31px;margin-top: 45px;    box-shadow: 0px 3px 27px #cbcbcd;}
	.name input{width: 318px;height: 42px;font-size: 14px;color: #404040;font-family: regular;
		border-radius: 2px;border:1px solid #cacacc;}
	.name{border-radius: 2px;width: 318px;margin-bottom: 14px;}
	.agree{font-size: 14px;font-family: Arial;color: #404040;text-align: center;}
	.name input{font-size: 14px !important;}
	.agree input{width: 15px;height: 15px;}
	.create_account{font-size: 16px;color: #404040;font-weight: bold;font-family: Arial;text-align: center;
		margin-top: 20px;margin-bottom: 14px;border-bottom: 1px solid #e3e3e5;height: 35px;width: 360px;margin-left: -15px;}
	.singup .button{background-color: #ee3e43;border-radius: 2px;width: 318px;margin-bottom: 21px;}
	.singup .button input{background-color: #ee3e43;border-radius: 2px;border: 1px solid #ee3e43;font-size: 16px;
		color: #FFFFFF;;font-weight: bold;font-family: Arial;}
	.login{font-size: 16px;text-align: center;}
	.login span a{color: #ee3e43}

	@media (max-width: 768px){
		.singup_img{display: none}
		.singup_message {
			width:360px;
		    height: 415px;
		    border: 1px solid #e3e3e5;
		    background-color: #FFFFFF;
		    border-radius: 2px;
		    margin-top: -20px;
		    margin-bottom: -20px;
		    box-shadow: 0px 3px 27px #cbcbcd;
		}
		.name input {
		    height: 42px;
		    font-size: 14px;
		    color: #404040;
		    font-family: regular;
		    border-radius: 2px;
		    border: 1px solid #cacacc;
		}
		.singup{
			width:360px;
			margin:0 auto;
		}
	}

	#frontendloginfrom-email,#frontendloginfrom-password{padding-left: 50px;}
</style>
<script>
	/*window.onload = function(){
		var oInput = document.getElementById("strName");
		oInput.focus();
	}*/

	jQuery(document).ready(function () {

		$(".password_img").click(function () {
			if($('.password').attr("type")=='password'){
				$('.password').attr("type","text");
				$('.password_img').attr("src",'<?php echo $public;?>/img/pay_cart/eye-hover.png');
			}else{
				$('.password').attr("type","password");
				$('.password_img').attr("src",'<?php echo $public;?>/img/pay_cart/eye.png');
			}
		});

	});
</script>



<!--<div class="breadcrumb-area">-->
<!--			<div class="container">-->
	<!--				<ol class="breadcrumb">-->
	<!--				  <li><a href="/"><i class="fa fa-home"></i> Home</a></li>-->
	<!--				  <li class="active">Account</li>-->
	<!--				</ol>			-->
	<!--			</div>-->
<!--		</div>-->
<!--		<!-- breadcrumb end -->
<!--		<!-- account area start -->
<!--		<div class="account-area pt-30 log pb-100">-->
<!--			<div class="container">-->
<!--				<div class="row">-->
<!--					<div class="col-md-6 col-lg-6 col-sm-6">-->
<!--						<div class="account-info pb-30">-->
<!--							  --><?php //$form = ActiveForm::begin(['id' => 'login-form']); ?>
<!--								<div class="form-fields">-->
<!--									<h2>Login</h2>-->
<!--									<p>-->
<!--										-->
<!--										  -->

<!--//= $form->field($model, 'email')-->

<!--									</p>-->
<!--									<p>-->
<!--										-->
<!--										   -->
<!--//= $form->field($model, 'password')->passwordInput()-->

<!--									</p>-->
<!--                                                                        <p>-->
<!--                                                                            <div style="color:#999;margin:1em 0">-->
<!--                    If you forgot your password you can --><?//= Html::a("Reset It", ['site/request-password-reset']) ?><!--.-->
<!--                </div>-->
<!--                                                                        </p>-->
<!--								</div>-->
<!--								<div class="form-action">-->
<!--															-->
<!--									<input value="Login" type="submit">-->
<!--								</div>								-->
<!--							  --><?php //ActiveForm::end(); ?>
<!--						</div>-->
<!--					</div>-->
<!--					<div class="col-md-6 col-lg-6 col-sm-6">-->
<!--                                            --><?php //$form = ActiveForm::begin(['id' => 'form-signup']); ?>
<!--						<div class="form-fields pb-30">-->
<!--							<h2>Register</h2>-->
<!--                                                        <p>-->
<!--                                                          -->
<!--//= $form->field($modelsingup, 'firstname') -->
<!--							</p>-->
<!--                                                         <p>-->
<!--                                                           -->
<!--//= $form->field($modelsingup, 'lastname') -->
<!--							</p>-->
<!--								-->
<!--								 -->
<!--//= $form->field($modelsingup, 'email') -->
<!--							</p>-->
<!--							<p>-->
<!--								-->
<!--							  -->
<!--//= $form->field($modelsingup, 'password')->passwordInput() -->
<!--							</p>-->
<!--						</div>-->
<!--						<div class="form-action floatright">-->
<!--							<input value="Register" type="submit">-->
<!--						</div>-->
<!--                                             --><?php //ActiveForm::end(); ?>
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->