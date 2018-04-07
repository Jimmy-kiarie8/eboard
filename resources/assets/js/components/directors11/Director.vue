<template>
<div class="content-wrapper">
  <div id="app">
    <vue-editor v-model="content"></vue-editor>
    <div class="jumbotron" v-html="content"></div>
  </div>
</div>
</template>

<script>
  import { VueEditor } from 'vue2-editor'

  export default {

  components: {
    VueEditor
  },
    data() {
      return {
        content: ''  
      }
    }
  }
</script>

<style scoped>
  #app{
    width: 70%;
    margin: auto;
    margin-top: 30px;
  }
  .jumbotron{
    background: #fff;
  }

</style>