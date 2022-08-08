require("./bootstrap");
require("./plugins/vue-toastification");
import Vue from "vue";
import {
  App as InertiaApp,
  plugin as InertiaPlugin
} from "@inertiajs/inertia-vue";
//core ui
import CoreuiVue from '@coreui/vue';

import { Link } from "@inertiajs/inertia-vue";
import vuetify from "./plugins/vuetify";
import { InertiaProgress } from "@inertiajs/progress";
import AppLogo from './components/ApplicationLogo.vue';
import VueTelInputVuetify from 'vue-tel-input-vuetify/lib';

//Nav
import clientNav from './components/nav/clientNav.vue';
import guestLayout from './layouts/GuestLayout.vue';
//Admin Nav
import adminNav from './components/nav/adminNav.vue';
import adminLayout from './layouts/AdminLayout.vue';

Vue.use(InertiaPlugin);
Vue.use(CoreuiVue);
Vue.component("Link", Link);

Vue.component("application-logo",AppLogo);
//Use Nav
Vue.component('guest-layout',guestLayout) ;
Vue.component('client-nav',clientNav) ;

//Use admin Nav
Vue.component('admin-layout',adminLayout) ;
Vue.component('admin-nav',adminNav) ;

Vue.use(VueTelInputVuetify, {
  vuetify,
});

Vue.mixin({ methods: { route: window.route } });
const app = document.getElementById("app");

new Vue({
  vuetify,
  render: h =>
    h(InertiaApp, {
      props: {
        title: title => `${title} - My App`,
        initialPage: JSON.parse(app.dataset.page),
        resolveComponent: name => require(`./pages/${name}`).default
      }
    })
}).$mount(app);

InertiaProgress.init({ color: "#fff" });
