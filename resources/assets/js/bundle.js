window.axios = require('axios');
window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
let urlGlobal = window.GLOBAL.URL;
window.GLOBAL = require('./globals.json');
window.GLOBAL.URL = urlGlobal;
require('vue-resource');


Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', window.Laravel.csrfToken);
});