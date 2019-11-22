<template>
	<layout>
		<div class="bg-white px-4 pt-6 pb-4 relative shadow-sm z-20">
			<div class="max-w-6xl mx-auto">
				<link-to tag="inertia-link" :to="route('admin.events.index')" class="mb-2">
					<icon name="chevron-left" class="-ml-2"></icon>Back to Events
				</link-to>
				<div class="md:flex items-center">
					<div class="flex-1">
						<heading size="heading" class="inline-flex mr-1">Edit Event #{{ event.event_id }}</heading>
						<badge
							variant="success"
							v-if="event.event_status === 'Published'"
							class="ml-3"
						>{{ event.event_status }}</badge>
						<badge variant="warning" v-if="event.event_status === 'Moderation'">{{ event.event_status }}</badge>
					</div>
					<div class="flex">
						<loading-button
							type="button"
							size="small"
							ref="eventPublishButton"
							variant="success"
							@click="publishEvent"
							v-if="can['publish-event']"
						>Publish Event</loading-button>

						<loading-button
							type="submit"
							size="small"
							ref="eventUpdateButton"
							@click="updateEvent"
						>Update Event</loading-button>

						<loading-button type="button" size="small" variant="danger" variant-type="outline">
							<icon name="trash"></icon>
						</loading-button>
					</div>
				</div>
			</div>
		</div>

		<div class="py-10">
			<div class="max-w-6xl mx-auto">
				<div class="md:flex -mx-4">
					<div class="px-4">
						<alert class="mb-4">
							<strong>Note:</strong> Event once created will go to the admin first for moderation and then only will be published on the website. It typically takes 24hrs for the moderation process to get completed.
						</alert>
						<div class="md:flex mb-10 -mx-4">
							<div class="md:w-1/3 mb-3 px-4">
								<heading size="large" class="mb-1">Event Basic Details</heading>
								<heading class="mb-4">This section contains the basic details of your event</heading>
							</div>
							<div class="md:w-2/3 px-4">
								<card>
									<div class="mb-4 h-30" v-if="event.event_image == null">
										<file-input
											v-model="form.event_image"
											label="Event Image"
											:errors="errors['event_image']"
										></file-input>
									</div>

									<div class="mb-4" v-else>
										<label class="block mb-1 font-semibold text-gray-700">Event Image</label>
										<div class="flex items-center">
											<div
												class="w-24 h-24 p-2 items-center justify-center rounded-full inline-flex bg-gray-100 mr-5 text-gray-400 shadow-inner"
											>
												<img
													:src="event.event_image_path"
													:alt="event.event_name"
													class="w-24 h-24 object-contain rounded-full border border-gray-100"
												/>
											</div>
											<div>
												<button
													type="button"
													class="rounded-lg px-5 py-2 bg-red-100 hover:bg-red-200 text-sm font-medium text-red-600"
													@click="deleteEventImage(event.uuid)"
												>Delete</button>
											</div>
										</div>
									</div>
									<text-input
										v-model="form.event_name"
										label="Name of Event"
										placeholder="eg. Bacardi NH7 Weekender 2019, Meghalaya"
										class="mb-4"
										:errors="errors['event_name']"
										@keydown="delete errors['event_name']"
									></text-input>
									<div class="flex -mx-4 mb-4">
										<date-input
											label="Event Start Date"
											class="w-48 px-4"
											placeholder="Select date"
											v-model="form.event_start_date"
											:errors="errors['event_starting_date']"
											@input="delete errors['event_starting_date']"
											readonly
										></date-input>
										<time-picker
											:minute-interval="15"
											label="Time"
											v-model="form.event_start_time"
											class="w-1/2 px-4"
											close-on-complete
											hide-clear-button
											readonly
										></time-picker>
									</div>
									<div class="flex -mx-4 mb-4">
										<date-input
											label="Event End Date"
											class="w-48 px-4"
											placeholder="Select date"
											v-model="form.event_end_date"
											:errors="errors['event_ending_date']"
											@input="delete errors['event_ending_date']"
											readonly
										></date-input>
										<time-picker
											:minute-interval="15"
											label="Time"
											v-model="form.event_end_time"
											class="w-1/2 px-4"
											close-on-complete
											hide-clear-button
											readonly
										></time-picker>
									</div>
									<div class="flex -mx-4 mb-4">
										<div class="px-4 w-1/2">
											<select-input
												v-model="form.event_category"
												label="Category"
												:options="categories"
												:errors="errors['event_category']"
												@keydown="delete errors['event_category']"
											>
												<option value="null" disabled>Select category</option>
											</select-input>
										</div>
										<div class="px-4 w-1/2">
											<text-input
												v-model="form.artist_name"
												label="Name of the Artist"
												placeholder="eg. Shankuraj Konwar"
												:errors="errors['artist_name']"
												@keydown="delete errors['artist_name']"
											></text-input>
										</div>
									</div>

									<simple-editor
										label="Description"
										v-model="form.event_description"
										class="mb-4"
										:errors="errors['event_description']"
										@keydown="delete errors['event_description']"
									></simple-editor>
									<simple-editor
										label="Optional Description"
										v-model="form.optional_description"
										class="mb-4"
										:errors="errors['optional_description']"
										@keydown="delete errors['optional_description']"
									></simple-editor>

									<tags-input
										label="Event Keywords"
										v-model="form.event_keywords"
										class="mb-4"
										:errors="errors['event_keywords']"
										@keydown="delete errors['event_keywords']"
										placeholder="Add a tag and hit enter"
									></tags-input>
								</card>
							</div>
						</div>

						<div class="md:flex -mx-4 mb-10">
							<div class="md:w-1/3 px-4">
								<heading size="large" class="mb-1">Event Location</heading>
								<heading class="mb-4">Details about where your event will be hosted.</heading>
								<alert>Search your event venue from the map to get started</alert>
							</div>
							<div class="md:w-2/3 px-4">
								<card>
									<div class="mb-4" style="height:500px;">
										<location-picker
											v-model="location"
											:options="options"
											@change="getLocation"
											class="rounded-lg"
										></location-picker>
									</div>

									<div class="flex flex-wrap -mx-4 mb-4">
										<div class="w-1/2 px-4 mb-4">
											<text-input
												label="Name of location / Hotel"
												placeholder="e.g. Bibekananda Kendra"
												v-model="form.event_location"
												:errors="errors['event_location']"
												@keydown="delete errors['event_location']"
											></text-input>
										</div>
										<div class="w-1/2 px-4 mb-4">
											<text-input
												label="Event City"
												placeholder="e.g. Guwahati"
												v-model="form.event_city"
												:errors="errors['event_city']"
												@keydown="delete errors['event_city']"
											></text-input>
										</div>
										<div class="w-1/2 px-4 mb-4">
											<text-input
												label="Event Pincode"
												placeholder="e.g. 781001"
												v-model="form.event_pincode"
												:errors="errors['event_pincode']"
												@keydown="delete errors['event_pincode']"
											></text-input>
										</div>
										<div class="w-1/2 px-4 mb-4">
											<text-input
												label="Event State"
												placeholder="e.g. Assam"
												v-model="form.event_state"
												:errors="errors['event_state']"
												@keydown="delete errors['event_state']"
											></text-input>
										</div>
									</div>
								</card>
							</div>
						</div>

						<div class="md:flex -mx-4">
							<div class="md:w-1/3 px-4">
								<heading size="large" class="mb-1">SEO Content</heading>
								<heading class="mb-4">Write great content optimized for SEO</heading>
							</div>
							<div class="md:w-2/3 px-4">
								<card>
									<textarea-input
										label="Meta Description"
										class="mb-4"
										placeholder="Write short description of your event"
										v-model="form.meta_description"
										:errors="errors['meta_description']"
										@keydown="delete errors['meta_description']"
									></textarea-input>
									<tags-input
										label="Meta Keywords"
										v-model="form.meta_keywords"
										class="mb-4"
										:errors="errors['meta_keywords']"
										@keydown="delete errors['meta_keywords']"
										placeholder="Add a tag and hit enter"
									></tags-input>
									<text-input
										label="SEO Title"
										class="mb-4"
										placeholder="eg. Senior web developer in guwahati"
										v-model="form.seo_title"
										:errors="errors['seo_title']"
										@keydown="delete errors['seo_title']"
									></text-input>
								</card>
							</div>
						</div>
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
import TextInput from "@/Shared/tuis/TextInput";
import SelectInput from "@/Shared/tuis/SelectInput";
import LoadingButton from "@/Shared/tuis/LoadingButton";
import SimpleEditor from "@/Shared/tuis/SimpleEditor";
import SwitchInput from "@/Shared/tuis/SwitchInput";
import DateInput from "@/Shared/tuis/DateInput";
import Alert from "@/Shared/tuis/Alert";
import TextareaInput from "@/Shared/tuis/TextareaInput";
import FileInput from "@/Shared/tuis/FileInput";
import EmptyState from "@/Shared/tuis/EmptyState";
import TagsInput from "@/Shared/tuis/TagsInput";
import TimePicker from "@/Shared/tuis/TimePicker";
import LocationPicker from "@/Shared/tuis/LocationPicker";
import Badge from "@/Shared/tuis/Badge";

