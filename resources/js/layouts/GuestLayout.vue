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
  
};
</script>
