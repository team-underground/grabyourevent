<template>
	<layout>
		<div class="px-4 lg:px-6 py-5 md:py-10 bg-gray-100">
			<div class="max-w-6xl mx-auto">
				<card :is-padding="false" class="mb-10">
					<div class="md:flex md:flex-wrap relative">
						<div class="md:w-1/2 bg-gray-100">
							<img :src="event.event_image_path" :alt="event.event_name" class="w-full h-full" />
						</div>
						<div class="md:w-1/2 md:flex md:flex-col justify-between">
							<svg
								class="hidden md:block absolute inset-y-0 h-full w-24 fill-current text-white -ml-12"
								viewBox="0 0 100 100"
								preserveAspectRatio="none"
							>
								<polygon points="50,0 100,0 50,100 0,100" />
							</svg>
							<div class="px-8 md:px-12 py-6">
								<span
									class="bg-orange-200 text-orange-600 rounded-full text-sm inline-block uppercase px-2 tracking-wide mb-2 font-semibold"
								>{{ event.event_category }}</span>
								<heading size="heading2" class="mb-4">
									{{
									event.event_name
									}}
								</heading>

								<media-object>
									<template #mediaimage>
										<unicon
											name="calendar-alt"
											class="text-gray-500"
											fill="currentColor"
											width="24"
											height="24"
										></unicon>
									</template>
									<template #mediabody>{{ event.event_formatted_date }}</template>
								</media-object>

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
									<div>
										{{ event.event_location }}
										<br />
										{{ event.event_city }}, {{ event.event_state }}, {{ event.event_pincode }}
									</div>
								</div>
							</div>
							<div class="flex bg-gray-100 md:bg-transparent mt-10 px-8 md:px-12 py-4 md:py-6">
								<template v-if="event.event_ticket_price == 'Free'">
									<heading size="large" class="font-serif">Free</heading>
								</template>
								<template v-else>
									<div class="md:w-1/2">
										<heading size="small-caps" class="font-serif">Starts From</heading>
										<span class="text-lg text-gray-800" v-html="event.event_ticket_price"></span>
									</div>
									<!-- <loading-button
										class="mt-auto w-1/2"
										variant="warning"
										:to="`/events/${event.uuid}/buy`"
										tag="a"
									>Buy Tickets</loading-button>-->
								</template>
							</div>
						</div>
					</div>
				</card>
				<card>
					<div class="md:flex flex-wrap -mx-4">
						<div class="md:w-2/3 px-4">
							<div class="md:pr-10">
								<heading class="mb-2" size="large">About the event</heading>
								<heading class="mb-10" v-html="event.event_description"></heading>

								<div class="mb-10">
									<heading class="mb-2" size="large">Additional Information</heading>
									<heading class="job-description ql-editor" v-html="event.optional_description"></heading>

									<list :lists="event.what_is_included" unordered-list-color="text-orange-400" class="mt-4"></list>
								</div>

								<!-- <heading class="mb-2" size="large">Organizer</heading>
								<heading class="mb-10">
									{{
									event.organiser.name
									}}
								</heading>-->
							</div>
						</div>
						<div class="md:w-1/3 px-4">
							<div class="mb-10">
								<heading class="mb-2" size="large">Share this event</heading>

								<social-sharing
									:url="route('events.show', event.event_slug)"
									:title="event.event_name"
									:description="event.event_description"
									inline-template
								>
									<div class="flex">
										<network network="facebook">
											<div class="cursor-pointer p-2 rounded-full bg-facebook text-white mr-2">
												<svg
													class="w-5 h-5 fill-current flex-shrink-0"
													xmlns="http://www.w3.org/2000/svg"
													width="24"
													height="24"
													viewBox="0 0 24 24"
												>
													<path
														d="M13.397,20.997v-8.196h2.765l0.411-3.209h-3.176V7.548c0-0.926,0.258-1.56,1.587-1.56h1.684V3.127	C15.849,3.039,15.025,2.997,14.201,3c-2.444,0-4.122,1.492-4.122,4.231v2.355H7.332v3.209h2.753v8.202H13.397z"
													/>
												</svg>
											</div>
										</network>
										<network network="linkedin">
											<div class="cursor-pointer p-2 rounded-full bg-linkedin text-white mr-2">
												<svg
													class="w-5 h-5 fill-current flex-shrink-0"
													xmlns="http://www.w3.org/2000/svg"
													width="24"
													height="24"
													viewBox="0 0 24 24"
												>
													<circle cx="4.983" cy="5.009" r="2.188" />
													<path
														d="M9.237 8.855v12.139h3.769v-6.003c0-1.584.298-3.118 2.262-3.118 1.937 0 1.961 1.811 1.961 3.218v5.904H21v-6.657c0-3.27-.704-5.783-4.526-5.783-1.835 0-3.065 1.007-3.568 1.96h-.051v-1.66H9.237zM3.095 8.855H6.87V20.994H3.095z"
													/>
												</svg>
											</div>
										</network>

										<network network="whatsapp">
											<div class="cursor-pointer p-2 rounded-full bg-whatsapp text-white mr-2">
												<svg
													class="w-5 h-5 fill-current flex-shrink-0"
													xmlns="http://www.w3.org/2000/svg"
													width="24"
													height="24"
													viewBox="0 0 24 24"
												>
													<path
														fill-rule="evenodd"
														clip-rule="evenodd"
														d="M18.403,5.633C16.708,3.936,14.454,3.001,12.053,3	c-4.948,0-8.976,4.027-8.978,8.977c0,1.582,0.413,3.126,1.198,4.488L3,21.116l4.759-1.249c1.312,0.715,2.788,1.092,4.29,1.093h0.004	l0,0c4.947,0,8.975-4.027,8.977-8.977C21.03,9.585,20.098,7.33,18.403,5.633 M12.053,19.445H12.05	c-1.339-0.001-2.652-0.36-3.798-1.041l-0.272-0.162l-2.824,0.741l0.753-2.753l-0.177-0.282c-0.747-1.188-1.141-2.561-1.141-3.971	c0.002-4.114,3.349-7.461,7.465-7.461c1.993,0.001,3.866,0.778,5.275,2.188c1.408,1.411,2.184,3.285,2.183,5.279	C19.512,16.097,16.165,19.445,12.053,19.445 M16.146,13.856c-0.225-0.113-1.327-0.655-1.533-0.73	c-0.205-0.075-0.354-0.112-0.504,0.112s-0.58,0.729-0.711,0.879s-0.262,0.168-0.486,0.056s-0.947-0.349-1.804-1.113	c-0.667-0.595-1.117-1.329-1.248-1.554s-0.014-0.346,0.099-0.458c0.101-0.1,0.224-0.262,0.336-0.393	c0.112-0.131,0.149-0.224,0.224-0.374s0.038-0.281-0.019-0.393c-0.056-0.113-0.505-1.217-0.692-1.666	C9.627,7.787,9.442,7.845,9.304,7.839c-0.13-0.006-0.28-0.008-0.429-0.008c-0.15,0-0.393,0.056-0.599,0.28	C8.07,8.336,7.491,8.878,7.491,9.982c0,1.104,0.804,2.171,0.916,2.321c0.112,0.15,1.582,2.415,3.832,3.387	c0.536,0.231,0.954,0.369,1.279,0.473c0.537,0.171,1.026,0.146,1.413,0.089c0.431-0.064,1.327-0.542,1.514-1.066	c0.187-0.524,0.187-0.973,0.131-1.067C16.52,14.025,16.369,13.968,16.146,13.856"
													/>
												</svg>
											</div>
										</network>

										<network network="twitter">
											<div class="cursor-pointer p-2 rounded-full bg-twitter text-white">
												<svg
													class="w-5 h-5 fill-current flex-shrink-0"
													xmlns="http://www.w3.org/2000/svg"
													width="24"
													height="24"
													viewBox="0 0 24 24"
												>
													<path
														d="M19.633,7.997c0.013,0.175,0.013,0.349,0.013,0.523c0,5.325-4.053,11.461-11.46,11.461c-2.282,0-4.402-0.661-6.186-1.809	c0.324,0.037,0.636,0.05,0.973,0.05c1.883,0,3.616-0.636,5.001-1.721c-1.771-0.037-3.255-1.197-3.767-2.793	c0.249,0.037,0.499,0.062,0.761,0.062c0.361,0,0.724-0.05,1.061-0.137c-1.847-0.374-3.23-1.995-3.23-3.953v-0.05	c0.537,0.299,1.16,0.486,1.82,0.511C3.534,9.419,2.823,8.184,2.823,6.787c0-0.748,0.199-1.434,0.548-2.032	c1.983,2.443,4.964,4.04,8.306,4.215c-0.062-0.3-0.1-0.611-0.1-0.923c0-2.22,1.796-4.028,4.028-4.028	c1.16,0,2.207,0.486,2.943,1.272c0.91-0.175,1.782-0.512,2.556-0.973c-0.299,0.935-0.936,1.721-1.771,2.22	c0.811-0.088,1.597-0.312,2.319-0.624C21.104,6.712,20.419,7.423,19.633,7.997z"
													/>
												</svg>
											</div>
										</network>
									</div>
								</social-sharing>
							</div>

							<div class="mb-10">
								<heading class="mb-2" size="large">Find on Map</heading>
								<div class="bg-gray-100 rounded-lg h-48 overflow-hidden">
									<div id="map" class="h-full rounded-lg"></div>
								</div>
							</div>

							<alert :with-icon="false" class="text-sm">
								<strong class="font-serif">Refund Policy:</strong>
								Contact the organizer to request a refund. Our
								fee is nonrefundable.
							</alert>
						</div>
					</div>
				</card>
			</div>
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import Heading from "@/Shared/tuis/Heading";
import Card from "@/Shared/tuis/Card";
import LinkTo from "@/Shared/tuis/LinkTo";
import List from "@/Shared/tuis/List";
import LoadingButton from "@/Shared/tuis/LoadingButton";
import Alert from "@/Shared/tuis/Alert";
import MediaObject from "@/Shared/tuis/MediaObject";

export default {
	components: {
		Layout,
		Card,
		Heading,
		LinkTo,
		LoadingButton,
		List,
		Alert,
		MediaObject
	},

	props: {
		event: Object
	},

	data() {
		return {
			options: {
				map: {}
			},
			map: null,
			marker: null
		};
	},
	mounted() {
		this.map = new google.maps.Map(
			document.getElementById("map"),
			Object.assign(
				{
					center: {
						lat: parseFloat(this.event.latitude),
						lng: parseFloat(this.event.longitude)
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
	}
};
</script>
