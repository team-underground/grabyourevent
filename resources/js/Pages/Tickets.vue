<template>
	<layout>
		<div class="bg-orange-100 pt-8 md:pt-10 px-4">
			<div class="max-w-5xl mx-auto">
				<div class="flex items-center overflow-hidden">
					<div class="w-2/3">
						<heading size="small-caps" class="mb-1 text-orange-500">Get my</heading>
						<heading size="display" class="mb-4">Tickets</heading>
					</div>
					<div class="w-1/3 border-b-2 border-orange-200 relative">
						<div
							class="mx-auto w-32 h-32 md:w-64 md:h-64 bg-orange-200 relative rounded-full overflow-hidden -mb-6 md:-mb-10"
						>
							<img
								src="/folder.svg"
								alt="folder"
								class="object-cover w-64 mx-auto absolute left-0 right-0 bottom-0 -mb-5"
							/>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="py-4 md:py-16">
			<div class="max-w-3xl mx-auto">
				<card :is-padding="false"></card>
			</div>
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import Heading from "@/Shared/tuis/Heading";
import Card from "@/Shared/tuis/Card";
import LinkTo from "@/Shared/tuis/LinkTo";
import Accordion from "@/Shared/tuis/Accordion";

export default {
	components: {
		Layout,
		Heading,
		Card,
		LinkTo,
		Accordion
	}
};
</script>