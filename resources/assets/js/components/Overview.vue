<template>
  <div>
  <vue-topprogress ref="topProgress"></vue-topprogress>
  <transition  name="fade">
  <div>
  <!-- <v-app id="inspire">
    <v-navigation-drawer
      fixed
      :clipped="$vuetify.breakpoint.lgAndUp"
      app
      v-model="drawer"
    >
      <v-list dense>

        <template>
          <v-list-group
            append-icon=""
          >
            <v-list-tile slot="activator">
              <v-list-tile-content>
                <v-list-tile-title>
                  Name: {{user.name}}
                </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
            <v-list-tile slot="activator">
              <v-list-tile-content>
                <v-list-tile-title>
                  Email: {{user.email}}
                </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
            
            <v-list-tile slot="activator">
              <v-list-tile-content>
                <v-list-tile-title>
                  Create on: {{user.created_at}}
                </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          </v-list-group>
          <v-divider></v-divider>
          <router-link to="/" class="list__tile list__tile--link">
              <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">home</i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Dashboard
                </div>
              </div>
          </router-link>
          <router-link to="/manage" class="list__tile list__tile--link">
              <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">business</i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Manage company
                </div>
              </div>
          </router-link>
          <router-link to="/catshow" class="list__tile list__tile--link">
              <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">dialpad</i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  See category
                </div>
              </div>
          </router-link>

          <v-expansion-panel focusable>
            <v-expansion-panel-content>
              <div slot="header"><i class="fal fa-calendar-alt"></i>Calendar</div>
              <v-card>
                <v-card-text class="grey lighten-3">
                  <router-link to="/board" class="list__tile list__tile--link">
                      <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">history</i></div>
                      <div class="list__tile__content">
                        <div class="list__tile__title">
                          AGM
                        </div>
                      </div>
                  </router-link>
                  <router-link to="/committee" class="list__tile list__tile--link">
                      <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">history</i></div>
                      <div class="list__tile__content">
                        <div class="list__tile__title">
                          Committee Calendar
                        </div>
                      </div>
                  </router-link>
                  <router-link to="/sam" class="list__tile list__tile--link">
                      <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">history</i></div>
                      <div class="list__tile__content">
                        <div class="list__tile__title">
                          Special AGM
                        </div>
                      </div>
                  </router-link>
                  <router-link to="/event" class="list__tile list__tile--link">
                      <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">history</i></div>
                      <div class="list__tile__content">
                        <div class="list__tile__title">
                          Upcoming  events
                        </div>
                      </div>
                  </router-link>
                </v-card-text>
              </v-card>
            </v-expansion-panel-content>
          </v-expansion-panel>





          <router-link to="#" class="list__tile list__tile--link">
              <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">history</i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Document Categories
                </div>
              </div>
          </router-link>
          <router-link to="/manage" class="list__tile list__tile--link">
              <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">widgets</i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Manage company
                </div>
              </div>
          </router-link>
          <a href="http://eboard.dev/posts/create" class="list__tile list__tile--link">
              <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">info</i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Create Post
                </div>
              </div>
          </a>
          <a href="http://eboard.dev/eboard" class="list__tile list__tile--link">
              <div class="list__tile__action"><i class="fas fa-cloud"></i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Eboard
                </div>
              </div>
          </a>
         
          <v-expansion-panel focusable>
            <v-expansion-panel-content>
              <div slot="header"><i class="fal fa-calendar-alt"></i>Documents and category</div>
              <v-card>
                <v-card-text class="grey lighten-3">
                  <router-link to="/cat" class="list__tile list__tile--link">
                      <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">widgets</i></div>
                      <div class="list__tile__content">
                        <div class="list__tile__title">
                          Manage company
                        </div>
                      </div>
                  </router-link>
                  <a href="http://eboard.dev/home#/" class="list__tile list__tile--link">
                      <div class="list__tile__action"><i class="fas fa-cloud"></i></div>
                      <div class="list__tile__content">
                        <div class="list__tile__title">
                          Upload documents
                        </div>
                      </div>
                  </a>
                </v-card-text>
              </v-card>
            </v-expansion-panel-content>
          </v-expansion-panel>

          
        </template> 
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
        <span class="hidden-sm-and-down">Eboard Manage companies</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn icon>
        <v-icon>apps</v-icon>
      </v-btn>
    </v-toolbar> -->
    <!-- <mynew></mynew> -->
    <v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
          <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3>150</h3>

                    <p>New Orders</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounce Rate</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>{{users}}</h3>

                    <p>User Registrations</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>5</h3>

                    <p>Companies registered</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-building"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
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
            <div class="panel">
              <div class="panel-header">
                <h1>Comments</h1>
              </div><hr>
              <div class="panel-body" v-for="item in comments">
                <small>
                  <!-- <b v-for="username in userget" v-if="user.id === item.user_id">
                  {{username.name}} says</b> <br>  -->
                <p>{{item.comment}}</p><br>
                  on {{item.created_at}}
                </small><hr>
              </div>
            </div>

            <!-- <div id="bottom">
              <v-bottom-sheet v-model="sheet">
                <v-btn slot="activator" color="purple" dark>All</v-btn>
                <v-list>
                  <v-subheader>Comments</v-subheader>
                  <v-list-tile
                    v-for="tile in view"
                    :key="tile.Comment"
                    @click="sheet = false"
                  >
                  <v-list-tile-title>{{ tile.comment }}</v-list-tile-title>
                  <v-list-tile-title  v-for="user in userget" v-if="user.id === tile.user_id">{{ user.name }}</v-list-tile-title>
                  </v-list-tile>
                </v-list>
              </v-bottom-sheet>
            </div> -->
          </section>
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
    </v-btn> -->
  <!-- </v-app> -->
