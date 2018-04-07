<template>
  <div>
  <transition  name="fade">
  <div>
    <!-- <v-btn small @click="openAdd">Add a category</v-btn> -->
      <button type="button" class="btn pull-right" @click="openAdd">
        Add a category
      </button>
  
    <!-- <mynew></mynew> -->
    <v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
<!--   <div class="bg-success" :style="{display: not}" style="width: 50%; margin: auto;">
    <p class="text-center">Success <span class="pull-right" @click="alert" style="cursor: pointer">&times;</span></p>
  </div> -->
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

  <div id="id01" class="w3-modal" :style="{display: not}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 50%; margin: auto">
      <header class="w3-container w3-cyan"> 
        <span @click="alert" 
        class="w3-button w3-display-topright">&times;</span>
      </header>
      <div class="w3-container text-center">
        <p>{{message}}</p>
      </div>
    </div>
  </div>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
   <!-- <ol class="breadcrumb">
       <li><router-link to="/" class="btn">Dashboard</router-link></li> -->
      <!-- <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li> 
    </ol>-->
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Categories</h3>
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
                <tr v-for="item, key in category">
                  <td>{{ item.name }}</td>
                  <td>{{ item.created_at }}</td>
                  <td>
                    <i class="fa fa-trash" aria-hidden="true" @click="del(key, item.id)" title="delete"></i>
                    <i class="fa fa-edit" aria-hidden="true" @click="openUpdate(key)" title="edit"></i>
                    <i class="fa fa-eye" aria-hidden="true" @click="openShow(key)" title="details"></i>
                    <i class="fa fa-plus" aria-hidden="true" @click="opensub(key)" title="details"></i>
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
  <carAdd @closeRequest="close" :openAddRequest="dispAdd" :openAlert="not" @alertRequest="snackbartrue"></carAdd>
  <carShow  @closeRequest="close" :openShowRequest="dispShow"></carShow>
  <carUpdate @closeRequest="close" :openRequest="dispUpdate" :openAlert="not" @alertRequest="snackbartrue"></carUpdate>
  <subcat @closeRequest="close" :openRequest="dispsub" :openAlert="not" @alertRequest="snackbartrue"></subcat>


</div>
</transition>
  <vue-topprogress ref="topProgress"></vue-topprogress>
</div>
</template>

<script>
import { vueTopprogress } from 'vue-top-progress'
let carAdd = require('./Addcategory.vue')
let carShow = require('./showcategory.vue')
let carUpdate = require('./Updatecategory.vue')
let subcat = require('./Subcat.vue')
export default{
  components: {
    carShow, carUpdate, carAdd, subcat, vueTopprogress
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
      category: {},
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
      this.$children[2].list = this.category[key]
      this.dispShow = 'block'
    },
    openUpdate(key){
      this.$children[3].list = this.category[key]
      this.dispUpdate = 'block'
    },
    opensub(key){
      this.$children[4].list = this.category[key]
      this.dispsub = 'block'
    },
		close() {
			this.dispAdd = this.dispUpdate = this.dispShow = this.dispsub = 'none'
		},
    alerttime() {
      setTimeout(this.alert, 1000)
    },
    snackbartrue() {
      this.snackbar = true;
      this.color = 'blue';
      this.text = 'successifully added';
    },
    alertupdate() {
      this.not = 'block'
      this.message = 'update success'
      this.alerttime()
    },
    alert() {
      this.not = 'none'
      
    },
    del(key, id){
      if (confirm('Are you sure')) {
        axios.delete(`/cats/${id}`)
        .then((response) => {
          this.category.splice(key, 1)
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

    axios.post('/getCategory')
    .then((response) => this.category = response.data)
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
