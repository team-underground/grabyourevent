<template>
	<div class="relative bg-white py-8 md:py-16 overflow-hidden px-4" style="height:25rem;">
		<div class="max-w-5xl mx-auto">
			<div class="-mx-4 md:flex">
				<div class="md:w-2/3 px-4">
					<div class="md:pr-10">
						<heading size="heading2" class="mb-2">Join Our Newsletter</heading>
						<heading class="mb-6">
							And get the latest event news happening in and
							around your nearby places. Stay tuned and never miss
							out on anything fun again. No spam, guaranteed.
						</heading>

						<div class="md:flex -mx-2">
							<div class="flex-1 px-2">
								<text-input
									placeholder="Enter your email address..."
									class="md:flex-1 md:mr-2"
									v-model="email"
									:errors="errors['email']"
									@keydown="delete errors['email']"
								></text-input>
							</div>
							<div class="px-2">
								<loading-button
									variant="warning"
									class="mt-2 md:mt-0 w-full md:w-auto"
									@click.prevent="subscribe"
									ref="subscribeButton"
								>Subscribe Now</loading-button>
							</div>
						</div>
						<p
							class="md:w-2/3 text-xs mt-4 text-gray-500"
						>By subscribing you agree to the Terms of Service and Privacy Policy. You also agree to recieve product related emails from Jobs Harbour, which you can unsubscribe from at any time.</p>
					</div>
				</div>
				<div
					class="hidden -m-12 md:inline-block md:w-1/3 px-4 text-center relative mt-8 md:mt-0"
					style="height:18rem;"
				>
					<div
						class="z-20 mx-auto w-32 h-32 md:w-64 md:h-64 bg-orange-200 relative rounded-full overflow-hidden"
					>
						<img
							src="/peak_mountain.svg"
							alt="subscribe-email"
							class="z-20 object-cover object-center w-64 mx-auto -mb-6 absolute left-0 right-0 bottom-0"
						/>
					</div>

					<img
						src="/dot.svg"
						alt="dot-svg"
						class="hidden md:block w-48 absolute right-0 bottom-0 mr-24 z-10"
					/>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import TextInput from "@/Shared/tuis/TextInput";
import LoadingButton from "@/Shared/tuis/LoadingButton";
import Heading from "@/Shared/tuis/Heading";
import Alert from "@/Shared/tuis/Alert";

export default {
	components: {
		TextInput,
		LoadingButton,
		Heading,
		Alert
	},
	props: ["errors"],
	data() {
		return {
			isSubscribed: false,
			email: ""
		};
	},
	methods: {
		subscribe() {
			this.$refs.subscribeButton.startLoading();
			this.$inertia
				.post(
					"/subscriber",
					{
						email: this.email
					},
					{ preserveScroll: true }
				)
				.then(() => {
					this.$refs.subscribeButton.stopLoading();

					if (Object.keys(this.$page.errors).length === 0) {
						this.email = "";
						this.isSubscribed = true;

						this.$swal({
							type: "success",
							title: "Thank You!",
							html:
								"Now stay tuned for all the good things <br> related to events in your inbox."
						});
					}
					// this.$refs.subscribeButton.stopLoading();
					// if (Object.keys(this.$page.errors).length === 0) {
					// 	this.email = "";
					// 	this.isSubscribed = true;
					// 	this.$swal({
					// 		type: "success",
					// 		title: "Thank You!",
					// 		html:
					// 			"Now stay tuned for all the good things <br> related to Eventeefied events in your inbox."
					// 	});
					// }
				});
		}
	}
};
</script>

<style scoped>
.swal2-popup,
.swal2-styled.swal2-confirm {
	border-radius: 0.625em !important;
}
.swal2-content {
	color: #718096 !important;
	font-size: 1rem !important;
}
</style>
