<template>
   <show-single-question
   :question="question"
   >
   </show-single-question>
</template>
<script>
    import ShowSingleQuestion from "./ShowSingleQuestion";
    export default {
        name: "SingleQuestion",
        components:{
            ShowSingleQuestion
        },
        data(){
            return{
                question:{}
            }
        },
        created(){
            axios.get(`/api/question/${this.$route.params.slug}`)
                .then(res=>{
                    this.question = res.data.data
                })
        }
    }
</script>

<style scoped>

</style>
