<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Testing
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Dashboard from '@/Jetstream/Dashboard.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Dashboard,
        },
        props: {
            data: Object,
        },
        mounted() {
            console.log(this.data)
        }
    })
</script>
