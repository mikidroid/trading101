<template>
 <div>
  <v-bottom-navigation
      v-model="value"
      :input-value="active"
      :style="{height:'7vh',background:color.p_light}"
      app
      v-if="hideBottomNav == false || hideBottomNav == null"
      dark
      grow
      horizonta
    >
   
   
      <v-btn>
       <Link as="button" :href="route('/')">
        <!-- <span :style="{color:color.accent}">Invest</span> -->
        <v-icon :style="{color:color.p_text}">mdi-home</v-icon>
        </Link>
      </v-btn>
     <br/>
     
     <v-btn>
       <!-- <span :style="{color:color.accent}">Invest</span> -->
     <Link as="button" :href="route('trade.index')">
        <v-icon :style="{color:color.p_text}">mdi-briefcase-clock-outline</v-icon>
             </Link>
      </v-btn>
     <br/>
      <v-btn>
       <!-- <span :style="{color:color.accent}">Invest</span> -->
     <Link as="button" :href="route('transactions.index')">
        <v-icon :style="{color:color.p_text}">mdi-history</v-icon></Link>
      </v-btn>
     <br/>
     <v-btn >
      <!-- <span :style="{color:color.accent}">history</span> -->
     <Link as="button" :href="route('lottery.index')">
        <v-icon :style="{color:color.p_text}">mdi-gift-outline</v-icon></Link>
      </v-btn>
    </v-bottom-navigation>
    </div>
</template>

<script>
import {colors} from '../../config/config.js';

export default {
 props:['hideBottomNav'],
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
