<template>
	  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Directors page <hr>
      </h1>
        <button type="button" class="btn btn-primary pull-right" @click="openAdd">
          Add a director
        </button>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>
    <!-- /.content -->

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
                  <th>Email</th>
                  <th>Create on</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <tr v-for="item, key in director">
                    <td>{{ item.name }}</td>
                    <td>{{ item.email }}</td>
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

   <!--    <div class="w3-container">
  <h2>W3.CSS  Modal</h2>
  <p>Zoom in the modal with the w3-animate-zoom class, or slide in the modal from a specific direction using the w3-animate-top, w3-animate-bottom, w3-animate-left or w3-animate-right class:</p>
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Open Animated Modal</button>

  
</div> -->
    </section>
    <dirAdd @closeRequest="close" :openAddRequest="dispAdd"></dirAdd>
    <dirShow  @closeRequest="close" :openShowRequest="dispShow"></dirShow>
    <dirUpdate @closeRequest="close" :openRequest="dispUpdate"></dirUpdate>


  </div>
</template>

<script>
let dirAdd = require('./Adddirector.vue')
let dirShow = require('./showdirector.vue')
let dirUpdate = require('./Updatedirector.vue')
export default{
  components: {
    dirShow, dirUpdate, dirAdd
  },
	data() {
		return{
      lists: {},
      director: {},
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
      this.$children[1].list = this.director[key]
      this.dispShow = 'block'
    },
    openUpdate(key){
      this.$children[2].list = this.director[key]
      this.dispUpdate = 'block'
    },
		close() {
			this.dispAdd = this.dispUpdate = this.dispShow = 'none'
		},
    del(key, id){
      if (confirm('Are you sure')) {
        axios.delete(`/director/${id}`)
        .then((response) => {
          this.director.splice(key, 1)
        })
        .catch((error) => this.errors = error.response.data.errors)
      }
    }
	},
  mounted() {
    axios.post('/getDirector')
    .then((response) => this.director = response.data)
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
</style>
