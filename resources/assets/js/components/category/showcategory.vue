<template>
<div id="id01" class="w3-modal" :style="{display: openShowRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 50%; margin: auto">
      <header class="w3-container w3-white"> 
        <span @click="close" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Modal Header</h2>
      </header>
      <div class="w3-container">
        <table class="table table-hover tablestripped">
          <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Created on</th>
          </thead>
          <tbody>
            <tr>
              <td>{{list.name}}</td>
              <td>{{list.description}}</td>
              <td>{{list.created_at}}</td>
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
    props:['openShowRequest'],
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