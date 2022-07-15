<template>
  <guest-layout v-bind="{title:'Transaction'}">
 
 <tableAdmin :data="data" :headers="headers"/>
 
  </guest-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';
import tableAdmin from '../inc/table-admin.vue';

export default {
 props:['data'],
 components:{tableAdmin},
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
