<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Profile;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
$this->title = Yii::t('app', 'My Profile');
$this->params['breadcrumbs'][] = $this->title;
$public=Yii::getAlias('@public');
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    .form button.btn {
        width: 108px;
        height: 38px;
    }
    #pic{
        width:100px;
        height:100px;
        border-radius:50% ;
        margin:20px auto;
        cursor: pointer;
        vertical-align: middle;
    }
</style>
<style>
    .main{width: 100%;border:1px solid #e3e3e5;background-color: #FFFFFF;padding-left: 20px;padding-right: 20px;overflow:auto;}
    /*.top{display: inline-block; margin-top: 5px;padding-top: 10px;padding-bottom: 10px;margin-bottom: -20px;}*/
    /*.top div{float: left}*/
    .lin{display: inline-block;width: 810px;height: 2px;background-color: #ee3e43}
    .font{font-size: 16px;font-weight: bold;}
    .account{height: 50px;display: inline-block;color: #666;margin-top: 5px;}
    .account div{float: left;margin-bottom: 15px;}
    .account .img_div{float: left;margin-bottom: 15px;width:200px;height: 43px;font-size:14px;margin-left: 10px;padding: 4px;border: 1px solid #ffbdbe;background: #ffebeb;color: #DA3A4C;display: none;}
    .account_t{display: inline-block;color: #666;margin-top: 5px;}
    .account_t div{float: left;height: 34px;margin-bottom: 15px;}
    .account_t{display:none}
        
    .account_t .img_div{float: left;margin-bottom: 15px;width:215px;height: 43px;font-size:14px;margin-left: 10px;padding: 4px;border: 1px solid #ffbdbe;background: #ffebeb;color: #DA3A4C;display: none;}

    .inptt{width:271px;height: 34px;background-color: #FFFFFF;}
    .img_succed img{display: none; width: 18px; height: 18px;}
    .img_succed img{margin-top: 10px;margin-left: 7px;}
    .ad_1{font-size: 16px;display: grid;margin-left: 7%;margin-top: 26px;}
    .account .ac_t,.account_t{padding-top: 10px;width:27%;font-size:14px;}
    .save_btt{width: 166px;height: 34px;background-color: #ee3e43;border: 1px solid #ee3e43;border-radius: 2px;}
    #ui-datepicker-div{background:#ffffff;}
    .ui-datepicker-header.ui-widget-header.ui-helper-clearfix.ui-corner-all{background:#ee3e43;}
    .ui-datepicker-prev.ui-corner-all,.ui-datepicker-next.ui-corner-all{background:#ffffff;}
    select{padding:0;background:#ffffff;}
</style>

    <!-- <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?> -->
<!-- <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 main"> -->

    <div style="width:100%;background:#ffffff;height:58px;">
        <div class="top" style="width:95%;height:56px;margin:0 auto;line-height:56px;font-size:14px;font-weight:bold;color:#404040;border-bottom:2px solid red;">
            <!-- <div class="img_1"> --><img src="<?php echo $public;?>/img/my_account/zhanghu.png">&nbsp;&nbsp;&nbsp;
            <!-- <div class="font" style="margin-left: 10px;"> -->Edit Account Information<!-- </div> -->
        </div>
    </div>
<div class="main">    
    <!-- <div class="lin"></div> -->
    <div class="clearfix" style="min-width:800px;width:100%;background:#ffffff;">
        <div class="ad_1" >
        <div style="color: #ee3e43;font-weight: bold;margin-bottom: 12px;font-size:16px;">Account Information</div>
        
        <div class="account">
            <div class="ac_t">First Name:</div>
            <div class="inptt"><input name="firstName" type="text" value="<?=Yii::$app->user->identity->firstname?>"></div>
            <div class="img_succed"><img src="<?php echo $public;?>/img/pay_cart/icon_done.png"></div>
            <div class="img_div">
                First name should contain at least 2 characters
            </div>
        </div>
        <div class="account">
            <div class="ac_t">Last Name:</div>
            <div class="inptt" style=""><input name="lastName" type="text" value="<?=Yii::$app->user->identity->lastname?>"></div>
             <div class="img_succed"><img src="<?php echo $public;?>/img/pay_cart/icon_done.png"></div>
            <div class="img_div">
                Last name should contain at least 2 characters.
            </div>
        </div>

            <?php //var_dump($model);?>
        <div class="account">
            <div class="ac_t">Login Name:</div>
            <div class="inptt" style=""><input name="loginName" type="text" value="<?= $model['loginname']?>"></div>
            <div class="img_succed"><img src="<?php echo $public;?>/img/pay_cart/icon_done.png"></div>
            <div class="img_div">
                Login name should contain at least 2 characters.
            </div>
        </div>

        <div class="account">
            <div class="ac_t">Email Address:</div>
            <div class="inptt" style=""><input name="email" type="text" disabled="disabled" value="<?=Yii::$app->user->identity->email?>"></div>
            <!--<div class="img_div">
                    Please enter current password.
                </div> -->
        </div>
        <div class="account">
            <div class="ac_t">Phone:</div>
            <div class="inptt" style=""><input name="phone" type="text"  value="<?=$model['phone']?>"></div>
           <!--<div class="img_div">
                Please enter new password
            </div> -->
        </div>
        <div class="account">
            <div class="ac_t">Gender:</div>
            <div style="margin-top: 10px;" class="img_slec">
                <img data-val="0" <?php if($model->sex == 0)echo "check='1'";?> src="<?php echo $public;?>/img/my_account/button<?php if($model->sex!=0)echo "-1";?>.png"><span>Secrecy</span>
            </div>
            <div style="margin-top: 10px;margin-left:20px;" class="img_slec">
                <img data-val="1" <?php if($model->sex == 1)echo "check='1'";?> src="<?php echo $public;?>/img/my_account/button<?php if($model->sex!=1)echo "-1";?>.png"><span>  Male</span>
            </div>
            <div style="margin-top: 10px;margin-left:20px;" class="img_slec">
                <img data-val="2" <?php if($model->sex == 2)echo "check='1'";?> src="<?php echo $public;?>/img/my_account/button<?php if($model->sex!=2)echo "-1";?>.png"><span>  Female</span>
            </div>
            <?= Html::hiddenInput('sex','1', ['id' =>'sex']) ?>
            <!--<?php if($model->sex==2):?>
                <div style="margin-top: 10px;"><img data-val="1" class="img_slec" src="<?php echo $public;?>/img/my_account/button-1.png"><span>  Male</span></div>
                <div style="margin-top: 10px;margin-left:20px;"><img data-val="2" class="img_slec" src="<?php echo $public;?>/img/my_account/button.png"><span>  Female</span></div>
                <?= Html::hiddenInput('sex','2', ['id' =>'sex']) ?>
            <?php else:?>
                <div style="margin-top: 10px;"><img data-val="1" class="img_slec" src="<?php echo $public;?>/img/my_account/button.png"><span>  Male</span></div>
                <div style="margin-top: 10px;margin-left:20px;"><img data-val="2" class="img_slec" src="<?php echo $public;?>/img/my_account/button-1.png"><span>  Female</span></div>
                <?= Html::hiddenInput('sex','1', ['id' =>'sex']) ?>
            <?php endif;?>-->
        </div>

        <div class="account">
            <div class="ac_t">Birthday:</div>
            <div class="inptt" style=""><input  name="birthday" value="<?= $model->birthday?>" id="birthdaySelect"></div><!-- huxu <?=$model->birthday?>-->
            <div class="img_div"><img src="<?php echo $public;?>/img/pay_cart/icon_done.png"></div>
        </div>

        <div class="account">
            <div class="ac_t">Country:</div>
            <div class="inptt" style="">

                <select id="country" name="country" data-code="<?=$model->country?>" class="select_country" style="width:271px;height:40px;background-color: #ffffff;border:1px solid #A9A9A9;color: #666;" value="">
                    <?php if(!empty($model->country)):?>
                        <option value="<?=$model->country?>"><?=$country[$model->country]?></option>
                    <?php else:?>
                        <option value="">--Please select--</option>
                    <?php endif;?>

                </select>
                <ul class="country-select-1" style="width:271px;height:200px;border:1px solid #A9A9A9;border-top:none;z-index:99;position:relative;background:#ffffff;display:none;overflow-y: auto;">
                    <li style="width:100%;height:30px;line-height:30px;font-size:14px;border-bottom:1px solid #A9A9A9;padding-left:10px;cursor:pointer;">--Please select--</li>
                    <?php foreach($country as $key => $value):?>
                    <li style="width:100%;height:30px;line-height:30px;font-size:14px;border-bottom:1px solid #A9A9A9;padding-left:10px;cursor:pointer;" data-code="<?=$key?>"><?= $value?></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="img_div"><img src="<?php echo $public;?>/img/pay_cart/icon_done.png"></div>
        </div>
        <div class="account" style="padding-top: 10px;">
            <div><img class="sle_password" src="<?php echo $public;?>/img/my_account/weigouxuan.png">
                <span style="display: inline-block;margin-left: 13px;">Change Password</span>
                
            </div>
        </div>
        <div class="account_t" style="width: 700px;margin-bottom: -20px;display: none;">
            <div class="ac_t">Current Password:</div>
            <div class="inptt" style="margin-left: 11.3%;"><?= Html::activePasswordInput($changePasswordModel, 'oldpassword', ['class' => 'txt','maxlength'=>16]) ?></div>
            <div class="img_succed"><img id="current_sucimg" src="<?php echo $public;?>/img/pay_cart/icon_done.png"></div>
            <div class="img_div" id="current_password">
                Please enter current password.
            </div>
            <?= Html::hiddenInput('isChangePassword','0', ['id' =>'isChangePassword']) ?>
        </div>
        <div class="account_t" style="width: 100%;/* margin-bottom: 10px; */display: none;margin-top: 25px;margin-bottom: -50px;">
            <div class="ac_t">New Password:</div>
            <div class="inptt" style="margin-left: 13%;"><?= Html::activePasswordInput($changePasswordModel, 'password', ['class' => 'txt','maxlength'=>16]) ?></div>
            <div class="img_succed"><img id="new_sucimg" src="<?php echo $public;?>/img/pay_cart/icon_done.png"></div>
            <div class="img_div">
               Please enter new password
            </div>
        </div>
        <div class="account_t" style="width: 100%;display: none;margin-top: 50px;">
            <div class="ac_t">Confirm New Password:</div>
            <div class="inptt" style="margin-left: 5.6%;"><?= Html::activePasswordInput($changePasswordModel, 'repassword', ['class' => 'txt','maxlength'=>16]) ?></div>
            <div class="img_succed"><img id="confirm_sucimg" src="<?php echo $public;?>/img/pay_cart/icon_done.png"></div>
            <div class="img_div confirm_password">
                Please confirm your password.
            </div>
        </div>
    </div>
    </div>
    
    <div class="save" align="center" style="padding-top: 20px;padding-bottom: 30px;background:#ffffff;">
        <button style="color: #FFFFFF;font-size: 16px;padding-right: 10px;" class="save_btt" type="button">Save</button>
    </div>
</div>
   <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 

    <script>
        jQuery(document).ready(function () {
            var emailUrl = '<?=Yii::$app->urlManager->createUrl(['user/email'])?>';
            var oldpasswordUrl = '<?=Yii::$app->urlManager->createUrl(['user/password'])?>';
            var userUrl = '<?=Yii::$app->urlManager->createUrl(['user/update'])?>';
            var csrf = '<?=Yii::$app->request->getCsrfToken()?>';
            //单选
            $('.img_slec').click(function () {
                /*var img_src=$(this).attr('src');
                if(img_src=="<?php echo $public;?>/img/my_account/button-1.png"){
                    $(".img_slec").parent().find(".img_slec").attr("src","<?php echo $public;?>/img/my_account/button-1.png");
                    $(this).attr('src',"<?php echo $public;?>/img/my_account/button.png");
                    $("#sex").val($(this).data('val'));
                }
*/
                var checkedSrc = "<?php echo $public;?>/img/my_account/button.png";
                var noCheckSrc = "<?php echo $public;?>/img/my_account/button-1.png";

                $(".img_slec>img").prop("src", noCheckSrc);
                $(".img_slec>img").removeAttr("check");

                var img = $(this).children("img");
                img.prop("src", checkedSrc);
                img.attr("check", 1);
                $("#sex").val(img.data('val'));
            });

            //日期配置
            var date = new Date();
            var year = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            console.log(year,m,d);
            //$('#birthdaySelect').val(year+'-'+m+'-'+d);
            $('#birthdaySelect').datepicker({
                dateFormat: 'yy-mm-dd',
                changeYear: true,
                dayNamesShort:['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                yearRange:'1970:2007',
                defaultDate:'+'+year+'+'+m+'+'+d
            });
            
            $('input').focus(function(){
                $(this).css('autoComplete','off');
            });
            $('#country').on('click',function(e){
                if($('.country-select-1').is(':hidden')){
                    $('.country-select-1').slideDown(200);
                }else{
                    $('.country-select-1').slideUp(200);
                }
                e.stopPropagation();
                e.cancelBubble = true;
            });
            $('.country-select-1').on('click','li',function(e){
                var _text = $(this).text();
                var data_code = $(this).attr('data-code');
                $('#country>option').val(data_code).text(_text);
                $('.country-select-1').slideUp(200);
                e.stopPropagation();
                e.cancelBubble = true;
                
            });
            $(document).click(function(){
                $('.country-select-1').slideUp(200);
            });
           /*// console.log(jQuery('#birthdaySelect'));
            //输入框后面图片的显示和隐藏
            // $(".inptt").click(function(){
            //     $(this).children().bind("change",function () {
            //         $(this).parent().next().css("display","block");
            //         if($(this).val().length==0){
            //             $(this).parent().next().css("display","none");
            //         }
            //     })
            // });

            // $(".inptt input").focus(function(){
            //     $(this).parent().parent().find('.img_div img').css("display","none");
            // });
            // $(".inptt input").blur(function(){
            //     if($(this).val()==''){
            //         $(this).parent().parent().find('.img_div img').attr('src',"<?php echo $public;?>/img/pay_cart/icon_faild.png");
            //         $(this).parent().parent().find('.img_div img').css("display","block");
            //     }else{
            //         $(this).parent().parent().find('.img_div img').attr('src',"<?php echo $public;?>/img/pay_cart/icon_done.png");
            //         $(this).parent().parent().find('.img_div img').css("display","block");
            //     }
                
            // });*/
            $("input[name='firstName']").focus(function(){
                $(this).parent().parent().find('.img_div ').fadeOut(500);
            })
            $("input[name='firstName']").blur(function(){
                var firstName = $(this).val();
                if(firstName=='' || firstName.length<2){
                    // $(this).parent().parent().find('.img_div ').attr('src',"<?php echo $public;?>/img/pay_cart/icon_faild.png");
                    $(this).parent().parent().find('.img_div ').fadeIn(500);
                }else{
                    $(this).parent().parent().find('.img_div ').fadeOut(500);
                    $(this).parent().parent().find('.img_succed img').fadeIn(500);
                }
            })
            $("input[name='lastName']").focus(function(){
                $(this).parent().parent().find('.img_div').fadeOut(500);
            })
            $("input[name='lastName']").blur(function(){
                var lastName = $(this).val();
                if(lastName=='' || lastName.length<2){
                    // $(this).parent().parent().find('.img_div').fadeIn(500);
                }else{
                    $(this).parent().parent().find('.img_div').fadeOut(500);
                    $(this).parent().parent().find('.img_succed img').fadeIn(500);
                }
            })
            
            $("input[name='email']").focus(function(){
                $(this).parent().parent().find('.img_div img').css("display","none");
            })
            $("input[name='email']").blur(function(){
                if($(this).val()==''){
                    $(this).parent().parent().find('.img_div img').attr('src',"<?php echo $public;?>/img/pay_cart/icon_faild.png");
                    $(this).parent().parent().find('.img_div img').css("display","block");
                }else{
                    var email = $(this).val();
                    if (!email.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)) {
                        $(this).parent().parent().find('.img_div img').attr('src',"<?php echo $public;?>/img/pay_cart/icon_faild.png");
                        $(this).parent().parent().find('.img_div img').css("display","block");
                        layer.msg("Incorrect email format",{icon:0,time:1000});
                        // console.log("邮箱格式不正确");
                    }else{
                        param = {
                        email : email,
                        _csrf : csrf,
                        };
                        $.post(emailUrl, param, function(data) {
                            if (data.state == 1) {
                                $('.emailImg').attr('src',"<?php echo $public;?>/img/pay_cart/icon_done.png");
                                $('.emailImg').css("display","block");
                            }else{
                                $('.emailImg').attr('src',"<?php echo $public;?>/img/pay_cart/icon_faild.png");
                                $('.emailImg').css("display","block");
                                 layer.msg("The mailbox has been used",{icon:0,time:1000});
                                // console.log("邮箱已被使用");
                            }
                        }, "json");
                    }
                }
            })
            
            $("#changepasswordform-oldpassword").focus(function(){
               $(this).parent().parent().find('.img_div ').fadeOut(500);
            });
            $("#changepasswordform-oldpassword").blur(function(){
                var oldpassword = $(this).val();
                if(oldpassword==''){
                    $("#current_sucimg").hide();
                    $("#current_password").text("Please enter current password.");
                    $("#current_password").show();
                    //$("#current_password").show();
                    //$(this).parent().parent().find('.img_div ').fadeIn(500);
                }else{
                    param = {
                    oldpassword : oldpassword,
                    _csrf : csrf,
                    };
                    $.post(oldpasswordUrl, param, function(data) {
                        if (data.state == 1) {
                            // $('.oldpasswordImg').attr('src',"<?php echo $public;?>/img/pay_cart/icon_done.png");
                            // $(this).parent().parent().find('.img_succed img').fadeIn(500);

                            // $('.oldpasswordImg').attr('src',"<?php echo $public;?>/img/pay_cart/icon_done.png");
                            $("#current_sucimg").show();
                            //$("#current_password").parent().children().find('.img_succed img').fadeIn(500);
 
                        }else{
                            $("#current_sucimg").hide();
                            $("#current_password").text("Wrong current password");
                            $("#current_password").show();
                           //var b=$(this).parent().parent().find('.img_div ').val();
                            //alert($("#current_password").text());
                            //$(this).parent().parent().find('.img_div ').show();
                            // $('.oldpasswordImg').css("display","block");
                           // layer.msg("Old password error",{icon:0,time:1000});
                            // console.log("旧密码错误");
                        }
                    }, "json");
                }
            });
            $("#changepasswordform-password").focus(function(){
                //console.log("zxh");
                $(this).parent().parent().find('.img_div ').fadeOut(500);
            });
            $("#changepasswordform-password").blur(function(){
                console.log("111");
                var password = $(this).val();
                //var newpassword=$("#changepasswordform-password").val();
                var repassword = $("#changepasswordform-repassword").val();
                //var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
                if(password==''){
                    $("#new_sucimg").hide();
                    $(this).parent().parent().find('.img_div ').fadeIn(500);
                    console.log("新密码为空");
                    // $(this).parent().parent().find('.img_div img').css("display","block");

                }else if(password.length<6){
                    $("#new_sucimg").hide();
                    $(this).parent().parent().find('.img_div ').text("Password should contain at least 6 characters.").fadeIn(500);
                }else{
                    $("#new_sucimg").fadeIn(500);
                    //$(this).parent().parent().find('.img_div img').fadeIn(500);
                    console.log("success");
                }
                /*else if (!mediumRegex.test($(this).val())) {
                    // layer.msg("Please enter a password that is greater than 7 digits",{icon:0,time:1000});
                  /!*  console.log("请输入大于7位字母数字组合的密码");*!/
                    if(repassword==''){
                        // $(this).parent().parent().find('.img_div img').attr('src',"<?php echo $public;?>/img/pay_cart/icon_faild.png");
                         // $(this).parent().parent().find('.img_div ').fadeIn(500);
                         // layer.msg("The reset password is empty",{icon:0,time:1000});
                }else if(password.length<6){
                    $("#new_sucimg").hide();
                    $(this).parent().parent().find('.img_div ').text("Password should contain at least 6 characters.").fadeIn(500);
                }else{
                    $("#new_sucimg").fadeIn(500);
                    //$(this).parent().parent().find('.img_div img').fadeIn(500);
                    console.log("success");
                }
            }*/

            });
            $("#changepasswordform-repassword").focus(function(){
                // $(this).parent().parent().find('.img_div img').css("display","none");
                // $(this).parent().parent().find('.img_div ').fadeOut(500);
          
                $(this).parent().parent().find('.img_div ').fadeOut(500);
            });
            $("#changepasswordform-repassword").blur(function(){
                var repassword = $(this).val();//第二次输入的密码
                var password = $("#changepasswordform-password").val();//第一次输入的密码
                //var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
                if(repassword==''){
                    //$(this).parent().parent().find('.img_div img').attr('src',"<?php echo $public;?>/img/pay_cart/icon_faild.png");
                    // $(this).parent().parent().find('.img_div img').css("display","block");
                    $("#confirm_sucimg").hide();
                    $(".confirm_password").show();
                    //$(this).parent().parent().find('.account_t .img_div').fadeIn(500);
                }else if(repassword !=password){
                    $("#confirm_sucimg").hide();
                    $(".confirm_password").text("Passwords do not match, please try again.").fadeIn(500);
                }else{
                    $("#confirm_sucimg").show();
                }

                /*else if (!mediumRegex.test(repassword)) {
                    // $(this).parent().parent().find('.img_div img').attr('src',"<?php echo $public;?>/img/pay_cart/icon_faild.png");
                    $(this).parent().parent().find('.img_div img').css("display","block");
                }else if(password!=repassword){
                    // $('.passwordImg').attr('src',"<?php echo $public;?>/img/pay_cart/icon_faild.png");
                    // $('.passwordImg').css("display","block");
                    // $('.repasswordImg').attr('src',"<?php echo $public;?>/img/pay_cart/icon_faild.png");
                    // $('.repasswordImg').css("display","block");
                    // console.log('两次密码不一样');
                    layer.msg("Two passwords are different",{icon:0,time:1000});
                }else{
                    $('.passwordImg').attr('src',"<?php echo $public;?>/img/pay_cart/icon_done.png");
                    $('.passwordImg').css("display","block");
                    $('.repasswordImg').attr('src',"<?php echo $public;?>/img/pay_cart/icon_done.png");
                    $('.repasswordImg').css("display","block");
                }*/
            });
            $("input[name='birthday']").focus(function(){
                $(this).parent().parent().find('.img_div img').css("display","none");
            })
            $("input[name='birthday']").blur(function(){
                if($(this).val()==''){
                    // $(this).parent().parent().find('.img_div img').attr('src',"<?php echo $public;?>/img/pay_cart/icon_faild.png");
                    $(this).parent().parent().find('.img_div img').css("display","block");
                }else{
                    $(this).parent().parent().find('.img_div img').attr('src',"<?php echo $public;?>/img/pay_cart/icon_done.png");
                    $(this).parent().parent().find('.img_div img').css("display","block");
                }
            })

            $("input[name='phone']").focus(function(){
                $(this).parent().parent().find('.img_div img').css("display","none");
            })
            $("input[name='phone']").blur(function(){
                if($(this).val()==''){
                    $(this).parent().parent().find('.img_div img').attr('src',"<?php echo $public;?>/img/pay_cart/icon_faild.png");
                    $(this).parent().parent().find('.img_div img').css("display","block");
                }else{
                    $(this).parent().parent().find('.img_div img').attr('src',"<?php echo $public;?>/img/pay_cart/icon_done.png");
                    $(this).parent().parent().find('.img_div img').css("display","block");
                }
            })
            $(".save_btt").click(function(){
                
                var firstName = $("input[name='firstName']").val();
                var lastName = $("input[name='lastName']").val();
                var email = $("input[name='email']").val();
                var phone = $("input[name='phone']").val();
                var loginName = $("input[name='loginName']").val();
                var sex = $("input[name='sex']").val();
                var birthday = $("input[name='birthday']").val();
                var country = $("#country").val();
                var isChangePassword = $("#isChangePassword").val();
                var oldpassword = $("#changepasswordform-oldpassword").val();
                var password = $("#changepasswordform-password").val();
                var repassword = $("#changepasswordform-repassword").val();
                
                if(firstName=='' || firstName.length<2){
                    layer.msg("FirstName is empty or less than two letters",{icon:0,time:1000});
                }else if(lastName==''  || lastName.length<2){
                    layer.msg("LastName is empty or less than two letters",{icon:0,time:1000});
                }else if(email==''){
                    layer.msg("Please enter the email",{icon:0,time:1000});
                }/*else if(phone==''){
                    console.log('请输入phone');
                }*//*else if(birthday==''){
                    layer.msg("Please enter the birthday",{icon:0,time:1000});
                }*/else if(isChangePassword==1){
                    if(oldpassword==''){
                        layer.msg("Please enter the oldpassword",{icon:0,time:1000});
                    }else if(password==''){
                        layer.msg("Please enter the password",{icon:0,time:1000});
                    }else if(repassword==''){
                        layer.msg("Please enter the repassword",{icon:0,time:1000});
                    }else if(password!=repassword){
                        layer.msg("Two passwords are different",{icon:0,time:1000});
                    }else{
                        updating=  layer.msg('Updating', {icon: 16,shade: 0.3});
                        param = {
                            firstName:firstName,
                            lastName:lastName,
                            loginName:loginName,
                            email:email,
                            phone:phone,
                            sex:sex,
                            birthday:birthday,
                            country:country,
                            isChangePassword:isChangePassword,
                            oldpassword:oldpassword,
                            password:password,
                            repassword:repassword,
                            _csrf : csrf,
                        };
                        $.post(userUrl, param, function(data) {
                            if(data.state==0){
                                 updating=  layer.msg(data.meg, {icon:7 ,shade: 0.3,time:2000});
                            }else{
                                setTimeout(function(){layer.close(updating);}, 500);
                                updating=  layer.msg(data.meg, {icon: 1,shade: 0.3,time:2000});
                                $("#changepasswordform-oldpassword").val("");
                                $("#changepasswordform-password").val("");
                                $("#changepasswordform-repassword").val("");
                                location.reload();
                            }
                        }, "json");
                    }
                }else{
                    updating=  layer.msg('Updating', {icon: 16,shade: 0.3,time:2000});
                    param = {
                        firstName:firstName,
                        lastName:lastName,
                        loginName:loginName,
                        email:email,
                        phone:phone,
                        sex:sex,
                        birthday:birthday,
                        country:country,
                        _csrf : csrf,
                    };
                    $.post(userUrl, param, function(data) {
                        if(data.state==0){
                            updating=  layer.msg(data.meg, {icon:7 ,shade: 0.3,time:2000});
                        }else{
                            setTimeout(function(){
                                layer.close(updating);
                                updating=  layer.msg(data.meg, {icon: 1,shade: 0.3,time:3000});

                                
                            }, 500);

                            
                        }
                    }, "json");

                }
            })
            //密码修改显示和隐藏
            $(".sle_password").click(function () {
                // console.log("222");
                if($('.account_t').is(':hidden')){//如果当前隐藏
                    $(".sle_password").attr("src","<?php echo $public;?>/img/my_account/gouxuan.png");
                    $('.account_t').show();//那么就显示div
                    $('#isChangePassword').val(1);
                }else{//否则
                    $(".sle_password").attr("src","<?php echo $public;?>/img/my_account/weigouxuan.png");
                    $('.account_t').hide();//就隐藏div
                    $('#isChangePassword').val(0);
                }
            });

        });
    </script>

<?php
$this->registerJs('
var product = {csrf:"' . Yii::$app->request->getCsrfToken() . '"};
');

$js = <<<JS
$(function() {
        $("#pic").click(function () {
            $("#profile-file").click(); //隐藏了input:file样式后，点击头像就可以本地上传
            $("#profile-file").on("change",function(){
                var objUrl = getObjectURL(this.files[0]) ; //获取图片的路径，该路径不是图片在本地的路径
                if (objUrl) {
                    $("#pic").attr("src", objUrl) ; //将图片路径存入src中，显示出图片
                }
            });
        });
    });
     
    //建立一個可存取到該file的url
    function getObjectURL(file) {
    var url = null ;
    if (window.createObjectURL!=undefined) { // basic
    url = window.createObjectURL(file) ;
    } else if (window.URL!=undefined) { // mozilla(firefox)
    url = window.URL.createObjectURL(file) ;
    } else if (window.webkitURL!=undefined) { // webkit or chrome
    url = window.webkitURL.createObjectURL(file) ;
    }
    return url ;
    }
JS;

$this->registerJs($js);

?>


<!-- </div> -->
<!-- <?php ActiveForm::end(); ?> -->

<!--<div class="my_nala_detail my_address">-->
<!--    <h1>-->
<!--//= $this->title -->
<!--</h1>-->
<!--    <div class="detail_r">-->
<!--        <div class="detail_r">-->
<!--            --><?php //$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<!--            -->
<!--//= Html::activeHiddenInput($model, 'user_id', ['value' => Yii::$app->user->id]) -->
<!--            <div class="form-bd" id="first-addr-form">-->
<!--                <ul class="form addr-form" id="addr-form">-->
<!--                    <li>-->
<!--                        <label>帐号:</label>-->
<!--                        -->
<!--//= Yii::$app->user->identity->username-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <label>邮箱:</label>-->
<!--                        -->
<!--//= Yii::$app->user->identity->email -->
<!--                    </li>-->
<!--                    <li style="height:135px;">-->
<!--                        <label style="display: inline-block;height:100px;line-height: 54px; ">头像:</label>-->
<!--                        <img id="pic" src="/-->
<!--//=$model['avatar_url']-->
<!--" >-->
<!--                    </li>-->
<!--                    <li style="display: none;">-->
<!--                        -->
<!--//= $form->field($model, 'file')->fileInput() -->
<!--                    </li>-->
<!--                    -->
<!--                    <!-- <li>-->
<!--                        <label>头像:</label>-->
<!--                        -->
<!--//= Yii::$app->user->identity->email -->
<!--                    </li> -->
<!--                    <li>-->
<!--                        <label>昵称:</label>-->
<!--                        -->
<!--//= Html::activePasswordInput($model, 'surname', ['class' => 'txt']) -->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <label>性别:</label>-->
<!--                        -->
<!--//= Html::activeRadioList($model, 'sex', [1 => '男', 2 => '女'], ['tag' => 'span'])-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <label>生日:</label>-->
<!--                        -->
<!--//= Html::activeDropDownList($model, 'year', Profile::getYears(), ['prompt' => '--年--']) -->
<!--                        -->
<!--//= Html::activeDropDownList($model, 'month', Profile::getMonths(), ['prompt' => '--月--']) -->
<!--                        -->

<!--//= Html::activeDropDownList($model, 'day', Profile::getDays(), ['prompt' => '--日--']) -->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <label>地区:</label>-->
<!--                        --><?php
//                        echo Html::activeDropDownList($model, 'country', ArrayHelper::map(\common\models\Region::find()->where(['parent_id' => 0])->all(), 'id', 'name'), [
//                            'prompt'=> Yii::t('app','Please Select'),
//                            'onchange'=> '
//                            $.post( "'.Yii::$app->urlManager->createUrl('region/ajax-list-child?id=').'"+$(this).val(), function( data ) {
//                              $( "select#profile-province" ).html( data );
//                            });',
//                        ]);
//                        echo '&nbsp;&nbsp;&nbsp;&nbsp;';
//                        echo Html::activeDropDownList($model, 'province',
//                            $model->province ? ArrayHelper::map(\common\models\Region::find()->where(['parent_id' => $model->country])->all(), 'id', 'name') : ['' => Yii::t('app', 'Please Select')],
//                            [
//                                'onchange'=> '
//                            $.post( "'.Yii::$app->urlManager->createUrl('region/ajax-list-child?id=').'"+$(this).val(), function( data ) {
//                              $( "select#profile-city" ).html( data );
//                            });'
//                            ]);
//                        echo '&nbsp;&nbsp;&nbsp;&nbsp;';
//                        echo Html::activeDropDownList($model, 'city',
//                            $model->city ? ArrayHelper::map(\common\models\Region::find()->where(['parent_id' => $model->province])->all(), 'id', 'name') : ['' => Yii::t('app', 'Please Select')],
//                            [
//                                'onchange'=> '
//                            $.post( "'.Yii::$app->urlManager->createUrl('region/ajax-list-child?id=').'"+$(this).val(), function( data ) {
//                              $( "select#profile-district" ).html( data );
//                            });'
//                            ]);
//                        echo '&nbsp;&nbsp;&nbsp;&nbsp;';
//                        echo Html::activeDropDownList($model, 'district', $model->district ? ArrayHelper::map(\common\models\Region::find()->where(['parent_id' => $model->city])->all(), 'id', 'name') : ['' => Yii::t('app', 'Please Select')]);
//                        ?>
<!--                    </li>-->
<!--                    <li>-->
<!--                        -->
<!--//= Yii::$app->getSession()->getFlash('success') -->
<!---->
<!--//= Html::error($model, 'oldpassword');-->
<!---->
<!--//= Html::error($model, 'password'); -->
<!---->
<!--//= Html::error($model, 'repassword'); -->
<!--                    </li>-->
<!--                    <li class="last">-->
<!--//= Html::submitButton( Yii::t('app', 'Submit'), ['class' => 'btn',]) -->
<!--<a href="-->
<!--//= Yii::$app->request->referrer -->
<!--" hidefocus="true" class="btn">返 回</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            --><?php //ActiveForm::end(); ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
