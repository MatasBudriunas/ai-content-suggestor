import 'bootstrap/dist/css/bootstrap.min.css';
import './bootstrap';
import 'popper.js';
import 'jQuery';

import { createApp } from 'vue'
import Profile from './Profile.vue'
import {vue3Spinner} from 'vue3-spinner'

const app = createApp(Profile)

app.component('vue3-spinner', vue3Spinner)

app.mount("#profile")
