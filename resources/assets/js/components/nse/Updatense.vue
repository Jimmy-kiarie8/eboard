<template>
<div id="id01" class="w3-modal"  :style="{display: openRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 50%; margin: auto">
      <header class="w3-container w3-white"> 
        <span  class="w3-button w3-display-topright" @click="close">&times;</span>
        <h2>{{list.group_name}}</h2>
      </header>
      <div class="w3-container">
        <v-form v-model="valid">
		    <v-text-field
		      label="Parent Group"
		      v-model="list.parent_group"
		      :rules="nameRules"
		      required
		    ></v-text-field>
		    <v-text-field
		      label="Group name"
		      v-model="list.group_name"
		      :rules="nameRules"
		      required
		    ></v-text-field>
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
    		              label="contact Manager"
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
      <footer class="w3-container w3-white">
        <button type="button" class="w3-button w3-white w3-border w3-round-large pull-left" data-dismiss="modal" @click="close">Close</button>
        <button type="button" class="w3-button w3-white w3-border w3-round-large pull-right" @click="update">Update</button>
      </footer>
    </div>
  </div>
</template>

<script>
export default {
    props:['openRequest', 'openAlert'],
	data() {
		return{
      shareholder: {},
			list: {},
			disp: 'none',
			valid: false,
		    nameRules: [
		        v => !!v || 'Name is required',
		        // v => v.length <= 50 || 'Name must be less than 50 characters'
		    ],
		    boolRules: [
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
		update() {
			axios.patch(`/nse/${this.list.id}`, this.$data.list)
			.then((response) => {
				this.close()
		        console.log(response);    	
		        this.$emit('alertRequest')		
		        // this.$parent.shareholder.push(response.data)
			})
      		.catch((error) => this.errors = error.response.data.errors)
		}
	}
}
</script>