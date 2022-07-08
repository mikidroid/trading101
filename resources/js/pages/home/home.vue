<template>
  <guest-layout >
   <!-- import banner include -->
   <banner/>
    <!-- import balance include -->
   <balance/>  
    <!-- import features include -->
   <features/>  
   <!-- import asset include -->
   <assets/>  
  </guest-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';
import assets from '../inc/assets.vue';
import banner from '../inc/banner.vue';
import balance from '../inc/balance.vue';
import features from '../inc/features.vue';

export default {
 components:{
  assets,banner,balance,features
 },
 methods:{
  
 },
 data(){
    return{
     
    }
 },
 computed:{
    user(){
     return this.$page.props.auth.user
    }
 },
}
</script>
