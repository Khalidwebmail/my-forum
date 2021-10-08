<template>
    <div>
        <toolbar-component></toolbar-component>
        <v-container>
            <router-view></router-view>
        </v-container>
        <footer-component></footer-component>
    </div>
</template>

<script>

import ToolbarComponent from "./ToolbarComponent";
import FooterComponent from "./FooterComponent";
import LoginComponent from "./auth/LoginComponent"
export default {
    name: "AppHome",
    components: {FooterComponent, ToolbarComponent, LoginComponent}
}
</script>

<style scoped>

</style>
