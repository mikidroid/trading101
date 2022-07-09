<template>
  <guest-layout v-bind="{title:'Trade'}">
   <v-container>
              <v-form @submit.prevent="">
           <v-select
          v-model="coin"
          :items="coins"
          menu-props="auto"
          dark
          label="Select Coin"
          hide-details
          class="my-5 mt-4 pa-3"
          :error-messages="form.errors.email"
          prepend-icon="mdi-map"
          single-line
        ></v-select>
                   
                 
                  <v-text-field
                    v-model="form.password"
                    prepend-inner-icon="mdi-currency-usd"
                    label="Amount(USD)"
                    rounded
                    dark
                    outlined
                    type="number"
                    :error-messages="form.errors.password"
   
                  />
     
                  </div>
                  <v-btn light rounded :loading="form.processing" type="submit" block :color="color.accent" class="mt-3"
                    >Deposit</v-btn
                  >
                </v-form>
   </v-container>
  </guest-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';

export default {
 methods:{
  
   
 },
 data(){
    return{
     color:colors,
     showPassword: false,
      color:colors,
      coins:['ETH','USDT','LITE','BTC'],
      isLoading: false,
      form: this.$inertia.form({
        coin:'BTC',
        email: null,
        password: null,
        remember_me: false,
      })}
 },
  
 computed: {
    user(){
     return this.props.auth.user
    }
 },
}
</script>
