<template>
  <guest-layout v-bind="{title:'Trade'}">
   <v-container>
    <div v-if="da">
     <v-card-text>{{da}}</v-card-text>
    </div>
     <div v-show="loading">loading data...</div>
     
     <!-- TradingView Widget BEGin
<div class="tradingview-widget-container">
  <div id="tradingview_01bfe"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BTCUSDT/?exchange=BINANCE" rel="noopener" target="_blank"><span class="blue-text">BTCUSDT Chart</span></a> by TradingView</div>

<script type="application/javascript" defer src="https://s3.tradingview.com/tv.js"></script>
-->

 
</div>
<!-- TradingView Widget END -->
     
   </v-container>
  </guest-layout>
</template>

<script>
import {colors} from '../../components/config/config.js';
//import "https://s3.tradingview.com/tv.js"

export default {
 methods:{
  
   
 },
 data(){
    return{
     ws:null,
     da:[],
     loading:this.da,
     color:colors,
     showPassword: false,
      color:colors,
      coins:['ETH','USDT','LITE','BTC'],
      isLoading: false,
      form: this.$inertia.form({
        coin:'BTC',
        email: null,
        password: null,
        remember_me: false,
      })}
 },
  
 created(){
  
  /*
  new TradingView.widget(
  {
  "autosize": true,
  "symbol": "BINANCE:BTCUSDT",
  "interval": "1",
  "timezone": "Etc/UTC",
  "theme": "light",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "allow_symbol_change": true,
  "container_id": "tradingview_01bfe"
})
  
  */
        this.ws = new WebSocket('wss://stream.binance.com:9443/stream?streams=btcusdt@kline_1m');
       this.ws.onmessage=(e)=>{
         let da = JSON.parse(e.data)
      //   this.da.push(da); 
         this.da = da; 
        }
  },
 computed: {
    user(){
     return this.props.auth.user
    },
    
    price(){
       var p = 8;


       
    }
 },
}
</script>
