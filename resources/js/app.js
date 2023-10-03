import { createApp } from "vue/dist/vue.esm-bundler.js";
import "./bootstrap";
import App from "./App.vue";
import { createPinia } from 'pinia';
import router from "./router";
import { useAuthStore } from '@/store/auth';
import Notifications from '@kyvg/vue3-notification';
import VueTailwindDatepicker from 'vue-tailwind-datepicker'

const app = createApp(App);
app.use(createPinia());
app.use(Notifications);
app.use(VueTailwindDatepicker);
const { getUser } = useAuthStore();
getUser().then(() => {
    app.use(router)
    app.mount('#app')
});
