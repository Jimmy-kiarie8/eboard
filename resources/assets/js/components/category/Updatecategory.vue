<template>
<div id="id01" class="w3-modal"  :style="{display: openRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 50%; margin: auto">
      <header class="w3-container w3-white"> 
        <span  class="w3-button w3-display-topright" @click="close">&times;</span>
        <h2>Modal Header</h2>
      </header>
      <div class="w3-container">
        <v-form v-model="valid">
		    <v-text-field
		      label="Title"
		      v-model="list.name"
		      :rules="nameRules"
		      required
		    ></v-text-field>
		    <v-flex xs12>
		       <v-text-field box multi-line label="Description" v-model="list.description"></v-text-field>
		    </v-flex>
    	  	<v-card-actions>
      	        <v-btn flat @click="close">Cancel</v-btn>
      	        <v-spacer></v-spacer>
      	        <v-btn
      	          flat
      	          color="primary"
      	          @click="update"
      	          :disabled="!formIsValid"
      	        >Register</v-btn>
    	  	</v-card-actions>
		</v-form>
      </div>
      <!-- <footer class="w3-container w3-white">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" @click="close">Close</button>
        <button type="button" class="btn btn-outline" @click="update">Update</button>
      </footer> -->
    </div>
  </div>
</template>

<script>
export default {
    props:['openRequest', 'openAlert'],
	data() {
		return{
      category: {},
			list: {},
			disp: 'none',
			valid: false,
		    nameRules: [
		        v => !!v || 'Name is required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		    numberRules: [
		        v => !!v || 'Number is required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		    emailRules: [
		        v => !!v || 'E-mail is required',
		        v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
		    ]
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
		update() {
			axios.patch(`/cats/${this.list.id}`, this.$data.list)
			.then((response) => {
				this.close()
		        console.log(response);    	
		        this.$emit('alertRequest')		
		        // this.$parent.category.push(response.data)
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