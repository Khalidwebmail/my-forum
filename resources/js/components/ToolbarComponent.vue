<template>
    <v-toolbar>
        <v-app-bar-nav-icon></v-app-bar-nav-icon>
        <v-app-bar-title>SPA Blog</v-app-bar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items class="hidden-sm-and-down">
            <v-btn text>Forum</v-btn>
            <v-btn text>Ask Question</v-btn>
            <v-btn text>Category</v-btn>
            <v-btn text>Signin</v-btn>
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
