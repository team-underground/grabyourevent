<template>
    <div class="bg-white px-8 py-6">
        <div class="flex">
            <div class="flex flex-1">
                <div class="w-5/6">
                    <heading size="large" class="block">{{
                        item.name
                    }}</heading>

                    <heading
                        tag="a"
                        :to="item.options.event_show"
                        class="md:truncate block md:w-64 text-orange-600 border-b-2 border-orange-200 hover:text-orange-700 hover:border-orange-400"
                        >{{ item.options.event_name }}</heading
                    >
                    <span class="text-sm font-semibold text-gray-600">{{
                        item.options.event_time
                    }}</span>
                </div>
                <heading size="large" class="text-gray-500 text-sm">
                    {{ item.qty }}
                </heading>
            </div>
            <div class="w-42 text-right">
                <heading size="large" class="inline"
                    >&#8377; {{ item.subtotal }}</heading
                >
                <a
                    class="cursor-pointer text-red-700 font-bold ml-2"
                    @click.prevent="removeItem"
                    >&#215;</a
                >
            </div>
        </div>
    </div>
</template>

<script>
import Heading from "@/Shared/tuis/Heading";
import Card from "@/Shared/tuis/Card";
import LoadingButton from "@/Shared/tuis/LoadingButton";
import LinkTo from "@/Shared/tuis/LinkTo";

export default {
    components: {
        Heading,
        Card,
        LoadingButton,
        LinkTo
    },

    props: ["cartitem"],

    data() {
        return {
            item: {},
            numbers: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            ticket: {
                no_of_tickets_selected: 0
            }
        };
    },
    computed: {
        ticketsLeftToSelect: function() {
            let that = this;
            return this.numbers.filter(function(number) {
                return number <= that.ticket.no_of_tickets_left;
            });
        }
    },
    created() {
        Object.assign(this.item, this.cartitem);
    },
    methods: {
        removeItem() {
            this.$inertia.post("/remove-item-from-cart", {
                rowId: this.item.rowId
            });
        }
    }
};
</script>