</div>
</transition>
</div>
</template>


<script>
import { vueTopprogress } from 'vue-top-progress'
export default {
  components: {
    vueTopprogress
  },
  props: ['user'],
  data() {
    const defaultForm = Object.freeze({
          comment: '',
        })
    return{
      drawer: null,
          view: {},
      form: Object.assign({}, defaultForm),
          rules: {
            // animal: [val => (val || '').length > 0 || 'This field is required'],
            name: [val => (val || '').length > 0 || 'This field is required']
          },
          snackbar: false,
          defaultForm,
          userget: {},
          users: {},
          comments: {},

          // sheet: false,
          // tiles: [
          //   { img: 'keep.png', title: 'Keep' },
          //   { img: 'inbox.png', title: 'Inbox' },
          //   { img: 'hangouts.png', title: 'Hangouts' },
          //   { img: 'messenger.png', title: 'Messenger' },
          //   { img: 'google.png', title: 'Google+' }
          // ]
    }
  },
  computed: {
      formIsValid () {
        return (
          this.form.comment
        )
      }
    },

  methods: {
      resetForm () {
        this.form = Object.assign({}, this.defaultForm)
        this.$refs.form.reset()
      },
    close() {
      this.$emit('closeRequest')
    },
    save() {
      axios.post('/comment', this.$data.form)
      .then((response) => {
        this.close()
            console.log(response);          
            this.comments.push(response.data)
            this.snackbar = true
            this.resetForm()
            // this.$emit('alertRequest')
      })
      .catch((error) => this.errors = error.response.data.errors)
    }
  },
  created() {
    axios.post('/getcomm')
    .then((response) => this.comments = response.data)
      .catch((error) => this.errors = error.response.data.errors)

    axios.post('/getview')
    .then((response) => this.view = response.data)
      .catch((error) => this.errors = error.response.data.errors)
  },
  mounted() {
    this.$refs.topProgress.start()

       // Use setTimeout for demo
       setTimeout(() => {
         this.$refs.topProgress.done()
       }, 2000)

      axios.post('/getusersNo')
      .then((response) => this.users = response.data)
        .catch((error) => this.errors = error.response.data.errors)

    axios.post('/usersget')
    .then((response) => this.userget = response.data)
      .catch((error) => this.errors = error.response.data.errors)
  }
}
  </script>


<style>
  /*.container.fill-height {
      margin-top: -480px;
  }*/
  .fade-enter-active{
    transition: opacity 2s, transform 2s;
  }

  .fade-enter{
    opacity: 0;
    transform: translate(20px);
  }
</style>