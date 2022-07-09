<template>
  <guest-layout v-bind="{title:'Transactions'}">
   <v-container>
  Trans
   </v-container>
  </guest-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';

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
     return this.$page.props.auth.user
    }
 },
}
</script>
