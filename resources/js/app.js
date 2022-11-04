import './bootstrap';
import '../css/app.scss'
import {createApp} from "vue/dist/vue.esm-bundler.js";
import Card from "./components/Card.vue"
import SetTime from "./components/SetTime.vue"
const app = createApp({})

app.component('card', Card)
app.component('setTime', SetTime)

app.mount('#app')

