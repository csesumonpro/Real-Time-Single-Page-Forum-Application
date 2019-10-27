<template>
    <v-card >
        <v-container>
            <v-card-title primary-title>
                <div>
                    <h3 class="headline mb-0"> {{question.title}}</h3>
                    <div>
                        <div class="grey--text">
                            {{question.user}} Said  {{question.created_at}}
                        </div>
                    </div>
                </div>
                <v-spacer></v-spacer>
                <v-btn color="teal">49 Replies</v-btn>
            </v-card-title>

            <v-card-text v-html="body"> </v-card-text>
            <v-card-actions v-if="own">
                <v-btn icon small>
                    <v-icon color="orange" @click.prevent="edit">edit</v-icon>
                </v-btn>
                <v-btn icon small>
                    <v-icon color="red" @click.prevent="deleteQuestion">delete</v-icon>
                </v-btn>
            </v-card-actions>
        </v-container>
    </v-card>
</template>
<script>
    import User from "../../Helpers/User";

    export default {
        name: "ShowSingleQuestion",
        props:['question'],
        data(){
          return{
              own:User.own(this.question.user_id)
          }
        },
        computed:{
            body(){
                return md.parse(this.question.body)
            }
        },
        methods:{
            deleteQuestion(){
                axios.delete(`/api/question/${this.question.slug}`)
                    .then(res=>{
                        this.$router.push('/forum')
                    })
                    .catch(err=>{
                        console.log(err.response.data)
                    })
            },
            edit(){
                Event.$emit('startEditing')
            }
        }
    }
</script>

<style scoped>

</style>
