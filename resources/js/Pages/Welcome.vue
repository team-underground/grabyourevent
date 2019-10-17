<template>
	<layout>
		<div class="bg-orange-100 md:flex items-center">
			<div class="md:w-2/4">
				<div class="w-full bg-orange-100 relative" style="height: 420px">
					<img :src="events[1].image" alt="image" class="object-fit object-cover w-full h-full" />

					<div class="triangle-orange absolute right-0 bottom-0"></div>
				</div>
			</div>

			<div class="md:w-2/4 relative">
				<div
					class="absolute right-0 bottom-0 w-32 h-32 inline-flex items-center justify-center text-center text-white py-2 text- bg-orange-300 rounded-full mr-16 rounded-bl-none"
				>
					<!-- <div class="h-10 w-10 bg-orange-200 block mx-auto rounded-full absolute left-0 top-0"></div>
					<div class="h-10 w-10 bg-orange-200 block mx-auto rounded-full absolute right-0 top-0"></div>-->
					<div>
						<heading size="display" class="tracking-wide">21</heading>
						<heading class="text-orange-600">Feb, 2019</heading>
					</div>
				</div>
				<div class="px-8 md:px-16 py-8">
					<span
						class="bg-orange-200 text-orange-600 rounded-full text-sm inline-block uppercase px-2 tracking-wide mb-3 font-semibold"
					>Adventure</span>
					<heading size="display" class="mb-4">Bacardi NH7 Weekender 2019, Meghalaya</heading>
					<div class="flex mb-3">
						<unicon
							name="clock-nine"
							class="text-gray-500 mr-3"
							fill="currentColor"
							width="24"
							height="24"
						></unicon>8:00 AM – 8:30 PM
					</div>

					<div class="flex mb-3">
						<unicon
							name="location-point"
							class="text-gray-500 mr-3"
							fill="currentColor"
							width="24"
							height="24"
						></unicon>Tashigang - Rangjung Road
					</div>

					<link-to class="mt-4" to="/single">View details</link-to>
				</div>
			</div>
		</div>

		<div class="px-4 lg:px-6 pt-16 pb-10 bg-gray-100">
			<div class="container mx-auto">
				<div class="flex justify-between mb-6">
					<heading size="heading" class="text-center">Upcoming Events</heading>

					<link-to to="#">View all</link-to>
				</div>
				<div class="md:flex md:flex-wrap md:flex-1 -mx-4 mb-10">
					<div class="md:w-1/4 px-4 mb-8" v-for="(event, idx2) in events" :key="idx2">
						<!-- <card class="w-full bg-gray-200 mb-3" :is-padding="false">
							<img src="/bg-hero.jpg" alt class="object-cover rounded-lg" />
						</card>
						<div class="flex">
							<div class="pl-2 pr-3 border-r-2">
								<heading size="heading">24</heading>
								<heading size="small-caps">Dec</heading>
							</div>
							<div class="px-4">
								<heading size="large">Some Fancy Event</heading>
								<div class="text-gray-500 text-sm">Near Uzanbazar, Guwahati</div>
							</div>
						</div>-->

						<card class="w-full mb-3 rounded-lg hover:shadow-md" :is-padding="false" to="/single" tag="a">
							<div class="w-full h-32 bg-gray-100">
								<img :src="event.image" alt class="object-cover object-center w-full h-full" />
							</div>
							<div class="p-4">
								<span
									class="bg-orange-200 text-orange-600 rounded-full text-sm inline-block uppercase px-2 tracking-wide font-semibold mb-3"
								>{{ event.category }}</span>

								<div class="flex mb-4">
									<div class="pr-3 border-r-2">
										<heading size="heading">{{ event.date }}</heading>
										<heading size="small-caps">{{ event.month }}</heading>
									</div>
									<div class="px-4">
										<heading size="large" class="md:truncate block md:w-48">{{ event.name }}</heading>
										<div class="text-gray-500 text-sm">{{ event.location }}</div>
									</div>
								</div>

								<div class="flex bg-white text-sm justify-between items-center">
									<heading>{{ event.price }}</heading>

									<!-- <loading-button variant="warning" size="small" rounded="large">View details</loading-button> -->
								</div>
							</div>
						</card>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="bg-gray-100 py-16">
			<div class="container mx-auto md:flex">
				<div class="md:w-1/2">
					<div class="w-full rounded-lg shadow-md" style="height: 380px">
						<img
							:src="events[2].image"
							alt="image"
							class="md:-mt-6 object-fit object-cover w-full h-full rounded-lg"
						/>
					</div>
				</div>
				<div class="-mt-10 md:w-1/2 md:mt-16 relative">
					<card class="md:-ml-16 shadow-md" with-footer>
						<span
							class="bg-orange-200 text-orange-600 rounded-full text-sm inline-block uppercase px-2 tracking-wide mb-2 font-semibold"
						>Adventure</span>
						<heading size="heading2" class="mb-4">Bacardi NH7 Weekender 2019, Meghalaya</heading>

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
							<template #mediabody>Fri, February 21, 2020</template>
						</media-object>

						<div class="flex mb-3">
							<unicon
								name="clock-nine"
								class="text-gray-500 mr-3"
								fill="currentColor"
								width="24"
								height="24"
							></unicon>8:00 AM – 8:30 PM
						</div>

						<div class="flex mb-3">
							<unicon
								name="location-point"
								class="text-gray-500 mr-3"
								fill="currentColor"
								width="24"
								height="24"
							></unicon>Tashigang - Rangjung Road
						</div>

						<div slot="footer" class="flex items-center">
							<div class="flex-1">
								<heading size="small-caps" class="font-serif">Price</heading>
								<span class="text-xl text-gray-800">Rs 9,399 - 19,899</span>
							</div>
							<loading-button class="mt-auto" variant="warning" size="small">View details</loading-button>
						</div>
					</card>
				</div>
			</div>
		</div>-->

		<div class="bg-blue-100 md:flex items-center">
			<div class="md:w-2/4">
				<div class="w-full bg-blue-100 relative" style="height: 420px">
					<img :src="events[0].image" alt="image" class="object-fit object-contain w-full h-full" />
					<div class="triangle-blue absolute right-0 bottom-0"></div>
				</div>
			</div>

			<div class="md:w-2/4 relative">
				<div
					class="absolute right-0 bottom-0 w-32 h-32 inline-flex items-center justify-center text-center text-white py-2 text- bg-orange-300 rounded-full mr-16 rounded-bl-none"
				>
					<!-- <div class="h-10 w-10 bg-orange-200 block mx-auto rounded-full absolute left-0 top-0"></div>
					<div class="h-10 w-10 bg-orange-200 block mx-auto rounded-full absolute right-0 top-0"></div>-->
					<div>
						<heading size="display" class="tracking-wide">21</heading>
						<heading class="text-orange-600">Feb, 2019</heading>
					</div>
				</div>
				<div class="px-8 md:px-16 py-8">
					<span
						class="bg-orange-200 text-orange-600 rounded-full text-sm inline-block uppercase px-2 tracking-wide mb-3 font-semibold"
					>Adventure</span>
					<heading size="display" class="mb-4">Bhutan Happiness Marathon 2020</heading>
					<div class="flex mb-3">
						<unicon
							name="clock-nine"
							class="text-gray-500 mr-3"
							fill="currentColor"
							width="24"
							height="24"
						></unicon>8:00 AM – 8:30 PM
					</div>

					<div class="flex mb-3">
						<unicon
							name="location-point"
							class="text-gray-500 mr-3"
							fill="currentColor"
							width="24"
							height="24"
						></unicon>Tashigang - Rangjung Road
					</div>

					<link-to class="mt-4" to="/single">View details</link-to>

					<!-- <div class="flex items-center mt-10 md:w-1/2">
						<div class="flex-1">
							<heading size="small-caps">Price Range</heading>
							<span class="text-xl text-gray-800">Rs 9,399 - 19,899</span>
						</div>
						<link-to class="mt-auto" to="/single">View details</link-to>
					</div>-->
				</div>
			</div>
		</div>

		<div class="px-4 lg:px-6 py-16 bg-white">
			<div class="container mx-auto">
				<heading size="heading" class="mb-10 text-center">Event Categories</heading>
				<div class="flex flex-wrap flex-1 -mx-4 mb-10">
					<div class="w-1/3 md:w-1/6 px-4 mb-8" v-for="(category, idx) in categories" :key="idx">
						<!-- <card
							class="overlay-black h-48 w-full bg-gray-200 flex items-center justify-center relative"
							:is-padding="false"
						>
							<img src="/bg-hero2.jpg" alt class="object-cover rounded-lg" />

							<div class="absolute mb-4 ml-3 bottom-0 left-0 z-10">
								<span class="block leading-none text-white text-lg">Music</span>
							</div>

							<div
								class="absolute mt-4 mr-3 top-0 right-0 w-12 h-12 bg-orange-100 rounded-full flex flex-col items-center justify-center z-10"
							>
								<span class="block font-bold leading-none text-orange-600">25+</span>
								<span class="block text-xs leading-tight">Event</span>
							</div>
						</card>-->
						<div class="bg-orange-100 rounded-lg px-4 h-48 py-8 w-full items-center">
							<div
								class="h-20 w-20 flex items-center justify-center rounded-full text-orange-600 bg-orange-200 mx-auto mb-3"
							>
								<unicon
									v-if="category === 'Learning'"
									name="book-open"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>
								<unicon
									v-else-if="category === 'Plays'"
									name="film"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>
								<unicon
									v-else-if="category === 'Health & Fitness'"
									name="heartbeat"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>
								<unicon
									v-else-if="category === 'Music'"
									name="music"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>
								<unicon
									v-else-if="category === 'Careers & Business'"
									name="presentation-line"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>
								<unicon
									v-else-if="category === 'Sports'"
									name="basketball"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>
								<unicon
									v-else-if="category === 'Exhibitions'"
									name="scenery"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>

								<unicon
									v-else-if="category === 'Arts'"
									name="palette"
									fill="currentColor"
									width="32"
									height="32"
								></unicon>

								<unicon
									v-else-if="category === 'Food & Drinks'"
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
							>{{ category }}</span>
							<span class="block text-sm text-center text-gray-500">25 events</span>
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

