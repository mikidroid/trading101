<template>
 
  <div class="mt-3 justify-center">
   <v-container>
   <v-row class="d-flex mx-2 mt-4 my-2" gutter>
     <div class="d-flex justify-start"> All Assets <v-icon size="20" class="ml-1" :color="color.p_text">mdi-alert-octagon</v-icon></div>
     <div class="d-flex ml-auto"> See all</div>
    </v-row>
    </v-container>
    <div class="text-center">
     <iframe frameBorder="0" src="html-widgets/prices.html" width="400" :height="500"
      >
     </iframe>
    </div>
   </div>
 
</template>

<script>
import {colors} from '../../components/config/config.js';

export default {
 methods:{
  
   
 },
 data(){
    return{
     color:colors,
     width:screen.width
}
 },
  
 created(){

  },
 computed: {
    user(){
     return this.props.auth.user
    },

 },
}
</script>
