<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <jet-application-logo class="block h-12 w-auto" />
            </div>

            <div class="mt-6 text-gray-500">
                <div class="grid grid-cols-2 text-2xl">
                    <div class="p-3 m-2 border border-grey rounded">
                        <p>Fishpond 1</p>
                        <div class="text-right">20&#176;C</div>
                    </div>

                    <div class="p-3 m-2 border border-grey rounded">
                        <p>Fishpond 2</p>
                        <div class="text-right">18&#176;C</div>
                    </div>

                    <div class="p-3 m-2 border border-grey rounded">
                        <p>Fishpond 3</p>
                        <div class="text-right">22&#176;C</div>
                    </div>

                    <div class="p-3 m-2 border border-grey rounded">
                        <p>Fishpond 4</p>
                        <div class="text-right">21&#176;C</div>
                    </div>

                    <div class="p-3 m-2 border border-grey rounded">
                        <p>Fishpond 5</p>
                        <div class="text-right">19&#176;C</div>
                    </div>

                    <div class="p-3 m-2 border border-grey rounded">
                        <p>Fishpond 6</p>
                        <div class="text-right">25&#176;C</div>
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
    })
</script>
