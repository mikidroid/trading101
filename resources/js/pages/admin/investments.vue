<template>
  <admin-layout v-bind="{title:'All Investments'}">
 
 <InvestTable :data="data" :headers="headers"/>
 
  </admin-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';
import InvestTable from '../inc/invest-admin.vue';

export default {
 props:['data'],
 components:{InvestTable},
 data(){
    return{
     search:"",
     menu:false,
     color:colors,
     flash:this.$page.props.flash,
     headers:[
        {
         text:'S/N',
         value:'id'
        },
       {text:'name',
        value:'name',
        sortable:true},
        {
         text:'email',
         value:'email',
         sortable:false
        },
        {
         text:'amount',
         value:'amount',
         sortable:true
        },
        {
         text:'current profit',
         value:'interest'
        },
        {
         text:'duration',
         value:'duration'
        },
        {
         text:'start date',
         value:'start_date'
        },
        {
         text:'end date',
         value:'end_date'
        },
        {
         text:'ref code',
         value:'ref',
         sortable:true
        },
        {
         text:'status',
         value:'status'
        },
       ]
    }
 },
  
 
}
</script>
