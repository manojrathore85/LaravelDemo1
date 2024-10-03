import { createApp } from 'vue';
import App from './app.vue';
import Toast from 'vue-toastification';
import router from'./routes.js';
import store from './store/store.js';
import 'vue-toastification/dist/index.css';

// Array of JavaScript files to include
const jsFiles = [
    './assets/js/jquery.min.js',
    './assets/js/pace.min.js',
	'./assets/js/bootstrap.bundle.min.js',	
	'./assets/plugins/simplebar/js/simplebar.min.js',
	'./assets/plugins/metismenu/js/metisMenu.min.js',
	'./assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js',
    //'./assets/js/index.js',
	'./assets/js/app.js',
  ];
  
  // Dynamically include each JavaScript file
  jsFiles.forEach(src => {
    const script = document.createElement('script');
    script.src = src;
    document.body.appendChild(script);
  });


// const app = createApp({});
// createApp(App).use(router, store).mount("#app")
const app = createApp(App);
// Configure toast options (optional)
const options = {
  position: "top-right",
  timeout: 5000,
  closeOnClick: true,
  pauseOnHover: true,
  draggable: true,
  // Add more options as needed
};

// Use toast plugin
app.use(Toast, options);
app.use(router),
app.use(store),
app.mount('#app');