export default {
	components: {
		Layout,
		Card,
		Heading,
		LinkTo,
		List,
		LoadingButton,
		MediaObject
	},

	data() {
		return {
			categories: [
				"Music",
				// "Festival",
				"Concerts",
				"Plays",
				"Exhibitions",
				"Sports",
				"Careers & Business",
				"Learning",
				"For Kids",
				"Outdoor & Adventures",
				"Arts",
				"Food & Drinks",
				"Health & Fitness"
			],

			events: [
				{
					name: "Bhutan Happiness Marathon 2020",
					category: "Sports",
					price: "Free",
					location: "Tashigang - Rangjung Road",
					date: "21",
					month: "Feb",
					image: "/bg.jpeg"
				},
				{
					name: "Bacardi NH7 Weekender 2019, Meghalaya",
					category: "Music",
					price: "Free",
					location: "Tashigang - Rangjung Road",
					date: "27",
					month: "Sep",
					image: "/bg2.webp"
				},

				{
					name: "Ziro Festival Of Music 2019",
					category: "Camping",
					price: "Rs 3,600 - 18,500",
					location: "Ziro Valley, Arunachal Pradesh",
					date: "26",
					month: "Sep",
					image: "/ziro.webp"
				},
				{
					name: "Bike trip to Sikkim",
					category: "Adventure",
					price: "Rs 29,399 - 39,899",
					location: "Bagdogra Airport",
					date: "28",
					month: "Aug",
					image: "/sikkim.webp"
				}
			]
		};
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