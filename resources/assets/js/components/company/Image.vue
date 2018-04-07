<template>
<div id="id01" class="w3-modal"  :style="{display: openRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 50%; margin: auto">
      <header class="w3-container w3-white"> 
        <span  class="w3-button w3-display-topright" @click="close">&times;</span>
        <h2>Add company Logo</h2><hr>
      </header>
      <div class="w3-container">
        <v-card flat>
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
		        <div class="card">
		            <div class="card-header">
		                Logo Upload 
		            </div>
		            <div class="card-body">
						<input type="file" @change="Getimage" accept="image/*">
						<!-- <div v-for="item in logo"> -->
							<img :src="avatar" style="width: 200px; height: 200px;">
						<!-- </div> -->
						<a href="#" @click="upload" class="btn btn-primary" v-if="loaded">Upload</a>
						<a href="#" @click="cancle" class="btn btn-info" v-if="loaded">Cancle</a>
					</div>
				</div>
			</div>
		</v-card>
	</div>
</div>
</div>
</template>

<script>
export default {
	props:['openRequest'],
	data () {
	    return {
	        avatar: null,
			list: {},
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
			/*axios.patch(`/uploadimage/${this.list.id}`, this.file)
			.then((response) => {
				this.close()
		        alert(this.file);    	
  				this.loaded = false;
  				this.color = 'success';
  				this.snackbar = true;
  				this.text = 'upload Success';
			})
	      .catch((error) => this.errors = error.response.data.errors)*/

			axios.post('/uploadimage', this.file,this.$data.list)
			.then((response) => {
				console.log(response);
				this.loaded = false;
				this.color = 'success';
				this.snackbar = true;
				this.text = 'upload Success';
			})

			/*axios.patch(`/logo/${this.list.id}`, this.$data.list)
			.then((response) => {
				// this.close()
			        console.log(response);    			
	            	this.$emit('alertRequest')
			        // this.$parent.manage.push(response.data)
				})
	      .catch((error) => this.errors = error.response.data.errors)*/
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
		},

		close() {
			this.$emit('closeRequest')
		},
	},
	mounted() {
		axios.post('/getlogo')
		.then((response) => this.logo = response.data)
		  .catch((error) => this.errors = error.response.data.errors)
	}
}
</script>
