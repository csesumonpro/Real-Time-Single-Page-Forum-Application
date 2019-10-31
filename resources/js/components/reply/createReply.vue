<template>
    <v-container>
        <form @submit.prevent="createReply">
            <vue-simplemde v-model="body"  />
<!--            <div v-if="errors.body">-->
<!--                <span  class="red&#45;&#45;text">{{errors.body['0']}}</span>-->
<!--            </div>-->
            <v-btn color="blue" type="submit">Create</v-btn>
        </form>
    </v-container>
</template>

<script>
    import VueSimplemde from 'vue-simplemde'
    export default {
        name: "createReply",
        props:['questionSlug'],
        components:{
            VueSimplemde
        },
        data(){
          return{
              body:null
          }
        },
        methods:{
            createReply(){
                axios.post(`/api/question/${this.questionSlug}/reply`,{body:this.body})
                    .then(res=>{
                        this.body = ''
                        Event.$emit('populateReply',res.data.reply)
                        window.scrollTo(0,0);
                    })
            }
        }
    }
</script>

<style scoped>

</style>
