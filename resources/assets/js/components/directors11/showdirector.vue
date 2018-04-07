<template>
<!-- <div class="modal modal-default fade in" id="modal-default" :style="{display: openShowRequest}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" @click="close">×</span></button>
        <h4 class="modal-title">Info Modal</h4>
      </div>
      <div class="modal-body">
        <table class="table table-hover tablestripped">
          <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Created on</th>
          </thead>
          <tbody>
            <tr>
              <td>{{list.name}}</td>
              <td>{{list.email}}</td>
              <td>{{list.created_at}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" @click="close" style="background: #337ab7">Close</button> 
      </div>
    </div>
  </div>
</div> -->

<div id="id01" class="w3-modal" :style="{display: openShowRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 50%; margin: auto">
      <header class="w3-container w3-teal"> 
        <span @click="close" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Modal Header</h2>
      </header>
      <div class="w3-container">
        <table class="table table-hover tablestripped">
          <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Created on</th>
          </thead>
          <tbody>
            <tr>
              <td>{{list.name}}</td>
              <td>{{list.email}}</td>
              <td>{{list.created_at}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <footer class="w3-container w3-teal">
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