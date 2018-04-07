
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'
import VueRouter from 'vue-router'
import 'w3-css/w3.css';
import VCalendar from 'v-calendar';
import 'v-calendar/lib/v-calendar.min.css';

import { VueEditor } from 'vue2-editor'

import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)



var AddToCalendar = require('vue-add-to-calendar');
Vue.use(AddToCalendar);
// Use v-calendar, v-date-picker & v-popover components
Vue.use(VCalendar);

// vuetify
Vue.use(Vuetify)

// vue Routes
Vue.use(VueRouter)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('message', require('./components/chat/Message.vue'));
Vue.component('file-management', require('./components/FileManagement.vue'));
Vue.component('attachment-list', require('./components/AttachmentList.vue'));
Vue.component('my-post', require('./components/posts/Posts.vue'));

let myoverview = require('./components/Overview.vue');
let myheader = require('./components/Header.vue');
let mysidebar = require('./components/Sidebar.vue');
let mydirector = require('./components/directors/Director.vue');
let myshareholder = require('./components/shareholders/Shareholders.vue');
let mycalendar = require('./components/nse/Nse.vue');
// let myapprovals = require('./components/approvals/Approvals.vue');
let mymanage = require('./components/manage/Manage.vue');
let mycategory = require('./components/category/Category.vue');
let mydoccat = require('./components/catshow/Category.vue');

// Calendar events
let myagm = require('./components/agm/Agm.vue');
let myevent = require('./components/events/Event.vue');
let mycal = require('./components/calendar2/cl2.vue');
let myboard = require('./components/board/Board.vue');
let myspc = require('./components/specboard/special.vue');
let mycom = require('./components/committee/Committee.vue');
let mynew = require('./components/Newhead.vue');
let mycompany = require('./components/company/Company.vue');
let myimage = require('./components/company/Image.vue');
let mysurvey = require('./components/survey/Survey.vue');
let mypoll = require('./components/poll/Poll.vue');
let mysub = require('./components/subcats/Sub.vue');
// let mychat = require('./components/company/Image.vue');

const routes = [
	{path: '/', component: myoverview },
	{path: '/director', component: mydirector },
    {path: '/shareholder', component: myshareholder },
    {path: '/nse', component: mycalendar },
    {path: '/cal', component: mycal },
    // {path: '/approvals', component: myapprovals },
    {path: '/manage', component: mymanage },
    {path: '/board', component: myboard },
    {path: '/agm,', component: myagm },
    {path: '/committee', component: mycom },
    {path: '/sam', component: myspc },
    {path: '/event', component: myevent },
    {path: '/category', component: mycategory },
    {path: '/catshow', component: mydoccat },
    {path: '/myhead', component: mynew },
    {path: '/company', component: mycompany },
    {path: '/image', component: myimage },
    {path: '/survey', component: mysurvey },
    {path: '/poll', component: mypoll },
	{path: '/subcats', component: mysub },
]
const router = new VueRouter({
	// mode: 'history',
  	routes // short for `routes: routes`
})

// let addsubs = require('./components/Subs.vue')
const app = new Vue({
    el: '#app',
    router,
    components: {
    	myoverview, myheader, mydirector, mysidebar, mycategory,
        myshareholder, mycalendar, mycal, mymanage,
        myevent, myagm, myboard, mycom, myspc, mydoccat, 
        mynew, mycompany, myimage, mysurvey, mypoll, mysub
    },
    data: {
        dispsub: 'none',
        message: '',
        chat: {
            message: []
        }
    },
    methods: { 
        /*add(key) {
          this.$children[1].list = this.subcat[key]
          this.dispsub = 'block'
        },*/
    close() {
      this.dispAdd = this.dispUpdate = this.dispShow = 'none'
    },
        /*send() {
            if (this.message.length != 0) {
                this.chat.message.push(this.message);
                this.message= ''
            }
        }*/
    },
    mounted() {
        /*Echo.private('chat')
            .listen('ChatEvent', (e) => {
                console.log(e);
            });*/
    }
});
