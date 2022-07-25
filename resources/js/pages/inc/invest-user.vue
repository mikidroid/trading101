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

   <template v-slot:item.status="{ item }">
      <v-chip
        dark
        :color="item.status==0?'green':'warning'"
      >
      <v-icon left>
      {{ item.status == 0?'mdi-clock-outline':'mdi-check-decagram' }}
      </v-icon>
      {{ item.status == 0?'completed':'running' }}
      </v-chip>
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
