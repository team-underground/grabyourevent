<template>
	<layout>
		<!-- featured events -->
		<div class="px-4 lg:px-6 pt-16 pb-10 bg-gray-100">
			<div class="container mx-auto">
				<div class="flex flex-col justify-center mb-16">
					<heading size="heading" class="text-center">Events around North East</heading>
					<heading class="text-center italic">({{events_count}} found)</heading>
				</div>
				<div class="flex flex-wrap flex-col -mx-4 mb-10">
					<div class="md:flex md:flex-wrap md:flex-1">
						<div
							class="flex flex-wrap md:w-1/4 px-4 mb-8"
							v-for="(event, idx2) in events.data"
							:key="idx2"
						>
							<event-card :event="event"></event-card>
						</div>
					</div>
					<div class="px-4">
						<pagination :links="events.links" />
					</div>
				</div>
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
 

<style>
.triangle-orange {
	width: 0;
	height: 0;
	border-style: solid;
	border-width: 0 0 75px 75px;
	border-color: transparent transparent #fffaf0 transparent;
}

.triangle-blue {
	width: 0;
	height: 0;
	border-style: solid;
	border-width: 0 0 75px 75px;
	border-color: transparent transparent #ebf8ff transparent;
}
</style>