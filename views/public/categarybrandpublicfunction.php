 <!-- 
 公用ｊｓ
 -->
<script type="text/javascript">
        function changeUrlArg(url, arg, val){
            var pattern = arg+'=([^&]*)';
            var replaceText = arg+'='+val;
            return url.match(pattern) ? url.replace(eval('/('+ arg+'=)([^&]*)/gi'), replaceText) : (url.match('[\?]') ? url+'&'+replaceText : url+'?'+replaceText);
        }

        $(function(){
            $("#sort_by").find("select").change(function(){
                var url = location.search;
                if (url == '') {
                    url = '?action=search';
                }
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

            //点击左册条件
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
                    if (p[i].indexOf("sort") >=0 || p[i].indexOf("page") >=0 || p[i].indexOf("keyword")>=0) {
                        oldparam += p[i] + '&';
                    }
                }

                var url = "?" + oldparam + param;
                location.href = url;

            });

            //点击左侧标签（取消）
            $(".word-select").click(function(){
                var value = $(this).children("a").data("value");

                if (value == 'clear') {
                    var oldurl = location.search;
                    oldurl = oldurl.substr(1);
                    var p = oldurl.split("&");
                    var oldparam = '';
                    for (var i=0; i < p.length; i++) {
                        if (p[i].indexOf("sort") >=0 || p[i].indexOf("page") >=0 || p[i].indexOf("keyword")>=0) {
                            oldparam += p[i] + '&';
                        }
                    }

                    var url = "?" + oldparam;
                    location.href = url;
                    //location.href = "?";
                    return false;
                }
                var url = location.search;
                url = url.substr(1);
                var arr = url.split("&");

                for (var i=0; i < arr.length; i ++) {
                    if (arr[i].indexOf(value) != -1) {
                        arr.splice(i, 1);
                    }
                }
                var newUrl = arr.join("&");
                location.href = "?" + newUrl;
            })
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
                var proorder = jQuery(this).parent('.select_box').find(".child_ids"+choise).data('proorder');
                var id = '-1';
                var ids = jQuery(this).parent('.select_box').find(".child_ids"+choise).val();
                if(ids>=0){
                    jQuery(this).parent().parent().find('.ajaxaddToCart').data('id',ids);
                    jQuery(this).parent().parent().find('.ajaxaddToFavorite').data('id',ids);
                    jQuery(this).parent().parent().find('.ajaxarrivenotic').data('id',ids);
                    if(stock>0 || proorder>0){
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
            $('.single-product').on('mouseover',function(e){
        var other_infor = $(this).find('.other_infor');
        var height = other_infor.height();//105
        var Fheight = $(this).height();//184
        var sT = Math.round((1-height/Fheight)*Fheight);
        console.log(height/Fheight,sT);
        $(this).find('.other_infor').stop().animate({'top':sT+'px'},200);
    });
    // var _index = 0;
    // var newindex = 0;
    // console.log($('.single-product').length);
    // $('.single-product').on('mouseenter',function(e){
    //     var other_infor = $(this).find('.other_infor');
    //     var height = other_infor.height();//105
    //     var Fheight = $(this).height();//184
    //     var sT = Math.round((1-height/Fheight)*Fheight);
    //     $('.other_infor').eq(_index).stop().animate({'top':'100%'});
    //     $(this).find('.other_infor').stop().animate({'top':sT+'px'});
        // _index = newindex;
        // console.log(_index);
    // });
    $('.single-product').on('mouseout',function(e){
        $(this).find('.other_infor').stop().animate({'top':'100%'});
    });
        })
    </script>
<?php
$urlCartAdd = Yii::$app->urlManager->createUrl(['cart/ajax-add']);
$urlFavoriteAdd = Yii::$app->urlManager->createUrl(['goods/favorite']);
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
    }else if(id==0){
        layer.msg('OUT OF STOCK', {
  icon: 7
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
        $.post("{$urlFavoriteAdd}?id=" + id, param, function(data) {
        layer.close(loading);
        if (data.status > 0) {
          success=  layer.msg('SUCCESS', {
          icon: 1
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
        if(num==0){
            layer.msg('OUT OF STOCK', {
              icon: 7
              ,shade: 0.01
            });
        }
    }else if(id==0){
        layer.msg('OUT OF STOCK', {
  icon: 7
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
            $(".monileAddNumber").text(data.userCartSum);
  success=  layer.msg('SUCCESS', {
  icon: 1
  ,shade: 0.01
});

   setTimeout(function(){
  layer.close(success);
}, 500);
        } else {
                   layer.msg('OUT OF STOCK', {
  icon: 7
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
              icon: 7
              ,shade: 0.01
            });
        }
    }else if(id==0){
        layer.msg('OUT OF STOCK', {
  icon: 7
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
  icon: 1
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
  icon: 7
  ,shade: 0.01
});
       setTimeout(function(){
  layer.close(success);
}, 3000);
    //window.location.href="{$login}"
   }else {
             layer.msg('Please Login', {
  icon: 7
  ,shade: 0.01
});
        }
    }, "json");
}
});
JS;

$this->registerJs($js);