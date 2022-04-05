<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="mt-6 text-gray-500">
                <div class="grid grid-cols-1 sm:grid-cols-2 text-2xl">
                    <!--Fish ponds sensors-->
                    <div v-for="(pond) in ponds" :key="pond.id" class="p-3 m-2 border border-grey rounded">
                        <a :href="'/details/'+pond.id">{{ pond.name }}</a> <br>

                        <a :href="'details/'+pond.id+'/oxygen'" class="dashboardLatests">
                            {{pond.latest_oxygen_level.oxygen_level}} mg/L
                        </a>

                        <a :href="'details/'+pond.id+'/turbidity'" class="dashboardLatests">
                            {{pond.latest_turbidity_level.ntu}} NTU
                        </a>

                        <a :href="'details/'+pond.id+'/level'" class="dashboardLatests">
                            {{pond.latest_water_level.cm}} cm
                        </a>

                        <a :href="'/details/'+pond.id+'/temperature'" :id="'guage-'+pond.id" class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__max"></div>
                                <div class="gauge__max__warning"></div>
                                <div class="gauge__min"></div>
                                <div class="gauge__min__warning"></div>
                                <div class="gauge__fill"></div>
                                <div class="gauge__cover text-gray"></div>
                            </div>
                        </a>
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
                ponds: this.fishponds,
            }
        }, 
        mounted() {
            this.fishponds.forEach(fishpond => {
                var guageElement = document.getElementById('guage-'+fishpond.id)
                var temperature = fishpond.latest_temperature.temperature
                var value = temperature/80
                var minDanger;
                var maxDanger;
                fishpond.dangerzones.forEach(dangerzone => {
                    if (dangerzone.data_type == 'temperature') {
                        minDanger = dangerzone.min;
                        maxDanger = dangerzone.max;
                    }
                })
                var minimum = minDanger/80
                var maximum = 1 - (maxDanger/80)

                guageElement.querySelector(".gauge__max").style.transform = `rotate(${
                  maximum / 2 * -1
                }turn)`;
                guageElement.querySelector(".gauge__max__warning").style.transform = `rotate(${
                  (maximum + 0.0625) / 2 * -1
                }turn)`;
                guageElement.querySelector(".gauge__min").style.transform = `rotate(${
                  minimum / 2
                }turn)`;
                guageElement.querySelector(".gauge__min__warning").style.transform = `rotate(${
                  (minimum + 0.0625) / 2
                }turn)`;
                guageElement.querySelector(".gauge__fill").style.transform = `rotate(${
                  value / 2
                }turn)`;
                guageElement.querySelector(".gauge__cover").textContent = `${Math.round(
                  value*80
                )}°C`;
                if (temperature < minDanger || temperature > maxDanger) {
                    guageElement.querySelector(".gauge__fill").style.background = '#ff0000'
                    guageElement.querySelector(".gauge__cover").style.color = '#ff0000'
                } else if (temperature > maxDanger - 5 || temperature < minDanger + 5) {
                    guageElement.querySelector(".gauge__fill").style.background = '#FFA500'
                    guageElement.querySelector(".gauge__cover").style.color = '#FFA500'
                }
            })
        }
    })
</script>
