<?php
$public = Yii::getAlias('@public'); //exit;
/**
 * Created by PhpStorm.
 * User: LIU
 * Date: 2017/10/30
 * Time: 10:27
 */

$this->registerJsFile('@web/js/jquery.form.js', ['depends' => \frontend\assets\AppAsset::className()]);
?>
<link rel="stylesheet" href="<?php echo $public ?>/css/fast-to-cart.css">
<style>
	.ischecked-icon{
		width: 20px;
		height:20px;
		float:left;
		margin-top:30px;
	}
	.fast-autocomplete .f-submit-list{
		/*position: absolute;*/
		/*bottom:2px;*/
		width:100%;
		background: #bfbfbf;
		height:40px;
		line-height: 40px;
		border-radius: 2px;
		font-size: 16px;
		font-weight: bold;
		color:#fff;
		padding-top:0;
		
	}
	.fast-autocomplete .f-submit-list:hover{
		background: #bfbfbf;
		color:#fff;
		width: 100%;
	}
	.fast-autocomplete .f-slect-submit-list{
		/*position: absolute;*/
		/*bottom:2px;*/
		width:100%;
		background: #ff7143;
		height:40px;
		line-height: 40px;
		border-radius: 2px;
		font-size: 16px;
		font-weight: bold;
		color:#582717;
		padding-top:0;
		
	}
	.fast-autocomplete .f-slect-submit-list:hover{
		background: #ff7143;
		color:#582717;
		width: 100%;
		cursor: pointer;
	}
</style>
<div class="breadcrumb-area">
    <div class="container">
        <ol class="breadcrumb"><li><a href="/"><i class="fa fa-home"></i> Home</a></li>&nbsp;<li><i>&gt;</i></li>&nbsp;<h1 class="Setting-seo">Fast order</h1></ol>
    </div>
</div>

