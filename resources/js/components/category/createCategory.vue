<template>
    <v-container>
        <form>
            <v-text-field
                v-model="form.name"
                label="Category Name"
                type="text"
            ></v-text-field>
            <div v-if="errors.name">
                <span  class="red--text">{{errors.name['0']}}</span>
            </div>
            <v-btn color="blue" type="submit" v-if="editSlug" @click.prevent="updateCategory">Update</v-btn>
            <v-btn color="blue" type="submit" v-else @click.prevent="createCategory">Create</v-btn>
        </form>
           <v-card class="mt-2">
               <v-toolbar color="cyan" dark dense>
                   <v-toolbar-title>Categories</v-toolbar-title>
               </v-toolbar>
               <v-list>
                   <div  v-for="(category,index) in categories" :key="category.id">
                       <v-list-tile>
                           <v-list-tile-action>
                               <v-btn icon small>
                                   <v-icon color="orange" @click.prevent="editCategory(index)">edit</v-icon>
                               </v-btn>
                           </v-list-tile-action>
                           <v-list-tile-content>
                               <v-list-tile-title >{{category.name}}</v-list-tile-title>
                           </v-list-tile-content>
                           <v-list-tile-action>
                               <v-btn icon small>
                                   <v-icon @click="deleteCategory(category.slug,index)" color="red">delete</v-icon>
                               </v-btn>
                           </v-list-tile-action>
                       </v-list-tile>
                       <v-divider></v-divider>
                   </div>
               </v-list>

           </v-card>
    </v-container>
</template>
<script>
    export default {
        name: "createCategory",
        data(){
          return{
              form:{
                  name:null
              },
              categories:null,
              editSlug:false,
              errors:{}
          }
        },
        methods:{
            getCategories(){
                axios.get('/api/category')
                    .then(res=>{
                        this.categories = res.data.data
                    })
            },

            createCategory(){
                axios.post('/api/category',this.form)
                    .then(res=>{
                        this.categories.unshift(res.data)
                        this.form.name = null
                    })
                    .catch(err=>{
                        this.errors = err.response.data.errors;
                    })
            },
            updateCategory(){
                axios.patch(`/api/category/${this.editSlug}`,this.form)
                    .then(res=>{
                        this.categories.unshift(res.data)
                        this.form.name = null
                    })
                    .catch(err=>{
                        this.errors = err.response.data.errors;
                    })
            },
            deleteCategory(slug,index){
                axios.delete(`/api/category/${slug}`)
                    .then(res=>{
                       this.categories.splice(index,1)
                    })
            },
            editCategory(index){
                this.form.name = this.categories[index].name
                this.editSlug = this.categories[index].slug
                this.categories.splice(index,1)

            }
        },
        created(){
            this.getCategories();
        }
    }
</script>

<style scoped>

</style>
