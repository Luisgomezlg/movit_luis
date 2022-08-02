import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import 'flowbite';
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
//import './assets/main.css'
import './index.css'
const app = createApp(App)

app.use(router)

app.mount('#app')
