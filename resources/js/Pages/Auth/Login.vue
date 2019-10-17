<template>
	<div>
		<div class="relative px-4 lg:px-6 md:py-16 lg:py-24 bg-gray-100 h-screen flex items-center">
			<div class="absolute left-0 right-0 top-0 bg-white">
				<div class="container px-4 mx-auto py-6">
					<div class="flex items-center justify-between">
						<div>
							<link-to to="/">
								<unicon name="angle-left" fill="currentColor"></unicon>Back to Website
							</link-to>
						</div>
						<div>
							Don't have an account?
							<link-to to="#">Create Account</link-to>
						</div>
					</div>
				</div>
			</div>

			<div class="max-w-md mx-auto w-full">
				<card>
					<!-- <div class="md:flex md:flex-wrap md:flex-1 -mx-4"> -->
					<!-- <div class="md:w-1/2 px-4 bg-orange-100 hidden md:block">
							<div class="p-8 relative h-full overflow-hidden">
								<heading size="heading2" class="mb-2">Welcome back!</heading>
								<heading class="mb-1">
									Never miss an event near you. Discover hot events happening
									in &amp; around Northeast.
								</heading>

								<img
									src="/banner.svg"
									alt
									class="absolute left-0 right-0 bottom-0 mx-auto -mb-2"
									width="300"
									height="150"
								/>
							</div>
					</div>-->

					<!-- <div class="md:w-1/2 px-4"> -->

					<heading size="heading2" class="mb-1 text-center">Welcome back</heading>
					<heading class="mb-6 text-center" size="small">Please enter your email and password to continue</heading>
					<text-input class="mb-4" with-icon placeholder="Email address">
						<template #icon>
							<unicon name="envelope" fill="#ddd" width="30" height="30" class="mt-2"></unicon>
						</template>
					</text-input>

					<div class="relative">
						<text-input type="password" class="mb-5" with-icon placeholder="Password">
							<template #icon>
								<unicon name="lock" fill="#ddd" width="30" height="30" class="mt-2"></unicon>
							</template>
						</text-input>
					</div>
					<loading-button ref="submitButton" class="w-full" variant="warning">Sign in</loading-button>

					<a class="text-gray-500 hover:text-orange-700 block mt-4" href="#">Forgot Password?</a>

					<!-- </div>
					</div>-->
					<!-- <template #footer>
						<heading class="py-2 text-center">
							Don't have an account?
							<link-to to="#">Create Account</link-to>
						</heading>
					</template>-->
				</card>
				<div class="text-center mt-4 text-sm text-gray-500">2019 &copy; Happenings</div>
			</div>
		</div>
	</div>
</template>

<script>
import Layout from "@/Shared/Layout";
import Heading from "@/Shared/tuis/Heading";
import Card from "@/Shared/tuis/Card";
import LinkTo from "@/Shared/tuis/LinkTo";
import LoadingButton from "@/Shared/tuis/LoadingButton";
import TextInput from "@/Shared/tuis/TextInput";

export default {
	components: {
		Layout,
		Card,
		Heading,
		LinkTo,
		LoadingButton,
		TextInput
	}
};
</script>

 