<template>
    <app-layout title="Subscriptions">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Subscriptions for {{userInfo.name}}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4" style="min-height: 30rem;">
                    <h1 class="text-4xl">Your subscription was renewed on : {{userInfo.subscription.added_at}}</h1>
                    <h1 class="text-4xl">Your subscription stops on : {{userInfo.subscription.stops_at}}</h1>
                    <form :action="'/updateSubscriptionType/'+userInfo.id" method="post">
                        <input name="_token" type="hidden" :value="csrf" />
                        <select name="subscriptionType" id="subscriptionType">
                            <template>
                                <option v-if="userInfo.subscription.subscription_type == 'no subscription'" :value="'no subscription'" selected>no subscription (current)</option>
                                <option v-else :value="'monthly'">monthly</option>
                            </template>
                    
                        </select> <br>
                        <input class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded" type="submit" value="Update Subscription Type">
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
                
            }
        }, mounted() {
            console.log(this.userInfo)
        }
    })
</script>