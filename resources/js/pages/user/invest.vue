<template>
  <guest-layout v-bind="{title:'Invest'}">
   <v-container>
          <v-form @submit.prevent="submit" class="pt-15 mt-15">
      <!--     
         <v-select
          v-model="form.duration"
          :items="duration"
          menu-props="auto"
          dark
          label="Duration"
          hide-details
          class="my-5 mt-4 pa-3"
          :error-messages="form.errors.duration"
          prepend-icon="mdi-map"
          single-line
        ></v-select>
                  -->
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
                >
                Invest</v-btn>
               </v-form>
   </v-container>
  </guest-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';

export default {
 methods:{
  submit(){
    this.form.post(route('investment.store'));
  }
   
 },
 data(){
    return{
     color:colors,
     showPassword: false,
      color:colors,
      duration:['A Month','2 Months','3 Months','4 Months'],
      isLoading: false,
      form: this.$inertia.form({
        amount: null,
        duration:null
      })}
 },
  
 computed: {
    user(){
     return this.$page.props.auth.user
    }
 },
}
</script>
