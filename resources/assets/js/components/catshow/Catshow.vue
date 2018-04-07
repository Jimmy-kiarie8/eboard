<template>
<div id="id01" class="w3-modal" :style="{display: openShowRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 60%; margin: auto">
      <header class="w3-container w3-white"> 
        <span @click="close" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Modal Header</h2>
      </header>
      <div class="w3-container">
        <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
              <th>Name</th>
              <th>Type</th>
              <th>Action</th>
              <th>Date created</th>
            </tr>
            </thead>
            <tbody>
              <tr v-for="item, key in passDocs">
                <td>{{ item.name }}</td>
                <td>{{ item.type }}</td>
                <!-- <td><a href="@{{/item.path}}">Download</a></td> -->
                <td>{{ item.created_at }}</td>
              </tr>
            </tbody>
          </table>
      </div>
      <footer class="w3-container w3-white">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" @click="close">Close</button> 
      </footer>
    </div>
  </div>
</template>

<script>
export default {
    props:['openShowRequest', 'passCat', 'passDocs'],
    data() {
    	return{
    		list: {},
        disp: 'none',
    	}
    },
	methods: {
		close() {
			this.$emit('closeRequest')
		},
	}
}
</script>
<style>
.list-group-item .list-group{
  color: #000 !important;
} 

</style>