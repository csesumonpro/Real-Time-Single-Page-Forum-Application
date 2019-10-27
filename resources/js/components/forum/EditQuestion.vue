<template>
    <v-container>
        <form @submit.prevent="updateQuestion">
            <v-text-field
                v-model="form.title"
                label="Title"
                type="text"
                required
            ></v-text-field>
<!--            <v-select-->
<!--                v-model="form.category_id"-->
<!--                label="Category"-->
<!--                :items="categories"-->
<!--                item-text="name"-->
<!--                item-value="id"-->
<!--                required-->
<!--            >-->
<!--            </v-select>-->
            <vue-simplemde v-model="form.body"  />
            <v-btn color="blue" type="submit">Update</v-btn>
            <v-btn color="teal" @click="cancel">Cancel</v-btn>

        </form>
    </v-container>
</template>

<script>
    import VueSimplemde from 'vue-simplemde'
    export default {
        name: "EditQuestion",
        components:{
          VueSimplemde
        },
        props:['data'],
        data(){
          return {
              form:{
                  title:null,
                  // category_id:null,
                  body:null
              }
          }
        },
        methods:{
            updateQuestion(){
                axios.patch(`/api/question/${this.form.slug}`,this.form)
                    .then(res=>{
                        this.cancel()
                })
            },
            cancel(){
                Event.$emit('cancelEditing')
            }
        },
     mounted(){
        this.form = this.data
     }

    }
</script>

<style scoped>

</style>
