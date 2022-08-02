<template>
  <admin-layout >
  <v-container>
  <banner 
           :icon="'mdi-lock'"
           :title="'Installation Notice'"
           :subtitle="'Edit with caution, leave at DEFAULT SETTINGS if unsure!'"
        />
   
   <div class="title pa-3">
    Core Settings
   </div>
  
  <v-form @submit.prevent="submit">
                  <v-text-field
                    v-model="form.deposit_max"
                    label="Max Deposit ($)"
                    rounded
                    dark
                    type="number"
                    outlined
                    dense
                    :error-messages="form.errors.deposit_max"
                  />
                  <v-text-field
                    v-model="form.deposit_min"
                    label="Minimum Deposit ($)"
                    rounded
                    dark
                    type="number"
                    outlined
                    dense
                    :error-messages="form.errors.deposit_min"
                  />
                  <v-text-field
                    v-model="form.withdrawal_max"
                    label="Max Withdrawal ($)"
                    rounded
                    dark
                    type="number"
                    outlined
                    dense
                    :error-messages="form.errors.withdrawal_max"
                  />
                  <v-text-field
                    v-model="form.withdrawal_min"
                    label="Minimum Withdrawal ($)"
                    rounded
                    dark
                    type="number"
                    outlined
                    dense
                    :error-messages="form.errors.withdrawal_min"
                  />
                  <v-text-field
                    v-model="form.investment_max"
                    label="Max Investment ($)"
                    rounded
                    dark
                    type="number"
                    outlined
                    dense
                    :error-messages="form.errors.investment_max"
                  />
                  <v-text-field
                    v-model="form.investment_min"
                    label="Minimum Investment ($)"
                    rounded
                    dark
                    type="number"
                    outlined
                    dense
                    :error-messages="form.errors.investment_min"
                  />
                  <v-text-field
                    v-model="form.investment_interest"
                    label="Investment Interest (%)"
                    rounded
                    dark
                    type="number"
                    outlined
                    dense
                    :error-messages="form.errors.investment_interest"
                  />
                  <v-text-field
                    v-model="form.investment_duration"
                    label="Investment Duration (Days)"
                    rounded
                    dark
                    type="number"
                    outlined
                    dense
                    :error-messages="form.errors.investment_duration"
                  />
                  
      <!-- Disable for now bcus of laravel scheduler timing
                  <v-text-field
                    v-model="form.investment_frequency"
                    label="Profit Frequency (hours)"
                    rounded
                    dark
                    type="number"
                    outlined
                    dense
                    :error-messages="form.errors.investment_frequency"
                  />
      -->
                  <v-text-field
                    v-model="form.lottery_amount"
                    label="Lottery Amount ($)"
                    rounded
                    dark
                    type="number"
                    outlined
                    dense
                    :error-messages="form.errors.lottery_amount"
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
    this.form.post('/admin/core-settings/store')
   }
 },
 data(){
    return{
      color:colors,
      form:this.$inertia.form({
         deposit_max:this.data.deposit_max,
         deposit_min:this.data.deposit_min,
         withdrawal_max:this.data.withdrawal_max,
         withdrawal_min:this.data.withdrawal_min,
         investment_max:this.data.investment_max,
         investment_min:this.data.investment_min,
         investment_interest:this.data.investment_interest,
         investment_duration:this.data.investment_duration,
         investment_frequency:this.data.investment_frequency,
         lottery_amount:this.data.lottery_amount,
      })
    }
 },
 props:['data'],
 computed:{
    
 },
}
</script>





       $this->setEnv('DEPOSIT_MAX',$request->deposit_max);
       $this->setEnv('DEPOSIT_MIN',$request->deposit_min);
       $this->setEnv('WITHDRAWAL_MAX',$request->withdrawal_max);
       $this->setEnv('WITHDRAWAL_MIN',$request->withdrawal_min);
       $this->setEnv('INVESTMENT_MAX',$request->investment_max);
       $this->setEnv('INVESTMENT_MIN',$request->investment_min);
       $this->setEnv('INVESTMENT_FREQUENCY',$request->investment_frequency);
       $this->setEnv('INVESTMENT_INTEREST',$request->investment_interest);
       $this->setEnv('INVESTMENT_DURATION',$request->investment_duration);