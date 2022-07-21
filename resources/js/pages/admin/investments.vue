<template>
  <admin-layout>
 
 <UserTable :data="data" :headers="headers"/>
 
  </admin-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';
import UserTable from '../inc/usertable.vue';

export default {
 props:['data'],
 components:{UserTable},
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
         text:'phone',
         value:'phone',
         sortable:true
        },
        {
         text:'balance',
         value:'balance'
        },
        {
         text:'registered',
         value:'created_at'
        },
        {
         text:'action',
         value:'updated_at'
        },
       ]
    }
 },
  
 
}
</script>
