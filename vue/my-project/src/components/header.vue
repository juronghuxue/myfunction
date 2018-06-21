<template>
  <div class="header">
    	{{msg}}
  </div>
</template>

<script>
export default {
  name: 'headerVue',
  data () {
    return {
      msg: '欢迎来到首页！！'
    }
  },
  computed:{

  },
  watch:{
    '$route'(to,from){
      if(to.path == '/index'){
        this.msg = '欢迎来到首页！！'
      }else if(to.path == '/product'){
        this.msg = '欢迎来到产品页！！'
      }else if(to.path == '/list'){
        this.msg = '欢迎来到列表页！！'
      }else if(to.path == '/center'){
        this.msg = '欢迎来到个人中心页！！'
      }
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
	.header{
    width:100%;
    height:30px;
    background:yellow;
    text-align:center;
    line-height:30px;
    position:fixed;
    top:0;
    left:0;
  }
</style>
