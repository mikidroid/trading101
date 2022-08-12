<template>
 <div>
  <v-row dense >
   <v-col class="d-flex align-center" dense :style="{overflowX:'scroll'}">
   <v-col  justify="center" class="" cols="5">
    <v-card :height="150" :style="{borderRadius:'15px'}" dark :color="color.p_light" class="pa-2 text-center">
     <v-icon class="my-4">mdi-chart-timeline-variant</v-icon>
     <div class="pa-2 text-wrap">Get 3% Daily Profit</div>
    </v-card>
   </v-col>
   <v-col cols="5">
    <v-card :height="150" :style="{borderRadius:'15px'}" dark :color="color.p_light" class="pa-2 text-center">
         <v-icon class="my-4">mdi-cash</v-icon>
     <div class="pa-2 text-wrap">24/7 <br> Withdraw</div>
    </v-card>
   </v-col>
   <v-col cols="5">
   <v-card :height="150" :style="{borderRadius:'15px'}" dark :color="color.p_light" class="pa-2 text-center">
   <v-icon class="my-4">mdi-lock</v-icon>
     <div class="pa-2 text-wrap">Secure <br>trading</div>
    </v-card>
   </v-col>
   </v-col>
   
  </v-row>
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
    }
 },
  
 computed: {
    
 },
}
</script>
