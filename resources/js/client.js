let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docss/csrf#csrf-x-csrf-token');
}

window.m = {
  //posts: require('./modules/posts').module,
};
