<template>
    <h1>Welcome</h1>
    <p>Hello welcome to your first Inertia app!</p>
        <welcome />
</template>


<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Graph.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Welcome,
        },
    })
</script>