<template>
<div class="container">
<v-snackbar
     :top= 'top'
   	 :timeout="timeout"
     :color="color"
     :multi-line="mode === 'multi-line'"
     :vertical="mode === 'vertical'"
     v-model="snackbar"
  >
  {{ text }}
  <v-btn dark flat @click.native="snackbar = false">Close</v-btn>
</v-snackbar>
<v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
			<div class="row justify-content-center">
			    <div class="col-md-8">
			        <div class="card">
			            <div class="card-header text-center">
			                File Upload page 
			            </div>
			            <div class="card-body">
							<input type="file" @change="Getimage" accept="image/*">
							<div v-for="item in logo">
								<img :src="avatar" style="width: 200px; height: 200px;">
							</div>
							<a href="#" @click="upload" class="btn btn-primary" v-if="loaded">Upload</a>
							<a href="#" @click="cancle" class="btn btn-info" v-if="loaded">Cancle</a>
						</div>
					</div>
				</div>
			</div>
		</v-layout>
	</v-container>
</v-content>
</div>
</template>

<script>
export default {
	data () {
	    return {
	        avatar: null,
	        loaded: false,
	        color: 'blue',
	        text: '',
	        top: 'top',
	        snackbar: false,
	        mode: '',
	        timeout: 7000,
	        file: null,
	        logo: {},
    	}
	},
	methods: {
		Getimage(e) {
			let image = e.target.files[0];
			// this.read(image);
			let reader = new FileReader();
			reader.readAsDataURL(image);
			reader.onload = e => {
				this.avatar = e.target.result
			}
			this.loaded = true
			let form = new FormData();
			form.append('image', image);
			this.file = form
			console.log(e.target.files);
		},
		upload() {
			/*axios.post('/uploadimage', this.file)
			.then((response) => {
				console.log(response);
				this.loaded = false;
				this.color = 'success';
				this.snackbar = true;
				this.text = 'upload Success';
			})*/

			axios.patch(`/logo/${this.list.id}`, this.$data.list)
			.then((response) => {
				this.close()
			        console.log(response);    			
	            this.$emit('alertRequest')
			        // this.$parent.manage.push(response.data)
				})
	      .catch((error) => this.errors = error.response.data.errors)
		},
		/*read(image) {
			let reader = new FileReader();
			reader.readAsDataURL(image);
			reader.onload = e => {
				this.avatar = e.target.result
			}
			this.loaded = true
			console.log(e.target.files);
		}, */
		cancle() {
			this.avatar = null;
			this.loaded = false;
		}
	},
	mounted() {
		axios.post('/getlogo')
		.then((response) => this.logo = response.data)
		  .catch((error) => this.errors = error.response.data.errors)
	}
}
</script>
