<template>
<div id="id01" class="w3-modal"  :style="{display: openAddRequest}">
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
              v-model="form.name"
              :rules="rules.name"
            ></v-text-field>
          </v-flex>
          <small class="has-text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
          <v-flex xs12 sm6>
            <v-text-field
              color="blue darken-1"
              label="Parent company"
              v-model="form.parent_company"
              required
              :rules="rules.name"
            ></v-text-field>
          </v-flex>
          <small class="has-text-danger" v-if="errors.parent_company">{{ errors.parent_company[0] }}</small>
          <v-flex xs12 sm6>
            <v-text-field
              color="blue darken-3"
              label="Website"
              v-model="form.website"
              required
              :rules="rules.name"
            ></v-text-field>
          </v-flex>
          <small class="has-text-danger" v-if="errors.website">{{ errors.website[0] }}</small>
          <v-flex xs12 sm6>
            <v-text-field
              color="orange"
              label="Maximum Users"
              hint="Be honest"
              min="1"
              max="100"
              thumb-label
              v-model="form.maxUsers"
              :rules="rules.maxUsers"
              required
            ></v-text-field>
          </v-flex>
          <small class="has-text-danger" v-if="errors.maxUsers">{{ errors.maxUsers[0] }}</small>
          <v-flex xs12>
            <v-text-field
              color="teal"
              multi-line
              v-model="form.description"
            >
              <div slot="label">
                Description <small>(optional)</small>
              </div>
            </v-text-field>
          </v-flex>
          <small class="has-text-danger" v-if="errors.description">{{ errors.description[0] }}</small>
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
          @click="save"
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
    props:['openAddRequest'],
	data() {
		const defaultForm = Object.freeze({
        name: '',
        parent_company: '',
        description: '',
        maxUsers: '',
        website: ''
      })

		return{
      list: {},
      errors: {},
      manage: {},
			disp: 'none',
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
	        this.form = Object.assign({}, this.defaultForm)
	        this.$refs.form.reset()
	        this.close()
	      },
		close() {
			this.$emit('closeRequest')
		},
		save() {
			axios.post('/manage', this.$data.form)
			.then((response) => {
				this.close()
		        console.log(response);    			
		        this.$parent.manage.push(response.data)  
		        // this.list = {}
        this.$emit('alertRequest')
			})
      		.catch((error) => this.errors = error.response.data.errors)
		}
	},
	computed: {
      formIsValid () {
        return (
          this.form.name &&
          this.form.parent_company &&
          this.form.maxUsers &&
          this.form.website
        )
      }
    },
}
</script>


<style>
.input-group__details:before {
    height: 2px !important;
    z-index: 0 !important;
    background: #ddbdff !important;
}
</style>