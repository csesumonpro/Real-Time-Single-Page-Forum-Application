<template>
    <v-container>
        <form @submit.prevent="signup">
            <v-text-field
                v-model="form.name"
                label="Name"
                required
            ></v-text-field>
            <span v-if="errors.name" class="red--text">{{errors.name[0]}}</span>
            <v-text-field
                v-model="form.email"
                label="E-mail"
                type="email"
                required
            ></v-text-field>
            <span v-if="errors.email" class="red--text">{{errors.email[0]}}</span>
            <v-text-field
                v-model="form.password"
                label="Password"
                type="password"
                required
            ></v-text-field>
            <span v-if="errors.password" class="red--text">{{errors.password[0]}}</span>
            <v-text-field
                v-model="form.confirm_password"
                label="Confirm Password"
                type="password"
                required
            ></v-text-field>
            <v-btn color="blue" type="submit">Signup</v-btn>
            <router-link to="/login">
                <v-btn color="green" >Login</v-btn>
            </router-link>
        </form>
    </v-container>
</template>

<script>
    export default {
        name: "Signup",
        data(){
            return {
                form:{
                    name:null,
                    email:null,
                    password:null,
                    confirm_password:null,
                },
                errors:{}
            }
        },
        methods:{
            signup(){
                axios.post('/api/auth/signup',this.form)
                    .then(res=>{
                        User.responseAfterLogin(res);
                        this.$router.push('forum')
                    })
                    .catch(err=>{
                        this.errors = err.response.data.errors
                    })
            }
        },
        mounted() {
            if (User.loggedIn()){
                this.$router.push('forum')
            }
        }
    }
</script>

<style scoped>

</style>
