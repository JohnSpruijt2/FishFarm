<template>
    <app-layout title="details">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Panel
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div style="min-height: 15rem;" class="bg-white p-6 overflow-hidden shadow-xl sm:rounded-lg">
                    <a :href="route('admin register')" class="bg-blue-500 leading-10 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">
                        create new account
                    </a> <br>
                    <a :href="route('admin account overview')" class="bg-blue-500 leading-10 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">
                        edit existing account
                    </a>
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
            
        },
});
</script>