<template>
<div id="id01" class="w3-modal"  :style="{display: openRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 50%; margin: auto">
      <header class="w3-container w3-white"> 
        <span  class="w3-button w3-display-topright" @click="close">&times;</span>
        <h2>Add company</h2><hr>
      </header>
      <div class="w3-container">
        <v-card flat>
    <v-snackbar
      v-model="snackbar"
      absolute
      top
      right
      color="success"
    >
      <span>Registration successful!</span>
      <v-icon dark>check_circle</v-icon>
    </v-snackbar>
    <v-form @submit.prevent ref="form">
      <v-container grid-list-xl fluid>
        <v-layout wrap>
          <v-flex xs12 sm6>
            <v-text-field
              color="purple darken-2"
              label="Name"
              required
              v-model="list.name"
              :rules="rules.name"
            ></v-text-field>
          </v-flex>
          <v-flex xs12 sm6>
            <v-text-field
              color="blue darken-1"
              label="Parent company"
              v-model="list.parent_company"
              required
              :rules="rules.name"
            ></v-text-field>
          </v-flex>
          <v-flex xs12 sm6>
            <v-text-field
              color="blue darken-3"
              label="Website"
              v-model="list.website"
              required
              :rules="rules.name"
            ></v-text-field>
          </v-flex>
          <v-flex xs12 sm6>
            <v-text-field
              color="orange"
              label="Maximum Users"
              hint="Be honest"
              min="1"
              max="100"
              thumb-label
              v-model="list.maxUsers"
              :rules="rules.maxUsers"
              required
            ></v-text-field>
          </v-flex>
          <v-flex xs12>
            <v-text-field
              color="teal"
              multi-line
              v-model="list.description"
            >
              <div slot="label">
                Description <small>(optional)</small>
              </div>
            </v-text-field>
          </v-flex>
          <!-- <v-flex xs12 sm6>
            <v-slider
              color="orange"
              label="Maximum Users"
              hint="Be honest"
              min="1"
              max="100"
              thumb-label
              v-model="form.maxUsers"
              :rules="rules.maxUsers"
            ></v-slider>
          </v-flex> -->
        </v-layout>
      </v-container>
      <v-card-actions>
        <v-btn flat @click="resetForm">Cancel</v-btn>
        <v-spacer></v-spacer>
        <v-btn
          flat
          color="primary"
          type="submit"
          @click="update"
          :disabled="!formIsValid"
        >Register</v-btn>
      </v-card-actions>
    </v-form>
  </v-card>
      </div>
      <!-- <footer class="w3-container w3-cyan">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" @click="close">Close</button>
        <button type="button" class="btn btn-outline">Save</button>
      </footer> -->
    </div>
  </div>
</template>

<script>
export default {
    props:['openRequest'],
	data() {
		const defaultForm = Object.freeze({
	        name: '',
	        parent_company: '',
	        description: '',
	        maxUsers: '',
	        website: ''
	    })

		return{
      		manage: {},
			list: {},
			disp: 'none',
			valid: false,
		    
    		form: Object.assign({}, defaultForm),
            rules: {
            	age: [
    	           val => val < 5 || `I don't believe you!`
    	        ],
              name: [val => (val || '').length > 0 || 'This field is required']
            },
            snackbar: false,
            defaultForm
	    	}
	},
	methods: {
		resetForm () {
	        this.list = Object.assign({}, this.defaultForm)
	        this.$refs.list.reset()
	        this.close()
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
		update() {
			axios.patch(`/manage/${this.list.id}`, this.$data.list)
			.then((response) => {
				this.close()
		        console.log(response);    			
          this.$emit('alertRequest')
		        // this.$parent.manage.push(response.data)
			})
      .catch((error) => this.errors = error.response.data.errors)
		}
	},
	computed: {
      formIsValid () {
        return (
          this.list.name &&
          this.list.parent_company &&
          this.list.maxUsers &&
          this.list.website
        )
      }
    },
}
</script>