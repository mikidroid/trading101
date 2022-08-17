<template>
  <guest-layout v-bind="{title:'Invoice'}">
   <v-container>
          <v-progress-linear
            :color="color.accent"
            indeterminate
            rounded
            height="6"
          ></v-progress-linear>
       <v-form @submit.prevent="deposit" class="">
         <v-col justify="center" align="center">
        <div class="my-2 title"> PAY IN BITCOIN SECURELY</div> 
         <div class="my-2 body"> Scan Barcode</div> 
          <v-img class="mt-3 mb-5" :src="`https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=bitcoin:${data.btc_address}?amount=${data.btc_amount}`"/>
               
                  <v-text-field
                    v-model="data.btc_amount"
                    prepend-inner-icon="mdi-content-copy"
                    label="Copy Amount (BTC)"
                    rounded
                    readonly
                    @click:prepend=""
                    dark
                    outlined
                    type="text"
                  />
                   
                  <v-text-field
                    v-model="data.btc_address"
                    prepend-inner-icon="mdi-content-copy"
                    label="Copy Address(BTC)"
                    rounded
                    readonly
                    @click:prepend=""
                    dark
                    outlined
                    type="text"
                  />
     
                  <v-btn @click="success" light rounded block :color="color.accent" class="mt-1"
                    >Process Payment</v-btn
                  >
                  <v-btn @click="failed" light rounded block color="red" class="mt-3"
                    >Cancel Payment</v-btn
                  >
                 </v-col>
                </v-form>
   </v-container>
  </guest-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';

export default {
  props:['data'],
 methods:{
  success(){
    this.$inertia.visit('/deposit/success');
  },
  failed(){
    this.$inertia.visit('/deposit/fail');
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
