<template>
  <v-card
    class="mt-4 mx-auto"
    max-width="auto"
    dark
    :color="color.p_light"
  >
    <v-row >
      <v-col md="6" cols="12">
          <v-sheet
          class="v-sheet--offset mx-auto"
          :color="color.l"
          elevation="12"
          max-width="calc(100% - 32px)"
          >
          <barChart :data="data"/>
          </v-sheet>
      </v-col>
      <v-col md="6" cols="12">
          <v-sheet
          class="v-sheet--offset mx-auto"
          :color="color.l"
          elevation="12"
          max-width="calc(100% - 32px)"
          >
          <pieChart :data="pieChart"/>
          </v-sheet>
      </v-col>
    </v-row>


    <v-card-text class="pt-0">
      <div class="text-h6 font-weight-light mb-2">
        Traffic Stats
      </div>
      <div class="subheading font-weight-light grey--text">
        Unique Users and Page Views
      </div>
      <v-divider class="my-2"></v-divider>
      <v-icon
        class="mr-2"
        small
      >
        mdi-clock
      </v-icon>
      <span class="text-caption grey--text font-weight-light">Site Monitoring</span>
    </v-card-text>
  </v-card>
</template>

<script>
import barChart from '../inc/barChart.vue';
import lineChart from '../inc/lineChart.vue';
import pieChart from '../inc/pieChart.vue';
import {colors} from '../../components/config/config.js'
  export default {
    components:{barChart,lineChart,pieChart},
    props:['data','pieChart'],
    data(){
      return{
       color:colors
      }
    },
    computed:{
      value(){
         return this.data.map(d=>d.visitors)
      },
      labels(){
         return this.data.map(d=>d.date)
      }
    }
  }
</script>

<style>
  .v-sheet--offset {
    top: -24px;
    position: relative;
  }
</style>