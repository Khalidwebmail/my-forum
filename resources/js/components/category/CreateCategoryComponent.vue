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

        <v-card mt-5>
            <v-toolbar color="indigo" dark>
                <v-toolbar-title>Categories</v-toolbar-title>
            </v-toolbar>
            <div v-for="category in categories" :key="category.id">
                <v-list>
                    <v-list-item >
                        <v-list-item-action>
                            <v-btn
                                depressed
                                color="primary"
                            >
                                Edit
                            </v-btn>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>{{category.name}}</v-list-item-title>
                        </v-list-item-content>

                        <v-list-item-action>
                            <v-btn
                                depressed
                                color="error"
                                v-on:click="destroy(category.slug)"
                            >
                                Delete
                            </v-btn>
                        </v-list-item-action>
                    </v-list-item>
                    <v-divider></v-divider>
                </v-list>
            </div>
        </v-card>
    </v-container>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: null
            },
            categories:{}
        }
    },
    methods: {
        save() {
            axios.post('/api/categories/store', this.form)
            .then(res => {
                //this.categories.unshift(res.data)
                window.location.reload();
            })
            .catch(error => {

            })
        },
        destroy(slug, index) {
            axios.delete(`/api/categories/${slug}/delete`)
            .then(res => {
                this.categories.splice(index,1)
            })
        }
    },
    created() {
        axios.get('/api/categories')
            .then(res => {
                this.categories = res.data.data
            })
    }
}
</script>

<style scoped>

</style>
