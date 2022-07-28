<template>
  <guest-layout v-bind="{title:'Trade'}">
 

<vuetradingchart :options="chartOptions"></vuetradingchart>

  </guest-layout> 
</template>

<script>
import {colors} from '../../components/config/config.js';
require("https://s3.tradingview.com/tv.js");
import vuetradingchart from 'vue-tradingchart';

export default {
 components: { vuetradingchart },
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
