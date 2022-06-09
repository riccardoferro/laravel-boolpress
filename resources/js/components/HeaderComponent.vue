<template>
    <!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <header>
            <nav>
                    <ul class="navbar-nav d-flex flex-row ">
                            <li v-for="(menuItem,index) in menu" :key="index" class="nav-item m-3">
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
