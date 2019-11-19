<template>
    <layout>
        <div class="px-4 lg:px-6 py-5 md:py-10 bg-gray-100">
            <div class="max-w-3xl mx-auto">
                {{ cart }}
                <template v-for="(item, index) in cart">
                    <cart-item :cartitem="item" :key="index"></cart-item>
                    <hr
                        class="border-b border-gray-300"
                        :key="item.rowId"
                        v-if="index != Object.keys(cart).length - 1"
                    />
                </template>
                <hr class="border-b border-gray-300" />
                <div class="bg-white px-8 py-6 text-right mb-10">
                    <heading size="large" class="block"
                        >Total :
                        <span class="ml-2">&#8377; {{ total }}</span></heading
                    >
                </div>
                <div class="text-center">
                    <loading-button
                        type="submit"
                        ref="submitButton"
                        @click.prevent="purchaseNow"
                        variant="warning"
                        class="uppercase font-bold tracking-wide text-sm"
                        >Continue</loading-button
                    >
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import CartItem from "@/Pages/Front/BuyTickets/CartItem";
import Heading from "@/Shared/tuis/Heading";
import LoadingButton from "@/Shared/tuis/LoadingButton";

export default {
    components: {
        Layout,
        CartItem,
        Heading,
        LoadingButton
    },

    props: {
        cart: Array,
        total: Number,
        options: {}
    },

    data() {
        return {
            razorpayOptions: this.options,
            razorpayResponse: {}
        };
    },
    methods: {
        purchaseNow() {
            this.$refs.submitButton.startLoading();

            // Boolean whether to show image inside a white frame. (default: true)
            this.razorpayOptions.theme.image_padding = false;

            let that = this;
            this.razorpayOptions.modal = {
                ondismiss: function() {
                    that.$refs.submitButton.stopLoading();
                },
                // Boolean indicating whether pressing escape key
                // should close the checkout form. (default: true)
                escape: false,
                // Boolean indicating whether clicking translucent blank
                // space outside checkout form should close the form. (default: false)
                backdropclose: false
            };
            this.razorpayOptions.handler = function(response) {
                that.razorpayResponse.razorpay_payment_id =
                    response.razorpay_payment_id;
                that.razorpayResponse.razorpay_signature =
                    response.razorpay_signature;

                that.$inertia
                    .post("/verify-payment", that.razorpayResponse)
                    .then(function(response) {
                        that.$refs.submitButton.stopLoading();
                    })
                    .catch(function(error) {
                        that.$refs.submitButton.stopLoading();
                    });
            };

            let razorPayInit = new Razorpay(this.razorpayOptions);
            razorPayInit.open();
        }
    }
};
</script>
