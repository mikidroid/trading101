<template>
  <v-carousel
    cycle
    height="200"
    hide-delimiter-background
    show-arrows-on-hover
  >
    <v-carousel-item
      v-for="(slide, i) in slides"
      :key="i"
    >
        <v-row
          class="fill-height"
          align="center"
          justify="center"
        >
      
       <v-img
          :src="slide"
          contain
        ></v-img>
        
        </v-row>
    </v-carousel-item>
  </v-carousel>
</template>

<script>
  export default {
    data () {
      return {
        colors: [
          'indigo',
          'warning',
          'pink darken-2',
          'red lighten-1',
         
        ],
        slides: [
          '/files/images/pic1.jpg',
          '/files/images/pic2.jpg',
          '/files/images/pic3.jpg',
          '/files/images/pic4.jpg',
          
        ],
      }
    },
  }
</script>