<template>
	<layout> 
		<event-advertise-card :event="advertised[0]" color="bg-orange-100"></event-advertise-card>

		<!-- featured events -->
		<div class="px-4 lg:px-6 pt-16 pb-10 bg-gray-100">
			<div class="container mx-auto">
				<div class="flex justify-between mb-6">
					<heading size="heading" class="text-center">Featured Events</heading>

					<link-to to="#">View all</link-to>
				</div>
				<div class="md:flex md:flex-wrap md:flex-1 -mx-4 mb-10">
					<div class="md:w-1/4 px-4 mb-8" v-for="(event, idx2) in featured" :key="idx2">
						<event-card :event="event"></event-card>
					</div>
				</div>
			</div>
		</div>

		<!-- upcoming events -->
		<div class="px-4 lg:px-6 pt-16 pb-10 bg-gray-100">
			<div class="container mx-auto">
				<div class="flex justify-between mb-6">
					<heading size="heading" class="text-center">Upcoming Events</heading>

					<link-to to="#">View all</link-to>
				</div>
				<div class="md:flex md:flex-wrap md:flex-1 -mx-4 mb-10">
					<div class="md:w-1/4 px-4 mb-8" v-for="(event, idx2) in upcoming" :key="idx2">
						<event-card :event="event"></event-card>
					</div>
				</div>
			</div>
		</div>

		<event-advertise-card :event="advertised[1]"></event-advertise-card>

		<div class="px-4 lg:px-6 py-16 bg-white">
			<div class="container mx-auto">
				<heading size="heading" class="mb-10 text-center">Event Categories</heading>
				<div class="flex flex-wrap flex-1 -mx-4 mb-10">
					<div class="w-1/3 md:w-1/6 px-4 mb-8" v-for="(category, idx) in categories" :key="idx">
						<div class="bg-orange-100 rounded-lg px-4 h-48 py-8 w-full items-center">
							<div
								class="h-20 w-20 flex items-center justify-center rounded-full text-orange-600 bg-orange-200 mx-auto mb-3"
							>
								<unicon
									v-if="category.category_name == 'Learning'"
									name="book-open"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>
								<unicon
									v-else-if="category.category_name == 'Plays'"
									name="film"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>
								<unicon
									v-else-if="category.category_name == 'Health and Fitness'"
									name="heartbeat"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>
								<unicon
									v-else-if="category.category_name == 'Music'"
									name="music"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>
								<unicon
									v-else-if="category.category_name === 'Careers and Business'"
									name="presentation-line"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>
								<unicon
									v-else-if="category.category_name === 'Sports'"
									name="basketball"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>
								<unicon
									v-else-if="category.category_name === 'Exhibitions'"
									name="scenery"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>

								<unicon
									v-else-if="category.category_name === 'Arts'"
									name="palette"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>

								<unicon
									v-else-if="category.category_name === 'Food and Drinks'"
									name="food"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>

								<unicon v-else name="book-open" fill="currentColor" width="32" height="32"></unicon>
								<!-- <img src="/bg-hero2.jpg" alt class="object-cover rounded-full h-24 w-24" /> -->
							</div>

							<span
								class="mb-1 block text-center text-gray-600 text-sm font-sans font-bold leading-none uppercase tracking-wider"
							>{{ category.category_name }}</span>
							<span class="block text-sm text-center text-gray-500">{{category.total}} events</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="relative bg-orange-100 py-16">
			<div class="mx-4 md:max-w-6xl md:mx-auto">
				<div class="-mx-4 flex">
					<div class="1/5 px-4 text-center">
						<div
							class="flex items-center justify-center mx-auto w-16 h-16 md:w-32 md:h-32 bg-orange-200 text-orange-500 rounded-full mb-6 md:mb-0"
						>
							<svg
								class="w-12 h-12 md:w-24 md:h-24 fill-current"
								xmlns="http://www.w3.org/2000/svg"
								width="24"
								height="24"
								viewBox="0 0 24 24"
							>
								<path
									d="M6.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L9.758 4.03c0 0-.218.052-.597.144C8.97 4.222 8.737 4.278 8.472 4.345c-.271.05-.56.187-.882.312C7.272 4.799 6.904 4.895 6.562 5.123c-.344.218-.741.4-1.091.692C5.132 6.116 4.723 6.377 4.421 6.76c-.33.358-.656.734-.909 1.162C3.219 8.33 3.02 8.778 2.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C2.535 17.474 4.338 19 6.5 19c2.485 0 4.5-2.015 4.5-4.5S8.985 10 6.5 10zM17.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L20.758 4.03c0 0-.218.052-.597.144-.191.048-.424.104-.689.171-.271.05-.56.187-.882.312-.317.143-.686.238-1.028.467-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.944-.33.358-.656.734-.909 1.162C14.219 8.33 14.02 8.778 13.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C13.535 17.474 15.338 19 17.5 19c2.485 0 4.5-2.015 4.5-4.5S19.985 10 17.5 10z"
								/>
							</svg>
						</div>
					</div>
					<div class="w-4/5 relative px-4">
						<!-- <heading size="display2" class="mb-2">Add life to your days, not days to your life.</heading> -->
						<div class="flex items-center mb-4">
							<heading size="small-caps" class="text-orange-500 md:ml-10">Quote of the day</heading>
							<div class="h-1 bg-orange-200 flex-1 ml-5"></div>
						</div>

						<heading
							size="display"
							class="mb-4 md:ml-10"
						>Twenty years from now you will be more disappointed by the things you didn’t do than by the ones you did do. So throw off the bowlines. Sail away from the safe harbor. Catch the trade winds in your sails. Explore. Dream. Discover.</heading>
						<heading class="text-orange-500 md:ml-10 italic">- Mark Twain</heading>

						<!-- <loading-button variant="warning" class="mt-4">Get Started Now</loading-button> -->
					</div>

					<!-- <div class="w-1/3 px-4 text-center relative"> -->
					<!-- <div
							class="mx-auto w-32 h-32 md:w-64 md:h-64 bg-orange-200 relative rounded-full overflow-hidden"
						>
							<img
								src="/run.svg"
								alt="subscribe-email"
								class="z-20 object-cover object-center w-64 mx-auto -mb-6 absolute left-0 right-0 bottom-0"
							/>
					</div>-->
					<!-- <img src="/run.svg" alt="run" class="object-cover object-center w-64 mx-auto" /> -->
					<!-- </div> -->
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
import List from "@/Shared/tuis/List";
import LoadingButton from "@/Shared/tuis/LoadingButton";
import MediaObject from "@/Shared/tuis/MediaObject";
import EventCard from "./Front/Events/Card";
import EventAdvertiseCard from "./Front/Events/AdvertiseCard";

export default {
	components: {
		Layout,
		Card,
		Heading,
		LinkTo,
		List,
		LoadingButton,
		MediaObject,
		EventCard,
		EventAdvertiseCard
	},

	props: {
		categories: Array,
		featured: Array,
		upcoming: Array,
		advertised: Array
	},

	data() {
		return {};
	}
};
</script>