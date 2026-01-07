import './bootstrap';
import { createApp } from 'vue';
import AppButton from './components/AppButton.vue';

const app = createApp({});

app.component('app-button', AppButton);

app.mount('#app');
