<template>
	<div>
		<div class="bg-white shadow-base px-4 relative z-20 md:z-20">
			<div class="container md:flex items-center justify-between mx-auto">
				<div class="flex justify-between md:flex-none items-center">
					<a href="#" class="py-3 font-bold text-gray-700 text-xl">eventeefy</a>

					<div
						class="inline-block inline-flex items-center justify-center w-8 h-8 rounded-full mr-2 cursor-pointer md:hidden"
						@click="showNavbar = !showNavbar"
					>
						<svg
							class="fill-current text-gray-600"
							xmlns="http://www.w3.org/2000/svg"
							width="30"
							height="30"
							viewBox="0 0 24 24"
						>
							<path d="M4 6H20V8H4zM4 11H20V13H4zM4 16H20V18H4z" />
						</svg>
					</div>
				</div>

				<div class="hidden md:block">
					<a
						href="#"
						class="px-4 mr-3 py-5 inline-block font-medium active text-blue-600 hover:text-blue-600"
					>Home</a>
					<a
						href="#"
						class="px-4 mr-3 py-5 inline-block font-medium text-gray-500 hover:text-blue-600"
					>Events</a>
					<a
						href="#"
						class="px-4 mr-3 py-5 inline-block font-medium text-gray-500 hover:text-blue-600"
					>Tickets</a>

					<a
						href="#"
						class="px-4 py-5 inline-block font-medium text-gray-500 hover:text-blue-600"
					>Trending</a>
				</div>

				<div class="hidden md:block">
					<a
						href="#"
						class="px-4 py-5 mr-3 inline-block font-medium text-gray-500 hover:text-blue-600"
					>Log in</a>
					<loading-button href="#" variant="primary" size="small">Sign up</loading-button>
					<!-- <dropdown>
						<template #trigger>
							<div
								class="outline-none inline-flex items-center justify-center h-10 w-10 overflow-hidden rounded-full shadow-inner"
							>
								<img
									src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=256&amp;q=80"
									alt
									class="h-full w-full object-cover"
								/>
							</div>
						</template>
						<template #dropdown>
							<div class="mt-2 bg-white xl:border rounded-lg w-48 py-1 shadow-xl">
								<a
									class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
									href="#"
								>Notifications</a>
								<a
									class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
									href="#"
								>Profile & Account</a>
								<a
									class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
									href="#"
								>Help & Feedback</a>
								<div class="border-t my-1"></div>
								<a
									class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
									href="#"
								>Admin Panel</a>
								<a
									class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
									href="#"
								>Logout</a>
							</div>
						</template>
					</dropdown>-->
				</div>
			</div>

			<div class="md:hidden" v-if="showNavbar">
				<a href="#" class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500">Home</a>
				<a
					href="#"
					class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500"
				>Search</a>
				<a
					href="#"
					class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500"
				>Schedule</a>
				<a
					href="#"
					class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500"
				>Events</a>
				<a
					href="#"
					class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500"
				>Sign up</a>
				<a href="#" class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500">Login</a>
			</div>
		</div>

		<div
			class="bg-blue-700 px-4 py-16 relative"
			style="background-image: url('./bg-hero2.jpg'); background-repeat: no-repeat; background-size: cover; background-position: 40% 40%; background-blend-mode: multiply;"
		>
			<div class="mx-auto max-w-2xl text-center">
				<h1
					class="mb-4 text-4xl font-bold leading-tight text-blue-100"
				>Find amazing events happening around your nearby places</h1>

				<search-input rounded="large" placeholder="eg. Concerts near Guwahati..."></search-input>

				<div class="mt-2 text-blue-200 text-sm">Found 25 events in your area!</div>
			</div>
		</div>

		<div class="px-4 lg:px-6 pt-16 pb-10 bg-white">
			<div class="container mx-auto">
				<div class="flex justify-between">
					<heading size="heading" class="mb-6 text-center">Upcoming Events</heading>
					<a href="#" class="text-blue-600 hover:text-blue-700 font-semibold">View All</a>
				</div>
				<div class="md:flex md:flex-wrap md:flex-1 -mx-4 mb-10">
					<div class="md:w-1/4 px-4 mb-8" v-for="(i, idx2) in 8" :key="idx2">
						<card class="w-full bg-gray-200 mb-3" :is-padding="false">
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
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="px-4 lg:px-6 py-16 bg-gray-100">
			<div class="container mx-auto">
				<heading size="heading" class="mb-6 text-center">Event Categories</heading>
				<div class="md:flex md:flex-wrap md:flex-1 -mx-4 mb-10">
					<div class="md:w-1/4 px-4 mb-6" v-for="(i, idx) in 8" :key="idx">
						<card
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
						</card>
					</div>
				</div>
			</div>
		</div>

		<div class="px-4 lg:px-6 py-16 bg-white">
			<div class="container mx-auto">
				<div class="md:flex md:flex-wrap md:flex-1 -mx-4">
					<div class="md:w-1/4 px-4 mb-6">
						<heading class="mb-3" size="small-caps">Eventeefy</heading>
						<a href="#" class="block text-sm mb-2 hover:text-blue-600">About</a>
						<a href="#" class="block text-sm mb-2 hover:text-blue-600">Careers</a>
						<a href="#" class="block text-sm mb-2 hover:text-blue-600">Privacy &amp; Policy</a>
						<a href="#" class="block text-sm mb-2 hover:text-blue-600">Help</a>
					</div>

					<div class="md:w-1/4 px-4 mb-6">
						<heading class="mb-3" size="small-caps">Help</heading>
						<a href="#" class="block text-sm mb-2 hover:text-blue-600">Selling your tickets</a>
						<a href="#" class="block text-sm mb-2 hover:text-blue-600">Contact us</a>
						<a href="#" class="block text-sm mb-2 hover:text-blue-600">Payment</a>
						<a href="#" class="block text-sm mb-2 hover:text-blue-600">Extra Service</a>
					</div>

					<div class="md:w-1/4 px-4 mb-6">
						<heading class="mb-3" size="small-caps">Join us</heading>
						<a href="#" class="block text-sm mb-2 hover:text-blue-600">Discover</a>
						<a href="#" class="block text-sm mb-2 hover:text-blue-600">Sell Tickets</a>
						<a href="#" class="block text-sm mb-2 hover:text-blue-600">Buy Tickets</a>
					</div>

					<div class="md:w-1/4 px-4 mb-6">
						<heading class="mb-3" size="small-caps">Get Connected</heading>
						<a href="#" class="block text-sm mb-2 hover:text-blue-600">Facebook</a>
						<a href="#" class="block text-sm mb-2 hover:text-blue-600">Twitter</a>
						<a href="#" class="block text-sm mb-2 hover:text-blue-600">Instagram</a>
					</div>
				</div>

				<div class="pt-8 border-t text-sm">Copyright &copy; 2019 Eventeefy. All rights reserved.</div>
			</div>
		</div>
		<div class="h-3 bg-gray-400"></div>
	</div>
