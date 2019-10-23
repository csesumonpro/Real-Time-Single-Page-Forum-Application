<template>

</template>

<script>
    export default {
        name: "Logout",
        created() {
            Event.$emit('logout')
        }
    }
</script>

<style scoped>

</style>
