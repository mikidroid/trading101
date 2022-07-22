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
      
 <template v-slot:item.balance="{ item }">
      <div>
         ${{ item.balance/100 }}
      </div>
    </template>

 <template v-slot:item.created_at="{ item }">
      <div>
         {{new Date(item.created_at).toLocaleDateString()}}
      </div>
    </template>
    
 <template v-slot:item.updated_at="{ item }">
 
 <!-- Dialog -->

  <UserActionsDialog :item="item"/>

</template>
 

    
</v-data-table>
   </v-container>

</template>

<script>
import {colors} from '../../components/config/config.js';
import UserActionsDialog from './user-actions-dialogs.vue'
export default {
 props:['data','headers'],
 components:{UserActionsDialog},
 computed:{
    
 },
 data(){
    return{
     dialog:false,
     dialog1:false,
     search:"",
     menu:false,
     color:colors,
     flash:this.$page.props.flash,
     form:this.$inertia.form({
        amount:null
     })
    }
 },
 method:{
   theFormat(number) {
      return number.toFixed(2);
   },
   submit(id){
     this.form.post('/credit-user/'+id)
  }
 }
 
}
</script>
