<template>
    <div>
        <!-- we have a fixed part -->
        <HeaderComponent/>
        <!-- and in this tag renderise all the navigation part -->
        <router-view></router-view>
    </div>
</template>

<script>

import HeaderComponent from '../components/HeaderComponent.vue'

export default {
  
  name:'AppComponent',

  components: {
    HeaderComponent
    }

}

</script>

<style>

</style>