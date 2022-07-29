<template>
  <guest-layout >
  <v-container>
   <banner 
           :icon="'mdi-lock'"
           :title="'Installation Notice'"
           :subtitle="'Edit with caution, leave at DEFAULT SETTINGS if unsure!'"
        />
   
   <div class="title pa-3">
    System Settings
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
                    >next</v-btn
                  >
  </v-form>
   
 </v-container>
  </guest-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';
import banner from '../inc/banner-install.vue'
export default {
 components:{
  banner
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
         db_database:this.data.db_database,
         db_host:this.data.db_host,
         db_username:this.data.db_username,
         db_password:this.data.db_password,
      })
    }
 },
 props:['data'],
 computed:{
    
 },
}
</script>
