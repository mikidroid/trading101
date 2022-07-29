<template>
 <div>
   <v-app-bar
      
      dark
      app
      v-if="hideAppBar == false || hideAppBar == null"
      :style="{background:color.p_dark}"
      elevate-on-scroll
    >
  <v-app-bar-nav-icon large >
      <v-btn @click="drawer = true" icon :color="color.accent">
        <v-icon>mdi-currency-eth</v-icon>
      </v-btn>

  </v-app-bar-nav-icon>

    <v-toolbar-title>
    <application-logo v-if="title == false || title == null"/>
    <div class="text-h5" v-show="title">{{title}}</div></v-toolbar-title>

    <v-spacer></v-spacer>

<!--
      <v-btn elevation="0" small light :color="color.accent" href="about"> 
      <Link as="button" :href="route('trade.index')" >
        <v-icon>mdi-chart-timeline-variant</v-icon> Trade</Link>
      </v-btn>

      <v-btn icon :color="color.accent" v-show="user">
      <Link as="button" :href="route('profile.index')" >
        <v-icon>mdi-account</v-icon>
        </Link>
      </v-btn>
-->

    </v-app-bar>
    
  
    <v-navigation-drawer
      v-model="drawer"
      app
      max-height="100%"
      max-width="100%"
      height="80%"
      width="70%"
      v-bind:style="{background:color.p_dark}"
      dark
      temporary
    >
     
     
     <v-list-item>
        <v-list-item-content>
          <v-list-item-title class="text-h6">
            Super4trade
          </v-list-item-title>
          <v-list-item-subtitle class="py-3" >
            Super Admin Panel
          </v-list-item-subtitle>
          
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>
     
      <v-list
        nav
        dense
      >
        <v-list-item-group
          v-model="group"
          active-class="deep-purple--text text--accent-4"
        >
          <v-list-item href="/" class="text-body-1">
            <v-list-item-icon>
              <v-icon>mdi-home</v-icon>
            </v-list-item-icon>
            <v-list-item-title >Home</v-list-item-title>
          </v-list-item>

          <v-list-item>
            <v-list-item-icon>
              <v-icon>mdi-chart-timeline-variant</v-icon>
            </v-list-item-icon>
             <v-list-item-title >           
             <Link as="button" 
             href="/admin/users">
              All Users
            </Link>
            </v-list-item-title>
         </Link>
          </v-list-item>
          
        <v-list-item>
            <v-list-item-icon>
              <v-icon>mdi-cash</v-icon>
            </v-list-item-icon>
            <v-list-item-title>             
            <Link as="button" 
             href="/admin/deposits">
             All Deposits
            </Link></v-list-item-title>
          </v-list-item>
          
        <v-list-item>
            <v-list-item-icon>
              <v-icon>mdi-cash</v-icon>
            </v-list-item-icon>
            <v-list-item-title>             
            <Link as="button" 
             href="/admin/withdrawals">
             All Withdrawals
            </Link></v-list-item-title>
          </v-list-item>
          
        <v-list-item>
            <v-list-item-icon>
              <v-icon>mdi-cash</v-icon>
            </v-list-item-icon>
            <v-list-item-title>             
            <Link as="button" 
             href="/admin/investments">
             All Investments
            </Link></v-list-item-title>
          </v-list-item>
          
        </v-list-item-group>
        
        
        <v-list-group
          :value="false"
          no-action
          sub-group
        >
          <template v-slot:activator>
            <v-list-item-content>
              <v-list-item-title>Settings</v-list-item-title>
            </v-list-item-content>
          </template>

         <v-list-item link >
           <Link as="button" href="/admin/core-settings">
           <v-list-item-title >Core settings</v-list-item-title>
           </Link>
           <v-list-item-icon>
           <v-icon>mdi-Deposits</v-icon>
           </v-list-item-icon>
         </v-list-item>
          
         <v-list-item
            link
          >
          <Link as="button" href="/admin/payment-settings">
           <v-list-item-title >Payment Settings</v-list-item-title>
         </Link>

         <v-list-item-icon>
         <v-icon>mdi-Deposits</v-icon>
         </v-list-item-icon>
          </v-list-item>
          
          
         <v-list-item link >
           <Link as="button" href="/admin/mail-settings">
           <v-list-item-title >Mail Settings</v-list-item-title>
           </Link>
           <v-list-item-icon>
           <v-icon>mdi-Deposits</v-icon>
           </v-list-item-icon>
         </v-list-item>
         
        </v-list-group>
          
       
        
      </v-list>
      
      <template v-slot:append>
        <div class="pa-2">
        <v-list-item v-if="user">
        <v-list-item-avatar>
          <v-img v-if="user.avatar" src="https://randomuser.me/api/portraits/men/78.jpg"></v-img>
          <v-icon>mdi-account</v-icon>
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title >{{user.name}}</v-list-item-title>
      <v-list-item-subtitle class="text-body1"> {{user.email}}</v-list-item-subtitle>
          
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>
          <form @submit.prevent="logout" id="logout">
           <v-btn v-if="user" @click="logout" block :color="color.primary">
            Logout
          </v-btn>        
          <v-btn v-if="!user" :href="route('login')" block :color="color.primary">
            Login
          </v-btn>
          </form>
        </div>
      </template>
      
    </v-navigation-drawer>
    </div>
    
</template>


<script>
import {colors} from '../../config/config.js'
  export default {
    props:['hideAppBar','title'],
    data: () => ({
      drawer: false,
      group: null,
      color:colors,
      //user:this.$page.props.auth.user
      //hideAppBar:'true'
    }),
    computed:{
     user(){
      return this.$page.props.auth.user
     }
    },
    methods:{
     logout(){
       this.$inertia.form().post('/logout')
       
     }
    }
 
  }
</script>