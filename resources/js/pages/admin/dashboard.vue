<template>
  <admin-layout :title="'Admin Dashboard'">

<v-row no-gutters> 
 <v-col cols="12" sm="12" md="6">
        <a class="text-decoration-none" href="/admin/users" ><v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_light" elevation="3" class="mx-4 mb-4 justify-center">
           <v-card-title class="py-1 ml-3  display-1" :style="{color:color.p_text}">
             🧑 {{data.users}}
           </v-card-title>
           <v-card-text :style="{color:color.accent}" class="ml-4 mt-4 caption">
           ✅ Total Registered Users 
           </v-card-text>
        </v-card></a>
 </v-col>
 
  <v-col cols="12" sm="12" md="6">
        <a class="text-decoration-none" href="/admin/investments" ><v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_light" elevation="3" class="mx-4 mb-4 justify-center">
           <v-card-title class="py-1 ml-3 display-1" :style="{color:color.p_text}">
             💼 {{data.investments}} 
           </v-card-title>
           <v-card-text :style="{color:color.accent}" class="ml-4 mt-4 caption">
             ✅ Total User Investments 
           </v-card-text>
        </v-card></a>
 </v-col>
 
</v-row>

<v-row no-gutters> 
 <v-col cols="12" sm="12" md="6">
        <a class="text-decoration-none" href="/admin/deposits" ><v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_light" elevation="3" class="mx-4 mb-4 justify-center">
           <v-card-title class="py-1 ml-3 display-1" :style="{color:color.p_text}">
            💲{{data.total_deposit}}.00
           </v-card-title>
           <v-card-text :style="{color:color.accent}" class="ml-4 mt-4 caption">
            ✅  Total     Confirmed Deposit Amount</v-card-text>
        </v-card></a>
 </v-col>
 
  <v-col cols="12" sm="12" md="6">
        <a class="text-decoration-none" href="/admin/withdrawals" ><v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_light" elevation="3" class="mx-4 mb-4 justify-center">
           <v-card-title class="py-1 ml-3 display-1" :style="{color:color.p_text}">
            💲{{data.total_withdrawal}}.00
           </v-card-title>
           <v-card-text :style="{color:color.accent}" class="ml-4 mt-4 caption">
            ✅ Total        Confirmed Withdraw Amount
           </v-card-text>
        </v-card></a>
 </v-col>
 
</v-row>

<v-row no-gutters> 
 <v-col cols="6" xs="6" md="6">
        <a class="text-decoration-none" href="/admin/deposits" ><v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_light" elevation="3" class="mx-4 mb-4 justify-center">
           <v-card-title class="py-1 ml-3  display-1" :style="{color:color.p_text}">
             💵 {{data.deposits}}
           </v-card-title>
           <v-card-text :style="{color:color.accent}" class="ml-4 mt-4 caption">
           ✅     Deposits
           </v-card-text>
        </v-card></a>
 </v-col>
 
  <v-col cols="6" xs="6" md="6">
        <a class="text-decoration-none" href="/admin/withdrawals" ><v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_light" elevation="3" class="mx-4 mb-4 justify-center">
           <v-card-title class="py-1 ml-3 display-1" :style="{color:color.p_text}">
             💳 {{data.withdrawals}} 
           </v-card-title>
           <v-card-text :style="{color:color.accent}" class="ml-4 mt-4 caption">
             ✅  Withdrawals
           </v-card-text>
        </v-card></a>
 </v-col>
 
</v-row>


<v-row no-gutters> 
 <v-col cols="12" xs="12" md="12">
        <a class="text-decoration-none" href="/lottery" ><v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_light" elevation="3" class="mx-4 mb-4 justify-center">
         <v-list two-line><v-list-item>
          <v-list-item-content>
           
           <v-list-item-subtitle :style="{color:color.accent}" class="ml-2 pb-1 caption">
           ✅     
           Latest Lottery Winner
           </v-list-item-subtitle>
           <v-list-item-title class=" ml-3  display-0" :style="{color:color.p_text}">
             🎁 {{data.lottery.name}}
           </v-list-item-title>

           </v-list-item-content>
             <v-list-item-action>
              <v-chip light :color="color.accent" small>
               {{data.lottery.claimed?'Already Claimed':'Not Claimed'}}
              </v-chip>
              <v-list-item-action-text>
              
              </v-list-item-action-text>
   </v-list-item-action>
</v-list-item>
          </v-list>
        </v-card></a>
 </v-col>
 

</v-row>

  </admin-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';

export default {
 props:['data'],
 components:{
  
 },
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
