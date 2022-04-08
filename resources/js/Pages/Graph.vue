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
                    <div class="mt-1">
                        <a :href="route('graph', {id: fishpond.id ,type: 'temperature'})" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">
                            show temperature
                        </a>
                        <a :href="route('graph', {id: fishpond.id ,type: 'oxygen'})" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">
                            show oxygen
                        </a>
                        <a :href="route('graph', {id: fishpond.id ,type: 'turbidity'})" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">
                            show clarity
                        </a>
                        <a :href="route('graph', {id: fishpond.id ,type: 'level'})" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">
                            show level
                        </a>
                    </div>
                  <div v-for="(graph) in graphs" :key="graph['type']">
                    <GraphComponent :type="graph['type']" :xAxis="graph['xAxis']" :yAxis="graph['yAxis']" :min="graph['min']" :max="graph['max']" :offset="graph['offset']" :yMin="graph['yMin']" :yMax="graph['yMax']"/>
                  </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import GraphComponent from '@/Jetstream/Graph.vue'
    
    export default defineComponent({
        components: {
            AppLayout,
            GraphComponent,
        },
        props: {
          fishpond: Object,
          graphs: Array,
        },
        data: function() {
          return {

          }
        },
    });
</script>