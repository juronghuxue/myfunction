<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = Yii::t('app', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
$public=Yii::getAlias('@public')

?>

<!--<div class="container">
	<ol class="breadcrumb">
	  <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
	
          <li class="active">Register</li>
	</ol>
</div>-->

<div style="background-color: #FFFFFF;padding-bottom: 65px;padding-top: 65px;">
<div class="container singup">
	<div class="row">
		<div class="col-lg-6 col-xs-12 col-sm-12 singup_img">
			<img src="<?php echo $public;?>/img/users/pic_bg_login1.png">
		</div>
        <?php if($type == 0):?>
			<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
				<div class="col-lg-6 col-xs-12 col-sm-12 singup_message" align="center">
					<div class="create_account">REGISTER</div>
					<div class="singup_top1">
						<div class="name" style="margin-left: 5px;">
							 <?= $form->field($model, 'firstname',['inputOptions' => ["placeholder"=>"First name *"]])->label("", ['label' => '',"class"=>""]) ?>
						</div>
						<div class="name" style="margin-left: 35px;">
						   <?= $form->field($model, 'lastname',['inputOptions' => ["placeholder"=>"Last name *"]])->label("", ['label' => '',"class"=>""]) ?>
						</div>
					</div>

					<div class="name">
						<?= $form->field($model, 'loginname',['inputOptions' => ["placeholder"=>"Login name *"]])->label("", ['label' => '',"class"=>""]) ?>
					</div>
					<div class="name">
						<?= $form->field($model, 'email',['inputOptions' => ["placeholder"=>"Email *"]])->label("", ['label' => '',"class"=>""]) ?>
					</div>
					<div class="name" style="position: relative;margin-top: 30px;">
						<?= $form->field($model, 'customer_type')->radioList(['0'=>'Business','1'=>'Personal'])->label("", ['label' => '',"class"=>""]) ?>
					</div>



					<div class="whosale">
						<div class="whosale_img">
							<img src="<?php echo $public;?>/img/users/pic_jiantou_register.png"></div>
						<div class="whosale_font">
							<div>With a Business account, you will enjoy wholesale price and service for each order.</div>
							<div>Please check if you can meet the following requirements before choosing</div>
							<div>Business account:</div>
							<div>1.MOQ for each order must over $300;</div>
							<div>2.Provide phone number or Skype ID so we can contact you timely.</div>
						</div>
					</div>
					<div class="vape_user">
						<div class="vape_img"><img src="<?php echo $public;?>/img/users/pic_jiantou_register.png"></div>
						<div class="vape_font">
							<div>With a Personal account, you will enjoy the following benefits:</div>
							<div>1.Free shipping for all orders;</div>
							<div>2.No MOQ for each order;</div>
							<div>3.100% Original products guarantee</div>
						</div>
					</div>
					<div  class="whsale_input">
						<div class="name whsale_input1" style="float: left;width: 125px;">
							<?= $form->field($model, 'phone_number',['inputOptions' => ["placeholder"=>"Phone number"]])->label("", ['label' => '',"class"=>""]) ?>
						</div>
						<div class="name whsale_input2" style="float: left;width: 130px;margin-left: 40px;">
							<?= $form->field($model, 'skype_id',['inputOptions' => ["placeholder"=>"Skype ID"]])->label("", ['label' => '',"class"=>""]) ?>
						</div>
					</div>
					<div class="msg" style="display: none;margin-bottom: -77px;color: #a94442">Please enter phone number or Skype ID.</div>
					<div class="name" style="width: 130px;margin-left: 40px;display: none">
						<?= $form->field($model, 'phonenum_skypeid',['inputOptions' => ["placeholder"=>"phonenum_skypeid"]])->label("", ['label' => '',"class"=>""]) ?>
					</div>

					<div id="user_country" style="margin-bottom: -15px;margin-top: 20px;">
						<input type="text" style="display: none" name="SignupForm[country]" id="signupform-country" value="0">
						<select class="name select-countrys" style="height: 42px;font-size: 14px !important;color: #a59999;">
							<option value="0">Select Country</option>
							<?php foreach ($country as $key =>$value):?>
							<option value="<?= $key?>"><?php echo $value;?></option>
							<?php endforeach;?>
						</select>
					</div>


					<div class="name" style="position: relative" id="user_password">
						 <?= $form->field($model, 'password',['inputOptions' => ['label' => '','class'=>"password","placeholder"=>"Password *"]])->passwordInput(['maxlength' => 20])->label("", ['label' => '',"class"=>""]) ?>
						<img class="password_img" style="position: absolute;top: 35px;left: 275px;cursor: pointer;" src="<?php echo $public;?>/img/pay_cart/eye.png">
					</div>
					<div class="name" style="position: relative">
						<?= $form->field($model, 'password2',['inputOptions' => ['label' => '','class'=>"confirm_password","placeholder"=>"Confirm password *"]])->passwordInput(['maxlength' => 20])->label("", ['label' => '',"class"=>""]) ?>
						<img class="confirm_img" style="position: absolute;top: 35px;left: 275px;cursor: pointer;" src="<?php echo $public;?>/img/pay_cart/eye.png">
					</div>
					<div class="agree" style="display: inline-block">
						<div style="float: left"><?= $form->field($model, 'check')->checkbox() ?></div>
			<!--				 <div class="agree_elego"><a href="#" target="_blank">&nbsp;Elegomall Terms</a></div>-->
					</div>
					<div class="button">
						<input type="submit" value="REGISTER" id="submit_sigup">
					</div>
					<div class="login">
						or <span><a href="<?php echo Yii::$app->urlManager->createUrl(['/site/login']) ?>">Log in</a></span>
					</div>
				</div>
        	<?php ActiveForm::end(); ?>
		<?php else:?>
				<div class="singup_sucees col-lg-6 col-xs-12 col-sm-12" style="font-size: 16px;line-height: 35px;
				border:1px solid #cacacc;box-shadow: 0px 3px 27px #cbcbcd;width: 400px;">
					<div class="create_account" style="font-size: 16px;font-weight: bold;color: #ee3e43;margin-top: 0px;width: 400px;margin-left: -15px;">REGISTER</div>
					<div style="margin-top:20px;border:1px solid #cbcbcd;height: 90px;width: 318px;padding-left: 20px;margin-left: 20px">
						<div style="float: left;margin-top: 23px;"><img src="<?php echo $public;?>/img/users/icon_notice_sucess.png"></div>
						<div style="float: left;margin-left: 10px;text-align: left;margin-top: 10px;">
							<div style="font-size: 24px;font-weight: bold;color: #404040;">Congratulations!</div>
							<div style="font-size: 14px;color: #808080;">You have created your own account.</div>
						</div>
					</div>
					<?php $form = ActiveForm::begin(['id' => 'form-signupsuccess']); ?>
					<div style="line-height: 20px;text-align: left;font-size: 14px;color: #404040;margin-top: 24px;margin-bottom: 20px;margin-left: 20px;">
						We have send an activation email to<br>
						<font style="color: #ee3e43" id="email_user" name="userEmail"><?php echo $model->email;?></font> please click the activation link to
						activate your account.
					</div>
					<div style="margin-bottom: 20px;display: inline-block;font-size: 2px;width: 400px;height: 1px;background: #e3e3e5;margin-left: -15px;"></div>
					<div style="margin-left: 20px;font-size: 14px;margin-top: -20px;"f>
						<div style="color: #404040">Haven't received the email?</div>
						<ul style="color: #999999;line-height: 25px;margin-left: 15px;">
							<li style="list-style-type: disc;">
								Your email account might blocked our email, please
								add our domain elegomall.com to white list.
							</li>
							<li style="list-style-type: disc;">
								Your email account might misjudged our email as
								spam, please try checking if the activation email is
								in your email spam folder.
							</li>
							<li style="list-style-type: disc;">
								Send a email to service@elegomall.com from your
								registration email and inform us that you haven't
								received the activation email.
							</li>
							<li style="list-style-type: disc;">
								Chat with our online service team for help.
							</li>
						</ul>
					</div>
					<div class="button" style="margin-left: 20px;margin-top: 15px;">
						<input class="email_again" type="button" value="Send Activation Email Again" style="background-color: #bfbfbf;border: 1px solid #bfbfbf;">
					</div>
					<?php ActiveForm::end(); ?>
					<!--<div>Success. Please activate your account.</div>
					<div>Click the activate button in the email we sent to</br>--><?php /*echo $model->email;*/?><!--</div>-->
				</div>
    <?php endif;?>
	</div>
</div>
</div>

<script>
	$(function(){
		var successUrl = "<?=Yii::$app->urlManager->createUrl(['site/sigupsuccess'])?>";
		var count=0;
		$(".email_again").click(function(){
			count++;
			var email=$("#email_user").html();
			//var password=$("#frontendloginfrom-password").val();
			param = {'userEmail':email,'count':count};
			$.post(successUrl, param, function(data) {
				if(data.status==0){
					layer.msg(data.msg, {icon: 1,shade: 0.01,time:2000});
				}else if(data.status==1){
					layer.msg(data.msg, {icon: 0,shade: 0.01,time:2000});
				}
			}, "json");
		});
	})

</script>

<style>
	.create_account{font-size: 16px;font-weight: bold;color: #ee3e43;border-bottom: 1px solid #e3e3e5;height: 35px;width: 360px;margin-left: -15px;}
	.singup_top1{display: inline-table;width: 360px;}
	.singup_top1 div{float: left;width: 129px;}
	.whosale{display: none;position: relative;margin-top: 40px;}
	.whosale_img{position: absolute;top: -15px;left: 70px;}
	.whosale_font{border-radius: 2px;width: 318px;border:1px solid #cacacc;
		padding-top: 14px;padding-left:10px;max-height: 86px;overflow: auto;text-align: left;font-size: 12px;color: #808080;}
	.vape_user{display: none;position: relative;margin-top: 40px;}
	.vape_img{position: relative;top: -15px;left: 85px;}
	.vape_font{margin-top: -20px;border-radius: 2px;width: 318px;border:1px solid #cacacc;
		padding-top: 14px;padding-left:10px;max-height: 86px;overflow: auto;text-align: left;font-size: 12px;color: #808080;}
	.whsale_input{display: inline-table;width: 318px;display: none;}
	.whsale_input1{}



	.help-block{margin-bottom: -18px !important;}
	.email_again:hover{background-color: #ee3e43;border:1px solid #ee3e43;}
	/*.singup{width: 1140px;height: auto;}*/
	.singup_img{margin-top: 50px;margin-bottom: 31px;margin-right: 110px;}
	.singup_message{width: 360px;
		height: auto;border:1px solid #e3e3e5;
		background-color: #FFFFFF;border-radius: 2px;margin-right: 99px;margin-bottom: 31px;box-shadow: 0px 3px 27px #cbcbcd;}
	.name input{width: 318px;height: 42px;font-size: 14px;color: #404040;font-family: regular;
		border-radius: 2px !important;border:1px solid #cacacc;}
	.name{border-radius: 2px;width: 318px;margin-bottom: 14px;}
	.name div input{font-size: 14px !important;color: #404040;}
	.name p{font-size: 13px;}

	::-webkit-input-placeholder { color:#A9A9A9; }
	::-moz-placeholder { color:#A9A9A9; } /* firefox 19+ */
	:-ms-input-placeholder { color:#A9A9A9; } /* ie */
	input:-moz-placeholder { color:#A9A9A9;}

	.agree{font-size: 14px;font-family: Arial;color: #404040;text-align: center;margin-top: 7px;margin-bottom: 10px;}
	.agree input{width: 15px;height: 15px;}
	.create_account{font-size: 16px;color: #ee3e43;font-weight: bold;font-family: Arial;text-align: center;
		margin-top: 20px;}
	.singup .button{background-color: #ee3e43;border-radius: 2px;width: 318px;margin-bottom: 21px;}
	.singup .button input{background-color: #ee3e43;border-radius: 2px;border: 1px solid #ee3e43;font-size: 16px;
		color: #FFFFFF;;font-weight: bold;font-family: Arial;}
	.login{font-size: 16px;text-align: center; height: 50px;}
	.login span a{color: #ee3e43}

	/*.agree_elego{float: left;margin-top: 10px;}*/
	.agree_elego a{color: #404040;text-decoration: underline;}

	@media (max-width: 768px){
		.singup_img{display: none}
		.singup_message{
			    width: 360px;
			    height: auto;
			    border: 1px solid #e3e3e5;
			    background-color: #FFFFFF;
			    border-radius: 2px;
			    margin-bottom: -20px;
			    margin-top: -20px;
			    box-shadow: 0px 3px 27px #cbcbcd;
		}
		#form-signup{
			width:360px;
			margin:0 auto;
		}
	}

	#signupform-firstname,#signupform-lastname,#signupform-phone_number,#signupform-skype_id{width: 155px;}
	/*.field-signupform-customer_type label{display: none}*/

	#signupform-customer_type{display: flex;/*height: 15px;*/ position: absolute;top: 5px;}
	#signupform-customer_type div{float: left;width: 160px;}
	#signupform-customer_type div:first-child {margin-top: -5px;}
	#signupform-customer_type div input{width: 15px;height: 15px;}
	.field-signupform-customer_type p{display: block;margin-bottom: -25px;}

	.field-signupform-email,.field-signupform-loginname{margin-top: -25px;}
	.field-signupform-loginname{margin-bottom: 20px;}
</style>
<script>
	window.onload = function(){
		var oInput = document.getElementById("signupform-firstname");
		oInput.focus();
	};

	$(".email_again").hover(function(){
		$(".email_again").css("background-color","#ee3e43");
		$(".email_again").css("border","1px solid #ee3e43");
	},function(){
		$(".email_again").css("background-color","#bfbfbf");
		$(".email_again").css("border","#bfbfbf");
	});

	//提交注册表单
	$("#submit_sigup").click(function () {
		var select_country= $(".select-countrys option:selected").val();
		$("#signupform-country").val(select_country);
		var num=$("#signupform-phone_number").val();
		var skype_id=$("#signupform-skype_id").val();
		var checked_type=$("#signupform-customer_type input[type='radio']:checked").val();
		/*如果客户类型是Wholesale*/
		if(checked_type==0){
			if(!num && !skype_id){
				$(".msg").show();
			}else{
				phonenum_skypeid=num+"  "+skype_id;
				$("#signupform-phonenum_skypeid").val(phonenum_skypeid);
			}
		}else{
			num=$("#signupform-phone_number").val(null);
			skype_id=$("#signupform-skype_id").val(null);
			phonenum_skypeid=num+"--"+skype_id;
			$("#signupform-phonenum_skypeid").val(phonenum_skypeid);
		}

	});
	/*end------------------------*/

	$("#signupform-customer_type div:first-child input").click(function () {
		$(".whosale").show();
		$(".whsale_input").show();
		$(".vape_user").hide();
		$(".password_img").css("top","40px");
		$("#user_password").css("margin-top","20%");
		$('#user_country').css("margin-bottom",'-80px');
	});

	$("#signupform-customer_type div:last-child input").click(function () {
		$(".msg").hide();
		$(".vape_user").show();
		$(".whosale").hide();
		$(".whsale_input").hide();
		$(".password_img").css("top","35px");
		$("#user_password").css("margin-top","0%");
		$('#user_country').css("margin-top",'10px');
		$('#user_country').css("margin-bottom",'-15px');
		//    margin-bottom: -15px;
		//alert("222");
	});

	jQuery(document).ready(function () {
		jQuery(".form-group .checkbox label").append('<a href="/help/60/privacy_policy.html" target="_blank" style="color: #404040;text-decoration: underline;">&nbsp;Elegomall Terms</a>');
		$(".password_img").click(function () {
			if($('.password').attr("type")=='password'){
				$('.password').attr("type","text");
				$('.password_img').attr("src",'<?php echo $public;?>/img/pay_cart/eye-hover.png');
			}else{
				$('.password').attr("type","password");
				$('.password_img').attr("src",'<?php echo $public;?>/img/pay_cart/eye.png');
			}
		});



		$(".confirm_img").click(function () {
			if($('.confirm_password').attr("type")=='password'){
				$('.confirm_password').attr("type","text");
				$('.confirm_img').attr("src",'<?php echo $public;?>/img/pay_cart/eye-hover.png');
			}else{
				$('.confirm_password').attr("type","password");
				$('.confirm_img').attr("src",'<?php echo $public;?>/img/pay_cart/eye.png');
			}
		});

	});
</script>
<!--<div class="breadcrumb-area">-->
<!--			<div class="container">-->
<!--				<ol class="breadcrumb">-->
<!--				  <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>-->
<!--				  <li class="active">Login</li>-->
<!--				</ol>-->
<!--			</div>-->
<!--		</div>-->
<!--		<!-- breadcrumb end -->
<!--		<!-- account area start -->
<!--		<div class="account-area pt-30 log">-->
<!--			<div class="container">-->
<!--				<div class="row">-->
<!--					<div class="col-md-6 col-lg-6 col-sm-6">-->
<!--						<div class="account-info pb-30">-->
<!--							<form action="#">-->
<!--								<div class="form-fields">-->
<!--									<h2>Login</h2>-->
<!--									<p>-->
<!--										<label>-->
<!--											Username or email address-->
<!--											<span class="required">*</span>-->
<!--										</label>-->
<!--										<input type="text">-->
<!--									</p>-->
<!--									<p>-->
<!--										<label>-->
<!--											Password-->
<!--											<span class="required">*</span>-->
<!--										</label>-->
<!--										<input type="password">-->
<!--									</p>-->
<!--								</div>-->
<!--								<div class="form-action">-->
<!--									<label>-->
<!--									<a href="#" class="lost_password">Lost your password?</a>-->
<!--										<input type="checkbox">-->
<!--										Remember me-->
<!--									</label>-->
<!--									<input value="Login" type="submit">-->
<!--								</div>-->
<!--							</form>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="col-md-6 col-lg-6 col-sm-6">-->
<!--						<div class="form-fields pb-30">-->
<!--							<h2>Register</h2>-->
<!--							<p>-->
<!--								<label>Email address  <span class="required">*</span></label>-->
<!--								<input type="text">-->
<!--							</p>-->
<!--							<p>-->
<!--								<label>Password <span class="required">*</span></label>-->
<!--								<input type="password">-->
<!--							</p>-->
<!--						</div>-->
<!--						<div class="form-action floatright">-->
<!--							<input value="Register" type="submit">-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->