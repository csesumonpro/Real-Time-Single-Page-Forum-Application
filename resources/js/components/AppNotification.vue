<template>
    <div class="text-xs-center">
        <v-menu offset-y>
            <v-btn icon slot="activator">
                <v-icon :color="color" >add_alert</v-icon>{{unReadCount}}
            </v-btn>
            <v-list>
                <v-list-tile v-for="(item,index) in unRead" :key="index">
                   <router-link :to="item.path">
                       <v-list-tile-title @click="readIt(item)">{{item.question}}</v-list-tile-title>
                   </router-link>
                </v-list-tile>
                <v-divider></v-divider>
                <v-list-tile v-for="item in read" :key="item.id">
                    <v-list-tile-title>{{item.question}}</v-list-tile-title>
                </v-list-tile>
            </v-list>
        </v-menu>
    </div>
<!--    <v-btn icon>-->
<!--        <v-icon color="red">add_alert</v-icon>5-->
<!--    </v-btn>-->
</template>

<script>
    export default {
        name: "AppNotification",
        data(){
          return{
              read:{},
              unRead:{},
              unReadCount:{},
          }
        },
        created() {
            if(User.loggedIn()){
                this.getNotifications();
            }
        },
        methods:{
            getNotifications(){
                axios.post('/api/notifications')
                    .then(res=>{
                        this.read = res.data.read;
                        this.unRead = res.data.unread;
                        this.unReadCount = res.data.unread.length
                    })
            },
            readIt(notification){
                axios.post('/api/markAsRead',{id:notification.id})
                    .then(res=>{
                        this.unRead.splice(notification,1)
                        this.read.push(notification)
                        this.unReadCount --
                    })
            },

        },
        computed:{
            color(){
                return  this.unReadCount>0 ? 'red' : 'red lighten-4';
            }
        }


    }
</script>

<style scoped>

</style>
