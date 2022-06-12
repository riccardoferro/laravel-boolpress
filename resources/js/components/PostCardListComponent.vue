<template>
        <div>
                <div v-for=" post in posts" :key="post.id">
                        <PostCardComponent :title="post.title" :cover="post.cover" :content="post.content" :id="post.id"/>
                </div>
        </div>
</template>

<script>

import PostCardComponent from './PostCardComponent.vue'

        export default {
            name:'PostCardListComponent',
            
            props: ['posts'],

            components: {PostCardComponent},

        }
        
</script>
