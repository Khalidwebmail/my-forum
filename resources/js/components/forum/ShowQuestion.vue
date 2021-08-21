<template>
    <v-card mt-2>
       <v-container fluid>
           <v-card-title>
               <div class="headline">
                   {{data.title}}
               </div>
           </v-card-title>
           <v-card-subtitle>
               {{data.user}} said {{data.created_at}}
           </v-card-subtitle>
           <v-spacer></v-spacer>
           <v-card-text v-html="body"></v-card-text>
           <v-card-actions v-if="own">
               <v-btn class="ma-2"
                      color="primary"
                      dark
                      v-on:click="edit"
               >
               Edit
               </v-btn>

               <v-btn class="ma-2"
                      color="red"
                      dark
                      v-on:click="destroy"
               >
                   Delete
               </v-btn>
           </v-card-actions>
           <v-btn class="float-right" color="teal">10 Replies</v-btn>
       </v-container>
    </v-card>
</template>

<script>


export default {
    name: "ShowQuestion",
    props:['data'],
    data() {
        return{
            own: User.own(this.data.user_id)
        }
    },
    computed: {
        body() {
            return md.parse(this.data.body)
        }
    },
    methods: {
        destroy() {
            axios.delete(`/api/questions/${this.data.slug}/delete`)
            .then(res => {
                this.$router.push('/forum')
            })
            .catch(error => {
                console.log(error.res.data)
            })
        },
        edit() {
            EventBus.$emit('startEditing')
        }
    }
}
</script>

<style scoped>

</style>
