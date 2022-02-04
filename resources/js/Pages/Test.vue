<template>
    <h1>Welcome</h1>
    <div id="app"></div>
    <p>Hello welcome to your first Inertia app!</p>
        <div>
      <apexchart width="800" type="line" :options="options" :series="series"></apexchart>
    </div>
</template>


<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Graph.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Welcome,
        },
        data: function() {
        return {
      options: {
        chart: {
          id: 'vuechart-example'
        },
        xaxis: {
          categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
        }
      },
      series: [{
        name: 'series-1',
        data: [30, 40, 45, 50, 49, 60, 70, 91]
      }]
    }
  }
});
</script>