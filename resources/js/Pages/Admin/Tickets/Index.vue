<template>
	<div>
		<basic-table :headings="headings" v-if="categories.length">
			<tr
				v-for="(category, categoryIndex) in categories"
				:key="categoryIndex"
				class="focus-within:bg-gray-200 overflow-hidden"
			>
				<td class="border-t">
					<span class="text-gray-700 px-6 py-4 flex items-center">{{ category.category_name }}</span>
				</td>
				<!-- <td class="border-t">
					<span class="text-gray-700 px-6 py-4 flex items-center" v-html="category.category_description"></span>
				</td>-->
				<td class="border-t">
					<span class="text-gray-700 px-6 py-4 flex items-center">{{ category.category_price }}</span>
				</td>
				<td class="border-t">
					<span class="text-gray-700 px-6 py-4 flex items-center">{{ category.no_of_tickets_available }}</span>
				</td>
				<td class="border-t">
					<loading-button
						type="button"
						size="small"
						variant="danger"
						variant-type="outline"
						ref="deleteCategoryButton"
						@click="deleteCategory(categoryIndex)"
					>
						<icon name="trash"></icon>
					</loading-button>
				</td>
			</tr>
		</basic-table>
	</div>
</template>

<script>
import { EventBus } from "@/EventBus.js";
import BasicTable from "@/Shared/tuis/BasicTable";
import LoadingButton from "@/Shared/tuis/LoadingButton";
import Icon from "@/Shared/tuis/Icon";

export default {
	components: {
		BasicTable,
		LoadingButton,
		Icon
	},
	data() {
		return {
			headings: ["Category Name", "Price", "No of tickets", "Action"]
		};
	},
	props: ["categories"],
	methods: {
		deleteCategory(index) {
			EventBus.$emit("ticket_delete_index", {
				index: index
			});
		}
	}
};
</script>

<style>
</style>template