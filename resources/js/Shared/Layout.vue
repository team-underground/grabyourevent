<template>
	<main class="flex w-100 flex-col min-h-screen">
		<div class="bg-white px-4 relative z-30 md:z-30 lg:py-1 shadow-base">
			<div class="container md:flex items-center justify-between mx-auto">
				<div class="flex justify-between md:flex-none items-center">
					<inertia-link href="/" class="py-2 md:py-0">
						<div class="flex items-center">
							<img src="/gye-logo.svg" alt="gye" width="44" class="hidden md:block" />
							<img src="/gye-logo.svg" alt="gye" width="38" class="md:hidden" />

							<span class="font-bold text-gray-700 text-lg md:text-xl ml-2">Grab Your Event</span>
						</div>
					</inertia-link>

					<div class="md:hidden">
						<inertia-link
							v-if="$page.auth.user"
							href="/dashboard"
							class="w-10 h-10 rounded-full bg-gray-200 inline-flex items-center text-gray-500"
						>
							<unicon name="user" class="fill-current mx-auto" fill="currentColor" width="24" height="24"></unicon>
						</inertia-link>

						<inertia-link
							v-if="!$page.auth.user"
							href="/login"
							class="text-sm px-2 py-5 inline-block font-medium text-gray-600 hover:text-orange-600"
						>Login / Signup</inertia-link>
					</div>
				</div>

				<div class="hidden md:block">
					<inertia-link
						v-if="$page.auth.user"
						href="/dashboard"
						:class="
                            isUrl('dashboard')
                                ? 'text-orange-600 menu-active'
                                : 'text-gray-500'
                        "
						class="mr-6 py-6 inline-block font-medium hover:text-orange-600"
					>Dashboard</inertia-link>
					<inertia-link
						href="/"
						:class="
                            isUrl('')
                                ? 'text-orange-600 menu-active'
                                : 'text-gray-500'
                        "
						class="px-4 mr-3 py-5 inline-block font-medium hover:text-orange-600"
					>Home</inertia-link>
					<inertia-link
						href="/events"
						:class="
                            isUrl('events')
                                ? 'text-orange-600 menu-active'
                                : 'text-gray-500'
                        "
						class="px-4 mr-3 py-5 inline-block font-medium hover:text-orange-600"
					>Events</inertia-link>
					<!-- <a
						href="/tickets"
						class="px-4 mr-3 py-5 inline-block font-medium text-gray-500 hover:text-orange-600"
					>Tickets</a>-->

					<inertia-link
						href="/this-month"
						:class="
                            isUrl('this-month')
                                ? 'text-orange-600 menu-active'
                                : 'text-gray-500'
                        "
						class="px-4 py-5 inline-block font-medium hover:text-orange-600"
					>This Month</inertia-link>
				</div>

				<div class="hidden md:block">
					<template v-if="$page.auth.user">
						<dropdown>
							<template #trigger>
								<div class="flex items-center">
									<div
										class="outline-none block inline-flex items-center justify-center h-10 w-10 overflow-hidden rounded-full shadow-inner bg-gray-500 text-white font-bold text-xl"
									>{{ $page.auth.user.name.charAt(0) }}</div>
									<div class="text-left ml-2">
										<span class="text-sm leading-tight block w-32 truncate">{{ $page.auth.user.name }}</span>
										<span
											class="leading-tight text-gray-400 block text-xs uppercase tracking-wider font-semibold"
										>{{ $page.auth.user.type }}</span>
									</div>
								</div>
							</template>
							<template #dropdown>
								<div
									class="mt-2 bg-white rounded-lg border-t border-gray-100 w-48 py-1 shadow-lg overflow-hidden"
								>
									<inertia-link
										class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
										:href="route('admin.events.index')"
									>All Events</inertia-link>

									<inertia-link
										class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
										href="#"
									>Notifications</inertia-link>
									<inertia-link
										class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
										href="/settings"
									>Settings</inertia-link>

									<div class="border-t my-1 border-gray-200"></div>

									<inertia-link
										class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
										:href="route('logout')"
										method="post"
									>Logout</inertia-link>
								</div>
							</template>
						</dropdown>
					</template>
					<template v-else>
						<inertia-link
							href="/login"
							class="px-4 py-5 mr-3 inline-block font-medium text-gray-600 hover:text-orange-600"
						>Log in</inertia-link>
						<loading-button tag="inertia-link" to="/register" variant="warning" size="small">Sign up</loading-button>
					</template>
				</div>
			</div>

			<div class="md:hidden flex justify-between">
				<inertia-link
					href="/"
					:class="
                        isUrl('')
                            ? 'text-orange-600 menu-active-2'
                            : 'text-gray-500'
                    "
					class="flex-1 px-2 py-2 truncate inline-block font-medium text-xs text-center hover:text-orange-600"
				>
					<unicon
						name="home-alt"
						class="fill-current mx-auto"
						fill="currentColor"
						width="24"
						height="24"
					></unicon>
					<span class="block leading-none mt-2">Home</span>
				</inertia-link>
				<inertia-link
					href="/events"
					:class="
                        isUrl('events')
                            ? 'text-orange-600 menu-active-2'
                            : 'text-gray-500'
                    "
					class="flex-1 px-2 py-2 truncate inline-block font-medium text-xs text-center hover:text-orange-600"
				>
					<unicon
						name="location-point"
						class="fill-current mx-auto"
						fill="currentColor"
						width="24"
						height="24"
					></unicon>
					<span class="block leading-none mt-2">Events</span>
				</inertia-link>
				<inertia-link
					href="/this-month"
					:class="
                        isUrl('this-month')
                            ? 'text-orange-600 menu-active-2'
                            : 'text-gray-500'
                    "
					class="flex-1 px-2 py-2 truncate inline-block font-medium text-xs text-center hover:text-orange-600"
				>
					<unicon name="fire" class="fill-current mx-auto" fill="currentColor" width="24" height="24"></unicon>
					<span class="block leading-none mt-2">This Month</span>
				</inertia-link>
				<!-- <inertia-link
                    href="#"
                    class="flex-1 px-4 py-2 truncate inline-block font-medium text-xs text-gray-500 hover:text-orange-600"
                >
                    <unicon
                        name="user"
                        class="fill-current mx-auto"
                        fill="currentColor"
                        width="24"
                        height="24"
                    ></unicon>
                    <span class="block leading-none mt-2">Account</span>
				</inertia-link>-->
				<inertia-link
					href="#"
					class="flex-1 px-2 py-2 truncate inline-block font-medium text-xs text-center text-gray-500 hover:text-orange-600"
				>
					<unicon name="ticket" class="fill-current mx-auto" fill="currentColor" width="24" height="24"></unicon>
					<span class="block leading-none mt-2">Tickets</span>
				</inertia-link>
				<!-- <inertia-link
                    v-if="$page.auth.user"
                    href="/dashboard"
                    :class="
                        isUrl('dashboard')
                            ? 'text-orange-600 menu-active-2'
                            : 'text-gray-500'
                    "
                    class="py-2 truncate inline-block font-medium text-xs hover:text-orange-600"
                >
                    <unicon
                        name="dashboard"
                        class="fill-current mx-auto"
                        fill="currentColor"
                        width="24"
                        height="24"
                    ></unicon>
                    <span class="block mt-2 leading-none">Dashboard</span>
				</inertia-link>-->
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

		<div class="main flex-1">
			<slot />
		</div>

		<div class="px-4 lg:px-6 py-16" style="background: #26385D">
			<div class="container mx-auto">
				<div class="flex flex-wrap md:flex-1 -mx-4">
					<div class="w-1/2 md:w-1/3 px-4 mb-6">
						<heading class="mb-3" size="small-caps">Grab Your Event</heading>
						<inertia-link href="/about" class="block text-sm mb-2 hover:text-gray-500">About</inertia-link>

						<inertia-link
							href="/terms-of-services"
							class="block text-sm mb-2 hover:text-gray-500"
						>Terms of Services</inertia-link>
						<inertia-link
							href="/privacy-policy"
							class="block text-sm mb-2 hover:text-gray-500"
						>Privacy &amp; Policy</inertia-link>
						<!-- <inertia-link
                            href="/faq"
                            class="block text-sm mb-2 hover:text-gray-500"
						>Help</inertia-link>-->
					</div>

					<div class="w-1/2 md:w-1/3 px-4 mb-6">
						<heading class="mb-3" size="small-caps">Help</heading>
						<!-- <a
                            href="#"
                            class="block text-sm mb-2 hover:text-gray-500"
                            >Selling your tickets</a
						>-->
						<inertia-link href="/faq" class="block text-sm mb-2 hover:text-gray-500">FAQ</inertia-link>
						<inertia-link href="/contact-us" class="block text-sm mb-2 hover:text-gray-500">Contact us</inertia-link>
						<!-- <a
                            href="#"
                            class="block text-sm mb-2 hover:text-gray-500"
                            >Payment</a
                        >
                        <a
                            href="#"
                            class="block text-sm mb-2 hover:text-gray-500"
                            >Extra Service</a
						>-->
					</div>

					<!-- <div class="w-1/2 md:w-1/3 px-4 mb-6">
                        <heading class="mb-3" size="small-caps"
                            >Join us</heading
                        >
                        <a
                            href="#"
                            class="block text-sm mb-2 hover:text-gray-500"
                            >Discover</a
                        >
                        <a
                            href="#"
                            class="block text-sm mb-2 hover:text-gray-500"
                            >Sell Tickets</a
                        >
                        <a
                            href="#"
                            class="block text-sm mb-2 hover:text-gray-500"
                            >Buy Tickets</a
                        >
					</div>-->

					<div class="w-1/2 md:w-1/3 px-4 mb-6">
						<heading class="mb-3" size="small-caps">Get Connected</heading>
						<a href="https://www.facebook.com/grabyourevent" class="block text-sm mb-2 hover:text-gray-500">Facebook</a>
						<a href="https://twitter.com/grabyourevent" class="block text-sm mb-2 hover:text-gray-500">Twitter</a>
						<!-- <a href="#" class="block text-sm mb-2 hover:text-gray-500">Instagram</a> -->
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
	</main>
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

			return urls.filter(
				url =>
					// location.pathname.substr(1).startsWith(url)
					location.pathname.substr(1) == url
			).length;
		}
	}
};
</script>
