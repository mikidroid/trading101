<template>
  <guest-layout v-bind="{title:'Trade'}">
 
    <v-tabs
       v-model="tabs"
        left
        dark
        :color="color.accent"
        :background-color="color.p_dark"
        >
      <v-tab>
        Chart
      </v-tab>
      <v-tab>
        Prices
      </v-tab>
      <v-tab>
        Tech Analysis
      </v-tab>
   <!--   <v-tab>
        Order book
      </v-tab> -->
    </v-tabs>
    <v-tabs-items 
       v-model="tabs" 
       :style="{backgroundColor:color.p_dark}">
      <v-tab-item>
        <vuetradingchart class="mt-5"
         :options="chartOptions"></vuetradingchart>
      </v-tab-item>
      <v-tab-item 
         :style="{backgroundColor:color.p_dark}" >
        <div class="text-center">
         <!-- import asset include -->
         <assets/>  
        </div>
      </v-tab-item>
      <v-tab-item 
         :style="{backgroundColor:color.p_dark}" >
        <div class="mt-2 text-center">
          <iframe frameBorder="0" src="html-widgets/tech-analysis.html" width="400" :height="400"
          >
          </iframe>
        </div>
      </v-tab-item>
    </v-tabs-items>
    


  </guest-layout> 
</template>

<script>
import {colors} from '../../components/config/config.js';
import vuetradingchart from 'vue-tradingchart';
import assets from '../inc/assets.vue'

export default {
 components: { vuetradingchart,assets },
 methods:{
  
 },
 data(){
    return{
     chartOptions: {
            theme: 'dark',
            width: 410,
            height: 600,
            symbol: "BINANCE:BTCUSDT",
            timezone: "Etc/UTC",
            theme: "dark",
            style: "1",
            locale: "en",
            toolbar_bg: "#f1f3f6",
            enable_publishing: true,
            withdateranges: true,
            range: "YTD",
            hide_side_toolbar: false,
            allow_symbol_change: true,
            details: true,
            hotlist: true,
            calendar: true,
            show_popup_button: true,
            popup_width: "1000",
            popup_height: "400",
            hide_top_toolbar: false,
            interval: 1 // that's mean 4h //
        },
     tabs:null,
     color:colors,
     form: this.$inertia.form({

      })}
 },
 
 mounted(){
   
 },
 watch:{
    
 },
}
</script>
