<template>
  <div class="my-5">
   {{da}}
   <v-row class="d-flex mx-1 my-2" gutter>
     <div class="d-flex justify-start"> All Assets <v-icon size="20" class="ml-1" :color="color.p_text">mdi-alert-octagon</v-icon></div>
     <div class="d-flex ml-auto"> See all</div>
    </v-row>
    
   <v-list  class="pr-3" :style="{overflowY:'scroll',borderRadius:'15px',height:'300px'}" two-line dark :color="color.p_light">
     
       <v-list-item v-for="item in data" key="item.name">
        <v-list-item-avatar>
         <v-icon></v-icon>
        </v-list-item-avatar>
        <v-list-item-content>
        
         <v-list-item-title class="font-weight-medium">{{item.name}}
         
         <span :style="{color:'#f00'}" v-if="item.increase < 0" class="caption">
          <v-icon :style="{color:'#f00'}" class="caption">
           mdi-arrow-down
          </v-icon> 
          item.increase
          </span>
          
        <span :style="{color:'#0f0'}" v-show="item.increase == 0" class="caption">
          
        <v-icon :style="{color:'#0f0'}" class="caption">
           mdi-arrow-right
          </v-icon> 
          item.increase
          </span>
          
        <span :style="{color:'#0f0'}" v-show="item.increase > 0" class="caption">
          <v-icon :style="{color:'#0f0'}" class="caption">
           mdi-arrow-up
          </v-icon> 
          item.increase
          </span>
          
          </v-list-item-title>
        
         <v-list-item-subtitle>USD item.USD</v-list-item-subtitle>
        
        </v-list-item-content>
        <v-list-item-action class="font-weight-medium mt-5">
         <div :style="{color:item.color}">{{item.prev}}</div>
        
         <div class="caption">USDT</div>
        </v-list-item-action>
       </v-list-item>
     
   </v-list>
   </div>
  
</template>

<script>
import {colors} from '../../components/config/config.js';

