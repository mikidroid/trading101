<template>
  <v-dialog
    v-model="dialog1"
    persistent
    >
   <template v-slot:activator="{ on, attrs }">
    <v-btn
      icon
      :color="color.primary"
      dark
      v-bind="attrs"
      v-on="on"
      >
      <v-icon>mdi-cog-outline</v-icon>
    </v-btn>
   </template>
    <v-card>
     <v-card-title>
     User Actions
     </v-card-title>
     <v-divider></v-divider>
     <v-card-text>
       <v-list>
         <v-list-item>
           <a class="text-decoration-none" 
              :href="'mailto:'+item.email">
             <v-list-item-title>
             Send Email
             </v-list-item-title>
           </a>
         </v-list-item>
         <v-divider></v-divider>
         <v-list-item>
           <Link as="button" 
             :href="'/admin/delete-user/'+item.id" >
             <v-list-item-title>
             Delete User
             </v-list-item-title>
           </Link>
         </v-list-item> 
         <v-divider></v-divider>
         <v-list-item>
         <!-- Open dialog -->
           <v-dialog
             v-model="dialog"
             persistent
             max-width="600px"
             >
             <template v-slot:activator="{ on, attrs }">
               <v-list-item-title color="primary"
                  dark
                  text
                  v-bind="attrs"
                  v-on="on" >
                  Credit User
               </v-list-item-title>
             </template>
             <v-card>
             <form @submit.prevent="submit(item.id)">
              <v-card-title>
               <span class="text-h6">
                 Send Money to {{item.name}}
               </span>
              </v-card-title>
              <v-card-text>
                <v-container>
                  <v-row>
                    <v-col
                      cols="12"
                      sm="6"
                      md="4"
                      >
                     <v-text-field
                       label="Amount"
                       type="number"
                       v-model="form.amount"
                       :errors="form.errors.amount"
                       required
                       >
                     </v-text-field>
                    </v-col>
                 </v-row>
               </v-container>
               <small>* Value sent is in USD</small>
             </v-card-text>
             <v-card-actions>
             <v-spacer></v-spacer>
               <v-btn
                 color="red darken-1"
                 text
                 @click="dialog = false"
                 >
                 Close
               </v-btn>
               <v-btn
                 text
                 color="blue darken-1"
                 :loading="form.processing" 
                 type="submit"
                 >
                 Credit
               </v-btn>
             </v-card-actions>
             </form>
             </v-card>
           </v-dialog>
  
         </v-list-item>
        
       </v-list>
    </v-card-text>
    <v-card-actions>
       <v-btn
          color="red darken-1"
          text
          @click="dialog1 = false"
          >
            Close
          </v-btn>
    </v-card-actions>
  </v-card>
  </v-dialog>
</template>

<script>
import {colors} from '../../components/config/config.js';

export default {
 props:['item'],
 computed:{
    
 },
 data(){
    return{
     dialog:false,
     dialog1:false,
     color:colors,
     flash:this.$page.props.flash,
     form:this.$inertia.form({
        amount:null
     })
    }
 },
 methods:{
   submit(id){
     this.form.post('credit-user/'+id)
  }
 }
 
}
</script>
