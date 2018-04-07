<template>

<div id="id01" class="w3-modal"  :style="{display: openAddRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 50%; margin: auto">
      <header class="w3-container w3-white"> 
        <span  class="w3-button w3-display-topright" @click="close">&times;</span>
        <h2>Categories</h2><hr>
      </header>
      <div class="w3-container">
      <v-card flat>
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
        <v-form v-model="valid">
		    <v-text-field
		      label="Title"
		      v-model="list.name"
		      :rules="nameRules"
		      required
		    ></v-text-field>
          	<small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
		    <v-flex xs12>
		       <v-text-field box multi-line label="Description" v-model="list.description"></v-text-field>
		    </v-flex>
          	<small class="text-danger" v-if="errors.description">{{ errors.description[0] }}</small>
		    <v-container fluid>

		    <v-layout row wrap class="light--text">
      			<v-flex xs6>
				    <v-checkbox :label="`Shareholders`" v-model="list.shareholders"></v-checkbox>
				</v-flex>
      			<v-flex xs6>
				    <v-checkbox :label="`Directors`" v-model="list.directors"></v-checkbox>
				</v-flex>
      			<v-flex xs6>
				    <v-checkbox :label="`Managers`" v-model="list.managers"></v-checkbox>
				</v-flex>
      			<v-flex xs6>
				    <v-checkbox :label="`Employees`" v-model="list.employees"></v-checkbox>
				</v-flex>
			</v-layout>
			
		  	</v-container>
		  	<v-card-actions>
	  	        <v-btn flat @click="close">Cancel</v-btn>
	  	        <v-spacer></v-spacer>
	  	        <v-btn
	  	          flat
	  	          color="primary"
	  	          type="submit"
	  	          @click="save"
	  	          :disabled="!formIsValid"
	  	        >Register</v-btn>
		  	</v-card-actions>
		</v-form>
	</v-card>
      </div>
      <footer class="w3-container w3-white">
        <!-- <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" @click="close">Close</button> -->
        <!-- <button type="button" class="btn btn-outline" @click="save">Save</button> -->
      </footer>
    </div>
  </div>
</template>

<script>
export default {
    props:['openAddRequest', 'openAlert'],
	data() {
		const defaultForm = Object.freeze({
	        name: '',
			description: '',
		})
		return{
			color: 'blue',
			text: '',
			top: 'top',
			snackbar: false,
            mode: '',
            timeout: 2000,
			list: Object.assign({}, defaultForm),
      		category: {},
      		errors: {},
			list: {
				shareholders: false,
				directors: false,
				managers: false,
				employees: false,
    		},
			disp: 'none',
			valid: false,
		    nameRules: [
		        v => !!v || 'Name is required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		}
	},
	methods: {
		resetForm () {
			this.list = Object.assign({}, this.defaultForm)
			this.$refs.form.reset()
		},
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
			axios.post('/categories', this.$data.list)
			.then((response) => {
				// this.$emit('alertRequest')
		        // this.list = {}

		        // this.resetForm()
		        // console.log(response);
				this.close()    			
		        this.$parent.category.push(response.data)  
		        // this.$emit('alertRequest')
			})
      		.catch((error) => this.errors = error.response.data.errors)
		}
	},
	computed: {
		formIsValid () {
		return (
		  this.list.name &&
		  this.list.description 
		)
		}
	}
}
</script>