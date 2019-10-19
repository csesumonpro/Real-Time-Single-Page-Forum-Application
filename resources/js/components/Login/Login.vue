<template>
    <v-container>
        <form @submit.prevent="login">
            <v-text-field
                v-model="form.email"
                label="E-mail"
                required
            ></v-text-field>
            <v-text-field
                v-model="form.password"
                label="Password"
                type="password"
                required
            ></v-text-field>
            <v-btn color="blue" type="submit">Login</v-btn>
        </form>
    </v-container>
</template>

<script>
    export default {
        name: "Login",
        data(){
            return {
                form:{
                    email:null,
                    password:null,
                }
            }
        },
        methods:{
           login(){
               User.login(this.form);
           }
        }
    }
</script>

<style scoped>

</style>
