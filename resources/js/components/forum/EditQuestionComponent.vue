<template>
    <v-container>
        <v-card>
            <v-form v-on:submit.prevent="updateQuestion">
                <v-text-field
                    label="Title"
                    type="text"
                    v-model="form.title"
                    required
                ></v-text-field>

                <vue-simplemde v-model="form.body" ref="markdownEditor" />

                <v-card-actions>
                    <v-btn
                        color="green"
                        type="submit"
                    >Update</v-btn>

                    <v-btn
                        v-on:click="cancelEdit"
                        color="blue"
                    >Cancel</v-btn>
                </v-card-actions>
            </v-form>
        </v-card>
    </v-container>
</template>

<script>
export default {
    props:['data'],
    data() {
        return {
            form: {
                title: null,
                body:  null
            }
        }
    },

    methods: {
        cancelEdit() {
            EventBus.$emit('cancelEditing')
        },

        updateQuestion() {
            axios.patch(`/api/questions/${this.form.slug}/update`, this.form)
            this.cancelEdit()

        }
    },

    created() {
        this.form = this.data
    },
}
</script>

<style scoped>

</style>
