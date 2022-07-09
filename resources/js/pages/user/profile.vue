<template>
  <guest-layout v-bind="{title:'Profile'}">
   <v-container>
   Profile
   <Link as="button" 
   :href="route('profile.edit',{id:user.id})" >
   <v-btn block :color="color.accent"> 
   Edit profile
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
