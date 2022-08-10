<template>
  <guest-layout v-bind="{title:'Withdraw'}">
   <v-container>
              <v-form @submit.prevent="submit" class="pt-15 mt-15">
           <v-select
          v-model="coin"
          :items="coins"
          menu-props="auto"
          dark
          label="Select Coin"
          hide-details
          class="my-5 mt-4 pa-3"
          :error-messages="form.errors.coin"
          prepend-icon="mdi-map"
          single-line
        ></v-select>
                   
                 <v-text-field
                    v-model="form.coin_address"
                    prepend-inner-icon="mdi-address"
                    label="Enter wallet address"
                    rounded
                    dark
                    outlined
                    type="text"
                    :error-messages="form.errors.coin_address"
   
                  />
                  <v-text-field
                    v-model="form.amount"
                    prepend-inner-icon="mdi-currency-usd"
                    :label="'Amount (USD) - Bal: $'+user.bal"
                    rounded
                    dark
                    outlined
                    type="number"
                    :error-messages="form.errors.amount"
   
                  />
     
                  </div>
                  <v-btn light rounded :loading="form.processing" type="submit" block :color="color.accent" class="mt-3"
                    >Withdraw</v-btn
                  >
                </v-form>
   </v-container>
  </guest-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';

export default {
 methods:{
  submit(){
   this.form.post('withdrawal/store');
  }
   
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
        coin_address: null,
        amount: null,
        remember_me: false,
      })}
 },
  
 computed: {
    user(){
     return this.$page.props.auth.user
    }
 },
}
</script>
