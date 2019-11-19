<template>
    <div class="bg-white px-8 py-6">
        <div class="flex">
            <div class="flex flex-col flex-1">
                <heading size="large" class="block">{{
                    ticket.ticket_category_name
                }}</heading>
                <div class="text-gray-500 text-sm">
                    {{ ticket.ticket_category_description }}
                </div>
            </div>
            <div class="w-48 text-right">
                <div class="mb-4 text-right">
                    <heading size="large" class="inline"
                        >Rs. {{ ticket.ticket_category_price }} &#215;</heading
                    >

                    <select
                        class="ml-2"
                        v-model="ticket.no_of_tickets_selected"
                        :selected="ticket.no_of_tickets_selected"
                    >
                        <option
                            :value="opt"
                            v-for="(opt, index) in ticketsLeftToSelect"
                            :key="index"
                            >{{ opt }}</option
                        >
                    </select>
                </div>
                <loading-button
                    size="small"
                    rounded="small"
                    @click.prevent="addToCart"
                    >BUY</loading-button
                >
                <heading size="large" class="block mt-2" v-if="total > 0"
                    >Total: {{ total }}</heading
                >
            </div>
        </div>
    </div>
</template>

<script>
import Heading from "@/Shared/tuis/Heading";
import Card from "@/Shared/tuis/Card";
import LoadingButton from "@/Shared/tuis/LoadingButton";

export default {
    components: {
        Heading,
        Card,
        LoadingButton
    },

    props: ["singleticket"],

    data() {
        return {
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
        },
        disableBuyNowButton() {
            return this.ticket.no_of_tickets_selected <= 0;
        },
        total() {
            return (
                this.ticket.no_of_tickets_selected *
                this.ticket.ticket_category_price
            );
        }
    },
    created() {
        Object.assign(this.ticket, this.singleticket);
    },
    methods: {
        addToCart() {
            this.$inertia.post(`/add-to-cart/${this.ticket.uuid}`, {
                quantity: this.ticket.no_of_tickets_selected
            });
        }
    }
};
</script>

<style></style>template
