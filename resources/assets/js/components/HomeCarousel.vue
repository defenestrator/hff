<template>
    <carousel :autoplay="true" :per-page="1" :pagination-enabled="false" :autoplayHoverPause="false">
        <slide><img style="width:100%" src="/assets/images/gourley/DSC_0336.JPG" alt="Saltwater Flats">
        </slide>
        <slide><img src="/assets/images/gourley/bonefish.jpg" alt="Bonefish landed next to Fly Rod on Sea Grass">
        </slide>
        <slide><img src="/assets/images/bully.jpg" alt="Bull Trout must be kept in the water.">
        </slide>
        <slide><img src="/assets/images/os/tarpon.jpg" alt="Hungry Tarpon">
        </slide>
        <slide><img src="/assets/images/gourley/grouper-websize.jpg" alt="Big Grouper">
        </slide>
    </carousel>
</template>
<script>
    import VueCarousel from 'vue-carousel';
    Vue.use(VueCarousel);
</script>