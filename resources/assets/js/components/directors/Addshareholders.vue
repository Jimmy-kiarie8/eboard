<template>

<div id="id01" class="w3-modal"  :style="{display: openAddRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 50%; margin: auto">
      <header class="w3-container w3-cyan"> 
        <span  class="w3-button w3-display-topright" @click="close">&times;</span>
        <h2>Modal Header</h2>
      </header>
      <div class="w3-container">
        <v-form v-model="valid">
		    <v-text-field
		      label="Name"
		      v-model="list.name"
		      :rules="nameRules"
		      required
		    ></v-text-field>
		    <v-text-field
		      label="E-mail"
		      v-model="list.email"
		      :rules="emailRules"
		      required
		    ></v-text-field>
		    <v-text-field
		      label="Number"
		      v-model="list.number"
		      :rules="numberRules"
		      required
		    ></v-text-field>
		</v-form>
      </div>
      <footer class="w3-container w3-cyan">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" @click="close">Close</button>
        <button type="button" class="btn btn-outline" @click="save">Save changes</button>
      </footer>
    </div>
  </div>
</template>

<script>
export default {
    props:['openAddRequest', 'openAlert'],
	data() {
		return{
      shareholder: {},
			list: {
    			name: '',
    			email: '',
    			number: '',
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
		        v => !!v || 'Number is required',
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
			axios.post('/shareholder', this.$data.list)
			.then((response) => {
				this.close()
		        console.log(response);    			
		        this.$parent.shareholder.push(response.data)  
		        this.list = {}
		        this.$emit('alertRequest')
			})
      .catch((error) => this.errors = error.response.data.errors)
		}
	}
}
</script>