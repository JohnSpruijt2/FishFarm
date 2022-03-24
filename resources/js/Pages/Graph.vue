<template>
    <app-layout title="details">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{name}}
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <h2 class="font-semibold text-xl text-gray-800 leading-tight m-3" style="font-size: 2.4rem;">
                    {{type}}
                  </h2>
                  <div>
                    <apexchart type="line" :options="options" :series="series"></apexchart>
                  </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    
    export default defineComponent({
        components: {
            AppLayout,
        },
        props: {
            name: String,
            type: String,
            xAxis: Array,
            yAxis: Array,
        },
        data: function() {
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
            y: 40,
            y2: 80,
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
            y: 35,
            y2: 40,
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
            y: 10,
            y2: 35,
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
            y: 0,
            y2: 5,
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
            y: 5,
            y2: 10,
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
          min: 0,
          max: 80
        }
      },
      series: [{
        name: 'temperature',
        data: this.yAxis
      }]
    }
  }
});
</script>