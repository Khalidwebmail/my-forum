<template>
    <v-card
        max-width="344"
    >
        <v-img
            src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
            height="200px"
        ></v-img>

        <v-card-title>
            <router-link :to="data.path">{{data.title}}</router-link>
        </v-card-title>

        <v-card-subtitle>
            {{data.user}} said {{data.created_at}}
        </v-card-subtitle>

        <v-expand-transition>
            <div>
                <v-divider></v-divider>
                <v-card-text>
                    {{data.body}}
                </v-card-text>
            </div>
        </v-expand-transition>
    </v-card>
</template>

<script>
export default {
    name: "QuestionComponent",
    props: ['data']
}
</script>

<style scoped>

</style>
