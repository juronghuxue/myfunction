/**
 * 描述：略
 * @authors arttanzl (630804990@qq.com)
 * @date    2017-02-23 14:09:22
 * @version version v1.0
 */

define(function(require, exports, module) {

    if (!window.jQuery || !window.$) {
        var $ = require('global/js/jquery-1.8.0.min.js');
    } else {
        var $ = window.jQuery || window.$;
    }

    var core_slice = [].slice;

    // 空函数, 占位用
    function noop() {}

    /**
     * 运行一个函数
     * @param {*} context this对象 可选
     * @param {Function} fn 要运行的函数 可选
     * @param {*} args 参数列表 可选
     * 
     * 调用方法: 1. 无this: run(fn, thisObj(没有就传null), arg1, arg2, ... argN);
     */
    function run(fn, context) {
        return typeof fn === 'function' ? fn.apply(context, core_slice.call(arguments, 2)) : fn;
    }

    // 格式化日期显示
    // 日期对象
    // var now = new Date();
    // 传入格式化模板
    // var nowStr1 = now.format('yyyy年MM年dd日 hh时mm分ss秒');
    // 2016年02年24日 16时38分28秒
    // var nowStr2 = now.format('yyyy-MM-dd hh:mm:ss');
    // 2016-02-24 16:37:57
    // var nowStr3 = now.format('yyyy/MM/dd/ hh-mm-ss');
    // 2016/02/24/ 16-37-17
    Date.prototype.format = function(format) {
        var o = {
            "M+": this.getMonth() + 1, //month
            "d+": this.getDate(), //day
            "h+": this.getHours(), //hour
            "m+": this.getMinutes(), //minute
            "s+": this.getSeconds(), //second
            "q+": Math.floor((this.getMonth() + 3) / 3), //quarter
            "S": this.getMilliseconds() //millisecond
        };
        if (/(y+)/.test(format)) format = format.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
            if (new RegExp("(" + k + ")").test(format))
                format = format.replace(RegExp.$1,
                    RegExp.$1.length == 1 ? o[k] :
                    ("00" + o[k]).substr(("" + o[k]).length));
        return format;
    };

    //通用加载简单的编辑器
    var loadSimpleEditor = function(htmlID, areaWidth, areaHeight, uploadUrl, fileManagerJson) {
        if (window.KindEditor) {
            var KindEditor = window.KindEditor;
            var defaultVal = $(htmlID).val();
            KindEditor.ready(function(K) {
                window.editor = K.create(htmlID, {
                    width: '98%',
                    width: areaWidth ? areaWidth : '98%',
                    height: areaHeight ? areaHeight : '400px',
                    items: ['source', 'plainpaste', 'wordpaste', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                        'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                        'insertunorderedlist', '|', 'emoticons', 'image', 'link', '|', 'clearhtml', 'preview', 'fullscreen'
                    ],
                    resizeType: 0,
                    uploadJson: uploadUrl ? uploadUrl : 'http://www.hrloo.com/hrloo.php?m=attachment&c=index&a=ajax_uploadfile',
                    fileManagerJson: fileManagerJson ? fileManagerJson : null,
                    allowFileManager: true,
                    afterBlur: function() {
                        this.sync();
                        var newhtml = this.html();
                        if (newhtml != defaultVal) {
                            $(htmlID).trigger("change");
                        }
                    },

                    /**
                     * Add wanjilong/2017-08-22
                     * Reason: 招聘论坛评论部分用的是富文本, 
                     *     无法在afterBlur时同时修改原始textarea内容,
                     *     导致"发表"按钮状态无法改变
                     *
                     * 注意: 如果对之前业务千万影响, 回退及可, 论坛部分会有瑕疵, 但不影响使用.
                     * 富文本编辑器内容变化后同步内容到原始textarea, 
                     * @return {[type]} [description]
                     */
                    afterChange: function() {
                        this.sync();
                        var newhtml = this.html();
                        // 这里加上if后, 内容变化不触发
                        // if(newhtml != defaultVal){
                        $(htmlID).trigger("change");
                        // }
                    }
                });
                // editor.sync();
            });
        } else {
            alert('KindEditor undefined!');
            return;
        }
    };

    /**
     * 通用加载简单的编辑器2
     *     options请查看: http://kindeditor.net/docs/option.html
     * @param  {string} htmlID  textarea的id
     * @param  {object} options kindeditor的配置参数对象
     */
    var loadSimpleEditor2 = function(htmlID, options) {

        var defaults = {
            width: '98',
            height: '400px',
            items: ['source', 'plainpaste', 'wordpaste', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link', '|', 'clearhtml', 'preview', 'fullscreen'
            ],
            resizeType: 0, // 2或1或0，2时可以拖动改变宽度和高度，1时只能改变高度，0时不能拖动。
            uploadJson: '/hrloo.php?m=attachment&c=index&a=ajax_uploadfile',
            allowFileManager: true,
            afterBlur: function() {
                this.sync();
                var newhtml = this.html();
                if (newhtml != defaultVal) {
                    $(htmlID).trigger("change");
                }
            },
            afterChange: function() {
                this.sync();
                var newhtml = this.html();
                // 这里加上if后, 内容变化不触发
                // if(newhtml != defaultVal){
                $(htmlID).trigger("change");
                // }
            },
            afterFocus: function(K) {
                this.sync();
                $(htmlID).trigger("change");
            }
        };

        options = $.extend(true, defaults, options);

        if (window.KindEditor) {
            var KindEditor = window.KindEditor;
            var defaultVal = $(htmlID).val();
            KindEditor.ready(function(K) {

                // 全局变量以HR_开头, 避免重名
                // window.editor兼容之前的写法
                window.HR_RICH_EDITOR = window.editor = K.create(htmlID, options);

                if (options.initVal) {
                    HR_RICH_EDITOR.html(options.initVal);
                }
            });
        } else {
            alert('KindEditor undefined!');
            return;
        }
    };

    /**
     * @得到数据类型 (加强型数据检测)
     * @method typefor
     * @param {Object} [obj] 必选，数据
     * @param {RegExp} [type] 可选，数据类型正则表达式
     * Return {Boolean|String} 传入数据类型正则，则返回Boolean，否则返回数据类型String
     * typefor(object,/String/);
     */
    var typefor = function(obj, type) {
        var oType = {
                '[object Boolean]': 'Boolean',
                '[object Number]': 'Number',
                '[object String]': 'String',
                '[object Function]': 'Function',
                '[object Array]': 'Array',
                '[object Date]': 'Date',
                '[object RegExp]': 'RegExp',
                '[object Object]': 'Object'
            },
            ret = obj == null ? String(obj) : oType[Object.prototype.toString.call(obj)] || 'Unknown';
        return type ? type.test(ret) : ret;
    };

    // 获取浏览器版本
    // os: det.os,
    // engine: det.engine,
    // browser: det.browser,
    // version: det.version
    var getBrowser = function() {
        var ua = navigator.userAgent.toLowerCase(),
            re_msie = /\b(?:msie |ie |trident\/[0-9].*rv[ :])([0-9.]+)/;

        function toString(object) {
            return Object.prototype.toString.call(object);
        }

        function isString(object) {
            return toString(object) === "[object String]";
        }


        var ENGINE = [
            ["trident", re_msie],
            ["webkit", /\bapplewebkit[\/]?([0-9.+]+)/],
            ["gecko", /\bgecko\/(\d+)/],
            ["presto", /\bpresto\/([0-9.]+)/]
        ];

        var BROWSER = [
            ["ie", re_msie],
            ["firefox", /\bfirefox\/([0-9.ab]+)/],
            ["opera", /\bopr\/([0-9.]+)/],
            ["chrome", / (?:chrome|crios|crmo)\/([0-9.]+)/],
            ["safari", /\bversion\/([0-9.]+(?: beta)?)(?: mobile(?:\/[a-z0-9]+)?)? safari\//]
        ];

        // 操作系统信息识别表达式
        var OS = [
            ["windows", /\bwindows nt ([0-9.]+)/],
            ["ipad", "ipad"],
            ["ipod", "ipod"],
            ["iphone", /\biphone\b|\biph(\d)/],
            ["mac", "macintosh"],
            ["linux", "linux"]
        ];

        var IE = [
            [6, 'msie 6.0'],
            [7, 'msie 7.0'],
            [8, 'msie 8.0'],
            [9, 'msie 9.0'],
            [10, 'msie 10.0']
        ];

        var detect = function(client, ua) {
            for (var i in client) {
                var name = client[i][0],
                    expr = client[i][1],
                    isStr = isString(expr),
                    info;
                if (isStr) {
                    if (ua.indexOf(expr) !== -1) {
                        info = name;
                        return info
                    }
                } else {
                    if (expr.test(ua)) {
                        info = name;
                        return info;
                    }
                }
            }
            return 'unknow';
        };

        return {
            os: detect(OS, ua),
            browser: detect(BROWSER, ua),
            engine: detect(ENGINE, ua),
            //只有IE才检测版本，否则意义不大
            version: re_msie.test(ua) ? detect(IE, ua) : ''
        };
    };

    /**
     * 统计字符串的长度，汉字和全角当作一个字，字线和半角当作半个字
     * @param str 字符串 全角汉字为一个字符
     * @returns len 统计的长度
     */
    var fullStringLen = function(str) {
        var len = 0;
        var sem_len = 0;
        for (var i = 0; i < str.length; i++) {
            var strCode = str.charCodeAt(i);
            if (new RegExp('^[\\u4E00-\\u9FA5\\uF900-\\uFA2D]+$').test(str[i]) || strCode > 255)
                len += 1;
            else
                sem_len++;
        }
        if (sem_len % 2 === 0)
            len += Math.floor(sem_len / 2);
        else
            len += Math.ceil(sem_len / 2);
        return len;
    };

    /**
     * 统计字符串的长度，汉字和全角当作两个字符，字线和半角当作一个字符
     * @param str 字符串 半角字线为一个字符
     * @returns len 统计的长度
     */
    var halfStringLen = function(str) {
        var len = 0;
        for (var i = 0; i < str.length; i++) {
            var strCode = str.charCodeAt(i);
            if (new RegExp('^[\\u4E00-\\u9FA5\\uF900-\\uFA2D]+$').test(str[i]) || strCode > 255)
                len += 2;
            else
                len += 1;
        }
        return len;
    };

    // 在 input textarea 中插入字符
    var insertAtCaret = function(obj, str) {
        if (document.selection) {
            // obj.focus();
            // input.createTextRange();
            // range.collapse(true);
            // range.moveEnd('character', selectionEnd);
            // range.moveStart('character', selectionStart);
            // range.select();
            // ----------------------------
            // obj.focus();
            // var sel = document.selection.createRange();
            // sel.text = str;
            // sel.select();
            obj.value += str;
        } else if (typeof obj.selectionStart === 'number' && typeof obj.selectionEnd === 'number') {
            var startPos = obj.selectionStart,
                endPos = obj.selectionEnd,
                cursorPos = startPos,
                tmpStr = obj.value;
            obj.value = tmpStr.substring(0, startPos) + str + tmpStr.substring(endPos, tmpStr.length);
            cursorPos += str.length;
            obj.selectionStart = obj.selectionEnd = cursorPos;
        } else {
            obj.value += str;
        }
    };

    /**
     * getEvent 获取当前事件状态对象
     * @return Event    
     */
    var getEvent = function() {

        // 主要针对ie8
        if (document.attachEvent) {
            return window.event;
        }

        func = getEvent.caller;

        while (func != null) {
            var arg0 = func.arguments[0];
            if (arg0) {
                if ((arg0.constructor == Event || arg0.constructor == MouseEvent) || (typeof(arg0) == "object" && arg0.preventDefault && arg0.stopPropagation)) {
                    return arg0;
                }
            }
            func = func.caller;
        }
        return null;
    };

    /**
     * 通过当前事件状态对象获取当前触发事件的元素
     * @return Element
     */
    var eventTarget = function() {
        var e = getEvent();
        if (e) {
            return e.target || e.srcElement;
        } else {
            return null;
        }
    };

    /**
     * doane 阻止JS事件默认行为的发生和冒泡
     * @param event 事件状态对象
     * @param preventDefault 阻止默认行为
     * @param stopPropagation 阻止 冒泡
     */
    var eventStop = function(event) {
        e = event ? event : window.event;
        if (!e) {
            e = getEvent();
        }
        if (!e) {
            return null;
        }
        if (e.preventDefault) {
            e.preventDefault();
        } else {
            e.returnValue = false;
        }
        if (e.stopPropagation) {
            e.stopPropagation();
        } else {
            e.cancelBubble = true;
        }
        return e;
    };

    // 获取选择域位置，如果未选择便是光标位置
    var getSelection = function(el) {
        if ('selectionStart' in el) {
            var l = el.selectionEnd - el.selectionStart;
            return {
                start: el.selectionStart,
                end: el.selectionEnd,
                length: l,
                text: el.value.substr(el.selectionStart, l)
            };
        } else {
            return {
                start: el.value.length,
                end: el.value.length,
                length: el.value.length,
                text: el.value
            };
        }
    };

    /** 
     * 选中输入框内的内容
     * @param inputobj 对象或对象ID
     * @param selectionStart 开始处
     * @param selectionEnd 结束处
     */
    var setSelection = function(inputobj, selectionStart, selectionEnd) {
        input = $(inputobj).get(0);
        if (!input) {
            return false;
        }
        if (input.createTextRange) {
            var range = input.createTextRange();
            range.collapse(true);
            range.moveEnd('character', selectionEnd);
            range.moveStart('character', selectionStart);
            range.select();
        } else if (input.setSelectionRange) {
            input.focus();
            input.setSelectionRange(selectionStart, selectionEnd);
        }
    };

    /**
     * 设置光标的位置
     * @param elemobj 对象
     * @param position 位置
     */
    var setCursorPosition = function(elemobj, position) {
        var obj = $(elemobj).get(0);
        if (!obj) {
            return false;
        }
        setSelection(obj, position, position);
    };

    /** 将光标设置到输入框的最后
     *@param str 对象或对象ID
     */
    var setCursorEnd = function(elemobj) {
        var obj = $(elemobj).get(0);
        if (!obj) {
            return false;
        }
        setCursorPosition(obj, obj.value.length);
    };

    // JS 对中英文混编的字符串进行截取
    // 测试 alert(subString("js字符串test截取测试",5,"……")); 
    var subString = function(str, len, preStr) {
        var newLength = 0;
        var newStr = "";
        var chineseRegex = /[^\x00-\xff]/g;
        var singleChar = "";
        var strLength = str.replace(chineseRegex, "**").length;
        for (var i = 0; i < strLength; i++) {
            singleChar = str.charAt(i).toString();
            if (singleChar.match(chineseRegex) != null) {
                newLength += 2;
            } else {
                newLength++;
            }
            if (newLength > len) {
                break;
            }
            newStr += singleChar;
        }
        if (strLength > len) {
            if (preStr && preStr.length > 0) {
                newStr += preStr;
            }
        }
        return newStr;
    };

    // 返回当前地址前缀
    var getUrlPre = function() {
        var url = window.location.href.toString();
        var hostName = window.location.host.toString();
        var hostPrevLen = url.indexOf(hostName);
        var hostNameLen = hostName.length;
        return url.substr(0, hostPrevLen + hostNameLen);
    };

    // 是否同一个域名之下
    var isSameDomain = function(url) {
        var current = window.location.host.toString();
        if (url.indexOf(current) >= 0) {
            return true;
        } else {
            return false;
        }
    };

    /** 动态获取图片的宽度和高度的像素值 
     * 
     * @param sUrl 图片的url 
     * @param fCallback 回调函数，fCallback至少有一个类型为object类型的参数用来接收图片的宽、高、url 
     * usage: 
     * var url = "http://mat1.gtimg.com/datalib_img//11-05-26/c/c21ff1138e7349859b49b99312d05baf.jpg"; 
     * FGetImg(url, function(img){alert('width:'+img.width+";height:"+img.height+";url:"+img.url);}); 
     * 
     */
    var getImgSize = function(sUrl, callback) {
        var img = new Image();
        img.src = sUrl + '?t=' + Math.random(); // IE下，ajax会缓存，导致onreadystatechange函数没有被触发，所以需要加一个随机数  
        var FBrowser = getBrowser(); // 获得浏览器版本

        if (FBrowser.browser == "ie" && FBrowser.version < 10) {
            img.onreadystatechange = function() {
                if (this.readyState == "loaded" || this.readyState == "complete") {
                    callback({
                        width: img.width,
                        height: img.height,
                        url: sUrl
                    });
                }
            };
        } else {
            img.onload = function() {
                callback({
                    width: img.width,
                    height: img.height,
                    url: sUrl
                });
            };
        }
    };


    // 获取地址栏中某一个参数的值
    // alert(getUrlParam("name"));
    var getUrlParam = function(name, search) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
        var r = (search || window.location.search).substr(1).match(reg);
        if (r != null) {
            return unescape(r[2]);
        }
        return null;
    };


    // 得到地址栏中的 get参数 数组
    // var requestArr = getUrlParamJson();
    // alert(requestArr['参数']);
    var getUrlParamJson = function(search) {
        // 获取url中"?"符后的字串
        var url = search || location.search;
        var theRequest = new Object();
        if (url.indexOf("?") != -1) {
            var str = url.substr(1);
            strs = str.split("&");
            for (var i = 0; i < strs.length; i++) {
                theRequest[strs[i].split("=")[0]] = unescape(strs[i].split("=")[1]);
            }
        }
        return theRequest;
    };

    /* 
     * 用途：基于时间戳生成20位全局唯一标识（每一毫秒只对应一个唯一的标识，适用于生成DOM节点ID） 
     */
    var randID = function(len) {
        var timestamp = new Date().getTime() || 0,
            chars = 'abcdefghijklmnopqrstuvwxyz',
            uuid = '';
        this.timestamp = this.timestamp == timestamp ? timestamp + 1 : timestamp;
        timestamp = '' + this.timestamp;
        len = len || 20;
        for (var i = 0; i < len; i++) {
            var k = timestamp.charAt(i);
            if (k == '') {
                k = Math.floor(Math.random() * 26);
            }
            uuid += chars.charAt(k) || 'x';
        }
        return uuid;
    };

    /*
     * 用途：动态加载 link css文件
     * @param {string} [url] css样式地址
     * @param {string} [cssID] css link ID
     * @param {string} [target] 是否添加到父页面
     */
    var addCssLink = function(url, cssID, target) {
        // 没有此链接，动态加载
        if (url) {
            var link = document.createElement('link');
            link.id = cssID ? cssID : "";
            link.href = url;
            link.rel = 'stylesheet';
            link.type = 'text/css';
            if (target == 'parent') {
                window.parent.document.getElementsByTagName("HEAD").item(0).appendChild(link);
            } else {
                document.getElementsByTagName("HEAD").item(0).appendChild(link);
            }
        }
    };

    /*
     * 用途：为页面增加一段 cssText到头部
     * @param {string} [css_Str] css样式字符串
     * @param {string} [cssID] 添加到指定的styleID区块
     * @param {string} [target] 是否添加到父页面
     */
    var addCssText = function(css_Str, cssID, target) {
        if (css_Str) {
            var css_ID = cssID ? cssID : 'costomCssTest';
            var BRO = getBrowser();
            if (BRO.browser == 'ie' && BRO.version < 9) {
                // 如果是IE浏览器 9.0以下则需要使用以下方式增加
                // var ArrSheet = document.styleSheets; 样式表
                if (target == 'parent') {
                    var ArrSheetNew = window.parent.document.createStyleSheet();
                    ArrSheetNew.cssText = css_Str;
                    ArrSheetNew.id = css_ID;
                } else {
                    var ArrSheetNew = document.createStyleSheet();
                    ArrSheetNew.cssText = css_Str;
                    ArrSheetNew.id = css_ID;
                }
            } else {
                if (target == 'parent') {
                    var Dom_Style = window.parent.document.getElementById(css_ID)
                } else {
                    var Dom_Style = document.getElementById(css_ID)
                }
                if (Dom_Style) {
                    //如果对应ID的节点已经存在
                    var CssContent = Dom_Style.textContent;
                    Dom_Style.textContent = (CssContent + css_Str);
                } else {
                    var style = document.createElement("style");
                    style.id = css_ID; //指定ID
                    style.type = "text/css";
                    style.textContent = css_Str;
                    if (target == 'parent') {
                        window.parent.document.getElementsByTagName("HEAD").item(0).appendChild(style);
                    } else {
                        document.getElementsByTagName("HEAD").item(0).appendChild(style);
                    }
                }
            }
        }
    };

    /*
     * 用途：动态加载 javascript 文件
     * @param {string} [url]
     * @param {string} [scriptID]
     * @param {string} [callback] 回调函数
     * @param {string} [wrapperID] 插入到指定位置
     */
    var addScript = function(url, scriptID, callback, wrapperID) {
        // 检测IE版本号
        var testIE = function() {
            var t, vesion,
                ua = navigator.userAgent.toLowerCase(),
                ie = /msie ([0-9])\.0/;
            if ((t = ie.exec(ua)) != null) {
                vesion = t[1];
            }
            return vesion;
        };

        // 定义变量
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.id = scriptID ? scriptID : "";

        // IE系列 10以下都支持 onreadystatechange ，IE11以上支持 onload方法
        if (testIE() <= 10) {
            script.onreadystatechange = function() {
                if (script.readyState == "loaded" || this.readyState == 'complete') {
                    if (callback) {
                        callback();
                    }
                }
            };
        } else {
            // 其它浏览器
            script.onload = function() {
                if (callback) {
                    callback();
                }
            };
        }

        script.src = url;
        if (wrapperID) {
            document.getElementById(wrapperID).appendChild(script);
        } else {
            head.appendChild(script);
        }
    };

    /**
     * 用途：弹层基础控件
     * @param {object} [options] 传参对象请对照内部默认参数
     */
    var popup = function(options) {

        // 默认参数
        var defaults = { // 创建蒙板可更改参数
            pluginCssLink: null, // 当前插件的基础 CSS
            width: 600, // 指定弹窗宽度
            height: null, // 指定弹窗高度
            beforeShow: null, // 弹出前函数
            afterShow: null, // 弹出后函数
            setTimeout: null, // 多少毫秒后自动关闭
            zindex: 1000, // 遮罩层显示层级
            overlay: "popup-overlay", // 遮罩class name
            showed: "popup-showed", // 打开的记录  不能让外部修改
            closeEl: '.close', // 关闭class
            mTop: 'auto', // auto | 20px
            overlayBg: "#000", // 遮罩层背景色
            overlayOpacity: 7, // 遮罩层透明度 1~9 (0.1~0.9)
            docClick: false, // 点击弹窗之外时是否关闭
            type: null, // 弹层类型 alert | confirm | prompt | iframe | otherID
            title: null, // 提示标题 alert
            html: null, // 提示文字 alert | confirm | 弹出窗内容
            htmlClassName: null, // 附加 弹窗 样式名称
            moveHander: '.hd' // 移动弹层的绑定节点
        };
        var opts = $.extend(defaults, options);

        // 创建蒙板
        var createMengban = function(me) {
            // 添加蒙板
            function mb(isHasMengban, mengbanHeight) {
                // 是否创建透明蒙板
                var opacityHTML = isHasMengban ? 'opacity:0;filter:alpha(opacity=0);' : 'opacity:0.' + me.opts.overlayOpacity + ';filter:alpha(opacity=' + me.opts.overlayOpacity + '0);';
                // 判断是否已经有蒙版
                var mengbanHTML = $('<div class="' + me.opts.overlay + '" style="display:none;position:absolute;left:0px; top:0px;' + opacityHTML + 'width:100%; height:' + mengbanHeight + 'px; background:' + me.opts.overlayBg + '; z-index:' + me.opts.zindex + ';"></div>');
                return mengbanHTML;
            }
            // 分支处理
            var isHasMengban = $("body").find('.' + me.opts.showed).length > 0 ? true : false;
            me.mask = $(mb(isHasMengban, $(document).height()));
            $("body").append(me.mask);
            return me;
        }

        // 入口函数
        var init = function(options) {

            var me = this;
            var timer = null;
            me.opts = $.extend(true, {}, options);

            // 关闭弹窗
            this.hide = function() {
                // 执行弹窗后事件函数
                if (me.opts.afterShow) {
                    me.opts.afterShow(me);
                }
                if (!me.opts.type && typefor(me.opts.html, /Object/)) {
                    me.element.hide().removeClass(me.opts.showed).appendTo(me.nodeParent);
                    me.mask.off().remove();
                } else {
                    me.mask.off().remove();
                    me.element.off().remove();
                }
                $(window).off("resize", me.resize);
                //关闭 监听 弹窗宽高变化的计时器
                clearInterval(timer);
            }

            // 窗口变化
            this.resize = function() {
                // 是否有滚动条出现 真实网页高度
                /*
                var mh ;
                var win_h = $(window).height();
                var doc_h = $(document).height();
                if ( doc_h > win_h ){
                    mh = Math.floor(doc_h + 16);
                }else {
                    mh = doc_h;
                }
                */
                // 定位数值
                // var scr_height = $(document).scrollTop();   //  距顶部高度
                me.opts.height = me.element.outerHeight();
                oLeft = Math.floor(($(window).width() - me.opts.width) / 2);
                oTop = Math.floor(($(window).height() - me.opts.height) / 2);
                docHeight = $(document).height();

                // 弹层位置
                me.element.css({
                    'position': 'fixed', // IE6 position: absolute; background: #fff;
                    'width': me.opts.width,
                    // 'height': me.opts.height,
                    'left': oLeft,
                    "top": oTop
                });

                if (me.opts.mTop != "auto") {
                    me.element.css({
                        "top": me.opts.mTop
                    });
                }

                if (me.mask) {
                    me.mask.css({
                        'width': '100%',
                        'height': docHeight
                    });
                }
            }
            //时刻监测窗口 宽高变化, 并重新 居中
            timer = setInterval(function() {
                me.resize();
            }, 10);

            // 弹层内容预处理
            switch (me.opts.type) {
                case 'alert':
                    me.element = $(me.opts.modeAlertHTML).css({
                        'width': me.opts.width
                    });
                    me.element.find(".ct").html(me.opts.html);
                    break;
                case 'confirm':
                    me.element = $(me.opts.modeConfirmHTML).css({
                        'width': me.opts.width
                    });
                    me.confirmSure = null;
                    me.element.find(".btnTrue").on("click", function() {
                        me.confirmSure = true;
                        me.hide();
                    });
                    me.element.find(".btnFalse").on("click", function() {
                        me.confirmSure = false;
                        me.hide();
                    });
                    me.element.find(".ct").html(me.opts.html);
                    break;
                case 'prompt':
                    me.element = $(me.opts.modePromptHTML).css({
                        'width': me.opts.width
                    });
                    me.element.find(".ct h1").html(me.opts.html);
                    me.element.find(".ct input").val(me.opts.promptValue);
                    me.promptValue = me.opts.promptValue;
                    me.element.find(".btnTrue").on("click", function() {
                        me.promptValue = me.element.find("input").val();
                        me.hide();
                    });
                    me.element.find(".btnFalse").on("click", function() {
                        me.promptValue = me.opts.promptValue;
                        me.hide();
                    });
                    break;
                case 'iframe':
                    me.element = $(me.opts.modeIframeHTML).css({
                        'width': me.opts.width
                    });
                    if (me.opts.iframeid) {
                        me.element.attr("id", me.opts.iframeid);
                    }
                    me.element.find(".hd").html(me.opts.title);
                    me.element.find("iframe").css({
                        "width": me.opts.width,
                        "height": me.opts.iframeHeight
                    });
                    me.element.find("iframe").attr("src", me.opts.modeIframeUrl);
                    break;
                default:
                    if (!me.opts.type) {
                        if (me.opts.title) {
                            me.element = $('<div class="popup"><header class="hd">' + me.opts.title + '</header><section class="ct"></section><a href="javascript:;" class="close">×</a></div>').css({
                                'width': me.opts.width
                            });
                        } else {
                            me.element = $('<div class="popup"><section class="ct"></section><a href="javascript:;" class="close">×</a></div>').css({
                                'width': me.opts.width
                            });
                        }
                        if (typefor(me.opts.html, /Object/)) {
                            me.nodeParent = $(me.opts.html).parent();
                            me.element.find('.ct').append($(me.opts.html).show());
                        } else {
                            me.element.find('.ct').append($(me.opts.html));
                        }
                    } else {
                        return;
                    }
            }

            // 多少毫秒后自动关闭弹窗
            if (me.opts.setTimeout > 10) {
                window.setTimeout(function() {
                    me.hide();
                    return false;
                }, me.opts.setTimeout);
            }

            // 弹窗前预置函数
            if (me.opts.beforeShow) {
                me.opts.beforeShow(me.element);
            }

            // 创建蒙板
            createMengban(me);

            // 如果存在需要附加弹窗样式
            if (me.opts.htmlClassName && !me.element.hasClass(me.opts.htmlClassName)) {
                me.element.addClass(me.opts.htmlClassName);
            }
            // 弹层内容
            me.element.appendTo("body");

            // 弹窗定位数值计算
            me.opts.height = me.opts.height ? me.opts.height : me.element.outerHeight();
            me.oLeft = Math.floor(($(window).width() - me.opts.width) / 2);
            me.oTop = Math.floor(($(window).height() - me.opts.height) / 2);

            // 是否有滚动条出现 真实网页高度
            /*
            var mh ;
            var win_h = $(window).height();
            var doc_h = $(document).height();
            if ( doc_h > win_h ){
                mh = Math.floor(doc_h + 16);
            }else {
                mh = doc_h;
            }
            */

            // 弹窗定位赋值
            me.element.css({
                'position': 'fixed', // IE6 position: absolute; background: #fff;
                'width': me.opts.width,
                //'height': me.opts.height,
                'left': me.oLeft,
                "top": me.oTop,
                "z-index": me.opts.zindex + 1
            });

            // 如果有传入顶部高度
            if (me.opts.mTop != "auto") {
                me.element.css({
                    "top": me.opts.mTop
                });
            }

            // IE 系列判断 并执行下面函数
            /*
            if(navigator.userAgent.indexOf("MSIE 6.0") > 0){ 
                $pop.css({
                    "position": "absolute",
                    "top": _top + scr_height
                });
            }
            */

            // 显示蒙板
            me.mask.fadeIn("fast");
            // 显示弹层
            me.element.addClass(me.opts.showed).css("display", "block");

            // 移动弹层
            me.element.find(me.opts.moveHander).on("mousedown", function(event) {
                //移动之前 关闭实时设计弹层位置的计时器
                clearInterval(timer);
                // 移动开始
                var startX = event.pageX || window.event.pageX,
                    startY = event.pageY || window.event.pageY,
                    offset = me.element.offset();
                var disX = startX - offset.left;
                var disY = startY - offset.top;
                var moveWidth = $(window).width();
                var moveHeight = $(window).height();
                // console.log(moveWidth);
                // console.log(moveHeight);
                // 禁止冒泡
                if (event.stopPropagation) {
                    event.stopPropagation(); //其它
                } else {
                    event.cancelBubble = true; //IE
                }
                $("body").on("mousemove", function(event) {
                    // 正在移动
                    var _x = event.pageX || window.event.pageX,
                        _y = event.pageY || window.event.pageY;
                    // 边界锁定范围
                    if (_x - disX < 0 || _y - disY < 0 || _x - disX > moveWidth - me.opts.width || _y - disY > moveHeight - me.opts.height) {
                        return;
                    } else {
                        me.element.css({
                            "left": _x - disX,
                            "top": _y - disY,
                            "cursor": "move"
                        });
                    }
                }).on("mouseup", function() {
                    // console.log(3);
                    // 移动结束 
                    me.element.css({
                        "cursor": "default"
                    });
                    me.element.closest("body").off('mousemove');
                });
            });


            // 窗口变化事件
            $(window).on("resize", me.resize);

            // 双击蒙板事件
            if (me.opts.docClick) {
                me.mask.on('dblclick', me.hide);
            }

            // 关闭事件
            me.element.find(me.opts.closeEl).on('click', function() {
                me.hide();
                return false;
            });

        };

        // 初始化入口函数
        return new init(opts);

    };

    /**
     * 用途：普通提示
     * @param {string} [message] 提示文字
     * @param {number} [time] N毫秒后自动关闭
     * @param {function} [callback] 关闭后的回调函数
     *
     * 实例代码:
     * t.alerter('智能ABC点标签右边的小键盘符号智能ABC点标签右边的小键盘符号……');
     * t.alerter('智能ABC点标签右边的小键盘符号智能ABC点标签右边的小键盘符号……',3000);
     * t.alerter('智能ABC点标签右边的小键盘符号智能ABC点标签右边的小键盘符号……',3000,function(){
     *     关闭时回调……
     * });
     * 
     */
    var alerter = function(message, time, callback) {
        popup({
            type: 'alert',
            modeAlertHTML: '<div class="popup popAlert"><header class="hd">提示</header><section class="ct"></section><a href="javascript:;" class="close">×</a></div>',
            width: 360,
            zindex: 9999,
            html: message,
            setTimeout: (time ? time : null),
            afterShow: function() {
                if (callback) {
                    callback();
                }
            }
        });
    };

    /**
     * 用途：二次确认提示
     * @param {string} [message] 提示文字
     * @param {function} [callback(boolean)] 回调处理
     *
     * 实例代码：
     * t.confirm('确定删除吗？',function(boolean){
            if(boolean){
                alert(boolean);
            }else{
                alert(boolean);
            }
       });
     * 
     */
    var confirm = function(message, callback) {
        popup({
            type: 'confirm',
            modeConfirmHTML: '<div class="popup popConfirm"><header class="hd">提示</header><section class="ct">说明文字提示区</section><footer class="ft"><a class="btnTrue" href="javascript:;">确定</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btnFalse popup-close" href="javascript:;">取消</a></footer><a href="javascript:;" class="close">×</a></div>',
            width: 360,
            zindex: 9999,
            html: message,
            afterShow: function(o) {
                if (callback) {
                    callback(o.confirmSure);
                }
            }
        });
    };

    /**
     * 用途：获取输入文字
     * @param {string} [text] 标题文字
     * @param {string} [defaultText] 默认值
     * @param {function} [callback(inputText)] 回调处理
     *
     * 实例代码：
     * t.prompt("请输入你的姓名","三小二",function(inputText){
            alert(inputText);
        });
     */
    var prompt = function(text, defaultText, callback) {
        popup({
            type: 'prompt',
            modePromptHTML: '<div class="popup popPromp"><header class="hd">提示</header><section class="ct"><h1>说明文字提示区</h1><p><input type="text" value=""></p></section><footer class="ft"><a class="btnTrue" href="javascript:;">确定</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btnFalse popup-close" href="javascript:;">取消</a></footer><a href="javascript:;" class="close">×</a></div>',
            width: 360,
            zindex: 9999,
            html: text,
            promptValue: (defaultText ? defaultText : ''),
            afterShow: function(o) {
                if (callback) {
                    callback(o.promptValue);
                }
            }
        });
    };

    /**
     * 用途：打开新窗口链接
     * @param {object} [options] 参数说明
     * @param {number} [options.popId] 弹出层ID 用来操作关闭，及交互
     * @param {string} [options.title] 标题文字
     * @param {number} [options.width] 宽度
     * @param {number} [options.height] 高度
     * @param {string} [options.url] 地址
     * @param {number} [options.setTimeout] 多少毫秒后可以关闭
     * @param {function} [options.beforeShow] 弹出前执行函数
     * @param {function} [options.afterShow] 关闭后执行函数
     */
    var openIframe = function(options) {
        if (options.url) {
            popup({
                type: 'iframe',
                modeIframeHTML: '<div class="popup popIframe">' + (options.title ? '<header class="hd">' + options.title + '</header>' : '') + '<section class="ct"><iframe src="#" frameborder="0" style="background:#fff;"></iframe></section><a href="javascript:;" class="close">×</a></div>',
                modeIframeUrl: null, // iframe url地址
                iframeid: (options.id ? options.id : null),
                width: (options.width ? options.width : 800),
                height: (options.height ? (options.height + 51) : 551),
                iframeHeight: (options.height ? options.height : 500),
                modeIframeUrl: options.url + (options.url.indexOf('?') < 0 ? '?rand=' : '&rand=') + (new Date().getTime()),
                setTimeout: options.setTimeout,
                beforeShow: options.beforeShow,
                afterShow: options.afterShow
            });
        } else {
            alerter("参数中缺少请求地址！");
        }
    };

    /**
     * 
     * 显示气泡样式小提示
     * 
     * @param obj 被显示气泡提示的对象,可传对象，也可传ID
     * @param type 气泡提示样式类型
     *        type 0 默认类型
     *        type 1 带“正确”图标类型
     *        type 2 带“错误”图标类型
     *        type 3 带“警告”图标类型
     * @param msg 消息字符串，可直接带入html结构
     * @param closeBtn 0或1，1显示关闭按钮（延时关闭无效），0不显示关闭按钮
     * @param delay 延时设置，单位毫秒（默认2000毫秒）
     * @param func 回调方法,当closebtn为1时才有作用
     * 
     * 调用示例：
     * showBubble(idName,0,"你已经支持过TA了<br />请关注其他人吧");  //不带关闭按钮，2.4秒后自动关闭
     * showBubble(idName,1,"操作成功！",0,3000)  //不带关闭按钮，显示打勾图标，3秒后自动关闭
     * showBubble(idName,1,"已收藏至<a href='#'>我的收藏</a>",1);   //带关闭按钮，显示打勾图标，不会自动关闭(设置delay无效)
     * 
     */
    var showBubble = function(id, type, msg, delay, closeBtn, func) {

        if (!delay || typeof delay != "number") {
            delay = 1000 * 2;
        }

        var _timer,
            _type = parseInt(type) || 0,
            _msg = msg || "",
            _preHtml = "";

        var _target = null;
        if (typeof id == 'object') {
            _target = id;
        } else {
            _target = $("#" + id);
        }
        if (_target == null) {
            return false;
        }

        switch (_type) {
            case 0:
                _preHtml = $('<div class="hr-bubble"><div class="bub-text"><span class="bub-def">' + _msg + '</span></div><span class="arrow1"></span><span class="arrow2"></span></div>');
                break;
            case 1:
                _preHtml = $('<div class="hr-bubble"><div class="bub-text"><span class="bub-ok">' + _msg + '</span></div><span class="arrow1"></span><span class="arrow2"></span></div>');
                break;
            case 2:
                _preHtml = $('<div class="hr-bubble"><div class="bub-text"><span class="bub-err">' + _msg + '</span></div><span class="arrow1"></span><span class="arrow2"></span></div>');
                break;
            case 3:
                _preHtml = $('<div class="hr-bubble"><div class="bub-text"><span class="bub-warm">' + _msg + '</span></div><span class="arrow1"></span><span class="arrow2"></span></div>');
                break;
            default:
                _preHtml = $('<div class="hr-bubble"><div class="bub-text"><span class="bub-def">' + _msg + '</span></div><span class="arrow1"></span><span class="arrow2"></span></div>');
                break;
        }
        if (!!closeBtn) _preHtml.append('<a href="javascript:;" title="关闭" class="bub-cls" onclick="this.parentNode.parentNode.removeChild(this.parentNode);return false;">x</a>');

        // 清空页面上已存在的冒泡框(带关闭按钮的除外);
        $(".hr-bubble").each(function() {
            if (!$(this).find(".bub-cls")) {
                $(this).remove();
            }
        });

        // 定位计算
        _preHtml.appendTo("body").css({
            "display": "block",
            "top": ($(_target).offset().top + $(_target).outerHeight() + 11),
            "left": $(_target).offset().left - $(_preHtml).outerWidth() / 2 + $(_target).outerWidth() / 2
        });
        if (!closeBtn) {
            setTimeout(function() {
                _preHtml.remove();
                if (func) {
                    func();
                }
            }, delay);
        }
    };

    /**
     * ajax提交后的通用提示 (1为成功(默认)，2为失败，3为提醒（感叹号）)
     * @param elem {Object||String} Jquery对象或选择器。当传入window时全屏居中，传入元素时检查offset属性，无定义则基于元素（容器）居中显示，有定义则按偏移量显示
     * @param msgtype {Number} 弹出类型，1为成功(默认)，2为失败，3为提醒（感叹号）
     * @param msgstr {String} 弹出内容，可传入html结构
     * @param offset {Object} 偏移量，JSON格式，例如：{left:xxx,top:yyy}，仅在elem传入元素时有效；传空则默认基于元素（容器）居中；另可单独传入某个偏移量，另外的偏移量自动计算居中
     * @param delay {Number} 显示延时，单位ms，默认3000
     * @param callback {Function} 回调函数(可选)
     */
    var tips = function(elem, msgtype, msgstr, callback, delay, offset) {
        var $elem = $(elem),
            $html,
            _elemW,
            _elemH,
            _tmpW,
            _tmpH,
            _className,
            _displayType = 1, // 默认全屏居中显示
            _msgtype = msgtype || 1,
            _str = msgstr || '',
            _offset = offset || {},
            _delay = delay || 1000,
            _callback = callback || function() {};
        // console.log($elem);
        // 简单判断
        if ($elem.length) {
            if ($elem[0] === window) {
                _displayType = 1;
            } else if (typeof _offset.left != 'number' && typeof _offset.top != 'number') {
                // 没有指定有效的offset，默认元素居中
                _displayType = 2;
            } else {
                // offset有效(或部分有效)，按偏移量居中
                _displayType = 3;
            }
        }

        // 判断样式类型
        switch (parseInt(_msgtype)) {
            case 1:
                _className = 'hr-tips hr-tips-ok';
                break;
            case 2:
                _className = 'hr-tips hr-tips-err';
                break;
            case 3:
                _className = 'hr-tips hr-tips-warm';
                break;
            default:
                _className = 'hr-tips hr-tips-ok';
        }

        if (_displayType == 1) {
            _className += ' hr-tips-global';
        }

        // 构建html
        $html = $('<div class="' + _className + '"><div class="tips-inner">' + msgstr + '</div></div>');

        // $html临时放于用户不可见的位置（用于计算宽高）
        $html.css({
            'top': -1000,
            'display': 'block'
        }).appendTo('body');
        _tmpW = $html.outerWidth();
        _tmpH = $html.outerHeight();
        $html.remove();

        // 判断位置
        switch (_displayType) {
            case 1:
                // 全屏居中

                // 清空屏幕中可能存在的全屏居中tips
                $('div.hr-tips-global').remove();

                // 计算在屏幕上显示的位置，并显示
                $html.css({
                    'left': '50%',
                    'marginLeft': -(_tmpW / 2),
                    'top': '50%',
                    'marginTop': -(_tmpH / 2)
                });
                $html.appendTo('body');
                break;

            case 2:
            case 3:
                // 指元素居中或偏移量居中
                // 处理元素定位属性
                if ($elem.css('position').toUpperCase() != 'ABSOLUTE' || $elem.css('position').toUpperCase() != 'FIXED') {
                    $elem.css({
                        'position': 'relative'
                    });
                }
                $elem.find('div.hr-tips').remove();
                _elemW = $elem.eq(0).outerWidth();
                _elemH = $elem.eq(0).outerHeight();
                if (typeof _offset.left != 'number') {
                    _offset.left = (_tmpW >= _elemW ? -(_tmpW - _elemW) / 2 : (_elemW - _tmpW) / 2);
                }
                if (typeof _offset.top != 'number') {
                    _offset.top = (_tmpH >= _elemH ? -(_tmpH - _elemH) / 2 : (_elemH - _tmpH) / 2);
                }
                $html.css({
                    'top': _offset.top,
                    'left': _offset.left
                }).appendTo($elem);
                break;
        }

        //显示
        $html.css('display', 'block');

        //回调事件
        setTimeout(function() {
            $html.remove();
            $elem = null;
            $html = null;
            _callback();
        }, _delay);
    };

    /**
     * 公用跟随对象弹窗提示方法
     * @param elem 被跟随对象弹窗对象(jQuery处理后的，如$(''))
     * @param msg 提示信息
     * @param offsettop 上下偏移量（默认为弹窗高度/2的负数）
     * @param offsetleft 左右偏移量（默认为弹窗宽度/2的负数）
     * @param delay 延时设置，单位毫秒（默认0毫秒）
     * 调用示例：dialogTips($('#message'),'发失成功',0,0,3000);
     */
    ;
    var dialogTips = function(elem, msg, offsettop, offsetleft, delay) {

        var offset = elem.offset();
        if (!offset) return;

        var msg = msg ? msg : '发送成功';
        var innerHtml = '<div class="hr-send-ok">' + msg + '</div>';
        var div = $('div.hr-send-ok-box');
        var top = offset.top;
        var left = offset.left;
        var offsettop = offsettop ? offsettop : -50 / 2;
        var offsetleft = offsetleft ? offsetleft : -87 / 2;
        var width = elem.width();
        var height = elem.height();
        top = top + height / 2 + offsettop;
        left = left + width / 2 + offsetleft;
        var delay = delay ? delay : 0;
        if (div.length == 0) {
            div = document.createElement('div');
            div.className = 'hr-send-ok-box';
            div.innerHTML = innerHtml;
            $(div).css({
                'position': 'absolute',
                'top': top + 'px',
                'left': left + 'px'
            });
            document.body.appendChild(div);
        } else {
            div.css({
                'position': 'absolute',
                'top': top + 'px',
                'left': left + 'px'
            }).show();
        }
        setTimeout(function() {
            $(div).hide();
        }, delay);
    };

    /**
     * 从浏览器顶部渐入提示方法
     * @param type 气泡提示样式类型
     *        type 1 带“正确”图标类型
     *        type 2 带“错误”图标类型
     *        type 3 带“警告”图标类型
     * @param text 提示信息
     * @param delay 延时设置，单位毫秒（默认0毫秒）
     */
    ;
    var topTips = function(type, text, delay, callbackfunc) {
        var _time = delay || 2000;
        var _type = type || 1
        var _timer = null;
        clearTimeout(_timer);
        var _tipDom = $('<div class="tip-wrap tip-type tip-type-' + type + '"><span class="tip-text">' + text + '</span></div>');
        _tipDom.appendTo('.layout');
        _tipDom.css("margin-left", -(_tipDom.outerWidth() / 2))
        _tipDom.animate({
            "top": 80
        }, 500);
        _timer = setTimeout(function() {
            _tipDom.animate({
                "top": '-99em'
            }, 500, function(){
                _tipDom.off().remove();
                if (callbackfunc) {
                    callbackfunc();
                }
            });
        }, _time);
    };



    /**
     * debounce, 函数去抖动, 在idle时间后, 执行action
     * @param  {Number} idle   时间, 默认100ms
     * @param  {Function} action 回调函数
     * @return {Function} 返回一个函数
     * 
     * 使用方法:
     * var f = debounce(function() {
            console.log('debounce end');
        }, 2000);

        // 指定ctx
        f.call({a: 1});
     */
    var debounce = function(action, idle) {

        idle = idle || 100;

        var last;

        return function() {
            var ctx = this,
                args = arguments;

            clearTimeout(last);
            last = setTimeout(function() {
                action.apply(ctx, args)
            }, idle);
        };
    };

    /**
     * 函数节流
     * 使用方法:
        var f = throttle(function() {
            console.log('throttle end');
        }, 2000);
        f.call({a: 1}); // 指定ctx

        function resizeHandler() {
            console.log("throttle");
        }
        window.onresize = throttle(resizeHandler, 500);
     * @param {*} action 
     * @param {*} delay 
     */
    var throttle = function(action, delay) {

        delay = delay || 100;

        var last = 0;
        return function() {
            var curr = +new Date();
            if (curr - last > delay) {
                action.apply(this, arguments);
                last = curr;
            }
        };
    };

    /**
     * 过滤html标签特殊字符
     * @param  {string} input 输入串
     * @return {string}  过滤后的串
     */
    var htmlEncode = function(input) {
        input = input || '';

        var s = input.replace(/&/g, "&amp;");
        s = s.replace(/</g, "&lt;");
        s = s.replace(/>/g, "&gt;");
        // s = s.replace(/ /g, "&nbsp;");
        s = s.replace(/\'/g, "&#39;");
        s = s.replace(/\"/g, "&quot;");

        return s;
    };

    /**
     * 通用ajax调用方法, 统一入口, 方便全局控制
     * 调用方法和$.ajax基本一致
     * 为了方便全局控制, 需要的参数可在customOpts中加
     */
    function http(options) {

        var defaultOptions = {
            dataType: 'json',
            cache : false,
            customOpts: {
                // 是否静默处理, 不提示error回调
                silent: false,

                // 如果直接返回true, 也表示通过
                interceptor: null
            }
        };

        options = $.extend(true, defaultOptions, options);

        var interceptor = options.customOpts.interceptor;

        // 如果配置有拦截器
        if ($.isFunction(interceptor)) {
            var interceptedResult = interceptor.call(null, options);

            // 拦截结果要么是true(允许继续向下执行)
            if (interceptedResult !== true) {
                return interceptedResult;
            }

            // 要么是函数, 要么是对象, 否则退出
            if (!($.isFunction(interceptedResult) || $.type(interceptedResult) === 'object')) {
                return interceptedResult;
            }

            var promise = null;

            // $.Deferred().promise
            if ($.isFunction(interceptedResult) && $.isFunction(interceptedResult().then)) {
                promise = interceptedResult;
            }

            // $.Deferred()
            // 要么是一个promise对象
            // 如果拦截结果是Promise对象, 应该有then方法
            else if ($.type(interceptedResult) === 'object' && $.isFunction(interceptedResult.then)) {
                promise = interceptedResult;
            }

            return promise.then(function(resolvedVal) {

                // 如果使用拦截器, options会多一个resolvedVal, 表示前置处理的结果
                options.customOpts.resolvedVal = resolvedVal;
                return _exec(options);
            });
        } else {

            // 如果没有配置拦截器, 直接发送请求
            return _exec(options);
        }

        /**
         * 执行$.ajax
         * @private
         */
        function _exec(options) {

            return $.ajax(options)
                // .done(_done)
                // .fail(_fail)
                .then(_done, _fail)
                .always(function(dataOrJqXHR, textStatus, jqXHROrErrorThrown) {
                    return $.Deferred().resolveWith(this, arguments).promise();
                });

            // 重复使用
            function _done(response, textStatus, jqXHR) {
                var dfd = $.Deferred();
                // then方法只取data
                if (response && response.result === 0) {
                    dfd.resolveWith(this, [response.data, jqXHR]);
                } else {
                    dfd.rejectWith(this, [response, jqXHR]);
                }
                return dfd.promise();
            }

            // 重复使用
            function _fail(jqXHR, textStatus, errorThrown) {
                // 不是静默丢弃错误, 那么就处理错误
                if (!options.customOpts.silent) {
                    return $.Deferred().rejectWith(this, arguments).promise();
                }
            }
        }

        /**
         * _interceptor示例
         * @private
         */
        // function _interceptor() {
        //     var deferred = $.Deferred();
        //     deferred.resolve(someData);
        //     return deferred.promise();
        //     return false;
        // }
    };

    /**
   * 表单转换成json对象
   * 只转换第一个form对象, 因为一般情况下只有一个
   *
   */
    function form2json(formSelector, options) {
        var defaultOptions = {};
        options = $.extend(true, defaultOptions, options);

        var formArray = $(formSelector).eq(0).serializeArray();
        var returnArray = {},
          tmp;

        for (var i = 0, len = formArray.length; i < len; ++i) {
          tmp = formArray[i];

          // 还没有
          if (typeof(returnArray[tmp.name]) === 'undefined') {
            returnArray[tmp.name] = tmp.value;
          } else {

            // 之前的值
            var existed = [].concat(returnArray[tmp.name]);
            existed.push(tmp.value);

            returnArray[tmp.name] = existed;
          }
        }

        // 多选 选择多个的话, 其值会是一个数组, 否则是一个字符串
        return returnArray;
    }

    /**
     * 更新url
     * 主要解决: 拼接参数
     *
     * 调用示例: 
     * var url = location.href;
     * location.href = addParam2url(url, 'type', 1);
     */
    function addParam2url(url, key, value) {

        if ($.type(key) === 'object') {
            return addParamObj2url(url, key, value);
        }

        var key = (key || 't') + '='; //默认是"t"
        // var reg = new RegExp(key + '\\w+$|(?:&|$)'); 
        var reg = new RegExp(key + '([^&]*)(&|$)'); 
        var timestamp = typeof value !== 'undefined' ? value : +new Date();

        if (url.indexOf(key) > -1) {
            return url.replace(reg, key + timestamp + '$2');
        } else {
            if (url.indexOf('?') > -1) {
                var urlArr = url.split('\?');
                if (urlArr[1]) {
                    return urlArr[0] + '?' + key + timestamp + '&' + urlArr[1];
                } else {
                    return urlArr[0] + '?' + key + timestamp;
                }
            } else {
                if (url.indexOf('#') > -1) {
                    return url.split('#')[0] + '?' + key + timestamp + location.hash;
                } else {
                    return url + '?' + key + timestamp;
                }
            }
        }
    }


    /**
     * 为地址添加参数, 不对外公开, 内部使用
     * @param {[type]} url   [description]
     * @param {[type]} param [description]
     * @param {[type]} raw   是否编码, 默认为false
     */
    function addParamObj2url(url, param, raw) {
        if (!url || !param) {
            return url;
        }

        if ($.type(param) !== 'object') {
            return url;
        }

        raw = !!raw;

        var hasQuery = url.indexOf('?') >= 0;
        url += hasQuery ? '&' : '?';

        var tmp = '';

        if (raw) {

            for (var p in param) {
                tmp = param[p];
                url += p + '=' + tmp + '&';
            }
        } else {
            for (var p in param) {
                tmp = param[p];
                url += encodeURIComponent(p) + '=' + encodeURIComponent(tmp) + '&';
            }
        }

        // 删除最后的&字符
        return url.replace(/&$/, '');
    }

    /**
     * 固定底部效果(当滚动距离底部多少时, 固定某些元素:一般为侧栏, 使之距离底部一定距离)
     * 最开始滚动时应该是固定顶部, 当快滚动到底部时固定底部
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    function fixedBottom(options) {
        var defaults = {
            fixedEle: '.sidebar',               // 需要固定的元素, 可为选择器或者元素
            fixedTop: 10,   // 固定时距离顶部高度
            fixedBottom: 200, // 固定时距离底部高度
            topThreshold: 100,                  // 距离顶部多少时, 开始固定顶部
            bottomThreshold: 200,               // 距离底部多少时, 开始固定底部
            fixedBottomClass: 'fixed-bottom',   // 固定底部时为元素添加的类名
            fixedTopClass: 'fixed-top',         // 固定顶部时为元素添加的类名
            criticalCallback: null              // 临界回调, 可用于做一些其他的处理, 看产品的脑洞, 暂时不用
        };

        options = $.extend(true, {}, defaults, options);

        var $fixedEle = $(options.fixedEle); // 需要固定的元素

        var fixedTopClass = options.fixedTopClass;
        var fixedBottomClass = options.fixedBottomClass;
        var criticalCallback = options.criticalCallback;

        // 需要固定的元素的总高度
        var fixedEleH = $fixedEle.outerHeight(true);

        // 需要固定的元素距离页面顶部的距离
        var fixedEleTop = $fixedEle.offset().top;

        var totalH = $(document).height(); // 页面总高度
        var windowH = $(window).height();

        // 用于判断是否要固定底部的可用高度
        var canFixBottomH = windowH - options.fixedTop - options.fixedBottom;

        var topThreshold = options.topThreshold;
        var bottomThreshold = options.bottomThreshold;

        // var initFixedEleBottom = totalH - fixedEleH - fixedEleTop;
        var initFixedEleBottom = totalH - fixedEleH - options.fixedTop;

        // 需要固定的元素距离底部的高度
        var fixedEleBottom = 0;

        $(window).on('scroll.fixedBottom', function(e) {
            var st = $(this).scrollTop();

            // 顶部判断
            if (st > topThreshold) {
                $fixedEle.addClass(fixedTopClass);
            } else {
                $fixedEle.removeClass(fixedTopClass);
            }

            // 如果侧边栏高度太小, 不设置固定底部
            if (fixedEleH < canFixBottomH) {
                return;
            }

            // 底部判断
            var exceededCriticalValue = initFixedEleBottom - st < bottomThreshold;
            if (exceededCriticalValue) {
                $fixedEle.addClass(fixedBottomClass);
            } else {
                $fixedEle.removeClass(fixedBottomClass);
            }

            // if (criticalCallback) {
            //     criticalCallback(exceededCriticalValue, 2);
            // }
        }); 
    }

    // API
    exports.loadSimpleEditor = loadSimpleEditor;
    exports.loadSimpleEditor2 = loadSimpleEditor2;
    exports.typefor = typefor;
    exports.getBrowser = getBrowser;
    exports.fullStringLen = fullStringLen;
    exports.halfStringLen = halfStringLen;
    exports.insertAtCaret = insertAtCaret;
    exports.getEvent = getEvent;
    exports.eventTarget = eventTarget;
    exports.eventStop = eventStop;
    exports.getSelection = getSelection;
    exports.setSelection = setSelection;
    exports.setCursorPosition = setCursorPosition;
    exports.setCursorEnd = setCursorEnd;
    exports.subString = subString;
    exports.getUrlPre = getUrlPre;
    exports.isSameDomain = isSameDomain;
    exports.getImgSize = getImgSize;
    exports.getUrlParam = getUrlParam;
    exports.getUrlParamJson = getUrlParamJson;
    exports.randID = randID;
    exports.addCssLink = addCssLink;
    exports.addCssText = addCssText;
    exports.addScript = addScript;
    exports.popup = popup;
    exports.alerter = alerter;
    exports.confirm = confirm;
    exports.prompt = prompt;
    exports.openIframe = openIframe;
    exports.showBubble = showBubble;
    exports.tips = tips;
    exports.dialogTips = dialogTips;

    exports.debounce = debounce;
    exports.throttle = throttle;
    exports.htmlEncode = htmlEncode;
    exports.http = http;
    exports.run = run;
    exports.form2json = form2json;
    exports.addParam2url = addParam2url;
    exports.fixedBottom = fixedBottom;
});