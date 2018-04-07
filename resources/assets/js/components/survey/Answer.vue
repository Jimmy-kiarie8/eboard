<template>
<div id="id01" class="w3-modal" :style="{display: openRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 70%; margin: auto">
      <header class="w3-container w3-white"> 
        <span @click="close" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Answer</h2>
      </header>
      <div class="w3-container">
        <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header text-center">
                     <h4 class="pull-left">{{list.title}} </h4><br>
                     <p class="pull-left">{{list.description}}</p> <hr>
                  </div>
                  <div class="card-body">
                    <h2 class="text-center">Questions</h2>
                      <v-expansion-panel focusable v-for="(item,key) in questions" :key="item.id">
                        <v-expansion-panel-content v-if="list.id === item.survey_id">
                            <div slot="header">
                              {{ item.title }}
                            </div>
                            <v-card>
                              <v-card-text class="grey lighten-3">
                                <div v-if="item.question_type === 'textarea'">
                                  {{key}}
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
                                  <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                      flat
                                      color="primary"
                                      type="submit"
                                      @click="save"
                                      :disabled="!formIsValid"
                                    >Submit</v-btn>
                                  </v-card-actions>
                                </div>
                                <div v-if="item.question_type === 'text'">
                                  {{key}}
                                  <v-flex xs12 sm6>
                                    <v-text-field
                                      color="purple darken-2"
                                      label="Name"
                                      required
                                      v-model="form.name"
                                      :rules="rules.name"
                                    ></v-text-field>
                                  </v-flex>
                                  <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                      flat
                                      color="primary"
                                      type="submit"
                                      @click="save"
                                      :disabled="!formIsValid"
                                    >Submit</v-btn>
                                  </v-card-actions>
                                </div>
                              </v-card-text>
                            </v-card>
                        </v-expansion-panel-content>
                      </v-expansion-panel>
                    <h4 class="text-center">Add Questions</h4>

                    <v-form @submit.prevent ref="form">
                      <v-container grid-list-xl fluid>

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
    props:['openRequest'],
    data() {
      const defaultForm = Object.freeze({
        answer: '',
        description: '',
        name: ''
      })
    	return{
        questions: {},
    		list: '',
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
    
    save() {

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
  mounted() {
    axios.post('/getquest')
    .then((response) => this.questions = this.temp = response.data)
      .catch((error) => this.errors = error.response.data.errors)

  }
}

</script>

<style>
.list-group-item .list-group{
  color: #000 !important;
} 

</style>