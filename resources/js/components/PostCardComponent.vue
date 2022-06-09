<template>
    <div>
            <img :src=" 'storage/' + cover " :alt="title" />

            <div>{{ title }} </div>

            <div> {{ content }} </div>

    </div>
</template>

<script>

    export default {

       name:'PostCardComponent',

       props: ['title','cover','content'],

       computed: {
            trimmedContent(){
                    const shortContent = this.content.length > 20 ? this.content.substring(0,20) : this.content

                    return shortContent;
            }
       }
     
    }

</script>
