
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Resource = require('vue-resource');
window.VueScrollTo = require('vue-scrollto');
// window.App = require('./components/bookReader/App.vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('chapter-reader', require('./components/bookReader/ChapterReader.vue'));
import ChapterReader from './components/bookReader/ChapterReader.vue'

Vue.use(Resource);
Vue.use(VueScrollTo);

const app = new Vue({
    el: '#app',
    components: {
        ChapterReader: ChapterReader
    }
});
