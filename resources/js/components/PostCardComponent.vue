<template>
    <div>
            <!-- the v-if check if the post img is null or not -->
            <img :v-if="cover" :src=" 'storage/' + cover " :alt="title" />

            <div>{{ title }} </div>

            <div> {{ content }} </div>
            <!-- we gonna call the route singleBLog and we pass the ID of the post that we want the detail -->
            <router-link :to=" { name:'single-blog' , params: { id } } "> Visualizza </router-link>

    </div>
</template>

<script>

    export default {

       name:'PostCardComponent',

       props: ['title','cover','content','id'],

       computed: {
            trimmedContent(){
                    const shortContent = this.content.length > 20 ? this.content.substring(0,20) : this.content

                    return shortContent;
            }
       }
     
    }

</script>
