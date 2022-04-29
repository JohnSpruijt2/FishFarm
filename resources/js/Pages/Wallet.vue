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
                    <h1 class="text-4xl">Your remaining credits are : {{userInfo.user_wallet.credits}}</h1>
                    <template  v-if="userInfo.user_wallet.last_payment_date != null">
                    <h1 class="text-2xl">Last Payment details:</h1>
                    <p class="text-xl">Last payment of {{userInfo.user_wallet.last_payment_amount}} on {{userInfo.user_wallet.last_payment_date}}</p>
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
