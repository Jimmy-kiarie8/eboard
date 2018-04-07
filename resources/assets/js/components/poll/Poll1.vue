<template>
  <transition  name="fade">
  <div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    {{ data.poll }}
                    </div>
                    <div class="panel-body">
                    <div id="options" v-if="!data.isCookie">
                       <div class="radio" v-for="option in data.options">
                          <label>
                            <input type="radio" v-model="option_id" :value="option.id" @click="changeButton" name="option">
                            {{ option.name }}
                          </label>
                        </div> 
                         <button :class="{'btn': true, 'btn-primary' : true, 'disabled' : !isChecked }" @click="submit">Vote!</button>
                    </div>
                    <div v-else>
                        <div class="radio" v-for="option in data.options">
                          <label>
                          <strong>{{ percentage(option) }} % </strong> &nbsp; {{ option.name }}
                          </label>
                        </div> 
                    </div>

                    <div class="alert alert-success" v-show="message">
                            <p>{{ message }}</p>
                        </div>
                                           
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</transition>
</template>

<script>
    export default {
        data(){
            return {
                data : [],
                isChecked : false,
                option_id : 0,
                message : null,
            }
        },
        computed:
        {
            totalVote()
            {
                let count = 0;
                this.data.options.forEach(function(item){
                    count += item.total;
                })
                return count;
            }
        },
       created()
       {
            this.$http.get('/polls').then((response) => {
                this.data = response.body ;
            })
       },
       methods:{
            changeButton()
            {
                this.isChecked = true;
            },
            submit()
            {
                if(this.isChecked)
                {
                    this.$http.post('/polls',{'id':this.option_id}).then((response) => {
                            this.message = response.body;
                            this.isChecked = false;
                            this.data.isCookie = true;
                            this.increment(this.option_id);
                    });
                }
            },
            increment(id)
            {
                this.data.options.forEach(function(item){
                    if(item.id == id)
                    {
                        item.total ++;
                    }
                });
            },
            percentage(option)
            {
                return  Math.round(((option.total * 100) / this.totalVote ));
            }
       }
    }
</script>