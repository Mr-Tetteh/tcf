import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import { Observer } from 'tailwindcss-intersect';

Observer.start();