export default {
 methods:{
  
   
 },
 data(){
    return{
     ws:null,
     da:[],
     btc:{name:'BTC',coin:'Bitcoin',value:0,color:'white',prev:0},
     eth:{name:'ETH',coin:'Ethereum',value:0,color:'white',prev:0},
     btc_cash:{name:'BTC-CASH',coin:'Bitcoin cash',value:0,color:'white',prev:0},
     xrp:{name:'XRP',coin:'Xrp',value:0,color:'white',prev:0},
     cad:{name:'CAD',coin:'Cardano',value:0,color:'white',prev:0},
     lth:{name:'LTH',coin:'Litecoin',value:0,color:'white',prev:0},
     teth:{name:'TTH',coin:'Tether',value:0,color:'white',prev:0},
     doge:{name:'DOGE',coin:'Dogecoin',value:0,color:'white',prev:0},
     eos:{name:'EOS',coin:'Eos',value:0,color:'white',prev:0},
     mon:{name:'MON',coin:'Monero',value:0,color:'white',prev:0},
     color:colors,
    }
 },
  
 created(){
        this.ws = new WebSocket('wss://ws.coincap.io/prices?assets=bitcoin,ethereum,monero,dogecoin,xrp,bitcoin-cash,cardano,eos,neo,tether,litecoin')
        this.ws.onmessage=(e)=>{
           let da = JSON.parse(e.data)
           this.btc.value = da.bitcoin 
           this.eth.value = da.ethereum
           this.lth.value = da.litecoin
           this.mon.value = da.monero
           this.teth.value = da.tether
           this.doge.value = da.dogecoin
           this.eos.value = da.eos
           this.btc_cash.value = da.bitcoin_cash
           this.cad.value = da.cardano
           this.xrp.value = da.xrp
           this.da = da
        }
  },
 computed: {
    user(){
     return this.props.auth.user
    },
    data(){
      return [{
        ...this.bitcoin},
       {...this.ethereum},
       {...this.litecoin},
       {...this.monero},
       {...this.tether},
       {...this.dogecoin},
       {...this.eos},
       {...this.cardano},
       {...this.bitcoin_cash},
       {...this.xrp},
     ]
    },
    bitcoin(){
     if(this.btc.value){
         this.btc.prev = this.btc.value
       }
       let prev = (this.btc.prev)
       let current = (this.btc.value)
       let name = (this.btc.name)
       let color = 'white'
       return {name:name,value:current,prev:prev,color:color};
    },
    ethereum(){
     if(this.eth.value){
         this.eth.prev = this.eth.value
       }
       let prev = (this.eth.prev)
       let current = (this.eth.value)
       let name = (this.eth.name)
       let color = 'white'
       return {name,value:current,prev:prev,color:color};
    },
    litecoin(){
     if(this.lth.value){
         this.lth.prev = this.lth.value
       }
       let prev = (this.lth.prev)
       let current = (this.lth.value)
       let name = (this.lth.name)
       let color = 'white'
       return {name,value:current,prev:prev,color:color};
    },
    monero(){
     if(this.mon.value){
         this.mon.prev = this.mon.value
       }
       let prev = (this.mon.prev)
       let current = (this.mon.value)
       let name = (this.mon.name)
       let color = 'white'
       return {name,value:current,prev:prev,color:color};
    },
    dogecoin(){
     if(this.doge.value){
         this.doge.prev = this.doge.value
       }
       let prev = (this.doge.prev)
       let current = (this.doge.value)
       let name = (this.doge.name)
       let color = 'white'
       return {name,value:current,prev:prev,color:color};
    },
    bitcoin_cash(){
     if(this.btc_cash.value){
         this.btc_cash.prev = this.btc_cash.value
       }
       let prev = (this.btc_cash.prev)
       let current = (this.btc_cash.value)
       let name = (this.btc_cash.name)
       let color = 'white'
       return {name,value:current,prev:prev,color:color};
    },
    tether(){
     if(this.teth.value){
         this.teth.prev = this.teth.value
       }
       let prev = (this.teth.prev)
       let current = (this.teth.value)
       let name = (this.teth.name)
       let color = 'white'
       return {name,value:current,prev:prev,color:color};
    },
    cardano(){
     if(this.cardano.value){
         this.cardano.prev = this.cardano.value
       }
       let prev = (this.cardano.prev)
       let current = (this.cardano.value)
       let name = (this.cardano.name)
       let color = 'white'
       return {name,value:current,prev:prev,color:color};
    },
    eos(){
     if(this.eos.value){
         this.eos.prev = this.eos.value
       }
       let prev = (this.eos.prev)
       let current = (this.eos.value)
       let name = (this.eos.name)
       let color = 'white'
       return {name,value:current,prev:prev,color:color};
    }
 },
watch:{
    tether(cur,prev){
       if(cur.value){
         this.tether.prev = cur.value
         let c= parseFloat(cur.value)
         let p= parseFloat(prev.value)
        if(c < p){
         this.tether.color='red'}
        if(c>p){
         this.tether.color='green'}
    }},
    eos(cur,prev){
       if(cur.value){
         this.eos.prev = cur.value
         let c= parseFloat(cur.value)
         let p= parseFloat(prev.value)
        if(c < p){
         this.eos.color='red'}
        if(c>p){
         this.eos.color='green'}
    }},
    dogecoin(cur,prev){
       if(cur.value){
         this.doge.prev = cur.value
         let c= parseFloat(cur.value)
         let p= parseFloat(prev.value)
        if(c < p){
         this.dogecoin.color='red'}
        if(c>p){
         this.dogecoin.color='green'}
    }},
    bitcoin_cash(cur,prev){
       if(cur.value){
         this.btc_cash.prev = cur.value
         let c= parseFloat(cur.value)
         let p= parseFloat(prev.value)
        if(c < p){
         this.bitcoin_cash.color='red'}
        if(c>p){
         this.bitcoin_cash.color='green'}
    }},
    cardano(cur,prev){
       if(cur.value){
         this.cad.prev = cur.value
         let c= parseFloat(cur.value)
         let p= parseFloat(prev.value)
        if(c < p){
         this.cardano.color='red'}
        if(c>p){
         this.cardano.color='green'}
    }},
    bitcoin(cur,prev){
       if(cur.value){
         this.btc.prev = cur.value
         let c= parseFloat(cur.value)
         let p= parseFloat(prev.value)
        if(c < p){
         this.bitcoin.color='red'}
        if(c>p){
         this.bitcoin.color='green'}
    }},
    ethereum(cur,prev){
       if(cur.value){
         this.eth.prev = cur.value
         let c= parseFloat(cur.value)
         let p= parseFloat(prev.value)
        if(c < p){
         this.ethereum.color='red'}
        if(c>p){
         this.ethereum.color='green'}
    }},
    litecoin(cur,prev){
       if(cur.value){
         this.lth.prev = cur.value
         let c= parseFloat(cur.value)
         let p= parseFloat(prev.value)
        if(c < p){
         this.litecoin.color='red'}
        if(c>p){
         this.litecoin.color='green'}
    }},
    monero(cur,prev){
       if(cur.value){
         this.mon.prev = cur.value
         let c= parseFloat(cur.value)
         let p= parseFloat(prev.value)
        if(c < p){
         this.monero.color='red'}
        if(c>p){
         this.monero.color='green'}
    }}
 },
}
</script>
