<template>
  <div id="app">
  	<header-vue></header-vue>
  	<transition name="translate" mode="out-in">	
    	<router-view></router-view>
    </transition>
    <footer-vue></footer-vue>
  </div>
</template>

<script>
import headerVue from './components/header'
import footerVue from './components/footervue'
	export default {
		name: 'App',
		components: {
	    	'header-vue': headerVue,
	    	'footer-vue': footerVue
	  	}
	}

</script>

