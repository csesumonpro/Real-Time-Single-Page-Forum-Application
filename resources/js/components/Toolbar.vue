<template>
    <v-toolbar>
<!--        <v-toolbar-side-icon></v-toolbar-side-icon>-->
        <v-toolbar-title>FullStack Web</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items class="hidden-sm-and-down">
            <router-link to="/forum">
                <v-btn flat>Forum</v-btn>
            </router-link>
            <router-link to="/question">
                <v-btn flat>Ask Question</v-btn>
            </router-link>
            <router-link to="/category">
                <v-btn flat>Category</v-btn>
            </router-link>
            <router-link to="/login">
                <v-btn flat>Login</v-btn>
            </router-link>
        </v-toolbar-items>
    </v-toolbar>
</template>
<script>
    export default {
        name: "Toolbar"
    }
</script>

<style scoped>

</style>
