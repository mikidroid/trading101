<template>
  <guest-layout v-bind="{title:'Profile'}">
   <v-container>
   
   <v-list>
    <v-subheader>Details</v-subheader>
    <v-list-item>
     <v-list-item-avatar>
       <v-icon>
         👑
       </v-icon>
     </v-list-item-avatar>
       <v-list-item-content>
         <v-list-item-title>
            {{user.name}}
         </v-list-item-title>
         <v-list-item-subtitle>
            Name
         </v-list-item-subtitle>
       </v-list-item-content>
       <v-list-item-action>
        <v-icon>
         mdi-pen
        </v-icon>
       </v-list-item-action>
     </v-list-item>
    <v-divider/>
    <v-list-item>
     <v-list-item-avatar>
       <v-icon>
         mdi-mail
       </v-icon>
     </v-list-item-avatar>
       <v-list-item-content>
         <v-list-item-title>
            {{user.email}}
         </v-list-item-title>
         <v-list-item-subtitle>
            Email
         </v-list-item-subtitle>
       </v-list-item-content>
       <v-list-item-action>
        <v-icon>
         mdi-pen
        </v-icon>
       </v-list-item-action>
     </v-list-item>
    <v-divider/>
    <v-list-item>
     <v-list-item-avatar>
       <v-icon>
         mdi-phone
       </v-icon>
     </v-list-item-avatar>
       <v-list-item-content>
         <v-list-item-title>
            {{user.phone}}
         </v-list-item-title>
         <v-list-item-subtitle>
            Phone
         </v-list-item-subtitle>
       </v-list-item-content>
       <v-list-item-action>
        <v-icon>
         mdi-pen
        </v-icon>
       </v-list-item-action>
     </v-list-item>
    <v-divider/>
    <v-list-item>
     <v-list-item-avatar>
       <v-icon>
         mdi-account
       </v-icon>
     </v-list-item-avatar>
       <v-list-item-content>
         <v-list-item-title>
            {{user.gender}}
         </v-list-item-title>
         <v-list-item-subtitle>
            Gender
         </v-list-item-subtitle>
       </v-list-item-content>
       <v-list-item-action>
        <v-icon>
         mdi-pen
        </v-icon>
       </v-list-item-action>
     </v-list-item>
    <v-divider/>
    <v-list-item>
     <v-list-item-avatar>
       <v-icon>
         mdi-calender
       </v-icon>
     </v-list-item-avatar>
       <v-list-item-content>
         <v-list-item-title>
            {{user.dob}}
         </v-list-item-title>
         <v-list-item-subtitle>
            Date Of Birth
         </v-list-item-subtitle>
       </v-list-item-content>
       <v-list-item-action>
        <v-icon>
         mdi-pen
        </v-icon>
       </v-list-item-action>
     </v-list-item>
    <v-divider/>
    <v-list-item>
     <v-list-item-avatar>
       <v-icon>
         mdi-flag
       </v-icon>
     </v-list-item-avatar>
       <v-list-item-content>
         <v-list-item-title>
            {{user.country}}
         </v-list-item-title>
         <v-list-item-subtitle>
            Country
         </v-list-item-subtitle>
       </v-list-item-content>
       <v-list-item-action>
        <v-icon>
         mdi-pen
        </v-icon>
       </v-list-item-action>
     </v-list-item>
    <v-divider/>
    <v-list-item>
     <v-list-item-avatar>
       <v-icon>
         💵
       </v-icon>
     </v-list-item-avatar>
       <v-list-item-content>
         <v-list-item-title>
            {{user.bal}}
         </v-list-item-title>
         <v-list-item-subtitle>
            Balance
         </v-list-item-subtitle>
       </v-list-item-content>
       <v-list-item-action>
        <v-icon>
     
        </v-icon>
       </v-list-item-action>
     </v-list-item>
    <v-divider/>
    <Link as="button" 
   :href="route('profile.edit',{id:user.id})" >
   <v-btn class="ma-3 my-4" small block :color="color.accent"> 
   Edit profile
   </v-btn>
   </Link>
   </v-list>
   

   </v-container>
  </guest-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';

export default {
 methods:{
  
   
 },
 data(){
    return{
     color:colors,
    }
 },
  
 computed: {
    user(){
     return this.$page.props.auth.user
    }
 },
}
</script>
