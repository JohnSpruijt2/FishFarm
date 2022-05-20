<template>
    <app-layout title="Wallet">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Wallet for {{userInfo.name}}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4" style="min-height: 30rem;">
                    <h1 class="text-4xl m-2">Your remaining credits are : {{userInfo.wallet.credits}}</h1>
                    <template  v-if="userInfo.transactions[0] != null">
                        <h1 class="text-2xl">Past Transactions:</h1>
                        <div v-for="(transaction) in userInfo.transactions" v-bind:key="transaction.id" class="p-3 m-2 border border-grey rounded">
                            <a>Amount: {{transaction.amount}} credits</a> <br>
                            <a>Type: {{transaction.type}}</a> <br>
                            <a>Date: {{transaction.created_at}}</a>
                        </div>
                    </template>
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
                
            }
        }, mounted() {
            console.log(this.userInfo)
        }
    })
</script>
