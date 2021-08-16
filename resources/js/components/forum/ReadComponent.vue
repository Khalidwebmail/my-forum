<template>

    <div v-if="question">
        <edit-question-component
            v-if="editing"
            :data = question
        ></edit-question-component>

        <show-question
            v-else
            :data = question
        ></show-question>
    </div>
</template>

<script>
import ShowQuestion from "./ShowQuestion";
import EditQuestionComponent from "./EditQuestionComponent";

export default {
    components: {ShowQuestion, EditQuestionComponent},
    data(){
        return{
            question: null,
            editing:  false
        }
    },
    name: "ReadComponent",
    created() {
        this.listen(),
        this.getQuestion()
    },
    methods: {
        listen() {
            EventBus.$on('startEditing', () => {
                this.editing = true
            })

            EventBus.$on('cancelEditing', () => {
                this.editing = false
            })
        },

        getQuestion() {
            axios.get(`/api/questions/${this.$route.params.slug}`)
                .then(res=>{
                    this.question = res.data.data
                })
        }
    }
}
</script>

<style scoped>

</style>
