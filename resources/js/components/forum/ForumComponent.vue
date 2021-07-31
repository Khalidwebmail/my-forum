<template>
    <v-container fluid grid-list-md>
        <v-layout row wrap>
            <v-flex xs8>
                <question-component
                    v-for="question in questions"
                    :key="question.path"
                    :data=question
                ></question-component>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import QuestionComponent from "./QuestionComponent";
export default {
    name: "ForumComponent",
    components: {QuestionComponent},
    data() {
        return{
            questions: {}
        }
    },

    created() {
        axios.get('/api/questions')
        .then(res => {
            this.questions = res.data.data
        })
        .catch(error => {
            console.log(error.res.data)
        })
    }
}
</script>

<style scoped>

</style>
