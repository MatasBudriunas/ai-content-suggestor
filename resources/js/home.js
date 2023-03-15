import 'bootstrap/dist/css/bootstrap.min.css';
import './bootstrap';
import 'popper.js';
import 'jQuery';

import {createApp} from 'vue'
import {vue3Spinner} from 'vue3-spinner'

import Home from './Home.vue'

const app = createApp(Home)

app.component('vue3-spinner', vue3Spinner)

createApp(Home).mount("#home")
