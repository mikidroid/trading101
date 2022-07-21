<template>
  <admin-layout v-bind="{title:'All Deposits'}">
 
 <transAdmin :data="data" :headers="headers"/>
 
  </admin-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';
import transAdmin from '../inc/trans-admin.vue';

export default {
 props:['data'],
 components:{transAdmin},
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
         text:'method',
         value:'type',
         sortable:true,
        },
        {
         text:'coin',
         value:'coin',
        },
        {
         text:'ref',
         value:'ref'
        },
        {
         text:'amount',
         value:'amount'
        },
        {
         sortable:true,
         text:'status',
         value:'status'
        },
        {
         text:'action',
         value:'created_at'
        },
       ]
    }
 },
  
 
}
</script>
