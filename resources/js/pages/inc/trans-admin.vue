<template>
   <v-container>

<v-data-table
    :headers="headers"
    :items="data"
    :items-per-page="5"
    class="elevation-1"
    dense
    :search="search"
  >
 
       <template v-slot:top>
        <v-text-field
          v-model="search"
          label="Search (UPPER CASE ONLY)"
          class="mx-4"
        ></v-text-field>
      </template>

 <template v-slot:item.status="{ item }">
      <v-chip
        dark
        :color="item.status==0?'warning':item.status==2?'red':'green'"
      >
      <v-icon left>
      {{ item.status == 1?'mdi-check-decagram':item.status == 2?'mdi-alert':'mdi-clock-outline' }}
      </v-icon>
      {{item.status==0?'Pending':item.status==2?'Failed':'Completed'}}
      </v-chip>
    </template>
    
 <template v-slot:item.created_at="{ item }">
 
 <!-- Menu -->

<template>
  <div class="text-center">
    <v-menu
      open-on-hover
      top
      offset-y
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          icon
          :color="color.primary"
          dark
          v-bind="attrs"
          v-on="on"
        >
        <v-icon>mdi-cog-outline</v-icon>
        </v-btn>
      </template>

      <v-list>
        <v-list-item v-show="item.type == 'deposit' && item.status==0">
         <Link as="button" :href="route('transaction.confirm',{id:item.id})" >
          <v-list-item-title>
            Confirm Deposit
          </v-list-item-title>
          </Link>
        </v-list-item>
        <v-list-item v-show="item.type == 'withdrawal'">
         <Link as="button" :href="route('transaction.confirm',{id:item.id})" >
          <v-list-item-title>
            Confirm Withdraw
          </v-list-item-title>
          </Link>
        </v-list-item>
        <v-list-item v-show="item.type == 'withdrawal'">
         <Link as="button" :href="route('withdrawal.reject',{id:item.id})" >
          <v-list-item-title>
            Reject Withdraw
          </v-list-item-title>
          </Link>
        </v-list-item>
        <v-list-item :href="route('transaction.delete',{id:item.id})">
          <v-list-item-title>
           Delete transaction
         </v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
  </div>
</template>
 
  </template>
    
</v-data-table>
   </v-container>

</template>

<script>
import {colors} from '../../components/config/config.js';

export default {
 props:['data','headers'],
 
 data(){
    return{
     search:"",
     menu:false,
     color:colors,
     flash:this.$page.props.flash,
    }
 },
  
 
}
</script>
