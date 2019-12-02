<template>
	<layout>
		<div class="bg-orange-100 pt-8 md:pt-10 px-4">
			<div class="max-w-5xl mx-auto">
				<div class="flex items-center overflow-hidden">
					<div class="w-2/3">
						<!-- <heading size="small-caps" class="mb-1 text-orange-500">Help &amp; Support</heading> -->
						<heading size="display" class="mb-4" tag="h1">Frequently asked Questions</heading>
					</div>
					<div class="w-1/3 border-b-2 border-orange-200">
						<div
							class="mx-auto w-32 h-32 md:w-64 md:h-64 bg-orange-200 relative rounded-full overflow-hidden -mb-6 md:-mb-10"
						>
							<img
								src="/it_support.svg"
								alt="working"
								class="object-cover w-64 mx-auto absolute left-0 right-0"
								style="top: 20px"
							/>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="py-4 md:py-16">
			<div class="max-w-5xl mx-auto">
				<card :is-padding="false">
					<accordion class="px-8">
						<heading size="large" slot="title">What events are published / listed on GYE?</heading>
						<p
							class="pb-5"
						>GYE lists information about concerts, plays, trade fairs, sports, seminars, conferences, spiritual events, corporate training, workshops, and the entire gamut of events. It is the go-to portal to be in the loop about what's happening, where and book tickets instantly.</p>
					</accordion>
					<accordion class="px-8">
						<heading size="large" slot="title">How much does it cost to post an event?</heading>
						<p
							class="pb-5"
						>The process of event listing is completely free. Also, we collect the information about the event from the organizer.</p>
					</accordion>
					<accordion class="px-8">
						<heading size="large" slot="title">How many cities is GYE available in?</heading>
						<p
							class="pb-5"
						>GYE lists events all over North-East and is aggressively working towards all over India.</p>
					</accordion>
					<accordion class="px-8">
						<heading size="large" slot="title">How Can I Contact You?</heading>
						<p class="pb-5">
							Please vist
							<link-to tag="inertia-link" to="/contact-us">Contact Us</link-to>Page for all your queries and redressal of grievances.
						</p>
					</accordion>
					<accordion class="px-8">
						<heading size="large" slot="title">What can GYE do for an Event?</heading>
						<p class="pb-5">GYE collects the information about the events and lists them by its own.</p>
					</accordion>
					<accordion class="last px-8">
						<heading size="large" slot="title">What happens if an Event is cancelled?</heading>
						<p
							class="pb-5"
						>In case of cancellation of any events, GYE will update it on the event listing.</p>
					</accordion>
				</card>
			</div>
		</div>

		<contact-us></contact-us>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import Heading from "@/Shared/tuis/Heading";
import Card from "@/Shared/tuis/Card";
import LinkTo from "@/Shared/tuis/LinkTo";
import Accordion from "@/Shared/tuis/Accordion";
import ContactUs from "@/Pages/ContactUs";

export default {
	components: {
		Layout,
		Heading,
		Card,
		LinkTo,
		Accordion,
		ContactUs
	}
};
</script>