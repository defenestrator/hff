<template>
    <wysiwyg rows="3" class="wysiwyg" v-model="myHTML" />
</template>

<script>
    export default {
        mounted() {
            console.log('Editor Component mounted.')
        }
    }
</script>
