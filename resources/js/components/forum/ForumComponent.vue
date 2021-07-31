<template>
    <v-container fluid grid-list-md>
        <v-layout row wrap>
            <v-flex xs8>
                <question-component></question-component>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import QuestionComponent from "./QuestionComponent";
export default {
    name: "ForumComponent",
    components: {QuestionComponent}
}
</script>

<style scoped>

</style>
