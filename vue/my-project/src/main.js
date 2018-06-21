// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
});
var deviceWidth = document.documentElement.clientWidth;
if (deviceWidth > 640) {
    deviceWidth = 640;
}
if (deviceWidth < 320) {
    deviceWidth = 320;
}
document.documentElement.style.fontSize = deviceWidth / 30 + 'px';
//此部分是设计稿宽度为375px的，这边设置为3.75  页面调用时，如果实际设计稿为760px，那边这边的3.75数值改为7.60
window.onresize = function() {
    var deviceWidth = document.documentElement.clientWidth;
    if (deviceWidth > 640) {
        deviceWidth = 640;
    }
    if (deviceWidth < 320) {
        deviceWidth = 320;
    }
    document.documentElement.style.fontSize = deviceWidth / 30 + 'px';
}
