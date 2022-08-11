<!-- App.vue -->
<template>
<v-app 
   v-bind:style="{background:color.p_dark,color:'#fff'}">

 <clientAppBar :title="title" :hideAppBar="hideAppBar"></clientAppBar>
  <!-- Sizes your content based upon application components -->
  <v-main>
   
    <!-- Provides the application the proper gutter -->
    <v-container>

      <!-- All pages enter here into the slot -->
      <div class="mt-5">
      <slot>
  
    
      </slot>
      </div>
      

    </v-container>
 
  </v-main>

  <clientBottomNav :hideBottomNav="hideBottomNav"></clientBottomNav>
    <!-- -->
  
  
</v-app>
</template>


<script>
import clientAppBar from './appBar/clientAppBar';
import clientBottomNav from './bottomNav/clientBottomNav.vue';
import {colors} from '../config/config.js';
  export default {
    props:['hideAppBar','hideBottomNav','title'],
    data: () => ({
      drawer: false,
      group: null,
      color: colors
    }),
    components:{clientAppBar,clientBottomNav}
  }
</script>