<template>
<v-container>

<v-data-table
    :headers="headers"
    :items="data"
    :items-per-page="5"
    class="elevation-1"
    dense
    :search="search"
  >
 
   <template v-slot:top>
        <v-text-field
          v-model="search"
          label="Search (UPPER CASE ONLY)"
          class="mx-4"
        ></v-text-field>
   </template>
   
    <template v-slot:item.created_at="{ item }">
      <v-text
      >
  {{ new Date(item.created_at).toLocaleDateString()}}
      </v-text>
    </template>

   <template v-slot:item.status="{ item }">
      <v-chip
        dark
        :color="item.status==0?'warning':item.status==2?'red':'green'"
      >
      <v-icon left>
      {{ item.status == 1?'mdi-check-decagram':item.status == 2?'mdi-alert':'mdi-clock-outline' }}
      </v-icon>
      {{item.status==0?'Pending':item.status==2?'Failed':'Completed'}}
      </v-chip>
   </template>
   
    <template v-slot:item.coin_address="{ item }">
     
    <span > {{item.type=='withdrawal'?item.coin_address:'Not required'}} </span>
    
   </template>
   
   <template v-slot:item.amount="{ item }">
    <span>$ {{item.amount}}</span>
   </template>
</v-data-table>
</v-container>

</template>

<script>
import {colors} from '../../components/config/config.js';

export default {
 props:['data','headers'],
 
 data(){
    return{
     search:"",
     menu:false,
     color:colors,
     flash:this.$page.props.flash,
    }
 },
  
 
}
</script>
