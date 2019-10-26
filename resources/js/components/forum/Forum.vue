<template>
    <v-container fluid grid-list-md >
        <v-layout row wrap>
            <v-flex xs8>
               <question v-for="(question,index) in questions"
               :key="index"
                         :data="question"
               ></question>
            </v-flex>
            <v-flex xs4>
                Sidebar
            </v-flex>

        </v-layout>
    </v-container>
</template>

<script>
    import Question from "./Question";
    export default {
        name: "Forum",
        components:{
            Question
        },
        data(){
          return {
              questions:{}
          }
        },
        created() {
            axios.get(`/api/question`)
                .then(res=>{
                    this.questions = res.data.data
                })
                .catch(err=>console.log(err.response.data))
        }
    }
</script>

<style scoped>

</style>
