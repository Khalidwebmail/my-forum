<template>
    <v-container>
        <v-form v-on:submit.prevent="createQuestion">

            <v-text-field
                label="Title"
                type="text"
                v-model="form.title"
                required
            ></v-text-field>

            <v-select
                :items="categories"
                item-text="name"
                item-value="id"
                v-model="form.category_id"
                label="Category"
                autocomplete
            ></v-select>
            <vue-simplemde v-model="form.body" ref="markdownEditor" />

            <v-btn
                color="green"
                type="submit"
            >Create</v-btn>
        </v-form>
    </v-container>
</template>

<script>
export default {
    name: "CreateQuestionComponent",
    data() {
        return {
            form: {
                title: null,
                category_id: null,
                body: null
            },
            categories: [],
            errors: {}
        };
    },
    created() {
        axios.get("/api/categories").then(res => (this.categories = res.data.data));
    },

    methods:{
        createQuestion: function (){
            axios.post('/api/questions/store', this.form)
            .then(res => {

            })
            .catch(error => {

            })
        }
    }
}
</script>

<style scoped>

</style>
