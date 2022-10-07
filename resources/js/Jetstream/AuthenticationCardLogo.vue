<template>
    <Link :href="'/'">
        <img src='/img/logo.png'  alt="Aquaculture Monitoring System logo" style="width: 7.5rem; height: 7.5rem;">
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
