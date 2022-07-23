<template>
 
  <v-banner v-if="show" class="my-5" :style="{borderRadius:'15px'}" dark :color="color.primary" two-line>
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
    <template v-slot:actions>

      <v-btn
        text
        :color="color.accent"
        :href="link"
      >
        {{linkText}}
      </v-btn>
    </template>
  </v-banner>
  
</template>

<script>
import {colors} from '../../components/config/config.js';

export default {
 props:['title','subtitle','linkText','link','icon','show'],
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
