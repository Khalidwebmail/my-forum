<template>
    <v-form v-on:submit.prevent="signup">

        <v-text-field
            v-model="form.name"
            label="Username"
            type="text"
            required
        ></v-text-field>

        <v-text-field
            v-model="form.email"
            label="E-mail"
            type="email"
            required
        ></v-text-field>

        <v-text-field
            v-model="form.password"
            label="Password"
            type="password"
            required
        ></v-text-field>

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
            }
        }
    },
    methods:{
        signup(){
            axios.post('/api/auth/register', this.form)
            .then(res => {
                this.$router.push({name: '/login'})
            })
            .catch(error => {
                console.log(error.res.data)
            })
        }
    }
}
</script>

<style scoped>

</style>
