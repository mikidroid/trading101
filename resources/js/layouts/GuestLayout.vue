<template>
  <client-nav :title="title" :hideBottomNav="hideBottomNav" :hideAppBar="hideAppBar">
  
     <slot/>
   </client-nav>
</template>

<script>
export default {
  props:['hideBottomNav','hideAppBar','title'],
  created(){
const message = this.$page.props.flash;
      this.$toast.success(message.success);
  },
  data(){
   return{
    }
  },
  watch: {
    $page: {
      handler() {
      const message = this.$page.props.flash;
      this.$toast.success(message.success);
        if (message.success != null) {
              this.$toast.success(message.success);}
         if (message.error != null) {
              this.$toast.error(message.error);}
          }
        }
      },
};
</script>
