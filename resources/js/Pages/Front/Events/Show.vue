<template>
	<layout>
		<div class="px-4 lg:px-6 py-5 md:py-10 bg-gray-100">
			<div class="max-w-6xl mx-auto">
				<card :is-padding="false" class="mb-10">
					<div class="md:flex md:flex-wrap relative">
						<div class="md:w-1/2 bg-gray-100">
							<img :src="event.event_image_path" alt="bg-image" class="w-full h-full" />
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
								>{{event.category_name}}</span>
								<heading size="heading2" class="mb-4">{{event.event_name}}</heading>

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
									<template #mediabody>{{event.event_formatted_date}}</template>
								</media-object>

								<div class="flex mb-3">
									<unicon
										name="clock-nine"
										class="text-gray-500 mr-3"
										fill="currentColor"
										width="24"
										height="24"
									></unicon>
									{{event.event_formatted_time}}
								</div>

								<div class="flex mb-3">
									<unicon
										name="location-point"
										class="text-gray-500 mr-3"
										fill="currentColor"
										width="24"
										height="24"
									></unicon>
									{{event.event_location}}
								</div>
							</div>
							<div class="flex bg-gray-100 md:bg-transparent mt-10 px-8 md:px-12 py-4 md:py-6">
								<template v-if="event.event_ticket_price == 'Free'">
									<heading size="large" class="font-serif">Free</heading>
								</template>
								<template v-else>
									<div class="w-1/2">
										<heading size="small-caps" class="font-serif">Starts From</heading>
										<span class="text-xl text-gray-800">Rs 500/-</span>
									</div>
									<loading-button class="mt-auto w-1/2" variant="warning">Buy Tickets</loading-button>
								</template>
								<!-- <loading-button
									class="mt-auto w-1/2"
									variant="secondary"
									variant-type="outline"
								>Share this event</loading-button>-->
							</div>
						</div>
					</div>
				</card>
				<card>
					<div class="md:flex flex-wrap -mx-4">
						<div class="md:w-2/3 px-4">
							<div class="md:pr-10">
								<heading class="mb-2" size="large">About the event</heading>
								<heading class="mb-4">{{event.event_description}}</heading>

								<!-- <heading
									class="mb-10"
								>The venue is eastern Bhutan, at a place called Trashigang, where age-old lifestyle and culture thrive even as the rest of Bhutan is changing at a dizzying pace. Indeed, this region is one of the few pockets that still preserve the last vestiges of the fabled “Hermit Kingdom” on the laps of the mighty Himalayas.</heading>-->

								<div class="mb-10">
									<heading class="mb-2" size="large">Additional Information</heading>
									<heading>{{event.optional_description}}</heading>

									<list :lists="event.what_is_included" unordered-list-color="text-orange-400" class="mt-4"></list>
								</div>

								<heading class="mb-2" size="large">Organizer</heading>
								<heading class="mb-10">{{event.organiser.name}}</heading>
							</div>
						</div>
						<div class="md:w-1/3 px-4">
							<div class="mb-10">
								<heading class="mb-2" size="large">Share this event</heading>

								<social-sharing
									:url="event.event_slug"
									:title="event.event_name"
									:description="event.event_description"
									:quote="event.event_description"
									hashtags="vuejs,javascript,framework"
									twitter-user="grabyourevent"
									inline-template
								>
									<div class="flex">
										<network network="facebook">
											<unicon
												name="facebook"
												class="text-gray-500 mr-3"
												fill="currentColor"
												width="24"
												height="24"
											></unicon>
										</network>
										<network network="twitter">
											<unicon
												name="twitter"
												class="text-gray-500 mr-3"
												fill="currentColor"
												width="24"
												height="24"
											></unicon>
										</network>
										<network network="whatsapp">
											<unicon name="whatsapp" class="text-gray-500" fill="currentColor" width="24" height="24"></unicon>
										</network>
									</div>
								</social-sharing>
							</div>

							<div class="mb-10">
								<heading class="mb-2" size="large">Find on Map</heading>
								<div class="bg-gray-100 rounded-lg h-48">
									<div id="map" class="h-full"></div>
								</div>
							</div>

							<alert :with-icon="false" class="text-sm">
								<strong class="font-serif">Refund Policy:</strong> Contact the organizer to request a refund.
								Our fee is nonrefundable.
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
 