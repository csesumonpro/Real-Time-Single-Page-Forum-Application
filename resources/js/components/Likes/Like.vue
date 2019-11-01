<template>
    <div>
        <v-btn icon @click.prevent="likeIt">
            <v-icon :color="color">favorite</v-icon>{{count}}
        </v-btn>
    </div>
</template>

<script>
    export default {
        name: "Like",
        props:['data'],
        data(){
            return{
                count:this.data.like_count,
                liked:this.data.liked
            }
        },
        methods:{
            likeIt(){
                if(User.loggedIn()){
                 this.liked ? this.decrement() : this.increment();
                    this.liked = !this.liked
                }
            },
            increment(){
                axios.post(`/api/like/${this.data.id}`)
                    .then(res=>{
                        this.count++
                    })

            },
            decrement(){
                axios.delete(`/api/like/${this.data.id}`)
                    .then(res=>{
                        this.count--
                    })
            }
        },
        computed:{
            color(){
               return  this.liked ? 'red' : 'red lighten-4';
            }
        },
        created(){
            Echo.channel('likeChannel')
                .listen('LikeEvent', (e) => {
                    if(e.id==this.data.id){
                        e.type==1 ? this.count++ : this.count--
                    }
                });
        }
    }
</script>

<style scoped>

</style>
