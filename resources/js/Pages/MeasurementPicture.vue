<template>
    <app-layout title="Wallet">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Measurement details
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4" style="min-height: 30rem;">
                    <img style="max-height: 25rem" :src="image" :alt="measurement.name">
                    <a>Fish: {{measurement.fish.name}}</a> <br>
                    <a>length: {{measurement.length}}</a> <br>
                    <a>width: {{measurement.width}}</a> <br>
                    <a>weight: {{measurement.weight}}</a> <br>
                    <a>uploaded at: {{measurement.created_at}}</a> <br>
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
            measurement: Object,
            image: String,
        },
        
    })
</script>
