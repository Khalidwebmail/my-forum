<template>
    <v-container>
        <v-form v-on:submit.prevent="save">
            <v-text-field
                v-model="form.name"
                label="Category name"
                type="text"
                required
            ></v-text-field>

            <v-btn
                color="success"
                class="mr-4"
                type="submit"
            >
                Save
            </v-btn>
        </v-form>
    </v-container>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: null
            }
        }
    },
    methods: {
        save() {
            axios.post('/api/categories/store', this.form)
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
