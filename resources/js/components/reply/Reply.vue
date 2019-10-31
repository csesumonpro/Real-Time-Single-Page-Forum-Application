<template>
    <v-card class="mt-2">
        <v-card-title>
            <div class="headline">{{reply.user}}</div>
            <div class="ml-2">Said {{reply.created_at}}</div>
            <v-spacer></v-spacer>
            <like :data="reply"></like>
        </v-card-title>
        <v-divider></v-divider>
        <edit-reply v-if="editing" :data="reply"></edit-reply>
        <v-card-text v-html="body" v-else></v-card-text>
       <div v-if="!editing">
           <v-card-actions v-if="own">
               <v-btn icon small>
                   <v-icon color="orange" @click.prevent="editReply">edit</v-icon>
               </v-btn>
               <v-btn icon small>
                   <v-icon color="red" @click.prevent="deleteReply">delete</v-icon>
               </v-btn>
           </v-card-actions>
       </div>
    </v-card>
</template>

<script>
    import EditReply from "./EditReply";
    import Like from "../Likes/Like";
    export default {
        name: "Reply",
        props:['reply','index'],
        data(){
          return{
              editing:false
          }
        },
        components:{
          EditReply,Like
        },
        computed:{
            own(){
               return  User.own(this.reply.user_id)
            },
            body(){
                return md.parse(this.reply.reply)
            }
        },
        methods:{
            editReply(){
                this.editing = true
            },
            deleteReply(){
                Event.$emit('deleteReply',this.index)
            },
            listen(){
                Event.$on('cancelEditing',()=>{
                    this.editing = false
                })
            }
        },
        created() {
            this.listen();
        }

    }
</script>

<style scoped>

</style>
