<template>

  <div v-if="question">
         <edit-question
             v-if="editing"
             :data="question"
         >
         </edit-question>
         <show-single-question
             v-else
             :question="question"
         >
         </show-single-question>
     <v-container>
         <replies :replies="question.replies" :questionSlug="question.slug"></replies>
         <create-reply :questionSlug="question.slug"></create-reply>
     </v-container>

  </div>
</template>
<script>
    import EditQuestion from "./EditQuestion";
    import ShowSingleQuestion from "./ShowSingleQuestion";
    import Replies from "../reply/Replies";
    import createReply from "../reply/createReply";
    export default {
        name: "SingleQuestion",
        components:{
            ShowSingleQuestion,EditQuestion,Replies,createReply
        },
        data(){
            return{
                question:null,
                editing:false
            }
        },
        created(){
             this.getQuestion();
             this.eventListen();
             this.cancelEditing();
        },
        methods:{
         getQuestion(){
            axios.get(`/api/question/${this.$route.params.slug}`)
                .then(res=>{
                    this.question = res.data.data
                })
             },
            eventListen(){
             Event.$on('startEditing',()=>{
                 this.editing = true
             });
            },
            cancelEditing(){
                Event.$on('cancelEditing',()=>{
                    this.editing = false
                });
            }

        }
    }
</script>

<style scoped>

</style>
