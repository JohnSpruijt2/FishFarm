<template>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight m-3" style="font-size: 2.4rem;">
        {{type}}
    </h2>
    <div>
        <apexchart type="line" :options="options" :series="series"></apexchart>
    </div>
</template>
<script>
    import { defineComponent } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'

    export default defineComponent({
        components: {
            JetApplicationLogo,
        },
        props: {
            name: String,
            type: String,
            xAxis: Array,
            yAxis: Array,
            min: Number,
            max: Number,
            offset: Number,
            yMin: Number,
            yMax: Number,
        },
        data() {
            return {
      options: {
        chart: {
          zoom: {
          enabled: true,
          type: 'xy',  
          autoScaleYaxis: false,
          zoomedArea: {
            fill: {
              color: '#90CAF9',
              opacity: 0.4
            },
            stroke: {
              color: '#0D47A1',
              opacity: 0.4,
              width: 1,
            }
          }
          }
        },
        annotations: {
          yaxis: [
            //sets the red maximum danger zone in the graph
            {
            y: this.max,
            y2: this.yMax,
            borderColor: '#000',
            fillColor: '#FF0000',
            opacity: 0.2,
            label: {
              borderColor: '#333',
              style: {
                fontSize: '10px',
                color: '#333',
                background: '#FEB019',
              },
              text: 'extreme warning range',
            }
          },
          //sets the orange minimum danger zone in the graph
          {
            y: (this.max - this.offset),
            y2: this.max,
            borderColor: '#000',
            fillColor: '#FFD700',
            opacity: 0.2,
            label: {
              borderColor: '#333',
              style: {
                fontSize: '10px',
                color: '#333',
                background: '#FEB019',
              },
              text: 'warning range',
            }
          },
          //sets the green zone in the graph
          {
            y: (this.min + this.offset),
            y2: (this.max - this.offset),
            borderColor: '#000',
            fillColor: '#32CD32',
            opacity: 0.2,
            label: {
              borderColor: '#333',
              style: {
                fontSize: '10px',
                color: '#333',
                background: '#FEB019',
              },
              text: 'healthy range',
            }
          },
          //sets the red minimum danger zone in the graph
          {
            y: this.yMin,
            y2: this.min,
            borderColor: '#000',
            fillColor: '#FF0000',
            opacity: 0.2,
            label: {
              borderColor: '#333',
              style: {
                fontSize: '10px',
                color: '#333',
                background: '#FEB019',
              },
              text: 'extreme warning range',
            }
          },
          //sets the orange minimum danger zone in the graph
          {
            y: this.min,
            y2: (this.min + this.offset),
            borderColor: '#000',
            fillColor: '#FFD700',
            opacity: 0.2,
            label: {
              borderColor: '#333',
              style: {
                fontSize: '10px',
                color: '#333',
                background: '#FEB019',
              },
              text: 'warning range',
            }
          }]
        },
        xaxis: {
          categories: this.xAxis
        },
        yaxis: {
          min: this.yMin,
          max: this.yMax,
        }
      },
      series: [{
        name: this.type,
        data: this.yAxis
      }]
    }
        }, 
    })
</script>
