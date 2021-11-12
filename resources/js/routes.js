import AllWeather from './components/AllWeather.vue';
import CreateWeather from './components/CreateWeather.vue';
import EditWeather from './components/EditWeather.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllWeather
    },
    {
        name: 'create',
        path: '/create',
        component: CreateWeather
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditWeather
    }
];
