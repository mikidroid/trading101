<template>
  <guest-layout v-bind="{title:'Lottery'}">
   <v-container>
  <template>
   
  <v-card
    class="mx-auto"
    max-width="400"
    :style="{borderRadius:'15px'}"
  >
    <v-img
      class="white--text align-end"
      height="200px"
      src="/files/images/lottery.jpg"
    >
      <v-card-text class="justify-center"><div class="text-h4 font-weight-black">
       Congratulations!!</div>
       <div class="justify-center text-h6">
       To our latest weekly lottery winner</div>
       
       </v-card-text>

    </v-img>
    
       <v-card-subtitle class="text-body font-size-30">
     Every registered user is eligible for the lottery, feeling lucky? check every week on friday to see if you are the lucky one.
   </v-card-subtitle>

   <v-card-text>
     <v-list
      two-line
      subheader
     >
      <v-subheader>Details</v-subheader>

      <v-list-item>
        <v-list-item-content>
          <v-list-item-title>Name</v-list-item-title>
          <v-list-item-subtitle>Uche Sam</v-list-item-subtitle>
        </v-list-item-content>
        <v-list-item-action>
         <v-icon color='green'>
         mdi-check-decagram
         </v-icon>
        </v-list-item-action>
      </v-list-item>
      
     <v-divider></v-divider>
      
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title>Amount</v-list-item-title>
          <v-list-item-subtitle>$400</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
    <v-divider></v-divider>
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title>Date</v-list-item-title>
          <v-list-item-subtitle>4 Days ago...</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
      
    </v-list>

</v-card-text>

<v-card-actions class="mb-3">
 <v-btn block :color="color.accent">
  Claim
 </v-btn>
</v-card-actions>

  </v-card>
</template>
   </v-container>
  </guest-layout>
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
