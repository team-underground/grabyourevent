<template>
	<div class="flex flex-wrap -mx-4 mb-4">
		<div class="w-1/2 px-4 mb-4">
			<text-input
				label="Category Name"
				placeholder="e.g. Camping with breakfast Ticket"
				v-model="category.category_name"
				:errors="errors['category_name']"
				@keydown="delete errors['category_name']"
			></text-input>
		</div>
		<div class="w-1/2 px-4 mb-4">
			<text-input
				label="Ticket Price"
				placeholder="e.g. 1000"
				v-model="category.category_price"
				:errors="errors['category_price']"
				@keydown="delete errors['category_price']"
			></text-input>
		</div>
		<div class="w-full px-4 mb-4">
			<simple-editor
				label="Category Description"
				placeholder="e.g. Guwahati"
				v-model="category.category_description"
				:errors="errors['category_description']"
			></simple-editor>
		</div>
		<div class="w-1/2 px-4 mb-4">
			<text-input
				label="No of Tickets available"
				placeholder="e.g. 100"
				v-model="category.no_of_tickets_available"
				:errors="errors['no_of_tickets_available']"
				@keydown="delete errors['no_of_tickets_available']"
			></text-input>
		</div>
		<div class="w-full px-4">
			<loading-button
				size="small"
				ref="categoryCreateButton"
				class="mt-2 md:mt-0"
				@click="storeCategory"
			>Create Category</loading-button>
		</div>
	</div>
</template>

<script>
import { EventBus } from "@/EventBus.js";

import TextInput from "@/Shared/tuis/TextInput";
import SimpleEditor from "@/Shared/tuis/SimpleEditor";
import LoadingButton from "@/Shared/tuis/LoadingButton";

export default {
	components: {
		TextInput,
		SimpleEditor,
		LoadingButton
	},
	data() {
		return {
			category: {
				category_name: "Camping with breakfast Ticket",
				category_description:
					'<p><span style="color: rgb(51, 51, 51);">*Minimum no. of bookings required - 2 Nights</span></p><p><span style="color: rgb(51, 51, 51);">*Each ticket permits a single person for one night</span></p><p><span style="color: rgb(51, 51, 51);">Camping with breakfast includes- Daily Breakfast, Tent on sharing, sleeping mat, sleeping bag or blankets.</span></p>',
				category_price: "1000",
				no_of_tickets_available: "50"
			}
		};
	},
	props: ["errors"],

	methods: {
		storeCategory() {
			if (
				Object.values(this.category).every(
					value => value != "" || value == null
				)
			) {
				EventBus.$emit("ticket_category", {
					category: this.category
				});
			}
		}
	}
};
</script>

<style>
</style> 