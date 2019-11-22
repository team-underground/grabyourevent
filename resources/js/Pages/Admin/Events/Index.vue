<template>
	<layout>
		<div class="bg-white px-4 pt-6 py-4 relative shadow-sm z-20">
			<div class="max-w-6xl mx-auto">
				<link-to :to="route('dashboard')" class="mb-2" tag="inertia-link">
					<icon name="chevron-left" class="-ml-2"></icon>Back to Dashboard
				</link-to>
				<div class="flex justify-between items-center">
					<heading size="heading">All Events</heading>

					<div class="flex">
						<search-input v-model="form.search" placeholder="Search by event name..." class="mr-2"></search-input>

						<loading-button size="small" :to="route('admin.events.create')" tag="inertia-link">
							<icon name="plus"></icon>
							<span class="hidden md:block">Create Event</span>
						</loading-button>
					</div>
				</div>
			</div>
		</div>

		<div class="py-10">
			<div class="max-w-6xl mx-auto">
				<alert class="mb-4" v-if="events.data.length">
					<strong>Note:</strong> It will take less than 24 hours for the moderation process to get completed and then only will be published on the website.
				</alert>

				<div class="relative">
					<div class="absolute fixed top-0 bottom-0 right-0 w-6 bg-white-linear rounded-r-lg opacity-75"></div>
					<basic-table :headings="headings" v-if="events.data.length">
						<tr
							v-for="(data, dataIndex) in events.data"
							:key="dataIndex"
							class="focus-within:bg-gray-200 overflow-hidden"
						>
							<td class="border-t">
								<link-to
									tag="inertia-link"
									:to="route('admin.events.edit',`${data.uuid}`)"
									class="inline-block truncate mr-2 mx-6"
								>{{ data.event_id }}</link-to>
							</td>
							<td class="border-t">
								<span class="text-gray-700 px-6 py-4 flex items-center">{{ data.created_at }}</span>
							</td>
							<td class="border-t">
								<span class="text-gray-700 px-6 py-4 flex items-center">{{ data.event_name }}</span>
							</td>
							<td class="border-t">
								<span
									class="text-gray-700 px-6 py-4 flex items-center"
								>{{ data.event_published_at_formatted }}</span>
							</td>

							<td class="border-t">
								<span class="text-gray-700 px-6 py-4 flex items-center">
									<badge variant="warning" v-if="data.event_status === 'Moderation'">{{ data.event_status }}</badge>
									<badge variant="success" v-if="data.event_status === 'Published'">{{ data.event_status }}</badge>
								</span>
							</td>
							<td class="border-t">
								<span class="text-gray-700 px-6 py-4 flex items-center">{{ data.event_location }}</span>
							</td>
							<td class="border-t">
								<span class="text-gray-700 px-6 py-4 flex items-center">{{ data.event_category }}</span>
							</td>
						</tr>
					</basic-table>
					<empty-state class="lg:py-32" v-else>
						<div
							class="w-24 h-24 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-center mx-auto"
						>
							<icon name="search" class="w-8 h-8"></icon>
						</div>

						<heading class="mt-5 mb-1" size="heading">No Events created by you</heading>

						<loading-button
							tag="inertia-link"
							:to="route('admin.events.create')"
							size="small"
							class="mt-6"
						>
							<icon name="plus" class="mr-1"></icon>Create Event
						</loading-button>
					</empty-state>
				</div>

				<div
					class="flex items-center justify-between mt-8"
					v-if="events.prev_page_url != null || events.next_page_url != null"
				>
					<div>
						<loading-button
							v-if="events.prev_page_url == null"
							tag="inertia-link"
							:to="events.prev_page_url"
							size="small"
							variant="secondary"
							variant-type="outline"
							class="cursor-not-allowed"
						>
							<icon name="chevron-left"></icon>Previous
						</loading-button>
						<loading-button
							class="bg-secondary-400 border-secondary-400 hover:bg-secondary-500 hover:border-secondary-500"
							v-else
							tag="inertia-link"
							:to="events.prev_page_url"
							size="small"
						>
							<icon name="chevron-left"></icon>Previous
						</loading-button>
					</div>
					<div>
						<heading size="small">
							{{ events.from }} to
							{{ events.to }}
						</heading>
					</div>
					<div>
						<loading-button
							v-if="events.next_page_url == null"
							tag="inertia-link"
							:to="events.next_page_url"
							size="small"
							variant="secondary"
							variant-type="outline"
							class="cursor-not-allowed"
						>
							Next
							<icon name="chevron-right"></icon>
						</loading-button>
						<loading-button
							class="bg-secondary-400 border-secondary-400 hover:bg-secondary-500 hover:border-secondary-500"
							v-else
							tag="inertia-link"
							:to="events.next_page_url"
							:disabled=" events.next_page_url == null"
							size="small"
						>
							Next
							<icon name="chevron-right"></icon>
						</loading-button>
					</div>
				</div>
			</div>
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import Heading from "@/Shared/tuis/Heading";
import Icon from "@/Shared/tuis/Icon";
import LinkTo from "@/Shared/tuis/LinkTo";
import Card from "@/Shared/tuis/Card";
import SearchInput from "@/Shared/tuis/SearchInput";
import LoadingButton from "@/Shared/tuis/LoadingButton";
import SwitchInput from "@/Shared/tuis/SwitchInput";
import DateInput from "@/Shared/tuis/DateInput";
import Alert from "@/Shared/tuis/Alert";
import BasicTable from "@/Shared/tuis/BasicTable";
import Badge from "@/Shared/tuis/Badge";
import EmptyState from "@/Shared/tuis/EmptyState";

import _ from "lodash";

export default {
	components: {
		Layout,
		Heading,
		Icon,
		LinkTo,
		Card,
		SearchInput,
		LoadingButton,
		SwitchInput,
		DateInput,
		Alert,
		BasicTable,
		Badge,
		EmptyState
	},
	props: ["events", "filters"],

	watch: {
		form: {
			handler: _.throttle(function() {
				let query = _.pickBy(this.form);
				this.$inertia.replace(
					this.route(
						"admin.events.index",
						Object.keys(query).length
							? query
							: { remember: "forget" }
					)
				);
			}, 150),
			deep: true
		}
	},

	data() {
		return {
			form: {
				search: this.filters.search
			},
			headings: [
				"Event Id",
				"Created On",
				"Event Name",
				"Published at",
				"Status",
				"Location",
				"Type"
			]
		};
	},
	methods: {}
};
</script>

<style>
.bg-white-linear {
	background: linear-gradient(to right, white, #f7fafc);
}
</style>

 