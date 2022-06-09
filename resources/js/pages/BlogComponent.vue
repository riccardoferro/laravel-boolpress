<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                My posts
            </div>

            <div v-if=" posts.length > 0 ">
                <PostCardListComponent :posts="posts"/>
            </div>
            <div v-else>
                Caricamento in corso
            </div>
        </div>
    </div>
</template>

<script>

import PostCardListComponent from '../components/PostCardListComponent.vue'

export default {

    name:'BlogComponent',

    components:{PostCardListComponent},

    data(){
            return {
                    posts:[]
            }
    },

    mounted(){

        // console.log('mounted')

        axios.get('http://127.0.0.1:8000/api/posts').then(results=>{
                console.log(results);
                if (results.status === 200 && results.data.success){
                    this.posts = results.data.results;
                    // console.log('blogcomponent ' + this.posts[0].cover);
                    // console.log('blogcomponent ' + this.posts[1].cover);
                }
        }).catch(e=>{
                console.log(e);
        })
    }
}
</script>

<style>

</style>