import './bootstrap';

import * as bootstrap from 'bootstrap'
import { createApp } from 'vue';
import cicle from './components/Cicle.vue'
import usuari from './components/Usuari.vue'

createApp(usuari).mount('#usuari');
createApp(cicle).mount('#cicle');
