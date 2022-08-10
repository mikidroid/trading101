<template>
  <Bar
    :chart-options="chartOptions"
    :chart-data="chartData"
    :chart-id="chartId"
    :dataset-id-key="datasetIdKey"
    :plugins="plugins"
    :css-classes="cssClasses"
    :styles="styles"
    :width="width"
    :height="height"
  />
</template>

<script>
import { Bar } from 'vue-chartjs/legacy'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
  name: 'BarChart',
  components: { Bar },
  props: {
    data: {
      type: Array,
      default: []
    },
    chartId: {
      type: String,
      default: 'bar-chart'
    },
    datasetIdKey: {
      type: String,
      default: 'label'
    },
    width: {
      type: Number,
      default: 400
    },
    height: {
      type: Number,
      default: 200
    },
    cssClasses: {
      default: '',
      type: String
    },
    styles: {
      type: Object,
      default: () => {backgroundColor:'#fff'}
    },
    plugins: {
      type: Object,
      default: () => {}
    }
  },
  data() {
    return {
      chartData: {
        labels: this.data.map(d=>d.date),
        datasets: [ 
          { label:'Page Views',
            backgroundColor:'#f34',
            data: this.data.map(d=>d.page_views),
            //borderColor:'#43f',
            borderWidth: 1
          },
          { label:'Unique Visitors',backgroundColor:'#4e4',data: this.data.map(d=>d.visitors),
            //borderColor:'#43f',
            //borderWidth: 1
          }
          ]
      },
      chartOptions: {
        responsive: true
      }
    }
  }
}
</script>