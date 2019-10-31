<template>
    <v-toolbar>
<!--        <v-toolbar-side-icon></v-toolbar-side-icon>-->
        <v-toolbar-title>FullStack Web</v-toolbar-title>
        <v-spacer></v-spacer>
        <app-notification v-if="loggedIn"></app-notification>
        <div class="hidden-sm-and-down">
               <router-link v-for="item in menuItem().items"
                            :to="item.to"
                            :key="item.title"
                            v-if="item.show"
               >
                   <v-btn flat>{{item.title}}</v-btn>
               </router-link>
        </div>
    </v-toolbar>
</template>
<script>
    import AppNotification from "./AppNotification";
    export default {
        name: "Toolbar",
        data(){
          return{
              loggedIn:User.loggedIn()
          }
        },
        components:{
            AppNotification
        },
        methods:{
            menuItem(){
                return {
                    items:[
                        {title:'Forum',to:'/forum',show:true},
                        {title:'Ask Question',to:'/ask',show:User.loggedIn()},
                        {title:'Category',to:'/category',show:User.loggedIn()},
                        {title:'Login',to:'/login',show: !User.loggedIn()},
                        {title:'Logout',to:'/logout',show:User.loggedIn()},
                    ]
                }
            },

        },
        created(){
            Event.$on('logout', () => {
                User.logout();
            });
        }


    }
</script>

<style scoped>

</style>
