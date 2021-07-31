<template>
    <v-form v-on:submit.prevent="signup">

        <v-text-field
            v-model="form.name"
            label="Username"
            type="text"
            required
        ></v-text-field>
        <span class="red--text" v-if="errors.name">{{errors.name[0]}}</span>

        <v-text-field
            v-model="form.email"
            label="E-mail"
            type="email"
            required
        ></v-text-field>
        <span class="red--text" v-if="errors.email">{{errors.email[0]}}</span>

        <v-text-field
            v-model="form.password"
            label="Password"
            type="password"
            required
        ></v-text-field>
        <span class="red--text" v-if="errors.password">{{errors.password[0]}}</span>

        <v-text-field
            v-model="form.password_confirmation"
            label="Re type Password"
            type="password"
            required
        ></v-text-field>

        <v-btn
            color="success"
            class="mr-4"
            type="submit"
        >
            Register
        </v-btn>

        <v-btn
            color="error"
            class="mr-4"
        >
            Reset Form
        </v-btn>
    </v-form>
</template>

<script>
export default {
    name: "SignupComponent",
    data() {
        return {
            form: {
                name:                  null,
                email:                 null,
                password:              null,
                password_confirmation: null
            },
            errors:{}
        }
    },
    methods:{
        signup(){
            axios.post('/api/auth/register', this.form)
            .then(res => {
                this.$router.push({name: '/login'})
            })
            .catch(error => this.errors = error.response.data.errors)
        }
    },

    created() {
        if(User.loggedIn()){
            this.$router.push({name:'/forum'})
        }
    },
}
</script>

<style scoped>

</style>
