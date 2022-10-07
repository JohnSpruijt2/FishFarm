<template>
    <app-layout title="details">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Dangerzone Edit
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div style="min-height: 15rem;" class="bg-white p-6 overflow-hidden shadow-xl sm:rounded-lg">
                    <form method="POST">
                        <input name="_token" type="hidden" :value="csrf" />
                        <h1>{{name}}</h1>
                        <div class="mt-4">
                            <label for="min" value="min">minimum {{data.data_type}}:</label>
                            <input :value="data.min" id="min" name= "min" type="number" min="0" max="80" class="mt-1 block w-full" required  />
                        </div>

                        <div class="mt-4">
                            <label for="max" value="max">maximum {{data.data_type}}:</label>
                            <input :value="data.max" id="max" name="max" type="number" min="0" max="80" class="mt-1 block w-full" required />
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
            name: String,
            data: Object,
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        }, 
});
</script>