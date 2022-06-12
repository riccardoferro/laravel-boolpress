<template>
    <!-- <div>
       ciao
    </div> -->
    <div class="container">
        <div class="row">
              <div class="col-12 text-center">
                  My posts
              </div>

              <!-- show the detail post -->
              <div v-if="post">
                  <h2>  {{ post.title}} </h2>
                  
                  <img :src=" '/storage/' + post.cover " :alt="post.title">

                  <p> {{ post.content }}</p>

                  <div>
                      <ul>
                          <li v-for="tag in post.tags" :key="tag.id">
                              {{ tag.name }}
                          </li>
                      </ul>
                  </div>
              </div>

              <div v-else>
                  Caricamento in corso
              </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'SingleBlogComponent',

    data(){
      // we are visualize a single object so we put an object undefined to start
      // if it was an array, we have set that empty
      return {
        post:undefined
        }
    },

    mounted(){
        // by a Vue property we can take the id
        const id = this.$route.params.id;

        // console.log('mounted with id',id);
        window.axios.get('http://127.0.0.1:8000/api/posts/' + id).then( ({status,data}) => {
            console.log('siamo su SingleBlogComponent e mostriamo il data: ');
            console.log(data);

            if (status === 200 && data.success){
              this.post = data.result;
              console.log('data.result');
              console.log(data.result);
            }
        }).catch(e=>{
              console.log(e);
            })
  
    }
}
</script>

<style>

</style>