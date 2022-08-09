<template>
  <admin-layout :title="'Admin Dashboard'">
{{data.session}}
<CJumbotron color="dark">
    <h1 class="display-3">Bootstrap 4</h1>
    <p class="lead">Bootstrap 4 Components for Vue.js 2.6+</p>
    <p>For more information visit website</p>
    <CButton color="light" href="https://coreui.io/" target="_blank">More Info</CButton>
  </CJumbotron>
  
<!-- Start user card stat -->
<CRow>
     <CCol>
      <CWidgetProgressIcon
        :header="data.today_visitors.visitors<1?1:data.today_visitors.visitors.toString()" 
        text="Today"
        inverse
        color="danger"
      >
      <v-icon dark>mdi-account</v-icon>
      
      </CWidgetProgressIcon>
    </CCol>
    <CCol>
      <CWidgetProgressIcon
        :header="data.online<1?1:data.online.toString()" 
        text="Online"
        inverse
        color="success"
      >
      <v-icon dark>mdi-account</v-icon>
      
      </CWidgetProgressIcon>
    </CCol>
    <CCol>
      <CWidgetProgressIcon
        :header="data.users"
        text="New Clients"
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
        <CIcon name="cil-settings"/>
      </CWidgetIcon>
    </CCol>
    <CCol col="12" sm="6">
      <CWidgetIcon
        :header="data.deposits.toString()"
        text="Deposits"
        color="info"
      >
        <CIcon name="cil-laptop"/>
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
        <CIcon name="cil-settings"/>
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
import Vue from "vue";
/*import CoreuiVue from '@coreui/vue';
Vue.use(CoreuiVue);*/
import { CIcon } from '@coreui/icons-vue';
import { cilList, cilShieldAlt } from '@coreui/icons';
import {colors} from '../../components/config/config.js';
//import { CSwitch, CButton,CJumbotron } from '@coreui/vue';

export default {
 props:['data'],
 components:{
  CIcon
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
