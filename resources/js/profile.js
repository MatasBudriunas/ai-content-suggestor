import 'bootstrap/dist/css/bootstrap.min.css';
import './bootstrap';
import 'popper.js';

import {createApp} from 'vue'

import Profile from './profile.vue'

createApp(Profile)
    .mount("#profile")
