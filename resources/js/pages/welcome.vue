<template>
  <guest-layout :hideAppBar="false">
  
  </guest-layout>
</template>

<script>
import {colors} from '../components/config/config.js';

export default {
 methods:{
  
   
 },
 data(){
    return{
     color:colors,
    }
 },
  
 computed: {
    user(){
     return this.props.auth.user
    }
 },
}
</script>
