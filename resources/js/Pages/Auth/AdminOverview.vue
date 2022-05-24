<template>
    <app-layout title="details">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin overview
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div style="min-height: 15rem;" class="bg-white p-6 overflow-hidden shadow-xl sm:rounded-lg">
                    <div  class="grid grid-cols-1 text-2xl">
                        <div v-for="(user) in userData" :key="user.id"  class="p-3 m-2 border border-grey rounded">
                            <a> {{ user.name }}</a> <br>
                            <a> {{ user.email }}</a> <br>
                            <a> Remaining Credits: {{user.wallet.credits}}</a><br>
                            <a> subscription began at: {{user.subscription.added_at}}</a><br>
                            <a> subscription stops at: {{user.subscription.stops_at}}</a>
                            <a :href="'/admin/deletion/'+user.id" style="float:right;"  class="bg-red-500 leading-10 hover:bg-red-700 text-black font-bold py-2 px-4 border border-red-700 rounded">Delete</a>
                        </div>
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
            users: Array,
        },
        data() {
            return {
                userData: this.users,
            }
        }, 

});
</script>