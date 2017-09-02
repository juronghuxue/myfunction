var docEl = document.documentElement,
		    resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
		    recalc = function() {
		        //设置根字体大小
		        var myfontSize = 32 * (docEl.clientWidth/750);
		        console.log(myfontSize);
		        if(myfontSize > 32){
		        	docEl.style.fontSize = "32px";
		        }
		        docEl.style.fontSize = 32 * (docEl.clientWidth/750) + 'px'; 
		    };
		//绑定浏览器缩放与加载时间
		window.addEventListener(resizeEvt, recalc, false);
		document.addEventListener('DOMContentLoaded', recalc, false);