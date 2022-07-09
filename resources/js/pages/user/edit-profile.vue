<template>
  <guest-layout v-bind="{title:'Edit profile'}">
   <v-container>
  Edit profile
  <Link as="button" 
   :href="route('profile.index')" >
   <v-btn block :color="color.accent"> 
   go back
   </v-btn>
   </Link>
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
