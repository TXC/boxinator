
import IndexView from './components/Index.vue'
import FormView from './components/Form.vue'
import ListView from './components/List.vue'
import NotFoundView from './components/404.vue'


const routes = [
    { path : '/', component: IndexView },
    { path : '/addbox', component: FormView },
    { path : '/listboxes', component: ListView },
    { path: '*', component: NotFoundView }
];

export default routes