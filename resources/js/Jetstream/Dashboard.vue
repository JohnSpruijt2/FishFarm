<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="mt-6 text-gray-500">
                <div class="grid grid-cols-1 sm:grid-cols-2 text-2xl">
                    <!--Fish ponds sensors-->
                    <a :href="'/details/'+pond.id+'/temperature'" v-for="(pond) in ponds" :key="pond.id" class="p-3 m-2 border border-grey rounded">
                        <a :href="'/details/'+pond.id+'/temperature'">{{ pond.name }}</a> <br>

                        <div :id="'guage-'+pond.id" class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__max"></div>
                                <div class="gauge__min"></div>
                                <div class="gauge__fill"></div>
                                <div class="gauge__cover text-gray"></div>
                            </div>
                        </div>
                    </a>
                    <a href='/details/sensor/temperature' v-if="sensor != null" class="p-3 m-2 border border-grey rounded">
                        <a href='/details/sensor/temperature'>Fishpond Sensor</a> <br>
                        <div id='guage-sensor' class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__max"></div>
                                <div class="gauge__fill"></div>
                                <div class="gauge__cover text-gray"></div>
                            </div>
                        </div>
                    </a>
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
            tempDangerzone: Array,
        },
        data() {
            return {
                ponds: this.fishponds[0],
                sensor: this.fishponds[1]
            }
        }, 
        mounted() {
            this.fishponds[0].forEach(fishpond => {
                var guageElement = document.getElementById('guage-'+fishpond.id)
                var temperature = fishpond.latest_temperature.temperature
                var value = temperature/80
                var minDanger;
                var maxDanger;
                this.tempDangerzone.forEach(dangerzone => {
                    if (dangerzone.fishpond_id == fishpond.id) {
                        minDanger = dangerzone.min;
                        maxDanger = dangerzone.max;
                    }
                })
                var minimum = minDanger/80
                var maximum = 1 - (maxDanger/80)

                guageElement.querySelector(".gauge__max").style.transform = `rotate(${
                  maximum / 2 * -1
                }turn)`;
                guageElement.querySelector(".gauge__min").style.transform = `rotate(${
                  minimum / 2
                }turn)`;
                guageElement.querySelector(".gauge__fill").style.transform = `rotate(${
                  value / 2
                }turn)`;
                guageElement.querySelector(".gauge__cover").textContent = `${Math.round(
                  value*80
                )}°C`;
                
                if (temperature > maxDanger) {
                    guageElement.querySelector(".gauge__fill").style.background = '#ff0000'
                }
                if (temperature < minDanger) {
                    guageElement.querySelector(".gauge__fill").style.background = '#ff0000'
                }
            })
            if (this.fishponds[1] != null) {
                var guageElement = document.getElementById('guage-sensor')
                var temperature = this.fishponds[1][0].temperature
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
            }
        }
    })
</script>
