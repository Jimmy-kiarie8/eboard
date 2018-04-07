<template>

<div id="id01" class="w3-modal"  :style="{display: openAddRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 50%; margin: auto">
      <header class="w3-container w3-white"> 
        <span  class="w3-button w3-display-topright" @click="close">&times;</span>
        <h2>Add</h2><hr>
      </header>
      <div class="w3-container">
        <v-form v-model="valid">
		    <v-text-field
		      label="Parent Group"
		      v-model="list.parent_group"
		      :rules="nameRules"
		      required
		    ></v-text-field>
          	<small class="text-danger" v-if="errors.parent_group">{{ errors.parent_group[0] }}</small>
		    <v-text-field
		      label="Group name"
		      v-model="list.group_name"
		      :rules="nameRules"
		      required
		    ></v-text-field>
          	<small class="text-danger" v-if="errors.parent_group">{{ errors.parent_group[0] }}</small>
		   <!-- <v-text-field
		      label="cont_manage?"
		      v-model="list.cont_manage"
		      :rules="boolRules"
		      required
		    ></v-text-field>
		    <v-text-field
		      label="meeting_group?"
		      v-model="list.meeting_group"
		      :rules="boolRules"
		      required
		    ></v-text-field>
		     <v-text-field
		      label="evaluated?"
		      v-model="list.evaluated"
		      :rules="boolRules"
		      required
		    ></v-text-field>
		    <v-text-field
		      
		      v-model="list.restrict"
		      :rules="boolRules"
		      required
		    ></v-text-field> -->
        <v-container fluid>
		    <v-layout row wrap class="light--text">
			    <v-flex xs6>
		            <v-checkbox
		              color="pink"
		              label="meeting group"
		              v-model="list.meeting_group"
		            >
		              
		            </v-checkbox>
		        </v-flex>
		        <v-flex xs6>
		            <v-checkbox
		              color="pink"
		              label="contact manager"
		              v-model="list.cont_manage"
		            >
		              
		            </v-checkbox>
		        </v-flex>
			    <v-flex xs6>
		            <v-checkbox
		              color="yellow"
		              label="evaluated?"
		              v-model="list.evaluated"
		            >
		              
		            </v-checkbox>
		        </v-flex>
			    <v-flex xs6>
		            <v-checkbox
		              color="blue"
		              label="restrict?"
		              v-model="list.restrict"
		            >
		              
		            </v-checkbox>
		        </v-flex>
			</v-layout>
		</v-container>
		</v-form>
      </div>
      <footer class="w3-container" style="background: #f0f0f0; padding: 20px 0;">
        <button type="button" class="w3-button w3-white w3-border w3-round-large pull-left" data-dismiss="modal" @click="close">Close</button>
        <button type="button" class="w3-button w3-white w3-border w3-round-large pull-right" @click="save">Save</button>
      </footer>
    </div>
  </div>
</template>

<script>
export default {
    props:['openAddRequest', 'openSnackbar', 'disBar'],
	data() {
		return{
      		nse: {},
      		errors: {},
			list: {
    			parent_group: '',
    			group_name: '',
    			evaluated: '',
    			meeting_group: '',
    			cont_manage: '',
    			restrict: '',
    		},
			disp: 'none',
			valid: false,
		    nameRules: [
		        v => !!v || 'Name is required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		    boolRules: [
		        v => !!v || 'this field is required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		}
	},
	methods: {
		opensnackbar() {
			this.disBar = true
		},
		close() {
			this.$emit('closeRequest')
		},
		save() {
			axios.post('/nse', this.$data.list)
			.then((response) => {
				this.close()
		        console.log(response);    			
		        this.$parent.nse.push(response.data)  
		        this.list = {}
		        this.$emit('snackbarRequest')
		        // this.opensnackbar()
			})
      .catch((error) => this.errors = error.response.data.errors)
		}
	}
}
</script>