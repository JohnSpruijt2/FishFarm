<template>
    <app-layout title="details">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All transaction history
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div style="min-height: 15rem;" class="bg-white p-6 overflow-hidden shadow-xl sm:rounded-lg">
                    <div  class="grid grid-cols-1 text-2xl">
                        <template v-if="transactions[0] == null">
                            <h1>No recorded transactions</h1>
                        </template>
                        <template v-else>
                            <div v-for="(transaction) in transactions" :key="transaction.id"  class="p-3 m-2 border border-grey rounded">
                                <a> {{ transaction.user.name }}</a> <br>
                                <a> {{ transaction.user.email }}</a> <br>
                                <a>Amount: {{transaction.amount}} credits</a> <br>
                                <a>Type: {{transaction.type}}</a> <br>
                                <a>Date: {{transaction.created_at}}</a>
                            </div>
                        </template>
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
            transactions: Array,
        },
        data() {
            return {
                
            }
        }, 

});
</script>