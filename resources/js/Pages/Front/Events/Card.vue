<template>
	<card
		class="w-full mb-3 rounded-lg hover:shadow-md"
		:is-padding="false"
		:to="`/events/${event.event_slug}`"
		tag="a"
	>
		<div class="w-full h-32 bg-gray-100">
			<img :src="event.event_image_path" alt class="object-cover object-center w-full h-full" />
		</div>
		<div class="p-4">
			<span
				class="bg-orange-200 text-orange-600 rounded-full text-sm inline-block uppercase px-2 tracking-wide font-semibold mb-3"
			>{{ event.category_name }}</span>

			<div class="flex mb-4">
				<div class="pr-3 border-r-2">
					<heading size="heading">{{ event.event_date }}</heading>
					<heading size="small-caps">{{ event.event_month }}</heading>
				</div>
				<div class="px-4">
					<heading size="large" class="md:truncate block md:w-48">{{ event.event_name }}</heading>
					<div class="text-gray-500 text-sm">{{ event.event_location }}</div>
				</div>
			</div>

			<div class="flex bg-white text-sm justify-between items-center">
				<heading>{{ event.event_ticket_price }}</heading>
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

<style>
</style>template    