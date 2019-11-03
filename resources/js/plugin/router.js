import VueRouter from 'vue-router';
import Home from './../views/Home';
import Profile from './../views/Profile';
import JobFilter from "./../views/Job/JobFilter";
import About from './../views/Content/About';
import NeedMery from "./../views/Job/NeedMery";
import MeryFilter from './../views/MeryFilter';
import Notificationss from './../views/Notifications';
import PublicProfile from './../views/PublicProfile';
import MeryFilterResults from './../views/MeryFilterResults';
import contactUs from "./../views/Content/contactUs";
import PrivacyPolicy from "./../views/Content/PrivacyPolicy";
import RefundCancellationPolicy from "./../views/Content/RefundCancellationPolicy";
import TermsCondition from "./../views/Content/TermsCondition";
import DeliveryShipmentPolicy from "./../views/Content/DeliveryShipmentPolicy";
import Chat from "./../views/Chat";
import ChatView from "./../views/ChatView";
import JobDetails from "./../views/Job/JobDetails";
import FollowUp from "./../views/FollowUp";
import Forgot from "./../views/Auth/Forgot";
import Check from "./../views/Auth/Check";
import NewPassword from "./../views/Auth/NewPassword";
import Login from "./../views/Auth/Login";
import Register from "./../views/Auth/Register";
import Tracking from "./../views/Job/Tracking";

import store from "../store";
import i18n from './i18n'

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/api/auth/login/:provider/callback',
            component: {
                template: '<div class="auth-component"></div>'
            }
        },
        {
            path: '/auth/:provider/callback',
            component: {
                template: '<div class="auth-component"></div>'
            }
        },

        {
            path: '/',
            redirect: `/${i18n.locale}`
        },

        {
            path: '/:lang',
            component: {
                render (c) { return c('router-view') }
            },
            children: [
                {
                    path: `/`,
                    name: 'home',
                    component: Home,
                    beforeEnter: (to, from, next) => {
                        if (store.state.isLoggedIn) {
                            next({name: 'profile'});
                            return
                        }
                        next()
                    }
                },
                {
                    path: '/:lang',
                    component: {
                        render(c) {
                            return c('router-view')
                        }
                    },
                },
                {
                    path: 'login',
                    name: 'login',
                    component: Login,

                },
                {
                    path: 'register',
                    name: 'register',
                    component: Register,
                },
                {
                    path: 'forgot',
                    name: 'Forgot',
                    component: Forgot,
                },
                {
                    path: 'check',
                    name: 'Check',
                    component: Check,
                },
                {
                    path: 'confirm',
                    name: 'NewPassword',
                    component: NewPassword,
                },

                {
                    path: 'profile',
                    name: 'profile',
                    component: Profile,
                    meta: {requiresAuth: true}
                },
                {
                    path: 'jobs-filter',
                    name: 'jobs_filter',
                    component: JobFilter,
                    meta: {requiresAuth: true}
                },
                {
                    path: 'mery-filter-results',
                    name: 'mery_filter_results',
                    component: MeryFilterResults,
                    meta: {requiresAuth: true}
                },
                {
                    path: 'notifications',
                    name: 'notifications',
                    component: Notificationss,
                    meta: {requiresAuth: true}
                },
                {
                    path: 'need-mery',
                    name: 'need_mery',
                    component: NeedMery
                },
                {
                    path: 'mery-filter',
                    name: 'mery_filter',
                    component: MeryFilter
                },
                {
                    path: 'i-want-mery',
                    name: 'want_mery',
                    component: NeedMery,
                    meta: {requiresAuth: true}
                },
                {
                    path: 'about',
                    name: 'about',
                    component: About
                },
                {
                    path: 'profile/:id',
                    name: 'public_profile',
                    component: PublicProfile,
                    meta: {requiresAuth: true}

                },
                {
                    path: 'job/:id',
                    name: 'JobDetails',
                    component: JobDetails,
                    meta: {requiresAuth: true}
                },
                {
                    path: 'contact-us',
                    name: 'contactUs',
                    component: contactUs,
                },
                {
                    path: 'delivery-shipment-policy',
                    name: 'delivery_shipment_policy',
                    component: DeliveryShipmentPolicy,
                },
                {
                    path: 'privacy-policy',
                    name: 'privacy_policy',
                    component: PrivacyPolicy,
                },
                {
                    path: 'terms-condition',
                    name: 'terms_condition',
                    component: TermsCondition,
                },
                {
                    path: 'refund-cancellation-policy',
                    name: 'Refund_Cancellation_Policy',
                    component: RefundCancellationPolicy,
                },
                {
                    path: 'chat/:id',
                    name: 'chat',
                    component: Chat,
                    meta: {requiresAuth: true}
                },
                {
                    path: 'chat',
                    name: 'chat_view',
                    component: ChatView,
                    meta: {requiresAuth: true}
                },
                {
                    path: 'up',
                    name: 'FollowUp',
                    component: FollowUp,
                    meta: {requiresAuth: true, windowRedirectAfter: true,}
                },
                {
                    path: 'tracking',
                    name: 'Tracking',
                    component: Tracking,
                    meta: {requiresAuth: true, windowRedirectAfter: true,}
                },

            ]
        }
    ],

    scrollBehavior(to, from, savedPosition) {
        return {x: 0, y: 200}
    }

});
