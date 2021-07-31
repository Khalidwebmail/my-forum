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
           <v-btn class="float-right" color="teal">10 Replies</v-btn>
       </v-container>
    </v-card>
</template>

<script>
export default {
    name: "ShowQuestion",
    props:['data']
}
</script>

<style scoped>

</style>
