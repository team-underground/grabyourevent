<template>
	<layout>
		<div class="bg-orange-100 pt-8 md:pt-10 px-4">
			<div class="max-w-5xl mx-auto">
				<div class="flex items-center overflow-hidden">
					<div class="w-2/3">
						<heading size="small-caps" class="mb-1 text-orange-500">All About</heading>
						<heading size="display" class="mb-4">Grab Your Event</heading>
					</div>
					<div class="w-1/3 border-b-2 border-orange-200 relative">
						<div
							class="mx-auto w-32 h-32 md:w-64 md:h-64 bg-orange-200 relative rounded-full overflow-hidden -mb-6 md:-mb-10"
						>
							<img
								src="/Frame.svg"
								alt="working"
								class="object-cover w-64 mx-auto -mr-4 absolute left-0 right-0 bottom-0"
							/>
						</div>
						<!-- <img src="/focus_working.svg" alt="working" class="object-cover w-64 mx-auto -mb-6 md:-mb-10" /> -->
					</div>
				</div>
			</div>
		</div>

		<div class="py-10 px-4">
			<div class="max-w-5xl mx-auto">
				<heading
					class="md:w-2/3 mb-4"
				>Grabyourevent is a global platform for live experiences that allows anyone to create, share, find and attend events that fuel their passions and enrich their lives. From music festivals, marathons, conferences, community rallies, and fundraisers, to gaming competitions and air guitar contests. Our mission is to bring the world together through live experiences.</heading>

				<heading
					class="md:w-2/3 mb-10"
				>Grabyourevent is a global platform for live experiences that allows anyone to create, share, find and attend events that fuel their passions and enrich their lives. From music festivals, marathons, conferences, community rallies, and fundraisers, to gaming competitions and air guitar contests. Our mission is to bring the world together through live experiences.</heading>

				<div class="flex -mx-4 mb-10">
					<div class="w-1/3 px-4">
						<div
							class="flex w-16 h-16 items-center justify-center text-orange-500 bg-orange-200 mb-4 rounded-large"
						>
							<unicon name="ticket" fill="currentColor" width="24" height="24"></unicon>
						</div>
						<heading size="large" class="mb-4">Buy Tickets</heading>
						<heading>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus ipsam eius cum qui, delectus minus ut excepturi, consectetur nostrum corrupti, dolorem et dicta cumque? Sequi blanditiis optio laborum voluptatem iure?</heading>
					</div>

					<div class="w-1/3 px-4">
						<div
							class="flex w-16 h-16 items-center justify-center text-orange-500 bg-orange-200 mb-4 rounded-large"
						>
							<unicon name="money-stack" fill="currentColor" width="24" height="24"></unicon>
						</div>
						<heading size="large" class="mb-4">Sell Tickets</heading>
						<heading>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus ipsam eius cum qui, delectus minus ut excepturi, consectetur nostrum corrupti, dolorem et dicta cumque? Sequi blanditiis optio laborum voluptatem iure?</heading>
					</div>

					<div class="w-1/3 px-4">
						<div
							class="flex w-16 h-16 items-center justify-center text-orange-500 bg-orange-200 mb-4 rounded-large"
						>
							<unicon name="bolt-alt" fill="currentColor" width="24" height="24"></unicon>
						</div>
						<heading size="large" class="mb-4">Get Sponsored</heading>
						<heading>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus ipsam eius cum qui, delectus minus ut excepturi, consectetur nostrum corrupti, dolorem et dicta cumque? Sequi blanditiis optio laborum voluptatem iure?</heading>
					</div>
				</div>
			</div>
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