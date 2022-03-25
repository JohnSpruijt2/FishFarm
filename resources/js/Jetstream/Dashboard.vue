<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <jet-application-logo class="block h-12 w-auto" />
                <div v-if="adminStatus == 1" class="mt-8">
                    <a :href="route('admin panel')" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">
                        admin panel
                    </a>
                </div>
            </div>
            <div class="mt-6 text-gray-500">
                <div class="grid grid-cols-1 sm:grid-cols-2 text-2xl">
                    <div v-for="(pond) in ponds" :key="pond.id" class="p-3 m-2 border border-grey rounded">
                        <a :href="'/details/'+pond.id+'/temperature'">{{ pond.name }}</a> <br>

                        <div :id="'guage-'+pond.id" class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__red"></div>
                                <div class="gauge__fill"></div>
                                <div class="gauge__cover text-gray"></div>
                            </div>
                        </div>
                        
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
            adminStatus: Number,
        },
        data() {
            return {
                ponds: this.fishponds,
            }
        }, 
        mounted() {
            this.fishponds.forEach(fishpond => {
                var guageElement = document.getElementById('guage-'+fishpond.id)
                var temperature = fishpond.latest_temperature.temperature
                var value = temperature/80
                guageElement.querySelector(".gauge__fill").style.transform = `rotate(${
                  value / 2
                }turn)`;
                guageElement.querySelector(".gauge__cover").textContent = `${Math.round(
                  value*80
                )}°C`;
                if (temperature > 40) {
                    guageElement.querySelector(".gauge__fill").style.background = '#ff0000'
                }
            })
        }
    })
</script>
