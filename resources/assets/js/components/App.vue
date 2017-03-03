<template>
  <div>
      <nav class="navbar navbar-default">
          <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                  <li><router-link to="/">Home</router-link></li>
                  <li><router-link to="/addbox">Add boxes</router-link></li>
                  <li><router-link to="/listboxes">List boxes</router-link></li>
              </ul>
          </div>
      </nav>

      <router-view></router-view>
    <div id="app"></div>
  </div>
</template>
<script>
    export default {
        name: 'App'
    }
</script>
<style>

</style>