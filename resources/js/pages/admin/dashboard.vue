<template>
  <admin-layout :title="'Admin Dashboard'">


<CRow>
  <CCol>
    <sparkline :pieChart="data" :data="data.visitors" class="my-3"/>
  </CCol>
</CRow>

  
<!-- Start user card stat -->
<CRow>
     <CCol>
      <CWidgetProgressIcon
        :header="data.today_visitors.visitors<1?1:data.today_visitors.visitors.toString()" 
        text="Today"
        inverse
        color="danger"
      >
      <v-icon dark>mdi-account-group-outline</v-icon>
      
      </CWidgetProgressIcon>
    </CCol>
    <CCol>
      <CWidgetProgressIcon
        :header="data.online<1?1:data.online.toString()" 
        text="Online"
        inverse
        color="success"
      >
      <v-icon dark>mdi-account-check-outline</v-icon>
      
      </CWidgetProgressIcon>
    </CCol>
    <CCol>
      <CWidgetProgressIcon
        :header="data.users"
        text="All Clients"
        inverse
        color="info"
      >
        <v-icon dark>mdi-account</v-icon>
      </CWidgetProgressIcon>
    </CCol>
  </CRow>
  
<CRow>
    <CCol lg="6">
      <CWidgetProgress
        :header="'$'+data.total_deposit.toString()+'.00'"
        text="Total Income"
        footer="Total Revenue Generated"
        color="dark"
        inverse
        :value="incomeProgressValue"
      />
    </CCol>
    <CCol lg="6">
      <CWidgetProgress
        :header="'$'+(data.total_deposit-data.total_withdrawal)+'.00'"
        inverse
        text="Available Income"
        footer="Remaining Cash After Withdrawal Expenses"
        color="dark"
        :value="AvailableCashProgressValue"
      />
    </CCol>
  </CRow>
  
  <CRow>
    <CCol lg="6">
      <CWidgetProgress
        :header="'$'+data.total_withdrawal.toString()+'.00'"
        text="Fullfiled Expenses"
        footer="Total Payouts"
        color="dark"
        inverse
        :value="fullfiledProgressValue"
      />
    </CCol>
    <CCol lg="6">
      <CWidgetProgress
        :header="'$'+data.pending_withdrawal+'.00'"
        inverse
        text="Unmet Expenses"
        footer="Pending Payouts"
        color="dark"
        :value="unmetIncomeProgressValue"
      />
    </CCol>
  </CRow>
  
  
  <CRow>
    <CCol col="12" sm="6">
      <CWidgetIcon
        :header="data.investments.toString()"
        text="Investments"
        color="primary"
      >
        <v-icon dark>mdi-finance</v-icon>
      </CWidgetIcon>
    </CCol>
    <CCol col="12" sm="6">
      <CWidgetIcon
        :header="data.deposits.toString()"
        text="Deposits"
        color="info"
      >
        <v-icon dark>mdi-bank</v-icon>
      </CWidgetIcon>
    </CCol>
  </CRow>
  
  <CRow>
    <CCol col="12" sm="6">
      <CWidgetIcon
        :header="data.withdrawals.toString()"
        text="Withdrawals"
        color="primary"
      >
        <v-icon dark>mdi-cash</v-icon>
      </CWidgetIcon>
    </CCol>

<!--
    <CCol col="12" sm="6">
        <a class="bg-dark text-decoration-none" href="/lottery" > <v-list two-line><v-list-item>
          <v-list-item-content>
           
           <v-list-item-subtitle :style="{color:color.s_text}" class="ml-2 pb-1 caption">
           ✅     
           Latest Lottery Winner
           </v-list-item-subtitle>
           <v-list-item-title class=" ml-3  display-0" :style="{color:color.d}">
             🎁 {{data.lottery.name}}
           </v-list-item-title>

           </v-list-item-content>
             <v-list-item-action>
              <v-chip light :color="color.accent" small>
               {{data.lottery.claimed?'Already Claimed':'Not Claimed'}}
              </v-chip>
              <v-list-item-action-text>
              
              </v-list-item-action-text>
   </v-list-item-action>
</v-list-item>
          </v-list>
        </a>
    </CCol>
-->
  </CRow>

  </admin-layout>
</template>

<script>

import sparkline from '../inc/sparkline.vue';
import barChart from '../inc/barChart.vue';
import {colors} from '../../components/config/config.js';


export default {
 props:['data'],
 components:{
  sparkline,barChart
 },
 methods:{
  
 },
 data(){
    return{
      color:colors,
      cilList:cilList,
      cilShieldAlt,
    }
 },
 computed:{
    user(){
     return this.$page.props.auth.user
    },
    incomeProgressValue(){
      let dep = this.data.total_deposit
      let incTarget = this.data.income_target
      let sum1 = incTarget/100
      let value = dep/sum1 
      return value;
    },
    AvailableCashProgressValue(){
      let dep = this.data.total_deposit
      let wit = this.data.total_withdrawal    
      let subtract = dep-wit
      let incTarget = this.data.income_target
      let sum1 = incTarget/100
      let value = subtract/sum1 
      return value;
    },
    fullfiledProgressValue(){
      let wit = this.data.total_withdrawal
      let incTarget = this.data.income_target
      let sum1 = incTarget/100
      let value = wit/sum1 
      return value;
    },
    unmetIncomeProgressValue(){
      let wit = this.data.pending_withdrawal
      let incTarget = this.data.income_target
      let sum1 = incTarget/100
      let value = wit/sum1 
      return value;
    },
 },
}
</script>
