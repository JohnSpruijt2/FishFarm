<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="mt-6 text-gray-500">
                <div class="grid grid-cols-1 sm:grid-cols-2 text-2xl">
                    <!--Fish ponds sensors-->
                    <div v-for="(pond) in ponds" :key="pond.id" class="p-3 m-2 border border-grey rounded">
                        <a :href="'/details/'+pond.id">{{ pond.name }}</a> <br>

                        <a :href="'details/'+pond.id+'/oxygen'" class="dashboardLatests" :id="'oxygen-'+pond.id" style="visibility: hidden;">
                            
                        </a>

                        <a :href="'details/'+pond.id+'/turbidity'" class="dashboardLatests" :id="'turbidity-'+pond.id" style="visibility: hidden;">
                            
                        </a>

                        <a :href="'details/'+pond.id+'/level'" class="dashboardLatests" :id="'waterLevel-'+pond.id" style="visibility: hidden;">
                            
                        </a>

                        <a :href="'/details/'+pond.id+'/temperature'" :id="'guage-'+pond.id" class="gauge" style="visibility: hidden;">
                            <div class="gauge__body">
                                <div class="gauge__max"></div>
                                <div class="gauge__max__warning"></div>
                                <div class="gauge__min"></div>
                                <div class="gauge__min__warning"></div>
                                <div class="gauge__fill"></div>
                                <div class="gauge__fill2"></div>
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
                fishpond.sensors.forEach(sensor => {
                    if (sensor != null) {
                        if (sensor.value != null) {
                            var temperatureMinDanger;
                            var temperatureMaxDanger;
                            var oxygenMinDanger;
                            var oxygenMaxDanger;
                            var turbidityMinDanger;
                            var turbidityMaxDanger;
                            var waterLevelMinDanger;
                            var waterLevelMaxDanger;
                            fishpond.dangerzones.forEach(dangerzone => {
                                    if (dangerzone.data_type == 'temperature') {
                                        temperatureMinDanger = dangerzone.min;
                                        temperatureMaxDanger = dangerzone.max;
                                    } else if (dangerzone.data_type == 'oxygen') {
                                        oxygenMinDanger = dangerzone.min;
                                        oxygenMaxDanger = dangerzone.max;
                                    } else if (dangerzone.data_type == 'turbidity') {
                                        turbidityMinDanger = dangerzone.min;
                                        turbidityMaxDanger = dangerzone.max;
                                    }
                                     else if (dangerzone.data_type == 'level') {
                                        waterLevelMinDanger = dangerzone.min;
                                        waterLevelMaxDanger = dangerzone.max;
                                    }
                                })
                            if (sensor.value.type == 'oxygen') {
                                if (sensor.value.value < oxygenMinDanger || sensor.value.value > oxygenMaxDanger) {
                                    document.getElementById('oxygen-'+fishpond.id).style.color = '#ff0000'
                                } else if (sensor.value.value > oxygenMaxDanger - 2 || sensor.value.value < oxygenMinDanger + 2) {
                                    document.getElementById('oxygen-'+fishpond.id).style.color = '#FFA500'
                                }
                                document.getElementById('oxygen-'+fishpond.id).style.visibility = 'visible';
                                document.getElementById('oxygen-'+fishpond.id).innerText = sensor.value.value+' mg/L'
                                
                            } else if (sensor.value.type == 'turbidity') {
                                if (sensor.value.value < turbidityMinDanger || sensor.value.value > turbidityMaxDanger) {
                                    document.getElementById('turbidity-'+fishpond.id).style.color = '#ff0000'
                                } else if (sensor.value.value > turbidityMaxDanger - 0.5 || sensor.value.value < turbidityMinDanger + 0.5) {
                                    document.getElementById('turbidity-'+fishpond.id).style.color = '#FFA500'
                                }
                                document.getElementById('turbidity-'+fishpond.id).style.visibility = 'visible';
                                document.getElementById('turbidity-'+fishpond.id).innerText = sensor.value.value+' NTU'
                            } else if (sensor.value.type == "waterLevel") {
                                 if (sensor.value.value < waterLevelMinDanger || sensor.value.value > waterLevelMaxDanger) {
                                    document.getElementById('waterLevel-'+fishpond.id).style.color = '#ff0000'
                                } else if (sensor.value.value > waterLevelMaxDanger - 10 || sensor.value.value < waterLevelMinDanger + 10) {
                                    document.getElementById('waterLevel-'+fishpond.id).style.color = '#FFA500'
                                }
                                document.getElementById('waterLevel-'+fishpond.id).style.visibility = 'visible';
                                document.getElementById('waterLevel-'+fishpond.id).innerText = sensor.value.value+' cm'
                            } else if (sensor.value.type == 'temperature') {
                                document.getElementById('guage-'+fishpond.id).style.visibility = 'visible';
                                var guageElement = document.getElementById('guage-'+fishpond.id)
                                var temperature = sensor.value.value
                                var value = temperature/80
                                var minimum = temperatureMinDanger/80
                                var maximum = 1 - (temperatureMaxDanger/80)

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
                                  (value / 2) - 2
                                }turn)`;
                                guageElement.querySelector(".gauge__fill2").style.transform = `rotate(${
                                  (value / 2) - 2
                                }turn)`;
                                guageElement.querySelector(".gauge__cover").textContent = `${Math.round(
                                  value*80
                                )}°C`;
                                if (temperature < temperatureMinDanger || temperature > temperatureMaxDanger) {
                                    guageElement.querySelector(".gauge__fill2").style.background = '#ff0000'
                                    guageElement.querySelector(".gauge__cover").style.color = '#ff0000'
                                } else if (temperature > temperatureMaxDanger - 5 || temperature < temperatureMinDanger + 5) {
                                    guageElement.querySelector(".gauge__fill2").style.background = '#FFA500'
                                    guageElement.querySelector(".gauge__cover").style.color = '#FFA500'
                                }
                            }
                        }
                    }
                })

                    
                
            })
        }
    })
</script>
