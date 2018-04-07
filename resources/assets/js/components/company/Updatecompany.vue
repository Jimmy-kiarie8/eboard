<template>
<div id="id01" class="w3-modal"  :style="{display: openRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 50%; margin: auto">
      <header class="w3-container w3-white"> 
        <span  class="w3-button w3-display-topright" @click="close">&times;</span>
        <h2>Update {{list.name}}</h2><hr>
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
                label="Email"
                v-model="list.email"
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
                color="blue darken-3"
                label="Logo"
                v-model="list.logo"
                required
                :rules="rules.name"
              ></v-text-field>
            </v-flex>
            <v-flex xs12 sm6>
              <v-text-field
                color="orange"
                label="Telephone number"
                hint="Be honest"
                min="1"
                max="100"
                thumb-label
                v-model="list.tel_no"
                :rules="rules.name"
                required
              ></v-text-field>
            </v-flex>
            <v-flex xs12 sm6>
              <v-text-field
                color="orange"
                label="Color"
                hint="Be honest"
                thumb-label
                v-model="list.color"
                :rules="rules.name"
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
              >Update</v-btn>
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
          logo: '',
          color: '',
          email: '',
          description: '',
          tel_no: '',
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
			axios.patch(`/company/${this.list.id}`, this.$data.list)
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
          this.list.email &&
          this.list.tel_no &&
          this.list.logo &&
          this.list.color &&
          this.list.website
        )
      }
    },
}
</script>
<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus cumque, doloremque incidunt. Illo, adipisci, molestias ipsam nam quibusdam, commodi laborum sint cum nisi odit laboriosam. Iusto consectetur vel tempora qui. -->