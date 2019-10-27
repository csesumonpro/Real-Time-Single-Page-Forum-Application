<template>
    <v-container>
        <form @submit.prevent="createQuestion">
            <v-text-field
                v-model="form.title"
                label="Title"
                type="text"
                required
            ></v-text-field>
            <v-select
                v-model="form.category_id"
                label="Category"
                :items="categories"
                item-text="name"
                item-value="id"
                required
            >
            </v-select>
            <vue-simplemde v-model="form.body"  />
            <v-btn color="blue" type="submit">Create</v-btn>

        </form>
    </v-container>
</template>

<script>
    import VueSimplemde from 'vue-simplemde'
    export default {
        name: "Ask",
        components: {
            VueSimplemde
        },
        data(){
            return {
                form:{
                    title:'',
                    category_id:'',
                    body:''
                },
                categories:[],
                errors:{}
            }
        },
        methods:{
            createQuestion(){
                axios.post('/api/question',this.form)
                    .then(res=>{
                        this.$router.push(res.data.path)
                    })
                    .catch(err=>{
                        this.errors = err.response.data
                    })
            },
            getCategory(){
                axios.get('/api/category')
                    .then(res=>{
                       this.categories = res.data.data
                    })
            }
        },
        created() {
           this.getCategory();
        }

    }
</script>

<style scoped>
    @import '~simplemde/dist/simplemde.min.css';
</style>
