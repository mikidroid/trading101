<!-- App.vue -->
<template>
<v-app 
   v-bind:style="{fontFamily:'oswald',background:color.p_dark,color:'#fff'}">

 <adminAppBar :title="title" :hideAppBar="hideAppBar"></adminAppBar>
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

<!-- dont show bottom nav in admin, it is unnecessary
  <adminBottomNav :hideBottomNav="hideBottomNav"></adminBottomNav>
    -->
  
  
</v-app>
</template>


<script>
import adminAppBar from './appBar/adminAppBar';
import adminBottomNav from './bottomNav/adminBottomNav.vue';
import {colors} from '../config/config.js';
  export default {
    props:['hideAppBar','hideBottomNav','title'],
    data: () => ({
      drawer: false,
      group: null,
      color: colors
    }),
    components:{adminAppBar,adminBottomNav}
  }
</script>