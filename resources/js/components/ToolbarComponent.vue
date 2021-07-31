<template>
    <v-toolbar>
        <v-app-bar-nav-icon></v-app-bar-nav-icon>
        <v-app-bar-title>SPA Blog</v-app-bar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items class="hidden-sm-and-down">
            <router-link to="/forum">
                <v-btn text>Forum</v-btn>
            </router-link>

            <router-link to="#">
                <v-btn text>Ask Question</v-btn>
            </router-link>

            <router-link to="#">
                <v-btn text>Category</v-btn>
            </router-link>

            <router-link to="/signup">
                <v-btn text>Signup</v-btn>
            </router-link>

            <router-link to="/login">
                <v-btn text>Signin</v-btn>
            </router-link>
        </v-toolbar-items>
    </v-toolbar>
</template>

<script>
export default {
    name: "ToolbarComponent"
}
</script>

<style scoped>

</style>
