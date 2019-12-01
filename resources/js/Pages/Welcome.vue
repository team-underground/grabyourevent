<template>
    <layout>
        <vue-glide
            class="px-4 py-4 md:hidden"
            :perView="1"
            :gap="20"
            :peek="{ before: 0, after: 80 }"
        >
            <vue-glide-slide v-for="i in 3" :key="i">
                <event-mobile-card
                    :event="advertised[i]"
                    class="w-2/3 mb-0"
                ></event-mobile-card>
            </vue-glide-slide>
        </vue-glide>

        <!-- <div
            class="py-4 px-2 md:hidden"
            v-dragscroll
            style="white-space: nowrap; overflow-x: hidden; overflow-y: hidden;"
        >
            <div class="inline-block px-2" style="width: 280px">
                <event-card
                    :event="advertised[0]"
                    color="bg-orange-100"
                    class="inline-block"
                ></event-card>
            </div>
            <div class="inline-block px-2" style="width: 280px">
                <event-card
                    :event="advertised[0]"
                    color="bg-orange-100"
                ></event-card>
            </div>
        </div> -->

        <event-advertise-card
            class="hidden md:block"
            :event="advertised[0]"
            color="bg-orange-100"
        ></event-advertise-card>

        <!-- featured events -->
        <div
            class="px-4 lg:px-6 md:pt-16 md:pb-10 bg-gray-100"
            v-if="featured.length > 0"
        >
            <div class="container mx-auto">
                <div class="flex justify-between mb-6">
                    <heading size="heading" class="text-center"
                        >Featured Events</heading
                    >

                    <link-to :to="route('events.index')" tag="inertia-link"
                        >View all</link-to
                    >
                </div>
                <div class="flex flex-wrap md:flex-1 -mx-2 md:-mx-4 mb-10">
                    <div
                        class="w-1/2 md:w-1/4 px-2 md:px-4"
                        v-for="(event, idx2) in featured"
                        :key="idx2"
                    >
                        <event-card :event="event"></event-card>
                    </div>
                </div>
            </div>
        </div>

        <!-- upcoming events -->
        <div class="px-4 lg:px-6 pt-16 pb-10 bg-gray-100 hidden md:block">
            <div class="container mx-auto">
                <div class="flex justify-between mb-6">
                    <heading size="heading" tag="h2" class="text-center"
                        >Upcoming Events</heading
                    >

                    <link-to :to="route('events.index')" tag="inertia-link"
                        >View all</link-to
                    >
                </div>
                <div class="md:flex md:flex-wrap md:flex-1 -mx-4 mb-10">
                    <div
                        class="w-1/2 md:w-1/4 px-4"
                        v-for="(event, idx2) in upcoming"
                        :key="idx2"
                    >
                        <event-card :event="event"></event-card>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden md:block">
            <event-advertise-card :event="advertised[1]"></event-advertise-card>
        </div>
        <div class="px-4 lg:px-6 py-8 md:py-20 bg-white">
            <div class="container mx-auto">
                <heading
                    size="heading"
                    class="mb-6 md:mb-10 text-left md:text-center"
                    >Browse by Categories</heading
                >
                <!-- <div
                    v-dragscroll
                    style="white-space: nowrap; overflow-x: hidden; overflow-y: hidden;"
                > -->

                <vue-glide
                    :perView="6"
                    :gap="20"
                    :peek="{ before: 0, after: 80 }"
                    :breakpoints="{
                        1024: {
                            perView: 4
                        },
                        800: {
                            perView: 3
                        },
                        576: {
                            perView: 2
                        }
                    }"
                >
                    <vue-glide-slide
                        v-for="(category, idx) in categories"
                        :key="idx"
                    >
                        <!-- <div
                        class="inline-block px-2"
                        v-for="(category, idx) in categories"
                        :key="idx"
                        style="width: 224px"
                    > -->
                        <div
                            class="overflow-hidden shadow-md bg-orange-100 rounded-lg h-64 w-full items-center relative overlay-black"
                        >
                            <!-- <div
                                class="h-12 w-12 flex items-center justify-center rounded-full text-orange-600 absolute left-0 top-0 m-4 shadow-md"
                                style="background-color: rgba(255,255,255, 0.75)">
                                <unicon
                                    v-if="category.category_name == 'Learning'"
                                    name="book-open"
                                    fill="currentColor"
                                    width="32"
                                    height="32"
                                ></unicon>
                                <unicon
                                    v-else-if="
                                        category.category_name == 'Plays'
                                    "
                                    name="film"
                                    fill="currentColor"
                                    width="32"
                                    height="32"
                                ></unicon>
                                <unicon
                                    v-else-if="
                                        category.category_name ==
                                            'Health and Fitness'
                                    "
                                    name="heartbeat"
                                    fill="currentColor"
                                    width="32"
                                    height="32"
                                ></unicon>
                                <unicon
                                    v-else-if="
                                        category.category_name == 'Music'
                                    "
                                    name="music"
                                    fill="currentColor"
                                    width="32"
                                    height="32"
                                ></unicon>
                                <unicon
                                    v-else-if="
                                        category.category_name ===
                                            'Careers and Bussiness'
                                    "
                                    name="presentation-line"
                                    fill="currentColor"
                                    width="32"
                                    height="32"
                                ></unicon>
                                <unicon
                                    v-else-if="
                                        category.category_name === 'Sports'
                                    "
                                    name="basketball"
                                    fill="currentColor"
                                    width="32"
                                    height="32"
                                ></unicon>
                                <unicon
                                    v-else-if="
                                        category.category_name === 'Exhibitions'
                                    "
                                    name="scenery"
                                    fill="currentColor"
                                    width="32"
                                    height="32"
                                ></unicon>

                                <unicon
                                    v-else-if="
                                        category.category_name === 'Arts'
                                    "
                                    name="palette"
                                    fill="currentColor"
                                    width="32"
                                    height="32"
                                ></unicon>

                                <unicon
                                    v-else-if="
                                        category.category_name ===
                                            'Food and Drinks'
                                    "
                                    name="food"
                                    fill="currentColor"
                                    width="32"
                                    height="32"
                                ></unicon>

                                <unicon
                                    v-else
                                    name="book-open"
                                    fill="currentColor"
                                    width="32"
                                    height="32"
                                ></unicon>
                            </div> -->

                            <img
                                v-if="category.category_name == 'Learning'"
                                src="/categories/learning.jpg"
                                alt
                                class="object-cover h-64 w-full block rounded-lg"
                            />
                            <img
                                v-else-if="category.category_name === 'Sports'"
                                src="/categories/sports.jpg"
                                alt
                                class="object-cover h-64 w-full block rounded-lg"
                            />
                            <img
                                v-else-if="category.category_name === 'Arts'"
                                src="/categories/art.jpg"
                                alt
                                class="object-cover h-64 w-full block rounded-lg"
                            />
                            <img
                                v-else-if="
                                    category.category_name ===
                                        'Careers and Bussiness'
                                "
                                src="/categories/business.jpg"
                                alt
                                class="object-cover h-64 w-full block rounded-lg"
                            />
                            <img
                                v-else-if="
                                    category.category_name === 'Food and Drinks'
                                "
                                src="/categories/foods.jpg"
                                alt
                                class="object-cover h-64 w-full block rounded-lg"
                            />
                            <img
                                v-else-if="category.category_name == 'Plays'"
                                src="/categories/plays.jpg"
                                alt
                                class="object-cover h-64 w-full block rounded-lg"
                            />
                            <img
                                v-else-if="
                                    category.category_name === 'Exhibitions'
                                "
                                src="/categories/exhibition.jpg"
                                alt
                                class="object-cover h-64 w-full block rounded-lg"
                            />
                            <img
                                v-else-if="category.category_name == 'Music'"
                                src="/categories/music.jpeg"
                                alt
                                class="object-cover h-64 w-full block rounded-lg"
                            />
                            <img
                                v-else-if="
                                    category.category_name ==
                                        'Health and Fitness'
                                "
                                src="/categories/fitness.jpg"
                                alt
                                class="object-cover h-64 w-full block rounded-lg"
                            />
                            <img
                                v-else-if="category.category_name == 'Concerts'"
                                src="/categories/concerts.jpg"
                                alt
                                class="object-cover h-64 w-full block rounded-lg"
                            />
                            <img
                                v-else-if="category.category_name == 'For kids'"
                                src="/categories/kids.jpg"
                                alt
                                class="object-cover h-64 w-full block rounded-lg"
                            />
                            <img
                                v-else-if="
                                    category.category_name ==
                                        'Outdoor and Adventures'
                                "
                                src="/categories/adventure.jpg"
                                alt
                                class="object-cover h-64 w-full block rounded-lg"
                            />

                            <!-- style="background-color: rgba(255,255,255, 0.95)" -->
                            <div
                                class="z-10 absolute left-0 right-0 bottom-0 mx-4 rounded-lg py-4"
                            >
                                <span
                                    class="block truncate text-center text-gray-100 font-sans font-bold leading-tight"
                                    >{{ category.category_name }}</span
                                >
                                <span
                                    class="block text-sm text-center text-orange-500"
                                    >{{ category.total }} events</span
                                >
                            </div>
                        </div>
                        <!-- </div> -->
                    </vue-glide-slide>
                </vue-glide>
            </div>
        </div>

        <div class="relative bg-orange-100 py-16">
            <div class="mx-4 md:max-w-6xl md:mx-auto">
                <div class="-mx-4 flex">
                    <div class="1/5 px-4 text-center">
                        <div
                            class="flex items-center justify-center mx-auto w-16 h-16 md:w-32 md:h-32 bg-orange-200 text-orange-500 rounded-full mb-6 md:mb-0"
                        >
                            <svg
                                class="w-12 h-12 md:w-24 md:h-24 fill-current"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M6.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L9.758 4.03c0 0-.218.052-.597.144C8.97 4.222 8.737 4.278 8.472 4.345c-.271.05-.56.187-.882.312C7.272 4.799 6.904 4.895 6.562 5.123c-.344.218-.741.4-1.091.692C5.132 6.116 4.723 6.377 4.421 6.76c-.33.358-.656.734-.909 1.162C3.219 8.33 3.02 8.778 2.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C2.535 17.474 4.338 19 6.5 19c2.485 0 4.5-2.015 4.5-4.5S8.985 10 6.5 10zM17.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L20.758 4.03c0 0-.218.052-.597.144-.191.048-.424.104-.689.171-.271.05-.56.187-.882.312-.317.143-.686.238-1.028.467-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.944-.33.358-.656.734-.909 1.162C14.219 8.33 14.02 8.778 13.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C13.535 17.474 15.338 19 17.5 19c2.485 0 4.5-2.015 4.5-4.5S19.985 10 17.5 10z"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="w-4/5 relative px-4">
                        <div class="flex items-center mb-4">
                            <heading
                                size="small-caps"
                                class="text-orange-500 md:ml-10"
                                >Quote</heading
                            >
                            <div class="h-1 bg-orange-200 flex-1 ml-5"></div>
                        </div>

                        <div
                            class="text-4xl md:text-5xl text-gray-700 font-semibold font-serif mb-1 md:ml-10 italic leading-tight"
                        >
                            Life is either a great adventure or nothing.
                        </div>
                        <heading class="text-orange-500 md:ml-10 italic"
                            >- Helen Keller</heading
                        >
                    </div>
                </div>
            </div>

            <div
                class="-mb-1 absolute right-0 bottom-0 w-10 h-10 rounded-full bg-orange-300 block"
            ></div>
            <div
                class="-mb-2 absolute right-0 mr-10 bottom-0 w-24 h-24 rounded-full bg-orange-200 block"
            ></div>
            <div
                class="-mb-2 absolute right-0 mr-32 bottom-0 w-5 h-5 rounded-full bg-orange-300 block"
            ></div>
        </div>

        <subscription-form></subscription-form>
    </layout>
</template>

<script>
import { Glide, GlideSlide } from "vue-glide-js";

import Layout from "@/Shared/Layout";
import Heading from "@/Shared/tuis/Heading";
import Card from "@/Shared/tuis/Card";
import LinkTo from "@/Shared/tuis/LinkTo";
import List from "@/Shared/tuis/List";
import LoadingButton from "@/Shared/tuis/LoadingButton";
import MediaObject from "@/Shared/tuis/MediaObject";
import EventCard from "./Front/Events/Card";
import EventAdvertiseCard from "./Front/Events/AdvertiseCard";
import EventMobileCard from "./Front/Events/MobileCard";
import SubscriptionForm from "./Front/Subscription";

import { dragscroll } from "vue-dragscroll";

export default {
    components: {
        Layout,
        Card,
        Heading,
        LinkTo,
        List,
        LoadingButton,
        MediaObject,
        EventCard,
        EventAdvertiseCard,
        SubscriptionForm,
        EventMobileCard,

        [Glide.name]: Glide,
        [GlideSlide.name]: GlideSlide
    },

    props: {
        categories: Array,
        featured: Array,
        upcoming: Array,
        advertised: Array
    },

    data() {
        return {};
    },

    directives: {
        dragscroll: dragscroll
    }
};
</script>
