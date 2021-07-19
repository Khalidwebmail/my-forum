<template>
    <v-form v-model="valid">

        <v-text-field
            v-model="form.email"
            label="E-mail"
            required
        ></v-text-field>

        <v-text-field
            v-model="form.password"
            label="Password"
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
    data(){
        return{
            form: {
                email: null,
                password: null
            }
        }
    }
}
</script>

<style scoped>

</style>
