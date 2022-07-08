<template>
 
  <v-banner class="my-5" :style="{borderRadius:'15px'}" dark :color="color.primary" two-line>
    <v-avatar
      slot="icon"
      :color="color.accent"
      
      size="40"
    >
      <v-icon
        icon="mdi-lock"
        light
        color="black"
      >
        mdi-lock
      </v-icon>
    </v-avatar>
    <div class="title font-weight-bold">
     Account Notice
     </div>
    This is to inform you to update your account to lift limitations

    <template v-slot:actions>

      <v-btn
        text
        :color="color.accent"
      >
        Update
      </v-btn>
    </template>
  </v-banner>
  
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
