<template>
	<layout>
		<div class="max-w-4xl mx-auto py-10">
			<heading size="heading" class="mb-4">Notifications</heading>
			<card class="py-24 text-center">
				<div
					class="w-16 h-16 inline-flex items-center justify-center mx-auto bg-orange-100 rounded-full"
				>
					<unicon name="bell" class="text-orange-500" fill="currentColor" width="32" height="32"></unicon>
				</div>

				<heading class="mt-4">No current notifications!</heading>
			</card>
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import Heading from "@/Shared/tuis/Heading";
import Card from "@/Shared/tuis/Card";
import LinkTo from "@/Shared/tuis/LinkTo";

export default {
	components: {
		Layout,
		Heading,
		Card,
		LinkTo
	}
};
</script>

<style lang="scss" scoped>
</style>