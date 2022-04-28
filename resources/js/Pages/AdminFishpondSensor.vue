<template>
    <app-layout title="details">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Fishpond Sensors Edit
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div style="min-height: 15rem;" class="bg-white p-6 overflow-hidden shadow-xl sm:rounded-lg">
                    <h1>{{fishpond.name}}</h1>
                    <form method="POST">
                        <input name="_token" type="hidden" :value="csrf" />
                        <div>
                            <label for="temperature" value="temperature">temperature sensor id:</label>
                            <br>
                            <select name="temperature" id="temperature">
                                <option v-if="temperatureSensorId == null" value="null">no sensor (current)</option>
                                <template v-else>
                                <option :value="temperatureSensorId" selected>{{temperatureSensorId}} (current)</option>
                                <option value="null"> no sensor </option>
                                </template>
                                <option v-for="(sensor) in UnassignedTemperatureSensors" :key="sensor.sensor_id" :value="sensor.sensor_id">{{sensor.sensor_id}}</option>
                            </select>
                        </div>
                        <div>
                            <label for="oxygen" value="oxygen">oxygen sensor id:</label>
                            <br>
                            <select name="oxygen" id="oxygen">
                                <option v-if="oxygenSensorId == null" value="null">no sensor (current)</option>
                                <template v-else>
                                <option :value="oxygenSensorId" selected>{{oxygenSensorId}} (current)</option>
                                <option value="null"> no sensor </option>
                                </template>
                                <option v-for="(sensor) in UnassignedOxygenSensors" :key="sensor.sensor_id" :value="sensor.sensor_id">{{sensor.sensor_id}}</option>
                            </select>
                        </div>
                        <div>
                            <label for="turbidity" value="turbidity">clarity sensor id:</label>
                            <br>
                            <select name="turbidity" id="turbidity">
                                <option v-if="turbiditySensorId == null" value="null">no sensor (current)</option>
                                <template v-else>
                                <option :value="turbiditySensorId" selected>{{turbiditySensorId}} (current)</option>
                                <option value="null"> no sensor </option>
                                </template>
                                <option v-for="(sensor) in UnassignedTurbiditySensors" :key="sensor.sensor_id" :value="sensor.sensor_id">{{sensor.sensor_id}}</option>
                            </select>
                        </div>
                        <div>
                            <label for="waterLevel" value="waterLevel">water level sensor id:</label>
                            <br>
                            <select name="waterLevel" id="waterLevel">
                                <option v-if="waterLevelSensorId == null" value="null">no sensor (current)</option>
                                <template v-else>
                                <option :value="waterLevelSensorId" selected>{{waterLevelSensorId}} (current)</option>
                                <option value="null"> no sensor </option>
                                </template>
                                <option v-for="(sensor) in UnassignedWaterLevelSensors" :key="sensor.sensor_id" :value="sensor.sensor_id">{{sensor.sensor_id}}</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button class="ml-4">
                                update sensors
                            </button>
                        </div>
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
            fishpond: Object,
            UnassignedSensors: Array,
            UnassignedTemperatureSensors: Array,
            UnassignedOxygenSensors: Array,
            UnassignedTurbiditySensors: Array,
            UnassignedWaterLevelSensors: Array,
        },
        data() {
            var temperatureSensorId = null
            var oxygenSensorId = null
            var turbiditySensorId = null
            var waterLevelSensorId = null
            this.fishpond.sensors.forEach(sensor => {
                if (sensor.value.type == 'temperature') {
                    temperatureSensorId = sensor.sensor_id
                } else if (sensor.value.type == 'oxygen') {
                    oxygenSensorId = sensor.sensor_id
                } else if (sensor.value.type == 'turbidity') {
                    turbiditySensorId = sensor.sensor_id
                } else if (sensor.value.type == 'waterLevel') {
                    waterLevelSensorId = sensor.sensor_id
                }
            });
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                fishpondData: this.fishpond,
                temperatureSensorId: temperatureSensorId,
                oxygenSensorId: oxygenSensorId,
                turbiditySensorId: turbiditySensorId,
                waterLevelSensorId: waterLevelSensorId,
            }
        }, 
        mounted() {
            console.log(this.fishpond);
        }
});
</script>