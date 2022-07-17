<template>
  <guest-layout v-bind="{title:'Transaction'}">
 
 <transUser :data="data" :headers="headers"/>
 
  </guest-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';
import transUser from '../inc/trans-user.vue';

export default {
 props:['data'],
 components:{transUser},
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
         text:'coin address',
         value:'coin_address',
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
         text:'ref',
         value:'ref'
        },
        {
         text:'date',
         value:'created_at'
        },
       ]
    }
 },
  
 
}
</script>
