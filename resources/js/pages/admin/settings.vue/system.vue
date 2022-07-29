<template>
  <admin-layout >
    System settings
  </admin-layout>
</template>

<script>
import {colors} from '../../../components/config/config.js';

export default {
 components:{
  
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
