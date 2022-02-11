<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <jet-application-logo class="block h-12 w-auto" />
            </div>

            <div class="mt-6 text-gray-500">
                <div class="grid grid-cols-2 text-2xl">
                    <div v-for="(pond, index) in ponds" :key="pond.id" class="p-3 m-2 border border-grey rounded">
                        <a :href="'/details/'+pond.id">{{ pond.name }}</a> <br>
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill"></div>
                                <div class="gauge__cover"></div>
                            </div>
                        </div>
                        <div class="text-right">{{ temps[index].temprature }}&#176;C</div>
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
        props: {
            fishponds: Array,
        },
        data() {
            return {
                ponds: this.fishponds[0],
                temps: this.fishponds[1]
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
