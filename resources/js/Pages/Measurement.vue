<template>
    <app-layout title="Wallet">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{title}}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4" style="min-height: 30rem;">
                    <a v-if="route().current('recent measurements')" :href="route('all measurements')" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">
                            view all measurements
                    </a>
                    <a v-else-if="route().current('all measurements')" :href="route('recent measurements')" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">
                            view last 24 hours of measurements
                    </a>
                    <template v-if="measurements[0] != null">
                        <div class="grid grid-cols-1 text-2xl">
                            <div v-for="(measurement) in measurements" v-bind:key="measurement.id" class="p-3 m-2 border border-grey rounded">
                                <a>Fish: {{measurement.fish.name}}</a> <br>
                                <a>length: {{measurement.length}}</a> <br>
                                <a>width: {{measurement.width}}</a> <br>
                                <a>weight: {{measurement.weight}}</a> <br>
                                <a>uploaded at: {{measurement.created_at}}</a> <br>
                                <a :href="route('picture measurement', {id: measurement.id})" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-1 px-4 border border-blue-700 rounded">
                                    view picture
                                </a>
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <h1 class="text-2xl">No recorded Measurements</h1>
                    </template>
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
            measurements: Array,
            title: String,
        },
        
    })
</script>
