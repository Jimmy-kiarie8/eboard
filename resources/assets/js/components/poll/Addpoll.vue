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
              label="Title"
              required
              v-model="form.title"
              :rules="rules.name"
            ></v-text-field>
          </v-flex>
          <!-- <small class="has-text-danger" v-if="errors.name">{{ errors.name[0] }}</small> -->
          <v-flex xs12>
            <v-text-field
              color="teal"
              multi-line
              v-model="form.question"
            >
              <div slot="label">
                Question
              </div>
            </v-text-field>
          </v-flex>
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
        >Submit</v-btn>
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
        title: '',
        question: '',
      })

		return{
      list: {},
      errors: {},
      poll: {},
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
			axios.post('/poll', this.$data.form)
			.then((response) => {
				this.close()
		        console.log(response);    			
		        this.$parent.poll.push(response.data)  
		        // this.list = {}
			})
      		.catch((error) => this.errors = error.response.data.errors)
		}
	},
	computed: {
      formIsValid () {
        return (
          this.form.title &&
          this.form.question 
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