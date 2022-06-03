<template>
    <app-layout title="Subscriptions">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Upload an image to have it analised
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4" style="min-height: 30rem;">
                    <form :action="'/uploadImages'" method="POST" enctype="multipart/form-data">
                    <input name="_token" type="hidden" :value="csrf" />
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>
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
            userInfo: Object,
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        }, mounted() {
            
        }
    })
</script>