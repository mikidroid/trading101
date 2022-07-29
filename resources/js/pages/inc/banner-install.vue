<template>
 
  <v-banner class="mb-5" :style="{borderRadius:'15px'}" dark :color="color.primary" two-line>
    <v-avatar
      slot="icon"
      :color="color.accent"
      size="40"
    >
      <v-icon
        light
        color="black"
      >
      {{icon}}
      </v-icon>
    </v-avatar>
    <div class="title font-weight-bold">
     {{title}}
     </div>
    {{subtitle}}

  </v-banner>
  
</template>

<script>
import {colors} from '../../components/config/config.js';

export default {
 props:['title','subtitle','icon'],
 methods:{
  
   
 },
 data(){
    return{
     color:colors,
    }
 },
  
 computed:{
    user(){
     return this.$page.props.auth.user
    }
 },
}
</script>
