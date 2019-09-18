<template>
	<div class="shadow w-full rounded-lg bg-white overflow-hidden w-full">
		<div
			class="card-header border-0 flex items-center justify-between px-8 py-3 bg-gray-100"
			v-if="withHeader"
		>
			<div class="text-truncate">
				<slot name="header"></slot>
			</div>
			<div>
				<slot name="header-action"></slot>
			</div>
		</div>

		<div :class="bodyClass">
			<slot />
		</div>

		<div class="px-8 py-3 bg-gray-100" v-if="withFooter">
			<slot name="footer"></slot>
		</div>
	</div>
</template>

<script>
export default {
	name: "Card",

	props: {
		withHeader: {
			type: Boolean,
			default: false
		},
		withFooter: {
			type: Boolean,
			default: false
		},
		isPadding: {
			type: Boolean,
			default: true
		}
	},

	computed: {
		bodyClass() {
			return {
				"px-8 py-6": this.isPadding === true
			};
		}
	}
};
</script>
