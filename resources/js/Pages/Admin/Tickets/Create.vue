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
				v-numeric-float
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
				v-numeric-only
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
				category_name: "",
				category_description: "",
				category_price: "",
				no_of_tickets_available: ""
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

				this.category.category_name = "";
				this.category.category_description = "";
				this.category.category_price = "";
				this.category.no_of_tickets_available = "";
			}
		}
	}
};
</script>

<style>
</style> 