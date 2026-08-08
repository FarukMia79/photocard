import AdminLayout from '../layouts/AdminLayout.vue';

export default [
    {
        path: '/',
        component: AdminLayout,
        children: [
            {path: '', name: 'dashboard', component: () => import('../components/dashboard.vue'), },
            {path: 'photo-cards/design-1', name: 'Design_1', component: () => import('../components/pages/PhotoCard/facebook/Design_1.vue'), },
            {path: 'photo-cards/design-2', name: 'Design_2', component: () => import('../components/pages/PhotoCard/facebook/Design2.vue'), },
            {path: 'photo-cards/design-3', name: 'Design_3', component: () => import('../components/pages/PhotoCard/facebook/Design_3.vue'), },
        ],
    },
];