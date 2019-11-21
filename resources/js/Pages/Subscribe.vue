<template>
	<layout>
		<div class="px-4 lg:px-6 pt-16 pb-10 bg-gray-100">
			<div class="max-w-4xl mx-auto">
				<alert>
					<strong>Note:</strong> We are working hard to make the registration process ready as early as possible. Meanwhile, you can subscribe to our newsletter and get the latest event news happening in and around your nearby places straight in your inbox.
				</alert>

				<div class="shadow-md rounded-lg my-10 bg-white overflow-hidden md:px-4">
					<!-- <div class="h-2 diagonal-stripe rounded-t-lg"></div> -->
					<subscription-form class="rounded-lg"></subscription-form>
				</div>
			</div>
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import Alert from "@/Shared/tuis/Alert";
import SubscriptionForm from "./Front/Subscription";

export default {
	components: {
		Layout,
		Alert,
		SubscriptionForm
	}
};
</script>

<style scoped>
.diagonal-stripe {
	background: repeating-linear-gradient(
		-45deg,
		#ffffff,
		#ffffff 16px,
		#f6ad55 16px,
		#f6ad55 32px
	);
}
</style>