<template>
  <guest-layout >
  <v-container>
  <banner 
           :icon="'mdi-lock'"
           :title="'Installation Notice'"
           :subtitle="'Edit with caution, leave at DEFAULT SETTINGS if unsure!'"
        />
   <div class="title pa-3">
    Payment Settings
   </div>
  
  <v-form @submit.prevent="submit">
                  <v-text-field
                    v-model="form.payment_gateway"
                    label="Payment Gateway"
                    rounded
                    dark
                    type="text"
                    outlined
                    dense
                    :error-messages="form.errors.payment_gateway"
                  />
                  <v-text-field
                    v-model="form.api_key"
                    label="Api Key"
                    rounded
                    dark
                    type="text"
                    outlined
                    dense
                    :error-messages="form.errors.api_key"
                  />
                  <v-text-field
                    v-model="form.api_version"
                    label="Api Version"
                    rounded
                    dark
                    type="text"
                    outlined
                    dense
                    :error-messages="form.errors.api_version"
                  />
                  <v-text-field
                    v-model="form.webhook_secret"
                    label="Webhook Secret"
                    rounded
                    dark
                    type="text"
                    outlined
                    dense
                    :error-messages="form.errors.webhook_secret"
                  />

                  <v-btn light rounded :loading="form.processing" type="submit" block :color="color.accent" class="mt-3"
                    >Finish</v-btn
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
    this.form.post('/step4/store')
   }
 },
 data(){
    return{
      color:colors,
      form:this.$inertia.form({
         payment_gateway:this.data.payment_gateway,
         api_key:this.data.api_key,
         api_version:this.data.api_version,
         webhook_secret:this.data.webhook_secret,
      })
    }
 },
 props:['data'],
 computed:{
    
 },
}
</script>
