<template>
    <v-card>
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
               >
               Edit
               </v-btn>

               <v-btn class="ma-2"
                      color="red"
                      dark
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
    data(){
        return{
            own: User.own(this.data.user_id)
        }
    },
    computed:{
        body(){
            return md.parse(this.data.body)
        }
    }
}
</script>

<style scoped>

</style>
