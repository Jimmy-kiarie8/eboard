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
              <h3 class="box-title">List Of all companies</h3>
              <button type="button" class="btn pull-right" @click="openAdd">
                Add a survey
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>description company</th>
                  <th>Date created</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <tr v-for="item, key in survey">
                    <td>{{ item.title }}</td>
                    <td>{{ item.description }}</td>
                    <td>{{ item.created_at }}</td>
                    <td style="width: 15%;">
                      <i class="fa fa-trash" aria-hidden="true" @click="del(key, item.id)" title="delete"></i>
                      <i class="fa fa-edit" aria-hidden="true" @click="openUpdate(key)" title="edit"></i>
                      <i class="fa fa-eye" aria-hidden="true" @click="openShow(key)" title="details"></i>
                      <i class="fa fa-cloud" aria-hidden="true" @click="openAnswer(key)" title="details"></i>
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

    <surveyAdd @closeRequest="close" :openAddRequest="dispAdd" @alertRequest="snackbartrue"></surveyAdd>
    <surveyShow  @closeRequest="close" :openShowRequest="dispShow" :username="user"></surveyShow>
    <surveyUpdate @closeRequest="close" :openRequest="dispUpdate" @alertRequest="snackbartrue"></surveyUpdate>
    <surveyans @closeRequest="close" :openRequest="dispans" @alertRequest="snackbartrue"></surveyans>
  <!-- </v-app> -->
</div>
</transition>
  <vue-topprogress ref="topProgress"></vue-topprogress>
</div>
</template>


<script>
import { vueTopprogress } from 'vue-top-progress'
let surveyAdd = require('./Addsurvey.vue')
let surveyShow = require('./Addque.vue')
let surveyUpdate = require('./Updatesurvey.vue')
let surveyans = require('./Answer.vue')
// let mynew = require('../Newhead.vue')
export default{
  props: ['user'],
  components: {
    surveyShow, surveyUpdate, surveyAdd,surveyans, vueTopprogress
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
      survey: {},
      dispAdd: 'none',
      dispShow: 'none',
      dispUpdate: 'none',
      dispans: 'none',
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
      this.$children[3].list = this.survey[key]
      this.dispShow = 'block'
    },
    openUpdate(key){
      this.$children[4].list = this.survey[key]
      this.dispUpdate = 'block'
    },
    openAnswer(key){
      this.$children[5].list = this.survey[key]
      this.dispans = 'block'
    },
    close() {
      this.dispAdd = this.dispUpdate = this.dispShow = this.dispans = 'none'
    },
    del(key, id){
      if (confirm('Are you sure')) {
        axios.delete(`/surveys/${id}`)
        .then((response) => {
          this.survey.splice(key, 1)

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
       }, 1500)

    axios.post('/getsurvey')
    .then((response) => this.survey = this.temp = response.data)
      .catch((error) => this.errors = error.response.data.errors)
  }
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