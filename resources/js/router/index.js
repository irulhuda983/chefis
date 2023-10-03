import { createWebHistory, createRouter } from "vue-router";
import { useAuthStore } from '@/store/auth';

const routes = [
  {
    path: "/login",
    name: "Login",
    component: () => import("@/pages/login.vue"),
    meta: { public: true },
  },
  {
    path: "/",
    name: "Layout",
    component: () => import("@/partials/Layout.vue"),
    redirect: '/',
    children: [
        {
            path: '/',
            name: 'home',
            component: () => import('@/pages/Dashboard.vue'),
            meta: { title: 'Dashboard', auth: true, menu: 'dashboard', bread: 'Dashboard' },
        },
        {
          path: '/search',
          name: 'search',
          component: () => import('@/pages/Search.vue'),
          meta: { title: 'Search', auth: true, menu: 'search', bread: 'Search' },
      },
        {
          path: '/edit',
          name: 'edit',
          component: () => import('@/pages/EditDokumen.vue'),
          meta: { title: 'Edit Dokumen', auth: true, menu: 'edit', bread: 'Edit Dokumen' },
        },
        {
          path: '/cetak-dokumen/:kode',
          name: 'cetak',
          component: () => import('@/pages/CetakDokumen.vue'),
          meta: { title: 'Cetak Dokumen', auth: true, menu: 'cetak', bread: 'Cetak Dokumen' },
        },
        {
          path: '/profil',
          name: 'profil',
          component: () => import('@/pages/Profil.vue'),
          meta: { title: 'Profil', auth: true, menu: 'profil', bread: 'Profil' },
        },
    ]
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
    const { isAuthenticated } = useAuthStore()
  
  
    const privateRoute = to.matched.some((record) => !record.meta.public)
    const publicRoute = to.matched.some((record) => record.meta.public)
  
    if (privateRoute && !isAuthenticated) next('/login')
    else if (publicRoute && isAuthenticated) next('/')
    else next()
});

export default router;
