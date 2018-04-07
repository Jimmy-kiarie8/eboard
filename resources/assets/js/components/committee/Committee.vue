<template>
  <div>
  <vue-topprogress ref="topProgress"></vue-topprogress>
  <transition  name="fade">
  <div>
    <v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
          <section class="content" style="background: #fff;">
            <div class="box-body">
                <add-to-calendar title=""
                               location=""
                               :start="new Date()"
                               :end="new Date((new Date).setDate((new Date).getDate() + 1))"
                               details=""
                               inline-template>
                <div>
                  
                  <div class="col-md-6">
                    <h5>Add to Google calendar</h5> <hr>
                    <google-calendar id="google-calendar">
                      <i class="fa fa-google w3-button w3-white w3-border w3-round-large"></i> 
                    </google-calendar>
                  </div>
                  <div class="col-md-6">  
                    <h5>Add to Microsoft live calendar</h5><hr>
                    <microsoft-calendar id="microsoft-calendar" class="col-md-6">
                      <i class="fa fa-windows w3-button w3-white w3-border w3-round-large"></i> 
                    </microsoft-calendar>
                  </div>

                </div>
              </add-to-calendar>
            </div>

            <iframe src="https://calendar.google.com/calendar/embed?title=Committee%20meeting&amp;height=500&amp;wkst=1&amp;bgcolor=%236633ff&amp;src=run0l9gqao0r0b4jb5432tp9to%40group.calendar.google.com&amp;color=%23B1440E&amp;ctz=Africa%2FNairobi" style="border-width:0" width="700" height="500" frameborder="0" scrolling="no"></iframe>
          </section>
        </v-layout>
      </v-container>
    </v-content>
    <v-btn
      fab
      bottom
      right
      color="pink"
      dark
      fixed
      @click.stop="dialog = !dialog"
    >
      <v-icon>add</v-icon>
    </v-btn>
  </div>
</transition>
</div>
</template>

<script>
import { vueTopprogress } from 'vue-top-progress'
export default{
    components: {
      vueTopprogress
      // , mynew
    },
  props: ['user'],
  data() {
    return{
      drawer: null,
    }
  },
  mounted() {
    this.$refs.topProgress.start()

       // Use setTimeout for demo
       setTimeout(() => {
         this.$refs.topProgress.done()
       }, 2000)
  },
}
</script>

<style>
/*.application--wrap {
    min-height: 10vh;
}*/
  .fade-enter-active{
    transition: opacity 1s, transform 1s;
  }

  .fade-enter{
    opacity: 0;
    transform: translate(20px);
  }
</style>