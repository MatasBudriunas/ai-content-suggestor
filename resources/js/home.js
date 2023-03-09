import 'bootstrap/dist/css/bootstrap.min.css';
import './bootstrap';
import 'popper.js';

import {createApp} from 'vue'
import {vue3Spinner} from 'vue3-spinner'

import Home from './Home.vue'

createApp(Home)
    .use(vue3Spinner)
    .mount("#home")
