<template>
    <header>
            <nav>
                    <ul class="navbar-nav d-flex flex-row ">
                            <li v-for="(menuItem,index) in menu" :key="index" class="nav-item m-3">
                                <!-- here we don't have used the components but the router link to make buttons and go through the pages -->
                                 <router-link :to="{ name: menuItem.linkName }" > {{ menuItem.label }} </router-link>
                            </li>
                            
                    </ul>
            </nav>
    </header>
</template>

<script>
    export default {

       name:'HeaderComponent',

       data(){
           return{
               menu: [
                   { linkName: 'home' , label:'Home'},
                   { linkName: 'blog' , label:'MY posts'},
                   { linkName: 'chi-siamo' , label:'Who we are'},
                   { linkName: 'contacts' , label:'Contacts'},
               ]
           }
       }
       
    }
</script>
