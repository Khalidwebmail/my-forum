<template>
    <v-form v-on:submit.prevent="login">

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

        <v-btn
            color="success"
            class="mr-4"
            type="submit"
        >
            Login
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
    name: "LoginComponent",
    data() {
        return {
            form: {
                email: null,
                password: null
            }
        }
    },
    methods:{
        login() {
            axios.post('/api/auth/login', this.form)
                .then(function (res){
                    console.log(res.data)
                })
                .catch(function (res){
                    console.log(error.res.data)
                })
        }
    }
}
</script>

<style scoped>

</style>
