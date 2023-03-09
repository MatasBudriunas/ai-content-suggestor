import 'bootstrap/dist/css/bootstrap.min.css';
import './bootstrap';
import 'popper.js';

import { createApp } from 'vue'
import Profile from './profile.vue'
import {vue3Spinner} from 'vue3-spinner'

const app = createApp(Profile)

app.component('vue3-spinner', vue3Spinner)

app.mount("#profile")