<div class="fast-to-cart container">
    <div class="table-responsive">
        <!--加入购物车的提示信息-->
        <!--<div class="tocart-fail-tip tip">
            <img src="<?php echo $public ?>/img/cart/icon_notce_fualt.png"/>
            <span>
            	The file's format is not correct. Please download sample csv file and try again.
            </span>

        </div>
        <div class="tocart-success-tip tip">
            <img src="<?php echo $public ?>/img/cart/icon_succesful.png"/>
            <span>10 products were imported. </span>
        </div>-->
        <form id="uploadForm" action="<?= Yii::$app->urlManager->createUrl(['fast-ajax-upload']) ?>" method= "post" enctype ="multipart/form-data">
            <table class="table">
                <thead>
                <tr>
                    <th class="thd-search">Search</th>
                    <th class="thd-product">Product</th>
                    <th class="thd-attr">Attribute</th>
                    <th class="thd-price">Price</th>
                    <th class="thd-qty">Qty</th>
                    <th class="thd-subtotal">Subtotal</th>
                    <th class="thd-action">Action</th>
                </tr>
                <tr style="height:15px;border-bottom: none;"></tr>
                </thead>
                <tbody>
                <?php if(count($data) > 0){ foreach($data as $item) { ?>
                    <tr>
                        <td>
                            <div id="search-pro-name">
                                <input type="text" value="<?= $item['product']->sku ?>" placeholder="Enter product name or sku here..." />
                            </div>
                            <div class="fast-autocomplete" style="display:none;">
                                <ul>
                                    <li>No match result, please try another one.</li>
                                </ul>
                                <div class="f-submit-btn f-submit-list">
                                	SUBMIT SELECTED ITEMS
                                </div>
                                <!--搜到产品-->
                                <ul class="pro-lists">

                                </ul>
                            </div>
                        </td>
                        <td>
                            <div class="pro-content">
                                <div class="pro-content-pic  pull-left">
                                    <img src="<?= $item['product']->image?>"/>
                                </div>
                                <div class="pull-left pro-content-tital">
                                    <h5><?= $item['product']->name ?></h5>
                                    <div>
                                    <?= $item['product']->type & 128 ? '<span class="TPD pro-tpd">TPD Package</span>' : '' ?>
                                    <?= $item['product']->type & 32 ? '<span class="TPD pro-tpd-com">TPD Compliance</span>' : '' ?>
                                    <?= $item['product']->type & 8 ? '<span class="pre-order-sale pro-order-sale">Sale</span>' : '' ?>
                                    <?php if($item['product']->pre_order_time <= 0) {echo $item['product']->stock == 0 ? '<span class="outstock pro-outstock">Out of stock</span>' : '';} ?>
                                    <?= $item['product']->pre_order_time > 0 ? '<span class="pre-order-sale pro-order">Pre-order</span>' : '' ?>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <ul class="pro-content-attr">
                                <li><?= $item['product']->child ? $item['product']->child->attr : '' ?></li>
                            </ul>
                        </td>
                        <td>
                            <div class="pro-price-text">
                                <span>$<i><?= $item['product']->market_price ?></i></span>
                                <span>$<i><?= $item['product']->price ?></i></span>
                            </div>
                        </td>
                        <td class="pro-qty">
                            <style>
                                input::-webkit-outer-spin-button,
                                input::-webkit-inner-spin-button {
                                    -webkit-appearance: none;
                                }
                                input[type="number"]{
                                    -moz-appearance: textfield;
                                }
                            </style>
                            <input type="text" value="<?= $item['number'] ?>" maxlength="4" data-id="<?= $item['product']->id ?>" onkeyup="if(this.value.length<=1){this.value=this.value.replace(/[^1-9]/g,'1')}else{this.value=this.value.replace(/\D/g,'1')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'1')}else{this.value=this.value.replace(/\D/g,'')}" />
                        </td>
                        <td class="pro-subtotal">$<span class="total"><?= $item['number'] * $item['product']->price ?></span></td>
                        <td class="pro-reset-btn">
                            <span class="active">RESET</span>
                        </td>
                    </tr>
                <?php } } else { ?>
                	<?php for($i=0;$i<5;$i++){ ?>
                <tr>
                    <td>
                        <div id="search-pro-name">
                            <input type="text" placeholder="Enter product name or sku here..." />
                        </div>
                        <div class="fast-autocomplete" style="display:none;">
                            <ul>
                                <li>No match result, please try another one.</li>
                            </ul>
                            <div class="f-submit-btn f-submit-list">
                                	SUBMIT SELECTED ITEMS
                                </div>
                            <!--搜到产品-->
                            <ul class="pro-lists">

                            </ul>
                        </div>
                    </td>
                    <td>
                        <div class="pro-content display-none">
                            <div class="pro-content-pic  pull-left">
                                <img/>
                            </div>
                            <div class="pull-left pro-content-tital">
                                <h5></h5>
                                <div></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <ul class="pro-content-attr display-none">
                            <li></li>
                        </ul>
                    </td>
                    <td>
                        <div class="pro-price-text display-none">
                            <span>$<i>0.00</i></span>
                            <span>$<i>0.00</i></span>
                        </div>
                    </td>
                    <td class="pro-qty">
                        <input type="text" value="0" data-id="0" maxlength="4" readonly onkeyup="if(this.value.length<=1){this.value=this.value.replace(/[^1-9]/g,'1')}else{this.value=this.value.replace(/\D/g,'1')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'1')}else{this.value=this.value.replace(/\D/g,'1')}"/>
                    </td>
                    <td class="pro-subtotal">$<span class="total">0.00</span></td>
                    <td class="pro-reset-btn">
                        <span>RESET</span>
                    </td>
                </tr>
                	<?php } ?>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr style="height:15px;">
                	<td colspan="7" style="background: #fff;padding:0;"></td>
                </tr>
                <tr class="pro-addline" style="height:40px;background: #f7f7f7;">
                    <th colspan="3"></th>
                    <th colspan="1"><span id="pro-addline-btn"><img src="<?php echo $public ?>/img/cart/icon_add_line.png"/>Add line</span></th>
                    <th colspan="3"></th>
                </tr>
                <tr>
                    <td colspan="4" style="padding-left: 20px;">
                        <div class="pro-upload-btn">
                            <span>Upload File<img src="<?php echo $public ?>/img/cart/icon_upload_file.png"/></span>
                            <input id="file" name="file" type="file" title=" " />
                        </div>
                        <div class="pro-down-btn pull-left">
                            <a href="/upload/fast-order/Elegomall-Fast-Order-Sample.xlsx">
                                Download Sample Excel
                                <img src="<?php echo $public ?>/img/cart/icon_download.png"/>
                            </a>
                        </div>
                    </td>
                    <td colspan="3">
                        <div class="pro-price-btn pull-left">
                            Total:$<span>0.00</span>
                        </div>
                        <div class="pro-tocart-btn pull-left">
                            <a id="addCart" href="javascript:;">
                                <span>Add to cart</span>
                                <img src="<?php echo $public ?>/img/cart/icon_fastorder_shopping_cart.png"/>
                            </a>
                        </div>
                    </td>

                </tr>
                </tfoot>
            </table>
        </form>
         <div class="tocart-fail-tip tip">
            <img src="<?php echo $public ?>/img/cart/icon_notce_fualt.png"/>
            <span>
            	The file's format is not correct. Please download sample csv file and try again.
            </span>

        </div>
        <div class="tocart-success-tip tip">
            <img src="<?php echo $public ?>/img/cart/icon_succesful.png"/>
            <span>10 products were imported. </span>
        </div>
    </div>
</div>

<script>
    $(function(){
		
        //当input获的焦点时
        $("tbody").on("focus","#search-pro-name>input",function(e){
            e.stopPropagation();
            $(this).css({"border":"1px solid #d9d9d9"});
            $(this).parent().css("padding-right","10px");

           /* var obj = $(this);
            var list = $(this).parent().next().children("ul.pro-lists");
            $(this).keyup(function(e){
                e.stopPropagation();
                var keyword = $(this).val();
                if (keyword == '') {
                    return false;
                }

                var search = $(this).attr("search");
                if (keyword == search) {
                    $(this).parent().next().show();
                    return false;
                }
                console.log(keyword);
                $.get("<?= Yii::$app->urlManager->createUrl(['/fast/search']) ?>", {'keyword' : keyword}, function(data){
                    if (data.length > 0) {
                        var li = '';
                        $.each(data, function(i, n){
                            //初始化搜索列表是否选中显示
                            var isShowSlect="";
                            isShowSlect='<div class="ischecked-icon">\
                            	<img class="no-select-icon" src="/theme/new/img/cart/pic_slecet_not.png"/>\
                            	</div>'
//                          	<img class="no-haved-icon" src="/theme/new/img/cart/pic_slecet_haved.png"/>\
//                          	<img class="ok-select-icon" src="/theme/new/img/cart/pic_sleceted.png"/>\
//                          </div>'
//                          li += '<li data-sku="'+n['sku']+'" data-id="'+n['id']+'" data-price="'+n['price']+'" data-stock="'+n['stock']+'" data-pre_order_time="'+n['pre_order_time']+'" data-type="'+n['type']+'" data-market_price="'+n['market_price']+'"><a href="javascript:;"><div class="pro-min-picture pull-left"><img src="https://www.elegomall.com'+n['image']+'"/></div><div class="pull-left pro-list"><h5>'+n['name']+'</h5><ul><li>sku:'+n['sku']+'<li>'+n['attr']+'</li></ul></div></a></li>';
                            li += '<li data-sku="'+n['sku']+'" data-id="'+n['id']+'" data-price="'+n['price']+'" data-stock="'+n['stock']+'" data-pre_order_time="'+n['pre_order_time']+'" data-type="'+n['type']+'" data-market_price="'+n['market_price']+'"><a href="javascript:;"><div class="pro-min-picture pull-left"><img src="https://www.elegomall.com'+n['image']+'"/></div><div class="pull-left pro-list"><h5>'+n['name']+'</h5><ul><li>sku:'+n['sku']+'<li>'+n['attr']+'</li></ul></div>'+isShowSlect+'</a></li>';

                        });
                        $(list).show();
                        $(list).prev().show();
                        $(list).prev().prev().hide();

                    } else {
                        $(list).hide();
                        $(list).prev().hide();
                        $(list).prev().prev().show();
                    }

                    list.html(li);
                    obj.attr("search", keyword);
                    console.log(keyword);
                }, 'json');
                $(this).parent().next().show();
            });*/


        });
        $("table").on("keyup","#search-pro-name>input",function(e){
            e.stopPropagation();
            var obj = $(this);
            var list = $(this).parent().next().children("ul.pro-lists");
            var keyword = $(this).val();
            if (keyword == '') {
                return false;
            }

            var search = $(this).attr("search");
            /*if (keyword == search) {
                $(this).parent().next().show();
                return false;
            }*/

            var param = new Array;
            $("span.total").each(function(){
                var id = $(this).parent().prev().children("input").attr("data-id");
                if (id > 0) {
                    param.push(parseInt(id));
                }
            });

            $.get("<?= Yii::$app->urlManager->createUrl(['/fast/search']) ?>", {'keyword' : keyword}, function(data){
                if (data.length > 0) {
                    var li = '';
                    $.each(data, function(i, n){
                        if ($.inArray(n['id'], param) == -1) {
                            var img = '<img class="no-select-icon" src="/theme/new/img/cart/pic_slecet_not.png"/>';
                        } else {
                            var img = '<img class="no-haved-icon" src="/theme/new/img/cart/pic_slecet_haved.png"/>';
                        }
                        //初始化搜索列表是否选中显示
                        var isShowSlect = '<div class="ischecked-icon">'+img+'</div>';
//                          	<img class="no-haved-icon" src="/theme/new/img/cart/pic_slecet_haved.png"/>\
//                          	<img class="ok-select-icon" src="/theme/new/img/cart/pic_sleceted.png"/>\
//                          </div>'
//                          li += '<li data-sku="'+n['sku']+'" data-id="'+n['id']+'" data-price="'+n['price']+'" data-stock="'+n['stock']+'" data-pre_order_time="'+n['pre_order_time']+'" data-type="'+n['type']+'" data-market_price="'+n['market_price']+'"><a href="javascript:;"><div class="pro-min-picture pull-left"><img src="https://www.elegomall.com'+n['image']+'"/></div><div class="pull-left pro-list"><h5>'+n['name']+'</h5><ul><li>sku:'+n['sku']+'<li>'+n['attr']+'</li></ul></div></a></li>';
                        li += '<li data-sku="'+n['sku']+'" data-id="'+n['id']+'" data-price="'+n['price']+'" data-stock="'+n['stock']+'" data-pre_order_time="'+n['pre_order_time']+'" data-type="'+n['type']+'" data-market_price="'+n['market_price']+'"><a href="javascript:;"><div class="pro-min-picture pull-left"><img src="https://www.elegomall.com'+n['image']+'"/></div><div class="pull-left pro-list"><h5>'+n['name']+'</h5><ul><li>sku:'+n['sku']+'<li>'+n['attr']+'</li></ul></div>'+isShowSlect+'</a></li>';

                    });
                    $(list).show();
                    $(list).prev().show();
                    $(list).prev().prev().hide();

                } else {
                    $(list).hide();
                    $(list).prev().hide();
                    $(list).prev().prev().show();
                }

                list.html(li);
                obj.attr("search", keyword);
            }, 'json');
            $(this).parent().next().show();
        });


       // $("tbody>tr").eq(0).find("#search-pro-name>input").focus();
        //当input失去焦点时
        $(".table").on("blur","#search-pro-name>input",function(e){
            e.stopPropagation();
            $(this).css({"border":"none"});
            $(this).parent().css("padding-right","0px");
        });
		//点击document
		$(document).click(function(){
			$(".fast-autocomplete").hide();
		});
		//点击选取列表
		$(".fast-to-cart").on("click",".pro-lists>li",function(e){
			var _this=$(this);
			if($(this).find(".ischecked-icon img").attr("class")=="no-select-icon"){
				$(this).find(".ischecked-icon img").remove();
				$(this).find(".ischecked-icon").append('<img  class="ok-select-icon" src="/theme/new/img/cart/pic_sleceted.png"/>');
			}
			else if($(this).find(".ischecked-icon img").attr("class")=="ok-select-icon"){
				$(this).find(".ischecked-icon img").remove();
				$(this).find(".ischecked-icon").append('<img  class="no-select-icon" src="/theme/new/img/cart/pic_slecet_not.png"/>');
			}
			else{
				console.log("xuanzebiaoqianchuwentila");
			}
			isCheckedList(_this);
			e.stopPropagation();
		});
		//点击搜索结果提交列表
		$("#uploadForm").on("click",".f-submit-btn",function(e){
			e.stopPropagation();
		});


        //提交
        $("tbody").on("click", ".f-submit-btn", function(e){
            e.stopPropagation();
            var cursor = $(this).css("cursor");
            if (cursor != 'pointer') {
                return false;
            }

            var li = $(this).next().find("img.ok-select-icon");
            var num = li.length;
            $.each(li, function (i, n){
                if (num > 1 && i==0) {
                    setTr($(n).parents("li"), num, true);
                } else {
                    setTr($(n).parents("li"), num, false);
                }

            });

            $(".fast-autocomplete").hide();
            $(".fast-autocomplete").children("ul.pro-lists").html("");
        });

        //修改数量
        $(document).on("change", ".pro-qty>input", function(){
            var number = $(this).val();
            if (number <= 0) {
                $(this).val(1);
                number = 1;
            }
            var price = $(this).parent().prev().find("i:eq(1)").text();
            var total = price * parseInt(number);
            $(this).parent().next().find("span:eq(0)").text(total.toFixed(2));
            setTotalPrice();
        });

        //点击重置按钮
        $(document).on("click",".pro-reset-btn .active",function(){
            reset(this);
        });

        //鼠标离开搜索页
        //$(document).on("mouseleave",".fast-autocomplete",function(){
//		e.stopPropagation();
        //    $(this).hide();
       // });

        //选择文件并上传
        $("#file").on("change", function(){
            var formData = {};
            formData._csrf = $('meta[name="csrf-token"]').attr("content");
			
            var options = {
                // 规定把请求发送到那个URL
                url: "<?= Yii::$app->urlManager->createUrl(['/fast/upload']) ?>",
                // 请求方式
                type: "post",
                // 服务器响应的数据类型
                dataType: "json",

                data: formData,
                beforeSend : function (){
                    layer.msg('loading', {icon: 16,shade: 0.01});
                },
                // 请求成功时执行的回调函数
                success: function(data, status, xhr) {
                    $(".tip").hide();
                    
                    if (data.status == 1) {
                    	loading = layer.msg('loading', {icon: 16,shade: 0.01});
                    	layer.close(loading);
                        if (data.data.length > 0) {
                            var li = '';

                            $.each(data.data, function(i, n){
                                //加一行
                                addLine();

                                //填数据
                                var tr = $("tbody").find("tr:last");
                                var tag = '';
                                n['type'] & 128 ? tag+= '<span class="TPD pro-tpd">TPD Package</span>' : '';
                                n['type'] & 32 ? tag+= '<span class="TPD pro-tpd-com">TPD Compliance</span>' : '';
                                n['type'] & 8 ? tag+= '<span class="pre-order-sale pro-order-sale">Sale</span>' : '';
                                if (n['pre_order_time'] <= 0)
                                n['stock'] == 0 ? tag+= '<span class="outstock pro-outstock">Out of stock</span>' : '';
                                n['pre_order_time'] > 0 ? tag+= '<span class="pre-order-sale pro-order">Pre-order</span>' : '';

                                $(tr).children("td:eq(0)").find("input").val(n['sku']);
                                $(tr).children("td:eq(1)").find("img").attr("src", n['image']);
                                $(tr).children("td:eq(1)").find("h5").text(n['name']);
                                $(tr).children("td:eq(1)").find("h5").next().html(tag);
                                $(tr).children("td:eq(2)").find("li").text(n['attr']);
                                $(tr).children("td:eq(3)").find("i:eq(0)").text(n['market_price']);
                                $(tr).children("td:eq(3)").find("i:eq(1)").text(n['price']);
                                $(tr).children("td:eq(4)").find("input").removeAttr("readonly");
                                $(tr).children("td:eq(4)").find("input").val(n['qty']);
                                $(tr).children("td:eq(4)").find("input").attr("data-id", n['id']);
                                $(tr).children("td:eq(5)").find("span:eq(0)").text(parseFloat(n['qty'] * n['price']).toFixed(2));
                                $(tr).find(".pro-content,.pro-content-attr,.pro-price-text").show();
                                $(tr).find(".pro-reset-btn>span").addClass("active");
                            });

                            setTotalPrice();

                            if (data.total.success > 0) {
                            	$(".tocart-success-tip").show();
                                $(".tocart-success-tip span").html(data.total.success + " products were imported.");
                                setTimeout(function(){
									$(".tocart-success-tip").hide();
								},3000);
                            }
                            if (data.total.error > 0) {
                            	$(".tocart-fail-tip").show();
                                $(".tocart-fail-tip span").html(data.total.error + " products were not imported.");
                                setTimeout(function(){
									$(".tocart-fail-tip").hide();
								},5000);
                            }
                        } else {
                            $(".tocart-fail-tip").show();
                            $(".tocart-fail-tip span").html("No products were imported");
                            setTimeout(function(){
                                $(".tocart-fail-tip").hide();
                            },3000);
                        }

                    } else {
//                      layer.msg(data.msg, {icon: 7,shade: 0.01})
						$(".tocart-fail-tip").show();
						$(".tocart-fail-tip span").html(data.msg);
						setTimeout(function(){
							$(".tocart-fail-tip").hide();
						},5000);
						
                    }
                }

            };

            $("#uploadForm").ajaxSubmit(options);
            //清空input file 可以使change生效
            $(this).val("");

        });

        //点击增加一行pro-addline
        $("#pro-addline-btn").on("click",function(){
            addLine();
        });

        $("#addCart").click(function(){
            var total = $(this).parent().prev().children("span").text();
           
            if (total <= 0) {
                return false;
            }
             
            $.ajax({
                url : "<?= Yii::$app->urlManager->createUrl(['/fast/add']) ?>",
                dataType : 'json',
                type : 'get',
                data : {},
                beforeSend : function (){
                    layer.msg('loading', {icon: 16,shade: 0.01});
                },
                success : function (data) {
                	//loading = layer.msg('loading', {icon: 16,shade: 0.01});
                	//layer.close(loading);
                    if (data.status == 1) {
                    	
                        success=layer.msg('Success. All products added to cart.', {icon: 1,shade: 0.01});
                        setTimeout(function(){
                            layer.close(success);
                            location.reload();
                        }, 1000);

                    } else {
						layer.msg(data.msg, {icon: 7,shade: 0.01});
                    }
                },
                error : function (){
 					layer.msg("system error!", {icon: 7,shade: 0.01});
                }
            });
        });

        //算总价格
        setTotalPrice(false);
    });

    //增加一行
    function addLine(){
        $("tbody").append(proHtml());
        var tr = $("tbody").children("tr:last");
        reset(tr.find("span:last"), false);
    }

    //获取一行
    function proHtml(){
        var tr = $("tbody tr:first-child").clone();
        return tr;
    }

    //重置一行
    function reset(dom, save = true){
        $(dom).parents("tr").find(".pro-content,.pro-content-attr,.pro-price-text").hide();
        $(dom).removeClass("active");
        $(dom).parents("tr").find("input:eq(0)").val("");
        $(dom).parents("tr").find("input:eq(1)").attr("readonly", true);
        $(dom).parents("tr").find("input:eq(1)").val(0);
        $(dom).parents("tr").find("input:eq(1)").attr("data-id", 0);
        $(dom).parents("tr").find(".total").text("0.00");
        if (save) {
            setTotalPrice();
        }
    }

    //计算总价
    function setTotalPrice(savaData = true){
        var total = 0;
        var param = new Array;
        $("span.total").each(function(){
            total += parseFloat($(this).text());

            //整理要发送的数据
            var number = $(this).parent().prev().children("input").val();
            var id = $(this).parent().prev().children("input").attr("data-id");
            if (id > 0 && parseFloat($(this).text()) > 0) {
                var info = number + ':' + id;
                param.push(info);
            }

        });

        $(".pro-price-btn").find("span").html(total.toFixed(2));

        if (savaData) {
            setFastOrder(param);
        }
    }

    //修改远端数据
    function setFastOrder(param){
        var formData = {};
        formData._csrf = $('meta[name="csrf-token"]').attr("content");
        formData.param = param;

        $.ajax({
            url : "<?= Yii::$app->urlManager->createUrl(['/fast/save']) ?>",
            dataType : 'json',
            type : 'post',
            data : formData,
            success : function (data) {
                //console.log(data);
            },
            error : function (){
				layer.msg("system error!", {icon: 7,shade: 0.01})
            }
        });
    }
    function isCheckedList(_this){
    	//是否可以提交
    	
			$(_this).parent().children().each(function(){
//				debugger;
				if($(this).find(".ischecked-icon img").attr("class")=="ok-select-icon"){
					$(this).parent().prev().css({"background":"#ff7143","color":"#582717","cursor":"pointer"});
					return false;
				}
				else{
					$(this).parent().prev().css({"background":"#bfbfbf","color":"#fff"});
				}
			});
    }

    function setTr(obj, num, flag){
        if (num > 1) {
            //复制
            var tr = $(obj).parents("tr").clone();
            $(obj).parents("tr").after(tr);
        }
        //删除后面那个
        if (flag) {
            $(obj).parents("tr").next().remove();
        }

        $(obj).parents("tr").find(".pro-content,.pro-content-attr,.pro-price-text").show();
        $(obj).parents("tr").find(".pro-reset-btn>span").addClass("active");

        var sku = $(obj).data("sku");
        var image = $(obj).find("img").attr("src");
        var attr = $(obj).find("li:eq(1)").html();
        var name = $(obj).find("h5").text();
        var price = $(obj).data("price");
        var type = $(obj).data("type");
        var stock = $(obj).data("stock");
        var pre_order_time = $(obj).data("pre_order_time");
        var market_price = $(obj).data("market_price");

        var tag = '';
        type & 128 ? tag+= '<span class="TPD pro-tpd">TPD Package</span>' : '';
        type & 32 ? tag+= '<span class="TPD pro-tpd-com">TPD Compliance</span>' : '';
        type & 8 ? tag+= '<span class="pre-order-sale pro-order-sale">Sale</span>' : '';
        if (pre_order_time <= 0)
            stock == 0 ? tag+= '<span class="outstock pro-outstock">Out of stock</span>' : '';
        pre_order_time > 0 ? tag+= '<span class="pre-order-sale pro-order">Pre-order</span>' : '';

        $(obj).parent().parent().prev().children("input").val(sku);
        $(obj).parent().parent().parent().next().find("img").attr("src", image);
        $(obj).parent().parent().parent().next().find("h5").text(name);
        $(obj).parent().parent().parent().next().find("h5").next().html(tag);
        $(obj).parent().parent().parent().next().next().find("li").html(attr);
        $(obj).parent().parent().parent().next().next().next().find("i:eq(0)").text(market_price);
        $(obj).parent().parent().parent().next().next().next().find("i:eq(1)").text(price);
        $(obj).parent().parent().parent().next().next().next().next().find("input").removeAttr("readonly");
        $(obj).parent().parent().parent().next().next().next().next().find("input").val(1);
        $(obj).parent().parent().parent().next().next().next().next().find("input").attr("data-id", $(obj).data("id"));
        $(obj).parent().parent().parent().next().next().next().next().next().find("span:eq(0)").text(price);

        $(obj).parent().parent().hide();
        setTotalPrice();
    }
</script>