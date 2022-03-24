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
                            <input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name"  />
                        </div>

                        <div class="mt-4">
                            <label for="min_temp" value="min_temp">minimum temperature:</label>
                            <input id="min_temp" name= "min_temp" type="number" min="0" max="80" class="mt-1 block w-full" required  />
                        </div>

                        <div class="mt-4">
                            <label for="max_temp" value="max_temp">maximum temperature:</label>
                            <input id="max_temp" name="max_temp" type="number" min="0" max="80" class="mt-1 block w-full" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button class="ml-4">
                                Submit
                            </button>
                        </div>
                    </form>
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