<template>
<div id="id01" class="w3-modal" style="padding: 0 0 100px 0" :style="{display: openRequest}">
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
      <v-expansion-panel popout>
      <v-expansion-panel-content>
          <div slot="header">Item</div>
          <v-card v-for="(item,key) in passSub" :key="item.id">
            <v-card-text>
              <v-checkbox :label="item.title" :value="item.id" v-model="list.sub_cat"></v-checkbox>
            </v-card-text>
          </v-card>
        </v-expansion-panel-content>
      </v-expansion-panel>
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
    props:['openRequest', 'passSub', 'passatt'],
	data() {
		const defaultForm = Object.freeze({
	        sub_cat: 0,
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
			axios.patch(`/docs/${this.list.id}`, this.$data.list)
			.then((response) => {
				this.close()
		        console.log(response);    			
          this.$emit('alertRequest')
		        // this.$parent.attachments.sub_cat.push(response.data)
            // this.attachments.splice(key, 1)
			})
      .catch((error) => this.errors = error.response.data.errors)
		}
	},
	computed: {
      formIsValid () {
        return (
          this.list.sub_cat
        )
      }
    },
}
</script>

<style scoped>
/*.card{
  height: 50px !important;
}*/
/*.card > *:last-child {
    height: 50px !important;
}*/
</style>