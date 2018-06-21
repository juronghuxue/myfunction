<template>
	<ul class="list" style="margin-top:30px;">
		<li v-for="item in items">{{item.name}}</li>
	</ul>
</template>
<script>
	export default{
		name:'list',
		data(){
			return{
				items:[
					{'name':'衣服'},
					{'name':'鞋子'},
					{'name':'帽子'},
					{'name':'首饰'},
					{'name':'化妆品'}
				]
			}
		}

	}
</script>