const date = new Date();
const day = date.getDate();
const month = date.getMonth() + 1;
const year = date.getFullYear();
const currentDate = `${day}/${month}/${year}`;

export default {
	components: {
		Layout,
		Heading,
		Icon,
		LinkTo,
		Card,
		TextInput,
		SelectInput,
		SimpleEditor,
		LoadingButton,
		SwitchInput,
		DateInput,
		Alert,
		TextareaInput,
		FileInput,
		EmptyState,
		TagsInput,
		TimePicker,
		LocationPicker,
		Badge
	},
	props: ["errors", "categories", "event", "can"],
	data() {
		return {
			location: {
				lat: parseFloat(this.event.latitude),
				lng: parseFloat(this.event.longitude)
			},
			options: {
				// is not required
				map: {
					/** other map options **/
				},
				marker: {
					/** marker options **/
				},
				autocomplete: {
					// componentRestrictions: { country: "IN" }
					// types: ["geocode"]
					/** autocomplete options **/
				}
			},
			form: {
				event_image: null,
				event_image_deleted:
					this.event.event_image == null ? "yes" : "no",
				event_name: this.event.event_name,
				event_start_date: this.event.event_start_date_formatted,
				event_start_time: this.event.event_start_time_formatted,
				event_end_date: this.event.event_end_date_formatted,
				event_end_time: this.event.event_end_time_formatted,
				artist_name: this.event.artist_name,
				event_category: this.getKeyByValue(
					this.categories,
					this.event.event_category
				),
				event_description: this.event.event_description,
				optional_description: this.event.optional_description,
				event_keywords: this.event.event_keywords,
				meta_description: this.event.meta_description,
				meta_keywords: this.event.meta_keywords,
				seo_title: this.event.seo_title,
				event_location: this.event.event_location,
				event_city: this.event.event_city,
				event_pincode: this.event.event_pincode.toString(),
				event_state: this.event.event_state,
				latitude: parseFloat(this.event.latitude),
				longitude: parseFloat(this.event.longitude)
			}
		};
	},
	methods: {
		getKeyByValue(obj, value) {
			return Object.keys(obj).find(key => obj[key] == value);
		},
		formattedDate(date) {
			let strArray = date.split("/");
			return `${strArray[2]}-${strArray[1]}-${strArray[0]}`;
		},
		getLocation({ location, address }) {
			Object.assign(this.location, location);
			Object.assign(this.form, {
				event_location: address.place_name,
				event_city: address.locality,
				event_pincode: address.postal_code,
				event_state: address.administrative_area_level_1,
				latitude: location.lat,
				longitude: location.lng
			});
		},
		updateEvent() {
			this.$refs.eventUpdateButton.startLoading();
			Object.assign(this.form, {
				event_starting_date:
					this.formattedDate(this.form.event_start_date) +
					` ${
						this.form.event_start_time
							? this.form.event_start_time["HH"] &&
							  this.form.event_start_time["HH"] != ""
								? this.form.event_start_time["HH"]
								: "00"
							: "00"
					}:${
						this.form.event_start_time
							? this.form.event_start_time["mm"] &&
							  this.form.event_start_time["mm"] != ""
								? this.form.event_start_time["mm"]
								: "00"
							: "00"
					}:00`,
				event_ending_date:
					this.formattedDate(this.form.event_end_date) +
					` ${
						this.form.event_end_time
							? this.form.event_end_time["HH"] &&
							  this.form.event_end_time["HH"] != ""
								? this.form.event_end_time["HH"]
								: "00"
							: "00"
					}:${
						this.form.event_end_time
							? this.form.event_end_time["mm"] &&
							  this.form.event_end_time["mm"] != ""
								? this.form.event_end_time["mm"]
								: "00"
							: "00"
					}:00`
			});

			let {
				event_start_date,
				event_start_time,
				event_end_date,
				event_end_time,
				...formattedEvent
			} = this.form;

			let formData = new FormData();
			this.getFormData(formData, formattedEvent);

			this.$inertia
				.post(
					this.route("admin.events.update", `${this.event.uuid}`),
					formData
				)
				.then(() => {
					this.$refs.eventUpdateButton.stopLoading();
				})
				.catch(() => {
					this.$refs.eventUpdateButton.stopLoading();
				});
		},
		getFormData(formData, data, previousKey) {
			if (data instanceof Object) {
				Object.keys(data).forEach(key => {
					const value = data[key];
					if (value instanceof Blob) {
						formData.append(key, value);
					}
					if (value instanceof Object && !Array.isArray(value)) {
						return this.getFormData(formData, value, key);
					}
					if (previousKey) {
						key = `${previousKey}[${key}]`;
					}
					if (Array.isArray(value)) {
						value.forEach(val => {
							formData.append(`${key}[]`, val);
						});
					} else {
						formData.append(key, value || "");
					}
				});
			}
		},

		publishEvent() {
			this.$refs.eventPublishButton.startLoading();

			this.$inertia
				.post(this.route("admin.events.publish", this.event.uuid), {
					_method: "post"
				})
				.then(() => {
					this.$refs.eventPublishButton.stopLoading();
				})
				.catch(() => {
					this.$refs.eventPublishButton.stopLoading();
				});
		},

		deleteEventImage(uuid) {
			if (confirm("Are you sure you want to delete this image?")) {
				this.$inertia.delete(
					this.route("admin.events.deleteimage", uuid)
				);
				this.form.event_image_deleted = "yes";
			}
		}
	}
};
</script>

<style>
.vue-file-agent .file-preview-wrapper:before {
	border-radius: 10px;
	display: flex;
	align-items: center;
	justify-content: center;
	text-align: center;
}

#profile-pic-demo .drop-help-text {
	display: none;
}
#profile-pic-demo .is-drag-over .drop-help-text {
	display: block;
}
#profile-pic-demo .profile-pic-upload-block {
	border: 2px dashed transparent;
	padding: 20px;
	padding-top: 0;
}

#profile-pic-demo .is-drag-over.profile-pic-upload-block {
	border-color: #aaa;
}
#profile-pic-demo .vue-file-agent {
	width: 180px;
	float: left;
	margin: 0 15px 5px 0;
	border: 0;
	box-shadow: none;
}
</style>