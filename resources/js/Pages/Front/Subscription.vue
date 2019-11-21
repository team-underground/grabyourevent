<template>
	<div class="relative bg-white py-16 overflow-hidden px-4">
		<div class="max-w-5xl mx-auto">
			<div class="-mx-4 flex items-center">
				<div class="w-2/3 px-4">
					<div class="md:pr-10">
						<heading size="heading2" class="mb-2">Join Our Newsletter</heading>
						<heading class="mb-6">
							And get the latest event news
							happening in and around your nearby places. Stay tuned and never miss out on anything fun again.
						</heading>

						<div class="md:flex">
							<text-input placeholder="Enter your email address..." class="md:flex-1 md:mr-2"></text-input>
							<loading-button variant="warning" class="mt-2 md:mt-0 w-full md:w-auto">Subscribe Now</loading-button>
						</div>
						<div
							class="text-xs text-gray-500 mt-2 px-4 font-sans"
						>No spam. Only latest event related news.</div>
					</div>
				</div>
				<div class="w-1/3 px-4 text-center relative">
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
						class="hidden md:block w-48 absolute right-0 bottom-0 mr-24 -mb-8 z-10"
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

export default {
	components: {
		TextInput,
		LoadingButton,
		Heading
	}
};
</script>

<style scoped>
</style>
