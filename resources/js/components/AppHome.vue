<template>
  <div>
      <toolbar></toolbar>
      <router-view></router-view>
      <app-footer></app-footer>
  </div>
</template>

<script>
    import Toolbar from './Toolbar'
    import AppFooter from './AppFooter'
    export default {
        name: "AppHome",
        components:{
            Toolbar,
            AppFooter
        }
    }
</script>

<style scoped>

</style>
