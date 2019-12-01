<template>
	<card
		class="w-full mb-2 rounded-lg hover:shadow-md relative"
		:is-padding="false"
		:to="`/events/${event.event_slug}`"
		tag="inertia-link"
	>
		<div class="w-full h-32 bg-gray-100">
			<img :src="event.event_image_path" alt class="object-cover object-center w-full h-full" />
		</div>
		<div class="p-4">
			<span
				class="hidden md:inline-block bg-orange-200 text-orange-600 rounded-full text-xs inline-block uppercase px-2 tracking-wide font-semibold mb-3"
			>{{ event.event_category }}</span>

			<span
				class="shadow w-24 text-center truncate px-1 mt-4 mr-2 absolute top-0 right-0 md:hidden bg-orange-100 text-orange-600 rounded-full text-xs inline-block uppercase tracking-wide font-semibold"
			>{{ event.event_category }}</span>

			<div class="flex mb-1 relative">
				<div class="pr-3 border-r-2 hidden md:block mr-3">
					<heading size="heading">{{ event.event_date }}</heading>
					<heading size="small-caps">{{ event.event_month }}</heading>
				</div>
				<div
					class="-mt-10 md:hidden absolute left-0 top-0 w-12 h-12 inline-flex items-center justify-center text-center text-white bg-white rounded-full"
				>
					<div>
						<heading size="large" tag="h3" class="tracking-wide">{{ event.event_date }}</heading>
						<heading size="small-caps" class="text-orange-600 -mt-2">{{ event.event_month }}</heading>
					</div>
				</div>

				<div>
					<heading
						size="large"
						tag="h2"
						class="truncate block w-40 md:w-48 mt-2 md:mt-0 hidden md:block"
					>{{ event.event_name }}</heading>
					<heading
						tag="h2"
						class="truncate block w-32 mt-2 md:mt-0 font-serif md:hidden font-bold text-gray-700"
					>{{ event.event_name }}</heading>

					<div
						class="text-gray-500 text-xs md:text-sm truncate block w-32 md:w-48"
					>{{ event.event_location }}</div>
					<div
						class="text-gray-500 text-xs md:text-sm truncate block w-32 md:w-48"
					>{{ event.event_city }}, {{ event.event_state }}</div>
				</div>
			</div>

			<div class="flex bg-white text-sm justify-between items-center">
				<heading v-html="event.event_ticket_price" class="font-semibold w-48 truncate hidden md:block"></heading>
				<heading
					size="small"
					v-html="event.event_ticket_price"
					class="font-semibold w-48 truncate md:hidden"
				></heading>
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
