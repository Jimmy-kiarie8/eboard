<template>
<div id="id01" class="w3-modal" :style="{display: openShowRequest}">
    <div class="w3-modal-content w3-animate-zoom" style="width: 70%; margin: auto">
      <header class="w3-container w3-white"> 
        <span @click="close" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>{{list.title}} poll</h2>
      </header>
      <div class="w3-container">
        <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Question</th>
                  <th>Date created</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ list.title }}</td>
                    <td>{{ list.question }}</td>
                    <td>{{ list.created_at }}</td>
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
    		list: '',
        // disp: 'block',
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