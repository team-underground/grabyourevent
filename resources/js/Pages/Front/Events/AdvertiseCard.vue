<template>
    <div class="md:flex items-center" :class="color">
        <div class="md:w-2/4">
            <div class="w-full relative" style="height: 420px" :class="color">
                <img
                    :src="event.event_image_path"
                    alt="image"
                    class="object-fit w-full h-full"
                />
                <div
                    class="absolute right-0 bottom-0"
                    :class="triangleClasses"
                ></div>
            </div>
        </div>

        <div class="md:w-2/4 relative">
            <div
                class="absolute right-0 bottom-0 w-32 h-32 inline-flex items-center justify-center text-center text-white py-2 text- bg-orange-300 rounded-full mr-16 rounded-bl-none"
            >
                <div>
                    <heading size="display" class="tracking-wide">
                        {{ event.event_date }}
                    </heading>
                    <heading class="text-orange-600">
                        {{ event.event_month }},
                        {{ event.event_year }}
                    </heading>
                </div>
            </div>
            <div class="px-8 md:px-16 py-8">
                <span
                    class="bg-orange-200 text-orange-600 rounded-full text-sm inline-block uppercase px-2 tracking-wide mb-3 font-semibold"
                    >{{ event.event_category }}</span
                >
                <heading size="display" class="mb-4">
                    {{ event.event_name }}
                </heading>
                <div class="flex mb-3">
                    <unicon
                        name="clock-nine"
                        class="text-gray-500 mr-3"
                        fill="currentColor"
                        width="24"
                        height="24"
                    ></unicon>
                    {{ event.event_formatted_time }}
                </div>

                <div class="flex mb-3">
                    <unicon
                        name="location-point"
                        class="text-gray-500 mr-3"
                        fill="currentColor"
                        width="24"
                        height="24"
                    ></unicon>
                    {{ event.event_location }}
                </div>

                <link-to
                    class="mt-4"
                    :to="`/events/${event.event_slug}`"
                    tag="inertia-link"
                    >View details</link-to
                >
            </div>
        </div>
    </div>
</template>

<script>
import Heading from "@/Shared/tuis/Heading";
import LinkTo from "@/Shared/tuis/LinkTo";

export default {
    components: {
        Heading,
        LinkTo
    },

    props: {
        event: Object,
        color: {
            type: String,
            default: "bg-blue-100"
        }
    },

    computed: {
        triangleClasses() {
            return [
                {
                    "triangle-blue": this.color === "bg-blue-100",
                    "triangle-orange": this.color === "bg-orange-100"
                }
            ];
        }
    }
};
</script>
