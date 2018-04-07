
<template>
  <v-app id="inspire">
    <v-navigation-drawer
      fixed
      :clipped="$vuetify.breakpoint.lgAndUp"
      app
      v-model="drawer"
    >
      <v-list dense>

        <!-- <template>
          <v-list-group
            append-icon=""
          >
            <v-list-tile slot="activator">
              <v-list-tile-content>
                <v-list-tile-title>
                  Name: {{auth.name}}
                </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
            <v-list-tile slot="activator">
              <v-list-tile-content>
                <v-list-tile-title>
                  Email: {{auth.email}}
                </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
            
            <v-list-tile slot="activator">
              <v-list-tile-content>
                <v-list-tile-title>
                  Create on: {{auth.created_at}}
                </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          </v-list-group>
          <v-divider></v-divider>
          <a href="http://eboard.dev/posts/create" class="list__tile list__tile--link">
              <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">history</i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Create Post
                </div>
              </div>
          </a>
          <a href="http://eboard.dev/eboard" class="list__tile list__tile--link">
              <div class="list__tile__action"><i aria-hidden="true" class="icon material-building">content_copy</i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Eboard
                </div>
              </div>
          </a> -->

          <!-- <v-list-tile v-else @click="" :key="item.text">
            <v-list-tile-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>
                {{ item.text }}
              </v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile> -->
        <!-- </template>  -->
      </v-list>
    </v-navigation-drawer>
    <v-toolbar
      color="blue darken-3"
      dark
      app
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      fixed
    >
      <v-toolbar-title style="width: 300px" class="ml-0 pl-3">
        <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
        <span class="hidden-sm-and-down">Eboard Blog</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn icon>
        <v-icon>apps</v-icon>
      </v-btn>
    </v-toolbar>
    <v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
          <h1>Directors page</h1>
  <div id="app">
    <vue-editor v-model="posts.post"></vue-editor>
    <v-btn
      flat
      color="primary"
      type="submit"
      :disabled="!formValid"
       @click="send"
    >Save</v-btn>
    <div class="jumbotron" v-html="posts.post"></div>
    <div class="panel" v-for="item,key in postedpost">
      <p v-html="item.post"></p>
      <i class="fa fa-comments btn btn-default" aria-hidden="true" @click="openUpdate(key)" title="comment"></i>
      <p v-for="comment in directcommented" v-if="comment.post_id === item.id" style="background: #f0f0f0;">
        <small>{{comment.comment}}</small>
      </p>
    </div>
  </div>

  <v-card flat>
        <v-snackbar
          v-model="snackbar"
          absolute
          top
          right
          color="success"
        >
          <span>Comment success!</span>
        </v-snackbar>
        <v-form @submit.prevent ref="form">
          <v-container grid-list-xl fluid>
            <v-layout wrap>
              <v-flex xs12>
                <v-text-field
                  color="teal"
                  multi-line
                  v-model="form.comment">
                  <div slot="label">
                    comment
                  </div>
                </v-text-field>
              </v-flex>
            </v-layout>
          </v-container>
          <v-card-actions>
            <v-btn flat @click="resetForm">Cancel</v-btn>
            <v-spacer></v-spacer>
            <v-btn
              flat
              color="primary"
              type="submit"
              :disabled="!formIsValid"
               @click="save"
            >Comment</v-btn>
          </v-card-actions>
        </v-form>
      </v-card>
    <mycomments @closeRequest="close" :openRequest="dispUpdate"></mycomments>
        </v-layout>
      </v-container>
    </v-content>
    <!-- <v-btn
      fab
      bottom
      right
      color="pink"
      dark
      fixed
      @click.stop="dialog = !dialog"
    >
      <v-icon>add</v-icon>
    </v-btn>
    -->
  </v-app>
</template>

<script>
let mycomments = require('./Updatedirector.vue')
import { VueEditor } from 'vue2-editor'
export default {
  components: {
    VueEditor, mycomments
  },
  data() {
    const defaultForm = Object.freeze({
          comment: '',
        })
        return{
          
      drawer: null,
          dispUpdate: 'none',
          directcommented: {},
          posts: {
            post: ''
          }, 
          postedpost: {},
          commented: {},
          form: Object.assign({}, defaultForm),
          rules: {
            // animal: [val => (val || '').length > 0 || 'This field is required'],
            name: [val => (val || '').length > 0 || 'This field is required']
          },
          snackbar: false,
          defaultForm,
          userget: {},  
        }
  },
  computed: {
      formIsValid () {
        return (
          this.form.comment
        )
      },
      formValid () {
        return (
          this.posts.post
        )
      }
    },

  methods: {
    openUpdate(key){
      this.$children[0].list = this.postedpost[key]
      this.dispUpdate = 'block'
    },
      resetForm () {
        this.form = Object.assign({}, this.defaultForm)
        this.$refs.form.reset()
      },
    close() {
      this.dispUpdate = 'none'
    },
    save() {
      axios.post(`/directorcomment/${this.posts.post.id}`, this.$data.form)
      .then((response) => {
        this.close()
            console.log(response);          
            this.directcommented.push(response.data)
            this.snackbar = true
            this.resetForm()
      })
      .catch((error) => this.errors = error.response.data.errors)
    },
    send() {
      axios.post('/director', this.$data.posts)
      .then((response) => {
        this.close()
            console.log(response);          
            this.postedpost.push(response.data)
            // this.snackbar = true
            this.resetForm()
            // this.$emit('alertRequest')
      })
      .catch((error) => this.errors = error.response.data.errors)
    }
  },
  mounted() {
    axios.post('/getdircom')
    .then((response) => this.commented = response.data)
      .catch((error) => this.errors = error.response.data.errors)   
  },
  created() {
    axios.post('/getdirectcomment')
    .then((response) => this.directcommented = response.data)
      .catch((error) => this.errors = error.response.data.errors)

      axios.post('/getdirectors')
    .then((response) => this.postedpost = response.data)
      .catch((error) => this.errors = error.response.data.errors)
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
<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste dolorem reprehenderit alias voluptatum illum sunt consectetur, aliquam cum aspernatur dolorum rem! Provident corporis atque assumenda nihil deleniti odit natus esse! -->