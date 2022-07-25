<template>
 
  <div class="my-5">
   <v-row class="d-flex mx-1 my-2" gutter>
     <div class="d-flex justify-start"> All Assets <v-icon size="20" class="ml-1" :color="color.p_text">mdi-alert-octagon</v-icon></div>
     <div class="d-flex ml-auto"> See all</div>
    </v-row>
    
   <v-list class="pr-3" :style="{overflowY:'scroll',borderRadius:'15px',height:'300px'}" two-line dark :color="color.p_light">
     
       <v-list-item v-for="item in data" :key="index">
        <v-list-item-avatar>
         <v-icon>{{item.icon}}</v-icon>
        </v-list-item-avatar>
        <v-list-item-content>
        
         <v-list-item-title class="font-weight-medium">{{item.currency}} 
         
         <span :style="{color:'#f00'}" v-if="item.increase < 0" class="caption">
          <v-icon :style="{color:'#f00'}" class="caption">
           mdi-arrow-down
          </v-icon> 
          {{item.increase}}
          </span>
          
        <span :style="{color:'#0f0'}" v-show="item.increase == 0" class="caption">
          
        <v-icon :style="{color:'#0f0'}" class="caption">
           mdi-arrow-right
          </v-icon> 
          {{item.increase}}
          </span>
          
        <span :style="{color:'#0f0'}" v-show="item.increase > 0" class="caption">
          <v-icon :style="{color:'#0f0'}" class="caption">
           mdi-arrow-up
          </v-icon> 
          {{item.increase}}
          </span>
          
          </v-list-item-title>
        
         <v-list-item-subtitle>USD {{item.USD}}</v-list-item-subtitle>
        
        </v-list-item-content>
        <v-list-item-action class="font-weight-medium mt-5">
         <div>{{item.value}}</div>
        
         <div class="caption dark text--secondary">USD {{item.USD2}}</div>
        </v-list-item-action>
       </v-list-item>
     
   </v-list>
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
     data:[
       {currency: "NGN",
        value: 10,
        icon: "mdi-cash",
        USD: 0.034,
        USD2: 1.088,
        increase: 2.3,
        decrease: null},
       {currency: "HSV",
        value: 50,
        icon: "mdi-cash",
        USD: 0.734,
        USD2: 1.088,
        increase: 0,
        decrease: 0.8},
       {currency: "LGD",
        value: 10,
        icon: "mdi-cash",
        USD: 0.81,
        USD2: 1.088,
        increase: 2.3,
        decrease: null},
       {currency: "OHF",
        value: 20,
        icon: "mdi-cash",
        USD: 0.234,
        USD2: 1.088,
        increase: -0.3,
        decrease: null}
      ]
    }
 },
  
 computed: {
    
 },
}
</script>
