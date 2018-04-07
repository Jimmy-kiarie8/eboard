<template>
  <div>
  <transition  name="fade">
  <div>
  <v-snackbar
       :top= 'top'
       :timeout="timeout"
       :color="color"
       :multi-line="mode === 'multi-line'"
       :vertical="mode === 'vertical'"
       v-model="snackbar"
    >
    {{ text }}
    <v-btn dark flat @click.native="snackbar = false">Close</v-btn>
  </v-snackbar>
    <!-- <mynew></mynew> -->
    <v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Of all Polls</h3>
              <button type="button" class="btn pull-right" @click="openAdd">
                Add a Poll
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Question</th>
                  <th>Date created</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <tr v-for="item, key in poll">
                    <td>{{ item.title }}</td>
                    <td>{{ item.question }}</td>
                    <td>{{ item.created_at }}</td>
                    <td style="width: 15%;">
                      <i class="fa fa-trash" aria-hidden="true" @click="del(key, item.id)" title="delete"></i>
                      <i class="fa fa-edit" aria-hidden="true" @click="openUpdate(key)" title="edit"></i>
                      <i class="fa fa-eye" aria-hidden="true" @click="openShow(key)" title="details"></i>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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

    <pollAdd @closeRequest="close" :openAddRequest="dispAdd" @alertRequest="snackbartrue"></pollAdd>
    <pollShow  @closeRequest="close" :openShowRequest="dispShow"></pollShow>
    <pollUpdate @closeRequest="close" :openRequest="dispUpdate" @alertRequest="snackbartrue"></pollUpdate>
  <!-- </v-app> -->
</div>
</transition>
  <vue-topprogress ref="topProgress"></vue-topprogress>
</div>
</template>


<script>
import { vueTopprogress } from 'vue-top-progress'
let pollAdd = require('./Addpoll.vue')
let pollShow = require('./showpoll.vue')
let pollUpdate = require('./Updatepoll.vue')
// let mynew = require('../Newhead.vue')
export default{
  props: ['user'],
  components: {
    pollShow, pollUpdate, pollAdd, vueTopprogress
    // , mynew
  },

  data() {
    return{
      color: 'blue',
      text: '',
      top: 'top',
      snackbar: false,
      mode: '',
      timeout: 2000,
      drawer: null,
      lists: {},
      temp: '',
      poll: {},
      dispAdd: 'none',
      dispShow: 'none',
      dispUpdate: 'none',
    }
  },
  methods: {
    snackbartrue() {
      this.snackbar = true;
      this.color = 'blue';
      this.text = 'successifully added';
    },
    openAdd() {
      this.dispAdd = 'block'
    },
    openShow(key){
      this.$children[3].list = this.poll[key]
      this.dispShow = 'block'
    },
    openUpdate(key){
      this.$children[4].list = this.poll[key]
      this.dispUpdate = 'block'
    },
    close() {
      this.dispAdd = this.dispUpdate = this.dispShow = 'none'
    },
    del(key, id){
      if (confirm('Are you sure')) {
        axios.delete(`/poll/${id}`)
        .then((response) => {
          this.poll.splice(key, 1)

          this.snackbar = true
          this.text = 'deleted Success'
          console.log(response);
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

    axios.post('/getpoll')
    .then((response) => this.poll = this.temp = response.data)
      .catch((error) => this.errors = error.response.data.errors)
  },
}
</script>

<style scoped>
input {
  background: #000 !important;
}
i{
  padding: 5px;
  cursor: pointer;
}
.fa{
  background: #f0f0f0;
  /*padding: 6px;*/
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
/*element.style {
    margin-top: 68px !important;
}*/
/*.navigation-drawer--fixed{
  margin-top: 200px !important;
}*/
.navigation-drawer--open{
  /*margin-top: 60px !important;*/
}
/*.container.fill-height {
    margin-top: -480px;
}*/

.fade-enter-active{
  transition: opacity 1s, transform 1s;
}
.fade-enter{
  opacity: 0;
  transform: translate(20px);
}
</style>
<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat omnis consequuntur, inventore, deleniti quas minima natus consectetur illum sit, possimus beatae eius quae voluptatibus animi aliquam magnam veniam tempora quia. -->