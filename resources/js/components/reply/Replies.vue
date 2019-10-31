<template>
    <v-container>
        <reply v-for="(reply,index) in content"
                 :key="reply.id"
                 :reply="reply"
               :index="index"
        >

        </reply>
    </v-container>
</template>

<script>
 import Reply from "./Reply";
    export default {
        name: "Replies",
        props:['replies','questionSlug'],
        data(){
          return {
              content:this.replies
          }
        },
        components:{
            Reply
        },
        created(){
            this.listenReply();
        },
        methods:{
            listenReply(){
                Event.$on('populateReply',(reply)=>{
                    this.content.unshift(reply);
                })
                Event.$on('deleteReply',(index)=>{
                    axios.delete(`/api/question/${this.questionSlug}/reply/${this.content[index].id}`)
                    this.content.splice(index,1)
                })
            }
        }
    }
</script>

<style scoped>

</style>
