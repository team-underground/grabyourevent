<template>
    <card
        class="w-full mb-4 rounded-lg hover:shadow-md"
        :is-padding="false"
        :to="`/events/${event.event_slug}`"
        tag="inertia-link"
    >
        <div class="w-full h-64 bg-gray-100 relative">
            <img
                :src="event.event_image_path"
                alt
                class="object-cover object-center w-full h-full"
            />

            <div
                class="shadow ml-4 mt-4 absolute left-0 top-0 w-16 h-16 inline-flex items-center justify-center text-center text-white bg-white rounded-full"
            >
                <div>
                    <heading
                        size="heading"
                        tag="h3"
                        class="tracking-wide leading-tight"
                    >
                        {{ event.event_date }}
                    </heading>
                    <heading size="small-caps" class="text-orange-600">
                        {{ event.event_month }}
                    </heading>
                </div>
            </div>

            <div class="p-4 absolute w-full left-0 right-0 bottom-0 block">
                <span
                    class="bg-orange-100 text-orange-600 rounded-full text-xs md:text-sm inline-block uppercase px-2 tracking-wide font-semibold mb-3"
                    >{{ event.event_category }}</span
                >

                <div class="flex mb-4">
                    <div style="width: 360px" class="truncate">
                        <h2
                            class="text-xl font-semibold leading-normal font-serif truncate block text-gray-100"
                        >
                            {{ event.event_name }}
                        </h2>
                        <div class="text-gray-200 text-sm truncate block">
                            {{ event.event_location }}, {{ event.event_city }}
                        </div>
                    </div>
                </div>

                <!-- <div class="flex bg-white text-sm justify-between items-center">
                    <heading
                        v-html="event.event_ticket_price"
                        class="font-semibold truncate"
                    ></heading>
                </div> -->
            </div>
        </div>
    </card>
</template>

<script>
import Card from "@/Shared/tuis/Card";
import Heading from "@/Shared/tuis/Heading";

export default {
    components: {
        Card,
        Heading
    },

    props: {
        event: Object
    }
};
</script>
