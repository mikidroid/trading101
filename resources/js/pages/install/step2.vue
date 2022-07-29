<template>
  <guest-layout >
  <v-container>
   <div class="title pa-3">
    Mail Settings
   </div>
  
  <v-form @submit.prevent="submit">
                  <v-text-field
                    v-model="form.db_database"
                    label="Database name"
                    rounded
                    dark
                    type="text"
                    outlined
                    dense
                    :error-messages="form.errors.db_database"
                  />
                  <v-text-field
                    v-model="form.db_host"
                    label="Database host"
                    rounded
                    dark
                    type="text"
                    outlined
                    dense
                    :error-messages="form.errors.db_host"
                  />
                  <v-text-field
                    v-model="form.db_username"
                    label="Database username"
                    rounded
                    dark
                    type="text"
                    outlined
                    dense
                    :error-messages="form.errors.db_username"
                  />
                  <v-text-field
                    v-model="form.db_password"
                    label="Password"
                    rounded
                    dark
                    type="text"
                    outlined
                    dense
                    :error-messages="form.errors.db_password"
                  />
                  <v-btn light rounded :loading="form.processing" type="submit" block :color="color.accent" class="mt-3"
                    >save</v-btn
                  >
  </v-form>
   
 </v-container>
  </guest-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';

export default {
 components:{
  
 },
 methods:{
   submit(){
    this.form.post('/step1/store')
   }
 },
 data(){
    return{
      color:colors,
      form:this.$inertia.form({
         db_database:null,
         db_host:null,
         db_username:null,
         db_password:null,
      })
    }
 },
 props:['data'],
 computed:{
    
 },
}
</script>
