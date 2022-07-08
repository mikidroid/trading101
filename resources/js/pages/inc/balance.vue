<template>
  <div class="my-5" v-show="user">
    <v-card dark :style="{borderRadius:'15px'}" :color="color.p_light" elevation="0">
        
  
  
  <div class="d-flex mt-4 px-2" color="inherent">
      <div class="mt-3 pa-2 mr-auto subtitle" inherent>
     <Link as="button" :href="route('deposit.index')">
      <v-btn
      rounded
      :color="color.accent"
      light
      class="ma-4"
      >
      Fund
      <v-icon
        right
        dark
      >
        mdi-cash
      </v-icon>
    </v-btn>
    </Link>
    </div>

      <div class="pa-2 mt-5 title" inherent> <div class="ma-4">👑 {{user.name}}</div> </div>
    </div>
    
        <v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_dark" elevation="0" class="mx-4 mb-4 justify-center">
           <v-card-title class="py-1 display-1" :style="{color:color.p_text}">
            💲
            <!-- Number count component-->
           <number
           	:from="0"
           	:to="balance"
           	:format="theFormat"
           	:duration="5"
            :delay="1"
            easing="Power1.easeOut"/>
            <!-- End Number count component-->
           </v-card-title>
           <v-card-text :style="{color:color.accent}" class="ml-4 caption">
            Main Balance (USD) 💰
           </v-card-text>
        </v-card>
        
        
        <v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_dark" elevation="0" class="mx-4 mb-4 justify-center">
           <v-card-title class="py-1 display-1" :style="{color:color.p_text}">
            💲
           <!-- Number count component-->
           <number
           	:from="0"
           	:to="profit"
           	:format="theFormat"
           	:duration="5"
            :delay="1"
            easing="Power1.easeOut"/>
            <!--End Number count component-->
           </v-card-title>
           <v-card-text :style="{color:color.accent}" class="ml-4 caption">
            Trading Profit (USD) 💹
           </v-card-text>
        </v-card>
        <br>
     </v-card>
  </div>
</template>

<script>
import Vue from 'vue'
import VueNumber from 'vue-number-animation'
import {colors} from '../../components/config/config.js';

Vue.use(VueNumber)
export default {
 methods:{
   theFormat(number) {
            return number.toFixed(2);
        },
   
 },
 data(){
    return{
     color:colors,
    }
 },
computed:{
     user(){
      return this.$page.props.auth.user
     },
     balance(){
      var g = this.user.bal.toString()
      return g
     },
     profit(){
      var g = this.user.profit.toString()
      return g
     }
    },
 
}
</script>
