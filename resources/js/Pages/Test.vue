<template>
    <h1>Welcome</h1>
    <div id="app">{{tempratures[0]}}</div>
    <p>Hello welcome to your first Inertia app!</p>

        <div>
      <apexchart width="1200" type="line" :options="options" :series="series"></apexchart>
    </div>
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