<template>
    <div>
        <toolbar-component></toolbar-component>
        <footer-component></footer-component>
    </div>
</template>

<script>

import ToolbarComponent from "./ToolbarComponent";
import FooterComponent from "./FooterComponent";
export default {
    name: "AppHome",
    components: {FooterComponent, ToolbarComponent}
}
</script>

<style scoped>

</style>
