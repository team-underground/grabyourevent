<template>
	<layout>
		<div class="px-4 lg:px-6 py-5 md:py-10 bg-gray-100">
			<div class="max-w-3xl mx-auto">
				<template v-for="(ticket, index) in ticket_categories">
					<buy-now-card :singleticket="ticket" :key="index"></buy-now-card>
					<hr
						class="border-b border-gray-300"
						:key="index"
						v-if="index != Object.keys(ticket_categories).length - 1"
					/>
				</template>
			</div>
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import BuyNowCard from "@/Pages/Front/BuyTickets/Card";

export default {
	components: {
		Layout,
		BuyNowCard
	},

	props: {
		ticket_categories: Array
	}
};
</script>
 