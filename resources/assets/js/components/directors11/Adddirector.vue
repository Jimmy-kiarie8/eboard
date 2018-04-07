<template>
<div class="modal modal-success fade in" id="modal-info" :style="{display: openAddRequest}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" @click="close">×</span></button>
        <h4 class="modal-title">Info Modal</h4>
      </div>
      <div class="modal-body">
        <v-form v-model="valid">
		    <v-text-field
		      label="Name"
		      v-model="list.name"
		      :rules="nameRules"
		      :counter="10"
		      required
		    ></v-text-field>
		    <v-text-field
		      label="E-mail"
		      v-model="list.email"
		      :rules="emailRules"
		      required
		    ></v-text-field>
		    <v-text-field
		      label="Director Number"
		      v-model="list.director_no"
		      :rules="numberRules"
		      required
		    ></v-text-field>
		</v-form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" @click="close">Close</button>
        <button type="button" class="btn btn-outline" @click="save">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</template>

<script>
export default {
    props:['openAddRequest'],
	data() {
		return{
      director: {},
			list: {
    			name: '',
    			email: '',
    			director_no: '',
    		},
			disp: 'none',
			valid: false,
		    nameRules: [
		        v => !!v || 'Name is required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		    emailRules: [
		        v => !!v || 'E-mail is required',
		        v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
		    ],
		    numberRules: [
		        v => !!v || 'Name is required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		}
	},
	methods: {
		// open() {
		// 	this.openRequest = 'block'
		// },
		/*open() {
			this.$emit('openRequest')
		},*/
		close() {
			this.$emit('closeRequest')
		},
		save() {
			axios.post('/director', this.$data.list)
			.then((response) => {
				this.close()
		        console.log(response);    			
		        this.$parent.director.push(response.data)  
		        this.list = {}
			})
      .catch((error) => this.errors = error.response.data.errors)
		}
	}
}
</script>