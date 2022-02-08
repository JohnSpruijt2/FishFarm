                        <div class="text-right">21&#176;C</div>
<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <jet-application-logo class="block h-12 w-auto" />
            </div>

            <div class="mt-6 text-gray-500">
                <div class="grid grid-cols-2 text-2xl">
                    <div v-for="pond in ponds" :key="pond.id" class="p-3 m-2 border border-grey rounded">
                        <p>{{ "Fishpond " + pond.pondName }}</p>
                        <div class="text-right">{{ pond.temp }}&#176;C</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import { defineComponent } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'

    export default defineComponent({
        components: {
            JetApplicationLogo,
        },
        data() {
            return {
                ponds: [{
                    pondName: 1,
                    temp: Math.floor(Math.random() * 70) + 1
                },{
                    pondName: 2,
                    temp: Math.floor(Math.random() * 70) + 1
                },{
                    pondName: 3,
                    temp: Math.floor(Math.random() * 70) + 1
                },{
                    pondName: 4,
                    temp: Math.floor(Math.random() * 70) + 1
                },{
                    pondName: 5,
                    temp: Math.floor(Math.random() * 70) + 1
                },{
                    pondName: 6,
                    temp: Math.floor(Math.random() * 70) + 1
                }]
            }
        }
    })

    /**
     * loop through element,
     * fishpond data for:
     *      name,
     *      temp
     */
</script>
