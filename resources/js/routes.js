const home = () => import('./components/home.vue');

//Componentes de las notas

const createNotes = () => import('./components/notes/create.vue');
const editNotes = () => import('./components/notes/edit.vue');
const indexNotes = () => import('./components/notes/index.vue');

export const routes = [
    {
        name:'home',
        path:'/home',
        component: home
    },
    {
        name:'indexNotes',
        path:'/notes',
        component: indexNotes
    },
    {
        name:'createNotes',
        path:'/notes/create',
        component: createNotes
    },
    {
        name:'editNotes',
        path:'/notes/:id/edit',
        component: editNotes
    },
];

