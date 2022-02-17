<template>
    <app-layout title="Test">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Graph
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <div>
                    <apexchart width="1200" type="line" :options="options" :series="series"></apexchart>
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
            data: Array,
            times: Array,
            temperatures: Array,
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
              width: 1
            }
          }
          }
        },
        xaxis: {
          categories: this.times
        },
        yaxis: {
          min: 0,
          max: 80
        }
      },
      series: [{
        name: 'temperature',
        data: this.temperatures
      }]
    }
  }
});
</script>