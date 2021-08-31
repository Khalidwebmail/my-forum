<template>
    <div>
        <h1>Email verification complete</h1>
        <p>
            Please click here to go <router-link to="/login">Login</router-link>
        </p>
    </div>
</template>

<script>
export default {
    name: "VerifyRegistrationComponent",
    methods: {
        verifyEmail() {
            axios.get(`/api/auth/user/active/${this.$route.params.token}`)
                .then(res => {
                    //window.location.reload();
                })
                .catch(error => {

                })
        }
    },

    mounted() {
        this.verifyEmail()
    }
}

</script>

<style scoped>

</style>
