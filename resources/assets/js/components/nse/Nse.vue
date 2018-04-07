<template>
  <div>
  <transition  name="fade">
  <div>
  
    <v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Nairobi security exchange groups</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Group Name</th>
                  <th>Parent Group</th>
                  <th>Created on</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <tr v-for="item, key in nse">
                    <td>{{item.group_name}}</td>
                    <td>{{item.parent_group}}</td>
                    <td>{{item.created_at}}</td>
                    <td>
                      <i class="fa fa-trash" aria-hidden="true" @click="del(key, item.id)" title="delete"></i>
                      <i class="fa fa-edit" aria-hidden="true" @click="openUpdate(key)" title="edit"></i>
                      <i class="fa fa-eye" aria-hidden="true" @click="openShow(key)" title="details"></i>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </section>

        </v-layout>
      </v-container>
    </v-content>
    <div class="text-xs-center">
    <v-btn
    small
      fab
      bottom
      right
      color="indigo"
      dark
      fixed
      @click.stop="openAdd"
    >
      <v-icon>add</v-icon>
    </v-btn>
  </div>

      
  <nseAdd @closeRequest="close" :openAddRequest="dispAdd" :openSnackbar="snackbar" @snackbarRequest="snackbarOpen" :disBar="snackbar"></nseAdd>
  <nseShow  @closeRequest="close" :openShowRequest="dispShow"></nseShow>
  <nseUpdate @closeRequest="close" :openRequest="dispUpdate" :openSnackbar="snackbar" @snackbarRequest="snackbarupdate" :disBar="snackbar"></nseUpdate>
  <!-- </v-app> -->
</div>
</transition>
  <vue-topprogress ref="topProgress"></vue-topprogress>
</div>
</template>


<script>
import { vueTopprogress } from 'vue-top-progress'
let nseAdd = require('./Addnse.vue')
let nseShow = require('./shownse.vue')
let nseUpdate = require('./Updatense.vue')
export default{
  components: {
    nseShow, nseUpdate, nseAdd, vueTopprogress
  },
  props: ['user'],

  data() {
    return{
      drawer: null,
      snackbar: false,
      color: '',
      mode: '',
      timeout: 3000,
      message: 'Welcome',
      snackbar: 'none',
      lists: {},
      nse: {},
      dispAdd: 'none',
      dispShow: 'none',
      dispUpdate: 'none',
    }
  },
  methods: {
    openAdd() {
      this.dispAdd = 'block'
    },
    openShow(key){
      this.$children[3].list = this.nse[key]
      this.dispShow = 'block'
    },
    openUpdate(key){
      this.$children[4].list = this.nse[key]
      this.dispUpdate = 'block'
    },
    close() {
      this.dispAdd = this.dispUpdate = this.dispShow = 'none'
    },
    snackbarOpen() {
      this.snackbar = 'true'
      this.message = 'added success'
    },
    snackbarupdate() {
      this.snackbar = 'true'
      this.message = 'update success'
    },
    del(key, id){
      if (confirm('Are you sure')) {
        axios.delete(`/nse/${id}`)
        .then((response) => {
          this.nse.splice(key, 1)
          this.snackbar = 'true'
          this.message = 'deleted Success'
        })
        .catch((error) => this.errors = error.response.data.errors)
      }
    }
  },
  mounted() {
    this.$refs.topProgress.start()

       // Use setTimeout for demo
       setTimeout(() => {
         this.$refs.topProgress.done()
       }, 2000)

    axios.post('/getNse')
    .then((response) => this.nse = response.data)
      .catch((error) => this.errors = error.response.data.errors)
  }
}
</script>



<style scoped>
input {
  background: #000 !important;
}
.w3-modal-content {
    color: #17546d!important;
    background-color: rgba(77, 244, 243, 0.16)!important;
}
.w3-button {
    color: #000!important;
    background-color: rgba(22, 190, 214, 0.01)!important;
    /*border-radius: 50%;*/
    /*padding: 0px !important;*/
}
/*.w3-button:hover {
    color: #000!important;
    background-color: #ddbdff!important;
}*/
i{
  padding: 5px;
  cursor: pointer;
}
.fa{
  background: #ffb7ff;
  padding: 10px;
}
.fa:hover{
  background: #93d6c3;
}
.fa-eye{
  color: #0c6
}
.fa-trash{
  color: #f00
}

/*.container.fill-height {
    margin-top: -500px;
}*/
.application.theme--light {
    max-height: 600px;
}
  .fade-enter-active{
    transition: opacity 1s, transform 1s;
  }

  .fade-enter{
    opacity: 0;
    transform: translate(20px);
  }
</style>