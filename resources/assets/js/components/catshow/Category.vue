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
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Date created</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <tr v-for="item, key in category" 
                  v-if="item.shareholders === 1 && user.credentials === 'shareholders' 
                  || item.directors === 1 && user.credentials === 'directors' 
                  || item.managers === 1 && user.credentials === 'managers'
                  || item.employees === 1 && user.credentials === 'employees'"
                  >
                    <td>{{ item.name }}</td>
                    <td>{{ item.description }}</td>
                    <td>{{ item.created_at }}</td>
                    <td style="width: 15%;">
                    <!-- <div>
                      <v-btn small color="primary" @click="openShow(key)"><i class="fa fa-eye" aria-hidden="true" title="details"></i></v-btn>
                    </div> -->
                    <!-- <i class="fa fa-eye bt n btn-default" aria-hidden="true" @click="openShow(key)" title="details"></i> -->
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
    <mycatShow  @closeRequest="close" :openShowRequest="catShow" :passCat="category" :passDocs="document"></mycatShow>
  <!-- </v-app> -->
</div>
</transition>
  <vue-topprogress ref="topProgress"></vue-topprogress>
</div>
</template>




<script>
import { vueTopprogress } from 'vue-top-progress'
let mycatShow = require('./catShow.vue')
export default{
  props: ['user'],
	components: {
		mycatShow, vueTopprogress
	},
	data() {
		return{

      drawer: null,
			category: {},
      document: {},
			users: {},
			catShow: 'none',
			// errors: {},
		}
	},
	mounted() {
    this.$refs.topProgress.start()

       // Use setTimeout for demo
       setTimeout(() => {
         this.$refs.topProgress.done()
       }, 2000)

		axios.post('/getCat')
		.then((response) => this.category = response.data)
		.catch((error) => this.errors = error.response.data.errors)

		axios.post('/getDocs')
		.then((response) => this.document = response.data)
		.catch((error) => this.errors = error.response.data.errors)

    axios.post('/getAllUsers')
    .then((response) => this.users = response.data)
    .catch((error) => this.errors = error.response.data.errors)
	},
	methods: {
		openShow(key){
	      this.$children[0].list = this.category[key]
	      this.catShow = 'block'
	    },
	    close() {
	      this.catShow = 'none'
	    },
	}
}
</script>

<style> 
/*.container.fill-height {
    margin-top: -500px;
}
.application.theme--light {
    max-height: 600px;
}*/
  .fade-enter-active{
    transition: opacity 2s, transform 2s;
  }

  .fade-enter{
    opacity: 0;
    transform: translate(20px);
  }
</style>