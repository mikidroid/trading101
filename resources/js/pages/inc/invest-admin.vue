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
      
 <template v-slot:item.interest="{ item }">
      <v-text
      >
  ${{ item.interest }}
      </v-text>
    </template>
      
 <template v-slot:item.amount="{ item }">
      <v-text
      >
  ${{ item.amount }}
      </v-text>
    </template>
      
 <template v-slot:item.duration="{ item }">
      <v-text
      >
  {{ item.duration }} Day(s)
      </v-text>
    </template>

 <template v-slot:item.start_date="{ item }">
      <v-text
      >
  {{ new Date(item.start_date).toLocaleDateString()}}
      </v-text>
    </template>
    
 <template v-slot:item.end_date="{ item }">
      <v-text
      >
  {{ new Date(item.end_date).toLocaleDateString()}}
      </v-text>
    </template>

 <template v-slot:item.status="{ item }">
      <v-chip
        dark
        :color="item.status==0?'blue':'warning'"
      >
       <v-icon left>
  {{ item.status == 1?'mdi-clock-outline':'mdi-check-decagram' }}
      </v-icon>
        {{ item.status == 1?'pending':'completed' }}
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
