<template>
  <guest-layout >
  
   <frontpageHeader/>
   <!-- import banner include -->
   <banner/>
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
import frontpageHeader from '../inc/frontpage-header.vue';

export default {
 components:{
  assets,banner,balance,features,frontpageHeader
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
