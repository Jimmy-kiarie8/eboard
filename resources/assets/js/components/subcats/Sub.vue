<template>
  <div>
  <transition  name="fade">
  <div>
      <!-- <button type="button" class="btn pull-right" @click="openAdd">
        Add a subcategory
      </button> -->

    <v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
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
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Sub Categories</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped table-hover">
                      <thead>
                      <tr>
                        <th>Name</th>
                        <th>Create on</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <tr v-for="item, key in attachments" v-if="item.sub_cat === 0 || item.sub_cat === null">
                          <td>{{ item.name }}</td>
                          <td>{{ item.created_at }}</td>
                          <td>
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


    <subAdd @closeRequest="close" :openAddRequest="dispAdd" @alertRequest="snackbartrue"></subAdd>
    <subShow  @closeRequest="close" :openShowRequest="dispShow"></subShow>
    <subUpdate @closeRequest="close" :openRequest="dispUpdate" :passSub="subcategory" :passatt="attachments" @alertRequest="snackbartrue"></subUpdate>
</div>
</transition>
  <vue-topprogress ref="topProgress"></vue-topprogress>
</div>
</template>

<script>
import { vueTopprogress } from 'vue-top-progress'
let subAdd = require('./Addsub.vue')
let subShow = require('./showsub.vue')
let subUpdate = require('./Updatesub.vue')
export default{
  components: {
    subShow, subUpdate, subAdd, vueTopprogress
  },
	data() {
		return{
      color: 'blue',
      text: '',
      top: 'top',
      snackbar: false,
      mode: '',
      timeout: 2000,
      message: '',
      not: 'none',
      lists: {},
      subcategory: {},
      attachments: {},
      dispAdd: 'none',
      dispShow: 'none',
      dispUpdate: 'none',
      dispsub: 'none',
		}
	},
	methods: {
    openAdd() {
      this.dispAdd = 'block'
    },
    openShow(key){
      this.$children[2].list = this.attachments[key]
      this.dispShow = 'block'
    },
    openUpdate(key){
      this.$children[3].list = this.attachments[key]
      this.dispUpdate = 'block'
    },
    opensub(key){
      this.$children[4].list = this.attachments[key]
      this.dispsub = 'block'
    },
		close(item) {
			this.dispAdd = this.dispUpdate = this.dispShow = this.dispsub = 'none'
      // this.item.sub_cat = 0
		},
    snackbartrue() {
      this.snackbar = true;
      this.color = 'blue';
      this.text = 'successifully added';
    },
    del(key, id){
      if (confirm('Are you sure')) {
        axios.delete(`/cats/${id}`)
        .then((response) => {
          this.subcategory.splice(key, 1)
          this.snackbar = true
          console.log(response);
          this.text = 'deleted Success'
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

    axios.post('/subcat')
    .then((response) => this.subcategory = response.data)
      .catch((error) => this.errors = error.response.data.errors)

      axios.post('/getattach')
      .then((response) => this.attachments = response.data)
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
.fade-enter-active{
  transition: opacity 1s, transform 1s;
}
.fade-enter{
  opacity: 0;
  transform: translate(20px);
}
</style>
