<template>
  <v-app id="inspire">
    <v-navigation-drawer
      fixed
      :color="color"
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
                  Welcome {{user.name}}
                </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
            

            <!-- <v-list-tile slot="activator">
              <v-list-tile-content>
              <v-subheader>{{user.name}}</v-subheader>
                <v-expansion-panel popout>
                  <v-expansion-panel-content>
                    <v-layout align-center row spacer slot="header">
                      <v-flex xs4 sm2 md1>
                        <v-avatar>
                          <img :src="user.profile" alt="John">
                        </v-avatar>
                      </v-flex>
                    </v-layout>
                    <v-card>
                       <v-divider></v-divider> 
                      <v-card-text v-text="lorem"></v-card-text> 
                    </v-card>
                  </v-expansion-panel-content>
                </v-expansion-panel>
                <v-avatar>
                  <img :src="user.profile" alt="John">
                </v-avatar>
                </v-list-tile-content>
              </v-list-tile> -->


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
          <router-link to="/company" class="list__tile list__tile--link">
              <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">dialpad</i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Company
                </div>
              </div>
          </router-link>
          <!-- <router-link to="/manage" class="list__tile list__tile--link">
              <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">business</i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Manage company
                </div>
              </div>
          </router-link> -->
          <router-link to="/category" class="list__tile list__tile--link">
              <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">dialpad</i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  See category
                </div>
              </div>
          </router-link>

          <!-- calendar -->
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
          <!-- calendar -->

          <!-- <router-link to="/survey" class="list__tile list__tile--link">
              <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">history</i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Survey
                </div>
              </div>
          </router-link> -->
          <router-link to="/nse" class="list__tile list__tile--link">
              <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">widgets</i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  NSE
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
          <a href="http://eboard.dev/posts" class="list__tile list__tile--link">
              <div class="list__tile__action"><i aria-hidden="true" class="icon material-icons">info</i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Blog Posts
                </div>
              </div>
          </a>
          <a href="http://eboard.dev/users" class="list__tile list__tile--link">
              <div class="list__tile__action"><i class="fa fa-cloud"></i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Users
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

          <a href="http://eboard.dev/profiles" class="list__tile list__tile--link">
              <div class="list__tile__action"><i class="fa fa-user"></i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  My profile
                </div>
              </div>
          </a>

          <a href="http://eboard.dev/home" class="list__tile list__tile--link">
              <div class="list__tile__action"><i class="fa fa-user"></i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Upload documents
                </div>
              </div>
          </a>

          <a href="http://eboard.dev/docs" class="list__tile list__tile--link">
              <div class="list__tile__action"><i class="fa fa-user"></i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  See documents
                </div>
              </div>
          </a>

          <a href="http://eboard.dev/survey" class="list__tile list__tile--link">
              <div class="list__tile__action"><i class="fa fa-user"></i></div>
              <div class="list__tile__content">
                <div class="list__tile__title">
                  Do a survey
                </div>
              </div>
          </a>

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
        </template> 
      </v-list>
    </v-navigation-drawer>
    <v-toolbar
      :color="color"
      dark
      app
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      fixed
    >
      <v-toolbar-title style="width: 300px" class="ml-0 pl-3">
        <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
        <a href="/" class="link" style="color: #fff;"><span class="hidden-sm-and-down">Eboard Manage</span></a>
        <img style="width: 60px; height: 60px; border-radius: 50%;" :src="logo" alt="">
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-avatar>
        <img :src="user.profile">
      </v-avatar>
      <v-btn slot="activator">
        <v-icon>apps</v-icon>
      </v-btn>
      
      <!-- <v-menu offset-y>
      <v-btn icon>
        <v-icon slot="activator">apps</v-icon>
      </v-btn>
        <v-list>
          <v-list-tile @click="">
            <v-list-tile-title>click</v-list-tile-title>
            <v-list-tile-title>click</v-list-tile-title>
            <v-list-tile-title>click</v-list-tile-title>
            <v-list-tile-title>click</v-list-tile-title>
          </v-list-tile>
        </v-list>
      </v-menu> -->


      <v-menu
            offset-x
            :close-on-content-click="false"
            :nudge-width="200"
            v-model="menu"
          >
            <v-btn color="indigo" dark slot="activator">Change color</v-btn>
            <v-card>
              <v-list>
                <v-list-tile avatar  v-for="item in items" :key="item.color">
                  <v-list-tile-avatar>
                    <v-avatar :class="item.color">
                      <!-- <span class="white--text headline"> {{item.text}} </span>  -->
                    </v-avatar>
                  </v-list-tile-avatar>
                  <v-list-tile-content>
                    <v-list-tile-title><span class="white--text headline"> {{item.text}} </span></v-list-tile-title>
                    <v-radio-group v-model="color" row>
                      <v-radio
                          :value="item.color"
                          :color="color">
                      </v-radio>
                    </v-radio-group>
                    <!-- <input type="radio" > -->
                  </v-list-tile-content>
                </v-list-tile>
              </v-list>
              <v-divider></v-divider>
            </v-card>
          </v-menu>
    </v-toolbar>
  </v-app>
</template>

<script>
  export default {
    props: ['user'],
    data: () => ({
      color: 'purple',
      menu: false,
      logo: {},
      items: [
          { color: 'red', text: 'Red' },
          { color: 'green', text: 'Green' },
          { color: 'grey', text: 'grey' },
          { color: 'orange', text: 'Orange' },
          { color: 'purple', text: 'purple' },
          { color: 'blue', text: 'blue' },
          { color: 'indigo', text: 'indigo' },
          { color: 'pink', text: 'pink' },
          { color: 'cyan', text: 'cyan' },
          { color: '#f44336', text: '' },
        ],
      dialog: false,
      changeColor: 'item.color',
      drawer: null,
    }),
    props: ['user'],
    mounted() {
      axios.post('/getusers')
      .then((response) => this.users = response.data)
      .catch((error) => this.errors = error.response.data.errors)

      axios.post('/getlogo')
      .then((response) => this.logo = response.data)
      .catch((error) => this.errors = error.response.data.errors)
    }
  }
</script>


<style scoped>
.list__tile .avatar {
    min-width: 10px !important;
}  
  /*element.style {
    height: 10px !important;
  max-width: 10px !important;
}*/
.headline {
    font-size: 14px !important;
}


.menuable__content__active {
    z-index: 1000;
    background: #f44336 !important;
  }
</style>