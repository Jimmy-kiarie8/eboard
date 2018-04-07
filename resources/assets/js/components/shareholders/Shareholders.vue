<template>
<div class="content-wrapper">
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
      <i class="fa fa-comments btn btn-default" aria-hidden="true" @click="openUpdate(key, item.id)" title="comment"></i>
      <p v-for="comment in sharecommented" v-if="comment.post_id === item.id" style="background: #f0f0f0;">
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
    <mycomments @closeRequest="close" :openRequest="dispUpdate" :getcomment="commented"></mycomments>
</div>
</template>

<script>
let mycomments = require('./Updateshareholders.vue')
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
          dispUpdate: 'none',
          sharecommented: {},
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
    openUpdate(key, id){
      this.$children[0].list = this.commented[key]
      // this.$children[1].list = this.commented[key]
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
      axios.post(`/sharecomment/${this.posts.post.id}`, this.$data.form)
      .then((response) => {
        this.close()
            console.log(response);          
            this.sharecommented.push(response.data)
            this.snackbar = true
            this.resetForm()
      })
      .catch((error) => this.errors = error.response.data.errors)
    },
    send() {
      axios.post('/shareholder', this.$data.posts)
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
    axios.post('/getcom')
    .then((response) => this.commented = response.data)
      .catch((error) => this.errors = error.response.data.errors)   
  },
  created() {
    axios.post('/getsharecomment')
    .then((response) => this.sharecommented = response.data)
      .catch((error) => this.errors = error.response.data.errors)

      axios.post('/getShareholders')
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