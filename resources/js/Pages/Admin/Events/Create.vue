<template>
	<layout>
		<div class="bg-white px-4 pt-6 pb-4 relative shadow-sm z-20">
			<div class="max-w-6xl mx-auto">
				<link-to to="/admin/events" class="mb-2">
					<icon name="chevron-left" class="-ml-2"></icon>Back to Events
				</link-to>
				<div class="flex w-full justify-between items-center">
					<div class="flex-1">
						<heading size="heading">Create New Event</heading>
					</div>
					<div>
						<loading-button
							size="small"
							ref="eventSaveButton"
							class="mt-2 md:mt-0"
							@click="saveEvent"
						>Save Event</loading-button>
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
									<file-input
										v-model="event.event_image"
										label="Event Image"
										:errors="errors['event_image']"
										class="mb-4"
									></file-input>
									<text-input
										v-model="event.event_name"
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
											v-model="event.event_start_date"
											:errors="errors['event_starting_date']"
											@input="delete errors['event_starting_date']"
											readonly
										></date-input>
										<time-picker
											:minute-interval="15"
											label="Time"
											v-model="event.event_start_time"
											class="w-1/2 px-4"
											close-on-complete
											readonly
										></time-picker>
									</div>
									<div class="flex -mx-4 mb-4">
										<date-input
											label="Event End Date"
											class="w-48 px-4"
											placeholder="Select date"
											v-model="event.event_end_date"
											:errors="errors['event_ending_date']"
											@input="delete errors['event_ending_date']"
											readonly
										></date-input>
										<time-picker
											:minute-interval="15"
											label="Time"
											v-model="event.event_end_time"
											class="w-1/2 px-4"
											close-on-complete
											readonly
										></time-picker>
									</div>
									<div class="flex -mx-4 mb-4">
										<div class="px-4 w-1/2">
											<select-input
												v-model="event.event_category"
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
												v-model="event.artist_name"
												label="Name of the Artist"
												placeholder="eg. Shankuraj Konwar"
												:errors="errors['artist_name']"
												@keydown="delete errors['artist_name']"
											></text-input>
										</div>
									</div>

									<simple-editor
										label="Description"
										v-model="event.event_description"
										class="mb-4"
										:errors="errors['event_description']"
										@keydown="delete errors['event_description']"
									></simple-editor>
									<simple-editor
										label="Optional Description"
										v-model="event.optional_description"
										class="mb-4"
										:errors="errors['optional_description']"
										@keydown="delete errors['optional_description']"
									></simple-editor>

									<tags-input
										label="Event Keywords"
										v-model="event.event_keywords"
										class="mb-4"
										:errors="errors['event_keywords']"
										@keydown="delete errors['event_keywords']"
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
											@input="getLocation"
											class="rounded-lg"
										></location-picker>
									</div>

									<div class="flex flex-wrap -mx-4 mb-4">
										<div class="w-1/2 px-4 mb-4">
											<text-input
												label="Name of location / Hotel"
												placeholder="e.g. Bibekananda Kendra"
												v-model="event.event_location"
												:errors="errors['event_location']"
												@keydown="delete errors['event_location']"
											></text-input>
										</div>
										<div class="w-1/2 px-4 mb-4">
											<text-input
												label="Event City"
												placeholder="e.g. Guwahati"
												v-model="event.event_city"
												:errors="errors['event_city']"
												@keydown="delete errors['event_city']"
											></text-input>
										</div>
										<div class="w-1/2 px-4 mb-4">
											<text-input
												label="Event Pincode"
												placeholder="e.g. 781001"
												v-model="event.event_pincode"
												:errors="errors['event_pincode']"
												@keydown="delete errors['event_pincode']"
											></text-input>
										</div>
										<div class="w-1/2 px-4 mb-4">
											<text-input
												label="Event State"
												placeholder="e.g. Assam"
												v-model="event.event_state"
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
										v-model="event.meta_description"
										:errors="errors['meta_description']"
										@keydown="delete errors['meta_description']"
									></textarea-input>
									<tags-input
										label="Meta Keywords"
										v-model="event.meta_keywords"
										class="mb-4"
										:errors="errors['meta_keywords']"
										@keydown="delete errors['meta_keywords']"
									></tags-input>
									<text-input
										label="SEO Title"
										class="mb-4"
										placeholder="eg. Senior web developer in guwahati"
										v-model="event.seo_title"
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
		LocationPicker
	},
	props: ["errors", "categories"],
	data() {
		return {
			location: {
				lat: 26.1927742,
				lng: 91.75283990000003
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
			event: {
				event_image: null,
				event_name: null,
				event_start_date: currentDate,
				event_start_time: null,
				event_end_date: currentDate,
				event_end_time: null,
				event_category: null,
				event_description:
					"<p>Majuli Music Festival, an entity of Majuli Music Foundation aims to protect the music, art, culture, and eco diversity of the island; thereby using music as a medium for people to connect and learn about Majuli.&nbsp;</p><p><br></p><p><br></p><p>A vision to promote rural tourism, uplift the local community and make the island self sufficient gave birth to Majuli Music Festival. The purpose of this initiative stretches far beyond curating a platform for musicians and artists. It strives to offer visitors a plethora of experiences - music, art, cultural exchange, local food and beer; everything amidst the mesmerising natural beauty of Majuli. The tagline - “Music For Change” explains our motive.</p>",
				optional_description:
					"<p><strong>Artist Line-up and their description:</strong></p><p>The artist line up at Majuli Music Festival 2019 comprises of independent artists, bands and labels that believe in producing&nbsp;Music for Change and have been instrumental in doing so.</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Guru Rewben Mashangva</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;When Chai Met Toast</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;FishCurry Blues - By Kalyan Baruah</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Sparzana - By Jatin Sharma</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Folkswagon</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Fuzz Culture</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Nilotpal Bora</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Goldie Sohel</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Suhas Joshi</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Shanku and Project Bartalaap</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Abhi Saikia</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Rain In Sahara</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Island Warrior</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Bio and The Miri Band</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Alobo Naga</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Cultivators</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Lateral</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Abhilash Choudhury</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Eastern Soul Players</p><p>●&nbsp;&nbsp;&nbsp;&nbsp;Moniraj Hazarika</p>",
				event_keywords: [],
				meta_description: null,
				meta_keywords: [],
				seo_title: null
			},
			eventAddress: {}
		};
	},
	methods: {
		formattedDate(date) {
			let strArray = date.split("/");
			return `${strArray[2]}-${strArray[1]}-${strArray[0]}`;
		},
		getLocation({ location, address }) {
			Object.assign(this.location, location);

			Object.assign(this.event, {
				event_location: address.place_name,
				event_city: address.locality,
				event_pincode: address.postal_code,
				event_state: address.administrative_area_level_1,
				latitude: location.lat,
				longitude: location.lng
			});
		},
		saveEvent() {
			this.$refs.eventSaveButton.startLoading();
			Object.assign(this.event, {
				event_starting_date:
					this.formattedDate(this.event.event_start_date) +
					` ${
						this.event.event_start_time
							? this.event.event_start_time["HH"] &&
							  this.event.event_start_time["HH"] != ""
								? this.event.event_start_time["HH"]
								: "00"
							: "00"
					}:${
						this.event.event_start_time
							? this.event.event_start_time["mm"] &&
							  this.event.event_start_time["mm"] != ""
								? this.event.event_start_time["mm"]
								: "00"
							: "00"
					}:00`,
				event_ending_date:
					this.formattedDate(this.event.event_end_date) +
					` ${
						this.event.event_end_time
							? this.event.event_end_time["HH"] &&
							  this.event.event_end_time["HH"] != ""
								? this.event.event_end_time["HH"]
								: "00"
							: "00"
					}:${
						this.event.event_end_time
							? this.event.event_end_time["mm"] &&
							  this.event.event_end_time["mm"] != ""
								? this.event.event_end_time["mm"]
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
			} = this.event;

			let formData = new FormData();
			this.getFormData(formData, formattedEvent);

			this.$inertia
				.post(this.route("admin.events.store"), formData)
				.then(() => {
					this.$refs.eventSaveButton.stopLoading();
				})
				.catch(() => {
					this.$refs.eventSaveButton.stopLoading();
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