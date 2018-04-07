<template>
<div id="id01" class="w3-modal"  :style="{display: openRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 50%; margin: auto">
      <header class="w3-container w3-teal"> 
        <span  class="w3-button w3-display-topright" @click="close">&times;</span>
        <h2>Modal Header</h2>
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
          <span>Comment success!</span>
        </v-snackbar>
        <v-form @submit.prevent ref="form">
          <v-container grid-list-xl fluid>
            <v-layout wrap>
              <v-flex xs12>
                <v-text-field
                  color="teal"
                  multi-line
                  v-model="form.comment">
                  <div slot="label">
                    comment
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
              :disabled="!formIsValid"
               @click="save"
            >Comment</v-btn>
          </v-card-actions>
        </v-form>
      </v-card>
      </div>
<!--       <footer class="w3-container w3-teal">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" @click="close">Close</button>
        <button type="button" class="btn btn-outline" @click="update">Update</button>
      </footer> -->
    </div>
  </div>
</template>

<script>
export default {
    props:['openRequest'],
	data() {
		const defaultForm = Object.freeze({
          comment: '',
        })
		return{
			dispUpdate: 'none',
	          sharecomment: {},
	          // sharecommented: {},
	          posts: {
	            post: ''
	          }, 
	          // posted: {},
	          // postedpost: {},
	          commented: {},
	          form: Object.assign({}, defaultForm),
	          rules: {
	            // animal: [val => (val || '').length > 0 || 'This field is required'],
	            name: [val => (val || '').length > 0 || 'This field is required']
	          },
	          snackbar: false,
	          defaultForm,


      		shareholder: {},
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
	computed: {
      formIsValid () {
        return (
          this.form.comment
        )
      },
    },
	methods: {
		resetForm () {
	        this.form = Object.assign({}, this.defaultForm)
	        this.$refs.form.reset()
	      },
		close() {
			this.$emit('closeRequest')
		},
		save() {
	      axios.post(`/sharecomment`, this.$data.form)
	      .then((response) => {
	        this.close()
	            console.log(response);          
	            this.sharecomment.push(response.data)
	            this.snackbar = true
	            this.resetForm()
	      })
	      .catch((error) => this.errors = error.response.data.errors)
	    },
		/*update() {
			axios.patch(`/shareholder/${this.list.id}`, this.$data.list)
			.then((response) => {
				this.close()
		        console.log(response);    	
		        this.$emit('alertRequest')		
		        // this.$parent.shareholder.push(response.data)
			})
      		.catch((error) => this.errors = error.response.data.errors)
		}*/
	}
}
</script>