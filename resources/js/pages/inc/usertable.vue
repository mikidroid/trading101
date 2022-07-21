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
      
 <template v-slot:item.balance="{ item }">
      <div>
         ${{ item.balance/100 }}
      </div>
    </template>

 <template v-slot:item.created_at="{ item }">
      <div>
         {{new Date(item.created_at).toLocaleDateString()}}
      </div>
    </template>
    
 <template v-slot:item.updated_at="{ item }">
 
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
        <v-list-item>
         <a class="text-decoration-none" :href="'mailto:'+item.email">
          <v-list-item-title>
            Send Email
          </v-list-item-title>
          </a>
        </v-list-item>
        <v-list-item>
         <Link as="button" href="#" >
          <v-list-item-title>
           Delete User
         </v-list-item-title>
         </Link>
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
 computed:{
    
 },
 data(){
    return{
     search:"",
     menu:false,
     color:colors,
     flash:this.$page.props.flash,
    }
 },
 method:{
  theFormat(number) {
            return number.toFixed(2);
        },
 }
 
}
</script>
