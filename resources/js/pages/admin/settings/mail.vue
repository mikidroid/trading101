<template>
  <admin-layout >
  <v-container>
   
  <banner 
           :icon="'mdi-lock'"
           :title="'Installation Notice'"
           :subtitle="'Edit with caution, leave at DEFAULT SETTINGS if unsure!'"
        />
        
   <div class="title pa-3">
    Mail Settings
   </div>
  
  <v-form @submit.prevent="submit">
                  <v-text-field
                    v-model="form.host"
                    label="Server mail host"
                    rounded
                    dark
                    type="text"
                    outlined
                    dense
                    :error-messages="form.errors.host"
                  />
                  <v-text-field
                    v-model="form.port"
                    label="Server mail port"
                    rounded
                    dark
                    type="text"
                    outlined
                    dense
                    :error-messages="form.errors.port"
                  />
                  <v-text-field
                    v-model="form.username"
                    label="Server Mail Username"
                    rounded
                    dark
                    type="text"
                    outlined
                    dense
                    :error-messages="form.errors.username"
                  />
                  <v-text-field
                    v-model="form.password"
                    label="Server Mail Password"
                    rounded
                    dark
                    type="text"
                    outlined
                    dense
                    :error-messages="form.errors.password"
                  />
                  <v-text-field
                    v-model="form.admin1"
                    label="Admin1 EMail"
                    rounded
                    dark
                    type="text"
                    outlined
                    dense
                    :error-messages="form.errors.admin1"
                  />
                  <v-text-field
                    v-model="form.admin2"
                    label="Admin2 EMail"
                    rounded
                    dark
                    type="text"
                    outlined
                    dense
                    :error-messages="form.errors.admin2"
                  />
                  <v-text-field
                    v-model="form.admin_number"
                    label="Number Of Admins"
                    rounded
                    dark
                    type="number"
                    outlined
                    dense
                    :error-messages="form.errors.admin_number"
                  />
                  <v-btn light rounded :loading="form.processing" type="submit" block :color="color.accent" class="mt-3"
                    >save</v-btn
                  >
  </v-form>
   
 </v-container>
  </admin-layout>
</template>

<script>
import {colors} from '../../../components/config/config.js';
import banner from '../../inc/banner-install.vue'

export default {
 components:{
  banner
  
 },
 methods:{
   submit(){
    this.form.post('/admin/mail-settings/store')
   }
 },
 data(){
    return{
      color:colors,
      form:this.$inertia.form({
         host:this.data.host,
         username:this.data.username,
         port:this.data.port,
         password:this.data.password,
         admin_number:this.data.admin_number,
         admin1:this.data.admin1,
         admin2:this.data.admin2,
      })
    }
 },
 props:['data'],
 computed:{
    
 },
}
</script>
