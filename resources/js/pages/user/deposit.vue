<template>
  <guest-layout v-bind="{title:'Deposit'}">
   <v-container>
     
        <v-form @submit.prevent="deposit" class="pt-15 mt-15">
           <v-select
          v-model="form.coin"
          :items="coins"
          menu-props="auto"
          dark
          disabled
          label="Select Coin"
          hide-details
          class="my-5 mt-4 pa-3"
          :error-messages="form.errors.coin"
          prepend-icon="mdi-map"
          single-line
        ></v-select>
                   
                 
                  <v-text-field
                    v-model="form.amount"
                    prepend-inner-icon="mdi-currency-usd"
                    label="Amount(USD)"
                    rounded
                    dark
                    outlined
                    type="number"
                    :error-messages="form.errors.amount"
   
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
  deposit(){
    this.form.post('/deposit/store');
  },
 },
 data(){
    return{
     color:colors,
     showPassword: false,
      color:colors,
      coins:['ETH','LITE','BTC'],
      isLoading: false,
      form: this.$inertia.form({
        coin:'BTC',
        amount: null
      })}
 },
  
 computed: {
    user(){
     return this.props.auth.user
    }
 },
 
}
</script>
