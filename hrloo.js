/**
 * 描述：略
 * @authors arttanzl (630804990@qq.com)
 * @date    2017-03-11 16:56:54
 * @version version v1.0
 */

define(function(require, exports, modules) {

	var $ = require("jquery");
			require('global/js/jquery.cookie.min.js');
	var t = require("tools");

	// 生成图形验证码地址
	var verifycode = function(width,height,fontSize){
		var width = width ? width : 90;
		var height = height ? height : 30;
		var fontSize = fontSize ? fontSize : 16;
		var randID = t.randID();
		var url = CONFIG.SERVER_HOST + 'api/index/verifycode?height='+height+'&width='+width+'&font_size='+fontSize+'&time='+randID;
		return url;
	}

	// ajax分页条获得页码
	var getPageskipNumber = function(me){
		if(!me){
			return;
		}
		var pageindex_input = $(me).siblings('.q-pages-insert').eq(0);
		var pageindex = pageindex_input.val();
		var isInt = new RegExp('^[1-9][0-9]*$').test(pageindex);
		if (!isInt) {
			t.showBubble(pageindex_input, 2, '请输入正整数');
			t.eventStop();
			return;
		}
		var maxpage = parseInt(pageindex_input.attr('maxpage'));
		pageindex = parseInt(pageindex);
		if (pageindex > maxpage) {
			pageindex = maxpage;
		}
		return pageindex;
	}


	// DOM上使用的对象方法
	var HR = window['HR'] || (window['HR'] = {});

	/**
	 * 翻页输入页码跳转 
	 * @param pageinputid 页码输入文本框
	 */
	HR.pageskip = function(pageinputid){
		var pageindex_input = $('#' + pageinputid);
		var pageindex = pageindex_input.val();
		var isInt = new RegExp('^[1-9][0-9]*$').test(pageindex);
		if (!isInt) {
			t.showBubble(pageindex_input, 2, '请输入正整数');
			t.eventStop();
			return;
		}
		var maxpage = parseInt(pageindex_input.attr('maxpage'));
		var pageurl = pageindex_input.attr('url');
		pageindex = parseInt(pageindex);
		if (pageindex > maxpage) {
			pageindex = maxpage;
		}
		window.location.href = pageurl.replace('_PAGE_', pageindex);
		t.eventStop();
		return;
	}
	
	/**
	 * 点击复制公用类
	 * @param  clip_container 复制按钮外容器
	 * @param  fe_text 被复制对象
	 * @param  clip_button 复制按钮
	 * @param  offsetx 提示框显示相对按钮的x轴偏移量
	 * @param  offsety 提示框显示相对按钮的y轴偏移量
	 * @param  delay 提示框显示时长
	 * example var test; $(function(){ test = HR.biz.clip('clip_container','fe_text','clip_button',-60,30,2000);})	
	 */
	HR.clip = function(clip_container, fe_text, clip_button, offsetx, offsety, delay) {
		dealy = delay || 2000;

		function _$(id) {
			return document.getElementById(id);
		}

		function init() {
			var clip = null;
			clip = new ZeroClipboard.Client();
			clip.setHandCursor(true);
			clip.addEventListener('mouseOver', function(client) {
				clip.setText(_$(fe_text).value || _$(fe_text).innerHTML);
			});

			clip.addEventListener('complete', function(client, text) {
				//判断浏览器版本
				var IE6 = ($.browser.msie && $.browser.version == '6.0');
				if (!IE6) {
					t.dialogTips($('#' + clip_container), '复制成功', offsety, offsetx, delay);
					_$(fe_text).select();
				} else {
					t.dialogTips($('#' + clip_container), '浏览器版本过底，请您手动复制。', offsety, offsetx - 60, delay);
					_$(fe_text).select();
				}
			});
			clip.glue(clip_button, clip_container);
			return clip;
		}
		return init();
	};
	/**
	 * post_html 返回html格式数据，支持错误状态
	 * @param posturl ajax提交url
	 * @param postdata ajax提交的数据 {}
	 * @param successhandle 正常返回数据时处理方法 function(errnum:int,errmsg:string,info:html)
	 * @param errorhandle ajax提交出现异常时的处理方法，默认不处理，
	 * @param sync 是否为同步，
	 */
	HR.post_html = function(posturl, postdata, successhandle, errorhandle, sync) {
		$.ajax({
			url: posturl,
			type: 'POST',
			dataType: 'xml',
			cache: false,
			data: postdata,
			async: !sync,
			success: function(xml) {
				var err = $(xml).find('root').find('error');
				var errnum = err.attr('code');
				var errmsg = err.text();
				var info = $(xml).find('root').find('info').text();
				var data = eval($(xml).find('data').text());
				successhandle(errnum, errmsg, info, data);
			},
			error: function(xml) {
				if (errorhandle)
					errorhandle('服务器超时，请重试!');
				else {
					//console.log('服务器返回数据格式出现异常');
				}
			}
		});
	};
	/**
	 * post_json 返回 json格式 
	 * @param posturl ajax提交url
	 * @param postdata ajax提交的数据 {}
	 * @param successhandle 正常回调函数 function(errnum:int,errmsg:string,info:html)
	 * @param errorhandle 异常回调函数，默认不处理，
	 * @param sync 是否为同步，
	 */
	HR.post_json = function(posturl, postdata, successhandle, errorhandle, sync) {
		$.ajax({
			url: posturl,
			type: 'POST',
			dataType: 'json',
			cache: false,
			data: postdata,
			async: !sync,
			success: function(data) {
				successhandle(data);
			},
			error: function() {
				if (errorhandle)
					errorhandle('服务器超时，请重试!');
				else {
					//console.log('服务器返回数据格式出现异常');
				}
			}
		});
	};
	/**
	 * get_jsonp 跨域方法调用
	 * @param geturl 地址
	 * @param callbackfunc 回调函数
	 */
	HR.get_jsonp = function(geturl, callbackfunc, data) {
		data = data || {};
		$.ajax({
			async: false,
			url: geturl,
			data: data,
			type: "GET",
			dataType: 'jsonp',
			jsonp: 'jsoncallback',
			timeout: 5000,
			success: function(jsonp) {
				callbackfunc(jsonp);
			}
		});
	};
	//实名认证
	HR.realname = function(obj,callback) {
		var _obj = $(obj);
		//实名认证弹窗模版
		var getHtml = function() {
			var tmpl = '<div class="pop-realname">' +
				'<div class="pop-rn-bg"></div>' +
				'<div class="pop-rn-cont">' +
				'<span class="closebtn"></span>' +
				'<h1>实名认证</h1>' +
				'<p class="intro">为了保证您账户的安全及正常使用，依《网络安全法》相关要求，2017年10月1日起所有用户账号需要进行实名认证（后台实名、前台自愿），请选择以下任意方式进行认证。感谢您的理解与支持！</p>' +
				'<div class="ctbox box">' +
				'<ul class="tab box" style="display:none;">' +
				'<li class="bdm active"><span>绑定手机</span></li>' +
				'<li class="idc" ><span>身份证认证</span></li>' +
				'</ul>' +
				'<ul class="ct-ul">' +
				'<li class="active">' +
				'<div class="bindmobile">' +
				'<div class="items rn_mobile">' +
				'<input type="text" name="rn-mobile" class="rn-mobile" id="rn_mobile" maxlength="11" value="" placeholder="请输入手机号"></input>' +
				'</div>' +
				'<div class="items rn_imgcode">' +
				'<input type="text" name="rn-imgcode" class="rn-code" id="rn_imgcode1" maxlength="4" value="" placeholder="请输入图形验证码"></input>' +
				'<img src="" id="rn_imgcode_1" title="点击图片可更换验证码" alt="图形验证码" />' +
				'</div>' +
				'<div class="items rn_smscode">' +
				'<input type="text" name="rn-imgcode" class="rn-code" id="rn_smscode" maxlength="5" value="" placeholder="请输入短信验证码"></input>' +
				'<span class="rn_sendsmsbtn">发送验证码</span>' +
				'</div>' +
				'</div>' +
				'<div class="rn_tipbox"></div>' +
				'<div class="btnbox">' +
				'<input type="button" class="binddebtn" id="bindmobilebtn" value="确定">' +
				'</div>' +
				'</li>' +
				'<li style="display: none;" >' +
				'<div class="bindidcard">' +
				'<div class="items rn_mobile">' +
				'<input type="text" name="rn-name" class="rn-name" id="rn_name" value="" placeholder="姓名"></input>' +
				'</div>' +
				'<div class="items rn_smscode">' +
				'<input type="text" name="rn-idcard" class="rn-idcard" id="rn_idcard" maxlength="18" value="" placeholder="请输入身份证号"></input>' +
				'</div>' +
				// '<div class="items rn_imgcode rn_imgcode_2">'+
				// 	'<input type="text" name="rn-imgcode" class="rn-code" id="rn_imgcode2" maxlength="4" value="" placeholder="请输入图形验证码"></input>'+
				// 	'<img src="" id="rn_imgcode_2" title="点击图片可更换验证码" alt="图形验证码" />'+
				// '</div>'+
				'</div>' +
				'<div class="rn_tipbox"></div>' +
				'<div class="btnbox">' +
				'<input type="button" class="binddebtn" id="bindidcbtn" value="确定">' +
				'</div>' +
				'</li>' +
				'</ul>' +
				'<p class="idintro"></p>' +
				'</div>' +
				'</div>' +
				'</div>';
			return tmpl;
		};
		//设置高度
		var setPositon = function(node) {
			$(node).find('.pop-rn-cont').css({
				'margin-top': -($(node).find('.pop-rn-cont').outerHeight() / 2) + 'px'
			});
		};
		//获取图形验证码
		var getVerifyCode = function(object) {
			var $this = $(object);
			var _url = verifycode();
			$this.attr('src', _url);

			//绑定验证码事件
			$this.off().on('error click', function(e) {
				getVerifyCode(this);
				t.eventStop();
				return false;
			});
			t.eventStop();
			return false;
		};
		//提示信息
		var errorTip = function(node, text, time) {
			var $node = $(node).find('.rn_tipbox');
			var _time = time || 2000;
			$node.show().html('<span>' + text + '</span>');
			setTimeout(function() {
				$node.fadeIn().html('');
				setPositon(node);
			}, _time);
		};
		//获取短信验证码
		var getSmsCode = {
			//发送短信验证码
			send: function(object, node) {
				// 手机号码
				var $node = $(node),
					object = $(object),
					$mobile = $node.find("#rn_mobile"),
					$img = $node.find("#rn_imgcode1"),
					$mobileval = $.trim($mobile.val()),
					$ImgCode = $.trim($img.val());

				var _POST_URL = '/hr/api/index/sendSms';

				if (!(/^1[0-9]{10}$/.test($mobileval)) || isNaN($mobileval) || $mobileval.length != 11) {
					errorTip($node, '手机号码不正确，请重新输入！');
					t.eventStop();
					return;
				};
				if ($ImgCode == '' || $ImgCode == null) {
					errorTip($node, '请输入图形验证码！');
					t.eventStop();
					return;
				};
				//如果 send_num 发送短信的按钮 nosend为true, 按钮失效; 不能点击;
				if ($(object).attr('nosend')) {
					t.eventStop();
					return false;
				};
				//发送短信验证码延迟提示信息
				$(object).text("正在发送").attr('nosend', 'true');

				HR.post_json(_POST_URL, {
					"mobile": $mobileval,
					"code": $ImgCode
				}, function(res) {
					switch (res.result) {
						case 1:
							errorTip($node, res.msg);
							$(object).text("重新发送").removeAttr('nosend');
							break;
						case 0:
							$(object).addClass('unable').attr('nosend', 'true').text("已发送 （120s）");
							getSmsCode.countDown(object);
							break;
					}
				});
				t.eventStop();
			},
			/**
			 * 发送短信，120秒倒计时
			 */
			countDown: function(object) {
				// 获取按钮文本
				var btn_text = $(object).text();
				// 获取当前秒数
				var num = parseInt(btn_text.replace(/[^0-9]+/g, ''));
				// 倒计时未结束
				if (--num > 0) {
					// 更新按钮文本
					$(object).text(num + "秒");
					// 1秒后继续执行倒计时
					setTimeout(function() {
						getSmsCode.countDown(object);
					}, 1000);
					// 倒计时结束
				} else {
					$(object).text("重新发送").removeClass('unable').removeAttr('nosend');
				}
			}
		};
		// 实名认证(绑定手机)
		var bindMobile = function(object, node) {
			var $object = $(object),
				$node = $(node),
				$mobile = $.trim(node.find('#rn_mobile').val()),
				$imgcode = $.trim(node.find('#rn_imgcode1').val()),
				$smscode = $.trim(node.find('#rn_smscode').val());

			var _POST_URL = '/hr/api/user/mobile_bind';

			if (!(/^1[0-9]{10}$/.test($mobile)) || isNaN($mobile) || $mobile.length != 11) {
				errorTip($node, '手机号码不正确，请重新输入！');
				return;
			};
			if ($imgcode == '' || $imgcode.length < 1 || $imgcode == null) {
				errorTip($node, '请输入图形验证码！');
				return;
			};
			if ($smscode == '' || $smscode.length < 1 || $smscode == null) {
				errorTip($node, '请输入短信验证码！');
				return;
			};

			if ($object.attr('nosend')) {
				t.eventStop();
				return;
			};
			$object.attr('nosend', 'true').addClass('unable').val('正在认证...');

			HR.post_json(_POST_URL, {
				"mobile": $mobile,
				"imgcode": $imgcode,
				"verifycode": $smscode
			}, function(res) {
				if (res.result == 0) {
					$node.fadeOut().remove();
					t.tips(window, 1, '绑定成功！', null, 3000, function(){					
						if (callback && typeof(callback) == 'function') {
							callback(_obj);
						};
					});
				} else {
					errorTip($node, res.msg);
				};
				$object.removeAttr('nosend').removeClass('unable').val('确定');
			});
			t.eventStop();
		};
		//实名认证(身份证认证)
		var bindIDCard = function(object, node) {
			var $object = $(object),
				$node = $(node),
				$name = $.trim(node.find('#rn_name').val()),
				//$imgcode = $.trim(node.find('#rn_imgcode2').val()),
				$idcard = $.trim(node.find('#rn_idcard').val());

			var _POST_URL = CONFIG.SERVER_HOST + 'uc/auth/save';

			if ($name == '' || $name == null) {
				errorTip($node, '姓名不正确，请重新输入！');
				return;
			};
			// if ($imgcode == '' || $imgcode.length < 1 || $imgcode == null) {
			// 	errorTip($node,'请输入图形验证码！');
			// 	return;
			// };
			if ($idcard == '' || $idcard == null) {
				errorTip($node, '身份证号不正确，请重新输入！');
				return;
			};

			if ($object.attr('nosend')) {
				t.eventStop();
				return;
			};
			$object.attr('nosend', 'true').addClass('unable').val('正在认证...');

			HR.post_json(_POST_URL, {
				"name": $name,
				//"imgcode": $imgcode,
				"cert_no": $idcard
			}, function(res) {
				if (res.result == 0) { //绑定成功
					$node.fadeOut().remove();
					t.tips(window, 1, '绑定成功！', null, 3000, function(){					
						if (callback && typeof(callback) == 'function') {
							callback(_obj);
						};
					});
				} else if (res.result == 2) { //未登录
					location.href = CONFIG.HRLOO_LOGINURL;
				} else if (res.result == 3) { //超过请求次数
					errorTip($node, '请求错误次数过多，请明天再试！');
				} else {
					errorTip($node, res.msg);					
				};
				$object.removeAttr('nosend').removeClass('unable').val('确定');
			});
			t.eventStop();
		};

		if (_obj.attr('nosend')) {
			t.eventStop();
			return;
		};
		_obj.attr('nosend', 'true');

		//判断是否已经实名认证
		HR.get_jsonp('/hr/uc/auth/show&t=' + (new Date()).getTime(), function(data) {
			if (data.result == 1) { //未认证
				var $node = $(getHtml());
				$('body').append($node);

				setPositon($node);
				//tab选择认证方式
				$node.off('tab').on('click.tab', 'ul.tab li', function(e) {
					var _index = $(this).index();
					if (_index == 0) {
						//填充绑定手机验证码
						// getVerifyCode($node.find('img#rn_imgcode_1'));
						$node.find('p.idintro ').hide();
					} else if (_index == 1) {
						//填充身份证认证验证码
						// getVerifyCode($node.find('img#rn_imgcode_2'));
						$node.find('p.idintro ').show();
					};
					$(this).addClass('active').siblings('li').removeClass('active');
					$node.find('ul.ct-ul li').eq(_index).show().siblings('li').hide();
					setPositon($node);
					t.eventStop();
					return false;
				});
				//填充默认的绑定手机的图片验证码
				getVerifyCode($node.find('img#rn_imgcode_1'));
				//发送短信验证码
				$node.off('click.sms').on('click.sms', '.rn_sendsmsbtn', function(e) {
					getSmsCode.send(this, $node);
					t.eventStop();
					return false;
				});
				//绑定手机认证
				$node.off('click.bindmb').on('click.bindmb', '#bindmobilebtn', function(e) {
					bindMobile(this, $node);
					t.eventStop();
					return false;
				});
				//认证身份证信息事件
				$node.off('click.idc').on('click.idc', '#bindidcbtn', function(e) {
					bindIDCard(this, $node);
					t.eventStop();
					return false;
				});
				//关闭弹窗
				$node.off('click.rnclose').on('click.rnclose', 'span.closebtn', function(e) {
					$node.off().fadeOut().remove();
					t.eventStop();
					return false;
				});
			} else if (data.result == 2) { //未登录
				location.href = CONFIG.HRLOO_LOGINURL;
			} else{ //已经认证过
				if (callback && typeof(callback) == 'function') {
					callback(_obj);
				};
			};

			_obj.removeAttr('nosend');
			t.eventStop();
			return;
		});
		t.eventStop();
	};

	HR.biz = HR.biz || {}
	/**
	 *显示验证码操作类
	 */
	HR.biz.chk = {
		status: 1, //1:初始，2：显示，3：隐藏

		stepsCtrlArr: [], // 点击时显示的数字的数组, 形式: [[x, y], [x, y], ...]

		formatHrvcode4api: function(stepsArr){
			return $.map(stepsArr || HR.biz.chk.stepsCtrlArr, function(v) {
				return v.join(',');
			}).join(';');
		},

		// 用于 字母+数字式的验证码刷新
		changevcode: function() {
			var codeurl = 'http://' + document.domain + '/hrloo.php?m=api&c=index&a=verifycode&height=47&width=120&font_size=16&time=' + (new Date()).getTime();
			$("#hrvimg").attr('src', codeurl);
			$("#hrvcode").val('').focus();
		},

		setposition: function(followObj) {
			var followObj = $(followObj);
			var left = followObj.offset().left + followObj.outerWidth() - 200;
			var top = followObj.offset().top - 160;
			$('.hr-verify').css({
				left: left,
				top: top
			});
			var obj = $('.aui_state_lock');
			if (obj.length > 0) {
				var zindex = obj.css('z-index');
				$('.j_vcode').css('z-index', zindex + 1);
			}
		},

		// 显示需要点击的验证码
		// 此方法用于验证码是一张图片(<img src=""/>)的情况, 已经废弃
		changeClickCode: function() {
			var codeurl = 'http://' + document.domain + '/hrloo56.php?m=api&c=index&a=verifycode2&time=' + (new Date().getTime())
			$("#hrvimg").attr('src', codeurl);
			$("#hrvcode").val('').focus();
		},

		// 刷新验证码(背景)
		refreshCaptchaBg: function(returnUrl) {
			var captchaUrl = '/hrloo.php?m=api&c=index&a=verifycode2&time=' + (new Date().getTime());
			try {
				if (returnUrl) {
					return captchaUrl;
				}

				fillHtml();
			} catch (e) {
				console.log(e);
			}

			function fillHtml() {
				var $captchaImgCon = $('#captchaImgCon');
				var $hrvimg =  $('#hrvimg');

				if (!$captchaImgCon.length || !$hrvimg.length) {
					return;
				}

				var $bgBlocks = $hrvimg.find('i');

				// 没有对应的html结构时再获取
				if (!$bgBlocks.length) {
					$hrvimg.html($captchaImgCon.html())
						.addClass($captchaImgCon.attr('class'));
				}

				$bgBlocks.css('background-image', 'url(' + captchaUrl + ')');
				HR.biz.chk.stepsCtrlArr = [];
				$('.hrClickStep').remove();
        // $('#hrvcode_err').hide();
			}
		},

		setClickposition: function(followObj) {
			var $hrVerify = $('.hr-verify');
			var followObj = $(followObj);

			if (!$hrVerify.length || !followObj.length) {
				return;
			}

			var left = followObj.offset().left + followObj.outerWidth() - $hrVerify.outerWidth();
			var top = followObj.offset().top - 300;

			left = Math.max(left, 10); // 最左为10, 不然有时就隐藏了

			$hrVerify.css({
				left: left,
				top: top
			});

			// 确定hr-verify下边的小箭头的位置(指向followObj的, 一般为提交按钮)
			var $arr = $hrVerify.find('.arr');
			if ($arr.length) {
				$arr.css({
					left: followObj.offset().left + followObj.outerWidth() / 2 - left - $arr.outerWidth() / 2
				});
			}

			var obj = $('.aui_state_lock');
			if (obj.length > 0) {
				var zindex = obj.css('z-index');
				$('.j_vcode').css('z-index', zindex + 1);
			}
		},
	};
	/**
	 *弹出验证码
	 * @param callbackfnuc 提交回调事件
	 * @param 错误参数
	 * @param followobj 跟随对象
	 */
	HR.biz.chk.popVcode = function(callbackfunc, errmsg, followObj, closefunc) {
		if (HR.biz.chk.status == 3) {
			$('.j_vcode').show();
		} else if (HR.biz.chk.status == 1) {
			var pophtml = '<div class="hr-pop-verify j_vcode">' +
				'<div class="hr-pop-op"></div>' +
				'</div>' +
				'<div class="hr-verify j_vcode">' +
				'<div class="v-inner">' +
				'<div class="clearfix"><a href="javascript:;" id="hrvcodeclose" class="close r">关闭</a></div>' +
				'<div class="mt10 clearfix"><input class="v-txt" type="text" id="hrvcode" maxlength="4" /><a href="javascript:;" class="v-send" id="hrvcodesubmit">提交</a></div>' +
				'<div class="mt3 clearfix"><span class="v-error" id="hrvcode_err">请输入内容!</span></div>' +
				'<div class="mt10 clearfix">' +
				'<span class="v-img"><img src="" id="hrvimg" width="120" height="47" /></span>' +
				'<a href="javascript:;" id="hrchangevocde" class="v-change">换一换</a>' +
				'</div>' +
				'<span class="arr"></span>' +
				'</div>' +
				'</div>';
			$('body').append(pophtml);
			$('#hrchangevocde').click(function() {
				HR.biz.chk.changevcode();
			});
			$('#hrvcodeclose').click(function() {
				$('.j_vcode').hide();
				HR.biz.chk.status = 3;
				HR.dom.set_disable(followObj, false);
				if (closefunc) {
					closefunc();
				}
			});
		}
		$('#hrvcode_err').hide();
		//启用按钮
		var click_ele = $('#hrvcodesubmit').get(0);
		HR.dom.set_disable(click_ele, false);
		if (errmsg) {
			$('#hrvcode_err').text(errmsg).show();
		}
		$('#hrvcode').val('');
		HR.biz.chk.setposition(followObj);
		HR.biz.chk.changevcode();
		HR.biz.chk.status = 2;

		function sub_captcha() {
			if (HR.dom.check_disable(click_ele)) {
				HR.event.hdoane();
				return false;
			};
			HR.dom.set_disable(click_ele, true);
			var vcode = $('#hrvcode').val();
			vcode = $.trim(vcode);
			if (vcode.length != 4) {
				$('#hrvcode_err').text('请输入验证码').show();
				HR.dom.set_disable(click_ele, false);
				return;
			}
			//把自己关闭掉
			$('.j_vcode').hide();
			HR.biz.chk.status = 3;
			callbackfunc(vcode);
		}

		$('#hrvcodesubmit').unbind('click').click(function() {
			sub_captcha();
		});
		$('#hrvcode').unbind('keypress').keypress(function(event) {
			if (event.keyCode == 13) {
				sub_captcha();
			}
		});

		HR.event.hdoane();
		return false;
	};

	/**
	 * 验证码换成点击验证的形式
	 * @param callbackfunc
	 * @param errmsg
	 * @param followObj
	 * @param closefunc
	 * @returns {boolean}
	 */
	HR.biz.chk.popVcodeClick = function(callbackfunc, errmsg, followObj, closefunc, useApiChk) {

		if (HR.biz.chk.status == 3) {
			$('.j_vcode').show();
		} else if (HR.biz.chk.status == 1) {
			// <input class="v-txt" type="text" id="hrvcode" maxlength="4" />
			var pophtml = '<style>.clickStepp{color:#fff;font-size:16px;position:absolute;z-index:20;font-style: normal;display:block;border:1px solid #fff;border-radius:50%;width:26px;height:26px;text-align:center;line-height:26px;-webkit-user-select:none;user-select:none;transform:translate(-50%,-50%);font-weight:600;-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%); -ms-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);cursor: default;}</style>' +
				'<div class="hr-pop-verify j_vcode">' +
				'<div class="hr-pop-op"></div>' +
				'</div>' +
				'<div class="hr-verify j_vcode" style="width: 324px;height: 280px;">' +
				'<div class="v-inner" style="width: 100%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">' +
				'<div class="clearfix"><a href="javascript:;" id="hrvcodeclose" class="close" style="float: right;">关闭</a></div>' +
				'<div class="clearfix" style="margin-top:10px;">' +
				'<div class="v-img" style="position:relative;width: 100%;margin-right: 0;">' +
				// '<img src="" id="hrvimg" style="width: 100%;height: 180px;"/>' +
				'<div id="hrvimg" style="height: 180px; overflow: hidden;"></div>' +
				'</div>' +
				'</div>' +
				'<div class="clearfix" style="margin-top:10px;">' +
				'<a href="javascript:;" id="hrchangevocde" class="v-change" style="line-height: 2;">换一换</a>' +
				'<a href="javascript:;" class="v-send" id="hrvcodesubmit" style="">验证</a>' +
				'</div>' +
				'<input id="hrvcode" style="display: none;"/>' +
				'<div class="mt3 clearfix"><span class="v-error" id="hrvcode_err">验证失败，请重试!</span></div>' +
				'</div>' +
				'<span class="arr" style="bottom: -12px;"></span>' +
				'</div>';
			$('body').append(pophtml);
			$('#hrchangevocde').click(function() {
				HR.biz.chk.stepsCtrlArr = [];
				$('.hrClickStep').remove()
				HR.biz.chk.refreshCaptchaBg();
			});
			$('#hrvcodeclose').click(function() {
				HR.biz.chk.stepsCtrlArr = [];
				$('.hrClickStep').remove()
				$('.j_vcode').hide();
				HR.biz.chk.status = 3;
				HR.dom.set_disable(followObj, false);
				if (closefunc) {
					closefunc();
				}
			});

			HR.biz.chk.refreshCaptchaBg();
		}

		var $hrvimg = $('#hrvimg');

		// 按钮点击
		$hrvimg.off('click').on('click', function(e) {
			e.stopPropagation();
			var posX, poxY;

			var stepsCtrlArr = HR.biz.chk.stepsCtrlArr;
			if (stepsCtrlArr.length >= 4) {
				return;
			} else {
				posX = e.pageX - $hrvimg.offset().left;
				poxY = e.pageY - $hrvimg.offset().top;
				stepsCtrlArr.push([
					parseInt(posX),
					parseInt(poxY)
				]);
			}

			var _dom = $('<i></i>');
			_dom.css({
				left: posX + 'px',
				top: poxY + 'px'
			})
			.data('order', stepsCtrlArr.length)
			.addClass('hrClickStep clickStepp')
			.text(stepsCtrlArr.length)
			.appendTo($(this).parent());
		});

		$('.v-img').off('click', '.clickStepp')
		.on('click', '.clickStepp', function(e) {
			e.stopPropagation();
			var $this = $(this);

			var order = +$this.data('order');
			var len = HR.biz.chk.stepsCtrlArr.length;
			if (order == len) { // 点击的是最后一个
				$this.remove();
				HR.biz.chk.stepsCtrlArr.splice(len - 1, 1);
			}
			return false;
		});

		$('#hrvcode_err').hide();
		//启用按钮
		var click_ele = $('#hrvcodesubmit').get(0);
		HR.dom.set_disable(click_ele, false);
		if (errmsg) {
			$('#hrvcode_err').text(errmsg).show();
		}
		HR.biz.chk.stepsCtrlArr = [];
		HR.biz.chk.setClickposition(followObj);
		HR.biz.chk.refreshCaptchaBg();
		HR.biz.chk.status = 2;

		// 验证码
		function sub_captcha() {
			if (HR.dom.check_disable(click_ele)) {
				HR.event.hdoane();
				return false;
			};
			HR.dom.set_disable(click_ele, true);
			var vcode = HR.biz.chk.formatHrvcode4api();
			if (HR.biz.chk.stepsCtrlArr.length != 4) {
				$('#hrvcode_err').text('验证失败').show();
				HR.dom.set_disable(click_ele, false);
				return;
			}

			if (useApiChk) {
				HR.biz.chk.chkVerifycode2(vcode, function(data) {
					HR.biz.chk.status = 3;
					//把自己关闭掉
					$('.j_vcode').hide();
					callbackfunc(vcode, data);
				}, function(err) {
					$('#hrvcode_err').text(err.msg).show();
					HR.biz.chk.refreshCaptchaBg();
					HR.dom.set_disable(click_ele, false);
				});
			} else {
					HR.biz.chk.status = 3;
					//把自己关闭掉
					$('.j_vcode').hide();
					callbackfunc(vcode);
			}
		}

		$('#hrvcodesubmit').unbind('click').click(function() {
			sub_captcha();
		});
		$('#hrvcode').unbind('keypress').keypress(function(event) {
			if (event.keyCode == 13) {
				sub_captcha();
			}
		});

		HR.event.hdoane();
		return false;
	};

	/**
	 *检测并弹出验证码提交框
	 * @param submitfunc 提交方法
	 * @param followObj  跟限对像 jquery对像
	 * @param module 模块名称   1:其也(辨论赛，面对面等)  2:全局评论  3:总结  4:学习笔记
	 * 5:小组话题  6:小组话题评论  7:班级话题  8:班级话题评论 9,课程视频内页
	 * 12: 上传资料
	 */
	HR.biz.chk.submit = function(submitfunc, followObj, module, closefunc) {
		HR.ajax.post_json('/hrloo.php?m=api&c=index&a=chk', {
			'mod': module
		}, function(json) {
			if (json.result == 100) {
				location.href = HRLOO_LOGINURL;
			} else if (json.result == 101) {
				// console.info(module)
				// 更改
				// return
				if (module === 3 || module === 5) {
					HR.biz.chk.popVcodeClick(submitfunc, null, followObj, closefunc);
				} else {
					HR.biz.chk.popVcode(submitfunc, null, followObj, closefunc);
				}
			} else {
				submitfunc();
			}
		});
		HR.event.hdoane();
	};

	HR.biz.chk.chkVerifycode2 = function(data, callback, errorCallback) {
		// https://www.hrloo.com/hrloo.php?m=api&c=index&a=chkVerifycode2
		HR.ajax.post_json('/hrloo.php?m=api&c=index&a=chkVerifycode2', {
			hrvcode: data
		}, function(data) {
			if (data && data.result == 0) {
				callback && callback(data);
			} else {
				errorCallback && errorCallback(data);
			}
		});
	};

	// 上传资料13, 专题资料上传: 12
	HR.biz.chk.needShowCaptcha = function(module, callback) {
		HR.ajax.post_json(HR.tool.replaceURL(document.location.protocol + '//' + document.domain + '/hrloo.php?m=api&c=index&a=chk'), {
			'mod': module
		}, function(json) {
			if (json.result == 100) {
				location.href = HRLOO_LOGINURL;
			} else if (json.result == 101) {
				callback(true);
			} else {
				callback(false);
			}
		});
	};

	// 广告点击代码
    window.adv_addClick = function(id){
			// protocal => http: / https:
			var apiUrl = location.protocol + '//' + location.host;
	    var postUrl = apiUrl + "/hrloo.php?m=global&c=api&a=hit";
	    $.ajax({
	            cache:false,
	            type:"get",
	            url:postUrl,
	            data:{
	                id:id,
	                type:3
	            },
	            dataType:"JSONP",
	            success:function(data){
	            },
	            error:function(){}
	        });
	}

	exports.verifycode = verifycode;
	exports.getPageskipNumber = getPageskipNumber;

});