<template>
<div id="id01" class="w3-modal" :style="{display: openShowRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 70%; margin: auto">
      <header class="w3-container w3-white"> 
        <span @click="close" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Modal Header</h2>
      </header>
      <div class="w3-container">
        <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header text-center">
                     {{list.title}} <br>
                     {{list.description}} <hr>
                  </div>
                  <div class="card-body">
                    <h2 class="text-center">Questions</h2>
                    <h4 class="text-center">Add Questions</h4>

                    <v-form @submit.prevent ref="form">
                      <v-container grid-list-xl fluid>
                          <!-- <input type="hidden" v-model="list.id"> -->
                          <!-- <input type="text" :value="list.id" v-model="form.id"> -->
                          <select v-model="form.id" style="border:2px solid #000;">
                            <option :value="list.id" selected>{{username.name}}</option>
                          </select>
                          <select v-model="form.title" style="border:2px solid #000;">
                            <option :value="list.title" selected>{{list.title}}</option>
                          </select>

                        <v-flex xs12 sm6>
                          <v-text-field
                            color="purple darken-2"
                            label="Name"
                            required
                            v-model="form.question"
                            :rules="rules.name"
                          ></v-text-field>
                        </v-flex>
                        <div class="form-group row">
                          <div class="col-md-6">
                            <select class="custom-select" v-model="form.question_type" id="question_type">
                              <option value="" disabled selected>Choose your option</option>
                              <option value="text">Text</option>
                              <option value="textarea">Textarea</option>
                              <option value="checkbox">Checkbox</option>
                              <option value="radio">Radio Buttons</option>
                            </select>
                          </div>
                        </div>

                        <div v-if="form.question_type === 'checkbox'">
                          <v-flex xs12 sm6>
                            <v-text-field
                              color="green darken-2"
                              label="Option"
                              required
                              v-model="form.check"
                              :rules="rules.name"
                            ></v-text-field>
                          </v-flex>
                          <div v-for="item, key in form.optionadd" :key="key">
                            <v-flex xs12 sm6>
                              <v-text-field
                                color="green darken-2"
                                label="Option"
                                required
                                v-model="form.options.check"
                                :rules="rules.name"
                              ></v-text-field>
                            </v-flex>  
                          </div>
                          <button class="btn" @click="addone">Add another</button>
                        </div>

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
                      </v-container>
                    </v-form>
                  </div>
                  <div class="card-footer"></div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props:['openShowRequest', 'username'],
    data() {
      const defaultForm = Object.freeze({
        question: '',
        question_type: '',
        question_type: '',
        options: [
          check => '',
          radio => '',
        ],
        optionadd: [],
        check: '',
        id: '',
      })
    	return{
    		list: '',
        select: {},
        form: Object.assign({}, defaultForm),
        // disp: 'block',
        rules: {
          name: [val => (val || '').length > 0 || 'This field is required']
        },
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
    addone(key) {
      this.form.optionadd.push('ww')[key]
    },
    save() {
      axios.post('/questions', this.$data.form)
      .then((response) => {
        this.close()
        console.log(response);
      })
      .catch((error) => this.errors = error.response.data.errors)
    }
	},
  computed: {
    formIsValid () {
      return (
        this.form.question &&
        this.form.question_type 
        )
    }
  },
}

</script>

<style>
.list-group-item .list-group{
  color: #000 !important;
} 

</style>