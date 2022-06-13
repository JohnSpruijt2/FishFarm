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
                    <form :action="'/uploadImages/'+ userInfo.id" method="POST" enctype="multipart/form-data">
                    <input name="_token" type="hidden" :value="csrf" />
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control" id="image" required><br>
                                <label for="fish_type">fish type:</label><br>
                                <select name="fish_type" id="fish_type">
                                    <template v-for="(fish) in fishTypes" v-bind:key="fish.id">
                                        <option :value="fish.id">{{fish.name}}</option>
                                    </template>
                                </select>
                                <br>
                                <label for="description">description:</label> <br>
                                <textarea id="description" name="description" rows="4" cols="50" placeholder="Short optional description of the photo"></textarea>
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
            fishTypes: Array,
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        }, mounted() {
            
        }
    })
</script>