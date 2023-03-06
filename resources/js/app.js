import 'bootstrap/dist/css/bootstrap.min.css';
import './bootstrap';
import 'popper.js';

import {createApp} from 'vue'
import {vue3Spinner} from 'vue3-spinner'

import App from './App.vue'

createApp(App)
    .use(vue3Spinner)
    .mount("#app")
