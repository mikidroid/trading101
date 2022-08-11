<template>
 <v-container>
  <v-card-text :style="{color:color.p_text}" class="text-center display-2 pa-2 font-weight-black">
   <v-span :style="{color:color.l}">Crypto</v-span> Trading Service     <v-span :style="{color:color.l}">Worldwide</v-span>
  </v-card-text>
  
   <div :style="{textAlign:'center'}" class="mt-2 pa-2"><p>
   Super4Trade is an arbitrage Trading site that has API function to trigger trades in the crypto market In Super4trade, you will enjoy high-frequency trading services and also have your funds protected. 
   <p/><p>
   Using our four way method _arror_ Signal Trigger _arrow_ API Technology Order Trade _arrow_ Profit Return, you can obtain a profit of 2.6% in a day of maximum trade.</p>
  </div>
  
  <div class="pa-2 text-center">
  <v-btn href="/register" light :color="color.accent">
    Get Started Now <v-icon>mdi-arrow-right</v-icon>
  </v-btn>
  </div>
  
  <div class="text-center pa-2 mb-5 small">Join 3,000+ who trust us!</div>
  <v-divider dark/>
  </v-container>
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