</template>

<script>
import Layout from "@/Shared/Layout";

import Card from "@/Shared/tuis/Card";
import Heading from "@/Shared/tuis/Heading";
import Dropdown from "@/Shared/tuis/Dropdown";
import BasicTable from "@/Shared/tuis/BasicTable";
import Badge from "@/Shared/tuis/Badge";
import Alert from "@/Shared/tuis/Alert";
import SearchInput from "@/Shared/tuis/SearchInput";
import LoadingButton from "@/Shared/tuis/LoadingButton";

export default {
	components: {
		Layout,
		Card,
		Heading,
		Dropdown,
		BasicTable,
		Badge,
		Alert,
		SearchInput,
		LoadingButton
	},

	data() {
		return {
			showNav: false,
			showNavbar: false
		};
	},

	methods: {}
};
</script>

<style>
.active {
	position: relative;
}
.active:after {
	bottom: 0;
	position: absolute;
	left: 0;
	right: 0;
	display: block;
	margin-left: auto;
	margin-right: auto;
	content: "";
	height: 3px;
	width: 100%;
	border-radius: 1000px;
	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 0px;
	background-color: #4299e1; /* Change this color a/c to theme */
}

.overlay-black {
	position: relative;
}
.overlay-black:after {
	position: absolute;
	content: "";
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	width: 100%;
	display: block;
	height: 100%;
	background-image: -webkit-linear-gradient(
		rgba(0, 0, 0, 0.01) 0%,
		rgba(0, 0, 0, 0.1) 45%,
		rgba(0, 0, 0, 0.75) 100%
	);
	background-image: -o-linear-gradient(
		rgba(0, 0, 0, 0.01) 0%,
		rgba(0, 0, 0, 0.1) 45%,
		rgba(0, 0, 0, 0.75) 100%
	);
	background-image: linear-gradient(
		rgba(0, 0, 0, 0.01) 0%,
		rgba(0, 0, 0, 0.1) 45%,
		rgba(0, 0, 0, 0.75) 100%
	);
	z-index: 1;
}
</style>
 