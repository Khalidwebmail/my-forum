<template>
    <show-question
    :data = question
    v-if = 'question'
    ></show-question>
</template>

<script>
import ShowQuestion from "./ShowQuestion";
export default {
    components: {ShowQuestion},
    data(){
        return{
            question: null
        }
    },
    name: "ReadComponent",
    created() {
        axios.get(`/api/questions/${this.$route.params.slug}`)
        .then(res=>{
            this.question = res.data.data
        })
    }
}
</script>

<style scoped>

</style>
