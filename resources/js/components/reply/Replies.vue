<template>
    <v-container>
        <reply
            v-for="reply in replies"
            :key="reply.id"
            :data="reply"></reply>
    </v-container>
</template>

<script>
import Reply from "./Reply"

export default {
    name: "Replies",
    components: {Reply},
    props: ['replies'],
}
</script>

<style scoped>

</style>
