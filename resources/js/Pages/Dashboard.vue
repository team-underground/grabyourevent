<template>
	<layout>
		<div class="px-4 md:px-0">
			<heading
				size="large"
				class="my-4 md:hidden"
				v-if="$page.auth.user"
			>Welcome, {{ $page.auth.user.name }}</heading>
			<div class="rounded-lg md:rounded-0 bg-white relative shadow-sm z-20">
				<div class="md:max-w-6xl mx-auto">
					<div class="flex flex-wrap md:justify-center">
						<inertia-link
							class="w-1/3 md:w-1/6 md:border-transparent py-5 text-center px-4 flex flex-col hover:text-orange-600 items-center justify-center"
							:href="route('admin.events.index')"
						>
							<icon name="briefcase"></icon>
							<div class="mt-2 text-sm">Events</div>
						</inertia-link>

						<a
							class="w-1/3 md:w-1/6 border-l md:border-transparent py-5 text-center px-4 flex flex-col hover:text-orange-600 items-center justify-center"
							href="/admin/users"
							v-if="can['modify-user']"
						>
							<icon name="users"></icon>
							<div class="mt-2 text-sm">Users</div>
						</a>

						<!-- <a
                        class="w-1/3 md:w-1/6 border-l border-b md:border-transparent py-5 text-center px-4 flex flex-col hover:text-orange-600 items-center justify-center"
                        href="#"
                    >
                        <icon name="bell"></icon>
                        <div class="mt-2 text-sm">Notifications</div>
						</a>-->

						<!-- <a
                        class="w-1/3 md:w-1/6 border-l md:border-transparent py-5 text-center px-4 flex flex-col hover:text-orange-600 items-center justify-center"
                        href="#"
                    >
                        <icon name="message"></icon>
                        <div class="mt-2 text-sm">Feedback</div>
						</a>-->

						<inertia-link
							class="w-1/3 md:w-1/6 border-l md:border-transparent py-5 text-center px-4 flex flex-col hover:text-orange-600 items-center justify-center"
							href="/settings"
						>
							<icon name="settings"></icon>
							<div class="mt-2 text-sm">Settings</div>
						</inertia-link>
					</div>
				</div>
			</div>
		</div>

		<div class="py-10 px-4">
			<div class="max-w-6xl mx-auto">
				<template v-if="Object.keys(total_counts).length > 0">
					<heading size="heading" class="mb-6">Page views Analytics</heading>
					<card class="mb-10">
						<page-views :total="total_counts" :unique="unique_counts"></page-views>
					</card>
				</template>

				<heading size="heading" class="mb-6" v-if="events.length">Page Views</heading>

				<div class="relative mb-10">
					<div class="absolute fixed top-0 bottom-0 right-0 w-6 bg-white-linear rounded-r-lg opacity-75"></div>
					<basic-table :headings="headings" v-if="events.length" theme="striped">
						<tr
							v-for="(data, dataIndex) in events"
							:key="dataIndex"
							class="focus-within:bg-gray-200 overflow-hidden"
						>
							<td class="border-t">
								<!-- <span
										:title="data.job_title"
										class="text-gray-700 px-6 py-4 items-center block w-64 truncate pr-3"
								>{{ data.job_title }}</span>-->
								<link-to
									tag="inertia-link"
									:to="
                                        route(
                                            'admin.events.edit',
                                            `${data.uuid}`
                                        )
                                    "
									class="truncate mr-2 mx-6 w-64"
									display="block"
								>{{ data.event_name }}</link-to>
							</td>
							<td class="border-t">
								<span
									class="text-gray-700 px-6 py-4 flex items-center"
								>{{ data.event_published_at_formatted }}</span>
							</td>
							<td class="border-t">
								<span
									class="text-gray-700 px-6 py-4 flex items-center justify-end"
								>{{ data.total_page_views }}</span>
							</td>
							<td class="border-t">
								<span
									class="text-gray-700 px-6 py-4 flex items-center justify-end"
								>{{ data.unique_page_views }}</span>
							</td>
						</tr>
					</basic-table>

					<empty-state class="lg:py-32" v-else>
						<div
							class="w-24 h-24 bg-blue-100 text-orange-600 rounded-full flex items-center justify-center text-center mx-auto"
						>
							<icon name="search" class="w-8 h-8"></icon>
						</div>

						<heading class="mt-5 mb-1" size="heading">No Open Events</heading>

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
import BasicTable from "@/Shared/tuis/BasicTable";
import Badge from "@/Shared/tuis/Badge";
import EmptyState from "@/Shared/tuis/EmptyState";
import LoadingButton from "@/Shared/tuis/LoadingButton";
import PageViews from "@/Pages/Charts/PageViews";

export default {
	props: ["can", "events", "unique_counts", "total_counts"],
	components: {
		Layout,
		Heading,
		Icon,
		LinkTo,
		Card,
		BasicTable,
		Badge,
		EmptyState,
		LoadingButton,
		PageViews
	},
	data() {
		return {
			headings: [
				"Event Name",
				"Published at",
				{
					title: "Total Page Views",
					type: "number",
					align: "right"
				},
				{
					title: "Unique Page Views",
					type: "number",
					align: "right"
				}
			]
		};
	}
};
</script>
