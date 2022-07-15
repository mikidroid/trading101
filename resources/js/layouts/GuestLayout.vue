<template>
  <client-nav :title="title" :hideBottomNav="hideBottomNav" :hideAppBar="hideAppBar">
  
     <slot/>
   </client-nav>
</template>

<script>
export default {
  props:['hideBottomNav','hideAppBar','title'],
  
  data(){
   return{
    }
  },
  
  created(){
     const msg = this.$page.props.flash;
     if(msg.success){
      this.$toast.success(msg.success)
     }
     if(msg.error){
      this.$toast.error(msg.error)
   }
  }
};
</script>
