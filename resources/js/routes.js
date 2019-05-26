import Vue from 'vue'
import Router from 'vue-router'
import Index from './views/Index.vue'
import BvnValidation from './views/BvnValidation.vue'
import RideSharing from './views/RideSharing.vue'
import NotFound from './views/NotFound.vue'


Vue.use(Router)


const router = new Router({
    mode: "history",
    routes: [{
            path: '/',
            component: Index,

        },
        {
            path: '/bvn-validation',
            component: BvnValidation,
            props: true,
            name: 'BvnValidation'
        },
        {
            path: '/ride-sharing',
            component: RideSharing,
            props: true
        },
        {
            path: '/404',
            component: NotFound
        }, {
            path: '*',
            redirect: '/404'
        },
    ]
})

router.beforeResolve((to, from, next) => {
    // If this isn't an initial page load.
    // if (to.name) {
    // Start the route progress bar.
    NProgress.start()
    // console.log("works");
    next()
})

router.afterEach((to, from) => {
    // Complete the animation of the route progress bar.
    NProgress.done()
})



export default router
