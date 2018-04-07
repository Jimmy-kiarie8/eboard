<template>
<div id="id01" class="w3-modal"  :style="{display: openRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 50%; margin: auto">
      <header class="w3-container w3-white"> 
        <span  class="w3-button w3-display-topright" @click="close">&times;</span>
        <h2>Modal Header</h2>
      </header>
      <div class="w3-container">
        <v-form @submit.prevent v-model="valid">
        	<v-container fluid>
        		<v-checkbox 
        		:label="list.name" 
        		:value="list.id" 
        		v-model="form.cat_id"
        		:rules="[v => !!v || 'You must check this box to continue!']"
        		></v-checkbox>
        	    <!--<v-layout row wrap>
        	       <v-flex xs6>
        	        <v-subheader>Prepended icon</v-subheader>
        	      </v-flex> 
        	      <v-flex xs6>
        	        <v-select
        	          :items="list.name"
        	          v-model="form.cat_id"
        	          :value="list.id"
        	          label="Select"
        	          single-line
        	          auto
        	          prepend-icon="map"
        	          hide-details
        	        ></v-select>
        	      </v-flex>
        	       <v-flex xs6>
        	        <v-subheader>Appended icon</v-subheader>
        	      </v-flex>
        	      <v-flex xs6>
        	        <v-select
        	          :items="states"
        	          v-model="e2"
        	          label="Select"
        	          single-line
        	          auto
        	          append-icon="map"
        	          hide-details
        	        ></v-select>
        	      </v-flex>
        	    </v-layout> -->
        	  </v-container>
			<!-- <select v-model="form.cat_id" style="border:2px solid #000;">
				<option :value="list.id" selected>{{list.name}}</option>
			</select> -->
		    <v-text-field
		      label="Title"
		      v-model="form.title"
		      :rules="titleRules"
		      required
		    ></v-text-field>
          	<small class="text-danger" v-if="errors.title">{{ errors.title[0] }}</small>
		    <v-flex xs12>
		       <v-text-field box multi-line label="Description" v-model="form.description"></v-text-field>
		    </v-flex>
          	<small class="text-danger" v-if="errors.description">{{ errors.description[0] }}</small>

			<v-container>
			    <v-layout row wrap>
			      <v-flex xs12 lg5 mb-3>
			        <v-expansion-panel popout>
			          <v-expansion-panel-content>
			            <div slot="header">Choose who can access this category</div>
			            <v-card v-for="(item,key) in users" :key="item.id">
			              <v-card-text>
				    	    <v-checkbox :label="item.name" :value="item.id" v-model="form.users_id"></v-checkbox>
			              </v-card-text>
			            </v-card>
			          </v-expansion-panel-content>
			        </v-expansion-panel>
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
	  	        >Add</v-btn>
		  	</v-card-actions>
		</v-form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props:['openRequest', 'openAlert'],
	data() {
		const defaultForm = Object.freeze({
	        title: '',
			description: '',
			cat_id: '',
			users_id: []
		})
		return{
      category: {},
			list: {},
			users: {},
			errors: {},
			disp: 'none',
			valid: false,
			form: Object.assign({}, defaultForm),
		    titleRules: [
		        v => !!v || 'title is required',
		        // v => v.length <= 50 || 'title must be less than 50 characters'
		    ],
		    numberRules: [
		        v => !!v || 'Number is required',
		        // v => v.length <= 50 || 'title must be less than 50 characters'
		    ],
		}
	},
	methods: {
		resetForm () {
			this.form = Object.assign({}, this.defaultForm)
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
			axios.post(`/docs`, this.$data.form)
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
		  this.form.title &&
		  this.form.description 
		)
		}
	},
	mounted() {
		axios.post('/getusers')
		.then((response) => this.users = response.data)
	  	.catch((error) => this.errors = error.response.data.errors)
	}
}
</script>

<style>
.card{
	height: 50px !important;
}
</style>