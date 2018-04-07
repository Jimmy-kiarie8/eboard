<template>
  <div>
  <vue-topprogress ref="topProgress"></vue-topprogress>
  <transition  name="fade">
  <v-app id="inspire">
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
              <div class="list__tile__action"><i class="fa fa-plus-circle"></i></i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Create Post
                </div>
              </div>
          </a>
          <a href="http://eboard.dev/eboard" class="list__tile list__tile--link">
              <div class="list__tile__action"><i class="fa fa-cloud"></i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Eboard
                </div>
              </div>
          </a>

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
          <!-- <v-tooltip right>
            <v-btn
              icon
              large
              :href="source"
              target="_blank"
              slot="activator"
            >
              <v-icon large>code</v-icon>
            </v-btn>
            <span>Source</span>
          </v-tooltip>
          <v-tooltip right>
            <v-btn icon large href="https://codepen.io/johnjleider/pen/EQOYVV" target="_blank" slot="activator">
              <v-icon large>mdi-codepen</v-icon>
            </v-btn>
            <span>Codepen</span>
          </v-tooltip> -->
          <v-expansion-panel focusable>
            <v-expansion-panel-content v-for="(item,key) in posts" :key="item.id">
              <div slot="header">{{ item.title }}
                <div v-for="uitem in users" v-if="uitem.id === item.user_id">Posted by {{ uitem.name }} <br>
                  Posted on {{ item.created_at }}
                </div>
              </div>
              <v-card>
                <v-card-text class="grey lighten-3" v-html="item.body"></v-card-text>
              </v-card>
            </v-expansion-panel-content>
          </v-expansion-panel>
        </v-layout>
      </v-container>
    </v-content>
    
    <v-dialog v-model="dialog" width="800px">
      <v-card>
        <v-card-title
          class="grey lighten-4 py-4 title"
        >
          Create contact
        </v-card-title>
        <v-container grid-list-sm class="pa-4">
          <v-layout row wrap>
            <v-flex xs12 align-center justify-space-between>
              <v-layout align-center>
                <v-avatar size="40px" class="mr-3">
                  <img
                    src="//ssl.gstatic.com/s2/oz/images/sge/grey_silhouette.png"
                    alt=""
                  >
                </v-avatar>
                <v-text-field
                  placeholder="Name"
                ></v-text-field>
              </v-layout>
            </v-flex>
            <v-flex xs6>
              <v-text-field
                prepend-icon="business"
                placeholder="Company"
              ></v-text-field>
            </v-flex>
            <v-flex xs6>
              <v-text-field
                placeholder="Job title"
              ></v-text-field>
            </v-flex>
            <v-flex xs12>
              <v-text-field
                prepend-icon="mail"
                placeholder="Email"
              ></v-text-field>
            </v-flex>
            <v-flex xs12>
              <v-text-field
                type="tel"
                prepend-icon="phone"
                placeholder="(000) 000 - 0000"
                mask="phone"
              ></v-text-field>
            </v-flex>
            <v-flex xs12>
              <v-text-field
                prepend-icon="notes"
                placeholder="Notes"
              ></v-text-field>
            </v-flex>
          </v-layout>
        </v-container>
        <v-card-actions>
          <v-btn flat color="primary">More</v-btn>
          <v-spacer></v-spacer>
          <v-btn flat color="primary" @click="dialog = false">Cancel</v-btn>
          <v-btn flat @click="dialog = false">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-app>
</transition>
</div>
</template>

<script>
import { vueTopprogress } from 'vue-top-progress'
  export default {
    components: {
      vueTopprogress
      // , mynew
    },
    data: () => ({
      posts: {},
      users: {},
      dialog: false,
      drawer: null,
      /*items: [
        { icon: 'contacts', text: 'Contacts' },
        { icon: 'history', text: 'Frequently contacted' },
        { icon: 'content_copy', text: 'Duplicates' },
        {
          icon: 'keyboard_arrow_up',
          'icon-alt': 'keyboard_arrow_down',
          text: 'Labels',
          model: true,
          children: [
            { icon: 'add', text: 'Create label' }
          ]
        },
        {
          icon: 'keyboard_arrow_up',
          'icon-alt': 'keyboard_arrow_down',
          text: 'More',
          model: false,
          children: [
            { text: 'Import' },
            { text: 'Export' },
            { text: 'Print' },
            { text: 'Undo changes' },
            { text: 'Other contacts' }
          ]
        },
        { icon: 'settings', text: 'Settings' },
        { icon: 'chat_bubble', text: 'Send feedback' },
        { icon: 'help', text: 'Help' },
        { icon: 'phonelink', text: 'App downloads' },
        { icon: 'keyboard', text: 'Go to the old version' }
      ]*/
    }),
    props: ['auth'],
    mounted() {
      this.$refs.topProgress.start()

       // Use setTimeout for demo
       setTimeout(() => {
         this.$refs.topProgress.done()
       }, 2000)

      axios.post('/getPosts')
      .then((response) => this.posts = response.data)
      .catch((error) => this.errors = error.response.data.errors)

      axios.post('/getusers')
      .then((response) => this.users = response.data)
      .catch((error) => this.errors = error.response.data.errors)
    }
  }
</script>

<style>
  .fade-enter-active{
    transition: opacity 1s, transform 1s;
  }

  .fade-enter{
    opacity: 0;
    transform: translate(20px);
  }
</style>