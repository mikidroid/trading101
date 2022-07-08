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
       <Link as="button" :href="route('home')">
        <!-- <span :style="{color:color.accent}">Invest</span> -->
        <v-icon :style="{color:color.p_text}">mdi-home</v-icon>
        </Link>
      </v-btn>
     <br/>
     
     <v-btn>
       <!-- <span :style="{color:color.accent}">Invest</span> -->

        <v-icon :style="{color:color.p_text}">mdi-briefcase-clock-outline</v-icon>
      </v-btn>
     <br/>
      <v-btn>
       <!-- <span :style="{color:color.accent}">Invest</span> -->

        <v-icon :style="{color:color.p_text}">mdi-history</v-icon>
      </v-btn>
     <br/>
     <v-btn >
      <!-- <span :style="{color:color.accent}">history</span> -->

        <v-icon :style="{color:color.p_text}">mdi-gift-outline</v-icon>
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
