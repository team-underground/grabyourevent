import { InertiaApp } from "@inertiajs/inertia-vue";
import Vue from "vue";
import Unicon from "vue-unicons";
import SocialSharing from "vue-social-sharing";
import {
    uniConstructor,
    uniCarWash,
    uniMusic,
    uniBoombox,
    uniFilm,
    uniBookOpen,
    uniHeartbeat,
    uniPresentationLine,
    uniBasketball,
    uniScenery,
    uniPalette,
    uniFood,
    uniLocationPoint,
    uniCalendarAlt,
    uniClockNine,
    uniTicket,
    uniTwitter,
    uniFacebook,
    uniWhatsapp,
    uniInstagram,
    uniFire,
    uniAngleLeft,
    uniEnvelope,
    uniLock,
    uniBell,
    uniMoneyStack,
    uniBoltAlt
} from "vue-unicons/src/icons";

Unicon.add([
    uniConstructor,
    uniCarWash,
    uniMusic,
    uniBoombox,
    uniFilm,
    uniBookOpen,
    uniHeartbeat,
    uniPresentationLine,
    uniBasketball,
    uniScenery,
    uniPalette,
    uniFood,
    uniLocationPoint,
    uniCalendarAlt,
    uniClockNine,
    uniTicket,
    uniTwitter,
    uniFacebook,
    uniWhatsapp,
    uniInstagram,
    uniFire,
    uniAngleLeft,
    uniEnvelope,
    uniLock,
    uniBell,
    uniMoneyStack,
    uniBoltAlt
]);

Vue.mixin({ methods: { route: window.route } });
Vue.use(Unicon);
Vue.use(SocialSharing);
Vue.use(InertiaApp);
const app = document.getElementById("app");

new Vue({
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name =>
                    import(`@/Pages/${name}`).then(module => module.default)
            }
        })
}).$mount(app);
