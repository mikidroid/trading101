<template>
  <guest-layout v-bind="{title:'Investments'}">
 
 <investUser :data="data" :headers="headers"/>
 
  </guest-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';
import investUser from '../inc/invest-user.vue';

export default {
 props:['data'],
 components:{investUser},
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
         sortable:true,
        },
        {
         text:'start',
         value:'start_date',
        },
        {
         text:'end',
         value:'end_date'
        },
        {
         text:'interest',
         value:'interest'
        },
        {
         sortable:true,
         text:'status',
         value:'status'
        },
        {
         text:'duration',
         value:'duration'
        },
       ]
    }
 },
  
 
}
</script>
