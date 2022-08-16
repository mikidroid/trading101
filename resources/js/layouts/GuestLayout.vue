<template>
  <client-nav :title="title" :hideBottomNav="hideBottomNav" :hideAppBar="hideAppBar">
     <v-row align="center" justify="center" >
     <v-col cols="12" sm="12" md="10" lg="5">
     <slot/>
     </v-col>
     </v-row>
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
