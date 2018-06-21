<template>
	<div class="footer">
		<ul>
			<router-link class="li"  to="/index">首页</router-link>
			<router-link class="li"  to="/product">产品</router-link>
			<router-link class="li"  to="/list">列表</router-link>
			<router-link class="li"  to="/center">个人中心</router-link>
		</ul>
	</div>
</template>

<script>
	export default {
	  name: 'footerVue',
	  data () {
	    return{}
	  }
	}
</script>

<style>
	
	li{
		list-style:none;
	}
	
	.footer{
		width:100%;
		height:40px;
		background:#cccccc;
		position:fixed;
		left:0;
		bottom:0;
		}
	.footer .li{
		float:left;
		width:25%;
		height:100%;
		text-align:center;
		line-height:40px;
	}
	.footer .li.cur{
		color:red;
	}
</style>