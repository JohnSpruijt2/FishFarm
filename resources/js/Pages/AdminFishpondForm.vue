<template>
    <app-layout title="details">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Fishpond Edit
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div style="min-height: 15rem;" class="bg-white p-6 overflow-hidden shadow-xl sm:rounded-lg">
                    <form method="POST">
                        <input name="_token" type="hidden" :value="csrf" />
                        <div>
                            <label for="name" value="Name">name:</label>
                            <input :value="fishpondData.name" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name"  />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button class="ml-4">
                                Change Name
                            </button>
                        </div>
                    </form>
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Dangerzones: </h1>
                    <div class="mt-8">
                        <a :href="route('admin edit dangerzone', {id: fishpondData.id ,dataType: 'temperature'})" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">
                            edit temperature
                        </a>
                        <a :href="route('admin edit dangerzone', {id: fishpondData.id ,dataType: 'oxygen'})" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">
                            edit oxygen
                        </a>
                        <a :href="route('admin edit dangerzone', {id: fishpondData.id ,dataType: 'clarity'})" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">
                            edit clarity
                        </a>
                        <a :href="route('admin edit dangerzone', {id: fishpondData.id ,dataType: 'level'})" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">
                            edit level
                        </a>
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
            fishpond: Object,
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                fishpondData: this.fishpond,
            }
        }, 
});
</script>