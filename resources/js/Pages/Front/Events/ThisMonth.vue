<template>
    <layout>
        <!-- featured events -->
        <div class="px-4 lg:px-6 pt-8 md:pt-16 pb-10 bg-gray-100">
            <div class="container mx-auto">
                <div class="flex flex-col justify-center mb-6 md:mb-10">
                    <heading size="heading" class="text-center"
                        >Events this month around North East</heading
                    >
                    <heading class="text-center italic" size="small"
                        >({{ events.count }} found)</heading
                    >
                </div>
                <div class="flex flex-wrap -mx-4 md:mb-10">
                    <div
                        class="w-1/2 md:w-1/4 px-4 mb-2 md:mb-8"
                        v-for="(event, idx2) in events.data"
                        :key="idx2"
                    >
                        <event-card :event="event"></event-card>
                    </div>
                </div>
                <pagination :links="events.links" />
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import Heading from "@/Shared/tuis/Heading";
import LinkTo from "@/Shared/tuis/LinkTo";
import List from "@/Shared/tuis/List";
import LoadingButton from "@/Shared/tuis/LoadingButton";
import MediaObject from "@/Shared/tuis/MediaObject";
import Pagination from "@/Shared/components/Pagination";
import EventCard from "./Card";

export default {
    components: {
        Layout,
        Heading,
        LinkTo,
        List,
        LoadingButton,
        MediaObject,
        Pagination,
        EventCard
    },

    props: {
        events: Object,
        events_count: Number
    },

    data() {
        return {};
    }
};
</script>
