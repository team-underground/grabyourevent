<template>
	<div>
		<div class="bg-white shadow-base px-4 relative z-20 md:z-20 lg:py-2">
			<div class="container md:flex items-center justify-between mx-auto">
				<div class="flex justify-between md:flex-none items-center">
					<!-- <inertia-link
						href="/"
						class="flex items-center font-bold tracking-tight font-serif text-gray-800 text-2xl"
					>
						<div class="border-2 border-orange-500 p-1">
							<span class="block leading-none uppercase text-xs text-justify">Grab</span>
							<span class="block leading-none uppercase text-xs text-justify">Your</span>
							<span class="block leading-none uppercase text-xs text-justify">Event</span>
							<span class="block leading-none text-xs text-justify">.com</span>
						</div>
					</inertia-link> -->
					<inertia-link
						href="/"
						class="flex items-center font-bold tracking-tight font-serif text-gray-800 text-2xl"
					>
						<img src="/gye_logo.svg" alt="" srcset="" width="140">
					</inertia-link>

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
					<!-- v-if="$page.auth.user" -->
					<inertia-link
						href="/dashboard"
						:class="isUrl('dashboard') ? 'text-orange-600 active' : 'text-gray-500'"
						class="mr-6 py-6 inline-block font-medium hover:text-orange-600"
					>Dashboard</inertia-link>
					<inertia-link
						href="/"
						:class="isUrl('') ? 'text-orange-600 active' : 'text-gray-500'"
						class="px-4 mr-3 py-5 inline-block font-medium hover:text-orange-600"
					>Home</inertia-link>
					<inertia-link
						href="/events"
						:class="isUrl('events') ? 'text-orange-600 active' : 'text-gray-500'"
						class="px-4 mr-3 py-5 inline-block font-medium hover:text-orange-600"
					>Events</inertia-link>
					<!-- <a
						href="/tickets"
						class="px-4 mr-3 py-5 inline-block font-medium text-gray-500 hover:text-orange-600"
					>Tickets</a> -->

					<inertia-link
						href="/this-month"
						:class="isUrl('this-month') ? 'text-orange-600 active' : 'text-gray-500'"
						class="px-4 py-5 inline-block font-medium hover:text-orange-600"
					>This Month</inertia-link>
				</div>

				<div class="hidden md:block">
					<inertia-link
						href="/login"
						class="px-4 py-5 mr-3 inline-block font-medium text-gray-500 hover:text-orange-600"
					>Log in</inertia-link>
					<loading-button tag="inertia-link" to="/register" variant="warning" size="small">Sign up</loading-button>
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
					href="/register"
					class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500"
				>Sign up</a>
				<a
					href="/login"
					class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500"
				>Login</a>
			</div>
		</div>

		<!-- <div
			class="bg-gray-700 px-4 py-10 relative"
			style="background-image: url('./bg-hero2.jpg'); background-repeat: no-repeat; background-size: cover; background-position: 40% 40%; background-blend-mode: multiply;"
			v-if="isUrl('')"
		>
			<div class="mx-auto max-w-xl text-center">
				<h1
					class="mb-4 text-4xl font-bold font-serif leading-tight text-orange-200 tracking-tight"
				>Find amazing events happening around your nearby places</h1>

				<search-input placeholder="eg. Concerts near Guwahati..."></search-input>

				<div class="mt-3 text-orange-200 text-xs tracking-wider uppercase">Found 25 events in your area</div>
			</div>
		</div>-->

		<div class="main">
			<slot></slot>
		</div>

		<div class="relative bg-white py-16">
			<div class="mx-4 md:max-w-5xl md:mx-auto">
				<div class="-mx-4 flex items-center">
					<div class="w-2/3 px-4">
						<div class="md:pr-10 relative">
							<img
								src="/dot.svg"
								alt="dot-svg"
								class="hidden md:block w-48 absolute left-0 bottom-0 -ml-32 -mb-16"
							/>

							<heading size="heading2" class="mb-2">Join Our Newsletter</heading>
							<heading class="mb-6">
								And get the latest event news
								happening in and around your nearby places. Stay tuned and never miss out on anything fun again.
							</heading>

							<div class="md:flex">
								<!-- <input
									type="text"
									class="w-full flex-1 px-4 py-2 border-2 rounded-lg mr-2 outline-none focus:border-blue-500"
									placeholder="Enter your email address..."
								/>-->
								<text-input placeholder="Enter your email address..." class="md:flex-1 md:mr-2"></text-input>
								<loading-button variant="warning" class="mt-2 md:mt-0 w-full md:w-auto">Subscribe Now</loading-button>
							</div>
							<div
								class="text-xs text-gray-500 mt-2 px-4 font-sans"
							>No spam. Only latest event related news.</div>
						</div>
					</div>
					<div class="w-1/3 px-4 text-center">
						<div
							class="mx-auto w-32 h-32 md:w-64 md:h-64 bg-orange-200 relative rounded-full overflow-hidden"
						>
							<img
								src="/peak_mountain.svg"
								alt="subscribe-email"
								class="z-20 object-cover object-center w-64 mx-auto -mb-6 absolute left-0 right-0 bottom-0"
							/>
						</div>
					</div>
				</div>
			</div>
			<!-- <svg
				style="z-index: -1"
				class="absolute left-0 right-0 top-0 -mt-2"
				xmlns="http://www.w3.org/2000/svg"
				viewBox="0 0 1440 140"
			>
				<path
					fill="#4465A8"
					fill-opacity="1"
					d="M0,64L60,74.7C120,85,240,107,360,101.3C480,96,600,64,720,53.3C840,43,960,53,1080,58.7C1200,64,1320,64,1380,64L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
				/>
			</svg>-->
			<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 140">
				<path
					fill="#26385D"
					fill-opacity="1"
					d="M0,64L60,74.7C120,85,240,107,360,101.3C480,96,600,64,720,53.3C840,43,960,53,1080,58.7C1200,64,1320,64,1380,64L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
				/>
			</svg>-->
			<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220">
				<path
					fill="#26385D"
					fill-opacity="1"
					d="M0,224L34.3,224C68.6,224,137,224,206,234.7C274.3,245,343,267,411,256C480,245,549,203,617,192C685.7,181,754,203,823,186.7C891.4,171,960,117,1029,122.7C1097.1,128,1166,192,1234,186.7C1302.9,181,1371,107,1406,69.3L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"
				/>
			</svg>-->
			<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220">
				<path
					fill="#26385D"
					fill-opacity="1"
					d="M0,32L26.7,48C53.3,64,107,96,160,96C213.3,96,267,64,320,53.3C373.3,43,427,53,480,80C533.3,107,587,149,640,160C693.3,171,747,149,800,138.7C853.3,128,907,128,960,133.3C1013.3,139,1067,149,1120,154.7C1173.3,160,1227,160,1280,144C1333.3,128,1387,96,1413,80L1440,64L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"
				/>
			</svg>-->
		</div>

		<div class="px-4 lg:px-6 py-16" style="background: #26385D">
			<div class="container mx-auto">
				<div class="flex flex-wrap md:flex-1 -mx-4">
					<div class="w-1/2 md:w-1/4 px-4 mb-6">
						<heading class="mb-3" size="small-caps">Grab Your Event</heading>
						<a href="/about" class="block text-sm mb-2 hover:text-gray-500">About</a>
						<a href="#" class="block text-sm mb-2 hover:text-gray-500">Careers</a>
						<a href="#" class="block text-sm mb-2 hover:text-gray-500">Privacy &amp; Policy</a>
						<a href="/faq" class="block text-sm mb-2 hover:text-gray-500">Help</a>
					</div>

					<div class="w-1/2 md:w-1/4 px-4 mb-6">
						<heading class="mb-3" size="small-caps">Help</heading>
						<a href="#" class="block text-sm mb-2 hover:text-gray-500">Selling your tickets</a>
						<a href="#" class="block text-sm mb-2 hover:text-gray-500">Contact us</a>
						<a href="#" class="block text-sm mb-2 hover:text-gray-500">Payment</a>
						<a href="#" class="block text-sm mb-2 hover:text-gray-500">Extra Service</a>
					</div>

					<div class="w-1/2 md:w-1/4 px-4 mb-6">
						<heading class="mb-3" size="small-caps">Join us</heading>
						<a href="#" class="block text-sm mb-2 hover:text-gray-500">Discover</a>
						<a href="#" class="block text-sm mb-2 hover:text-gray-500">Sell Tickets</a>
						<a href="#" class="block text-sm mb-2 hover:text-gray-500">Buy Tickets</a>
					</div>

					<div class="w-1/2 md:w-1/4 px-4 mb-6">
						<heading class="mb-3" size="small-caps">Get Connected</heading>
						<a href="#" class="block text-sm mb-2 hover:text-gray-500">Facebook</a>
						<a href="#" class="block text-sm mb-2 hover:text-gray-500">Twitter</a>
						<a href="#" class="block text-sm mb-2 hover:text-gray-500">Instagram</a>
					</div>
				</div>

				<div class="pt-8 border-t border-blue-900 text-sm md:flex md:justify-between">
					<div>&copy; 2019 Grab Your Event. All rights reserved.</div>
					<div>
						Made with
						<span class="text-red-600">&hearts;</span> in Guwahati
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import Card from "@/Shared/tuis/Card";
import Heading from "@/Shared/tuis/Heading";
import Dropdown from "@/Shared/tuis/Dropdown";
import BasicTable from "@/Shared/tuis/BasicTable";
import Badge from "@/Shared/tuis/Badge";
import Alert from "@/Shared/tuis/Alert";
import SearchInput from "@/Shared/tuis/SearchInput";
import LoadingButton from "@/Shared/tuis/LoadingButton";
import LinkTo from "@/Shared/tuis/LinkTo";
import TextInput from "@/Shared/tuis/TextInput";

export default {
	components: {
		Card,
		Heading,
		Dropdown,
		BasicTable,
		Badge,
		Alert,
		SearchInput,
		TextInput,
		LoadingButton,
		LinkTo
	},

	data() {
		return {
			showNav: false,
			showNavbar: false,
			categories: []
		};
	},

	methods: {
		isUrl(...urls) {
			if (urls[0] === "") {
				return location.pathname.substr(1) === "";
			}

			return urls.filter(url =>
				// location.pathname.substr(1).startsWith(url)
				location.pathname.substr(1) == url
			).length;
		}
	}
};
</script>

<style>
.active {
	position: relative;
}
.active:after {
	bottom: 20%;
	position: absolute;
	left: 0;
	right: 0;
	display: block;
	margin-left: auto;
	margin-right: auto;
	content: "";
	height: 6px;
	width: 6px;
	border-radius: 100%;
	background-color: #dd6b20; /* Change this color a/c to theme */
}
/* .active:after {
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
	background-color: #dd6b20; 
} */

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
 