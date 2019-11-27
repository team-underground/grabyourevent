<template>
	<layout>
		<div class="bg-orange-100 pt-8 md:pt-10 px-4">
			<div class="max-w-5xl mx-auto">
				<div class="flex items-center overflow-hidden">
					<div class="w-2/3">
						<!-- <heading size="small-caps" class="mb-1 text-orange-500">Grab Your Event</heading>
						 --><heading size="display" class="mb-4">Contact Us</heading>
					</div>
					<div class="w-1/3 border-b-2 border-orange-200 relative">
						<div
							class="mx-auto w-32 h-32 md:w-64 md:h-64 bg-orange-200 relative rounded-full overflow-hidden -mb-6 md:-mb-10"
						>
							<img
								src="/Frame.svg"
								alt="working"
								class="object-cover w-64 mx-auto -mr-4 absolute left-0 right-0 bottom-0"
							/>
						</div>
						<!-- <img src="/focus_working.svg" alt="working" class="object-cover w-64 mx-auto -mb-6 md:-mb-10" /> -->
					</div>
				</div>
			</div>
		</div>

		<div class="py-10 px-4">
			<div class="max-w-5xl mx-auto">


				<div class="flex flex-wrap -mx-4 mb-10">

					<div class="w-full md:w-1/2 px-4">
						<flash-message class="w-full"></flash-message>
						<text-input
                            placeholder="Enter your name"
                            class="w-full mb-3"
                            label="Name"
                            v-model="query.name"
							:errors="errors['name']"
							@keydown="delete errors['name']"
                        ></text-input>
                        <text-input
                            placeholder="Enter your E-mail address"
                            label="E-mail"
                            class="w-full mb-3"
                            v-model="query.email"
							:errors="errors['email']"
							@keydown="delete errors['email']"
                        ></text-input>
                        <text-input
                            placeholder="Enter your Contact Number"
                            label="Phone"
                            v-model="query.phone"
							:errors="errors['phone']"
							@keydown="delete errors['phone']"
                            class="w-full mb-3"
                        ></text-input>
                        <textarea-input
                            placeholder="Enter details"
                            label="Description"
                            class="w-full mb-6"
                            v-model="query.description"
							:errors="errors['description']"
							@keydown="delete errors['description']"
                        ></textarea-input>
                        <div class="mb-4">
						<vue-recaptcha
							:sitekey="sitekey"
							:loadRecaptchaScript="true"
							ref="recaptcha"
							@verify="onVerify"
							@expired="onExpired"
						></vue-recaptcha>
						<div
							v-if="!verified"
							class="text-gray-600 mt-1 text-sm"
						>Before sending query, please verify that you are a human</div>
					</div>
                        <loading-button
                            variant="warning"
                            ref="contactRequestButton"
                            class="md:mt-0 w-full md:w-auto"
                            @click="saveContactRequest"
                        >Send Query</loading-button>
					</div>

					<div class="w-full mt-10 md:mt-0 md:w-1/2 px-4">
						<div
							class="flex w-16 h-16 items-center justify-center text-orange-500 bg-orange-200 mb-4 rounded-large"
						>
							<unicon name="map-marker" fill="currentColor" width="24" height="24"></unicon>
						</div>
						<heading size="heading" class="mb-2">Grab Your Event</heading>
						<heading>House No. 59, Ratnapeeth, MG Road Uzan Bazar, Guwahati Assam 781001</heading>
						<heading class="my-2">Email: <mail-to to="hello@grabyourevent.com">hello@grabyourevent.com</mail-to></heading>

						<div id="map-contact" class="mt-6 h-64 rounded-lg"></div>
						
					</div>

				</div>
			</div>
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import Heading from "@/Shared/tuis/Heading";
import Card from "@/Shared/tuis/Card";
import LinkTo from "@/Shared/tuis/LinkTo";
import MailTo from "@/Shared/tuis/MailTo";
import TextInput from "@/Shared/tuis/TextInput";
import LoadingButton from "@/Shared/tuis/LoadingButton";
import TextareaInput from "@/Shared/tuis/TextareaInput";
import FlashMessage from "@/Shared/tuis/FlashMessage";
import VueRecaptcha from "vue-recaptcha";


export default {
	props: ["errors"],
	components: {
		Layout,
		Heading,
		Card,
		LinkTo,
		MailTo,
		TextInput,
		LoadingButton,
		TextareaInput,
		FlashMessage,
		VueRecaptcha
	},
	data() {
        return {
        	verified: false,
			query: {},
			sitekey: "6Lfy1sQUAAAAAPJMZX3gT7NZGe4O64ThSsjVdKrE",
            options: {
                map: {}
            },
            map: null,
            marker: null
        };
    },
	mounted() {
        this.map = new google.maps.Map(
            document.getElementById("map-contact"),
            Object.assign(
                {
                    center: {
                        lat: parseFloat(26.192779),
                        lng: parseFloat(91.7506512)
                    },
                    zoom: 10
                },
                this.options.map
            )
        );
        this.marker = new google.maps.Marker(
            Object.assign(
                {
                    map: this.map,
                    position: this.map.getCenter(),
                    draggable: false
                },
                this.options.marker
            )
        );
    },
    methods: {
    	onVerify: function(response) {
			this.verified = true;
		},
		onExpired: function() {
			this.verified = false;
		},
		saveContactRequest() {
			// if (!this.verified) {
			// 	return;
			// }
			this.$refs.contactRequestButton.startLoading();

			this.$inertia
				.post(this.route("contacts.query"), this.query)
				.then(() => {
					this.$refs.contactRequestButton.stopLoading();
					if (Object.keys(this.$page.errors).length === 0) {
						this.query = {};
					}
				})
				.catch(() => {
					this.$refs.contactRequestButton.stopLoading();
				});
		}
	}
};
</script>