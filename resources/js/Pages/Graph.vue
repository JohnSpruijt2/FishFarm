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
                  <h1 class="text-xl">Pond 1</h1>
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
            tempratures: Array,
        },
        data: function() {
        return {
      options: {
        chart: {
          id: 'vuechart-example'
        },
        xaxis: {
          categories: this.times
        }
      },
      series: [{
        name: 'temprature',
        data: this.tempratures
      }]
    }
  }
});
</script>