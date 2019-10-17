<template>
	<div>
		<div class="relative px-4 lg:px-6 md:py-16 lg:py-24 bg-gray-100">
			<div class="absolute left-0 right-0 top-0 bg-white">
				<div class="container px-4 mx-auto py-6">
					<div class="flex items-center justify-between">
						<div>
							<link-to to="/">
								<unicon name="angle-left" fill="currentColor"></unicon>Back to Website
							</link-to>
						</div>
						<div>
							Already have an account?
							<link-to to="/login">Log in</link-to>
						</div>
					</div>
				</div>
			</div>

			<div class="max-w-5xl mx-auto w-full py-10">
				<card :is-padding="false" class="shadow-md">
					<div class="md:flex md:flex-wrap md:flex-1 -mx-4">
						<div class="md:w-1/2 px-4">
							<div class="p-8">
								<heading size="heading2" class="mb-1">Create an account. It's free.</heading>
								<heading class="mb-6">
									Already have an account.
									<link-to to="#">Log in to continue</link-to>
								</heading>
								<text-input label="Full Name" class="mb-4" placeholder="eg. John Rambo"></text-input>

								<text-input label="Email" class="mb-4" placeholder="eg. john@rambo.test"></text-input>

								<text-input
									label="Password"
									type="password"
									class="mb-5"
									placeholder="Must be atleast 8 characters"
								></text-input>

								<text-input
									label="Confirm Password"
									type="password"
									class="mb-5"
									placeholder="Must be atleast 8 characters"
								></text-input>

								<loading-button ref="submitButton" class="w-full" variant="warning">Let's get started</loading-button>

								<!-- <div class="px-4 py-3 bg-orange-100 rounded-lg mt-6">
									<heading size="small">
										By creating an account you agree to Apoint's
										<link-to to="#">Terms of Service</link-to>and
										<link-to to="#">Privacy Policy</link-to>.
									</heading>
								</div>-->

								<alert :with-icon="false" variant="warning" class="mt-6">
									By creating an account you agree to Happenings
									<link-to to="#">Terms of Service</link-to>&nbsp;and
									<link-to to="#">Privacy Policy</link-to>.
								</alert>
							</div>
						</div>

						<div class="md:w-1/2 px-4 bg-orange-100 hidden md:block">
							<div class="p-8 relative h-full overflow-hidden">
								<heading size="heading" class="mb-4 mt-10">Why register?</heading>

								<list :lists="listItems" unordered-list-color="text-orange-400" class="mt-4"></list>

								<img
									src="/banner.svg"
									alt
									class="absolute left-0 right-0 bottom-0 mx-auto -mb-2"
									width="400"
									height="250"
								/>
							</div>
						</div>
					</div>
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
import List from "@/Shared/tuis/List";
import Alert from "@/Shared/tuis/Alert";

export default {
	components: {
		Layout,
		Card,
		Heading,
		LinkTo,
		LoadingButton,
		TextInput,
		List,
		Alert
	},

	data() {
		return {
			listItems: [
				"Can book a ticket",
				"Recieve Email/SMS notifications",
				"Get discount coupons / goodies occationally",
				"Get Email/SMS alerts before event date"
			]
		};
	}
};
</script>

 