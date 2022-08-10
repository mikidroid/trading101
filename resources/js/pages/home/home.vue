<template>
  <guest-layout >
   <!-- import banner include -->
  
   <banner 
           :linkText="'update'" 
           :show="!user.profile_status?true:false"
           :icon="'mdi-lock'"
           :link="'/profile'"
           :title="'Account update'"
           :subtitle="'Welcome, you are encouraged to update your account when you can!'"
        />
 
    <!-- import balance include -->
   <balance/>  
   <!-- import carousel include -->
   <carousels class="mb-3"/>
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
import carousels from '../inc/carousels.vue';

export default {
 components:{
  assets,banner,balance,features,carousels
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
