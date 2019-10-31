<template>
    <v-container>
        <form @submit.prevent="update">
            <vue-simplemde v-model="data.reply"  />
            <v-btn color="blue" type="submit">Update</v-btn>
            <v-btn color="white" type="submit" @click.prevent="cancel">Cancel</v-btn>

        </form>
    </v-container>
</template>

<script>
    import VueSimplemde from 'vue-simplemde'
    export default {
        name: "EditReply",
        props:['data'],
        components:{
            VueSimplemde
        },
        methods:{
            update(){
                axios.patch(`/api/question/${this.data.question_slug}/reply/${this.data.id}`)
                    .then(res=>{
                        this.cancel();
                    })
            },
            cancel(){
                Event.$emit('cancelEditing')
            }
        }
    }
</script>

<style scoped>

</style>
