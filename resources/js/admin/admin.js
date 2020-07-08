window.$ = window.jQuery = require('jquery');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docss/csrf#csrf-x-csrf-token');
}

window.flatpickr = require("flatpickr");
window.select2 = require("select2");

window.m = {
	users: require('./modules/users').module,
	articles: require('./modules/articles').module,
};
