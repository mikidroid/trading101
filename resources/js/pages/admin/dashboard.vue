<template>
  <admin-layout :title="'Admin Dashboard'">

<v-row no-gutters> 
 <v-col cols="12" sm="12" md="6">
        <a class="text-decoration-none" href="/admin/users" ><v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_light" elevation="3" class="mx-4 mb-4 justify-center">
           <v-card-title class="py-1 ml-3  display-1" :style="{color:color.p_text}">
             🧑 {{data.users}}
           </v-card-title>
           <v-card-text :style="{color:color.accent}" class="ml-4 mt-4 caption">
           ✅ Total Registered Users 
           </v-card-text>
        </v-card></a>
 </v-col>
 
  <v-col cols="12" sm="12" md="6">
        <a class="text-decoration-none" href="/admin/investments" ><v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_light" elevation="3" class="mx-4 mb-4 justify-center">
           <v-card-title class="py-1 ml-3 display-1" :style="{color:color.p_text}">
             💼 {{data.investments}} 
           </v-card-title>
           <v-card-text :style="{color:color.accent}" class="ml-4 mt-4 caption">
             ✅ Total User Investments 
           </v-card-text>
        </v-card></a>
 </v-col>
 
</v-row>

<v-row no-gutters> 
 <v-col cols="12" sm="12" md="6">
        <a class="text-decoration-none" href="/admin/deposits" ><v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_light" elevation="3" class="mx-4 mb-4 justify-center">
           <v-card-title class="py-1 ml-3 display-1" :style="{color:color.p_text}">
            💲{{data.total_deposit}}.00
           </v-card-title>
           <v-card-text :style="{color:color.accent}" class="ml-4 mt-4 caption">
            ✅  Total     Confirmed Deposit Amount</v-card-text>
        </v-card></a>
 </v-col>
 
  <v-col cols="12" sm="12" md="6">
        <a class="text-decoration-none" href="/admin/withdrawals" ><v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_light" elevation="3" class="mx-4 mb-4 justify-center">
           <v-card-title class="py-1 ml-3 display-1" :style="{color:color.p_text}">
            💲{{data.total_withdrawal}}.00
           </v-card-title>
           <v-card-text :style="{color:color.accent}" class="ml-4 mt-4 caption">
            ✅ Total        Confirmed Withdraw Amount
           </v-card-text>
        </v-card></a>
 </v-col>
 
</v-row>

<v-row no-gutters> 
 <v-col cols="6" xs="6" md="6">
        <a class="text-decoration-none" href="/admin/deposits" ><v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_light" elevation="3" class="mx-4 mb-4 justify-center">
           <v-card-title class="py-1 ml-3  display-1" :style="{color:color.p_text}">
             💵 {{data.deposits}}
           </v-card-title>
           <v-card-text :style="{color:color.accent}" class="ml-4 mt-4 caption">
           ✅     Deposits
           </v-card-text>
        </v-card></a>
 </v-col>
 
  <v-col cols="6" xs="6" md="6">
        <a class="text-decoration-none" href="/admin/withdrawals" ><v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_light" elevation="3" class="mx-4 mb-4 justify-center">
           <v-card-title class="py-1 ml-3 display-1" :style="{color:color.p_text}">
             💳 {{data.withdrawals}} 
           </v-card-title>
           <v-card-text :style="{color:color.accent}" class="ml-4 mt-4 caption">
             ✅  Withdrawals
           </v-card-text>
        </v-card></a>
 </v-col>
 
</v-row>


<v-row no-gutters> 
 <v-col v-if="data.lottery" cols="12" xs="12" md="12">
        <a class="text-decoration-none" href="/lottery" ><v-card dark :style="{padding:'20px',borderRadius:'15px'}" :color="color.p_light" elevation="3" class="mx-4 mb-4 justify-center">
         <v-list two-line><v-list-item>
          <v-list-item-content>
           
           <v-list-item-subtitle :style="{color:color.accent}" class="ml-2 pb-1 caption">
           ✅     
           Latest Lottery Winner
           </v-list-item-subtitle>
           <v-list-item-title class=" ml-3  display-0" :style="{color:color.p_text}">
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
        </v-card></a>
 </v-col>
 

</v-row>

<CJumbotron color="dark">
    <h1 class="display-3">Bootstrap 4</h1>
    <p class="lead">Bootstrap 4 Components for Vue.js 2.6+</p>
    <p>For more information visit website</p>
    <CButton color="light" href="https://coreui.io/" target="_blank">More Info</CButton>
  </CJumbotron>
  
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
        :value="cashProgressValue"
      />
    </CCol>
  </CRow>
  
  <CRow>
    <CCol lg="6">
      <CWidgetProgress
        :header="'$'+data.total_deposit.toString()+'.00'"
        text="Fullfiled Expenses"
        footer="Total Payouts"
        color="dark"
        inverse
        :value="incomeProgressValue"
      />
    </CCol>
    <CCol lg="6">
      <CWidgetProgress
        :header="'$'+(data.total_deposit-data.total_withdrawal)+'.00'"
        inverse
        text="Unmet Expenses"
        footer="Pending Payouts"
        color="dark"
        :value="cashProgressValue"
      />
    </CCol>
  </CRow>
  
<CRow>
    <CCol>
      <CWidgetProgressIcon
        :header="136" 
        text="Members Online"
        inverse
        color="primary"
      >
      <v-icon dark>mdi-account</v-icon>
      
      </CWidgetProgressIcon>
    </CCol>
    <CCol>
      <CWidgetProgressIcon
        :header="data.users"
        text="New Clients"
        inverse
        color="dark"
      >
        <v-icon dark>mdi-account</v-icon>
      </CWidgetProgressIcon>
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
    cashProgressValue(){
      let dep = this.data.total_deposit
      let wit = this.data.total_withdrawal    
      let subtract = dep-wit
      let incTarget = this.data.income_target
      let sum1 = incTarget/100
      let value = subtract/sum1 
      return value;
    }
 },
}
</script>
