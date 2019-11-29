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
    uniBoltAlt,
    uniMapMarker
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
    uniBoltAlt,
    uniMapMarker
]);

Vue.mixin({ methods: { route: window.route } });
Vue.use(Unicon);
Vue.use(SocialSharing);
Vue.use(InertiaApp);

Vue.directive("numeric-float", {
    bind(el) {
        el.addEventListener("keydown", e => {
            if (
                [46, 8, 9, 27, 13, 110, 190].indexOf(e.keyCode) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode === 65 && e.ctrlKey === true) ||
                // Allow: Ctrl+C
                (e.keyCode === 67 && e.ctrlKey === true) ||
                // Allow: Ctrl+X
                (e.keyCode === 88 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)
            ) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if (
                (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) &&
                (e.keyCode < 96 || e.keyCode > 105)
            ) {
                e.preventDefault();
            }
        });
    }
});

Vue.directive("numeric-only", {
    bind(el) {
        el.addEventListener("keydown", e => {
            if (
                [8, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57].includes(
                    e.keyCode
                ) ||
                // Allow: Ctrl+A
                (e.keyCode === 65 && e.ctrlKey === true) ||
                // Allow: Ctrl+C
                (e.keyCode === 67 && e.ctrlKey === true) ||
                // Allow: Ctrl+X
                (e.keyCode === 88 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)
            ) {
                // let it happen, don't do anything
                return;
            }

            // Ensure that it is a number and stop the keypress
            if (
                (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) &&
                (e.keyCode < 96 || e.keyCode > 105)
            ) {
                e.preventDefault();
            }
        });
    }
});

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
